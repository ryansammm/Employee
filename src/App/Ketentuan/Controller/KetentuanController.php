<?php

namespace App\Ketentuan\Controller;

use App\Ketentuan\Model\Ketentuan;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class KetentuanController
{
    public $model;

    public function __construct()
    {
        $this->model = new Ketentuan();
    }

    public function index(Request $request)
    {

        return render_template('public/ketentuan/index', []);
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
