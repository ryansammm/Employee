<?php include __DIR__ . '/../Header.php' ?>

<style>
    ul li.list-group-item {
        font-size: 14px !important;
    }

    ul li.list-group-item span {
        width: 50%;
        text-align: end;
    }
</style>

<!------- Klien Kami ------->
<section id="klien-kami">
    <div class="container">

        <div class="row">
            <div class="col-md-9 mb-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3 ms-3">
                            <h4 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;"><?= $data_pelanggan['nama_pelanggan'] ?></h4>
                        </div>
                        <hr>
                        <div class="text-center">
                            <a href="<?= $data_pelanggan['link_pelanggan'] ?>" target="_blank">
                                <img src="/assets/media/<?= $data_pelanggan['path_media'] ?>" alt="" style="width: 20%;border-radius: 0.25rem;">
                            </a>
                        </div>
                        <hr>
                        <h6 class="mt-4">Deskripsi Singkat Pekerjaan :</h6>
                        <div class="mt-3">
                            <p class="px-3" style="font-size: 14px;"><?= $data_pelanggan['deskripsi_singkat_pekerjaan'] ?></p>
                        </div>
                        <h6 class="mt-4">Ringkasan Pekerjaan :</h6>
                        <div>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item d-flex justify-content-between align-items-center">Kategori Pekerjaan<span><?= $data_pelanggan['nama_kategori_pekerjaan'] ?></span></li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">Nama Pekerjaan<span><?= $data_pelanggan['nama_pekerjaan'] ?></span></li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">No. SPK / PO<span><?= $data_pelanggan['no_spk'] ?></span></li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">Tanggal SPK / PO <span><?= date_format(date_create($data_pelanggan['tgl_spk']), "d-m-Y") ?></span></li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">Waktu Pekerjaan<span><?= date_format(date_create($data_pelanggan['waktu_pekerjaan']), "d-m-Y") ?></span></li>
                                <li class="list-group-item d-flex justify-content-between align-items-center">Tahun Buku<span><?= $data_pelanggan['tahun_buku'] ?></span></li>
                            </ul>
                        </div>

                    </div>
                    <div class="card-footer d-grid gap-2 d-flex justify-content-md-start">
                        <a href="/gallery" class="btn btn-primary me-2">Dokumentasi Pekerjaan</a>
                        <a href="" class="btn btn-primary">Website <?= $data_pelanggan['nama_pelanggan'] ?></a>
                    </div>
                </div>
            </div>

            <div class="col-md-3 d-sm-block d-none">
                <div class="card">
                    <div class="card-body p-2 pb-0">
                        <div class="d-flex justify-content-between align-items-center ms-3 mb-2">
                            <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Klien Lainnya</h5>
                        </div>
                    </div>
                    <hr class="mt-0">

                    <?php foreach ($datas_pelanggan->items as $key => $value) { ?>
                        <a href="/customer/<?= $value['id_pelanggan'] ?>/detail" class="text-decoration-none text-center">
                            <div class="<?= $key == (count($datas_pelanggan->items) - 1) ? '' : 'side-news-item' ?>" style="<?= $key == (count($datas_pelanggan->items) - 1) ? 'padding: 0.5rem 1rem;' : '' ?>">
                                <!-- <div class="" style="background: url(/assets/media/<?= $value['path_media'] ?>);background-size: cover;background-position:center;width: 75px;height: 75px;border-radius: 0.25rem;margin-left: auto;margin-right: auto;"></div> -->
                                <div style="width: 100%;">
                                    <img src="/assets/media/<?= $value['path_media'] ?>" alt="" style="width: 35%;border-radius: 0.25rem;">
                                </div>
                                <div class="mt-3">
                                    <h6 style="font-size: 14px;"><?= $value['nama_pelanggan'] ?></h6>
                                </div>
                            </div>
                        </a>
                    <?php } ?>

                </div>
            </div>

        </div>
</section>


<!------- Klien Lainnya ------->
<div class="container d-sm-none d-block">
    <div class="row mt-4">
        <div class="card" style="background-color: unset;border: unset;">
            <div class="card-header" style="background-color: unset;padding: 0;border: unset;">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Klien Lainnya</h5>
                </div>
            </div>
            <div class="card-body" style="padding: 10px 0 0 0;">
                <div class="row">
                    <?php foreach ($datas_pelanggan_lainnya->items as $key => $value) { ?>
                        <div class="col-md-2 col-4 mb-3">
                            <div class="card">
                                <div class="card-body" style="padding: 1rem">
                                    <a href="/customer/<?= $value['id_pelanggan'] ?>/detail" target="_blank">
                                        <div class="img-video" style="background: url('/assets/media/<?= $value['path_media'] ?>');background-size: 100%;background-position:  center;border-radius: 0.25rem;background-repeat: no-repeat;">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include __DIR__ . '/../Footer.php' ?>