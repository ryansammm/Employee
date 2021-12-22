<?php include __DIR__ . '/../Header.php' ?>

<!------- Landscape Banner ------->
<div class="container">
    <?php if (isset($GLOBALS['banner_landscape'][0])) { ?>
        <?= component('cms-banner-landscape/cms-banner-landscape', ['banner_foto' => arr_offset($GLOBALS['banner_landscape'][0], 'path_media')]) ?>
    <?php } ?>
</div>

<!------- Klien Kami ------->
<div class="container">
    <div class="row mt-4">
        <div class="card" style="background-color: unset;border: unset;">
            <div class="card-header" style="background-color: unset;padding: 0;border: unset;">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Klien Kami</h5>
                </div>
            </div>
            <div class="card-body" style="padding: 10px 0 0 0;">
                <div class="row">
                    <?php foreach ($data_pelanggan->items as $key => $value) { ?>
                        <div class="col-2 mb-3">
                            <div class="card">
                                <div class="card-body" style="padding: 1rem">
                                    <a href="/customer/<?= $value['id_pelanggan'] ?>/detail">
                                        <div class="img-video" style="background: url('/assets/media/<?= $value['path_media'] ?>');background-size: 100%;background-position:  center;border-radius: 0.25rem;background-repeat: no-repeat;">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>



<?php include __DIR__ . '/../Footer.php' ?>