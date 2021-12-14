<?php

use App\About\Controller\AboutController;
use App\Akreditasi\Controller\AkreditasiController;
use App\Asosiasi\Controller\AsosiasiController;
use App\Banner\Controller\BannerController;
use App\Berita\Controller\BeritaController;
use App\BeritaAdmin\Controller\BeritaAdminController;
use App\CmsBackground\Controller\CmsBackgroundController;
use App\CmsComponent\Controller\CmsComponentController;
use App\CmsFonts\Controller\CmsFontsController;
use App\CmsHalaman\Controller\CmsHalamanController;
use App\CmsKategoriGaleri\Controller\CmsKategoriGaleriController;
use App\CmsKategoriLayanan\Controller\CmsKategoriLayananController;
use App\CmsKategoriProduk\Controller\CmsKategoriProdukController;
use App\CmsSetting\Controller\CmsSettingController;
use App\CmsTitle\Controller\CmsTitleController;
use App\Contact\Controller\ContactController;
use App\Customer\Controller\CustomerController;
use App\Galeri\Controller\GaleriController;
use App\GaleriAdmin\Controller\GaleriAdminController;
use App\GroupGaleri\Controller\GroupGaleriController;
use App\Halaman\Controller\HalamanController;
use App\Home\Controller\HomeController;
use App\KategoriBeritaAdmin\Controller\KategoriBeritaAdminController;
use App\KategoriGaleriAdmin\Controller\KategoriGaleriAdminController;
use App\KategoriLayananAdmin\Controller\KategoriLayananAdminController;
use App\KategoriProdukAdmin\Controller\KategoriProdukAdminController;
use App\Ketentuan\Controller\KetentuanController;
use App\Kontak\Controller\KontakController;
use App\Layanan\Controller\LayananController;
use App\LayananAdmin\Controller\LayananAdminController;
use App\LikeBerita\Controller\LikeBeritaController;
use App\Login\Controller\LoginController;
use App\Maintenance\Controller\MaintenanceController;
use App\Menu\Controller\MenuController;
use App\Panduan\Controller\PanduanController;
use App\Pedoman\Controller\PedomanController;
use App\PelangganAdmin\Controller\PelangganAdminController;
use App\Produk\Controller\ProdukController;
use App\ProdukAdmin\Controller\ProdukAdminController;
use App\ProfilAdmin\Controller\ProfilAdminController;
use App\Profile\Controller\ProfileController;
use App\Search\Controller\SearchController;
use App\SosialMedia\Controller\SosialMediaController;
use App\SubMenu\Controller\SubMenuController;
use App\Users\Controller\UsersController;
use App\VideoAdmin\Controller\VideoAdminController;
use Core\RouteCollection;

$routes = new RouteCollection();

/* -------------------------------------------------------------------------- */
/*                        Route Application Start Here                        */
/* -------------------------------------------------------------------------- */

/* ------------------------------- Route Login ------------------------------ */
$routes->push('admin_login', '/admin', [LoginController::class, 'index']);
$routes->push('admin_login_action', '/admin/login', [LoginController::class, 'login']);
/* -------------------------------------------------------------------------- */

/* -------------------------------- Register -------------------------------- */
$routes->push('register', '/register', [RegisterController::class, 'index']);
$routes->push('registerAction', '/register/action', [RegisterController::class, 'register']);


