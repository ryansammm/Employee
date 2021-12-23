<?php

namespace App\LikeBerita\Controller;

use App\Berita\Model\Berita;
use App\LikeBerita\Model\LikeBerita;
use App\Media\Model\Media;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class LikeBeritaController
{
    public $likeBerita;
    public $media;
    public $berita;

    public function __construct()
    {
        $this->likeBerita = new LikeBerita();
        $this->media = new Media();
        $this->berita = new Berita();
    }

    public function storeLike(Request $request)
    {
        $id = $request->attributes->get('id');
        $idUser = session('id_user');
        $get = $this->likeBerita
            ->where('id_berita', $id)
            ->where('id_user', $idUser)
            ->where('jenislike_berita', '1')->get()->items;

        if (count($get) < 1) {
            $this->likeBerita->insert([
                'id_user' => $idUser,
                'id_berita' => $id,
                'jenislike_berita' => '1',
            ]);

            $getBerita = $this->berita->where('id_berita', $id)->first();
            $getDislike = $this->likeBerita
                ->where('id_berita', $id)
                ->where('id_user', $idUser)
                ->where('jenislike_berita', '2')->get()->items;
            $this->berita
                ->where('id_berita', $id)
                ->update([
                    'countlike_berita' => intval($getBerita['countlike_berita']) + 1,
                    'countdislike_berita' => count($getDislike) > 0 ? intval($getBerita['countdislike_berita']) - 1 : $getBerita['countdislike_berita'],
                    'countcomment_berita' => $getBerita['countcomment_berita'],
                    'countshare_berita' => $getBerita['countshare_berita']
                ]);

            $this->likeBerita
                ->where('id_berita', $id)
                ->where('id_user', $idUser)
                ->where('jenislike_berita', '2')->delete();
        }

        return new RedirectResponse('/news/' . $id . '/detail');
    }

    public function storeDislike(Request $request)
    {
        $id = $request->attributes->get('id');
        $idUser = session('id_user');
        $get = $this->likeBerita
            ->where('id_berita', $id)
            ->where('id_user', $idUser)
            ->where('jenislike_berita', '2')->get()->items;

        if (count($get) < 1) {
            $this->likeBerita->insert([
                'id_user' => $idUser,
                'id_berita' => $id,
                'jenislike_berita' => '2',
            ]);

            $getBerita = $this->berita->where('id_berita', $id)->first();
            $getLike = $this->likeBerita
                ->where('id_berita', $id)
                ->where('id_user', $idUser)
                ->where('jenislike_berita', '1')->get()->items;
            $this->berita
                ->where('id_berita', $id)
                ->update([
                    'countlike_berita' => count($getLike) > 0 ? intval($getBerita['countlike_berita']) - 1 : $getBerita['countlike_berita'],
                    'countdislike_berita' => intval($getBerita['countdislike_berita']) + 1,
                    'countcomment_berita' => $getBerita['countcomment_berita'],
                    'countshare_berita' => $getBerita['countshare_berita']
                ]);

            $this->likeBerita
                ->where('id_berita', $id)
                ->where('id_user', $idUser)
                ->where('jenislike_berita', '1')->delete();
        }

        return new RedirectResponse('/news/' . $id . '/detail');
    }
}
