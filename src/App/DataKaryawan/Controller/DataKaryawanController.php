<?php

namespace App\DataKaryawan\Controller;

use App\DataKaryawan\Model\DataKaryawan;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class DataKaryawanController
{
    public $karyawan;

    public function __construct()
    {
        $this->karyawan = new DataKaryawan();
    }

    public function karyawanTetap(Request $request)
    {
        $datas = $this->karyawan
            ->select('*', 'karyawan.id_karyawan as karyawan_identitas')
            ->leftJoin('status_kepegawaian', 'status_kepegawaian.id_status_kepegawaian', '=', 'karyawan.id_status_kepegawaian')
            ->leftJoin('bank', 'bank.id_bank', '=', 'karyawan.id_bank')
            ->leftJoin('karyawan_jabatan', 'karyawan_jabatan.id_karyawan', '=', 'karyawan.id_karyawan')
            ->leftJoin('jabatan', 'jabatan.id_jabatan', '=', 'karyawan_jabatan.id_jabatan')
            ->leftJoin('karyawan_divisi', 'karyawan_divisi.id_karyawan', '=', 'karyawan.id_karyawan')
            ->leftJoin('divisi', 'divisi.id_divisi', '=', 'karyawan_divisi.id_divisi')
            ->leftJoin('karyawan_bidang', 'karyawan_bidang.id_karyawan', '=', 'karyawan.id_karyawan')
            ->leftJoin('bidang', 'bidang.id_bidang', '=', 'karyawan_bidang.id_bidang')
            ->where('karyawan.hide', '2')
            ->where('status_kepegawaian.nama_status_kepegawaian', 'Karyawan Tetap')
            ->paginate(10);
        return render_template('admin/data-karyawan/karyawan-tetap', ['datas' => $datas]);
    }

    public function karyawanKontrak(Request $request)
    {
        $datas = $this->karyawan
            ->select('*', 'karyawan.id_karyawan as karyawan_identitas')
            ->leftJoin('status_kepegawaian', 'status_kepegawaian.id_status_kepegawaian', '=', 'karyawan.id_status_kepegawaian')
            ->leftJoin('bank', 'bank.id_bank', '=', 'karyawan.id_bank')
            ->leftJoin('karyawan_jabatan', 'karyawan_jabatan.id_karyawan', '=', 'karyawan.id_karyawan')
            ->leftJoin('jabatan', 'jabatan.id_jabatan', '=', 'karyawan_jabatan.id_jabatan')
            ->leftJoin('karyawan_divisi', 'karyawan_divisi.id_karyawan', '=', 'karyawan.id_karyawan')
            ->leftJoin('divisi', 'divisi.id_divisi', '=', 'karyawan_divisi.id_divisi')
            ->leftJoin('karyawan_bidang', 'karyawan_bidang.id_karyawan', '=', 'karyawan.id_karyawan')
            ->leftJoin('bidang', 'bidang.id_bidang', '=', 'karyawan_bidang.id_bidang')
            ->where('karyawan.hide', '2')
            ->where('status_kepegawaian.nama_status_kepegawaian', 'Karyawan Kontrak')
            ->paginate(10);
        return render_template('admin/data-karyawan/karyawan-kontrak', ['datas' => $datas]);
    }

    public function karyawanTidakTetap(Request $request)
    {
        $datas = $this->karyawan
            ->select('*', 'karyawan.id_karyawan as karyawan_identitas')
            ->leftJoin('status_kepegawaian', 'status_kepegawaian.id_status_kepegawaian', '=', 'karyawan.id_status_kepegawaian')
            ->leftJoin('bank', 'bank.id_bank', '=', 'karyawan.id_bank')
            ->leftJoin('karyawan_jabatan', 'karyawan_jabatan.id_karyawan', '=', 'karyawan.id_karyawan')
            ->leftJoin('jabatan', 'jabatan.id_jabatan', '=', 'karyawan_jabatan.id_jabatan')
            ->leftJoin('karyawan_divisi', 'karyawan_divisi.id_karyawan', '=', 'karyawan.id_karyawan')
            ->leftJoin('divisi', 'divisi.id_divisi', '=', 'karyawan_divisi.id_divisi')
            ->leftJoin('karyawan_bidang', 'karyawan_bidang.id_karyawan', '=', 'karyawan.id_karyawan')
            ->leftJoin('bidang', 'bidang.id_bidang', '=', 'karyawan_bidang.id_bidang')
            ->where('karyawan.hide', '2')
            ->where('status_kepegawaian.nama_status_kepegawaian', 'Karyawan Tidak Tetap')
            ->paginate(10);

        return render_template('admin/data-karyawan/karyawan-tidak-tetap', ['datas' => $datas]);
    }

    public function karyawanResign(Request $request)
    {
        $datas = $this->karyawan
            ->select('*', 'karyawan.id_karyawan as karyawan_identitas')
            ->leftJoin('status_kepegawaian', 'status_kepegawaian.id_status_kepegawaian', '=', 'karyawan.id_status_kepegawaian')
            ->leftJoin('bank', 'bank.id_bank', '=', 'karyawan.id_bank')
            ->leftJoin('karyawan_jabatan', 'karyawan_jabatan.id_karyawan', '=', 'karyawan.id_karyawan')
            ->leftJoin('jabatan', 'jabatan.id_jabatan', '=', 'karyawan_jabatan.id_jabatan')
            ->leftJoin('karyawan_divisi', 'karyawan_divisi.id_karyawan', '=', 'karyawan.id_karyawan')
            ->leftJoin('divisi', 'divisi.id_divisi', '=', 'karyawan_divisi.id_divisi')
            ->leftJoin('karyawan_bidang', 'karyawan_bidang.id_karyawan', '=', 'karyawan.id_karyawan')
            ->leftJoin('bidang', 'bidang.id_bidang', '=', 'karyawan_bidang.id_bidang')
            ->where('karyawan.hide', '2')
            ->where('status_kepegawaian.nama_status_kepegawaian', 'Resign')
            ->paginate(10);
        return render_template('admin/data-karyawan/karyawan-resign', ['datas' => $datas]);
    }
}
