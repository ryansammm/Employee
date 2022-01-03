<?php include(__DIR__ . '/../../layouts/admin-header.php'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-1">
                    <a href="/admin/layanan/approval" class="btn btn-sm btn-danger"><i class="fas fa-arrow-left text-white"></i></a>
                </div>
                <div class="col-sm-5">
                    <h1 class="m-0">Detail Data Layanan</h1>
                </div>
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Layanan</a></li>
                        <li class="breadcrumb-item"><a href="#">Approval Layanan</a></li>
                        <li class="breadcrumb-item active">Detail Data Layanan</li>
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
                        <?= template('admin/layanan/content-approval/form/form-detail', [
                            'layanan' => $layanan,
                            'data_kategori_layanan' => $data_kategori_layanan,
                            'foto_layanan_lainnya' => $foto_layanan_lainnya
                        ]) ?>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

<?php include(__DIR__ . '/../../layouts/admin-footer.php'); ?>