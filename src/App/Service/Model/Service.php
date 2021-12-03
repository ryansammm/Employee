<?php

namespace App\Service\Model;

use App\QueryBuilder\Model\QueryBuilder;

class Service extends QueryBuilder
{
    protected $table = 'layanan';
    protected $primaryKey = 'id_layanan';
}
