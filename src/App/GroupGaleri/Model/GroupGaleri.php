<?php

namespace App\GroupGaleri\Model;

use Core\GlobalFunc;
use PDOException;

class GroupGaleri extends GlobalFunc
{
    private $table = 'groupgaleri';
    private $primaryKey = 'id_groupgaleri';
    public $conn;

    public function __construct()
    {
        $globalFunc = new GlobalFunc();
        $this->conn = $globalFunc->conn;
    }

    public function selectAll($where = "")
    {
        $sql = "SELECT * FROM \"" . $this->table . "\" LEFT JOIN \"galeri\" ON \"galeri\".\"id_galeri\" = \"". $this->table ."\".\"id_galeri\" LEFT JOIN \"media\" ON \"media\".\"idPenelitian\" = \"" . $this->table . "\".\"" . $this->primaryKey . "\" " . $where;

        $query = pg_query($this->conn, $sql);
        $datas = [];
        while ($item = pg_fetch_assoc($query)) {
            array_push($datas, $item);
        }
        
        return $datas;
    }

    public function create($id_galeri, $datas, $id_user)
    {
        $id_groupgaleri = uniqid('grglr');
        $judul_groupgaleri = $this->esc_str($this->conn, $datas['judul_groupgaleri']);
        $deskripsi_groupgaleri = $this->esc_str($this->conn, $datas['deskripsi_groupgaleri']);
        $tanggal_publish = date('Y-m-d');
        $datetime = date('Y-m-d H:i:s');

        $sql = "INSERT INTO " . $this->table . " VALUES ('$id_groupgaleri', '$id_galeri', '$judul_groupgaleri', '$deskripsi_groupgaleri', '$tanggal_publish', '$id_user', '$datetime', '$datetime')";

        $query = pg_query($sql);
        
        return $id_groupgaleri;
    }

    public function createMediaDetail($idMedia, $fileUpload, $idRelation, $idEntity = 1, $key)
    {
        $file = $fileUpload;
        $namaMedia = $file['name'][$key];
        $namaSementara = $file['tmp_name'][$key];
        $ekstensi_diperbolehkan    = array('png', 'jpg');
        $x = explode('.', $namaMedia);
        $nama = strtolower($x['0']);
        $ekstensi = strtolower(end($x));
        $ukuran = $file['size'][$key];
        $filename = $nama . "" . uniqid() . "." . $ekstensi;
        if (in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            if ($ukuran < 2055070) {
                move_uploaded_file($namaSementara, __DIR__ . '/../../../../web/assets/media/' . $filename);
                
                $dateCreate = date('Y-m-d');
                $sql = "INSERT INTO \"media\" VALUES ('$idMedia', '$filename', '$idRelation', '', '$dateCreate', '$idEntity', '', '1', '', '')";
            }
        }

        $query = pg_query($sql);
        
        return $idMedia;
    }

    public function selectOne($id)
    {
        $sql = "SELECT * FROM \"" . $this->table . "\" LEFT JOIN \"media\" ON \"media\".\"idPenelitian\" = \"" . $this->table . "\".\"id_groupgaleri\" WHERE \"id_groupgaleri\" = '$id'";

        $query = pg_query($this->conn, $sql);
        $datas = pg_fetch_assoc($query);
        
        return $datas;
    }

    public function update($id, $datas)
    {
        $namaPortofolio = $this->esc_str($this->conn, $datas->get('namaPortofolio'));
        $deskripsiPortofolio = $this->esc_str($this->conn, $datas->get('deskripsiPortofolio'));

        $sql = "UPDATE \"" . $this->table . "\" SET \"deksripsiPortofolio\" = '$deskripsiPortofolio' WHERE \"" . $this->primaryKey . "\" = '$id'";

        $query = pg_query($sql);
        
        return $id;
    }

    public function updateDetail($id, $datas, $id_user)
    {
        $judul_groupgaleri = $this->esc_str($this->conn, $datas['judul_groupgaleri']);
        $deskripsi_groupgaleri = $this->esc_str($this->conn, $datas['deskripsi_groupgaleri']);
        $tanggal_publish = date('Y-m-d');
        $updated_at = date('Y-m-d');

        $sql = "UPDATE \"" . $this->table . "\" SET \"judul_groupgaleri\" = '$judul_groupgaleri', \"deskripsi_groupgaleri\" = '$deskripsi_groupgaleri', \"tanggal_publish\" = '$tanggal_publish', \"id_user\" = '$id_user', \"updated_at\" = '$updated_at' WHERE \"" . $this->primaryKey . "\" = '$id'";

        $query = pg_query($sql);
        
        return $id;
    }

    public function delete($id)
    {
        $sql = "DELETE FROM \"" . $this->table . "\" WHERE \"" . $this->primaryKey . "\" = '$id'";

        $query = pg_query($sql);
        
        return $id;
    }

    public function deleteGroup($id)
    {
        $sql = "DELETE FROM \"" . $this->table . "\" WHERE \"id_galeri\" = '$id'";

        $query = pg_query($sql);
        
        return $id;
    }
}
