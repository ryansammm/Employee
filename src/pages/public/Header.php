<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Panca Teknologi Aksesindo</title>

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
</style>

<body style="background-color: #d8d8d86b !important;">

    <nav class=" d-flex flex-wrap bd-subnavbar pt-2 bg-white ">

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

                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!------- Top Header ------->
        <div class="container d-flex align-items-md-center pb-3">
            <div class="position-relative me-auto">
                <div class="d-flex">
                    <div class="web-title d-flex justify-content-around">
                        <a class="navbar-brand pe-1" href="#">
                            <img src="/assets/media/<?= arr_offset($GLOBALS['web_logo'], 'path_media') ?>" alt="" style="width: 82px;">
                        </a>
                        <h6 style="margin-top: auto;margin-bottom: auto;">Panca Teknologi Aksesindo</h6>
                    </div>
                    <form class="d-flex">
                        <div class="input-group mt-3 ms-3" style="width: 570pt;">
                            <input type="search" class="form-control" placeholder="Mengenal Lebih Jauh Tentang Kami.." aria-label="Search">
                        </div>
                    </form>
                    <ul class="nav justify-content-end ps-5 d-flex">
                        <li class="nav-item">
                            <a type="button" data-bs-toggle="modal" data-bs-target="#modalLogin" class="text-decoration-none text-dark">
                                <i class="bi bi-person fs-4"></i>
                            </a>
                        </li>
                    </ul>
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
                            <?php foreach ($GLOBALS['web_menu'] as $key => $menu) { ?>
                                <li class="nav-item <?= (arr_offset($menu, 'link_url') != null && strpos($GLOBALS['url'], arr_offset($menu, 'link_url')) == arr_offset($menu, 'link_url')) ? 'nav-item-active' : '' ?>">
                                    <a class="nav-link  text-white" href="<?= arr_offset($menu, 'link_url') ?>"><?= arr_offset($menu, 'menu') ?></a>
                                </li>
                            <?php } ?>
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
                                                <li>
                                                    <a class="dropdown-item" style="font-size: 14px;" href="<?= $menu['tipe'] == '1' ? '/page/'.$menu['link_url'] : $menu['link_url'] ?>"><?= $menu['menu'] ?></a>
                                                </li>
                                            <?php } else { ?>
                                                <li class="dropdown">
                                                    <a class="dropdown-toggle" style="font-size: 14px;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $menu['menu'] ?></a>
                                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                        <?php foreach ($menu['sub_menu'] as $key1 => $menu1) { ?>
                                                            <?php if (empty($menu1['sub_menu'])) { ?>
                                                                <li><a class="dropdown-item" style="font-size: 14px;" href="<?= $menu1['tipe'] == '1' ? '/page/'.$menu1['link_url'] : $menu1['link_url'] ?>"><?= $menu1['menu'] ?></a></li>
                                                            <?php } else { ?>
                                                                <li class="dropdown">
                                                                    <a class="dropdown-toggle dropdown-sub-toggle" style="font-size: 14px;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $menu1['menu'] ?></a>
                                                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                                        <?php foreach ($menu1['sub_menu'] as $key2 => $menu2) { ?>
                                                                            <?php if (empty($menu2['sub_menu'])) { ?>
                                                                                <li><a class="dropdown-item" style="font-size: 14px;" href="<?= $menu2['tipe'] == '1' ? '/page/'.$menu2['link_url'] : $menu2['link_url'] ?>"><?= $menu2['menu'] ?></a></li>
                                                                            <?php } else { ?>
                                                                                <li class="dropdown">
                                                                                    <a class="dropdown-toggle dropdown-sub-toggle" style="font-size: 14px;" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?= $menu2['menu'] ?></a>
                                                                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                                                        <?php foreach ($menu2['sub_menu'] as $key3 => $menu3) { ?>
                                                                                            <?php if (empty($menu3['sub_menu'])) { ?>
                                                                                                <li><a class="dropdown-item" style="font-size: 14px;" href="<?= $menu3['tipe'] == '1' ? '/page/'.$menu3['link_url'] : $menu3['link_url'] ?>">Sub Sub Sub menu 1</a></li>
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



    <!------- Modal ------->
    <div class="container" style="padding-top: 20px;">

        <div class="modal rounded" tabindex="1" id="modalLogin">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-4">
                        <form>
                            <img src="/assets/img/logo.png" class="d-block mx-auto" width="50%">
                            <h6 class="text-center my-4 fw-lighter px-5">Login dulu biar bisa komen, atur notifikasi konten<br>favoritmu, dan bisa bikin konten. Yuk!</h6>
                            <div class="input-group mt-3 mb-2">
                                <span class="input-group-text  bg-body border-0 text-danger" id="inputGroup-sizing-default">
                                    <i data-feather="user"></i>
                                </span>
                                <input type="text" name="namaUser" class="form-control rounded" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required placeholder="Nama Pengguna/Email">
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text bg-body border-0 text-danger" id="inputGroup-sizing-default">
                                    <i data-feather="lock"></i>
                                </span>
                                <input type="password" name="cPassword" class="form-control rounded" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Kata Sandi" required>
                            </div>
                            <div class="d-flex">
                                <div class="col-6 ps-5 text-danger">
                                    <input type="checkbox" name="" class="form-check-input"><span>&nbsp;Ingatkan Saya</span>
                                </div>
                                <div class="col-6">
                                    <a href="" style="text-decoration: none;" class="text-danger float-end"><span>Lupa Password?</span></a>
                                </div>
                            </div>
                            <center>
                                <button type="submit" class="btn btn-danger w-25 rounded-pill mt-3 mb-1" name="register" value="login">Masuk</button>
                                <p class="text-danger mx-auto my-1">Atau gunakan</p>
                                <a href="" class="btn w-75 mx-auto my-1" style="background-color: #e6e6e6;"><img src="assets/img/fblogo.png" width="25px"><span> &nbsp;Facebook</span></a>
                                <a href="" class="btn w-75 mx-auto my-1" style="background-color: #e6e6e6;"><img src="https://storage.googleapis.com/support-kms-prod/ZAl1gIwyUsvfwxoW9ns47iJFioHXODBbIkrK" width="25px"><span> Goggle</span></a>
                                <a href="" class="btn w-75 mx-auto my-1" style="background-color: #e6e6e6;"><i class="fas fa-mobile-alt text-danger fs-5"></i><span> Nomor Handphone</span></a>
                                <p class="mx-auto my-2">Belum punya akun? <a href="" class="text-danger" style="text-decoration:none;" data-bs-target="#modalRegister" data-bs-toggle="modal" data-bs-dismiss="modal">Daftar Sekarang</a></p>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal rounded" tabindex="1" id="modalRegister">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-body p-4">
                        <form>
                            <h3 class="text-center">Register</h3>
                            <h6 class="text-center my-4 fw-lighter px-5">Daftar dulu biar bisa komen, bikin konten, langganan kumparan+ dan atur notifikasi konten favoritmu. Yuk!</h6>
                            <div class="input-group mt-3 mb-2">
                                <input type="text" name="emailUser" class="form-control rounded" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required placeholder="Email">
                            </div>
                            <center>
                                <button type="submit" class="btn btn-danger w-25 rounded-pill mt-3 mb-1" name="register" value="login">Register</button>
                                <p class="text-danger mx-auto my-1">Atau gunakan</p>
                                <a href="" class="btn w-75 mx-auto my-1" style="background-color: #e6e6e6;"><img src="assets/img/fblogo.png" width="25px"><span> &nbsp;Facebook</span></a>
                                <a href="" class="btn w-75 mx-auto my-1" style="background-color: #e6e6e6;"><img src="https://storage.googleapis.com/support-kms-prod/ZAl1gIwyUsvfwxoW9ns47iJFioHXODBbIkrK" width="25px"><span> Goggle</span></a>
                                <a href="" class="btn w-75 mx-auto my-1" style="background-color: #e6e6e6;"><i class="fas fa-mobile-alt text-danger fs-5"></i><span> Nomor Handphone</span></a>
                                <p class="mx-auto my-2">Sudah punya akun? <a href="" class="text-danger" style="text-decoration:none;" data-bs-target="#modalLogin" data-bs-toggle="modal" data-bs-dismiss="modal">Masuk</a></p>
                            </center>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>


    <script>
        feather.replace()
    </script>


    <!-- content -->