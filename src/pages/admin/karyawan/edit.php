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
                    <h1 class="m-0">Edit Karyawan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Karyawan</a></li>
                        <li class="breadcrumb-item"><a href="#">Kelola Karyawan</a></li>
                        <li class="breadcrumb-item active">Edit Data Karyawan</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <form action="/admin/karyawan/<?= $detail['id_karyawan'] ?>/update" method="POST" enctype="multipart/form-data">
                <div class="wrapper" style="height: 100%;">
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Nama Lengkap Sesuai KTP *</label>
                                            <input type="text" name="nama_lengkap" class="form-control" required value="<?= $detail['nama_lengkap'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Nama Panggilan *</label>
                                            <input type="text" name="nama_panggilan" class="form-control" required value="<?= $detail['nama_panggilan'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-4">
                                        <img src="/assets/media/<?= $detail['path_media'] ?>" class="img-fluid img-thumbnail">
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="">Foto Profile</label>
                                            <div class="custom-file mb-2">
                                                <input type="file" class="custom-file-input" name="profile_foto">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            <label for="">Nomor KTP *</label>
                                            <input type="text" name="no_ktp" class="form-control" value="<?= $detail['no_ktp'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Alamat KTP *</label>
                                            <textarea name="alamat_ktp" class="form-control mb-2" required><?= $detail['alamat_ktp'] ?></textarea>
                                            <input type="text" name="kode_pos_ktp" class="form-control" placeholder="Kode POS KTP *" required value="<?= $detail['kode_pos_ktp'] ?>">
                                        </div>
                                        <!-- <div class="mb-3">
                                            <label for="">Jenis Profile Tim</label>
                                            <select name="jenis_profile" class="form-control" required>
                                                <option value=""> -- Pilih Jenis Profile Tim -- </option>
                                                <option value="1">Direksi</option>
                                                <option value="2">Manajemen</option>
                                                <option value="3">Staff & Karyawan</option>
                                            </select>
                                        </div> -->
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Alamat tinggal saat ini *</label>
                                            <textarea name="alamat_tinggal" class="form-control mb-2" required><?= $detail['alamat_tinggal'] ?></textarea>
                                            <input type="text" name="kode_pos_tinggal" class="form-control" placeholder="Kode POS alamat tinggal saat ini *" required value="<?= $detail['kode_pos_tinggal'] ?>">
                                        </div>
                                        <!-- <div class="mb-3">
                                            <label for="">Jabatan Profile Tim</label>
                                            <select name="jabatan[]" class="form-control multi-select" multiple="multiple">
                                                <?php foreach ($jabatan->items as $key => $value) { ?>
                                                    <option value="<?= $value["id_jabatan"] ?>">
                                                        <?= $value["nama"] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div> -->
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Nomor Handphone *</label>
                                            <input type="text" name="no_hp" class="form-control" required value="<?= $detail['nama_panggilan'] ?>" value="<?= $detail['no_hp'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Email *</label>
                                            <input type="text" name="email" class="form-control" required value="<?= $detail['email'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <!-- <div class="mb-3">
                                            <label for="">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-control" required>
                                                <option value=""> -- Pilih Jenis Kelamin -- </option>
                                                <option value="1">Laki - Laki</option>
                                                <option value="2">Perempuan</option>
                                            </select>
                                        </div> -->
                                        <div class="mb-3">
                                            <label for="">Tempat Lahir *</label>
                                            <input type="text" name="tempat_lahir" class="form-control" required value="<?= $detail['tempat_lahir'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="tgl_lahir" class="form-label">Tanggal Lahir *</label>
                                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $detail['tgl_lahir'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-control" required>
                                                <option value=""> -- Pilih Jenis Kelamin -- </option>
                                                <option value="1" <?= $detail['jenis_kelamin'] == '1' ? 'selected' : '' ?>>Laki - Laki</option>
                                                <option value="2" <?= $detail['jenis_kelamin'] == '2' ? 'selected' : '' ?>>Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label for="">Tinggi Badan *</label>
                                            <input type="number" min="1" name="tinggi_badan" class="form-control" required value="<?= $detail['tinggi_badan'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label for="">Berat Badan *</label>
                                            <input type="number" min="1" name="berat_badan" class="form-control" required value="<?= $detail['berat_badan'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
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
                                    <div class="col-6">
                                        <div class="mb-3">
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
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Status *</label>
                                            <select name="status_perkawinan" class="form-control" required>
                                                <option value=""> -- Pilih Status Perkawinan -- </option>
                                                <option value="1" <?= $detail['status_perkawinan'] == '1' ? 'selected' : '' ?>>Sudah Menikah</option>
                                                <option value="2" <?= $detail['status_perkawinan'] == '2' ? 'selected' : '' ?>>Belum Menikah</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Tanggal Mulai Bekerja *</label>
                                            <input type="date" name="tgl_mulai_kerja" class="form-control" required value="<?= $detail['tgl_mulai_kerja'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Kewarganegaraan *</label>
                                            <input type="text" name="kewarganegaraan" class="form-control" required value="<?= $detail['kewarganegaraan'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Nomor Passport *</label>
                                            <input type="text" name="no_passport" class="form-control" required value="<?= $detail['no_passport'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">No. BPJS Ketenagarkerjaan *</label>
                                            <input type="text" name="no_bpjs_ketenagakerjaan" class="form-control" required value="<?= $detail['no_bpjs_ketenagakerjaan'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">No. BPJS Kesehatan *</label>
                                            <input type="text" name="no_bpjs_kesehatan" class="form-control" required value="<?= $detail['no_bpjs_kesehatan'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Nama Asuransi *</label>
                                            <input type="text" name="nama_asuransi" class="form-control" required value="<?= $detail['nama_asuransi'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Nomor Asuransi *</label>
                                            <input type="text" name="no_asuransi" class="form-control" required value="<?= $detail['no_asuransi'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Nomor Karu Keluarga *</label>
                                            <input type="text" name="no_kk" class="form-control" required value="<?= $detail['no_kk'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Nomor NPWP *</label>
                                            <input type="text" name="no_npwp" class="form-control" required value="<?= $detail['no_npwp'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Bank *</label>
                                            <select name="id_bank" class="form-control" required>
                                                <option value=""> -- Pilih Bank -- </option>
                                                <?php foreach ($bank->items as $key => $item) { ?>
                                                    <option <?= $detail['id_bank'] == $item['id_bank'] ? 'selected' : '' ?> value="<?= $item['id_bank'] ?>"><?= $item['nama_bank'] ?> - <?= $item['cabang_bank'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label for="">Nomor Rekening *</label>
                                            <input type="text" name="no_rek_bank" class="form-control" required value="<?= $detail['no_rek_bank'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label for="">Atas Nama *</label>
                                            <input type="text" name="an_bank" class="form-control" required value="<?= $detail['an_bank'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Nomor Induk Karyawan *</label>
                                            <input type="text" name="no_induk_karyawan" class="form-control" required value="<?= $detail['no_induk_karyawan'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="mt-3">Keluarga yang bisa dihubungi</h5>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Nama *</label>
                                            <input type="text" class="form-control" name="nama_kontak_alt" value="<?= arr_offset($detail_kontak_alt, 'nama_kontak_alt') ?>">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Hubungan Keluarga *</label>
                                            <input type="text" class="form-control" name="hubungan_keluarga_kontak_alt" value="<?= arr_offset($detail_kontak_alt, 'hubungan_keluarga_kontak_alt') ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Alamat Lengkap *</label>
                                            <textarea name="alamat_kontak_alt" class="form-control mb-2" rows="3"><?= arr_offset($detail_kontak_alt, 'alamat_kontak_alt') ?></textarea>
                                            <input type="text" name="kode_pos_kontak_alt" class="form-control" placeholder="Kode POS *" value="<?= arr_offset($detail_kontak_alt, 'kode_pos_kontak_alt') ?>">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="">Nomor Kontak / No Handphone</label>
                                        <input type="text" name="no_telp_kontak_alt" class="form-control mb-2" required value="<?= arr_offset($detail_kontak_alt, 'no_telp_kontak_alt') ?>">
                                        <label for="">Alamat Email</label>
                                        <input type="text" name="email_kontak_alt" class="form-control" required value="<?= arr_offset($detail_kontak_alt, 'email_kontak_alt') ?>">
                                    </div>
                                </div>
                                <div class="row my-4">
                                    <div class="col-md d-flex justify-content-end">
                                        <button type="submit" class="btn btn-danger">Submit</button>
                                    </div>
                                </div>
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
    });
</script>


<?php include(__DIR__ . '/../layouts/admin-footer.php'); ?>