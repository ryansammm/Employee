<?php

namespace App\CmsKategoriStyle\Model;

use App\CmsFonts\Model\CmsFonts;

class CmsKategoriModule
{
    public $cmsKategoriStyle;
    public $cmsFonts;
    public $cms_jenis_kategori;

    public function __construct(string $cms_jenis_kategori)
    {
        $this->cms_jenis_kategori = $cms_jenis_kategori;
        $this->cmsKategoriStyle = new CmsKategoriStyle();
        $this->cmsFonts = new CmsFonts();
    }

    public function getCmsKategori()
    {
        $cms_kategori_style = $this->cmsKategoriStyle
            ->select('media_icon_kategori.path_media as icon_kategori', 'media_font.path_media as font_face', 'cms_fonts.*', 'cms_kategori_menu.*')
            ->leftJoin('media as media_icon_kategori', 'media_icon_kategori.id_relation', '=', 'cms_kategori_menu.id_cms_kategori_menu')
            ->leftJoin('cms_fonts', 'cms_fonts.id_cms_font', '=', 'cms_kategori_menu.id_cms_font')
            ->leftJoin('media as media_font', 'media_font.id_relation', '=', 'cms_fonts.id_cms_font')
            ->where('cms_jenis_kategori', $this->cms_jenis_kategori)->first();

        $cms_fonts = $this->cmsFonts->get();
        $cmsKategoriStyle = $this->cmsKategoriStyle;

        $vars = get_defined_vars();

        return $vars;
    }
}
