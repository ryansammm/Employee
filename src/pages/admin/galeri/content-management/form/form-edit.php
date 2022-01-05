<form action="/admin/galeri/<?= show($galeri['id_galeri']) ?>/update" method="POST" enctype="multipart/form-data">
    <?php if (isset($id_pelanggan)) { ?>
        <input type="hidden" name="id_pelanggan" value="<?= $id_pelanggan ?>">
    <?php } ?>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <!------- Kategori Portofolio ------->
                <div class="col-md-4">
                    <div class="mb-3">
                        <div class="form-group">
                            <label for="id_kategori_galeri" class="form-label">Kategori Portofolio</label>
                            <select class="custom-select" name="id_kategori_galeri" id="id_kategori_galeri">
                                <option value="">-- Pilih Kategori --</option>
                                <?php foreach ($kategori->items as $value) { ?>
                                    <option <?= $value['id_kategori_galeri'] == show($galeri['id_kategori_galeri']) ? 'selected' : '' ?> value="<?= $value['id_kategori_galeri'] ?>"><?= $value['nama_kategori_galeri'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>
                <!------- Judul Portofolio ------->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="judul_galeri" class="form-label">Judul Album</label>
                        <input type="text" class="form-control" id="judul_galeri" name="judul_galeri" value="<?= show($galeri['judul_galeri']) ?>">
                    </div>
                </div>
                <!------- Tanggal Portofolio ------->
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="tgl_galeri" class="form-label">Tanggal Upload</label>
                        <input type="date" class="form-control" id="tgl_galeri" name="tgl_galeri" value="<?= show($galeri['tgl_galeri']) ?>">
                    </div>
                </div>
                <!------- Deskripsi Portofolio ------->
                <div class="col-md-12">
                    <div class="mb-3">
                        <label for="deskripsi_galeri" class="form-label">Deskripsi Album</label>
                        <textarea id="deskripsi_galeri" class="form-control" name="deskripsi_galeri"><?= show($galeri['deskripsi_galeri']) ?></textarea>
                    </div>
                </div>
                <!------- Foto Portofolio ------->
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-4">
                            <img src="<?= asset($galeri['path_media']) ?>" class="img-fluid img-thumbnail foto_utama_preview">
                        </div>
                        <div class="col">
                            <label for="galeri_foto" class="form-label">Cover Album</label> (.jpg, .jpeg, .png)
                            <div class="form-group">
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input foto_utama" id="exampleInputFile" name="galeri_foto">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                    </div>
                                </div>
                                <span class="text-muted">Ukuran maksimum file : 2 Mb</span>
                            </div>

                        </div>
                    </div>
                </div>

                <!-- TAMBAH FOTO FOTO ALBUM -->
                <div class="container">
                    <div class="listFormFoto mt-4">
                        <h5><strong> Upload Foto-foto Ke Dalam Album </strong> </h5>

                        <?php foreach ($group_galeri->items as $key => $value) {
                            $keyForElement = $key + 1; ?>
                            <div class="listfoto pt-3" id="<?= 'listfoto_' . $keyForElement ?>">
                                <input type="hidden" name="id_groupgaleri[]" value="<?= $value['id_group_galeri'] ?>">
                                <h6><?= 'Foto ' . $keyForElement ?></h6>
                                <div class="row">
                                    <div class="col-md-6 mb-2">
                                        <label for="" class="form-label">Judul</label>
                                        <input type="text" class="form-control" name="<?= 'judul_groupgaleri_' . $value['id_group_galeri'] ?>" value="<?= $value['judul_group_galeri'] ?>">
                                    </div>
                                    <div class="col-12 mb-2">
                                        <label for="" class="form-label">Deskripsi</label>
                                        <textarea name="<?= 'deskripsi_groupgaleri_' . $value['id_group_galeri'] ?>" class="form-control"><?= $value['deskripsi_group_galeri'] ?></textarea>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="previewImage" class="form-label">Ganti Gambar</label> <span class="text-muted font-weight-light" style="font-size: 14px;">(.jpg, .jpeg, .png)</span>
                                    <br>

                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="row preview_list_foto">
                                                <div class="col-4">
                                                    <!-- <img class="img-fluid foto_detail_preview img-thumbnail" src="<?= asset($value['path_media']) ?>" alt=""> -->
                                                    <div class="foto_detail_preview" style="background-image:url(<?= asset($value['path_media']) ?>);display:block;width:100%;height:150px;background-size:cover;background-position:center;background-repeat:no-repeat;border-radius:5px;"></div>
                                                </div>
                                                <div class="col">
                                                    <div class="custom-file">
                                                        <input type="file" class="custom-file-input foto_detail" name="<?= 'upload_galeri_' . $value['id_group_galeri'] ?>">
                                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                    </div>
                                                    <span class="text-muted font-weight-light" style="font-size: 14px;">Ukuran maksimum file : 2 Mb</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php if ($key != 0) { ?>
                                    <button type="button" class="btn btn-danger hapusformfoto mb-2" id="<?= 'hapuslistfoto_' . $keyForElement ?>">Hapus</button>
                                <?php } ?>
                            </div>
                        <?php } ?>
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

<script src="/assets/admin/js/preview.js"></script>