<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="/assets/logo/tmk-white.png" alt="PT. Tristek Media Kreassindo" class="brand-image"><br>
        <span class="brand-text font-weight-light d-none" style="font-size: 14px;">a</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
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

                <li class="nav-header">Data User</li>

                <?php if ($GLOBALS['id_role'] == '61c3ea5e19998') { ?>
                    <li class="nav-item">
                        <a href="#" class="nav-link <?= strpos($GLOBALS['url'], 'user') != false ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Kelola Data User
                            </p>
                        </a>
                    </li>
                <?php } ?>

                <li class="nav-header">Data Pelamar</li>

                <?php if ($GLOBALS['id_role'] == '61c3ea5e19998') { ?>
                    <li class="nav-item">
                        <a href="/admin/pelamar" class="nav-link <?= strpos($GLOBALS['url'], 'pelamar') != false ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Kelola Data Pelamar
                            </p>
                        </a>
                    </li>
                <?php } ?>

                <li class="nav-header">Data Karyawan</li>
                <?php if ($GLOBALS['id_role'] == '61c3ea5e19998') { ?>
                    <li class="nav-item">
                        <a href="#" class="nav-link <?= $GLOBALS['url'] == '/admin/karyawan' || $GLOBALS['url'] == '/admin/jabatan'  ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Kelola Karyawan
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
                        </ul>
                    </li>
                <?php } ?>

                <?php if ($GLOBALS['id_role'] == '61c3ea5e19998') { ?>
                    <li class="nav-item">
                        <a href="#" class="nav-link <?= strpos($GLOBALS['url'], 'data-karyawan') != false ? 'active' : '' ?>">
                            <i class="nav-icon fas fa-users"></i>
                            <p>
                                Data Karyawan
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
                                <a href="/admin/data-karyawan/tidak-tetap" class="nav-link" style="padding-left: 43px;">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Karyawan Tidak Tetap</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/data-karyawan/resign" class="nav-link" style="padding-left: 43px;">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Karyawan Resign</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                <?php } ?>

                <li class="nav-header">Developer</li>

                <?php if ($GLOBALS['id_role'] == '61c3ea5e19998') { ?>
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
                <?php } ?>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>