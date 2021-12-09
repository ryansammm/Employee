<?php

namespace App\Berita\Controller;

use App\KategoriBerita\Model\KategoriBerita;
use App\KategoriBeritaAdmin\Model\KategoriBeritaAdmin;
use App\Media\Model\Media;
use App\Berita\Model\Berita;
use App\CmsKategoriStyle\Model\CmsKategoriModule;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class BeritaController
{
    public $model;

    public function __construct()
    {
        $this->model = new Berita();
    }

    public function index(Request $request)
    {
        $berita = new Berita();
        $media = new Media();
        $kategori_berita = new KategoriBeritaAdmin();

        $datas_kategori = $kategori_berita
            ->get();

        foreach ($datas_kategori->items as $key => $value) {
            $datas_kategori->items[$key]['id_kategori'] = $value['id_kategori_berita'];
            $datas_kategori->items[$key]['nama_kategori'] = $value['kategori_berita'];
        }

        $data_berita = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'berita.id_berita')
            ->leftJoin('kategori_berita', 'kategori_berita.id_kategori_berita', '=', 'berita.id_kategori_berita')
            ->paginate(10)->appends(['kategori_berita' => $request->query->get('kategori_berita')]);


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

        $cmsKategoriModule = new CmsKategoriModule('produk-kami');
        extract($cmsKategoriModule->getCmsKategori(), EXTR_SKIP);

        return render_template('public/news/index', ['data_berita' => $data_berita, 'datas_kategori' => $datas_kategori, 'datas' => $datas, 'count_news_trending' => $count_news_trending, 'item_berita_new' => $item_berita_new, 'item_berita_trending' => $item_berita_trending, 'cms_kategori_style' => $cms_kategori_style, 'cms_fonts' => $cms_fonts, 'cmsKategoriStyle' => $cmsKategoriStyle]);
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

        // dd($detail_berita);

        return render_template('public/news/detail', ['data_kategori_berita' => $data_kategori_berita, 'data_berita' => $data_berita, 'detail_berita' => $detail_berita]);
    }

    public function kategori(Request $request)
    {
        $berita = new Berita();
        $media = new Media();
        $kategori_berita = new KategoriBeritaAdmin();

        $kategori = $request->attributes->get("kategori");

        $detail_kategori_berita = $kategori_berita
            ->where('id_kategori_berita', $kategori)
            ->first();

        $datas_kategori = $kategori_berita
            ->get();

        foreach ($datas_kategori->items as $key => $value) {
            $datas_kategori->items[$key]['id_kategori'] = $value['id_kategori_berita'];
            $datas_kategori->items[$key]['nama_kategori'] = $value['kategori_berita'];
        }

        $data_berita = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'berita.id_berita')
            ->leftJoin('kategori_berita', 'kategori_berita.id_kategori_berita', '=', 'berita.id_kategori_berita')
            ->where('berita.id_kategori_berita', $kategori)
            ->paginate(10)->appends(['kategori_berita' => $request->query->get('kategori_berita')]);

        $all_berita = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'berita.id_berita')
            ->leftJoin('kategori_berita', 'kategori_berita.id_kategori_berita', '=', 'berita.id_kategori_berita')
            ->paginate(10)->appends(['kategori_berita' => $request->query->get('kategori_berita')]);


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


        $cmsKategoriModule = new CmsKategoriModule('produk-kami');
        extract($cmsKategoriModule->getCmsKategori(), EXTR_SKIP);

        return render_template('public/news/category', ['data_berita' => $data_berita, 'datas_kategori' => $datas_kategori, 'datas' => $datas, 'count_news_trending' => $count_news_trending, 'item_berita_new' => $item_berita_new, 'item_berita_trending' => $item_berita_trending, 'cms_kategori_style' => $cms_kategori_style, 'cms_fonts' => $cms_fonts, 'cmsKategoriStyle' => $cmsKategoriStyle, 'all_berita' => $all_berita]);
    }
}
