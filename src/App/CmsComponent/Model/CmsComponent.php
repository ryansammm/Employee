<?php

namespace App\CmsComponent\Model;

use Core\Model;

class CmsComponent extends Model
{
    protected $table = 'cms_component';
    protected $primaryKey = 'id_cms_component';

    public function cmsComponentType(string $type)
    {
        $result = '';
        if ($type == '1') {
            $result = 'Dinamis';
        } else {
            $result = 'Statis';
        }

        return $result;
    }
}
