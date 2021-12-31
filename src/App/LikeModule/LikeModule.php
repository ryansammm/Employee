<?php

namespace App\LikeModule;

abstract class LikeModule
{
    abstract public function getInstance(): LikeModuleOperation;

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
            $module->updateCountLikeModelContent();

            // delete like berita
            $type = $module->getType() == '1' ? '2' : '1';
            $module->deleteLike($type);
        }
    }
}
