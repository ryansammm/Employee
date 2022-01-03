<?php

namespace App\ContentAdmin;

use App\ContentAdmin\SubModule\CustomQuery;

interface ModuleOperation
{
    public function getMethod();
    public function setCustomQuery(CustomQuery $instance) : void;

    public function index();
    public function detail();
}