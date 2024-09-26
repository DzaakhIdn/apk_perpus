<?php
require "../database.php";
require "../function.php";

$id = $_GET['id'];
if (isset($_POST["submit"])) {
    if (editData("staff", $_POST, $id)) {
        echo "
        <script>
        alert('NICE!, Update Data Berhasil!')
        window.location.href = '../staff.php'
        </script>
        ";
    } else {
        echo "gagal!";
    }
}

$staffs = currentData($id, "staff");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAMBAH KARYAWAN</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>

<body class="flex justify-center items-center p-20">
    <div class="container">
        <h1 class=" font-extrabold text-slate-800 text-3xl text-center mb-5">UPDATE DATA KARYAWAN</h1>
        <form action="" method="post" class="mt-5 flex flex-col gap-2" data-aos="zoom-in">
            <input type="hidden" name="form_type" value="staff">

            <label for="gender" class="label block mb-2 text-sm font-medium text-gray-900" data-aos="zoom-in">Gender</label>
            <select name="gender" id="gender" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5">
                <option value="male.png">Laki-laki</option>
                <option value="female.png">Perempuan</option>
            </select>
            <label for="nama">Nama Karyawan Baru</label>
            <input type="text" name="name" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5" value="<?= $staffs['name'] ?>">
            <label for="alamat">Alamat</label>
            <input type="text" name="alamat" id="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 " value="<?= $staffs['alamat'] ?>">

            <button type="submit" name="submit" class="text-white mt-5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center">kirim</button>
        </form>
    </div>
</body>

</html>