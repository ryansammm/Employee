<?php

namespace App\Berita\Controller;

use App\KategoriBerita\Model\KategoriBerita;
use App\KategoriBeritaAdmin\Model\KategoriBeritaAdmin;
use App\Media\Model\Media;
use App\Berita\Model\Berita;
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

        $data_kategori_berita = $kategori_berita->get();
        $data_berita = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'berita.id_berita')
            ->leftJoin('kategori_berita', 'kategori_berita.id_kategori_berita', '=', 'berita.id_kategori_berita')
            ->paginate(10)->appends(['kategori_berita' => $request->query->get('kategori_berita')]);

        return render_template('public/news/index', ['data_berita' => $data_berita, 'data_kategori_berita' => $data_kategori_berita]);
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

        $data_kategori_berita = $kategori_berita->get();
        $data_berita = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'berita.id_berita')
            ->leftJoin('kategori_berita', 'kategori_berita.id_kategori_berita', '=', 'berita.id_kategori_berita')
            ->where('berita.id_kategori_berita', $kategori)
            ->paginate(10)->appends(['kategori_berita' => $request->query->get('kategori_berita')]);

        // dd($data_berita);

        return render_template('public/news/kategori', ['data_berita' => $data_berita, 'data_kategori_berita' => $data_kategori_berita, 'detail_kategori_berita' => $detail_kategori_berita]);
    }
}
