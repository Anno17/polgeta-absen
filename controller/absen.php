<?php 
include '../config/koneksi.php';


if (isset($_POST["absen"])) {
    // Mengambil data dari form
    $kode = $_POST["kode"];
    $keterangan = $_POST["keterangan"];
    $date = date("Y-m-d"); // Format tanggal
    $in = $_POST["jam_masuk"]; // Format jam:menit:detik
    
    //pengecekan jika absen sudah dilakukan
    $sql_check = "SELECT * FROM absen WHERE kode_pegawai = '$kode' AND tanggal = '$date'";
    $result = $conn->query($sql_check);
    if ($result->num_rows > 0) {
        // Data sudah ada, tampilkan pesan kesalahan
        header("Location: ../index.php?error=pegawai_sudah_absen");
        
        exit;
    }

    if ($keterangan == 1) {
        $sql = "INSERT INTO absen (kode_pegawai, keterangan_id, tanggal, jam_masuk) VALUES ('$kode', '$keterangan', '$date', '$in')";
    } else {
        $sql = "INSERT INTO absen (kode_pegawai, keterangan_id, tanggal) VALUES ('$kode', '$keterangan', '$date')";
    }

    // Lakukan pengecekan apakah query berhasil dijalankan
    if ($conn->query($sql) === true) {
        // Jika berhasil, arahkan kembali ke halaman yang sama
        header("Location: ../index.php");
        exit; // Penting untuk menghentikan eksekusi kode selanjutnya
    } else {
        header("Location: ../gaji.php");
        echo "Error: " . $sql . "<br>" . $conn->error;
        
    }

    
    $conn->close();
}

if (isset($_POST["jam_keluar"])) {
    // Kode yang akan dijalankan ketika tombol "Submit" diklik
    $kode = $_POST['kode'];
    $out = $_POST["jam_keluar"];
    $sql = "UPDATE absen SET jam_keluar='$out' WHERE kode_pegawai='$kode'";
      // Lakukan pengecekan apakah query berhasil dijalankan
      if ($conn->query($sql) === true) {
        // Jika berhasil, arahkan kembali ke halaman yang sama
        header("Location: ../index.php");
        exit; // Penting untuk menghentikan eksekusi kode selanjutnya
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

}