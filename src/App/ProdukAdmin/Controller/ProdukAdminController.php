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
        $media->storeMedia($request->files->get('produk_foto_utama'), [
            'id_relation' => $create,
            'jenis_dokumen' => 'utama',
        ]);

        // Ini buat store data ke group produk
        foreach ($request->files->get('produk_foto') as $key => $value) {
            // store foto portofolio
            $media->storeMedia($request->files->get('produk_foto')[$key], [
                'id_relation' => $create,
                'jenis_dokumen' => 'lainnya',
            ]);
        }
        /* -------------------------------------------------------------------------- */

        return new RedirectResponse('/admin/produk');
    }

    public function edit(Request $request)
    {
        $id = $request->attributes->get("id");
        $produk = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'produk.id_produk')
            ->where('media.jenis_dokumen', 'utama')
            ->where('id_produk', $id)->first();
        $data_kategori_produk = $this->modelKategoriProduk->get();

        $media = new Media();
        $foto_produk_lainnya = $media->where('id_relation', $id)->where('jenis_dokumen', 'lainnya')->get();

        return render_template('admin/produk/edit', ['id' => $id, 'produk' => $produk, 'data_kategori_produk' => $data_kategori_produk, 'foto_produk_lainnya' => $foto_produk_lainnya]);
    }

    public function update(Request $request)
    {
        $id = $request->attributes->get("id");

        $request->request->set('deskripsi_produk', htmlspecialchars($request->request->get('deskripsi_produk')));
        $request->request->set('spesifikasi_produk', htmlspecialchars($request->request->get('spesifikasi_produk')));
        $this->model->where('id_produk', $id)->update($request->request->all());

        $media = new Media();
        $media->updateMedia($request->files->get('produk_foto_utam'), [
            'id_relation' => $id,
            'jenis_dokumen' => 'utama',
        ], $this->model, $id);

        $id_media = (array) $request->request->get('id_media');
        $get_detailExisting = $media->where('id_relation', $id)->where('jenis_dokumen', 'lainnya')->get();

        // pengecekan detail data yang statusnya di hapus
        foreach ($get_detailExisting->items as $key => $value) {
            foreach ($id_media as $key1 => $value1) {
                if ($value1 == $value['id_media']) {
                    $exsist = true;
                    break;
                } else {
                    $exsist = false;
                }
            }
            if (!$exsist) {
                // delete detail data
                $media_data = $media->where('id_media', $value['id_media'])->first();
                $media->deleteMedia($media_data);
            }
        }

        // pengecekan detail data yang statusnya di rubah
        foreach ($id_media as $key => $value) {
            // check apakah foto dirubah
            if ($request->files->get('produk_foto_' . $value) != null) {
                // delete detail data
                $media_data = $media->where('id_media', $value)->first();
                $media->deleteMedia($media_data);

                // store detail media
                $media->storeMedia($request->files->get('produk_foto_' . $value), [
                    'id_relation' => $id,
                    'jenis_dokumen' => 'lainnya',
                ]);
            }
        }

        // store detail data yang statusnya di tambah
        if ($request->files->get('produk_foto') != null) {
            foreach ($request->files->get('produk_foto') as $key => $value) {
                $media->storeMedia($request->files->get('produk_foto')[$key], [
                    'id_relation' => $id,
                    'jenis_dokumen' => 'lainnya',
                ]);
            }
        }

        return new RedirectResponse('/admin/produk');
    }

    public function delete(Request $request)
    {
        $id = $request->attributes->get("id");

        $media = new Media();
        $media_data = $media->where('id_relation', $id)->first();
        $this->model->where('id_produk', $id)->delete();
        $media->deleteMedia($media_data);

        return new RedirectResponse('/admin/produk');
    }
}
