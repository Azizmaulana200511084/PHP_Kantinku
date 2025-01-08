<?php
include("../../config/config.php");

if( !isset($_GET['idtrx']) ){
    header('Location: transaksi.php');
}

$idtrx = $_GET['idtrx'];
$sql = "SELECT * FROM transaksi WHERE idtrx=$idtrx";
$query = mysqli_query($db, $sql);
$transaksi = mysqli_fetch_assoc($query);

if( mysqli_num_rows($query) < 1 ){
 die("data tidak ditemukan...");
}
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
    <header style="color: white;">
        <h3 style="text-align: center;">Formulir Edit Transaksi</h3>
    </header>

    <center>
    <form action="proses-edit.php" method="POST">
        <fieldset style="color: white; border: none;">
            <input type="hidden" name="idtrx" value="
            <?php echo $transaksi['idtrx']
            ?>" />
            <table>
            <tr hidden>
                <td>Nama Pelanggan</td>
                <td><select name="idplg" value="<?php echo $transaksi['idplg'] ?>">
                    <?php
                    $sql = "SELECT * FROM transaksi"; 
                    $query = mysqli_query($db, $sql); 
                    $transaksi = mysqli_fetch_array($query);
                    $query = mysqli_query($db,"SELECT * FROM pelanggan") or die (mysqli_error($db));
                    while($transaksi = mysqli_fetch_array($query)){
                        echo "<option value=$transaksi[idplg]> $transaksi[nmplg] </option>";
                    }
                    ?>
                    </select>
                </td>
            </tr>
            <tr hidden>
                <td>Nama Kasir</td>
                <td><select name="idksr" value="<?php echo $transaksi['idksr'] ?>">
                    <?php
                    $sql = "SELECT * FROM transaksi"; 
                    $query = mysqli_query($db, $sql); 
                    $transaksi = mysqli_fetch_array($query);
                    $query = mysqli_query($db,"SELECT * FROM kasir") or die (mysqli_error($db));
                    while($transaksi = mysqli_fetch_array($query)){
                        echo "<option value=$transaksi[idksr]> $transaksi[nmksr] </option>";
                    }
                    ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td value="<?php echo $transaksi['tgl'] ?>"><input type="text" name="tgl" value="<?php date_default_timezone_set("Asia/Jakarta");echo date("Y-m-d");?>" />
            </tr>
            <tr>
                <td>Pesanan</td>
                <td><select name="idmkn" value="<?php echo $transaksi['idmkn'] ?>">
                    <?php
                    $sql = "SELECT * FROM transaksi"; 
                    $query = mysqli_query($db, $sql); 
                    $transaksi = mysqli_fetch_array($query);
                    $query = mysqli_query($db,"SELECT * FROM makanan") or die (mysqli_error($db));
                    while($transaksi = mysqli_fetch_array($query)){
                        echo "<option value=$transaksi[idmkn]> $transaksi[nmmkn] </option>";
                    }
                    ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Harga</td>
                <td value="<?php echo $transaksi['hrg'] ?>"><input type="text" name="hrg" placeholder="Masukan Perubahan Harga"/></td>
            </tr>
            <tr>
                <td><label>Jumblah Pesaanan</label></td>
                <td value="<?php echo $transaksi['jblmkn'] ?>">
                    <select name='jblmkn'>
                        <option value="">-Jumblah-</option>
                        <?php 
                            for($x=1;$x<=50;$x++){
                                ?>
                                <option value="<?php echo $x; ?>"><?php echo $x; ?></option>
                                <?php
                            }
                        ?>
                    </select>
                </td>
            </tr>
        </table>





            <!-- <table>
                <tr>
                    <td><label for="nama">Nama: </label></td>
                    <td><input type="text" name="nama" placeholder="nama lengkap" value="<?php echo $transaksi['nama'] ?>" /></td>
                </tr>
                <tr>
                    <td><label for="alamat">Alamat: </label></td>
                    <td>
                        <textarea name="alamat">
                            <?php echo $transaksi['alamat']
                            ?>
                        </textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="jenis_kelamin">Jenis Kelamin: </label>
                            <?php $jk = $transaksi['jenis_kelamin'];
                            ?>
                    </td>
                    <td>
                        <label><input type="radio" name="jenis_kelamin" value="laki-laki"
                            <?php echo ($jk == 'laki-laki') ? "checked": ""
                            ?>> Laki-laki</label>
                
                        <label><input type="radio" name="jenis_kelamin" value="perempuan"
                            <?php echo ($jk == 'perempuan') ? "checked": ""
                            ?>> Perempuan</label>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="agama">Agama: </label>
                        <?php $agama = $transaksi['agama']; ?>
                    </td>
                    <td>
                        <select name="agama">
                            <option <?php echo ($agama == 'Islam') ? "selected": "" ?>>Islam</option>
                            <option <?php echo ($agama == 'Kristen') ? "selected": "" ?>>Kristen</option>
                            <option <?php echo ($agama == 'Hindu') ? "selected": "" ?>>Hindu</option>
                            <option <?php echo ($agama == 'Budha') ? "selected": "" ?>>Budha</option>
                            <option <?php echo ($agama == 'Atheis') ? "selected": "" ?>>Atheis</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="sekolah_asal">Sekolah Asal: </label></td>
                    <td>
                        <input type="text" name="sekolah_asal" placeholder="nama sekolah" value="
                        <?php echo $transaksi['sekolah_asal'] ?>" />
                    </td>
                </tr>
            </table> -->
            <table>
                <tr>
                    <td><input type="submit" value="Simpan" name="simpan" /></td>
                </tr>
            </table>
            
            
            <!-- <p>
                <label for="nama">Nama: </label>
                <input type="text" name="nama" placeholder="nama lengkap" value="<?php echo $transaksi['nama'] ?>" />
            </p>
            
            <p>
                <label for="alamat">Alamat: </label>
                <textarea name="alamat">
                    <?php echo $transaksi['alamat']
                    ?>
                </textarea>
            </p>
            
            <p>
                <label for="jenis_kelamin">Jenis Kelamin: </label>
                <?php $jk = $transaksi['jenis_kelamin'];
                ?>
                
                <label><input type="radio" name="jenis_kelamin" value="laki-laki"
                <?php echo ($jk == 'laki-laki') ? "checked": ""
                ?>> Laki-laki</label>
                
                <label><input type="radio" name="jenis_kelamin" value="perempuan"
                <?php echo ($jk == 'perempuan') ? "checked": ""
                ?>> Perempuan</label>
            </p>
            
            <p>
                <label for="agama">Agama: </label>
                <?php $agama = $transaksi['agama']; ?>
                
                <select name="agama">
                    <option <?php echo ($agama == 'Islam') ? "selected": "" ?>>Islam</option>
                    <option <?php echo ($agama == 'Kristen') ? "selected": "" ?>>Kristen</option>
                    <option <?php echo ($agama == 'Hindu') ? "selected": "" ?>>Hindu</option>
                    <option <?php echo ($agama == 'Budha') ? "selected": "" ?>>Budha</option>
                    <option <?php echo ($agama == 'Atheis') ? "selected": "" ?>>Atheis</option>
                </select>
            </p>
 
            <p>
                <label for="sekolah_asal">Sekolah Asal: </label>
                <input type="text" name="sekolah_asal" placeholder="nama sekolah" value="
                <?php echo $transaksi['sekolah_asal'] ?>" />
            </p>
            
            <p>
                <input type="submit" value="Simpan" name="simpan" />
            </p> -->
        </fieldset>
    </form>
    </center>
</body>
</html> 