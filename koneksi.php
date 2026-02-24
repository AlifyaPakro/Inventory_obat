<?php

if(session_status() == PHP_SESSION_NONE){
    session_start();
}

$server = "localhost";
$username = "root";
$password = "";
$database_name = "inventory_obat_alifya";

$connect = mysqli_connect($server, $username, $password, $database_name);

if(!$connect){
    echo "koneksi gagal";
}

?>