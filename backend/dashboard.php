<?php
include "conn.php";

// Mendapatkan jumlah data masyarakat
$queryMasyarakat = "SELECT COUNT(*) AS total FROM pelanggan";
$resultMasyarakat = mysqli_query($conn, $queryMasyarakat);
$jumlahMasyarakat = mysqli_fetch_assoc($resultMasyarakat)['total'];

// Mendapatkan jumlah data UMKM
$queryUMKM = "SELECT COUNT(*) AS total FROM umkm";
$resultUMKM = mysqli_query($conn, $queryUMKM);
$jumlahUMKM = mysqli_fetch_assoc($resultUMKM)['total'];

// Mendapatkan jumlah data event
$queryEvent = "SELECT COUNT(*) AS total FROM event";
$resultEvent = mysqli_query($conn, $queryEvent);
$jumlahEvent = mysqli_fetch_assoc($resultEvent)['total'];

// Mendapatkan jumlah data artikel
$queryArtikel = "SELECT COUNT(*) AS total FROM artikel";
$resultArtikel = mysqli_query($conn, $queryArtikel);
$jumlahArtikel = mysqli_fetch_assoc($resultArtikel)['total'];

// Mendapatkan jumlah data penukaran
/*$queryPenukaran = "SELECT COUNT(*) AS total FROM data_penukaran";
$resultPenukaran = mysqli_query($conn, $queryPenukaran);
$jumlahPenukaran = mysqli_fetch_assoc($resultPenukaran)['total'];
*/
?>





