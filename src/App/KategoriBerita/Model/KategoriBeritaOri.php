<?php

namespace App\KategoriBerita\Model;

use Core\GlobalFunc;
use PDOException;


class KategoriBerita extends GlobalFunc
{
    private $table = 'kategori_berita';
    public $conn;

    public function __construct()
    {
        $globalFunc = new GlobalFunc();
        $this->conn = $globalFunc->conn;
    }

    public function selectAll($where = "")
    {
        $sql = "SELECT * FROM ".$this->table." ".$where;

        try {
            $query = $this->conn->prepare($sql);
            $query->execute();
            $data = $query->fetchAll();

            return $data;
        } catch (PDOException $e) {
            echo $e;
            die();
        }
    }

    public function selectOne($id_kategori_berita)
    {
        $sql = "SELECT * FROM ".$this->table. " WHERE id_kategori_berita = '$id_kategori_berita'";

        try {
            $query = $this->conn->prepare($sql);
            $query->execute();
            $data = $query->fetch();
            

            return $data;
        } catch (PDOException $e) {
            echo $e;
            die();
        }
    }

    public function create($data)
    {
        $id_kategori_berita = uniqid('kbrt');
        $kategori_berita_ind = $data->get('kategori_berita_ind');
        $kategori_berita_eng = $data->get('kategori_berita_eng');
        $url = $data->get('url');
        $datetime = date('Y-m-d H:i:s');
        
        $sql = "INSERT INTO ". $this->table. " VALUES('$id_kategori_berita', '$kategori_berita_ind', '$kategori_berita_eng', '$url','$datetime', '$datetime')";
        
        try {
            $query = $this->conn->prepare($sql);
            $query->execute();

            return $id_kategori_berita;
        } catch (PDOException $e) {
            echo $e;
            die();
        }
    }

    public function update($id_kategori_berita, $data)
    {
        $kategori_berita_ind = $data->get('kategori_berita_ind');
        $kategori_berita_eng = $data->get('kategori_berita_eng');
        $url = $data->get('url');
        $datetime_update = date('Y-m-d H:i:s');

        $sql = "UPDATE ". $this->table. " SET kategori_berita_ind = '$kategori_berita_ind', kategori_berita_eng = '$kategori_berita_eng', url = '$url', updated_at = '$datetime_update' WHERE id_kategori_berita = '$id_kategori_berita'";

        try {
            $query = $this->conn->prepare($sql);
            $query->execute();

            return $id_kategori_berita;
        } catch (PDOException $e) {
            echo $e;
            die();
        }
    }

    public function delete($id_kategori_berita)
    {
        $sql = "DELETE FROM ". $this->table. " WHERE id_kategori_berita = '$id_kategori_berita'";

        try {
            $query = $this->conn->prepare($sql);
            $query->execute();

            return $id_kategori_berita;
        } catch (PDOException $e) {
            echo $e;
            die();
        }
    }
}

?>