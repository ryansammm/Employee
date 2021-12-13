<?php

namespace App\Kontak\Controller;

use App\Kontak\Model\Kontak;
use App\Kontak\Model\KontakJenis;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class KontakController
{
    public $kontak;
    public $kontakJenis;

    public function __construct()
    {
        $this->kontak = new Kontak();
        $this->kontakJenis = new KontakJenis();
    }

    public function index(Request $request)
    {
        $datas = $this->kontak->groupBy('nama_kontak')->paginate(10);

        return render_template('admin/kontak/index', compact('datas'));
    }

    public function create(Request $request)
    {
        return render_template('admin/kontak/create');
    }

    public function store(Request $request)
    {
        $datas = $request->request->all();
        foreach ($datas as $key => $value) {
            if ($key != 'nama_kontak') {
                $jenis_kontak = '';
                if (strpos($key, 'alamat') !== false) {
                    $alias_kontak = 'alamat';
                    $ikon_kontak = 'fas fa-map-marker-alt';
                } else if (strpos($key, 'jam_operasional') !== false) {
                    $alias_kontak = 'jam_operasional';
                    $ikon_kontak = 'fas fa-clock';
                    if (strpos($key, 'normal') !== false) {
                        $jenis_kontak = 'normal';
                    } else if (strpos($key, 'libur') !== false) {
                        $jenis_kontak = 'libur';
                    }
                } else if (strpos($key, 'customer_service') !== false) {
                    $alias_kontak = 'customer_service';
                    $ikon_kontak = 'fas fa-user';
                } else if (strpos($key, 'technical_support') !== false) {
                    $alias_kontak = 'technical_support';
                    $ikon_kontak = 'fas fa-user-cog';
                }

                if (strpos($key, 'customer_service') !== false || strpos($key, 'technical_support') !== false) {
                    if (strpos($key, 'nama') !== false) {
                        $jenis_kontak = 'nama';
                    } else if (strpos($key, 'nomor') !== false) {
                        $jenis_kontak = 'nomor';
                    } else {
                        $jenis_kontak = 'email';
                    }
                }

                $kontak_jenis = $this->kontakJenis->where('alias_kontak_jenis', $alias_kontak)->first();
                $request->request->set('id_kontak_jenis', $kontak_jenis['id_kontak_jenis']);
                $request->request->set('ikon_kontak', $ikon_kontak);
                $request->request->set('isi_kontak', $value);
                $request->request->set('ishide_kontak', '2');
                $request->request->set('jenis_kontak', $jenis_kontak);

                $create = $this->kontak->insert($request->request->all());
            }
        }

        return new RedirectResponse('/admin/kontak');
    }

    public function edit(Request $request)
    {
        $id = $request->attributes->get('id');
        $detail_one = $this->kontak->where('id_kontak', $id)->first();
        $detail = $this->kontak->where('nama_kontak', $detail_one['nama_kontak'])->get();
        $kontak = $this->kontak;

        return render_template('admin/kontak/edit', compact('detail', 'detail_one', 'kontak'));
    }

    public function update(Request $request)
    {
        $id = $request->attributes->get('id');
        $detail_one = $this->kontak->where('id_kontak', $id)->first();
        $delete = $this->kontak->where('nama_kontak', $detail_one['nama_kontak'])->delete();
        
        $datas = $request->request->all();
        foreach ($datas as $key => $value) {
            if ($key != 'nama_kontak') {
                $jenis_kontak = '';
                if (strpos($key, 'alamat') !== false) {
                    $alias_kontak = 'alamat';
                    $ikon_kontak = 'fas fa-map-marker-alt';
                } else if (strpos($key, 'jam_operasional') !== false) {
                    $alias_kontak = 'jam_operasional';
                    $ikon_kontak = 'fas fa-clock';
                    if (strpos($key, 'normal') !== false) {
                        $jenis_kontak = 'normal';
                    } else if (strpos($key, 'libur') !== false) {
                        $jenis_kontak = 'libur';
                    }
                } else if (strpos($key, 'customer_service') !== false) {
                    $alias_kontak = 'customer_service';
                    $ikon_kontak = 'fas fa-user';
                } else if (strpos($key, 'technical_support') !== false) {
                    $alias_kontak = 'technical_support';
                    $ikon_kontak = 'fas fa-user-cog';
                }

                if (strpos($key, 'customer_service') !== false || strpos($key, 'technical_support') !== false) {
                    if (strpos($key, 'nama') !== false) {
                        $jenis_kontak = 'nama';
                    } else if (strpos($key, 'nomor') !== false) {
                        $jenis_kontak = 'nomor';
                    } else {
                        $jenis_kontak = 'email';
                    }
                }

                $kontak_jenis = $this->kontakJenis->where('alias_kontak_jenis', $alias_kontak)->first();
                $request->request->set('id_kontak_jenis', $kontak_jenis['id_kontak_jenis']);
                $request->request->set('ikon_kontak', $ikon_kontak);
                $request->request->set('isi_kontak', $value);
                $request->request->set('ishide_kontak', '2');
                $request->request->set('jenis_kontak', $jenis_kontak);

                $create = $this->kontak->insert($request->request->all());
            }
        }

        return new RedirectResponse('/admin/kontak');
    }

    public function delete(Request $request)
    {
        $id = $request->attributes->get('id');
        $detail_one = $this->kontak->where('id_kontak', $id)->first();
        $delete = $this->kontak->where('nama_kontak', $detail_one['nama_kontak'])->delete();

        return new RedirectResponse('/admin/kontak');
    }
}
