<?php
include("../../config/config.php");



if(isset($_POST['daftar'])){
    $idksr = $_POST['idksr'];
    $nmksr = $_POST['nmksr'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $hp = $_POST['hp'];
    $sql = "INSERT INTO kasir (nmksr, jk, alamat, hp) VALUE ('$nmksr', '$jk', '$alamat', '$hp')";

    $query = mysqli_query($db, $sql);
    if( $query ) {
        header('Location: kasir.php?status_pendaftaran=ditambahkan');
    } else {
        header('Location: kasir.php?status_pendaftaran=gagal_ditambahkan');
    }
} else {
    die("Akses dilarang...");
}
?>
   