<?php

namespace App\ContentAdmin\SubModule\ContentAdmin;

use App\ContentAdmin\Module;
use App\ContentAdmin\ModuleOperation;
use App\ContentAdmin\SubModule\BaseOperation;
use App\ContentAdmin\SubModule\ContentAdmin\ContentAdminInterface;
use Symfony\Component\HttpFoundation\Request;

class ContentAdmin extends Module
{
    private $request, $model, $methods;

    public function __construct(Request $request, ContentAdminInterface $model, string $methods)
    {
        $this->request = $request;
        $this->model = $model;
        $this->methods = $methods;
    }

    public function getInstance(): ModuleOperation
    {
        return new BaseOperation($this->request, $this->model, $this->methods);
    }
}
