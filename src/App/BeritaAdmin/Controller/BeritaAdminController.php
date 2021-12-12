<?php

namespace App\BeritaAdmin\Controller;

use App\BeritaAdmin\Model\BeritaAdmin;
use App\BeritaAdmin\Validation\BeritaValidation;
use App\KategoriBeritaAdmin\Model\KategoriBeritaAdmin;
use App\Media\Model\Media;
use Core\Classes\SessionData;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class BeritaAdminController
{
    public $model;
    public $modelKategoriBerita;

    public function __construct()
    {
        $this->model = new BeritaAdmin();
        $this->modelKategoriBerita = new KategoriBeritaAdmin();
    }

    public function index(Request $request)
    {
        $kategori_berita = $this->modelKategoriBerita->get();
        $id_kategori_berita = $request->query->get('kategori_berita');

        $data_berita = $this->model
            ->leftJoin('kategori_berita', 'kategori_berita.id_kategori_berita', '=', 'berita.id_kategori_berita')
            ->where(function ($query) use ($request) {
                if ($request->query->get('kategori_berita') != null) {
                    $query->where('berita.id_kategori_berita', $request->query->get('kategori_berita'));
                }
            })
            ->paginate(10)->appends(['kategori_berita' => $request->query->get('kategori_berita')]);

        return render_template('admin/berita/index', ['data_berita' => $data_berita, 'kategori_berita' => $kategori_berita, 'id_kategori_berita' => $id_kategori_berita]);
    }

    public function create(Request $request)
    {
        $data_kategori_berita = $this->modelKategoriBerita->get();
        $errors = SessionData::get()->getFlashBag()->get('errors', []);
        
        return render_template('admin/berita/create', ['data_kategori_berita' => $data_kategori_berita, 'errors' => $errors]);
    }

    public function store(Request $request)
    {
        $berita_validation = new BeritaValidation($request);
        $validation = $berita_validation->validate();
        if (!$validation->passed) {
            return new RedirectResponse('/admin/berita/create');
        }

        $request->request->set('slug_berita', str_slug($request->request->get('judul_berita'), '-'));
        $request->request->set('id_user', SessionData::get('id_user'));
        $create = $this->model->insert($request->request->all());

        $media = new Media();
        $media->storeMedia($request->request->files->get('gambar_thumbnail_berita'), [
            'id_relation' => $create,
            'jenis_dokumen' => '',
        ]);

        return new RedirectResponse('/admin/berita');
    }

    public function edit(Request $request)
    {
        $id = $request->attributes->get("id");
        $berita = $this->model->leftJoin('media', 'media.id_relation', '=', 'berita.id_berita')->where('id_berita', $id)->first();
        $data_kategori_berita = $this->modelKategoriBerita->get();

        return render_template('admin/berita/edit', ['berita' => $berita, 'data_kategori_berita' => $data_kategori_berita]);
    }

    public function update(Request $request)
    {
        $id = $request->attributes->get("id");

        $berita_validation = new BeritaValidation($request);
        $validation = $berita_validation->validate();
        if (!$validation->passed) {
            return new RedirectResponse('/admin/berita/' . $id . '/edit');
        }

        $request->request->set('slug_berita', str_slug($request->request->get('judul_berita'), '-'));
        $this->model->where('id_berita', $id)->update($request->request->all());

        $media = new Media();
        $media->updateMedia($request->files->get('gambar_thumbnail_berita'), [
            'id_relation' => $id,
            'jenis_dokumen' => '',
        ], $this->model, $id);

        return new RedirectResponse('/admin/berita');
    }

    public function delete(Request $request)
    {
        $id = $request->attributes->get('id');

        $media = new Media();
        $media_data = $this->model->select('media.*')->leftJoin('media', 'media.id_relation', '=', 'berita.id_berita')->where('id_berita', $id)->first();
        $this->model->where('id_berita', $id)->delete();
        $media->deleteMedia($media_data);

        return new RedirectResponse('/admin/berita');
    }
}
