<?php include(__DIR__ . '/../../layouts/admin-header.php'); ?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pengecekan & Editorial Portofolio </h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Portofolio </a></li>
                        <li class="breadcrumb-item active">Pengecekan & Editorial Portofolio </li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row mb-3">
                <div class="col-md-6 float-right">
                    <label for="nama_galeri">Kategori Portofolio </label>
                    <form action="/admin/galeri/redaction" method="GET" enctype="multipart/form-data" class="form-inline">
                        <div class="form-group">
                            <select class="custom-select" name="id_kategori_galeri" id="id_kategori_galeri" style="width: 16rem;">
                                <option value="">Semua</option>
                                <?php foreach ($kategori_galeri->items as $value) { ?>
                                    <option value="<?= $value['id_kategori_galeri'] ?>" <?= $value['id_kategori_galeri'] == $id_kategori_galeri ? 'selected' : '' ?>><?= $value['nama_kategori_galeri'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <input type="submit" class="btn btn-primary ml-2">
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Album</th>
                                <th>Cover</th>
                                <th>Tgl Album</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data_galeri->items as $key => $value) { ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $value['judul_galeri'] ?></td>
                                    <td><img src="/assets/media/<?= $value['path_media'] ?>" alt="Cover Album" width="75"></td>
                                    <td><?= $value['tgl_galeri'] ?></td>
                                    <td>
                                        <?php if ($value['status_galeri'] == '1') { ?>
                                            <h6><span class="badge badge-secondary">Draft</span></h6>
                                        <?php } else if ($value['status_galeri'] == '2') { ?>
                                            <h6><span class="badge badge-danger">Tidak Lolos cek redaksi</span></h6>
                                        <?php } else if ($value['status_galeri'] == '3') { ?>
                                            <h6><span class="badge badge-primary">Lolos cek redaksi</span></h6>
                                        <?php } else if ($value['status_galeri'] == '4') { ?>
                                            <h6><span class="badge badge-danger">Tidak disetujui</span></h6>
                                        <?php } else { ?>
                                            <h6><span class="badge badge-success">Publish</span></h6>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-info" href="/admin/galeri/redaction/<?= $value['id_galeri'] ?>/detail">Detail</a>
                                        <?php if ($value['status_galeri'] == '1') { ?>
                                            <a class="btn btn-sm btn-secondary" href="/admin/galeri/redaction/<?= $value['id_galeri'] ?>/edit">Edit</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <?= $data_galeri->links(); ?>
        </div>
    </div>
</div>

<!-- Modal hapus -->
<div class="modal fade" id="modal_konfirmasi_hapus_galeri" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Apakah anda yakin untuk menghapus layanan ini?
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

<!-- Modal Approval -->
<div class="modal fade" id="modal_konfirmasi_approval" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Approval Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <span class="pesan_approval">Apakah anda yakin untuk mengubah status publish produk ini?</span>
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary" href="#" onclick="event.preventDefault();document.getElementById('form_approval').submit();">
                    Ya
                </a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <form action="" method="POST" id="form_approval" style="display: none;"></form>
            </div>
        </div>
    </div>
</div>

<script>
    $('#modal_konfirmasi_hapus_galeri').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')

        var modal = $(this)
        modal.find('#form_hapus').attr('action', '/admin/galeri/' + id + '/delete')
    })

    $('#modal_konfirmasi_approval').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')
        var status = button.data('status')

        var modal = $(this)
        modal.find('.modal-title').html(status == '1' ? 'Setujui Data' : 'Tolak Data');
        modal.find('#form_approval').attr('action', '/admin/produk/approval/' + id + '/action/' + status)
    })
</script>


<?php include(__DIR__ . '/../../layouts/admin-footer.php'); ?>