<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-1">
                    <a href="/admin/kategori-produk/konten" class="btn btn-sm btn-danger"><i class="fas fa-arrow-left text-white"></i></a>
                </div>
                <div class="col-sm-5">
                    <h1 class="m-0">Edit Data Kategori Produk</h1>
                </div>
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Kategori Produk</a></li>
                        <li class="breadcrumb-item"><a href="#">Kelola Kategori Produk</a></li>
                        <li class="breadcrumb-item active">Ubdah Data Kategori Produk</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <form action="/admin/kategori-produk/konten/<?= $kategori_produk['id_kategori_produk'] ?>/update" method="POST" enctype="multipart/form-data">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <!------- Nama Kategori Produk ------->
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="nama_kategori_produk" class="form-label">Nama Kategori Produk</label>
                                    <input type="text" class="form-control" id="nama_kategori_produk" name="nama_kategori_produk" value="<?= $kategori_produk['nama_kategori_produk'] ?>">
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