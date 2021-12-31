<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<!-- Include Choices CSS -->
<link rel="stylesheet" href="/assets/vendors/choices.js/choices.min.css" />

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-1">
                    <a href="/admin/profile-team" class="btn btn-sm btn-danger"><i class="fas fa-arrow-left text-white"></i></a>
                </div>
                <div class="col-sm-5">
                    <h1 class="m-0">Tambah Profile Tim</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Profile Tim</a></li>
                        <li class="breadcrumb-item"><a href="#">Kelola Profile Tim</a></li>
                        <li class="breadcrumb-item active">Tambah Data Profile Tim</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <form action="/admin/profile-team/store" method="POST" enctype="multipart/form-data">
                <div class="wrapper" style="height: 100%;">
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="mb-3">
                                            <label for="">Nama Lengkap *</label>
                                            <input type="text" name="nama_lengkap" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-2">
                                        <img src="/assets/logo/user.png" class="img-fluid img-thumbnail foto_utama_preview">
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="">Foto Profile</label>
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input foto_utama" name="profile_foto">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Jenis Profile Tim</label>
                                            <select name="jenis_profile" class="form-control" required>
                                                <option value=""> -- Pilih Jenis Profile Tim -- </option>
                                                <option value="1">Direksi</option>
                                                <option value="2">Manajemen</option>
                                                <option value="3">Staff & Karyawan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Jabatan Profile Tim</label>
                                            <select name="jabatan[]" class="form-control multi-select" multiple="multiple">
                                                <?php foreach ($jabatan->items as $key => $value) { ?>
                                                    <option value="<?= $value["id_jabatan"] ?>">
                                                        <?= $value["nama"] ?></option>
                                                <?php } ?>
                                            </select>
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
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Deskripsi Singkat Pendidikan</label>
                                            <textarea name="riwayat_pendidikan" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Pengalaman Profesional</label>
                                            <textarea name="pengalaman_profesional" class="form-control"></textarea>
                                        </div>
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
<script src="/assets/admin/js/preview.js"></script>
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