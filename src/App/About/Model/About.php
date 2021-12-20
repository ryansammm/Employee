<?php

namespace App\About\Model;

use App\QueryBuilder\Model\QueryBuilder;

class About extends QueryBuilder
{
    protected $table = 'profil';
    protected $primaryKey = 'id_profil';
}
