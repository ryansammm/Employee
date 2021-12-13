<?php

namespace App\Kontak\Model;

use Core\Model;

class Kontak extends Model
{
    protected $table = 'kontak';
    protected $primaryKey = 'id_kontak';

    public function getKontak(object $datas, string $alias_kontak, string $jenis_kontak = '')
    {
        $result = '';
        $kontak_jenis_model = new KontakJenis();
        $kontak_jenis = $kontak_jenis_model->where('alias_kontak_jenis', $alias_kontak)->first();

        foreach ($datas->items as $key => $value) {
            if ($value['id_kontak_jenis'] == $kontak_jenis['id_kontak_jenis']) {
                if ($jenis_kontak != '') {
                    if ($value['jenis_kontak'] == $jenis_kontak) {
                        $result = $value;
                    }
                } else {
                    $result = $value;
                }
                
            }
        }

        return $result;
    }
}
