<?php

namespace App\Product\Controller;

use App\KategoriProdukAdmin\Model\KategoriProdukAdmin;
use App\Media\Model\Media;
use App\Product\Model\Product;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class ProductController
{
    public $model;

    public function __construct()
    {
        $this->model = new Product();
    }

    public function index(Request $request)
    {

        $media = new Media();
        $kategori_produk = new KategoriProdukAdmin();
        $data_kategori_produk = $kategori_produk->get();
        $data_produk = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'produk.id_produk')
            ->paginate(8)->appends(['kategori_produk' => $request->query->get('kategori_produk')]);

        return render_template('public/product/index', ['data_kategori_produk' => $data_kategori_produk, 'data_produk' => $data_produk]);
    }

    public function create(Request $request)
    {

        return render_template('public/product/create', []);
    }

    public function store(Request $request)
    {

        return new RedirectResponse('/product');
    }

    public function edit(Request $request)
    {


        return render_template('public/product/edit', []);
    }

    public function update(Request $request)
    {

        return new RedirectResponse('/product');
    }

    public function delete(Request $request)
    {

        return new RedirectResponse('/product');
    }

    public function detail(Request $request)
    {
        $id = $request->attributes->get("id");

        $media = new Media();
        $kategori_produk = new KategoriProdukAdmin();

        $data_kategori_produk = $kategori_produk->get();

        $data_produk = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'produk.id_produk')
            ->where('id_produk', $id)->first();

        $datas_produk = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'produk.id_produk')
            ->leftJoin('kategori_produk', 'kategori_produk.id_kategori_produk', '=', 'produk.id_kategori_produk')
            ->paginate(2)->appends(['kategori_produk' => $request->query->get('kategori_produk')]);

        return render_template('public/product/detail', ['data_kategori_produk' => $data_kategori_produk, 'data_produk' => $data_produk, 'datas_produk' => $datas_produk]);
    }

    public function kategori(Request $request)
    {
        /* ---------------------------------- Model --------------------------------- */
        $media = new Media();
        $kategori_produk = new KategoriProdukAdmin();
        /* -------------------------------------------------------------------------- */

        /* --------------------------------- Request -------------------------------- */
        $kategori = $request->attributes->get("kategori");
        /* -------------------------------------------------------------------------- */

        $detail_kategori_produk = $kategori_produk
            ->where('id_kategori_produk', $kategori)
            ->first();

        $data_kategori_produk = $kategori_produk->get();

        $data_produk = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'produk.id_produk')
            ->where('id_kategori_produk', $kategori)
            ->paginate(8)->appends(['kategori_produk' => $request->query->get('kategori_produk')]);

        return render_template('public/product/kategori', ['data_kategori_produk' => $data_kategori_produk, 'data_produk' => $data_produk, 'detail_kategori_produk' => $detail_kategori_produk]);
    }
}
