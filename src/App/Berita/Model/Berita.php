<?php

namespace App\Berita\Model;

use App\LikeBerita\Model\LikeBerita;
use Core\Model;

class Berita extends Model
{
    protected $table = 'berita';
    protected $primaryKey = 'id_berita';

    /**
     * Define the model to store `like & dislike` data
     */
    public function likeContentModel() : Model
    {
        return new LikeBerita();
    }

    /**
     * Define the model `like & dislike` foreign key
     */
    public function likeModelFK() : string
    {
        return $this->primaryKey;
    }

    // public function likeContentModel
}
