<?php

namespace App\ProfilAdmin\Controller;

use App\Media\Model\Media;
use App\ProfilAdmin\Model\ProfilAdmin;
use Core\Classes\SessionData;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class ProfilAdminController
{
    public $profilAdmin;

    public function __construct()
    {
        $this->profilAdmin = new ProfilAdmin();
    }

    public function store(Request $request)
    {
        /* --------------------------------- Request -------------------------------- */
        $request->request->set('id_user', SessionData::get('id_user'));

        /* ------------------------------ Create Profil ----------------------------- */
        $request->request->set('deskripsi_profil', htmlspecialchars($request->request->get('deskripsi_profil')));

        $create = $this->profilAdmin->insert($request->request->all());

        /* ------------------------------ Media Profil ------------------------------ */
        $media = new Media();
        $media->storeMedia($request->files->get('profil_foto'), [
            'id_relation' => $create,
            'jenis_dokumen' => '',
        ]);

        return new RedirectResponse('/admin/profil');
    }

    public function edit(Request $request)
    {
        $profil = $this->profilAdmin->leftJoin('media', 'media.id_relation', '=', 'profil.id_profil')->where('id_profil', session('id_user'))->first();

        return render_template('admin/profil/edit', ['profil' => $profil]);
    }

    public function update(Request $request)
    {
        $id = session('id_user');
        $media = new Media();

        $query = $this->profilAdmin->select('media.*', 'profil.*')->leftJoin('media', 'media.id_relation', '=', 'profil.id_profil')->where('id_profil', $id);
        $datas = $query->first();

        if ($datas) {
            $query->update($request->request->all());
        } else {
            $request->request->set('id_profil', $id);
            $this->profilAdmin->insert($request->request->all());
        }

        $media->updateMedia($request->files->get('profil_foto'), [
            'id_relation' => $id,
            'jenis_dokumen' => '',
        ], $this->profilAdmin, $id);

        return new RedirectResponse('/admin/profil');
    }

    public function delete(Request $request)
    {

        $id = $request->attributes->get("id");

        $media = new Media();
        $media_data = $this->profilAdmin->select('media.*')->leftJoin('media', 'media.id_relation', '=', 'profil.id_profil')->where('id_profil', $id)->first();
        $this->profilAdmin->where('id_profil', $id)->delete();
        $media->deleteMedia($media_data);

        return new RedirectResponse('/admin/profil');
    }
}
