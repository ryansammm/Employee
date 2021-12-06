<?php

namespace App\KategoriBerita\Controller;

use App\KategoriBerita\Model\KategoriBerita;
use Core\GlobalFunc;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\JsonResponse;

class KategoriBeritaController extends GlobalFunc
{
    public $model;
    public $username;

    public function __construct()
    {
        $this->model = new KategoriBerita();
        parent::beginSession();
        $this->username = $this->session->get('username');
    }

    public function index(Request $request)
    {
        if ($this->username == null){
            return new RedirectResponse("/admin");
        }

        $data_kategori_berita = $this->model->selectAll();

        return $this->render_template('admin/kategori-berita/index', ['data_kategori_berita' => $data_kategori_berita]);
    }

    public function create(Request $request)
    {
        if ($this->username == null){
            return new RedirectResponse("/admin");
        }

        return $this->render_template('admin/kategori-berita/add');
    }

    public function store(Request $request)
    {
        if ($this->username == null) {
            return new RedirectResponse("/admin");
        }

        $tambah_kategori_berita = $this->model->create($request->request);

        return new RedirectResponse('/admin/kategori-berita');
    }

    public function edit(Request $request)
    {
        if ($this->username == null){
            return new RedirectResponse("/admin");
        }

        $kategori_berita = $this->model->selectOne($request->attributes->get("id_kategori_berita"));


        return $this->render_template('admin/kategori-berita/edit', ['kategori_berita' => $kategori_berita]);
    }

    public function update(Request $request)
    {
        if ($this->username == null){
            return new RedirectResponse("/admin");
        }

        $edit_kategori_berita = $this->model->update($request->attributes->get("id_kategori_berita"), $request->request);

        return new RedirectResponse('/admin/kategori-berita');
    }

    public function delete(Request $request)
    {
        if ($this->username == null){
            return new RedirectResponse("/admin");
        }

        $hapus_kategori_berita = $this->model->delete($request->attributes->get('id_kategori_berita'));

        return new RedirectResponse('/admin/kategori-berita');
    }
}
?>