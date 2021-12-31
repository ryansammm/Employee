<?php

namespace App\Produk\Model;

use App\QueryBuilder\Model\QueryBuilder;

class Produk extends QueryBuilder
{
    protected $table = 'produk';
    protected $primaryKey = 'id_produk';
}
