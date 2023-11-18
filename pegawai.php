<?php
include 'template/header.php';
include 'config/koneksi.php';
$query = "SELECT * FROM vw_pegawai";
$result = mysqli_query($conn, $query);
// bisa juga dengan
// $result = mysqli_query($conn,"SELECT * FROM buku INNER JOIN kategori ON buku.id_kategori = kategori.id_kategori ");  
?>
<div class="container">
    <h3>SELAMAT DATANG DI SISTEM KEHADIRAN POLGETA</h3>
    <div class="content">
        
        <div class="data-today">
            <button><a href="forms/pegawai/input.php">TAMBAH</a></button>
            
            <table border=1>
            <tr>
                <th>Id</th>
                <th>Kode</th>
                <th>Nama</th>
                <th>Kelamin</th>
                <th>Alamat</th>
                <th>Pendidikan</th>
                <th>Jabatan</th>
            </tr>
            <?php
            $id=0;
        while ($data = mysqli_fetch_array($result)) {
            $id++;
            $kode = $data['kode_pegawai'];
            $nama= $data['nama_pegawai'];
            $kelamin = $data['jenis_kelamin'];
            $alamat  = $data['alamat'];
            $pendidikan  = $data['nama_pendidikan'];
            $jabatan  = $data['nama_jabatan'];
        
        ?>
        <tr>
            <td><?php echo $id; ?></td>
            <td><?php echo $kode; ?></td>
            <td><?php echo $nama; ?></td>
            <td><?php echo $kelamin; ?></td>
            <td><?php echo $alamat; ?></td>
            <td><?php echo $pendidikan; ?></td>
            <td><?php echo $jabatan; ?></td>
            <td><?php echo "<a href='controller/pegawai.php?kode=".$kode."'>Hapus</a> | <a href='forms/pegawai/input.php?id".$kode."'>Edit</a>"; ?></td>
        </tr>
        <?php } ?>
            </table>
        
        </div>
    </div>
</div>
<?php 
include 'template/footer.php';
?>