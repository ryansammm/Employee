<?php

namespace App\Layanan\Controller;

use App\CmsKategoriStyle\Model\CmsKategoriModule;
use App\KategoriLayananAdmin\Model\KategoriLayananAdmin;
use App\Layanan\Model\Layanan;
use App\Media\Model\Media;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class LayananController
{
    public $model;
    public $modelKategoriLayanan;

    public function __construct()
    {
        $this->model = new Layanan();
        $this->modelKategoriLayanan = new KategoriLayananAdmin();
    }

    public function index(Request $request)
    {
        $data_layanan = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'layanan.id_layanan')
            ->leftJoin('kategori_layanan', 'kategori_layanan.id_kategori_layanan', '=', 'layanan.id_kategori_layanan')
            ->paginate(8)->appends(['kategori_layanan' => $request->query->get('kategori_layanan')]);

        $datas_kategori = $this->modelKategoriLayanan
            ->get();

        foreach ($datas_kategori->items as $key => $value) {
            $datas_kategori->items[$key]['id_kategori'] = $value['id_kategori_layanan'];
            $datas_kategori->items[$key]['nama_kategori'] = $value['nama_kategori_layanan'];
        }

        $cmsKategoriModule = new CmsKategoriModule('produk-kami');
        extract($cmsKategoriModule->getCmsKategori(), EXTR_SKIP);


        return render_template('public/service/index', ['data_layanan' => $data_layanan, 'datas_kategori' => $datas_kategori, 'cms_kategori_style' => $cms_kategori_style, 'cms_fonts' => $cms_fonts, 'cmsKategoriStyle' => $cmsKategoriStyle]);
    }

    public function create(Request $request)
    {

        return render_template('public/service/create', []);
    }

    public function store(Request $request)
    {

        return new RedirectResponse('/service');
    }

    public function edit(Request $request)
    {


        return render_template('public/service/edit', []);
    }

    public function update(Request $request)
    {

        return new RedirectResponse('/service');
    }

    public function delete(Request $request)
    {

        return new RedirectResponse('/service');
    }

    public function detail(Request $request)
    {
        $id = $request->attributes->get("id");

        $datas_kategori = $this->modelKategoriLayanan
            ->get();

        foreach ($datas_kategori->items as $key => $value) {
            $datas_kategori->items[$key]['id_kategori'] = $value['id_kategori_layanan'];
            $datas_kategori->items[$key]['nama_kategori'] = $value['nama_kategori_layanan'];
        }

        $data_layanan = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'layanan.id_layanan')
            ->leftJoin('kategori_layanan', 'kategori_layanan.id_kategori_layanan', '=', 'layanan.id_kategori_layanan')
            ->where('id_layanan', $id)->first();


        $datas_layanan = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'layanan.id_layanan')
            ->leftJoin('kategori_layanan', 'kategori_layanan.id_kategori_layanan', '=', 'layanan.id_kategori_layanan')
            ->where('layanan.id_kategori_layanan', $data_layanan['id_kategori_layanan'])
            ->paginate(3)->appends(['kategori_layanan' => $request->query->get('kategori_layanan')]);

        $all_layanan = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'layanan.id_layanan')
            ->leftJoin('kategori_layanan', 'kategori_layanan.id_kategori_layanan', '=', 'layanan.id_kategori_layanan')
            ->orderBy("RAND()")
            ->paginate(3)->appends(['kategori_layanan' => $request->query->get('kategori_layanan')]);

        $cmsKategoriModule = new CmsKategoriModule('produk-kami');
        extract($cmsKategoriModule->getCmsKategori(), EXTR_SKIP);

        return render_template('public/service/detail', ['data_layanan' => $data_layanan, 'datas_layanan' => $datas_layanan, 'datas_kategori' => $datas_kategori, 'cms_kategori_style' => $cms_kategori_style, 'cms_fonts' => $cms_fonts, 'cmsKategoriStyle' => $cmsKategoriStyle, 'all_layanan' => $all_layanan]);
    }

    public function kategori(Request $request)
    {
        /* ---------------------------------- Model --------------------------------- */
        $media = new Media();
        $kategori_layanan = new KategoriLayananAdmin();
        /* -------------------------------------------------------------------------- */

        /* --------------------------------- Request -------------------------------- */
        $kategori = $request->attributes->get("kategori");
        /* -------------------------------------------------------------------------- */

        $detail_kategori_layanan = $kategori_layanan
            ->where('id_kategori_layanan', $kategori)
            ->first();

        $datas_kategori = $this->modelKategoriLayanan
            ->get();

        foreach ($datas_kategori->items as $key => $value) {
            $datas_kategori->items[$key]['id_kategori'] = $value['id_kategori_layanan'];
            $datas_kategori->items[$key]['nama_kategori'] = $value['nama_kategori_layanan'];
        }

        $data_layanan = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'layanan.id_layanan')
            ->leftJoin('kategori_layanan', 'kategori_layanan.id_kategori_layanan', '=', 'layanan.id_kategori_layanan')
            ->where('layanan.id_kategori_layanan', $kategori)
            ->paginate(8)->appends(['kategori_layanan' => $request->query->get('kategori_layanan')]);

        $cmsKategoriModule = new CmsKategoriModule('produk-kami');
        extract($cmsKategoriModule->getCmsKategori(), EXTR_SKIP);

        return render_template('public/service/category', ['data_layanan' => $data_layanan, 'datas_kategori' => $datas_kategori, 'cms_kategori_style' => $cms_kategori_style, 'cms_fonts' => $cms_fonts, 'cmsKategoriStyle' => $cmsKategoriStyle]);
    }
}
