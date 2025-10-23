<?php
    include "koneksi.php";

    date_default_timezone_set('Asia/jakarta');
    $waktu_sekarang = date("H:i:s"); // Mendapatkan waktu saat ini

    $mode = "";
    if($waktu_sekarang >= "09:21:00" && $waktu_sekarang <= "13:23:00") 
        $mode = "Masuk";
    else if($waktu_sekarang > "13:23:00" && $waktu_sekarang < "13:24:00") 
        $mode = "Terlambat";
    else if($waktu_sekarang >= "13:24:00" && $waktu_sekarang < "13:40:00")
        $mode = "Pulang";
    else{
        $mode = "Tidak Ada Kelas";
    }

        $baca_kartu = mysqli_query($connect, "SELECT * FROM tmprfid");
        // Pastikan hasil kueri tidak null sebelum mengambil data
        if ($baca_kartu && mysqli_num_rows($baca_kartu) > 0) {
            $data_kartu = mysqli_fetch_array($baca_kartu);
            $nokartu = $data_kartu['nokartu'];

        } else {
            // Tindakan yang sesuai jika hasil kueri null atau tidak ada baris
            $nokartu = ""; // Atau sesuaikan dengan nilai default yang sesuai
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Read</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-cover bg-center bg-no-repeat h-screen" style="background-image: url('images/bg-3.jpg')">

<div class="container-fluid flex justify-center text-center mt-36 font-mono">
<div class=" border max-w-2xl px-16 py-4 rounded-xl shadow-2xl bg-gray-100">
    <?php if($nokartu=="") { ?>

    <p class="text-2xl font-semibold mt-7">Absen : <?php echo $mode; ?></p>
    <p class="text-2xl font-semibold ">Silahkan Dekatkan Kartu atau Tag RFID Anda</p>
    <div class="flex justify-center">
        <img src="images/rfid1.png" alt="" class="w-96 mt-10 mb-6">
    </div>
    
    <?php } else {
        $cari_mahasiswa = mysqli_query($connect, "SELECT * FROM mahasiswa where nokartu='$nokartu'");
        $jumlah_data= mysqli_num_rows($cari_mahasiswa);

        if($jumlah_data==0) 
            echo "<p>Maaf! Kartu Tidak Dikenali</p>";
        else{ 

        //ambil nama mahasiswa 
        $data_mahasiswa = mysqli_fetch_array($cari_mahasiswa);
        $nama = $data_mahasiswa['nama'];
        $NIM = $data_mahasiswa['NIM'];

        date_default_timezone_set('Asia/jakarta');
        $tanggal = date('Y-m-d');
        $jam_masuk = date("H:i:s");
        $jam_pulang = date("H:i:s");

        //Status
        $masuk = "Present";
        $terlambat = "Late";
        $absen = "Absent";

        $cari_absen_masuk = mysqli_query($connect, "SELECT * FROM absensi where nokartu='$nokartu' and tanggal='$tanggal' and jam_masuk");
        $cari_absen_pulang = mysqli_query($connect, "SELECT * FROM absensi where nokartu='$nokartu' and tanggal='$tanggal' and jam_pulang");
        //hitung jumlah datanya
        $jumlah_absen_masuk = mysqli_num_rows($cari_absen_masuk);  
        $jumlah_absen_pulang = mysqli_num_rows($cari_absen_pulang);  
        if($mode == "Masuk")
        {
            if ($jumlah_absen_masuk > 0) {
                echo "<p> <br> Anda Sudah Absen Masuk <br> <br> $nama <br> $NIM <br> <br> </p>"; 
            }
            else{
                echo "<p><br> Selamat Datang <br> <br> $nama <br> $NIM <br> <br></p>"; 
                mysqli_query($connect, "INSERT INTO absensi (nokartu, tanggal, jam_masuk, status) values ('$nokartu', '$tanggal', '$jam_masuk', '$masuk')");
            }
        }
        else if($mode == "Pulang") {
            if ($jumlah_absen_masuk > 0) { 
                if ($jumlah_absen_pulang > 0){
                echo "<p><br> Anda Sudah Absen Pulang <br> <br> $nama <br> $NIM <br> <br> </p>"; 
            }   else{
                echo "<p><br> Terimakasih Telah <br> Mengikuti Kelas <br> <br> $nama <br> $NIM <br> <br> </p>"; 
                mysqli_query($connect, "UPDATE absensi set jam_pulang='$jam_pulang' WHERE nokartu='$nokartu' and tanggal='$tanggal'");
                }
            } 
            else{
                echo "<br> Anda Terlambat <br> Kelas Telah Berakhir <br> <br> ";
                mysqli_query($connect, "INSERT INTO absensi (nokartu, tanggal, jam_masuk, status) values ('$nokartu', '$tanggal', '$jam_masuk', '$absen')");
            }
        }
        else{
            if($mode == "Terlambat")
                if($jumlah_absen_masuk > 0) {
                    echo "<p><br> Anda Sudah Absen Masuk <br> <br> $nama <br> $NIM <br> <br> </p>";
                }
                else{
                echo "<p><br> Anda Terlambat<br> <br> <br> $nama <br> $NIM <br> <br></p>";
                mysqli_query($connect, "INSERT INTO absensi (nokartu, tanggal, jam_masuk, status) values ('$nokartu', '$tanggal', '$jam_masuk', '$terlambat')");
                }

            else{
                echo "<p><br> Tidak Ada Kelas <br> <br> </p>"; 
            }
    }
}

    mysqli_query($connect, "DELETE FROM tmprfid");
    } ?>
    </div>
</div>
</body>

</html>

