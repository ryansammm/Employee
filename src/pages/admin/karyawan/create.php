<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<!-- Include Choices CSS -->
<link rel="stylesheet" href="/assets/vendors/choices.js/choices.min.css" />




<div class="content-wrapper" id="top">



    <div class="bs-stepper">
        <div class="bs-stepper-header" role="tablist" style="background-color: #9191912e;">
            <!-- your steps here -->
            <div class="step" data-target="#sebelum-bergabung">
                <button type="button" class="step-trigger" role="tab" aria-controls="sebelum-bergabung" id="sebelum-bergabung-trigger">
                    <span class="bs-stepper-circle">1</span>
                    <span class="bs-stepper-label">Data Sebelum Bergabung</span>
                </button>
            </div>
            <div class="line"></div>
            <div class="step" data-target="#sesudah-bergabung">
                <button type="button" class="step-trigger" role="tab" aria-controls="sesudah-bergabung" id="sesudah-bergabung-trigger">
                    <span class="bs-stepper-circle">2</span>
                    <span class="bs-stepper-label">Data Sesudah Bergabung</span>
                </button>
            </div>
            <div class="line"></div>
            <div class="step" data-target="#data-pendukung">
                <button type="button" class="step-trigger" role="tab" aria-controls="data-pendukung" id="data-pendukung-trigger">
                    <span class="bs-stepper-circle">3</span>
                    <span class="bs-stepper-label">Data Pendukung</span>
                </button>
            </div>
        </div>

        <div class="bs-stepper-content">
            <form action="/admin/karyawan/store" method="POST" enctype="multipart/form-data">


                <div id="sebelum-bergabung" class="content" role="tabpanel" aria-labelledby="sebelum-bergabung-trigger">
                    <div class="content-header">
                        <div class="container">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <div class="d-flex">
                                        <a href="/admin/karyawan" class="btn btn-sm btn-danger mr-2"><i class="fas fa-arrow-left text-white"></i></a>
                                        <h1 class="m-0" style="font-size: 18px !important;">Tambah Karyawan</h1>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right" style="font-size: 13px !important;">
                                        <li class="breadcrumb-item"><a href="#">Karyawan</a></li>
                                        <li class="breadcrumb-item"><a href="#">Kelola Karyawan</a></li>
                                        <li class="breadcrumb-item active">Tambah Kolom Karyawan</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="card">
                            <div class="card-body">
                                <!-- IDENTITAS KARYAWAN -->
                                <h5>IDENTITAS KARYAWAN</h5>
                                <div class="border rounded p-3">
                                    <div class="row">

                                        <div class="col-md-2">
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
                                                        <input type="date" name="tgl_mulai_kerja" class="form-control" required value="<?= date("Y-m-d") ?>">
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
                                                        <option value="<?= $data['id_jabatan'] ?>"><?= $data['nama_jabatan'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="mb-2">
                                                <label for="">Divisi *</label>
                                                <select name="id_divisi" class="form-control" required>
                                                    <option value=""> -- Pilih Jabatan -- </option>
                                                    <?php foreach ($divisi->items as $key => $data) { ?>
                                                        <option value="<?= $data['id_divisi'] ?>"><?= $data['nama_divisi'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="mb-2">
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
                                    <button type="button" class="btn btn-sm btn-success multi-input-add2">Tambah Kolom</button>
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
                                    <button type="button" class="btn btn-sm btn-success multi-input-add3">Tambah Kolom</button>
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

                                <!------- Karakter ------->
                                <h5 class="mt-3">Karakter</h5>
                                <div class="border rounded p-3 mt-2">
                                    <div class="mb-2">
                                        <textarea class="form-control" required name="karakter" id="" cols="30"></textarea>
                                    </div>
                                </div>
                                <!------- End Karakter ------->

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
                                    <button type="button" class="btn btn-sm btn-success multi-input-add">Tambah Kolom</button>
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
                                    <button type="button" class="btn btn-sm btn-success multi-input-add1">Tambah Kolom</button>
                                </div>
                                <!-- END PENGALAMAN PEKERJAAN -->
                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-end">
                                    <a href="#top" class="btn btn-sm btn-primary" id="next-form" onclick="stepper.next()">Next</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="sesudah-bergabung" class="content" role="tabpanel" aria-labelledby="sesudah-bergabung-trigger">
                    <div class="content-header">
                        <div class="container">
                            <div class="row mb-2">
                                <div class="col-sm-6 pl-0">
                                    <div class="d-flex">
                                        <a href="/admin/karyawan" class="btn btn-sm btn-danger mr-2"><i class="fas fa-arrow-left text-white"></i></a>
                                        <h1 class="m-0" style="font-size: 18px !important;">Tambah Karyawan</h1>
                                    </div>
                                </div>
                                <div class="col-sm-6 pr-0">
                                    <ol class="breadcrumb float-sm-right" style="font-size: 13px !important;">
                                        <li class="breadcrumb-item"><a href="#">Karyawan</a></li>
                                        <li class="breadcrumb-item"><a href="#">Kelola Karyawan</a></li>
                                        <li class="breadcrumb-item active">Tambah Kolom Karyawan</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card container">
                        <div class="card-body">
                            <!-- PENDIDIKAN NON FORMAL -->
                            <h5 class="mt-3 mb-0">PENDIDIKAN NON FORMAL |<span style="font-size: 13px;"> Setelah bergabung</span></h5>
                            <span style="font-size: 13px;">(Sertifikasi, Pelatihan Kerja, Kursus/Seminar, dll)</span>
                            <div class="card mt-3">
                                <div class="card-body">
                                    <div class="multi-input-container4">
                                        <?php if (empty($pendidikan_non_formal_bergabung->items)) { ?>
                                            <div class="row mt-2 multi-input-item4">
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="">Nama Lembaga</label>
                                                        <input type="text" name="lembaga_pendidikan_nonformal_setelah[]" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="">Periode Tahun</label>
                                                        <input type="number" min="1" name="tahun_nonformal_setelah[]" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="">Deskripsi</label>
                                                        <textarea name="deskripsi_nonformal_setelah[]" class="form-control"></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <?php foreach ($pendidikan_non_formal_bergabung->items as $key => $value) { ?>
                                                <div class="row mt-2 multi-input-item4">
                                                    <div class="col-12 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="">Nama Lembaga</label>
                                                            <input type="text" name="lembaga_pendidikan_nonformal_setelah[]" class="form-control" value="<?= $value['nama_lembaga'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="">Periode Tahun</label>
                                                            <input type="number" min="1" name="tahun_nonformal_setelah[]" class="form-control" value="<?= $value['periode_tahun'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="">Deskripsi</label>
                                                            <textarea name="deskripsi_nonformal_setelah[]" class="form-control"><?= $value['deskripsi'] ?></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                    <button type="button" class="btn btn-sm mt-2 btn-success multi-input-add4">Tambah Kolom</button>
                                </div>
                            </div>
                            <!-- END PENDIDIKAN NON FORMAL -->
                            <!-- PENGALAMAN ORGANISASI -->
                            <h5 class="mt-3 mb-0">PENGALAMAN ORGANISASI</h5>
                            <span style="font-size: 13px;">Setelah Bergabung</span>
                            <div class="card mt-3">
                                <div class="card-body">
                                    <div class="multi-input-container5">
                                        <?php if (empty($pengalaman_organisasi_bergabung->items)) { ?>
                                            <div class="row multi-input-item5">
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="">Nama Lembaga / Organisasi</label>
                                                        <input type="text" name="lembaga_organisasi_setelah[]" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="">Jabatan di Lembaga / Organisasi</label>
                                                        <input type="text" name="jabatan_organisasi_setelah[]" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="">Periode Keaktifan</label>
                                                        <input type="text" name="periode_aktif_organisasi_setelah[]" class="form-control">
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } else { ?>
                                            <?php foreach ($pengalaman_organisasi_bergabung->items as $key => $value) { ?>
                                                <div class="row multi-input-item5">
                                                    <div class="col-12 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="">Nama Lembaga / Organisasi</label>
                                                            <input type="text" name="lembaga_organisasi_setelah[]" class="form-control" value="<?= $value['nama_organisasi'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="">Jabatan di Lembaga / Organisasi</label>
                                                            <input type="text" name="jabatan_organisasi_setelah[]" class="form-control" value="<?= $value['jabatan_organisasi'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="">Periode Keaktifan</label>
                                                            <input type="text" name="periode_aktif_organisasi_setelah[]" class="form-control" value="<?= $value['periode_aktif'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php } ?>
                                        <?php } ?>
                                    </div>
                                    <button type="button" class="btn btn-sm mt-2 btn-success multi-input-add5">Tambah Kolom</button>
                                </div>
                            </div>
                            <!-- END PENGALAMAN ORGANISASI -->
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-end">
                                <a href="#top" class="btn btn-sm btn-primary mr-1" id="next-form" onclick="stepper.previous()">Previous</a>
                                <a href="#top" class="btn btn-sm btn-primary" id="next-form" onclick="stepper.next()">Next</a>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="data-pendukung" class="content" role="tabpanel" aria-labelledby="data-pendukung-trigger">
                    <div class="content-header">
                        <div class="container">
                            <div class="row mb-2">
                                <div class="col-sm-6 pl-0">
                                    <div class="d-flex">
                                        <a href="/admin/karyawan" class="btn btn-sm btn-danger mr-2"><i class="fas fa-arrow-left text-white"></i></a>
                                        <h1 class="m-0" style="font-size: 18px !important;">Tambah Karyawan</h1>
                                    </div>
                                </div>
                                <div class="col-sm-6 pr-0">
                                    <ol class="breadcrumb float-sm-right" style="font-size: 13px !important;">
                                        <li class="breadcrumb-item"><a href="#">Karyawan</a></li>
                                        <li class="breadcrumb-item"><a href="#">Kelola Karyawan</a></li>
                                        <li class="breadcrumb-item active">Tambah Kolom Karyawan</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card container">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="mb-2">
                                        <label for="">KTP *</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file_ktp">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-2">
                                        <label for="">NPWP *</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file_npwp">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-2">
                                        <label for="">Ijazah Terakhir *</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file_ijazah">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-2">
                                        <label for="">Transkrip Nilai Terakhir *</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file_transkrip_nilai">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="multi-input-container6">
                                        <div class="mb-2 multi-input-item6">
                                            <label for="">Sertifikat *</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="file_sertifikat[]">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-sm btn-success multi-input-add6 mb-1">Tambah Kolom</button>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-2">
                                        <label for="">Salinan Buku Bank *</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file_salinan_bank">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-2">
                                        <label for="">SIM A, Bila Ada</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file_sim_a">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-2">
                                        <label for="">SIM B1, Bila Ada</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file_sim_b1">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-2">
                                        <label for="">SIM B2, Bila Ada</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file_sim_b2">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-2">
                                        <label for="">SIM C</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file_sim_c">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-2">
                                        <label for="">SIM D, Bila Ada</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file_sim_d">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-2">
                                        <label for="">Kartu Keluarga *</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file_kk">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-2">
                                        <label for="">Passport, Bila Ada</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file_passport">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-2">
                                        <label for="">Salinan Kartu Anggota Asuransi, Bila Ada</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file_asuransi">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-2">
                                        <label for="">Pekalaring / Surat Ket. Pengalaman Kerja *</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file_pakelaring">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-2">
                                        <label for="">Kartu Kuning, Bila Ada</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file_kartu_kuning">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-2">
                                        <label for="">Surat Keterangan Catatan Kepolisian, Bila Ada</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file_skck">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="mb-2">
                                        <label for="">Kartu Vaksin *</label>
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="file_vaksin">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-end">
                                <a href="#top" class="btn btn-sm btn-primary mr-1" onclick="stepper.previous()">Previous</a>
                                <button type="submit" class="btn btn-sm btn-success">Submit</button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
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
    $(document).ready(function() {
        $('input[type="text"]').val('Contoh');
        // $('input[name="alamt_ktp"]').val('Link. Talun Kidul No.29 RT.01/RW.06, Kel. Talun, Kec. Sumedang Utara, Kab. SUmedang');
        $('textarea').html('DESKRIPSI');
        $('input[type="number"]').val('1');
        $("select").prop("selectedIndex", 1);
        $('input[type="date"]').val('2020-01-01');

    })
</script>

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
            item.append('<div class="col-12"><button type="button" class="btn btn-sm btn-danger mb-2 multi-input-delete">Hapus Kolom</button></div>');
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
            item1.append('<div class="col-12"><button type="button" class="btn btn-sm btn-danger mb-2 multi-input-delete1">Hapus Kolom</button></div>');
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
            item2.append('<div class="col-12"><button type="button" class="btn btn-sm btn-danger mb-2 multi-input-delete2">Hapus Kolom</button></div>');
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
            item3.append('<div class="col-12"><button type="button" class="btn btn-sm btn-danger mt-1 multi-input-delete3">Hapus Kolom</button></div>');
            $('.multi-input-container3').append(item3);
        })

        $(document).on('click', '.multi-input-delete3', function() {
            var parent3 = $(this).closest('.multi-input-item3');
            parent3.remove();
        })

        // multi input pendidikan non formal setelah bergabung
        $('.multi-input-add4').on('click', function() {
            var item4 = $('.multi-input-item4').first().clone();
            item4.prepend('<div class="col-12"><hr></div>');
            item4.append('<div class="col-12"><button type="button" class="btn btn-sm btn-danger mt-1 multi-input-delete4">Hapus Kolom</button></div>');
            $('.multi-input-container4').append(item4);
        })

        $(document).on('click', '.multi-input-delete4', function() {
            var parent4 = $(this).closest('.multi-input-item4');
            parent4.remove();
        })

        // multi input pengalaman organisasi setelah bergabung
        $('.multi-input-add5').on('click', function() {
            var item5 = $('.multi-input-item5').first().clone();
            item5.prepend('<div class="col-12"><hr></div>');
            item5.append('<div class="col-12"><button type="button" class="btn btn-sm btn-danger multi-input-delete5">Hapus Kolom</button></div>');
            $('.multi-input-container5').append(item5);
        })

        $(document).on('click', '.multi-input-delete5', function() {
            var parent5 = $(this).closest('.multi-input-item5');
            parent5.remove();
        })

        // multi sertifikat
        $('.multi-input-add6').on('click', function() {
            var item6 = $('.multi-input-item6').first().clone();
            item6.prepend('<hr class="mb-0">');
            item6.append('<button type="button" class="btn btn-sm btn-danger mt-1 multi-input-delete6">Hapus Kolom</button>');
            $('.multi-input-container6').append(item6);
        })

        $(document).on('click', '.multi-input-delete5', function() {
            var parent6 = $(this).closest('.multi-input-item6');
            parent6.remove();
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

<script>
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function() {
        window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })
</script>

<!-- <script>
    $('#next-form').click(function() {
        window.scrollTo(0, 0);
    })
</script> -->


<?php include(__DIR__ . '/../layouts/admin-footer.php'); ?>