<?php
include("../../config/config.php");
if( isset($_GET['idksr']) ){
    $idksr = $_GET['idksr'];
    $sql = "DELETE FROM kasir WHERE idksr=$idksr";
    $query = mysqli_query($db, $sql);
    if( $query ){
        header('Location: kasir.php');
    } else {
        die("gagal menghapus...");
    }
} else {
    die("akses dilarang...");
}
?>
