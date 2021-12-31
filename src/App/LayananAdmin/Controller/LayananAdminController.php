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
    public $layananTemp;
    public $media;
    public $modelKategorilayanan;


    public function __construct()
    {
        $this->model = new LayananAdmin();
        $this->modelKategoriLayanan = new KategoriLayananAdmin();
        $this->media = new Media();
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
        $request->request->set('deskripsi_layanan', htmlspecialchars($request->request->get('deskripsi_layanan')));
        $request->request->set('deskripsi_lengkap_layanan', htmlspecialchars($request->request->get('deskripsi_lengkap_layanan')));
        $request->request->set('spesifikasi_layanan', htmlspecialchars($request->request->get('spesifikasi_layanan')));
        $request->request->set('status_layanan', '2');
        $create = $this->model->insert($request->request->all());

        /* ------------------------------ Media Layanan ------------------------------ */
        $media = new Media();
        $media->storeMedia($request->files->get('layanan_foto_utama'), [
            'id_relation' => $create,
            'jenis_dokumen' => 'utama',
        ]);


        // Ini buat store data ke group layanan
        foreach ($request->files->get('layanan_foto') as $key => $value) {
            // store foto portofolio
            $media->storeMedia($request->files->get('layanan_foto')[$key], [
                'id_relation' => $create,
                'jenis_dokumen' => 'lainnya',
            ]);
        }
        /* -------------------------------------------------------------------------- */

        return new RedirectResponse('/admin/layanan');
    }

    public function edit(Request $request)
    {
        $id = $request->attributes->get("id");
        $layanan = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'layanan.id_layanan')
            ->where('media.jenis_dokumen', 'utama')
            ->where('id_layanan', $id)->first();
        $data_kategori_layanan = $this->modelKategoriLayanan->get();

        $media = new Media();
        $foto_layanan_lainnya = $media
            ->where('id_relation', $id)
            ->where('jenis_dokumen', 'lainnya')
            ->get();

        return render_template('admin/layanan/edit', ['id' => $id, 'layanan' => $layanan, 'data_kategori_layanan' => $data_kategori_layanan, 'foto_layanan_lainnya' => $foto_layanan_lainnya]);
    }

    public function update(Request $request)
    {
        $id = $request->attributes->get("id");

        $request->request->set('deskripsi_layanan', htmlspecialchars($request->request->get('deskripsi_layanan')));
        $request->request->set('deskripsi_lengkap_layanan', htmlspecialchars($request->request->get('deskripsi_lengkap_layanan')));
        $request->request->set('spesifikasi_layanan', htmlspecialchars($request->request->get('spesifikasi_layanan')));

        $status_layanan = $request->request->get('submit') == 'publish' ? '1' : '2';
        $request->request->set('status_layanan', $status_layanan);

        $this->model->where('id_layanan', $id)->update($request->request->all());

        $media = new Media();
        $media->updateMedia($request->files->get('layanan_foto_utama'), [
            'id_relation' => $id,
            'jenis_dokumen' => 'utama',
        ], $this->model, $id);

        $id_media = (array) $request->request->get('id_media');
        $get_detailExisting = $media->where('id_relation', $id)->where('jenis_dokumen', 'lainnya')->get();

        // pengecekan detail data yang statusnya di hapus
        foreach ($get_detailExisting->items as $key => $value) {
            foreach ($id_media as $key1 => $value1) {
                if ($value1 == $value['id_media']) {
                    $exsist = true;
                    break;
                } else {
                    $exsist = false;
                }
            }
            if (!$exsist) {
                // delete detail data
                $media_data = $media->where('id_media', $value['id_media'])->first();
                $media->deleteMedia($media_data);
            }
        }

        // pengecekan detail data yang statusnya di rubah
        foreach ($id_media as $key => $value) {
            // check apakah foto dirubah
            if ($request->files->get('layanan_foto_' . $value) != null) {
                // delete detail data
                $media_data = $media->where('id_media', $value)->first();
                $media->deleteMedia($media_data);

                // store detail media
                $media->storeMedia($request->files->get('layanan_foto_' . $value), [
                    'id_relation' => $id,
                    'jenis_dokumen' => 'lainnya',
                ]);
            }
        }

        // store detail data yang statusnya di tambah
        if ($request->files->get('layanan_foto') != null) {
            foreach ($request->files->get('layanan_foto') as $key => $value) {
                $media->storeMedia($request->files->get('layanan_foto')[$key], [
                    'id_relation' => $id,
                    'jenis_dokumen' => 'lainnya',
                ]);
            }
        }

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

    public function approval(Request $request)
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

        return render_template('admin/layanan/approval', ['data_layanan' => $data_layanan, 'kategori_layanan' => $kategori_layanan, 'id_kategori_layanan' => $id_kategori_layanan]);
    }

    public function approval_action(Request $request)
    {
        $id = $request->attributes->get('id');
        $status = $request->attributes->get('status');

        $this->model->where('id_layanan', $id)->update(['status_layanan' => $status]);

        return new RedirectResponse('/admin/layanan/approval');
    }

    public function detail(Request $request)
    {
        $id = $request->attributes->get("id");
        $layanan = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'layanan.id_layanan')
            ->where('media.jenis_dokumen', 'utama')
            ->where('id_layanan', $id)->first();
        $data_kategori_layanan = $this->modelKategoriLayanan->get();

        $media = new Media();
        $foto_layanan_lainnya = $media
            ->where('id_relation', $id)
            ->where('jenis_dokumen', 'lainnya')
            ->get();

        return render_template('admin/layanan/detail', [
            'id' => $id,
            'layanan' => $layanan, 'data_kategori_layanan' => $data_kategori_layanan, 'foto_layanan_lainnya' => $foto_layanan_lainnya
        ]);
    }

    public function redaction(Request $request)
    {
        $kategori_layanan_admin = new KategoriLayananAdmin();

        $kategori_layanan = $kategori_layanan_admin->get();
        $id_kategori_layanan = $request->query->get('id_kategori_layanan');
        $data_layanan = $this->model
            ->leftJoin('kategori_layanan', 'kategori_layanan.id_kategori_layanan', '=', 'layanan.id_kategori_layanan')
            ->where(function ($query) use ($request) {
                if ($request->query->get('kategori_layanan') != null) {
                    $query->where('layanan.id_kategori_layanan', $request->query->get('kategori_layanan'));
                }
            })
            ->paginate(10)->appends(['kategori_layanan' => $request->query->get('kategori_layanan')]);


        return render_template('admin/layanan-redaction/redaction', ['data_layanan' => $data_layanan, 'kategori_layanan' => $kategori_layanan, 'id_kategori_layanan' => $id_kategori_layanan]);
    }

    public function redaction_detail(Request $request)
    {
        $id = $request->attributes->get("id");
        $layanan = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'layanan.id_layanan')
            ->where('media.jenis_dokumen', 'utama')
            ->where('id_layanan', $id)->first();
        $data_kategori_layanan = $this->modelKategoriLayanan->get();

        $media = new Media();
        $foto_layanan_lainnya = $media
            ->where('id_relation', $id)
            ->where('jenis_dokumen', 'lainnya')
            ->get();

        return render_template('admin/layanan-redaction/detail', ['id' => $id, 'layanan' => $layanan, 'data_kategori_layanan' => $data_kategori_layanan, 'foto_layanan_lainnya' => $foto_layanan_lainnya]);
    }

    public function redaction_edit(Request $request)
    {
        $id = $request->attributes->get("id");
        $layanan = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'layanan.id_layanan')
            ->where('media.jenis_dokumen', 'utama')
            ->where('id_layanan', $id)->first();
        $data_kategori_layanan = $this->modelKategoriLayanan->get();

        $media = new Media();
        $foto_layanan_lainnya = $media
            ->where('id_relation', $id)
            ->where('jenis_dokumen', 'lainnya')
            ->get();

        return render_template('admin/layanan-redaction/edit', ['id' => $id, 'layanan' => $layanan, 'data_kategori_layanan' => $data_kategori_layanan, 'foto_layanan_lainnya' => $foto_layanan_lainnya]);
    }

    public function approval_detail(Request $request)
    {
        $id = $request->attributes->get("id");
        $layanan = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'layanan.id_layanan')
            ->where('media.jenis_dokumen', 'utama')
            ->where('id_layanan', $id)->first();
        $data_kategori_layanan = $this->modelKategoriLayanan->get();

        $media = new Media();
        $foto_layanan_lainnya = $media
            ->where('id_relation', $id)
            ->where('jenis_dokumen', 'lainnya')
            ->get();

        return render_template('admin/layanan-approval/detail', ['id' => $id, 'layanan' => $layanan, 'data_kategori_layanan' => $data_kategori_layanan, 'foto_layanan_lainnya' => $foto_layanan_lainnya]);
    }
}
