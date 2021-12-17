<?php

namespace App\About\Controller;

use App\About\Model\About;
use App\Media\Model\Media;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class AboutController
{
    public $model;

    public function __construct()
    {
        $this->model = new About();
    }

    public function index(Request $request)
    {
        $media = new Media();
        $data_profil = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'profil.id_profil')->get();

        return render_template('public/about/index', ['data_profil' => $data_profil]);
    }

    public function create(Request $request)
    {

        return render_template('public/about/create', []);
    }

    public function store(Request $request)
    {

        return new RedirectResponse('/about');
    }

    public function edit(Request $request)
    {


        return render_template('public/about/edit', []);
    }

    public function update(Request $request)
    {

        return new RedirectResponse('/about');
    }

    public function delete(Request $request)
    {

        return new RedirectResponse('/about');
    }

    public function detailTeam(Request $request)
    {


        return render_template('public/about/detail-team', []);
    }
}
