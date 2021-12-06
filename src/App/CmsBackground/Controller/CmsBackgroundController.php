<?php

namespace App\CmsBackground\Controller;

use App\CmsBackground\Model\CmsBackground;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class CmsBackgroundController
{
    public $model;

    public function __construct()
    {
        $this->model = new CmsBackground();
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
        $datas = $request->request->all();
        $color = $this->model->first();

        if ($color != false) {
            $this->model->where('id_cms_background', $color['id_cms_background'])->delete();
        }
        $create = $this->model->insert($request->request->all());;

        return new RedirectResponse('/admin');
    }

    public function delete(Request $request)
    {

        return new RedirectResponse('/home');
    }
}
