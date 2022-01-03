<?php

namespace App\GaleriAdmin\Model;

use App\ContentAdmin\SubModule\ContentAdmin\ContentAdminInterface;
use App\KategoriGaleriAdmin\Model\KategoriGaleriAdmin;
use Core\Model;

class GaleriAdmin extends Model implements ContentAdminInterface
{
    protected $table = 'galeri';
    protected $primaryKey = 'id_galeri';

    public function category(): Model
    {
        return new KategoriGaleriAdmin();
    }

    public function queryString()
    {
        return 'id_kategori_galeri';
    }
}
