<?php

namespace App\Panduan\Controller;

use App\Panduan\Model\Panduan;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class PanduanController
{
    public $model;

    public function __construct()
    {
        $this->model = new Panduan();
    }

    public function index(Request $request)
    {

        return render_template('public/panduan/index', []);
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
}
