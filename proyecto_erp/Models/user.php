<?php
    namespace Models;
    use Config\JConexion as db;

    class user{
        private $conn;

        function __construct(){
            $this->conn = new db();
            $this->conn = $this->conn->getConn();
        }

        function toList(){
            $db = $this->conn->prepare("select * from users");
            $db->execute();
            return $db->fetchAll();
        }

        function forId($id){
            $db = $this->conn->prepare("select * from users where id=:id");
            $db->execute(array("id"=>$id));
            return $db->fetch(\PDO::FETCH_ASSOC);
        }

        function toCategory(){
            $db = $this->conn->prepare("select * from category");
            $db->execute();
            return $db->fetchAll();
        }

        function Registry($query){
            $db = $this->conn->prepare($query);
            $db->execute();
            return true;

        }

    }
?>