<?php 
//variable
$host = 'localhost';
$user ='root';
$pass ='root';
$db ='kampusy';

$link = mysqli_connect($host, $user, $pass, $db);


if (!$link){
	die('koneksi gagal - ' . mysqli_connect_error());
}

 ?>