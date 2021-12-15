<?php include __DIR__ . '/../Header.php' ?>

<!------- Landscape Banner ------->
<?php if (isset($banner_landscape[0])) { ?>
    <?= component('cms-banner-landscape/cms-banner-landscape', ['banner_foto' => arr_offset($banner_landscape[0], 'path_media')]) ?>
<?php } ?>

<!-- ----- News ------->
<div class="container">
    <div class="row mt-3">
        <div class="col-8">
            <div class="d-flex justify-content-between align-items-center">
                <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Berita Terkini</h5>
            </div>
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" style="height: 586px;">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                </div>
                <div class="carousel-inner" style="padding: 0px 15px;">
                    <?php for ($i = 0; $i < 2; $i++) { ?>
                        <div class="carousel-item <?= $i == 0 ? 'active' : '' ?>">
                            <div class="row mb-1">
                                <div class="col-12" style="padding: 0;">
                                    <div class="img-atas-berita" style="background: url(/assets/media/<?= $item_berita_new(0, $i, $datas->items, 'path_media') ?>);background-size: cover;background-position: center;">
                                        <div class="bg-atas-berita">
                                            <div class="text-atas-berita">
                                                <a href="/news/<?= $item_berita_new(0, $i, $datas->items, 'id_berita') ?>/detail" style="text-decoration: none;">
                                                    <h6 class="text-white mx-4"><?= $item_berita_new(0, $i, $datas->items, 'judul_berita') ?></h6>
                                                </a>
                                                <div class="row justify-content-around mx-3">
                                                    <div class="col d-flex">
                                                        <?php if (arr_offset($cms_setting, 'cms_like_berita') == '1') { ?>
                                                            <div class="sub-item" style="margin-top: 2px;">
                                                                <i class="bi bi-heart"></i>
                                                                <span>0</span>
                                                            </div>
                                                        <?php } ?>
                                                        <?php if (arr_offset($cms_setting, 'cms_comment_berita') == '1') { ?>
                                                            <div class="sub-item" style="margin-top: 2px;">
                                                                <i class="bi bi-chat"></i>
                                                                <span>0</span>
                                                            </div>
                                                        <?php } ?>
                                                        <?php if (arr_offset($cms_setting, 'cms_view_berita') == '1') { ?>
                                                            <div class="sub-item" style="margin-top: 2px;">
                                                                <i class="bi bi-eye"></i>
                                                                <span>0</span>
                                                            </div>
                                                        <?php } ?>
                                                        <div class="sub-item" style="margin-top: 2px;">
                                                            <span>50 menit</span>
                                                        </div>
                                                        <a class="text-decoration-none text-dark pe-1 d-flex" type="button" style="z-index: 999;" data-bs-toggle="modal" data-bs-target="#modalSosmed">
                                                            <div class="me-3 sub-item" style="margin-top: 2px;">
                                                                <i class="fas fa-share"></i>
                                                                <span>Bagikan</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6" style="padding: 0;padding-right: 2.5px;">
                                    <div class="img-bawah-berita" style="background: url(/assets/media/<?= $item_berita_new(1, $i, $datas->items, 'path_media') ?>);background-size: cover;background-position: center;">
                                        <div class="bg-atas-berita">
                                            <div class="text-bawah-berita">
                                                <a href="/news/<?= $item_berita_new(1, $i, $datas->items, 'id_berita') ?>/detail" style="text-decoration: none;">
                                                    <h6 class="text-white"><?= $item_berita_new(1, $i, $datas->items, 'judul_berita') ?></h6>
                                                </a>
                                                <div class="row justify-content-around">
                                                    <div class="col d-flex">
                                                        <?php if (arr_offset($cms_setting, 'cms_like_berita') == '1') { ?>
                                                            <div class="sub-item" style="margin-top: 2px;">
                                                                <i class="bi bi-heart"></i>
                                                                <span>0</span>
                                                            </div>
                                                        <?php } ?>
                                                        <?php if (arr_offset($cms_setting, 'cms_comment_berita') == '1') { ?>
                                                            <div class="sub-item" style="margin-top: 2px;">
                                                                <i class="bi bi-chat"></i>
                                                                <span>0</span>
                                                            </div>
                                                        <?php } ?>
                                                        <?php if (arr_offset($cms_setting, 'cms_view_berita') == '1') { ?>
                                                            <div class="sub-item" style="margin-top: 2px;">
                                                                <i class="bi bi-eye"></i>
                                                                <span>0</span>
                                                            </div>
                                                        <?php } ?>
                                                        <div class="sub-item" style="margin-top: 2px;">
                                                            <span>50 menit</span>
                                                        </div>
                                                        <a class="text-decoration-none text-dark pe-1 d-flex" type="button" style="z-index: 999;" data-bs-toggle="modal" data-bs-target="#modalSosmed">
                                                            <div class="me-3 sub-item" style="margin-top: 2px;">
                                                                <i class="fas fa-share"></i>
                                                                <span>Bagikan</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6" style="padding: 0;padding-left: 2.5px;">
                                    <div class="img-bawah-berita" style="background: url(/assets/media/<?= $item_berita_new(2, $i, $datas->items, 'path_media') ?>);background-size: cover;background-position: center;">
                                        <div class="bg-atas-berita">
                                            <div class="text-bawah-berita">
                                                <a href="/news/<?= $item_berita_new(2, $i, $datas->items, 'id_berita') ?>/detail" style="text-decoration: none;">
                                                    <h6 class="text-white"><?= $item_berita_new(2, $i, $datas->items, 'judul_berita') ?></h6>
                                                </a>
                                                <div class="row justify-content-around">
                                                    <div class="col d-flex">
                                                        <?php if (arr_offset($cms_setting, 'cms_like_berita') == '1') { ?>
                                                            <div class="sub-item" style="margin-top: 2px;">
                                                                <i class="bi bi-heart"></i>
                                                                <span>0</span>
                                                            </div>
                                                        <?php } ?>
                                                        <?php if (arr_offset($cms_setting, 'cms_comment_berita') == '1') { ?>
                                                            <div class="sub-item" style="margin-top: 2px;">
                                                                <i class="bi bi-chat"></i>
                                                                <span>0</span>
                                                            </div>
                                                        <?php } ?>
                                                        <?php if (arr_offset($cms_setting, 'cms_view_berita') == '1') { ?>
                                                            <div class="sub-item" style="margin-top: 2px;">
                                                                <i class="bi bi-eye"></i>
                                                                <span>0</span>
                                                            </div>
                                                        <?php } ?>
                                                        <div class="sub-item" style="margin-top: 2px;">
                                                            <span>50 menit</span>
                                                        </div>
                                                        <a class="text-decoration-none text-dark pe-1 d-flex" type="button" style="z-index: 999;" data-bs-toggle="modal" data-bs-target="#modalSosmed">
                                                            <div class="me-3 sub-item" style="margin-top: 2px;">
                                                                <i class="fas fa-share"></i>
                                                                <span>Bagikan</span>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>

        <!------- Berita Hangat ------->
        <div class="col">
            <div style="padding: 5px 0 5px 0;">
                <div class="d-flex justify-content-between align-items-center">
                    <h6 style="border-left: 5px solid #fe4d01;padding-left: 15px;">Sedang Hangat</h6>
                    <!-- <a href="" class="text-decoration-none" style="font-size: 14px;">Lihat Lainnya <i class="bi bi-chevron-right"></i></a> -->
                </div>
            </div>
            <div class="card">
                <div class="card-body" style="height: 558px;padding: 0;">
                    <?php foreach ($data_berita_hangat->items as $key => $value) { ?>
                        <div class="<?= $key == (count($data_berita_hangat->items) - 1) ? '' : 'side-news-item' ?>" style="<?= $key == (count($data_berita_hangat->items) - 1) ? 'padding: 0.5rem 1rem;' : '' ?>">
                            <div class="row">
                                <div class="col-md-8 pe-0">
                                    <h6 class="card-title">
                                        <a href="/news/<?= $value['id_berita'] ?>/detail" class="text-decoration-none text-dark truncate-string-3" data-bs-toggle="tooltip" data-bs-placement="bottom" title="<?= $value['judul_berita'] ?>"><?= $value['judul_berita'] ?></a>
                                    </h6>
                                </div>
                                <div class="col-md-4">
                                    <div class="rounded" style="background: url(/assets/media/<?= $value['path_media'] ?>);background-size: cover;background-position: center; width: 100%; height: 80px;"></div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="row justify-content-around text-side-trending">
                                        <div class="col d-flex">
                                            <?php if (arr_offset($cms_setting, 'cms_like_berita') == '1') { ?>
                                                <div class="sub-item" style="margin-top: 2px;">
                                                    <i class="bi bi-heart"></i>
                                                    <span>0</span>
                                                </div>
                                            <?php } ?>
                                            <?php if (arr_offset($cms_setting, 'cms_comment_berita') == '1') { ?>
                                                <div class="sub-item" style="margin-top: 2px;">
                                                    <i class="bi bi-chat"></i>
                                                    <span>0</span>
                                                </div>
                                            <?php } ?>
                                            <?php if (arr_offset($cms_setting, 'cms_view_berita') == '1') { ?>
                                                <div class="sub-item" style="margin-top: 2px;">
                                                    <i class="bi bi-eye"></i>
                                                    <span>0</span>
                                                </div>
                                            <?php } ?>
                                            <div class="sub-item" style="margin-top: 2px;">
                                                <span>50 menit</span>
                                            </div>
                                            <a class="text-decoration-none text-dark pe-1 d-flex" type="button" style="z-index: 999;" data-bs-toggle="modal" data-bs-target="#modalSosmed">
                                                <div class="me-3 sub-item" style="margin-top: 2px;">
                                                    <i class="fas fa-share"></i>
                                                    <span>Bagikan</span>
                                                </div>
                                            </a>
                                        </div>
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

<!------- Landscape Banner ------->
<?php if (isset($banner_landscape[1])) { ?>
    <?= component('cms-banner-landscape/cms-banner-landscape', ['banner_foto' => arr_offset($banner_landscape[1], 'path_media')]) ?>
<?php } ?>


<!------- Feed ------->
<div class="container">
    <div class="row mt-3">

        <!------- Category ------->
        <?php if ($cms_kategori_style && $cms_kategori_style['cms_side_menu_position'] == '1') { ?>
            <div class="col-md-3">
            <?php require __DIR__ . '/../cms/cms-kategori/cms-kategori.php' ?>
            </div>
        <?php } ?>

        <!------- Feed Content ------->
        <div class="col-md-9">
            <div class="card" style="background-color: unset;border: unset;">
                <div class="card-header" style="background-color: unset;padding: 0;border: unset;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Feed</h5>
                        <!-- <a href="/service" class="text-decoration-none" style="font-size: 14px;">Feed Lainnya <i class="bi bi-chevron-right"></i></a> -->
                    </div>
                </div>
                <div class="card-body" style="padding: 0 20px 0 20px;">
                    <div class="row">
                        <div class="col-12" style="background-color: white;border-radius: 7px;margin: 10px 0 0 0;">
                            <?php foreach ($data_feed->items as $key => $value) { ?>
                                <div class="<?= $key == (count($data_feed->items) - 1) ? '' : 'side-news-item' ?>" style="<?= $key == (count($data_feed->items) - 1) ? 'padding: 0.5rem 1rem;' : '' ?>">
                                    <div class="row py-2 pb-1">
                                        <div class="col-2 p-0">
                                            <div class="" style="background: url(/assets/media/<?= $value['path_media'] ?>);background-size: cover;background-position: top center;width: 130px;height: 100px;"></div>
                                        </div>
                                        <div class="col">
                                            <a href="/news/879123/detail" style="text-decoration: none;color: black">
                                                <div class="row">
                                                    <h6 class="card-title"><?= $value['judul_berita'] ?></h6>
                                                    <div class="truncate-string-2" style="font-size: 14px;"><?= html_entity_decode(nl2br($value['isi_berita'])) ?></div>
                                                </div>
                                            </a>
                                            <div class="row justify-content-around text-side-trending mt-3">
                                                <div class="col d-flex" style="margin-top: auto;">
                                                    <?php if (arr_offset($cms_setting, 'cms_like_berita') == '1') { ?>
                                                        <div class="sub-item" style="margin-top: 2px;">
                                                            <i class="bi bi-heart"></i>
                                                            <span>0</span>
                                                        </div>
                                                    <?php } ?>
                                                    <?php if (arr_offset($cms_setting, 'cms_comment_berita') == '1') { ?>
                                                        <div class="sub-item" style="margin-top: 2px;">
                                                            <i class="bi bi-chat"></i>
                                                            <span>0</span>
                                                        </div>
                                                    <?php } ?>
                                                    <?php if (arr_offset($cms_setting, 'cms_view_berita') == '1') { ?>
                                                        <div class="sub-item" style="margin-top: 2px;">
                                                            <i class="bi bi-eye"></i>
                                                            <span>0</span>
                                                        </div>
                                                    <?php } ?>
                                                    <div class="sub-item">
                                                        <span>50 menit</span>
                                                    </div>
                                                </div>
                                                <div class="col-2 d-flex">
                                                    <a class="text-decoration-none text-dark pe-1 d-flex" type="button" style="z-index: 999;" data-bs-toggle="modal" data-bs-target="#modalSosmed">
                                                        <div class="me-3 sub-item" style="margin-top: 2px;">
                                                            <i class="fas fa-share"></i>
                                                            <span>Bagikan</span>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <?= $data_feed->links() ?>
                    </div>
                </div>

            </div>

            <!------- Right Category ------->
            <?php if ($cms_kategori_style && $cms_kategori_style['cms_side_menu_position'] == '2') { ?>
                <?php require __DIR__ . '/../cms/cms-kategori/cms-kategori.php' ?>
            <?php } ?>

        </div>

        <!------- Right Category ------->
        <?php if ($cms_kategori_style && $cms_kategori_style['cms_side_menu_position'] == '2') { ?>
            <?php require __DIR__ . '/../cms/cms-kategori/cms-kategori.php' ?>
        <?php } ?>

    </div>
</div>


<!------- Model Share ------->
<div class="modal fade" id="modalSosmed" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Share Berita</h5>
                <button type="button" class="btn btn-outline-danger btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row justify-content-center">
                    <div class="col-2 mb-3">
                        <a href="" class="whatsapp text-decoration-none" target="_blank"><img src="/assets/icon/sosmed/whatsapp.svg" class="w-50 d-block mx-auto" alt="">
                            <p class="text-dark text-center" style="font-size: 12px"><br>Whatsapp</p>
                        </a>
                    </div>
                    <div class="col-2 mb-3">
                        <a href="" class="instagram text-decoration-none" target="_blank"><img src="/assets/icon/sosmed/instagram.svg" class="w-50 d-block mx-auto" alt="">
                            <p class="text-dark text-center" style="font-size: 12px"><br>Instagram</p>
                        </a>
                    </div>
                    <div class="col-2 mb-3">
                        <a href="" class="telegram text-decoration-none" target="_blank"><img src="/assets/icon/sosmed/telegram.svg" class="w-50 d-block mx-auto" alt="">
                            <p class="text-dark text-center" style="font-size: 12px"><br>Telegram</p>
                        </a>
                    </div>
                    <div class="col-2 mb-3">
                        <a href="" class="facebook text-decoration-none" target="_blank"><img src="/assets/icon/sosmed/facebook.svg" class="w-50 d-block mx-auto" alt="">
                            <p class="text-dark text-center" style="font-size: 12px"><br>Facebook</p>
                        </a>
                    </div>
                    <div class="col-2 mb-3">
                        <a href="" class="twitter text-decoration-none" target="_blank"><img src="/assets/icon/sosmed/twitter.svg" class="w-50 d-block mx-auto" alt="">
                            <p class="text-dark text-center" style="font-size: 12px"><br>Twitter</p>
                        </a>
                    </div>
                    <div class="col-2 mb-3">
                        <a href="" class="email text-decoration-none" target="_blank"><img src="/assets/icon/sosmed/email.svg" class="w-50 d-block mx-auto" alt="">
                            <p class="text-dark text-center" style="font-size: 12px"><br>Email</p>
                        </a>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-danger btn-sm" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php include __DIR__ . '/../Footer.php' ?>