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
                    <h1 class="m-0">Edit Profile Team</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Profile Team</a></li>
                        <li class="breadcrumb-item"><a href="#">Kelola Profile Team</a></li>
                        <li class="breadcrumb-item active">Edit Data Profile Team</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <form action="/admin/profile-team/<?= $detail['id_profile_team'] ?>/update" method="POST" enctype="multipart/form-data">
                <div class="wrapper" style="height: 100%;">
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <div class="row">
                                    <div class="col-3">
                                        <?php if ($detail['path_media'] != null) { ?>
                                            <img src="/assets/media/<?= $detail['path_media'] ?>" class="img-fluid img-thumbnail foto_utama_preview">
                                        <?php } ?>
                                    </div>
                                    <div class="col">
                                        <div class="mb-3">
                                            <label for="">Nama Lengkap *</label>
                                            <input type="text" name="nama_lengkap" class="form-control" required value="<?= $detail['nama_lengkap'] ?>">
                                        </div>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class="mb-3">
                                                    <label for="">Foto Profile</label>
                                                    <input type="file" name="profile_foto" class="form-control foto_utama">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Jenis Profile Tim *</label>
                                            <select name="jenis_profile" class="form-control" required>
                                                <option value=""> -- Pilih Jenis Profile Tim -- </option>
                                                <option value="1" <?= $detail['jenis_profile'] == '1' ? 'selected' : '' ?>>Direksi</option>
                                                <option value="2" <?= $detail['jenis_profile'] == '2' ? 'selected' : '' ?>>Manajemen</option>
                                                <option value="3" <?= $detail['jenis_profile'] == '3' ? 'selected' : '' ?>>Staff & Karyawan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Jabatan Profile Tim</label>
                                            <select name="jabatan[]" class="form-control multi-select" multiple="multiple">
                                                <?php foreach ($jabatan->items as $key => $value) { ?>
                                                    <option value="<?= $value["id_jabatan"] ?>" <?= $selectJabatan($jabatanProfile->items, $value['id_jabatan']) ? 'selected' : '' ?>>
                                                        <?= $value["nama"] ?></option>
                                                <?php } ?>
                                            </select>
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
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Tempat Lahir</label>
                                            <input type="text" name="tempat_lahir" class="form-control" required value="<?= $detail['tempat_lahir'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $detail['tgl_lahir'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="tgl_bergabung" class="form-label">Tanggal Bergabung</label>
                                            <input type="date" class="form-control" id="tgl_bergabung" name="tgl_bergabung" value="<?= $detail['tgl_bergabung'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Nomor Handphone</label>
                                            <input type="text" name="no_telp" class="form-control" required value="<?= $detail['no_hp'] ?>">
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Email</label>
                                            <input type="text" name="email" class="form-control" required value="<?= $detail['email'] ?>">
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="mb-3">
                                    <label for="">Alamat</label>
                                    <textarea name="alamat" class="form-control" required><?= $detail['alamat'] ?></textarea>
                                </div> -->
                                <div class="mb-3">
                                    <label for="">Deskripsi Singkat Pendidikan</label>
                                    <textarea name="riwayat_pendidikan" class="form-control" required><?= $detail['riwayat_pendidikan'] ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="">Pengalaman Profesional</label>
                                    <textarea name="pengalaman_profesional" class="form-control"><?= $detail['pengalaman_profesional'] ?></textarea>
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