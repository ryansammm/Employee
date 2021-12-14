<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-1">
                    <a href="/admin/pelanggan" class="btn btn-sm btn-danger"><i class="fas fa-arrow-left text-white"></i></a>
                </div>
                <div class="col-sm-5">
                    <h1 class="m-0">Tambah Data Pelanggan</h1>
                </div>
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Pelanggan</a></li>
                        <li class="breadcrumb-item"><a href="#">Kelola Pelanggan</a></li>
                        <li class="breadcrumb-item active">Tambah Data Pelanggan</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <form action="/admin/pelanggan/store" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!------- Nama Pelanggan ------->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                                    <input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan">
                                </div>
                            </div>
                            <!------- Foto Pelanggan ------->
                            <div class="col-md-6">
                                <label for="pelanggan_foto" class="form-label">Logo Pelanggan</label> (.jpg, .jpeg, .png)
                                <div class="form-group">
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="exampleInputFile" name="pelanggan_foto">
                                            <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                        </div>
                                    </div>
                                    <span class="text-muted">Ukuran maksimum file : 2 Mb</span>
                                </div>
                            </div>
                            <!-- link pelanggan -->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="link_pelanggan" class="form-label">Link Eksternal</label>
                                    <input type="text" class="form-control" id="link_pelanggan" name="link_pelanggan">
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



<?php include(__DIR__ . '/../layouts/admin-footer.php'); ?>