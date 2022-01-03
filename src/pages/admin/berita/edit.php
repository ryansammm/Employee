<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-1">
                    <a href="/admin/berita" class="btn btn-sm btn-danger"><i class="fas fa-arrow-left text-white"></i></a>
                </div>
                <div class="col-sm-5">
                    <h1 class="m-0">Data Berita</h1>
                </div>
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Berita</a></li>
                        <li class="breadcrumb-item"><a href="#">Kelola Berita</a></li>
                        <li class="breadcrumb-item active">Edit Data Berita</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <form action="/admin/berita/<?= $berita['id_berita'] ?>/update" method="POST" enctype="multipart/form-data">
                <div class="wrapper" style="height: 100%;">
                    <div class="card">
                        <div class="card-body">
                            <div class="container mt-4">
                                <div class="mb-3">
                                    <label for="tgl_publish" class="form-label">Tanggal</label>
                                    <input type="datetime-local" class="form-control" id="tgl_publish" name="tgl_publish" value="<?= date('Y-m-d\TH:i', strtotime($berita['tgl_publish'])) ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="id_kategori_berita" class="form-label">Kategori Berita</label>
                                    <select class="form-control" aria-label="Default select example" name="id_kategori_berita" id="id_kategori_berita">
                                        <?php foreach ($data_kategori_berita->items as $value) { ?>
                                            <option <?= $berita['id_kategori_berita'] == $value['id_kategori_berita'] ? 'selected' : '' ?> value="<?= $value['id_kategori_berita'] ?>"><?= $value['kategori_berita'] ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="judul_berita" class="form-label">Judul Berita</label>
                                    <input type="text" class="form-control" id="judul_berita" name="judul_berita" value="<?= $berita['judul_berita'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="isi_berita" class="form-label">Isi Berita</label>
                                    <textarea id="isi_berita" name="isi_berita"><?= $berita['isi_berita'] ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="gambar_thumbnail_berita" class="form-label">Gambar Thumbnail Berita</label> (.jpg, .jpeg, .png)
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-inpu" id="gambar_thumbnail_berita" name="gambar_thumbnail_berita">
                                    </div>
                                    <span class="text-muted d-block">Ukuran maksimum file : 2 Mb</span>
                                    <?php if ($berita['path_media'] != null) { ?>
                                        <a class="btn btn-sm btn-outline-danger mt-2" data-toggle="modal" data-target="#dokumenPersyaratan" data-file="<?= asset($berita['path_media']) ?>"><i class="fas fa-eye"></i> Pratinjau File</a>
                                    <?php } ?>
                                </div>
                                <div class="row my-4">
                                    <div class="col-md d-flex justify-content-end">
                                        <button type="submit" class="btn btn-danger">Edit</button>
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
        $('#isi_berita').summernote({
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