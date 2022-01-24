<?php

namespace App\Pelamar\Controller;

use App\Bank\Model\Bank;
use App\Bidang\Model\Bidang;
use App\Karyawan\Model\Karyawan;
use App\Karyawan\Model\KaryawanKontakAlt;
use App\KaryawanBidang\Model\KaryawanBidang;
use App\KaryawanDivisi\Model\KaryawanDivisi;
use App\KaryawanJabatan\Model\KaryawanJabatan;
use App\Kemampuan\Model\Kemampuan;
use App\KemampuanBahasa\Model\KemampuanBahasa;
use App\Kursus\Model\Kursus;
use App\Media\Model\Media;
use App\Pelamar\Model\Pelamar;
use App\PendidikanFormal\Model\PendidikanFormal;
use App\PendidikanNonFormal\Model\PendidikanNonFormal;
use App\PengalamanOrganisasi\Model\PengalamanOrganisasi;
use App\PengalamanPekerjaan\Model\PengalamanPekerjaan;
use App\PengalamanPekerjaanPelamar\Model\PengalamanPekerjaanPelamar;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class PelamarController
{
    public $pelamar;
    public $karyawan;
    public $media;
    public $bank;
    public $kemampuanBahasa;
    public $kursus;
    public $pengalamanPekerjaanPelamar;
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
        $this->pelamar = new Pelamar();
        $this->karyawan = new Karyawan();
        $this->media = new Media();
        $this->bank = new Bank();
        $this->kemampuanBahasa = new KemampuanBahasa();
        $this->kursus = new Kursus();
        $this->pengalamanPekerjaanPelamar = new PengalamanPekerjaanPelamar();
        $this->karyawanKontakAlt = new KaryawanKontakAlt();
        $this->bidang = new Bidang();
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

        $datas = $this->pelamar
            ->leftJoin('karyawan', 'karyawan.id_karyawan', '=', 'pelamar.id_karyawan')
            ->where('status_karyawan', '5')
            ->orderBy('pelamar.created_at', 'DESC')
            ->paginate(10);

        return render_template('admin/pelamar/index', ['datas' => $datas]);
    }

    public function create(Request $request)
    {

        $bank = $this->bank->get();

        return render_template('admin/pelamar/create', ['bank' => $bank]);
    }

    public function store(Request $request)
    {


        $request->request->set('hide', '2');
        $request->request->set('status_karyawan', '5');
        $datas = $request->request->all();
        // dd($datas);

        /* -------------------------------- Karyawan -------------------------------- */
        $create = $this->karyawan->insert($datas);
        /* -------------------------------------------------------------------------- */

        /* --------------------------------- Pelamar -------------------------------- */
        $request->request->set('id_karyawan', $create);
        $pelamar = $this->pelamar->insert($request->request->all());
        /* -------------------------------------------------------------------------- */

        /* ---------------------------- Kemampuan Bahasa ---------------------------- */
        foreach ($datas['nama_bahasa'] as $key => $value) {
            $create_kemampuan_bahasa = $this->kemampuanBahasa->insert([
                'id_pelamar' => $pelamar,
                'nama_bahasa' => $datas['nama_bahasa'][$key],
                'kemampuan_bahasa' => $datas['kemampuan_bahasa'][$key],
            ]);
        }
        /* -------------------------------------------------------------------------- */

        /* --------------------------------- Kursus --------------------------------- */
        foreach ($datas['nama_lembaga_kursus'] as $key => $value) {
            $create_kursus = $this->kursus->insert([
                'id_pelamar' => $pelamar,
                'tahun_kursus' => $datas['tahun_kursus'][$key],
                'nama_lembaga_kursus' => $datas['nama_lembaga_kursus'][$key],
                'deskripsi_kursus' => $datas['deskripsi_kursus'][$key],
            ]);
        }
        /* -------------------------------------------------------------------------- */

        /* ---------------------- Pengalaman Pekerjaan Pelamar ---------------------- */
        foreach ($datas['nama_perusahaan_pelamar'] as $key => $value) {
            $create_pengalaman_pekerjaan_pelamar = $this->pengalamanPekerjaanPelamar->insert([
                'id_pelamar' => $pelamar,
                'nama_perusahaan_pelamar' => $datas['nama_perusahaan_pelamar'][$key],
                'jenis_usaha' => $datas['jenis_usaha'][$key],
                'nama_atasan' => $datas['nama_atasan'][$key],
                'no_kontak_atasan' => $datas['no_kontak_atasan'][$key],
                'jabatan_terakhir' => $datas['jabatan_terakhir'][$key],
                'tgl_berhenti' => $datas['tgl_berhenti'][$key],
                'alasan_berhenti' => $datas['alasan_berhenti'][$key],
            ]);
        }
        /* -------------------------------------------------------------------------- */

        /* ---------------------------- Karyawan Jabatan ---------------------------- */
        // $create_karyawan_jabatan = $this->karyawanJabatan->insert([
        //     [
        //         'id_karyawan' => $create,
        //         'id_jabatan' => $datas['id_jabatan'],
        //         'hide' => '2',
        //     ]
        // ]);
        /* -------------------------------------------------------------------------- */

        /* ----------------------------- Karyawan Divisi ---------------------------- */
        // $create_karyawan_divisi = $this->karyawanDivisi->insert([
        //     'id_relation' => $create,
        //     'nama_divisi' => $datas['nama_divisi'],
        //     'hide' => '2',
        // ]);
        /* -------------------------------------------------------------------------- */

        /* ----------------------------- Karyawan Bidang ---------------------------- */
        // $create_karyawan_bidang = $this->karyawanBidang->insert([
        //     'id_bidang' => $datas['id_bidang'],
        //     'id_relation' => $create,
        //     'hide' => '2',
        // ]);
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
        // foreach ($datas['nama_lembaga_pekerjaan'] as $key => $value) {
        //     $create_pengalaman_pekerjaan = $this->pengalamanPekerjaan->insert([
        //         'id_relation' => $create,
        //         'nama_lembaga' => $datas['nama_lembaga_pekerjaan'][$key],
        //         'nama_pekerjaan' => $datas['nama_pekerjaan'][$key],
        //         'lokasi_lembaga' => $datas['lokasi_pekerjaan'][$key],
        //         'periode_pelaksanaan' => $datas['periode_pelaksanaan_pekerjaan'][$key],
        //     ]);
        // }
        /* -------------------------------------------------------------------------- */

        /* ------------------------------ Profile Foto ------------------------------ */
        $media = new Media();
        $media->path(env('APP_MEDIA_DIR'))->storeMedia($request->files->get('foto_profile_pelamar'), [
            'id_relation' => $create,
            'jenis_dokumen' => 'foto_profile_pelamar',
        ]);
        /* -------------------------------------------------------------------------- */


        /* ---------------------------- Dokumen Pendukung --------------------------- */
        foreach (array_keys($request->files->all()) as $key2 => $value2) {

            if ($value2 == 'file_sertifikat') {
                foreach ($request->files->get('file_sertifikat') as $key => $value) {
                    $media->path(env('APP_MEDIA_DIR'))->updateMedia($value, [
                        'id_relation' => $create,
                        'jenis_dokumen' => 'file_sertifikat',
                    ], $this->karyawan, $create);
                }
            }

            if ($value2 != 'foto_profile_pelamar') {
                if ($value2 != 'file_sertifikat') {
                    // dd($request->files->get($value2));
                    $media->path(env('APP_MEDIA_DIR'))->updateMedia($request->files->get($value2), [
                        'id_relation' => $create,
                        'jenis_dokumen' => $value2,
                    ], $this->karyawan, $create);
                }
            }
        }
        /* -------------------------------------------------------------------------- */

        return new RedirectResponse('/admin/pelamar');
    }

    public function edit(Request $request)
    {

        $id = $request->attributes->get('id');

        $date = date('Y-m-d');

        $bank = $this->bank->orderBy('nama_bank', 'ASC')->get();

        /* -------------------------------- Karyawan -------------------------------- */
        $detail = $this->pelamar
            ->leftJoin('karyawan', 'karyawan.id_karyawan', '=', 'pelamar.id_karyawan')
            ->leftJoin('bank', 'bank.id_bank', '=', 'karyawan.id_bank')
            ->leftJoin('media', 'media.id_relation', '=', 'karyawan.id_karyawan')
            ->where('pelamar.id_pelamar', $id)
            ->where('media.jenis_dokumen', 'foto_profile_pelamar')
            ->first();
        /* -------------------------------------------------------------------------- */

        /* ---------------------------- Pendidikan Formal --------------------------- */

        $pendidikan_formal = $this->pendidikanFormal
            ->where('id_relation', $detail['id_karyawan'])
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
            ->where('id_relation', $detail['id_karyawan'])
            ->where('status', '1')
            ->get();
        /* -------------------------------------------------------------------------- */

        /* ----------------- Pendidikan Non Formal Setelah Bergabung ---------------- */
        $pendidikan_non_formal_bergabung = $this->pendidikanNonFormal
            ->where('id_relation', $detail['id_karyawan'])
            ->where('status', '2')
            ->get();
        /* -------------------------------------------------------------------------- */

        /* -------------------------------- Kemampuan ------------------------------- */
        $kemampuan = $this->kemampuan
            ->where('id_relation', $detail['id_karyawan'])
            ->get();
        /* -------------------------------------------------------------------------- */

        /* ---------------------- Keluarga Yang Bisa Dihubungi ---------------------- */
        $keluarga = $this->karyawanKontakAlt
            ->where('id_karyawan', $detail['id_karyawan'])
            ->first();
        /* -------------------------------------------------------------------------- */

        /* ------------------------ Pengalaman Kerja Pelamar ------------------------ */
        $pengalaman_kerja_pelamar = $this->pengalamanPekerjaanPelamar
            ->where('id_pelamar', $id)
            ->get();
        /* -------------------------------------------------------------------------- */

        /* -------------------------- Pengalaman Organisasi ------------------------- */
        $pengalaman_organisasi = $this->pengalamanOrganisasi
            ->where('id_relation', $detail['id_karyawan'])
            ->where('status', '1')
            ->get();
        /* -------------------------------------------------------------------------- */

        /* --------------------------------- Kursus --------------------------------- */
        $kursus = $this->kursus
            ->where('id_pelamar', $id)
            ->get();
        /* -------------------------------------------------------------------------- */

        /* ----------------- Pengalaman Organisasi Setelah Bergabung ---------------- */
        $pengalaman_organisasi_bergabung = $this->pengalamanOrganisasi
            ->where('id_relation', $detail['id_karyawan'])
            ->where('status', '2')
            ->get();
        /* -------------------------------------------------------------------------- */

        /* -------------------------- Pengalaman Pekerjaan -------------------------- */
        $pengalaman_pekerjaan = $this->pengalamanPekerjaan
            ->where('id_relation', $detail['id_karyawan'])
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

        $detail_kontak_alt = $this->karyawanKontakAlt->where('id_karyawan', $detail['id_karyawan'])->first();

        $kemampuan_bahasa = $this->kemampuanBahasa
            ->where('id_pelamar', $id)
            ->get();


        return render_template('admin/pelamar/edit', ['detail' => $detail, 'bank' => $bank, 'detail_kontak_alt' => $detail_kontak_alt, 'pengalaman_kerja_pelamar' => $pengalaman_kerja_pelamar, 'pendidikan_non_formal' => $pendidikan_non_formal, 'kemampuan' => $kemampuan, 'keluarga' => $keluarga, 'pengalaman_organisasi' => $pengalaman_organisasi, 'pengalaman_pekerjaan' => $pengalaman_pekerjaan, 'pendidikan_formal' => $pendidikan_formal, 'pendidikan_non_formal_bergabung' => $pendidikan_non_formal_bergabung, 'pengalaman_organisasi_bergabung' => $pengalaman_organisasi_bergabung, 'dokumen_pendukung' => $dokumen_pendukung, 'selectMedia' => $selectMedia, 'media_sertifikat' => $media_sertifikat, 'kursus' => $kursus, 'kemampuan_bahasa' => $kemampuan_bahasa]);
    }

    public function update(Request $request)
    {
        /* --------------------------------- Request -------------------------------- */
        $id = $request->attributes->get('id');
        $datas = $request->request->all();
        $detail = $this->pelamar
            ->leftJoin('karyawan', 'karyawan.id_karyawan', '=', 'pelamar.id_karyawan')
            ->where('pelamar.id_pelamar', $id)
            ->first();
        $id_karyawan = $detail['id_karyawan'];
        /* -------------------------------------------------------------------------- */

        /* --------------------------------- Pelamar -------------------------------- */
        $update = $this->pelamar
            ->where('id_pelamar', $id)
            ->update($request->request->all());
        /* -------------------------------------------------------------------------- */

        /* -------------------------------- Karyawan -------------------------------- */
        $update_karyawan = $this->karyawan
            ->where('id_karyawan', $id_karyawan)
            ->update($request->request->all());
        /* -------------------------------------------------------------------------- */

        /* ------------------------------ Foto Profile ------------------------------ */
        $this->media->path(env('APP_MEDIA_DIR'))->updateMedia($request->files->get('foto_profile_pelamar'), [
            'id_relation' => $id_karyawan,
            'jenis_dokumen' => 'foto_profile_pelamar',
        ], $this->karyawan, $id_karyawan);
        /* -------------------------------------------------------------------------- */

        /* ---------------------------- Pendidikan Formal --------------------------- */
        $this->pendidikanFormal->where('id_relation', $id_karyawan)->delete();
        foreach ($datas['pendidikan'] as $key => $value) {

            if ($datas['jenis_pendidikan'][$key] == 1 || $datas['jenis_pendidikan'][$key] == 2) {
                $jurusan = NULL;
            } else {
                $jurusan = $datas['jurusan_pendidikan'][$key];
            }

            $create_pendidikan_formal = $this->pendidikanFormal->insert(
                [
                    'id_relation' => $id_karyawan,
                    'nama_sekolah' => $datas['pendidikan'][$key],
                    'tahun_lulus' => $datas['tahun_pendidikan'][$key],
                    'jurusan' => $jurusan,
                    'jenis_pendidikan' => $datas['jenis_pendidikan'][$key],
                ]
            );
        }
        /* -------------------------------------------------------------------------- */

        /* -------------------------- Pendidikan Non Formal ------------------------- */
        $this->pendidikanNonFormal->where('id_relation', $id_karyawan)->delete();
        foreach ($datas['lembaga_pendidikan_nonformal'] as $key => $value) {
            $create_pendidikan_non_formal = $this->pendidikanNonFormal->insert(
                [
                    'id_relation' => $id_karyawan,
                    'nama_lembaga' => $datas['lembaga_pendidikan_nonformal'][$key],
                    'periode_tahun' => $datas['tahun_nonformal'][$key],
                    'deskripsi' => $datas['deskripsi_nonformal'][$key],
                    'status' => '1'
                ]
            );
        }
        /* -------------------------------------------------------------------------- */

        /* -------------------------------- Kemampuan ------------------------------- */
        $this->kemampuan->where('id_relation', $id_karyawan)->delete();
        foreach ($datas['nama_kemampuan'] as $key => $value) {
            $create_kemampuan = $this->kemampuan->insert(
                [
                    'id_relation' => $id_karyawan,
                    'nama_kemampuan' => $datas['nama_kemampuan'][$key],
                    'tingkat_kemampuan' => $datas['tingkat_kemampuan'][$key],
                    'hide' => '2'
                ]
            );
        }
        /* -------------------------------------------------------------------------- */

        /* ---------------------- keluarga Yang Bisa Dihubungi ---------------------- */
        $this->karyawanKontakAlt
            ->where('id_karyawan', $id_karyawan)
            ->update($request->request->all());
        /* -------------------------------------------------------------------------- */

        /* ---------------------------- Kemampuan Bahasa ---------------------------- */
        $this->kemampuanBahasa->where('id_pelamar', $id)->delete();
        foreach ($datas['nama_bahasa'] as $key => $value) {
            $create_kemampuan_bahasa = $this->kemampuanBahasa->insert([
                'id_pelamar' => $id,
                'nama_bahasa' => $datas['nama_bahasa'][$key],
                'kemampuan_bahasa' => $datas['kemampuan_bahasa'][$key],
            ]);
        }
        /* -------------------------------------------------------------------------- */

        /* -------------------------- Pengalaman Organisasi ------------------------- */
        $this->pengalamanOrganisasi->where('id_relation', $id_karyawan)->delete();
        foreach ($datas['lembaga_organisasi'] as $key => $value) {
            $create_pengalaman_organisasi = $this->pengalamanOrganisasi->insert(
                [
                    'id_relation' => $id_karyawan,
                    'nama_organisasi' => $datas['lembaga_organisasi'][$key],
                    'jabatan_organisasi' => $datas['jabatan_organisasi'][$key],
                    'periode_aktif' => $datas['periode_aktif_organisasi'][$key],
                    'status' => '1'
                ]
            );
        }
        /* -------------------------------------------------------------------------- */

        /* --------------------------------- Kursus --------------------------------- */
        $this->kursus->where('id_pelamar', $id)->delete();
        foreach ($datas['nama_lembaga_kursus'] as $key => $value) {
            $create_kursus = $this->kursus->insert([
                'id_pelamar' => $id,
                'tahun_kursus' => $datas['tahun_kursus'][$key],
                'nama_lembaga_kursus' => $datas['nama_lembaga_kursus'][$key],
                'deskripsi_kursus' => $datas['deskripsi_kursus'][$key],
            ]);
        }
        /* -------------------------------------------------------------------------- */

        /* ---------------------- Pengalaman Pekerjaan Pelamar ---------------------- */
        $this->pengalamanPekerjaanPelamar->where('id_pelamar', $id)->delete();
        foreach ($datas['nama_perusahaan_pelamar'] as $key => $value) {
            $create_pengalaman_pekerjaan_pelamar = $this->pengalamanPekerjaanPelamar->insert([
                'id_pelamar' => $id,
                'nama_perusahaan_pelamar' => $datas['nama_perusahaan_pelamar'][$key],
                'jenis_usaha' => $datas['jenis_usaha'][$key],
                'nama_atasan' => $datas['nama_atasan'][$key],
                'no_kontak_atasan' => $datas['no_kontak_atasan'][$key],
                'jabatan_terakhir' => $datas['jabatan_terakhir'][$key],
                'tgl_berhenti' => $datas['tgl_berhenti'][$key],
                'alasan_berhenti' => $datas['alasan_berhenti'][$key],
            ]);
        }
        /* -------------------------------------------------------------------------- */

        /* ---------------------------- Dokumen Pendukung --------------------------- */
        foreach (array_keys($request->files->all()) as $key2 => $value2) {

            if ($value2 == 'file_sertifikat') {
                foreach ($request->files->get('file_sertifikat') as $key => $value) {
                    $this->media->path(env('APP_MEDIA_DIR'))->updateMedia($value, [
                        'id_relation' => $id_karyawan,
                        'jenis_dokumen' => 'file_sertifikat',
                    ], $this->karyawan, $id_karyawan);
                }
            }

            if ($value2 != 'profile_foto') {
                if ($value2 != 'file_sertifikat') {
                    // dd($request->files->get($value2));
                    $this->media->path(env('APP_MEDIA_DIR'))->updateMedia($request->files->get($value2), [
                        'id_relation' => $id_karyawan,
                        'jenis_dokumen' => $value2,
                    ], $this->karyawan, $id_karyawan);
                }
            }
        }
        /* -------------------------------------------------------------------------- */

        /* ------------------------------- Update Time ------------------------------ */
        $this->karyawan->where('id_karyawan', $id)->update([
            'updated_at' => date('Y-m-d H:i:s')
        ]);
        /* -------------------------------------------------------------------------- */

        return new RedirectResponse('/admin/pelamar/' . $id . '/edit');
    }

    public function detail(Request $request)
    {

        $id = $request->attributes->get('id');

        $detail = $this->pelamar
            ->where('id_table', $id)
            ->first();

        return render_template('home/detail', ['detail' => $detail]);
    }

    public function delete(Request $request)
    {

        $id = $request->attributes->get('id');

        $media_data = $this->pelamar
            ->select('media.*')
            ->leftJoin('media', 'media.id_relation', '=', 'table.id_table')
            ->where('id_table', $id)
            ->first();
        $this->media->deleteMedia($media_data);

        $delete = $this->pelamar->where('id_table', $id)->delete();

        return new RedirectResponse('/home');
    }
}
