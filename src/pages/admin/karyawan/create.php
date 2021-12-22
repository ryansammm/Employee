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
                    <h1 class="m-0">Tambah Karyawan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
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
            <form action="/admin/karyawan/store" method="POST" enctype="multipart/form-data">
                <div class="wrapper" style="height: 100%;">
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Nama Lengkap Sesuai KTP *</label>
                                            <input type="text" name="nama_lengkap" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Nama Panggilan *</label>
                                            <input type="text" name="nama_panggilan" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Foto Profile</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" name="profile_foto">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Nomor KTP *</label>
                                            <input type="text" name="no_ktp" class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Alamat KTP *</label>
                                            <textarea name="alamat_ktp" class="form-control mb-2" required></textarea>
                                            <input type="text" name="kode_pos_ktp" class="form-control" placeholder="Kode POS KTP *" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Alamat tinggal saat ini *</label>
                                            <textarea name="alamat_tinggal" class="form-control mb-2" required></textarea>
                                            <input type="text" name="kode_pos_tinggal" class="form-control" placeholder="Kode POS alamat tinggal saat ini *" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Nomor Handphone *</label>
                                            <input type="text" name="no_hp" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Email *</label>
                                            <input type="text" name="email" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Tempat Lahir *</label>
                                            <input type="text" name="tempat_lahir" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="tgl_lahir" class="form-label">Tanggal Lahir *</label>
                                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-control" required>
                                                <option value=""> -- Pilih Jenis Kelamin -- </option>
                                                <option value="1">Laki - Laki</option>
                                                <option value="2">Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label for="">Tinggi Badan *</label>
                                            <input type="number" min="1" name="tinggi_badan" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label for="">Berat Badan *</label>
                                            <input type="number" min="1" name="berat_badan" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
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
                                    <div class="col-6">
                                        <div class="mb-3">
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
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Status *</label>
                                            <select name="status_perkawinan" class="form-control" required>
                                                <option value=""> -- Pilih Status Perkawinan -- </option>
                                                <option value="1">Sudah Menikah</option>
                                                <option value="2">Belum Menikah</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Tanggal Mulai Bekerja *</label>
                                            <input type="date" name="tgl_mulai_kerja" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Kewarganegaraan *</label>
                                            <input type="text" name="kewarganegaraan" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Nomor Passport *</label>
                                            <input type="text" name="no_passport" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">No. BPJS Ketenagarkerjaan *</label>
                                            <input type="text" name="no_bpjs_ketenagakerjaan" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">No. BPJS Kesehatan *</label>
                                            <input type="text" name="no_bpjs_kesehatan" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Nama Asuransi *</label>
                                            <input type="text" name="nama_asuransi" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Nomor Asuransi *</label>
                                            <input type="text" name="no_asuransi" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Nomor Karu Keluarga *</label>
                                            <input type="text" name="no_kk" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Nomor NPWP *</label>
                                            <input type="text" name="no_npwp" class="form-control" required>
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
                                                    <option value="<?= $item['id_bank'] ?>"><?= $item['nama_bank'] ?> - <?= $item['cabang_bank'] ?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label for="">Nomor Rekening *</label>
                                            <input type="text" name="no_rek_bank" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-3">
                                        <div class="mb-3">
                                            <label for="">Atas Nama *</label>
                                            <input type="text" name="an_bank" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Nomor Induk Karyawan *</label>
                                            <input type="text" name="no_induk_karyawan" class="form-control" required>
                                        </div>
                                    </div>
                                </div>
                                <h5 class="mt-3">Keluarga yang bisa dihubungi</h5>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Nama *</label>
                                            <input type="text" class="form-control" name="nama_kontak_alt">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="" class="form-label">Hubungan Keluarga *</label>
                                            <input type="text" class="form-control" name="hubungan_keluarga_kontak_alt">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Alamat Lengkap *</label>
                                            <textarea name="alamat_kontak_alt" class="form-control mb-2" rows="3"></textarea>
                                            <input type="text" name="kode_pos_kontak_alt" class="form-control" placeholder="Kode POS *">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <label for="">Nomor Kontak / No Handphone</label>
                                        <input type="text" name="no_telp_kontak_alt" class="form-control mb-2" required>
                                        <label for="">Alamat Email</label>
                                        <input type="text" name="email_kontak_alt" class="form-control" required>
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