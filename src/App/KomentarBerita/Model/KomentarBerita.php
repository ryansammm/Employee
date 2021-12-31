<?php

namespace App\KomentarBerita\Model;

use Core\Model;

class KomentarBerita extends Model
{
    protected $table = 'berita_comment';
    protected $primaryKey = 'id_berita_comment';

    public function loadComment($queryBuilder, $parent_column)
    {
        // Get list of website main menu
        function recursive_menu($parent_id, $menu_model, $queryBuilder, $parent_column)
        {
            $menus = [];
            $data_menu = $menu_model
                ->where(function($query) use ($parent_id, $parent_column) {
                    if ($parent_id != null) {
                        $query->where($parent_column, $parent_id);
                    } else {
                        $query->whereNull($parent_column);
                    }
                })
                ->where($queryBuilder)
                ->get()->items;

            if (!empty($data_menu)) {
                foreach ($data_menu as $key => $value) {
                    $value['sub_comment'] = recursive_menu($value['id_berita_comment'], $menu_model, $queryBuilder, $parent_column);
                    // dd($value['sub_comment']);
                    $menus[] = $value;
                }
            }

            return $menus;
        }

        $menu_utama = recursive_menu(null, $this, $queryBuilder, $parent_column);

        return $menu_utama;
    }
}
