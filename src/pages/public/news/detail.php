<?php include __DIR__ . '/../Header.php' ?>

<div class="container">
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
                    <!-- <nav>
                    <div class="nav nav-tabs" id="nav-tab">
                        <a class="nav-item nav-link active" data-toggle="tab" href="#nav-semua" role="tab">Semua Komentar</a>
                    </div>
                </nav>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active p-3" id="nav-semua" role="tabpanel">
                        <span>2 Komentar</span>
                        <div class="row my-3">
                            <div class="col-sm-2">
                                <img src="https://awsimages.detik.net.id/community/media/visual/2019/09/25/f970f73a-2f96-47f0-9de8-70ba736a287f.jpeg?w=750&q=90" class="rounded-circle" width="80px">
                            </div>
                            <div class="col-sm-9">
                                <div class="d-flex">
                                    <h6>Johan Yudiono</h6>
                                    <span class="text-muted ps-3" style="font-size: 13px;">2 Bulan yang lalu</span>
                                </div>
                                <p class="text-grey">
                                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                    nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
                                    erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci
                                    tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo
                                </p>
                                <span class="pe-2 text-lightgrey"><i class="far fa-thumbs-up"></i>2k</span>
                                <span class="pe-2 text-lightgrey"><i class="far fa-thumbs-down"></i></i>50</span>
                                <span class="pe-2 text-lightgrey"><i class="far fa-comment"></i>1</span>
                                <div class="card shadow my-2 p-2">
                                    <span>Balasan</span>
                                    <div class="row my-3">
                                        <div class="col-sm-3">
                                            <img src="https://awsimages.detik.net.id/community/media/visual/2019/09/25/f970f73a-2f96-47f0-9de8-70ba736a287f.jpeg?w=750&q=90" class="rounded-circle" width="80px">
                                        </div>
                                        <div class="col-sm-8">
                                            <div class="d-flex">
                                                <h6>Johan Yudiono</h6>
                                                <span class="text-muted ps-3" style="font-size: 13px;">2 Bulan yang lalu</span>
                                            </div>
                                            <p class="text-grey">
                                                Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam
                                                nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam
                                                erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci
                                                tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo
                                            </p>
                                            <span class="pe-2 text-lightgrey"><i class="far fa-thumbs-up"></i>2k</span>
                                            <span class="pe-2 text-lightgrey"><i class="far fa-thumbs-down"></i></i>50</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-populer" role="tabpanel">
                        <h4>Komentar Populer</h4>
                    </div>
                    <div class="tab-pane fade" id="nav-terbaru" role="tabpanel">
                        <h4>Komentar Terbaru</h4>
                    </div>
                </div> -->
                </div>
            <?php } ?>

        </div>


        <!------- Side Content ------->
        <div class="col-md-4">
            <div class="row d-flex align-items-center">

                <!------- Trending ------->
                <div class="card mb-4 px-0">

                    <div style="background-color: white;padding: 5px 0 5px 0;">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;">Sedang Hangat</h5>
                            <a href="" class="text-decoration-none">Lihat Lainnya <i class="bi bi-chevron-right"></i></a>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-body" style="height: 460px;overflow-y:scroll;padding: 0;">

                            <?php foreach ($data_berita->items as $key => $value) { ?>
                                <div class="side-news-item">
                                    <div class="row">
                                        <div class="d-flex">
                                            <a href="/news/<?= $value['id_berita'] ?>/detail" class="text-decoration-none text-dark">
                                                <h6 class="card-title" style="padding: 0 20px 0 0;width: 225px;"><?= $value['judul_berita'] ?></h6>
                                            </a>
                                            <a href="/news/<?= $value['id_berita'] ?>/detail">
                                                <div class="rounded" style="background: url(/assets/media/<?= $value['path_media'] ?>);background-size: cover;background-position: center; width: 80px; height: 80px;"></div>
                                            </a>
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
                            <?php  } ?>

                        </div>
                    </div>

                </div>

                <!------- Category ------->
                <div class="card">
                    <div class="card-body">
                        <div style="background-color: white;padding: 5px 0 5px 0;">
                            <div class="d-flex justify-content-between align-items-center">
                                <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;">Kategori</h5>
                            </div>
                            <hr>
                        </div>
                        <ul class="nav flex-column" style="font-size: 14px;">
                            <?php foreach ($data_kategori_berita->items as $key => $value) { ?>
                                <li class="nav-item border-bottom mb-2"><a class="nav-link p-0 text-dark" href="/news/<?= $value['id_kategori_berita'] ?>/kategori"><?= $value['kategori_berita'] ?></a></li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

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