<style>
    @media (min-width: 992px) {
        .brand-image {
            margin-left: 0px;
        }
    }

    .nav-item .active,
    .nav-link {
        width: 100% !important;
        border-radius: 0px;
    }

    hr {
        background-color: #cecece;
        padding-top: 0rem;
        width: 96%;
        margin-top: 5px;
        margin-bottom: 5px;
    }

    .nav-icon {
        margin-right: 0.5rem !important;
    }

    .nav-sidebar>.nav-item .nav-icon.fa,
    .nav-sidebar>.nav-item .nav-icon.fab,
    .nav-sidebar>.nav-item .nav-icon.fad,
    .nav-sidebar>.nav-item .nav-icon.fal,
    .nav-sidebar>.nav-item .nav-icon.far,
    .nav-sidebar>.nav-item .nav-icon.fas,
    .nav-sidebar>.nav-item .nav-icon.ion,
    .nav-sidebar>.nav-item .nav-icon.svg-inline--fa {
        font-size: 1rem;
    }

    .menu-icon {
        height: 17px;
        width: 17px;
        margin-left: 4px;
        margin-right: 14px !important;
        filter: invert(99%) sepia(2%) saturate(2370%) hue-rotate(297deg) brightness(113%) contrast(81%);
    }
</style>

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="/assets/logo/tmk-white.png" alt="PT. Tristek Media Kreassindo" class="brand-image"><br>
        <span class="brand-text font-weight-light d-none" style="font-size: 14px;">a</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar px-0">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

                <!-- <li class="nav-item">
                    <a href="/admin/profile-saya" class="nav-link <?= $GLOBALS['url'] == '/admin/profile-saya' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>
                            Profile Saya
                        </p>
                    </a>
                </li> -->

                <!-- <?php if ($GLOBALS['id_role'] == '61c3ea5e19998') { ?>
                    <li class="nav-header">Developer</li>
                <?php } else if ($GLOBALS['id_role'] == '61c304b03104d') { ?>
                    <li class="nav-header">User</li>
                <?php } else if ($GLOBALS['id_role'] == '61c302ba75028') { ?>
                    <li class="nav-header">Editor</li>
                <?php } else if ($GLOBALS['id_role'] == '61c3ebd49785e') { ?>
                    <li class="nav-header">Administrator</li>
                <?php } ?> -->


                <?php if ($GLOBALS['id_role'] == '61c3ea5e19998') { ?>
                    <li class="nav-item">
                        <a href="/admin/dashboard" class="nav-link <?= strpos($GLOBALS['url'], 'dashboard') != false ? 'active' : '' ?>">
                            <!-- <i class="nav-icon fas fa-users"></i> -->
                            <img src="/assets/logo/icon-tmk.svg" class="menu-icon" alt="">
                            <p>
                                Dashboard
                            </p>
                        </a>
                    </li>
                <?php } ?>

                <!-- <hr> -->

                <?php if ($GLOBALS['id_role'] == '61c3ea5e19998') { ?>
                    <li class="nav-item">
                        <a href="#" class="nav-link <?= $GLOBALS['url'] == '/admin/karyawan' || $GLOBALS['url'] == '/admin/jabatan'  ? 'active' : '' ?>">
                            <i class="nav-icon fa fa-users" aria-hidden="true"></i>
                            <p>
                                Data Karyawan Aktif
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/karyawan" class="nav-link" style="padding-left: 43px;">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kelola Karyawan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/jabatan" class="nav-link" style="padding-left: 43px;">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kelola Jabatan</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/divisi" class="nav-link" style="padding-left: 43px;">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kelola Divisi</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/bidang" class="nav-link" style="padding-left: 43px;">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kelola Bidang</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>

                <?php if ($GLOBALS['id_role'] == '61c3ea5e19998') { ?>
                    <li class="nav-item">
                        <a href="#" class="nav-link <?= strpos($GLOBALS['url'], 'data-karyawan') != false ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-user-cog"></i>
                            <p>
                                Kelola Data Karyawan
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/data-karyawan/tetap" class="nav-link" style="padding-left: 43px;">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Karyawan Tetap</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/data-karyawan/kontrak" class="nav-link" style="padding-left: 43px;">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Karyawan Kontrak</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/" class="nav-link" style="padding-left: 43px;">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Karyawan Tidak Tetap</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                <?php } ?>

                <?php if ($GLOBALS['id_role'] == '61c3ea5e19998') { ?>
                    <li class="nav-item">
                        <a href="/admin/data-karyawan/resign" class="nav-link <?= strpos($GLOBALS['url'], 'resign') != false ? 'active' : '' ?>">
                            <i class="nav-icon fa fa-user-times" aria-hidden="true"></i>
                            <p>
                                Data Karyawan Resign
                            </p>
                        </a>
                    </li>
                <?php } ?>

                <?php if ($GLOBALS['id_role'] == '61c3ea5e19998') { ?>
                    <li class="nav-item">
                        <a href="/admin/pelamar" class="nav-link <?= strpos($GLOBALS['url'], 'pelamar') != false ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-user-plus"></i>
                            <p>
                                Data Pelamar Kerja
                            </p>
                        </a>
                    </li>
                <?php } ?>


                <hr>


                <?php if ($GLOBALS['id_role'] == '61c3ea5e19998') { ?>
                    <li class="nav-item">
                        <a href="/admin/inventaris" class="nav-link <?= strpos($GLOBALS['url'], 'inventaris') != false ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-dolly-flatbed"></i>
                            <p>
                                Data Inventaris
                            </p>
                        </a>
                    </li>
                <?php } ?>

                <?php if ($GLOBALS['id_role'] == '61c3ea5e19998') { ?>
                    <li class="nav-item">
                        <a href="/admin/stock" class="nav-link <?= strpos($GLOBALS['url'], 'stock') != false ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-boxes"></i>
                            <p>
                                Data Stockis
                            </p>
                        </a>
                    </li>
                <?php } ?>

                <?php if ($GLOBALS['id_role'] == '61c3ea5e19998') { ?>
                    <li class="nav-item">
                        <a href="#" class="nav-link <?= strpos($GLOBALS['url'], 'absen') != false ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-fingerprint"></i>
                            <p>
                                Data Absen Karyawan
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/data-karyawan/tetap" class="nav-link" style="padding-left: 43px;">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Cuti</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/data-karyawan/kontrak" class="nav-link" style="padding-left: 43px;">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Izin</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/" class="nav-link" style="padding-left: 43px;">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Lemburan</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                <?php } ?>

                <?php if ($GLOBALS['id_role'] == '61c3ea5e19998') { ?>
                    <li class="nav-item">
                        <a href="/admin/asset" class="nav-link <?= strpos($GLOBALS['url'], 'asset') != false ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-cubes"></i>
                            <p>
                                Data Asset
                            </p>
                        </a>
                    </li>
                <?php } ?>

                <?php if ($GLOBALS['id_role'] == '61c3ea5e19998') { ?>
                    <li class="nav-item">
                        <a href="/admin/slip-gaji" class="nav-link <?= strpos($GLOBALS['url'], 'slip-gaji') != false ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-file-invoice-dollar"></i>
                            <p>
                                Slip Gaji
                            </p>
                        </a>
                    </li>
                <?php } ?>

                <?php if ($GLOBALS['id_role'] == '61c3ea5e19998') { ?>
                    <li class="nav-item">
                        <a href="#" class="nav-link <?= strpos($GLOBALS['url'], 'data-login') != false ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-sign-in-alt"></i>
                            <p>
                                Data Login
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/data-karyawan/tetap" class="nav-link" style="padding-left: 43px;">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Email</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/data-karyawan/kontrak" class="nav-link" style="padding-left: 43px;">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Data Aplikasi Karyawan</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>

                <hr>

                <?php if ($GLOBALS['id_role'] == '61c3ea5e19998') { ?>
                    <li class="nav-item">
                        <a href="/admin/profile-manager" class="nav-link <?= strpos($GLOBALS['url'], 'profile-manager') != false ? 'active' : '' ?>">
                            <i class="nav-icon fa fa-cogs" aria-hidden="true"></i>
                            <p>
                                Profile Manager
                            </p>
                        </a>
                    </li>
                <?php } ?>

                <?php if ($GLOBALS['id_role'] == '61c3ea5e19998') { ?>
                    <li class="nav-item">
                        <a href="/admin/logout" class="nav-link <?= strpos($GLOBALS['url'], 'logout') != false ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-sign-out-alt" style="transform: scaleX(-1);"></i>
                            <p>
                                Log Out
                            </p>
                        </a>
                    </li>
                <?php } ?>

                <!-- <?php if ($GLOBALS['id_role'] == '61c3ea5e19998') { ?>
                    <li class="nav-item">
                        <a href="/admin/pengguna" class="nav-link <?= strpos($GLOBALS['url'], 'pengguna') != false ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-users-cog"></i>
                            <p>
                                Kelola Pengguna
                            </p>
                        </a>
                    </li>
                <?php } ?>

                <?php if ($GLOBALS['id_role'] == '61c3ea5e19998') { ?>
                    <li class="nav-item">
                        <a href="/admin/roles" class="nav-link <?= strpos($GLOBALS['url'], 'roles') != false ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-users-cog"></i>
                            <p>
                                Kelola Role
                            </p>
                        </a>
                    </li>
                <?php } ?> -->

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>