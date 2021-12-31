<?php

namespace App\KomentarBeritaAdmin\Controller;

use App\Berita\Model\Berita;
use App\KomentarBerita\Model\KomentarBerita;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class KomentarBeritaAdminController
{
    public $komentarBerita;
    public $berita;

    public function __construct()
    {
        $this->komentarBerita = new KomentarBerita();
        $this->berita = new Berita();
    }

    public function index(Request $request)
    {
        $datas = $this->komentarBerita
            ->leftJoin('berita', 'berita.id_berita', '=', 'berita_comment.id_berita')
            ->paginate(10);

        return render_template('admin/komentar-berita/index', compact('datas'));
    }

    public function edit(Request $request)
    {
        $id = $request->attributes->get('id');
        $detail = $this->komentarBerita
            ->leftJoin('berita', 'berita.id_berita', '=', 'berita_comment.id_berita')
            ->where('id_berita_comment', $id)->first();

        return render_template('admin/komentar-berita/edit', compact('detail'));
    }

    public function update(Request $request)
    {
        $id = $request->attributes->get('id');
        $this->komentarBerita
            ->where('id_berita_comment', $id)
            ->update($request->request->all());

        return new RedirectResponse('/admin/komentar-berita');
    }

    public function approve(Request $request)
    {
        $id = $request->attributes->get('id');
        $status = $request->attributes->get('status') == '1' ? '1' : '2';

        $komentar_berita = $this->komentarBerita->where('id_berita_comment', $id)->first();
        $parent_komentar_berita = $this->komentarBerita->where('id_berita_comment', $komentar_berita['parent_comment'])->first();

        if ($status == '1') {
            if ($komentar_berita['parent_comment'] == null) {
                // update count comment berita
                $getBerita = $this->berita->where('id_berita', $id)->first();
                $this->berita
                    ->where('id_berita', $komentar_berita['id_berita'])
                    ->update([
                        'countcomment_berita' => intval($getBerita['countcomment_berita']) + 1,
                    ]);
            } else if ($komentar_berita['parent_comment'] != null) {
                // update count comment on comment
                $this->komentarBerita
                    ->where('id_berita_comment', $komentar_berita['parent_comment'])
                    ->update([
                        'countcomment_comment' => intval($parent_komentar_berita['countcomment_comment']) + 1,
                    ]);
            }
        }

        // update approval komentar
        $this->komentarBerita
            ->where('id_berita_comment', $id)
            ->update([
                'approval' => $status,
            ]);


        return new RedirectResponse('/admin/komentar-berita');
    }

    public function delete(Request $request)
    {
        $id = $request->attributes->get('id');
        $this->komentarBerita->where('id_berita_comment', $id)->delete();

        return new RedirectResponse('/admin/komentar-berita');
    }
}