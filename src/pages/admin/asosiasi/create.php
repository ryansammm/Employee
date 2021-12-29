<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-1">
                    <a href="/admin/asosiasi" class="btn btn-sm btn-danger"><i class="fas fa-arrow-left text-white"></i></a>
                </div>
                <div class="col-sm-5">
                    <h1 class="m-0">Data Asosiasi</h1>
                </div>
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Asosiasi</a></li>
                        <li class="breadcrumb-item"><a href="#">Kelola Asosiasi</a></li>
                        <li class="breadcrumb-item active">Tambah Data Asosiasi</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <form action="/admin/asosiasi/store" method="POST" enctype="multipart/form-data">
                <div class="wrapper" style="height: 100%;">
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <div class="mb-3">
                                    <label for="nama_asosiasi" class="form-label">Nama Asosiasi</label>
                                    <input type="text" class="form-control" id="nama_asosiasi" name="nama_asosiasi">
                                </div>
                                <div class="mb-3">
                                    <label for="ikon_asosiasi" class="form-label">Logo Asosiasi</label> (.jpg, .jpeg, .png)
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="ikon_asosiasi" name="ikon_asosiasi">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <span class="text-muted">Ukuran maksimum file : 2 Mb</span>
                                    <?php if (isset($errors['ikon_asosiasi'])) { ?>
                                        <span class="text-danger d-block"><b><?= $errors['ikon_asosiasi'] ?></b></span>
                                    <?php } ?>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Deskripsi Asosiasi</label>
                                    <textarea class="form-control" id="" name="deskripsi_asosiasi" rows="3"></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="sertifikat_asosiasi" class="form-label">Sertifikat Asosiasi</label> (.pdf)
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="sertifikat_asosiasi" name="sertifikat_asosiasi">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                    <span class="text-muted">Ukuran maksimum file : 2 Mb</span>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="col-md d-flex justify-content-end">
                                <button type="submit" class="btn btn-danger">Submit</button>
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