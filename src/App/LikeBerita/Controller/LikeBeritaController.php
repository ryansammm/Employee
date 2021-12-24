<?php

namespace App\LikeBerita\Controller;

use App\Berita\Model\Berita;
use App\LikeBerita\Model\LikeBerita;
use App\LikeBeritaModule\SubModule\DislikeBerita\DislikeBeritaInitiator;
use App\LikeBeritaModule\SubModule\LikeBerita\LikeBeritaInitiator;
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
        $id_berita = $request->attributes->get('id');
        $id_user = session('id_user');

        $like_berita = new LikeBeritaInitiator($id_berita, $id_user);
        $like_berita->store();

        return new RedirectResponse('/news/' . $id_berita . '/detail');
    }

    public function storeDislike(Request $request)
    {
        $id_berita = $request->attributes->get('id');
        $id_user = session('id_user');
        
        $dislike_berita = new DislikeBeritaInitiator($id_berita, $id_user);
        $dislike_berita->store();

        return new RedirectResponse('/news/' . $id_berita . '/detail');
    }
}