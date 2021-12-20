<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-1">
                    <a href="/admin/kategori-galeri/konten" class="btn btn-sm btn-danger"><i class="fas fa-arrow-left text-white"></i></a>
                </div>
                <div class="col-sm-5">
                    <h1 class="m-0">Tambah Data Kategori Galeri</h1>
                </div>
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Kategori Galeri</a></li>
                        <li class="breadcrumb-item"><a href="#">Kelola Kategori Galeri</a></li>
                        <li class="breadcrumb-item active">Tambah Data Kategori Galeri</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>


    <section class="content">
        <div class="container-fluid">
            <form action="/admin/kategori-galeri/konten/store" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!------- Nama Kategori Galeri ------->
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nama_kategori_galeri" class="form-label">Nama Kategori Galeri</label>
                                    <input type="text" class="form-control" id="nama_kategori_galeri" name="nama_kategori_galeri">
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