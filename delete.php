<?php
        include "koneksi.php";
        $id = $_GET['id'];
        $query = mysqli_query($connect, "DELETE FROM mahasiswa where id=$id");
        if ($query) {
            header("location:datamahasiswa.php?message=hapus_berhasil");
        } else {
            header("location:datamahasiswa.php?message=hapus_gagal");
        }
        ?>
