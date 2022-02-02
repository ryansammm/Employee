<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tristek Media Kreasindo | Admin</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="/assets/logo/tmk-favicon.png" />

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <!-- <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"> -->
    <!-- Theme style -->
    <link rel="stylesheet" href="/assets/admin/css/adminlte.min.css">
    <!-- Style -->
    <link rel="stylesheet" href="/assets/admin/css/tmk-style.css">
    <!-- summernote -->
    <link rel="stylesheet" href="/assets/plugins/summernote/summernote-bs4.min.css">
    <!-- Truncate -->
    <link rel="stylesheet" href="/assets/plugins/truncate.css">
    <!-- jQuery -->
    <!-- <script src="/assets/js/jquery-3.3.1.min.js"></script> -->
    <script src="/assets/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <!-- <script src="/assets/plugins/bootstrap-4.6.1-dist/css/bootstrap.min.css"></script> -->
    <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!------- Bootstrap Icon ------->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <!------- BS-Stepper ------->
    <link rel="stylesheet" href="/assets/plugins/bs-stepper/css/bs-stepper.min.css">
    <!------- Re-Captcha ------->
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>

</head>


<style>
    nav {
        font-size: 12px !important;
    }

    .plus {
        font-size: 20px;
        font-weight: 500;
    }

    td,
    th {
        font-size: 14px;
    }

    .btn-aksi a {
        padding: .25rem .3rem;
        font-size: .875rem;
        line-height: 0.5;
        border-radius: .2rem;
    }

    .fa {
        cursor: pointer !important;
    }

    h1 {
        font-size: 22px !important;
    }

    .breadcrumb {
        font-size: 14px !important;
    }

    footer {
        font-size: 13px !important;
    }

    .btn-next {
        color: #fff;
        background-color: #787878;
        border-color: #787878;
        box-shadow: none;
    }

    .btn-next:hover {
        color: #fff;
        background-color: red;
        border-color: red;
        box-shadow: none;
    }

    li.nav-header {
        font-size: 12px !important;
    }

    body {
        font-family: 'Poppins', sans-serif !important;
    }

    label {
        font-weight: 500 !important;
        font-size: 11px !important;
    }

    .form-control {
        font-size: 12px !important;
        height: calc(2.0rem + 1px);
        padding: .175rem .75rem !important;
    }

    button {
        font-size: 11px !important;
    }

    .btn {
        font-size: 11px;
    }

    .custom-file-label {
        font-size: 12px !important;
        font-style: italic;
        height: calc(2.0rem + 1px);
    }

    .custom-file,
    .custom-file-input {
        height: calc(2.0rem + 1px);
    }

    .crop {
        width: 157px;
        height: 199px;
        overflow: hidden;
        margin-top: 7px;
    }

    .crop img {
        width: 157px;
        height: 199px;
        border-radius: 0.25rem;
        object-fit: cover;
    }

    .sidebar {
        font-size: 13px !important;
    }

    .brand-text {
        font-size: 11px !important;
    }

    .main-footer {
        font-size: 11px;
    }

    h5 {
        font-size: 13px !important;
    }

    .d-flex h1 {
        line-height: 26px;
    }

    .custom-control label {
        line-height: 24px;
    }
</style>

<body class="hold-transition sidebar-mini layout-fixed">

    <div class="wrapper" style="height: 100%;">
        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars" style="font-size: 18px;color: #1c1c1c;margin-top: 3px;"></i></a>
                </li>
                <!-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="#" class="nav-link">Contact</a>
                </li> -->
            </ul>

            <ul class="navbar-nav" style="font-size: 16px;">
                <li class="nav-item">
                    <img src="/assets/logo/TMK-black.png" alt="" class="mr-1" style="height: 23px;">
                    <span style="font-size: 16px;font-weight: 600;line-height: 40px;">Employee Profile Manager</span>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <div class="d-flex mr-3">
                        <div class="user-img align-items-center mr-2">
                            <div style="background-image: url(<?= asset($GLOBALS['path_media']) ?>);width: 38px;height: 38px;background-size: cover;background-position: center;border-radius: 50%;"></div>
                        </div>
                        <div class="user-name text-start my-auto ms-3">
                            <h6 class="mb-0 text-muted" style="font-size: 12px;"><?= $GLOBALS['nama_user'] ?></h6>
                            <p class="mb-0 text-primary" style="font-size: 11px;">Online</p>
                        </div>
                    </div>
                </li>
                <li class="nav-item my-auto">
                    <div class="btn-group mr-3">
                        <a type="button" class="text-decoration-none" data-toggle="dropdown" aria-expanded="false">
                            <i class="fa fa-cog" aria-hidden="true" style="font-size: 27px;color: transparent;-webkit-text-stroke-width: 1.5px;-webkit-text-stroke-color: #797979;"></i>
                        </a>
                        <div class="dropdown-menu mt-2" style="font-size: 12px !important;">
                            <h6 class="dropdown-header" style="text-align: left !important;">Hello, <?= $GLOBALS['nama_user'] ?>!</h6>
                            <a class="dropdown-item" href="/admin/profile-saya">
                                <i class="fa fa-user mr-1" aria-hidden="true"></i>
                                My Profile
                            </a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="/admin/logout">
                                <i class="fa fa-sign-out-alt" aria-hidden="true" style="font-size: 13px !important;"></i>
                                Logout
                            </a>
                        </div>
                    </div>
                </li>


            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <?php include(__DIR__ . '/../layouts/admin-sidebar.php'); ?>