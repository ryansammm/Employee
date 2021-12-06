<?php

use App\About\Controller\AboutController;
use App\Berita\Controller\BeritaController;
use App\CmsBackground\Controller\CmsBackgroundController;
use App\CmsFonts\Controller\CmsFontsController;
use App\CmsKategoriGaleriStyle\Controller\CmsKategoriGaleriStyleController;
use App\CmsSetting\Controller\CmsSettingController;
use App\CmsTitle\Controller\CmsTitleController;
use App\Contact\Controller\ContactController;
use App\Customer\Controller\CustomerController;
use App\Galeri\Controller\GaleriController;
use App\GaleriAdmin\Controller\GaleriAdminController;
use App\Gallery\Controller\GalleryController;
use App\GroupGaleri\Controller\GroupGaleriController;
use App\Home\Controller\HomeController;
use App\KategoriBeritaAdmin\Controller\KategoriBeritaAdminController;
use App\KategoriGaleriAdmin\Controller\KategoriGaleriAdminController;
use App\KategoriLayananAdmin\Controller\KategoriLayananAdminController;
use App\KategoriProdukAdmin\Controller\KategoriProdukAdminController;
use App\LayananAdmin\Controller\LayananAdminController;
use App\Login\Controller\LoginController;
use App\Maintenance\Controller\MaintenanceController;
use App\News\Controller\NewsController;
use App\PelangganAdmin\Controller\PelangganAdminController;
use App\Product\Controller\ProductController;
use App\ProdukAdmin\Controller\ProdukAdminController;
use App\ProfilAdmin\Controller\ProfilAdminController;
use App\Profile\Controller\ProfileController;
use App\Service\Controller\ServiceController;
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

    /* --------------------------- Route Kelola Berita -------------------------- */
    $routes->prefix('berita', function ($routes) {
        $routes->push('berita', '', [BeritaController::class, 'index']);
        $routes->push('berita_create', '/create', [BeritaController::class, 'create']);
        $routes->push('berita_store', '/store', [BeritaController::class, 'store']);
        $routes->push('berita_edit', '/{id}/edit', [BeritaController::class, 'edit']);
        $routes->push('berita_update', '/{id}/update', [BeritaController::class, 'update']);
        $routes->push('berita_delete', '/{id}/delete', [BeritaController::class, 'delete']);
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
        $routes->push('kategori_produk', '', [KategoriProdukAdminController::class, 'index']);
        $routes->push('kategori_produk_create', '/create', [KategoriProdukAdminController::class, 'create']);
        $routes->push('kategori_produk_store', '/store', [KategoriProdukAdminController::class, 'store']);
        $routes->push('kategori_produk_edit', '/{id}/edit', [KategoriProdukAdminController::class, 'edit']);
        $routes->push('kategori_produk_update', '/{id}/update', [KategoriProdukAdminController::class, 'update']);
        $routes->push('kategori_produk_show', '/{id}/show', [KategoriProdukAdminController::class, 'show']);
        $routes->push('kategori_produk_delete', '/{id}/delete', [KategoriProdukAdminController::class, 'delete']);
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
        $routes->push('kategori_layanan', '', [KategoriLayananAdminController::class, 'index']);
        $routes->push('kategori_layanan_create', '/create', [KategoriLayananAdminController::class, 'create']);
        $routes->push('kategori_layanan_store', '/store', [KategoriLayananAdminController::class, 'store']);
        $routes->push('kategori_layanan_edit', '/{id}/edit', [KategoriLayananAdminController::class, 'edit']);
        $routes->push('kategori_layanan_update', '/{id}/update', [KategoriLayananAdminController::class, 'update']);
        $routes->push('kategori_layanan_show', '/{id}/show', [KategoriLayananAdminController::class, 'show']);
        $routes->push('kategori_layanan_delete', '/{id}/delete', [KategoriLayananAdminController::class, 'delete']);
    });
    /* -------------------------------------------------------------------------- */

    /* -------------------------- Route Kelola Galeri -------------------------- */
    $routes->prefix('galeri', function ($routes) {
        $routes->push('galeri', '', [GaleriController::class, 'index']);
        $routes->push('galeri_create', '/create', [GaleriController::class, 'create']);
        $routes->push('galeri_store', '/store', [GaleriController::class, 'store']);
        $routes->push('galeri_edit', '/{id}/edit', [GaleriController::class, 'edit']);
        $routes->push('galeri_update', '/{id}/update', [GaleriController::class, 'update']);
        $routes->push('galeri_show', '/{id}/show', [GaleriController::class, 'show']);
        $routes->push('galeri_delete', '/{id}/delete', [GaleriController::class, 'delete']);
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
            $routes->push('kategori_galeri_style', '', [CmsKategoriGaleriStyleController::class, 'edit']);
            $routes->push('kategori_galeri_style_update', '/update', [CmsKategoriGaleriStyleController::class, 'update']);
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

    /* ---------------------------- Logout --------------------------- */
    $routes->push('logout', '/logout', [LoginController::class, 'logout']);

    /* ---------------------------- Kelola Template Login --------------------------- */
    $routes->prefix('login-template', function ($routes) {
        $routes->push('cms-title', '', [CmsTitleController::class, 'index']);
        $routes->push('cms-title-update', '/cms-title/update', [CmsTitleController::class, 'update']);
        $routes->push('cms-background', '/cms-background/update', [CmsBackgroundController::class, 'update']);
        $routes->push('cms-setting', '/cms-setting/update', [CmsSettingController::class, 'update']);
    });
    /* -------------------------------------------------------------------------- */
});


