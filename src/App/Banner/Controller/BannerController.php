<?php

namespace App\Banner\Controller;

use App\Banner\Model\Banner;
use App\Media\Model\Media;
use App\Menu\Model\Menu;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class BannerController
{
    public $banner;
    public $menu;

    public function __construct()
    {
        $this->banner = new Banner();
        $this->menu = new Menu();
    }

    public function index(Request $request)
    {
        $datas = $this->banner->paginate(10);

        return render_template('admin/banner/index', compact('datas'));
    }

    public function create(Request $request)
    {
        $menu = $this->menu->where('header', '1')->get();

        return render_template('admin/banner/create', compact('menu'));
    }

    public function store(Request $request)
    {
        $create = $this->banner->insert($request->request->all());

        $media = new Media();
        $media->storeMedia($request->files->get('foto_banner'), [
            'id_relation' => $create,
            'jenis_dokumen' => '',
        ]);

        return new RedirectResponse('/admin/banner');
    }

    public function edit(Request $request)
    {
        $id = $request->attributes->get('id');
        $detail = $this->banner->leftJoin('media', 'media.id_relation', '=', 'banner.id_banner')->where('id_banner', $id)->first();
        $menu = $this->menu->where('header', '1')->get();

        return render_template('admin/banner/edit', compact('detail', 'menu'));
    }

    public function update(Request $request)
    {
        $id = $request->attributes->get('id');
        $this->banner->where('id_banner', $id)->update($request->request->all());

        $media = new Media();
        $media->updateMedia($request->files->get('ikon_akreditasi'), [
            'id_relation' => $id,
            'jenis_dokumen' => '',
        ], $this->banner, $id);

        return new RedirectResponse('/admin/banner');
    }

    public function delete(Request $request)
    {
        $id = $request->attributes->get('id');
        $media = new Media();
        $media_data = $this->model->select('media.*')->where('id_banner', $id)->first();
        $this->model->where('id_banner', $id)->delete();
        $media->deleteMedia($media_data);

        return new RedirectResponse('/admin/banner');
    }
}
