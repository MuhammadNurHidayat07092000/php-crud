<?php
    $host = "localhost";
    $user = "root";
    $passwd = "root";
    $database = "kampusy";

    $koneksi = mysql_connect($host,$user,$passwd);
    mysql_select_db($database,$koneksi);
?>