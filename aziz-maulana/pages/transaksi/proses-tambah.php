<?php
include("../../config/config.php");

if(isset($_POST['daftar'])){
    $idtrx = $_POST['idtrx'];
    $idplg = $_POST['idplg'];
    $idksr = $_POST['idksr'];
    $tgl = $_POST['tgl'];
    $idmkn = $_POST['idmkn'];
    $hrg = $_POST['hrg'];
    $jblmkn = $_POST['jblmkn'];
    $ttlbyr = $hrg*$jblmkn;

    $sql = "INSERT INTO transaksi (idplg, idksr, tgl, idmkn, hrg, jblmkn, ttlbyr) VALUE ('$idplg', '$idksr', '$tgl', '$idmkn', '$hrg', '$jblmkn', '$ttlbyr')";

    $query = mysqli_query($db, $sql);
    if( $query ) {
        header('Location: transaksi.php?status_pendaftaran=ditambahkan');
    } else {
        header('Location: transaksi.php?status_pendaftaran=gagal_ditambahkan');
    }
} else {
    die("Akses dilarang...");
}
?>
   