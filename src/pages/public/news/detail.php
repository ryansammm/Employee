<?php include __DIR__ . '/../Header.php' ?>

<?php require __DIR__ . '/../cms/cms-kategori/cms-kategori-error.php' ?>
<?php require __DIR__ . '/../cms/cms-kategori/cms-kategori-style.php' ?>

<!------- Landscape Banner ------->
<div class="container">
    <?php if (isset($banner_landscape[0])) { ?>
        <?= component('cms-banner-landscape/cms-banner-landscape', ['banner_foto' => arr_offset($banner_landscape[0], 'path_media')]) ?>
    <?php } ?>
</div>

<div class="container mt-3">
    <div class="row">

        <!------- Main Content ------->
        <div class="col-md-8">
            <div class="card rounded p-3" style="border-top: 5px solid #fe4d01;">
                <h4 class="ps-3"><?= $detail_berita['judul_berita'] ?></h4>
                <span class="text-muted ps-3" style="font-size: 12px;"><?= date_format(date_create($detail_berita['tgl_publish']), "j M Y") ?> | <?= $detail_berita['nama_depan'] ?> <?= $detail_berita['nama_belakang'] ?> | <a href="/news/<?= $detail_berita['id_kategori_berita'] ?>/kategori" class="text-muted text-decoration-none"> <?= $detail_berita['kategori_berita'] ?></a></span>
                <img src="/assets/media/<?= $detail_berita['path_media'] ?>" alt="" style="width: 100%;height: 100%;" class="mt-3 px-3">
                <div class="px-3 mt-3">
                    <?= html_entity_decode(nl2br($detail_berita['isi_berita'])) ?>
                    <span class="badge bg-danger">Opini suara & publik</span>
                    <span class="badge bg-danger">Public Government</span>
                    <hr>
                    <div class="row d-flex justify-content-center">
                        <?php if (arr_offset($cms_setting, 'cms_like_berita') == '1') { ?>
                            <div class="col-6 col-md-4 text-center text-grey">
                                <a href="/likeBerita/<?= $detail_berita['id_berita'] ?>/store" class="text-dark text-decoration-none">
                                    <i class="far fa-thumbs-up"></i>
                                </a>
                                <span>0</span> Suka
                            </div>
                            <div class="col-6 col-md-4 text-center text-grey">
                                <a href="/dislikeBerita/<?= $detail_berita['id_berita'] ?>/store" class="text-dark text-decoration-none">
                                    <i class="far fa-thumbs-up" style="-ms-transform: rotate(180deg);transform: rotate(180deg);"></i>
                                </a>
                                <span>0</span> Tidak Suka
                            </div>
                        <?php } ?>
                        <div class="col-6 col-md-4 text-center text-grey">
                            <a href="#" class="text-dark text-decoration-none btn-sosmed" data-bs-toggle="modal" data-bs-target="#modalSosmed" data-bs-url="<?= $site_url ?>/informasi/berita/<?= $detail_berita['id_berita'] ?>" data-bs-idBerita="<?= $detail_berita['id_berita'] ?>">
                                <i class="fas fa-share-alt"></i>
                                <span>0</span> Bagikan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <?php if (arr_offset($cms_setting, 'cms_comment_berita') == '1') { ?>
                <div class="card my-2 p-4">
                    <form action="/komentar/<?= $detail_berita['id_berita'] ?>/store" method="POST">
                        <textarea class="form-control" rows="5" placeholder="Silahkan tuliskan komentarmu...."></textarea>
                        <div class="d-flex flex-row-reverse">
                            <button type="submit" class="btn btn-danger rounded mt-3">Kirim</button>
                        </div>
                    </form>
                </div>
            <?php } ?>

        </div>


        <!------- Side Content ------->
        <div class="col-md-4 pe-4">
            <div class="row d-flex align-items-center">

                <!------- Berita Hangat ------->
                <div class="card mb-3 px-0">
                    <div style="background-color: white;padding: 5px 0 5px 0;">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;">Sedang Hangat</h5>
                            <!-- <a href="" class="text-decoration-none">Lihat Lainnya <i class="bi bi-chevron-right"></i></a> -->
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

                <?php if ($cms_kategori_style && $cms_kategori_style['cms_side_menu_position'] == '1') { ?>
                    <!-- Kategori -->
                    <?php require __DIR__ . '/../cms/cms-kategori/cms-kategori.php' ?>
                    <!-- Banner Potrait -->
                    <?php if (!empty($banner_potrait)) { ?>
                        <?php foreach ($banner_potrait as $key => $data) { ?>
                            <?= component('cms-banner-potrait/cms-banner-potrait', ['banner_foto' => arr_offset($data, 'path_media')]) ?>
                        <?php } ?>
                    <?php } ?>
                <?php } ?>

            </div>
        </div>
    </div>
</div>


<!------- Model Share ------->
<div class="modal fade" id="modalSosmed" tabindex="-1" aria-labelledby="modalSosmedLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalSosmedLabel">Share Berita</h5>
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