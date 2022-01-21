<?php

namespace App\Banner\Controller;

use App\Banner\Model\Banner;
use App\Media\Model\Media;
use App\Menu\Model\Menu;
use Symfony\Component\HttpFoundation\JsonResponse;
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
        $datas = $this->banner->leftJoin('cms_menu', 'cms_menu.id_cms_menu', '=', 'banner.lokasi_banner')->paginate(10);

        return render_template('admin/banner/index', compact('datas'));
    }

    public function create(Request $request)
    {
        $menu = $this->menu->where('jenis_menu', '1')->orWhere('jenis_menu', '3')->get();

        return render_template('admin/banner/create', compact('menu'));
    }

    public function store(Request $request)
    {
        $update_banner_order = $request->request->all();
        unset($update_banner_order['nama_banner']);
        unset($update_banner_order['orientasi_banner']);
        unset($update_banner_order['lokasi_banner']);
        unset($update_banner_order['ishide_banner']);
        unset($update_banner_order['urutan_banner']);

        foreach ($update_banner_order as $key => $data) {
            $this->banner->where('id_banner', $key)->update(['urutan_banner' => $data]);
        }

        $create = $this->banner->insert($request->request->all());

        $media = new Media();
        $media->path(env('APP_MEDIA_DIR'))->storeMedia($request->files->get('foto_banner'), [
            'id_relation' => $create,
            'jenis_dokumen' => '',
        ]);

        return new RedirectResponse('/admin/banner');
    }

    public function edit(Request $request)
    {
        $id = $request->attributes->get('id');
        $detail = $this->banner->leftJoin('media', 'media.id_relation', '=', 'banner.id_banner')->where('id_banner', $id)->first();
        $menu = $this->menu->where('jenis_menu', '1')->orWhere('jenis_menu', '3')->get();
        $banner = $this->banner
            ->leftJoin('media', 'media.id_relation', '=', 'banner.id_banner')
            ->where('id_banner', '!=', $detail['id_banner'])
            ->where('orientasi_banner', $detail['orientasi_banner'])
            ->where('lokasi_banner', $detail['lokasi_banner'])
            ->where('ishide_banner', '2')
            ->orderBy('urutan_banner', 'ASC')->get();

        return render_template('admin/banner/edit', compact('detail', 'menu', 'banner'));
    }

    public function update(Request $request)
    {
        $id = $request->attributes->get('id');
        $update_banner_order = $request->request->all();
        unset($update_banner_order['nama_banner']);
        unset($update_banner_order['orientasi_banner']);
        unset($update_banner_order['lokasi_banner']);
        unset($update_banner_order['ishide_banner']);
        unset($update_banner_order['urutan_banner']);

        foreach ($update_banner_order as $key => $data) {
            $this->banner->where('id_banner', $key)->update(['urutan_banner' => $data]);
        }

        $this->banner->where('id_banner', $id)->update($request->request->all());

        $media = new Media();
        $media->path(env('APP_MEDIA_DIR'))->updateMedia($request->files->get('foto_banner'), [
            'id_relation' => $id,
            'jenis_dokumen' => '',
        ], $this->banner, $id);

        return new RedirectResponse('/admin/banner');
    }

    public function delete(Request $request)
    {
        $id = $request->attributes->get('id');
        $media = new Media();
        $media_data = $this->banner->select('media.*')->where('id_banner', $id)->first();
        $this->banner->where('id_banner', $id)->delete();
        $media->path(env('APP_MEDIA_DIR'))->deleteMedia($media_data);

        return new RedirectResponse('/admin/banner');
    }

    public function get(Request $request)
    {
        $datas = $this->banner
            ->leftJoin('media', 'media.id_relation', '=', 'banner.id_banner')
            ->where('id_banner', '!=', $request->query->get('id_banner'))
            ->where('orientasi_banner', $request->query->get('orientasi'))
            ->where('lokasi_banner', $request->query->get('lokasi'))
            ->where('ishide_banner', '2')
            ->orderBy('urutan_banner', 'ASC')->get();

        return new JsonResponse($datas);
    }
}
