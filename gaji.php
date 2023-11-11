<?php
include 'template/header.php';
include 'config/koneksi.php';
$query = "CALL sp_gaji_total";
$result = mysqli_query($conn, $query);
if (!$result) {
    die("Error: " . mysqli_error($conn));
}

?>
<div class="container">
    <h1>hhh</h1>

<table border="1">
        <tr>
            <th>Tahun</th>
            <th>Bulan</th>
            <th>Kode Pegawai</th>
            <th>Nama Pegawai</th>
            <th>Jenis Kelamin</th>
            <th>Nama Jabatan</th>
            <th>Nama Pendidikan</th>
            <th>Total Hadir</th>
            <th>Total Tidak Hadir</th>
            <th>Total Sakit</th>
            <th>Gaji Perhari</th>
            <th>Penambahan Pendidikan</th>
            <th>Potongan BPJS</th>
            <th>Total Gaji</th>
        </tr>
        <?php
        while ($data = mysqli_fetch_array($result)) {
            $tahun = $data['tahun'];
            $bulan= $data['bulan'];
            $kode = $data['kode_pegawai'];
            $nama  = $data['nama_pegawai'];
            $pendidikan_id  = $data['pendidikan_id'];
            $jabatan_id  = $data['jabatan_id'];
            $nama_jab  = $data['nama_jabatan'];
            $nama_pend  = $data['nama_pendidikan'];
            $total_hadir = $data['total_hadir'];
            $total_tdkhadir  = $data['total_tidakhadir'];
            $total_sakit = $data['total_sakit'];
            $gaji_perhari = $data['gaji_perhari'];
            $potongan  = $data['potongan_bpjs'];
            $penambahan  = $data['penambahan'];
            $total_gaji  = $data['total_gaji'];
            
            $jk  = $data['jenis_kelamin'];
            
            $persen_penambahan = $penambahan * 100;
            $persen_potongan = $potongan * 100;
        ?>
        <tr>
            <td><?php echo $tahun; ?></td>
            <td><?php echo $bulan; ?></td>
            <td><?php echo $kode; ?></td>
            <td><?php echo $nama; ?></td>
            <td><?php echo $jk; ?></td>
            <td><?php echo $nama_jab; ?></td>
            <td><?php echo $nama_pend; ?></td>
            <td><?php echo $total_hadir; ?></td>
            <td><?php echo $total_tdkhadir; ?></td>
            <td><?php echo $total_sakit; ?></td>
            <td><?php echo $gaji_perhari; ?></td>
            <td><?php echo $persen_penambahan.'%'; ?></td>
            <td><?php echo $persen_potongan.'%'; ?></td>
            <td><?php echo $total_gaji; ?></td>
        </tr>
        <?php } ?>
    </table>
</div>

<?php 
include 'template/footer.php';
//iki
?>

    
