<?php

namespace App\Galeri\Controller;

use App\CmsKategoriStyle\Model\CmsKategoriModule;
use App\Galeri\Model\Galeri;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class GaleriController
{
    public $galeri;

    public function __construct()
    {
        $this->galeri = new Galeri();
    }

    public function index(Request $request)
    {
        $data_galeri = $this->galeri
            ->leftJoin('media', 'media.id_relation', '=', 'galeri.id_galeri')
            ->leftJoin('kategori_galeri', 'kategori_galeri.id_kategori_galeri', '=', 'galeri.id_kategori_galeri')
            ->paginate(8)->appends(['kategori_galeri' => $request->query->get('kategori_galeri')]);

        $cmsKategoriModule = new CmsKategoriModule('jejak-kami');
        extract($cmsKategoriModule->getCmsKategori(), EXTR_SKIP);

        return render_template('public/gallery/index', ['data_galeri' => $data_galeri, 'cms_kategori_style' => $cms_kategori_style, 'cms_fonts' => $cms_fonts, 'cmsKategoriStyle' => $cmsKategoriStyle]);
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
        $data_galeri = $this->galeri
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
