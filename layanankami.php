<?php
  require "admin/function.php";
  $jumlahDataPerhalaman = 6;
  $jumlahData = count(query("SELECT * FROM proyek"));
  $jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
  $halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
  $awalData = ($jumlahDataPerhalaman * $halamanAktif) -$jumlahDataPerhalaman;
  // $proyek = query("SELECT * FROM proyek LIMIT $awalData,$jumlahDataPerhalaman");
  $proyek = query("SELECT * FROM proyek");
  $bidang = query("SELECT * FROM bidang_usaha ORDER BY klasifikasi");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- css -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/layanankami.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="fontawsome/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>cv sekawan putra abadi</title>
  </head>
  <body>
    <!-- navbar -->
    <div class="menu">
    <nav class="navbar navbar-expand-lg navbar-dark ">
      <div class="container">
      <a class="navbar-brand" href="#">
        <img src="assets/img/logo.png" width="50" height="70" class="d-inline-block" alt="">
        SEKAWAN PUTRA ABADI
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="index.php">BERANDA <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="proyek.php">PROYEK</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="tentangkami.php">TENTANG KAMI</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="layanankami.php">LAYANAN KAMI</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="karir.php">KARIR</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="kontak.php">KONTAK KAMI</a>
          </li>
        </ul>
      </div>
    </div>
    </nav>
  </div>

  <!-- proyek -->
<div class="container">
    <div class="row align-items-start">
      <div class="col-1">
      </div>
      <div class="col-10 d-flex justify-content-center">
        <div class="headerp">
            <h3>LAYANAN KAMI</h3>
        </div>
      </div>
      <div class="col-1">
      </div>
    </div>
    </div>

    <!-- cv sekawan -->
    <div class="tagtengah">
    <div class="container-fluid">
        <div class="row align-items-start">
          <div class="col-3 d-flex justify-content-end">
            <h6>CV SEKAWAN PUTRA ABADI</h6>
          </div>
          <div class="col-1">
            <img src="assets/pnh.png" alt="">
          </div>
          <div class="col d-flex justify-content-start">
            <div class="proyekH6">
              <h6>LAYANAN KAMI</h6>
            </div>
          </div>
        </div>
    </div>
    </div>

   <!-- TULISAN -->
    <div class="isikonten">
        <div class="container">
          <div id="carouselExampleDark" class="carousel carousel-dark slide" data-bs-ride="carousel">
          <div class="row align-items-start">
          <?php $i = 1 ;?>
                <?php foreach($bidang as $bd ) :?>
          <div class="col d-flex justify-content-center">
            <div class="card mb-5" style="width: 30rem;">
              <div class="card-body">
                <h2 class="card-title"><?= $bd["klasifikasi"]?></h2>
                <h5 class="card-subtitle mb-2 text-muted"><?= $bd["kode"]?></h5>
                <h6 class="card-text"><?= $bd["sub_klasifikasi"]?></h6>
                <h5 class="card-subtitle mb-2 text-muted"><?= $bd["sub_kualifikasi"]?></h5>
              </div>
            </div>
          </div>
          <?php $i++; ?>
          <?php endforeach;?>
  <!-- end col -->
  </div>
            
          </div>
        </div>
    </div>
    <!-- Footer Start -->
        <footer class="footer section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="footer-col">
                          <i class="fa-solid fa-phone"></i>
                          <p> +62 813-3028-6250 <br>
                            CV SEKAWAN PUTRA ABADI</p>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="footer-col">
                            <i class="fa-solid fa-house"></i>
                            <ul class="list-unstyled">
                              <p>Jl. Griyo Mapan Utara IF/ AG – 36</p>
                              <p>Sidoarjo, Indonesia</p>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <p class="copyright-text">&copy;2023 @ CV SEKAWAN PUTRA ABADI - KONTRAKTOR INDONESIA</p>
                    </div>
                </div>
            </div>
        </footer>
        <!-- Footer End -->
      
          <!-- Optional JavaScript; choose one of the two! -->
      
          <!-- Option 1: Bootstrap Bundle with Popper -->
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
      
          <!-- Option 2: Separate Popper and Bootstrap JS -->
          <!--
          <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
          -->
        </body>
      </html>