<?php

namespace App\KategoriGaleriAdmin\Controller;

use App\KategoriGaleriAdmin\Model\KategoriGaleriAdmin;
use Core\Classes\SessionData;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class KategoriGaleriAdminController
{
    public $model;

    public function __construct()
    {
        $this->model = new KategoriGaleriAdmin();
    }

    public function index(Request $request)
    {
        $data_kategori_galeri = $this->model
            ->paginate(10);

        return render_template('admin/kategori-galeri/index', ['data_kategori_galeri' => $data_kategori_galeri]);
    }

    public function create(Request $request)
    {
        $errors = SessionData::get()->getFlashBag()->get('errors', []);

        return render_template('admin/kategori-galeri/create', ['errors' => $errors]);
    }

    public function store(Request $request)
    {

        /* --------------------------------- Request -------------------------------- */
        $request->request->set('id_user', SessionData::get('id_user'));

        /* ------------------------------ Create Produk ----------------------------- */
        $create = $this->model->insert($request->request->all());

        return new RedirectResponse('/admin/kategori-galeri');
    }

    public function edit(Request $request)
    {
        $id = $request->attributes->get("id");
        $kategori_galeri = $this->model->where('id_kategori_galeri', $id)->first();

        return render_template('admin/kategori-galeri/edit', ['kategori_galeri' => $kategori_galeri]);
    }

    public function update(Request $request)
    {
        $id = $request->attributes->get("id");
        $this->model->where('id_kategori_galeri', $id)->update($request->request->all());

        return new RedirectResponse('/admin/kategori-galeri/konten');
    }

    public function delete(Request $request)
    {
        $id = $request->attributes->get("id");
        $this->model->where('id_kategori_galeri', $id)->delete();

        return new RedirectResponse('/admin/kategori-galeri');
    }
}
