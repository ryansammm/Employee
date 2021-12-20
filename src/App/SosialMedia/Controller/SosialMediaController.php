<?php

namespace App\SosialMedia\Controller;

use App\SosialMedia\Model\SosialMedia;
use App\Media\Model\Media;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class SosialMediaController
{
    public $sosial_media;

    public function __construct()
    {
        $this->sosial_media = new SosialMedia();
    }

    public function index(Request $request)
    {
        $datas = $this->sosial_media->paginate(10);

        return render_template('admin/sosial-media/index', compact('datas'));
    }

    public function create(Request $request)
    {

        return render_template('admin/sosial-media/create');
    }

    public function store(Request $request)
    {

        $create = $this->sosial_media->insert($request->request->all());

        return new RedirectResponse('/admin/sosial-media');
    }

    public function edit(Request $request)
    {

        $id = $request->attributes->get('id');
        $detail = $this->sosial_media
            ->where('id_sosial_media', $id)
            ->first();

        return render_template('admin/sosial-media/edit', compact('detail'));
    }

    public function update(Request $request)
    {

        $id = $request->attributes->get('id');

        return new RedirectResponse('/admin/sosial-media');
    }

    public function delete(Request $request)
    {

        $id = $request->attributes->get('id');

        return new RedirectResponse('/admin/sosial-media');
    }
}
