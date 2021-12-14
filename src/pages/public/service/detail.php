<?php include __DIR__ . '/../Header.php' ?>

<?php require __DIR__ . '/../cms/cms-kategori/cms-kategori-error.php' ?>
<?php require __DIR__ . '/../cms/cms-kategori/cms-kategori-style.php' ?>

<div class="container">
    <div class="row">
        <!------- Left Category ------->
        <?php if ($cms_kategori_style && $cms_kategori_style['cms_side_menu_position'] == '1') { ?>
            <?php require __DIR__ . '/../cms/cms-kategori/cms-kategori.php' ?>
        <?php } ?>

        <!------- Main Content ------->
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div style="background-image: url('/assets/media/<?= $data_layanan['path_media'] ?>');width:100%;height: 100%;background-size: cover;background-position: center;border-radius: 0.25rem 0 0 0.25rem;"></div>
                        </div>
                        <div class="col-md-6">
                            <div class=" justify-content-between align-items-center mb-3 ms-3">
                                <h4 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;"><?= $data_layanan['nama_layanan'] ?></h4>
                                <hr>
                                <small class="">Kode Layanan : 980829</small><br>
                                <small class="">Kategori : <?= $data_layanan['nama_kategori_layanan'] ?></small>
                            </div>
                            <div class="description  ms-3">
                                <h6 class="fw-normal" style="text-align: justify;"><?= html_entity_decode(nl2br($data_layanan['deskripsi_layanan'])) ?></h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!------- Spesifikasi ------->
            <section class="mt-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3 ms-3">
                            <h6 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Spesifikasi</h6>
                        </div>
                        <div class="description  ms-3">
                            <h6 class="fw-normal" style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad quis quod perferendis voluptatum odit, quae praesentium, deleniti minima temporibus dolore illum. Facere quasi laboriosam atque expedita possimus corporis necessitatibus magnam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora eaque omnis necessitatibus debitis fugit consectetur officiis consequuntur ducimus alias nam impedit non est ex, pariatur, perferendis blanditiis recusandae libero architecto at illum veniam. Quia possimus ea corporis commodi sit minima nam, maiores, deserunt asperiores harum pariatur? A magni placeat, hic consequuntur eveniet nulla aliquam expedita numquam. Possimus pariatur nam, tenetur sequi aspernatur fuga enim magnam ipsam asperiores odit at incidunt unde? Pariatur exercitationem voluptate quaerat animi autem culpa accusantium! Deleniti recusandae natus, repudiandae dignissimos consequuntur earum ex veniam reiciendis suscipit nulla nihil accusantium a unde qui neque magni aliquam alias!</h6>
                        </div>
                    </div>
                </div>
            </section>

            <!------- Layanan Lainnya ------->
            <section class="mt-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Layanan Lainnya</h5>
                    <a href="/service" class="text-decoration-none" style="font-size: 14px;">Lihat Lainnya <i class="bi bi-chevron-right"></i></a>
                </div>
                <div class="row">
                    <?php foreach ($datas_layanan->items as $key => $value) { ?>
                        <div class="col-md-3">

                            <a class="text-decoration-none text-dark" href="/service/<?= $value['id_layanan'] ?>/detail">
                                <div class="card p-0">
                                    <div class=" align-self-center" style="background-image: url(/assets/media/<?= $value['path_media'] ?>);width: 100%;height: 140px;background-size: cover;background-position: center;border-radius: 0.25rem 0.25rem 0 0;"></div>
                                    <h6 class="mt-3 px-2"><?= $value['nama_layanan'] ?></h6>
                                    <div class="mb-3 truncate-string-2 px-2" style="font-size: 12px;"><?= html_entity_decode(nl2br($value['deskripsi_layanan'])) ?></div>
                                    <!-- <p class="mt-3"><a class="btn btn-sm btn-outline-primary" style="font-size: 10px !important;" href="/service/<?= $value['id_layanan'] ?>/detail">Detail &raquo;</a></p> -->
                                </div>
                            </a>

                        </div>
                    <?php } ?>
                </div>
                <?= $datas_layanan->links() ?>
            </section>

            <!------- Layanan Yang Mungkin Anda Sukai ------->
            <section class="mt-4">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Layanan Yang Mungkin Anda Sukai</h5>
                    <a href="/service" class="text-decoration-none" style="font-size: 14px;">Lihat Lainnya <i class="bi bi-chevron-right"></i></a>
                </div>
                <div class="row">
                    <?php foreach ($all_layanan->items as $key => $value) { ?>
                        <div class="col-md ">
                            <a class="text-decoration-none text-dark" href="/service/<?= $value['id_layanan'] ?>/detail">
                                <div class="card p-0">
                                    <div class=" align-self-center" style="background-image: url(/assets/media/<?= $value['path_media'] ?>);width: 100%;height: 140px;background-size: cover;background-position: center;border-radius: 0.25rem 0.25rem 0 0;"></div>
                                    <h6 class="mt-3 px-2"><?= $value['nama_layanan'] ?></h6>
                                    <div class="mb-3 truncate-string-2 px-2" style="font-size: 12px;"><?= html_entity_decode(nl2br($value['deskripsi_layanan'])) ?></div>
                                </div>
                            </a>
                        </div>
                    <?php } ?>
                </div>
                <?= $all_layanan->links() ?>
            </section>

        </div>

        <!------- Right Category ------->
        <?php if ($cms_kategori_style && $cms_kategori_style['cms_side_menu_position'] == '2') { ?>
            <?php require __DIR__ . '/../cms/cms-kategori/cms-kategori.php' ?>
        <?php } ?>

    </div>
</div>


<?php include __DIR__ . '/../Footer.php' ?>