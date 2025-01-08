<?php
include("../../config/config.php");
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>Aziz Maulana</title>
    <link rel="stylesheet" href="/aziz-maulana/css/styles.css">
</head>

<body>
    <input type="checkbox" id="aziz-menu">
    <label for="aziz-menu">
        <div class="aku">
            <span class="daftar-menu"></span>
            <span class="daftar-menu"></span>
            <span class="daftar-menu"></span>
            <span class="daftar-menu"></span>
            <span class="daftar-menu"></span>
            <span class="daftar-menu"></span>
        </div>
    </label>

    <div class="link-menusamping"></div>
    <div class="aziz-menu">
        <ul>
            <img src="/aziz-maulana/gambar/logo.png" class="azizlogo"><br>
            <li><a href="/index.php">Beranda</a></li>
            <li><a href="/aziz-maulana/pages/pelanggan/pelanggan.php">Pelanggan</a></li>
            <li><a href="/aziz-maulana/pages/kasir/kasir.php">Kasir</a></li>
            <li><a href="/aziz-maulana/pages/makanan/makanan.php">Menu Makanan</a></li>
            <li><a href="/aziz-maulana/pages/transaksi/transaksi.php">Transaksi</a></li>
            <li><a href="/aziz-maulana/pages/about.html">about</a></li>
        </ul>
    </div>

    <br><br>

    <nav> 
        <a href="tambah.php">[+] Tambah Baru</a> 
    </nav>
    <center style="color: white;">
    <?php if(isset($_GET['status_pendaftaran'])): ?>
    <p>
        <?php
            if($_GET['status_pendaftaran'] == 'ditambahkan'){
                echo "Transaksi baru berhasil!";
            } else {
                echo "Pendaftaran gagal!";
            }
        ?>
    </p>
    <?php endif; ?>
    </center>
    <center style="color: white;">
    <?php if(isset($_GET['status_update'])): ?>
    <p>
        <?php
            if($_GET['status_update'] == 'update'){
                echo "Pembaharuan Transaksi berhasil di perbaharui!";
            } else {
                echo "Pendaftaran gagal!";
            }
        ?>
    </p>
    <?php endif; ?>
    </center>

    <center>
    <table border="1"> 
    <thead> 
        <tr> 
            <th>No</th> 
            <th>ID Pelanggan</th>
            <th>ID Kasir</th> 
            <th>Tanggal</th> 
            <th>ID Pesanan</th> 
            <th>Harga</th>
            <th>Jumblah Pesanan</th>
            <th>Total Harga</th> 
            <th>Tindakan</th> 
        </tr> 
    </thead> 
    <tbody>
        
        <?php 
        $sql = "SELECT * FROM transaksi";
        $query = mysqli_query($db, $sql);
        
        while($transaksi = mysqli_fetch_array($query)){
            echo "<tr>"; 
            echo "<td>".$transaksi['idtrx']."</td>";
            echo "<td>".$transaksi['idplg']."</td>"; 
            echo "<td>".$transaksi['idksr']."</td>"; 
            echo "<td>".$transaksi['tgl']."</td>"; 
            echo "<td>".$transaksi['idmkn']."</td>"; 
            echo "<td>".$transaksi['hrg']."</td>";
            echo "<td>".$transaksi['jblmkn']."</td>";
            echo "<td>".$transaksi['ttlbyr']."</td>"; 
 
            echo "<td style='background-color:red; color:yellow;'>"; 
            echo "<a href='edit.php?idtrx=".$transaksi['idtrx']."' style='color:white;' class='eh'>Edit</a> ";
            echo " <br>|||<br> "; 
            echo "<a href='hapus.php?idtrx=".$transaksi['idtrx']."' style='color:white;' class='eh'>Hapus</a>"; 
            echo "</td>"; 
 
            echo "</tr>"; } 
        ?>
    </tbody>
    <p style="color: white; font-size:large; text-align:center; background-color: red;">TABEL TRANSAKSI</p>
    <p style="color: white; font-size:large; text-align:center;">Total: <?php echo mysqli_num_rows($query) ?></p>
    </table> 
    </center>
    </body> 
</html> 