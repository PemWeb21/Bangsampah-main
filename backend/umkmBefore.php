<?php

include "conn.php";

function query($query){
    $conn = $_SESSION['conn'];
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}
function search($table_name, $search){
  $query = "SELECT * FROM $table_name";
  $conn = $_SESSION['conn'];
  // Menambahkan kondisi WHERE ke query jika ada pencarian
  if (!empty($search)) {
    $search = mysqli_real_escape_string($conn, $search);
    if($table_name === 'umkm'){
      $query .= " WHERE nama LIKE '%$search%' OR no_hp LIKE '%$search%' OR username LIKE '%$search%' OR email LIKE '%$search%' OR password LIKE '%$search%' OR alamat LIKE '%$search%' OR penanggung_jawab LIKE '%$search%'";
    }elseif ($table_name === 'pelanggan') {
      $query .= " WHERE nama LIKE '%$search%' OR alamat LIKE '%$search%' OR no_hp LIKE '%$search%' OR email LIKE '%$search%' OR username LIKE '%$search%' OR password LIKE '%$search%'";
    }elseif ($table_name === 'event') {
      $query .= " WHERE nama LIKE '%$search%' OR tanggal LIKE '%$search%' OR deskripsi LIKE '%$search%'";
    }elseif ($table_name === 'artikel') {
      $query .= " WHERE judul LIKE '%$search%' OR isi LIKE '%$search%'";
    }

  }
  return query($query);

}
function getPaginationData($table_name, $offset, $jumlah_per_halaman) {
    // Koneksi ke database dan pengaturan lainnya
  
    // Query untuk menghitung jumlah total data
    $count_query = "SELECT COUNT(*) AS total FROM $table_name";
    $conn = $_SESSION['conn'];
    
    // Query untuk mendapatkan data
    $query = "SELECT * FROM $table_name";
      
    // Eksekusi query untuk menghitung jumlah total data
    $count_result = mysqli_query($conn, $count_query);
    $row = mysqli_fetch_assoc($count_result);
    $total_data = $row['total'];
  
    // Menghitung jumlah halaman berdasarkan jumlah data dan data per halaman
    $total_halaman = ceil($total_data / $jumlah_per_halaman);
  
    // Mendapatkan halaman saat ini dari parameter GET atau mengatur halaman pertama sebagai default
    $halaman_saat_ini = isset($_GET['page']) ? $_GET['page'] : 1;
    $halaman_saat_ini = max(1, min($halaman_saat_ini, $total_halaman));
  
    // Menghitung offset berdasarkan halaman saat ini dan data per halaman
    $offset = ($halaman_saat_ini - 1) * $jumlah_per_halaman;
  
    // Query untuk mendapatkan data dengan batasan halaman
    $query .= " LIMIT $offset, $jumlah_per_halaman";
    $result = mysqli_query($conn, $query);
    $data_tabel = mysqli_fetch_all($result, MYSQLI_ASSOC);
  
    // Menyiapkan data yang akan dikembalikan
    $paginationData = array(
        'total_halaman' => $total_halaman,
        'halaman_saat_ini' => $halaman_saat_ini,
        'data_tabel' => $data_tabel
    );
  
    // Mengembalikan data paginasi
    return $paginationData;
  }
  function getSpesifikPage($table_name) {
    $jumlah_per_halaman = 10;
    $offset = 0;
    $search = isset($_GET['search']) ? $_GET['search'] : '';

    if (!empty($search)) {
        $data = search($table_name, $search);
        $total_data = count($data);
        $total_halaman = ceil($total_data / $jumlah_per_halaman);
        $halaman_saat_ini = 1;
        $data = array_slice($data, $offset, $jumlah_per_halaman);
    } else {
        $paginationData = getPaginationData($table_name, $offset, $jumlah_per_halaman);
        $total_halaman = $paginationData['total_halaman'];
        $halaman_saat_ini = $paginationData['halaman_saat_ini'];
        $data = $paginationData['data_tabel'];
    }

    // Tampilkan atau lakukan operasi lain dengan data yang diperoleh

    // Contoh: Mengembalikan data dalam bentuk array
    return [
        'total_halaman' => $total_halaman,
        'jumlah_per_halaman' => $jumlah_per_halaman,
        'halaman_saat_ini' => $halaman_saat_ini,
        'data' => $data
    ];
}

  function upload($folder){
    $namafile = $_FILES['gambar']['name'];
    $ukuranfile = $_FILES['gambar']['size'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    if($ukuranfile > 40000000){
        echo "<script>
                  alert('ukuran gambar terlalu besar!');
              </script>";
        return false;
    }
    $extensiGambar = explode('.', $namafile);
    $extensiGambar = strtolower(end($extensiGambar));

    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $extensiGambar;

    move_uploaded_file($tmpName, '../../img/'.$folder.'/'. $namaFileBaru);

    return $namaFileBaru;

  }
  function getDataByUmkm($id, $table_name, $jumlah_per_halaman, $halaman_saat_ini) {
    $conn = $_SESSION['conn'];
    $id = mysqli_real_escape_string($conn, $id);
    $offset = ($halaman_saat_ini - 1) * $jumlah_per_halaman;

    // Query untuk menghitung jumlah total data
    $count_query = "SELECT COUNT(*) AS total FROM $table_name WHERE id_umkm = '$id'";
    $count_result = mysqli_query($conn, $count_query);
    $row = mysqli_fetch_assoc($count_result);
    $total_data = $row['total'];

    // Menghitung jumlah halaman berdasarkan jumlah data dan data per halaman
    $total_halaman = ceil($total_data / $jumlah_per_halaman);

    // Query untuk mendapatkan data dengan batasan halaman
    $query = "SELECT * FROM $table_name WHERE id_umkm = '$id' LIMIT $offset, $jumlah_per_halaman";
    $result = mysqli_query($conn, $query);
    $data_tabel = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // Menyiapkan data yang akan dikembalikan
    $paginationData = array(
        'total_halaman' => $total_halaman,
        'halaman_saat_ini' => $halaman_saat_ini,
        'data_tabel' => $data_tabel
    );

    // Mengembalikan data paginasi
    return $paginationData;
}
  ?>
