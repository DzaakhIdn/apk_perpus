<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "apk_perpus";

$host = mysqli_connect($server, $username, $password, $database);

if (!$host) {
    echo "gagal terhubung" . mysqli_connect_error();
}


