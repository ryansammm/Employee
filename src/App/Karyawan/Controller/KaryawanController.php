<?php

namespace App\Karyawan\Controller;

use App\Bank\Model\Bank;
use App\Bidang\Model\Bidang;
use App\Jabatan\Model\Jabatan;
use App\Karyawan\Model\Karyawan;
use App\Karyawan\Model\KaryawanKontakAlt;
use App\KaryawanBidang\Model\KaryawanBidang;
use App\KaryawanDivisi\Model\KaryawanDivisi;
use App\KaryawanJabatan\Model\KaryawanJabatan;
use App\Kemampuan\Model\Kemampuan;
use App\Media\Model\Media;
use App\PendidikanFormal\Model\PendidikanFormal;
use App\PendidikanNonFormal\Model\PendidikanNonFormal;
use App\PengalamanOrganisasi\Model\PengalamanOrganisasi;
use App\PengalamanPekerjaan\Model\PengalamanPekerjaan;
use App\StatusKepegawaian\Model\StatusKepegawaian;
use Core\Classes\SessionData;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class KaryawanController
{
    public $statusKepegawaian;
    public $karyawan;
    public $jabatan;
    public $bank;
    public $karyawanKontakAlt;
    public $bidang;
    public $karyawanJabatan;
    public $karyawanDivisi;
    public $karyawanBidang;
    public $pendidikanFormal;
    public $pendidikanNonFormal;
    public $kemampuan;
    public $pengalamanOrganisasi;
    public $pengalamanPekerjaan;

    public function __construct()
    {
        $this->statusKepegawaian = new StatusKepegawaian();
        $this->karyawan = new Karyawan();
        $this->jabatan = new Jabatan();
        $this->bank = new Bank();
        $this->karyawanKontakAlt = new KaryawanKontakAlt();
        $this->bidang = new Bidang;
        $this->karyawanJabatan = new KaryawanJabatan();
        $this->karyawanDivisi = new KaryawanDivisi();
        $this->karyawanBidang = new KaryawanBidang();
        $this->pendidikanFormal = new PendidikanFormal();
        $this->pendidikanNonFormal = new PendidikanNonFormal();
        $this->kemampuan = new Kemampuan();
        $this->pengalamanOrganisasi = new PengalamanOrganisasi();
        $this->pengalamanPekerjaan = new PengalamanPekerjaan();
    }

    public function index(Request $request)
    {
        $datas = $this->karyawan
            ->leftJoin('media', 'media.id_relation', '=', 'karyawan.id_karyawan')
            ->where('hide', '2')
            ->paginate(10);

        return render_template('admin/karyawan/index', ['datas' => $datas]);
    }

    public function create(Request $request)
    {
        $errors = SessionData::get()->getFlashBag()->get('errors', []);
        $bank = $this->bank
            ->orderBy('nama_bank', 'ASC')
            ->get();
        $jabatan = $this->jabatan
            ->orderBy('nama', 'ASC')
            ->get();
        $bidang = $this->bidang
            ->orderBy('nama_bidang', 'ASC')->get();
        $status_kepegawaian = $this->statusKepegawaian->get();

        return render_template('admin/karyawan/create', ['errors' => $errors, 'bank' => $bank, 'jabatan' => $jabatan, 'bidang' => $bidang, 'status_kepegawaian' => $status_kepegawaian]);
    }

    public function store(Request $request)
    {

        $request->request->set('hide', '2');
        $datas = $request->request->all();
        // dd($datas);

        /* -------------------------------- Karyawan -------------------------------- */
        $create = $this->karyawan->insert($datas);
        /* -------------------------------------------------------------------------- */

        /* ---------------------------- Karyawan Jabatan ---------------------------- */
        $create_karyawan_jabatan = $this->karyawanJabatan->insert([
            [
                'id_karyawan' => $create,
                'id_jabatan' => $datas['id_jabatan'],
                'hide' => '2',
            ]
        ]);
        /* -------------------------------------------------------------------------- */

        /* ----------------------------- Karyawan Divisi ---------------------------- */
        $create_karyawan_divisi = $this->karyawanDivisi->insert([
            'id_relation' => $create,
            'nama_divisi' => $datas['nama_divisi'],
            'hide' => '2',
        ]);
        /* -------------------------------------------------------------------------- */

        /* ----------------------------- Karyawan Bidang ---------------------------- */
        $create_karyawan_bidang = $this->karyawanBidang->insert([
            'id_bidang' => $datas['id_bidang'],
            'id_relation' => $create,
            'hide' => '2',
        ]);
        /* -------------------------------------------------------------------------- */

        /* ---------------------------- Pendidikan Formal --------------------------- */
        foreach ($datas['pendidikan'] as $key => $value) {

            if ($datas['jenis_pendidikan'][$key] == 1 || $datas['jenis_pendidikan'][$key] == 2) {
                $jurusan = NULL;
            } else {
                $jurusan = $datas['jurusan_pendidikan'][$key];
            }

            $create_pendidikan_formal = $this->pendidikanFormal->insert(
                [
                    'id_relation' => $create,
                    'nama_sekolah' => $datas['pendidikan'][$key],
                    'tahun_lulus' => $datas['tahun_pendidikan'][$key],
                    'jurusan' => $jurusan,
                    'jenis_pendidikan' => $datas['jenis_pendidikan'][$key],
                ]
            );
        }
        /* -------------------------------------------------------------------------- */

        /* -------------------------- Pendidikan Non Formal ------------------------- */
        foreach ($datas['lembaga_pendidikan_nonformal'] as $key => $value) {
            $create_pendidikan_non_formal = $this->pendidikanNonFormal->insert(
                [
                    'id_relation' => $create,
                    'nama_lembaga' => $datas['lembaga_pendidikan_nonformal'][$key],
                    'periode_tahun' => $datas['tahun_nonformal'][$key],
                    'deskripsi' => $datas['deskripsi_nonformal'][$key],
                    'status' => '1'
                ]
            );
        }
        /* -------------------------------------------------------------------------- */

        /* -------------------------------- Kemampuan ------------------------------- */
        foreach ($datas['nama_kemampuan'] as $key => $value) {
            $create_kemampuan = $this->kemampuan->insert(
                [
                    'id_relation' => $create,
                    'nama_kemampuan' => $datas['nama_kemampuan'][$key],
                    'tingkat_kemampuan' => $datas['tingkat_kemampuan'][$key],
                    'hide' => '2'
                ]
            );
        }
        /* -------------------------------------------------------------------------- */

        /* ---------------------- Keluarga Yang Bisa Dihubungi ---------------------- */
        $request->request->set('id_karyawan', $create);
        $request->request->set('hide_kontak_alt', '2');
        $create_kontak_alt = $this->karyawanKontakAlt->insert($request->request->all());
        /* -------------------------------------------------------------------------- */

        /* -------------------------- Pengalaman Organisasi ------------------------- */
        foreach ($datas['lembaga_organisasi'] as $key => $value) {
            $create_pengalaman_organisasi = $this->pengalamanOrganisasi->insert(
                [
                    'id_relation' => $create,
                    'nama_organisasi' => $datas['lembaga_organisasi'][$key],
                    'jabatan_organisasi' => $datas['jabatan_organisasi'][$key],
                    'periode_aktif' => $datas['periode_aktif_organisasi'][$key],
                    'status' => '1'
                ]
            );
        }
        /* -------------------------------------------------------------------------- */

        /* -------------------------- Pengalaman Pekerjaan -------------------------- */
        foreach ($datas['nama_lembaga_pekerjaan'] as $key => $value) {
            $create_pengalaman_pekerjaan = $this->pengalamanPekerjaan->insert([
                'id_relation' => $create,
                'nama_lembaga' => $datas['nama_lembaga_pekerjaan'][$key],
                'nama_pekerjaan' => $datas['nama_pekerjaan'][$key],
                'lokasi_lembaga' => $datas['lokasi_pekerjaan'][$key],
                'periode_pelaksanaan' => $datas['periode_pelaksanaan_pekerjaan'][$key],
            ]);
        }
        /* -------------------------------------------------------------------------- */

        /* ------------------------------ Profile Foto ------------------------------ */
        $media = new Media();
        $media->path(env('APP_MEDIA_DIR'))->storeMedia($request->files->get('profile_foto'), [
            'id_relation' => $create,
            'jenis_dokumen' => 'foto-profil-karyawan',
        ]);
        /* -------------------------------------------------------------------------- */

        /* ---------------------------- Dokumen Pendukung --------------------------- */
        foreach (array_keys($request->files->all()) as $key2 => $value2) {
            if ($key2 != 'profile_foto') {
                $media->path(env('APP_MEDIA_DIR'))->updateMedia($request->files->get($value2), [
                    'id_relation' => $create,
                    'jenis_dokumen' => $value2,
                ], $this->karyawan, $create);
            }
        }
        /* -------------------------------------------------------------------------- */

        return new RedirectResponse('/admin/karyawan');
    }

    public function edit(Request $request)
    {
        $id = $request->attributes->get('id');

        $status_kepegawaian = $this->statusKepegawaian->get();
        $bank = $this->bank->orderBy('nama_bank', 'ASC')->get();
        $jabatan = $this->jabatan->orderBy('nama', 'ASC')->get();
        $bidang = $this->bidang->orderBy('nama_bidang', 'ASC')->get();

        /* -------------------------------- Karyawan -------------------------------- */
        $detail = $this->karyawan
            ->leftJoin('status_kepegawaian', 'status_kepegawaian.id_status_kepegawaian', '=', 'karyawan.id_status_kepegawaian')
            ->leftJoin('bank', 'bank.id_bank', '=', 'karyawan.id_bank')
            ->leftJoin('media', 'media.id_relation', '=', 'karyawan.id_karyawan')
            ->leftJoin('karyawan_jabatan', 'karyawan_jabatan.id_karyawan', '=', 'karyawan.id_karyawan')
            ->leftJoin('jabatan', 'jabatan.id_jabatan', '=', 'karyawan_jabatan.id_jabatan')
            ->leftJoin('karyawan_divisi', 'karyawan_divisi.id_relation', '=', 'karyawan.id_karyawan')
            ->leftJoin('bidang_entitas', 'bidang_entitas.id_relation', '=', 'karyawan.id_karyawan')
            ->leftJoin('bidang', 'bidang.id_bidang', '=', 'bidang_entitas.id_bidang')
            ->where('karyawan.id_karyawan', $id)
            ->first();
        /* -------------------------------------------------------------------------- */

        /* ---------------------------- Pendidikan Formal --------------------------- */

        $pendidikan_formal = $this->pendidikanFormal
            ->where('id_relation', $id)
            ->get();

        foreach ($pendidikan_formal->items as $key => $value) {
            if ($value['jenis_pendidikan'] == '1') {
                $pendidikan_formal->items[$key]['nama_pendidikan'] = 'Pendidikan Dasar';
            } else if ($value['jenis_pendidikan'] == '2') {
                $pendidikan_formal->items[$key]['nama_pendidikan'] = 'Pendidikan Menengah';
            } else if ($value['jenis_pendidikan'] == '3') {
                $pendidikan_formal->items[$key]['nama_pendidikan'] = 'Pendidikan Atas';
            } else if ($value['jenis_pendidikan'] == '4') {
                $pendidikan_formal->items[$key]['nama_pendidikan'] = 'Diploma';
            } else if ($value['jenis_pendidikan'] == '5') {
                $pendidikan_formal->items[$key]['nama_pendidikan'] = 'Sarjana';
            } else if ($value['jenis_pendidikan'] == '6') {
                $pendidikan_formal->items[$key]['nama_pendidikan'] = 'Magister';
            } else if ($value['jenis_pendidikan'] == '7') {
                $pendidikan_formal->items[$key]['nama_pendidikan'] = 'Doktoral';
            }
        }
        /* -------------------------------------------------------------------------- */

        /* -------------------------- Pendidikan Non Formal ------------------------- */
        $pendidikan_non_formal = $this->pendidikanNonFormal
            ->where('id_relation', $id)
            ->where('status', '1')
            ->get();
        /* -------------------------------------------------------------------------- */

        /* ----------------- Pendidikan Non Formal Setelah Bergabung ---------------- */
        $pendidikan_non_formal_bergabung = $this->pendidikanNonFormal
            ->where('id_relation', $id)
            ->where('status', '2')
            ->get();
        /* -------------------------------------------------------------------------- */

        /* -------------------------------- Kemampuan ------------------------------- */
        $kemampuan = $this->kemampuan
            ->where('id_relation', $id)
            ->get();
        /* -------------------------------------------------------------------------- */

        /* ---------------------- Keluarga Yang Bisa Dihubungi ---------------------- */
        $keluarga = $this->karyawanKontakAlt
            ->where('id_karyawan', $id)
            ->first();
        /* -------------------------------------------------------------------------- */

        /* -------------------------- Pengalaman Organisasi ------------------------- */
        $pengalaman_organisasi = $this->pengalamanOrganisasi
            ->where('id_relation', $id)
            ->where('status', '1')
            ->get();
        /* -------------------------------------------------------------------------- */

        /* ----------------- Pengalaman Organisasi Setelah Bergabung ---------------- */
        $pengalaman_organisasi_bergabung = $this->pengalamanOrganisasi
            ->where('id_relation', $id)
            ->where('status', '2')
            ->get();
        /* -------------------------------------------------------------------------- */

        /* -------------------------- Pengalaman Pekerjaan -------------------------- */
        $pengalaman_pekerjaan = $this->pengalamanPekerjaan
            ->where('id_relation', $id)
            ->get();
        /* -------------------------------------------------------------------------- */

        $detail_kontak_alt = $this->karyawanKontakAlt->where('id_karyawan', $id)->first();

        return render_template('admin/karyawan/edit', ['detail' => $detail, 'status_kepegawaian' => $status_kepegawaian, 'bank' => $bank, 'detail_kontak_alt' => $detail_kontak_alt, 'jabatan' => $jabatan, 'bidang' => $bidang, 'pendidikan_non_formal' => $pendidikan_non_formal, 'kemampuan' => $kemampuan, 'keluarga' => $keluarga, 'pengalaman_organisasi' => $pengalaman_organisasi, 'pengalaman_pekerjaan' => $pengalaman_pekerjaan, 'pendidikan_formal' => $pendidikan_formal, 'pendidikan_non_formal_bergabung' => $pendidikan_non_formal_bergabung, 'pengalaman_organisasi_bergabung' => $pengalaman_organisasi_bergabung]);
    }

    public function update(Request $request)
    {
        /* --------------------------------- Request -------------------------------- */
        $id = $request->attributes->get('id');
        $datas = $request->request->all();
        /* -------------------------------------------------------------------------- */

        /* -------------------------------- Karyawan -------------------------------- */
        $this->karyawan->where('id_karyawan', $id)->update($datas);
        /* -------------------------------------------------------------------------- */

        /* --------------------------------- Jabatan -------------------------------- */
        $this->karyawanJabatan->where('id_karyawan', $id)->update($datas);
        /* -------------------------------------------------------------------------- */

        /* --------------------------------- Divisi --------------------------------- */
        $this->karyawanDivisi->where('id_relation', $id)->update($datas);
        /* -------------------------------------------------------------------------- */

        /* --------------------------------- Bidang --------------------------------- */
        $this->karyawanBidang->where('id_relation', $id)->update($datas);
        /* -------------------------------------------------------------------------- */

        /* ---------------------------- Pendidikan Formal --------------------------- */
        $this->pendidikanFormal->where('id_relation', $id)->delete();
        foreach ($datas['pendidikan'] as $key => $value) {

            if ($datas['jenis_pendidikan'][$key] == 1 || $datas['jenis_pendidikan'][$key] == 2) {
                $jurusan = NULL;
            } else {
                $jurusan = $datas['jurusan_pendidikan'][$key];
            }

            $create_pendidikan_formal = $this->pendidikanFormal->insert(
                [
                    'id_relation' => $id,
                    'nama_sekolah' => $datas['pendidikan'][$key],
                    'tahun_lulus' => $datas['tahun_pendidikan'][$key],
                    'jurusan' => $jurusan,
                    'jenis_pendidikan' => $datas['jenis_pendidikan'][$key],
                ]
            );
        }
        /* -------------------------------------------------------------------------- */

        /* -------------------------- Pendidikan Non Formal ------------------------- */
        $this->pendidikanNonFormal->where('id_relation', $id)->where('status', '1')->delete();
        foreach ($datas['lembaga_pendidikan_nonformal'] as $key => $value) {
            $create_pendidikan_non_formal = $this->pendidikanNonFormal->insert(
                [
                    'id_relation' => $id,
                    'nama_lembaga' => $datas['lembaga_pendidikan_nonformal'][$key],
                    'periode_tahun' => $datas['tahun_nonformal'][$key],
                    'deskripsi' => $datas['deskripsi_nonformal'][$key],
                    'status' => '1'
                ]
            );
        }
        /* -------------------------------------------------------------------------- */

        /* ----------------- Pendidikan Non Formal Setelah Bergabung ---------------- */
        $this->pendidikanNonFormal->where('id_relation', $id)->where('status', '2')->delete();
        foreach ($datas['lembaga_pendidikan_nonformal_setelah'] as $key => $value) {
            $create_pendidikan_non_formal_setelah_bergabung = $this->pendidikanNonFormal->insert(
                [
                    'id_relation' => $id,
                    'nama_lembaga' => $datas['lembaga_pendidikan_nonformal_setelah'][$key],
                    'periode_tahun' => $datas['tahun_nonformal_setelah'][$key],
                    'deskripsi' => $datas['deskripsi_nonformal_setelah'][$key],
                    'status' => '2'
                ]
            );
        }
        /* -------------------------------------------------------------------------- */

        /* -------------------------------- Kemampuan ------------------------------- */
        $this->kemampuan->where('id_relation', $id)->delete();
        foreach ($datas['nama_kemampuan'] as $key => $value) {
            $create_kemampuan = $this->kemampuan->insert(
                [
                    'id_relation' => $id,
                    'nama_kemampuan' => $datas['nama_kemampuan'][$key],
                    'tingkat_kemampuan' => $datas['tingkat_kemampuan'][$key],
                    'hide' => '2'
                ]
            );
        }
        /* -------------------------------------------------------------------------- */

        /* ---------------------- Keluarga Yang Bisa Dihubungi ---------------------- */
        $this->karyawanKontakAlt->where('id_karyawan', $id)->update($datas);
        /* -------------------------------------------------------------------------- */

        /* -------------------------- Pengalaman Organisasi ------------------------- */
        $this->pengalamanOrganisasi->where('id_relation', $id)->where('status', '1')->delete();
        foreach ($datas['lembaga_organisasi'] as $key => $value) {
            $create_pengalaman_organisasi = $this->pengalamanOrganisasi->insert(
                [
                    'id_relation' => $id,
                    'nama_organisasi' => $datas['lembaga_organisasi'][$key],
                    'jabatan_organisasi' => $datas['jabatan_organisasi'][$key],
                    'periode_aktif' => $datas['periode_aktif_organisasi'][$key],
                    'status' => '1'
                ]
            );
        }
        /* -------------------------------------------------------------------------- */

        /* ----------------- Pengalaman Organisasi Setelah Bergabung ---------------- */
        $this->pengalamanOrganisasi->where('id_relation', $id)->where('status', '2')->delete();
        foreach ($datas['lembaga_organisasi_setelah'] as $key => $value) {
            $create_pengalaman_organisasi = $this->pengalamanOrganisasi->insert(
                [
                    'id_relation' => $id,
                    'nama_organisasi' => $datas['lembaga_organisasi_setelah'][$key],
                    'jabatan_organisasi' => $datas['jabatan_organisasi_setelah'][$key],
                    'periode_aktif' => $datas['periode_aktif_organisasi_setelah'][$key],
                    'status' => '2'
                ]
            );
        }
        /* -------------------------------------------------------------------------- */

        /* -------------------------- Pengalaman Pekerjaan -------------------------- */
        $this->pengalamanPekerjaan->where('id_relation', $id)->delete();
        foreach ($datas['nama_lembaga_pekerjaan'] as $key => $value) {
            $create_pengalaman_pekerjaan = $this->pengalamanPekerjaan->insert([
                'id_relation' => $id,
                'nama_lembaga' => $datas['nama_lembaga_pekerjaan'][$key],
                'nama_pekerjaan' => $datas['nama_pekerjaan'][$key],
                'lokasi_lembaga' => $datas['lokasi_pekerjaan'][$key],
                'periode_pelaksanaan' => $datas['periode_pelaksanaan_pekerjaan'][$key],
            ]);
        }
        /* -------------------------------------------------------------------------- */

        /* ------------------------------ Foto Profile ------------------------------ */
        $media = new Media();
        $media->path(env('APP_MEDIA_DIR'))->updateMedia($request->files->get('profile_foto'), [
            'id_relation' => $id,
            'jenis_dokumen' => '',
        ], $this->karyawan, $id);
        /* -------------------------------------------------------------------------- */

        /* ------------------------------- Update Time ------------------------------ */
        $this->karyawan->where('id_karyawan', $id)->update([
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        /* -------------------------------------------------------------------------- */

        return new RedirectResponse('/admin/karyawan');
    }

    public function delete(Request $request)
    {

        $id = $request->attributes->get('id');

        /* -------------------------------- Karyawan -------------------------------- */
        $this->karyawan->where('id_karyawan', $id)->delete();
        /* -------------------------------------------------------------------------- */

        /* --------------------------------- Jabatan -------------------------------- */
        $this->karyawanJabatan->where('id_karyawan', $id)->delete();
        /* -------------------------------------------------------------------------- */

        /* --------------------------------- Divisi --------------------------------- */
        $this->karyawanDivisi->where('id_relation', $id)->delete();
        /* -------------------------------------------------------------------------- */

        /* --------------------------------- Bidang --------------------------------- */
        $this->karyawanBidang->where('id_relation', $id)->delete();
        /* -------------------------------------------------------------------------- */

        /* ---------------------------- Pendidikan Formal --------------------------- */
        $this->pendidikanFormal->where('id_relation', $id)->delete();
        /* -------------------------------------------------------------------------- */

        /* -------------------------- Pendidikan Non Formal ------------------------- */
        $this->pendidikanNonFormal->where('id_relation', $id)->delete();
        /* -------------------------------------------------------------------------- */

        /* --------------------------------- Kemampuan -------------------------------- */
        $this->kemampuan->where('id_relation', $id)->delete();
        /* -------------------------------------------------------------------------- */

        /* ---------------------- Keluarga Yang Bisa DIhubungi ---------------------- */
        $this->karyawanKontakAlt->where('id_karyawan', $id)->delete();
        /* -------------------------------------------------------------------------- */

        /* -------------------------- Pengalaman Organisasi ------------------------- */
        $this->pengalamanOrganisasi->where('id_relation', $id)->delete();
        /* -------------------------------------------------------------------------- */

        /* -------------------------- Pengalaman Pekerjaan -------------------------- */
        $this->pengalamanPekerjaan->where('id_relation', $id)->delete();
        /* -------------------------------------------------------------------------- */

        /* ------------------------------ Foto Profile ------------------------------ */
        $media = new Media();
        $media_data = $this->karyawan->select('media.*')->leftJoin('media', 'media.id_relation', '=', 'karyawan.id_karyawan')->where('id_karyawan', $id)->first();
        $this->karyawan->where('id_karyawan', $id)->delete();
        $media->path(env('APP_MEDIA_DIR'))->deleteMedia($media_data);
        /* -------------------------------------------------------------------------- */

        return new RedirectResponse('/admin/karyawan');
    }

    public function hide(Request $request)
    {

        $id = $request->attributes->get('id');

        /* ------------------------------ Hide Karyawan ----------------------------- */
        $this->karyawan->where('id_karyawan', $id)->update([
            'hide' => '1'
        ]);
        /* -------------------------------------------------------------------------- */

        return new RedirectResponse('/admin/karyawan');
    }
}
