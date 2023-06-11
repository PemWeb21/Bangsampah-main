<?php
// Menginclude file koneksi.php untuk melakukan koneksi ke database
session_start();
include __DIR__ . '../../conn.php';
//$conn = $_SESSION['conn'];

//$id = $_SESSION['id_pelanggan'];
  if (isset($_POST['submit'])) {
    // Ambil data dari form
    $id = $_POST['id_pelanggan'];
    $nama = $_POST['nama'];
    $username = $_POST['uname'];
    $email = $_POST['email'];
    $no_hp = $_POST['notelp'];
    $alamat = $_POST['alamat-masy'];
    $password = $_POST['pass'];
     // Ambil data gambar
  //$gambar = $_FILES['gambar'];
 // $gambarTmpPath = $gambar['tmp_name'];

  // Baca isi file gambar menjadi blob
  //$gambarBlob = file_get_contents($gambarTmpPath);
    // Lakukan operasi update data di sini
    $query = "UPDATE pelanggan SET nama = '$nama', 
                                  email = '$email', 
                                  no_hp = '$no_hp', 
                                  alamat = '$alamat', 
                                  username = '$username',
                                  password = '$password'
                                  WHERE id_pelanggan = '$id'";

      // Eksekusi query
      $result = mysqli_query($conn, $query);

    // Periksa apakah query berhasil dieksekusi
    if ($result) {
      // Redirect pengguna ke halaman profil setelah berhasil melakukan update
      header('Location: ../../_admin/data-masyarakat.php');
      echo "Data berhasil diperbarui";
      exit;
    } else {
      // Query tidak berhasil dieksekusi, lakukan penanganan kesalahan di sini
      echo "Error: " . mysqli_error($conn);
    }
  }
?>
