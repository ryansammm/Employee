<?php

namespace App\LikeModule\SubModule;

use Core\Model;

class LikeModelContent
{
    public function __construct(Model $model)
    {
        $this->modelContent = $model;
    }

    public function modelContentColumnCheck()
    {
        $this->likeModel = $this->modelContent->likeContentModel();
    }
}
