<?php

namespace App\LikeModule;

interface LikeModuleOperation
{
    public function getLikeData();
    public function insertLikeData();
    public function getModelContent();
    public function updateCountLikeModelContent();
    public function deleteLike();

    public function getType();
}