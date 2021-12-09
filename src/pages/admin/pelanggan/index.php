<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pelanggan <a href="/admin/pelanggan/create" class="btn btn-sm btn-outline-primary">Add New</a></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Pelanggan</a></li>
                        <li class="breadcrumb-item active">Kelola Pelanggan</li>
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
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pelanggan</th>
                                <th>Logo Pelanggan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data_pelanggan->items as $key => $value) { ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $value['nama_pelanggan'] ?></td>
                                    <td><img src="/assets/media/<?= $value['path_media'] ?>" alt="Cover Album" width="40" height="40"></td>
                                    <td>
                                        <a class="btn btn-sm btn-info" href="/admin/pelanggan/<?= $value['id_pelanggan'] ?>/edit">Edit</a>
                                        <a href="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal_konfirmasi_hapus_pelanggan" data-id="<?= $value['id_pelanggan'] ?>">hapus</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal hapus -->
<div class="modal fade" id="modal_konfirmasi_hapus_pelanggan" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin untuk menghapus pelanggan ini?
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary" href="#" onclick="event.preventDefault();document.getElementById('form_hapus').submit();">
                    Ya
                </a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <form action="" method="POST" id="form_hapus" style="display: none;">

                </form>
            </div>
        </div>
    </div>
</div>


<script>
    $('#modal_konfirmasi_hapus_pelanggan').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')

        var modal = $(this)
        modal.find('#form_hapus').attr('action', '/admin/pelanggan/' + id + '/delete')
    })
</script>


<?php include(__DIR__ . '/../layouts/admin-footer.php'); ?>