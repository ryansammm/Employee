<?php

namespace App\Partner\Controller;

use App\Media\Model\Media;
use App\Partner\Model\Partner;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class PartnerController
{
    public $model;

    public function __construct()
    {
        $this->model = new Partner();
    }

    public function index(Request $request)
    {

        $data_partner = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'partner.id_partner')->get();

        return render_template('public/partner/index', ['data_partner' => $data_partner]);
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

    public function detail(Request $request)
    {
        $id = $request->attributes->get("id");

        $data_partner = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'partner.id_partner')
            ->where('id_partner', $id)->first();
        // dd($data_partner);

        if ($data_partner['kategori_pekerjaan'] == '1') {
            $data_partner['nama_kategori_pekerjaan'] = 'Pengadaan Barang';
        } else if ($data_partner['kategori_pekerjaan'] == '2') {
            $data_partner['nama_kategori_pekerjaan'] = 'Pengadaan Jasa';
        } else if ($data_partner['kategori_pekerjaan'] == '3') {
            $data_partner['nama_kategori_pekerjaan'] = 'Pengadaan Barang & Jasa';
        }

        $datas_partner = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'partner.id_partner')
            ->paginate(5);

        $datas_partner_lainnya = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'partner.id_partner')
            ->orderBy("RAND()")
            ->paginate(12);

        return render_template('public/partner/detail', ['data_partner' => $data_partner, 'datas_partner' => $datas_partner, 'datas_partner_lainnya' => $datas_partner_lainnya]);
    }

    public function delete(Request $request)
    {

        return new RedirectResponse('/home');
    }
}
