<?php

namespace App\Berita\Controller;

use App\KategoriBerita\Model\KategoriBerita;
use App\KategoriBeritaAdmin\Model\KategoriBeritaAdmin;
use App\Media\Model\Media;
use App\Berita\Model\Berita;
use App\CmsKategoriStyle\Model\CmsKategoriModule;
use App\CmsSetting\Model\CmsSetting;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class BeritaController
{
    public $model;
    public $cmsSetting;

    public function __construct()
    {
        $this->model = new Berita();
        $this->cmsSetting = new CmsSetting();
    }

    public function index(Request $request)
    {
        $berita = new Berita();
        $media = new Media();
        $kategori_berita = new KategoriBeritaAdmin();

        /* -------------------------------- Kategori -------------------------------- */
        $datas_kategori = $kategori_berita
            ->get();

        foreach ($datas_kategori->items as $key => $value) {
            $datas_kategori->items[$key]['id_kategori'] = $value['id_kategori_berita'];
            $datas_kategori->items[$key]['nama_kategori'] = $value['kategori_berita'];
        }
        /* -------------------------------------------------------------------------- */

        /* ------------------------------ Berita Hangat ----------------------------- */
        $data_berita_hangat = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'berita.id_berita')
            ->leftJoin('kategori_berita', 'kategori_berita.id_kategori_berita', '=', 'berita.id_kategori_berita')
            ->paginate(4)->appends(['kategori_berita' => $request->query->get('kategori_berita')]);
        /* -------------------------------------------------------------------------- */

        /* ------------------------------ Semua Berita ------------------------------ */
        $data_berita = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'berita.id_berita')
            ->leftJoin('kategori_berita', 'kategori_berita.id_kategori_berita', '=', 'berita.id_kategori_berita')
            ->paginate(5)->appends(['kategori_berita' => $request->query->get('kategori_berita')]);
        /* -------------------------------------------------------------------------- */

        /* ---------------------------------- Feed ---------------------------------- */
        $data_feed = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'berita.id_berita')
            ->leftJoin('kategori_berita', 'kategori_berita.id_kategori_berita', '=', 'berita.id_kategori_berita')
            ->paginate(5)->appends(['kategori_berita' => $request->query->get('kategori_berita')]);
        /* -------------------------------------------------------------------------- */

        /* ----------------------------- Berita Terkini ----------------------------- */
        $datas = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'berita.id_berita')
            ->get();

        $count_news_trending = intval(ceil(count($datas->items) / 3) < 1 ? 1 : ceil(count($datas->items) / 3));
        $item_berita_new = function ($index, $halaman, $datas, $label) {
            return isset($datas[($index + (3 * $halaman))]) ? $datas[($index + (3 * $halaman))][$label] : '';
        };
        $item_berita_trending = function ($index, $datas, $label) {
            return isset($datas[$index]) ? $datas[$index][$label] : '';
        };
        /* -------------------------------------------------------------------------- */

        /* ----------------------------------- CMS ---------------------------------- */
        $cmsKategoriModule = new CmsKategoriModule('produk-kami');
        extract($cmsKategoriModule->getCmsKategori(), EXTR_SKIP);
        $cms_setting = $this->cmsSetting->first();
        /* -------------------------------------------------------------------------- */

        return render_template('public/news/index', ['data_berita' => $data_berita, 'datas_kategori' => $datas_kategori, 'datas' => $datas, 'count_news_trending' => $count_news_trending, 'item_berita_new' => $item_berita_new, 'item_berita_trending' => $item_berita_trending, 'cms_kategori_style' => $cms_kategori_style, 'cms_fonts' => $cms_fonts, 'cmsKategoriStyle' => $cmsKategoriStyle, 'data_berita_hangat' => $data_berita_hangat, 'cms_setting' => $cms_setting, 'data_feed' => $data_feed]);
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

    public function detail(Request $request)
    {

        $berita = new Berita();
        $media = new Media();
        $kategori_berita = new KategoriBeritaAdmin();

        $id = $request->attributes->get("id");

        $data_berita_hangat = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'berita.id_berita')
            ->leftJoin('kategori_berita', 'kategori_berita.id_kategori_berita', '=', 'berita.id_kategori_berita')
            ->paginate(4)->appends(['kategori_berita' => $request->query->get('kategori_berita')]);


        $detail_berita = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'berita.id_berita')
            ->leftJoin('users', 'users.id_user', '=', 'berita.id_user')
            ->leftJoin('kategori_berita', 'kategori_berita.id_kategori_berita', '=', 'berita.id_kategori_berita')
            ->where('id_berita', $id)->first();

        $data_kategori_berita = $kategori_berita->get();

        $data_berita = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'berita.id_berita')
            ->leftJoin('kategori_berita', 'kategori_berita.id_kategori_berita', '=', 'berita.id_kategori_berita')
            ->paginate(10)->appends(['kategori_berita' => $request->query->get('kategori_berita')]);

        $cms_setting = $this->cmsSetting->first();

        return render_template('public/news/detail', ['data_kategori_berita' => $data_kategori_berita, 'data_berita' => $data_berita, 'detail_berita' => $detail_berita, 'cms_setting' => $cms_setting, 'data_berita_hangat' => $data_berita_hangat]);
    }

    public function kategori(Request $request)
    {
        $berita = new Berita();
        $media = new Media();
        $kategori_berita = new KategoriBeritaAdmin();

        $kategori = $request->attributes->get("kategori");

        /* ------------------------------ Berita Hangat ----------------------------- */
        $data_berita_hangat = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'berita.id_berita')
            ->leftJoin('kategori_berita', 'kategori_berita.id_kategori_berita', '=', 'berita.id_kategori_berita')
            ->paginate(4)->appends(['kategori_berita' => $request->query->get('kategori_berita')]);
        /* -------------------------------------------------------------------------- */

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
            ->paginate(5)->appends(['kategori_berita' => $request->query->get('kategori_berita')]);
        /* -------------------------------------------------------------------------- */

        /* ----------------------------- Berita Terkini ----------------------------- */
        $datas = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'berita.id_berita')
            ->where('berita.id_kategori_berita', $kategori)
            ->get();
        $count_news_trending = intval(ceil(count($datas->items) / 3) < 1 ? 1 : ceil(count($datas->items) / 3));
        $item_berita_new = function ($index, $halaman, $datas, $label) {
            return isset($datas[($index + (3 * $halaman))]) ? $datas[($index + (3 * $halaman))][$label] : '';
        };
        $item_berita_trending = function ($index, $datas, $label) {
            return isset($datas[$index]) ? $datas[$index][$label] : '';
        };
        /* -------------------------------------------------------------------------- */

        /* ----------------------------------- CMS ---------------------------------- */
        $cmsKategoriModule = new CmsKategoriModule('produk-kami');
        extract($cmsKategoriModule->getCmsKategori(), EXTR_SKIP);

        $cms_setting = $this->cmsSetting->first();
        /* -------------------------------------------------------------------------- */

        return render_template('public/news/category', ['datas_kategori' => $datas_kategori, 'datas' => $datas, 'count_news_trending' => $count_news_trending, 'item_berita_new' => $item_berita_new, 'item_berita_trending' => $item_berita_trending, 'cms_kategori_style' => $cms_kategori_style, 'cms_fonts' => $cms_fonts, 'cmsKategoriStyle' => $cmsKategoriStyle, 'data_berita_hangat' => $data_berita_hangat, 'cms_setting' => $cms_setting, 'data_feed' => $data_feed]);
    }
}
