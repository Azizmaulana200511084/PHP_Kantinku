<?php
include("../../config/config.php");

if(isset($_POST['simpan'])){
    $idtrx = $_POST['idtrx'];
    $idplg = $_POST['idplg'];
    $idksr = $_POST['idksr'];
    $tgl = $_POST['tgl'];
    $idmkn = $_POST['idmkn'];
    $hrg = $_POST['hrg'];
    $jblmkn = $_POST['jblmkn'];
    $ttlbyr = $hrg*$jblmkn;

    $sql = "UPDATE transaksi SET tgl='$tgl', idmkn='$idmkn', hrg='$hrg', jblmkn='$jblmkn', ttlbyr='$ttlbyr' WHERE idtrx=$idtrx";
    
    $query = mysqli_query($db, $sql);
    if( $query ) {
        header('Location: transaksi.php?status_update=update');
    } else {
        header('Location: transaksi.php?status_update=gagal_edit');
    }
} else {
    die("Akses dilarang...");
}
?>   