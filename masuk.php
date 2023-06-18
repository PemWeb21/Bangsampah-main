<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <link rel="icon" type="image/png" href="img/logo.png">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>BANG SAMPAH</title>
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="css/styles.css">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">

  <script src="sweetalert/sweetalert2.min.js"></script>
  <link rel="stylesheet" href="sweetalert/sweetalert2.min.css">
</head>

<body>

  <!-- <script>

    function login() {

      var username = document.getElementById("uname").value;
      var password = document.getElementById("pass").value;

      if ((username == "yan") && (password == "yan")) {
        Swal.fire(
          'Selamat datang  ' + username,
          'Save the planet', 'success'
        ).then((result) => {
          if (result.value) {
            window.location = 'profile-masyarakat.php';

          }
        })
        return
      }

      if ((username == "admin") && (password == "admin")) {
        Swal.fire(
          'Selamat datang  ' + username,
          'Save the planet!', 'success'
        ).then((result) => {
          if (result.value) {
            window.location = 'admin-dashboard.php';

          }
        })
        return
      }

      if ((username == "umkm") && (password == "umkm")) {
        Swal.fire(
          'Selamat datang  ' + username,
          'Save the planet!', 'success'
        ).then((result) => {
          if (result.value) {
            window.location = 'umkm-dashboard.php';

          }
        })
        return
      }

      swal.fire('Username/password yang dimasukkan salah', "", 'error');
    }

  </script> -->

  <!--  AWAL NAV  -->
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand"><img src="img/logo.png" width="55px" alt="logo-pw"></a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="beranda.php">Beranda<span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="umkmBefore.php">UMKM</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="eventBefore.php">Event</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="artikelBefore.php">Artikel</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="daftar.php">Daftar</a>
          </li>
          <li class="nav-item">
            <a class="btn btn-edit" href="masuk.php">Masuk</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>


  <!-- DATA KOMUNITAS -->

  <section class="daftar fdb-block" id="daftar">
    <div class="container">
      <div class="row">
        <div class="col">
          <div class="card shadow">
            <div class="row justify-content-center pd-20 align-items-center">
              <div class="col-lg-6 pos">
                <div class="foto">
                  <img src="img/masuk.jpg" class="img-fluid" alt="gambar-senang">
                </div>
              </div>
              <div class="col-lg-6">
                <div class="row">
                  <div class="col">
                    <h2 class="text-center mg-sm-btm">Masuk</h2>
                  </div>
                </div>
                <div class="row">
                  <div class="col">
                    <div class="register">
                      <div class="masuk">
                        <form action="backend/login.php" method="post" autocomplete="off">
                          <input type="text" name="uname" class="form-control" id="uname" placeholder="Username"><br>
                          <input type="password" name="pass" class="form-control" id="pass" placeholder="Password"
                            required><br>
                          <input type="checkbox" id="tnc" name="tnc">
                          <label for="tnc">Ingat akun saya</label><br>
                          <p>Lupa password? <span><a href="lupaPass.php" class="warna">Atur di sini</a></span></p>
                          <div class="text-center">
                            <button class="btn btn-edit wid">Masuk</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <footer>
    <div class="foot">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">
            <h4>BANG SAMPAH</h4>
            <p>Website yang memudahkan proses pengolahan sampah plastik di Lombok NTB</p>
          </div>
          <div class="col-lg-4 ">
            <h4>Menu BANG SAMPAH</h4>
            <div class="hov">
              <ul>
                <li><a href="about-us-before.php">Tentang Kami</a></li>
              <li><a href="umkmBefore.php">UMKM</a></li>
              <li><a href="eventBefore.php">Event</a></li>
              <li><a href="artikelBefore.php">Artikel</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-4">
            <h4>HUBUNGI KAMI</h4>
            <p>1, Vila Ali, Gunung Sari, Mataram</p>
            <p>(021) 098 082</p>
            <p>contact@bangsampah.com</p>
            <a href="www.facebook.com" class="fa fa-facebook mr-3 fa-3x"></a>
            <a href="www.twiter.com" class="fa fa-twitter mr-3 fa-3x"></a>
            <a href="www.instagram.com" class="fa fa-instagram mr-3 fa-3x"></a>
          </div>
        </div>
        <hr>
        <div class="row">
          <div class="col-lg-6">
            <p>copyright © 2023 - Bang Sampah. All rights reserved.</p>
          </div>
        </div>
      </div>
    </div>
    </div>
  </footer>

  <script src="https://kit.fontawesome.com/dd98c3032a.js" crossorigin="anonymous"></script>

  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
    crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI"
    crossorigin="anonymous"></script>
</body>

  </html>