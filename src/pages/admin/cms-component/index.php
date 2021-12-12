<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kelola Komponen <a href="/admin/component/create" class="btn btn-sm btn-outline-primary">Add New</a></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Kelola Komponen</a></li>
                        <li class="breadcrumb-item active">Komponen</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>


    <div class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Komponen</th>
                                <th>Jenis Komponen</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-light">
                            <?php foreach ($datas->items as $key => $value) { ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $value['cms_component'] ?></td>
                                    <td><?= $cmsComponent->cmsComponentType($value['cms_component_type']) ?></td>
                                    <td>
                                        <a class="btn btn-info m-2" href="/admin/component/<?= $value['id_cms_component'] ?>/edit">Edit</a>
                                        <a href="#" class="btn btn-warning m-2" data-toggle="modal" data-target="#modal_konfirmasi_hapus" data-id="<?= $value['id_cms_component'] ?>">hapus</a>
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
<div class="modal fade" id="modal_konfirmasi_hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
    $('#modal_konfirmasi_hapus').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')

        var modal = $(this)
        modal.find('#form_hapus').attr('action', '/admin/component/' + id + '/delete')
    })
</script>


<?php include(__DIR__ . '/../layouts/admin-footer.php'); ?>