<?php

namespace App\About\Controller;

use App\About\Model\About;
use App\Jabatan\Model\JabatanKaryawan;
use App\Karyawan\Model\Karyawan;
use App\Media\Model\Media;
use App\ProfileTeam\Model\ProfileTeam;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class AboutController
{
    public $model;

    public function __construct()
    {
        $this->model = new About();
        $this->team = new ProfileTeam();
        $this->karyawanJabatan = new JabatanKaryawan();
    }

    public function index(Request $request)
    {
        $media = new Media();
        $data_profil = $this->model
            ->leftJoin('media', 'media.id_relation', '=', 'profil.id_profil')->get();

        /* ------------------------------ Data Direksi ------------------------------ */
        $data_direksi = $this->team
            ->leftJoin('media', 'media.id_relation', '=', 'profile_team.id_profile_team')
            ->where('jenis_profile', '1')
            ->get();

        foreach ($data_direksi->items as $key => $value) {
            $jabatan_direksi = $this->karyawanJabatan
                ->leftJoin('jabatan', 'jabatan.id_jabatan', '=', 'karyawan_jabatan.id_jabatan')
                ->where('id_karyawan', $value['id_profile_team'])
                ->get();

            $data_direksi->items[$key]['nama_jabatan'] = $jabatan_direksi->items;
        }
        /* -------------------------------------------------------------------------- */

        /* ----------------------------- Data Manajerial ---------------------------- */
        $data_manajerial = $this->team
            ->leftJoin('media', 'media.id_relation', '=', 'profile_team.id_profile_team')
            ->where('jenis_profile', '2')
            ->get();

        foreach ($data_manajerial->items as $key => $value) {
            $jabatan_manajerial = $this->karyawanJabatan
                ->leftJoin('jabatan', 'jabatan.id_jabatan', '=', 'karyawan_jabatan.id_jabatan')
                ->where('id_karyawan', $value['id_profile_team'])
                ->get();

            $data_manajerial->items[$key]['nama_jabatan'] = $jabatan_manajerial->items;
        }
        /* -------------------------------------------------------------------------- */

        /* -------------------------- Data Staff & Karyawan ------------------------- */
        $data_staff = $this->team
            ->leftJoin('media', 'media.id_relation', '=', 'profile_team.id_profile_team')
            ->where('jenis_profile', '3')
            ->get();

        foreach ($data_staff->items as $key => $value) {
            $jabatan_staff = $this->karyawanJabatan
                ->leftJoin('jabatan', 'jabatan.id_jabatan', '=', 'karyawan_jabatan.id_jabatan')
                ->where('id_karyawan', $value['id_profile_team'])
                ->get();

            $data_staff->items[$key]['nama_jabatan'] = $jabatan_staff->items;
        }
        /* -------------------------------------------------------------------------- */

        return render_template('public/about/index', ['data_profil' => $data_profil, 'data_direksi' => $data_direksi, 'data_manajerial' => $data_manajerial, 'data_staff' => $data_staff]);
    }

    public function create(Request $request)
    {

        return render_template('public/about/create', []);
    }

    public function store(Request $request)
    {

        return new RedirectResponse('/about');
    }

    public function edit(Request $request)
    {


        return render_template('public/about/edit', []);
    }

    public function update(Request $request)
    {

        return new RedirectResponse('/about');
    }

    public function delete(Request $request)
    {

        return new RedirectResponse('/about');
    }

    public function detailTeam(Request $request)
    {


        return render_template('public/about/detail-team', []);
    }

    public function get(Request $request)
    {
        $id = $request->attributes->get('id');

        $datas = $this->team
            ->leftJoin('media', 'media.id_relation', '=', 'profile_team.id_profile_team')
            ->where('id_profile_team', $id)
            ->first();

        $jabatan = $this->karyawanJabatan
            ->leftJoin('jabatan', 'jabatan.id_jabatan', '=', 'karyawan_jabatan.id_jabatan')
            ->where('id_karyawan', $id)
            ->get();

        $datas['nama_jabatan'] = $jabatan->items;




        return new JsonResponse($datas);
    }
}
