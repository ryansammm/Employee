<?php

namespace App\CmsSetting\Controller;

use App\CmsSetting\Model\CmsSetting;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class CmsSettingController
{
    public $model;

    public function __construct()
    {
        $this->model = new CmsSetting();
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
        dd($datas);
        $cms_setting = $this->model->first();

        $this->model->where('id_cms_setting', $cms_setting['id_cms_setting'])->update($request->request->all());

        return new RedirectResponse('/admin');
    }

    public function delete(Request $request)
    {

        return new RedirectResponse('/home');
    }
}
