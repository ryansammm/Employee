<?php

namespace App\Galeri\Controller;

use App\Galeri\Model\Galeri;
use App\KategoriGaleriAdmin\Model\KategoriGaleriAdmin;
use App\KategoriProdukAdmin\Model\KategoriProdukAdmin;
use App\Media\Model\Media;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class GaleriController
{
    public $model;

    public function __construct()
    {
        $this->model = new Galeri();
    }

    public function index(Request $request)
    {
        $media = new Media();
        // $kategori_galeri = new KategoriGaleriAdmin();
        // $data_kategori_galeri = $kategori_galeri->get();
        $data_galeri = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'galeri.id_galeri')
            ->leftJoin('kategori_galeri', 'kategori_galeri.id_kategori_galeri', '=', 'galeri.id_kategori_galeri')
            ->paginate(8)->appends(['kategori_galeri' => $request->query->get('kategori_galeri')]);

        return render_template('public/gallery/index', ['data_galeri' => $data_galeri]);
    }

    public function create(Request $request)
    {

        return render_template('public/gallery/create', []);
    }

    public function store(Request $request)
    {

        return new RedirectResponse('/gallery');
    }

    public function edit(Request $request)
    {


        return render_template('public/gallery/edit', []);
    }

    public function update(Request $request)
    {

        return new RedirectResponse('/gallery');
    }

    public function detail(Request $request)
    {
        $media = new Media();
        // $kategori_galeri = new KategoriGaleriAdmin();
        // $data_kategori_galeri = $kategori_galeri->get();
        $data_galeri = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'galeri.id_galeri')
            ->leftJoin('kategori_galeri', 'kategori_galeri.id_kategori_galeri', '=', 'galeri.id_kategori_galeri')
            ->paginate(8);

        return render_template('public/gallery/detail', ['data_galeri' => $data_galeri]);
    }


    public function delete(Request $request)
    {

        return new RedirectResponse('/gallery');
    }
}
