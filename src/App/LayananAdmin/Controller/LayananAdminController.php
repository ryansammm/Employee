<?php

namespace App\LayananAdmin\Controller;

use App\KategoriLayananAdmin\Model\KategoriLayananAdmin;
use App\LayananAdmin\Model\LayananAdmin;
use App\Media\Model\Media;
use Core\Classes\SessionData;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class LayananAdminController
{
    public $model;

    public function __construct()
    {
        $this->model = new LayananAdmin();
        $this->modelKategoriLayanan = new KategoriLayananAdmin();
    }

    public function index(Request $request)
    {
        $kategori_layanan = $this->modelKategoriLayanan->get();
        $id_kategori_layanan = $request->query->get('id_kategori_layanan');
        $data_layanan = $this->model
            ->leftJoin('kategori_layanan', 'kategori_layanan.id_kategori_layanan', '=', 'layanan.id_kategori_layanan')
            ->where(function ($query) use ($request) {
                if ($request->query->get('kategori_layanan') != null) {
                    $query->where('layanan.id_kategori_layanan', $request->query->get('kategori_layanan'));
                }
            })
            ->paginate(10)->appends(['kategori_layanan' => $request->query->get('kategori_layanan')]);


        return render_template('admin/layanan/index', ['data_layanan' => $data_layanan, 'kategori_layanan' => $kategori_layanan, 'id_kategori_layanan' => $id_kategori_layanan]);
    }

    public function create(Request $request)
    {
        $data_kategori_layanan = $this->modelKategoriLayanan->get();
        $errors = SessionData::get()->getFlashBag()->get('errors', []);

        return render_template('admin/layanan/create', ['data_kategori_layanan' => $data_kategori_layanan, 'errors' => $errors]);
    }

    public function store(Request $request)
    {
        /* --------------------------------- Request -------------------------------- */
        $request->request->set('slug_layanan', str_slug($request->request->get('nama_layanan'), '-'));
        $request->request->set('id_user', SessionData::get('id_user'));

        /* ------------------------------ Create Layanan ----------------------------- */
        $create = $this->model->insert($request->request->all());

        /* ------------------------------ Media Layanan ------------------------------ */
        $media = new Media();
        $media->storeMedia($request->files->get('layanan_foto'), [
            'id_relation' => $create,
            'jenis_dokumen' => '',
        ]);

        return new RedirectResponse('/admin/layanan');
    }

    public function edit(Request $request)
    {
        $id = $request->attributes->get("id");
        $layanan = $this->model->leftJoin('media', 'media.id_relation', '=', 'layanan.id_layanan')->where('id_layanan', $id)->first();
        $data_kategori_layanan = $this->modelKategoriLayanan->get();

        return render_template('admin/layanan/edit', ['layanan' => $layanan, 'data_kategori_layanan' => $data_kategori_layanan]);
    }

    public function update(Request $request)
    {
        $id = $request->attributes->get("id");
        $this->model->where('id_layanan', $id)->update($request->request->all());

        $media = new Media();
        $media->updateMedia($request->files->get('layanan_foto'), [
            'id_relation' => $id,
            'jenis_dokumen' => '',
        ], $this->model, $id);

        return new RedirectResponse('/admin/layanan');
    }

    public function delete(Request $request)
    {

        $id = $request->attributes->get("id");

        $media = new Media();
        $media_data = $this->model->select('media.*')->leftJoin('media', 'media.id_relation', '=', 'layanan.id_layanan')->where('id_layanan', $id)->first();
        $this->model->where('id_layanan', $id)->delete();
        $media->deleteMedia($media_data);

        return new RedirectResponse('/admin/layanan');
    }
}
