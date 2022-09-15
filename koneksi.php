<?php

$host   = "localhost";
$user   = "root";
$pass   = "";
$db     = "crud_native";
$koneksi = mysqli_connect($host, $user, $pass, $db);

if(mysqli_connect_errno()){
    echo "Galal terhubung ke server :" . mysqli_connect_errno();
}

?>