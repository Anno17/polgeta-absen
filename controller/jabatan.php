<?php
include '../config/koneksi.php';
if (isset($_POST["input"])) {
    $nama = $_POST ['nama'];
   
    $sql= "INSERT INTO jabatan (nama) VALUE ('$nama')";
    
    if ($conn->query($sql) === true) {
        // Jika berhasil, arahkan kembali ke halaman yang sama
        header("Location: ../jabatan.php");
        exit; // Penting untuk menghentikan eksekusi kode selanjutnya
    } else {
        header("Location: ../jabatan.php");
        echo "Error: " . $sql . "<br>" . $conn->error;
        
    }

    
    $conn->close();
}

if (isset($_POST["edit"])) {
    $id= $_POST ['id'];
    $nama = $_POST ['nama'];
    $tambah = $_POST ['penambahan'];
     
    $sql = "UPDATE jabatan SET  nama='$nama', penambahan=$tambah WHERE id=$id";
    
    if ($conn->query($sql) === true) {
        // Jika berhasil, arahkan kembali ke halaman yang sama
        header("Location: ../jabatan.php");
        exit; // Penting untuk menghentikan eksekusi kode selanjutnya
    } else {
        header("Location: ../jabatan.php");
        echo "Error: " . $sql . "<br>" . $conn->error;
        
    }

    
    $conn->close();
}


if (isset($_GET["id"])) {
    $id= $_GET ['id'];

    $sql= "DELETE FROM jabatan WHERE id='$id' ";
    
    
    if ($conn->query($sql) === true) {
        $sql= "DELETE FROM jabatan WHERE kode='$kode' ";
        if ($conn->query($sql) === true) {
            // Jika berhasil, arahkan kembali ke halaman yang sama
            header("Location: ../jabatan.php");
            exit; // Penting untuk menghentikan eksekusi kode selanjutnya
        } else {
            header("Location: ../jabatan.php");
            echo "Error: " . $sql . "<br>" . $conn->error;
            
        }
        exit; // Penting untuk menghentikan eksekusi kode selanjutnya
    } else {
        header("Location: ../jabatan.php");
        echo "Error: " . $sql . "<br>" . $conn->error;
        
    }

    
    $conn->close();
}
