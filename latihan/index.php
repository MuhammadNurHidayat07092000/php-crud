<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

    <?php   

    // echo "balajar php<br>";

    // $nama = "yayat";
    // $umur = 19;

    // var_dump($nama + $umur);

    if (isset($_POST['nilainya'])) {
        $nilai = $_POST['txtnilai'];

        if ($nilai >= 81) {
            echo "Grade Anda A";           
        } else if($nilai >= 71) {
             echo "Grade Anda B";
        } else if ($nilai >= 60) {
            echo "Grade Anda C";
        } else if ($nilai >= 50) {
            echo "Grade Anda D";
        } else {
            echo "Grade Anda E";
        }
    }

    ?>

    <form action="" method = "post">
        <input type="number" name = "txtnilai">
        <input type="submit" name = "nilainya" value = "Cek">
    </form>

    <hr>
    <h2>Perulangan</h2>
    
    <?php

    if (isset($_POST['nilainya'])) {
        $nilai = $_POST['txtnilai'];

        for($i=0; $i >= 9; $i++) {
            echo $i, '<br>';
        }
    }
    ?>

    <form action="" method = "post">
        <input type="number" name = "txtulang">
        <input type="submit" name = "ulangnya" value = "Coba">
    </form>

</body>
</html>