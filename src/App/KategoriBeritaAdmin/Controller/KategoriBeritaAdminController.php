<?php

namespace App\KategoriBeritaAdmin\Controller;

use App\KategoriBeritaAdmin\Model\KategoriBeritaAdmin;
use Core\Classes\SessionData;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class KategoriBeritaAdminController
{
    public $model;

    public function __construct()
    {
        $this->model = new KategoriBeritaAdmin();
    }

    public function index(Request $request)
    {
        $data_kategori_berita = $this->model
            ->paginate(10);

        return render_template('admin/kategori-berita/index', ['data_kategori_berita' => $data_kategori_berita]);
    }

    public function create(Request $request)
    {
        $errors = SessionData::get()->getFlashBag()->get('errors', []);

        return render_template('admin/kategori-berita/create', ['errors' => $errors]);
    }

    public function store(Request $request)
    {
        /* --------------------------------- Request -------------------------------- */
        $request->request->set('id_user', SessionData::get('id_user'));

        /* ------------------------------ Create Produk ----------------------------- */
        $create = $this->model->insert($request->request->all());


        return new RedirectResponse('/admin/kategori-berita');
    }

    public function edit(Request $request)
    {
        $id = $request->attributes->get("id");
        $kategori_berita = $this->model->where('id_kategori_berita', $id)->first();

        return render_template('admin/kategori-berita/edit', ['kategori_berita' => $kategori_berita]);
    }

    public function update(Request $request)
    {
        $id = $request->attributes->get("id");
        $this->model->where('id_kategori_berita', $id)->update($request->request->all());

        return new RedirectResponse('/admin/kategori-berita');
    }

    public function delete(Request $request)
    {
        $id = $request->attributes->get("id");
        $this->model->where('id_kategori_berita', $id)->delete();

        return new RedirectResponse('/admin/kategori-berita');
    }
}
