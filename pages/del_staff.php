<?php
require "../function.php";

$id = $_GET['id'];
if (deleteStaff($id) > 0) {
    echo "
    <script>
    window.location.href = 'list_staff.php'
    </script>
    ";
} else {
    echo "gagal!";
}
