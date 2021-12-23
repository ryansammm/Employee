<?php

namespace App\KomentarBerita\Controller;

use App\Berita\Model\Berita;
use App\KomentarBerita\Model\KomentarBerita;
use Core\Classes\SessionData;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class KomentarBeritaController
{
    public $komentarBerita;
    public $berita;

    public function __construct()
    {
        $this->komentarBerita = new KomentarBerita();
        $this->berita = new Berita();
    }

    public function storeComment(Request $request)
    {
        $idBerita = $request->attributes->get('id');
        $idUser = session('id_user');
        $this->komentarBerita->insert([
            'id_user' => $idUser,
            'id_berita' => $idBerita,
            'comment_text' => $request->request->get('comment'),
            'countlike_comment' => 0,
            'countdislike_comment' => 0,
            'countcomment_comment' => 0,
            'parent_comment' => $request->request->get('parent_comment'),
            'approval' => '2'
        ]);

        SessionData::get()->getFlashBag()->add('msgSuccess', "Komentar anda berhasil di tambahkan!");

        return new RedirectResponse("/news/" . $idBerita . "/detail");
    }

    public function storeCommentonReply(Request $request)
    {
        $idComment = $request->attributes->get('id');
        $idUser = session('id_user');
        $getComment = $this->model->selectOne($idComment);
        $getComment['commentonComment'] = $idComment;
        $getComment['countcommentComment'] = intval($getComment['countcommentComment']) + 1;

        $this->model->create($request->request, $getComment['idBerita'], $idUser, $idComment);
        $getComment['commentonComment'] = null;
        $this->model->update($getComment, $getComment['idBerita'], $idUser, $idComment);

        $this->session->getFlashBag()->add('msgSuccess', "Komentar anda berhasil di tambahkan!");

        return new RedirectResponse("/informasi/berita/" . $getComment['idBerita']);
    }

    public function komentarBeritaApprovalStore(Request $request)
    {
        $id = $request->attributes->get('id');
        if ($request->request->get('approvalKomentar') == '1') {
            $this->model->approvalKomentar($id, $request->request->get('approvalKomentar'));
        } else {
            $this->model->delete($id);
        }

        return new RedirectResponse('/informasi-kesbangpol/komentar/approval');
    }
}
