<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-1">
                    <a href="/admin/partner" class="btn btn-sm btn-danger"><i class="fas fa-arrow-left text-white"></i></a>
                </div>
                <div class="col-sm-5">
                    <h1 class="m-0">Tambah Data Partner</h1>
                </div>
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Partner</a></li>
                        <li class="breadcrumb-item"><a href="#">Kelola Partner</a></li>
                        <li class="breadcrumb-item active">Tambah Data Partner</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Data Partner</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Protofolio Partner</a>
                </li>
            </ul>
            <div class="tab-content" id="myTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                    <form action="/admin/partner/store" method="POST" enctype="multipart/form-data">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <!------- Nama Partner ------->
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="nama_partner" class="form-label">Nama Brand/Merk *</label>
                                            <input type="text" class="form-control" id="nama_partner" name="nama_partner" required>
                                        </div>
                                    </div>
                                    <!------- Foto Partner ------->
                                    <div class="col-md-3">
                                        <img src="/assets/logo/partner.png" class="img-fluid img-thumbnail foto_utama_preview">
                                    </div>
                                    <div class="col-md-9">
                                        <label for="partner_foto" class="form-label">Logo Partner *</label> (.jpg, .jpeg, .png)
                                        <div class="form-group">
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input foto_utama" id="exampleInputFile" name="partner_foto" required>
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                            </div>
                                            <span class="text-muted">Ukuran maksimum file : 2 Mb</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-3">
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="">Nama Perusahaan *</label>
                                            <input type="text" name="nama_perusahaan_partner" class="form-control" required>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mb-3">
                                            <label for="link_partner" class="form-label">Link Eksternal *</label>
                                            <input type="text" class="form-control" id="link_partner" name="link_partner" required>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="">Kategori Pekerjaan *</label>
                                    <select name="kategori_pekerjaan" class="form-control" required>
                                        <option value=""> -- Pilih Kategori Pekerjaan -- </option>
                                        <option value="1">Pengadaan Barang</option>
                                        <option value="2">Pengadaan Jasa</option>
                                        <option value="3">Pengadaan Barang & Jasa</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="">Nama Pekerjaan / Project *</label>
                                    <input type="text" name="nama_pekerjaan" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="">Deskripsi Singkat Pekerjaan *</label>
                                    <textarea name="deskripsi_singkat_pekerjaan" class="form-control" required></textarea>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="">No. SPK / PO *</label>
                                    <input type="text" name="no_spk" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="">Tanggal SPK / PO *</label>
                                    <input type="date" name="tgl_spk" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="">Waktu Pekerjaan *</label>
                                    <input type="date" name="waktu_pekerjaan" class="form-control" required>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="mb-3">
                                    <label for="">Tahun Buku *</label>
                                    <input type="number" name="tahun_buku" class="form-control" required>
                                </div>
                            </div>
                        </div> -->
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
                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="card">
                        <div class="card-body">
                            <p class="text-center alert alert-secondary">Isi terlebih dahulu data klien untuk menambahkan portofolio klien</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="/assets/admin/js/preview.js"></script>


<?php include(__DIR__ . '/../layouts/admin-footer.php'); ?>