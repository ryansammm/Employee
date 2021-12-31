<?php

namespace App\KategoriLayananAdmin\Model;

use App\QueryBuilder\Model\QueryBuilder;

class KategoriLayananAdmin extends QueryBuilder
{
    protected $table = 'kategori_layanan';
    protected $primaryKey = 'id_kategori_layanan';
}
