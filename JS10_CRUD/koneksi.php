<?php
// Koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "prakwebdb1");

// Periksa koneksi
if (mysqli_connect_errno()) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>