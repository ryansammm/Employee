<?php

namespace App\Gallery\Model;

use App\QueryBuilder\Model\QueryBuilder;
use Core\Model;

class Gallery extends Model
{
    protected $table = 'galeri';
    protected $primaryKey = 'id_galeri';
}
