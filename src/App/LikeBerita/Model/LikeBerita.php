<?php

namespace App\LikeBerita\Model;

use Core\GlobalFunc;
use PDOException;

class LikeBerita extends GlobalFunc
{
    private $table = 'likeberita';
    private $primaryKey = 'idLikeberita';
    public $conn;

    public function __construct()
    {
        $globalFunc = new GlobalFunc();
        $this->conn = $globalFunc->conn;
    }

    public function selectAll($where = "")
    {
        $sql = "SELECT * FROM " . $this->table . " LEFT JOIN users ON users.idUser = " . $this->table . ".idUser LEFT JOIN media ON media.idRelation = users.idUser LEFT JOIN berita ON berita.idBerita = ".$this->table.".idBerita " . $where;

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

    public function create($datas, $idBerita, $idUser, $jenislikeBerita)
    {
        $idLikeberita = uniqid("lbr");
        // $jenislikeBerita = $datas->get('jenislikeBerita');
        $dateCreate = date('Y-m-d');

        $sql = "INSERT INTO " . $this->table . " VALUES ('$idLikeberita', '$idUser', '$idBerita', '$jenislikeBerita', '$dateCreate')";

        try {
            $data = $this->conn->prepare($sql);

            $data->execute();
            return $idLikeberita;
        } catch (PDOException $e) {
            echo $e;
            die();
        }
    }

    public function update($datas, $idBerita, $idUser, $idLikeberita = '')
    {
        $jenislikeBerita = $datas->get('jenislikeBerita');
        $dateCreate = date('Y-m-d');

        $sql = "UPDATE " . $this->table . " SET idUser = '$idUser', idBerita = '$idBerita', jenislikeBerita = '$jenislikeBerita' WHERE ".$this->primaryKey." = '$idLikeberita'";

        try {
            $data = $this->conn->prepare($sql);

            $data->execute();
            return $idLikeberita;
        } catch (PDOException $e) {
            echo $e;
            die();
        }
    }

    public function selectOne($id)
    {
        $sql = "SELECT * FROM " . $this->table . " LEFT JOIN media ON " . $this->table . "." . $this->primaryKey . " = media.idRelation LEFT JOIN users ON users.idUser = ".$this->table.".idUser LEFT JOIN berita ON berita.idBerita = ".$this->table.".idBerita WHERE " . $this->primaryKey . " = '$id'";

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

    public function delete($where = "")
    {
        $sql = "DELETE FROM " . $this->table . " ". $where;

        try {
            $query = $this->conn->prepare($sql);
            $query->execute();
            return $query;
        } catch (PDOException $e) {
            dump($e);
            die();
        }
    }

}