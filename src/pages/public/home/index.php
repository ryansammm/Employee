<?php include __DIR__ . '/../Header.php' ?>


<!------- About Us ------->
<section id="about-us" class="container pb-3">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div style="background-image: url('/assets/media/<?= $detail_profil['path_media'] ?>');width:100%;height: 100%;background-size: cover;background-position: center;border-radius: 5pt;"></div>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-between align-items-center mb-1 ms-1">
                        <h4 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;"><?= $detail_profil['judul_profil'] ?></h4>
                    </div>
                    <hr style="margin-left: 4px;">
                    <div class="description ms-1">
                        <h6 class="fw-normal" style="text-align: justify;"><?= html_entity_decode(nl2br($detail_profil['deskripsi_profil'])) ?></h6>
                    </div>
                </div>
                <div class="mt-4">
                    <a class="btn btn-sm btn-outline-primary float-end" href="/about" style="position: absolute;right: 10pt;bottom: 10pt;">Selengkapnya &raquo;</a>
                </div>
            </div>
        </div>
    </div>
</section>


<!------- Berita ------->
<section id="Berita">
    <div class="container mt-4 pb-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Berita</h5>
            <a href="/news" class="text-decoration-none">Lihat Lainnya <i class="bi bi-chevron-right"></i></a>
        </div>
        <div class="row">

            <?php foreach ($data_berita->items as $key => $value) { ?>
                <div class="col-md">
                    <a href="/news/asdw/detail" class="text-dark text-decoration-none">
                        <div class="card for-hover p-3">
                            <div class="align-self-center rounded-1" style="background-image: url(/assets/media/<?= $value['path_media'] ?>);width: 100%;height: 140px;background-size: cover;background-position: center;"></div>
                            <h6 class="mt-3 mb-0 pb-0"><?= $value['judul_berita'] ?></h6>
                            <small class=" mb-1 text-muted"><?= $value['kategori_berita'] ?></small>
                            <div class="truncate-string-2" style="font-size: 14px;"><?= html_entity_decode(nl2br($value['isi_berita'])) ?></div>
                        </div>
                    </a>
                </div>
            <?php } ?>

        </div>
    </div>
</section>


<!------- Layanan ------->
<section id="Layanan">
    <div class="container mt-4 pb-3">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Layanan Terbaik Kami</h5>
            <a href="/service" class="text-decoration-none">Lihat Lainnya <i class="bi bi-chevron-right"></i></a>
        </div>
        <div class="row">

            <?php foreach ($data_layanan->items as $key => $value) { ?>
                <div class="col-md text-center">
                    <a href="/service/<?= $value['id_layanan'] ?>/detail" class="text-dark text-decoration-none">
                        <div class="card for-hover p-3">
                            <div class="align-self-center rounded-1" style="background-image: url(/assets/media/<?= $value['path_media'] ?>);width: 100%;height: 140px;background-size: cover;background-position: center;"></div>
                            <h4 class="mt-3"><?= $value['nama_layanan'] ?></h4>
                            <div class="mb-3 truncate-string-3" style="font-size: 14px;"><?= html_entity_decode(nl2br($value['deskripsi_layanan'])) ?></div>
                        </div>
                    </a>
                </div>
            <?php } ?>

        </div>
    </div>
</section>

<!------- Video ------->
<div class="container">
    <div class="row">
        <div class="card pt-3 pb-3" style="background-color: unset;border: unset;">
            <div class="card-header" style="background-color: unset;padding: 0;border: unset;">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Video</h5>
                </div>
            </div>
            <div class="card-body" style="padding: 10px 0 0 0;">
                <div class="row">

                    <?php foreach ($data_video->items as $key => $value) { ?>
                        <div class="col-md-3">
                            <div class="card" style="height: 200px !important;">
                                <div class="card-body p-0">
                                    <div class="js-video [youtube, widescreen]">
                                        <iframe src="<?= $value['link_video'] ?>" style="width: 100%; height: 150pt;" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                </div>
            </div>
        </div>
    </div>
</div>


<!------- Produk ------->
<div class="container">
    <div class="row pt-3 pb-3">
        <div class="card" style="background-color: unset;border: unset;">
            <div class="card-header" style="background-color: unset;padding: 0;border: unset;">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Produk Kami</h5>
                    <a href="/product" class="text-decoration-none">Lihat Lainnya <i class="bi bi-chevron-right"></i></a>
                </div>
            </div>
            <div class="card-body" style="padding: 10px 0 0 0;">
                <div class="row">
                    <?php foreach ($data_produk->items as $key => $value) { ?>
                        <div class="col-md-2 mb-3">
                            <div class="card shadow-sm" style="border-radius: 8px;">
                                <div style="background-image: url(/assets/media/<?= $value['path_media'] ?>);width: 100%;height:190px;background-size: cover;background-position: center; border-radius: 8px 8px 0 0;"></div>
                                <div class="card-body" style="font-size: 12px;">
                                    <h6><?= $value['nama_produk'] ?></h6>
                                    <div class="card-text truncate-string-2 mb-1"><?= html_entity_decode(nl2br($value['deskripsi_produk'])) ?></div>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a href="/product/<?= $value['id_produk'] ?>/detail" type="button" class="btn btn-sm btn-outline-primary">Detail</a>
                                        </div>
                                        <a href="/product/<?= $value['id_kategori_produk'] ?>/kategori" class="text-muted text-decoration-none"><small><?= $value['nama_kategori_produk'] ?></small></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>


<!------- Klien Kami ------->
<div class="container">
    <div class="row pt-3">
        <div class="card" style="background-color: unset;border: unset;">
            <div class="card-header" style="background-color: unset;padding: 0;border: unset;">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Klien Kami</h5>
                    <a href="/customer" class="text-decoration-none">Lihat Lainnya <i class="bi bi-chevron-right"></i></a>
                </div>
            </div>
            <div class="card-body" style="padding: 10px 0 0 0;">
                <div class="row">
                    <?php foreach ($data_pelanggan->items as $key => $value) { ?>
                        <div class="col-2">
                            <div class="card">
                                <div class="card-body" style="padding: 1rem">
                                    <a href="">
                                        <div class="img-video" style="background: url('/assets/media/<?= $value['path_media'] ?>');background-size: cover;background-position:  center;">
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