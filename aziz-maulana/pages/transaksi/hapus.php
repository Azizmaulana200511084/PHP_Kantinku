<?php
include("../../config/config.php");
if( isset($_GET['idtrx']) ){
    $idtrx = $_GET['idtrx'];
    $sql = "DELETE FROM transaksi WHERE idtrx=$idtrx";
    $query = mysqli_query($db, $sql);
    if( $query ){
        header('Location: transaksi.php');
    } else {
        die("gagal menghapus...");
    }
} else {
    die("akses dilarang...");
}
?>
