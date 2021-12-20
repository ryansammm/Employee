<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-1">
                    <a href="/admin/kategori-berita" class="btn btn-sm btn-danger"><i class="fas fa-arrow-left text-white"></i></a>
                </div>
                <div class="col-sm-5">
                    <h1 class="m-0">Data Kategori Berita</h1>
                </div>
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Kategori Berita</a></li>
                        <li class="breadcrumb-item"><a href="#">Kelola Kategori Berita</a></li>
                        <li class="breadcrumb-item active">Edit Data Kategori Berita</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <form action="/admin/kategori-berita/<?= $kategori_berita['id_kategori_berita'] ?>/update" method="POST" enctype="multipart/form-data">
                <div class="wrapper" style="height: 100%;">
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <div class="mb-3">
                                    <label for="kategori_berita_ind" class="form-label">Kategori Pengumuman</label>
                                    <input type="text" class="form-control" id="kategori_berita" name="kategori_berita" value="<?= $kategori_berita['kategori_berita'] ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="url" class="form-label">URL</label>
                                    <input type="text" class="form-control" id="url" name="url" value="<?= $kategori_berita['url'] ?>">
                                </div>
                                <div class="row my-4">
                                    <div class="col-md d-flex justify-content-end">
                                        <button type="submit" class="btn btn-danger">Edit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </section>
</div>


<?php include(__DIR__ . '/../layouts/admin-footer.php'); ?>