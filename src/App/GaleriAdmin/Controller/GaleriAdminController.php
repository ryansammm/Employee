<?php

namespace App\GaleriAdmin\Controller;

use App\GaleriAdmin\Model\GaleriAdmin;
use App\KategoriGaleriAdmin\Model\KategoriGaleriAdmin;
use App\Media\Model\Media;
use Core\Classes\SessionData;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class GaleriAdminController
{
    public $model;

    public function __construct()
    {
        $this->model = new GaleriAdmin();
        $this->modelKategoriGaleri = new KategoriGaleriAdmin();
    }

    public function index(Request $request)
    {
        $data_galeri = $this->model
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

        /* ------------------------------ Create Profil ----------------------------- */
        $create = $this->model->insert($request->request->all());

        /* ------------------------------ Media Profil ------------------------------ */
        $media = new Media();
        $media->storeMedia($_FILES['galeri_foto'], [
            'id_relation' => $create,
            'jenis_dokumen' => '',
        ]);

        return new RedirectResponse('/admin/galeri');
    }

    public function edit(Request $request)
    {
        $id = $request->attributes->get("id");
        $galeri = $this->model->where('id_galeri', $id)->first();

        $data_kategori_galeri = $this->modelKategoriGaleri->get();

        return render_template('admin/galeri/edit', ['galeri' => $galeri, 'data_kategori_galeri' => $data_kategori_galeri]);
    }

    public function update(Request $request)
    {
        $id = $request->attributes->get("id");
        $this->model->where('id_galeri', $id)->update($request->request->all());

        $media = new Media();
        $media->updateMedia($_FILES['galeri_foto'], [
            'id_relation' => $id,
            'jenis_dokumen' => '',
        ], $this->model, $id);

        return new RedirectResponse('/admin/galeri');
    }

    public function delete(Request $request)
    {
        $id = $request->attributes->get("id");

        $media = new Media();
        $media_data = $this->model->select('media.*')->leftJoin('media', 'media.id_relation', '=', 'galeri.id_galeri')->where('id_galeri', $id)->first();
        $this->model->where('id_galeri', $id)->delete();
        $media->deleteMedia($media_data);


        return new RedirectResponse('/admin/galeri');
    }
}
