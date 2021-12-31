<?php

namespace App\ProdukAdmin\Model;

use App\ContentAdmin\SubModule\ContentAdmin\ContentAdminInterface;
use App\KategoriProdukAdmin\Model\KategoriProdukAdmin;
use Core\Model;

class ProdukAdmin extends Model implements ContentAdminInterface
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';

    public function category() : Model
    {
        return new KategoriProdukAdmin();
    }

    public function queryString()
    {
        return 'id_kategori_produk';
    }
}
