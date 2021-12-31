<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-1">
                    <a href="/admin/pelanggan" class="btn btn-sm btn-danger"><i class="fas fa-arrow-left text-white"></i></a>
                </div>
                <div class="col-sm-5">
                    <h1 class="m-0">Edit Data Pelanggan</h1>
                </div>
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Pelanggan</a></li>
                        <li class="breadcrumb-item"><a href="#">Kelola Pelanggan</a></li>
                        <li class="breadcrumb-item active">Edit Data Pelanggan</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <form action="/admin/pelanggan/<?= $pelanggan['id_pelanggan'] ?>/update" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-3">
                                <div class="mb-3">
                                    <img src="/assets/media/<?= $pelanggan['path_media'] ?>" alt="<?= $pelanggan['nama_pelanggan'] ?>" class="img-fluid img-thumbnail foto_utama_preview">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <!------- Nama Pelanggan ------->
                                    <label for="nama_pelanggan" class="form-label">Nama Pelanggan *</label>
                                    <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" required value="<?= $pelanggan['nama_pelanggan'] ?>">
                                    <!------- Foto Pelanggan ------->
                                    <label for="pelanggan_foto" class="form-label mt-3">Logo Pelanggan</label> (.jpg, .jpeg, .png)
                                    <div class="form-group">
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input foto_utama" id="exampleInputFile" name="pelanggan_foto">
                                                <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                            </div>
                                        </div>
                                        <span class="text-muted">Ukuran maksimum file : 2 Mb</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="">Nama Perusahaan *</label>
                                    <input type="text" name="nama_perusahaan" class="form-control" required value="<?= $pelanggan['nama_perusahaan'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="" class="form-label">Link Eksternal *</label>
                                    <input type="text" class="form-control" id="link_pelanggan" name="link_pelanggan" required value="<?= $pelanggan['link_pelanggan'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="">Kategori Pekerjaan *</label>
                                    <select name="kategori_pekerjaan" class="form-control" required>
                                        <option value=""> -- Pilih Kategori Pekerjaan -- </option>
                                        <option value="1" <?= $pelanggan['kategori_pekerjaan'] == '1' ? 'selected' : '' ?>>Pengadaan Barang</option>
                                        <option value="2" <?= $pelanggan['kategori_pekerjaan'] == '2' ? 'selected' : '' ?>>Pengadaan Jasa</option>
                                        <option value="3" <?= $pelanggan['kategori_pekerjaan'] == '3' ? 'selected' : '' ?>>Pengadaan Barang & Jasa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="">Nama Pekerjaan / Project *</label>
                                    <input type="text" name="nama_pekerjaan" class="form-control" required value="<?= $pelanggan['nama_pekerjaan'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="">Deskripsi Singkat Pekerjaan *</label>
                                    <textarea name="deskripsi_singkat_pekerjaan" class="form-control" required><?= $pelanggan['deskripsi_singkat_pekerjaan'] ?></textarea>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="">No. SPK / PO *</label>
                                    <input type="text" name="no_spk" class="form-control" required value="<?= $pelanggan['no_spk'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="">Tanggal SPK / PO *</label>
                                    <input type="date" name="tgl_spk" class="form-control" required value="<?= $pelanggan['tgl_spk'] ?>">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="">Waktu Pekerjaan *</label>
                                    <input type="date" name="waktu_pekerjaan" class="form-control" required value="<?= $pelanggan['waktu_pekerjaan'] ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="">Tahun Buku *</label>
                                    <input type="number" name="tahun_buku" class="form-control" required value="<?= $pelanggan['tahun_buku'] ?>">
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

<script src="/assets/admin/js/preview.js"></script>


<?php include(__DIR__ . '/../layouts/admin-footer.php'); ?>