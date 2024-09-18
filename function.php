<?php
require "database.php";

// Ngambil semua data dari database
function query($query)
{
    global $host;
    $result = mysqli_query($host, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


// Function tambah buku
function addBooks($books)
{
    global $host;

    $judul = $books['judul'];
    $author = $books['author'];
    $publish = $books['tahun_terbit'];
    $genre = $books['genre'];

    $query = "INSERT INTO books VALUES (null, '$judul', '$author', '$publish', '$genre')";
    mysqli_query($host, $query);

    if (mysqli_affected_rows($host) > 0) {
        echo "
        <script>
        alert('Berhasil')
        window.location.href = '../index.php'
        </script>
        ";
    } else {
        echo "
        <script>
        alert('OH TIDAK🤯, SISTEM MU RUSAK💀💀')
        window.location.href = '../index.php'
        </script>
        ";
    }
}


// Function Edit Buku
function currentBooks($id)
{
    global $host;
    $query = "SELECT * FROM books WHERE id = $id";
    $result = mysqli_query($host, $query);
    // $rows = [];
    // while ($row = mysqli_fetch_assoc($result)) {
    //     $rows[] = $row;
    // }
    // return $rows;

    var_dump($result);
}


function editBooks($books, $id)
{
    global $host;

    $judul = $books['judul'];
    $author = $books['author'];
    $tahun_terbit = $books['tahun_terbit'];
    $genre = $books['genre'];

    $query = "UPDATE books SET judul = '$judul', author = '$author', tahun_terbit = '$tahun_terbit', genre = '$genre' WHERE id = $id";
    mysqli_query($host, $query);

    return mysqli_affected_rows($host);
}

// Function Hapus Buku
function deleteBooks($id)
{
    global $host;
    $query = "DELETE FROM books WHERE id = $id";
    mysqli_query($host, $query);
    return mysqli_affected_rows($host);
}

// Add Staff 
function addStaff($staffs)
{
    global $host;

    $name = $staffs["name"];
    $alamat = $staffs["alamat"];
    $member_id = $staffs["nomor_anggota"];

    $query = "INSERT INTO staff VALUES(null, '$name', '$alamat', '$member_id')";
    mysqli_query($host, $query);
    if (mysqli_affected_rows($host) > 0) {
        echo "
        <script>
        alert('NICE!, Update Data Berhasil!')
        window.location.href = 'list_staff.php'
        </script>
        ";
    } else {
        echo "
        <script>
        alert('OH TIDAK🤯, SISTEM MU RUSAK💀💀')
        window.location.href = '../index.php'
        </script>
        ";
    }
}

// Edit Staff
function showStaff($id)
{
    global $host;
    $query = "SELECT * FROM staff WHERE id = $id";
    mysqli_query($host, $query);
    $result = mysqli_query($host, $query);

    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function editStaff($staffs, $id)
{
    global $host;
    $name = $staffs["name"];
    $alamat = $staffs["alamat"];
    $member_id = $staffs["nomor_anggota"];

    $query = "UPDATE staff SET name = '$name', alamat = '$alamat', nomor_anggota = '$member_id' WHERE id = $id";
    mysqli_query($host, $query);
    if (mysqli_affected_rows($host) > 0) {
        echo "
        <script>
        alert('NICE!, Update Data Berhasil!')
        window.location.href = 'list_staff.php'
        </script>
        ";
    } else {
        echo "
        <script>
        alert('OH TIDAK🤯, SISTEM MU RUSAK💀💀')
        window.location.href = '../index.php'
        </script>
        ";
    }
}

// Delete Staff
function deleteStaff($id)
{
    global $host;
    $query = "DELETE FROM staff WHERE id = $id";
    mysqli_query($host, $query);
    return mysqli_affected_rows($host);
}

// Peminjam Buku
function addPeminjam($borrow)
{
    global $host;

    $nama = $borrow["nama"];
    $book = $borrow["buku"];
    $tanggal_pinjam = $borrow["tanggal_pinjam"];
    $tanggal_balik = $borrow["tanggal_balik"];

    $query = "INSERT INTO minjam_bukus VALUES (null, '$nama', '$book', '$tanggal_pinjam', '$tanggal_balik')";
    mysqli_query($host, $query);

    if (mysqli_affected_rows($host) > 0) {
        echo "
        <script>
        alert('NICE!, Update Data Berhasil!')
        window.location.href = '../index.php'
        </script>
        ";
    } else {
        echo "error" . mysqli_error($host);
    }
}

// Edit Peminjam
function currentPeminjam($id)
{
    global $host;
    $query = "SELECT * FROM minjam_bukus WHERE id = $id";
    $result = mysqli_query($host, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function editPeminjam($borrow, $id)
{
    global $host;

    $nama = $borrow["nama"];
    $book = $borrow["buku"];
    $tanggal_pinjam = $borrow["tanggal_pinjam"];
    $tanggal_balik = $borrow["tanggal_balik"];

    $query = "UPDATE minjam_bukus SET nama = '$nama', buku = '$book', tanggal_pinjam = '$tanggal_pinjam', tanggal_balik = '$tanggal_balik' WHERE id = $id";
    mysqli_query($host, $query);

    if (mysqli_affected_rows($host) > 0) {
        echo "
        <script>
        alert('NICE!, Update Data Berhasil!')
        window.location.href = '../index.php'
        </script>
        ";
    } else {
        echo "error";
    }
}

// Delete Staff
function deletePeminjam($id)
{
    global $host;
    $query = "DELETE FROM minjam_bukus WHERE id = $id";
    mysqli_query($host, $query);
    return mysqli_affected_rows($host);
}
