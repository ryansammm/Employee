<?php

namespace App\Contact\Model;

use App\QueryBuilder\Model\QueryBuilder;

class Contact extends QueryBuilder
{
    protected $table = 'name';
    protected $primaryKey = 'id_name';
}
