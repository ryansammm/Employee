<?php include(__DIR__ . '/../../layouts/admin-header.php'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-1">
                    <a href="/admin/galeri" class="btn btn-sm btn-danger"><i class="fas fa-arrow-left text-white"></i></a>
                </div>
                <div class="col-sm-5">
                    <h1 class="m-0">Edit Data Portofolio</h1>
                </div>
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Portofolio</a></li>
                        <li class="breadcrumb-item"><a href="#">Kelola Portofolio</a></li>
                        <li class="breadcrumb-item active">Edit Data Portofolio</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>


    <section class="content">
        <div class="container-fluid">
            <?= template('admin/galeri/content-management/form/form-edit', [
                'galeri' => $galeri,
                'kategori' => $kategori,
                'group_galeri' => $group_galeri,
                'status' => 1
            ]) ?>
        </div>
    </section>
</div>

<script src="/assets/admin/js/groupgaleri.js"></script>


<?php include(__DIR__ . '/../../layouts/admin-footer.php'); ?>