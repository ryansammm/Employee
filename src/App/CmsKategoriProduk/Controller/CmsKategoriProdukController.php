<?php

namespace App\CmsKategoriProduk\Controller;

use App\CmsFonts\Model\CmsFonts;
use App\CmsKategoriStyle\Model\CmsKategoriStyle;
use App\Media\Model\Media;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class CmsKategoriProdukController
{
    public $cmsKategoriStyle;
    public $cmsFonts;
    public $media;
    public $cms_jenis_kategori;

    public function __construct()
    {
        $this->cmsKategoriStyle = new CmsKategoriStyle();
        $this->cmsFonts = new CmsFonts();
        $this->media = new Media();
        $this->cms_jenis_kategori = 'produk-kami';
    }

    public function edit(Request $request)
    {
        $detail = $this->cmsKategoriStyle
            ->leftJoin('media', 'media.id_relation', '=', 'cms_kategori_menu.id_cms_kategori_menu')
            ->where('cms_jenis_kategori', $this->cms_jenis_kategori)->first();
        $fonts = $this->cmsFonts->get();

        return render_template('admin/cms-kategori-produk/edit', compact('detail', 'fonts'));
    }

    public function update(Request $request)
    {
        $data = $this->cmsKategoriStyle->where('cms_jenis_kategori', $this->cms_jenis_kategori)->first();
        if ($data) {
            $id = $data['id_cms_kategori_menu'];
            $this->cmsKategoriStyle->where('cms_jenis_kategori', $this->cms_jenis_kategori)->update($request->request->all());
        } else {
            $request->request->set('cms_jenis_kategori', $this->cms_jenis_kategori);
            $id = $this->cmsKategoriStyle->insert($request->request->all());
        }

        $this->media->updateMedia($request->files->get('cms_icon_kategori'), [
            'id_relation' => $id,
            'jenis_dokumen' => 'cms_icon_kategori'
        ], $this->cmsKategoriStyle, $id);

        return new RedirectResponse('/admin/kategori-produk/style');
    }
}
