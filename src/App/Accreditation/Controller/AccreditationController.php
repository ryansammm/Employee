<?php

namespace App\Accreditation\Controller;

use App\Accreditation\Model\Accreditation;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class AccreditationController
{
    public $model;

    public function __construct()
    {
        $this->model = new Accreditation();
    }

    public function index(Request $request)
    {

        return render_template('home/index', []);
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

    public function delete(Request $request)
    {

        return new RedirectResponse('/home');
    }

    public function detail(Request $request)
    {
        $id = $request->attributes->get('id');

        $detail = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'akreditasi.id_akreditasi')
            ->where('akreditasi.id_akreditasi', $id)
            ->where('jenis_dokumen', 'logo-akreditasi')
            ->first();

        $detail_pdf = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'akreditasi.id_akreditasi')
            ->where('akreditasi.id_akreditasi', $id)
            ->where('jenis_dokumen', 'sertifikat-akreditasi')
            ->first();

        return render_template('public/accreditation/detail', ['detail' => $detail, 'detail_pdf' => $detail_pdf]);
    }
}
