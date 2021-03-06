<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-1">
                    <a href="/admin/akreditasi" class="btn btn-sm btn-danger"><i class="fas fa-arrow-left text-white"></i></a>
                </div>
                <div class="col-sm-5">
                    <h1 class="m-0">Data Akreditasi</h1>
                </div>
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Akreditasi</a></li>
                        <li class="breadcrumb-item"><a href="#">Kelola Akreditasi</a></li>
                        <li class="breadcrumb-item active">Edit Data Akreditasi</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <form action="/admin/akreditasi/<?= arr_offset($detail, 'id_akreditasi') ?>/update" method="POST" enctype="multipart/form-data">
                <div class="wrapper" style="height: 100%;">
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <div class="mb-3">
                                    <label for="nama_akreditasi" class="form-label">Nama Akreditasi</label>
                                    <input type="text" class="form-control" id="nama_akreditasi" name="nama_akreditasi" value="<?= arr_offset($detail, 'nama_akreditasi') ?>">
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <?php if (arr_offset($detail, 'path_media') != null) { ?>
                                            <div class="col-2">
                                                <img src="<?= asset(arr_offset($detail, 'path_media')) ?>" class="img-fluid foto_utama_preview">
                                            </div>
                                        <?php } ?>
                                        <div class="col">
                                            <label for="ikon_akreditasi" class="form-label">Logo Akreditasi</label> (.jpg, .jpeg, .png)
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input foto_utama" id="ikon_akreditasi" name="ikon_akreditasi">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                            <span class="text-muted">Ukuran maksimum file : 2 Mb</span>
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
<script src="/assets/admin/js/preview.js"></script>
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