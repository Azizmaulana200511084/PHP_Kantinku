<?php
include("../../config/config.php");


if(isset($_POST['daftar'])){
    $idplg = $_POST['idplg'];
    $nmplg = $_POST['nmplg'];
    $jk = $_POST['jk'];
    $hp = $_POST['hp'];
    $email = $_POST['email'];

    $sql = "INSERT INTO pelanggan (nmplg, jk, hp, email) VALUE ('$nmplg', '$jk', '$hp', '$email')";

    $query = mysqli_query($db, $sql);
    if( $query ) {
        header('Location: pelanggan.php?status_pendaftaran=ditambahkan');
    } else {
        header('Location: pelanggan.php?status_pendaftaran=gagal_ditambahkan');
    }
} else {
    die("Akses dilarang...");
}
?>
   