<?php include __DIR__ . '/../Header.php' ?>

<?php require __DIR__ . '/../cms/cms-kategori/cms-kategori-error.php' ?>
<?php require __DIR__ . '/../cms/cms-kategori/cms-kategori-style.php' ?>

<div class="container">

    <!------- Landscape Banner Bawah ------->
    <div class="mb-3">
        <?php if (isset($GLOBALS['banner_landscape'][0])) { ?>
            <?= component('cms-banner-landscape/cms-banner-landscape', ['banner_foto' => arr_offset($GLOBALS['banner_landscape'][0], 'path_media')]) ?>
        <?php } ?>
    </div>

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


        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div style="background-image: url('/assets/media/<?= $detail_galeri['path_media'] ?>');width:100%;height: 100%;background-size: cover;background-position: center;border-radius: 0.25rem;"></div>
                        </div>
                        <div class="col-md-6">
                            <div class=" justify-content-between align-items-center mb-3 ms-3">
                                <h4 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;"><?= $detail_galeri['judul_galeri'] ?></h4>

                                <!------- Responsive ------->
                                <div class="d-sm-none d-block" style="background-image: url('/assets/media/<?= $detail_galeri['path_media'] ?>');width:100%;height: 200px;background-size: cover;background-position: center;border-radius: 0.25rem;"></div>

                                <small class="text-muted">Kategori : <a href="/gallery/<?= $detail_galeri['id_kategori_galeri'] ?>/kategori" class="text-muted text-decoration-none"><?= $detail_galeri['nama_kategori_galeri'] ?></a></small>
                            </div>
                            <div class="description  ms-3">
                                <h6 class="fw-normal" style="text-align: justify;"><?= html_entity_decode(nl2br($detail_galeri['deskripsi_galeri'])) ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer d-grid gap-2 d-flex justify-content-md-end">
                    <a href="/gallery" class="btn btn-secondary">Kembali</a>
                </div>
            </div>

            <!-- <section class="mt-4">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <?php foreach ($data_group_galeri->items as $key => $value) { ?>
                        <div class="col-md-3">
                            <div class="card shadow-sm">
                                <div style="background-image: url(/assets/media/<?= $value['path_media'] ?>); width: 100%; height: 170px;background-size: cover;background-position: center;border-radius: 0.25rem 0.25rem 0 0;"></div>
                                <div class="card-body">
                                    <h6 class="mb-3"><?= $value['judul_group_galeri'] ?></h6>
                                    <div class="d-flex justify-content-left align-items-center">
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-sm btn-outline-primary" data-bs-toggle="modal" data-bs-target="#detailGaleri" data-file="<?= show($value['path_media']) ?>">View</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </section> -->

            <!------- Product Image ------->
            <div class="card mt-3">
                <div class="card-body p-2">
                    <div class="owl-carousel owl-theme">

                        <?php foreach ($data_group_galeri->items as $key => $value) { ?>
                            <div class="item">
                                <a href="" data-bs-toggle="modal" data-bs-toggle="modal" data-bs-target="#detailGaleri" data-file="<?= show($value['path_media']) ?>">
                                    <div style="background-image: url(/assets/media/<?= $value['path_media'] ?>);width: 100%;height: 181px;background-size: cover;background-position: center;border-radius: 0.25rem;"></div>
                                </a>
                            </div>
                        <?php } ?>


                        <!-- <div class="item">
                            <a href="" data-bs-toggle="modal" data-bs-target="#exampleModal2">
                                <div style="background-image: url(/assets/produk/produk2.jpg);width: 100%;height: 181px;background-size: cover;background-position: center;border-radius: 0.25rem;"></div>
                            </a>
                        </div> -->


                    </div>
                </div>
            </div>

            <!------- Modal Service Image ------->
            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-body p-1">
                            <img src="/assets/produk/produk1.jpg" width="100%" alt="">
                        </div>
                    </div>
                </div>
            </div>


        </div>

        <!------- Right Category ------->
        <?php if ($cms_kategori_style && $cms_kategori_style['cms_side_menu_position'] == '2') { ?>
            <div class="col-md-3">
                <?php require __DIR__ . '/../cms/cms-kategori/cms-kategori.php' ?>
                <!------- Landscape Banner Samping ------->
                <?php if (!empty($GLOBALS['banner_potrait'])) { ?>
                    <?php foreach ($GLOBALS['banner_potrait'] as $key => $data) { ?>
                        <?= component('cms-banner-potrait/cms-banner-potrait', ['banner_foto' => arr_offset($data, 'path_media')]) ?>
                    <?php } ?>
                <?php } ?>
            </div>
        <?php } ?>

    </div>


</div>


<!-- Modal -->
<div class="modal fade" id="detailGaleri" tabindex="-1" aria-labelledby="detailGaleriLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <!-- <div class="modal-header">
                <h5 class="modal-title" id="detailGaleriLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div> -->
            <div class="modal-body m-0 p-0">
                <img src="" alt="" class="img-fluid detailGaleri d-none" style="width: 100%;height: auto;">
                <iframe src="" frameborder="0" id="detailGaleriPDF" style="display: block;width:100%;height:400px;"></iframe>
            </div>
            <!-- <div class="modal-footer">
                <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
            </div> -->
        </div>
    </div>
</div>

<script>
    $("#detailGaleri").on("show.bs.modal", function(event) {
        // Button that triggered the modal
        var button = event.relatedTarget;
        var file = button.getAttribute("data-file");
        var extFile = file.split(".");

        if (extFile[1] == "jpg" || extFile[1] == "png" || extFile[1] == "jpeg") {
            $(this).find(".detailGaleri").removeClass("d-none");
            $(this).find("#detailGaleriPDF").addClass("d-none");
            $(this)
                .find(".detailGaleri")[0]
                .setAttribute("src", "/assets/media/" + file);
        } else {
            $(this).find(".detailGaleri").addClass("d-none");
            $(this).find("#detailGaleriPDF").removeClass("d-none");
            $(this)
                .find("#detailGaleriPDF")[0]
                .setAttribute("src", "/assets/media/" + file);
        }
    });
</script>



<?php include __DIR__ . '/../Footer.php' ?>