<?php
include 'template/header.php';
include 'config/koneksi.php';
//index.php

//menangkap pesan jawaban dari controller
if (isset($_GET['error']) && $_GET['error'] === 'pegawai_sudah_absen') {
    echo "<script>alert('Pegawai sudah absen!')</script>";
}
?>
<div class="container">
    <h3>SELAMAT DATANG DI SISTEM KEHADIRAN POLGETA</h3>
    <div class="content">
        <div class="absence-column">
            <h5>INPUT ABSEN POLGETA CUY</h5>
            <form action="controller/absen.php" method="POST">
                <table>
                    <tr>
                        <td>Kode Karyawan</td>
                        <td>:</td>
                        <td><input type="text" name='kode'></td>
                    </tr>
                    <tr>
                        <td>Keterangan</td>
                        <td>:</td>
                        <td><select name="keterangan" id="">
                        <?php
                        $query = "SELECT * FROM keterangan  ";
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
                        <td><input type="submit" name='absen' value="Kirim"></td>
                        <td>:</td>
                        <td><input type="reset" value="Batal"></td>
                    </tr>
                </table>
            </form>
        </div>
        <div class="data-today">
            <table border=1>
            <tr>
                <th>Tanggal</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Status</th>
                <th>Jam Masuk</th>
                <th>Jam Keluar</th>
            </tr>
            <?php
            $query = "SELECT * FROM vw_absen where tanggal_absen = CURDATE()";
            $result = mysqli_query($conn, $query);
        while ($data = mysqli_fetch_array($result)) {
            $tanggal = $data['tanggal_absen'];
            $kode= $data['kode_pegawai'];
            $nama = $data['nama_pegawai'];
            $ket_id = $data['keterangan_id'];
            $keterangan = $data['keterangan'];
            $in  = $data['jam_masuk'];
            $out  = $data['jam_keluar'];
    
        ?>
             <tr>
            <td><?php echo $tanggal; ?></td>
            <td><?php echo $kode; ?></td>
            <td><?php echo $nama; ?></td>
            <td><?php echo $keterangan; ?></td>
            <td><?php echo $in; ?></td>
            <td>
            <?php 
                if ($out == 0 && $ket_id == 1) {
                    echo "<form action='controller/absen.php' method='post'>
                        <input type='hidden' name='kode' value='".$kode."'>
                        <button type='submit' name='jam_keluar' value='".date("H:i:s")."'>Pulang</button>
                    </form>";
                } else {
                    echo $out;
                }
                ?>
            </td>

            
            
        </tr>
        <?php } ?>

            </table>
        
        </div>
    </div>
</div>
<?php 
include 'template/footer.php';
?>

