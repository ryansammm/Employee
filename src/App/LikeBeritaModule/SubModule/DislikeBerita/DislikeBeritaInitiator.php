<?php

namespace App\LikeBeritaModule\SubModule\DislikeBerita;

use App\LikeBeritaModule\LikeBeritaModule;
use App\LikeBeritaModule\LikeBeritaModuleOperation;
use App\LikeBeritaModule\SubModule\LikeBeritaBaseOperation;

class DislikeBeritaInitiator extends LikeBeritaModule
{
    private $id_berita, $id_user;

    public function __construct(string $id_berita, string $id_user)
    {
        $this->id_berita = $id_berita;
        $this->id_user = $id_user;
    }

    public function getInstance(): LikeBeritaModuleOperation
    {
        return new LikeBeritaBaseOperation($this->id_berita, $this->id_user, '2');
    }
}
