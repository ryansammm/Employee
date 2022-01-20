<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Data Partner <a href="/admin/partner/create" class="btn btn-sm btn-outline-primary">Add New</a></h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Partner</a></li>
                        <li class="breadcrumb-item active">Kelola Partner</li>
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
                                <th>Nama Partner</th>
                                <th>Logo Partner</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datas->items as $key => $value) { ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $value['nama_partner'] ?></td>
                                    <td>
                                        <div style="background-image: url(<?= asset($value['path_media']) ?>);background-position: center;background-size: 100%;width: 50px;height: 50px;background-repeat: no-repeat;"></div>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-info" href="/admin/partner/<?= $value['id_partner'] ?>/edit">Edit</a>
                                        <a href="#" class="btn btn-sm btn-warning" data-toggle="modal" data-target="#modal_konfirmasi_hapus_partner" data-id="<?= $value['id_partner'] ?>">hapus</a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <?= $datas->links() ?>
        </div>
    </div>
</div>

<!-- Modal hapus -->
<div class="modal fade" id="modal_konfirmasi_hapus_partner" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin untuk menghapus data ini?
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
    $('#modal_konfirmasi_hapus_partner').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')

        var modal = $(this)
        modal.find('#form_hapus').attr('action', '/admin/partner/' + id + '/delete')
    })
</script>


<?php include(__DIR__ . '/../layouts/admin-footer.php'); ?>