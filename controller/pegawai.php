<?php
include '../config/koneksi.php';
if (isset($_POST["input"])) {
    $kode = $_POST ['kode'];
    $nama = $_POST ['nama'];
    $jk = $_POST ['jk'];
    $alamat = $_POST ['alamat'];
    $pendidikan = $_POST ['pendidikan'];
    $jabatan = $_POST ['jabatan'];
   
    $sql= "INSERT INTO pegawai (kode,nama,jenis_kelamin,alamat,pendidikan_id,jabatan_id) VALUE ($kode,$nama,$jk,$alamat,$pendidikan,$jabatan)";
    
    if ($conn->query($sql) === true) {
        // Jika berhasil, arahkan kembali ke halaman yang sama
        header("Location: ../index.php");
        exit; // Penting untuk menghentikan eksekusi kode selanjutnya
    } else {
        header("Location: ../master-pegawai.php");
        echo "Error: " . $sql . "<br>" . $conn->error;
        
    }

    
    $conn->close();
}

if (isset($_POST["edit"])) {
    $id= $_POST ['id'];
    $kode = $_POST ['kode'];
    $nama = $_POST ['nama'];
    $jk = $_POST ['jk'];
    $alamat = $_POST ['alamat'];
    $pendidikan = $_POST ['pendidikan'];
    $jabatan = $_POST ['jabatan'];
   
    $sql= "UPDATE pegawai SET kode=$kode, nama=$nama, jenis_kelamin=$jk, alamat=$alamat, pendidikan_id=$pendidikan, jabatan_id=$jabatan";
    
    if ($conn->query($sql) === true) {
        // Jika berhasil, arahkan kembali ke halaman yang sama
        header("Location: ../index.php");
        exit; // Penting untuk menghentikan eksekusi kode selanjutnya
    } else {
        header("Location: ../master-pegawai.php");
        echo "Error: " . $sql . "<br>" . $conn->error;
        
    }

    
    $conn->close();
}


if (isset($_GET["kode"])) {
    $kode= $_GET ['kode'];

    $sql= "DELETE FROM absen WHERE kode_pegawai='$kode' ";
    
    
    if ($conn->query($sql) === true) {
        $sql= "DELETE FROM pegawai WHERE kode='$kode' ";
        if ($conn->query($sql) === true) {
            // Jika berhasil, arahkan kembali ke halaman yang sama
            header("Location: ../master-pegawai.php");
            exit; // Penting untuk menghentikan eksekusi kode selanjutnya
        } else {
            header("Location: ../master-pegawai.php");
            echo "Error: " . $sql . "<br>" . $conn->error;
            
        }
        exit; // Penting untuk menghentikan eksekusi kode selanjutnya
    } else {
        header("Location: ../master-pegawai.php");
        echo "Error: " . $sql . "<br>" . $conn->error;
        
    }

    
    $conn->close();
}
