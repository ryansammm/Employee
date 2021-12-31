<?php

namespace App\ContentAdmin;

abstract class Module
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
