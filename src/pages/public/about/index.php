<?php include __DIR__ . '/../Header.php' ?>

<!------- Landscape Banner ------->
<div class="container">
    <?php if (isset($GLOBALS['banner_landscape'][0])) { ?>
        <?= component('cms-banner-landscape/cms-banner-landscape', ['banner_foto' => arr_offset($GLOBALS['banner_landscape'][0], 'path_media')]) ?>
    <?php } ?>
</div>

<!------- About Us ------->
<section id="about-us" class="container mt-4">
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <?php foreach ($data_profil->items as $key => $value) { ?>
                        <?php if ($value['jenis_dokumen'] == 'profil_foto') { ?>
                            <div style="background-image: url('/assets/media/<?= arr_offset($value, 'path_media') ?>');width:410pt;height: 240pt;background-size: cover;background-position: center;border-radius: 0.25rem;"></div>
                        <?php } ?>
                    <?php } ?>
                </div>
                <div class="col-md-6">
                    <div class="d-flex justify-content-between align-items-center mb-3 ms-3">
                        <h4 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Tentang Kami</h4>
                    </div>
                    <hr>
                    <div class="description ms-3">
                        <h6 class="fw-normal" style="text-align: justify;"><?= html_entity_decode(nl2br(arr_offset($data_profil->items[0], 'deskripsi_profil'))) ?></h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!------- Visi Misi ------->
<section id="visi-misi">
    <div class="container mt-4">
        <div class="card" style="background-color: unset;border: unset;">
            <div class="card-header" style="background-color: unset;padding: 0;border: unset;">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Visi Misi</h4>
                </div>
            </div>
            <div class="card-body px-0 bg-white mt-3" style="border-radius: 0.25rem;">
                <div class="description ms-3">
                    <h6 class="fw-normal" style="text-align: justify;"><?= html_entity_decode(nl2br(arr_offset($data_profil->items[0], 'visi_misi'))) ?></h6>
                </div>
            </div>
        </div>
    </div>
</section>

