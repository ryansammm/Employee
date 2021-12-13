<?php

namespace App\CmsSetting\Controller;

use App\CmsSetting\Model\CmsSetting;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class CmsSettingController
{
    public $cmsSetting;

    public function __construct()
    {
        $this->cmsSetting = new CmsSetting();
    }

    public function index(Request $request)
    {
        $datas = $this->cmsSetting->first();

        return render_template('admin/cms-setting/index', compact('datas'));
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
        $cms_setting = $this->cmsSetting->first();

        if ($cms_setting == false) {
            $this->cmsSetting->insert($request->request->all());
        } else {
            $this->cmsSetting->where('id_cms_setting', $cms_setting['id_cms_setting'])->update($request->request->all());
        }

        return new RedirectResponse('/admin/setting-website');
    }

    public function delete(Request $request)
    {

        return new RedirectResponse('/home');
    }
}