$routes->prefix('admin', function ($routes) {
    /* ---------------------------- Logout --------------------------- */
    $routes->push('logout', '/logout', [LoginController::class, 'logout']);

    /* --------------------------- Route Kelola Berita -------------------------- */
    $routes->prefix('berita', function ($routes) {
        $routes->push('berita', '', [BeritaAdminController::class, 'index']);
        $routes->push('berita_create', '/create', [BeritaAdminController::class, 'create']);
        $routes->push('berita_store', '/store', [BeritaAdminController::class, 'store']);
        $routes->push('berita_edit', '/{id}/edit', [BeritaAdminController::class, 'edit']);
        $routes->push('berita_update', '/{id}/update', [BeritaAdminController::class, 'update']);
        $routes->push('berita_delete', '/{id}/delete', [BeritaAdminController::class, 'delete']);
    });
    /* -------------------------------------------------------------------------- */

    /* --------------------------- Route Kelola Kategori Berita -------------------------- */
    $routes->prefix('kategori-berita', function ($routes) {
        $routes->push('kategori_berita', '', [KategoriBeritaAdminController::class, 'index']);
        $routes->push('kategori_berita_create', '/create', [KategoriBeritaAdminController::class, 'create']);
        $routes->push('kategori_berita_store', '/store', [KategoriBeritaAdminController::class, 'store']);
        $routes->push('kategori_berita_edit', '/{id}/edit', [KategoriBeritaAdminController::class, 'edit']);
        $routes->push('kategori_berita_update', '/{id}/update', [KategoriBeritaAdminController::class, 'update']);
        $routes->push('kategori_berita_delete', '/{id}/delete', [KategoriBeritaAdminController::class, 'delete']);
    });
    /* -------------------------------------------------------------------------- */

    /* --------------------------- Route Kelola Produk -------------------------- */
    $routes->prefix('produk', function ($routes) {
        $routes->push('produk', '', [ProdukAdminController::class, 'index']);
        $routes->push('produk_create', '/create', [ProdukAdminController::class, 'create']);
        $routes->push('produk_store', '/store', [ProdukAdminController::class, 'store']);
        $routes->push('produk_edit', '/{id}/edit', [ProdukAdminController::class, 'edit']);
        $routes->push('produk_update', '/{id}/update', [ProdukAdminController::class, 'update']);
        $routes->push('produk_show', '/{id}/show', [ProdukAdminController::class, 'show']);
        $routes->push('produk_delete', '/{id}/delete', [ProdukAdminController::class, 'delete']);
    });
    /* -------------------------------------------------------------------------- */

    /* ---------------------- Route Kelola Kategori Produk ---------------------- */
    $routes->prefix('kategori-produk', function ($routes) {
        $routes->prefix('konten', function ($routes) {
            $routes->push('kategori_produk', '', [KategoriProdukAdminController::class, 'index']);
            $routes->push('kategori_produk_create', '/create', [KategoriProdukAdminController::class, 'create']);
            $routes->push('kategori_produk_store', '/store', [KategoriProdukAdminController::class, 'store']);
            $routes->push('kategori_produk_edit', '/{id}/edit', [KategoriProdukAdminController::class, 'edit']);
            $routes->push('kategori_produk_update', '/{id}/update', [KategoriProdukAdminController::class, 'update']);
            $routes->push('kategori_produk_show', '/{id}/show', [KategoriProdukAdminController::class, 'show']);
            $routes->push('kategori_produk_delete', '/{id}/delete', [KategoriProdukAdminController::class, 'delete']);
        });
        $routes->prefix('style', function ($routes) {
            $routes->push('kategori_produk_style', '', [CmsKategoriProdukController::class, 'edit']);
            $routes->push('kategori_produk_style_update', '/update', [CmsKategoriProdukController::class, 'update']);
        });
    });
    /* -------------------------------------------------------------------------- */

    /* -------------------------- Route Kelola Layanan -------------------------- */
    $routes->prefix('layanan', function ($routes) {
        $routes->push('layanan', '', [LayananAdminController::class, 'index']);
        $routes->push('layanan_create', '/create', [LayananAdminController::class, 'create']);
        $routes->push('layanan_store', '/store', [LayananAdminController::class, 'store']);
        $routes->push('layanan_edit', '/{id}/edit', [LayananAdminController::class, 'edit']);
        $routes->push('layanan_update', '/{id}/update', [LayananAdminController::class, 'update']);
        $routes->push('layanan_show', '/{id}/show', [LayananAdminController::class, 'show']);
        $routes->push('layanan_delete', '/{id}/delete', [LayananAdminController::class, 'delete']);
    });
    /* -------------------------------------------------------------------------- */

    /* -------------------------- Route Kelola Kategori Layanan -------------------------- */
    $routes->prefix('kategori-layanan', function ($routes) {
        $routes->prefix('konten', function ($routes) {
            $routes->push('kategori_layanan', '', [KategoriLayananAdminController::class, 'index']);
            $routes->push('kategori_layanan_create', '/create', [KategoriLayananAdminController::class, 'create']);
            $routes->push('kategori_layanan_store', '/store', [KategoriLayananAdminController::class, 'store']);
            $routes->push('kategori_layanan_edit', '/{id}/edit', [KategoriLayananAdminController::class, 'edit']);
            $routes->push('kategori_layanan_update', '/{id}/update', [KategoriLayananAdminController::class, 'update']);
            $routes->push('kategori_layanan_show', '/{id}/show', [KategoriLayananAdminController::class, 'show']);
            $routes->push('kategori_layanan_delete', '/{id}/delete', [KategoriLayananAdminController::class, 'delete']);
        });
        $routes->prefix('style', function ($routes) {
            $routes->push('kategori_layanan_style', '', [CmsKategoriLayananController::class, 'edit']);
            $routes->push('kategori_layanan_style_update', '/update', [CmsKategoriLayananController::class, 'update']);
        });
    });
    /* -------------------------------------------------------------------------- */

    /* -------------------------- Route Kelola Galeri -------------------------- */
    $routes->prefix('galeri', function ($routes) {
        $routes->push('galeri', '', [GaleriAdminController::class, 'index']);
        $routes->push('galeri_create', '/create', [GaleriAdminController::class, 'create']);
        $routes->push('galeri_store', '/store', [GaleriAdminController::class, 'store']);
        $routes->push('galeri_edit', '/{id}/edit', [GaleriAdminController::class, 'edit']);
        $routes->push('galeri_update', '/{id}/update', [GaleriAdminController::class, 'update']);
        $routes->push('galeri_show', '/{id}/show', [GaleriAdminController::class, 'show']);
        $routes->push('galeri_delete', '/{id}/delete', [GaleriAdminController::class, 'delete']);
    });
    /* -------------------------------------------------------------------------- */

    /* -------------------------- Route Album Galeri -------------------------- */
    $routes->prefix('album-galeri', function ($routes) {
        $routes->push('album_galeri', '', [GroupGaleriController::class, 'index']);
        $routes->push('album_galeri_create', '/create', [GroupGaleriController::class, 'create']);
        $routes->push('album_galeri_store', '/store', [GroupGaleriController::class, 'store']);
        $routes->push('album_galeri_edit', '/{id}/edit', [GroupGaleriController::class, 'edit']);
        $routes->push('album_galeri_update', '/{id}/update', [GroupGaleriController::class, 'update']);
        $routes->push('album_galeri_show', '/{id}/show', [GroupGaleriController::class, 'show']);
        $routes->push('album_galeri_delete', '/{id}/delete', [GroupGaleriController::class, 'delete']);
    });
    /* -------------------------------------------------------------------------- */

    /* --------------------------- Route Kelola Video --------------------------- */
    $routes->prefix('video', function ($routes) {
        $routes->push('video', '', [VideoAdminController::class, 'index']);
        $routes->push('video_create', '/create', [VideoAdminController::class, 'create']);
        $routes->push('video_store', '/store', [VideoAdminController::class, 'store']);
        $routes->push('video_edit', '/{id}/edit', [VideoAdminController::class, 'edit']);
        $routes->push('video_update', '/{id}/update', [VideoAdminController::class, 'update']);
        $routes->push('video_show', '/{id}/show', [VideoAdminController::class, 'show']);
        $routes->push('video_delete', '/{id}/delete', [VideoAdminController::class, 'delete']);
    });
    /* -------------------------------------------------------------------------- */

    /* ---------------------- Route Kelola Kategori Galeri --------------------- */
    $routes->prefix('kategori-galeri', function ($routes) {
        $routes->prefix('konten', function ($routes) {
            $routes->push('kategori_galeri', '', [KategoriGaleriAdminController::class, 'index']);
            $routes->push('kategori_galeri_create', '/create', [KategoriGaleriAdminController::class, 'create']);
            $routes->push('kategori_galeri_store', '/store', [KategoriGaleriAdminController::class, 'store']);
            $routes->push('kategori_galeri_edit', '/{id}/edit', [KategoriGaleriAdminController::class, 'edit']);
            $routes->push('kategori_galeri_update', '/{id}/update', [KategoriGaleriAdminController::class, 'update']);
            $routes->push('kategori_galeri_show', '/{id}/show', [KategoriGaleriAdminController::class, 'show']);
            $routes->push('kategori_galeri_delete', '/{id}/delete', [KategoriGaleriAdminController::class, 'delete']);
        });
        $routes->prefix('style', function ($routes) {
            $routes->push('kategori_galeri_style', '', [CmsKategoriGaleriController::class, 'edit']);
            $routes->push('kategori_galeri_style_update', '/update', [CmsKategoriGaleriController::class, 'update']);
        });
    });
    /* -------------------------------------------------------------------------- */

    /* ---------------------- Route Kelola CMS Fonts --------------------- */
    $routes->prefix('fonts', function ($routes) {
        $routes->push('fonts', '', [CmsFontsController::class, 'index']);
        $routes->push('fonts_create', '/create', [CmsFontsController::class, 'create']);
        $routes->push('fonts_store', '/store', [CmsFontsController::class, 'store']);
        $routes->push('fonts_edit', '/{id}/edit', [CmsFontsController::class, 'edit']);
        $routes->push('fonts_update', '/{id}/update', [CmsFontsController::class, 'update']);
        $routes->push('fonts_show', '/{id}/show', [CmsFontsController::class, 'show']);
        $routes->push('fonts_delete', '/{id}/delete', [CmsFontsController::class, 'delete']);
    });

    /* ------------------------- Route Kelola Pelanggan ------------------------- */
    $routes->prefix('pelanggan', function ($routes) {
        $routes->push('pelanggan', '', [PelangganAdminController::class, 'index']);
        $routes->push('pelanggan_create', '/create', [PelangganAdminController::class, 'create']);
        $routes->push('pelanggan_store', '/store', [PelangganAdminController::class, 'store']);
        $routes->push('pelanggan_edit', '/{id}/edit', [PelangganAdminController::class, 'edit']);
        $routes->push('pelanggan_update', '/{id}/update', [PelangganAdminController::class, 'update']);
        $routes->push('pelanggan_show', '/{id}/show', [PelangganAdminController::class, 'show']);
        $routes->push('pelanggan_delete', '/{id}/delete', [PelangganAdminController::class, 'delete']);
    });
    /* -------------------------------------------------------------------------- */

    /* --------------------------- Route Kelola Profil -------------------------- */
    $routes->prefix('profil', function ($routes) {
        $routes->push('profil', '', [ProfilAdminController::class, 'edit']);
        $routes->push('profil_update', '/update', [ProfilAdminController::class, 'update']);
    });
    /* -------------------------------------------------------------------------- */

    /* -------------------------- Route Kelola Pengguna ------------------------- */
    $routes->prefix('pengguna', function ($routes) {
        $routes->push('pengguna', '', [UsersController::class, 'index']);
        $routes->push('pengguna_create', '/create', [UsersController::class, 'create']);
        $routes->push('pengguna_store', '/store', [UsersController::class, 'store']);
        $routes->push('pengguna_edit', '/{id}/edit', [UsersController::class, 'edit']);
        $routes->push('pengguna_update', '/{id}/update', [UsersController::class, 'update']);
        $routes->push('pengguna_show', '/{id}/show', [UsersController::class, 'show']);
        $routes->push('pengguna_delete', '/{id}/delete', [UsersController::class, 'delete']);
    });
    /* -------------------------------------------------------------------------- */

    /* ---------------------------- Profile --------------------------- */
    $routes->push('profile', '/profile-saya', [ProfileController::class, 'index']);
    $routes->push('profileUpdate', '/profile-saya/update', [ProfileController::class, 'update']);

    /* ---------------------------- Kelola Template Login --------------------------- */
    $routes->prefix('login-template', function ($routes) {
        $routes->push('cms-title', '', [CmsTitleController::class, 'index']);
        $routes->push('cms-title-update', '/cms-title/update', [CmsTitleController::class, 'update']);
        $routes->push('cms-background', '/cms-background/update', [CmsBackgroundController::class, 'update']);
        $routes->push('cms-setting', '/cms-setting/update', [CmsSettingController::class, 'update']);
    });
    /* -------------------------------------------------------------------------- */

    /* -------------------------- Route Kelola Menu ------------------------- */
    $routes->prefix('menu', function ($routes) {
        $routes->push('menu', '', [MenuController::class, 'index']);
        $routes->push('menu_create', '/create', [MenuController::class, 'create']);
        $routes->push('menu_store', '/store', [MenuController::class, 'store']);
        $routes->push('menu_edit', '/{id}/edit', [MenuController::class, 'edit']);
        $routes->push('menu_update', '/{id}/update', [MenuController::class, 'update']);
        $routes->push('menu_show', '/{id}/show', [MenuController::class, 'show']);
        $routes->push('menu_delete', '/{id}/delete', [MenuController::class, 'delete']);
    });
    /* -------------------------------------------------------------------------- */

    /* -------------------------- Route Kelola Sub Menu ------------------------- */
    $routes->prefix('sub-menu', function ($routes) {
        $routes->push('sub_menu', '', [SubMenuController::class, 'index']);
        $routes->push('sub_menu_create', '/create', [SubMenuController::class, 'create']);
        $routes->push('sub_menu_store', '/store', [SubMenuController::class, 'store']);
        $routes->push('sub_menu_edit', '/{id}/edit', [SubMenuController::class, 'edit']);
        $routes->push('sub_menu_update', '/{id}/update', [SubMenuController::class, 'update']);
        $routes->push('sub_menu_show', '/{id}/show', [SubMenuController::class, 'show']);
        $routes->push('sub_menu_delete', '/{id}/delete', [SubMenuController::class, 'delete']);
    });
    /* -------------------------------------------------------------------------- */

    /* -------------------------- Route Kelola Component ------------------------- */
    $routes->prefix('component', function ($routes) {
        $routes->push('component', '', [CmsComponentController::class, 'index']);
        $routes->push('component_create', '/create', [CmsComponentController::class, 'create']);
        $routes->push('component_store', '/store', [CmsComponentController::class, 'store']);
        $routes->push('component_edit', '/{id}/edit', [CmsComponentController::class, 'edit']);
        $routes->push('component_update', '/{id}/update', [CmsComponentController::class, 'update']);
        $routes->push('component_show', '/{id}/show', [CmsComponentController::class, 'show']);
        $routes->push('component_delete', '/{id}/delete', [CmsComponentController::class, 'delete']);
    });
    /* -------------------------------------------------------------------------- */

    /* -------------------------- Route Kelola Halaman ------------------------- */
    $routes->prefix('halaman', function ($routes) {
        $routes->push('halaman', '', [CmsHalamanController::class, 'index']);
        $routes->push('halaman_create', '/create', [CmsHalamanController::class, 'create']);
        $routes->push('halaman_store', '/store', [CmsHalamanController::class, 'store']);
        $routes->push('halaman_edit', '/{id}/edit', [CmsHalamanController::class, 'edit']);
        $routes->push('halaman_update', '/{id}/update', [CmsHalamanController::class, 'update']);
        $routes->push('halaman_show', '/{id}/show', [CmsHalamanController::class, 'show']);
        $routes->push('halaman_delete', '/{id}/delete', [CmsHalamanController::class, 'delete']);
    });
    /* -------------------------------------------------------------------------- */

    // pengaturan website
    $routes->prefix('setting-website', function ($routes) {
        $routes->push('setting', '', [CmsSettingController::class, 'index']);
        $routes->push('setting_update', '/update', [CmsSettingController::class, 'update']);
    });

    /* -------------------------- Route Kelola Akreditasi ------------------------- */
    $routes->prefix('akreditasi', function ($routes) {
        $routes->push('akreditasi', '', [AkreditasiController::class, 'index']);
        $routes->push('akreditasi_create', '/create', [AkreditasiController::class, 'create']);
        $routes->push('akreditasi_store', '/store', [AkreditasiController::class, 'store']);
        $routes->push('akreditasi_edit', '/{id}/edit', [AkreditasiController::class, 'edit']);
        $routes->push('akreditasi_update', '/{id}/update', [AkreditasiController::class, 'update']);
        $routes->push('akreditasi_show', '/{id}/show', [AkreditasiController::class, 'show']);
        $routes->push('akreditasi_delete', '/{id}/delete', [AkreditasiController::class, 'delete']);
    });
    /* -------------------------------------------------------------------------- */


    /* -------------------------------- Route Kelola Asosiasi -------------------------------- */
    $routes->prefix('asosiasi', function ($routes) {
        $routes->push('asosiasi', '', [AsosiasiController::class, 'index']);
        $routes->push('asosiasi_create', '/create', [AsosiasiController::class, 'create']);
        $routes->push('asosiasi_store', '/store', [AsosiasiController::class, 'store']);
        $routes->push('asosiasi_edit', '/{id}/edit', [AsosiasiController::class, 'edit']);
        $routes->push('asosiasi_update', '/{id}/update', [AsosiasiController::class, 'update']);
        $routes->push('asosiasi_show', '/{id}/show', [AsosiasiController::class, 'show']);
        $routes->push('asosiasi_delete', '/{id}/delete', [AsosiasiController::class, 'delete']);
    });
    /* -------------------------------------------------------------------------- */

    /* -------------------------------- Route Kelola Kontak -------------------------------- */
    $routes->prefix('kontak', function ($routes) {
        $routes->push('kontak', '', [KontakController::class, 'index']);
        $routes->push('kontak_create', '/create', [KontakController::class, 'create']);
        $routes->push('kontak_store', '/store', [KontakController::class, 'store']);
        $routes->push('kontak_edit', '/{id}/edit', [KontakController::class, 'edit']);
        $routes->push('kontak_update', '/{id}/update', [KontakController::class, 'update']);
        $routes->push('kontak_show', '/{id}/show', [KontakController::class, 'show']);
        $routes->push('kontak_delete', '/{id}/delete', [KontakController::class, 'delete']);
    });
    /* -------------------------------------------------------------------------- */

    /* -------------------------------- Asosiasi -------------------------------- */
    $routes->prefix('sosial-media', function ($routes) {
        $routes->push('sosial_media', '', [SosialMediaController::class, 'index']);
        $routes->push('sosial_media_create', '/create', [SosialMediaController::class, 'create']);
        $routes->push('sosial_media_store', '/store', [SosialMediaController::class, 'store']);
        $routes->push('sosial_media_edit', '/{id}/edit', [SosialMediaController::class, 'edit']);
        $routes->push('sosial_media_update', '/{id}/update', [SosialMediaController::class, 'update']);
        $routes->push('sosial_media_show', '/{id}/show', [SosialMediaController::class, 'show']);
        $routes->push('sosial_media_delete', '/{id}/delete', [SosialMediaController::class, 'delete']);
    });
    /* -------------------------------------------------------------------------- */

    /* -------------------------------- Banner -------------------------------- */
    $routes->prefix('banner', function ($routes) {
        $routes->push('banner', '', [BannerController::class, 'index']);
        $routes->push('banner_create', '/create', [BannerController::class, 'create']);
        $routes->push('banner_store', '/store', [BannerController::class, 'store']);
        $routes->push('banner_edit', '/{id}/edit', [BannerController::class, 'edit']);
        $routes->push('banner_update', '/{id}/update', [BannerController::class, 'update']);
        $routes->push('banner_show', '/{id}/show', [BannerController::class, 'show']);
        $routes->push('banner_delete', '/{id}/delete', [BannerController::class, 'delete']);
    });
    /* -------------------------------------------------------------------------- */
});


