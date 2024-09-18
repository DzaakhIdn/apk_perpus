<?php
require "../function.php";
require "../database.php";

$id = $_GET["id"];

if (deletePeminjam($id) > 0) {
    echo "
    <script>
    alert('berhasil hapus');
    window.location.href = '../index.php'
    </script>
    ";
} else {
    echo "gagal";
}
