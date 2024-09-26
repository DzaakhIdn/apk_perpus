<?php
require "./../database.php";
require "./../function.php";

$id = $_GET['id'];
$type = $_GET['type'];

if (deleteValue($id, $type) > 0) {
    echo "
    <script>
        alert('Data Berhasil');
        window.location.href = '../index.php';
    </script>
    ";
} else {
    echo "
    <script>
        alert('Data gagal di hapus');
        window.location.href = '../index.php';
    </script>
    ";
}

