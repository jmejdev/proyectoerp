<?php
    namespace Config;

    class JConexion{
        private $host="localhost";
        private $user="root";
        private $passw="";
        private $database="proyectoerp";
        private $conn;

        function __construct(){
            $stringConn ="mysql:host=".$this->host.";dbname=".$this->database.";charset=utf8;";
            $this->conn = new \PDO($stringConn , $this->user, $this->passw);
        }

        function getConn(){
            return  $this->conn;
        }
    }
?> 
