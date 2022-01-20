<?php include __DIR__ . '/../Header.php' ?>

<style>
    .thumb-img {
        height: 100px;
        width: 100px;
        object-fit: cover;
        border-radius: 0.25rem;
    }

    .plus {
        font-size: 18px;
        font-weight: 700;
        color: #707070;
    }

    .plus:hover {
        font-size: 18px;
        font-weight: 700;
        color: #3e3e3e;
    }
</style>

<div class="container">
    <div class="row">

        <!------- Direksi ------->
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-header">
                    <div class="text-start">
                        <h5 class="mb-0" style="border-left: 4px solid red;padding-left: 10px;">Direksi</h5>
                    </div>
                </div>
                <div class="card-body py-0 px-1">
                    <?php foreach ($datas_karyawan->items as $key => $value) { ?>
                        <div class="side-news-item">
                            <div class="row">
                                <div class="col-2 px-0">
                                    <img class="thumb-img" src="/assets/media/<?= $value['path_media'] ?>" alt="">
                                </div>
                                <div class="col-10 pe-0">
                                    <div class="row ms-1">
                                        <h6 class="card-title"><?= $value['nama_lengkap'] ?></h6>
                                        <h6 class="card-title" style="font-size: 14px;font-style: italic;font-weight: 400;margin-bottom: 6px;">
                                            <span><?= $value['nama'] ?></span><br>
                                        </h6>
                                        <a class="text-decoration-none" href="/employee/<?= $value['id_karyawan'] ?>/detail">
                                            <small class="text-danger"><span class="plus">+</span> Lihat Profil</small>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php  } ?>
                </div>
            </div>
        </div>
        <!------- END Direksi ------->

        <!------- Komisaris ------->
        <div class="col-md-6 mb-3">
            <div class="card">
                <div class="card-header">
                    <div class="text-start">
                        <h5 class="mb-0" style="border-left: 4px solid red;padding-left: 10px;">Komisaris</h5>
                    </div>
                </div>
                <div class="card-body py-0 px-1">
                    <?php foreach ($datas_karyawan->items as $key => $value) { ?>
                        <div class="side-news-item">
                            <div class="row">
                                <div class="col-2 px-0">
                                    <img class="thumb-img" src="/assets/media/<?= $value['path_media'] ?>" alt="">
                                </div>
                                <div class="col-10 pe-0">
                                    <div class="row ms-1">
                                        <h6 class="card-title"><?= $value['nama_lengkap'] ?></h6>
                                        <h6 class="card-title" style="font-size: 14px;font-style: italic;font-weight: 400;margin-bottom: 6px;">
                                            <span><?= $value['nama'] ?></span><br>
                                        </h6>
                                        <a class="text-decoration-none" href="/employee/<?= $value['id_karyawan'] ?>/detail">
                                            <small class="text-danger"><span class="plus">+</span> Lihat Profil</small>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php  } ?>
                </div>
            </div>
        </div>
        <!------- END Komisaris ------->

        <!------- Manajerial ------->
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <div class="text-start">
                        <h5 class="mb-0" style="border-left: 4px solid red;padding-left: 10px;">Manajerial</h5>
                    </div>
                </div>
                <div class="card-body py-0 pe-2">
                    <div class="row">
                        <?php foreach ($datas_karyawan->items as $key => $value) { ?>
                            <div class="col-md-4 px-0">
                                <div class="side-news-item border-end">
                                    <div class="row">
                                        <div class="col-3 px-0">
                                            <img class="thumb-img" src="/assets/media/<?= $value['path_media'] ?>" alt="">
                                        </div>
                                        <div class="col-9 pe-0">
                                            <div class="row ms-1">
                                                <h6 class="card-title"><?= $value['nama_lengkap'] ?></h6>
                                                <h6 class="card-title" style="font-size: 14px;font-style: italic;font-weight: 400;margin-bottom: 6px;">
                                                    <span><?= $value['nama'] ?></span><br>
                                                </h6>
                                                <a class="text-decoration-none" href="/employee/<?= $value['id_karyawan'] ?>/detail">
                                                    <small class="text-danger"><span class="plus">+</span> Lihat Profil</small>
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
        </div>
        <!------- END Manajerial ------->

        <!------- Staff & Karyawan ------->
        <div class="col-md-12 mb-3">
            <div class="card">
                <div class="card-header">
                    <div class="text-start">
                        <h5 class="mb-0" style="border-left: 4px solid red;padding-left: 10px;">Staff & Karyawan</h5>
                    </div>
                </div>
                <div class="card-body py-0 pe-2">
                    <div class="row">
                        <?php foreach ($datas_karyawan->items as $key => $value) { ?>
                            <div class="col-md-4 px-0">
                                <div class="side-news-item border-end">
                                    <div class="row">
                                        <div class="col-3 px-0">
                                            <img class="thumb-img" src="/assets/media/<?= $value['path_media'] ?>" alt="">
                                        </div>
                                        <div class="col-9 pe-0">
                                            <div class="row ms-1">
                                                <h6 class="card-title"><?= $value['nama_lengkap'] ?></h6>
                                                <h6 class="card-title" style="font-size: 14px;font-style: italic;font-weight: 400;margin-bottom: 6px;">
                                                    <span><?= $value['nama'] ?></span><br>
                                                </h6>
                                                <a class="text-decoration-none" href="/employee/<?= $value['id_karyawan'] ?>/detail">
                                                    <small class="text-danger"><span class="plus">+</span> Lihat Profil</small>
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
        </div>
        <!------- END Staff & Karyawan ------->

    </div>
</div>


<?php include __DIR__ . '/../Footer.php' ?>