<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-1">
                    <a href="/admin/produk" class="btn btn-sm btn-danger"><i class="fas fa-arrow-left text-white"></i></a>
                </div>
                <div class="col-sm-5">
                    <h1 class="m-0">Data Produk</h1>
                </div>
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Produk</a></li>
                        <li class="breadcrumb-item"><a href="#">Kelola Produk</a></li>
                        <li class="breadcrumb-item active">Edit Data Produk</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>


    <section class="content">
        <div class="container-fluid">
            <form action="/admin/produk/<?= $produk['id_produk'] ?>/update" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!------- Kategori Produk ------->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="id_kategori_produk" class="form-label">Kategori Produk</label>
                                        <select class="custom-select" name="id_kategori_produk" id="id_kategori_produk">
                                            <?php foreach ($data_kategori_produk->items as $value) { ?>
                                                <option <?= $produk['id_kategori_produk'] == $value['id_kategori_produk'] ? 'selected' : '' ?> value="<?= $value['id_kategori_produk'] ?>"><?= $value['nama_kategori_produk'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!------- Kode Produk ------->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="kode_produk" class="form-label">Kode Produk</label>
                                    <input type="text" class="form-control" id="kode_produk" name="kode_produk" value="<?= $produk['kode_produk'] ?>">
                                </div>
                            </div>
                            <!------- Nama Produk ------->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="nama_produk" class="form-label">Nama Produk</label>
                                    <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?= $produk['nama_produk'] ?>">
                                </div>
                            </div>
                            <!------- Deskripsi Produk ------->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="deskripsi_produk" class="form-label">Deskripsi Produk</label>
                                    <textarea id="deskripsi_produk" name="deskripsi_produk"><?= $produk['deskripsi_produk'] ?></textarea>
                                </div>
                            </div>
                            <!------- Deskripsi Lengkap Produk ------->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="deskripsi_lengkap_produk" class="form-label">Deskripsi Lengkap Produk</label>
                                    <textarea id="deskripsi_lengkap_produk" name="deskripsi_lengkap_produk"><?= $produk['deskripsi_lengkap_produk'] ?></textarea>
                                </div>
                            </div>
                            <!------- Spesifikasi Produk ------->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="spesifikasi_produk" class="form-label">Spesifikasi Produk</label>
                                    <textarea id="spesifikasi_produk" name="spesifikasi_produk"><?= $produk['spesifikasi_produk'] ?></textarea>
                                </div>
                            </div>
                            <!------- Foto Produk ------->
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-4">
                                        <img src="/assets/media/<?= $produk['path_media'] ?>" class="img-fluid img-thumbnail">
                                    </div>
                                    <div class="col">
                                        <label for="produk_foto" class="form-label">Foto Produk Utama</label> (.jpg, .jpeg, .png)
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile" name="produk_foto_utama">
                                                <label class="custom-file-label" for="customFile">Choose file</label>
                                            </div>
                                        </div>
                                        <!-- <span class="text-muted">Ukuran maksimum file : 2 Mb</span> -->
                                    </div>
                                </div>
                            </div>
                            <!-- TAMBAH FOTO FOTO ALBUM -->
                            <div class="container mt-4">
                                <h5 class="mb-0"><strong> Upload Foto-foto Produk Lainnya</strong> </h5>
                                <div class="row listFormFoto">
                                    <?php foreach ($foto_produk_lainnya->items as $key => $value) {
                                        $keyForElement = $key + 1; ?>
                                        <div class="col-2 listfoto pt-3" id="listfoto_<?= $keyForElement ?>">
                                            <input type="hidden" name="id_media[]" value="<?= $value['id_media'] ?>">
                                            <h6>Foto <?= $keyForElement ?></h6>
                                            <a href="#" class="mb-2" data-toggle="modal" data-target="#dokumenPersyaratan" data-file="<?= show($value['path_media']) ?>">
                                                <div class="mb-2" style="background: url('/assets/media/<?= $value['path_media'] ?>');display:block;width:100%;height:150px;background-size:cover;background-position:center;background-repeat:no-repeat;border-radius:5px;"></div>
                                            </a>
                                            <input type="file" class="form-control" name="produk_foto_<?= $value['id_media'] ?>">
                                            <?php if ($key != 0) { ?>
                                                <button type="button" class="btn btn-sm btn-danger hapusformfoto mt-2" id="<?= 'hapuslistfoto_' . $keyForElement ?>">Hapus</button>
                                            <?php } ?>
                                        </div>
                                    <?php } ?>

                                </div>

                            </div>
                            <div class="row mb-4 mt-3">
                                <div class="col-12">
                                    <button type="button" class="btn btn-info tambahformfoto">Tambah Foto</button>
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
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Foto Profil</h6>
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
        $('#deskripsi_produk').summernote({
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
        $('#deskripsi_lengkap_produk').summernote({
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
        $('#spesifikasi_produk').summernote({
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
<script src="/assets/admin/js/fotoproduk.js"></script>

<?php include(__DIR__ . '/../layouts/admin-footer.php'); ?>