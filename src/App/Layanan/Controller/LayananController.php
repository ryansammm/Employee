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

        $datas_kategori_layanan = $this->modelKategoriLayanan
            ->get();


        return render_template('public/service/index', ['data_layanan' => $data_layanan, 'datas_kategori_layanan' => $datas_kategori_layanan]);
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

        $data_layanan = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'layanan.id_layanan')
            ->where('id_layanan', $id)->first();

        $datas_layanan = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'layanan.id_layanan')
            ->leftJoin('kategori_layanan', 'kategori_layanan.id_kategori_layanan', '=', 'layanan.id_kategori_layanan')
            ->paginate(3)->appends(['kategori_layanan' => $request->query->get('kategori_layanan')]);

        return render_template('public/service/detail', ['data_layanan' => $data_layanan, 'datas_layanan' => $datas_layanan]);
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

        $datas_kategori_layanan = $kategori_layanan->get();

        $data_layanan = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'layanan.id_layanan')
            ->leftJoin('kategori_layanan', 'kategori_layanan.id_kategori_layanan', '=', 'layanan.id_kategori_layanan')
            ->where('layanan.id_kategori_layanan', $kategori)
            ->paginate(8)->appends(['kategori_layanan' => $request->query->get('kategori_layanan')]);

        // dd($kategori, $data_layanan);

        return render_template('public/service/category', ['data_layanan' => $data_layanan, 'datas_kategori_layanan' => $datas_kategori_layanan]);
    }
}
