<?php

namespace App\Pelamar\Controller;

use App\Media\Model\Media;
use App\Pelamar\Model\Pelamar;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class PelamarController
{
    public $pelamar;
    public $media;

    public function __construct()
    {
        $this->pelamar = new Pelamar();
        $this->media = new Media();
    }

    public function index(Request $request)
    {

        $datas = $this->pelamar->paginate(10);

        return render_template('admin/pelamar/index', ['datas' => $datas]);
    }

    public function create(Request $request)
    {

        return render_template('admin/pelamar/create', []);
    }

    public function store(Request $request)
    {

        $create = $this->pelamar
            ->insert($request->request->all());

        $request->request->set('hide', '2');
        $datas = $request->request->all();
        // dd($datas);

        /* -------------------------------- Karyawan -------------------------------- */
        $create = $this->karyawan->insert($datas);
        /* -------------------------------------------------------------------------- */

        /* ---------------------------- Karyawan Jabatan ---------------------------- */
        $create_karyawan_jabatan = $this->karyawanJabatan->insert([
            [
                'id_karyawan' => $create,
                'id_jabatan' => $datas['id_jabatan'],
                'hide' => '2',
            ]
        ]);
        /* -------------------------------------------------------------------------- */

        /* ----------------------------- Karyawan Divisi ---------------------------- */
        $create_karyawan_divisi = $this->karyawanDivisi->insert([
            'id_relation' => $create,
            'nama_divisi' => $datas['nama_divisi'],
            'hide' => '2',
        ]);
        /* -------------------------------------------------------------------------- */

        /* ----------------------------- Karyawan Bidang ---------------------------- */
        $create_karyawan_bidang = $this->karyawanBidang->insert([
            'id_bidang' => $datas['id_bidang'],
            'id_relation' => $create,
            'hide' => '2',
        ]);
        /* -------------------------------------------------------------------------- */

        /* ---------------------------- Pendidikan Formal --------------------------- */
        foreach ($datas['pendidikan'] as $key => $value) {

            if ($datas['jenis_pendidikan'][$key] == 1 || $datas['jenis_pendidikan'][$key] == 2) {
                $jurusan = NULL;
            } else {
                $jurusan = $datas['jurusan_pendidikan'][$key];
            }

            $create_pendidikan_formal = $this->pendidikanFormal->insert(
                [
                    'id_relation' => $create,
                    'nama_sekolah' => $datas['pendidikan'][$key],
                    'tahun_lulus' => $datas['tahun_pendidikan'][$key],
                    'jurusan' => $jurusan,
                    'jenis_pendidikan' => $datas['jenis_pendidikan'][$key],
                ]
            );
        }
        /* -------------------------------------------------------------------------- */

        /* -------------------------- Pendidikan Non Formal ------------------------- */
        foreach ($datas['lembaga_pendidikan_nonformal'] as $key => $value) {
            $create_pendidikan_non_formal = $this->pendidikanNonFormal->insert(
                [
                    'id_relation' => $create,
                    'nama_lembaga' => $datas['lembaga_pendidikan_nonformal'][$key],
                    'periode_tahun' => $datas['tahun_nonformal'][$key],
                    'deskripsi' => $datas['deskripsi_nonformal'][$key],
                    'status' => '1'
                ]
            );
        }
        /* -------------------------------------------------------------------------- */

        /* -------------------------------- Kemampuan ------------------------------- */
        foreach ($datas['nama_kemampuan'] as $key => $value) {
            $create_kemampuan = $this->kemampuan->insert(
                [
                    'id_relation' => $create,
                    'nama_kemampuan' => $datas['nama_kemampuan'][$key],
                    'tingkat_kemampuan' => $datas['tingkat_kemampuan'][$key],
                    'hide' => '2'
                ]
            );
        }
        /* -------------------------------------------------------------------------- */

        /* ---------------------- Keluarga Yang Bisa Dihubungi ---------------------- */
        $request->request->set('id_karyawan', $create);
        $request->request->set('hide_kontak_alt', '2');
        $create_kontak_alt = $this->karyawanKontakAlt->insert($request->request->all());
        /* -------------------------------------------------------------------------- */

        /* -------------------------- Pengalaman Organisasi ------------------------- */
        foreach ($datas['lembaga_organisasi'] as $key => $value) {
            $create_pengalaman_organisasi = $this->pengalamanOrganisasi->insert(
                [
                    'id_relation' => $create,
                    'nama_organisasi' => $datas['lembaga_organisasi'][$key],
                    'jabatan_organisasi' => $datas['jabatan_organisasi'][$key],
                    'periode_aktif' => $datas['periode_aktif_organisasi'][$key],
                    'status' => '1'
                ]
            );
        }
        /* -------------------------------------------------------------------------- */

        /* -------------------------- Pengalaman Pekerjaan -------------------------- */
        foreach ($datas['nama_lembaga_pekerjaan'] as $key => $value) {
            $create_pengalaman_pekerjaan = $this->pengalamanPekerjaan->insert([
                'id_relation' => $create,
                'nama_lembaga' => $datas['nama_lembaga_pekerjaan'][$key],
                'nama_pekerjaan' => $datas['nama_pekerjaan'][$key],
                'lokasi_lembaga' => $datas['lokasi_pekerjaan'][$key],
                'periode_pelaksanaan' => $datas['periode_pelaksanaan_pekerjaan'][$key],
            ]);
        }
        /* -------------------------------------------------------------------------- */

        /* ------------------------------ Profile Foto ------------------------------ */
        $media = new Media();
        $media->path(env('APP_MEDIA_DIR'))->storeMedia($request->files->get('profile_foto'), [
            'id_relation' => $create,
            'jenis_dokumen' => 'foto_profile',
        ]);
        /* -------------------------------------------------------------------------- */


        /* ---------------------------- Dokumen Pendukung --------------------------- */
        foreach (array_keys($request->files->all()) as $key2 => $value2) {

            if ($value2 == 'file_sertifikat') {
                foreach ($request->files->get('file_sertifikat') as $key => $value) {
                    $media->path(env('APP_MEDIA_DIR'))->updateMedia($value, [
                        'id_relation' => $create,
                        'jenis_dokumen' => 'file_sertifikat',
                    ], $this->karyawan, $create);
                }
            }

            if ($value2 != 'profile_foto') {
                if ($value2 != 'file_sertifikat') {
                    // dd($request->files->get($value2));
                    $media->path(env('APP_MEDIA_DIR'))->updateMedia($request->files->get($value2), [
                        'id_relation' => $create,
                        'jenis_dokumen' => $value2,
                    ], $this->karyawan, $create);
                }
            }
        }
        /* -------------------------------------------------------------------------- */

        return new RedirectResponse('/home');
    }

    public function edit(Request $request)
    {

        $id = $request->attributes->get('id');

        $detail = $this->pelamar
            ->where('id_table', $id)
            ->first();

        return render_template('home/edit', ['detail' => $detail]);
    }

    public function update(Request $request)
    {
        $id = $request->attributes->get('id');

        $update = $this->pelamar->update($request->request->all());


        $this->media->updateMedia($request->files->get('nama_input'), [
            'id_relation' => $id,
            'jenis_dokumen' => 'jenis',
        ], $this->pelamar, $id);

        return new RedirectResponse('/home');
    }

    public function detail(Request $request)
    {

        $id = $request->attributes->get('id');

        $detail = $this->pelamar
            ->where('id_table', $id)
            ->first();

        return render_template('home/detail', ['detail' => $detail]);
    }

    public function delete(Request $request)
    {

        $id = $request->attributes->get('id');

        $media_data = $this->pelamar
            ->select('media.*')
            ->leftJoin('media', 'media.id_relation', '=', 'table.id_table')
            ->where('id_table', $id)
            ->first();
        $this->media->deleteMedia($media_data);

        $delete = $this->pelamar->where('id_table', $id)->delete();

        return new RedirectResponse('/home');
    }
}
