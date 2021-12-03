<?php

namespace App\Service\Controller;

use App\KategoriLayananAdmin\Model\KategoriLayananAdmin;
use App\Media\Model\Media;
use App\Service\Model\Service;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class ServiceController
{
    public $model;

    public function __construct()
    {
        $this->model = new Service();
    }

    public function index(Request $request)
    {
        $media = new Media();
        $kategori_layanan = new KategoriLayananAdmin();
        $data_kategori_layanan = $kategori_layanan->get();
        $data_layanan = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'layanan.id_layanan')
            ->paginate(8)->appends(['kategori_layanan' => $request->query->get('kategori_layanan')]);

        return render_template('public/service/index', ['data_kategori_layanan' => $data_kategori_layanan, 'data_layanan' => $data_layanan]);
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
        $kategori_layanan = new KategoriLayananAdmin();
        $data_kategori_layanan = $kategori_layanan->get();
        $data_layanan = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'layanan.id_layanan')
            ->where('id_layanan', $id)->first();

        $datas_layanan = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'layanan.id_layanan')
            ->leftJoin('kategori_layanan', 'kategori_layanan.id_kategori_layanan', '=', 'layanan.id_kategori_layanan')
            ->paginate(2)->appends(['kategori_layanan' => $request->query->get('kategori_layanan')]);

        return render_template('public/service/detail', ['data_kategori_layanan' => $data_kategori_layanan, 'data_layanan' => $data_layanan, 'datas_layanan' => $datas_layanan]);
    }

    public function kategori(Request $request)
    {
        $media = new Media();
        $kategori_layanan = new KategoriLayananAdmin();

        $kategori = $request->attributes->get("kategori");

        $detail_kategori_layanan = $kategori_layanan
            ->where('id_kategori_layanan', $kategori)
            ->first();

        $data_kategori_layanan = $kategori_layanan->get();

        $data_layanan = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'layanan.id_layanan')
            ->where('id_kategori_layanan', $kategori)
            ->paginate(8)->appends(['kategori_layanan' => $request->query->get('kategori_layanan')]);

        return render_template('public/service/kategori', ['data_kategori_layanan' => $data_kategori_layanan, 'data_layanan' => $data_layanan, 'detail_kategori_layanan' => $detail_kategori_layanan]);
    }
}
