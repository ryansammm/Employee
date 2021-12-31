<?php

namespace App\CmsHalaman\Model;

use App\CmsComponent\Model\CmsComponent;
use App\CmsHalamanDetail\Model\CmsHalamanDetail;
use Core\Model;

class CmsHalaman extends Model
{
    protected $table = 'cms_halaman';
    protected $primaryKey = 'id_cms_halaman';

    public function getHalamanData(string $id_cms_halaman)
    {
        $halaman = $this->where('id_cms_halaman', $id_cms_halaman)->first();
        $cmsHalamanDetail = new CmsHalamanDetail();
        $cmsComponent = new CmsComponent();
        $halaman_detail = $cmsHalamanDetail->where('id_cms_halaman', $id_cms_halaman)->get()->items;

        $result = $halaman;
        $result['row'] = [];
        foreach ($halaman_detail as $key => $value) {
            $result['row'][$value['cms_row_order']]['cms_row_col'] = 12 / intval($value['cms_col']);
            $result['row'][$value['cms_row_order']]['cms_row_order'] = $value['cms_row_order'];
            $result['row'][$value['cms_row_order']]['cms_row_hide'] = $value['cms_row_hide'];
            $result['row'][$value['cms_row_order']]['cms_row_container'] = $value['cms_row_container'];
        }

        foreach ($result['row'] as $key => $value) {
            foreach ($halaman_detail as $key1 => $value1) {
                if ($value1['cms_row_order'] == $key) {
                    $result['row'][$key]['column'][$value1['cms_col_order']]['id_cms_component'] = $cmsComponent->where('id_cms_component', $value1['id_cms_component'])->first();
                    $result['row'][$key]['column'][$value1['cms_col_order']]['cms_col_order'] = $value1['cms_col_order'];
                    $result['row'][$key]['column'][$value1['cms_col_order']]['cms_col_hide'] = $value1['cms_col_hide'];
                    $result['row'][$key]['column'][$value1['cms_col_order']]['cms_col_container'] = $value1['cms_col_container'];
                }
            }
        }

        usort($result['row'], function ($a, $b) {
            return intval($a['cms_row_order']) - intval($b['cms_row_order']);
        });

        foreach ($result['row'] as $key => $value) {
            usort($result['row'][$key]['column'], function ($a, $b) {
                return intval($a['cms_col_order']) - intval($b['cms_col_order']);
            });
        }
        
        return $result;
    }
}
