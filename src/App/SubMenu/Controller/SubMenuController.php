<?php

namespace App\SubMenu\Controller;

use App\Menu\Model\Menu;
use App\SubMenu\Model\SubMenu;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class SubMenuController
{
    public $sub_menu;
    public $menu;

    public function __construct()
    {
        $this->sub_menu = new SubMenu();
        $this->menu = new Menu();
    }

    public function index(Request $request)
    {
        $datas = $this->sub_menu
            ->select('cms_sub_menu.tipe as sub_menu_tipe', 'cms_sub_menu.urutan as sub_menu_urutan', 'cms_sub_menu.*', 'cms_menu.*')
            ->leftJoin('cms_menu', 'cms_menu.id_cms_menu', '=', 'cms_sub_menu.parent_id')->paginate(10);

        return render_template('admin/sub-menu/index', compact('datas'));
    }

    public function create(Request $request)
    {
        $menu = $this->menu->where('have_sub', '1')->get();

        return render_template('admin/sub-menu/create', compact('menu'));
    }

    public function store(Request $request)
    {
        $request->request->set('urutan', $this->sub_menu->lastOrder());
        $create = $this->sub_menu->insert($request->request->all());

        return new RedirectResponse('/admin/sub-menu');
    }

    public function edit(Request $request)
    {
        $menu = $this->menu->where('have_sub', '1')->get();
        $detail = $this->sub_menu->where('id_cms_sub_menu', $request->attributes->get('id'))->first();

        return render_template('admin/sub-menu/edit', compact('detail', 'menu'));
    }

    public function update(Request $request)
    {
        $update = $this->sub_menu->where('id_cms_sub_menu', $request->attributes->get('id'))->update($request->request->all());

        return new RedirectResponse('/admin/sub-menu');
    }

    public function delete(Request $request)
    {
        $delete = $this->sub_menu->where('id_cms_sub_menu', $request->attributes->get('id'))->delete();

        return new RedirectResponse('/admin/sub-menu');
    }
}
