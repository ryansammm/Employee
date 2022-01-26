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
    <div class="content-header pb-1">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Karyawan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li>
                            <a href="/admin/karyawan/create" class="btn btn-sm btn-outline-primary py-2 ml-2">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                <span>Tambah Data</span>
                            </a>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="container-fluid">

            <div class="card">
                <div class="card-body p-0">
                    <table class="table table-sm table-hover text-nowrap">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Nama Lengkap</th>
                                <th scope="col">Jabatan</th>
                                <th scope="col">Divisi</th>
                                <th scope="col">Bidang</th>
                                <th scope="col">No. Induk Karyawan</th>
                                <th scope="col">Tanggal Mulai Kerja</th>
                                <th scope="col">Status Kepegawaian</th>
                                <th scope="col">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($datas->items as $key => $value) { ?>
                                <tr>
                                    <td><?= $key += 1 ?></td>
                                    <td>
                                        <a href="http://employee.demo1.tristek.co.id/employee/<?= $value['id_karyawan'] ?>/detail" target="_balcnk"><?= $value['nama_lengkap'] ?></a>
                                    </td>
                                    <td><?= $value['nama_bidang'] ?></td>
                                    <td><?= $value['nama_divisi'] ?></td>
                                    <td><?= $value['nama_bidang'] ?></td>
                                    <td><?= $value['no_induk_karyawan'] ?></td>
                                    <td><?= date_format(date_create($value['tgl_mulai_kerja']), "d F Y") ?></td>
                                    <td><?= $value['nama_status_kepegawaian'] ?></td>
                                    <td>
                                        <a href="http://employee.demo1.tristek.co.id/employee/<?= $value['id_karyawan'] ?>/detail" class="btn btn-sm btn-outline-success my-1" data-toggle="tooltip" data-placement="bottom" title="Pratinjau" target="_blank"><i class="fa fa-eye"></i></a>
                                        <a class=" btn btn-sm btn-outline-primary my-1" href="/admin/karyawan/<?= $value['id_karyawan'] ?>/edit" data-toggle="tooltip" data-placement="bottom" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href="#" class="btn btn-sm btn-outline-dark my-1" data-toggle="modal" data-target="#modal_konfirmasi_hapus" data-id="<?= $value['id_karyawan'] ?>"><i class="fas fa-exchange-alt" data-toggle="tooltip" data-placement="bottom" title="Alihkan"></i></a>
                                        <a class=" btn btn-sm btn-outline-primary my-1" href="#" data-id="<?= $value['id_karyawan'] ?>" data-toggle="modal" data-target="#shareModal"><i class="fa fa-share-square" data-toggle="tooltip" data-placement="bottom" title="Bagikan" aria-hidden="true"></i></i></a>
                                        <a class=" btn btn-sm btn-outline-primary my-1" href="#" data-toggle="tooltip" data-placement="bottom" title="History"><i class="fa fa-history" aria-hidden="true"></i></a>
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
            <form action="" method="POST" id="form_hapus">
                <div class="modal-body">
                    <?php foreach ($status_kepegawaian->items as $key => $value) { ?>
                        <div class="custom-control custom-radio">
                            <input type="radio" id="customRadioInline<?= $key ?>" name="id_status_kepegawaian" class="custom-control-input" value="<?= $value['id_status_kepegawaian'] ?>">
                            <label class="custom-control-label" for="customRadioInline<?= $key ?>"><?= $value['nama_status_kepegawaian'] ?></label>
                        </div>
                    <?php } ?>
                </div>
                <div class="modal-footer">
                    <a class="btn btn-primary" href="#" onclick="event.preventDefault();document.getElementById('form_hapus').submit();">
                        Simpan
                    </a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Share -->
<div class="modal fade" id="shareModal" tabindex="-1" aria-labelledby="shareModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class=" modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="shareModalLabel">Bagikan</h5> -->
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h6 class="text-center">Bagikan Data Karyawan Ini Melalui Tautan Berikut :</h6>
                <div class="my-3">
                    <div class="d-flex justify-content-center" style="font-size: 13px;">
                        <div id="whatsapp" class="m-2">
                            <a href="" class="text-decoration-none text-dark">
                                <i class="fab fa-whatsapp" style="background-color: #212121;color: white;padding: 5px 6px;border-radius: 0.25rem;"></i>
                                <span>Whatsapp</span>
                            </a>
                        </div>
                        <div id="telegram" class="m-2">
                            <a href="" class="text-decoration-none text-dark">
                                <i class="fab fa-telegram-plane" style="background-color: #212121;color: white;padding: 5px 6px;border-radius: 0.25rem;"></i>
                                <span>Telegram</span>
                            </a>
                        </div>
                        <div id="email" class="m-2">
                            <a href="" class="text-decoration-none text-dark">
                                <i class="fas fa-envelope-open" style="background-color: #212121;color: white;padding: 5px 6px;border-radius: 0.25rem;"></i>
                                <span>Email</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div id="caption">
                    <h5 class="text-center">Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestias aliquid blanditiis deserunt maiores magni ut rem voluptatibus asperiores voluptatum nam.</h5>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $('#modal_konfirmasi_hapus').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget)
        var id = button.data('id')

        var modal = $(this)
        modal.find('#form_hapus').attr('action', '/admin/karyawan/' + id + '/status')
    })

    $(function() {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>

<?php include(__DIR__ . '/../layouts/admin-footer.php'); ?>