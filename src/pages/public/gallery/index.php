<?php include __DIR__ . '/../Header.php' ?>

<?php require __DIR__ . '/../cms/cms-kategori/cms-kategori-error.php' ?>
<?php require __DIR__ . '/../cms/cms-kategori/cms-kategori-style.php' ?>

<div class="container">
    <div class="row">
        <!------- Left Category ------->
        <?php if ($cms_kategori_style && $cms_kategori_style['cms_side_menu_position'] == '1') { ?>
            <?php require __DIR__ . '/../cms/cms-kategori/cms-kategori.php' ?>
        <?php } ?>

        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Jejak Kami</h5>
            </div>

            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                <?php foreach ($data_galeri->items as $key => $value) { ?>
                    <div class="col-md-3">
                        <div class="card shadow-sm">
                            <div style="background-image: url(/assets/media/<?= $value['path_media'] ?>);width: 100%;height: 225px;background-size: cover;background-position: center;"></div>
                            <div class="card-body">
                                <div class="card-text truncate-string-2"><?= html_entity_decode(nl2br($value['deskripsi_galeri'])) ?></div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="/gallery/<?= $value['id_galeri'] ?>/detail" type="button" class="btn btn-sm btn-outline-secondary">View</a>
                                    </div>
                                    <a href="/gallery/<?= $value['id_kategori_galeri'] ?>/kategori"><small class="text-muted"><?= $value['nama_kategori_galeri'] ?></small></a>

                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>

        </div>

        <!------- Right Category ------->
        <?php if ($cms_kategori_style && $cms_kategori_style['cms_side_menu_position'] == '2') { ?>
            <?php require __DIR__ . '/../cms/cms-kategori/cms-kategori.php' ?>
        <?php } ?>

    </div>
</div>


<?php include __DIR__ . '/../Footer.php' ?>