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
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="kode_layanan" class="form-label">Kode Layanan</label>
                        <input type="text" class="form-control" id="kode_layanan" name="kode_layanan">
                    </div>
                </div>
                <!------- Nama Layanan ------->
                <div class="col-md-4">
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
                <div class="col-md-3">
                    <img src="/assets/logo/layanan.jpg" class="img-fluid img-thumbnail foto_utama_preview">
                </div>
                <div class="col-md-9">
                    <label for="layanan_foto" class="form-label">Foto Layanan</label> (.jpg, .jpeg, .png)
                    <div class="form-group">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input foto_utama" id="exampleInputFile" name="layanan_foto_utama">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                        <span class="text-muted">Ukuran maksimum file : 2 Mb</span>
                    </div>
                </div>
                <!------- Tambah Foto-Foto Album ------->
                <div class="container mt-3">
                    <hr>
                    <h5><strong> Upload Foto-foto Layanan Lainnya</strong> </h5>
                    <div class="row listFormFoto mt-2">
                        <div class="col-2 listfoto preview_list_foto pt-3" id="listfoto_1">
                            <label>Foto 1</label>
                            <a href="#" class="mb-2 btn_foto_detail" data-toggle="modal" data-target="#dokumenPersyaratan" data-file="" data-changed="2">
                                <div class="mb-2 foto_detail_preview" style="background: url('/assets/logo/layanan.jpg');display:block;width:100%;height:150px;background-size:cover;background-position:center;background-repeat:no-repeat;border-radius:5px;    border: 1px solid #cbcbcb;"></div>
                            </a>
                            <input type="file" class="form-control foto_detail" name="layanan_foto[]">
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
<script src="/assets/admin/js/fotolayanan.js"></script>