<?php 

$server = "sql207.unaux.com"; 
$user = "unaux_33527086"; 
$password = "masukaja"; 
$nama_database = "unaux_33527086_kantinku_umc";

$db = mysqli_connect($server, $user, $password, $nama_database); 

if( !$db ){ 
    die("Gagal terhubung dengan database: " .
mysqli_connect_error()); 
} 

?>