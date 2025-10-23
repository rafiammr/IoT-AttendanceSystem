<?php
    include "koneksi.php";

    $id = $_GET['id'];

    $dataedit = mysqli_query($connect,"SELECT * FROM mahasiswa where id='$id'");
    $hasil = mysqli_fetch_array($dataedit);

    if(isset($_POST["submit"])){
        $nokartu = $_POST['nokartu'];
        $nama = $_POST['nama'];
        $NIM = $_POST['NIM'];

        $simpan = mysqli_query($connect, "UPDATE mahasiswa SET nokartu='$nokartu', nama='$nama', NIM='$NIM' WHERE id='$id'");

        if($simpan){
            header("location:edit.php?id=$id&message=edit_berhasil");
        } else{
            header("location:edit.php?id=$id&message=edit_gagal");
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home IOT</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head> -->
    <script src="https://cdn.tailwindcss.com"></script>

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
                        class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">Data Mahasiswa</a>
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

    <div class="flex justify-center mt-20 ">
        <?php if (isset($_GET['message'])): ?>
            <div class="container shadow-xl rounded-xl max-w-md mx-auto bg-white border-2 p-5 font-semibold text-center">
                <div class="text-red-500">
                <?php
                    if ($_GET['message'] == "edit_gagal") {
                        echo "Edit data gagal! <br>";
                    }
                ?>
                </div>

                <div>
                    <?php if (isset($_GET['message'])) {
                            if ($_GET['message'] == "edit_berhasil") {
                            echo "Edit data berhasil! <br>";
                            }
                        }
                    ?>
                </div>

            </div>
        <?php endif; ?>
    </div>

    <div class="flex  justify-center mt-20 ">
        <div class="container shadow-xl rounded-xl max-w-md mx-auto bg-white border-2 p-5">
            <div>
                <p class="text-xl mb-8">Edit Mahasiswa</p>
            </div>
            <form method="POST">

                    <div class="form-outline">
                        <label class="form-label" for="formControlLg" style="color:black;">No Kartu</label>
                        <input type=" text" required id="nokartu"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            name="nokartu" value="<?php echo $hasil['nokartu']?>" readonly/>
                    </div>

                    <div class="form-outline">
                        <label class="form-label" for="formControlLg" style="color:black;">Nama</label>
                        <input type="int" required id="formControlLg"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            name="nama" style="color:black;" value="<?php echo $hasil['nama']?>" />
                    </div>

                    <div class="form-outline">
                        <label class="form-label" for="formControlLg" style="color:black;">NIM</label>
                        <input type="int" required id="formControlLg"
                            class="block w-full rounded-md border-0 px-3.5 py-2 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm sm:leading-6"
                            name="NIM" value="<?php echo $hasil['NIM']?>" />
                    </div>

                    <div class=" mt-10 flex justify-center mb-4">
                        <a href="input.php"> <button class=" text-white rounded-md bg-green-500 px-10 py-2 m-2 duration-300 hover:bg-green-700" type="submit"
                                value="Masuk" name="submit">Submit</button></a>
                        <a href="datamahasiswa.php"> <button class=" text-white rounded-md bg-red-500 px-8 py-2 m-2 duration-300 hover:bg-red-700" type="button">Kembali</button>
                        </a>
                    </div>
            </form>
        </div>
    </div>
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script> -->
</body>

</html>