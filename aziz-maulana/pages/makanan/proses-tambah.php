<?php
include("../../config/config.php");

if(isset($_POST['daftar'])){
    $idmkn = $_POST['idmkn'];
    $nmmkn = $_POST['nmmkn'];
    $desk = $_POST['desk'];

    $sql = "INSERT INTO makanan (nmmkn, desk) VALUE ('$nmmkn', '$desk')";

    $query = mysqli_query($db, $sql);
    if( $query ) {
        header('Location: makanan.php?status_pendaftaran=ditambahkan');
    } else {
        header('Location: makanan.php?status_pendaftaran=gagal_ditambahkan');
    }
} else {
    die("Akses dilarang...");
}
?>