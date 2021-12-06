<?php

namespace App\Berita\Model;

use Core\GlobalFunc;
use PDO;
use PDOException;


class BeritaOri
{
    private $table = 'berita';
    private $primaryKey = 'id_berita';
    public $conn;

    public function __construct()
    {
        $globalFunc = new GlobalFunc();
        $this->conn = $globalFunc->conn;
    }

    public function countRows($where = "")
    {
        $sql = "SELECT COUNT(".$this->primaryKey.") as count FROM ".$this->table." ".$where;

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

    public function selectAll($where = "")
    {
        $sql = "SELECT berita.*, kategori_berita.*, media.* FROM ".$this->table. " LEFT JOIN kategori_berita ON berita.id_kategori_berita = kategori_berita.id_kategori_berita LEFT JOIN media ON berita.id_berita = media.id_relation". " ".$where;

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

    public function selectOne($id_berita)
    {
        $sql = "SELECT * FROM ".$this->table. " LEFT JOIN media ON berita.id_berita = media.id_relation LEFT JOIN kategori_berita ON kategori_berita.id_kategori_berita = ".$this->table.".id_kategori_berita WHERE id_berita = '$id_berita'";

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
        $id_berita = uniqid('brt');
        $tgl_publish = $data->get('tgl_publish');
        $id_admin = "";
        $judul_berita_ind = $data->get('judul_berita_ind');
        $judul_berita_eng = $data->get('judul_berita_eng');
        $isi_berita_ind = $data->get('isi_berita_ind');
        $isi_berita_eng = $data->get('isi_berita_eng');
        $id_kategori_berita = $data->get('id_kategori_berita');

        $lowercase_judul = strtolower($judul_berita_ind);
        $replacespasi = str_replace(' ', '-', $lowercase_judul);

        $slug_berita = preg_replace('/[^A-Za-z0-9\-]/', '',$replacespasi);
        $datetime = date('Y-m-d H:i:s');

        $sql = "INSERT INTO ". $this->table. " VALUES(:id_berita, :id_admin, :tgl_publish, :judul_berita_ind, :judul_berita_eng, :isi_berita_ind,  :isi_berita_eng, :slug_berita, :id_kategori_berita, :created_at, :updated_at)";

        try {
            $query = $this->conn->prepare($sql);
            $query->bindParam(':id_berita', $id_berita);
            $query->bindParam(':tgl_publish', $tgl_publish);
            $query->bindParam(':id_admin', $id_admin);
            $query->bindParam(':judul_berita_ind', $judul_berita_ind);
            $query->bindParam(':judul_berita_eng', $judul_berita_eng);
            $query->bindParam(':isi_berita_ind', $isi_berita_ind);
            $query->bindParam(':isi_berita_eng', $isi_berita_eng);
            $query->bindParam(':id_kategori_berita', $id_kategori_berita);
            $query->bindParam(':slug_berita', $slug_berita);
            $query->bindParam(':created_at', $datetime);
            $query->bindParam(':updated_at', $datetime);
            $query->execute();

            return $id_berita;
        } catch (PDOException $e) {
            echo $e;
            die();
        }
    }

    public function update($id_berita, $data)
    {
        $tgl_publish = $data->get('tgl_publish');
        $judul_berita_ind = $data->get('judul_berita_ind');
        $judul_berita_eng = $data->get('judul_berita_eng');
        $isi_berita_ind = $data->get('isi_berita_ind');
        $isi_berita_eng = $data->get('isi_berita_eng');
        $id_kategori_berita = $data->get('id_kategori_berita');

        $lowercase_judul = strtolower($judul_berita_ind);
        $replacespasi = str_replace(' ', '-', $lowercase_judul);

        $slug_berita = preg_replace('/[^A-Za-z0-9\-]/', '',$replacespasi);
        $updated_at = date('Y-m-d H:i:s');

        $sql = "UPDATE ". $this->table. " SET tgl_publish = :tgl_publish, judul_berita_ind = :judul_berita_ind, judul_berita_eng = :judul_berita_eng, isi_berita_ind = :isi_berita_ind, isi_berita_eng = :isi_berita_eng, id_kategori_berita = :id_kategori_berita,slug_berita = :slug_berita , updated_at = :updated_at WHERE id_berita = '$id_berita'";

        try {
            $query = $this->conn->prepare($sql);
            $query->bindParam(':tgl_publish', $tgl_publish);
            $query->bindParam(':judul_berita_ind', $judul_berita_ind);
            $query->bindParam(':judul_berita_eng', $judul_berita_eng);
            $query->bindParam(':isi_berita_ind', $isi_berita_ind);
            $query->bindParam(':isi_berita_eng', $isi_berita_eng);
            $query->bindParam(':id_kategori_berita', $id_kategori_berita);
            $query->bindParam(':slug_berita', $slug_berita);
            $query->bindParam(':updated_at', $updated_at);
            $query->execute();

            return $id_berita;
        } catch (PDOException $e) {
            echo $e;
            die();
        }
    }

    public function delete($id_berita)
    {
        $sql = "DELETE FROM ".$this->table. " WHERE id_berita = '$id_berita'";

        try {
            $query = $this->conn->prepare($sql);
            $query->execute();

            return $id_berita;
        } catch (PDOException $e) {
            echo $e;
            die();
        }
    }
}

?>