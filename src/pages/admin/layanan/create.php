<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-1">
                    <a href="/admin/produk" class="btn btn-sm btn-danger"><i class="fas fa-arrow-left text-white"></i></a>
                </div>
                <div class="col-sm-5">
                    <h1 class="m-0">Tambah Data Layanan</h1>
                </div>
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Layanan</a></li>
                        <li class="breadcrumb-item"><a href="#">Kelola Layanan</a></li>
                        <li class="breadcrumb-item active">Tambah Data Layanan</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <form action="/admin/layanan/store" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!------- Kategori Layanan ------->
                            <div class="col-md-4">
                                <div class="mb-3">
                                    <div class="form-group">
                                        <label for="id_kategori_layanan" class="form-label">Kategori Layanan</label>
                                        <select class="custom-select" name="id_kategori_layanan" id="id_kategori_layanan">
                                            <?php foreach ($data_kategori_layanan->items as $value) { ?>
                                                <option value="<?= $value['id_kategori_layanan'] ?>"><?= $value['nama_kategori_layanan'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <!------- Kode Layanan ------->
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="kode_layanan" class="form-label">Kode Layanan</label>
                                    <input type="text" class="form-control" id="kode_layanan" name="kode_layanan">
                                </div>
                            </div>
                            <!------- Nama Layanan ------->
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="nama_layanan" class="form-label">Nama Layanan</label>
                                    <input type="text" class="form-control" id="nama_layanan" name="nama_layanan">
                                </div>
                            </div>
                            <!------- Deskripsi Layanan ------->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="deskripsi_layanan" class="form-label">Deskripsi Layanan</label>
                                    <textarea id="deskripsi_layanan" name="deskripsi_layanan"></textarea>
                                </div>
                            </div>
                            <!------- Deskripsi Lengkap Layanan ------->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="deskripsi_lengkap_layanan" class="form-label">Deskripsi Lengkap Layanan</label>
                                    <textarea id="deskripsi_lengkap_layanan" name="deskripsi_lengkap_layanan"></textarea>
                                </div>
                            </div>
                            <!------- Spesifikasi Layanan ------->
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label for="spesifikasi_layanan" class="form-label">Spesifikasi Layanan</label>
                                    <textarea id="spesifikasi_layanan" name="spesifikasi_layanan"></textarea>
                                </div>
                            </div>
                            <!------- Foto Layanan ------->
                            <div class="col-md-4">
                                <label for="layanan_foto" class="form-label">Foto Layanan</label> (.jpg, .jpeg, .png)
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="layanan_foto">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                    <span class="text-muted">Ukuran maksimum file : 2 Mb</span>
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

<script src="/assets/plugins/summernote/summernote-bs4.min.js"></script>
<script>
    $(function() {
        // Summernote
        $('#deskripsi_layanan').summernote({
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
        $('#deskripsi_lengkap_layanan').summernote({
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
        $('#spesifikasi_layanan').summernote({
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