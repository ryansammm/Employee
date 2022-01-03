<?php

namespace App\ContentAdmin\SubModule\ContentAdmin;

use Core\Model;

interface ContentAdminInterface
{
    public function category() : Model;
    public function queryString();
}