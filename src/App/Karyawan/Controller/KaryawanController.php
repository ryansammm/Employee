<?php

namespace App\Karyawan\Controller;

use App\Bank\Model\Bank;
use App\Jabatan\Model\Jabatan;
use App\Karyawan\Model\Karyawan;
use App\Karyawan\Model\KaryawanKontakAlt;
use App\Media\Model\Media;
use Core\Classes\SessionData;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class KaryawanController
{
    public $karyawan;
    public $jabatan;
    public $bank;
    public $karyawanKontakAlt;

    public function __construct()
    {
        $this->karyawan = new Karyawan();
        $this->jabatan = new Jabatan();
        $this->bank = new Bank();
        $this->karyawanKontakAlt = new KaryawanKontakAlt();
    }

    public function index(Request $request)
    {
        $datas = $this->karyawan
            ->leftJoin('media', 'media.id_relation', '=', 'karyawan.id_karyawan')
            ->paginate(10);

        return render_template('admin/karyawan/index', ['datas' => $datas]);
    }

    public function create(Request $request)
    {
        $errors = SessionData::get()->getFlashBag()->get('errors', []);
        $bank = $this->bank->get();

        return render_template('admin/karyawan/create', ['errors' => $errors, 'bank' => $bank]);
    }

    public function store(Request $request)
    {

        $datas = $request->request->all();
        $request->request->set('hide', '2');
        $create = $this->karyawan->insert($datas);

        $request->request->set('id_karyawan', $create);
        $create_kontak_alt = $this->karyawanKontakAlt->insert($request->request->all());

        $media = new Media();
        $media->storeMedia($request->files->get('profile_foto'), [
            'id_relation' => $create,
            'jenis_dokumen' => '',
        ]);

        return new RedirectResponse('/admin/karyawan');
    }

    public function edit(Request $request)
    {
        $id = $request->attributes->get('id');
        $bank = $this->bank->get();
        $detail = $this->karyawan
            ->leftJoin('media', 'media.id_relation', '=', 'karyawan.id_karyawan')
            ->leftJoin('bank', 'bank.id_bank', '=', 'karyawan.id_bank')
            ->where('id_karyawan', $id)->first();
        $detail_kontak_alt = $this->karyawanKontakAlt->where('id_karyawan', $id)->first();

        return render_template('admin/karyawan/edit', ['detail' => $detail, 'bank' => $bank, 'detail_kontak_alt' => $detail_kontak_alt]);
    }

    public function update(Request $request)
    {
        $id = $request->attributes->get('id');
        $datas = $request->request->all();
        $this->karyawan->where('id_karyawan', $id)->update($datas);
        $this->karyawanKontakAlt->where('id_karyawan', $id)->update($datas);

        $media = new Media();
        $media->updateMedia($request->files->get('profile_foto'), [
            'id_relation' => $id,
            'jenis_dokumen' => '',
        ], $this->karyawan, $id);

        return new RedirectResponse('/admin/karyawan');
    }

    public function delete(Request $request)
    {
        $id = $request->attributes->get('id');
        $media = new Media();
        $media_data = $this->karyawan->select('media.*')->leftJoin('media', 'media.id_relation', '=', 'karyawan.id_karyawan')->where('id_karyawan', $id)->first();
        $this->karyawan->where('id_karyawan', $id)->delete();
        $media->deleteMedia($media_data);

        return new RedirectResponse('/admin/karyawan');
    }
}
