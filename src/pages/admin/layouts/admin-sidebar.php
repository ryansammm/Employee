<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/" class="brand-link">
        <img src="/assets/logo/PTA.png" alt="Balai Besar Keramik" class="brand-image">
        <span class="brand-text font-weight-light" style="font-size: 14px;">PT. Panca Teknologi Aksesindo</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="/admin/profil" class="nav-link <?= $GLOBALS['url'] == '/admin/profil' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-id-card"></i>
                        <p>
                            Kelola Profil Perusahaan
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link <?= strpos($GLOBALS['url'], 'berita') != false ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-newspaper"></i>
                        <p>
                            Berita
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/berita" class="nav-link" style="padding-left: 43px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kelola Berita</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/kategori-berita" class="nav-link" style="padding-left: 43px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kelola Kategori</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/komentar-berita" class="nav-link" style="padding-left: 43px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kelola Komentar</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link <?= strpos($GLOBALS['url'], 'produk') != false ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-box"></i>
                        <p>
                            Produk Kami
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/produk" class="nav-link" style="padding-left: 43px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kelola Produk</p>
                            </a>
                        </li>
                        <li class="nav-item has-treeview">
                            <a href="#" class="nav-link" style="padding-left: 43px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kelola Kategori <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item" style="padding-left: 55px;">
                                    <a href="/admin/kategori-produk/konten" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Kelola Konten</p>
                                    </a>
                                </li>
                                <li class="nav-item" style="padding-left: 55px;">
                                    <a href="/admin/kategori-produk/style" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Kelola Tampilan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link <?= strpos($GLOBALS['url'], 'layanan') != false ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Layanan Kami
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/layanan" class="nav-link" style="padding-left: 43px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kelola Layanan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" style="padding-left: 43px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kelola Kategori <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item" style="padding-left: 55px;">
                                    <a href="/admin/kategori-layanan/konten" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Kelola Konten</p>
                                    </a>
                                </li>
                                <li class="nav-item" style="padding-left: 55px;">
                                    <a href="/admin/kategori-layanan/style" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Kelola Tampilan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/admin/galeri" class="nav-link <?= strpos($GLOBALS['url'], 'galeri') != false ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-image"></i>
                        <p>
                            Jejak Kami
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/galeri" class="nav-link" style="padding-left: 43px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kelola Jejak Kami</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="#" class="nav-link" style="padding-left: 43px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kelola Kategori <i class="right fas fa-angle-left"></i></p>
                            </a>
                            <ul class="nav nav-treeview" style="display: none;">
                                <li class="nav-item" style="padding-left: 55px;">
                                    <a href="/admin/kategori-galeri/konten" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Kelola Konten</p>
                                    </a>
                                </li>
                                <li class="nav-item" style="padding-left: 55px;">
                                    <a href="/admin/kategori-galeri/style" class="nav-link">
                                        <i class="far fa-dot-circle nav-icon"></i>
                                        <p>Kelola Tampilan</p>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="/admin/video" class="nav-link <?= strpos($GLOBALS['url'], 'video') != false ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-video"></i>
                        <p>
                            Kelola Video
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/banner" class="nav-link <?= strpos($GLOBALS['url'], 'banner') != false ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-file-image"></i>
                        <p>
                            Kelola Banner
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/pelanggan" class="nav-link <?= strpos($GLOBALS['url'], 'pelanggan') != false ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Kelola Klien
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/akreditasi" class="nav-link <?= strpos($GLOBALS['url'], 'akreditasi') != false ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-award"></i>
                        <p>
                            Kelola Akreditasi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/asosiasi" class="nav-link <?= strpos($GLOBALS['url'], 'asosiasi') != false ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-handshake"></i>
                        <p>
                            Kelola Asosiasi
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/kontak" class="nav-link <?= strpos($GLOBALS['url'], 'kontak') != false ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Kelola Kontak
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/sosial-media" class="nav-link <?= strpos($GLOBALS['url'], 'sosial-media') != false ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-thumbs-up"></i>
                        <p>
                            Kelola Sosial Media
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/pengguna" class="nav-link <?= strpos($GLOBALS['url'], 'pengguna') != false ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Kelola Pengguna
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="/admin/roles" class="nav-link <?= strpos($GLOBALS['url'], 'roles') != false ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-users-cog"></i>
                        <p>
                            Kelola Role
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
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
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>
                            Kelola Profile Tim
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/profile-team" class="nav-link" style="padding-left: 43px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kelola Profile</p>
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

                <li class="nav-header">Developer</li>

                <li class="nav-item">
                    <a href="/admin/menu" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Kelola Menu Website
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Kelola Halaman
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/component" class="nav-link" style="padding-left: 43px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kelola Komponen</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/halaman" class="nav-link" style="padding-left: 43px;">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kelola Halaman</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <!-- <li class="nav-item">
                    <a href="/admin/profile-saya" class="nav-link <?= $GLOBALS['url'] == '/admin/profile-saya' ? 'active' : '' ?>">
                        <i class="nav-icon fas fa-user-cog"></i>
                        <p>
                            Profile Saya
                        </p>
                    </a>
                </li> -->


                <?php if ($GLOBALS['nama_user'] == 'Developer') { ?>
                    <li class="nav-header">Developer</li>

                    <li class="nav-item">
                        <a href="/admin/menu" class="nav-link">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>
                                Kelola Menu Website
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>
                                Kelola Halaman
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="/admin/component" class="nav-link" style="padding-left: 43px;">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kelola Komponen</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="/admin/halaman" class="nav-link" style="padding-left: 43px;">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Kelola Halaman</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/login-template" class="nav-link">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>
                                Ubah Template Log In
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="/admin/setting-website" class="nav-link">
                            <i class="nav-icon fas fa-cogs"></i>
                            <p>
                                Pengaturan Website
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