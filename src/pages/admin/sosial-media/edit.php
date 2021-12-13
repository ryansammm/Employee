<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-1">
                    <a href="/admin/sosial-media" class="btn btn-sm btn-danger"><i class="fas fa-arrow-left text-white"></i></a>
                </div>
                <div class="col-sm-5">
                    <h1 class="m-0">Data Sosial Media</h1>
                </div>
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Sosial Media</a></li>
                        <li class="breadcrumb-item"><a href="#">Kelola Sosial Media</a></li>
                        <li class="breadcrumb-item active">Edit Data Sosial Media</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <form action="/admin/sosial-media/<?= arr_offset($detail, 'id_sosial_media') ?>/update" method="POST" enctype="multipart/form-data">
                <div class="wrapper" style="height: 100%;">
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <div class="mb-3">
                                    <label for="nama_sosial_media" class="form-label">Nama Sosial Media</label>
                                    <input type="text" class="form-control" id="nama_sosial_media" name="nama_sosial_media" value="<?= arr_offset($detail, 'nama_sosial_media') ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="link_sosial_media" class="form-label">Nama Sosial Media</label>
                                    <input type="text" class="form-control" id="link_sosial_media" name="link_sosial_media" value="<?= arr_offset($detail, 'link_sosial_media') ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="link_sosial_media" class="form-label">Icon Sosial Media</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="icon_sosial_media" id="exampleRadios1" value="fab fa-facebook-square" <?= $detail['icon_sosial_media'] == 'fab fa-facebook-square' ? 'checked' : '' ?>>
                                                        <label class="form-check-label" for="exampleRadios1">
                                                            <i class="fab fa-facebook-square"></i> Facebook
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="icon_sosial_media" id="exampleRadios2" value="fab fa-youtube" <?= $detail['icon_sosial_media'] == 'fab fa-youtube' ? 'checked' : '' ?>>
                                                        <label class="form-check-label" for="exampleRadios2">
                                                            <i class="fab fa-youtube"></i> Youtube
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="icon_sosial_media" id="exampleRadios3" value="fab fa-whatsapp" <?= $detail['icon_sosial_media'] == 'fab fa-whatsapp' ? 'checked' : '' ?>>
                                                        <label class="form-check-label" for="exampleRadios3">
                                                            <i class="fab fa-whatsapp"></i> Whatsapp
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="icon_sosial_media" id="exampleRadios4" value="fab fa-instagram" <?= $detail['icon_sosial_media'] == 'fab fa-instagram' ? 'checked' : '' ?>>
                                                        <label class="form-check-label" for="exampleRadios4">
                                                            <i class="fab fa-instagram"></i> Instagram
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="icon_sosial_media" id="exampleRadios5" value="fab fa-telegram" <?= $detail['icon_sosial_media'] == 'fab fa-telegram' ? 'checked' : '' ?>>
                                                        <label class="form-check-label" for="exampleRadios5">
                                                            <i class="fab fa-telegram"></i> Telegram
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="icon_sosial_media" id="exampleRadios6" value="fab fa-twitter" <?= $detail['icon_sosial_media'] == 'fab fa-twitter' ? 'checked' : '' ?>>
                                                        <label class="form-check-label" for="exampleRadios6">
                                                            <i class="fab fa-twitter"></i> Twitter
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="icon_sosial_media" id="exampleRadios7" value="fab fa-tiktok" <?= $detail['icon_sosial_media'] == 'fab fa-tiktok' ? 'checked' : '' ?>>
                                                        <label class="form-check-label" for="exampleRadios7">
                                                            <i class="fab fa-tiktok"></i> Tiktok
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="icon_sosial_media" id="exampleRadios8" value="fab fa-line" <?= $detail['icon_sosial_media'] == 'fab fa-line' ? 'checked' : '' ?>>
                                                        <label class="form-check-label" for="exampleRadios8">
                                                            <i class="fab fa-line"></i> Line
                                                        </label>
                                                    </div>
                                                    <div class="form-check">
                                                        <input class="form-check-input" type="radio" name="icon_sosial_media" id="exampleRadios9" value="fab fa-linkedin" <?= $detail['icon_sosial_media'] == 'fab fa-linkedin' ? 'checked' : '' ?>>
                                                        <label class="form-check-label" for="exampleRadios9">
                                                            <i class="fab fa-linkedin"></i> LinkedIn
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
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