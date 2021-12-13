<?php

namespace App\Akreditasi\Controller;

use App\Akreditasi\Model\Akreditasi;
use App\Media\Model\Media;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class AkreditasiController
{
    public $akreditasi;

    public function __construct()
    {
        $this->akreditasi = new Akreditasi();
    }

    public function index(Request $request)
    {
        $datas = $this->akreditasi->leftJoin('media', 'media.id_relation', '=', 'akreditasi.id_akreditasi')->paginate(10);

        return render_template('admin/akreditasi/index', compact('datas'));
    }

    public function create(Request $request)
    {
        return render_template('admin/akreditasi/create');
    }

    public function store(Request $request)
    {
        $create = $this->akreditasi->insert($request->request->all());

        $media = new Media();
        $media->storeMedia($request->files->get('ikon_akreditasi'), [
            'id_relation' => $create,
            'jenis_dokumen' => '',
        ]);

        return new RedirectResponse('/admin/akreditasi');
    }

    public function edit(Request $request)
    {
        $id = $request->attributes->get('id');
        $detail = $this->akreditasi->leftJoin('media', 'media.id_relation', '=', 'akreditasi.id_akreditasi')->where('id_akreditasi', $id)->first();

        return render_template('admin/akreditasi/edit', compact('detail'));
    }

    public function update(Request $request)
    {
        $id = $request->attributes->get('id');
        $this->akreditasi->where('id_akreditasi', $id)->update($request->request->all());

        $media = new Media();
        $media->updateMedia($request->files->get('ikon_akreditasi'), [
            'id_relation' => $id,
            'jenis_dokumen' => '',
        ], $this->model, $id);

        return new RedirectResponse('/admin/akreditasi');
    }

    public function delete(Request $request)
    {
        $id = $request->attributes->get('id');
        $media = new Media();
        $media_data = $this->model->select('media.*')->leftJoin('media', 'media.id_relation', '=', 'akreditasi.id_akreditasi')->where('id_akreditasi', $id)->first();
        $this->model->where('id_akreditasi', $id)->delete();
        $media->deleteMedia($media_data);

        return new RedirectResponse('/admin/akreditasi');
    }
}
