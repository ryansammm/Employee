<?php

namespace App\GaleriAdmin\Controller;

use App\GaleriAdmin\Model\GaleriAdmin;
use App\GaleriAdmin\Validation\GaleriAdminValidation;
use App\GroupGaleri\Model\GroupGaleriNew;
use App\KategoriGaleriAdmin\Model\KategoriGaleriAdmin;
use App\Media\Model\Media;
use Core\Classes\SessionData;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class GaleriAdminController
{
    public $model;
    public $groupGaleri;
    public $modelKategoriGaleri;

    public function __construct()
    {
        $this->model = new GaleriAdmin();
        $this->groupGaleri = new GroupGaleriNew();
        $this->modelKategoriGaleri = new KategoriGaleriAdmin();
    }

    public function index(Request $request)
    {
        $data_galeri = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'galeri.id_galeri')
            ->paginate(10);

        return render_template('admin/galeri/index', ['data_galeri' => $data_galeri]);
    }

    public function create(Request $request)
    {
        $data_kategori_galeri = $this->modelKategoriGaleri->get();

        $errors = SessionData::get()->getFlashBag()->get('errors', []);

        return render_template('admin/galeri/create', ['erros' => $errors, 'data_kategori_galeri' => $data_kategori_galeri]);
    }

    public function store(Request $request)
    {
        /* --------------------------------- Request -------------------------------- */
        $request->request->set('id_user', SessionData::get('id_user'));
        $tambah_galeri = $this->model->insert($request->request->all());

        $media = new Media();
        $media->storeMedia($request->files->get('galeri_foto'), [
            'id_relation' => $tambah_galeri,
            'jenis_dokumen' => 'cover-galeri',
        ]);

        // Ini buat store data ke group galeri
        foreach ($request->files->get('upload_galeri') as $key => $value) {

            $createDetail = $this->groupGaleri->insert([
                'id_galeri' => $tambah_galeri,
                'judul_group_galeri' => $request->request->get('judul_groupgaleri')[$key],
                'deskripsi_group_galeri' => $request->request->get('deskripsi_groupgaleri')[$key],
                'tanggal_publish' => $request->request->get('tgl_galeri'),
                'id_user' => SessionData::get('id_user'),
                'kategori_group_galeri' => 'foto',
            ]);

            // store foto portofolio
            $media->storeMedia($request->files->get('upload_galeri')[$key], [
                'id_relation' => $createDetail,
                'jenis_dokumen' => '',
            ]);
        }

        return new RedirectResponse('/admin/galeri');
    }

    public function edit(Request $request)
    {
        $kategori = $this->modelKategoriGaleri->get();
        $id = $request->attributes->get("id");
        $galeri = $this->model->leftJoin('media', 'media.id_relation', '=', 'galeri.id_galeri')->where('id_galeri', $id)->first();
        $group_galeri = $this->groupGaleri->leftJoin('media', 'media.id_relation', '=', 'group_galeri.id_group_galeri')->where('id_galeri', $id)->get();

        return render_template('admin/galeri/edit', ['galeri' => $galeri, 'group_galeri' => $group_galeri, 'kategori' => $kategori]);
    }

    public function update(Request $request)
    {
        $id = $request->attributes->get("id");

        // $galeri_validation = new GaleriAdminValidation($request);
        // $validation = $galeri_validation->validate();
        // if (!$validation->passed) {
        //     return new RedirectResponse('/admin/galeri/'.$id.'/edit');
        // }

        $id_groupgaleri = (array) $request->request->get('id_groupgaleri');
        $get_detailExisting = $this->groupGaleri->leftJoin('media', 'media.id_relation', '=', 'group_galeri.id_group_galeri')->where('id_galeri', $id)->get();

        $media = new Media();

        // pengecekan detail data yang statusnya di hapus
        foreach ($get_detailExisting->items as $key => $value) {
            foreach ($id_groupgaleri as $key1 => $value1) {
                if ($value1 == $value['id_group_galeri']) {
                    $exsist = true;
                    break;
                } else {
                    $exsist = false;
                }
            }
            if (!$exsist) {
                // delete detail data
                $media_data = $this->groupGaleri->select('media.*')->leftJoin('media', 'media.id_relation', '=', 'group_galeri.id_group_galeri')->where('id_relation', $value['id_group_galeri'])->first();
                $this->groupGaleri->where('id_group_galeri', $value['id_group_galeri'])->delete();
                $media->deleteMedia($media_data);
            }
        }

        // pengecekan detail data yang statusnya di rubah
        foreach ($id_groupgaleri as $key => $value) {
            // check apakah foto dirubah
            if ($request->files->get('upload_galeri_' . $value) != null) {
                // delete detail data
                $media_data = $this->groupGaleri->select('media.*')->leftJoin('media', 'media.id_relation', '=', 'group_galeri.id_group_galeri')->where('id_relation', $value)->first();
                $media->deleteMedia($media_data);

                // store detail media
                $media->storeMedia($request->files->get('upload_galeri_' . $value), [
                    'id_relation' => $value,
                    'jenis_dokumen' => '',
                ]);
            }
            // update deskripsi detail
            $updateDetail = $this->groupGaleri->where('id_group_galeri', $value)->update([
                'id_galeri' => $id,
                'judul_group_galeri' => $request->request->get('judul_groupgaleri_' . $value),
                'deskripsi_group_galeri' => $request->request->get('deskripsi_groupgaleri_' . $value),
                'tanggal_publish' => $request->request->get('tgl_galeri'),
                'id_user' => SessionData::get('id_user'),
                'kategori_group_galeri' => 'foto',
            ]);
        }

        // store detail data yang statusnya di tambah
        if ($request->files->get('upload_galeri') != null) {
            foreach ($request->files->get('upload_galeri') as $key => $value) {
                $createDetail = $this->groupGaleri->insert([
                    'id_galeri' => $id,
                    'judul_group_galeri' => $request->request->get('judul_groupgaleri')[$key],
                    'deskripsi_group_galeri' => $request->request->get('deskripsi_groupgaleri')[$key],
                    'tanggal_publish' => $request->request->get('tgl_galeri'),
                    'id_user' => SessionData::get('id_user'),
                    'kategori_group_galeri' => 'foto',
                ]);

                $media->storeMedia($request->files->get('upload_galeri')[$key], [
                    'id_relation' => $createDetail,
                    'jenis_dokumen' => '',
                ]);
            }
        }

        // update data induk
        $item = $this->model->where('id_galeri', $id)->update($request->request->all());

        $media = new Media();
        $media->updateMedia($request->files->get('galeri_foto'), [
            'id_relation' => $id,
            'jenis_dokumen' => 'cover-galeri',
        ], $this->model, $id);

        return new RedirectResponse('/admin/galeri');
    }

    public function delete(Request $request)
    {
        $id = $request->attributes->get('id');
        $getDetail = $this->groupGaleri->where('id_galeri', $id)->get();

        $media = new Media();
        // hapus media detail
        foreach ($getDetail->items as $key => $value) {
            $media_data = $this->model->select('media.*')->leftJoin('media', 'media.id_relation', '=', 'group_galeri.id_group_galeri')->where('id_relation', $value['id_group_galeri'])->first();
            $this->model->where('id_group_galeri', $value['id_group_galeri'])->delete();
            $media->deleteMedia($media_data);
        }

        // hapus media induk
        $selectMedia = $media->where('id_relation', $id)->first();
        if ($selectMedia) {
            $this->model->where('id_group_galeri', $selectMedia['id_group_galeri'])->delete();
            $media->deleteMedia($media_data);
        }

        // hapus data detail
        $this->groupGaleri->where('id_galeri', $id)->delete();

        // hapus data induk
        $this->model->where('id_galeri', $id)->delete();

        return new RedirectResponse('/admin/galeri');
    }
}
