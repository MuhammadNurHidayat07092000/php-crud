<?php
    // PERCABANGAN
    echo "<h2>PERCABANGAN</h2>";
   // if
   echo "<h4>a. if</h4>";
   $nama = 50;
   if($nama >= 50) {
       echo "Lulus";
   } else {
       echo "Tidak Lulus";
   }
   echo "<br>";
   
   // if-else
   echo "<h4>b. if-else</h4>";
   $nilai = 80;
   $kkm = 60;   
   if($nilai >= $kkm) {
       echo "Nilai Bagus";
   } else if($nilai == $kkm) {
        echo "Nilai Standar";
   } else {
       echo "Nilai Rendah";
   }
   echo "<br>";

   // switch case
   echo "<h4>c. swicth case</h4>";
   $nomor = "2";
   switch ($nomor) {
       case '1':
        echo "Kuda";
        break;
       case '2':
        echo "Ayam";
        break;
       case '3':
        echo "Kucing";
        break;  
   }
   echo "<br>";

   //PERULANGAN
   echo "<h2>PERULANGAN</h2>";
   // for
   echo "<h4>a. for</h4>";
   for($i=5; $i<=10 ;$i++) {
       echo $i;
   }
   echo "<br>";

   // while
   echo "<h4>b. while</h4>";
   $i = 1;
   while($i <= 10) {
       echo $i++;
   }
?>