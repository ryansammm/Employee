<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<!-- Include Choices CSS -->
<link rel="stylesheet" href="/assets/vendors/choices.js/choices.min.css" />

<style>
    label {
        font-weight: 500 !important;
        font-size: 13px !important;
    }

    .form-control {
        font-size: 12px !important;
        height: calc(2.0rem + 1px);
        padding: .175rem .75rem !important;
    }

    button {
        font-size: 11px !important;
    }

    .custom-file-label {
        font-size: 12px !important;
        font-style: italic;
        height: calc(2.0rem + 1px);
    }

    .custom-file,
    .custom-file-input {
        height: calc(2.0rem + 1px);
    }

    .crop {
        width: 157px;
        height: 199px;
        overflow: hidden;
        margin-top: 7px;
    }

    .crop img {
        width: 157px;
        height: 199px;
        border-radius: 0.25rem;
    }

    body {
        font-family: 'Poppins', sans-serif !important;
    }

    .sidebar {
        font-size: 13px !important;
    }

    .brand-text {
        font-size: 11px !important;
    }

    .main-footer {
        font-size: 11px;
    }
</style>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-1">
                    <a href="/admin/karyawan" class="btn btn-sm btn-danger"><i class="fas fa-arrow-left text-white"></i></a>
                </div>
                <div class="col-sm-5">
                    <h1 class="m-0" style="font-size: 18px !important;">Tambah Karyawan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right" style="font-size: 13px !important;">
                        <li class="breadcrumb-item"><a href="#">Karyawan</a></li>
                        <li class="breadcrumb-item"><a href="#">Kelola Karyawan</a></li>
                        <li class="breadcrumb-item active">Tambah Data Karyawan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="wrapper" style="height: 100%;">
                <ul class="nav nav-tabs" id="myTab" role="tablist" style="font-size: 13px !important;">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="sebelum-bergabung-tab" data-toggle="tab" href="#sebelum-bergabung" role="tab" aria-controls="sebelum-bergabung" aria-selected="true">Data Sebelum Bergabung</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="setelah-bergabung-tab" data-toggle="tab" href="#setelah-bergabung" role="tab" aria-controls="setelah-bergabung" aria-selected="false">Data Setelah Bergabung</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="dokumen-pendukung-tab" data-toggle="tab" href="#dokumen-pendukung" role="tab" aria-controls="dokumen-pendukung" aria-selected="false">Dokumen Pendukung</a>
                    </li>
                </ul>
                <form action="/admin/karyawan/store" method="POST" enctype="multipart/form-data">
                    <div class="card">
                        <div class="card-body">
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="sebelum-bergabung" role="tabpanel" aria-labelledby="sebelum-bergabung-tab">
                                    <div class="container">
                                        <!-- IDENTITAS KARYAWAN -->
                                        <h5>IDENTITAS KARYAWAN</h5>
                                        <div class="border rounded p-3">
                                            <div class="row">

                                                <div class="col-md-2">
                                                    <!-- <div> -->
                                                    <!-- <img class="img-fluid rounded" src="/assets/icon/default-profile.jpg" alt=""> -->
                                                    <!-- <div style="background-image: url(/assets/icon/default-profile.jpg);background-position: center;width: 100%;height: 97%;background-size: 100%;background-repeat: no-repeat;"></div> -->
                                                    <!-- </div> -->
                                                    <div class="crop">
                                                        <img class="foto_utama_preview" src="/assets/icon/default-profile.jpg" alt="Donald Duck">
                                                    </div>
                                                </div>

                                                <div class="col-md-10">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="mb-2">
                                                                <label for="">Foto Profile</label>
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input foto_utama" name="profile_foto" required>
                                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-2">
                                                                <label for="">Status Kepegawaian *</label>
                                                                <select name="id_status_kepegawaian" class="form-control" required>
                                                                    <option value=""> -- Pilih Status -- </option>
                                                                    <?php foreach ($status_kepegawaian->items as $key => $data) { ?>
                                                                        <option value="<?= $data['id_status_kepegawaian'] ?>"><?= $data['nama_status_kepegawaian'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-2">
                                                                <label for="">Nomor Induk Karyawan *</label>
                                                                <input type="text" name="no_induk_karyawan" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-2">
                                                                <label for="">Tanggal Mulai Bekerja *</label>
                                                                <input type="date" name="tgl_mulai_kerja" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-2">
                                                                <label for="">Nama Lengkap Sesuai KTP *</label>
                                                                <input type="text" name="nama_lengkap" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="mb-2">
                                                                <label for="">Nama Panggilan *</label>
                                                                <input type="text" name="nama_panggilan" class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-12 col-md-4">
                                                    <div class="mb-2">
                                                        <label for="">Jabatan *</label>
                                                        <select name="id_jabatan" class="form-control" required>
                                                            <option value=""> -- Pilih Jabatan -- </option>
                                                            <?php foreach ($jabatan->items as $key => $data) { ?>
                                                                <option value="<?= $data['id_jabatan'] ?>"><?= $data['nama'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <div class="mb-1">
                                                        <label for="">Divisi *</label>
                                                        <input type="text" name="nama_divisi" id="" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <div class="mb-1">
                                                        <label for="">Bidang / Departemen *</label>
                                                        <select name="id_bidang" class="form-control" required>
                                                            <option value=""> -- Pilih Bidang / Departemen -- </option>
                                                            <?php foreach ($bidang->items as $key => $item) { ?>
                                                                <option value="<?= $item['id_bidang'] ?>"><?= $item['nama_bidang'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END IDENTITAS KARYAWAN -->
                                        <!-- DATA PRIBADI -->
                                        <h5 class="mt-3">DATA PRIBADI</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="border rounded p-3">
                                                    <div class="row">
                                                        <div class="col-12 col-md-6">
                                                            <div class="mb-2">
                                                                <label for="">Nomor KTP *</label>
                                                                <input type="text" name="no_ktp" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="mb-2">
                                                                <label for="">Nomor Kartu Keluarga *</label>
                                                                <input type="text" name="no_kk" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="mb-2">
                                                                <label for="">Nomor Seluler Pribadi *</label>
                                                                <input type="text" name="no_seluler_pribadi" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="mb-2">
                                                                <label for="">Nomor Seluler Kantor *</label>
                                                                <input type="text" name="no_seluler_kantor" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="mb-2">
                                                                <label for="">Alamat Email Pribadi *</label>
                                                                <input type="text" name="email_pribadi" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="mb-2">
                                                                <label for="">Alamat Email Kantor *</label>
                                                                <input type="text" name="email_kantor" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="mb-2">
                                                                <label for="">Kewarganegaraan *</label>
                                                                <input type="text" name="kewarganegaraan" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="mb-2">
                                                                <label for="">Nomor Passport, Bila Ada</label>
                                                                <input type="text" name="no_passport" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="mb-2">
                                                                <label for="">Nomor SIM C</label>
                                                                <input type="text" name="no_sim_c" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="border rounded p-3">
                                                    <div class="row">
                                                        <div class="col-12 col-md-6">
                                                            <div class="mb-2">
                                                                <label for="">Tempat Lahir *</label>
                                                                <input type="text" name="tempat_lahir" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="mb-2">
                                                                <label for="tgl_lahir" class="form-label">Tanggal Lahir *</label>
                                                                <input type="date" class="form-control" required id="tgl_lahir" name="tgl_lahir">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="mb-2">
                                                                <label for="">Jenis Kelamin *</label>
                                                                <select name="jenis_kelamin" class="form-control" required>
                                                                    <option value=""> -- Pilih Jenis Kelamin -- </option>
                                                                    <option value="1">Laki - Laki</option>
                                                                    <option value="2">Perempuan</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="mb-2">
                                                                <label for="">Status *</label>
                                                                <select name="status_perkawinan" class="form-control" required>
                                                                    <option value=""> -- Pilih Status Perkawinan -- </option>
                                                                    <option value="1">Sudah Menikah</option>
                                                                    <option value="2">Belum Menikah</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            <div class="mb-2">
                                                                <label for="">Berat Badan *</label>
                                                                <input type="number" min="1" name="berat_badan" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            <div class="mb-2">
                                                                <label for="">Tinggi Badan *</label>
                                                                <input type="number" min="1" name="tinggi_badan" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="mb-2">
                                                                <label for="">Golongan Darah *</label>
                                                                <select name="gol_darah" class="form-control" required>
                                                                    <option value=""> -- Pilih Golongan Darah -- </option>
                                                                    <option value="1">A</option>
                                                                    <option value="2">B</option>
                                                                    <option value="3">AB</option>
                                                                    <option value="4">O</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="mb-2">
                                                                <label for="">Agama *</label>
                                                                <select name="agama" class="form-control" required>
                                                                    <option value=""> -- Pilih Agama -- </option>
                                                                    <option value="1">Islam</option>
                                                                    <option value="2">Kristen Protestan</option>
                                                                    <option value="3">Kristen Katolik</option>
                                                                    <option value="4">Hindu</option>
                                                                    <option value="5">Buddha</option>
                                                                    <option value="6">Khonghucu</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="mb-2">
                                                                <label for="">No. SIM A/B/B1/B2</label>
                                                                <input type="text" name="no_sim_lainnya" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END DATA PRIBADI -->
                                        <h5 class="mt-3">ALAMAT</h5>
                                        <div class="row">
                                            <!-- ALAMAT SESUAI KTP -->
                                            <div class="col-6">
                                                <div class="border rounded p-3">
                                                    <div class="mb-2">
                                                        <label for="">Alamat Sesuai KTP *</label>
                                                        <textarea name="alamat_ktp" class="form-control mb-2"></textarea>
                                                        <input type="text" name="kode_pos_ktp" class="form-control" required placeholder="Kode POS KTP *">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END ALAMAT SESUAI KTP -->
                                            <!-- ALAMAT SAAT INI -->
                                            <div class="col-6">
                                                <div class="border rounded p-3">
                                                    <div class="mb-2">
                                                        <label for="">Alamat tinggal saat ini *</label>
                                                        <textarea name="alamat_tinggal" class="form-control mb-2"></textarea>
                                                        <input type="text" name="kode_pos_tinggal" class="form-control" required placeholder="Kode POS alamat tinggal saat ini *">
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- END ALAMAT SAAT INI -->
                                        </div>

                                        <!-- ASURANSI -->
                                        <h5 class="mt-3">ASURANSI</h5>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="border rounded p-3">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="mb-2">
                                                                <label for="">No. BPJS Ketenagarkerjaan *</label>
                                                                <input type="text" name="no_bpjs_ketenagakerjaan" class="form-control" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="mb-2">
                                                                <label for="">No. BPJS Kesehatan *</label>
                                                                <input type="text" name="no_bpjs_kesehatan" class="form-control" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="border rounded p-3">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="mb-2">
                                                                <label for="">Nama Asuransi Lainnya</label>
                                                                <input type="text" name="nama_asuransi" class="form-control">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="mb-2">
                                                                <label for="">Nomor Asuransi</label>
                                                                <input type="text" name="no_asuransi" class="form-control">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END ASURANSI -->
                                        <!-- PERBANKAN -->
                                        <h5 class="mt-3">PERBANKAN</h5>
                                        <div class="border rounded p-3">
                                            <div class="row">
                                                <div class="col-12 col-md-3">
                                                    <div class="mb-2">
                                                        <label for="">Nama Bank *</label>
                                                        <select name="id_bank" class="form-control" required>
                                                            <option value=""> -- Pilih Bank -- </option>
                                                            <?php foreach ($bank->items as $key => $item) { ?>
                                                                <option value="<?= $item['id_bank'] ?>"><?= $item['nama_bank'] ?></option>
                                                            <?php } ?>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <div class="mb-2">
                                                        <label for="">Nomor Rekening *</label>
                                                        <input type="text" name="no_rek_bank" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <div class="mb-2">
                                                        <label for="">Cabang *</label>
                                                        <input type="text" name="cabang_bank" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-3">
                                                    <div class="mb-2">
                                                        <label for="">Atas Nama *</label>
                                                        <input type="text" name="an_bank" class="form-control" required>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END PERBANKAN -->
                                        <!-- PERPAJAKAN -->
                                        <h5 class="mt-3">PERPAJAKAN</h5>
                                        <div class="border rounded p-3">
                                            <div class="row">
                                                <div class="col-12 col-md-4">
                                                    <div class="mb-2">
                                                        <label for="">Nomor NPWP</label>
                                                        <input type="text" name="no_npwp" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <div class="mb-2">
                                                        <label for="">Nama KPP</label>
                                                        <input type="text" name="nama_kpp" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <div class="mb-2">
                                                        <label for="">Tanggal Terdaftar</label>
                                                        <input type="date" name="tgl_terdaftar_pajak" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END PERPAJAKAN -->
                                        <!-- PENDIDIKAN FORMAL -->
                                        <h5 class="mt-3">PENDIDIKAN FORMAL</h5>
                                        <div class="border rounded p-3">
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label for="">Pendidikan Dasar</label>
                                                        <input type="hidden" name="jenis_pendidikan[]" value="1">
                                                        <input type="text" name="pendidikan[]" class="form-control" required>
                                                        <input type="text" name="tahun_pendidikan[]" class="form-control mt-2" placeholder="Tahun Lulus">
                                                        <input type="hidden" name="jurusan_pendidikan[]" class="form-control mt-2" placeholder="Jurusan, Bila Ada">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label for="">Pendidikan Menengah</label>
                                                        <input type="hidden" name="jenis_pendidikan[]" value="2">
                                                        <input type="text" name="pendidikan[]" class="form-control" required>
                                                        <input type="text" name="tahun_pendidikan[]" class="form-control mt-2" placeholder="Tahun Lulus">
                                                        <input type="hidden" name="jurusan_pendidikan[]" class="form-control mt-2" placeholder="Jurusan, Bila Ada">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label for="">Pendidikan Atas</label>
                                                        <input type="hidden" name="jenis_pendidikan[]" value="3">
                                                        <input type="text" name="pendidikan[]" class="form-control" required>
                                                        <input type="text" name="tahun_pendidikan[]" class="form-control mt-2" placeholder="Tahun Lulus">
                                                        <input type="text" name="jurusan_pendidikan[]" class="form-control mt-2" placeholder="Jurusan, Bila Ada">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label for="">Diploma</label>
                                                        <input type="hidden" name="jenis_pendidikan[]" value="4">
                                                        <input type="text" name="pendidikan[]" class="form-control" required>
                                                        <input type="text" name="tahun_pendidikan[]" class="form-control mt-2" placeholder="Tahun Lulus">
                                                        <input type="text" name="jurusan_pendidikan[]" class="form-control mt-2" placeholder="Jurusan, Bila Ada">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label for="">Sarjana</label>
                                                        <input type="hidden" name="jenis_pendidikan[]" value="5">
                                                        <input type="text" name="pendidikan[]" class="form-control" required>
                                                        <input type="text" name="tahun_pendidikan[]" class="form-control mt-2" placeholder="Tahun Lulus">
                                                        <input type="text" name="jurusan_pendidikan[]" class="form-control mt-2" placeholder="Jurusan, Bila Ada">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label for="">Magister</label>
                                                        <input type="hidden" name="jenis_pendidikan[]" value="6">
                                                        <input type="text" name="pendidikan[]" class="form-control" required>
                                                        <input type="text" name="tahun_pendidikan[]" class="form-control mt-2" placeholder="Tahun Lulus">
                                                        <input type="text" name="jurusan_pendidikan[]" class="form-control mt-2" placeholder="Jurusan, Bila Ada">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label for="">Doktoral</label>
                                                        <input type="hidden" name="jenis_pendidikan[]" value="7">
                                                        <input type="text" name="pendidikan[]" class="form-control" required>
                                                        <input type="text" name="tahun_pendidikan[]" class="form-control mt-2" placeholder="Tahun Lulus">
                                                        <input type="text" name="jurusan_pendidikan[]" class="form-control mt-2" placeholder="Jurusan, Bila Ada">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END PENDIDIKAN FORMAL -->
                                        <!-- PENDIDIKAN NON FORMAL -->
                                        <h5 class="mt-3 mb-0">PENDIDIKAN NON FORMAL |<span style="font-size: 13px;"> Sebelum bergabung</span></h5>
                                        <span style="font-size: 13px;">(Sertifikasi, Pelatihan Kerja, Kursus/Seminar, dll)</span>
                                        <div class="border rounded p-3 mt-2">
                                            <div class="multi-input-container2">
                                                <div class="row mt-2 multi-input-item2">
                                                    <div class="col-12 col-md-6">
                                                        <div class="mb-2">
                                                            <label for="">Nama Lembaga</label>
                                                            <input type="text" name="lembaga_pendidikan_nonformal[]" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="mb-2">
                                                            <label for="">Periode Tahun</label>
                                                            <input type="number" min="1" name="tahun_nonformal[]" class="form-control" required>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="mb-2">
                                                            <label for="">Deskripsi</label>
                                                            <textarea name="deskripsi_nonformal[]" class="form-control" required></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <button type="button" class="btn btn-sm btn-success multi-input-add2">Tambah Data</button>
                                        </div>
                                        <!-- END PENDIDIKAN NON FORMAL -->

                                        <!-- KEMAMPUAN -->
                                        <h5 class="mt-3">KEMAMPUAN</h5>
                                        <div class="border rounded p-3 mt-2">
                                            <div class="multi-input-container3">
                                                <div class="row multi-input-item3">
                                                    <div class="col-md-6 pb-0">
                                                        <div class="mb-1">
                                                            <input type="text" class="form-control" required name="nama_kemampuan[]" placeholder="Kemampuan Yang Dikuasai">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6 pb-0">
                                                        <div class="mb-1">
                                                            <select name="tingkat_kemampuan[]" class="form-control" required>
                                                                <option value="">-- Pilih Tingkatan --</option>
                                                                <option value="1">Beginner</option>
                                                                <option value="2">Intermediate</option>
                                                                <option value="3">Proficient</option>
                                                                <option value="4">Expert</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <button type="button" class="btn btn-sm btn-success multi-input-add3">Tambah Data</button>
                                        </div>
                                        <!-- END KEMAMPUAN -->

                                        <!-- HOBI -->
                                        <h5 class="mt-3">Hobi</h5>
                                        <div class="border rounded p-3 mt-2">
                                            <div class="mb-2">
                                                <textarea class="form-control" required name="hobi" id="" cols="30"></textarea>
                                            </div>
                                        </div>
                                        <!-- END HOBI -->

                                        <!-- KELUARGA YANG BISA DIHUBUNGI -->
                                        <h5 class=" mt-3">KELUARGA YANG BISA DIHUBUNGI</h5>
                                        <div class="border rounded p-3 mt-2">
                                            <div class="row">
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label for="" class="form-label">Nama Lengkap sesuai KTP</label>
                                                        <input type="text" class="form-control" required name="nama_kontak_alt">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label for="" class="form-label">Hubungan Keluarga</label>
                                                        <input type="text" class="form-control" required name="hubungan_keluarga_kontak_alt">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label for="">Nomor Seluler Kerluarga</label>
                                                        <input type="text" name="no_telp_kontak_alt" class="form-control" required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-2">
                                                        <label for="">Alamat E-mail Keluarga</label>
                                                        <input type="text" name="email_kontak_alt" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-12">
                                                    <div class="mb-2">
                                                        <label for="" class="form-label">Alamat Lengkap</label>
                                                        <textarea name="alamat_kontak_alt" class="form-control" required></textarea>
                                                        <input type="text" name="kode_pos_kontak_alt" class="form-control mt-2" placeholder="Kode POS">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END KELUARGA YANG BISA DIHUBUNGI -->
                                        <!-- PENGALAMAN ORGANISASI -->
                                        <h5 class="mt-3 mb-0">PENGALAMAN ORGANISASI</h5>
                                        <span style="font-size: 13px;">Sebelum Bergabung</span>
                                        <div class="border rounded p-3 mt-2">
                                            <div class="multi-input-container">
                                                <div class="row multi-input-item">
                                                    <div class="col-12 col-md-5">
                                                        <div class="mb-2">
                                                            <label for="">Nama Lembaga / Organisasi</label>
                                                            <input type="text" name="lembaga_organisasi[]" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-5">
                                                        <div class="mb-2">
                                                            <label for="">Jabatan di Lembaga / Organisasi</label>
                                                            <input type="text" name="jabatan_organisasi[]" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-2">
                                                        <div class="mb-2">
                                                            <label for="">Periode Keaktifan</label>
                                                            <input type="text" name="periode_aktif_organisasi[]" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <button type="button" class="btn btn-sm btn-success multi-input-add">Tambah Data</button>
                                        </div>
                                        <!-- END PENGALAMAN ORGANISASI -->
                                        <!-- PENGALAMAN PEKERJAAN -->
                                        <h5 class="mt-3">PENGALAMAN PEKERJAAN</h5>
                                        <div class="border rounded p-3 mt-2">
                                            <div class="multi-input-container1">
                                                <div class="row multi-input-item1">
                                                    <div class="col-12 col-md-6">
                                                        <div class="mb-2">
                                                            <label for="">Nama Lembaga</label>
                                                            <input type="text" name="nama_lembaga_pekerjaan[]" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="mb-2">
                                                            <label for="">Nama Pekerjaan</label>
                                                            <input type="text" name="nama_pekerjaan[]" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="mb-2">
                                                            <label for="">Lokasi Lembaga</label>
                                                            <input type="text" name="lokasi_pekerjaan[]" class="form-control">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="mb-2">
                                                            <label for="">Periode Pekerjaan</label>
                                                            <input type="text" name="periode_pelaksanaan_pekerjaan[]" class="form-control">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <button type="button" class="btn btn-sm btn-success multi-input-add1">Tambah Data</button>
                                        </div>
                                        <!-- END PENGALAMAN PEKERJAAN -->
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="setelah-bergabung" role="tabpanel" aria-labelledby="setelah-bergabung-tab">
                                    <p class="alert alert-secondary text-center" style="font-size: 13px !important;">Lengkapi terlebih dahulu <b>Data Sebelum Bergabung</b></p>
                                </div>
                                <div class="tab-pane fade" id="dokumen-pendukung" role="tabpanel" aria-labelledby="dokumen-pendukung-tab">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                                <label for="">KTP</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="file_ktp">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                                <label for="">NPWP</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="file_npwp">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                                <label for="">Ijazah Terakhir</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="file_ijazah">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                                <label for="">Transkrip Nilai Terakhir</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="file_transkrip_nilai">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                                <label for="">Sertifikat</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="file_sertifikat">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                                <label for="">Salinan Buku Bank</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="file_salinan_bank">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                                <label for="">SIM A, B, C</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="file_sim">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                                <label for="">Kartu Keluarga</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="file_kk">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                                <label for="">Passport, Bila Ada</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="file_passport">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                                <label for="">Salinan Kartu Anggota Asuransi, Bila Ada</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="file_asuransi">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                                <label for="">Pekalaring / Surat Ket. Pengalaman Kerja</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="file_pakelaring">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                                <label for="">Kartu Kuning, Bila Ada</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="file_kartu_kuning">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                                <label for="">Surat Keterangan Catatan Kepolisian, Bila Ada</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="file_skck">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="mb-2">
                                                <label for="">Kartu Vaksin</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="file_vaksin">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-primary" type="submit">Submit</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Dokumen -->
<div class="modal fade" id="dokumenPersyaratan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Preview</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="" alt="" class="img-fluid fileSakip d-none">
                <iframe src="" frameborder="0" id="fileSakipPDF" style="display: block;width:100%;height:400px;"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="/assets/js/app/file-preview.js"></script>
<script src="/assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- Include Choices JavaScript -->
<script src="/assets/vendors/choices.js/choices.min.js"></script>
<script>
    $(function() {
        // Summernote
        $('#isi_berita_ind').summernote({
            placeholder: 'Start writing or type',
            height: 500,
            toolbar: [
                ['style', ['bold', 'italic', 'underline', 'clear']],
                ['color', ['color']],
                ['para', ['ul', 'ol', 'paragraph']],
                ['insert', ['link', 'picture', 'video']],
                ['view', ['fullscreen', 'codeview', 'help']],
            ],
        });

        // multi input pengalaman organisasi
        $('.multi-input-add').on('click', function() {
            var item = $('.multi-input-item').first().clone();
            item.prepend('<div class="col-12"><hr></div>');
            item.append('<div class="col-12"><button type="button" class="btn btn-sm btn-danger mb-2 multi-input-delete">Hapus Data</button></div>');
            $('.multi-input-container').append(item);
        })

        $(document).on('click', '.multi-input-delete', function() {
            var parent = $(this).closest('.multi-input-item');
            parent.remove();
        })

        // multi input pengalaman pekerjaan
        $('.multi-input-add1').on('click', function() {
            var item1 = $('.multi-input-item1').first().clone();
            item1.prepend('<div class="col-12"><hr></div>');
            item1.append('<div class="col-12"><button type="button" class="btn btn-sm btn-danger mb-2 multi-input-delete1">Hapus Data</button></div>');
            $('.multi-input-container1').append(item1);
        })

        $(document).on('click', '.multi-input-delete1', function() {
            var parent1 = $(this).closest('.multi-input-item1');
            parent1.remove();
        })

        // multi input pendidikan non formal
        $('.multi-input-add2').on('click', function() {
            var item2 = $('.multi-input-item2').first().clone();
            item2.prepend('<div class="col-12"><hr></div>');
            item2.append('<div class="col-12"><button type="button" class="btn btn-sm btn-danger mb-2 multi-input-delete2">Hapus Data</button></div>');
            $('.multi-input-container2').append(item2);
        })

        $(document).on('click', '.multi-input-delete2', function() {
            var parent2 = $(this).closest('.multi-input-item2');
            parent2.remove();
        })

        // multi input kemampuan
        $('.multi-input-add3').on('click', function() {
            var item3 = $('.multi-input-item3').first().clone();
            item3.prepend('<div class="col-12"><hr></div>');
            item3.append('<div class="col-12"><button type="button" class="btn btn-sm btn-danger mt-1 multi-input-delete3">Hapus Data</button></div>');
            $('.multi-input-container3').append(item3);
        })

        $(document).on('click', '.multi-input-delete3', function() {
            var parent3 = $(this).closest('.multi-input-item3');
            parent3.remove();
        })
    });
</script>

<script>
    $(".foto_utama").change(function() {
        console.log("test");
        var file = $(this).get(0).files[0];
        if (file) {
            var reader = new FileReader();

            reader.onload = function() {
                $(".foto_utama_preview").attr("src", reader.result);
                $(".foto_utama_temp").val(reader.result);
            };
            reader.readAsDataURL(file);
        }
    });
</script>


<?php include(__DIR__ . '/../layouts/admin-footer.php'); ?>