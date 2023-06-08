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
      echo "Data berhasil diperbarui";
      header('Location: ../../_admin/data-masyarakat.php');
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
  $gambarDefault = '../../img/profpic.jpg';
  //$gambar = $data['gambar'];
} else {
  // Query tidak berhasil dieksekusi, lakukan penanganan kesalahan di sini
  echo "Error: " . mysqli_error($conn);
}

?>
