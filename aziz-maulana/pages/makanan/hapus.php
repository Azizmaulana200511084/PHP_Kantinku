<?php
include("../../config/config.php");
if( isset($_GET['idmkn']) ){
    $idmkn = $_GET['idmkn'];
    $sql = "DELETE FROM makanan WHERE idmkn=$idmkn";
    $query = mysqli_query($db, $sql);
    if( $query ){
        header('Location: makanan.php');
    } else {
        die("gagal menghapus...");
    }
} else {
    die("akses dilarang...");
}
?>