<!------- Struktur Organisasi ------->
<section id="struktur-organisasi">
    <div class="container mt-4">
        <div class="card" style="background-color: unset;border: unset;">
            <div class="card-header" style="background-color: unset;padding: 0;border: unset;">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Struktur Organisasi</h4>
                </div>
            </div>
            <div class="card-body px-0" style="border-radius: 0.25rem;">
                <div class="description">
                    <?php foreach ($data_profil->items as $key => $value) { ?>
                        <?php if ($value['jenis_dokumen'] == 'struktur_organisasi') { ?>
                            <img src="/assets/media/<?= arr_offset($value, 'path_media') ?>" alt="" style="width: 100%;border-radius: 0.25rem;">
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!------- Profil Tim ------->
<section id="profil-tim">
    <div class="container mt-4">
        <div class="card" style="background-color: unset;border: unset;">
            <div class="card-header" style="background-color: unset;padding: 0;border: unset;">
                <div class="d-flex justify-content-between align-items-center">
                    <h4 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Profil Tim</h4>
                </div>
            </div>
            <div class="card-body px-0">
                <div class="row">


                    <!------- Direksi ------->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-center">
                                    <h5>Direksi</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="<?= $key == (count($data_feed->items) - 1) ? '' : 'side-news-item' ?>" style="<?= $key == (count($data_feed->items) - 1) ? 'padding: 0.5rem 1rem;' : '' ?>">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="" style="background: url(/assets/icon/avatar.jpg);background-size: cover;background-position: top center;width: 100%;height: 66px;border-radius: 0.25rem;"></div>
                                        </div>
                                        <div class="col-9">
                                            <a href="/news/<?= $value['id_berita'] ?>/detail" style="text-decoration: none;color: black">
                                                <div class="row">
                                                    <h6 class="card-title">Lorem ipsum dolor sit amet.</h6>
                                                    <div class="truncate-string-2" style="font-size: 14px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia soluta suscipit accusamus illum dolore, nesciunt ullam fugiat accusantium. Quae, quam.</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="<?= $key == (count($data_feed->items) - 1) ? '' : 'side-news-item' ?>" style="<?= $key == (count($data_feed->items) - 1) ? 'padding: 0.5rem 1rem;' : '' ?>">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="" style="background: url(/assets/icon/avatar.jpg);background-size: cover;background-position: top center;width: 100%;height: 66px;border-radius: 0.25rem;"></div>
                                        </div>
                                        <div class="col-9">
                                            <a href="/news/<?= $value['id_berita'] ?>/detail" style="text-decoration: none;color: black">
                                                <div class="row">
                                                    <h6 class="card-title">Lorem ipsum dolor sit amet.</h6>
                                                    <div class="truncate-string-2" style="font-size: 14px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia soluta suscipit accusamus illum dolore, nesciunt ullam fugiat accusantium. Quae, quam.</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="<?= $key == (count($data_feed->items) - 1) ? '' : 'side-news-item' ?>" style="<?= $key == (count($data_feed->items) - 1) ? 'padding: 0.5rem 1rem;' : '' ?>">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="" style="background: url(/assets/icon/avatar.jpg);background-size: cover;background-position: top center;width: 100%;height: 66px;border-radius: 0.25rem;"></div>
                                        </div>
                                        <div class="col-9">
                                            <a href="/news/<?= $value['id_berita'] ?>/detail" style="text-decoration: none;color: black">
                                                <div class="row">
                                                    <h6 class="card-title">Lorem ipsum dolor sit amet.</h6>
                                                    <div class="truncate-string-2" style="font-size: 14px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia soluta suscipit accusamus illum dolore, nesciunt ullam fugiat accusantium. Quae, quam.</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!------- Manajerial ------->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-center">
                                    <h5>Direksi</h5>
                                </div>
                            </div>
                            <div class="card-body">

                                <div class="<?= $key == (count($data_feed->items) - 1) ? '' : 'side-news-item' ?>" style="<?= $key == (count($data_feed->items) - 1) ? 'padding: 0.5rem 1rem;' : '' ?>">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="" style="background: url(/assets/icon/avatar.jpg);background-size: cover;background-position: top center;width: 100%;height: 66px;border-radius: 0.25rem;"></div>
                                        </div>
                                        <div class="col-9">
                                            <a href="/news/<?= $value['id_berita'] ?>/detail" style="text-decoration: none;color: black">
                                                <div class="row">
                                                    <h6 class="card-title">Lorem ipsum dolor sit amet.</h6>
                                                    <div class="truncate-string-2" style="font-size: 14px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia soluta suscipit accusamus illum dolore, nesciunt ullam fugiat accusantium. Quae, quam.</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="<?= $key == (count($data_feed->items) - 1) ? '' : 'side-news-item' ?>" style="<?= $key == (count($data_feed->items) - 1) ? 'padding: 0.5rem 1rem;' : '' ?>">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="" style="background: url(/assets/icon/avatar.jpg);background-size: cover;background-position: top center;width: 100%;height: 66px;border-radius: 0.25rem;"></div>
                                        </div>
                                        <div class="col-9">
                                            <a href="/news/<?= $value['id_berita'] ?>/detail" style="text-decoration: none;color: black">
                                                <div class="row">
                                                    <h6 class="card-title">Lorem ipsum dolor sit amet.</h6>
                                                    <div class="truncate-string-2" style="font-size: 14px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia soluta suscipit accusamus illum dolore, nesciunt ullam fugiat accusantium. Quae, quam.</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="<?= $key == (count($data_feed->items) - 1) ? '' : 'side-news-item' ?>" style="<?= $key == (count($data_feed->items) - 1) ? 'padding: 0.5rem 1rem;' : '' ?>">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="" style="background: url(/assets/icon/avatar.jpg);background-size: cover;background-position: top center;width: 100%;height: 66px;border-radius: 0.25rem;"></div>
                                        </div>
                                        <div class="col-9">
                                            <a href="/news/<?= $value['id_berita'] ?>/detail" style="text-decoration: none;color: black">
                                                <div class="row">
                                                    <h6 class="card-title">Lorem ipsum dolor sit amet.</h6>
                                                    <div class="truncate-string-2" style="font-size: 14px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia soluta suscipit accusamus illum dolore, nesciunt ullam fugiat accusantium. Quae, quam.</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>


                    <!------- Staff & Karyawan ------->
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-header">
                                <div class="text-center">
                                    <h5>Staff & Karyawan</h5>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="<?= $key == (count($data_feed->items) - 1) ? '' : 'side-news-item' ?>" style="<?= $key == (count($data_feed->items) - 1) ? 'padding: 0.5rem 1rem;' : '' ?>">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="" style="background: url(/assets/icon/avatar.jpg);background-size: cover;background-position: top center;width: 100%;height: 66px;border-radius: 0.25rem;"></div>
                                        </div>
                                        <div class="col-9">
                                            <a href="/news/<?= $value['id_berita'] ?>/detail" style="text-decoration: none;color: black">
                                                <div class="row">
                                                    <h6 class="card-title">Lorem ipsum dolor sit amet.</h6>
                                                    <div class="truncate-string-2" style="font-size: 14px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia soluta suscipit accusamus illum dolore, nesciunt ullam fugiat accusantium. Quae, quam.</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="<?= $key == (count($data_feed->items) - 1) ? '' : 'side-news-item' ?>" style="<?= $key == (count($data_feed->items) - 1) ? 'padding: 0.5rem 1rem;' : '' ?>">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="" style="background: url(/assets/icon/avatar.jpg);background-size: cover;background-position: top center;width: 100%;height: 66px;border-radius: 0.25rem;"></div>
                                        </div>
                                        <div class="col-9">
                                            <a href="/news/<?= $value['id_berita'] ?>/detail" style="text-decoration: none;color: black">
                                                <div class="row">
                                                    <h6 class="card-title">Lorem ipsum dolor sit amet.</h6>
                                                    <div class="truncate-string-2" style="font-size: 14px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia soluta suscipit accusamus illum dolore, nesciunt ullam fugiat accusantium. Quae, quam.</div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="<?= $key == (count($data_feed->items) - 1) ? '' : 'side-news-item' ?>" style="<?= $key == (count($data_feed->items) - 1) ? 'padding: 0.5rem 1rem;' : '' ?>">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="" style="background: url(/assets/icon/avatar.jpg);background-size: cover;background-position: top center;width: 100%;height: 66px;border-radius: 0.25rem;"></div>
                                        </div>
                                        <div class="col-9">
                                            <a href="/news/<?= $value['id_berita'] ?>/detail" style="text-decoration: none;color: black">
                                                <div class="row">
                                                    <h6 class="card-title">Lorem ipsum dolor sit amet.</h6>
                                                    <div class="truncate-string-2" style="font-size: 14px;">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quia soluta suscipit accusamus illum dolore, nesciunt ullam fugiat accusantium. Quae, quam.</div>
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
</section>

<?php include __DIR__ . '/../Footer.php' ?>