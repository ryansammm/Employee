<?php

namespace App\LayananAdmin\Model;

use App\ContentAdmin\SubModule\ContentAdmin\ContentAdminInterface;
use App\KategoriLayananAdmin\Model\KategoriLayananAdmin;
use Core\Model;

class LayananAdmin extends Model implements ContentAdminInterface
{
    protected $table = 'layanan';
    protected $primaryKey = 'id_layanan';

    public function category(): Model
    {
        return new KategoriLayananAdmin();
    }

    public function queryString()
    {
        return 'id_kategori_layanan';
    }
}
