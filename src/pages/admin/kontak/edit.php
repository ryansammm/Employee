<?php include(__DIR__ . '/../layouts/admin-header.php'); ?>

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-1">
                    <a href="/admin/kontak" class="btn btn-sm btn-danger"><i class="fas fa-arrow-left text-white"></i></a>
                </div>
                <div class="col-sm-5">
                    <h1 class="m-0">Edit Kontak</h1>
                </div>
                <div class="col">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Kontak</a></li>
                        <li class="breadcrumb-item"><a href="#">Kelola Kontak</a></li>
                        <li class="breadcrumb-item active">Edit Data Kontak</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <form action="/admin/kontak/<?= arr_offset($detail_one, 'id_kontak') ?>/update" method="POST" enctype="multipart/form-data">
                <div class="wrapper" style="height: 100%;">
                    <div class="card">
                        <div class="card-body">
                            <div class="container">
                                <div class="mb-3">
                                    <label for="nama_kontak" class="form-label">Nama Kontak</label>
                                    <input type="text" class="form-control" id="nama_kontak" name="nama_kontak" value="<?= arr_offset($detail_one, 'nama_kontak') ?>">
                                </div>
                                <div class="mb-3">
                                    <label for="" class="d-block">Sembunyikan</label>
                                    <input type="radio" name="ishide_kontak" class="d-inline" value="1" <?= arr_offset($detail_one, 'ishide_kontak') == '1' ? 'checked' : '' ?>> Ya
                                    <input type="radio" name="ishide_kontak" class="d-inline ml-2" value="2" <?= arr_offset($detail_one, 'ishide_kontak') == '2' ? 'checked' : '' ?>> Tidak
                                </div>
                                <!-- <div class="mb-3">
                                    <label for="ikon_kontak" class="form-label">Ikon Kontak (Bootstrap Icon Class)</label>
                                    <div class="d-block">
                                        <input type="radio" name="ikon_kontak" value="fas fa-map-marker-alt"> <span class="ml-2"><i class="fas fa-map-marker-alt mr-2"></i> Location</span>
                                    </div>
                                    <div class="d-block">
                                        <input type="radio" name="ikon_kontak" value="fas fa-clock"> <span class="ml-2"><i class="fas fa-clock mr-2"></i> Clock</span>
                                    </div>
                                    <div class="d-block">
                                        <input type="radio" name="ikon_kontak" value="fas fa-user"> <span class="ml-2"><i class="fas fa-user mr-2"></i> Contact</span>
                                    </div>
                                </div> -->
                                <div class="mb-3">
                                    <label for="" class="form-label">Alamat</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <textarea name="alamat" class="form-control mb-2" placeholder="Alamat Lengkap Perusahaan" rows="5"><?= $kontak->getKontak($detail->items, 'alamat')['isi_kontak']; ?></textarea>
                                        </div>
                                        <div class="col-6">
                                            <small class="text-muted">
                                                <b>Contoh Pengisian Data Kontak :</b><br>
                                                Alamat<br>
                                                <span class="pl-3">Jln. Talun Kidul RT.01/RW.06, Kel.Talun, Kec. Sumedang Utara, Kab. Sumedang, 40235</span>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <label for="" class="form-label">Jam Operasional</label>
                                    <div class="row">
                                        <div class="col-6">
                                            <input type="text" name="jam_operasional_normal" class="form-control mb-2" placeholder="Hari & Jam Operasional" value="<?= $kontak->getKontak($detail->items, 'jam_operasional', 'normal')['isi_kontak']; ?>">
                                            <input type="text" name="jam_operasional_libur" class="form-control" placeholder="Hari Libur" value="<?= $kontak->getKontak($detail->items, 'jam_operasional', 'libur')['isi_kontak']; ?>">
                                        </div>
                                        <div class="col-6">
                                            <small class="text-muted">
                                                <b>Contoh Pengisian Data Kontak :</b><br>
                                                Jam Operasional<br>
                                                <span class="pl-3">
                                                    Senin - Jum'at | 08.00 s/d 17.00 WIB </span><br>
                                                <span class="pl-3">
                                                    Sabtu - Minggu & hari libur nasional, hubungi customer service kami
                                                </span>
                                            </small>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <div class="row">
                                        <div class="col-6">
                                            <label for="">Customer Service</label>
                                            <input type="text" name="customer_service_nama" class="form-control mb-2" placeholder="Nama Kontak" value="<?= $kontak->getKontak($detail->items, 'customer_service', 'nama')['isi_kontak']; ?>">
                                            <input type="text" name="customer_service_nomor" class="form-control mb-2" placeholder="Nomor Kontak" value="<?= $kontak->getKontak($detail->items, 'customer_service', 'nomor')['isi_kontak']; ?>">
                                            <input type="text" name="customer_service_email" class="form-control" placeholder="Email Kontak" value="<?= $kontak->getKontak($detail->items, 'customer_service', 'email')['isi_kontak']; ?>">
                                        </div>
                                        <div class="col-6">
                                            <label for="">Technical Support</label>
                                            <input type="text" name="technical_support_nama" class="form-control mb-2" placeholder="Nama Kontak" value="<?= $kontak->getKontak($detail->items, 'technical_support', 'nama')['isi_kontak']; ?>">
                                            <input type="text" name="technical_support_nomor" class="form-control mb-2" placeholder="Nomor Kontak" value="<?= $kontak->getKontak($detail->items, 'technical_support', 'nomor')['isi_kontak']; ?>">
                                            <input type="text" name="technical_support_email" class="form-control" placeholder="Email Kontak" value="<?= $kontak->getKontak($detail->items, 'technical_support', 'email')['isi_kontak']; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="row my-4">
                                    <div class="col-md d-flex justify-content-end">
                                        <button type="submit" class="btn btn-danger">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
        </div>
    </section>
</div>

<?php include(__DIR__ . '/../layouts/admin-footer.php'); ?>