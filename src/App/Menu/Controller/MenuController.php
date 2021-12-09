<?php

namespace App\Menu\Controller;

use App\Menu\Model\Menu;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class MenuController
{
    public $menu;

    public function __construct()
    {
        $this->menu = new Menu();
    }

    public function index(Request $request)
    {
        $datas = $this->menu->paginate(10);

        return render_template('admin/menu/index', compact('datas'));
    }

    public function create(Request $request)
    {
        $parent_menu = $this->menu->get();

        return render_template('admin/menu/create', compact('parent_menu'));
    }

    public function store(Request $request)
    {
        $request->request->set('urutan', $this->menu->lastOrder());
        $request->request->set('parent_id', $request->request->get('parent_id') == '' ? '0' : $request->request->get('parent_id'));
        $create = $this->menu->insert($request->request->all());

        return new RedirectResponse('/admin/menu');
    }

    public function edit(Request $request)
    {
        $detail = $this->menu->where('id_cms_menu', $request->attributes->get('id'))->first();

        return render_template('admin/menu/edit', compact('detail'));
    }

    public function update(Request $request)
    {
        $update = $this->menu->where('id_cms_menu', $request->attributes->get('id'))->update($request->request->all());

        return new RedirectResponse('/admin/menu');
    }

    public function delete(Request $request)
    {
        $delete = $this->menu->where('id_cms_menu', $request->attributes->get('id'))->delete();

        return new RedirectResponse('/admin/menu');
    }
}
