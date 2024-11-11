<?php
session_start();

if (!empty($_SESSION['username'])) {
    require '../config/koneksi.php';
    require '../fungsi/pesan_kilat.php';
    require '../fungsi/anti_injection.php';

    // Handling deletion for anggota
    if (!empty($_GET['anggota'])) {
        $id = antiinjection($koneksi, $_GET['id']);
        $query = "DELETE FROM user WHERE id = '$id'";

        if (mysqli_query($koneksi, $query)) {
            $query2 = "DELETE FROM anggota WHERE user_id = '$id'";

            if (mysqli_query($koneksi, $query2)) {
                pesan('success', "Anggota Telah Terhapus.");
            } else {
                pesan('warning', "Data Login Terhapus Tetapi Data Anggota Tidak Terhapus Karena: " . mysqli_error($koneksi));
            }
        } else {
            pesan('danger', "Anggota Tidak Terhapus Karena: " . mysqli_error($koneksi));
        }

        header("Location: ../index.php?page=anggota");
        exit;
    }

    // Handling deletion for jabatan
    if (!empty($_GET['jabatan'])) {
        $id = antiinjection($koneksi, $_GET['id']);
        $query = "DELETE FROM jabatan WHERE id = '$id'";

        if (mysqli_query($koneksi, $query)) {
            pesan('success', "Jabatan Telah Terhapus.");
        } else {
            pesan('danger', "Jabatan Tidak Terhapus Karena: " . mysqli_error($koneksi));
        }

        header("Location: ../index.php?page=jabatan");
        exit;
    }
} else {
    header("Location: ../index.php"); // Redirect to login if not authenticated
    exit;
}