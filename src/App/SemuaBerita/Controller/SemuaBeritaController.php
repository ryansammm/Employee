<?php

namespace App\SemuaBerita\Controller;

use App\Banner\Model\Banner;
use App\CmsKategoriStyle\Model\CmsKategoriModule;
use App\CmsSetting\Model\CmsSetting;
use App\KategoriBeritaAdmin\Model\KategoriBeritaAdmin;
use App\SemuaBerita\Model\SemuaBerita;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class SemuaBeritaController
{
    public $model;
    public $cmsSetting;
    public $banner;

    public function __construct()
    {
        $this->model = new SemuaBerita();
        $this->cmsSetting = new CmsSetting();
        $this->banner = new Banner();
    }

    public function index(Request $request)
    {

        $kategori_berita = new KategoriBeritaAdmin();

        /* -------------------------------- Kategori -------------------------------- */
        $datas_kategori = $kategori_berita
            ->get();

        foreach ($datas_kategori->items as $key => $value) {
            $datas_kategori->items[$key]['id_kategori'] = $value['id_kategori_berita'];
            $datas_kategori->items[$key]['nama_kategori'] = $value['kategori_berita'];
        }
        /* -------------------------------------------------------------------------- */

        /* ---------------------------------- Feed ---------------------------------- */
        $data_feed = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'berita.id_berita')
            ->leftJoin('kategori_berita', 'kategori_berita.id_kategori_berita', '=', 'berita.id_kategori_berita')
            ->paginate(10)->appends(['kategori_berita' => $request->query->get('kategori_berita')]);
        /* -------------------------------------------------------------------------- */

        /* ----------------------------------- CMS ---------------------------------- */
        $cmsKategoriModule = new CmsKategoriModule('produk-kami');
        extract($cmsKategoriModule->getCmsKategori(), EXTR_SKIP);
        $cms_setting = $this->cmsSetting->first();
        /* -------------------------------------------------------------------------- */

        return render_template('public/all-news/index', ['cms_kategori_style' => $cms_kategori_style, 'cms_fonts' => $cms_fonts, 'cmsKategoriStyle' => $cmsKategoriStyle, 'cms_setting' => $cms_setting, 'data_feed' => $data_feed, 'datas_kategori' => $datas_kategori]);
    }

    public function create(Request $request)
    {

        return render_template('home/create', []);
    }

    public function store(Request $request)
    {

        return new RedirectResponse('/home');
    }

    public function edit(Request $request)
    {


        return render_template('home/edit', []);
    }

    public function update(Request $request)
    {

        return new RedirectResponse('/home');
    }

    public function delete(Request $request)
    {

        return new RedirectResponse('/home');
    }

    public function kategori(Request $request)
    {

        $kategori_berita = new KategoriBeritaAdmin();

        $kategori = $request->attributes->get("kategori");

        /* -------------------------------- Kategori -------------------------------- */
        $datas_kategori = $kategori_berita
            ->get();

        foreach ($datas_kategori->items as $key => $value) {
            $datas_kategori->items[$key]['id_kategori'] = $value['id_kategori_berita'];
            $datas_kategori->items[$key]['nama_kategori'] = $value['kategori_berita'];
        }
        /* -------------------------------------------------------------------------- */

        /* ---------------------------------- Feed ---------------------------------- */
        $data_feed = $this->model
            ->select('berita.*', 'media.*', 'kategori_berita.*', 'berita.created_at as posted_at')
            ->leftJoin('media', 'media.id_relation', '=', 'berita.id_berita')
            ->leftJoin('kategori_berita', 'kategori_berita.id_kategori_berita', '=', 'berita.id_kategori_berita')
            ->where('berita.id_kategori_berita', $kategori)
            ->paginate(10)->appends(['kategori_berita' => $request->query->get('kategori_berita')]);
        /* -------------------------------------------------------------------------- */

        /* ----------------------------------- CMS ---------------------------------- */
        $cmsKategoriModule = new CmsKategoriModule('produk-kami');
        extract($cmsKategoriModule->getCmsKategori(), EXTR_SKIP);
        $cms_setting = $this->cmsSetting->first();
        /* -------------------------------------------------------------------------- */

        return render_template('public/all-news/category', ['cms_kategori_style' => $cms_kategori_style, 'cms_fonts' => $cms_fonts, 'cmsKategoriStyle' => $cmsKategoriStyle, 'cms_setting' => $cms_setting, 'data_feed' => $data_feed, 'datas_kategori' => $datas_kategori]);
    }
}
