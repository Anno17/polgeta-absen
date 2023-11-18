<?php include("../../config/koneksi.php"); ?>
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
                <td><input type="text" name="kode"></td>
            </tr>
            <tr>
                <td>Nama</td>
                <td>:</td>
                <td><input type="text" name="nama"></td>
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
                <td><textarea name="alamat"></textarea></td>
            </tr>
            <tr>
                <td>Pendidikan</td>
                <td>:</td>
                <td><select name="pendidikan" > 
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
                <td><select name="jabatan">                    <?php
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
                <td><button type="submit" name='input'>Simpan</button></td>
                <td>:</td>
                <td><button type="reset">Batal</button></td>
            </tr>
        </table>
    </form>
</body>
</html>