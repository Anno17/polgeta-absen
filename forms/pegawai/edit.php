<?php

include("../../config/koneksi.php");

// kalau tidak ada id di query string
if( !isset($_GET['kode']) ){
    header('Location: ../../../../pegawai.php');
}

//ambil id dari query string
$kode = $_GET['kode'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM vw_pegawai WHERE kode_pegawai='$kode'";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($query);

$nama = $data['nama_pegawai'];
$pend_id = $data['pendidikan_id'];
$pend_nama = $data['nama_pendidikan'];
$jab_id = $data['jabatan_id'];
$jab_nama = $data['nama_jabatan'];
$nama = $data['nama_pegawai'];
$jk = $data['jenis_kelamin'];
$alamat = $data['alamat'];
// $nama = $data['nama'];
// $nama = $data['nama'];

// var_dump($data);
// die;

// jika data yang di-edit tidak ditemukan
if( mysqli_num_rows($query) < 1 ){
    die("data tidak ditemukan...");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../css/main.css">
</head>
<body>
    <form action="../../controller/pegawai.php" method="post">
        <table>
            <input type="hidden" name="id" value="<?php echo $id ; ?>">
            <tr>
                <td>Kode</td>
                <td>:</td>
                <td><input type="text" value="<?php echo $kode ; ?>" name="kode" ></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama" value="<?php echo $nama; ?>"></td>
            </tr>
            <tr>
                <td>Jenis Kelamin</td>
                <td>:</td>
                <td><select name="jk">
                    <option value="L">Laki-Laki</option>
                    <option value="P">Perempuan</option>
                </select></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><textarea name="alamat"><?php echo  $alamat; ?></textarea></td>
            </tr>
            <tr>
                <td>Pendidikan</td>
                <td>:</td>
                <td><select name="pendidikan" > 
                    <option value="<?php echo $pend_id ; ?>"><?php echo  $pend_nama; ?></option>
                    <?php
                        $query = "SELECT * FROM pendidikan  ";
                        $result = mysqli_query($conn, $query);
                        while ($data = mysqli_fetch_array($result)) {
                            $id = $data['id'];
                            $keterangan= $data['nama'];
                        ?>
                         <option value="<?php echo $id; ?>"><?php echo $keterangan; ?></option>
            
                         <?php } ?>
                </select></td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td><select name="jabatan">
                    <option value="<?php echo  $jab_id; ?>"><?php echo  $jab_nama; ?></option>
                    <?php
                        $query = "SELECT * FROM jabatan  ";
                        $result = mysqli_query($conn, $query);
                        while ($data = mysqli_fetch_array($result)) {
                            $id = $data['id'];
                            $keterangan= $data['nama'];
                        ?>
                         <option value="<?php echo $id; ?>"><?php echo $keterangan; ?></option>
            
                         <?php } ?>
                </select></td>
            </tr>
            <tr>
                <td><button type="submit" name='edit'>Simpan</button></td>
                <td>:</td>
                <td><button type="reset">Batal</button></td>
            </tr>
        </table>
    </form>
</body>
</html>