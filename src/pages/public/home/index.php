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

    <!-- <script src="https://unpkg.com/feather-icons"></script> -->

</head>

<body>

    <nav class="d-flex flex-wrap bd-subnavbar pt-2 bg-white ">
        <!------- Top Header ------->
        <div class="d-flex align-items-md-center pb-3">
            <div class="position-relative me-auto">
                <div class="d-flex">
                    <a class="navbar-brand ps-5 pe-4" href="#">
                        <img src="/assets/logo/PTA-logo.png" alt="" style="width: 82px;">
                    </a>
                    <form>
                        <div class="input-group mt-3 ms-3" style="width: 787pt;">
                            <input type="search" class="form-control" placeholder="Search..." aria-label="Search">
                        </div>
                    </form>
                </div>
            </div>

            <ul class="nav justify-content-end ps-5">
                <li class="nav-item">
                    <a type="button" data-bs-toggle="modal" data-bs-target="#modalLogin" class="text-decoration-none text-dark" style="margin-right: 20px;">
                        <i class="bi bi-person fs-4"></i>
                    </a>
                </li>
            </ul>
        </div>

        <!------- Navigation ------->
        <div class="container-fluid d-flex justify-content-center" style="background-color: #0853a6;">
            <div id="carouselExampleControlsDark" class="carousel carousel-dark slide carousel-navigation" data-bs-ride="carousel" data-bs-interval="false">
                <div class="carousel-inner" style="padding: 0px 15px;">
                    <div class="carousel-item active">
                        <ul class="nav nav-pills">
                            <li class="nav-item nav-item-active">
                                <a class="nav-link fw-bold text-white" href="/">Beranda</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold text-white" href="#">Berita</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold text-white" href="#">Produk</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold text-white" href="#">Layanan</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold text-white" href="#">Galeri</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold text-white" href="#">Klien Kami</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold text-white" href="#">Kontak</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link fw-bold text-white" href="#">Tentang Kami</a>
                            </li>
                        </ul>
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




    <!------- About Us ------->
    <section id="about-us" class="container py-5">
        <div class="row">
            <div class="col-md-6">
                <div style="background-image: url('/assets/public/img/profile.jpg');width:410pt;height: 240pt;background-size: cover;background-position: center;border-radius: 10pt 10pt 10pt 10pt;"></div>
            </div>
            <div class="col-md-6">
                <div class="title">
                    <h2>Tentang Kami</h2>
                </div>
                <div class="description">
                    <h6 class="fw-normal" style="text-align: justify;">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad quis quod perferendis voluptatum odit, quae praesentium, deleniti minima temporibus dolore illum. Facere quasi laboriosam atque expedita possimus corporis necessitatibus magnam. Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempora eaque omnis necessitatibus debitis fugit consectetur officiis consequuntur ducimus alias nam impedit non est ex, pariatur, perferendis blanditiis recusandae libero architecto at illum veniam. Quia possimus ea corporis commodi sit minima nam, maiores, deserunt asperiores harum pariatur? A magni placeat, hic consequuntur eveniet nulla aliquam expedita numquam. Possimus pariatur nam, tenetur sequi aspernatur fuga enim magnam ipsam asperiores odit at incidunt unde? Pariatur exercitationem voluptate quaerat animi autem culpa accusantium! Deleniti recusandae natus, repudiandae dignissimos consequuntur earum ex veniam reiciendis suscipit nulla nihil accusantium a unde qui neque magni aliquam alias!</h6>
                </div>
            </div>
        </div>
    </section>


    <!------- News ------->
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Berita Terkini</h5>
        </div>
        <div class="row mt-3">
            <div class="col-8">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel" style="height: 525px;">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner" style="padding: 0px 15px;">
                        <div class="carousel-item active">
                            <div class="row mb-1">
                                <div class="col-12" style="padding: 0;">
                                    <div class="img-atas-berita" style="background: url(https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1610100998/cpjpb98sxycemxtxik8i.jpg);background-size: cover;background-position: top center;">
                                        <div class="bg-atas-berita">
                                            <div class="text-atas-berita">
                                                <h6 class="text-white">Gempa 5,4 Magnitudo Guncang Namela, Pulau Buru</h6>
                                                <div class="row justify-content-around">
                                                    <div class="col d-flex">
                                                        <div class="sub-item">
                                                            <i class="bi bi-heart"></i>
                                                            <span>0</span>
                                                        </div>
                                                        <div class="sub-item">
                                                            <i class="bi bi-heart"></i>
                                                            <span>0</span>
                                                        </div>
                                                        <div class="sub-item">
                                                            <span>50 menit</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <!-- Button trigger modal -->
                                                        <button class="btn text-white" style="z-index: 999;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            <i class="bi bi-three-dots-vertical"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6" style="padding: 0;padding-right: 2.5px;">
                                    <div class="img-bawah-berita" style="background: url(https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1619498280/kwflvelwv9i7beibbo2n.jpg);background-size: cover;background-position: top center;">
                                        <div class="bg-atas-berita">
                                            <div class="text-bawah-berita">
                                                <h6 class="text-white">Grafik: Kasus Aktif Corona di Jakarta Salip Jabar, Naik 75% dalam Sepekan</h6>
                                                <div class="row justify-content-around">
                                                    <div class="col d-flex">
                                                        <div class="sub-item">
                                                            <i class="bi bi-heart"></i>
                                                            <span>0</span>
                                                        </div>
                                                        <div class="sub-item">
                                                            <i class="bi bi-heart"></i>
                                                            <span>0</span>
                                                        </div>
                                                        <div class="sub-item">
                                                            <span>50 menit</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <!-- Button trigger modal -->
                                                        <button class="btn text-white" style="z-index: 999;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            <i class="bi bi-three-dots-vertical"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6" style="padding: 0;padding-left: 2.5px;">
                                    <div class="img-bawah-berita" style="background: url(https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1612966334/xn77tyei89hu8jzvu4xk.jpg);background-size: cover;background-position: top center;">
                                        <div class="bg-atas-berita">
                                            <div class="text-bawah-berita">
                                                <h6 class="text-white">Kejagung Lelang 17 Kapal Sitaan Kasus ASABRI, Harga Rp 1,8 hingga 8,3 Miliar</h6>
                                                <div class="row justify-content-around">
                                                    <div class="col d-flex">
                                                        <div class="sub-item">
                                                            <i class="bi bi-heart"></i>
                                                            <span>0</span>
                                                        </div>
                                                        <div class="sub-item">
                                                            <i class="bi bi-heart"></i>
                                                            <span>0</span>
                                                        </div>
                                                        <div class="sub-item">
                                                            <span>50 menit</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <!-- Button trigger modal -->
                                                        <button class="btn text-white" style="z-index: 999;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            <i class="bi bi-three-dots-vertical"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <div class="row mb-1">
                                <div class="col-12" style="padding: 0;">
                                    <div class="img-atas-berita" style="background: url(https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1610100998/cpjpb98sxycemxtxik8i.jpg);background-size: cover;background-position: top center;">
                                        <div class="bg-atas-berita">
                                            <div class="text-atas-berita">
                                                <h6 class="text-white">Gempa 5,4 Magnitudo Guncang Namela, Pulau Buru</h6>
                                                <div class="row justify-content-around">
                                                    <div class="col d-flex">
                                                        <div class="sub-item">
                                                            <i class="bi bi-heart"></i>
                                                            <span>0</span>
                                                        </div>
                                                        <div class="sub-item">
                                                            <i class="bi bi-heart"></i>
                                                            <span>0</span>
                                                        </div>
                                                        <div class="sub-item">
                                                            <span>50 menit</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <!-- Button trigger modal -->
                                                        <button class="btn text-white" style="z-index: 999;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            <i class="bi bi-three-dots-vertical"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6" style="padding: 0;padding-right: 2.5px;">
                                    <div class="img-bawah-berita" style="background: url(https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1619498280/kwflvelwv9i7beibbo2n.jpg);background-size: cover;background-position: top center;">
                                        <div class="bg-atas-berita">
                                            <div class="text-bawah-berita">
                                                <h6 class="text-white">Grafik: Kasus Aktif Corona di Jakarta Salip Jabar, Naik 75% dalam Sepekan</h6>
                                                <div class="row justify-content-around">
                                                    <div class="col d-flex">
                                                        <div class="sub-item">
                                                            <i class="bi bi-heart"></i>
                                                            <span>0</span>
                                                        </div>
                                                        <div class="sub-item">
                                                            <i class="bi bi-heart"></i>
                                                            <span>0</span>
                                                        </div>
                                                        <div class="sub-item">
                                                            <span>50 menit</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <!-- Button trigger modal -->
                                                        <button class="btn text-white" style="z-index: 999;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            <i class="bi bi-three-dots-vertical"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6" style="padding: 0;padding-left: 2.5px;">
                                    <div class="img-bawah-berita" style="background: url(https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1612966334/xn77tyei89hu8jzvu4xk.jpg);background-size: cover;background-position: top center;">
                                        <div class="bg-atas-berita">
                                            <div class="text-bawah-berita">
                                                <h6 class="text-white">Kejagung Lelang 17 Kapal Sitaan Kasus ASABRI, Harga Rp 1,8 hingga 8,3 Miliar</h6>
                                                <div class="row justify-content-around">
                                                    <div class="col d-flex">
                                                        <div class="sub-item">
                                                            <i class="bi bi-heart"></i>
                                                            <span>0</span>
                                                        </div>
                                                        <div class="sub-item">
                                                            <i class="bi bi-heart"></i>
                                                            <span>0</span>
                                                        </div>
                                                        <div class="sub-item">
                                                            <span>50 menit</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-2">
                                                        <!-- Button trigger modal -->
                                                        <button class="btn text-white" style="z-index: 999;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                            <i class="bi bi-three-dots-vertical"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>
            <div class="col">
                <div style="background-color: white;padding: 5px 0 5px 0;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;">Trending</h5>
                        <a href="" class="text-decoration-none">Lihat Lainnya <i class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body" style="height: 460px;overflow-y:scroll;padding: 0;">
                        <!-- start content -->
                        <div class="side-news-item">
                            <div class="d-flex">
                                <h6 class="card-title" style="padding: 0 20px 0 0;width: 225px;">WHO Ungkap Strategi India Sukses Tangani Tsunami Corona: Berani Lockdown</h6>
                                <div class="side-trending-image" style="background: url(https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1618899920/t9jgmld9fd9mwqwvhdq2.jpg);background-size: cover;background-position: top center;"></div>
                            </div>
                            <div class="row">
                                <div class="col-9">
                                    <div class="row justify-content-around text-side-trending">
                                        <div class="col d-flex">
                                            <div class="sub-item">
                                                <i class="bi bi-heart"></i>
                                                <span>0</span>
                                            </div>
                                            <div class="sub-item">
                                                <i class="bi bi-heart"></i>
                                                <span>0</span>
                                            </div>
                                            <div class="sub-item">
                                                <span>50 menit</span>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <!-- Button trigger modal -->
                                            <button class="btn text-dark" style="z-index: 999;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- start content -->
                        <!-- start content -->
                        <div class="side-news-item">
                            <div class="d-flex">
                                <h6 class="card-title" style="padding: 0 20px 0 0;width: 225px;">BREAKING NEWS: Corona di Indonesia Menggila, Melonjak 20.574 Orang Sehari</h6>
                                <div class="side-trending-image" style="background: url(https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1579862421/jaytgvbgn9gwzyvburtb.jpg);background-size: cover;background-position: top center;"></div>
                            </div>
                            <div class="row">
                                <div class="col-9">
                                    <div class="row justify-content-around text-side-trending">
                                        <div class="col d-flex">
                                            <div class="sub-item">
                                                <i class="bi bi-heart"></i>
                                                <span>0</span>
                                            </div>
                                            <div class="sub-item">
                                                <i class="bi bi-heart"></i>
                                                <span>0</span>
                                            </div>
                                            <div class="sub-item">
                                                <span>50 menit</span>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <!-- Button trigger modal -->
                                            <button class="btn text-dark" style="z-index: 999;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- start content -->
                        <!-- start content -->
                        <div class="side-news-item">
                            <div class="d-flex">
                                <h6 class="card-title" style="padding: 0 20px 0 0;width: 225px;">Kapal Perang Rusia Serang Kapal Inggris yang Masuk Perairan Crimea</h6>
                                <div class="side-trending-image" style="background: url(https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1624511580/obm9melj25hcea0oeiwl.jpg);background-size: cover;background-position: top center;"></div>
                            </div>
                            <div class="row">
                                <div class="col-9">
                                    <div class="row justify-content-around text-side-trending">
                                        <div class="col d-flex">
                                            <div class="sub-item">
                                                <i class="bi bi-heart"></i>
                                                <span>0</span>
                                            </div>
                                            <div class="sub-item">
                                                <i class="bi bi-heart"></i>
                                                <span>0</span>
                                            </div>
                                            <div class="sub-item">
                                                <span>50 menit</span>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <!-- Button trigger modal -->
                                            <button class="btn text-dark" style="z-index: 999;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- start content -->
                        <!-- start content -->
                        <div class="side-news-item">
                            <div class="d-flex">
                                <h6 class="card-title" style="padding: 0 20px 0 0;width: 225px;">Kapal Perang Rusia Serang Kapal Inggris yang Masuk Perairan Crimea</h6>
                                <div class="side-trending-image" style="background: url(https://blue.kumparan.com/image/upload/fl_progressive,fl_lossy,c_fill,q_auto:best,w_640/v1624511580/obm9melj25hcea0oeiwl.jpg);background-size: cover;background-position: top center;"></div>
                            </div>
                            <div class="row">
                                <div class="col-9">
                                    <div class="row justify-content-around text-side-trending">
                                        <div class="col d-flex">
                                            <div class="sub-item">
                                                <i class="bi bi-heart"></i>
                                                <span>0</span>
                                            </div>
                                            <div class="sub-item">
                                                <i class="bi bi-heart"></i>
                                                <span>0</span>
                                            </div>
                                            <div class="sub-item">
                                                <span>50 menit</span>
                                            </div>
                                        </div>
                                        <div class="col-2">
                                            <!-- Button trigger modal -->
                                            <button class="btn text-dark" style="z-index: 999;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- start content -->
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!------- Layanan ------->
    <section id="Layanan">
        <div class="container mt-5 pb-5">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Layanan Terbaik Kami</h5>
            </div>
            <div class="row">

                <div class="col-lg-4 text-center">
                    <div class="card p-3">
                        <svg class="bd-placeholder-img align-self-center rounded-1" width="300" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
                        </svg>
                        <h4 class="mt-3">Heading</h4>
                        <p class="truncate-string-2">Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
                        <p class="mt-3"><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
                    </div>
                </div>

                <div class="col-lg-4 text-center">
                    <div class="card p-3">
                        <svg class="bd-placeholder-img align-self-center rounded-1" width="300" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
                        </svg>
                        <h4 class="mt-3">Heading</h4>
                        <p class="truncate-string-2">Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
                        <p class="mt-3"><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
                    </div>
                </div>

                <div class="col-lg-4 text-center">
                    <div class="card p-3">
                        <svg class="bd-placeholder-img align-self-center rounded-1" width="300" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>Placeholder</title>
                            <rect width="100%" height="100%" fill="#777" /><text x="50%" y="50%" fill="#777" dy=".3em">140x140</text>
                        </svg>
                        <h4 class="mt-3">Heading</h4>
                        <p class="truncate-string-2">Some representative placeholder content for the three columns of text below the carousel. This is the first column.</p>
                        <p class="mt-3"><a class="btn btn-secondary" href="#">View details &raquo;</a></p>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!------- Video ------->
    <div class="container">
        <div class="row mt-3">
            <div class="card" style="background-color: unset;border: unset;">
                <div class="card-header" style="background-color: unset;padding: 0;border: unset;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Video</h5>
                        <a href="" class="text-decoration-none">Lihat Lainnya <i class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
                <div class="card-body" style="padding: 10px 0 0 0;">
                    <div class="row">
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body" style="padding: 1rem 1.5rem 0 1.5rem;">
                                    <div class="js-video [youtube, widescreen]">
                                        <iframe src="https://www.youtube.com/embed/FM7MFYoylVs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- end main content -->
        </div>
    </div>


    <!------- Produk ------->
    <div class="container">
        <div class="row mt-5">
            <div class="card" style="background-color: unset;border: unset;">
                <div class="card-header" style="background-color: unset;padding: 0;border: unset;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Produk Kami</h5>
                        <a href="" class="text-decoration-none">Lihat Lainnya <i class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
                <div class="card-body" style="padding: 10px 0 0 0;">
                    <div class="row">
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body" style="padding: 1rem 1.5rem 0 1.5rem;">
                                    <div class="img-video" style="background: url(https://content.jwplatform.com/v2/media/B0d36KfE/poster.jpg);background-size: cover;background-position: top center;">
                                    </div>
                                    <div class="video-text pt-3">
                                        <h6 class="text-dark truncate-string-2">Pengakuan Pilu Britney Spears Selama 13 Tahun Perwalian: Dipaksa Minum Lithium</h6>
                                        <div class="row justify-content-around pt-2">
                                            <div class="col d-flex">
                                                <div class="sub-item">
                                                    <i class="bi bi-heart"></i>
                                                    <span>0</span>
                                                </div>
                                                <div class="sub-item">
                                                    <i class="bi bi-heart"></i>
                                                    <span>0</span>
                                                </div>
                                                <div class="sub-item">
                                                    <span>50 menit</span>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <!-- Button trigger modal -->
                                                <button class="btn text-dark sub-item" style="z-index: 999;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body" style="padding: 1rem 1.5rem 0 1.5rem;">
                                    <div class="img-video" style="background: url(https://content.jwplatform.com/v2/media/zVmaswGz/poster.jpg);background-size: cover;background-position: top center;">
                                    </div>
                                    <div class="video-text pt-3">
                                        <h6 class="text-dark truncate-string-2">Tolak Vonis 4 Tahun Penjara Kasus RS UMMI, Rizieq Shihab Ajukan Banding</h6>
                                        <div class="row justify-content-around pt-2">
                                            <div class="col d-flex">
                                                <div class="sub-item">
                                                    <i class="bi bi-heart"></i>
                                                    <span>0</span>
                                                </div>
                                                <div class="sub-item">
                                                    <i class="bi bi-heart"></i>
                                                    <span>0</span>
                                                </div>
                                                <div class="sub-item">
                                                    <span>50 menit</span>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <!-- Button trigger modal -->
                                                <button class="btn text-dark sub-item" style="z-index: 999;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body" style="padding: 1rem 1.5rem 0 1.5rem;">
                                    <div class="img-video" style="background: url(https://content.jwplatform.com/v2/media/AFLWUjPK/poster.jpg);background-size: cover;background-position: top center;">
                                    </div>
                                    <div class="video-text pt-3">
                                        <h6 class="text-dark truncate-string-2">Selama PPKM Mikro, Masjid dan Musala di Jakarta Ditutup</h6>
                                        <div class="row justify-content-around pt-2">
                                            <div class="col d-flex">
                                                <div class="sub-item">
                                                    <i class="bi bi-heart"></i>
                                                    <span>0</span>
                                                </div>
                                                <div class="sub-item">
                                                    <i class="bi bi-heart"></i>
                                                    <span>0</span>
                                                </div>
                                                <div class="sub-item">
                                                    <span>50 menit</span>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <!-- Button trigger modal -->
                                                <button class="btn text-dark sub-item" style="z-index: 999;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body" style="padding: 1rem 1.5rem 0 1.5rem;">
                                    <div class="img-video" style="background: url(https://content.jwplatform.com/v2/media/AknIXiCP/poster.jpg);background-size: cover;background-position: top center;">
                                    </div>
                                    <div class="video-text pt-3">
                                        <h6 class="text-dark truncate-string-2">Menag : Salat Idul Adha Ditiadakan di Daerah Zona Merah dan Oranye</h6>
                                        <div class="row justify-content-around pt-2">
                                            <div class="col d-flex">
                                                <div class="sub-item">
                                                    <i class="bi bi-heart"></i>
                                                    <span>0</span>
                                                </div>
                                                <div class="sub-item">
                                                    <i class="bi bi-heart"></i>
                                                    <span>0</span>
                                                </div>
                                                <div class="sub-item">
                                                    <span>50 menit</span>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <!-- Button trigger modal -->
                                                <button class="btn text-dark sub-item" style="z-index: 999;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- end main content -->
        </div>
    </div>


    <!------- Klien Kami ------->
    <div class="container">
        <div class="row mt-5">
            <div class="card" style="background-color: unset;border: unset;">
                <div class="card-header" style="background-color: unset;padding: 0;border: unset;">
                    <div class="d-flex justify-content-between align-items-center">
                        <h5 style="border-left: 5px solid #fe4d01;padding-left: 15px;font-weight: bold;">Klien Kami</h5>
                        <a href="" class="text-decoration-none">Lihat Lainnya <i class="bi bi-chevron-right"></i></a>
                    </div>
                </div>
                <div class="card-body" style="padding: 10px 0 0 0;">
                    <div class="row">
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body" style="padding: 1rem 1.5rem 0 1.5rem;">
                                    <div class="img-video" style="background: url(https://content.jwplatform.com/v2/media/B0d36KfE/poster.jpg);background-size: cover;background-position: top center;">
                                    </div>
                                    <div class="video-text pt-3">
                                        <h6 class="text-dark truncate-string-2">Pengakuan Pilu Britney Spears Selama 13 Tahun Perwalian: Dipaksa Minum Lithium</h6>
                                        <div class="row justify-content-around pt-2">
                                            <div class="col d-flex">
                                                <div class="sub-item">
                                                    <i class="bi bi-heart"></i>
                                                    <span>0</span>
                                                </div>
                                                <div class="sub-item">
                                                    <i class="bi bi-heart"></i>
                                                    <span>0</span>
                                                </div>
                                                <div class="sub-item">
                                                    <span>50 menit</span>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <!-- Button trigger modal -->
                                                <button class="btn text-dark sub-item" style="z-index: 999;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body" style="padding: 1rem 1.5rem 0 1.5rem;">
                                    <div class="img-video" style="background: url(https://content.jwplatform.com/v2/media/zVmaswGz/poster.jpg);background-size: cover;background-position: top center;">
                                    </div>
                                    <div class="video-text pt-3">
                                        <h6 class="text-dark truncate-string-2">Tolak Vonis 4 Tahun Penjara Kasus RS UMMI, Rizieq Shihab Ajukan Banding</h6>
                                        <div class="row justify-content-around pt-2">
                                            <div class="col d-flex">
                                                <div class="sub-item">
                                                    <i class="bi bi-heart"></i>
                                                    <span>0</span>
                                                </div>
                                                <div class="sub-item">
                                                    <i class="bi bi-heart"></i>
                                                    <span>0</span>
                                                </div>
                                                <div class="sub-item">
                                                    <span>50 menit</span>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <!-- Button trigger modal -->
                                                <button class="btn text-dark sub-item" style="z-index: 999;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body" style="padding: 1rem 1.5rem 0 1.5rem;">
                                    <div class="img-video" style="background: url(https://content.jwplatform.com/v2/media/AFLWUjPK/poster.jpg);background-size: cover;background-position: top center;">
                                    </div>
                                    <div class="video-text pt-3">
                                        <h6 class="text-dark truncate-string-2">Selama PPKM Mikro, Masjid dan Musala di Jakarta Ditutup</h6>
                                        <div class="row justify-content-around pt-2">
                                            <div class="col d-flex">
                                                <div class="sub-item">
                                                    <i class="bi bi-heart"></i>
                                                    <span>0</span>
                                                </div>
                                                <div class="sub-item">
                                                    <i class="bi bi-heart"></i>
                                                    <span>0</span>
                                                </div>
                                                <div class="sub-item">
                                                    <span>50 menit</span>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <!-- Button trigger modal -->
                                                <button class="btn text-dark sub-item" style="z-index: 999;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body" style="padding: 1rem 1.5rem 0 1.5rem;">
                                    <div class="img-video" style="background: url(https://content.jwplatform.com/v2/media/AknIXiCP/poster.jpg);background-size: cover;background-position: top center;">
                                    </div>
                                    <div class="video-text pt-3">
                                        <h6 class="text-dark truncate-string-2">Menag : Salat Idul Adha Ditiadakan di Daerah Zona Merah dan Oranye</h6>
                                        <div class="row justify-content-around pt-2">
                                            <div class="col d-flex">
                                                <div class="sub-item">
                                                    <i class="bi bi-heart"></i>
                                                    <span>0</span>
                                                </div>
                                                <div class="sub-item">
                                                    <i class="bi bi-heart"></i>
                                                    <span>0</span>
                                                </div>
                                                <div class="sub-item">
                                                    <span>50 menit</span>
                                                </div>
                                            </div>
                                            <div class="col-2">
                                                <!-- Button trigger modal -->
                                                <button class="btn text-dark sub-item" style="z-index: 999;" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                                    <i class="bi bi-three-dots-vertical"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>

            <!-- end main content -->
        </div>
    </div>



    <!-- footer -->
    <div class="footer mt-5" style="background-color: lightgrey;padding: 20px 30px;">
        <div class="container">
            <div class="d-flex justify-content-between">
                <div class="footer-left float-left align-items-center">
                    <a class="navbar-brand" href="#">
                        <img src="/assets/logo/PTA-logo.png" alt="" width="100">
                    </a>
                    <h6 style="font-size: 12px;margin-top: 15px;">2021 &copy; Sinergi News</h6>
                </div>
                <div class="footer-right" style="width: 450px;">
                    <div class="row">
                        <div class="col-4">
                            <h6 style="font-size: 12px;margin-top: 5px;margin-bottom: 0;"><a href="" style="text-decoration: none;color: black;">Facebook</a></h6>
                            <h6 style="font-size: 12px;margin-top: 5px;margin-bottom: 0;"><a href="" style="text-decoration: none;color: black;">Instagram</a></h6>
                            <h6 style="font-size: 12px;margin-top: 5px;margin-bottom: 0;"><a href="" style="text-decoration: none;color: black;">Twitter</a></h6>
                            <h6 style="font-size: 12px;margin-top: 5px;margin-bottom: 0;"><a href="" style="text-decoration: none;color: black;">Youtube</a></h6>
                            <h6 style="font-size: 12px;margin-top: 5px;margin-bottom: 0;"><a href="" style="text-decoration: none;color: black;">LINE</a></h6>
                        </div>
                        <div class="col-4">
                            <h6 style="font-size: 12px;margin-top: 5px;margin-bottom: 0;"><a href="" style="text-decoration: none;color: black;">Tentang Kumparan</a></h6>
                            <h6 style="font-size: 12px;margin-top: 5px;margin-bottom: 0;"><a href="" style="text-decoration: none;color: black;">Ketentuan & Kebijakan Privasi</a></h6>
                            <h6 style="font-size: 12px;margin-top: 5px;margin-bottom: 0;"><a href="" style="text-decoration: none;color: black;">Panduan Komunitas</a></h6>
                            <h6 style="font-size: 12px;margin-top: 5px;margin-bottom: 0;"><a href="" style="text-decoration: none;color: black;">Pedoman Media Siber</a></h6>
                        </div>
                        <div class="col-4">
                            <h6 style="font-size: 12px;margin-top: 5px;margin-bottom: 0;"><a href="" style="text-decoration: none;color: black;">Bantuan</a></h6>
                            <h6 style="font-size: 12px;margin-top: 5px;margin-bottom: 0;"><a href="" style="text-decoration: none;color: black;">Iklan</a></h6>
                            <h6 style="font-size: 12px;margin-top: 5px;margin-bottom: 0;"><a href="" style="text-decoration: none;color: black;">Karir</a></h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Vertically centered modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>



    <!------- Bootstrap JS ------->
    <script src="assets/public/js/bootstrap.bundle.min.js"></script>
    <script src="assets/public/js/bootstrap.min.js"></script>
    <script src="assets/public/js/bootstrap.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
</body>

</html>