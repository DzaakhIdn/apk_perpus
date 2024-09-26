<?php
require "database.php";

// Ngambil semua data dari database
function getTables($tables)
{
    global $host;
    $result = mysqli_query($host, "SELECT * FROM $tables");
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
// Function tambah data
function insertData($tables, $data)
{
    global $host;

    if ($tables == 'books') {
        $judul = $data['judul'];
        $author = $data['author'];
        $tahun_terbit = $data['tahun_terbit'];
        $genre = $data['genre'];
        $query = "INSERT INTO books VALUES(null, '$judul', '$author', '$tahun_terbit', '$genre')";
        mysqli_query($host, $query);
    } elseif ($tables == 'staff') {
        $gender = $data['gender'];
        $name = $data['name'];
        $alamat = $data['alamat'];
        $nomor_anggota = $data['nomor_anggota'];
        $query = "INSERT INTO staff VALUES(null, '$gender', '$name', '$alamat', '$nomor_anggota')";
        mysqli_query($host, $query);
    } elseif ($tables == 'minjam_bukus') {
        $nama = $data['nama'];
        $buku = $data['buku'];
        $tanggal_pinjam = $data['tanggal_pinjam'];
        $tanggal_balik = $data['tanggal_balik'];
        $query = "INSERT INTO minjam_bukus VALUES(null, '$nama', '$buku', '$tanggal_pinjam', '$tanggal_balik')";
        mysqli_query($host, $query);
    }
}

// Function Edit Data
function currentData($id, $tables)
{
    global $host;
    $query = "SELECT * FROM $tables WHERE id = $id";
    $result = mysqli_query($host, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
function editData($tables, $data, $id)
{
    global $host;

    if ($tables == 'books') {
        $judul = $data['judul'];
        $author = $data['author'];
        $tahun_terbit = $data['tahun_terbit'];
        $genre = $data['genre'];
        $query = "UPDATE books SET judul = '$judul', author = '$author', tahun_terbit = '$tahun_terbit', genre = '$genre' WHERE id = $id";
        mysqli_query($host, $query);
    } elseif ($tables == 'staff') {
        $gender = $data['gender'];
        $name = $data['name'];
        $alamat = $data['alamat'];
        $nomor_anggota = $data['nomor_anggota'];
        $query = "UPDATE staff SET gender = '$gender', name = '$name', alamat = '$alamat', nomor_anggota = '$nomor_anggota' WHERE id = $id";
        mysqli_query($host, $query);
    } elseif ($tables == 'minjam_bukus') {
        $nama = $data['nama'];
        $buku = $data['buku'];
        $tanggal_pinjam = $data['tanggal_pinjam'];
        $tanggal_balik = $data['tanggal_balik'];
        $query = "UPDATE minjam_bukus SET nama = '$nama', buku = '$buku', tanggal_pinjam = '$tanggal_pinjam', tanggal_balik = '$tanggal_balik' WHERE id = $id";
        mysqli_query($host, $query);
    }
    mysqli_affected_rows($host);
}

// Function Hapus Data
function deleteValue($id, $type)
{
    global $host;
    $tables = "";
    if ($type == "books") {
        $tables = "books";
    } elseif ($type == "staff") {
        $tables = "staff";
    } elseif ($type == "minjam_bukus") {
        $tables = "minjam_bukus";
    }
    $query = "DELETE FROM $tables WHERE id = $id";
    mysqli_query($host, $query);
    return mysqli_affected_rows($host);
}
