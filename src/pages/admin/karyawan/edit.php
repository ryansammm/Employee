<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<!-- Include Choices CSS -->
<link rel="stylesheet" href="/assets/vendors/choices.js/choices.min.css" />

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-1">
                    <a href="/admin/karyawan" class="btn btn-sm btn-danger"><i class="fas fa-arrow-left text-white"></i></a>
                </div>
                <div class="col-sm-5">
                    <h1 class="m-0">Ubah Data Karyawan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Karyawan</a></li>
                        <li class="breadcrumb-item"><a href="#">Kelola Karyawan</a></li>
                        <li class="breadcrumb-item active">Ubah Data Karyawan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <div class="wrapper" style="height: 100%;">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <a class="nav-link active" id="sebelum-bergabung-tab" data-toggle="tab" href="#sebelum-bergabung" role="tab" aria-controls="sebelum-bergabung" aria-selected="true">Data Sebelum Bergabung</a>
                    </li>
                    <li class="nav-item" role="presentation">
                        <a class="nav-link" id="setelah-bergabung-tab" data-toggle="tab" href="#setelah-bergabung" role="tab" aria-controls="setelah-bergabung" aria-selected="false">Data Setelah Bergabung</a>
                    </li>
                </ul>
                <form action="/admin/karyawan/<?= $detail['id_karyawan'] ?>/update" method="POST" enctype="multipart/form-data">
                    <div class="card tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="sebelum-bergabung" role="tabpanel" aria-labelledby="sebelum-bergabung-tab">
                            <div class="card-body">
                                <div class="container">
                                    <!-- IDENTITAS KARYAWAN -->
                                    <h5 class="mt-3">IDENTITAS KARYAWAN</h5>
                                    <div class="border rounded p-3 mb-5">
                                        <div class="row">
                                            <div class="col-12 col-md-12 mb-3">
                                                <div class="row">
                                                    <div class="col-md-2">
                                                        <img class="img-fluid rounded" src="<?= asset($detail['path_media']) ?>" alt="">
                                                    </div>
                                                    <div class="col-12 col-md-10">
                                                        <div class="row mb-3">
                                                            <div class="col-12 col-md-6">
                                                                <label for="">Foto Profile</label>
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" name="profile_foto">
                                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                                </div>
                                                            </div>
                                                            <div class="col-12 col-md-6 mb-3">
                                                                <label for="">Status Kepegawaian *</label>
                                                                <select name="id_status_kepegawaian" class="form-control">
                                                                    <option value=""> -- Pilih Status -- </option>
                                                                    <?php foreach ($status_kepegawaian->items as $key => $data) { ?>
                                                                        <option value="<?= $data['id_status_kepegawaian'] ?>" <?= $data['id_status_kepegawaian'] == $detail['id_status_kepegawaian'] ? 'selected' : '' ?>><?= $data['nama_status_kepegawaian'] ?></option>
                                                                    <?php } ?>
                                                                </select>
                                                            </div>
                                                            <div class="col-12 col-md-6 mb-3">
                                                                <label for="">Nama Lengkap Sesuai KTP *</label>
                                                                <input type="text" name="nama_lengkap" class="form-control" value="<?= $detail['nama_lengkap'] ?>">
                                                            </div>
                                                            <div class="col-12 col-md-6 mb-3">
                                                                <label for="">Nama Panggilan *</label>
                                                                <input type="text" name="nama_panggilan" class="form-control" value="<?= $detail['nama_panggilan'] ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="mb-3">
                                                    <label for="">Jabatan *</label>
                                                    <select name="id_jabatan" class="form-control">
                                                        <option value=""> -- Pilih Jabatan -- </option>
                                                        <?php foreach ($jabatan->items as $key => $data) { ?>
                                                            <option value="<?= $data['id_jabatan'] ?>" <?= $data['id_jabatan'] == $detail['id_jabatan'] ? 'selected' : '' ?>><?= $data['nama'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="mb-3">
                                                    <label for="">Divisi *</label>
                                                    <input type="text" name="nama_divisi" id="" class="form-control" value="<?= $detail['nama_divisi'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-4">
                                                <div class="mb-3">
                                                    <label for="">Bidang / Departemen *</label>
                                                    <select name="id_bidang" class="form-control">
                                                        <option value=""> -- Pilih Bidang / Departemen -- </option>
                                                        <?php foreach ($bidang->items as $key => $item) { ?>
                                                            <option value="<?= $item['id_bidang'] ?>" <?= $item['id_bidang'] == $detail['id_bidang'] ? 'selected' : '' ?>><?= $item['nama_bidang'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3">
                                                    <label for="">Nomor Induk Karyawan *</label>
                                                    <input type="text" name="no_induk_karyawan" class="form-control" value="<?= $detail['no_induk_karyawan'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="mb-0">
                                                    <label for="">Tanggal Mulai Bekerja *</label>
                                                    <input type="date" name="tgl_mulai_kerja" class="form-control" value="<?= $detail['tgl_mulai_kerja'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END IDENTITAS KARYAWAN -->


                                    <!-- DATA PRIBADI -->
                                    <h5 class="mt-3">DATA PRIBADI</h5>
                                    <div class="row">
                                        <div class="col-md-6 mb-1">
                                            <div class="border p-3 rounded">
                                                <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="">Nomor KTP *</label>
                                                            <input type="text" name="no_ktp" class="form-control" value="<?= $detail['no_ktp'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="">Nomor Kartu Keluarga *</label>
                                                            <input type="text" name="no_kk" class="form-control" value="<?= $detail['no_kk'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="">Nomor Seluler Pribadi *</label>
                                                            <input type="text" name="no_seluler_pribadi" class="form-control" value="<?= $detail['no_seluler_pribadi'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="">Nomor Seluler Kantor *</label>
                                                            <input type="text" name="no_seluler_kantor" class="form-control" value="<?= $detail['no_seluler_kantor'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="">Alamat Email Pribadi *</label>
                                                            <input type="text" name="email_pribadi" class="form-control" value="<?= $detail['email_pribadi'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="">Alamat Email Kantor *</label>
                                                            <input type="text" name="email_kantor" class="form-control" value="<?= $detail['email_kantor'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="">Kewarganegaraan *</label>
                                                            <input type="text" name="kewarganegaraan" class="form-control" value="<?= $detail['kewarganegaraan'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="">Nomor Passport, Bila Ada</label>
                                                            <input type="text" name="no_passport" class="form-control" value="<?= $detail['no_passport'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="">Nomor SIM C</label>
                                                            <input type="text" name="no_sim_c" class="form-control" value="<?= $detail['no_sim_c'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div class="border p-3 rounded">
                                                <div class="row">
                                                    <div class="col-12 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="">Tempat Lahir *</label>
                                                            <input type="text" name="tempat_lahir" class="form-control" value="<?= $detail['tempat_lahir'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="tgl_lahir" class="form-label">Tanggal Lahir *</label>
                                                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $detail['tgl_lahir'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="">Jenis Kelamin *</label>
                                                            <select name="jenis_kelamin" class="form-control">
                                                                <option value=""> -- Pilih Jenis Kelamin -- </option>
                                                                <option value="1" <?= $detail['jenis_kelamin'] == 1 ? 'selected' : '' ?>>Laki - Laki</option>
                                                                <option value="2" <?= $detail['jenis_kelamin'] == 2 ? 'selected' : '' ?>>Perempuan</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="">Status *</label>
                                                            <select name="status_perkawinan" class="form-control">
                                                                <option value=""> -- Pilih Status Perkawinan -- </option>
                                                                <option value="1" <?= $detail['status_perkawinan'] == 1 ? 'selected' : '' ?>>Sudah Menikah</option>
                                                                <option value="2" <?= $detail['status_perkawinan'] == 2 ? 'selected' : '' ?>>Belum Menikah</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-3">
                                                        <div class="mb-3">
                                                            <label for="">Berat Badan *</label>
                                                            <input type="number" min="1" name="berat_badan" class="form-control" value="<?= $detail['berat_badan'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-3">
                                                        <div class="mb-3">
                                                            <label for="">Tinggi Badan *</label>
                                                            <input type="number" min="1" name="tinggi_badan" class="form-control" value="<?= $detail['tinggi_badan'] ?>">
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="">Golongan Darah *</label>
                                                            <select name="gol_darah" class="form-control">
                                                                <option value=""> -- Pilih Golongan Darah -- </option>
                                                                <option value="1" <?= $detail['gol_darah'] == 1 ? 'selected' : '' ?>>A</option>
                                                                <option value="2" <?= $detail['gol_darah'] == 2 ? 'selected' : '' ?>>B</option>
                                                                <option value="3" <?= $detail['gol_darah'] == 3 ? 'selected' : '' ?>>AB</option>
                                                                <option value="4" <?= $detail['gol_darah'] == 4 ? 'selected' : '' ?>>O</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="">Agama *</label>
                                                            <select name="agama" class="form-control">
                                                                <option value=""> -- Pilih Agama -- </option>
                                                                <option value="1" <?= $detail['agama'] == 1 ? 'selected' : '' ?>>Islam</option>
                                                                <option value="2" <?= $detail['agama'] == 2 ? 'selected' : '' ?>>Kristen Protestan</option>
                                                                <option value="3" <?= $detail['agama'] == 3 ? 'selected' : '' ?>>Kristen Katolik</option>
                                                                <option value="4" <?= $detail['agama'] == 4 ? 'selected' : '' ?>>Hindu</option>
                                                                <option value="5" <?= $detail['agama'] == 5 ? 'selected' : '' ?>>Buddha</option>
                                                                <option value="6" <?= $detail['agama'] == 6 ? 'selected' : '' ?>>Khonghucu</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                    <div class="col-12 col-md-6">
                                                        <div class="mb-3">
                                                            <label for="">No. SIM A/B/B1/B2 *</label>
                                                            <input type="text" name="no_sim_lainnya" class="form-control" value="<?= $detail['no_sim_lainnya'] ?>">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END DATA PRIBADI -->



                                    <div class="row">
                                        <!-- ALAMAT SESUAI KTP -->
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <h5 class="mt-3">ALAMAT SESUAI KTP</h5>
                                                <div class="border p-3 rounded">
                                                    <label for="">Alamat KTP *</label>
                                                    <textarea name="alamat_ktp" class="form-control mb-2"><?= $detail['alamat_ktp'] ?></textarea>
                                                    <input type="text" name="kode_pos_ktp" class="form-control" placeholder="Kode POS KTP *" value="<?= $detail['kode_pos_ktp'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END ALAMAT SESUAI KTP -->
                                        <!-- ALAMAT SAAT INI -->
                                        <div class="col-6">
                                            <div class="mb-3">
                                                <h5 class="mt-3">ALAMAT SAAT INI</h5>
                                                <div class="border p-3 rounded">
                                                    <label for="">Alamat tinggal saat ini *</label>
                                                    <textarea name="alamat_tinggal" class="form-control mb-2"><?= $detail['alamat_tinggal'] ?></textarea>
                                                    <input type="text" name="kode_pos_tinggal" class="form-control" placeholder="Kode POS alamat tinggal saat ini *" value="<?= $detail['kode_pos_tinggal'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <!-- END ALAMAT SAAT INI -->
                                    </div>
                                    <!-- ASURANSI -->
                                    <h5 class="mt-3">ASURANSI</h5>
                                    <div class="border p-3 rounded">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3">
                                                    <label for="">No. BPJS Ketenagarkerjaan *</label>
                                                    <input type="text" name="no_bpjs_ketenagakerjaan" class="form-control" value="<?= $detail['no_bpjs_ketenagakerjaan'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3">
                                                    <label for="">Nama Asuransi Lainnya</label>
                                                    <input type="text" name="nama_asuransi" class="form-control" value="<?= $detail['nama_asuransi'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3">
                                                    <label for="">No. BPJS Kesehatan *</label>
                                                    <input type="text" name="no_bpjs_kesehatan" class="form-control" value="<?= $detail['no_bpjs_kesehatan'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3">
                                                    <label for="">Nomor Asuransi</label>
                                                    <input type="text" name="no_asuransi" class="form-control" value="<?= $detail['no_asuransi'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END ASURANSI -->
                                    <!-- PERBANKAN -->
                                    <h5 class="mt-3">PERBANKAN</h5>
                                    <div class="border p-3 rounded">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3">
                                                    <label for="">Nama Bank *</label>
                                                    <select name="id_bank" class="form-control">
                                                        <option value=""> -- Pilih Bank -- </option>
                                                        <?php foreach ($bank->items as $key => $item) { ?>
                                                            <option value="<?= $item['id_bank'] ?>" <?= $item['id_bank'] == $detail['id_bank'] ? 'selected' : '' ?>><?= $item['nama_bank'] ?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3">
                                                    <label for="">Nomor Rekening *</label>
                                                    <input type="text" name="no_rek_bank" class="form-control" value="<?= $detail['no_rek_bank'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3">
                                                    <label for="">Cabang *</label>
                                                    <input type="text" name="cabang_bank" class="form-control" value="<?= $detail['cabang_bank'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3">
                                                    <label for="">Atas Nama *</label>
                                                    <input type="text" name="an_bank" class="form-control" value="<?= $detail['an_bank'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END PERBANKAN -->
                                    <!-- PERPAJAKAN -->
                                    <h5 class="mt-3">PERPAJAKAN</h5>
                                    <div class="border p-3 rounded">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3">
                                                    <label for="">Nomor NPWP</label>
                                                    <input type="text" name="no_npwp" class="form-control" value="<?= $detail['no_npwp'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3">
                                                    <label for="">Nama KPP</label>
                                                    <input type="text" name="nama_kpp" class="form-control" value="<?= $detail['nama_kpp'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3">
                                                    <label for="">Tanggal Terdaftar</label>
                                                    <input type="date" name="tgl_terdaftar_pajak" class="form-control" value="<?= $detail['tgl_terdaftar_pajak'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END PERPAJAKAN -->
                                    <!-- PENDIDIKAN FORMAL -->
                                    <h5 class="mt-3">PENDIDIKAN FORMAL</h5>
                                    <div class="border p-3 rounded">
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
                                    <div class="card mt-3">
                                        <div class="card-body">
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
                                            <button type="button" class="btn btn-sm btn-success multi-input-add2">Tambah Data</button>
                                        </div>
                                    </div>
                                    <!-- END PENDIDIKAN NON FORMAL -->

                                    <!-- KEMAMPUAN -->
                                    <h5 class="mt-3">KEMAMPUAN</h5>
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
                                    <button type="button" class="mt-2 btn btn-sm btn-success multi-input-add3">Tambah Data</button>
                                    <!-- END KEMAMPUAN -->

                                    <!-- HOBI -->
                                    <h5 class="mt-3">Hobi</h5>
                                    <div class="mb-3">
                                        <textarea class="form-control" name="hobi" id="" cols="30"><?= $detail['hobi'] ?></textarea>
                                    </div>
                                    <!-- END HOBI -->

                                    <!-- KELUARGA YANG BISA DIHUBUNGI -->
                                    <h5 class=" mt-3">KELUARGA YANG BISA DIHUBUNGI</h5>
                                    <div class="border p-3 rounded">
                                        <div class="row">
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Nama Lengkap sesuai KTP</label>
                                                    <input type="text" class="form-control" name="nama_kontak_alt" value="<?= $keluarga['nama_kontak_alt'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Hubungan Keluarga</label>
                                                    <input type="text" class="form-control" name="hubungan_keluarga_kontak_alt" value="<?= $keluarga['hubungan_keluarga_kontak_alt'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3">
                                                    <label for="" class="form-label">Alamat Lengkap</label>
                                                    <textarea name="alamat_kontak_alt" class="form-control"><?= $keluarga['alamat_kontak_alt'] ?></textarea>
                                                    <input type="text" name="kode_pos_kontak_alt" class="form-control mt-2" placeholder="Kode POS" value="<?= $keluarga['kode_pos_kontak_alt'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3">
                                                    <label for="">Nomor Seluler Kerluarga</label>
                                                    <input type="text" name="no_telp_kontak_alt" class="form-control" value="<?= $keluarga['no_telp_kontak_alt'] ?>">
                                                </div>
                                            </div>
                                            <div class="col-12 col-md-6">
                                                <div class="mb-3">
                                                    <label for="">Alamat E-mail Keluarga</label>
                                                    <input type="text" name="email_kontak_alt" class="form-control" value="<?= $keluarga['email_kontak_alt'] ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- END KELUARGA YANG BISA DIHUBUNGI -->
                                    <!-- PENGALAMAN ORGANISASI -->
                                    <h5 class="mt-3 mb-0">PENGALAMAN ORGANISASI</h5>
                                    <span style="font-size: 13px;">Sebelum Bergabung</span>
                                    <div class="card mt-3">
                                        <div class="card-body">
                                            <div class="multi-input-container">
                                                <?php foreach ($pengalaman_organisasi->items as $key => $value) { ?>
                                                    <div class="row multi-input-item">
                                                        <div class="col-12 col-md-6">
                                                            <div class="mb-3">
                                                                <label for="">Nama Lembaga / Organisasi</label>
                                                                <input type="text" name="lembaga_organisasi[]" class="form-control" value="<?= $value['nama_organisasi'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="mb-3">
                                                                <label for="">Jabatan di Lembaga / Organisasi</label>
                                                                <input type="text" name="jabatan_organisasi[]" class="form-control" value="<?= $value['jabatan_organisasi'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="mb-3">
                                                                <label for="">Periode Keaktifan</label>
                                                                <input type="text" name="periode_aktif_organisasi[]" class="form-control" value="<?= $value['periode_aktif'] ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-success multi-input-add">Tambah Data</button>
                                        </div>
                                    </div>
                                    <!-- END PENGALAMAN ORGANISASI -->
                                    <!-- PENGALAMAN PEKERJAAN -->
                                    <h5 class="mt-3">PENGALAMAN PEKERJAAN</h5>
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="multi-input-container1">
                                                <?php foreach ($pengalaman_pekerjaan->items as $key => $value) { ?>
                                                    <div class="row multi-input-item1">
                                                        <div class="col-12 col-md-6">
                                                            <div class="mb-3">
                                                                <label for="">Nama Lembaga</label>
                                                                <input type="text" name="nama_lembaga_pekerjaan[]" class="form-control" value="<?= $value['nama_lembaga'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="mb-3">
                                                                <label for="">Nama Pekerjaan</label>
                                                                <input type="text" name="nama_pekerjaan[]" class="form-control" value="<?= $value['nama_pekerjaan'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="mb-3">
                                                                <label for="">Lokasi Lembaga</label>
                                                                <input type="text" name="lokasi_pekerjaan[]" class="form-control" value="<?= $value['lokasi_lembaga'] ?>">
                                                            </div>
                                                        </div>
                                                        <div class="col-12 col-md-6">
                                                            <div class="mb-3">
                                                                <label for="">Periode Pekerjaan</label>
                                                                <input type="text" name="periode_pelaksanaan_pekerjaan[]" class="form-control" value="<?= $value['periode_pelaksanaan'] ?>">
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php } ?>
                                            </div>
                                            <button type="button" class="btn btn-sm btn-success multi-input-add1">Tambah Data</button>
                                        </div>
                                    </div>
                                    <!-- END PENGALAMAN PEKERJAAN -->
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="setelah-bergabung" role="tabpanel" aria-labelledby="setelah-bergabung-tab">
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
                                        <button type="button" class="btn btn-sm mt-2 btn-success multi-input-add4">Tambah Data</button>
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
                                        <button type="button" class="btn btn-sm mt-2 btn-success multi-input-add5">Tambah Data</button>
                                    </div>
                                </div>
                                <!-- END PENGALAMAN ORGANISASI -->
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
                <h6 class="modal-title" id="exampleModalLabel">Dokumen ORMAS</h6>
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

        // multi input pendidikan non formal setelah bergabung
        $('.multi-input-add4').on('click', function() {
            var item4 = $('.multi-input-item4').first().clone();
            item4.prepend('<div class="col-12"><hr></div>');
            item4.append('<div class="col-12"><button type="button" class="btn btn-sm btn-danger mt-1 multi-input-delete4">Hapus Data</button></div>');
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
            item5.append('<div class="col-12"><button type="button" class="btn btn-sm btn-danger mt-1 multi-input-delete5">Hapus Data</button></div>');
            $('.multi-input-container5').append(item5);
        })

        $(document).on('click', '.multi-input-delete5', function() {
            var parent5 = $(this).closest('.multi-input-item5');
            parent5.remove();
        })
    });
</script>


<?php include(__DIR__ . '/../layouts/admin-footer.php'); ?>