<?php
require "../database.php";
require "../function.php";

$id = $_GET["id"];
if (isset($_POST["submit"])) {
    $data = $_POST;
    if (editData("books", $data, $id) > 0) {
        echo "
        <script>
        alert('YEAY!, Data berhasil di update')
        window.location.href = '../index.php'
        </script>
        ";
    } else {
        echo "
        <script>
        alert('SISTEM RUSAK💀')
        ";
    }
}

$books = currentData($id, "books");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit data Buku</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.css" rel="stylesheet" />

</head>

<body class="p-20">
    <div class="container flex flex-col gap-10">
        <h1 class="font-extrabold text-4xl text-slate-800 text-center">UBAH BUKU✏️</h1>
        <form class="bg-slate-100 px-10 py-20 rounded-md" method="post" action="">
            <div class="grid gap-6 mb-6 md:grid-cols-2">
                <div>
                    <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul Buku</label>
                    <input type="text" name="judul" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Just Go Travel" required value=" <?= $books[0]['judul'] ?>" />
                </div>
                <div>
                    <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Author</label>
                    <input type="text" name="author" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Bambang" required value=" <?= $books[0]['author'] ?>" />
                </div>
                <div>
                    <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Tanggal Terbit</label>
                    <input type="text" name="tahun_terbit" id="company" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="xx xx xx" required value=" <?= $books[0]['tahun_terbit'] ?>" />
                </div>
                <div>
                    <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Genre</label>
                    <input type="text" name="genre" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Shonen" required value=" <?= $books[0]['genre'] ?>" />
                </div>

                <label for="remember" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">I agree with the <a href="#" class="text-blue-600 hover:underline dark:text-blue-500">terms and conditions</a>.</label>
            </div>
            <button type="submit" name="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>

</body>

</html>