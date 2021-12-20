<?php

namespace App\CmsComponent\Controller;

use App\CmsComponent\Model\CmsComponent;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class CmsComponentController
{
    public $cmsComponent;

    public function __construct()
    {
        $this->cmsComponent = new CmsComponent();
    }

    public function index(Request $request)
    {
        $datas = $this->cmsComponent->paginate(10);
        $cmsComponent = $this->cmsComponent;

        return render_template('admin/cms-component/index', compact('datas', 'cmsComponent'));
    }

    public function create(Request $request)
    {
        return render_template('admin/cms-component/create');
    }

    public function store(Request $request)
    {
        $content = htmlspecialchars($request->request->get('cms_component_content'));
        $request->request->set('cms_component_content', $content);
        
        $create = $this->cmsComponent->insert($request->request->all());

        return new RedirectResponse('/admin/component');
    }

    public function edit(Request $request)
    {
        $detail = $this->cmsComponent->where('id_cms_component', $request->attributes->get('id'))->first();

        return render_template('admin/cms-component/edit', compact('detail'));
    }

    public function update(Request $request)
    {
        $update = $this->cmsComponent->where('id_cms_component', $request->attributes->get('id'))->update($request->request->all());

        return new RedirectResponse('/admin/component');
    }

    public function delete(Request $request)
    {
        $this->cmsComponent->where('id_cms_component', $request->attributes->get('id'))->delete();

        return new RedirectResponse('/admin/component');
    }
}
