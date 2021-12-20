<?php

namespace App\KategoriLayananAdmin\Controller;

use App\KategoriLayananAdmin\Model\KategoriLayananAdmin;
use Core\Classes\SessionData;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class KategoriLayananAdminController
{
    public $model;

    public function __construct()
    {
        $this->model = new KategoriLayananAdmin();
    }

    public function index(Request $request)
    {
        $data_kategori_layanan = $this->model
            ->paginate(10);

        return render_template('admin/kategori-layanan/index', ['data_kategori_layanan' => $data_kategori_layanan]);
    }

    public function create(Request $request)
    {
        $errors = SessionData::get()->getFlashBag()->get('errors', []);

        return render_template('admin/kategori-layanan/create', ['errors' => $errors]);
    }

    public function store(Request $request)
    {
        /* --------------------------------- Request -------------------------------- */
        $request->request->set('id_user', SessionData::get('id_user'));

        /* ------------------------------ Create Produk ----------------------------- */
        $create = $this->model->insert($request->request->all());

        return new RedirectResponse('/admin/kategori-layanan');
    }

    public function edit(Request $request)
    {
        $id = $request->attributes->get("id");
        $kategori_layanan = $this->model->where('id_kategori_layanan', $id)->first();

        return render_template('admin/kategori-layanan/edit', ['kategori_layanan' => $kategori_layanan]);
    }

    public function update(Request $request)
    {
        $id = $request->attributes->get("id");
        $this->model->where('id_kategori_layanan', $id)->update($request->request->all());

        return new RedirectResponse('/admin/kategori-layanan/konten');
    }

    public function delete(Request $request)
    {
        $id = $request->attributes->get("id");
        $this->model->where('id_kategori_layanan', $id)->delete();

        return new RedirectResponse('/admin/kategori-layanan');
    }
}
