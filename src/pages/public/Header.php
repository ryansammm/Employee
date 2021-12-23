<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">

    <title>PT. Panca Teknologi Aksesindo</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets/logo/PTA.png" />

    <!------- Bootstrap ------->
    <link href="/assets/public/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/public/css/bootstrap.css" rel="stylesheet">
    <!------- Bootstrap Icon ------->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!------- Fontawesome ------->
    <link href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@5.15.3/css/fontawesome.min.css">

    <!------- Style theme ------->
    <link rel="stylesheet" href="/assets/public/css/style.css">

    <!------- Plugins ------->
    <link rel="stylesheet" href="/assets/plugins/truncate.css">
    <link rel="stylesheet" href="/assets/plugins/owl-carousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="/assets/plugins/owl-carousel/css/owl.theme.default.min.css">

    <!------- Captcha ------->
    <script src='https://www.google.com/recaptcha/api.js' async defer></script>

    <link rel="stylesheet" href="/assets/public/css/multi-dropdown.css">
    <link rel="stylesheet" href="/assets/public/css/dropdown-style-custom.css">

    <!------- Owl Carousel ------->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!------- JQuery ------->
    <script src="/assets/js/jquery-3.6.0.min.js"></script>

</head>


<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
    }

    @media (min-width: 768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem;
        }
    }

    @font-face {
        font-family: 'Astro-Space';
        src: url('/assets/fonts/Astro-Space.ttf') format('truetype');
    }
</style>

