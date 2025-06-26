<?php
$servername = "127.0.0.1"; 
$dbUsername = "root";
$dbPassword = "";
$dbPort = 3306;
$dbName = "beeBrain";

$dbConnect = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName, $dbPort);

if(!$dbConnect) {
    die("Connessione fallita: ".mysqli_connect_error());
}
?>
