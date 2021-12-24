<?php

namespace App\LikeBeritaModule\SubModule;

use App\LikeBerita\Model\LikeBerita;
use App\LikeBeritaModule\LikeBeritaModuleOperation;

class LikeBeritaBaseOperation implements LikeBeritaModuleOperation
{
    private $id_berita, $id_user;
    private $likeBerita;
    private $type;

    public function __construct(string $id_berita, string $id_user, string $type = '1')
    {
        $this->id_berita = $id_berita;
        $this->id_user = $id_user;
        $this->type = $type;
        $this->likeBerita = new LikeBerita();
    }

    public function getLikeDataQuery(string $type)
    {
        return $this->likeBerita
            ->where('id_berita', $this->id_berita)
            ->where('id_user', $this->id_user)
            ->where('jenislike_berita', $type)->get()->items;
    }

    /**
     * Get Like Berita Data
     */
    public function getLikeData()
    {
        return $this->getLikeDataQuery('1');
    }

    /**
     * Get Dislike Berita Data
     */
    public function getDislikeData()
    {
        return $this->getLikeDataQuery('2');
    }

    /**
     * Insert Like Berita Data
     */
    public function insertLikeData()
    {
        return $this->likeBerita->insert([
            'id_user' => $this->id_user,
            'id_berita' => $this->id_berita,
            'jenislike_berita' => $this->type,
        ]);
    }

    /**
     * Get Berita Data
     */
    public function getBerita()
    {
        return $this->berita->where('id_berita', $this->id_berita)->first();
    }

    /**
     * Update Count Berita Data
     */
    public function updateCountLikeBerita()
    {
        $get_berita = $this->getBerita();

        $update = $this->berita->where('id_berita', $this->id_berita);
        if ($this->type == '1') {
            $get_dislike = $this->getLikeData('2');
            $update->update([
                'countlike_berita' => intval($get_berita['countlike_berita']) + 1,
                'countdislike_berita' => count($get_dislike) > 0 ? intval($get_berita['countdislike_berita']) - 1 : $get_berita['countdislike_berita'],
            ]);
        } else {
            $get_like = $this->getLikeData('1');
            $update->update([
                'countlike_berita' => count($get_like) > 0 ? intval($get_berita['countlike_berita']) - 1 : $get_berita['countlike_berita'],
                'countdislike_berita' => intval($get_berita['countdislike_berita']) + 1,
            ]);
        }

        return $update;
    }

    public function deleteLikeBeritaQuery(string $type)
    {
        return $this->likeBerita
            ->where('id_berita', $this->id_berita)
            ->where('id_user', $this->id_user)
            ->where('jenislike_berita', $type)->delete();
    }
    
    /**
     * Delete Like Berita Data
     */
    public function deleteLikeBerita()
    {
        return $this->deleteLikeBeritaQuery('1');
    }

    /**
     * Delete Dislike Berita Data
     */
    public function deleteDislikeBerita()
    {
        return $this->deleteLikeBeritaQuery('2');
    }
}
