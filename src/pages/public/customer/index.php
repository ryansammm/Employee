<?php include __DIR__ . '/../Header.php' ?>

<!------- Klien Kami ------->
<div class="container">
    <div class="row mt-5">
        <div class="card" style="background-color: unset;border: unset;">
            <div class="card-header" style="background-color: unset;padding: 0;border: unset;">
                <div class="d-flex justify-content-between align-items-center">
                    <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Klien Kami</h5>
                </div>
            </div>
            <div class="card-body" style="padding: 10px 0 0 0;">
                <div class="row">
                    <?php foreach ($data_pelanggan->items as $key => $value) { ?>
                        <div class="col-2">
                            <div class="card">
                                <div class="card-body" style="padding: 1rem">
                                    <a href="<?= $value['link_pelanggan'] ?>" target="_blank">
                                        <div class="img-video" style="background: url('/assets/media/<?= $value['path_media'] ?>');background-size: cover;background-position:  center;">
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