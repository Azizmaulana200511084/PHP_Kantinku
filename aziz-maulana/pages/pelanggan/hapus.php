<?php
include("../../config/config.php");
if( isset($_GET['idplg']) ){
    $idplg = $_GET['idplg'];
    $sql = "DELETE FROM pelanggan WHERE idplg=$idplg";
    $query = mysqli_query($db, $sql);
    if( $query ){
        header('Location: pelanggan.php');
    } else {
        die("gagal menghapus...");
    }
} else {
    die("akses dilarang...");
}
?>
