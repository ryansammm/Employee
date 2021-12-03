<?php

namespace App\Product\Model;

use App\QueryBuilder\Model\QueryBuilder;

class Product extends QueryBuilder
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
}
