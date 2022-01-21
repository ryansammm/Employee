<?php

namespace App\PartnerAdmin\Controller;

use App\ContentAdmin\SubModule\ContentAdmin\ContentAdmin;
use App\GaleriAdmin\Model\GaleriAdmin;
use App\GroupGaleri\Model\GroupGaleriNew;
use App\KategoriGaleriAdmin\Model\KategoriGaleriAdmin;
use App\Media\Model\Media;
use App\PartnerAdmin\Model\PartnerAdmin;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class PartnerAdminController
{
    public $partner_admin;
    public $media;
    public $kategoriGaleri;
    public $groupGaleri;

    public function __construct()
    {
        $this->partner_admin = new PartnerAdmin();
        $this->media = new Media();
        $this->kategoriGaleri = new KategoriGaleriAdmin();
        $this->groupGaleri = new GroupGaleriNew();
    }

    public function index(Request $request)
    {

        $datas = $this->partner_admin
            ->leftJoin('media', 'media.id_relation', '=', 'partner.id_partner')
            ->paginate(10);

        return render_template('admin/partner/index', ['datas' => $datas]);
    }

    public function create(Request $request)
    {

        return render_template('admin/partner/create', []);
    }

    public function store(Request $request)
    {

        $create = $this->partner_admin
            ->insert($request->request->all());

        $this->media->path(env('APP_MEDIA_DIR'))->storeMedia($request->files->get('partner_foto'), [
            'id_relation' => $create,
            'jenis_dokumen' => 'partner_logo',
        ]);

        return new RedirectResponse('/admin/partner');
    }

    public function edit(Request $request)
    {
        $id = $request->attributes->get('id');
        
        $partner = $this->partner_admin
            ->leftJoin('media', 'media.id_relation', '=', 'partner.id_partner')
            ->where('id_partner', $id)
            ->first();

        // data portofolio
        $request->attributes->set("id", $partner['id_galeri']);
        $content_admin = new ContentAdmin($request, new GaleriAdmin, 'detail');
        $content_admin->newQuery($this->groupGaleri, function ($model) use ($request) {
            return $model->leftJoin('media', 'media.id_relation', '=', 'group_galeri.id_group_galeri')
                ->where('id_galeri', $request->attributes->get('id'))
                ->get();
        });
        $datas = $content_admin->get();

        return render_template('admin/partner/edit', ['partner' => $partner, 'galeri' => $datas['data'], 'group_galeri' => $datas['group_galeri'], 'kategori' => $datas['data_kategori'], 'model' => $this->partner_admin]);
    }

    public function update(Request $request)
    {
        $id = $request->attributes->get('id');

        $update = $this->partner_admin
            ->where('id_partner', $id)
            ->update($request->request->all());

        $this->media->path(env('APP_MEDIA_DIR'))->updateMedia($request->files->get('partner_foto'), [
            'id_relation' => $id,
            'jenis_dokumen' => 'partner_logo',
        ], $this->partner_admin, $id);

        return new RedirectResponse('/admin/partner');
    }

    public function detail(Request $request)
    {

        $id = $request->attributes->get('id');

        $detail = $this->partner_admin
            ->where('id_table', $id)
            ->first();

        return render_template('home/detail', ['detail' => $detail]);
    }

    public function delete(Request $request)
    {

        $id = $request->attributes->get('id');

        $media_data = $this->partner_admin
            ->select('media.*')
            ->leftJoin('media', 'media.id_relation', '=', 'partner.id_partner')
            ->where('id_partner', $id)
            ->first();

        $this->media->deleteMedia($media_data);

        $delete = $this->partner_admin->where('id_partner', $id)->delete();

        return new RedirectResponse('/admin/partner');
    }
}
