<?php
include("../../config/config.php");

if(isset($_POST['simpan'])){
    $idmkn = $_POST['idmkn'];
    $nmmkn = $_POST['nmmkn'];
    $desk = $_POST['desk'];
    $sql = "UPDATE makanan SET nmmkn='$nmmkn', desk='$desk' WHERE idmkn=$idmkn";
    
    $query = mysqli_query($db, $sql);
    if( $query ) {
        header('Location: makanan.php?status_update=update');
    } else {
        header('Location: makanan.php?status_update=gagal_edit');
    }
} else {
    die("Akses dilarang...");
}
?>   