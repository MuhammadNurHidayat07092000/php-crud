<?php
    if(isset($_GET['kode'])) {
        //proses hapus data
        require 'connection.php';
        $kode = $_GET['kode'];

        //bersihkan variabel kode
        $kode = mysqli_real_escape_string($link, $kode);

        //buat query, kemudian jalankan
        $query = "DELETE FROM mahasiswa WHERE id=$kode";

        $hasil_query = mysqli_query($link, $query);
        
        //cek apakah query berjalan
        if($hasil_query) {
            header('location:index.php');
        } else {
            die("Query Error : " . mysqli_error($link));
        }

        echo $kode;

    } else {
        // balik ke file index
        header('location:index.php');
    }



?>