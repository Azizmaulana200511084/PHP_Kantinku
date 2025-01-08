<?php 
$koneksi = mysqli_connect("localhost", "root", "", "kantinku_umc");
$nmmkn = $_GET['nmmkn'];
$query = mysqli_query($koneksi, "SELECT * FROM makanan where nmmkn='$nmmkn'");
$makanan = mysqli_fetch_array($query);
$data = array(
    'hrg' => $makanan['hrg'],);
echo json_encode($data);
?>