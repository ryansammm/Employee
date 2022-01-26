<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<style>
    td,
    th {
        font-size: 11.5px;
    }

    .fa {
        cursor: pointer !important;
    }

    h1 {
        font-size: 22px !important;
    }

    .breadcrumb {
        font-size: 14px !important;
    }

    footer {
        font-size: 13px !important;
    }

    li a i,
    li a span {
        font-size: 12px;
    }
</style>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Karyawan Tidak Tetap</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-body table-responsive p-0">
                    <table class="table table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Lengkap</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">Divisi</th>
                                <th scope="col">Bidang</th>
                                <th scope="col">No. Induk Karyawan</th>
                                <th scope="col">Tanggal Mulai Kerja</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datas->items as $key => $value) { ?>
                                <tr>
                                    <td><?= $key + 1 ?></td>
                                    <td>
                                        <a href="http://employee.demo1.tristek.co.id/employee/<?= $value['id_karyawan'] ?>/detail" target="_balcnk"><?= $value['nama_lengkap'] ?></a>
                                    </td>
                                    <td><?= $value['nama_jabatan'] ?></td>
                                    <td><?= $value['nama_divisi'] ?></td>
                                    <td><?= $value['nama_bidang'] ?></td>
                                    <td><?= $value['no_induk_karyawan'] ?></td>
                                    <td><?= date_format(date_create($value['tgl_mulai_kerja']), "d-m-Y") ?></td>
                                    <td>
                                        <a href="http://employee.demo1.tristek.co.id/employee/<?= $value['id_karyawan'] ?>/detail" class="btn btn-sm btn-outline-success my-1" data-toggle="tooltip" data-placement="bottom" title="Pratinjau" target="_blank"><i class="fa fa-eye"></i></a>
                                        <a class=" btn btn-sm btn-outline-primary my-1" href="/admin/karyawan/<?= $value['id_karyawan'] ?>/edit" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-edit"></i></a>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

            <?= $datas->links(); ?>
        </div>
    </div>
</div>

<!-- Modal hapus -->
<div class="modal fade" id="modal_konfirmasi_hapus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alihkan Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="custom-control custom-radio">
                    <input type="radio" id="customRadioInline1" name="status_karyawan" class="custom-control-input" value="1">
                    <label class="custom-control-label" for="customRadioInline1">Karyawan Tetap</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="customRadioInline2" name="status_karyawan" class="custom-control-input" value="2">
                    <label class="custom-control-label" for="customRadioInline2">Karyawan Kontrak</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="customRadioInline3" name="status_karyawan" class="custom-control-input" value="3">
                    <label class="custom-control-label" for="customRadioInline3">Karyawan Tidak Tetap</label>
                </div>
                <div class="custom-control custom-radio">
                    <input type="radio" id="customRadioInline4" name="status_karyawan" class="custom-control-input" value="4">
                    <label class="custom-control-label" for="customRadioInline4">Resign</label>
                </div>
            </div>
            <div class="modal-footer">
                <a class="btn btn-primary" href="#" onclick="event.preventDefault();document.getElementById('form_hapus').submit();">
                    Simpan
                </a>
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
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
        modal.find('#form_hapus').attr('action', '/admin/karyawan/' + id + '/hide')
    })

    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

<?php include(__DIR__ . '/../layouts/admin-footer.php'); ?>