<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Panca Teknologi Aksesindo</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/assets/plugins/fontawesome-free/css/all.min.css">
  <!-- bootstrap 4.6 -->
  <link rel="stylesheet" href="/assets/plugins/bootstrap-4.6.1-dist/css/bootstrap.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/assets/admin/css/adminlte.min.css">

  <!-- daterange picker -->
  <link rel="stylesheet" href="/assets/plugins/daterangepicker/daterangepicker.css">
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Bootstrap Color Picker -->
  <link rel="stylesheet" href="/assets/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css">
  <!-- jquery -->
  <script src="/assets/js/jquery-3.3.1.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!------- Captcha ------->
  <script src='https://www.google.com/recaptcha/api.js' async defer></script>
</head>

<body>

  <!-- Navbar -->
  <!-- <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
    <div class="container">
      <a href="../../index3.html" class="navbar-brand">
        <span class="brand-text font-weight-light">AdminLTE 3</span>
      </a>

      <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse order-3" id="navbarCollapse">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a href="index3.html" class="nav-link">Home</a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">Contact</a>
          </li>
          <li class="nav-item dropdown">
            <a id="dropdownSubMenu1" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="nav-link dropdown-toggle">Dropdown</a>
            <ul aria-labelledby="dropdownSubMenu1" class="dropdown-menu border-0 shadow">
              <li><a href="#" class="dropdown-item">Some action </a></li>
              <li><a href="#" class="dropdown-item">Some other action</a></li>

              <li class="dropdown-divider"></li>

              <li class="dropdown-submenu dropdown-hover">
                <a id="dropdownSubMenu2" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">Hover for action</a>
                <ul aria-labelledby="dropdownSubMenu2" class="dropdown-menu border-0 shadow">
                  <li>
                    <a tabindex="-1" href="#" class="dropdown-item">level 2</a>
                  </li>

                  <li class="dropdown-submenu">
                    <a id="dropdownSubMenu3" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="dropdown-item dropdown-toggle">level 2</a>
                    <ul aria-labelledby="dropdownSubMenu3" class="dropdown-menu border-0 shadow">
                      <li><a href="#" class="dropdown-item">3rd level</a></li>
                      <li><a href="#" class="dropdown-item">3rd level</a></li>
                    </ul>
                  </li>

                  <li><a href="#" class="dropdown-item">level 2</a></li>
                  <li><a href="#" class="dropdown-item">level 2</a></li>
                </ul>
              </li>
            </ul>
          </li>
        </ul>

        <form class="form-inline ml-0 ml-md-3">
          <div class="input-group input-group-sm">
            <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-navbar" type="submit">
                <i class="fas fa-search"></i>
              </button>
            </div>
          </div>
        </form>
      </div>

      <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="fas fa-comments"></i>
            <span class="badge badge-danger navbar-badge">3</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <div class="media">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Brad Diesel
                    <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">Call me whenever you can...</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <div class="media">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    John Pierce
                    <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">I got your message bro</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <div class="media">
                <img src="../../dist/img/user3-128x128.jpg" alt="User Avatar" class="img-size-50 img-circle mr-3">
                <div class="media-body">
                  <h3 class="dropdown-item-title">
                    Nora Silvester
                    <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                  </h3>
                  <p class="text-sm">The subject goes here</p>
                  <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
                </div>
              </div>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" data-toggle="dropdown" href="#">
            <i class="far fa-bell"></i>
            <span class="badge badge-warning navbar-badge">15</span>
          </a>
          <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
            <span class="dropdown-header">15 Notifications</span>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-envelope mr-2"></i> 4 new messages
              <span class="float-right text-muted text-sm">3 mins</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-users mr-2"></i> 8 friend requests
              <span class="float-right text-muted text-sm">12 hours</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item">
              <i class="fas fa-file mr-2"></i> 3 new reports
              <span class="float-right text-muted text-sm">2 days</span>
            </a>
            <div class="dropdown-divider"></div>
            <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
            <i class="fas fa-th-large"></i>
          </a>
        </li>
      </ul>
    </div>
  </nav> -->
  <!-- /.navbar -->


  <div class="row" style="width: 100%;">

    <div class="col-12">

      <?php if (session('id_user') != null) { ?>
        <!------- Ubah Warna ------->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#BackgroundColor" style="position: absolute;top: 1rem;right: 1rem;">
          Change Background Color
        </button>

        <div class="modal fade" id="BackgroundColor" tabindex="-1" aria-labelledby="BackgroundColorLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <form action="/admin/login-template/cms-background/update" method="POST" enctype="multipart/form-data">
                <div class="modal-header">
                  <h5 class="modal-title" id="BackgroundColorLabel">Modal title</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <div class="form-group">
                    <label>Main Background Color :</label>
                    <input type="color" id="favcolor" name="main_cms_background" value="<?= $data_cms_background['main_cms_background'] ?>">
                  </div>
                  <div class="form-group">
                    <label>Card Background Color :</label>
                    <input type="color" id="favcolor" name="card_cms_background" value="<?= $data_cms_background['card_cms_background'] ?>">
                  </div>
                  <div class="form-group">
                    <label>Input Background Color :</label>
                    <input type="color" id="favcolor" name="input_cms_background" value="<?= $data_cms_background['input_cms_background'] ?>">
                  </div>
                  <div class="form-group">
                    <label>Text Color :</label>
                    <input type="color" id="favcolor" name="text_cms_background" value="<?= $data_cms_background['text_cms_background'] ?>">
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      <?php } ?>


    </div>
  </div>

  <!------- Login page ------->
  <div class="login-page" style="background-color: <?= $data_cms_background['main_cms_background'] ?> !important;">
    <div class="login-box">
      <div class="card" style="margin: 2rem 0 2rem 0;">
        <div class="card-body login-card-body" style="background-color: <?= $data_cms_background['card_cms_background'] ?> !important;">
          <div class="login-logo">

            <?php if ($data_media != false) { ?>
              <img src="/assets/media/<?= $data_media['path_media'] ?>" alt="" style="height: 80px;width: auto;display: block;margin: auto;">
            <?php   } ?>

            <a href="/" class="d-block text-center" style="color: <?= $data_cms_background['text_cms_background'] ?> !important;"><?= $data_cms_title != false ? $data_cms_title['cms_title'] : '' ?></a>

            <?php if (session('id_user') != null) { ?>
              <!------- Ubah Logo ------->
              <div class="text-center">
                <button type="button" class="btn btn-sm btn-primary mt-2" data-toggle="modal" data-target="#exampleModal">
                  <i class="fas fa-edit"></i>
                </button>
              </div>

              <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <form method="POST" action="/admin/login-template/cms-title/update" enctype="multipart/form-data">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Logo atau Nama</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                          <label for="exampleFormControlFile1">Logo</label>
                          <input type="file" class="form-control-file" id="exampleFormControlFile1" name="logoPerusahaan">
                        </div>
                        <p>- OR -</p>
                        <div class="form-group">
                          <label for="exampleFormControlInput1">Nama</label>
                          <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="" name="cms_title" value="<?= $data_cms_title['cms_title'] ?>">
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="title-option" id="exampleRadios1" value="1" <?= $data_cms_title == false && $data_media != false ? 'checked' : '' ?>>
                          <label class="form-check-label" for="exampleRadios1">
                            Logo
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="title-option" id="exampleRadios2" value="2" <?= $data_cms_title != false && $data_media == false ? 'checked' : '' ?>>
                          <label class="form-check-label" for="exampleRadios2">
                            Text
                          </label>
                        </div>
                        <div class="form-check">
                          <input class="form-check-input" type="radio" name="title-option" id="exampleRadios3" value="3" <?= $data_cms_title != false && $data_media != false ? 'checked' : '' ?>>
                          <label class="form-check-label" for="exampleRadios3">
                            Logo & Text
                          </label>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            <?php } ?>

          </div>
          <!-- /.login-logo -->
          <p class="login-box-msg" style="color: <?= $data_cms_background['text_cms_background'] ?> !important;">Log In untuk masuk ke pengelolaan konten website</p>


          <form action="admin/login" method="post">
            <div class="input-group mb-3">
              <input type="email" class="form-control" placeholder="Email" name="email" style="background-color: <?= $data_cms_background['input_cms_background'] ?> !important;">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control" placeholder="Password" name="password" style="background-color: <?= $data_cms_background['input_cms_background'] ?> !important;">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>

            <?php if (!empty($errors)) { ?>
              <div class="alert alert-danger">
                <ul>
                  <?php foreach ($errors as $key => $error) { ?>
                    <li><?= $error ?></li>
                  <?php } ?>
                </ul>
              </div>
            <?php } ?>

            <div class="g-recaptcha mb-2" data-sitekey="6Ldif3EdAAAAAG_-wHumRSkNuV8Y2eeLLTYpdoSR"></div>

            <div class="row">
              <div class="col-8">
                <!-- <div class="icheck-primary">
                  <input type="checkbox" id="remember">
                  <label for="remember" style="color: <?= $data_cms_background['text_cms_background'] ?> !important;">
                    Remember Me
                  </label>
                </div> -->
              </div>
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">Masuk</button>
              </div>
              <!-- /.col -->
            </div>
          </form>

          <!-- <div class="social-auth-links text-center mb-3">
            <p style="color: <?= $data_cms_background['text_cms_background'] ?> !important;">- OR -</p>
            <a href="#" class="btn btn-block btn-primary">
              <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
            </a>
            <a href="#" class="btn btn-block btn-danger">
              <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
            </a>
          </div> -->
          <!-- /.social-auth-links -->

          <!-- <p class="mb-1">
            <a type="button" data-toggle="modal" data-target="#forgotPassword" style="color: <?= $data_cms_background['text_cms_background'] ?> !important;">
              Forgot Password
            </a>
          </p> -->
          <!-- <p class="mb-0">
            <a type="button" data-toggle="modal" data-target="#confirmPassword" style="color: <?= $data_cms_background['text_cms_background'] ?> !important;">
              Confirm Password
            </a>
          </p> -->
          <p class="mb-0">
            <a type="button" data-toggle="modal" data-target="#register" style="color: <?= $data_cms_background['text_cms_background'] ?> !important;">
              Registrasi Akun
            </a>
          </p>
          <!-- <p class="mb-0">
            <a type="button" data-toggle="modal" data-target="#settings" style="color: <?= $data_cms_background['text_cms_background'] ?> !important;">
              Settings Template
            </a>
          </p> -->
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
  </div>
  <!-- /.login-box -->

  <!-- Main Footer -->
  <!-- <footer class="main-footer">
    <div class="float-right d-none d-sm-inline">
      Anything you want
    </div>
    <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer> -->




  <!------- Forgot Password ------->
  <div class="modal fade" id="forgotPassword" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="forgotPasswordLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="forgotPasswordLabel">Forgot Password</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="Email">Email address</label>
              <input type="email" class="form-control" id="Email" aria-describedby="emailHelp" name="email_user">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!------- Ubah Password ------->
  <div class="modal fade" id="confirmPassword" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="confirmPasswordLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="confirmPasswordLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <label for="password">New Password</label>
              <input type="password" class="form-control" id="password" aria-describedby="emailHelp" name="new_password">
            </div>
            <div class="form-group">
              <label for="confirmPassword">Confirm Password</label>
              <input type="password" class="form-control" id="confirmPassword" aria-describedby="emailHelp" name="canfirm_password">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>


  <!------- Pengaturan Template ------->
  <div class="modal fade" id="settings" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="settingsLabel" aria-hidden="true">
    <div class="modal-dialog">
      <form action="/cms-setting/update" method="POST">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="settingsLabel">Modal title</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="form-group">
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="header" value="1" name="header_cms_setting">
                <label for="header" class="custom-control-label">Header</label>
              </div>
            </div>
            <div class="form-group">
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="rememberMe" value="1" name="remember_cms_setting">
                <label for="rememberMe" class="custom-control-label">Remember Me</label>
              </div>
            </div>
            <div class="form-group">
              <div class="custom-control custom-checkbox">
                <input class="custom-control-input" type="checkbox" id="footer" value="1" name="footer_cms_setting">
                <label for="footer" class="custom-control-label">Footer</label>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </div>
      </form>
    </div>
  </div>

  <!------- Registrasi ------->
  <div class="modal fade" id="register" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="registerLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <form action="/register/action" method="POST" enctype="multipart/form-data">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="registerLabel">Registarsi Akun</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <div class="row">

              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Nama Depan</label>
                  <input type="text" class="form-control" id="exampleFormControlInput1" name="nama_depan" required>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Nama Belakang</label>
                  <input type="text" class="form-control" id="exampleFormControlInput1" name="nama_belakang" required>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlInput1">No. Handphone/Mobile</label>
                  <input type="text" class="form-control" id="exampleFormControlInput1" name="no_hp" required>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Email address</label>
                  <input type="email" class="form-control" id="exampleFormControlInput1" name="email_user" required>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Tanggal Lahir</label>
                  <input type="date" class="form-control" id="exampleFormControlInput1" name="tgl_lahir" required>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Foto Profile</label>
                  <div class="input-group mb-3">
                    <div class="custom-file">
                      <input type="file" class="custom-file-input" id="inputGroupFile02" name="foto_profil">
                      <label class="custom-file-label" for="inputGroupFile02" aria-describedby="inputGroupFileAddon02">Choose file</label>
                    </div>
                  </div>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Password</label>
                  <input type="password" class="form-control" id="exampleFormControlInput1" name="password" required>
                </div>
              </div>

              <div class="col-md-6">
                <div class="form-group">
                  <label for="exampleFormControlInput1">Ulangi Password</label>
                  <input type="password" class="form-control" id="exampleFormControlInput1" name="password_confirm" required>
                </div>
              </div>

              <div class="col-md-6"></div>
              <div class="col-md-6">
                <div class="g-recaptcha mb-3" data-sitekey="6Ldif3EdAAAAAG_-wHumRSkNuV8Y2eeLLTYpdoSR"></div>
              </div>

            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>

          </div>
      </form>
    </div>
  </div>


  <!-- AdminLTE App -->
  <script src="/assets/dist/js/adminlte.min.js"></script>
  <!-- bootstrap color picker -->
  <script src="/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
  <!-- Select2 -->
  <script src="/assets/plugins/select2/js/select2.full.min.js"></script>
  <!-- Bootstrap4 Duallistbox -->
  <script src="/assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js"></script>
  <!-- InputMask -->
  <script src="/assets/plugins/moment/moment.min.js"></script>
  <script src="/assets/plugins/inputmask/jquery.inputmask.min.js"></script>
  <!-- bootstrap color picker -->
  <script src="/assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js"></script>
  <!-- Tempusdominus Bootstrap 4 -->
  <script src="/assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
  <!-- Bootstrap Switch -->
  <script src="/assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>



  <script>
    $(function() {
      //Initialize Select2 Elements
      $('.select2').select2()

      //Initialize Select2 Elements
      $('.select2bs4').select2({
        theme: 'bootstrap4'
      })

      //Datemask dd/mm/yyyy
      $('#datemask').inputmask('dd/mm/yyyy', {
        'placeholder': 'dd/mm/yyyy'
      })
      //Datemask2 mm/dd/yyyy
      $('#datemask2').inputmask('mm/dd/yyyy', {
        'placeholder': 'mm/dd/yyyy'
      })
      //Money Euro
      $('[data-mask]').inputmask()

      //Date picker
      $('#reservationdate').datetimepicker({
        format: 'L'
      });

      //Date and time picker
      $('#reservationdatetime').datetimepicker({
        icons: {
          time: 'far fa-clock'
        }
      });

      //Date range picker
      $('#reservation').daterangepicker()
      //Date range picker with time picker
      $('#reservationtime').daterangepicker({
        timePicker: true,
        timePickerIncrement: 30,
        locale: {
          format: 'MM/DD/YYYY hh:mm A'
        }
      })
      //Date range as a button
      $('#daterange-btn').daterangepicker({
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function(start, end) {
          $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
        }
      )

      //Timepicker
      $('#timepicker').datetimepicker({
        format: 'LT'
      })

      //Bootstrap Duallistbox
      $('.duallistbox').bootstrapDualListbox()

      //Colorpicker
      $('.my-colorpicker1').colorpicker()
      //color picker with addon
      $('.my-colorpicker2').colorpicker()

      $('.my-colorpicker2').on('colorpickerChange', function(event) {
        $('.my-colorpicker2 .fa-square').css('color', event.color.toString());
      })

      $("input[data-bootstrap-switch]").each(function() {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
      })

    })
    // BS-Stepper Init
    document.addEventListener('DOMContentLoaded', function() {
      window.stepper = new Stepper(document.querySelector('.bs-stepper'))
    })

    // DropzoneJS Demo Code Start
    Dropzone.autoDiscover = false

    // Get the template HTML and remove it from the doumenthe template HTML and remove it from the doument
    var previewNode = document.querySelector("#template")
    previewNode.id = ""
    var previewTemplate = previewNode.parentNode.innerHTML
    previewNode.parentNode.removeChild(previewNode)

    var myDropzone = new Dropzone(document.body, { // Make the whole body a dropzone
      url: "/target-url", // Set the url
      thumbnailWidth: 80,
      thumbnailHeight: 80,
      parallelUploads: 20,
      previewTemplate: previewTemplate,
      autoQueue: false, // Make sure the files aren't queued until manually added
      previewsContainer: "#previews", // Define the container to display the previews
      clickable: ".fileinput-button" // Define the element that should be used as click trigger to select files.
    })

    myDropzone.on("addedfile", function(file) {
      // Hookup the start button
      file.previewElement.querySelector(".start").onclick = function() {
        myDropzone.enqueueFile(file)
      }
    })

    // Update the total progress bar
    myDropzone.on("totaluploadprogress", function(progress) {
      document.querySelector("#total-progress .progress-bar").style.width = progress + "%"
    })

    myDropzone.on("sending", function(file) {
      // Show the total progress bar when upload starts
      document.querySelector("#total-progress").style.opacity = "1"
      // And disable the start button
      file.previewElement.querySelector(".start").setAttribute("disabled", "disabled")
    })

    // Hide the total progress bar when nothing's uploading anymore
    myDropzone.on("queuecomplete", function(progress) {
      document.querySelector("#total-progress").style.opacity = "0"
    })

    // Setup the buttons for all transfers
    // The "add files" button doesn't need to be setup because the config
    // `clickable` has already been specified.
    document.querySelector("#actions .start").onclick = function() {
      myDropzone.enqueueFiles(myDropzone.getFilesWithStatus(Dropzone.ADDED))
    }
    document.querySelector("#actions .cancel").onclick = function() {
      myDropzone.removeAllFiles(true)
    }
    // DropzoneJS Demo Code End
  </script>
</body>

</html>