<?php

namespace App\Home\Model;

use Core\GlobalFunc;
use PDOException;


class Home extends GlobalFunc
{
    // private $table = 'menu';
    public $conn;

    public function __construct()
    {
        $globalFunc = new GlobalFunc();
        $this->conn = $globalFunc->conn;
    }
}
