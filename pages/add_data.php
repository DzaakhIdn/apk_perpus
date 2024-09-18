<?php
require "./../function.php";

$type = isset($_GET["type"]) ? $_GET["type"] : "staff";
$method = $_SERVER['REQUEST_METHOD'];

if ($method == 'POST') {
    $formType = isset($_POST['form_type']) ? $_POST['form_type'] : 'staff';

    if ($formType == 'staff') {
        addStaff($_POST);
    } elseif ($formType == 'peminjam') {
        addPeminjam($_POST);
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah data</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body class="flex justify-center items-center p-20 flex-col">
    <div class="mx-auto flex flex-col">
        <h1 class="font-extrabold text-slate-800 text-4xl">MAU NAMBAH DATA APA🤔</h1>
        <ul class=" flex gap-5 items-center mt-5">
            <li class="bg-green-400 py-2 px-3 rounded-md hover:bg-green-500"><a href="?type=staff">tambah staff</a></li>
            <li class="bg-green-400 py-2 px-3 rounded-md hover:bg-green-500"><a href="?type=peminjam">tambah peminjam</a></li>
        </ul>

        <div class="tabble w-full">
            <?php if ($type == 'staff') : ?>
                <p class="font-bold text-slate-900 mt-4 text-xl" data-aos="zoom-in">STAFF</p>
                <form action="" method="post" class="mt-5 flex flex-col gap-2" data-aos="zoom-in">
                    <input type="hidden" name="form_type" value="staff">

                    <label for="nama">Nama Karyawan Baru</label>
                    <input type="text" name="name" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <label for="alamat">Alamat</label>
                    <input type="text" name="alamat" id="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <label for="nomor_anggota">Nomor Anggota</label>
                    <input type="text" name="nomor_anggota" id="nomor_anggota" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">

                    <button type="submit" name="submit" class="text-white mt-5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">kirim</button>
                </form>

            <?php elseif ($type == 'peminjam') : ?>
                <p class="font-bold text-slate-900 mt-4 text-xl" data-aos="zoom-in">PEMINJAM</p>
                <form action="" method="post" class="mt-5 flex flex-col gap-2" data-aos="zoom-in">
                    <input type="hidden" name="form_type" value="peminjam">

                    <label for="nama">Nama Peminjam</label>
                    <input type="text" name="nama" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <label for="buku">Buku</label>
                    <input type="text" name="buku" id="buku" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <label for="tanggal_pinjam">Tanggal Minjam</label>
                    <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    <label for="tanggal_balik">Tanggal Mengembalikan</label>
                    <input type="date" name="tanggal_balik" id="tanggal_balik" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">

                    <button type="submit" name="submit" class="text-white mt-5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">kirim</button>
                </form>
            <?php endif; ?>
        </div>
        <a href="../index.php" class="btn-back text-white mt-5 bg-red-700 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">batal</a>
    </div>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>