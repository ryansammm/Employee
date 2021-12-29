<?php

namespace App\Association\Controller;

use App\Association\Model\Association;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class AssociationController
{
    public $model;

    public function __construct()
    {
        $this->model = new Association();
    }

    public function index(Request $request)
    {

        return render_template('public/association/index', []);
    }

    public function create(Request $request)
    {



        return render_template('public/association/create', []);
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
            ->leftJoin('media', 'media.id_relation', '=', 'asosiasi.id_asosiasi')
            ->where('id_asosiasi', $id)
            ->where('jenis_dokumen', 'logo-asosiasi')
            ->first();

        $detail_pdf = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'asosiasi.id_asosiasi')
            ->where('id_asosiasi', $id)
            ->where('jenis_dokumen', 'sertifikat-asosiasi')
            ->first();

        // dd($detail_pdf);

        return render_template('public/association/detail', ['detail' => $detail, 'detail_pdf' => $detail_pdf]);
    }
}
