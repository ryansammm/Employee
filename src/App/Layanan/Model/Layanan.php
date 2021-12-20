<?php

namespace App\Layanan\Model;

use App\QueryBuilder\Model\QueryBuilder;

class Layanan extends QueryBuilder
{
    protected $table = 'layanan';
    protected $primaryKey = 'id_layanan';
}
