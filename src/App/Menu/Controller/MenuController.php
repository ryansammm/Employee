<?php

namespace App\Menu\Controller;

use App\CmsHalaman\Model\CmsHalaman;
use App\Menu\Model\Menu;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class MenuController
{
    public $menu;
    public $halaman;

    public function __construct()
    {
        $this->menu = new Menu();
        $this->halaman = new CmsHalaman();
    }

    public function index(Request $request)
    {
        $data_widget_menu = $this->menu->get();
        $datas = $this->menu->paginate(10);
        
        usort($datas->items, function ($a, $b) {
            return $a['urutan'] - $b['urutan'];
        });

        return render_template('admin/cms-menu/index', compact('datas', 'data_widget_menu'));
    }

    public function create(Request $request)
    {
        $parent_menu = $this->menu->get();

        return render_template('admin/cms-menu/create', compact('parent_menu'));
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
        $halaman = $this->halaman->get();

        return render_template('admin/cms-menu/edit', compact('detail', 'halaman'));
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

    public function sort(Request $request)
    {
        $ordering = (array) $request->request->get('urutan_menu');
        for ($i=0; $i < count($ordering); $i++) {
            $visibility = isset($request->request->all()[$ordering[$i]]) ? '2' : '1';
            $this->menu->where('id_cms_menu', $ordering[$i])->update(['urutan' => $i+1, 'hide' => $visibility]);
        }

        // $datas = $request->request->all();
        // unset($datas['urutan_menu']);
        // dd($datas);
        // foreach ($variable as $key => $value) {
        //     # code...
        // }
        
        return new RedirectResponse('/admin/menu');
    }
}
