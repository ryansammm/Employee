<?php

namespace App\Galeri\Controller;

use App\Galeri\Model\GaleriNew;
use App\GroupGaleri\Model\GroupGaleri;
use App\GroupGaleri\Model\GroupGaleriNew;
use App\KategoriGaleriAdmin\Model\KategoriGaleriAdmin;
use App\Media\Model\Media;
use Core\Classes\SessionData;
use Symfony\Component\HttpFoundation\File\Exception\FileException;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class GaleriController
{
    public $galeri;
    public $groupGaleri;
    public $kategoriGaleri;

    public function __construct()
    {
        $this->galeri = new GaleriNew();
        $this->kategoriGaleri = new KategoriGaleriAdmin();
        $this->groupGaleri = new GroupGaleriNew();
    }

    public function index(Request $request)
    {
        $datas = $this->galeri->leftJoin('media', 'media.id_relation', '=', 'galeri.id_galeri')->paginate(10);

        return render_template('admin/galeri/index', ['data_galeri' => $datas]);
    }

    public function create(Request $request)
    {
        $kategori = $this->kategoriGaleri->get();

        return render_template('admin/galeri/create', compact('kategori'));
    }

    public function store(Request $request)
    {
        $tambah_galeri = $this->galeri->insert($request->request->all());

        $media = new Media();
        $media->storeMedia($request->files->get('galeri_foto'), [
            'id_relation' => $tambah_galeri,
            'jenis_dokumen' => '',
        ]);

        // Ini buat store data ke group galeri
        foreach ($request->files->get('upload_galeri') as $key => $value) {
            $createDetail = $this->groupGaleri->insert([
                "id_galeri" => $tambah_galeri,
                "judul_group_galeri" => $request->request->get('judul_groupgaleri')[$key],
                "deskripsi_group_galeri" => $request->request->get('deskripsi_groupgaleri')[$key],
                "tanggal_publish" => $request->request->get('tgl_galeri'),
                "id_user" => SessionData::get('id_user'),
                "kategori_group_galeri" => 'foto'
            ]);

            $media->storeMedia($request->files->get('upload_galeri')[$key], [
                'id_relation' => $createDetail,
                'jenis_dokumen' => '',
            ]);
        }

        return new RedirectResponse('/admin/galeri');
    }

    public function edit(Request $request)
    {
        $id = $request->attributes->get('id');
        $kategori = $this->kategoriGaleri->get();
        $galeri = $this->galeri
            ->leftJoin('media', 'media.id_relation', '=', 'galeri.id_galeri')
            ->where('id_galeri', $id)->first();

        $group_galeri = $this->groupGaleri
            ->leftJoin('media', 'media.id_relation', '=', 'group_galeri.id_group_galeri')
            ->where('id_galeri', $id)->get();

        return render_template('/admin/galeri/edit', compact('galeri', 'group_galeri', 'kategori'));
    }
    public function update(Request $request)
    {
        $id = $request->attributes->get('id');
        $id_groupgaleri = (array) $request->request->get('id_groupgaleri');
        $get_detailExisting = $this->groupGaleri->where('id_galeri', $id)->get();

        $media = new Media();

        // pengecekan detail data yang statusnya di hapus
        foreach ($get_detailExisting as $key => $value) {
            foreach ($id_groupgaleri as $key1 => $value1) {
                if ($value1 == $value['id_groupgaleri']) {
                    $exsist = true;
                    break;
                } else {
                    $exsist = false;
                }
            }
            if (!$exsist) {
                $media_data = $this->groupGaleri->select('media.*')->leftJoin('media', 'media.id_relation', '=', 'group_galeri.id_group_galeri')->where('id_galeri', $value['id_groupgaleri'])->first();
                $this->groupGaleri->where('id_group_galeri', $value['id_groupgaleri'])->delete();
                $media->deleteMedia($media_data);
            }
        }

        // pengecekan detail data yang statusnya di rubah
        foreach ($id_groupgaleri as $key => $value) {
            // check apakah foto dirubah
            if ($_FILES['upload_galeri_' . $value] && ($_FILES['upload_galeri_' . $value]['name'] != '')) {
                // delete detail media
                $selectMedia = $media->where('id_relation', $value)->first();
                $media->deleteMedia($selectMedia);

                // store detail media
                $idMedia = uniqid('med');
                $media->storeMedia($request->files->get('upload_galeri_' . $value), [
                    'id_relation' => $value,
                    'jenis_dokumen' => '',
                ]);
            }
            // update deskripsi detail
            $judul_groupgaleri = $request->request->get('judul_groupgaleri_' . $value);
            $deskripsi_groupgaleri = $request->request->get('deskripsi_groupgaleri_' . $value);

            $updateDetail = $this->groupGaleri->where('id_group_galeri', $value)->update([
                "judul_group_galeri" => $judul_groupgaleri,
                "deskripsi_group_galeri" => $deskripsi_groupgaleri,
                "tanggal_publish" => $request->request->get('tgl_galeri'),
                "id_user" => SessionData::get('id_user'),
                "kategori_group_galeri" => 'foto'
            ]);
        }

        // store detail data yang statusnya di tambah
        if (isset($_FILES['upload_galeri'])) {

            // Ini buat store data ke group galeri
            foreach ($request->files->get('upload_galeri') as $key => $value) {
                $judul_groupgaleri = $request->request->get('judul_groupgaleri')[$key];
                $deskripsi_groupgaleri = $request->request->get('deskripsi_groupgaleri')[$key];

                $createDetail = $this->groupGaleri->insert([
                    "judul_group_galeri" => $judul_groupgaleri,
                    "deskripsi_group_galeri" => $deskripsi_groupgaleri,
                    "tanggal_publish" => $request->request->get('tgl_galeri'),
                    "id_user" => SessionData::get('id_user'),
                    "kategori_group_galeri" => 'foto'
                ]);

                $media->storeMedia($request->files->get('upload_galeri')[$key], [
                    'id_relation' => $createDetail,
                    'jenis_dokumen' => '',
                ]);
            }
        }

        // update data induk
        $item = $this->galeri->where('id_galeri', $id)->update($id, $request->request->all());

        // check apakah foto induk dirubah
        if ($request->files->get('album_cover') != null) {
            // update induk media
            $media->updateMedia($request->files->get('album_cover'), [
                'id_relation' => $id,
                'jenis_dokumen' => '',
            ], $this->galeri, $id);
        }

        return new RedirectResponse('/admin/galeri');
    }

    public function delete(Request $request)
    {
        $id = $request->attributes->get('id');
        $getDetail = $this->groupGaleri->where('id_galeri', $id)->get();

        $media = new Media();
        // hapus media detail
        foreach ($getDetail as $key => $value) {
            $selectMedia = $media->where('id_relation', $value['id_groupgaleri'])->first();
            $media->deleteMedia($selectMedia);
        }

        // hapus media induk
        $selectMedia = $media->where('id_relation', $id)->first();
        $media->deleteMedia($selectMedia);

        // hapus data detail
        $this->groupGaleri->where('id_galeri', $id)->delete();

        // hapus data induk
        $this->galeri->where('id_galeri', $id)->delete();

        return new RedirectResponse('/admin/galeri');
    }
}
