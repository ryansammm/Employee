<?php

namespace App\Asosiasi\Controller;

use App\Asosiasi\Model\Asosiasi;
use App\Media\Model\Media;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class AsosiasiController
{
    public $asosiasi;

    public function __construct()
    {
        $this->asosiasi = new Asosiasi();
    }

    public function index(Request $request)
    {
        $datas = $this->asosiasi->leftJoin('media', 'media.id_relation', '=', 'asosiasi.id_asosiasi')->orderBy('asosiasi.created_at', 'DESC')->paginate(10);

        return render_template('admin/asosiasi/index', compact('datas'));
    }

    public function create(Request $request)
    {
        return render_template('admin/asosiasi/create');
    }

    public function store(Request $request)
    {

        $create = $this->asosiasi->insert($request->request->all());

        $media = new Media();
        $media->path(env('APP_MEDIA_DIR'))->storeMedia($request->files->get('ikon_asosiasi'), [
            'id_relation' => $create,
            'jenis_dokumen' => '',
        ]);

        return new RedirectResponse('/admin/asosiasi');
    }

    public function edit(Request $request)
    {
        $id = $request->attributes->get('id');
        $detail = $this->asosiasi->leftJoin('media', 'media.id_relation', '=', 'asosiasi.id_asosiasi')->where('id_asosiasi', $id)->first();

        return render_template('admin/asosiasi/edit', compact('detail'));
    }

    public function update(Request $request)
    {

        $id = $request->attributes->get('id');
        $this->asosiasi->where('id_asosiasi', $id)->update($request->request->all());

        $media = new Media();
        $media
            ->path(env('APP_MEDIA_DIR'))
            ->updateMedia($request->files
                ->get('ikon_asosiasi'), [
                'id_relation' => $id,
                'jenis_dokumen' => '',
            ], $this->asosiasi, $id);

        return new RedirectResponse('/admin/asosiasi');
    }

    public function delete(Request $request)
    {
        $id = $request->attributes->get('id');
        $media = new Media();
        $media_data = $this->asosiasi->select('media.*')->leftJoin('media', 'media.id_relation', '=', 'asosiasi.id_asosiasi')->where('id_asosiasi', $id)->first();
        $this->asosiasi->where('id_asosiasi', $id)->delete();
        $media->path(env('APP_MEDIA_DIR'))->deleteMedia($media_data);

        return new RedirectResponse('/admin/asosiasi');
    }
}
