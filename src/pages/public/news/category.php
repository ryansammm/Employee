<?php include __DIR__ . '/../Header.php' ?>

<!-- ----- News ------->
<div class="container">
    <div class="d-flex justify-content-between align-items-center">
        <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Berita Terkini</h5>
    </div>
    <div class="row mt-3">

        <div class="col-8">
            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" style="height: 525px;">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                </div>
                <div class="carousel-inner" style="padding: 0px 15px;">
                    <?php for ($i = 0; $i < 2; $i++) { ?>
                        <div class="carousel-item <?= $i == 0 ? 'active' : '' ?>">
                            <div class="row mb-1">
                                <div class="col-12" style="padding: 0;">
                                    <div class="img-atas-berita" style="background: url(/assets/media/<?= $item_berita_new(0, $i, $datas->items, 'path_media') ?>);background-size: cover;background-position: top center;">
                                        <div class="bg-atas-berita">
                                            <div class="text-atas-berita">
                                                <a href="/berita/<?= $item_berita_new(0, $i, $datas->items, 'id_berita') ?>" style="text-decoration: none;">
                                                    <h6 class="text-white"><?= $item_berita_new(0, $i, $datas->items, 'judul_berita') ?></h6>
                                                </a>
                                                <div class="row justify-content-around">
                                                    <div class="col d-flex">
                                                        <div class="sub-item">
                                                            <i class="bi bi-heart"></i>
                                                            <span>0</span>
                                                        </div>
                                                        <div class="sub-item">
                                                            <i class="bi bi-heart"></i>
                                                            <span>0</span>
                                                        </div>
                                                        <div class="sub-item">
                                                            <span>50 menit</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <!-- Button trigger modal -->
                                                        <button class="btn text-white" style="z-index: 999;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            <i class="bi bi-three-dots-vertical"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6" style="padding: 0;padding-right: 2.5px;">
                                    <div class="img-bawah-berita" style="background: url(/assets/media/<?= $item_berita_new(1, $i, $datas->items, 'path_media') ?>);background-size: cover;background-position: top center;">
                                        <div class="bg-atas-berita">
                                            <div class="text-bawah-berita">
                                                <a href="/berita/<?= $item_berita_new(1, $i, $datas->items, 'id_berita') ?>" style="text-decoration: none;">
                                                    <h6 class="text-white"><?= $item_berita_new(1, $i, $datas->items, 'judul_berita') ?></h6>
                                                </a>
                                                <div class="row justify-content-around">
                                                    <div class="col d-flex">
                                                        <div class="sub-item">
                                                            <i class="bi bi-heart"></i>
                                                            <span>0</span>
                                                        </div>
                                                        <div class="sub-item">
                                                            <i class="bi bi-heart"></i>
                                                            <span>0</span>
                                                        </div>
                                                        <div class="sub-item">
                                                            <span>50 menit</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <!-- Button trigger modal -->
                                                        <button class="btn text-white" style="z-index: 999;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            <i class="bi bi-three-dots-vertical"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6" style="padding: 0;padding-left: 2.5px;">
                                    <div class="img-bawah-berita" style="background: url(/assets/media/<?= $item_berita_new(2, $i, $datas->items, 'path_media') ?>);background-size: cover;background-position: top center;">
                                        <div class="bg-atas-berita">
                                            <div class="text-bawah-berita">
                                                <a href="/berita/<?= $item_berita_new(2, $i, $datas->items, 'id_berita') ?>" style="text-decoration: none;">
                                                    <h6 class="text-white"><?= $item_berita_new(2, $i, $datas->items, 'judul_berita') ?></h6>
                                                </a>
                                                <div class="row justify-content-around">
                                                    <div class="col d-flex">
                                                        <div class="sub-item">
                                                            <i class="bi bi-heart"></i>
                                                            <span>0</span>
                                                        </div>
                                                        <div class="sub-item">
                                                            <i class="bi bi-heart"></i>
                                                            <span>0</span>
                                                        </div>
                                                        <div class="sub-item">
                                                            <span>50 menit</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <!-- Button trigger modal -->
                                                        <button class="btn text-white" style="z-index: 999;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            <i class="bi bi-three-dots-vertical"></i>
                                                        </button>
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

        <!------- Trending ------->
        <div class="col">
            <div style="background-color: white;padding: 5px 0 5px 0;">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;">Sedang Tren</h5>
                    <a href="" class="text-decoration-none" style="font-size: 14px;">Lihat Lainnya <i class="bi bi-chevron-right"></i></a>
                </div>
            </div>
            <div class="card">
                <div class="card-body" style="height: 460px;overflow-y:scroll;padding: 0;">
                    <?php foreach ($all_berita->items as $key => $value) { ?>
                        <div class="side-news-item">
                            <div class="row">
                                <div class="d-flex">
                                    <h6 class="card-title" style="padding: 0 20px 0 0;width: 225px;"><a href="/news/<?= $value['id_berita'] ?>/detail" class="text-decoration-none text-dark"><?= $value['judul_berita'] ?> </a></h6>
                                    <div class="rounded" style="background: url(/assets/media/<?= $value['path_media'] ?>);background-size: cover;background-position: center; width: 80px; height: 80px;"></div>

                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col-12">
                                    <div class="row justify-content-around text-side-trending">
                                        <div class="col d-flex">
                                            <div class="sub-item" style="margin-top: 2px;">
                                                <i class="bi bi-heart"></i>
                                                <span>0</span>
                                            </div>
                                            <div class="sub-item" style="margin-top: 2px;">
                                                <i class="bi bi-chat"></i>
                                                <span>0</span>
                                            </div>
                                            <div class="sub-item" style="margin-top: 2px;">
                                                <i class="bi bi-eye"></i>
                                                <span>0</span>
                                            </div>
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


<!------- Feed ------->
<div class="container">
    <div class="row mt-3">

        <!------- Category ------->
        <?php if ($cms_kategori_style && $cms_kategori_style['cms_side_menu_position'] == '1') { ?>
            <?php require __DIR__ . '/../cms/cms-kategori/cms-kategori.php' ?>
        <?php } ?>

        <div class="col-md-9">
            <div class="card" style="background-color: unset;border: unset;">
                <div class="card-header" style="background-color: unset;padding: 0;border: unset;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Feed</h5>
                        <a href="/service" class="text-decoration-none" style="font-size: 14px;">Feed Lainnya <i class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
                <div class="card-body" style="padding: 0 20px 0 20px;">
                    <div class="row">
                        <div class="col-12" style="background-color: white;border-radius: 7px;margin: 10px 0 0 0;">


                            <div class="side-news-item">
                                <div class="row py-3">
                                    <div class="col-2 p-0">
                                        <div class="" style="background: url(/assets/media/AARwe9C.jpg);background-size: cover;background-position: top center;width: 130px;height: 100px;"></div>
                                    </div>
                                    <div class="col">
                                        <a href="/news/879123/detail" style="text-decoration: none;color: black">
                                            <div class="row">
                                                <h6 class="card-title">Dilengkapi Furnitur, Begini Desain Rusun Mahasiswa Aceh Senilai Rp12,74 Miliar</h6>
                                                <p class="truncate-string-1" style="font-size: 14px;">Aceh: Kementerian Pekerjaan Umum dan Perumahan Rakyat (PUPR) terus mendorong pembangunan rumah susun (rusun) bagi mahasiswa di seluruh wilayah Indonesia. Salah satunya pembangunan rusun Universitas Abulyatama di Aceh Besar senilai Rp12,74 miliar.</p>
                                            </div>
                                        </a>
                                        <div class="row justify-content-around text-side-trending">
                                            <div class="col d-flex" style="margin-top: auto;">
                                                <div class="sub-item">
                                                    <i class="bi bi-heart"></i>
                                                    <span>0</span>
                                                </div>
                                                <div class="sub-item">
                                                    <i class="bi bi-chat"></i>
                                                    <span>0</span>
                                                </div>
                                                <div class="sub-item">
                                                    <i class="bi bi-eye"></i>
                                                    <span>0</span>
                                                </div>
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

                            <div class="side-news-item">
                                <div class="row py-3">
                                    <div class="col-2 p-0">
                                        <div class="" style="background: url(/assets/media/AARvvdn.jpg);background-size: cover;background-position: top center;width: 130px;height: 100px;"></div>
                                    </div>
                                    <div class="col">
                                        <a href="/news/879123/detail" style="text-decoration: none;color: black">
                                            <div class="row">
                                                <h6 class="card-title">Bikin Adem, 9 Warna Cat Ini Bikin Ruang Tamu Lebih Sejuk!</h6>
                                                <p class="truncate-string-1" style="font-size: 14px;">Warna cat dinding tak hanya sekedar berfungsi untuk mempercantik ruang tamu, tetapi lebih dari itu, bisa menghidupkan suasana, meningkatkan semangat, dan bisa memengaruhi suhu ruangan. Misalnya saja, warna cat dinding yang terang akan memantulkan panas -- membuat ruangan lebih sejuk. Sedangkan warna cat dinding yang lebih gelap cenderung menyerap panas -- membuat ruangan lebih panas. Lalu, apa saja warna cat yang bisa membuat ruang tamu terasa lebih sejuk? Ini pilihannya untuk Anda!</p>
                                            </div>
                                        </a>
                                        <div class="row justify-content-around text-side-trending">
                                            <div class="col d-flex" style="margin-top: auto;">
                                                <div class="sub-item">
                                                    <i class="bi bi-heart"></i>
                                                    <span>0</span>
                                                </div>
                                                <div class="sub-item">
                                                    <i class="bi bi-chat"></i>
                                                    <span>0</span>
                                                </div>
                                                <div class="sub-item">
                                                    <i class="bi bi-eye"></i>
                                                    <span>0</span>
                                                </div>
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

                            <div class="" style="padding: 0.5rem 1rem;">
                                <div class="row py-3">
                                    <div class="col-2 p-0">
                                        <div class="" style="background: url(/assets/media/AAMY8B8.jpg);background-size: cover;background-position: top center;width: 130px;height: 100px;"></div>
                                    </div>
                                    <div class="col">
                                        <a href="/news/879123/detail" style="text-decoration: none;color: black">
                                            <div class="row">
                                                <h6 class="card-title">Cara Cuci Baju di Hotel, Tanpa Ribet dan Hasilnya Bersih</h6>
                                                <p class="truncate-string-1" style="font-size: 14px;">Saat pergi berlibur dan menginap di hotel, baju yang dibawa tentunya tak sebanyak seperti di rumah. Jika baju yang dibawa sedikit, mau tak mau tamu harus mencuci baju di hotel. Namun, sayangnya tak ada mesin cuci.</p>
                                            </div>
                                        </a>
                                        <div class="row justify-content-around text-side-trending">
                                            <div class="col d-flex" style="margin-top: auto;">
                                                <div class="sub-item">
                                                    <i class="bi bi-heart"></i>
                                                    <span>0</span>
                                                </div>
                                                <div class="sub-item">
                                                    <i class="bi bi-chat"></i>
                                                    <span>0</span>
                                                </div>
                                                <div class="sub-item">
                                                    <i class="bi bi-eye"></i>
                                                    <span>0</span>
                                                </div>
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

                        </div>
                    </div>
                </div>
            </div>

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