<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SIMBADAK</title>

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <!--<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">

    <link rel="stylesheet" href="/assets/css/iconly/bold.css">

    <link rel="stylesheet" href="/assets/css/perfect-scrollbar.css">
    <link rel="stylesheet" href="/assets/css/bootstrapicons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="stylesheet" href="/assets/css/gallery.css">
</head>

<body>
    <div id="app">
        <?php include('../src/pages/adminhelper/sidebar.php'); ?>
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Repository Foto</h3>
            </div>
            <div class="page-content">
                <!-- // Basic multiple Column Form section start -->
                <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header py-3">
                                    <a href="./" class="btn btn-secondary btn-sm d-inline"><i class="bi bi-arrow-left"></i> Kembali</a>
                                    <h4 class="card-title d-inline ms-2">Detail Data</h4>
                                </div>
                                <div class="card-content">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-5">
                                                <h6>Cover Album</h6>
                                                <img class="img-fluid img-thumbnail" src="/assets/media/<?= $data_galeri['pathMedia'] ?>">
                                            </div>
                                            <div class="col">
                                                <h6>Judul Album</h6>
                                                <h5 class="mb-3"><?= $data_galeri['galeri_ind'] ?></h5>
                                                <h6>Deskripsi Album</h6>
                                                <p><?= $data_galeri['galeri_desc_ind'] ?></p>
                                            </div>
                                        </div>
                                        <section id="gallery">
                                            <h6>Detail Gallery</h6>
                                            <div class="container">
                                                <div id="image-gallery">
                                                    <div class="row">
                                                        <?php foreach ($data_galeri['groupgaleri'] as $key => $data) : ?>
                                                        <div class="col-lg-4 col-md-6 col-sm-6 col-xs-12 image">
                                                            <div class="img-wrapper">
                                                                <a href="/assets/media/<?= $data['pathMedia'] ?>"><img src="/assets/media/<?= $data['pathMedia'] ?>" class="img-responsive"></a>
                                                                <div class="img-overlay" style="opacity: 1;">
                                                                    <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                                </div>
                                                            </div>
                                                            <h6 class="mt-2" style="font-size: 13px;">Judul Gallery</h6>
                                                            <h6 class="font-weight-normal mb-2" style="font-size: 13px;"><?= $data['judul_groupgaleri'] ?></h6>
                                                            <h6 class="mt-2" style="font-size: 13px;">Deskripsi Gallery</h6>
                                                            <h6 class="font-weight-normal mb-2" style="font-size: 13px;"><?= $data['deskripsi_groupgaleri'] ?></h6>
                                                        </div>
                                                        <?php endforeach; ?>
                                                    </div><!-- End row -->
                                                </div><!-- End image gallery -->
                                            </div><!-- End container -->
                                            <div id="overlay" style="display: none;">
                                                <div id="prevButton"><i class="fa fa-chevron-left"></i></div><img src="https://unsplash.it/700">
                                                <div id="nextButton"><i class="fa fa-chevron-right"></i></div>
                                                <div id="exitButton"><i class="fa fa-times"></i></div>
                                            </div>
                                        </section>
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic multiple Column Form section end -->
                
            </div>

            <?php include('../src/pages/adminhelper/footer.php'); ?>
        </div>
    </div>

    <script src="/assets/js/jquery-3.3.1.min.js"></script>
    <script src="/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <!--<script src="/assets/js/bootstrap.min.js"></script>-->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/gallery.js"></script>
    <script src="/assets/js/gallery-extra.js"></script>
    <script src="https://cpwebassets.codepen.io/assets/common/stopExecutionOnTimeout-1b93190375e9ccc259df3a57c1abc0e64599724ae30d7ea4c6877eb615f89387.js">
    </script>
</body>

</html>