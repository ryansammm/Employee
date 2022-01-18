<?php include __DIR__ . '/../Header.php' ?>

<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title mb-3">Data Karyawan</h5>
            <table id="example" class="display table table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nama Lengkap</th>
                        <th>Jabatan</th>
                        <th>Divisi</th>
                        <th>Bidang / Departemen</th>
                        <th>No. Induk</th>
                        <th>Tanggal Mulai Kerja</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($datas_karyawan->items as $key => $value) { ?>
                        <tr>
                            <td><?= $key += 1 ?>.</td>
                            <td><a class="text-decoration-none" href="/employee/<?= $value['id_karyawan'] ?>/detail"><?= $value['nama_lengkap'] ?></a></td>
                            <td><?= $value['nama'] ?></td>
                            <td><?= $value['nama_divisi'] ?></td>
                            <td><?= $value['nama_bidang'] ?></td>
                            <td><?= $value['no_induk_karyawan'] ?></td>
                            <td><?= date_format(date_create($value['tgl_mulai_kerja']), "d-m-Y") ?></td>
                            <td><a href="/employee/<?= $value['id_karyawan'] ?>/detail" class="btn btn-sm btn-primary"><i class="fa fa-eye" aria-hidden="true"></i></a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#example').DataTable();
    });
</script>

<?php include __DIR__ . '/../Footer.php' ?>