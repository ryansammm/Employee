<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Berita <a href="/admin/berita/create" class="btn btn-sm btn-outline-primary">Add New</a></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Berita</a></li>
                        <li class="breadcrumb-item active">Kelola Berita</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">

            <!-- <div class="row justify-content-end">
                <div class="col-3">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control form-control-sm mr-2" placeholder="">
                        <a href="#" class="btn btn-sm btn-outline-primary">Search Berita</a>
                    </div>
                </div>
            </div> -->

            <div class="row">
                <div class="col-6">
                <label for="kategori_berita">Kategori Berita</label>
                    <form action="/admin/berita" method="GET" enctype="multipart/form-data" class="form-inline"> 
                        <div class="form-group mb-2">
                            <select class="form-control mr-2" name="kategori_berita" id="kategori_berita">
                                <option value="">Semua</option>
                                <?php foreach ($kategori_berita->items as $value) { ?>
                                    <option value="<?= $value['id_kategori_berita'] ?>" <?= $value['id_kategori_berita'] == $id_kategori_berita ? 'selected' : '' ?>><?= $value['kategori_berita'] ?></option>
                                <?php } ?>
                            </select>
                            <input type="submit" class="btn btn-primary">
                        </div>
                    </form>
                </div>
            </div>

            <table class="table table-sm mt-3">
                <thead class="table-light">
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Kategori Berita</th>
                        <th scope="col">Judul Berita</th>
                        <th scope="col">Tgl Publish</th>
                        <th scope="col">url / slug</th>
                        <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody class="table-light">
                    <?php foreach ($data_berita->items as $key => $value) { ?>
                        <tr>
                            <td><?= $key + 1 ?></td>
                            <td><?= $value['kategori_berita'] ?></td>
                            <td><?= $value['judul_berita'] ?></td>
                            <td><?= $value['tgl_publish'] ?></td>
                            <td><?= $value['slug_berita'] ?></td>
                            <td>
                                <a class="btn btn-info m-2" href="/admin/berita/<?= $value['id_berita'] ?>/edit">Edit</a>
                                <a href="#" class="btn btn-warning m-2" data-toggle="modal" data-target="#modal_konfirmasi_hapus_berita" data-id="<?= $value['id_berita'] ?>">hapus</a>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>

            <?= $data_berita->links(); ?>
        </div>
    </div>
</div>

<!-- Modal hapus -->
<div class="modal fade" id="modal_konfirmasi_hapus_berita" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin untuk menghapus berita ini?
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