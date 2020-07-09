<?php
    // defenisikan koneksi
    require('connection.php');
   
    // Cek apakah parameter ID ada
    if (isset($_GET['id'])) {

        // jika ada ambil nilai id
        $id = $_GET['id'];

    } else {
        // jika tidak ada redirect ke index.php
        header('Location:index.php');
    }

    // query sql menampilkan data berdasarkan ID Biodata
    $sql = "SELECT * FROM mahasiswa WHERE id='$id'";

    // tampung data (dalam array) kedalam variable $biodata
    $mhs = mysqli_query($link, $sql);

    if (mysqli_num_rows($mhs) > 0) {
        // jika ada tampilkan kedalam tabel
        $data = mysqli_fetch_assoc($mhs);
    }

    // cek apakah tombol simpan ditekan
    if (isset($_POST['btnubah'])) {
     
        // jika iya maka ambil nilai masing-masing field
        $nim      = htmlentities(strip_tags(trim($_POST['txtnim'])));
        $nama     = htmlentities(strip_tags(trim($_POST['txtnama'])));
        $fakultas = htmlentities(strip_tags(trim($_POST['optfakultas'])));
        $alamat   = htmlentities(strip_tags(trim($_POST['txtalamat'])));
        $jk       = htmlentities(strip_tags(trim($_POST['rjk'])));
        
        // query mengupdate data ke database
        $sql    = "UPDATE mahasiswa SET nim     ='$nim',
                                        nama    ='$nama',
                                        fakultas='$fakultas',
                                        alamat  ='$alamat',
                                        jk      ='$jk'
                    WHERE id='$id'";

        // cek apakah proses update berhasil
        if (mysqli_query($link, $sql)) {

        // jika berhasil, munculkan hasil pada file index
        header('location:index.php');

        } else {

        // jika tidak
        die("Query Error : " . mysqli_error($link));

        }
    }

    // membuat data jurusan menjadi dinamis dalam bentuk array
    $fakultas = array('TEKNIK','KESEHATAN','SOSIAL');

    // membuat function untuk set aktif radio button
    function active_radio_button($value,$input){
   
        // apabilan value dari radio sama dengan yang di input
        $result = $value==$input?'checked':'';
            return $result;
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title>Document</title>
    <link rel="stylesheet" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="fontawesome-free/css/all.min.css">
</head>
<body>
    <div class="container">
        <h2 class="alert alert-danger text-center mt-4">Form Ubah Data</h2>    
        <hr>

        <form action="" method="post">
       

            <div class="form-group">
                <label for="nim">Nim</label>
                <input type="text" name="txtnim" id="nim" class="form-control" value="<?php echo $data['nim']?>">
            </div>

            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="txtnama" id="nama" class="form-control" value="<?php echo $data['nama']?>">
            </div>

            <div class="form-group">
                
                <label for="fakultas">Pilih Fakultas</label><br>
                <select name="optfakultas" id="fakultas">
                    <?php
                        foreach ($fakultas as $j){
                            echo "<option value='$j' ";
                            echo $data['fakultas']==$j?'selected="selected"':'';
                            echo ">$j</option>";
                        }
                    ?>
                </select>
            </div>

            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea class="form-control" name="txtalamat" rows="5" cols="100"><?php echo $data['alamat'];?></textarea>
            </div>

            <div class="form-group">
                <label>Jenis Kelamin</label><br>
                <div class="form-check-inline">
                    <input type="radio" class="form-check-input" name="rjk" id="jk" value="Laki-Laki" <?php echo active_radio_button("Laki-Laki", $data['jk'])?>>Laki-Laki
                </div>
                <div class="form-check-inline">
                    <input type="radio" class="form-check-input" name="rjk" id="jk" value="Perempuan" <?php echo active_radio_button("Perempuan", $data['jk'])?>>Perempuan
                </div>
            </div>
            
            <button type="submit" name="btnubah" class="btn btn-success">Ubah</button>              

        </form>
   
    </div>
</body>
</html>

