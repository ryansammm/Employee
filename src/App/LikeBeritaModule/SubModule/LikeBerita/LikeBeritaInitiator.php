<?php

namespace App\LikeBeritaModule\SubModule\LikeBerita;

use App\LikeBeritaModule\LikeBeritaModule;
use App\LikeBeritaModule\LikeBeritaModuleOperation;
use App\LikeBeritaModule\SubModule\LikeBeritaBaseOperation;

class LikeBeritaInitiator extends LikeBeritaModule
{
    private $id_berita, $id_user;

    public function __construct(string $id_berita, string $id_user)
    {
        $this->id_berita = $id_berita;
        $this->id_user = $id_user;
    }

    public function getInstance(): LikeBeritaModuleOperation
    {
        return new LikeBeritaBaseOperation($this->id_berita, $this->id_user, '1');
    }
}