<body style="background-color: #d8d8d86b !important;">

    <nav class=" d-flex flex-wrap bd-subnavbar pt-2 bg-white mb-3">

        <?php if ($GLOBALS['id_user'] != '') { ?>
            <!------- Button Ubah Logo & Nama Perusahaan ------->
            <button type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#logo-header" style="position: absolute;left: 1rem;top: 1.5rem;">
                <i class="bi bi-pencil-square"></i>
            </button>

            <!------- Modal Ubah Logo & Nama Perusahaan ------->
            <div class="modal fade" id="logo-header" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="logo-headerLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="/admin/login-template/cms-title/update" method="POST" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h5 class="modal-title" id="logo-headerLabel">Ubah Logo & Nama Perusahaan</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="redirect_to" value="<?= $GLOBALS['url'] ?>">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Logo</label>
                                    <input class="form-control" type="file" id="formFile" name="logoPerusahaan">
                                </div>
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Nama Perusahaan</label>
                                    <input class="form-control" type="text" name="cms_title" value="<?= arr_offset($GLOBALS['web_title'], 'cms_title') ?>">
                                </div>
                                <hr>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="cms_title_option" id="flexRadioDefault1" value="1" <?= arr_offset($GLOBALS['web_title'], 'cms_title_option') == '1' ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="flexRadioDefault1">
                                        Logo
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="cms_title_option" id="flexRadioDefault2" value="2" <?= arr_offset($GLOBALS['web_title'], 'cms_title_option') == '2' ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="flexRadioDefault2">
                                        Nama Perusahaan
                                    </label>
                                </div>
                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="cms_title_option" id="flexRadioDefault3" value="3" <?= arr_offset($GLOBALS['web_title'], 'cms_title_option') == '3' ? 'checked' : '' ?>>
                                    <label class="form-check-label" for="flexRadioDefault3">
                                        Logo & Nama Perusahaan
                                    </label>
                                </div>
                                <hr>
                                <div class="mb-3">
                                    <label for="">Posisi Logo</label>
                                    <select name="cms_title_position" class="form-control">
                                        <option value="1" <?= $GLOBALS['web_title']['cms_title_position'] == '1' ? 'selected' : '' ?>>Kiri</option>
                                        <option value="2" <?= $GLOBALS['web_title']['cms_title_position'] == '2' ? 'selected' : '' ?>>Tengah</option>
                                        <option value="3" <?= $GLOBALS['web_title']['cms_title_position'] == '3' ? 'selected' : '' ?>>Kanan</option>
                                    </select>
                                </div>
                                <hr>
                                <div class="mb-3">
                                    <label for="">Menggunakan form Pencarian?</label>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="cms_search" id="flexRadioDefault2" value="1" <?= arr_offset($GLOBALS['web_title'], 'cms_search') == '1' ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Ya
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="cms_search" id="flexRadioDefault3" value="2" <?= arr_offset($GLOBALS['web_title'], 'cms_search') == '2' ? 'checked' : '' ?>>
                                        <label class="form-check-label" for="flexRadioDefault3">
                                            Tidak
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>

        <!------- Top Header ------->
        <div class="container py-2">
            <div class="position-relative me-auto">
                <div class="d-flex">
                    <div class="row" style="width: 100%;">

                        <!-- Pake justify-content-center mun rek katengah -->
                        <div class="col-12 d-flex <?= $GLOBALS['web_title']['cms_title_position'] == '2' ? 'justify-content-center' : ($GLOBALS['web_title']['cms_title_position'] == '3' ? 'justify-content-end' : '') ?>">

                            <?php if ($GLOBALS['web_title']['cms_title_position'] == '3' && $GLOBALS['web_title']['cms_search'] == '1') { ?>
                                <form class="pe-5" action="" method="POST">
                                    <div class="input-group mt-3 ms-3" style="width: 570pt;font-size: 14px !important;">
                                        <input type="search" class="form-control" placeholder="Mengenal Lebih Jauh Tentang Kami.." aria-label="Search">
                                    </div>
                                </form>
                            <?php } ?>

                            <div class="web-title d-flex float-start">
                                <?php if ($GLOBALS['web_title']['cms_title_option'] == 1 || $GLOBALS['web_title']['cms_title_option'] == 3) { ?>
                                    <a class="navbar-brand pe-1" href="/">
                                        <img src="/assets/media/<?= arr_offset($GLOBALS['web_logo'], 'path_media') ?>" alt="" style="width: 110px;">
                                    </a>
                                <?php } ?>
                                <!-- Mun rek katengahkeun, si breakword jeung inline di hapus -->
                                <?php if ($GLOBALS['web_title']['cms_title_option'] == 2) { ?>
                                    <a class="text-decoration-none" href="/" style="margin-top: auto;margin-bottom: auto;font-family: Astro-Space;">
                                        <h6><?= $GLOBALS['web_title']['cms_title'] ?></h6>
                                    </a>
                                <?php } else if ($GLOBALS['web_title']['cms_title_option'] == 3) { ?>
                                    <a class="text-decoration-none" href="/" style="margin-top: auto;margin-bottom: auto;font-family: Astro-Space;">
                                        <h6><?= $GLOBALS['web_title']['cms_title'] ?></h6>
                                    </a>
                                <?php } ?>
                            </div>

                            <!-- mun katengah, si form di hide -->
                            <?php if ($GLOBALS['web_title']['cms_title_position'] == '1' && $GLOBALS['web_title']['cms_search'] == '1') { ?>
                                <form action="/search" method="GET">
                                    <div class="input-group mt-3 ms-3">
                                        <input type="text" class="form-control" name="search" placeholder="Mengenal Lebih Jauh Tentang Kami.." aria-label="Recipient's username" aria-describedby="button-addon2" style="width: <?= $GLOBALS['id_user'] != '' ? '320pt' : '458pt' ?>;font-size: 14px;" value="<?= isset($search) ? show($search) : '' ?>">
                                        <div class="input-group-append">
                                            <button class="btn btn-outline-secondary" type="submit" id="button-addon2"><i class="bi bi-search"></i></button>
                                        </div>
                                    </div>
                                </form>
                            <?php } ?>

                            <?php if ($GLOBALS['id_user'] != '') { ?>
                                <div class="dropdown ps-4 ms-auto">
                                    <a class="text-decoration-none" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                                        <div class="d-flex mt-3">
                                            <div class="user-img align-items-center mr-3">

                                                <div style="background-image: url(/assets/media/<?= $GLOBALS['path_media'] ?>);width: 38px;height: 38px;background-size: cover;background-position: center;border-radius: 50%;"></div>

                                                <!-- <img src="/assets/media/<?= $GLOBALS['path_media'] ?>" style="width: 38px;height: 38px;" class="rounded-circle"> -->
                                            </div>
                                            <div class="user-name text-start ms-3">
                                                <h6 class="mb-0 text-muted" style="font-size: 14px;"><?= $GLOBALS['nama_user'] ?></h6>
                                                <p class="mb-0 text-sm text-primary" style="font-size: 14px;">Online</p>
                                            </div>
                                        </div>
                                    </a>

                                    <ul class="dropdown-menu border mt-2" aria-labelledby="dropdownMenuButton">
                                        <li class="px-2">
                                            <h6 class="dropdown-header">Hello, <?= $GLOBALS['nama_user'] ?>!</h6>
                                        </li>
                                        <li class="px-2">
                                            <a class="dropdown-item" href="/admin/profile-saya">
                                                <i class="icon-mid bi bi-person me-2"></i> My
                                                Profile
                                            </a>
                                        </li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li class="px-2">
                                            <a class="dropdown-item" href="/admin/logout" role="button">
                                                <i class="icon-mid bi bi-box-arrow-left me-2"></i>
                                                Logout
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            <?php } ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!------- Navigation ------->
        <!-- <div class="container-fluid d-flex justify-content-center" style="background-color: #0853a6;">
            <div id="carouselExampleControlsDark" class="carousel carousel-dark slide carousel-navigation" data-bs-ride="carousel" data-bs-interval="false">
                <div class="carousel-inner" style="padding: 0px 15px;">
                    <div class="carousel-item active">
                        <ul class="nav">
                            <li class="nav-item <?= $GLOBALS['url'] == '/' ? 'nav-item-active' : '' ?>">
                                <a class="nav-link  text-white" href="/">Beranda</a>
                            </li>
                            <li class="nav-item <?= strpos($GLOBALS['url'], '/news') == '/news' ? 'nav-item-active' : '' ?>">
                                <a class="nav-link  text-white" href="/news">Berita</a>
                            </li>
                            <li class="nav-item <?= strpos($GLOBALS['url'], '/product') == '/product' ? 'nav-item-active' : '' ?>">
                                <a class="nav-link  text-white" href="/product">Produk</a>
                            </li>
                            <li class="nav-item <?= strpos($GLOBALS['url'], '/service') == '/service' ? 'nav-item-active' : '' ?>">
                                <a class="nav-link  text-white" href="/service">Layanan</a>
                            </li>
                            <li class="nav-item <?= strpos($GLOBALS['url'], '/gallery') == '/gallery' ? 'nav-item-active' : '' ?>">
                                <a class="nav-link  text-white" href="/gallery">Jejak Kami</a>
                            </li>
                            <li class="nav-item <?= strpos($GLOBALS['url'], '/customer') == '/customer' ? 'nav-item-active' : '' ?>">
                                <a class="nav-link  text-white" href="/customer">Klien Kami</a>
                            </li>
                            <li class="nav-item <?= strpos($GLOBALS['url'], '/contact') == '/contact' ? 'nav-item-active' : '' ?>">
                                <a class="nav-link  text-white" href="/contact">Kontak</a>
                            </li>
                            <li class="nav-item <?= strpos($GLOBALS['url'], '/about') == '/about' ? 'nav-item-active' : '' ?>">
                                <a class="nav-link  text-white" href="/about">Tentang Kami</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div> -->

        <div class="container-fluid d-flex justify-content-center" style="background-color: #0853a6;">
            <div id="menu_area" class="menu-area">
                <div class="container-fluid">
                    <div class="row">
                        <nav class="navbar navbar-light navbar-expand-lg mainmenu dNone">
                            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                                <ul class="navbar-nav mr-auto">
                                    <?php foreach ($GLOBALS['web_menu'] as $key => $menu) { ?>

                                        <?php if ($menu['parent_id'] == '0') { ?>

                                            <?php if (empty($menu['sub_menu'])) { ?>
                                                <li class="dropdown <?= $GLOBALS['url'] == $menu['link_url'] ? 'nav-item-active' : '' ?>">
                                                    <a class="dropdown-item" style="font-size: 16px;text-transform: capitalize;padding: 8px 16px;display: block !important;text-decoration: none;" href="<?= $menu['link_url'] ?>"><?= $menu['menu'] ?></a>
                                                </li>
                                            <?php } else { ?>

                                                <li class="dropdown <?= $GLOBALS['url'] == $menu['link_url'] ? 'nav-item-active' : '' ?>">
                                                    <a class="dropdown-toggle" style="font-size: 16px;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $menu['menu'] ?></a>
                                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">

                                                        <?php foreach ($menu['sub_menu'] as $key1 => $menu1) { ?>

                                                            <?php if (empty($menu1['sub_menu'])) { ?>
                                                                <li><a class="dropdown-item" style="font-size: 16px;" href="/"><?= $menu1['menu'] ?></a></li>
                                                            <?php } else { ?>
                                                                <li class="dropdown <?= $GLOBALS['url'] == $menu1['link_url'] ? 'nav-item-active' : '' ?>">
                                                                    <a class="dropdown-toggle dropdown-sub-toggle" style="font-size: 16px;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $menu1['menu'] ?></a>
                                                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                                        <?php foreach ($menu1['sub_menu'] as $key2 => $menu2) { ?>
                                                                            <?php if (empty($menu2['sub_menu'])) { ?>
                                                                                <li><a class="dropdown-item" style="font-size: 16px;" href="/"><?= $menu2['menu'] ?></a></li>
                                                                            <?php } else { ?>
                                                                                <li class="dropdown <?= $GLOBALS['url'] == $menu2['link_url'] ? 'nav-item-active' : '' ?>">
                                                                                    <a class="dropdown-toggle dropdown-sub-toggle" style="font-size: 16px;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $menu2['menu'] ?></a>
                                                                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                                                        <?php foreach ($menu2['sub_menu'] as $key3 => $menu3) { ?>
                                                                                            <?php if (empty($menu3['sub_menu'])) { ?>
                                                                                                <li><a class="dropdown-item" style="font-size: 16px;" href="/">Sub Sub Sub menu 1</a></li>
                                                                                            <?php } ?>
                                                                                        <?php } ?>
                                                                                    </ul>
                                                                                </li>
                                                                            <?php } ?>
                                                                        <?php } ?>
                                                                    </ul>
                                                                </li>
                                                            <?php } ?>
                                                        <?php } ?>
                                                    </ul>
                                                </li>
                                            <?php } ?>
                                        <?php } ?>
                                    <?php } ?>
                                </ul>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </nav>

    <!-- 
        <div class="d-block">
            <form class="float-end me-5">
                <div class="input-group mt-3 ms-3">
                    <input type="text" class="form-control" placeholder="Mengenal Lebih Jauh Tentang Kami.." aria-label="Recipient's username" aria-describedby="button-addon2" style="width: 500pt;">
                    <div class="input-group-append">
                        <button class="btn btn-outline-secondary" type="button" id="button-addon2"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </form>
        </div>
        <div style="clear:both"></div>
    -->
    <?php if ($GLOBALS['web_title']['cms_title_position'] == '2' && $GLOBALS['web_title']['cms_search'] == '1') { ?>
        <div class="container">
            <div class=" float-end">
                <form action="/search" method="GET">
                    <div class="input-group mt-3 ms-3">
                        <input type="text" class="form-control" name="search" placeholder="Pencarian.." aria-label="Recipient's username" aria-describedby="button-addon2" style="width: 480pt;font-size: 14px;max-width: 200px;" value="<?= isset($search) ? show($search) : '' ?>">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="submit" id="button-addon2"><i class="bi bi-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div style="clear: both;"></div>
    <?php } ?>



    <script>
        feather.replace()
    </script>


    <!-- content -->