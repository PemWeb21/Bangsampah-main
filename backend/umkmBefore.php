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
/*function getPaginationData($table, $offset, $jumlah_per_halaman) {
    // Menghitung jumlah total data
    $query_count = "SELECT COUNT(*) AS total FROM $table";
    $result_count = mysqli_query($_SESSION['conn'], $query_count);
    $total_data = mysqli_fetch_assoc($result_count)['total'];

    // Menghitung jumlah total halaman
    $total_halaman = ceil($total_data / $jumlah_per_halaman);

    // Mendapatkan halaman saat ini dari URL
    $halaman_saat_ini = (isset($_GET['page'])) ? $_GET['page'] : 1;

    // Menghitung offset untuk query database
    $offset = ($halaman_saat_ini - 1) * $jumlah_per_halaman;

    // Query untuk mendapatkan data sesuai halaman saat ini
    $query_data = "SELECT * FROM $table LIMIT $offset, $jumlah_per_halaman";
    $data_tabel = query($query_data);

    return [
        'total_halaman' => $total_halaman,
        'halaman_saat_ini' => $halaman_saat_ini,
        'data_tabel' => $data_tabel
    ];
}*/
function searchInTable($table_name, $search) {
    $conn = $_SESSION['conn'];
    $search = mysqli_real_escape_string($conn, $search);
    
    // Query untuk mencari data berdasarkan kata kunci pencarian di tabel yang ditentukan
    $query = "SELECT * FROM $table_name WHERE nama LIKE '%$search%' OR no_hp LIKE '%$search%' OR username LIKE '%$search%' OR email LIKE '%$search%' OR alamat LIKE '%$search%' OR penanggung_jawab LIKE '%$search%'";
    
    $result = mysqli_query($conn, $query);
    $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
    
    return $data;
}


function getPaginationData($table_name, $offset, $jumlah_per_halaman, $search = '') {
    // Koneksi ke database dan pengaturan lainnya
  
    // Query untuk menghitung jumlah total data UMKM
    $count_query = "SELECT COUNT(*) AS total FROM $table_name";
    $conn = $_SESSION['conn'];
    
    // Query untuk mendapatkan data UMKM dengan filter pencarian
    $umkm_query = "SELECT * FROM $table_name";
    
    // Menambahkan kondisi WHERE ke query jika ada pencarian
    if (!empty($search)) {
      $search = mysqli_real_escape_string($conn, $search);
      $umkm_query .= " WHERE nama LIKE '%$search%' OR no_hp LIKE '%$search%' OR username LIKE '%$search%' OR email LIKE '%$search%' OR alamat LIKE '%$search%' OR penanggung_jawab LIKE '%$search%'";
      $count_query .= " WHERE nama LIKE '%$search%' OR no_hp LIKE '%$search%' OR username LIKE '%$search%' OR email LIKE '%$search%' OR alamat LIKE '%$search%' OR penanggung_jawab LIKE '%$search%'";
    }
  
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
  
    // Query untuk mendapatkan data UMKM dengan batasan halaman dan filter pencarian
    $umkm_query .= " LIMIT $offset, $jumlah_per_halaman";
    $umkm_result = mysqli_query($conn, $umkm_query);
    $umkm = mysqli_fetch_all($umkm_result, MYSQLI_ASSOC);
  
    // Menyiapkan data yang akan dikembalikan
    $paginationData = array(
      'total_halaman' => $total_halaman,
      'halaman_saat_ini' => $halaman_saat_ini,
      'data_tabel' => $umkm
    );
  
    // Mengembalikan data paginasi
    return $paginationData;
  }

?>