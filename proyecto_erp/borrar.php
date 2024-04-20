<?php
require_once __DIR__ . '/Config/JConexion.php';

use Config\JConexion as db;

header('Content-Type: application/json; charset=utf-8');

$json = array(
    "success"=>false,
    "message"=>""
);

if($_POST){
    $id= $_POST["id"];

    $dbConnection = new db();
    $pdo = $dbConnection->getConn();

    // Prepare the SQL statement
    $query = "DELETE FROM users WHERE Id = :id";
    $statement = $pdo->prepare($query);

    // Bind parameter
    $statement->bindParam(':id', $id, PDO::PARAM_INT);

    $result = $statement->execute();
}
?>