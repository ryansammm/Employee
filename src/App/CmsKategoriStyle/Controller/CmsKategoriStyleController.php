<?php

namespace App\CmsKategoriStyle\Controller;

use App\CmsFonts\Model\CmsFonts;
use App\CmsKategoriStyle\Model\CmsKategoriStyle;
use App\Media\Model\Media;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class CmsKategoriStyleController
{
    public $cmsKategoriStyle;
    public $cmsFonts;
    public $media;

    public function __construct()
    {
        $this->cmsKategoriStyle = new CmsKategoriStyle();
        $this->cmsFonts = new CmsFonts();
        $this->media = new Media();
    }

    public function edit(Request $request)
    {
        $detail = $this->cmsKategoriStyle
            ->leftJoin('media', 'media.id_relation', '=', 'cms_kategori_galeri.id_cms_kategori_galeri')
            ->where('cms_jenis_kategori', 'jejak-kami')->first();
        $fonts = $this->cmsFonts->get();

        return render_template('admin/cms-kategori-galeri/edit', compact('detail', 'fonts'));
    }

    public function update(Request $request)
    {
        $data = $this->cmsKategoriStyle->where('cms_jenis_kategori', 'jejak-kami')->first();
        if ($data) {
            $id = $data['id_cms_kategori_galeri'];
            $this->cmsKategoriStyle->where('cms_jenis_kategori', 'jejak-kami')->update($request->request->all());
        } else {
            $request->request->set('cms_jenis_kategori', 'jejak-kami');
            $id = $this->cmsKategoriStyle->insert($request->request->all());
        }

        $this->media->updateMedia($request->files->get('cms_icon_kategori'), [
            'id_relation' => $id,
            'jenis_dokumen' => 'cms_icon_kategori'
        ], $this->cmsKategoriStyle, $id);

        return new RedirectResponse('/admin/kategori-galeri/style');
    }
}
