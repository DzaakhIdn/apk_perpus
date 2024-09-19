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
        <div class="header flex items-center justify-between bg-[#7EACB5] rounded-tl-md rounded-tr-md p-5">
            <h1 class="text-3xl font-extrabold text-slate-800 mb-5 text-center">LIST STAFF PERPUSTAKAAN📃</h1>
            <div class="btn flex gap-2">
                <a href="./../index.php" class="w-14 h-14  py-4 px-3 bg-red-400 rounded-md text-center hover:bg-[#C96868]"><i class="ph-bold ph-house text-lg"></i></a>
                <a href="./add_data.php?type=staff" class="w-14 h-14 bg-green-300 py-4 px-3 rounded-md text-center hover:bg-green-400"><i class="ph-bold ph-user-plus text-lg"></i></a>
            </div>
        </div>
        <div class="card-container bg-[#FFF4EA] w-full h-auto grid grid-cols-6 p-5 gap-4">
            <?php foreach ($staffs as $staff) : ?>
                <div class="w-ful max-w-sm border-gray-200 rounded-lg py-4 shadow-md bg-white">
                    <div class="flex flex-col items-center">
                        <img class="w-24 h-24 mb-3 shadow rounded-full" src="./../image/<?= $staff["gender"] ?>" />
                        <h5 class="mb-1 text-xl font-medium text-gray-700 "><?= $staff["name"] ?></h5>
                        <span class="text-xs mb-1 text-gray-500 "><?= $staff["alamat"] ?></span>
                        <p class="text-sm font-semibold text-gray-700"><?= $staff["nomor_anggota"] ?></p>
                        <div class="flex mt-4 md:mt-6">
                            <a data-modal-target="crud-modal" data-modal-toggle="crud-modal" href="./edit_staff.php?id=<?= $staff["id"] ?>" class="inline-flex items-center px-4 py-2 text-sm font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 ">Edit</a>
                            <a data-modal-target="popup-modal" data-modal-toggle="popup-modal" href="#" class="py-2 px-4 ms-2 text-sm font-medium transition-all duration-500 focus:outline-none bg-gray-900 text-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 ">Delete</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    </div>
    <div id="popup-modal" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button" class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="popup-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Kamu Mau D.O Anak Ini?</h3>
                    <a href="./del_staff.php?id=<?= $staff["id"] ?>" data-modal-hide="popup-modal" type="button" class="text-white bg-red-600 hover:bg-red-800 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Yes, I'm sure
                    </a>
                    <button data-modal-hide="popup-modal" type="button" class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">No, cancel</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.1/dist/flowbite.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>