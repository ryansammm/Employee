<?php

namespace App\LikeBeritaModule;

abstract class LikeBeritaModule
{
    abstract public function getInstance(): LikeBeritaModuleOperation;

    public function store($id_berita, $id_user) : void
    {
        $module = $this->getInstance();

        // get like berita
        $get = $module->getLikeData();

        if (count($get) < 1) {
            // insert like berita
            $module->insertLikeData();

            // get berita
            $getBerita = $module->getBerita();
            $getLike = $this->likeBerita
                ->where('id_berita', $id)
                ->where('id_user', $idUser)
                ->where('jenislike_berita', '1')->get()->items;
            
            // get like berita

            
            // update count like berita
            

            // delete like berita
        }
    }
}
