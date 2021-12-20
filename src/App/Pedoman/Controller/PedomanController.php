<?php

namespace App\Pedoman\Controller;

use App\Pedoman\Model\Pedoman;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class PedomanController
{
    public $model;

    public function __construct()
    {
        $this->model = new Pedoman();
    }

    public function index(Request $request)
    {

        return render_template('public/pedoman/index', []);
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
