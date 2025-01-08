<?php
include("../../config/config.php");

if( !isset($_GET['idksr']) ){
    header('Location: kasir.php');
}

$idksr = $_GET['idksr'];
$sql = "SELECT * FROM kasir WHERE idksr=$idksr";
$query = mysqli_query($db, $sql);
$kasir = mysqli_fetch_assoc($query);

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
        <h3 style="text-align: center;">Formulir Edit Kasir</h3>
    </header>

    <center>
    <form action="proses-edit.php" method="POST">
        <fieldset style="color: white; border: none;">
            <input type="hidden" name="idksr" value="
            <?php echo $kasir['idksr']
            ?>" />

            <table>
                <tr>
                    <td><label for="nmksr">Nama Kasir: </label></td>
                    <td><input type="text" name="nmksr" placeholder="Nama Lengkap" value="<?php echo $kasir['nmksr'] ?>" /></td>
                </tr>
                <tr>
                    <td>
                        <label for="jk">Jenis Kelamin: </label>
                            <?php $jk = $kasir['jk'];
                            ?>
                    </td>
                    <td>
                        <label><input type="radio" name="jk" value="laki-laki"
                            <?php echo ($jk == 'laki-laki') ? "checked": ""
                            ?>> Laki-laki</label>
                
                        <label><input type="radio" name="jk" value="perempuan"
                            <?php echo ($jk == 'perempuan') ? "checked": ""
                            ?>> Perempuan</label>
                    </td>
                </tr>
                <tr>
                    <td><label for="alamat">Alamat: </label></td>
                    <td>
                        <textarea name="alamat">
                            <?php echo $kasir['alamat']
                            ?>
                        </textarea>
                    </td>
                </tr>
                <tr>
                    <td><label for="hp">Hp: </label></td>
                    <td><input type="text" name="hp" placeholder="Nomor Handphone" value="<?php echo $kasir['hp'] ?>" /></td>
                </tr>
            </table>
            <table>
                <tr>
                    <td><input type="submit" value="Simpan" name="simpan" /></td>
                </tr>
            </table>




            <!-- <table>
                <tr>
                    <td><label for="nama">Nama: </label></td>
                    <td><input type="text" name="nama" placeholder="nama lengkap" value="<?php echo $kasir['nama'] ?>" /></td>
                </tr>
                <tr>
                    <td><label for="alamat">Alamat: </label></td>
                    <td>
                        <textarea name="alamat">
                            <?php echo $kasir['alamat']
                            ?>
                        </textarea>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="jenis_kelamin">Jenis Kelamin: </label>
                            <?php $jk = $kasir['jenis_kelamin'];
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
                        <?php $agama = $kasir['agama']; ?>
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
                        <?php echo $kasir['sekolah_asal'] ?>" />
                    </td>
                </tr>
            </table>
            <table>
                <tr>
                    <td><input type="submit" value="Simpan" name="simpan" /></td>
                </tr>
            </table> -->
            
            
            <!-- <p>
                <label for="nama">Nama: </label>
                <input type="text" name="nama" placeholder="nama lengkap" value="<?php echo $kasir['nama'] ?>" />
            </p>
            
            <p>
                <label for="alamat">Alamat: </label>
                <textarea name="alamat">
                    <?php echo $kasir['alamat']
                    ?>
                </textarea>
            </p>
            
            <p>
                <label for="jenis_kelamin">Jenis Kelamin: </label>
                <?php $jk = $kasir['jenis_kelamin'];
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
                <?php $agama = $kasir['agama']; ?>
                
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
                <?php echo $kasir['sekolah_asal'] ?>" />
            </p>
            
            <p>
                <input type="submit" value="Simpan" name="simpan" />
            </p> -->
        </fieldset>
    </form>
    </center>
</body>
</html> 