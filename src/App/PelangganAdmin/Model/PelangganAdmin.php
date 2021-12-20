<?php

namespace App\PelangganAdmin\Model;

use App\QueryBuilder\Model\QueryBuilder;
use Core\Model;

class PelangganAdmin extends Model
{
    protected $table = 'pelanggan';
    protected $primaryKey = 'id_pelanggan';
}
