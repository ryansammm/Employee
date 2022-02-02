<?php

namespace App\Karyawan\Controller;

use App\Bank\Model\Bank;
use App\Bidang\Model\Bidang;
use App\Divisi\Model\Divisi;
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
    public $divisi;
    public $bidang;
    public $bank;
    public $karyawanKontakAlt;
    public $karyawanJabatan;
    public $karyawanDivisi;
    public $karyawanBidang;
    public $pendidikanFormal;
    public $pendidikanNonFormal;
    public $kemampuan;
    public $pengalamanOrganisasi;
    public $pengalamanPekerjaan;
    public $media;

    public function __construct()
    {
        $this->statusKepegawaian = new StatusKepegawaian();
        $this->karyawan = new Karyawan();
        $this->jabatan = new Jabatan();
        $this->divisi = new Divisi();
        $this->bidang = new Bidang();
        $this->bank = new Bank();
        $this->karyawanKontakAlt = new KaryawanKontakAlt();
        $this->karyawanJabatan = new KaryawanJabatan();
        $this->karyawanDivisi = new KaryawanDivisi();
        $this->karyawanBidang = new KaryawanBidang();
        $this->pendidikanFormal = new PendidikanFormal();
        $this->pendidikanNonFormal = new PendidikanNonFormal();
        $this->kemampuan = new Kemampuan();
        $this->pengalamanOrganisasi = new PengalamanOrganisasi();
        $this->pengalamanPekerjaan = new PengalamanPekerjaan();
        $this->media = new Media();
    }

    public function index(Request $request)
    {
        $datas = $this->karyawan
            ->leftJoin('status_kepegawaian', 'status_kepegawaian.id_status_kepegawaian', '=', 'karyawan.id_status_kepegawaian')
            ->leftJoin('bank', 'bank.id_bank', '=', 'karyawan.id_bank')
            ->leftJoin('karyawan_jabatan', 'karyawan_jabatan.id_karyawan', '=', 'karyawan.id_karyawan')
            ->leftJoin('jabatan', 'jabatan.id_jabatan', '=', 'karyawan_jabatan.id_jabatan')
            ->leftJoin('karyawan_divisi', 'karyawan_divisi.id_karyawan', '=', 'karyawan.id_karyawan')
            ->leftJoin('divisi', 'divisi.id_divisi', '=', 'karyawan_divisi.id_divisi')
            ->leftJoin('karyawan_bidang', 'karyawan_bidang.id_karyawan', '=', 'karyawan.id_karyawan')
            ->leftJoin('bidang', 'bidang.id_bidang', '=', 'karyawan_bidang.id_bidang')
            ->where('nama_status_kepegawaian', '!=', 'Resign')
            ->where('karyawan.hide', '2')
            ->where('karyawan.status_data', '1')
            ->orderBy('karyawan.updated_at', 'desc')
            ->paginate(10);

        $status_kepegawaian = $this->statusKepegawaian
            ->orderBy('nama_status_kepegawaian', 'ASC')
            ->get();

        return render_template('admin/karyawan/index', ['datas' => $datas, 'status_kepegawaian' => $status_kepegawaian]);
    }

    public function create(Request $request)
    {
        $errors = SessionData::get()->getFlashBag()->get('errors', []);

        $bank = $this->bank
            ->orderBy('nama_bank', 'ASC')
            ->get();

        $jabatan = $this->jabatan
            ->orderBy('nama_jabatan', 'ASC')
            ->get();

        $divisi = $this->divisi
            ->orderBy('nama_divisi', 'ASC')
            ->get();

        $bidang = $this->bidang
            ->orderBy('nama_bidang', 'ASC')
            ->get();

        $status_kepegawaian = $this->statusKepegawaian->orderBy('nama_status_kepegawaian', 'ASC')->get();

        return render_template('admin/karyawan/create', ['errors' => $errors, 'bank' => $bank, 'jabatan' => $jabatan, 'divisi' => $divisi, 'bidang' => $bidang, 'status_kepegawaian' => $status_kepegawaian]);
    }

    public function store(Request $request)
    {

        $request->request->set('hide', '2');
        $datas = $request->request->all();

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
            [
                'id_karyawan' => $create,
                'id_divisi' => $datas['id_divisi'],
                'hide' => '2',
            ]
        ]);
        /* -------------------------------------------------------------------------- */

        /* ----------------------------- Karyawan Bidang ---------------------------- */
        $create_karyawan_bidang = $this->karyawanBidang->insert([
            [
                'id_karyawan' => $create,
                'id_bidang' => $datas['id_bidang'],
                'hide' => '2',
            ]
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
        $media->storeMedia($request->files->get('profile_foto'), [
            'id_relation' => $create,
            'jenis_dokumen' => 'foto_profile',
        ]);
        /* -------------------------------------------------------------------------- */


        /* ---------------------------- Dokumen Pendukung --------------------------- */
        foreach (array_keys($request->files->all()) as $key2 => $value2) {

            if ($value2 == 'file_sertifikat') {
                foreach ($request->files->get('file_sertifikat') as $key => $value) {
                    $media->updateMedia($value, [
                        'id_relation' => $create,
                        'jenis_dokumen' => 'file_sertifikat',
                    ], $this->karyawan, $create);
                }
            }

            if ($value2 != 'profile_foto') {
                if ($value2 != 'file_sertifikat') {
                    // dd($request->files->get($value2));
                    $media->updateMedia($request->files->get($value2), [
                        'id_relation' => $create,
                        'jenis_dokumen' => $value2,
                    ], $this->karyawan, $create);
                }
            }
        }
        /* -------------------------------------------------------------------------- */

        return new RedirectResponse('/admin/karyawan');
    }

    public function edit(Request $request)
    {
        $id = $request->attributes->get('id');

        $date = date('Y-m-d');

        $status_kepegawaian = $this->statusKepegawaian->orderBy('nama_status_kepegawaian', 'ASC')->get();
        $bank = $this->bank->orderBy('nama_bank', 'ASC')->get();
        $jabatan = $this->jabatan->orderBy('nama_jabatan', 'ASC')->get();
        $divisi = $this->divisi->orderBy('nama_divisi', 'ASC')->get();
        $bidang = $this->bidang->orderBy('nama_bidang', 'ASC')->get();

        /* -------------------------------- Karyawan -------------------------------- */
        $detail = $this->karyawan
            ->leftJoin('status_kepegawaian', 'status_kepegawaian.id_status_kepegawaian', '=', 'karyawan.id_status_kepegawaian')
            ->leftJoin('bank', 'bank.id_bank', '=', 'karyawan.id_bank')
            ->leftJoin('media', 'media.id_relation', '=', 'karyawan.id_karyawan')
            ->leftJoin('karyawan_jabatan', 'karyawan_jabatan.id_karyawan', '=', 'karyawan.id_karyawan')
            ->leftJoin('jabatan', 'jabatan.id_jabatan', '=', 'karyawan_jabatan.id_jabatan')
            ->leftJoin('karyawan_divisi', 'karyawan_divisi.id_karyawan', '=', 'karyawan.id_karyawan')
            ->leftJoin('divisi', 'divisi.id_divisi', '=', 'karyawan_divisi.id_divisi')
            ->leftJoin('karyawan_bidang', 'karyawan_bidang.id_karyawan', '=', 'karyawan.id_karyawan')
            ->leftJoin('bidang', 'bidang.id_bidang', '=', 'karyawan_bidang.id_bidang')
            ->where('karyawan.id_karyawan', $id)
            ->where('media.jenis_dokumen', 'foto_profile')
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

        $dokumen_pendukung = [
            ['label' => 'KTP', 'name' => 'file_ktp'],
            ['label' => 'NPWP', 'name' => 'file_npwp'],
            ['label' => 'Ijazah Terakhir', 'name' => 'file_ijazah'],
            ['label' => 'Transkrip Nilai Terakhir', 'name' => 'file_transkrip_nilai'],
            ['label' => 'Sertifikat', 'name' => 'file_sertifikat[]'],
            ['label' => 'Salinan Buku Bank', 'name' => 'file_salinan_bank'],
            ['label' => 'SIM A', 'name' => 'file_sim_a'],
            ['label' => 'SIM B1', 'name' => 'file_sim_b1'],
            ['label' => 'SIM B2', 'name' => 'file_sim_b2'],
            ['label' => 'SIM C', 'name' => 'file_sim_c'],
            ['label' => 'SIM D', 'name' => 'file_sim_d'],
            ['label' => 'Kartu Keluarga', 'name' => 'file_kk'],
            ['label' => 'Passport', 'name' => 'file_passport'],
            ['label' => 'Salinan Kartu Anggota Asuransi', 'name' => 'file_asuransi'],
            ['label' => 'Pakelaring / Surat Keterangan Pengalaman Kerja', 'name' => 'file_pakelaring'],
            ['label' => 'Kartu Kuning', 'name' => 'file_kartu_kuning'],
        ];

        $selectMedia = function ($id, $jenis_dokumen) {
            $media = new Media();

            return $media_karyawan = $media
                ->where('id_relation', $id)
                ->where('jenis_dokumen', $jenis_dokumen)
                ->first();
        };

        $media_sertifikat = $this->media
            ->where('jenis_dokumen', 'file_sertifikat')
            ->where('id_relation', $id)
            ->get();

        $detail_kontak_alt = $this->karyawanKontakAlt->where('id_karyawan', $id)->first();

        return render_template('admin/karyawan/edit', ['detail' => $detail, 'status_kepegawaian' => $status_kepegawaian, 'bank' => $bank, 'detail_kontak_alt' => $detail_kontak_alt, 'jabatan' => $jabatan, 'divisi' => $divisi, 'bidang' => $bidang, 'pendidikan_non_formal' => $pendidikan_non_formal, 'kemampuan' => $kemampuan, 'keluarga' => $keluarga, 'pengalaman_organisasi' => $pengalaman_organisasi, 'pengalaman_pekerjaan' => $pengalaman_pekerjaan, 'pendidikan_formal' => $pendidikan_formal, 'pendidikan_non_formal_bergabung' => $pendidikan_non_formal_bergabung, 'pengalaman_organisasi_bergabung' => $pengalaman_organisasi_bergabung, 'dokumen_pendukung' => $dokumen_pendukung, 'selectMedia' => $selectMedia, 'media_sertifikat' => $media_sertifikat]);
    }

    public function update(Request $request)
    {
        /* ----------------------------------- ID ----------------------------------- */
        $id = $request->attributes->get('id');
        /* -------------------------------------------------------------------------- */

        /* ----------------------------- Status Karyawan ---------------------------- */
        $status_kepegawaian = $this->statusKepegawaian->get();
        foreach ($status_kepegawaian->items as $key => $value) {
            if ($request->request->get('id_status_kepegawaian') == $value['id_status_kepegawaian']) {
                $request->request->set('status_karyawan', $key += '1');
            }
        }
        /* -------------------------------------------------------------------------- */

        /* --------------------------------- Request -------------------------------- */
        $datas = $request->request->all();
        /* -------------------------------------------------------------------------- */

        /* -------------------------------- Karyawan -------------------------------- */
        $this->karyawan->where('id_karyawan', $id)->update($datas);
        /* -------------------------------------------------------------------------- */

        /* --------------------------------- Jabatan -------------------------------- */
        $this->karyawanJabatan->where('id_karyawan', $id)->update($datas);
        /* -------------------------------------------------------------------------- */

        /* --------------------------------- Divisi --------------------------------- */
        $this->karyawanDivisi->where('id_karyawan', $id)->update($datas);
        /* -------------------------------------------------------------------------- */

        /* --------------------------------- Bidang --------------------------------- */
        $this->karyawanBidang->where('id_karyawan', $id)->update($datas);
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
        $this->media->updateMedia($request->files->get('profile_foto'), [
            'id_relation' => $id,
            'jenis_dokumen' => 'foto_profile',
        ], $this->karyawan, $id);
        /* -------------------------------------------------------------------------- */

        /* ---------------------------- Dokumen Pendukung --------------------------- */
        foreach (array_keys($request->files->all()) as $key2 => $value2) {

            if ($value2 == 'file_sertifikat') {
                foreach ($request->files->get('file_sertifikat') as $key => $value) {
                    $media->updateMedia($value, [
                        'id_relation' => $id,
                        'jenis_dokumen' => 'file_sertifikat',
                    ], $this->karyawan, $id);
                }
            }

            if ($value2 != 'profile_foto') {
                if ($value2 != 'file_sertifikat') {
                    $media->updateMedia($request->files->get($value2), [
                        'id_relation' => $id,
                        'jenis_dokumen' => $value2,
                    ], $this->karyawan, $id);
                }
            }
        }
        /* -------------------------------------------------------------------------- */

        /* ------------------------------- Update Time ------------------------------ */
        $this->karyawan->where('id_karyawan', $id)->update([
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        /* -------------------------------------------------------------------------- */

        return new RedirectResponse('/admin/karyawan/' . $id . '/action');
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
        $media_data = $this->karyawan
            ->select('media.*')
            ->leftJoin('media', 'media.id_relation', '=', 'karyawan.id_karyawan')
            ->where('id_karyawan', $id)

            ->first();
        $this->karyawan->where('id_karyawan', $id)->delete();
        $media->deleteMedia($media_data);
        /* -------------------------------------------------------------------------- */

        return new RedirectResponse('/admin/karyawan');
    }

    public function status(Request $request)
    {

        $id = $request->attributes->get('id');

        $datas = $request->request->all();

        /* ------------------------------ Hide Karyawan ----------------------------- */
        $this->karyawan->where('id_karyawan', $id)->update([
            'id_status_kepegawaian' => $datas['id_status_kepegawaian']
        ]);
        /* -------------------------------------------------------------------------- */

        return new RedirectResponse('/admin/karyawan');
    }
    public function action(Request $request)
    {
        $id = $request->attributes->get('id');

        /* -------------------------------- Karyawan -------------------------------- */
        $detail = $this->karyawan
            ->leftJoin('status_kepegawaian', 'status_kepegawaian.id_status_kepegawaian', '=', 'karyawan.id_status_kepegawaian')
            ->leftJoin('bank', 'bank.id_bank', '=', 'karyawan.id_bank')
            ->leftJoin('media', 'media.id_relation', '=', 'karyawan.id_karyawan')
            ->leftJoin('karyawan_jabatan', 'karyawan_jabatan.id_karyawan', '=', 'karyawan.id_karyawan')
            ->leftJoin('jabatan', 'jabatan.id_jabatan', '=', 'karyawan_jabatan.id_jabatan')
            ->leftJoin('karyawan_divisi', 'karyawan_divisi.id_karyawan', '=', 'karyawan.id_karyawan')
            ->leftJoin('divisi', 'divisi.id_divisi', '=', 'karyawan_divisi.id_divisi')
            ->leftJoin('karyawan_bidang', 'karyawan_bidang.id_karyawan', '=', 'karyawan.id_karyawan')
            ->leftJoin('bidang', 'bidang.id_bidang', '=', 'karyawan_bidang.id_bidang')
            ->where('karyawan.id_karyawan', $id)
            ->where('media.jenis_dokumen', 'foto_profile')
            ->first();
        /* -------------------------------------------------------------------------- */

        /* -------------------------------- Karyawan -------------------------------- */
        $karyawan = $this->karyawan
            ->leftJoin('status_kepegawaian', 'status_kepegawaian.id_status_kepegawaian', '=', 'karyawan.id_status_kepegawaian')
            ->leftJoin('bank', 'bank.id_bank', '=', 'karyawan.id_bank')
            ->leftJoin('media', 'media.id_relation', '=', 'karyawan.id_karyawan')
            ->leftJoin('karyawan_jabatan', 'karyawan_jabatan.id_karyawan', '=', 'karyawan.id_karyawan')
            ->leftJoin('jabatan', 'jabatan.id_jabatan', '=', 'karyawan_jabatan.id_jabatan')
            ->leftJoin('karyawan_divisi', 'karyawan_divisi.id_karyawan', '=', 'karyawan.id_karyawan')
            ->leftJoin('divisi', 'divisi.id_divisi', '=', 'karyawan_divisi.id_divisi')
            ->leftJoin('karyawan_bidang', 'karyawan_bidang.id_karyawan', '=', 'karyawan.id_karyawan')
            ->leftJoin('bidang', 'bidang.id_bidang', '=', 'karyawan_bidang.id_bidang')
            ->where('karyawan.id_karyawan', $id)
            ->where('media.jenis_dokumen', 'foto_profile')
            ->first();

        if ($karyawan['gol_darah'] == 1) {
            $karyawan['golongan_darah'] = 'A';
        } elseif ($karyawan['gol_darah'] == 2) {
            $karyawan['golongan_darah'] = 'B';
        } elseif ($karyawan['gol_darah'] == 3) {
            $karyawan['golongan_darah'] = 'AB';
        } elseif ($karyawan['gol_darah'] == 4) {
            $karyawan['golongan_darah'] = 'O';
        }

        if ($karyawan['agama'] == 1) {
            $karyawan['agama_detail'] = 'Islam';
        } elseif ($karyawan['agama'] == 2) {
            $karyawan['agama_detail'] = 'Kristen Protestan';
        } elseif ($karyawan['agama'] == 3) {
            $karyawan['agama_detail'] = 'Kristen Katolik';
        } elseif ($karyawan['agama'] == 4) {
            $karyawan['agama_detail'] = 'Hindu';
        } elseif ($karyawan['agama'] == 5) {
            $karyawan['agama_detail'] = 'Buddha';
        } elseif ($karyawan['agama'] == 6) {
            $karyawan['agama_detail'] = 'Khonghucu';
        }
        // dd($karyawan);
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

        $pendidikan_non_formal_bergabung = $this->pendidikanNonFormal
            ->where('id_relation', $id)
            ->where('status', '2')
            ->get();
        /* -------------------------------------------------------------------------- */

        /* -------------------------------- Kemampuan ------------------------------- */
        $kemampuan = $this->kemampuan
            ->where('id_relation', $id)
            ->get();

        foreach ($kemampuan->items as $key => $value) {
            if ($value['tingkat_kemampuan'] == '1') {
                $kemampuan->items[$key]['tingkatan'] = 'Beginner';
            } else if ($value['tingkat_kemampuan'] == '2') {
                $kemampuan->items[$key]['tingkatan'] = 'Intermediate';
            } else if ($value['tingkat_kemampuan'] == '3') {
                $kemampuan->items[$key]['tingkatan'] = 'Proficient';
            } else if ($value['tingkat_kemampuan'] == '4') {
                $kemampuan->items[$key]['tingkatan'] = 'Expert';
            }
        }
        /* -------------------------------------------------------------------------- */

        /* ---------------------- Keluarga Yang Bisa Dihubungi ---------------------- */
        $karyawan_kontak_alt = $this->karyawanKontakAlt
            ->where('id_karyawan', $id)
            ->first();
        /* -------------------------------------------------------------------------- */

        /* -------------------------- Pengalaman Organisasi ------------------------- */
        $pengalaman_organisasi = $this->pengalamanOrganisasi
            ->where('id_relation', $id)
            ->where('status', '1')
            ->get();

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

        // dd($pengalaman_pekerjaan);

        $dokumen_pendukung = [
            ['label' => 'KTP', 'name' => 'file_ktp'],
            ['label' => 'NPWP', 'name' => 'file_npwp'],
            ['label' => 'Ijazah Terakhir', 'name' => 'file_ijazah'],
            ['label' => 'Transkrip Nilai Terakhir', 'name' => 'file_transkrip_nilai'],
            ['label' => 'Sertifikat', 'name' => 'file_sertifikat'],
            ['label' => 'Salinan Buku Bank', 'name' => 'file_salinan_bank'],
            ['label' => 'SIM A', 'name' => 'file_sim_a'],
            ['label' => 'SIM B1', 'name' => 'file_sim_b1'],
            ['label' => 'SIM B2', 'name' => 'file_sim_b2'],
            ['label' => 'SIM C', 'name' => 'file_sim_c'],
            ['label' => 'SIM D', 'name' => 'file_sim_d'],
            ['label' => 'Kartu Keluarga', 'name' => 'file_kk'],
            ['label' => 'Passport', 'name' => 'file_passport'],
            ['label' => 'Salinan Kartu Anggota Asuransi', 'name' => 'file_asuransi'],
            ['label' => 'Pakelaring / Surat Keterangan Pengalaman Kerja', 'name' => 'file_pakelaring'],
            ['label' => 'Kartu Kuning', 'name' => 'file_kartu_kuning'],
        ];

        $selectMedia = function ($id, $jenis_dokumen) {
            $media = new Media();

            return $media_karyawan = $media
                ->where('id_relation', $id)
                ->where('jenis_dokumen', $jenis_dokumen)
                ->first();
        };

        $media_sertifikat = $this->media
            ->where('id_relation', $id)
            ->where('jenis_dokumen', 'file_sertifikat')
            ->get();

        $status_kepegawaian = $this->statusKepegawaian
            ->orderBy('nama_status_kepegawaian', 'ASC')
            ->where('nama_status_kepegawaian', '!=', 'Resign')
            ->get();

        $bank = $this->bank->orderBy('nama_bank', 'ASC')->get();
        $jabatan = $this->jabatan->orderBy('nama_jabatan', 'ASC')->get();
        $divisi = $this->divisi->orderBy('nama_divisi', 'ASC')->get();
        $bidang = $this->bidang->orderBy('nama_bidang', 'ASC')->get();


        return render_template('admin/karyawan/action', [
            'detail' => $detail,
            'karyawan' => $karyawan,
            'pendidikan_formal' => $pendidikan_formal,
            'pendidikan_non_formal' => $pendidikan_non_formal,
            'pendidikan_non_formal_bergabung' => $pendidikan_non_formal_bergabung,
            'kemampuan' => $kemampuan,
            'karyawan_kontak_alt' => $karyawan_kontak_alt,
            'pengalaman_organisasi' => $pengalaman_organisasi,
            'pengalaman_organisasi_bergabung' => $pengalaman_organisasi_bergabung,
            'pengalaman_pekerjaan' => $pengalaman_pekerjaan,
            'dokumen_pendukung' => $dokumen_pendukung,
            'media_sertifikat' => $media_sertifikat,
            'selectMedia' => $selectMedia,
            'status_kepegawaian' => $status_kepegawaian,
            'bank' => $bank,
            'jabatan' => $jabatan,
            'divisi' => $divisi,
            'bidang' => $bidang,
        ]);
    }
}
