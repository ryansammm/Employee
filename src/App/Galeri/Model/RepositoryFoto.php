<?php

namespace App\RepositoryFoto\Model;

use Core\GlobalFunc;
use PDOException;

class RepositoryFoto extends GlobalFunc
{
    private $table = 'galeri';
    private $primaryKey = 'id_galeri';
    public $conn;

    public function __construct()
    {
        $globalFunc = new GlobalFunc();
        $this->conn = $globalFunc->conn;
    }

    public function countRows($where = "")
    {
        $sql = "SELECT COUNT(\"".$this->primaryKey."\") as count FROM \"".$this->table."\" " . $where;
        
        $query = pg_query($this->conn, $sql);
        $datahasil = pg_fetch_assoc($query);

        return $datahasil;
    }
    
    public function selectAll($where = "")
    {
        $sql = "SELECT * FROM \"" . $this->table ."\" LEFT JOIN \"media\" ON \"media\".\"idPenelitian\" = \"".$this->table."\".\"id_galeri\" ".$where;

        $query = pg_query($this->conn, $sql);
        $datas = [];
        while ($item = pg_fetch_assoc($query)) {
            array_push($datas, $item);
        }
        
        return $datas;
    }

    public function create($datas)
    {
        $id = uniqid('glr');
        $galeri_ind = $this->esc_str($this->conn, $datas->get('galeri_ind'));
        $galeri_desc_ind = $this->esc_str($this->conn, $datas->get('galeri_desc_ind'));
        $tgl_galeri = date('Y-m-d');
        $datetime = date('Y-m-d');

        $sql = "INSERT INTO \"".$this->table."\" VALUES ('$id', '$galeri_ind', '$galeri_desc_ind', '$tgl_galeri', '$datetime', '$datetime')";
        
        $query = pg_query($sql);
        
        return $id;
    }
    
    public function selectOne($id)
    {
        $sql = "SELECT * FROM \"" . $this->table . "\" LEFT JOIN \"media\" ON \"media\".\"idPenelitian\" = \"".$this->table."\".\"".$this->primaryKey."\" WHERE \"".$this->primaryKey."\" = '$id'";
        
        $query = pg_query($this->conn, $sql);
        $datahasil = pg_fetch_assoc($query);
        
        $sqlGaleri = "SELECT \"groupgaleri\".*, \"media\".* FROM \"groupgaleri\" LEFT JOIN \"media\" ON \"groupgaleri\".\"id_groupgaleri\" = \"media\".\"idPenelitian\" WHERE \"id_galeri\" = '$id'";
        $querysqlGaleri = pg_query($this->conn, $sqlGaleri);
        $datassqlGaleri = [];
        while ($item = pg_fetch_assoc($querysqlGaleri)) {
            array_push($datassqlGaleri, $item);
        }
        
        $datahasil['groupgaleri'] = $datassqlGaleri;
        
        return $datahasil;
    }
    
    public function update($id, $datas)
    {
        $galeri_ind = $this->esc_str($this->conn, $datas->get('galeri_ind'));
        $galeri_desc_ind = $this->esc_str($this->conn, $datas->get('galeri_desc_ind'));
        $datetime = date('Y-m-d');

        $sql = "UPDATE \"" . $this->table . "\" SET \"galeri_ind\" = '$galeri_ind', \"galeri_desc_ind\" = '$galeri_desc_ind', \"updated_at\" = '$datetime' WHERE \"id_galeri\" = '$id'";

        $query = pg_query($sql);
        
        return pg_affected_rows($query);
    }

    public function delete($id)
    {
        $sql = "DELETE FROM \"" . $this->table . "\" WHERE \"".$this->primaryKey."\" = '$id'";

        $query = pg_query($sql);
        
        return pg_affected_rows($query);
    }
}