/* ------------------------------- Front Home ------------------------------- */
$routes->push('home', '/', [HomeController::class, 'index']);
/* -------------------------------------------------------------------------- */


/* ------------------------------- Front News ------------------------------- */
$routes->prefix('news', function ($routes) {
    $routes->push('news', '', [BeritaController::class, 'index']);
    $routes->push('news_detail', '/{id}/detail', [BeritaController::class, 'detail']);
    $routes->push('news_kategori', '/{kategori}/kategori', [BeritaController::class, 'kategori']);
});
/* -------------------------------------------------------------------------- */


/* ------------------------------ Front Product ----------------------------- */
$routes->prefix('product', function ($routes) {
    $routes->push('product', '', [ProdukController::class, 'index']);
    $routes->push('product_detail', '/{id}/detail', [ProdukController::class, 'detail']);
    $routes->push('product_kategori', '/{kategori}/kategori', [ProdukController::class, 'kategori']);
});
/* -------------------------------------------------------------------------- */


/* ------------------------------ Front Service ----------------------------- */
$routes->prefix('service', function ($routes) {
    $routes->push('service', '', [LayananController::class, 'index']);
    $routes->push('service_detail', '/{id}/detail', [LayananController::class, 'detail']);
    $routes->push('service_kategori', '/{kategori}/kategori', [LayananController::class, 'kategori']);
});
/* -------------------------------------------------------------------------- */


