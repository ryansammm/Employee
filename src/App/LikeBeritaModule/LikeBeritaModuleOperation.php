<?php

namespace App\LikeBeritaModule;

interface LikeBeritaModuleOperation
{
    public function getLikeData();
    public function insertLikeData();
    public function getBerita();
    public function updateCountLikeBerita();
    public function deleteLikeBerita();

    public function getType();
}