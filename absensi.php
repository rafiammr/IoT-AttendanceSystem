<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>History Absensi</title>
    <!-- <link rel="stylesheet" href="text/css" href="css/bootstrap.min.css"> -->
    <script type="text/javascript" src="jquery/jquery.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>
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
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Data
                            Mahasiswa</a>
                    </li>
                    <li>
                        <a href="absensi.php"
                            class="block py-2 px-3 text-white bg-blue-700 rounded md:bg-transparent md:text-blue-700 md:p-0 dark:text-white md:dark:text-blue-500"
                            aria-current="page">History</a>
                    </li>
                    <li>
                        <a href="scan.php"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Scan RFID</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container mx-auto relative overflow-x-auto max-w-7xl mt-3 ">
        <table class="w-full text-left rtl:text-right text-gray-500 dark:text-gray-400 text-xl">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="px-6 py-3 text-center">
                        Nama
                    </th>
                    <th scope="col" class="px-6 py-3 flex justify-center">
                        NIM
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Tanggal
                    </th>
                    <th scope="col" class="px-6 py-3 flex justify-center">
                        Jam Masuk
                    </th>
                    <th scope="col" class="px-6 py-3 text-center">
                        Jam Pulang
                    </th>
                    <th scope="col" class="px-6 py-3 flex justify-center">
                        Status
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    include "koneksi.php";
                    date_default_timezone_set('Asia/Jakarta');
                    $tanggal = date('Y-m-d');

                    $sql = mysqli_query($connect, "SELECT b.nama, b.NIM, a.tanggal, a.jam_masuk, a.jam_pulang, a.status FROM absensi a,mahasiswa b where a.nokartu=b.nokartu and a.tanggal='$tanggal'");

                    $no = 0;
                    while($data = mysqli_fetch_array($sql)){
                        $no++;
                    
                ?>

                <tr>
                    <td class="pl-2"> <?php echo $data['nama']; ?> </td>
                    <td class="flex justify-center"> <?php echo $data['NIM']; ?></td>
                    <td class="text-center"> <?php echo $data['tanggal']; ?> </td>
                    <td class="flex justify-center"> <?php echo $data['jam_masuk']; ?> </td>
                    <td class="text-center"> <?php echo $data['jam_pulang']; ?> </td>
                    <td class=" flex justify-center"> <?php echo $data['status']; ?> </td>
                </tr>
                <?php } ?>

            </tbody>
        </table>
    </div>

</body>

</html>