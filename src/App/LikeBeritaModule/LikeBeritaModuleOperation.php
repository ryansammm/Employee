<?php

namespace App\LikeBeritaModule;

interface LikeBeritaModuleOperation
{
    public function getLikeData();
    public function getDisLikeData();
    public function insertLikeData();
    public function getBerita();
    public function updateCountLikeBerita();
    public function deleteLikeBerita();
    public function deleteDislikeBerita();
}