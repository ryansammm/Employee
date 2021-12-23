<?php

namespace App\LikeBeritaKomentar\Controller;

use App\KomentarBerita\Model\KomentarBerita;
use App\LikeBeritaKomentar\Model\LikeBeritaKomentar;
use App\Media\Model\Media;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class LikeBeritaKomentarController
{
    public $likeBerita;
    public $media;
    public $komentarBerita;

    public function __construct()
    {
        $this->likeBeritaKomentar = new LikeBeritaKomentar();
        $this->media = new Media();
        $this->komentarBerita = new KomentarBerita();
    }

    public function storeLike(Request $request)
    {
        $id_berita = $request->attributes->get('id_berita');
        $id_komentar = $request->attributes->get('id_komentar');
        $idUser = session('id_user');
        $get = $this->likeBeritaKomentar
            ->where('id_user', $idUser)
            ->where('id_berita', $id_berita)
            ->where('id_berita_comment', $id_komentar)
            ->where('jenislike_comment', '1')->get()->items;

        if (count($get) < 1) {
            $this->likeBeritaKomentar->insert([
                'id_user' => $idUser,
                'id_berita' => $id_berita,
                'id_berita_comment' => $id_komentar,
                'jenislike_comment' => '1',
            ]);

            $getKomentarBerita = $this->komentarBerita
                ->where('id_berita_comment', $id_komentar)
                ->where('id_berita', $id_berita)->first();
            $getDislike = $this->likeBeritaKomentar
                ->where('id_berita', $id_berita)
                ->where('id_user', $idUser)
                ->where('id_berita_comment', $id_komentar)
                ->where('jenislike_comment', '2')->get()->items;
            $this->komentarBerita
                ->where('id_berita_comment', $id_komentar)
                ->where('id_berita', $id_berita)
                ->update([
                    'countlike_comment' => intval($getKomentarBerita['countlike_comment']) + 1,
                    'countdislike_comment' => count($getDislike) > 0 ? intval($getKomentarBerita['countdislike_comment']) - 1 : $getKomentarBerita['countdislike_comment'],
                ]);

            $this->likeBeritaKomentar
                ->where('id_berita', $id_berita)
                ->where('id_user', $idUser)
                ->where('id_berita_comment', $id_komentar)
                ->where('jenislike_comment', '2')->delete();
        }

        return new RedirectResponse('/news/' . $id_berita . '/detail');
    }

    public function storeDislike(Request $request)
    {
        $id_berita = $request->attributes->get('id_berita');
        $id_komentar = $request->attributes->get('id_komentar');
        $idUser = session('id_user');
        $get = $this->likeBeritaKomentar
            ->where('id_user', $idUser)
            ->where('id_berita', $id_berita)
            ->where('id_berita_comment', $id_komentar)
            ->where('jenislike_comment', '2')->get()->items;

        if (count($get) < 1) {
            $this->likeBeritaKomentar->insert([
                'id_user' => $idUser,
                'id_berita' => $id_berita,
                'id_berita_comment' => $id_komentar,
                'jenislike_comment' => '2',
            ]);

            $getKomentarBerita = $this->komentarBerita
                ->where('id_berita_comment', $id_komentar)
                ->where('id_berita', $id_berita)->first();
            $getLike = $this->likeBeritaKomentar
                ->where('id_berita', $id_berita)
                ->where('id_user', $idUser)
                ->where('id_berita_comment', $id_komentar)
                ->where('jenislike_comment', '1')->get()->items;
            $this->komentarBerita
                ->where('id_berita_comment', $id_komentar)
                ->where('id_berita', $id_berita)
                ->update([
                    'countlike_comment' => count($getLike) > 0 ? intval($getKomentarBerita['countlike_comment']) - 1 : $getKomentarBerita['countlike_comment'],
                    'countdislike_comment' => intval($getKomentarBerita['countdislike_comment']) + 1,
                ]);

            $this->likeBeritaKomentar
                ->where('id_berita', $id_berita)
                ->where('id_user', $idUser)
                ->where('id_berita_comment', $id_komentar)
                ->where('jenislike_comment', '1')->delete();
        }

        return new RedirectResponse('/news/' . $id_berita . '/detail');
    }
}
