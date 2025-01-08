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
    <header style="color: white;">
        <h3 style="text-align: center;">Formulir Transaksi Baru</h3>
    </header>

    <center>
    <form action="proses-tambah.php" method="POST">
        <fieldset style="color: white; border: none;">
        <table>
            <tr>
                <td>Nama Pelanggan</td>
                <td><select name="idplg">
                    <?php
                    $sql = "SELECT * FROM transaksi"; 
                    $query = mysqli_query($db, $sql); 
                    $transaksi = mysqli_fetch_array($query);
                    echo "<option value=$transaksi[idplg]></option>";
                    $query = mysqli_query($db,"SELECT * FROM pelanggan") or die (mysqli_error($db));
                    while($transaksi = mysqli_fetch_array($query)){
                        echo "<option value=$transaksi[idplg]> $transaksi[nmplg] </option>";
                    }
                    ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Nama Kasir</td>
                <td><select name="idksr">
                    <?php
                    $sql = "SELECT * FROM transaksi"; 
                    $query = mysqli_query($db, $sql); 
                    $transaksi = mysqli_fetch_array($query);
                    echo "<option value=$transaksi[idksr]>$transaksi[nmksr]</option>";
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
                <td><input type="text" name="tgl" value="<?php date_default_timezone_set("Asia/Jakarta");echo date("Y-m-d");?>" />
            </tr>
            <tr>
                <td>Pesanan</td>
                <td><select name="idmkn">
                    <?php
                    $sql = "SELECT * FROM transaksi"; 
                    $query = mysqli_query($db, $sql); 
                    $transaksi = mysqli_fetch_array($query);
                    echo "<option value=$transaksi[idmkn]>$transaksi[nmmkn]</option>";
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
                <td><input type="text" name="hrg"></td>
            </tr>
            <tr>
                <td><label>Jumblah Pesaanan</label></td>
                <td>
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
                <td><input type="text" name="nama" placeholder="Nama lengkap" /></td>
            </tr>
            <tr>
                <td><label for="alamat">Alamat: </label></td>
                <td><input type="text" name="nama" placeholder="Alamat lengkap" /></td>
            </tr>
            <tr>
                <td><label for="jenis_kelamin">Jenis Kelamin: </label></td>
                <td><label><input type="radio" name="jenis_kelamin" value="laki-laki"> Laki-laki</label>
                <label><input type="radio" name="jenis_kelamin" value="perempuan"> Perempuan</label></td>
            </tr>
            <tr>
                <td><label for="agama">Agama: </label></td>
                <td><select name="agama"> 
                    <option>Islam</option>
                    <option>Kristen</option>
                    <option>Hindu</option>
                    <option>Budha</option>
                    <option>Atheis</option>
                </select></td>
            </tr>
            <tr>
                <td><label for="sekolah_asal">Sekolah Asal: </label></td>
                <td><input type="text" name="sekolah_asal" placeholder="Nama sekolah" /></td>
            </tr>
        </table> -->


        <table>
            <tr>
                <td><input type="submit" value="Pesan Sekarang Juga" name="daftar" /></td>
            </tr>
        </table>

            <!-- <p>
                <label for="nama">Nama: </label>
                <input type="text" name="nama" placeholder="nama lengkap" />
            </p>
    
            <p>
                <label for="alamat">Alamat: </label>
                <textarea name="alamat"></textarea>
            </p>

            <p>
                <label for="jenis_kelamin">Jenis Kelamin: </label>
                <label><input type="radio" name="jenis_kelamin" value="laki-laki"> Laki-laki</label>
                <label><input type="radio" name="jenis_kelamin" value="perempuan"> Perempuan</label>
            </p>
    
            <p>
                <label for="agama">Agama: </label>
                <select name="agama"> 
                    <option>Islam</option>
                    <option>Kristen</option>
                    <option>Hindu</option>
                    <option>Budha</option>
                    <option>Atheis</option>
                </select>
            </p>
    
            <p>
                <label for="sekolah_asal">Sekolah Asal: </label>
                <input type="text" name="sekolah_asal" placeholder="nama sekolah" />
            </p> -->
    
            <!-- <p>
                <input type="submit" value="Daftar" name="daftar" />
            </p> -->
        </fieldset>
    </form>
    </center>
    <script src="./jquery.js"></script>
    <script type="text/javascript">
        function isi_otomatis(){
            var nmmkn = $("#nmmkn").val()
            $.ajax({
                url: 'ajax.php',
                data: "nmmkn="+nmmkn,
            }).success(function (data) {
                var json = data,
                obj = JSON.parse(json);
                $('#hrg').val(obj.hrg);
            });
        }
    </script>
</body>
</html>