<?php include __DIR__ . '/../Header.php' ?>

<?php require __DIR__ . '/../cms/cms-kategori/cms-kategori-error.php' ?>
<?php require __DIR__ . '/../cms/cms-kategori/cms-kategori-style.php' ?>

<div class="container">
    <div class="row">
        <!------- Left Content ------->
        <?php if ($cms_kategori_style && $cms_kategori_style['cms_side_menu_position'] == '1') { ?>
            <?php require __DIR__ . '/../cms/cms-kategori/cms-kategori.php' ?>
        <?php } ?>

        <div class="col-md-9">

            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div style="background-image: url('/assets/media/<?= $data_produk['path_media'] ?>');width:100%;height: 100%;background-size: cover;background-position: center;border-radius: 0.25rem 0 0 0.25rem;"></div>
                        </div>
                        <div class="col-md-6">
                            <div class=" justify-content-between align-items-center mb-3 ms-3">
                                <h4 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;"><?= $data_produk['nama_produk'] ?></h4>
                                <hr>
                                <small class="">Kode Produk : 980829</small><br>
                                <small class="">Kategori : <?= $data_produk['nama_kategori_produk'] ?></small>
                            </div>
                            <div class="description  ms-3">
                                <h6 class="fw-normal" style="text-align: justify;"><?= html_entity_decode(nl2br($data_produk['deskripsi_produk'])) ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!------- Spesifikasi ------->
            <section class="mt-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3 ms-3">
                            <h6 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Spesifikasi</h6>
                        </div>
                        <div class="description  ms-3">
                            <h6 class="fw-normal" style="text-align: justify;"><?= html_entity_decode(nl2br($data_produk['spesifikasi_produk'])) ?></h6>
                        </div>
                    </div>
                </div>
            </section>

            <!------- Produk Lainnya ------->
            <section class="mt-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Produk Lainnya</h5>
                    <a href="/product" class="text-decoration-none" style="font-size: 14px;">Lihat Lainnya <i class="bi bi-chevron-right"></i></a>
                </div>
                <div class="row">
                    <?php foreach ($datas_produk->items as $key => $value) { ?>
                        <div class="col-md-3">
                            <a class="text-decoration-none text-dark" href="/product/<?= $value['id_produk'] ?>/detail">
                                <div class="card p-0">
                                    <div class="align-self-center" style="background-image: url(/assets/media/<?= $value['path_media'] ?>);width: 100%;height: 140px;background-size: cover;background-position: center;border-radius: 0.25rem 0.25rem 0 0;"></div>
                                    <h4 class="mt-3 px-2" style="font-size: 16px;"><?= $value['nama_produk'] ?></h4>
                                    <div class="mb-3 truncate-string-2 px-2" style="font-size: 12px;"><?= html_entity_decode(nl2br($value['deskripsi_produk'])) ?></div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>

                    <?= $datas_produk->links() ?>
                </div>
            </section>

            <!------- Produk Yang Mungkin Anda Sukai ------->
            <section class="mt-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Produk Yang Mungkin Anda Sukai</h5>
                    <a href="/product" class="text-decoration-none" style="font-size: 14px;">Lihat Lainnya <i class=" bi bi-chevron-right"></i></a>
                </div>
                <div class="row">
                    <?php foreach ($all_produk->items as $key => $value) { ?>
                        <div class="col-md">
                            <a class="text-decoration-none text-dark" href="/product/<?= $value['id_produk'] ?>/detail">
                                <div class="card p-0">
                                    <div class="align-self-center" style="background-image: url(/assets/media/<?= $value['path_media'] ?>);width: 100%;height: 140px;background-size: cover;background-position: center;border-radius: 0.25rem 0.25rem 0 0;"></div>
                                    <h4 class="mt-3 px-2" style="font-size: 16px;"><?= $value['nama_produk'] ?></h4>
                                    <div class="mb-3 truncate-string-2 px-2" style="font-size: 12px;"><?= html_entity_decode(nl2br($value['deskripsi_produk'])) ?></div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
                <?= $all_produk->links() ?>
            </section>

        </div>
    </div>
</div>



<?php include __DIR__ . '/../Footer.php' ?>