<?php include(__DIR__ . '/../../layouts/admin-header.php'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-1">
                    <a href="/admin/produk" class="btn btn-sm btn-danger"><i class="fas fa-arrow-left text-white"></i></a>
                </div>
                <div class="col-sm-5">
                    <h1 class="m-0">Detail Data Produk</h1>
                </div>
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Produk</a></li>
                        <li class="breadcrumb-item"><a href="#">Approval Produk</a></li>
                        <li class="breadcrumb-item active">Detail Data Produk</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <?= template('admin/produk/content-management/form/form-detail', [
                            'produk' => $produk,
                            'data_kategori_produk' => $data_kategori_produk,
                            'foto_produk_lainnya' => $foto_produk_lainnya
                        ]) ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

<?php include(__DIR__ . '/../../layouts/admin-footer.php'); ?>