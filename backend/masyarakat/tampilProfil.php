<?php
// Menginclude file koneksi.php untuk melakukan koneksi ke database
session_start();
include __DIR__ . '../../conn.php';
//$conn = $_SESSION['conn'];

$id = $_SESSION['id_pelanggan'];
  if (isset($_POST['submit'])) {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $no_hp = $_POST['notelp'];
    $alamat = $_POST['alamat-masy'];
    // Cek nilai variabel
    echo "Nama: " . $nama . "<br>";
    echo "Email: " . $email . "<br>";
    echo "No. HP: " . $no_hp . "<br>";
    echo "Alamat: " . $alamat . "<br>";

    // Lakukan operasi update data di sini
    $query = "UPDATE pelanggan SET nama = '$nama', email = '$email', no_hp = '$no_hp', alamat = '$alamat', username = '$username' WHERE id_pelanggan = '$id'";

    // Eksekusi query
    $result = mysqli_query($conn, $query);

    // Periksa apakah query berhasil dieksekusi
    if ($result) {
      // Redirect pengguna ke halaman profil setelah berhasil melakukan update
      echo "Data berhasil diperbarui";
      header('Location: ../../_masyarakat/edit-profile-masyarakat.php');
      exit;
    } else {
      // Query tidak berhasil dieksekusi, lakukan penanganan kesalahan di sini
      echo "Error: " . mysqli_error($conn);
    }
  }
  if (isset($_POST['submitpass'])) {
    // Ambil data dari form
    $password = $_POST['pass'];
    $newPassword = $_POST['new-pass'];
    $confirmPassword = $_POST['pass2'];
    //$username = $_POST['uname']; // Ambil username dari session

    // Validasi password saat ini
    $query = "SELECT password FROM pelanggan WHERE id_pelanggan = '$id'";
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_assoc($result);
    $currentPassword = $data['password'];

    // Periksa apakah password saat ini sesuai
    if ($currentPassword !== $password) {
      echo "Password saat ini tidak sesuai";
      exit;
    }

    // Periksa apakah password baru dan konfirmasi password cocok
    if ($newPassword !== $confirmPassword) {
      echo "Password baru dan konfirmasi password tidak cocok";
      exit;
    }

    // Lakukan operasi update password
    $query = "UPDATE pelanggan SET password = '$newPassword' WHERE id_pelanggan = '$id'";

    // Eksekusi query
    $result = mysqli_query($conn, $query);

    // Periksa apakah query berhasil dieksekusi
    if ($result) {
      echo "Password berhasil diperbarui";
      // Redirect pengguna ke halaman profil atau halaman lain yang diinginkan
      header('Location: ../../_masyarakat/edit-profile-masyarakat.php');
      exit;
    } else {
      // Query tidak berhasil dieksekusi, lakukan penanganan kesalahan di sini
      echo "Error: " . mysqli_error($conn);
    }
  }


$query = "SELECT * FROM pelanggan WHERE id_pelanggan = '$id'";
// Eksekusi query
$result = mysqli_query($conn, $query);

// Periksa apakah query berhasil dieksekusi
if ($result) {
  // Ambil data dari hasil query
  $data = mysqli_fetch_assoc($result);

  // Masukkan data ke dalam variabel
  $id = $data['id_pelanggan'];
  $nama = $data['nama'];
  $uname = $data['username'];
  $email = $data['email'];
  $no_hp = $data['no_hp'];
  $alamat = $data['alamat'];
} else {
  // Query tidak berhasil dieksekusi, lakukan penanganan kesalahan di sini
  echo "Error: " . mysqli_error($conn);
}

?>
