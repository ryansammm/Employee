<?php

namespace App\Galeri\Controller;

use App\Banner\Model\Banner;
use App\CmsKategoriStyle\Model\CmsKategoriModule;
use App\CmsSetting\Model\CmsSetting;
use App\Galeri\Model\Galeri;
use App\GroupGaleri\Model\GroupGaleriNew;
use App\KategoriGaleriAdmin\Model\KategoriGaleriAdmin;
use App\Media\Model\Media;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class GaleriController
{
    public $galeri;
    public $modelKategoriGaleri;

    public function __construct()
    {
        $this->galeri = new Galeri();
        $this->group_galeri = new GroupGaleriNew();
        $this->modelKategoriGaleri = new KategoriGaleriAdmin();
        $this->cmsSetting = new CmsSetting();
        $this->banner = new Banner();
    }

    public function index(Request $request)
    {
        $data_galeri = $this->galeri
            ->leftJoin('media', 'media.id_relation', '=', 'galeri.id_galeri')
            ->leftJoin('kategori_galeri', 'kategori_galeri.id_kategori_galeri', '=', 'galeri.id_kategori_galeri')
            ->paginate(8)->appends(['kategori_galeri' => $request->query->get('kategori_galeri')]);

        // dd($data_galeri);

        $datas_kategori = $this->modelKategoriGaleri
            ->get();

        foreach ($datas_kategori->items as $key => $value) {
            $datas_kategori->items[$key]['id_kategori'] = $value['id_kategori_galeri'];
            $datas_kategori->items[$key]['nama_kategori'] = $value['nama_kategori_galeri'];
        }

        $cmsKategoriModule = new CmsKategoriModule('jejak-kami');
        extract($cmsKategoriModule->getCmsKategori(), EXTR_SKIP);

        /* ----------------------------------- Banner ---------------------------------- */
        $banner_potrait = $this->banner
            ->leftJoin('media', 'media.id_relation', '=', 'banner.id_banner')
            ->where('orientasi_banner', '1')
            ->orderBy('urutan_banner', 'ASC')->get()->items;
        $banner_landscape = $this->banner
            ->leftJoin('media', 'media.id_relation', '=', 'banner.id_banner')
            ->where('orientasi_banner', '2')
            ->orderBy('urutan_banner', 'ASC')->get()->items;
        /* -------------------------------------------------------------------------- */

        return render_template('public/gallery/index', ['data_galeri' => $data_galeri, 'cms_kategori_style' => $cms_kategori_style, 'cms_fonts' => $cms_fonts, 'cmsKategoriStyle' => $cmsKategoriStyle, 'datas_kategori' => $datas_kategori, 'banner_potrait' => $banner_potrait, 'banner_landscape' => $banner_landscape]);
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

        $id = $request->attributes->get("id");

        $detail_galeri = $this->galeri
            ->leftJoin('media', 'media.id_relation', '=', 'galeri.id_galeri')
            ->leftJoin('kategori_galeri', 'kategori_galeri.id_kategori_galeri', '=', 'galeri.id_kategori_galeri')
            ->where('id_galeri', $id)->first();

        $data_galeri = $this->galeri
            ->leftJoin('media', 'media.id_relation', '=', 'galeri.id_galeri')
            ->leftJoin('kategori_galeri', 'kategori_galeri.id_kategori_galeri', '=', 'galeri.id_kategori_galeri')
            ->paginate(8);

        $data_group_galeri = $this->group_galeri
            ->leftJoin('media', 'media.id_relation', '=', 'group_galeri.id_group_galeri')
            ->where('id_galeri', $id)
            ->paginate(8);

        $datas_kategori = $this->modelKategoriGaleri
            ->get();

        foreach ($datas_kategori->items as $key => $value) {
            $datas_kategori->items[$key]['id_kategori'] = $value['id_kategori_galeri'];
            $datas_kategori->items[$key]['nama_kategori'] = $value['nama_kategori_galeri'];
        }

        $cmsKategoriModule = new CmsKategoriModule('jejak-kami');
        extract($cmsKategoriModule->getCmsKategori(), EXTR_SKIP);

        /* ----------------------------------- Banner ---------------------------------- */
        $banner_potrait = $this->banner
            ->leftJoin('media', 'media.id_relation', '=', 'banner.id_banner')
            ->where('orientasi_banner', '1')
            ->orderBy('urutan_banner', 'ASC')->get()->items;
        $banner_landscape = $this->banner
            ->leftJoin('media', 'media.id_relation', '=', 'banner.id_banner')
            ->where('orientasi_banner', '2')
            ->orderBy('urutan_banner', 'ASC')->get()->items;
        /* -------------------------------------------------------------------------- */

        return render_template('public/gallery/detail', ['data_galeri' => $data_galeri, 'cms_kategori_style' => $cms_kategori_style, 'cms_fonts' => $cms_fonts, 'cmsKategoriStyle' => $cmsKategoriStyle, 'datas_kategori' => $datas_kategori, 'detail_galeri' => $detail_galeri, 'data_group_galeri' => $data_group_galeri, 'banner_potrait' => $banner_potrait, 'banner_landscape' => $banner_landscape]);
    }

    public function delete(Request $request)
    {

        return new RedirectResponse('/gallery');
    }

    public function kategori(Request $request)
    {

        /* --------------------------------- Request -------------------------------- */
        $kategori = $request->attributes->get("kategori");
        /* -------------------------------------------------------------------------- */

        $datas_kategori = $this->modelKategoriGaleri
            ->get();

        foreach ($datas_kategori->items as $key => $value) {
            $datas_kategori->items[$key]['id_kategori'] = $value['id_kategori_galeri'];
            $datas_kategori->items[$key]['nama_kategori'] = $value['nama_kategori_galeri'];
        }

        $data_galeri = $this->galeri
            ->leftJoin('media', 'media.id_relation', '=', 'galeri.id_galeri')
            ->leftJoin('kategori_galeri', 'kategori_galeri.id_kategori_galeri', '=', 'galeri.id_kategori_galeri')
            ->where('galeri.id_kategori_galeri', $kategori)
            ->paginate(8)->appends(['kategori_galeri' => $request->query->get('kategori_galeri')]);


        $cmsKategoriModule = new CmsKategoriModule('jejak-kami');
        extract($cmsKategoriModule->getCmsKategori(), EXTR_SKIP);

        /* ----------------------------------- Banner ---------------------------------- */
        $banner_potrait = $this->banner
            ->leftJoin('media', 'media.id_relation', '=', 'banner.id_banner')
            ->where('orientasi_banner', '1')
            ->orderBy('urutan_banner', 'ASC')->get()->items;
        $banner_landscape = $this->banner
            ->leftJoin('media', 'media.id_relation', '=', 'banner.id_banner')
            ->where('orientasi_banner', '2')
            ->orderBy('urutan_banner', 'ASC')->get()->items;
        /* -------------------------------------------------------------------------- */


        return render_template('public/gallery/category', ['data_galeri' => $data_galeri, 'cms_kategori_style' => $cms_kategori_style, 'cms_fonts' => $cms_fonts, 'cmsKategoriStyle' => $cmsKategoriStyle, 'datas_kategori' => $datas_kategori, 'banner_potrait' => $banner_potrait, 'banner_landscape' => $banner_landscape]);
    }
}
