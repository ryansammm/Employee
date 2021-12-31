<?php

namespace App\LikeBeritaKomentar\Model;

use Core\Model;

class LikeBeritaKomentar extends Model
{
    protected $table = 'berita_comment_like';
    protected $primaryKey = 'id_berita_comment_like';
}