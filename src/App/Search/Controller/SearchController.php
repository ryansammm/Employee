<?php

namespace App\Search\Controller;

use App\Berita\Model\Berita;
use App\Galeri\Model\Galeri;
use App\Layanan\Model\Layanan;
use App\Menu\Model\Menu;
use App\Produk\Model\Produk;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class SearchController
{
    public $menu;
    public $berita;
    public $layanan;
    public $galeri;

    public function __construct()
    {
        $this->menu = new Menu();
        $this->berita = new Berita();
        $this->produk = new Produk();
        $this->layanan = new Layanan();
        $this->galeri = new Galeri();
    }

    // public function index(Request $request)
    // {
    //     $url = $request->getPathInfo();
    //     $search = $request->query->get('search');
    //     $result = [];

    //     if ($search != null && $search != '') {
    //         $server_protocol = strpos($request->server->get('SERVER_PROTOCOL'), 'https') === false ? 'http://' : 'https://';
    //         $host = $request->server->get('HTTP_HOST');
    //         $link = $server_protocol . $host;

    //         // search menu
    //         $menus = $this->menu
    //             ->where('have_sub', '!=', '1')
    //             ->where(function ($query) {
    //                 $query->where('header', '1')->orWhere('footer', '1');
    //             })
    //             ->where(function ($query) use ($search) {
    //                 $query->where('menu', 'like', '%' . $search . '%')
    //                     ->orWhere('title', 'like', '%' . $search . '%')
    //                     ->orWhere('meta_description', 'like', '%' . $search . '%');
    //             })
    //             ->get()->items;

    //         foreach ($menus as $key => $item) {
    //             $menus[$key]['http_referer'] = $link . $item['link_url'];
    //             $menus[$key]['search_title'] = $item['menu'];
    //             $menus[$key]['search_description'] = substr($item['meta_description'], 0, 200);
    //         }
    //         $result = array_merge($result, $menus);

    //         // search berita
    //         $berita = $this->berita
    //             ->where('judul_berita', 'like', '%' . $search . '%')
    //             ->orWhere('isi_berita', 'like', '%' . $search . '%')
    //             ->get()->items;
    //         foreach ($berita as $key => $item) {
    //             $berita[$key]['http_referer'] = $link . '/news/' . $item['id_berita'] . '/detail';
    //             $berita[$key]['search_title'] = $item['judul_berita'];
    //             $berita[$key]['search_description'] = substr($item['isi_berita'], 0, 200);
    //         }
    //         $result = array_merge($result, $berita);

    //         // search produk
    //         $produk = $this->produk
    //             ->leftJoin('kategori_produk', 'kategori_produk.id_kategori_produk', '=', 'produk.id_kategori_produk')
    //             ->where('nama_produk', 'like', '%' . $search . '%')
    //             ->orWhere('deskripsi_produk', 'like', '%' . $search . '%')
    //             ->orWhere('spesifikasi_produk', 'like', '%' . $search . '%')
    //             ->orWhere('kategori_produk.nama_kategori_produk', 'like', '%' . $search . '%')
    //             ->get()->items;
    //         foreach ($produk as $key => $item) {
    //             $produk[$key]['http_referer'] = $link . '/product/' . $item['id_produk'] . '/detail';
    //             $produk[$key]['search_title'] = $item['nama_produk'];
    //             $produk[$key]['search_description'] = substr($item['deskripsi_produk'], 0, 200);
    //         }
    //         $result = array_merge($result, $produk);

    //         // search layanan
    //         $layanan = $this->layanan
    //             ->where('nama_layanan', 'like', '%' . $search . '%')
    //             ->orWhere('deskripsi_layanan', 'like', '%' . $search . '%')
    //             ->orWhere('kategori_layanan.nama_kategori_layanan', 'like', '%' . $search . '%')
    //             ->get()->items;
    //         foreach ($layanan as $key => $item) {
    //             $layanan[$key]['http_referer'] = $link . '/service/' . $item['id_layanan'] . '/detail';
    //             $layanan[$key]['search_title'] = $item['nama_layanan'];
    //             $layanan[$key]['search_description'] = substr($item['deskripsi_layanan'], 0, 200);
    //         }
    //         $result = array_merge($result, $layanan);

    //         // search galeri / jejak kami
    //         $galeri = $this->galeri
    //             ->where('judul_galeri', 'like', '%' . $search . '%')
    //             ->orWhere('deskripsi_galeri', 'like', '%' . $search . '%')
    //             ->orWhere('kategori_galeri.nama_kategori_galeri', 'like', '%' . $search . '%')
    //             ->get()->items;
    //         foreach ($galeri as $key => $item) {
    //             $galeri[$key]['http_referer'] = $link . '/gallery/' . $item['id_galeri'] . '/detail';
    //             $galeri[$key]['search_title'] = $item['judul_galeri'];
    //             $galeri[$key]['search_description'] = substr($item['deskripsi_galeri'], 0, 200);
    //         }

    //         // $all_table = 

    //         $result = array_merge($result, $galeri);
    //     }

    //     return render_template('public/search/index', compact('search', 'result'));
    // }

    public function index(Request $request)
    {
        $url = $request->getPathInfo();
        $search = $request->query->get('search');
        $result = [];

        if ($search != null && $search != '') {
            $server_protocol = strpos($request->server->get('SERVER_PROTOCOL'), 'https') === false ? 'http://' : 'https://';
            $host = $request->server->get('HTTP_HOST');
            $link = $server_protocol . $host;

            // search menu
            // $menus_query = $this->menu
            $menus = $this->menu
                ->select('id_cms_menu', 'menu as search_title', 'meta_description as search_description', 'CASE id_cms_menu when NOT NULL THEN NULL ELSE CONCAT("' . $link . '", link_url) END as http_referer')
                ->where('have_sub', '!=', '1')
                ->where(function ($query) {
                    $query->where('jenis_menu', '1')->orWhere('jenis_menu', '3');
                })
                ->where('hide', '2')
                ->where(function ($query) use ($search) {
                    $query->where('menu', 'like', '%' . $search . '%')
                        ->orWhere('title', 'like', '%' . $search . '%')
                        ->orWhere('meta_description', 'like', '%' . $search . '%');
                });

            // search berita
            $berita = $this->berita
                ->select('id_berita', 'judul_berita as search_title', 'isi_berita as search_description', 'CASE id_berita when NOT NULL THEN NULL ELSE CONCAT("' . $link . '/news/", id_berita, "/detail") END as http_referer')
                ->where('judul_berita', 'like', '%' . $search . '%')
                ->orWhere('isi_berita', 'like', '%' . $search . '%');

            // search produk
            $produk = $this->produk
                ->select('id_produk', 'nama_produk as search_title', 'deskripsi_produk as search_description', 'CASE id_produk when NOT NULL THEN NULL ELSE CONCAT("' . $link . '/product/", id_produk, "/detail") END as http_referer')
                ->leftJoin('kategori_produk', 'kategori_produk.id_kategori_produk', '=', 'produk.id_kategori_produk')
                ->where('nama_produk', 'like', '%' . $search . '%')
                ->orWhere('deskripsi_produk', 'like', '%' . $search . '%')
                ->orWhere('spesifikasi_produk', 'like', '%' . $search . '%')
                ->orWhere('kategori_produk.nama_kategori_produk', 'like', '%' . $search . '%');

            // search layanan
            $layanan = $this->layanan
                ->select('id_layanan', 'nama_layanan as search_title', 'deskripsi_layanan as search_description', 'CASE id_layanan when NOT NULL THEN NULL ELSE CONCAT("' . $link . '/service/", id_layanan, "/detail") END as http_referer')
                ->leftJoin('kategori_layanan', 'kategori_layanan.id_kategori_layanan', '=', 'layanan.id_kategori_layanan')
                ->where('nama_layanan', 'like', '%' . $search . '%')
                ->orWhere('deskripsi_layanan', 'like', '%' . $search . '%')
                ->orWhere('kategori_layanan.nama_kategori_layanan', 'like', '%' . $search . '%');

            // search galeri / jejak kami
            $galeri = $this->galeri
                ->select('id_galeri', 'judul_galeri as search_title', 'deskripsi_galeri as search_description', 'CASE id_galeri when NOT NULL THEN NULL ELSE CONCAT("' . $link . '/gallery/", id_galeri, "/detail") END as http_referer')
                ->leftJoin('kategori_galeri', 'kategori_galeri.id_kategori_galeri', '=', 'galeri.id_kategori_galeri')
                ->where('judul_galeri', 'like', '%' . $search . '%')
                ->orWhere('deskripsi_galeri', 'like', '%' . $search . '%')
                ->orWhere('kategori_galeri.nama_kategori_galeri', 'like', '%' . $search . '%')
                ->union($menus)
                ->union($berita)
                ->union($produk)
                ->union($layanan)
                ->paginate(10)->appends(['search' => $search]);

            $result = $galeri;
        }

        return render_template('public/search/index', compact('search', 'result'));
    }

    public function create(Request $request)
    {

        return render_template('home/create', []);
    }

    public function store(Request $request)
    {

        return new RedirectResponse('/home');
    }

    public function edit(Request $request)
    {


        return render_template('home/edit', []);
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
