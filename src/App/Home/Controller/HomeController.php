<?php

namespace App\Home\Controller;

use App\About\Model\About;
use App\Berita\Model\Berita;
use App\Customer\Model\Customer;
use App\Home\Model\Home;
use App\KategoriBeritaAdmin\Model\KategoriBeritaAdmin;
use App\Layanan\Model\Layanan;
use App\Media\Model\Media;
use App\Product\Model\Product;
use App\Produk\Model\Produk;
use App\Service\Model\Service;
use App\VideoAdmin\Model\VideoAdmin;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Profiler\Profile;

class HomeController
{
    public $model;

    public function __construct()
    {
        // $this->model = new Home();
    }

    public function index(Request $request)
    {
        $media = new Media();
        $about = new About();
        $service = new Layanan();
        $product = new Produk();
        $customer = new Customer();
        $video = new VideoAdmin();
        $berita = new Berita();
        $kategori_berita = new KategoriBeritaAdmin();

        /* -------------------------------- About Us -------------------------------- */
        $data_profil = $about
            ->leftJoin('media', 'media.id_relation', '=', 'profil.id_profil')->get();
        $detail_profil = $data_profil->items[0];
        /* -------------------------------------------------------------------------- */

        /* ---------------------------------- News ---------------------------------- */
        $data_kategori_berita = $kategori_berita->get();
        $data_berita = $berita
            ->leftJoin('media', 'media.id_relation', '=', 'berita.id_berita')
            ->leftJoin('kategori_berita', 'kategori_berita.id_kategori_berita', '=', 'berita.id_kategori_berita')
            ->paginate(3)->appends(['kategori_berita' => $request->query->get('kategori_berita')]);
        /* -------------------------------------------------------------------------- */

        /* ------------------------------ Top Features ------------------------------ */
        $data_layanan = $service
            ->leftJoin('media', 'media.id_relation', '=', 'layanan.id_layanan')
            ->paginate(4)->appends(['kategori_layanan' => $request->query->get('kategori_layanan')]);
        /* -------------------------------------------------------------------------- */

        /* ---------------------------- See It In Action ---------------------------- */
        $data_video = $video->get();
        /* -------------------------------------------------------------------------- */

        /* --------------------------- Most Viewed Product -------------------------- */
        $data_produk = $product
            ->leftJoin('media', 'media.id_relation', '=', 'produk.id_produk')
            ->leftJoin('kategori_produk', 'kategori_produk.id_kategori_produk', '=', 'produk.id_kategori_produk')
            ->paginate(4)->appends(['kategori_produk' => $request->query->get('kategori_produk')]);
        /* -------------------------------------------------------------------------- */

        /* ------------------------------ Our Customers ----------------------------- */
        $data_pelanggan = $customer
            ->leftJoin('media', 'media.id_relation', '=', 'pelanggan.id_pelanggan')
            ->get();
        /* -------------------------------------------------------------------------- */

        // dd($data_video);

        return render_template('public/home/index', ['detail_profil' => $detail_profil, 'data_layanan' => $data_layanan, 'data_produk' => $data_produk, 'data_pelanggan' => $data_pelanggan, 'data_video' => $data_video, 'data_berita' => $data_berita, 'data_kategori_berita' => $data_kategori_berita]);
    }

    public function create(Request $request)
    {

        return render_template('public/home/create', []);
    }

    public function store(Request $request)
    {

        return new RedirectResponse('/home');
    }

    public function edit(Request $request)
    {


        return render_template('public/home/edit', []);
    }

    public function update(Request $request)
    {

        return new RedirectResponse('/home');
    }

    public function delete(Request $request)
    {

        return new RedirectResponse('/home');
    }
}
