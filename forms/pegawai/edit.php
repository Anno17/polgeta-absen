<?php

include("../../config/koneksi.php");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: ../../../../pegawai.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM pegawai WHERE id=$id";
$query = mysqli_query($db, $sql);
$siswa = mysqli_fetch_assoc($query);

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
            <tr>
                <td>Kode</td>
                <td>:</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>Alamat</td>
                <td>:</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>Pendidikan</td>
                <td>:</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>Jabatan</td>
                <td>:</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td><button type="submit" name='input'>Simpan</button></td>
                <td>:</td>
                <td><button type="reset">Batal</button></td>
            </tr>
        </table>
    </form>
</body>
</html>