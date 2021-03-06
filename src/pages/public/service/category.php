<?php include __DIR__ . '/../Header.php' ?>

<?php require __DIR__ . '/../cms/cms-kategori/cms-kategori-error.php' ?>
<?php require __DIR__ . '/../cms/cms-kategori/cms-kategori-style.php' ?>

<!------- Landscape Banner ------->
<div class="container">
    <?php if (isset($GLOBALS['banner_landscape'][0])) { ?>
        <?= component('cms-banner-landscape/cms-banner-landscape', ['banner_foto' => arr_offset($GLOBALS['banner_landscape'][0], 'path_media')]) ?>
    <?php } ?>
</div>

<div class="container mt-4">
    <div class="row">
        <!------- Left Category ------->
        <?php if ($cms_kategori_style && $cms_kategori_style['cms_side_menu_position'] == '1') { ?>
            <div class="col-md-3 d-sm-block d-none">
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
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Layanan Terbaik Kami</h5>
            </div>
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php foreach ($data_layanan->items as $key => $value) { ?>
                    <div class="col-md-4 col-6">
                        <div class="card shadow-sm">
                            <div style="background-image: url(/assets/media/<?= $value['path_media'] ?>);width: 100%;height:225px;background-size: cover;background-position: center;border-radius: 0.25rem 0.25rem 0 0;"></div>
                            <div class="card-body">
                                <h6><?= $value['nama_layanan'] ?></h6>
                                <div class="card-text truncate-string-2 mb-3" style="font-size: 14px;"><?= html_entity_decode(nl2br($value['deskripsi_layanan'])) ?></div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <a href="" class="text-muted text-decoration-none"><small><?= $value['nama_kategori_layanan'] ?></small></a>
                                    <div class="btn-group">
                                        <a href="/service/<?= $value['id_layanan'] ?>/detail" type="button" class="btn btn-sm btn-outline-primary">Detail</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <?= $data_layanan->links() ?>
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


<?php include __DIR__ . '/../Footer.php' ?>