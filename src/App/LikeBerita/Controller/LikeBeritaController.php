<?php

namespace App\LikeBerita\Controller;

use App\Berita\Model\Berita;
use App\LikeBerita\Model\LikeBerita;
use App\Media\Model\Media;
use Core\GlobalFunc;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class LikeBeritaController extends GlobalFunc
{
    public $model;
    public $model2;

    public function __construct()
    {
        $this->model = new LikeBerita();
        $this->model2 = new Media();
        parent::beginSession();
    }

    public function storeLikeBerita(Request $request)
    {
        $id = $request->attributes->get('id');
        $idUser = $this->session->get('idUser');
        $get = $this->model->selectAll("WHERE likeberita.idBerita = '$id' AND likeberita.idUser = '$idUser' AND jenislikeBerita = '1'");
        if (count($get) < 1) {
            $this->model->create($request->request, $id, $idUser, '1');
            $getDislike = $this->model->selectAll("WHERE likeberita.idBerita = '$id' AND likeberita.idUser = '$idUser' AND jenislikeBerita = '2'");

            $berita = new Berita();
            $getBerita = $berita->selectOne($id);
            $berita->updateLikeComment($id, [
                'countlikeBerita' => intval($getBerita['countlikeBerita']) + 1,
                'countdislikeBerita' => count($getDislike) > 0 ? intval($getBerita['countdislikeBerita']) - 1 : $getBerita['countdislikeBerita'],
                'countcommentBerita' => $getBerita['countcommentBerita'],
                'countshareBerita' => $getBerita['countshareBerita']
            ]);

            $this->model->delete("WHERE likeberita.idBerita = '$id' AND likeberita.idUser = '$idUser' AND jenislikeBerita = '2'");
        }

        return new RedirectResponse('/informasi/berita/' . $id);
    }

    public function storeDislikeBerita(Request $request)
    {
        $id = $request->attributes->get('id');
        $idUser = $this->session->get('idUser');
        $get = $this->model->selectAll("WHERE likeberita.idBerita = '$id' AND likeberita.idUser = '$idUser' AND jenislikeBerita = '2'");
        if (count($get) < 1) {
            $this->model->create($request->request, $id, $idUser, '2');
            $getLike = $this->model->selectAll("WHERE likeberita.idBerita = '$id' AND likeberita.idUser = '$idUser' AND jenislikeBerita = '1'");

            $berita = new Berita();
            $getBerita = $berita->selectOne($id);
            $berita->updateLikeComment($id, [
                'countlikeBerita' => count($getLike) > 0 ? intval($getBerita['countlikeBerita']) - 1 : $getBerita['countlikeBerita'],
                'countdislikeBerita' => intval($getBerita['countdislikeBerita']) + 1,
                'countcommentBerita' => $getBerita['countcommentBerita'],
                'countshareBerita' => $getBerita['countshareBerita']
            ]);

            $this->model->delete("WHERE likeberita.idBerita = '$id' AND likeberita.idUser = '$idUser' AND jenislikeBerita = '1'");
        }

        return new RedirectResponse('/informasi/berita/' . $id);
    }

    public function storeComment(Request $request)
    {
        $idBerita = $request->attributes->get('id');
        $idUser = $this->session->get('idUser');
        $this->model->create($request->request, $idBerita, $idUser);

        $berita = new Berita();
        $getBerita = $berita->selectOne($idBerita);
        $berita->updateLikeComment($idBerita, [
            'countlikeBerita' => $getBerita['countlikeBerita'],
            'countdislikeBerita' => $getBerita['countdislikeBerita'],
            'countcommentBerita' => intval($getBerita['countcommentBerita']) + 1,
            'countshareBerita' => $getBerita['countshareBerita']
        ]);

        $this->session->getFlashBag()->add('msgSuccess', "Komentar anda berhasil di tambahkan!");

        return new RedirectResponse("/informasi/berita/" . $idBerita);
    }

    public function storeCommentonReply(Request $request)
    {
        $idComment = $request->attributes->get('id');
        $idUser = $this->session->get('idUser');
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

    public function ReadOne(Request $request)
    {
        $id = $request->attributes->get('id');
        $datas = $this->model->selectOne($id);

        return $this->render_template('informasi/pengumuman/edit', ['idPengumuman' => $datas['idPengumuman'], 'namaPengumuman' => $datas['namaPengumuman'], 'deskripsiPengumuman' => $datas['deskripsiPengumuman']]);
    }
    public function update(Request $request)
    {
        $id = $request->request->get('id');
        $namaPengumuman = $request->request->get('namaPengumuman');
        $deskripsiPengumuman = $request->request->get('deskripsiPengumuman');

        $id = $request->attributes->get('id');
        $data_test = array(
            'namaPengumuman' => $namaPengumuman,
            'deskripsiPengumuman' => $deskripsiPengumuman,
        );


        $this->model->update($id, $data_test);

        return new RedirectResponse("/informasi/pengumuman");
    }
    public function delete(Request $request)
    {
        $id = $request->attributes->get('id');
        $this->model->delete($id);


        return new RedirectResponse("/informasi/pengumuman");
    }

    public function detail(Request $request)
    {
        $id = $request->attributes->get('id');
        $datas = $this->model->selectOne($id);

        return $this->render_template('/informasi/pengumuman/detail', ['detail' => $datas]);
    }
}
