<?php include __DIR__ . '/../Header.php' ?>

<div class="container">
    <div class="row">
        <!------- Left Category ------->
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <div style="background-color: white;padding: 5px 0 5px 0;">
                        <div class="d-flex justify-content-between align-items-center">
                            <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;">Kategori</h5>
                        </div>
                        <hr>
                    </div>
                    <ul class="nav flex-column category" style="font-size: 14px;">
                        <?php foreach ($datas_kategori_layanan->items as $key => $value) { ?>
                            <li class="nav-item border-bottom mb-2"><a class="nav-link p-0 text-dark" href="/service/<?= $value['id_kategori_layanan'] ?>/kategori"><?= $value['nama_kategori_layanan'] ?></a></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Layanan Terbaik Kami</h5>
            </div>


            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                <?php foreach ($data_layanan->items as $key => $value) { ?>
                    <div class="col-md-4">
                        <div class="card shadow-sm">
                            <div style="background-image: url(/assets/media/<?= $value['path_media'] ?>);width: 100%;height:225px;background-size: cover;background-position: center;"></div>
                            <div class="card-body">
                                <h6><?= $value['nama_layanan'] ?></h6>
                                <div class="card-text truncate-string-2 mb-3"><?= html_entity_decode(nl2br($value['deskripsi_layanan'])) ?></div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="/service/<?= $value['id_layanan'] ?>/detail" type="button" class="btn btn-sm btn-outline-primary">View</a>
                                    </div>
                                    <a href="" class="text-muted text-decoration-none"><small><?= $value['nama_kategori_layanan'] ?></small></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>
        </div>

    </div>
</div>


<?php include __DIR__ . '/../Footer.php' ?>