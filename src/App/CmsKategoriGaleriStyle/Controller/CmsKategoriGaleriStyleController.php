<?php

namespace App\CmsKategoriGaleriStyle\Controller;

use App\CmsFonts\Model\CmsFonts;
use App\CmsKategoriGaleriStyle\Model\CmsKategoriGaleriStyle;
use App\Media\Model\Media;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Route;

class CmsKategoriGaleriStyleController
{
    public $cmsKategoriGaleriStyle;
    public $cmsFonts;
    public $media;

    public function __construct()
    {
        $this->cmsKategoriGaleriStyle = new CmsKategoriGaleriStyle();
        $this->cmsFonts = new CmsFonts();
        $this->media = new Media();
    }

    public function edit(Request $request)
    {
        $detail = $this->cmsKategoriGaleriStyle->leftJoin('media', 'media.id_relation', '=', 'cms_kategori_galeri.id_cms_kategori_galeri')->first();
        $fonts = $this->cmsFonts->get();

        return render_template('admin/cms-kategori-galeri/edit', compact('detail', 'fonts'));
    }

    public function update(Request $request)
    {
        $data = $this->cmsKategoriGaleriStyle->first();
        if ($data) {
            $id = $data['id_cms_kategori_galeri'];
            $this->cmsKategoriGaleriStyle->update($request->request->all());
        } else {
            $id = $this->cmsKategoriGaleriStyle->insert($request->request->all());
        }

        $this->media->updateMedia($request->files->get('cms_icon_kategori'), [
            'id_relation' => $id,
            'jenis_dokumen' => 'cms_icon_kategori'
        ], $this->cmsKategoriGaleriStyle, $id);

        return new RedirectResponse('/admin/kategori-galeri/style');
    }
}
