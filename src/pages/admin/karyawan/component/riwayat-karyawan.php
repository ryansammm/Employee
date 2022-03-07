<div class="card">
    <div class="card-body">
        <div class="row mb-3">
            <div class="col my-auto">
                <h6 style="font-weight: bold;">
                    Riwayat Data Karyawan
                </h6>
            </div>
            <div class="col-4">
                <div class="text-white">
                    <table class="table text-dark mb-0" id="table-header">
                        <tr>
                            <td style="font-weight: bold;">Nama Karyawan</td>
                            <td>:</td>
                            <td><?= $detail['nama_lengkap'] ?></td>
                        </tr>
                        <tr>
                            <td style="font-weight: bold;">Masa Kerja</td>
                            <td>:</td>
                            <td><?= posted_at($karyawan['tgl_mulai_kerja'], 3) ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card shadow-none border">
                    <div class="card-body">
                        <table class="table">
                            <thead style="font-weight: bold;">
                                <td>No</td>
                                <td>Tanggal Perubahan</td>
                                <td>Waktu Perubahan</td>
                                <td>Diubah Oleh</td>
                                <td>Data Sebelum Diubah</td>
                                <td>Data Setelah Diubah</td>
                            </thead>
                            <tr>
                                <td>1</td>
                                <td>23 Januari 2022</td>
                                <td>23 Januari 2022</td>
                                <td>Ryan Samsudin</td>
                                <td><button class="btn btn-sm btn-outline-dark"><i class="fa fa-eye" aria-hidden="true"></i></button> Lihat Data</td>
                                <td><button class="btn btn-sm btn-outline-dark"><i class="fa fa-eye" aria-hidden="true"></i></button> Lihat Data</td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>24 Januari 2022</td>
                                <td>24 Januari 2022</td>
                                <td>Ryan Samsudin</td>
                                <td><button class="btn btn-sm btn-outline-dark"><i class="fa fa-eye" aria-hidden="true"></i></button> Lihat Data</td>
                                <td><button class="btn btn-sm btn-outline-dark"><i class="fa fa-eye" aria-hidden="true"></i></button> Lihat Data</td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>