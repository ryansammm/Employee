<?php

namespace App\Customer\Controller;

use App\Customer\Model\Customer;
use App\KategoriProdukAdmin\Model\KategoriProdukAdmin;
use App\Media\Model\Media;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class CustomerController
{
    public $model;

    public function __construct()
    {
        $this->model = new Customer();
    }

    public function index(Request $request)
    {
        $media = new Media();

        $data_pelanggan = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'pelanggan.id_pelanggan')->get();

        return render_template('public/customer/index', ['data_pelanggan' => $data_pelanggan]);
    }

    public function create(Request $request)
    {

        return render_template('public/customer/create', []);
    }

    public function store(Request $request)
    {

        return new RedirectResponse('/customer');
    }

    public function edit(Request $request)
    {


        return render_template('public/customer/edit', []);
    }

    public function update(Request $request)
    {

        return new RedirectResponse('/customer');
    }

    public function delete(Request $request)
    {

        return new RedirectResponse('/customer');
    }

    public function detail(Request $request)
    {
        $id = $request->attributes->get("id");

        $data_pelanggan = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'pelanggan.id_pelanggan')
            ->where('id_pelanggan', $id)->first();

        if ($data_pelanggan['kategori_pekerjaan'] == '1') {
            $data_pelanggan['nama_kategori_pekerjaan'] = 'Pengadaan Barang';
        } else if ($data_pelanggan['kategori_pekerjaan'] == '2') {
            $data_pelanggan['nama_kategori_pekerjaan'] = 'Pengadaan Jasa';
        } else if ($data_pelanggan['kategori_pekerjaan'] == '3') {
            $data_pelanggan['nama_kategori_pekerjaan'] = 'Pengadaan Barang & Jasa';
        }

        $datas_pelanggan = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'pelanggan.id_pelanggan')
            ->paginate(10);

        $datas_pelanggan_lainnya = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'pelanggan.id_pelanggan')
            ->orderBy("RAND()")
            ->paginate(12);

        return render_template('public/customer/detail', ['data_pelanggan' => $data_pelanggan, 'datas_pelanggan' => $datas_pelanggan, 'datas_pelanggan_lainnya' => $datas_pelanggan_lainnya]);
    }
}
