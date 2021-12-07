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
                <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Produk Kami</h5>
            </div>


            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

                <div class="col-md-4">
                    <div class="card shadow-sm">
                        <div style="background-image: url(/assets/media/1a7e6156-f9b9-4d54-a202-85fbc6bc6d9c.jpg);width: 100%;height:225px;background-size: cover;background-position: center;"></div>
                        <div class="card-body">
                            <h6>Bacchus</h6>
                            <p class="card-text truncate-string-2">Bacchus is creative one-page HTML 5 template and it’s great for any corporate, portfolio and creative agency. It’s easy to use and customize. Bacchus is fully responsive and it will look great on any screen size: desktop, notebook and mobile phone.</p>
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
                        <div style="background-image: url(/assets/media/0e7b8ff6-0f0a-42c1-be06-8c20e48cf974.jpg);width: 100%;height:225px;background-size: cover;background-position: center;"></div>
                        <div class="card-body">
                            <h6>Selfer</h6>
                            <p class="card-text truncate-string-2">Creative, Mobile First Personal Portfolio Landing Page for every designer, developer, coder, freelancer, architect or any creative person. Dark background will make your website different to other portfolio templates. Gentle and smooth interaction animations makes user experience more natural and comfortable.</p>
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
                        <div style="background-image: url(/assets/media/54641cd6-8b83-43b8-aae4-9d7bb544b5cb.jpg);width: 100%;height:225px;background-size: cover;background-position: center;"></div>
                        <div class="card-body">
                            <h6>FinWin </h6>
                            <p class="card-text truncate-string-2">Creative, Mobile First Startup Landing Page with stylish parallax effect. Template uses Bootstrap 4 grid system so it’s responsive on every device. You can choose from 8 different homepage designs.</p>
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
                        <div style="background-image: url(/assets/media/de0f74d1-1dd5-4000-b342-1a83eba4ca6d.jpg);width: 100%;height:225px;background-size: cover;background-position: center;"></div>
                        <div class="card-body">
                            <h6>Swan Lake</h6>
                            <p class="card-text truncate-string-2">Swan Lake is a Modern and Creative premium Onepage Lead Generation Marketing Landing Page HTML5 Template. Swan Lake is made in a beautiful style. Anyone can use it for Agency, business, business services, and etc.Theme has a universal design, it thought every detail and animation effect. Its just as easy to customize to fit your needs, replace images and texts. Swan Lake based on bootstrap 1170px grid system, HTML5 and CSS3, and it’s very easy to customize each and every block of HTML and CSS file is properly commented which will help you to customize this template as per your requirements.</p>
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