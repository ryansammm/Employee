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
                <!------- Kode Produk ------->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="kode_produk" class="form-label">Kode Produk</label>
                        <input type="text" class="form-control" id="kode_produk" name="kode_produk">
                    </div>
                </div>
                <!------- Nama Produk ------->
                <div class="col-md-4">
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
                <div class="col-md-3">
                    <img src="/assets/logo/produk.png" class="img-fluid img-thumbnail foto_utama_preview">
                </div>
                <div class="col-md-9">
                    <label for="produk_foto" class="form-label">Foto Produk Utama</label> (.jpg, .jpeg, .png)
                    <div class="form-group mb-1">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input foto_utama" id="customFile" name="produk_foto_utama">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                    </div>
                    <span class="text-muted">Ukuran maksimum file : 2 Mb</span>
                </div>
                <!------- Tambah Foto-Foto Album ------->
                <div class="container mt-3">
                    <hr>
                    <h5><strong>Upload Foto-foto Produk Lainnya</strong> </h5>
                    <div class="row listFormFoto mt-2">
                        <div class="col-2 listfoto preview_list_foto pt-3" id="listfoto_1">
                            <label>Foto 1</label>
                            <a href="#" class="mb-2 btn_foto_detail" data-toggle="modal" data-target="#dokumenPersyaratan" data-file="" data-changed="2">
                                <div class="mb-2 foto_detail_preview" style="background: url('/assets/logo/produk.png');display:block;width:100%;height:150px;background-size:cover;background-position:center;background-repeat:no-repeat;border-radius:5px;    border: 1px solid #cbcbcb;"></div>
                            </a>
                            <input type="file" class="form-control foto_detail" name="produk_foto[]">
                        </div>
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

<script src="/assets/plugins/summernote/summernote-bs4.min.js"></script>
<script src="/assets/admin/js/preview.js"></script>
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