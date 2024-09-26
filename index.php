<?php
require "database.php";
require "function.php";

$books = getTables("books");
$borrows = getTables("minjam_bukus");
// var_dump($books[0]["id"]);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
</head>
<style>
    .card {
        box-shadow: 3.5px 4px 0 #222;
    }
</style>

<body class="p-20 bg-slate-50">
    <div class="container">
        <div class="content flex justify-center flex-col">
            <div class="flex justify-between items-center bg-[#7EACB5] p-5 rounded-tl-md rounded-tr-md">
                <h1 class="font-extrabold text-3xl text-slate-800">BUKU PERPUSTAKAAN📕</h1>
                <div class="bungkus flex items-center gap-2">
                    <div id="add_data" class="flex justify-between items-center bg-green-300 w-40 py-4 px-3 rounded-md hover:cursor-pointer hover:bg-green-400">
                        <i class="ph-bold ph-plus-square"></i>
                        <p class="text-slate-800 font-bold">TAMBAH DATA</p>
                    </div>
                    <a href="./pages/list_staff.php" class="w-14 h-14 bg-[#FADFA1] py-4 px-3 rounded-md text-center hover:bg-orange-300"><i class="ph-bold ph-user-list text-lg"></i>
                    </a>
                </div>
            </div>
            <div class="card-container grid grid-cols-6 rounded-br-md rounded-bl-md w-full h-auto
             bg-[#FFF4EA] gap-5 p-10">
                <?php foreach ($books as $book): ?>
                    <div class="card hover:cursor-pointer hover:-translate-y-3 transition-all duration-300 border bg-blue-200 flex justify-center w-36 h-44 rounded-md border-slate-500 relative group">
                        <div class="overlay absolute w-full h-full rounded-md bg-black/50 top-0 left-0 flex items-center justify-center flex-col gap-1 scale-y-0 group-hover:scale-y-100 transition-all duration-300">
                            <a href="./pages/edit_books.php?id=<?= $books[0]['id'] ?>" class="edit w-auto h-auto bg-green-400 px-3 py-3 rounded-md">
                                <i class="ph-bold ph-pencil-simple"></i>
                            </a>
                            <a href="./pages/delete.php?id=<?= $books[0]['id'] ?>&type=books" onclick="return confirm('Are You Sure ?')" class="edit w-auto h-auto bg-red-400 px-3 py-3 rounded-md">
                                <i class="ph-bold ph-trash"></i>
                            </a>
                        </div>
                        <div class="isi flex flex-col justify-center items-center gap-2">
                            <h1 class="judul font-extrabold text-lg"><?= $book['judul'] ?></h1>
                            <p class="author"><?= $book['author'] ?></p>
                            <p class="publish  italic font-light text-xs"><?= $book['tahun_terbit'] ?></p>
                            <p class="genre"><?= $book['genre'] ?></p>
                        </div>
                    </div>
                <?php endforeach; ?>
                <span class="add border bg-blue-200 w-36 h-44 rounded-md border-slate-900 flex flex-col justify-center items-center">
                    <a href="./pages/add_books.php"><i class="ph ph-plus"></i>
                    </a>
                </span>
            </div>
        </div>
    </div>

    <h1 class="text-center font-extrabold text-3xl text-slate-800 mt-10 mb-5">DATA PINJAM BUKU📃</h1>
    <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-blue-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3">
                        No
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Alamat
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Minjam
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tanggal Mengembalikan
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Edit</span>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        <span class="sr-only">Delete</span>
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php $i = 1; ?>
                <?php foreach ($borrows as $borrow): ?>
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $i ?>
                        </th>
                        <td class="px-6 py-4">
                            <?= $borrow['nama'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $borrow['buku'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $borrow['tanggal_pinjam'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $borrow['tanggal_balik'] ?>
                        </td>
                        <td class="px-6 py-4 text-right border-r">
                            <a href="./pages/edit_pinjam.php?id=<?= $borrow['id'] ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                        </td>
                        <td class="px-6 py-4 text-right">
                            <a href="./pages/delete.php?id=<?= $borrow['id'] ?>&type=minjam_bukus" onclick="return confirm('Mau D.O ?')" class="font-medium text-red-600 dark:text-blue-500 hover:underline">delete</a>
                        </td>
                    </tr>
                    <?php $i++ ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script>
        var btn = document.getElementById("add_data")

        btn.addEventListener("click", () => {
            window.location.href = "./pages/add_data.php"
        })
    </script>
</body>

</html>