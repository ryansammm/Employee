<?php

namespace App\Layanan\Controller;

use App\CmsKategoriStyle\Model\CmsKategoriModule;
use App\Media\Model\Media;
use App\Layanan\Model\Layanan;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class LayananController
{
    public $model;

    public function __construct()
    {
        $this->model = new Layanan();
    }

    public function index(Request $request)
    {
        $data_layanan = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'layanan.id_layanan')
            ->paginate(8)->appends(['kategori_layanan' => $request->query->get('kategori_layanan')]);

        $cmsKategoriModule = new CmsKategoriModule('layanan-kami');
        extract($cmsKategoriModule->getCmsKategori(), EXTR_SKIP);

        // dd(get_defined_vars());

        return render_template('public/service/index', ['data_layanan' => $data_layanan, 'cms_kategori_style' => $cms_kategori_style, 'cms_fonts' => $cms_fonts, 'cmsKategoriStyle' => $cmsKategoriStyle]);
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

        $media = new Media();
        // $kategori_layanan = new KategoriLayananAdmin();
        // $data_kategori_layanan = $kategori_layanan->get();
        $data_layanan = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'layanan.id_layanan')
            ->where('id_layanan', $id)->first();

        $datas_layanan = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'layanan.id_layanan')
            ->leftJoin('kategori_layanan', 'kategori_layanan.id_kategori_layanan', '=', 'layanan.id_kategori_layanan')
            ->paginate(2)->appends(['kategori_layanan' => $request->query->get('kategori_layanan')]);

        return render_template('public/service/detail', ['data_layanan' => $data_layanan, 'datas_layanan' => $datas_layanan]);
    }

    public function kategori(Request $request)
    {
        $media = new Media();
        // $kategori_layanan = new KategoriLayananAdmin();

        // $kategori = $request->attributes->get("kategori");

        // $detail_kategori_layanan = $kategori_layanan
        //     ->where('id_kategori_layanan', $kategori)
        //     ->first();

        // $data_kategori_layanan = $kategori_layanan->get();

        $data_layanan = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'layanan.id_layanan')
            // ->where('id_kategori_layanan', $kategori)
            ->paginate(8)->appends(['kategori_layanan' => $request->query->get('kategori_layanan')]);

        return render_template('public/service/kategori', ['data_layanan' => $data_layanan,]);
    }
}
