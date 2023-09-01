<?php 
$server = "localhost";
$user = "root";
$pw = "";
$db ="sehatkeluarga";

$koneksi = mysqli_connect($server,$user,$pw,$db);
 
// Check connection
if (mysqli_connect_errno()){
	echo "Koneksi database gagal : " . mysqli_connect_error();
}
