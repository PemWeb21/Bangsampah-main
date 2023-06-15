<?php
session_start();
include "../backend/umkmBefore.php";
$id = $_SESSION['id_umkm'];
$sql = "SELECT * FROM umkm WHERE id_umkm = '$id'";
$result1 = query($sql);
if (!empty($result1)) {
  $umkm = $result1[0];
} else {
  echo "data admin tidak ditemukan.";
  exit;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="../img/logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Buat Artikel | BANG SAMPAH</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet">


  <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js"></script>
  <link rel="stylesheet" href="../fontawesome/css/all.min.css">

</head>


<body>



  <!--  AWAL NAV  -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <!-- <div class="container"> -->
    <a class="navbar-brand"><img src="../img/logo.png" width="55px" alt="logo-pw"></a>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <?php
            $gambar = $umkm['gambar'] ? '../img/umkm/' . $umkm['gambar'] : '../img/profpic.jpg';
          ?>
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img src="<?= $gambar ?>" class="img-circle" width="25px" alt="img-profile">
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="edit-profile-umkm.php"><i class="fas fa-user-edit mr-3"></i>Edit Profile</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="umkm-dashboard.php"><i class="fas fa-cogs mr-3"></i>Kelola</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="../backend/logout.php"><i class="fas fa-sign-out-alt mr-3"></i>Keluar</a>
          </div>
        </li>
      </ul>
    </div>
    <!-- </div> -->
  </nav>>

  <section class="edit-profile" id="edit-profile">
    <div class="row mg-top mr-ml-plus">
      <div class="col-lg-3 color pr pl-minus">
        <div class="card shadow btn-edit">
          <ul class="nav flex-column pd-18">
            <li class="nav-item ml-25">
              <a class="nav-link active" href="umkm-dashboard.php"><i class="fas fa-tachometer-alt mr-3"></i>Dashboard</a>
              <hr>
            </li>
            <li class="nav-item ml-25">
              <a class="nav-link mg-btm-10" href="data-event.php"><i class="fas fa-calendar-alt mr-3"></i>Data Event</a>
              <hr>
            </li>
            <li class="nav-item ml-25">
              <a class="nav-link" href="data-artikel.php"><i class="fas fa-newspaper mr-3"></i>Data Artikel</a>
              <hr>
            </li>
            <li class="nav-item ml-25">
              <a class="nav-link" href="umkm-side-penukaran.php"><i class="fas fa-recycle mr-3"></i>Data Penukaran</a>
            </li>
          </ul>
        </div>
      </div>

      <div class="col-lg-8 scrollspy-example" data-spy="scroll" data-target="#list-example" data-offset="50">
        <div class="card pd-20">
          <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade active show" id="account" role="tabpanel">
              <h1>Tambah Artikel</h1>
              <hr>
              <div class="akun">
                <form action="../backend/admin/tambah-artikel.php" method="post" enctype="multipart/form-data" autocomplete="off">
                  <div class="row">
                    <div class="col-lg-4">
                      <div class="wrapper-kelas rounded logo-center white-bg">
                        <img src="../img/profpic.jpg" class="img-fluid" alt="">
                      </div>
                    </div>
                    <div class="col-lg4">
                      <input type="file" name="gambar" title="Change Avatar" data-filename-placement="inside" id="upload_image" accept="image/*">
                    </div>
                  </div>
                  <div class="form-group mg-sm-top">
                    <label for="judul-artikel">Judul Artikel</label>
                    <input type="text" name="judul-artikel" class="form-control" id="judul-artikel" placeholder="Masukkan Judul Artikel" value="">
                  </div>
                  <div class="form-group mg-sm-top">
                    <label for="isi-artikel">Isi Artikel</label>
                    <textarea name="isi_artikel" class="form-control" id="isi_artikel" cols="80" rows="5" placeholder="Masukkan Deskripsi Artikel"></textarea>
                  </div>
                  <button type="submit" name="submit" id="submit" class="btn btn-edit wid">Post</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>


  <!-- DATA KOMUNITAS 

  <section class="daftar fdb-block pl-40" id="daftar">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="row">
              <div class="col-lg-12 pd-20">
                <h1>Tambah artikel</h1>
                <hr>

              <form action="" method="post" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-4">
                      <div class="wrapper-kelas rounded logo-center white-bg">
                        <img src="../img/profpic.jpg" class="img-fluid" alt="">
                      </div>
                    </div>
                    <div class="col-lg4">
                      <input type="file" title="Change Avatar" data-filename-placement="inside" id="upload_image" accept="image/*">
                    </div>
                  </div>


                  <div class="form-group mg-sm-top">
                    <label for="judul-artikel">Judul Artikel</label>
                      <input type="text" name="judul-artikel" class="form-control" id="judul-artikel" placeholder="judul-artikel" value="Masukkan Judul Artikel">
                  </div>
                 
                    <label for="isi-artikel">Isi artikel</label>
                    <div id="summernote"></div>
                 ]
                  <div class="form-group">
                    <label for="email">Author</label>
                    <select name="Umkm" id="Umkm" class="form-control">
                      <option value="Umkm">Pilih Umkm</option>
                      <option value="Exo-L Peduli">Exo-L Peduli</option>
                      <option value="Tastura">Earth Hour</option>
                      <option value="Yuk Ngaji">Yuk Ngaji</option>
                    </select>
                  </div>
                  
                  <button type="submit" name="submit" id="submit" class="btn btn-edit wid">Publikasi</button>

              </form> 
              
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
-->

  <script>
    $('#summernote').summernote({
      placeholder: ' Isi Artikel...',
      tabsize: 2,
      height: 100
    });
  </script>
  <script src="https://kit.fontawesome.com/dd98c3032a.js" crossorigin="anonymous"></script>
</body>

</html>