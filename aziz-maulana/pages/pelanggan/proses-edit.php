<?php
include("../../config/config.php");

if(isset($_POST['simpan'])){
    $idplg = $_POST['idplg'];
    $nmplg = $_POST['nmplg'];
    $jk = $_POST['jk'];
    $hp = $_POST['hp'];
    $email = $_POST['email'];
    $sql = "UPDATE pelanggan SET nmplg='$nmplg', jk='$jk', hp='$hp', email='$email' WHERE idplg=$idplg";
    
    $query = mysqli_query($db, $sql);
    if( $query ) {
        header('Location: pelanggan.php?status_update=update');
    } else {
        header('Location: pelanggan.php?status_update=gagal_edit');
    }
} else {
    die("Akses dilarang...");
}
?>   