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
                <td>Nama</td>
                <td>:</td>
                <td><input type="text"></td>
            </tr>
            <tr>
                <td>Penambahan</td>
                <td>:</td>
                <td><input type="number"></td>
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