<div class="col-12">
    <div class="mb-3">
        <label for="" class="d-block">Status Publish</label>
        <?php if ($produk['status_produk'] == '1') { ?>
            <h5><span class="badge badge-secondary">Draft</span></h5>
        <?php } else if ($produk['status_produk'] == '2') { ?>
            <h5><span class="badge badge-danger">Tidak Lolos cek redaksi</span></h5>
        <?php } else if ($produk['status_produk'] == '3') { ?>
            <h5><span class="badge badge-primary">Lolos cek redaksi</span></h5>
        <?php } else if ($produk['status_produk'] == '4') { ?>
            <h5><span class="badge badge-danger">Tidak disetujui</span></h5>
        <?php } else { ?>
            <h5><span class="badge badge-success">Publish</span></h5>
        <?php } ?>
    </div>
</div>
<!------- Kategori Produk ------->
<div class="col-md-4">
    <div class="mb-3">
        <div class="form-group">
            <label for="id_kategori_produk" class="form-label">Kategori Produk</label>
            <select class="custom-select" name="id_kategori_produk" id="id_kategori_produk" disabled>
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
        <input type="text" class="form-control" id="kode_produk" name="kode_produk" value="<?= $produk['kode_produk'] ?>" disabled>
    </div>
</div>
<!------- Nama Produk ------->
<div class="col-md-4">
    <div class="mb-3">
        <label for="nama_produk" class="form-label">Nama Produk</label>
        <input type="text" class="form-control" id="nama_produk" name="nama_produk" value="<?= $produk['nama_produk'] ?>" disabled>
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
            <label for="produk_foto" class="form-label">Foto Produk Utama</label> (.jpg, .jpeg, .png)
            <img src="<?= asset($produk['path_media']) ?>" class="img-fluid img-thumbnail produk_foto_utama_preview">
        </div>
    </div>
</div>
<div class="container mt-4">
    <!------- Tambah Foto-Foto Album ------->
    <h5 class="mb-0"><strong> Upload Foto-foto Produk Lainnya</strong> </h5>
    <div class="row listFormFoto">
        <?php foreach ($foto_produk_lainnya->items as $key => $value) {
            $keyForElement = $key + 1; ?>
            <div class="col-2 listfoto pt-3" id="listfoto_<?= $keyForElement ?>">
                <input type="hidden" name="id_media[]" value="<?= $value['id_media'] ?>">
                <h6>Foto <?= $keyForElement ?></h6>
                <a href="#" class="mb-2 btn_foto_detail" data-toggle="modal" data-target="#dokumenPersyaratan" data-file="<?= asset(show($value['path_media'])) ?>" data-changed="2">
                    <div class="mb-2 foto_detail_preview" style="background: url('<?= asset($value['path_media']) ?>');display:block;width:100%;height:150px;background-size:cover;background-position:center;background-repeat:no-repeat;border-radius:5px;"></div>
                </a>
            </div>
        <?php } ?>
    </div>
</div>
<?php if ($produk['status_produk'] == '3') { ?>
<?= template('admin/produk/content-approval/form/form-approval', [
    'produk' => $produk
]) ?>
<?php } ?>

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
        $('#deskripsi_produk').summernote('disable');

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
        $('#deskripsi_lengkap_produk').summernote('disable');

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
        $('#spesifikasi_produk').summernote('disable');

        $('.produk_foto_utama').change(function() {
            console.log('test');
            var file = $(this).get(0).files[0];
            if (file) {
                var reader = new FileReader();

                reader.onload = function() {
                    $(".produk_foto_utama_preview").attr("src", reader.result);
                    $(".produk_foto_utama_temp").val(reader.result);
                }
                reader.readAsDataURL(file);
            }
        });
    });
</script>