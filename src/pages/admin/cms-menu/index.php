<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Kelola Menu <a href="/admin/menu/create" class="btn btn-sm btn-outline-primary">Add New</a></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Kelola Menu</a></li>
                        <li class="breadcrumb-item active">Menu</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">
            <!-- menu ordering -->
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="accordion" id="accordionExample">
                        <div class="card">
                            <div class="card-header p-0" id="headingOne">
                                <h2 class="mb-0">
                                    <button class="btn btn-link btn-block text-left d-flex justify-content-between text-dark" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        <div class="">
                                            <i class="fas fa-exchange-alt mr-1" style="transform: rotate(90deg);"></i>
                                            <span>Atur Urutan Menu Header</span>
                                        </div>
                                        <i class="fas fa-sort-down"></i>
                                    </button>
                                </h2>
                            </div>

                            <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">

                                    <form action="/admin/menu/sort" method="POST">
                                        <!-- /.card-header -->
                                        <ul class="todo-list" data-widget="todo-list">
                                            <?php foreach ($datas->items as $key => $data) { ?>
                                                <?php if (arr_offset($data, 'jenis_menu') == '1' || arr_offset($data, 'jenis_menu') == '3') { ?>
                                                    <li class="<?= arr_offset($data, 'hide') == '1' ? 'done' : '' ?> d-flex justify-content-between">
                                                        <input type="hidden" class="urutan-menu" name="urutan_menu[]" value="<?= arr_offset($data, 'id_cms_menu') ?>">
                                                        <div>
                                                            <!-- drag handle -->
                                                            <span class="handle mr-3">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </span>
                                                            <!-- todo text -->
                                                            <span style="font-size: 14px;"><?= arr_offset($data, 'menu') ?></span>
                                                        </div>
                                                        <!-- Emphasis label -->
                                                        <!-- <a href="#" class="btn-tampil btn-sm btn-danger" data-id="<?= arr_offset($data, 'header') ?>">
                                                            <i class="far <?= arr_offset($data, 'hide') == '1' ? 'fa-eye-slash' : 'fa-eye' ?> mr-1" style="font-size: 12px;"></i>
                                                            <?= arr_offset($data, 'hide') == '1' ? 'Tampilkan' : 'Sembunyikan' ?>
                                                        </a> -->
                                                        <div class="form-group mb-0">
                                                            <div class="custom-control custom-switch">
                                                                <input type="checkbox" class="custom-control-input" id="customSwitch_<?= arr_offset($data, 'id_cms_menu') ?>" name="<?= arr_offset($data, 'id_cms_menu') ?>" value="1" <?= arr_offset($data, 'hide') == '2' ? 'checked' : '' ?>>
                                                                <label class="custom-control-label" for="customSwitch_<?= arr_offset($data, 'id_cms_menu') ?>">Show/Hide</label>
                                                            </div>
                                                        </div>
                                                    </li>
                                                <?php } ?>
                                            <?php } ?>
                                        </ul>
                                        <!-- /.card-body -->
                                        <button type="submit" class="btn btn-danger mt-3">Update</button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- content -->
            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Menu</th>
                                <th>Urutan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datas->items as $key => $value) { ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td><?= $value['menu'] ?></td>
                                    <td><?= $value['urutan'] ?></td>
                                    <td>
                                        <a class="btn btn-sm btn-info me-2" href="/admin/menu/<?= $value['id_cms_menu'] ?>/edit">Edit</a>
                                        <a href="#" class="btn btn-sm btn-warning m-2" data-toggle="modal" data-target="#modal_konfirmasi_hapus" data-id="<?= $value['id_cms_menu'] ?>">hapus</a>
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
                Apakah anda yakin untuk menghapus pengguna ini?
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

<script src="/assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="/assets/js/app/ui-sortable.js"></script>
<script>
    $('#modal_konfirmasi_hapus').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')

        var modal = $(this)
        modal.find('#form_hapus').attr('action', '/admin/menu/' + id + '/delete')
    })
</script>


<?php include(__DIR__ . '/../layouts/admin-footer.php'); ?>