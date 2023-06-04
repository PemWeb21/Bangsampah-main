<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="../img/logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Profile | BANG SAMPAH</title>
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>

<body>
  <script>
    $('body').scrollspy({
      target: '#list-example'
    })
  </script>
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
  </nav>

  <!-- AKHUR BREADCUMBR -->
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
              <h1>Edit Profile</h1>
              <hr>
              <div class="akun">
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

                  <div class="mg-sm-btm mg-sm-top">
                    <h3 id="list-item-1">Informasi Akun</h3>
                  </div>

                  <div class="form-group">
                    <label for="nama">Nama UMKM</label>
                    <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama" value=" ">
                  </div>
                  <div class="form-group">
                    <label for="uname">Username</label>
                    <input type="text" name="uname" class="form-control" id="uname" placeholder="Username" value=" " readonly>
                  </div>
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" class="form-control" id="email" placeholder="Email" value=" ">
                  </div>
                  <div class="form-group">
                    <label for="nama">Nomor Telepon</label>
                    <input type="text" name="notelp" class="form-control" id="pass" placeholder="Nomor Telepon" required value=" ">
                  </div>
                  <div class="form-group">
                    <label for="uname">Alamat</label>
                    <input type="text" name="alamat-masy" class="form-control" id="alamat-masy" placeholder="Alamat" required>
                  </div>
                  <div class="form-group">
                    <label for="uname">Deskripsi</label><br>
                    <textarea name="deskripsi-komunitas" class="form-control" id="deskripsi-komunitas" cols="80" rows="5" placeholder="UMKM"></textarea>
                  </div>
                  <div class="form-group mg-sm-btm mg-sm-top">
                    <button type="submit" name="submit" id="submit" class="btn btn-edit wid">Perbarui Profile</button>
                  </div>

                  <div class="mg-sm-btm mg-sm-top">
                    <h3 id="list-item-2">Ganti Password</h3>
                  </div>

                  <div class="form-group">
                    <label for="nama">Password Sekarang</label>
                    <input type="password" name="pass" class="form-control" id="pass" placeholder="Password" required>
                  </div>
                  <div class="form-group">
                    <label for="uname">Password Baru</label>
                    <input type="password" name="new-pass" class="form-control" id="new-pass" placeholder="Password" required>
                  </div>
                  <div class="form-group">
                    <label for="email">Konfirmasi Password</label>
                    <input type="password" name="pass2" class="form-control" id="pass2" placeholder="Password" required>
                  </div>
                  <div class="form-group mg-sm-btm mg-sm-top">
                    <button type="submit" name="submit" id="submit" class="btn btn-edit wid">Perbarui Password</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
  </section>


  <script src="https://kit.fontawesome.com/dd98c3032a.js" crossorigin="anonymous"></script>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>

</html>