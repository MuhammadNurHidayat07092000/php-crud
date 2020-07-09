<?php
    $host = "localhost";
    $user = "root";
    $passwd = "root";
    $koneksi = mysql_connect($host,$user,$passwd,);
    if(!$koneksi) {
        die("Tidak Bisa Tersambung ke Database :"
        .mysql_error());
    } else {
        echo "Tersambung ke database";
    }
    mysql_close($koneksi);

?>