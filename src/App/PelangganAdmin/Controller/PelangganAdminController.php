<?php

namespace App\PelangganAdmin\Controller;

use App\Media\Model\Media;
use App\PelangganAdmin\Model\PelangganAdmin;
use Core\Classes\SessionData;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class PelangganAdminController
{
    public $model;

    public function __construct()
    {
        $this->model = new PelangganAdmin();
    }

    public function index(Request $request)
    {
        $data_pelanggan = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'pelanggan.id_pelanggan')
            ->where(function ($query) use ($request) {
                if ($request->query->get('kategori_pelanggan') != null) {
                    $query->where('pelanggan.id_kategori_pelanggan', $request->query->get('kategori_pelanggan'));
                }
            })
            ->paginate(10)->appends(['kategori_pelanggan' => $request->query->get('kategori_pelanggan')]);


        return render_template('admin/pelanggan/index', ['data_pelanggan' => $data_pelanggan]);
    }

    public function create(Request $request)
    {

        return render_template('admin/pelanggan/create', []);
    }

    public function store(Request $request)
    {
        /* --------------------------------- Request -------------------------------- */
        $request->request->set('slug_pelanggan', str_slug($request->request->get('nama_pelanggan'), '-'));
        $request->request->set('id_user', SessionData::get('id_user'));

        /* ------------------------------ Create Layanan ----------------------------- */
        $create = $this->model->insert($request->request->all());

        /* ------------------------------ Media Layanan ------------------------------ */
        $media = new Media();
        $media->storeMedia($request->files->get('pelanggan_foto'), [
            'id_relation' => $create,
            'jenis_dokumen' => '',
        ]);
        return new RedirectResponse('/admin/pelanggan');
    }

    public function edit(Request $request)
    {
        $id = $request->attributes->get("id");
        $pelanggan = $this->model->leftJoin('media', 'media.id_relation', '=', 'pelanggan.id_pelanggan')->where('id_pelanggan', $id)->first();

        return render_template('admin/pelanggan/edit', ['pelanggan' => $pelanggan]);
    }

    public function update(Request $request)
    {
        $id = $request->attributes->get("id");
        $this->model->where('id_pelanggan', $id)->update($request->request->all());

        $media = new Media();
        $media->updateMedia($request->files->get('pelanggan_foto'), [
            'id_relation' => $id,
            'jenis_dokumen' => '',
        ], $this->model, $id);

        return new RedirectResponse('/admin/pelanggan');
    }

    public function delete(Request $request)
    {

        $id = $request->attributes->get("id");

        $media = new Media();
        $media_data = $this->model->select('media.*')->leftJoin('media', 'media.id_relation', '=', 'pelanggan.id_pelanggan')->where('id_pelanggan', $id)->first();
        $this->model->where('id_pelanggan', $id)->delete();
        $media->deleteMedia($media_data);


        return new RedirectResponse('/admin/pelanggan');
    }
}
