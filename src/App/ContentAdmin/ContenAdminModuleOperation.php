<?php

namespace App\ContentAdmin;

interface ContentAdminModuleOperation
{
    public function getLikeData();
    public function insertLikeData();
    public function getBerita();
    public function updateCountLikeBerita();
    public function deleteLikeBerita();

    public function getType();
}