<?php
require "./../database.php";
require "./../function.php";

$staffs = query("SELECT * FROM staff");

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>list staf</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>

<body class="p-20">
    <div class="container mt-10" data-aos="zoom-in">

        <div class="header flex items-center justify-between mb-5">
            <h1 class="text-3xl font-extrabold text-slate-800 mb-5 text-center">LIST STAFF PERPUSTAKAAN📃</h1>
            <div class="btn flex gap-2">
                <a href="./../index.php" class="w-14 h-14 bg-blue-300 py-4 px-3 rounded-md text-center hover:bg-blue-400"><i class="ph-bold ph-house text-lg"></i></a>
                <a href="./add_data.php?type=staff" class="w-14 h-14 bg-green-300 py-4 px-3 rounded-md text-center hover:bg-blue-400"><i class="ph-bold ph-user-plus text-lg"></i></a>
            </div>
        </div>
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
                            Nomor
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
                    <?php foreach ($staffs as $staff): ?>
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                <?= $i ?>
                            </th>
                            <td class="px-6 py-4">
                                <?= $staff['name'] ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $staff['alamat'] ?>
                            </td>
                            <td class="px-6 py-4">
                                <?= $staff['nomor_anggota'] ?>
                            </td>
                            <td class="px-6 py-4 text-right border-r">
                                <a href="edit_staff.php?id=<?= $staff['id'] ?>" class="font-medium text-blue-600 dark:text-blue-500 hover:underline" data-modal-target="crud-modal" data-modal-toggle="crud-modal">Edit</a>
                            </td>
                            <td class="px-6 py-4 text-right">
                                <a href="del_staff.php?id=<?= $staff['id'] ?>" onclick="return confirm('Mau D.O ?')" class="font-medium text-red-600 dark:text-blue-500 hover:underline">delete</a>
                            </td>
                        </tr>
                        <?php $i++ ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>