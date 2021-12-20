<?php

namespace App\ProdukAdmin\Controller;

use App\KategoriProdukAdmin\Model\KategoriProdukAdmin;
use App\Media\Model\Media;
use App\ProdukAdmin\Model\ProdukAdmin;
use Core\Classes\SessionData;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class ProdukAdminController
{
    public $model;

    public function __construct()
    {
        $this->model = new ProdukAdmin();
        $this->modelKategoriProduk = new KategoriProdukAdmin();
    }

    public function index(Request $request)
    {
        $kategori_produk = $this->modelKategoriProduk->get();
        $id_kategori_produk = $request->query->get('id_kategori_produk');
        $data_produk = $this->model
            ->leftJoin('kategori_produk', 'kategori_produk.id_kategori_produk', '=', 'produk.id_kategori_produk')
            ->where(function ($query) use ($request) {
                if ($request->query->get('kategori_produk') != null) {
                    $query->where('produk.id_kategori_produk', $request->query->get('kategori_produk'));
                }
            })
            ->paginate(10)->appends(['kategori_produk' => $request->query->get('kategori_produk')]);


        return render_template('admin/produk/index', ['data_produk' => $data_produk, 'kategori_produk' => $kategori_produk, 'id_kategori_produk' => $id_kategori_produk]);
    }

    public function create(Request $request)
    {
        $data_kategori_produk = $this->modelKategoriProduk->get();
        $errors = SessionData::get()->getFlashBag()->get('errors', []);

        return render_template('admin/produk/create', ['data_kategori_produk' => $data_kategori_produk, 'errors' => $errors]);
    }

    public function store(Request $request)
    {
        /* --------------------------------- Request -------------------------------- */
        $request->request->set('slug_produk', str_slug($request->request->get('nama_produk'), '-'));
        $request->request->set('id_user', SessionData::get('id_user'));
        /* -------------------------------------------------------------------------- */

        /* ------------------------------ Create Produk ----------------------------- */
        $request->request->set('deskripsi_produk', htmlspecialchars($request->request->get('deskripsi_produk')));
        $request->request->set('spesifikasi_produk', htmlspecialchars($request->request->get('spesifikasi_produk')));
        $create = $this->model->insert($request->request->all());
        /* -------------------------------------------------------------------------- */

        /* ------------------------------ Media Produk ------------------------------ */
        $media = new Media();
        $media->storeMedia($request->files->get('produk_foto'), [
            'id_relation' => $create,
            'jenis_dokumen' => '',
        ]);
        /* -------------------------------------------------------------------------- */

        return new RedirectResponse('/admin/produk');
    }

    public function edit(Request $request)
    {
        $id = $request->attributes->get("id");
        $produk = $this->model->where('id_produk', $id)->first();
        $data_kategori_produk = $this->modelKategoriProduk->get();

        return render_template('admin/produk/edit', ['id' => $id, 'produk' => $produk, 'data_kategori_produk' => $data_kategori_produk]);
    }

    public function update(Request $request)
    {
        $id = $request->attributes->get("id");

        $request->request->set('deskripsi_produk', htmlspecialchars($request->request->get('deskripsi_produk')));
        $request->request->set('spesifikasi_produk', htmlspecialchars($request->request->get('spesifikasi_produk')));
        $this->model->where('id_produk', $id)->update($request->request->all());

        $media = new Media();
        $media->updateMedia($request->files->get('produk_foto'), [
            'id_relation' => $id,
            'jenis_dokumen' => '',
        ], $this->model, $id);

        return new RedirectResponse('/admin/produk');
    }

    public function delete(Request $request)
    {
        $id = $request->attributes->get("id");

        $media = new Media();
        $media_data = $this->model->select('media.*')->leftJoin('media', 'media.id_relation', '=', 'produk.id_produk')->where('id_produk', $id)->first();
        $this->model->where('id_produk', $id)->delete();
        $media->deleteMedia($media_data);

        return new RedirectResponse('/admin/produk');
    }
}
