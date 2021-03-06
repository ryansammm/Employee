<?php

namespace App\Produk\Controller;

use App\Banner\Model\Banner;
use App\CmsKategoriStyle\Model\CmsKategoriModule;
use App\CmsSetting\Model\CmsSetting;
use App\KategoriProdukAdmin\Model\KategoriProdukAdmin;
use App\Media\Model\Media;
use App\Produk\Model\Produk;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class ProdukController
{
    public $model;
    public $modelKategoriProduk;

    public function __construct()
    {
        $this->model = new Produk();
        $this->modelKategoriProduk = new KategoriProdukAdmin();
        $this->cmsSetting = new CmsSetting();
        $this->banner = new Banner();
    }

    public function index(Request $request)
    {
        $data_produk = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'produk.id_produk')
            ->leftJoin('kategori_produk', 'kategori_produk.id_kategori_produk', '=', 'produk.id_kategori_produk')
            ->where('jenis_dokumen', 'utama')
            ->paginate(8)
            ->appends(['kategori_produk' => $request->query->get('kategori_produk')]);

        $datas_kategori = $this->modelKategoriProduk
            ->get();

        foreach ($datas_kategori->items as $key => $value) {
            $datas_kategori->items[$key]['id_kategori'] = $value['id_kategori_produk'];
            $datas_kategori->items[$key]['nama_kategori'] = $value['nama_kategori_produk'];
        }

        $cmsKategoriModule = new CmsKategoriModule('produk-kami');
        extract($cmsKategoriModule->getCmsKategori(), EXTR_SKIP);

        return render_template('public/product/index', ['data_produk' => $data_produk, 'cms_kategori_style' => $cms_kategori_style, 'cms_fonts' => $cms_fonts, 'cmsKategoriStyle' => $cmsKategoriStyle, 'datas_kategori' => $datas_kategori]);
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

        $data_produk = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'produk.id_produk')
            ->leftJoin('kategori_produk', 'kategori_produk.id_kategori_produk', '=', 'produk.id_kategori_produk')
            ->where('id_produk', $id)
            ->first();

        $datas_kategori = $this->modelKategoriProduk
            ->get();

        $data_galeri_produk = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'produk.id_produk')
            ->leftJoin('kategori_produk', 'kategori_produk.id_kategori_produk', '=', 'produk.id_kategori_produk')
            ->where('id_produk', $id)
            ->where('jenis_dokumen', 'lainnya')
            ->get();

        foreach ($datas_kategori->items as $key => $value) {
            $datas_kategori->items[$key]['id_kategori'] = $value['id_kategori_produk'];
            $datas_kategori->items[$key]['nama_kategori'] = $value['nama_kategori_produk'];
        }

        $datas_produk = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'produk.id_produk')
            ->leftJoin('kategori_produk', 'kategori_produk.id_kategori_produk', '=', 'produk.id_kategori_produk')
            ->where('produk.id_kategori_produk', $data_produk['id_kategori_produk'])
            ->where('jenis_dokumen', 'utama')
            ->limit(4)->get();

        $all_produk = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'produk.id_produk')
            ->leftJoin('kategori_produk', 'kategori_produk.id_kategori_produk', '=', 'produk.id_kategori_produk')
            ->orderBy("RAND()")
            ->where('jenis_dokumen', 'utama')
            ->limit(5)->get();


        $cmsKategoriModule = new CmsKategoriModule('produk-kami');
        extract($cmsKategoriModule->getCmsKategori(), EXTR_SKIP);

        return render_template('public/product/detail', ['data_produk' => $data_produk, 'datas_produk' => $datas_produk, 'datas_kategori' => $datas_kategori, 'cms_kategori_style' => $cms_kategori_style, 'cms_fonts' => $cms_fonts, 'cmsKategoriStyle' => $cmsKategoriStyle, 'all_produk' => $all_produk, 'data_galeri_produk' => $data_galeri_produk]);
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

        $datas_kategori = $this->modelKategoriProduk
            ->get();

        foreach ($datas_kategori->items as $key => $value) {
            $datas_kategori->items[$key]['id_kategori'] = $value['id_kategori_produk'];
            $datas_kategori->items[$key]['nama_kategori'] = $value['nama_kategori_produk'];
        }

        $data_produk = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'produk.id_produk')
            ->leftJoin('kategori_produk', 'kategori_produk.id_kategori_produk', '=', 'produk.id_kategori_produk')
            ->where('produk.id_kategori_produk', $kategori)
            ->where('jenis_dokumen', 'utama')
            ->paginate(8)->appends(['kategori_produk' => $request->query->get('kategori_produk')]);

        $cmsKategoriModule = new CmsKategoriModule('produk-kami');
        extract($cmsKategoriModule->getCmsKategori(), EXTR_SKIP);

        return render_template('public/product/category', ['data_produk' => $data_produk, 'cms_kategori_style' => $cms_kategori_style, 'cms_fonts' => $cms_fonts, 'cmsKategoriStyle' => $cmsKategoriStyle, 'datas_kategori' => $datas_kategori]);
    }
}
