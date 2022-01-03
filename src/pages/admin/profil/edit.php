<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Profil</h1>
                </div>
                <!-- <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Profil</a></li>
                        <li class="breadcrumb-item"><a href="#">Kelola Profil</a></li>
                        <li class="breadcrumb-item active">Edit Data Profil</li>
                    </ol>
                </div> -->
            </div>
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb float-sm-left">
                        <li class="breadcrumb-item"><a href="#">Profil</a></li>
                        <li class="breadcrumb-item"><a href="#">Kelola Profil</a></li>
                        <li class="breadcrumb-item active">Edit Data Profil</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <form action="/admin/profil/update" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-body">
                        <div class="row mb-3">
                            <!------- Judul Profil ------->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="judul_profil" class="form-label">Judul Profil</label>
                                    <input type="text" class="form-control" id="judul_profil" name="judul_profil" value="<?= arr_offset($profil, 'judul_profil') ?>">
                                </div>
                            </div>
                            <!------- Tagline Profil ------->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="tagline_profil" class="form-label">Tagline Profil</label>
                                    <input type="text" class="form-control" id="tagline_profil" name="tagline_profil" value="<?= arr_offset($profil, 'tagline_profil') ?>">
                                </div>
                            </div>
                            <!------- Foto Profil ------->
                            <div class="col-md-12">
                                <label for="profil_foto" class="form-label">Foto Profil</label>
                                <div class="row">
                                    <div class="col-6">
                                        <img src="/assets/media/<?= arr_offset($profil, 'path_media') ?>" class="img-fluid img-thumbnail foto_utama_preview">
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <div class="form-group mb-0">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input foto_utama" id="exampleInputFile" name="profil_foto">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <span class="text-muted ml-1 d-block">Ukuran maksimum file : 2 Mb (.jpg, .jpeg, .png)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!------- Deskripsi Profil ------->
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="deskripsi_profil" class="form-label">Deskripsi Profil</label>
                                <textarea id="deskripsi_profil" name="deskripsi_profil"><?= arr_offset($profil, 'deskripsi_profil') ?></textarea>
                            </div>
                        </div>
                        <!------- Visi Misi ------->
                        <div class="col-md-12">
                            <div class="mb-3">
                                <label for="visi_misi" class="form-label">Visi Misi</label>
                                <textarea id="visi_misi" name="visi_misi"><?= arr_offset($profil, 'visi_misi') ?></textarea>
                            </div>
                        </div>
                        <!------- Struktur Organisasi ------->
                        <div class="col-md-12 preview_list_foto">
                            <label for="struktur_organisasi" class="form-label">Struktur Organisasi</label>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="foto_detail_preview" style="background-image: url(/assets/media/<?= arr_offset($sotk, 'path_media') ?>);display:block;width:100%;height:150px;background-size:100%;background-position:center;background-repeat:no-repeat;border-radius:5px;"></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input foto_detail" id="exampleInputFile" name="struktur_organisasi">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                        </div>
                                        <span class="text-muted ml-1 d-block">Ukuran maksimum file : 2 Mb (.jpg, .jpeg, .png)</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md d-flex justify-content-end">
                                <button type="submit" class="btn btn-primary">Submit</button>
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Foto Profil</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="" alt="" class="img-fluid fileSakip d-none" style="width: 100% !important;">
                <iframe src="" frameborder="0" id="fileSakipPDF" style="display: block;width:100%;height:400px;"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Struktur Organisasi -->
<div class="modal fade" id="strukturOrganisasi" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Foto Profil</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="" alt="" class="img-fluid fileSakip d-none" style="width: 100% !important;">
                <iframe src="" frameborder="0" id="fileSakipPDF" style="display: block;width:100%;height:400px;"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- <script src="/assets/js/app/file-preview.js"></script> -->
<script src="/assets/admin/js/preview.js"></script>
<script src="/assets/plugins/summernote/summernote-bs4.min.js"></script>
<script>
    $(function() {
        // Summernote
        $('#deskripsi_profil').summernote({
            placeholder: 'Start writing or type',
            height: 200,
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
<script>
    $(function() {
        // Summernote
        $('#visi_misi').summernote({
            placeholder: 'Start writing or type',
            height: 200,
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