<form action="/admin/layanan/<?= $layanan['id_layanan'] ?>/update" method="POST" enctype="multipart/form-data">
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
                                    <option <?= $layanan['id_kategori_layanan'] == $value['id_kategori_layanan'] ? 'selected' : '' ?> value="<?= $value['id_kategori_layanan'] ?>"><?= $value['nama_kategori_layanan'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!------- Kode Layanan ------->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="kode_layanan" class="form-label">Kode Layanan</label>
                        <input type="text" class="form-control" id="kode_layanan" name="kode_layanan" value="<?= $layanan['kode_layanan'] ?>">
                    </div>
                </div>
                <!------- Nama Layanan ------->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="nama_layanan" class="form-label">Nama Layanan</label>
                        <input type="text" class="form-control" id="nama_layanan" name="nama_layanan" value="<?= $layanan['nama_layanan'] ?>">
                    </div>
                </div>
                <!------- Deskripsi Layanan ------->
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="deskripsi_layanan" class="form-label">Deskripsi Layanan</label>
                        <textarea id="deskripsi_layanan" name="deskripsi_layanan"><?= $layanan['deskripsi_layanan'] ?></textarea>
                    </div>
                </div>
                <!------- Deskripsi Lengkap Layanan ------->
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="deskripsi_lengkap_layanan" class="form-label">Deskripsi Lengkap Layanan</label>
                        <textarea id="deskripsi_lengkap_layanan" name="deskripsi_lengkap_layanan"><?= $layanan['deskripsi_lengkap_layanan'] ?></textarea>
                    </div>
                </div>
                <!------- Spesifikasi Layanan ------->
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="spesifikasi_layanan" class="form-label">Spesifikasi Layanan</label>
                        <textarea id="spesifikasi_layanan" name="spesifikasi_layanan"><?= $layanan['spesifikasi_layanan'] ?></textarea>
                    </div>
                </div>
                <!------- Foto Layanan ------->
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-4">
                            <img src="<?= asset($layanan['path_media']) ?>" class="img-fluid img-thumbnail foto_utama_preview">
                        </div>
                        <div class="col">
                            <label for="layanan_foto" class="form-label">Foto Produk Utama</label> (.jpg, .jpeg, .png)
                            <div class="form-group">
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input foto_utama" id="customFile" name="layanan_foto_utama">
                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!------- Tambah Foto-Foto Album ------->
                <div class="container mt-4">
                    <h5 class="mb-0"><strong> Upload Foto-foto Layanan Lainnya</strong> </h5>
                    <div class="row listFormFoto">
                        <?php foreach ($foto_layanan_lainnya->items as $key => $value) {
                            $keyForElement = $key + 1; ?>
                            <div class="col-2 listfoto preview_list_foto pt-3" id="listfoto_<?= $keyForElement ?>">
                                <input type="hidden" name="id_media[]" value="<?= $value['id_media'] ?>">
                                <h6>Foto <?= $keyForElement ?></h6>
                                <a href="#" class="mb-2  btn_foto_detail" data-toggle="modal" data-target="#dokumenPersyaratan" data-file="<?= show($value['path_media']) ?>">
                                    <div class="mb-2 foto_detail_preview" style="background: url('<?= asset($value['path_media']) ?>');display:block;width:100%;height:150px;background-size:cover;background-position:center;background-repeat:no-repeat;border-radius:5px;"></div>
                                </a>
                                <input type="file" class="form-control foto_detail" name="layanan_foto_<?= $value['id_media'] ?>">
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
                    <button type="submit" class="btn btn-primary">Simpan</button>
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
                <h6 class="modal-title" id="exampleModalLabel">Dokumen ORMAS</h6>
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
<script src="/assets/admin/js/preview.js"></script>