<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Profil Pengguna
                        <!-- <a href="/admin/profil/create" class="btn btn-sm btn-outline-primary">Add New</a> -->
                    </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="/admin/profile-saya">Profil Saya</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">


            <div class="card">
                <div class="card-body">
                    <div class="card-text">
                        <?php if (!empty($errors)) { ?>
                            <div class="alert alert-danger">
                                <ul>
                                    <?php foreach ($errors as $key => $error) { ?>
                                        <li><?= $error ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php } ?>

                        <?php if (!empty($success)) { ?>
                            <div class="alert alert-success">
                                <ul>
                                    <?php foreach ($success as $key => $msg) { ?>
                                        <li><?= $msg ?></li>
                                    <?php } ?>
                                </ul>
                            </div>
                        <?php } ?>
                        <form action="/admin/profile-saya/update" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nama Depan</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="nama_depan" value="<?= show($detail['nama_depan']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Nama Belakang</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="nama_belakang" value="<?= show($detail['nama_belakang']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">No Handphone</label>
                                <input type="text" class="form-control" id="exampleFormControlInput1" name="no_hp" value="<?= show($detail['no_hp']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Email address</label>
                                <input type="email" class="form-control" id="exampleFormControlInput1" name="email_user" value="<?= show($detail['email_user']) ?>" disabled>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Tanggal Lahir</label>
                                <input type="date" class="form-control" id="exampleFormControlInput1" name="tgl_lahir" value="<?= show($detail['tgl_lahir']) ?>" required>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Pilihan Registrasi</label>
                                <select class="form-control" name="pilihan_regis" disabled>
                                    <option value="" selected> -- Status Registrasi -- </option>
                                    <option value="1" <?= show($detail['pilihan_regis']) == '1' ? 'selected' : '' ?>>Administrator</option>
                                    <option value="2" <?= show($detail['pilihan_regis']) == '2' ? 'selected' : '' ?>>Editor</option>
                                    <option value="3" <?= show($detail['pilihan_regis']) == '3' ? 'selected' : '' ?>>Pengguna</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="exampleFormControlInput1">Foto Profile</label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file" id="exampleInputFile" name="foto_profil">
                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                </div>
                                <?php if (show($detail['path_media']) != '') { ?>
                                    <a class="btn btn-sm btn-outline-danger mt-2" data-toggle="modal" data-target="#dokumenPersyaratan" data-file="<?= show($detail['path_media']) ?>"><i class="fas fa-eye"></i> Pratinjau File</a>

                                <?php } ?>
                            </div>
                            <button type="reset" class="btn btn-secondary">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>


        </div>
    </div>
</div>

<!-- Modal Dokumen -->
<div class="modal fade" id="dokumenPersyaratan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h6 class="modal-title" id="exampleModalLabel">Foto Profil</h6>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <img src="" alt="" class="img-fluid fileSakip d-none">
                <iframe src="" frameborder="0" id="fileSakipPDF" style="display: block;width:100%;height:400px;"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script src="/assets/js/app/file-preview.js"></script>


<?php include(__DIR__ . '/../layouts/admin-footer.php'); ?>