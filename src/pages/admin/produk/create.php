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
                        <li class="breadcrumb-item active">Tambah Data Produk</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <form action="/admin/produk/store" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!------- Kategori Produk ------->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="id_kategori_produk" class="form-label">Kategori Produk</label>
                                        <select class="custom-select" name="id_kategori_produk" id="id_kategori_produk" required>
                                            <option value="">-- Pilih Kategori --</option>
                                            <?php foreach ($data_kategori_produk->items as $value) { ?>
                                                <option value="<?= $value['id_kategori_produk'] ?>"><?= $value['nama_kategori_produk'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!------- Nama Produk ------->
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="nama_produk" class="form-label">Nama Produk</label>
                                    <input type="text" class="form-control" id="nama_produk" name="nama_produk">
                                </div>
                            </div>
                            <!------- Deskripsi Produk ------->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="deskripsi_produk" class="form-label">Deskripsi Produk</label>
                                    <textarea id="deskripsi_produk" name="deskripsi_produk"></textarea>
                                </div>
                            </div>
                            <!------- Deskripsi Lengkap Produk ------->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="deskripsi_lengkap_produk" class="form-label">Deskripsi Lengkap Produk</label>
                                    <textarea id="deskripsi_lengkap_produk" name="deskripsi_lengkap_produk"></textarea>
                                </div>
                            </div>
                            <!------- Spesifikasi Produk ------->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="spesifikasi_produk" class="form-label">Spesifikasi Produk</label>
                                    <textarea id="spesifikasi_produk" name="spesifikasi_produk"></textarea>
                                </div>
                            </div>
                            <!------- Foto Produk ------->
                            <div class="col-md-4">
                                <label for="produk_foto" class="form-label">Foto Produk</label> (.jpg, .jpeg, .png)
                                <div class="form-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="customFile" name="produk_foto">
                                        <label class="custom-file-label" for="customFile">Choose file</label>
                                    </div>
                                </div>
                                <span class="text-muted">Ukuran maksimum file : 2 Mb</span>
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

<?php include(__DIR__ . '/../layouts/admin-footer.php'); ?>