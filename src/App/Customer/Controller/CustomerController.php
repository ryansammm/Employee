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

        $datas_pelanggan = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'pelanggan.id_pelanggan')->get();

        return render_template('public/customer/detail', ['data_pelanggan' => $data_pelanggan, 'datas_pelanggan' => $datas_pelanggan]);
    }
}
