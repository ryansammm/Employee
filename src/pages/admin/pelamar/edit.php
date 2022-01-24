<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<!-- Include Choices CSS -->
<link rel="stylesheet" href="/assets/vendors/choices.js/choices.min.css" />

<script>
    var page1 = function() {
        var stepper = new Stepper(document.querySelector('.bs-stepper'))

        stepper.to(1)
    }

    var page2 = function() {
        var stepper = new Stepper(document.querySelector('.bs-stepper'))

        stepper.to(2)
    }

    var page3 = function() {
        var stepper = new Stepper(document.querySelector('.bs-stepper'))

        stepper.to(3)
    }

    var page4 = function() {
        var stepper = new Stepper(document.querySelector('.bs-stepper'))

        stepper.to(4)
    }
</script>


<div class="content-wrapper" id="top">
    <div class="bs-stepper">
        <div class="bs-stepper-header" role="tablist" style="background-color: #9191912e;">
            <!-- your steps here -->
            <div class="step" data-target="#sebelum-bergabung">
                <button type="button" onclick="page1()" class="step-trigger" role="tab" aria-controls="sebelum-bergabung" id="sebelum-bergabung-trigger">
                    <span class="bs-stepper-circle">1</span>
                    <span class="bs-stepper-label">Data Utama</span>
                </button>
            </div>
            <div class="line"></div>
            <div class="step" data-target="#sesudah-bergabung">
                <button type="button" onclick="page2()" class="step-trigger" role="tab" aria-controls="sesudah-bergabung" id="sesudah-bergabung-trigger">
                    <span class="bs-stepper-circle">2</span>
                    <span class="bs-stepper-label">Data Pengalaman</span>
                </button>
            </div>
            <div class="line"></div>
            <div class="step" data-target="#survey">
                <button type="button" onclick="page3()" class="step-trigger" role="tab" aria-controls="survey" id="survey-trigger">
                    <span class="bs-stepper-circle">3</span>
                    <span class="bs-stepper-label">Survey</span>
                </button>
            </div>
            <div class="line"></div>
            <div class="step" data-target="#data-pendukung">
                <button type="button" onclick="page4()" class="step-trigger" role="tab" aria-controls="data-pendukung" id="data-pendukung-trigger">
                    <span class="bs-stepper-circle">4</span>
                    <span class="bs-stepper-label">Dokumen Pendukung</span>
                </button>
            </div>
        </div>

        <div class="bs-stepper-content">
            <form action="/admin/pelamar/<?= $detail['id_pelamar'] ?>/update" method="POST" enctype="multipart/form-data">

                <div id="sebelum-bergabung" class="content" role="tabpanel" aria-labelledby="sebelum-bergabung-trigger">
                    <div class="content-header mt-1 pl-0">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <div class="d-flex">
                                        <a href="/admin/pelamar" class="btn btn-sm btn-danger mr-2"><i class="fas fa-arrow-left text-white"></i></a>
                                        <h1 class="m-0" style="font-size: 18px !important;">Ubah Data Pelamar Pekerjaan</h1>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right" style="font-size: 13px !important;">
                                        <li class="breadcrumb-item"><a href="#">Data Pelamar</a></li>
                                        <li class="breadcrumb-item active">Ubah Data Pelamar Pekerjaan</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container">
                        <div class="card">
                            <div class="card-body">
                                <!-- IDENTITAS PRIBADI -->
                                <h5>IDENTITAS PRIBADI</h5>
                                <div class="border rounded px-3 py-2">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="crop">
                                                <img class="foto_utama_preview" src="<?= asset($detail['path_media']) ?>" alt="Donald Duck">
                                            </div>
                                        </div>
                                        <div class="col-md-10">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="mb-2">
                                                        <label for="">Foto Profile</label>
                                                        <div class="custom-file">
                                                            <input type="file" class="custom-file-input foto_utama" name="foto_profile_pelamar">
                                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <div class="mb-2">
                                                        <label for="">Nomor Registrasi *</label>
                                                        <input type="text" name="no_registrasi" class="form-control" value="<?= $detail['no_registrasi'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <div class="mb-2">
                                                        <label for="">Nomor KTP *</label>
                                                        <input type="text" name="no_ktp" class="form-control" value="<?= $detail['no_ktp'] ?>" required>
                                                    </div>
                                                </div>
                                                <!-- <div class="col-12 col-md-4">
                                                    <div class="mb-2">
                                                        <label for="">Nomor Kartu Keluarga *</label>
                                                        <input type="text" name="no_kk" class="form-control" required>
                                                    </div>
                                                </div> -->
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="mb-2">
                                                        <label for="">Nama Lengkap Sesuai KTP *</label>
                                                        <input type="text" name="nama_lengkap" class="form-control" value="<?= $detail['nama_lengkap'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <div class="mb-2">
                                                        <label for="">Nomor Seluler Pribadi *</label>
                                                        <input type="text" name="no_seluler_pribadi" class="form-control" value="<?= $detail['no_seluler_pribadi'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <div class="mb-2">
                                                        <label for="">Alamat Email Pribadi *</label>
                                                        <input type="text" name="email_pribadi" class="form-control" value="<?= $detail['email_pribadi'] ?>" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="mb-2">
                                                        <label for="">Nama Panggilan *</label>
                                                        <input type="text" name="nama_panggilan" class="form-control" value="<?= $detail['nama_panggilan'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <div class="mb-2">
                                                        <label for="">Kewarganegaraan *</label>
                                                        <input type="text" name="kewarganegaraan" class="form-control" value="<?= $detail['kewarganegaraan'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-4">
                                                    <div class="mb-2">
                                                        <label for="">Nomor Passport, Bila Ada</label>
                                                        <input type="text" name="no_passport" class="form-control" value="<?= $detail['no_passport'] ?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-12 col-md-6">
                                            <div class="mb-2">
                                                <label for="">Tempat Lahir *</label>
                                                <input type="text" name="tempat_lahir" class="form-control" value="<?= $detail['tempat_lahir'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="mb-2">
                                                <label for="tgl_lahir" class="form-label">Tanggal Lahir *</label>
                                                <input type="date" class="form-control" required id="tgl_lahir" name="tgl_lahir" value="<?= $detail['tgl_lahir'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="mb-2">
                                                <label for="">Jenis Kelamin *</label>
                                                <select name="jenis_kelamin" class="form-control" required>
                                                    <option value=""> -- Pilih Jenis Kelamin -- </option>
                                                    <option value="1" <?= $detail['jenis_kelamin'] == '1' ? 'selected' : '' ?>>Laki - Laki</option>
                                                    <option value="2" <?= $detail['jenis_kelamin'] == '2' ? 'selected' : '' ?>>Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="mb-2">
                                                <label for="">Status *</label>
                                                <select name="status_perkawinan" class="form-control" required>
                                                    <option value=""> -- Pilih Status Perkawinan -- </option>
                                                    <option value="1" <?= $detail['status_perkawinan'] == '1' ? 'selected' : '' ?>>Sudah Menikah</option>
                                                    <option value="2" <?= $detail['status_perkawinan'] == '2' ? 'selected' : '' ?>>Belum Menikah</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <div class="mb-2">
                                                <label for="">Berat Badan *</label>
                                                <input type="number" min="1" name="berat_badan" class="form-control" value="<?= $detail['berat_badan'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <div class="mb-2">
                                                <label for="">Tinggi Badan *</label>
                                                <input type="number" min="1" name="tinggi_badan" class="form-control" value="<?= $detail['tinggi_badan'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <div class="mb-2">
                                                <label for="">Golongan Darah *</label>
                                                <select name="gol_darah" class="form-control" required>
                                                    <option value=""> -- Pilih Golongan Darah -- </option>
                                                    <option value="1" <?= $detail['gol_darah'] == '1' ? 'selected' : '' ?>>A</option>
                                                    <option value="2" <?= $detail['gol_darah'] == '2' ? 'selected' : '' ?>>B</option>
                                                    <option value="3" <?= $detail['gol_darah'] == '3' ? 'selected' : '' ?>>AB</option>
                                                    <option value="4" <?= $detail['gol_darah'] == '4' ? 'selected' : '' ?>>O</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <div class="mb-2">
                                                <label for="">Agama *</label>
                                                <select name="agama" class="form-control" required>
                                                    <option value=""> -- Pilih Agama -- </option>
                                                    <option value="1" <?= $detail['agama'] == '1' ? 'selected' : '' ?>>Islam</option>
                                                    <option value="2" <?= $detail['agama'] == '2' ? 'selected' : '' ?>>Kristen Protestan</option>
                                                    <option value="3" <?= $detail['agama'] == '3' ? 'selected' : '' ?>>Kristen Katolik</option>
                                                    <option value="4" <?= $detail['agama'] == '4' ? 'selected' : '' ?>>Hindu</option>
                                                    <option value="5" <?= $detail['agama'] == '5' ? 'selected' : '' ?>>Buddha</option>
                                                    <option value="6" <?= $detail['agama'] == '6' ? 'selected' : '' ?>>Khonghucu</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="mb-2">
                                                <label for="">Nomor SIM C</label>
                                                <input type="text" name="no_sim_c" class="form-control" value="<?= $detail['no_sim_c'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="mb-2">
                                                <label for="">No. SIM A/B/B1/B2</label>
                                                <input type="text" name="no_sim_lainnya" class="form-control" value="<?= $detail['no_sim_lainnya'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END IDENTITAS KARYAWAN -->

                                <!------- Start Alamat ------->
                                <h5 class="mt-3">ALAMAT PELAMAR</h5>
                                <div class="row">
                                    <!-- ALAMAT SESUAI KTP -->
                                    <div class="col-6">
                                        <div class="border rounded p-3">
                                            <div class="mb-2">
                                                <label for="">Alamat Sesuai KTP *</label>
                                                <textarea name="alamat_ktp" class="form-control mb-2"><?= $detail['alamat_ktp'] ?></textarea>
                                                <input type="text" name="kode_pos_ktp" class="form-control" required placeholder="Kode POS alamat KTP *" value="<?= $detail['kode_pos_ktp'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END ALAMAT SESUAI KTP -->
                                    <!-- ALAMAT SAAT INI -->
                                    <div class="col-6">
                                        <div class="border rounded p-3">
                                            <div class="mb-2">
                                                <label for="">Alamat tinggal saat ini *</label>
                                                <textarea name="alamat_tinggal" class="form-control mb-2"><?= $detail['alamat_tinggal'] ?></textarea>
                                                <input type="text" name="kode_pos_tinggal" class="form-control" required placeholder="Kode POS alamat tinggal saat ini *" value="<?= $detail['kode_pos_tinggal'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END ALAMAT SAAT INI -->
                                </div>
                                <!------- End Alamat ------->

                                <!-- POSISI / JABATAN YANG DILAMAR -->
                                <h5 class="mt-3">POSISI / JABATAN YANG DILAMAR</h5>
                                <div class="border rounded p-3">
                                    <div class="row">
                                        <div class="col-12 col-md-3">
                                            <div class="mb-2">
                                                <label for="">Posisi / Jabatan *</label>
                                                <input type="text" name="posisi_pelamar" class="form-control" value="<?= $detail['posisi_pelamar'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <div class="mb-2">
                                                <label for="">Tanggal Siap Kerja *</label>
                                                <input type="date" name="tgl_siap_kerja" class="form-control" value="<?= $detail['tgl_siap_kerja'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <div class="mb-2">
                                                <label for="">Gaji Terakhir *</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" style="font-size: 12px;">Rp.</span>
                                                    </div>
                                                    <input type="text" class="form-control" name="gaji_terakhir" value="<?= $detail['gaji_terakhir'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <div class="mb-2">
                                                <label for="">Gaji yang <strong>diharapkan</strong> *</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text" style="font-size: 12px;">Rp.</span>
                                                    </div>
                                                    <input type="text" class="form-control" name="gaji_diharapkan" value="<?= $detail['gaji_diharapkan'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END POSISI / JABATAN YANG DILAMAR -->

                                <!-- ASURANSI -->
                                <h5 class="mt-3">ASURANSI</h5>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="border rounded p-3">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <div class="mb-2">
                                                        <label for="">No. BPJS Ketenagarkerjaan *</label>
                                                        <input type="text" name="no_bpjs_ketenagakerjaan" class="form-control" value="<?= $detail['no_bpjs_ketenagakerjaan'] ?>" required>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-2">
                                                        <label for="">No. BPJS Kesehatan *</label>
                                                        <input type="text" name="no_bpjs_kesehatan" class="form-control" value="<?= $detail['no_bpjs_kesehatan'] ?>" required>
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
                                                        <input type="text" name="nama_asuransi" class="form-control" value="<?= $detail['nama_asuransi'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="mb-2">
                                                        <label for="">Nomor Asuransi</label>
                                                        <input type="text" name="no_asuransi" class="form-control" value="<?= $detail['no_asuransi'] ?>">
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
                                                        <option value="<?= $item['id_bank'] ?>" <?= $item['id_bank'] == $detail['id_bank'] ? 'selected' : '' ?>><?= $item['nama_bank'] ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <div class="mb-2">
                                                <label for="">Nomor Rekening *</label>
                                                <input type="text" name="no_rek_bank" class="form-control" value="<?= $detail['no_rek_bank'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <div class="mb-2">
                                                <label for="">Cabang *</label>
                                                <input type="text" name="cabang_bank" class="form-control" value="<?= $detail['cabang_bank'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-3">
                                            <div class="mb-2">
                                                <label for="">Atas Nama *</label>
                                                <input type="text" name="an_bank" class="form-control" value="<?= $detail['an_bank'] ?>" required>
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
                                                <input type="text" name="no_npwp" class="form-control" value="<?= $detail['no_npwp'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="mb-2">
                                                <label for="">Nama KPP</label>
                                                <input type="text" name="nama_kpp" class="form-control" value="<?= $detail['nama_kpp'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <div class="mb-2">
                                                <label for="">Tanggal Terdaftar</label>
                                                <input type="date" name="tgl_terdaftar_pajak" class="form-control" value="<?= $detail['tgl_terdaftar_pajak'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END PERPAJAKAN -->

                                <!-- PENDIDIKAN FORMAL -->
                                <h5 class="mt-3">PENDIDIKAN FORMAL</h5>
                                <div class="border rounded p-3">
                                    <div class="row">
                                        <?php foreach ($pendidikan_formal->items as $key => $value) { ?>
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3">
                                                    <label for=""><?= $value['nama_pendidikan'] ?></label>
                                                    <input type="hidden" name="jenis_pendidikan[]" value="<?= $key += 1 ?>">
                                                    <input type="text" name="pendidikan[]" class="form-control" value="<?= $value['nama_sekolah'] ?>">
                                                    <input type="text" name="tahun_pendidikan[]" class="form-control mt-2" placeholder="Tahun Lulus" value="<?= $value['tahun_lulus'] ?>">
                                                    <input type="<?= $value['jenis_pendidikan'] < 3 ? 'hidden' : 'text' ?>" name="jurusan_pendidikan[]" class="form-control mt-2" placeholder="Jurusan, Bila Ada" value="<?= $value['jurusan'] ?>">
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <!-- END PENDIDIKAN FORMAL -->

                                <!-- PENDIDIKAN NON FORMAL -->
                                <h5 class="mt-3 mb-0">PENDIDIKAN NON FORMAL |<span style="font-size: 13px;"> Sebelum bergabung</span></h5>
                                <span style="font-size: 13px;">(Sertifikasi, Pelatihan Kerja, Kursus/Seminar, dll)</span>
                                <div class="border p-3 rounded">
                                    <div class="multi-input-container2">
                                        <?php foreach ($pendidikan_non_formal->items as $key => $value) { ?>
                                            <div class="row mt-2 multi-input-item2">
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="">Nama Lembaga</label>
                                                        <input type="text" name="lembaga_pendidikan_nonformal[]" class="form-control" value="<?= $value['nama_lembaga'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="">Periode Tahun</label>
                                                        <input type="number" min="1" name="tahun_nonformal[]" class="form-control" value="<?= $value['periode_tahun'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-12 col-md-6">
                                                    <div class="mb-3">
                                                        <label for="">Deskripsi</label>
                                                        <textarea name="deskripsi_nonformal[]" class="form-control"><?= $value['deskripsi'] ?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php  } ?>
                                    </div>
                                </div>
                                <button type="button" class="btn btn-sm btn-success mt-2 multi-input-add2">Tambah Kolom</button>
                                <!-- END PENDIDIKAN NON FORMAL -->

                                <!-- KEMAMPUAN -->
                                <h5 class="mt-3">KEMAMPUAN</h5>
                                <div class="border rounded p-3 mt-2">
                                    <div class="multi-input-container3">
                                        <?php foreach ($kemampuan->items as $key => $value) { ?>
                                            <div class="row multi-input-item3">
                                                <div class="col-md-6 pb-0">
                                                    <div class="mb-1">
                                                        <input type="text" class="form-control" name="nama_kemampuan[]" placeholder="Kemampuan Yang Dikuasai" value="<?= $value['nama_kemampuan'] ?>">
                                                    </div>
                                                </div>
                                                <div class="col-md-6 pb-0">
                                                    <div class="mb-1">
                                                        <select name="tingkat_kemampuan[]" class="form-control">
                                                            <option value="">-- Pilih Tingkatan --</option>
                                                            <option value="1" <?= $value['tingkat_kemampuan'] == '1' ? 'selected' : '' ?>>Beginner</option>
                                                            <option value="2" <?= $value['tingkat_kemampuan'] == '2' ? 'selected' : '' ?>>Intermediate</option>
                                                            <option value="3" <?= $value['tingkat_kemampuan'] == '3' ? 'selected' : '' ?>>Proficient</option>
                                                            <option value="4" <?= $value['tingkat_kemampuan'] == '4' ? 'selected' : '' ?>>Expert</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <hr>
                                    <button type="button" class="btn btn-sm btn-success multi-input-add3">Tambah Kolom</button>
                                </div>
                                <!-- END KEMAMPUAN -->

                                <!-- HOBI -->
                                <h5 class="mt-3">Hobi</h5>
                                <div class="border rounded p-3 mt-2">
                                    <div class="mb-2">
                                        <textarea class="form-control" required name="hobi" id="" cols="30"><?= $detail['hobi'] ?></textarea>
                                    </div>
                                </div>
                                <!-- END HOBI -->

                                <!------- Karakter ------->
                                <h5 class="mt-3">Karakter</h5>
                                <div class="border rounded p-3 mt-2">
                                    <div class="mb-2">
                                        <textarea class="form-control" required name="karakter" id="" cols="30"><?= $detail['karakter'] ?></textarea>
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
                                                <input type="text" class="form-control" required name="nama_kontak_alt" value="<?= $detail_kontak_alt['nama_kontak_alt'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="mb-2">
                                                <label for="" class="form-label">Hubungan Keluarga</label>
                                                <input type="text" class="form-control" required name="hubungan_keluarga_kontak_alt" value="<?= $detail_kontak_alt['hubungan_keluarga_kontak_alt'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="mb-2">
                                                <label for="">Nomor Seluler Kerluarga</label>
                                                <input type="text" name="no_telp_kontak_alt" class="form-control" value="<?= $detail_kontak_alt['no_telp_kontak_alt'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-6">
                                            <div class="mb-2">
                                                <label for="">Alamat E-mail Keluarga</label>
                                                <input type="text" name="email_kontak_alt" class="form-control" value="<?= $detail_kontak_alt['email_kontak_alt'] ?>">
                                            </div>
                                        </div>
                                        <div class="col-12 col-md-12">
                                            <div class="mb-2">
                                                <label for="" class="form-label">Alamat Lengkap</label>
                                                <textarea name="alamat_kontak_alt" class="form-control" required><?= $detail_kontak_alt['alamat_kontak_alt'] ?></textarea>
                                                <input type="text" name="kode_pos_kontak_alt" class="form-control mt-2" placeholder="Kode POS" value="<?= $detail_kontak_alt['kode_pos_kontak_alt'] ?>">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- END KELUARGA YANG BISA DIHUBUNGI -->

                            </div>
                            <div class="card-footer">
                                <div class="d-flex justify-content-end">
                                    <a href="#top" class="btn btn-sm btn-next" id="next-form" onclick="stepper.next()">Salanjutnya <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="sesudah-bergabung" class="content" role="tabpanel" aria-labelledby="sesudah-bergabung-trigger">
                    <!------- Start Header ------->
                    <div class="content-header mt-1 pl-0">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <div class="d-flex">
                                        <a href="/admin/pelamar" class="btn btn-sm btn-danger mr-2"><i class="fas fa-arrow-left text-white"></i></a>
                                        <h1 class="m-0" style="font-size: 18px !important;">Ubah Data Pelamar Pekerjaan</h1>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right" style="font-size: 13px !important;">
                                        <li class="breadcrumb-item"><a href="#">Data Pelamar</a></li>
                                        <li class="breadcrumb-item active">Ubah Data Pelamar Pekerjaan</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!------- End Header ------->

                    <div class="card">
                        <div class="card-body">
                            <!-- PENGALAMAN PEKERJAAN -->
                            <h5 class="mt-3">PENGALAMAN PEKERJAAN</h5>
                            <div class="border rounded p-3 mt-2">
                                <div class="multi-input-container1">
                                    <?php foreach ($pengalaman_kerja_pelamar->items as $key => $variable) { ?>
                                        <div class="row multi-input-item1">
                                            <div class="col-12 col-md-8">
                                                <div class="mb-2">
                                                    <label for="">Nama Perusahaan</label>
                                                    <input type="text" name="nama_perusahaan_pelamar[]" class="form-control" value="<?= $variable['nama_perusahaan_pelamar'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="mb-2">
                                                    <label for="">Jenis Usaha</label>
                                                    <input type="text" name="jenis_usaha[]" class="form-control" value="<?= $variable['jenis_usaha'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-8">
                                                <div class="mb-2">
                                                    <label for="">Nama Atasan Langsung</label>
                                                    <input type="text" name="nama_atasan[]" class="form-control" value="<?= $variable['nama_atasan'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="mb-2">
                                                    <label for="">No. Telp Kantor / HP Atasan</label>
                                                    <input type="text" name="no_kontak_atasan[]" class="form-control" value="<?= $variable['no_kontak_atasan'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-8">
                                                <div class="mb-2">
                                                    <label for="">Jabatan Terakhir</label>
                                                    <input type="text" name="jabatan_terakhir[]" class="form-control" value="<?= $variable['jabatan_terakhir'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="mb-2">
                                                    <label for="">Tanggal Berhenti Bekerja</label>
                                                    <input type="date" name="tgl_berhenti[]" class="form-control" value="<?= $variable['tgl_berhenti'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-12">
                                                <div class="mb-2">
                                                    <label for="">Alasan</label>
                                                    <textarea class="form-control" name="alasan_berhenti[]" id="" cols="30"><?= $variable['alasan_berhenti'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <hr>
                                <button type="button" class="btn btn-sm btn-success multi-input-add1">Tambah Kolom</button>
                            </div>
                            <!-- END PENGALAMAN PEKERJAAN -->

                            <!-- PENGALAMAN ORGANISASI -->
                            <h5 class="mt-3 mb-0">PENGALAMAN ORGANISASI</h5>
                            <div class="border rounded p-3 mt-2">
                                <div class="multi-input-container">
                                    <div class="row multi-input-item">
                                        <?php foreach ($pengalaman_organisasi->items as $key => $variable) { ?>
                                            <div class="col-12 col-md-5">
                                                <div class="mb-2">
                                                    <label for="">Nama Lembaga / Organisasi</label>
                                                    <input type="text" name="lembaga_organisasi[]" class="form-control" value="<?= $variable['nama_organisasi'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-5">
                                                <div class="mb-2">
                                                    <label for="">Jabatan di Lembaga / Organisasi</label>
                                                    <input type="text" name="jabatan_organisasi[]" class="form-control" value="<?= $variable['jabatan_organisasi'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-2">
                                                <div class="mb-2">
                                                    <label for="">Periode Keaktifan</label>
                                                    <input type="text" name="periode_aktif_organisasi[]" class="form-control" value="<?= $variable['periode_aktif'] ?>">
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <hr>
                                <button type="button" class="btn btn-sm btn-success multi-input-add">Tambah Kolom</button>
                            </div>
                            <!-- END PENGALAMAN ORGANISASI -->

                            <!-- KURSUS / SEMINAR YANG PERNAH DIIKUTI -->
                            <h5 class="mt-3 mb-0">KURSUS / SEMINAR YANG PERNAH DIIKUTI</h5>
                            <div class="border rounded p-3 mt-2">
                                <div class="multi-input-container7">
                                    <?php foreach ($kursus->items as $key => $variable) { ?>
                                        <div class="row multi-input-item7">
                                            <div class="col-12 col-md-2">
                                                <div class="mb-2">
                                                    <label for="">Tahun</label>
                                                    <input type="text" name="tahun_kursus[]" class="form-control" value="<?= $variable['tahun_kursus'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="mb-2">
                                                    <label for="">Nama Lembaga</label>
                                                    <input type="text" name="nama_lembaga_kursus[]" class="form-control" value="<?= $variable['nama_lembaga_kursus'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="mb-2">
                                                    <label for="">Deskripsi</label>
                                                    <input type="text" name="deskripsi_kursus[]" class="form-control" value="<?= $variable['deskripsi_kursus'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                </div>
                                <hr>
                                <button type="button" class="btn btn-sm btn-success multi-input-add7">Tambah Kolom</button>
                            </div>
                            <!-- END KURSUS / SEMINAR YANG PERNAH DIIKUTI -->

                            <!-- Start Kemampuan Bahasa -->
                            <h5 class="mt-3 mb-0">KEMAMPUAN BAHASA <span>(Ya/Tidak)</span></h5>
                            <div class="border rounded p-3 mt-2">
                                <div class="">
                                    <div class="row multi-input-container8">
                                        <?php foreach ($kemampuan_bahasa->items as $key => $variable) { ?>
                                            <div class="col-md-6 multi-input-item8">
                                                <div class="border rounded p-3 mt-2">
                                                    <div class="row">
                                                        <div class="col-12 col-md-12">
                                                            <div class="mb-2">
                                                                <label for="">Nama Bahasa</label>
                                                                <input type="text" name="nama_bahasa[]" class="form-control" value="<?= $variable['nama_bahasa'] ?>">
                                                            </div>
                                                            <div class="mb-2">
                                                                <div class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" id="customRadioInline1" name="kemampuan_bahasa" value="1" class="custom-control-input" <?= $variable['kemampuan_bahasa'] == 1 ? 'checked' : '' ?>>
                                                                    <label class="custom-control-label my-auto" for="customRadioInline1" style="line-height: 24px;">Lisan / Tulis Aktif</label>
                                                                </div>
                                                                <div class="custom-control custom-radio custom-control-inline">
                                                                    <input type="radio" id="customRadioInline2" name="kemampuan_bahasa" value="2" class="custom-control-input" <?= $variable['kemampuan_bahasa'] == 2 ? 'checked' : '' ?>>
                                                                    <label class="custom-control-label my-auto" for="customRadioInline2" style="line-height: 24px;">Lisan / Tulis Pasif</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <hr>
                                <button type="button" class="btn btn-sm btn-success multi-input-add8">Tambah Kolom</button>
                            </div>
                        </div>
                        <!-- End Kampuan Bahasa -->

                        <div class="card-footer">
                            <div class="d-flex justify-content-end">
                                <a href="#top" class="btn btn-sm btn-next mr-1" id="next-form" onclick="stepper.previous()"><i class="fa fa-chevron-left" aria-hidden="true"></i> Sebelumnya</a>
                                <a href="#top" class="btn btn-sm btn-next" id="next-form" onclick="stepper.next()">Salanjutnya <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="survey" class="content" role="tabpanel" aria-labelledby="survey-trigger">
                    <!------- Start Header ------->
                    <div class="content-header mt-1 pl-0">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <div class="d-flex">
                                        <a href="/admin/pelamar" class="btn btn-sm btn-danger mr-2"><i class="fas fa-arrow-left text-white"></i></a>
                                        <h1 class="m-0" style="font-size: 18px !important;">Ubah Data Pelamar Pekerjaan</h1>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right" style="font-size: 13px !important;">
                                        <li class="breadcrumb-item"><a href="#">Data Pelamar</a></li>
                                        <li class="breadcrumb-item active">Ubah Data Pelamar Pekerjaan</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!------- End Header ------->

                    <!------- Survey ------->
                    <div class="card">
                        <div class="card-body">
                            <div class="row justify-content-between mb-2">
                                <h5>PERTANYAAN & JAWABAN</h5>
                                <h6 class="float-right" style="font-size: 9px;font-weight: 600;">> Jawab dengan Singkat dan lugas.</h6>
                            </div>
                            <div class="border rounded p-3">
                                <div class="mb-3">
                                    <label for="">Darimana Anda Mengetahui PT. Tristek Media Kreasindo (TMK) ? Sebutkan media / sumber informasinya</label>
                                    <textarea name="alamat_ktp" class="form-control mb-2"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">Mengapa Anda tertarik melaksanakan Program Karyawan Lepas di Perusahaan ini?</label>
                                    <textarea name="alamat_ktp" class="form-control mb-2"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">Apakah anda bersedia mengikuti seluruh kebijakan dan peraturan yang ada di PT> Tristek Media Kreasindo (TMK)? Jika tidak sebutkan alasannya</label>
                                    <textarea name="alamat_ktp" class="form-control mb-2"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">Apakah Anda bersedia untuk menjaga kerahasiaan data dan / atau informasi yang ada di PT. Tristek Media Kreasindo (TMK)?</label>
                                    <textarea name="alamat_ktp" class="form-control mb-2"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">Apakah Anda bisa mengendarai kendaraan bermotor dan memiliki kelengkapan pendukungnya (SIM & STNK)?</label>
                                    <textarea name="alamat_ktp" class="form-control mb-2"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">Apakah Anda bersedia untuk ikut pekerjaan lembur di hari kerja maupun libur?</label>
                                    <textarea name="alamat_ktp" class="form-control mb-2"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">Apakah Anda pernah berurusan dengan Pihak Berwajib karena tindak kejahatan?</label>
                                    <textarea name="alamat_ktp" class="form-control mb-2"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">Apakah Anda pernah tertular virus corona (Covid-19)? Jika iya, sebutkan kapan tertularnya dan penanganan / pengecekan apa yang anda lakukan!</label>
                                    <textarea name="alamat_ktp" class="form-control mb-2"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">Apakah Anda pernah menderita penyakit tertular lainnya? Jika iya, sebutkan kapan tertularnya dan penanganan / pengecekan apa yang anda lakukan!</label>
                                    <textarea name="alamat_ktp" class="form-control mb-2"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">Apakah Anda pernah menderita penyakit yang memerlukan perawatan khusus dan lama? Jika iya, sebutkan kapan tertularnya dan penanganan / pengecekan apa yang anda lakukan!</label>
                                    <textarea name="alamat_ktp" class="form-control mb-2"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">Apakah Anda bersedia mengikuti perjalanan dinas keluar kota?</label>
                                    <textarea name="alamat_ktp" class="form-control mb-2"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">Apakah anda bersedia, Untuk ditempatkan di divisi / bidang dan / atau departemen berbeda?</label>
                                    <textarea name="alamat_ktp" class="form-control mb-2"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">Apa yang ingin Anda dapatkan dengan melaksanakan Progra Karyawan Lepas di perusahaan ini?</label>
                                    <textarea name="alamat_ktp" class="form-control mb-2"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">Jika periode Program Karyawan Lepas selesai, apakah Anda bersedia untuk direkrut unttuk menjadi karyawan di Perusahaan Kami?</label>
                                    <textarea name="alamat_ktp" class="form-control mb-2"></textarea>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                    <label class="form-check-label font-italic" for="defaultCheck1">
                                        Data Karyawan ini dibuat dengan data sebenar - benarnya untuk keperluan kepegawaian di PT. TRISTEK MEDIA KREASINDO. Apabila ada perubahan data mohon secepatnya mengajukan perubahan.
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-end">
                                <a href="#top" class="btn btn-sm btn-next mr-1" id="next-form" onclick="stepper.previous()"><i class="fa fa-chevron-left" aria-hidden="true"></i> Sebelumnya</a>
                                <a href="#top" class="btn btn-sm btn-next cek-btn disabled" id="next-form" onclick="stepper.next()">Selanjutnya <i class="fa fa-chevron-right" aria-hidden="true"></i></a>
                            </div>
                        </div>
                    </div>
                    <!------- End Survey ------->
                </div>

                <div id="data-pendukung" class="content" role="tabpanel" aria-labelledby="data-pendukung-trigger">
                    <!------- Start Header ------->
                    <div class="content-header mt-1 pl-0">
                        <div class="container-fluid">
                            <div class="row mb-2">
                                <div class="col-sm-6">
                                    <div class="d-flex">
                                        <a href="/admin/pelamar" class="btn btn-sm btn-danger mr-2"><i class="fas fa-arrow-left text-white"></i></a>
                                        <h1 class="m-0" style="font-size: 18px !important;">Ubah Data Pelamar Pekerjaan</h1>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <ol class="breadcrumb float-sm-right" style="font-size: 13px !important;">
                                        <li class="breadcrumb-item"><a href="#">Data Pelamar</a></li>
                                        <li class="breadcrumb-item active">Ubah Data Pelamar Pekerjaan</li>
                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!------- End Header ------->

                    <div class="card">
                        <div class="card-body">
                            <?php foreach ($dokumen_pendukung as $key => $value) { ?>
                                <?php if ($value['name'] == 'file_sertifikat[]') { ?>
                                    <?php foreach ($media_sertifikat->items as $key2 => $value2) { ?>
                                        <div class="row">
                                            <div class="col-md-8">
                                                <div class="multi-input-container6">
                                                    <div class="mb-2 multi-input-item6">
                                                        <label for=""><?= $value['label'] ?> <?= $key2 += 1 ?></label>
                                                        <div class="d-flex">
                                                            <button type="button" class="btn btn-sm btn-primary mr-2" data-toggle="modal" data-file="<?= asset($selectMedia($detail['id_karyawan'], $value['name'])['path_media']) ?>" data-target="#dokumenPersyaratan">Preview</button>
                                                            <div class="custom-file">
                                                                <input type="file" class="custom-file-input" name="<?= $value['name'] ?>">
                                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <button type="button" class="btn btn-sm btn-success multi-input-add6 mb-1">Tambah Kolom</button>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } else { ?>
                                    <div class="row">
                                        <div class="col-md-8">
                                            <div class="mb-2">
                                                <label for=""><?= $value['label'] ?></label>
                                                <div class="d-flex">

                                                    <?php if ($selectMedia($detail['id_karyawan'], $value['name']) != FALSE) { ?>
                                                        <button type="button" class="btn btn-sm btn-primary mr-2" data-toggle="modal" data-file="<?= asset($selectMedia($detail['id_karyawan'], $value['name'])['path_media']) ?>" data-target="#dokumenPersyaratan">Preview</button>
                                                    <?php } ?>

                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input" name="<?= $value['name'] ?>">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                        </div>
                        <div class="card-footer">
                            <div class="d-flex justify-content-end">
                                <a href="#top" class="btn btn-sm btn-next mr-1" onclick="stepper.previous()"><i class="fa fa-chevron-left" aria-hidden="true"></i> Sebelumnya</a>
                                <button type="submit" class="btn btn-sm btn-success">Submit</button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>

    </div>
</div>

<script>
    $('#defaultCheck1').click(function() {
        if ($(this).is(':checked')) {
            $('.cek-btn').removeClass('disabled');
        } else {
            $('.cek-btn').addClass('disabled');
        }
    });
</script>


<!-- Modal Dokumen -->
<div class="modal fade" id="dokumenPersyaratan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
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
        // $('input[name="alamt_ktp"]').val('Link. Talun Kidul No.29 RT.01/RW.06, Kel. Talun, Kec. Sumedang Utara, Kab. SUmedang');
        // $('textarea').html('DESKRIPSI');
        // $('input[type="number"]').val('1');
        // $("select").prop("selectedIndex", 1);
        // $('input[type="date"]').val('2020-01-01');

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

        // multi kursus
        $('.multi-input-add7').on('click', function() {
            var item7 = $('.multi-input-item7').first().clone();
            item7.prepend('<hr class="mb-0">');
            item7.append('<div class="col-12"><button type="button" class="btn btn-sm btn-danger mt-1 multi-input-delete7">Hapus Kolom</button></div>');
            $('.multi-input-container7').append(item7);
        })

        $(document).on('click', '.multi-input-delete7', function() {
            var parent7 = $(this).closest('.multi-input-item7');
            parent7.remove();
        })

        // multi kursus
        $('.multi-input-add8').on('click', function() {
            var item8 = $('.multi-input-item8').first().clone();
            item8.append('<button type="button" class="btn btn-sm btn-danger mt-1 multi-input-delete8">Hapus Kolom</button>');
            $('.multi-input-container8').append(item8);
        })

        $(document).on('click', '.multi-input-delete8', function() {
            var parent8 = $(this).closest('.multi-input-item8');
            parent8.remove();
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