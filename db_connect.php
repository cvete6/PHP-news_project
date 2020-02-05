<?php
$hostname = "localhost";
$username = "cvete";
$password = "cvete";
$databasename = "sys";
$charset = 'utf8mb4';

try{
    $conn = new PDO("mysql:host=$hostname;dbname=$databasename", $username, $password);

}catch (PDOException $e){
    die("Coud not connect to db $databasename: ". $e->getMessage());
}

?>