<?php

namespace App\Employee\Controller;

use App\Employee\Model\Employee;
use App\Jabatan\Model\Jabatan;
use App\KaryawanKontakAlt\Model\KaryawanKontakAlt;
use App\Kemampuan\Model\Kemampuan;
use App\Media\Model\Media;
use App\PendidikanFormal\Model\PendidikanFormal;
use App\PendidikanNonFormal\Model\PendidikanNonFormal;
use App\PengalamanOrganisasi\Model\PengalamanOrganisasi;
use App\PengalamanPekerjaan\Model\PengalamanPekerjaan;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class EmployeeController
{
    public $karyawan;
    public $jabatan;
    public $pendidikanFormal;
    public $pendidikanNonFormal;
    public $karyawanKontakAlt;
    public $pengalamanOrganisasi;
    public $kemampuan;
    public $pengalamanPekerjaan;

    public function __construct()
    {
        $this->karyawan = new Employee();
        $this->jabatan = new Jabatan();
        $this->pendidikanFormal = new PendidikanFormal();
        $this->pendidikanNonFormal = new PendidikanNonFormal();
        $this->karyawanKontakAlt = new KaryawanKontakAlt();
        $this->pengalamanOrganisasi = new PengalamanOrganisasi();
        $this->kemampuan = new Kemampuan();
        $this->pengalamanPekerjaan = new PengalamanPekerjaan();
    }

    public function index(Request $request)
    {

        $datas_karyawan = $this->karyawan
            ->leftJoin('media', 'media.id_relation', '=', 'karyawan.id_karyawan')->leftJoin('karyawan_jabatan', 'karyawan_jabatan.id_karyawan', '=', 'karyawan.id_karyawan')
            ->leftJoin('jabatan', 'jabatan.id_jabatan', '=', 'karyawan_jabatan.id_jabatan')
            ->leftJoin('karyawan_divisi', 'karyawan_divisi.id_relation', '=', 'karyawan.id_karyawan')
            ->leftJoin('bidang_entitas', 'bidang_entitas.id_relation', '=', 'karyawan.id_karyawan')
            ->leftJoin('bidang', 'bidang.id_bidang', '=', 'bidang_entitas.id_bidang')
            ->where('jenis_dokumen', '=', 'foto-profil-karyawan')
            ->get();
        // dd($datas_karyawan);

        return render_template('public/employee/index', ['datas_karyawan' => $datas_karyawan]);
    }

    public function create(Request $request)
    {

        return render_template('home/create', []);
    }

    public function store(Request $request)
    {

        return new RedirectResponse('/home');
    }

    public function edit(Request $request)
    {


        return render_template('home/edit', []);
    }

    public function update(Request $request)
    {

        return new RedirectResponse('/home');
    }

    public function detail(Request $request)
    {
        $id = $request->attributes->get('id');

        /* -------------------------------- Karyawan -------------------------------- */
        $karyawan = $this->karyawan
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

        $detail = $this->karyawan
            ->where('karyawan.id_karyawan', $id)
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

        return render_template('public/employee/detail', ['karyawan' => $karyawan, 'pendidikan_formal' => $pendidikan_formal, 'pendidikan_non_formal' => $pendidikan_non_formal, 'karyawan_kontak_alt' => $karyawan_kontak_alt, 'pengalaman_organisasi' => $pengalaman_organisasi, 'kemampuan' => $kemampuan, 'pengalaman_pekerjaan' => $pengalaman_pekerjaan, 'pendidikan_non_formal_bergabung' => $pendidikan_non_formal_bergabung, 'pengalaman_organisasi_bergabung' => $pengalaman_organisasi_bergabung, 'detail' => $detail, 'dokumen_pendukung' => $dokumen_pendukung, 'selectMedia' => $selectMedia]);
    }

    public function delete(Request $request)
    {

        return new RedirectResponse('/home');
    }

    public function list(Request $request)
    {
        $datas_karyawan = $this->karyawan
            ->leftJoin('status_kepegawaian', 'status_kepegawaian.id_status_kepegawaian', '=', 'karyawan.id_status_kepegawaian')
            ->leftJoin('bank', 'bank.id_bank', '=', 'karyawan.id_bank')
            ->leftJoin('media', 'media.id_relation', '=', 'karyawan.id_karyawan')
            ->leftJoin('karyawan_jabatan', 'karyawan_jabatan.id_karyawan', '=', 'karyawan.id_karyawan')
            ->leftJoin('jabatan', 'jabatan.id_jabatan', '=', 'karyawan_jabatan.id_jabatan')
            ->leftJoin('karyawan_divisi', 'karyawan_divisi.id_relation', '=', 'karyawan.id_karyawan')
            ->leftJoin('bidang_entitas', 'bidang_entitas.id_relation', '=', 'karyawan.id_karyawan')
            ->leftJoin('bidang', 'bidang.id_bidang', '=', 'bidang_entitas.id_bidang')
            ->get();
        // dd($datas_karyawan);

        return render_template('public/employee/list', ['datas_karyawan' => $datas_karyawan]);
    }
}
