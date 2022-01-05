<form action="/admin/galeri/store" method="POST" enctype="multipart/form-data">
    <?php if (isset($id_pelanggan)) { ?>
        <input type="hidden" name="id_pelanggan" value="<?= $id_pelanggan ?>">
    <?php } ?>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <!------- Kategori Galeri ------->
                <div class="col-md-4">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="id_kategori_galeri" class="form-label">Kategori Portofolio</label>
                            <select class="custom-select" name="id_kategori_galeri" id="id_kategori_galeri" required>
                                <option value="">-- Pilih Kategori --</option>
                                <?php foreach ($data_kategori_galeri->items as $value) { ?>
                                    <option value="<?= $value['id_kategori_galeri'] ?>"><?= $value['nama_kategori_galeri'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!------- Judul Galeri ------->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="judul_galeri" class="form-label">Judul Album</label>
                        <input type="text" class="form-control" id="judul_galeri" name="judul_galeri">
                    </div>
                </div>
                <!------- Tanggal Galeri ------->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="tgl_galeri" class="form-label">Tanggal Upload</label>
                        <input type="date" class="form-control" id="tgl_galeri" name="tgl_galeri">
                    </div>
                </div>
                <!------- Deskripsi Galeri ------->
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="deskripsi_galeri" class="form-label">Deskripsi Album</label>
                        <textarea id="deskripsi_galeri" class="form-control" name="deskripsi_galeri"></textarea>
                    </div>
                </div>
                <!------- Foto Galeri ------->
                <div class="col-md-4">
                    <label for="galeri_foto" class="form-label">Cover Album</label> (.jpg, .jpeg, .png)
                    <div class="form-group">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="exampleInputFile" name="galeri_foto">
                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                            </div>
                        </div>
                        <span class="text-muted">Ukuran maksimum file : 2 Mb</span>
                    </div>
                </div>

                <!-- TAMBAH FOTO FOTO ALBUM -->
                <div class="container">
                    <div class="listFormFoto mt-4">
                        <h5><strong> Upload Foto-foto Ke Dalam Album </strong> </h5>

                        <div class="listfoto pt-3" id="listfoto_1">
                            <h6>Foto 1</h6>
                            <div class="row">
                                <div class="col-md-6 mb-2">
                                    <label for="" class="form-label">Judul</label>
                                    <input type="text" class="form-control" name="judul_groupgaleri[]">
                                </div>
                                <div class="col-12 mb-2">
                                    <label for="" class="form-label">Deskripsi</label>
                                    <textarea name="deskripsi_groupgaleri[]" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Upload Galeri</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" name="upload_galeri[]">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="row mb-4">
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
<script src="/assets/admin/js/groupgaleri.js"></script>