<?php

namespace App\Berita\Controller;

use App\Banner\Model\Banner;
use App\KategoriBeritaAdmin\Model\KategoriBeritaAdmin;
use App\Media\Model\Media;
use App\Berita\Model\Berita;
use App\CmsKategoriStyle\Model\CmsKategoriModule;
use App\CmsSetting\Model\CmsSetting;
use App\KomentarBerita\Model\KomentarBerita;
use App\LikeBerita\Model\LikeBerita;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class BeritaController
{
    public $model;
    public $cmsSetting;
    public $banner;
    public $likeBerita;
    public $komentarBerita;

    public function __construct()
    {
        $this->model = new Berita();
        $this->cmsSetting = new CmsSetting();
        $this->banner = new Banner();
        $this->likeBerita = new LikeBerita();
        $this->komentarBerita = new KomentarBerita();
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

        /* ------------------------------ Berita Hangat ----------------------------- */
        $data_berita_hangat = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'berita.id_berita')
            ->leftJoin('kategori_berita', 'kategori_berita.id_kategori_berita', '=', 'berita.id_kategori_berita')
            ->limit(4)->get();
        /* -------------------------------------------------------------------------- */

        /* ------------------------------ Semua Berita ------------------------------ */
        $data_berita = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'berita.id_berita')
            ->leftJoin('kategori_berita', 'kategori_berita.id_kategori_berita', '=', 'berita.id_kategori_berita')
            ->limit(5)->get();
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

        /* -------------------------------- Kategori -------------------------------- */
        $datas_kategori = $kategori_berita
            ->get();

        foreach ($datas_kategori->items as $key => $value) {
            $datas_kategori->items[$key]['id_kategori'] = $value['id_kategori_berita'];
            $datas_kategori->items[$key]['nama_kategori'] = $value['kategori_berita'];
        }
        /* -------------------------------------------------------------------------- */

        $data_berita = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'berita.id_berita')
            ->leftJoin('kategori_berita', 'kategori_berita.id_kategori_berita', '=', 'berita.id_kategori_berita')
            ->paginate(10)->appends(['kategori_berita' => $request->query->get('kategori_berita')]);

        $cms_setting = $this->cmsSetting->first();

        /* ----------------------------------- CMS ---------------------------------- */
        $cmsKategoriModule = new CmsKategoriModule('produk-kami');
        extract($cmsKategoriModule->getCmsKategori(), EXTR_SKIP);
        $cms_setting = $this->cmsSetting->first();
        /* -------------------------------------------------------------------------- */

        /* ----------------------------------- like & dislike ---------------------------------- */
        $like_berita = $this->likeBerita
            ->where('id_berita', $id)
            ->where('id_user', session('id_user'))
            ->where('jenislike_berita', '1')->first();
        $dislike_berita = $this->likeBerita
            ->where('id_berita', $id)
            ->where('id_user', session('id_user'))
            ->where('jenislike_berita', '2')->first();
        /* -------------------------------------------------------------------------- */

        /* ----------------------------------- komentar ---------------------------------- */
        $komentar_berita = $this->komentarBerita
            ->loadComment(function ($query) use ($id) {
                $query->leftJoin('users', 'users.id_user', '=', 'berita_comment.id_user')
                    ->leftJoin('media', 'media.id_relation', '=', 'users.id_user')
                    ->where('id_berita', $id)
                    ->where('approval', '1')
                    ->where('media.jenis_dokumen', 'profil_foto');
            }, 'parent_comment');
            // dd($komentar_berita);
        /* -------------------------------------------------------------------------- */

        return render_template('public/news/detail', ['datas_kategori' => $datas_kategori, 'data_berita' => $data_berita, 'detail_berita' => $detail_berita, 'cms_setting' => $cms_setting, 'data_berita_hangat' => $data_berita_hangat, 'cms_kategori_style' => $cms_kategori_style, 'cms_fonts' => $cms_fonts, 'cmsKategoriStyle' => $cmsKategoriStyle, 'like_berita' => $like_berita, 'dislike_berita' => $dislike_berita, 'komentar_berita' => $komentar_berita]);
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

        return render_template('public/news/category', ['datas_kategori' => $datas_kategori, 'datas' => $datas, 'count_news_trending' => $count_news_trending, 'item_berita_new' => $item_berita_new, 'item_berita_trending' => $item_berita_trending, 'cms_kategori_style' => $cms_kategori_style, 'cms_fonts' => $cms_fonts, 'cmsKategoriStyle' => $cmsKategoriStyle, 'data_berita_hangat' => $data_berita_hangat, 'cms_setting' => $cms_setting, 'data_feed' => $data_feed, 'data_berita' => $data_berita]);
    }
}
