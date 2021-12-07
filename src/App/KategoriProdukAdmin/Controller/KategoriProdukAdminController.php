<?php

namespace App\KategoriProdukAdmin\Controller;

use App\KategoriProdukAdmin\Model\KategoriProdukAdmin;
use Core\Classes\SessionData;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class KategoriProdukAdminController
{
    public $model;

    public function __construct()
    {
        $this->model = new KategoriProdukAdmin();
    }

    public function index(Request $request)
    {

        $data_kategori_produk = $this->model
            ->paginate(10);

        return render_template('admin/kategori-produk/index', ['data_kategori_produk' => $data_kategori_produk]);
    }

    public function create(Request $request)
    {
        $errors = SessionData::get()->getFlashBag()->get('errors', []);

        return render_template('admin/kategori-produk/create', ['errors' => $errors]);
    }

    public function store(Request $request)
    {
        /* --------------------------------- Request -------------------------------- */
        $request->request->set('id_user', SessionData::get('id_user'));

        /* ------------------------------ Create Produk ----------------------------- */
        $create = $this->model->insert($request->request->all());

        return new RedirectResponse('/admin/kategori_produk');
    }

    public function edit(Request $request)
    {
        $id = $request->attributes->get("id");
        $kategori_produk = $this->model->where('id_kategori_produk', $id)->first();

        return render_template('admin/kategori-produk/edit', ['kategori_produk' => $kategori_produk]);
    }

    public function update(Request $request)
    {
        $id = $request->attributes->get("id");
        $this->model->where('id_kategori_produk', $id)->update($request->request->all());

        return new RedirectResponse('/admin/kategori-produk');
    }

    public function delete(Request $request)
    {
        $id = $request->attributes->get("id");
        $this->model->where('id_kategori_produk', $id)->delete();

        return new RedirectResponse('/admin/kategori-produk');
    }
}
