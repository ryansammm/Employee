<?php

namespace App\Customer\Model;

use App\QueryBuilder\Model\QueryBuilder;

class Customer extends QueryBuilder
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';
}
