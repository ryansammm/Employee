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
                            <h4 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;"><?= $data_partner['nama_partner'] ?></h4>
                        </div>
                        <hr>
                        <div class="text-center">
                            <a href="<?= $data_partner['link_partner'] ?>" target="_blank">
                                <img src="/assets/media/<?= $data_partner['path_media'] ?>" alt="" style="width: 20%;border-radius: 0.25rem;">
                            </a>
                        </div>

                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <div class="d-flex justify-content-md-start">
                            <h6 class="my-auto"><?= $data_partner['nama_perusahaan_partner'] ?></h6>
                        </div>
                        <div class="d-flex justify-content-md-end">
                            <a href="/gallery/<?= $data_partner['id_galeri'] ?>/detail" class="btn btn-primary me-2">Dokumentasi Pekerjaan</a>
                            <a href="<?= $data_partner['link_partner'] ?>" target="_blank" class="btn btn-primary">Website <?= $data_partner['nama_partner'] ?></a>
                        </div>
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

                    <?php foreach ($datas_partner->items as $key => $value) { ?>
                        <a href="/partner/<?= $value['id_partner'] ?>/detail" class="text-decoration-none text-center">
                            <div class="<?= $key == (count($datas_partner->items) - 1) ? '' : 'side-news-item' ?>" style="<?= $key == (count($datas_partner->items) - 1) ? 'padding: 0.5rem 1rem;' : '' ?>">
                                <!-- <div class="" style="background: url(/assets/media/<?= $value['path_media'] ?>);background-size: cover;background-position:center;width: 75px;height: 75px;border-radius: 0.25rem;margin-left: auto;margin-right: auto;"></div> -->
                                <div style="width: 100%;">
                                    <img src="/assets/media/<?= $value['path_media'] ?>" alt="" style="width: 35%;border-radius: 0.25rem;">
                                </div>
                                <div class="mt-3">
                                    <h6 style="font-size: 14px;"><?= $value['nama_partner'] ?></h6>
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
                    <?php foreach ($datas_partner_lainnya->items as $key => $value) { ?>
                        <div class="col-md-2 col-4 mb-3">
                            <div class="card">
                                <div class="card-body" style="padding: 1rem">
                                    <a href="/partner/<?= $value['id_partner'] ?>/detail" target="_blank">
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