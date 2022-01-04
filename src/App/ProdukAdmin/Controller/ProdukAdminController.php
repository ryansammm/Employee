<?php

namespace App\ProdukAdmin\Controller;

use App\ContentAdmin\SubModule\ContentAdmin\ContentAdmin;
use App\KategoriProdukAdmin\Model\KategoriProdukAdmin;
use App\Media\Model\Media;
use App\NotifTelegram\Model\NotifTelegram;
use App\PreviewContent\Model\ProdukTemp;
use App\ProdukAdmin\Model\ProdukAdmin;
use Core\Classes\SessionData;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ProdukAdminController
{
    public $model;
    public $produkTemp;
    public $media;

    public function __construct()
    {
        $this->model = new ProdukAdmin();
        $this->modelKategoriProduk = new KategoriProdukAdmin();
        $this->produkTemp = new ProdukTemp();
        $this->media = new Media();
    }

    public function index(Request $request)
    {
        $content_admin = new ContentAdmin($request, $this->model, 'index');
        $datas = $content_admin->get();

        return render_template('admin/produk/content-management/index', ['data_produk' => $datas['datas'], 'kategori_produk' => $datas['kategori'], 'id_kategori_produk' => $datas['id_kategori']]);
    }

    public function create(Request $request)
    {
        $data_kategori_produk = $this->modelKategoriProduk->get();
        $errors = SessionData::get()->getFlashBag()->get('errors', []);

        return render_template('admin/produk/content-management/create', ['data_kategori_produk' => $data_kategori_produk, 'errors' => $errors]);
    }

    public function store(Request $request)
    {

        $datas = $request->request->all();

        /* --------------------------------- Request -------------------------------- */
        $request->request->set('slug_produk', str_slug($request->request->get('nama_produk'), '-'));
        $request->request->set('id_user', SessionData::get('id_user'));
        $request->request->set('status_produk', '1');
        /* -------------------------------------------------------------------------- */

        /* ------------------------------ Create Produk ----------------------------- */
        $request->request->set('deskripsi_produk', htmlspecialchars($request->request->get('deskripsi_produk')));
        $request->request->set('spesifikasi_produk', htmlspecialchars($request->request->get('spesifikasi_produk')));
        $create = $this->model->insert($request->request->all());
        /* -------------------------------------------------------------------------- */

        /* ------------------------------ Media Produk ------------------------------ */
        if ($request->files->get('produk_foto_utama') != null) {
            $media = new Media();
            $media->path(env('APP_MEDIA_DIR'))->storeMedia($request->files->get('produk_foto_utama'), [
                'id_relation' => $create,
                'jenis_dokumen' => 'utama',
            ]);
        }

        // Ini buat store data ke group produk
        if ($request->files->get('produk_foto') != null) {
            foreach ($request->files->get('produk_foto') as $key => $value) {
                // store foto portofolio
                $media->path(env('APP_MEDIA_DIR'))->storeMedia($request->files->get('produk_foto')[$key], [
                    'id_relation' => $create,
                    'jenis_dokumen' => 'lainnya',
                ]);
            }
        }
        /* -------------------------------------------------------------------------- */

        /* ----------------------------- Notif Telegram ----------------------------- */
        $user_aktif = session('nama_user');
        $telegram = new NotifTelegram();
        $message = urlencode($user_aktif . " telah menambahkan data produk dengan nama <b>" . $datas['nama_produk'] . "</b>");
        $kirim =  $telegram->contentNotification($message);
        /* -------------------------------------------------------------------------- */

        return new RedirectResponse('/admin/produk');
    }

    public function edit(Request $request)
    {
        $content_admin = new ContentAdmin($request, $this->model, 'detail');
        $datas = $content_admin->get();

        return render_template('admin/produk/content-management/edit', ['id' => $datas['id'], 'produk' => $datas['data'], 'data_kategori_produk' => $datas['data_kategori'], 'foto_produk_lainnya' => $datas['foto_lainnya']]);
    }

    public function update(Request $request)
    {
        $id = $request->attributes->get("id");

        $request->request->set('deskripsi_produk', htmlspecialchars($request->request->get('deskripsi_produk')));
        $request->request->set('deskripsi_lengkap_produk', htmlspecialchars($request->request->get('deskripsi_lengkap_produk')));
        $request->request->set('spesifikasi_produk', htmlspecialchars($request->request->get('spesifikasi_produk')));
        $status = $request->request->get('submit') == '1' ? '1' : '3';
        $request->request->set('status_produk', $status);

        $this->model->where('id_produk', $id)->update($request->request->all());

        $media = new Media();
        $media->path(env('APP_MEDIA_DIR'))->updateMedia($request->files->get('produk_foto_utama'), [
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
                $media->path(env('APP_MEDIA_DIR'))->deleteMedia($media_data);
            }
        }

        // pengecekan detail data yang statusnya di rubah
        foreach ($id_media as $key => $value) {
            // check apakah foto dirubah
            if ($request->files->get('produk_foto_' . $value) != null) {
                // delete detail data
                $media_data = $media->where('id_media', $value)->first();
                $media->path(env('APP_MEDIA_DIR'))->deleteMedia($media_data);

                // store detail media
                $media->path(env('APP_MEDIA_DIR'))->storeMedia($request->files->get('produk_foto_' . $value), [
                    'id_relation' => $id,
                    'jenis_dokumen' => 'lainnya',
                ]);
            }
        }

        // store detail data yang statusnya di tambah
        if ($request->files->get('produk_foto') != null) {
            foreach ($request->files->get('produk_foto') as $key => $value) {
                $media->path(env('APP_MEDIA_DIR'))->storeMedia($request->files->get('produk_foto')[$key], [
                    'id_relation' => $id,
                    'jenis_dokumen' => 'lainnya',
                ]);
            }
        }


        /* ----------------------------- Notif Telegram ----------------------------- */
        $user_aktif = session('nama_user');
        $datas = $request->request->all();
        $detail = $this->model->where('id_produk', $id)->first();
        $telegram = new NotifTelegram();
        if ($status == '1') {
            $message = urlencode($user_aktif . " telah merubah data pada produk <b>" . $detail['nama_produk'] . "</b>");
        } elseif ($status == '3') {
            $message = urlencode($user_aktif . "  telah memeriksa redaksi dari produk <b>" . $detail['nama_produk'] . "</b>");
        }

        $kirim =  $telegram->contentNotification($message);
        /* -------------------------------------------------------------------------- */

        return new RedirectResponse('/admin/produk');
    }

    public function delete(Request $request)
    {
        $id = $request->attributes->get("id");

        $media = new Media();
        $media_data = $media->where('id_relation', $id)->get();

        /* ----------------------------- Notif Telegram ----------------------------- */
        $user_aktif = session('nama_user');
        $datas = $request->request->all();
        $detail = $this->model->where('id_produk', $id)->first();
        $telegram = new NotifTelegram();
        $message = urlencode($user_aktif . " telah menghapus data produk <b>" . $detail['nama_produk'] . "</b>");
        $kirim =  $telegram->contentNotification($message);
        /* -------------------------------------------------------------------------- */

        $this->model->where('id_produk', $id)->delete();

        foreach ($media_data->items as $key => $value) {
            $media->path(env('APP_MEDIA_DIR'))->deleteMedia($value);
        }

        return new RedirectResponse('/admin/produk');
    }

    public function temp(Request $request)
    {
        $id = $request->attributes->get("id");

        $data_galeri_produk = $this->media
            ->leftJoin('produk_temp', 'produk_temp.id_produk', '=', 'media.id_relation')
            ->where('id_produk', $request->attributes->get('id'))
            ->where('jenis_dokumen', 'lainnya')
            ->get();

        $foto_produk_lainnya_temp = [];
        foreach ($request->request->all() as $key => $value) {
            foreach ($data_galeri_produk->items as $key1 => $value1) {
                if (strpos($key, 'foto_produk_lainnya_temp') !== false) {
                    if ($value != '') {
                        array_push($foto_produk_lainnya_temp, [
                            'type' => 'base64',
                            'data' => $value,
                        ]);
                    } else {
                        array_push($foto_produk_lainnya_temp, [
                            'type' => 'file',
                            'data' => $value1['path_media'],
                        ]);
                    }
                    continue 2;
                }
            }
        }
        SessionData::set('produk_foto_lainnya_temp', $foto_produk_lainnya_temp);

        $app_public_url = env('APP_PUBLIC_URL') . '/preview-content/produk/' . $id . '/view';

        return new RedirectResponse($app_public_url);
    }

    public function approval(Request $request)
    {
        $content_admin = new ContentAdmin($request, $this->model, 'index');
        $datas = $content_admin->get();

        return render_template('admin/produk/content-approval/index', ['data_produk' => $datas['datas'], 'kategori_produk' => $datas['kategori'], 'id_kategori_produk' => $datas['id_kategori']]);
    }

    public function approval_action(Request $request)
    {
        $id = $request->attributes->get('id');
        $status = $request->attributes->get('status');

        $this->model->where('id_produk', $id)->update(['status_produk' => $status]);

        /* ----------------------------- Notif Telegram ----------------------------- */
        $user_aktif = session('nama_user');
        $datas = $request->request->all();
        $detail = $this->model->where('id_produk', $id)->first();
        $telegram = new NotifTelegram();
        if ($status == '5') {
            $message = urlencode($user_aktif . " telah menyetujui data produk <b>" . $detail['nama_produk'] . "</b>");
        } else {
            $message = urlencode($user_aktif . "  telah tidak menyetujui data produk <b>" . $detail['nama_produk'] . "</b>");
        }

        $kirim =  $telegram->contentNotification($message);
        /* -------------------------------------------------------------------------- */

        return new RedirectResponse('/admin/produk/approval');
    }

    public function redaction(Request $request)
    {
        $content_admin = new ContentAdmin($request, $this->model, 'index');
        $datas = $content_admin->get();

        return render_template('admin/produk/redaction-check/index', ['data_produk' => $datas['datas'], 'kategori_produk' => $datas['kategori'], 'id_kategori_produk' => $datas['id_kategori']]);
    }

    public function redaction_detail(Request $request)
    {
        $content_admin = new ContentAdmin($request, $this->model, 'detail');
        $datas = $content_admin->get();

        return render_template('admin/produk/redaction-check/detail', ['id' => $datas['id'], 'produk' => $datas['data'], 'data_kategori_produk' => $datas['data_kategori'], 'foto_produk_lainnya' => $datas['foto_lainnya']]);
    }

    public function redaction_edit(Request $request)
    {
        $content_admin = new ContentAdmin($request, $this->model, 'detail');
        $datas = $content_admin->get();

        return render_template('admin/produk/redaction-check/edit', ['id' => $datas['id'], 'produk' => $datas['data'], 'data_kategori_produk' => $datas['data_kategori'], 'foto_produk_lainnya' => $datas['foto_lainnya']]);
    }

    public function approval_detail(Request $request)
    {
        $content_admin = new ContentAdmin($request, $this->model, 'detail');
        $datas = $content_admin->get();

        return render_template('admin/produk/content-approval/detail', ['id' => $datas['id'], 'produk' => $datas['data'], 'data_kategori_produk' => $datas['data_kategori'], 'foto_produk_lainnya' => $datas['foto_lainnya']]);
    }
}
