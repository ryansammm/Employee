<?php include __DIR__ . '/../Header.php' ?>

<?php require __DIR__ . '/../cms/cms-kategori/cms-kategori-error.php' ?>
<?php require __DIR__ . '/../cms/cms-kategori/cms-kategori-style.php' ?>

<div class="container">
    <div class="row">
        <!------- Category ------->
        <?php if ($cms_kategori_style && $cms_kategori_style['cms_side_menu_position'] == '1') { ?>
            <?php require __DIR__ . '/../cms/cms-kategori/cms-kategori.php' ?>
        <?php } ?>


        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div style="background-image: url('/assets/media/<?= $detail_galeri['path_media'] ?>');width:410px;height: 460px;background-size: cover;background-position: center;border-radius: 0.25rem;"></div>
                        </div>
                        <div class="col-md-6">
                            <div class=" justify-content-between align-items-center mb-3 ms-3">
                                <h4 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;"><?= $detail_galeri['judul_galeri'] ?></h4>
                                <small class="">Kategori : <?= $detail_galeri['nama_kategori_galeri'] ?></small>
                            </div>
                            <div class="description  ms-3">
                                <h6 class="fw-normal" style="text-align: justify;"><?= html_entity_decode(nl2br($detail_galeri['deskripsi_galeri'])) ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- <section class="mt-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Lainnya</h5>
                    <a href="" class="text-decoration-none">Lihat Lainnya <i class="bi bi-chevron-right"></i></a>
                </div>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                            </svg>

                            <div class="card-body">
                                <p class="card-text truncate-string-2">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    </div>
                                    <a href=""><small class="text-muted">9 mins</small></a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                            </svg>

                            <div class="card-body">
                                <p class="card-text truncate-string-2">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    </div>
                                    <a href=""><small class="text-muted">9 mins</small></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                            </svg>

                            <div class="card-body">
                                <p class="card-text truncate-string-2">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-sm btn-outline-secondary">View</button>
                                    </div>
                                    <a href=""><small class="text-muted">9 mins</small></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section> -->

        </div>

        <!------- Right Category ------->
        <?php if ($cms_kategori_style && $cms_kategori_style['cms_side_menu_position'] == '2') { ?>
            <?php require __DIR__ . '/../cms/cms-kategori/cms-kategori.php' ?>
        <?php } ?>

    </div>

    <section>
        <div class="card mt-3">
            <div class="card-body">
                <div class="row">
                    <?php foreach ($data_group_galeri->items as $key => $value) { ?>
                        <div class="col-md-2">
                            <a type="button" href="" data-bs-toggle="modal" data-bs-target="#detailGaleri">
                                <div style="background-image: url(/assets/media/<?= $value['path_media'] ?>); width: 170px; height: 170px;background-size: cover;background-position: center;border-radius: 0.25rem;"></div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </section>

</div>


<!-- Modal -->
<div class="modal fade" id="detailGaleri" tabindex="-1" aria-labelledby="detailGaleriLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <!-- <h5 class="modal-title" id="detailGaleriLabel">Modal title</h5> -->
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="" alt="" class="img-fluid fileSakip d-none">
                <iframe src="" frameborder="0" id="detailGaleri" style="display: block;width:100%;height:400px;"></iframe>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline-dark" data-bs-dismiss="modal">Close</button>
            </div>
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
            $(this).find(".fileSakip").removeClass("d-none");
            $(this).find("#fileSakipPDF").addClass("d-none");
            $(this)
                .find(".fileSakip")[0]
                .setAttribute("src", "/assets/media/" + file);
        } else {
            $(this).find(".fileSakip").addClass("d-none");
            $(this).find("#fileSakipPDF").removeClass("d-none");
            $(this)
                .find("#fileSakipPDF")[0]
                .setAttribute("src", "/assets/media/" + file);
        }
    });
</script>



<?php include __DIR__ . '/../Footer.php' ?>