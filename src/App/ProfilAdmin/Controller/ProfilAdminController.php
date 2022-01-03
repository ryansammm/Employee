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
        $profil = $this->profilAdmin->leftJoin('media', 'media.id_relation', '=', 'profil.id_profil')->first();
        $media = new Media();
        $sotk = $media->where('id_relation', $profil['id_profil'])->where('jenis_dokumen', 'struktur_organisasi')->first();

        return render_template('admin/profil/edit', ['profil' => $profil, 'sotk' => $sotk]);
    }

    public function update(Request $request)
    {
        $media = new Media();

        $query = $this->profilAdmin->select('media.*', 'profil.*')->leftJoin('media', 'media.id_relation', '=', 'profil.id_profil');
        $datas = $query->first();

        if ($datas) {
            $id_profil = $datas['id_profil'];
            $query->update($request->request->all());
        } else {
            $id_profil = $this->profilAdmin->insert($request->request->all());
        }

        $media->updateMedia($request->files->get('profil_foto'), [
            'id_relation' => $id_profil,
            'jenis_dokumen' => 'profil_foto',
        ], $this->profilAdmin, $id_profil);

        $media->updateMedia($request->files->get('struktur_organisasi'), [
            'id_relation' => $id_profil,
            'jenis_dokumen' => 'struktur_organisasi',
        ], $this->profilAdmin, $id_profil);

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
