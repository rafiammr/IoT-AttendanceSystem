<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home IOT</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-cover bg-center bg-no-repeat h-screen" style="background-image: url('images/bg-3.jpg')">
    <nav class="bg-white border-gray-200 dark:bg-gray-900">
        <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto p-4">
            <a href="index.php" class="flex items-center space-x-3 rtl:space-x-reverse">
                <img src="https://flowbite.com/docs/images/logo.svg" class="h-8" alt="Flowbite Logo" />
                <span class="self-center text-2xl font-semibold whitespace-nowrap dark:text-white">Absensi</span>
            </a>
            <button data-collapse-toggle="navbar-default" type="button"
                class="inline-flex items-center p-2 w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
                aria-controls="navbar-default" aria-expanded="false">
                <span class="sr-only">Open main menu</span>
                <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 17 14">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M1 1h15M1 7h15M1 13h15" />
                </svg>
            </button>
            <div class="hidden w-full md:block md:w-auto" id="navbar-default">
                <ul
                    class="font-medium flex flex-col p-4 md:p-0 mt-4 border border-gray-100 rounded-lg bg-gray-50 md:flex-row md:space-x-8 rtl:space-x-reverse md:mt-0 md:border-0 md:bg-white dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                    <li>
                        <a href="index.php"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Home</a>
                    </li>
                    <li>
                        <a href="datamahasiswa.php"
                            class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500"
                            aria-current="page">Data Mahasiswa</a>
                    </li>
                    <li>
                        <a href="absensi.php"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">History</a>
                    </li>
                    <li>
                        <a href="scan.php"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Scan RFID</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <!-- <table class="table"> -->
    <!-- <thead>
            <tr>
                <th style="width: 10px; text-align: center">No</th>
                <th style="width: 200px; text-align: center">No Kartu</th>
                <th style="width: 400px; text-align: center">Nama</th>
                <th style="text-align: center">NIM</th>
                <th style="width: 100px; text-align: center">Action</th>
            </tr>
        </thead> -->
    <div class="container mx-auto relative overflow-x-auto max-w-7xl mt-3">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-900 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 flex justify-center">
                        No
                    </th>
                    <th scope="col" class=" py-3">
                        No Kartu
                    </th>
                    <th scope="col" class="px-6 py-3 flex justify-center">
                        Nama
                    </th>
                    <th scope="col" class="px-4 py-3 text-center">
                        NIM
                    </th>
                    <th scope="col" class="px-6 py-3 flex justify-center">
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
        include "koneksi.php";

        $sql = mysqli_query($connect,"SELECT * FROM mahasiswa");
        $no = 0;
        while ($data = mysqli_fetch_array($sql)) {
            $no++;
        
        ?>

                <td class="flex justify-center"> <?= $no ?></td>
                <td class=""><?= $data['nokartu'] ?></td>
                <td class="flex"><?= $data['nama'] ?></td>
                <td class="text-center"><?= $data['NIM'] ?></td>
                <td class="flex justify-center">
                    <button type="button" class=" text-white rounded-md bg-green-500 px-10 py-2 hover:bg-green-700 duration-300"><a
                            href=edit.php?id=<?php echo $data['id']; ?>>Edit</a></button>
                    <button type="button" class=" text-white rounded-md bg-red-500 px-10 py-2 hover:bg-red-700 duration-300"><a
                            href=delete.php?id=<?php echo $data['id']; ?>>Hapus</a></button>
                </td>
            </tbody>
            <?php } ?>
            <tfoot>
            </tfoot>
        </table>
        <!-- </div>

    <button type="button" class="btn btn-outline-primary"><a href="input.php"
            style="padding-left: 25px; padding-right: 25px; color: Darkblue; text-decoration:none">input</a>
    </button>
    </div> -->

        <div class=" mt-10">
            <a href="input.php"> <button class=" text-white rounded-md bg-blue-500 px-10 py-2 hover:bg-blue-700 duration-300" type="submit"
                    value="Masuk">Input</button></a>
        </div>
</body>

</html>