/* ------------------------------ Front Gallery ----------------------------- */
$routes->prefix('gallery', function ($routes) {
    $routes->push('gallery', '', [GaleriController::class, 'index']);
    $routes->push('gallery_detail', '/{id}/detail', [GaleriController::class, 'detail']);
    $routes->push('gallery_kategori', '/{kategori}/kategori', [GaleriController::class, 'kategori']);
});
/* -------------------------------------------------------------------------- */


/* ----------------------------- Front Customer ----------------------------- */
$routes->push('customer', '/customer', [CustomerController::class, 'index']);
/* -------------------------------------------------------------------------- */


/* ------------------------------ Front Contact ----------------------------- */
$routes->push('contact', '/contact', [ContactController::class, 'index']);
$routes->push('contact_kintun', '/contact/kintun', [ContactController::class, 'create']);
/* -------------------------------------------------------------------------- */


/* ------------------------------- Front About ------------------------------ */
$routes->push('about', '/about', [AboutController::class, 'index']);
/* -------------------------------------------------------------------------- */


/* ---------------------------- Front Maintenance --------------------------- */
$routes->push('maintenance', '/maintenance', [MaintenanceController::class, 'index']);

// page website dinamis
$routes->prefix('/page', function ($routes) {
    $routes->push('page-dinamis', '/{page_url}', [HalamanController::class, 'index']);
});

/* ---------------------- Ketentaun & Kebijakan Privasi --------------------- */
$routes->push('ketentuan', '/ketentuan', [KetentuanController::class, 'index']);


/* ---------------------------- Panduan Komunitas --------------------------- */
$routes->push('panduan', '/panduan', [PanduanController::class, 'index']);


/* --------------------------- Pedoman Media Siber -------------------------- */
$routes->push('pedoman', '/pedoman', [PedomanController::class, 'index']);

// routes like berita
$routes->push('like-berita', '/likeBerita/{id}/store', [LikeBeritaController::class, 'storeLike']);
$routes->push('dislike-berita', '/dislikeBerita/{id}/store', [LikeBeritaController::class, 'storeDislike']);

// routes search header
$routes->push('search_result', '/search', [SearchController::class, 'index']);
// $routes->push('search', '{url}', [SearchController::class, 'index']);

return $routes;
