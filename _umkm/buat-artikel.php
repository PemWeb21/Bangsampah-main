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
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="../img/profpic.jpg" class="img-circle" width="25px" alt="img-profile"></a>
            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="edit-profile-umkm.php"><i class="fas fa-user-edit mr-3"></i>Edit Profile</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="umkm-dashboard.php"><i class="fas fa-cogs mr-3"></i>Kelola</a>
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="../masuk.php"><i class="fas fa-sign-out-alt mr-3"></i>Keluar</a>
            </div>
          </li>
        </ul>
      </div>
    <!-- </div> -->
  </nav>>


  <!-- DATA KOMUNITAS -->

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
                  <!-- ubah form-group ini biar bisa memperlihatkan data-data umkm yg tersedia -->
                  <div class="form-group">
                    <label for="email">Author</label>
                    <select name="Umkm" id="Umkm" class="form-control">
                      <option value="Umkm">Pilih Umkm</option>
                      <option value="Exo-L Peduli">Exo-L Peduli</option>
                      <option value="Tastura">Earth Hour</option>
                      <option value="Yuk Ngaji">Yuk Ngaji</option>
                    </select>
                  </div>
                  <!-- setelah publikasi jgn lupa atur agar dia kembali ke dashboard -->
                  <button type="submit" name="submit" id="submit" class="btn btn-edit wid">Publikasi</button>

              </form> 
              
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


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