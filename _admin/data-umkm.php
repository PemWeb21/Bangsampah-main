<?php
  session_start();
  include "../backend/umkmBefore.php";
   $jumlah_per_halaman = 10;

  // Menghitung jumlah total data
  $query_count = "SELECT COUNT(*) AS total FROM umkm";
  $result_count = mysqli_query($_SESSION['conn'], $query_count);
  $total_data = mysqli_fetch_assoc($result_count)['total'];

  // Menghitung jumlah total halaman
  $total_halaman = ceil($total_data / $jumlah_per_halaman);

  // Mendapatkan halaman saat ini dari URL
  $halaman_saat_ini = (isset($_GET['page'])) ? $_GET['page'] : 1;

  // Menghitung offset untuk query database
  $offset = ($halaman_saat_ini - 1) * $jumlah_per_halaman;

  // Query untuk mendapatkan data sesuai halaman saat ini
  $query_data = "SELECT * FROM umkm LIMIT $offset, $jumlah_per_halaman";
  $umkm = query($query_data);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <link rel="icon" type="image/png" href="../img/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>Data UMKM | BANG SAMPAH</title>
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">

  </head>
  <body> 

  <!--  AWAL NAV  -->
  <nav class="navbar navbar-expand-lg navbar-light">
     <!-- <div class="container"> -->
      <a class="navbar-brand"><img src="../img/logo.png" width="55px" alt="logo-pw"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../img/profpic.jpg" class="img-circle" width="25px" alt="img-profile"></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="edit-profile-admin.php"><i class="fas fa-user-edit mr-3"></i>edit profil</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="admin-dashboard.php"><i class="fas fa-cogs mr-3"></i>Kelola</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../masuk.php"><i class="fas fa-sign-out-alt mr-3"></i>Keluar</a>
            </div>
          </li>
        </ul>
      </div>
    <!-- </div> -->
  </nav>


  <section class="admin-side" id="admin-side">
    <!-- <div class="container"> -->
      <div class="row mg-top mr-ml-plus">
        <div class="col-lg-3 color pr pl-minus">
          <div class="card shadow btn-edit">
          <ul class="nav flex-column pd-18">
            <li class="nav-item ml-25">
              <a class="nav-link active mg-btm-10" href="admin-dashboard.php"><i class="fas fa-tachometer-alt mr-3"></i>Dashboard</a><hr>
            </li>
            <li class="nav-item ml-25">
              <a class="nav-link" href="data-masyarakat.php"><i class="fas fa-user mr-3"></i>Data Masyarakat</a><hr>
            </li>
            <li class="nav-item ml-25">
              <a class="nav-link " href="data-umkm.php"><i class="fas fa-house-user mr-3"></i>Data UMKM</a><hr>
            </li>
            <li class="nav-item ml-25">
              <a class="nav-link mg-btm-10" href="data-event.php"><i class="fas fa-calendar-alt mr-3"></i>Data Event</a><hr>
            </li>
            <li class="nav-item ml-25">
              <a class="nav-link" href="data-artikel.php"><i class="fas fa-newspaper mr-3"></i>Data Artikel</a><hr>
            </li>
            <li class="nav-item ml-25">
              <a class="nav-link" href="umkm-side-penukaran.php"><i class="fas fa-recycle mr-3"></i>Data Penukaran</a>
            </li>
          </ul>
          </div>
        </div>
        <div class="col-lg-9 pr-pl-minus">
          <div class="card pd-20">            
            <h1><i class="fas fa-house-user mr-3 warna"></i></i>Data UMKM</h1>
            <hr>
            <div class="row">
              <div class="col-lg-4">
                <form class="form-inline input-group">
                  <div class="input-group-prepend">
                    <div class="input-group-text" id="btnGroupAddon">
                      <i class="fas fa-search"></i>
                    </div>
                  </div>
                  <input type="search" class="form-control" placeholder="cari UMKM" aria-label="Search" aria-describedby="btnGroupAddon">
                </form>
              </div>
              <div class="col-lg-8 text-right">
                <a href=""><i class="fas fa-plus-circle fa-3x warna"></i></a>
              </div>
            </div>


            
            <form action="../backend/umkmBefore.php">
            <table class="table mg-btm mg-sm-top table-edit ukuran-font">
              <!-- <caption>List of users</caption> -->
              <thead class="thead-edit text-center">
                <tr>
                  <th scope="col">No.</th>
                  <th scope="col">Nama</th>
                  <th scope="col">No Telepon</th>
                  <th scope="col">Username</th>
                  <th scope="col">Email</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">Penanggung Jawab</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php 
                  $i = 1;
                  foreach ( $umkm as $row ){
                ?>
                <tr>
                  <th scope="row"><?= $i ?></th>
                  <td><?= $row['nama']; ?></td>
                  <td><?= $row['no_hp']; ?></td>
                  <td><?= $row['username']; ?></td>
                  <td><?= $row['email']; ?></td>
                  <td><?= $row['alamat']; ?></td>
                  <td><?= $row['penanggung_jawab']; ?></td>
                  <!-- <td class="text-center">
                    <a href="" class="btn btn-edit"><i class="fas fa-edit fa-sm"></i></a> | 
                    <a href="" class="btn btn-edit"><i class="fas fa-trash fa-sm"></i></a>
                  </td> -->
                </tr>
                <?php
                    $i++;
                    }
                  ?>
              </tbody>
            </table>
            </form>
            <nav aria-label="">
                <ul class="pagination justify-content-end">
                  <?php if ($halaman_saat_ini > 1): ?>
                  <li class="page-item">
                    <a class="page-link" href="?page=<?= $halaman_saat_ini - 1; ?>" tabindex="-1" aria-disabled="true">Previous</a>
                  </li>
                  <?php endif; ?>
                  <?php for ($i = 1; $i <= $total_halaman; $i++): ?>
                  <li class="page-item <?= ($i == $halaman_saat_ini) ? 'active' : ''; ?>" aria-current="page">
                    <a class="page-link" href="?page=<?= $i; ?>"><?= $i; ?></a>
                  </li>
                  <?php endfor; ?>
                  <?php if ($halaman_saat_ini < $total_halaman): ?>
                  <li class="page-item">
                    <a class="page-link" href="?page=<?= $halaman_saat_ini + 1; ?>">Next</a>
                  </li>
                  <?php endif; ?>
                </ul>
              </nav>          
          </div>
        </div>
      </div>
    <!-- </div> -->
  </section>
  
  <script src="https://kit.fontawesome.com/dd98c3032a.js" crossorigin="anonymous"></script>
  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
  </body>
</html>