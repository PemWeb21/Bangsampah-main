<?php
/*include "../conn.php"; // Koneksi ke database

if(isset($_POST['submit'])) {
    $nama = $_POST['judul-event'];
    $tanggal = $_POST['tanggal-event'];
    $deskripsi = $_POST['deskripsi-event'];
    $id_umkm = $_POST['nama-umkm'];

    // Query untuk menambahkan data event ke database
    $query = "INSERT INTO event (nama, tanggal, deskripsi, id_umkm) 
              VALUES ('$nama', '$tanggal', '$deskripsi', '$id_umkm')";

    if (mysqli_query($conn, $query)) {
        header("Location: ../../_admin/data-event.php");
        exit();
    } else {
        echo "Gagal menambahkan data event: " . mysqli_error($conn);
    }
}*/
include "../conn.php"; // Koneksi ke database

session_start(); // Mulai sesi

if(isset($_POST['submit'])) {
    $nama = $_POST['judul-event'];
    $tanggal = $_POST['tanggal-event'];
    $deskripsi = $_POST['deskripsi-event'];

    // Cek apakah session id_umkm kosong atau tidak
    if (!empty($_SESSION['id_umkm'])) {
        $id_umkm = $_SESSION['id_umkm'];
    } else {
        $id_umkm = $_POST['nama-umkm'];
    }

    // Query untuk menambahkan data event ke database
    $query = "INSERT INTO event (nama, tanggal, deskripsi, id_umkm) 
              VALUES ('$nama', '$tanggal', '$deskripsi', '$id_umkm')";

if (mysqli_query($conn, $query)) {
    if (!empty($_SESSION['id_umkm'])) {
        header("Location: ../../_umkm/data-event.php");
    } else {
        header("Location: ../../_admin/data-event.php");
    }
    exit();
} else {
    echo "Gagal menambahkan data event: " . mysqli_error($conn);
}
}
?>