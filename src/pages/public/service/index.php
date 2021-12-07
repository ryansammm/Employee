<?php include __DIR__ . '/../Header.php' ?>

<?php require __DIR__.'/../cms/cms-kategori/cms-kategori-error.php' ?>
<?php require __DIR__.'/../cms/cms-kategori/cms-kategori-style.php' ?>

<div class="container">
    <div class="row">
        <!------- Left Category ------->
        <?php if ($cms_kategori_style && $cms_kategori_style['cms_side_menu_position'] == '1') { ?>
            <?php require __DIR__.'/../cms/cms-kategori/cms-kategori.php' ?>
        <?php } ?>

        <div class="col-md-9">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Layanan Terbaik Kami</h5>
            </div>


            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div style="background-image: url(/assets/media/support.jpeg);width: 100%;height:225px;background-size: cover;background-position: center;"></div>
                        <div class="card-body">
                            <h6>Support</h6>
                            <p class="card-text truncate-string-2">Kami dapat menunjukkan kesalahan dengan menggunakan fasilitas pemeliharaan jarak jauh kami dan segera memasang kembali instalasi Anda ke dalam layanan. Dengan Güdel, suku cadang tersedia dengan sangat cepat, berkat jaringan kami di seluruh dunia.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-primary">View</button>
                                </div>
                                <a href="" class="text-muted text-decoration-none"><small>Kategori</small></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div style="background-image: url(/assets/media/protect1.jpeg);width: 100%;height:225px;background-size: cover;background-position: center;"></div>
                        <div class="card-body">
                            <h6>Protect</h6>
                            <p class="card-text truncate-string-2">Kami memelihara instalasi Anda dan mengganti suku cadang yang aus pada waktu yang tepat. Selama inspeksi rutin kami, kami menganalisis sistem Anda dan mendeteksi cacat sebelum dapat menyebabkan kerusakan.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-primary">View</button>
                                </div>
                                <a href="" class="text-muted text-decoration-none"><small>Kategori</small></a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div style="background-image: url(/assets/media/improve-teaser.jpeg);width: 100%;height:225px;background-size: cover;background-position: center;"></div>
                        <div class="card-body">
                            <h6>Improve </h6>
                            <p class="card-text truncate-string-2">Pakar kami mengoptimalkan proses dan mesin Anda menggunakan modul Güdel Improve. Solusi retrofit dapat melengkapi instalasi Anda untuk memenuhi persyaratan baru dan meningkatkan produktivitas Anda.</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-sm btn-outline-primary">View</button>
                                </div>
                                <a href="" class="text-muted text-decoration-none"><small>Kategori</small></a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>


        </div>

        <!------- Right Category ------->
        <?php if ($cms_kategori_style && $cms_kategori_style['cms_side_menu_position'] == '2') { ?>
            <?php require __DIR__.'/../cms/cms-kategori/cms-kategori.php' ?>
        <?php } ?>

    </div>
</div>


<?php include __DIR__ . '/../Footer.php' ?>