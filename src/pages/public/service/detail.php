<?php include __DIR__ . '/../Header.php' ?>

<?php require __DIR__ . '/../cms/cms-kategori/cms-kategori-error.php' ?>
<?php require __DIR__ . '/../cms/cms-kategori/cms-kategori-style.php' ?>

<!------- Landscape Banner ------->
<div class="container">
    <?php if (isset($GLOBALS['banner_landscape'][0])) { ?>
        <?= component('cms-banner-landscape/cms-banner-landscape', ['banner_foto' => arr_offset($GLOBALS['banner_landscape'][0], 'path_media')]) ?>
    <?php } ?>
</div>

<div class="container mt-3">
    <div class="row">
        <!------- Left Category ------->
        <?php if ($cms_kategori_style && $cms_kategori_style['cms_side_menu_position'] == '1') { ?>
            <div class="col-md-3  d-sm-block d-none">
                <?php require __DIR__ . '/../cms/cms-kategori/cms-kategori.php' ?>
                <!------- Landscape Banner Samping ------->
                <?php if (!empty($GLOBALS['banner_potrait'])) { ?>
                    <?php foreach ($GLOBALS['banner_potrait'] as $key => $data) { ?>
                        <?= component('cms-banner-potrait/cms-banner-potrait', ['banner_foto' => arr_offset($data, 'path_media')]) ?>
                    <?php } ?>
                <?php } ?>
            </div>
        <?php } ?>

        <!------- Main Content ------->
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div style="background-image: url('/assets/media/<?= $data_layanan['path_media'] ?>');width:100%;height: 100%;background-size: cover;background-position: center;border-radius: 0.25rem 0 0 0.25rem;"></div>
                        </div>
                        <div class="col-md-6">
                            <div class=" justify-content-between align-items-center mb-3">
                                <h4 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;"><?= $data_layanan['nama_layanan'] ?></h4>
                                <hr>
                                <small class="text-muted">Kode Layanan : <?= $data_layanan['kode_layanan'] ?></small><br>
                                <small class="text-muted">Kategori : <a href="/service/<?= $data_layanan['id_kategori_layanan'] ?>/kategori" class="text-muted text-decoration-none"><?= $data_layanan['nama_kategori_layanan'] ?></a></small>
                            </div>
                            <div class="description">
                                <h6 class="fw-normal" style="text-align: justify;"><?= html_entity_decode(nl2br($data_layanan['deskripsi_layanan'])) ?></h6>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <!------- Share ------->
                    <div class="row justify-content-center">
                        <div class="col-md-2 col-4">
                            <a class="text-decoration-none" href="whatsapp://send?text=http://beta.pancateksindo.co.id<?= $GLOBALS['url'] ?>" data-action="share/whatsapp/share" target="_blank">
                                <i class="bi bi-whatsapp" style="background: -webkit-linear-gradient(#9c47fc, #0853a6); -webkit-background-clip: text;-webkit-text-fill-color: transparent;"> Whatsapp</i>
                            </a>
                        </div>
                        <div class="col-md-2 col-4">
                            <a class="text-decoration-none" href="https://www.facebook.com/sharer/sharer.php?u=http://beta.pancateksindo.co.id<?= $GLOBALS['url'] ?>" target="_blank">
                                <i class="bi bi-facebook" style="background: -webkit-linear-gradient(#9c47fc, #0853a6); -webkit-background-clip: text;-webkit-text-fill-color: transparent;"> Facebook</i>
                            </a>
                        </div>
                        <div class="col-md-2 col-4">
                            <a class="text-decoration-none" href="https://twitter.com/share?url=http://beta.pancateksindo.co.id<?= $GLOBALS['url'] ?>" target="_blank">
                                <i class="bi bi-twitter" style="background: -webkit-linear-gradient(#9c47fc, #0853a6); -webkit-background-clip: text;-webkit-text-fill-color: transparent;"> Twiiter</i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!------- Services Image ------->
            <div class="card mt-3">
                <div class="card-body p-2">
                    <div class="owl-carousel owl-theme">
                        <?php foreach ($data_galeri_layanan->items as $key => $value) { ?>
                            <div class="item">
                                <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal" data-file="<?= arr_offset($value, 'path_media') ?>">
                                    <div style="background-image: url(/assets/media/<?= $value['path_media'] ?>);width: 100%;height: 181px;background-size: cover;background-position: center;border-radius: 0.25rem;"></div>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>

            <!------- Modal Services Image ------->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-body p-1">
                            <img class="fileSakip" src="" width="100%" alt="">
                        </div>
                    </div>
                </div>
            </div>


            <!------- Deskripsi Lengkap ------->
            <section class="mt-3">
                <div class="card">
                    <div class="card-body px-0 pe-3">
                        <div class="d-flex justify-content-between align-items-center mb-3 ms-3">
                            <h6 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Deskripsi Lengkap</h6>
                        </div>
                        <div class="description  ms-3">
                            <div class="fw-normal" style="text-align: justify;"><?= html_entity_decode(nl2br($data_layanan['deskripsi_lengkap_layanan'])) ?></div>
                        </div>
                    </div>
                </div>
            </section>

            <!------- Spesifikasi ------->
            <?php if ($data_layanan['spesifikasi_layanan'] != NULL) { ?>
                <section class="mt-3">
                    <div class="card">
                        <div class="card-body px-0 pe-3">
                            <div class="d-flex justify-content-between align-items-center mb-3 ms-3">
                                <h6 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Spesifikasi</h6>
                            </div>
                            <div class="description  ms-3">
                                <div class="fw-normal" style="text-align: justify;"><?= html_entity_decode(nl2br($data_layanan['spesifikasi_layanan'])) ?></div>
                            </div>
                        </div>
                    </div>
                </section>
            <?php } ?>

            <!------- Layanan Lainnya ------->
            <section class="mt-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Layanan Lainnya</h5>
                    <a href="/service" class="text-decoration-none" style="font-size: 14px;">Lihat Lainnya <i class="bi bi-chevron-right"></i></a>
                </div>
                <div class="row">
                    <?php foreach ($datas_layanan->items as $key => $value) { ?>
                        <div class="col-md-3 col-4 mb-3">
                            <a class="text-decoration-none text-dark" href="/service/<?= $value['id_layanan'] ?>/detail">
                                <div class="card p-0">
                                    <div class=" align-self-center" style="background-image: url(/assets/media/<?= $value['path_media'] ?>);width: 100%;height: 140px;background-size: cover;background-position: center;border-radius: 0.25rem 0.25rem 0 0;"></div>
                                    <h6 class="mt-3 px-2"><?= $value['nama_layanan'] ?></h6>
                                    <div class="mb-3 truncate-string-2 px-2" style="font-size: 14px;"><?= html_entity_decode(nl2br($value['deskripsi_layanan'])) ?></div>
                                    <!-- <p class="mt-3"><a class="btn btn-sm btn-outline-primary" style="font-size: 10px !important;" href="/service/<?= $value['id_layanan'] ?>/detail">Detail &raquo;</a></p> -->
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </section>

            <!------- Layanan Yang Mungkin Anda Sukai ------->
            <section class="mt-3">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Layanan Yang Mungkin Anda Sukai</h5>
                    <a href="/service" class="text-decoration-none" style="font-size: 14px;">Lihat Lainnya <i class="bi bi-chevron-right"></i></a>
                </div>
                <div class="row">
                    <?php foreach ($all_layanan->items as $key => $value) { ?>
                        <div class="col-md col-4 mb-3">
                            <a class="text-decoration-none text-dark" href="/service/<?= $value['id_layanan'] ?>/detail">
                                <div class="card p-0">
                                    <div class=" align-self-center" style="background-image: url(/assets/media/<?= $value['path_media'] ?>);width: 100%;height: 140px;background-size: cover;background-position: center;border-radius: 0.25rem 0.25rem 0 0;"></div>
                                    <h6 class="mt-3 px-2"><?= $value['nama_layanan'] ?></h6>
                                    <div class="mb-3 truncate-string-2 px-2" style="font-size: 14px;"><?= html_entity_decode(nl2br($value['deskripsi_layanan'])) ?></div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </section>

            <!------- Landscape Banner Bawah ------->
            <?php if (isset($GLOBALS['banner_landscape'][1])) { ?>
                <?= component('cms-banner-landscape/cms-banner-landscape', ['banner_foto' => arr_offset($GLOBALS['banner_landscape'][1], 'path_media')]) ?>
            <?php } ?>

        </div>

        <!------- Right Category ------->
        <?php if ($cms_kategori_style && $cms_kategori_style['cms_side_menu_position'] == '2') { ?>
            <div class="col-md-3">
                <?php require __DIR__ . '/../cms/cms-kategori/cms-kategori.php' ?>
            </div>
            <!------- Landscape Banner Samping ------->
            <?php if (!empty($GLOBALS['banner_potrait'])) { ?>
                <?php foreach ($GLOBALS['banner_potrait'] as $key => $data) { ?>
                    <?= component('cms-banner-potrait/cms-banner-potrait', ['banner_foto' => arr_offset($data, 'path_media')]) ?>
                <?php } ?>
            <?php } ?>
        <?php } ?>

    </div>
</div>

<script>
    $("#exampleModal").on("show.bs.modal", function(event) {
        var button = event.relatedTarget;
        var file = button.getAttribute("data-file");
        var extFile = file.split(".");
        console.log(file);

        $(this)
            .find(".fileSakip")[0]
            .setAttribute("src", "/assets/media/" + file);
    });
</script>



<?php include __DIR__ . '/../Footer.php' ?>