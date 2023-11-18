<?php

include("../../config/koneksi.php");

// kalau tidak ada id di query string
if( !isset($_GET['id']) ){
    header('Location: ../../../../jabatan.php');
}

//ambil id dari query string
$id = $_GET['id'];

// buat query untuk ambil data dari database
$sql = "SELECT * FROM jabatan WHERE id=$id";
$query = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($query);

$nama = $data['nama'];
$tambah = $data['penambahan'];

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
    <form action="../../controller/jabatan.php" method="post">
        <table>
            <input type="hidden" name="id" value="<?php echo $id;?>">
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama" value="<?php echo $nama;?>"></td>
            </tr>
            <tr>
                <td>Penambahan</td>
                <td>:</td>
                <td><input type="text" name="penambahan" value="<?php echo $tambah?>"></td>
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