<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <div class="d-flex">
                        <a href="/admin/divisi" class="btn btn-sm btn-danger mr-2"><i class="fas fa-arrow-left text-white"></i></a>
                        <h1 class="m-0">Edit Divisi</h1>
                    </div>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Divisi</a></li>
                        <li class="breadcrumb-item"><a href="#">Kelola Divisi</a></li>
                        <li class="breadcrumb-item active">Edit Data Divisi</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container">
            <form action="/admin/divisi/<?= arr_offset($detail, 'id_divisi') ?>/update" method="POST" enctype="multipart/form-data">
                <div class="wrapper" style="height: 100%;">
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <div class="mb-3">
                                    <label for="nama_divisi" class="form-label">Nama Divisi</label>
                                    <input type="text" class="form-control" id="nama_divisi" name="nama_divisi" value="<?= arr_offset($detail, 'nama_divisi') ?>">
                                </div>
                            </div>
                        </div>
                        <div class="card-footer">
                            <div class="row">
                                <div class="col-md d-flex justify-content-end">
                                    <button type="submit" class="btn btn-outline-primary">Submit</button>
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