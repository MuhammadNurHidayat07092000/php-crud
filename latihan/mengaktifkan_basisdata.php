<?php
$database = "kampusy";
$selectedDB = mysql_select_db($database,
$connection);
if(!$selectedDB){
die("Tidak bisa menggunakan database {$database}
".mysql_error());
} else {
echo "Database '{$database}' dapat digunakan.";
}
:
?>