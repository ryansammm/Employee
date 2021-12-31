<?php

namespace App\ProfileTeam\Controller;

use App\Bank\Model\Bank;
use App\Jabatan\Model\Jabatan;
use App\Jabatan\Model\JabatanKaryawan;
use App\Media\Model\Media;
use App\ProfileTeam\Model\ProfileTeam;
use Core\Classes\SessionData;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;

class ProfileTeamController
{
    public $profileTeam;
    public $jabatan;
    public $jabatanProfile;

    public function __construct()
    {
        $this->profileTeam = new ProfileTeam();
        $this->jabatan = new Jabatan();
        $this->jabatanProfile = new JabatanKaryawan();
    }

    public function index(Request $request)
    {
        $datas = $this->profileTeam
            ->leftJoin('media', 'media.id_relation', '=', 'profile_team.id_profile_team')
            ->paginate(10);

        return render_template('admin/profile-team/index', ['datas' => $datas]);
    }

    public function create(Request $request)
    {
        $errors = SessionData::get()->getFlashBag()->get('errors', []);
        $jabatan = $this->jabatan->get();

        return render_template('admin/profile-team/create', ['errors' => $errors, 'jabatan' => $jabatan]);
    }

    public function store(Request $request)
    {
        $datas = $request->request->all();
        $request->request->set('hide', '2');
        $create = $this->profileTeam->insert($datas);

        foreach ($datas['jabatan'] as $key => $value) {
            $this->jabatanProfile->insert([
                'id_karyawan' => $create,
                'id_jabatan' => $value,
                'hide' => '2'
            ]);
        }

        $media = new Media();
        $media->storeMedia($request->files->get('profile_foto'), [
            'id_relation' => $create,
            'jenis_dokumen' => '',
        ]);

        return new RedirectResponse('/admin/profile-team');
    }

    public function edit(Request $request)
    {
        $id = $request->attributes->get("id");
        $detail = $this->profileTeam->leftJoin('media', 'media.id_relation', '=', 'profile_team.id_profile_team')->where('id_profile_team', $id)->first();
        $jabatan = $this->jabatan->get();
        $jabatanProfile = $this->jabatanProfile->leftJoin('jabatan', 'jabatan.id_jabatan', '=', 'karyawan_jabatan.id_jabatan')->where('id_karyawan', $id)->get();
        $selectJabatan = function($datas, $id_jabatan) {
            foreach ($datas as $key => $data) {
                return $data['id_jabatan'] == $id_jabatan ? true : false;
            }
        };
        
        return render_template('admin/profile-team/edit', ['detail' => $detail, 'jabatan' => $jabatan, 'jabatanProfile' => $jabatanProfile, 'selectJabatan' => $selectJabatan]);
    }

    public function update(Request $request)
    {
        $id = $request->attributes->get("id");
        $datas = $request->request->all();
        $this->profileTeam->where('id_profile_team', $id)->update($datas);

        $this->jabatanProfile->where('id_karyawan', $id)->delete();
        foreach ($datas['jabatan'] as $key => $value) {
            $this->jabatanProfile->insert([
                'id_karyawan' => $id,
                'id_jabatan' => $value,
                'hide' => '2'
            ]);
        }

        $media = new Media();
        $media->updateMedia($request->files->get('profile_foto'), [
            'id_relation' => $id,
            'jenis_dokumen' => '',
        ], $this->profileTeam, $id);

        return new RedirectResponse('/admin/profile-team');
    }

    public function delete(Request $request)
    {
        $id = $request->attributes->get('id');

        $this->jabatanProfile->where('id_karyawan', $id)->delete();

        $media = new Media();
        $media_data = $this->profileTeam->select('media.*')->leftJoin('media', 'media.id_relation', '=', 'profile_team.id_profile_team')->where('id_profile_team', $id)->first();
        $this->profileTeam->where('id_profile_team', $id)->delete();
        $media->deleteMedia($media_data);

        return new RedirectResponse('/admin/profile-team');
    }
}