<?php

namespace App\ContentAdmin;

interface ModuleOperation
{
    public function getMethod();

    public function index();
    public function detail();
}