<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kelola Galeri </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Galeri</a></li>
                        <li class="breadcrumb-item active">Kelola Galeri</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="wrapper" style="height: 100%;">
                <div class="container mt-4">
                    <div class="mb-3">
                        <label for="group_album" class="form-label">Tampilkan Album</label>
                        <select class="form-control" aria-label="Default select example" name="group_album" id="group_album">
                            <option value="">Tampilkan Semua Album</option>
                            <?php foreach($data_galeri as $value){?>
                                <option value="<?= $value['id_galeri']?>"><?= $value['galeri_ind']?></option>
                            <?php }?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <a type="button" id="group_album_button" class="btn btn-info">Submit</a>
                    </div>
                </div>
            </div>
            <hr>
            <div class="container mt-5">
                <div class="row">
                    <?php foreach($data_groupgaleri as $value){?>
                        <div class="col-12 col-lg-3">
                            <div class="card w-100" style="width: 18rem;">
                                <img src="<?= '/assets/media/'. $value['path_media']?>" height="200" class="card-img-top p-2" alt="Photo Galeri">
                                <div class="card-body">
                                    <p class="card-text">Caption IND : <?= $value['caption_ind']?></p>
                                    <p class="card-text">Caption ENG : <?= $value['caption_eng']?></p>
                                    <p class="card-text">Album : <?= $value['galeri_ind']?></p>
                                    <a href="#" class="btn btn-warning " data-toggle="modal" data-target="#modal_konfirmasi_hapus_groupgaleri" data-id="<?= $value['id_groupgaleri'] ?>">hapus</a>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal hapus -->
<div class="modal fade" id="modal_konfirmasi_hapus_groupgaleri" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin untuk menghapus galeri ini?
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary" href="#" onclick="event.preventDefault();
                                        document.getElementById('form_hapus').submit();">
                    Ya
                </a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <form action="" method="POST" id="form_hapus" style="display: none;">

                </form>
            </div>
        </div>
    </div>
</div>


<?php include(__DIR__ . '/../layouts/admin-footer.php'); ?>