<?php 

$host = 'localhost' ;
$username = 'root';
$password = '';
$database = 'db_pegawai';

//membuat koneksi
$conn = mysqli_connect($host,$username,$password,$database);

//cek koneksi
if(!$conn){
    die('koneksi gagal: ' . mysqli_connect_error());
}

?>