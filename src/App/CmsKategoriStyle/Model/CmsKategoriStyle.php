<?php 

namespace App\CmsKategoriStyle\Model;

use Core\Model;

class CmsKategoriStyle extends Model
{
    protected $table = 'cms_kategori_menu';
    protected $primaryKey = 'id_cms_kategori_menu';

    public function fontSizeUnit(string $val)
    {
        $font_style = '';
        if ($val == '1') {
            $font_style = 'cm';
        } else if ($val == '2') {
            $font_style = 'mm';
        } else if ($val == '3') {
            $font_style = 'in';
        } else if ($val == '4') {
            $font_style = 'px';
        } else if ($val == '5') {
            $font_style = 'pt';
        } else if ($val == '6') {
            $font_style = 'pc';
        } else if ($val == '7') {
            $font_style = 'em';
        } else if ($val == '8') {
            $font_style = 'rem';
        }

        return $font_style;
    }

    public function fontWeight(string $val)
    {
        $font_weight = '';
        if ($val == '1') {
            $font_weight = 'normal';
        } else if ($val == '2') {
            $font_weight = 'bold';
        } else if ($val == '3') {
            $font_weight = 'italic';
        } else if ($val == '4') {
            $font_weight = 'lighter';
        }

        return $font_weight;
    }

    public function fontFamily($val)
    {
        $font_family = '';
        if ($val == null || $val == '') {
            $font_familiy = "-apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif";
        } else {
            $font_family = $val;
        }

        return $font_family;
    }
}
