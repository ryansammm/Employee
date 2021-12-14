<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-1">
                    <a href="/admin/banner" class="btn btn-sm btn-danger"><i class="fas fa-arrow-left text-white"></i></a>
                </div>
                <div class="col-sm-5">
                    <h1 class="m-0">Data Banner</h1>
                </div>
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Banner</a></li>
                        <li class="breadcrumb-item"><a href="#">Kelola Banner</a></li>
                        <li class="breadcrumb-item active">Edit Data Banner</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <form action="/admin/banner/<?= arr_offset($detail, 'id_banner') ?>/update" method="POST" enctype="multipart/form-data">
                <div class="wrapper" style="height: 100%;">
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <div class="mb-3">
                                    <label for="nama_banner" class="form-label">Nama Banner</label>
                                    <input type="text" class="form-control" id="nama_banner" name="nama_banner" value="<?= arr_offset($detail, 'nama_banner') ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="">Orientasi Banner</label>
                                    <select name="orientasi_banner" class="form-control">
                                        <option value="1" <?= arr_offset($detail, 'orientasi_banner') == '1' ? 'selected' : '' ?>>Vertical</option>
                                        <option value="2" <?= arr_offset($detail, 'oriesntasi_banner') == '2' ? 'selected' : '' ?>>Horizontal</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="">Lokasi Banner Dimunculkan</label>
                                    <select name="lokasi_banner" class="form-control">
                                        <option value=""> -- Pilih Lokasi Banner -- </option>
                                        <?php foreach ($menu->items as $key => $value) { ?>
                                            <option value="<?= $value['link_url'] ?>" <?= arr_offset($detail, 'lokasi_banner') == $value['link_url'] ? 'selected' : '' ?>><?= $value['menu'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="foto_banner" class="form-label">Foto Banner</label> (.jpg, .jpeg, .png)
                                    <img src="/assets/media/<?= arr_offset($detail, 'path_media') ?>" class="img-fluid img-thumbnail d-block mb-2">
                                    <input type="file" class="form-control" id="foto_banner" name="foto_banner">
                                    <span class="text-muted">Ukuran maksimum file : 2 Mb</span>
                                    <?php if (isset($errors['foto_banner'])) { ?>
                                        <span class="text-danger d-block"><b><?= $errors['foto_banner'] ?></b></span>
                                    <?php } ?>
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
    </section>
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