<?php
    session_start();
    if(empty($_SESSION['masuk'])) {
        header('locatin: login.php');
    }

    require 'connection.php';
    $id = $_GET;["id"];

    // cek bisa jalan atau tidak
    if(isset($_POST['btnsimpan'])) {
        // ambil nilai input, bersihkan data
        $nim      = htmlentities(strip_tags(trim($_POST['txtnim'])));
        $nama     = htmlentities(strip_tags(trim($_POST['txtnama'])));
        $fakultas = htmlentities(strip_tags(trim($_POST['optfakultas'])));
        $alamat   = htmlentities(strip_tags(trim($_POST['txtalamat'])));
        $jk       = htmlentities(strip_tags(trim($_POST['rjk'])));

        // // variabel untul menampung pesan error
        // $pesan_error="";

        // // cek nim sudah diisi atau belum
        // if(empty($nim)) {
        //     $pesan_error .= "Nim belum diisi";

        // // cek nama
        // if(empty($nama)) {
        //     $pesan_error .= "Nama belum diisi";
        // }

        // // cek fakultas
        // if(empty($fakultas)) {
        //     $pesan_error .= "Fakultas belum diisi";
        // }

        // // cek alamat
        // if(empty($alamat)) {
        //     $pesan_error .= "Alamat belum diisi";
        // }

        // // cek jenis kelamin
        // if(empty($jk)) {
        //     $pesan_error .= "Jenis kelamin belum diisi";
        // }

        $nim      = mysqli_real_escape_string($link, $nim);
        $nama     = mysqli_real_escape_string($link, $nama);
        $fakultas = mysqli_real_escape_string($link, $fakultas);
        $alamat   = mysqli_real_escape_string($link, $alamat);
        $jk       = mysqli_real_escape_string($link, $jk);

        $query = "INSERT INTO mahasiswa VALUES(NULL, '$nim', '$nama', '$fakultas', '$alamat', '$jk')";
        $hasil_query = mysqli_query($link, $query);

        if($hasil_query) {
            header('location:index.php');
        } else {
            die("Query Error : " . mysqli_error($link));
        }
    }    
?>

<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-4.4.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="alert alert-success text-center mt-4">Form Tambah Data</h2>
        <hr>

        <form action="#" method="post">
            <div class="form-group">
                <label for="nim">Nim</label>
                <input type="text" name="txtnim" id="nim" class="form-control" placeholder="Masukkan Nim" autocomlate="off">
            </div>

            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="txtnama" id="nama" class="form-control" placeholder="Masukkan Nama">
            </div>

            <div class="form-group">
                <label for="fakultas">Pilih Fakultas</label>
                <select class="form-control" name="optfakultas" id="fakultas">
                    <option value="">-- Pilih --</option>
                    <option value="TEKNIK">1. Teknik</option>
                    <option value="KESEHATAN">2. Kesehatan</option>
                    <option value="SOSIAL">3. Sosial</option>
                </select>
            </div>  

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" name="txtalamat" id="alamat" cols="100" rows="5"></textarea>
            </div>

            <div class="form-group">
                <label>Jenis Kelamin</label><br>
                <div class="form-check-inline">
                    <input type="radio" class="form-check-input" name="rjk" id="jk" value="Laki-Laki">
                    <label for="jk">Laki-Laki</label>
                </div>
                <div class="form-check-inline">
                    <input type="radio" class="form-check-input" name="rjk" id="jk" value="Perempuan">
                    <label for="jk">Perempuan</label>
                </div>
            </div>

            <button type="submit" name="btnsimpan" class="btn btn-primary">Simpan</button>              
            <button type="riset" name="btnreset" class="btn btn-warning">Reset</button>

            <!-- <label for="nama">Nama</label>
            <input type="text" name="txtnama" id="nama">

            <label for="fakultas">Fakultas</label>
            <select name="optfakultas" id="fakultas">
            
                <option value="">Pilih Fakultas</option>
                <option value="teknik">Teknik</option>
                <option value="kesehatan">Kesehatan</option>
                <option value="sosial">Sosial/option>         
            
            </select>

            <label for="alamat">Alamat</label>
            <textarea name="txtalamat" id="alamat" cols="100" rows="3"></textarea> -->

            <!-- <input type="submit" value="Simpan" name="btnsimpan">
            <input type="reset" value="Reset" name="btnreset">  -->

        </form>
    </div>
</body>
</html>
