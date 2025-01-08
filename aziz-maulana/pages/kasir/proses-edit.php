<?php
include("../../config/config.php");

if(isset($_POST['simpan'])){
    $idksr = $_POST['idksr'];
    $nmksr = $_POST['nmksr'];
    $jk = $_POST['jk'];
    $alamat = $_POST['alamat'];
    $hp = $_POST['hp'];
    $sql = "UPDATE kasir SET nmksr='$nmksr', jk='$jk', alamat='$alamat', hp='$hp' WHERE idksr=$idksr";
    
    $query = mysqli_query($db, $sql);
    if( $query ) {
        header('Location: kasir.php?status_update=update');
    } else {
        header('Location: kasir.php?status_update=gagal_edit');
    }
} else {
    die("Akses dilarang...");
}
?>   