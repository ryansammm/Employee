<?php

namespace App\ContentAdmin;

abstract class ContentAdminModule
{
    abstract public function getInstance(): ContentAdminModuleOperation;

    public function store() : void
    {
        $module = $this->getInstance();

        // get like berita
        $type = $module->getType() == '1' ? '1' : '2';
        $get = $module->getLikeData($type);

        if (count($get) < 1) {
            // insert like berita
            $module->insertLikeData();
            
            // update count like berita
            $module->updateCountLikeBerita();

            // delete like berita
            $type = $module->getType() == '1' ? '2' : '1';
            $module->deleteLikeBerita($type);
        }
    }
}
