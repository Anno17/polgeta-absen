<?php
include 'template/header.php';
include 'config/koneksi.php';
$query = "SELECT * FROM jabatan";
$result = mysqli_query($conn, $query);
// bisa juga dengan
// $result = mysqli_query($conn,"SELECT * FROM buku INNER JOIN kategori ON buku.id_kategori = kategori.id_kategori ");  
?>
<div class="container">
    <h3>SELAMAT DATANG DI SISTEM KEHADIRAN POLGETA</h3>
    <div class="content">
        
        <div class="data-today">
            <button><a href="forms/jabatan/input.php">TAMBAH</a></button>
            
            <table border=1>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Penambahan</th>
                <th>Aksi</th>
            </tr>
            <?php
            $no=0;
        while ($data = mysqli_fetch_array($result)) {
            $no++;
            $id= $data ['id'];
            $nama = $data['nama'];
            $tambah= $data['penambahan'];
        ?>
        <tr>
            <td><?php echo $no; ?></td>
            <td><?php echo $nama; ?></td>
            <td><?php echo $tambah; ?></td>
            <td><?php echo "<a href='controller/jabatan.php?id=".$id."'>Hapus</a> | <a href='forms/jabatan/edit.php?id=".$id."'>Edit</a>"; ?></td>
        </tr>
        <?php } ?>
            </table>
        
        </div>
    </div>
</div>
<?php 
include 'template/footer.php';
?>