<?php

namespace App\ContentAdmin;

use App\ContentAdmin\SubModule\CustomQuery;

abstract class Module extends CustomQuery
{
    abstract public function getInstance(): ModuleOperation;

    public function get()
    {
        $module = $this->getInstance();

        return call_user_func_array([
            $module, $module->getMethod()
        ], []);
    }
}
