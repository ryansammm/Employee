<?php

namespace App\Profile\Controller;

use App\Media\Model\Media;
use App\Users\Model\Users;
use Core\Classes\SessionData;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class ProfileController
{
    public $users;

    public function __construct()
    {
        $this->users = new Users();
    }

    public function index(Request $request)
    {
        $id = SessionData::get('id_user');
        $detail = $this->users->leftJoin('media', 'media.id_relation', '=', 'users.id_user')->where('id_user', $id)->first();

        return render_template('admin/profile-saya/index', compact('detail'));
    }

    public function update(Request $request)
    {
        $id = SessionData::get('id_user');
        $request->request->set('nama_user', $request->request->get('nama_depan'));
        $this->users->where('id_user', $id)->update($request->request->all());

        $media = new Media();
        $media->updateMedia($_FILES['foto_profil'], [
            'id_relation' => $id,
            'jenis_dokumen' => '',
        ], $this->users, $id);

        foreach ($request->request->all() as $key => $value) {
            SessionData::get()->set($key, $value);
        }

        SessionData::get()->getFlashBag()->add('success', 'Registrasi berhasil!');

        return new RedirectResponse('/admin/profile-saya');
    }

    
}
