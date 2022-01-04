<div class="col-12">
    <div class="mb-3">
        <label for="" class="d-block">Status Publish</label>
        <?php if ($layanan['status_layanan'] == '1') { ?>
            <h5><span class="badge badge-secondary">Draft</span></h5>
        <?php } else if ($layanan['status_layanan'] == '2') { ?>
            <h5><span class="badge badge-danger">Tidak Lolos cek redaksi</span></h5>
        <?php } else if ($layanan['status_layanan'] == '3') { ?>
            <h5><span class="badge badge-primary">Lolos cek redaksi</span></h5>
        <?php } else if ($layanan['status_layanan'] == '4') { ?>
            <h5><span class="badge badge-danger">Tidak disetujui</span></h5>
        <?php } else { ?>
            <h5><span class="badge badge-success">Publish</span></h5>
        <?php } ?>
    </div>
</div>
<!------- Kategori Layanan ------->
<div class="col-md-4">
    <div class="mb-3">
        <div class="form-group">
            <label for="id_kategori_layanan" class="form-label">Kategori Layanan</label>
            <select class="custom-select" name="id_kategori_layanan" id="id_kategori_layanan" disabled>
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
        <input type="text" class="form-control" id="kode_layanan" name="kode_layanan" value="<?= $layanan['kode_layanan'] ?>" disabled>
    </div>
</div>
<!------- Nama Layanan ------->
<div class="col-md-4">
    <div class="mb-3">
        <label for="nama_layanan" class="form-label">Nama Layanan</label>
        <input type="text" class="form-control" id="nama_layanan" name="nama_layanan" value="<?= $layanan['nama_layanan'] ?>" disabled>
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
            <label for="layanan_foto" class="form-label">Foto Produk Utama</label> (.jpg, .jpeg, .png)
            <img src="<?= asset($layanan['path_media']) ?>" class="img-fluid img-thumbnail">
        </div>
    </div>
</div>
<!------- Tambah Foto-Foto Album ------->
<div class="container mt-4">
    <h5 class="mb-0"><strong> Upload Foto-foto Layanan Lainnya</strong> </h5>
    <div class="row listFormFoto">
        <?php foreach ($foto_layanan_lainnya->items as $key => $value) {
            $keyForElement = $key + 1; ?>
            <div class="col-2 listfoto pt-3" id="listfoto_<?= $keyForElement ?>">
                <input type="hidden" name="id_media[]" value="<?= $value['id_media'] ?>">
                <h6>Foto <?= $keyForElement ?></h6>
                <a href="#" class="mb-2" data-toggle="modal" data-target="#dokumenPersyaratan" data-file="<?= asset(show($value['path_media'])) ?>">
                    <div class="mb-2" style="background: url('<?= asset($value['path_media']) ?>');display:block;width:100%;height:150px;background-size:cover;background-position:center;background-repeat:no-repeat;border-radius:5px;"></div>
                </a>
            </div>
        <?php } ?>
    </div>
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
        $('#deskripsi_layanan').summernote('disable');

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
        $('#deskripsi_lengkap_layanan').summernote('disable');

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
        $('#spesifikasi_layanan').summernote('disable');
    });
</script>