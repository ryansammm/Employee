<?php 

namespace App\KategoriBerita\Model;

use App\QueryBuilder\Model\QueryBuilder;

class KategoriBerita extends QueryBuilder
{
    protected $table = 'kategori_berita';
    protected $primaryKey = 'id_kategori_berita';
}
