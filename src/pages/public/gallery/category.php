<?php include __DIR__ . '/../Header.php' ?>

<?php require __DIR__ . '/../cms/cms-kategori/cms-kategori-error.php' ?>
<?php require __DIR__ . '/../cms/cms-kategori/cms-kategori-style.php' ?>

<div class="container">

    <!------- Landscape Banner Bawah ------->
    <div class="mb-3">
        <?php if (isset($banner_landscape[1])) { ?>
            <?= component('cms-banner-landscape/cms-banner-landscape', ['banner_foto' => arr_offset($banner_landscape[1], 'path_media')]) ?>
        <?php } ?>
    </div>

    <div class="row">
        <!------- Left Category ------->
        <?php if ($cms_kategori_style && $cms_kategori_style['cms_side_menu_position'] == '1') { ?>
            <div class="col-md-3">
                <?php require __DIR__ . '/../cms/cms-kategori/cms-kategori.php' ?>
                <!------- Landscape Banner Samping ------->
                <?php if (!empty($banner_potrait)) { ?>
                    <?php foreach ($banner_potrait as $key => $data) { ?>
                        <?= component('cms-banner-potrait/cms-banner-potrait', ['banner_foto' => arr_offset($data, 'path_media')]) ?>
                    <?php } ?>
                <?php } ?>
            </div>
        <?php } ?>

        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-center">
                <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Jejak Kami</h5>
            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3 mb-3">
                <?php foreach ($data_galeri->items as $key => $value) { ?>
                    <div class="col-md-3">
                        <div class="card shadow-sm">
                            <div style="background-image: url(/assets/media/<?= $value['path_media'] ?>);width: 100%;height: 225px;background-size: cover;background-position: center;"></div>
                            <div class="card-body">
                                <h6><?= $value['judul_galeri'] ?></h6>
                                <div class="card-text truncate-string-2 mb-3" style="font-size: 14px;"><?= html_entity_decode(nl2br($value['deskripsi_galeri'])) ?></div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="/gallery/<?= $value['id_galeri'] ?>/detail" type="button" class="btn btn-sm btn-outline-primary">Detail</a>
                                    </div>
                                    <a class="text-decoration-none" href="/gallery/<?= $value['id_kategori_galeri'] ?>/kategori"><small class="text-muted" style="font-size: 12px;"><?= $value['nama_kategori_galeri'] ?></small></a>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>

            <?= $data_galeri->links() ?>

        </div>

        <!------- Right Category ------->
        <?php if ($cms_kategori_style && $cms_kategori_style['cms_side_menu_position'] == '2') { ?>
            <div class="col-md-3">
                <?php require __DIR__ . '/../cms/cms-kategori/cms-kategori.php' ?>
                <!------- Landscape Banner Samping ------->
                <?php if (!empty($banner_potrait)) { ?>
                    <?php foreach ($banner_potrait as $key => $data) { ?>
                        <?= component('cms-banner-potrait/cms-banner-potrait', ['banner_foto' => arr_offset($data, 'path_media')]) ?>
                    <?php } ?>
                <?php } ?>
            </div>
        <?php } ?>

    </div>

</div>


<?php include __DIR__ . '/../Footer.php' ?>