/* ------------------------------- Front Home ------------------------------- */
$routes->push('home', '/', [HomeController::class, 'index']);
/* -------------------------------------------------------------------------- */


/* ------------------------------- Front News ------------------------------- */
$routes->prefix('news', function ($routes) {
    $routes->push('news', '', [NewsController::class, 'index']);
    $routes->push('news_detail', '/{id}/detail', [NewsController::class, 'detail']);
    $routes->push('news_kategori', '/{kategori}/kategori', [NewsController::class, 'kategori']);
});
/* -------------------------------------------------------------------------- */


/* ------------------------------ Front Product ----------------------------- */
$routes->prefix('product', function ($routes) {
    $routes->push('product', '', [ProductController::class, 'index']);
    $routes->push('product_detail', '/{id}/detail', [ProductController::class, 'detail']);
    $routes->push('product_kategori', '/{kategori}/kategori', [ProductController::class, 'kategori']);
});
/* -------------------------------------------------------------------------- */


/* ------------------------------ Front Service ----------------------------- */
$routes->prefix('service', function ($routes) {
    $routes->push('service', '', [ServiceController::class, 'index']);
    $routes->push('service_detail', '/{id}/detail', [ServiceController::class, 'detail']);
    $routes->push('service_kategori', '/{kategori}/kategori', [ServiceController::class, 'kategori']);
});
/* -------------------------------------------------------------------------- */


/* ------------------------------ Front Gallery ----------------------------- */
$routes->push('gallery', '/gallery', [GalleryController::class, 'index']);
$routes->push('galleryDetail', '/gallery-detail', [GalleryController::class, 'detail']);
/* -------------------------------------------------------------------------- */


/* ----------------------------- Front Customer ----------------------------- */
$routes->push('customer', '/customer', [CustomerController::class, 'index']);
/* -------------------------------------------------------------------------- */


/* ------------------------------ Front Contact ----------------------------- */
$routes->push('contact', '/contact', [ContactController::class, 'index']);
/* -------------------------------------------------------------------------- */


/* ------------------------------- Front About ------------------------------ */
$routes->push('about', '/about', [AboutController::class, 'index']);
/* -------------------------------------------------------------------------- */


/* ---------------------------- Front Maintenance --------------------------- */
$routes->push('maintenance', '/maintenance', [MaintenanceController::class, 'index']);

return $routes;
