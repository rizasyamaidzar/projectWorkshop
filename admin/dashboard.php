<?php 
 require "function.php";
// menghitung jumlah data pengalaman kerja
$data_proyek = mysqli_query($conn,"SELECT * FROM proyek");
// // menghitung data pengalaman kerja
$jumlah_proyek = mysqli_num_rows($data_proyek);
// menghitung jumlah data pengalaman kerja
$data_bidang = mysqli_query($conn,"SELECT * FROM bidang_usaha");
// // menghitung data pengalaman kerja
$jumlah_bidang = mysqli_num_rows($data_bidang);
  $id=1;
  if(isset($_GET['pindah'])){
  $id = $_GET["pindah"];
  // exit;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- css -->
    <link rel="stylesheet" href="../css/style.css">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- font awesome -->
    <link rel="stylesheet" href="../fontawsome/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  </head>
  <body>
  <div class="menu">
    <nav class="navbar navbar-expand-lg navbar-dark ">
      <div class="container">
      <a class="navbar-brand" href="#">
        <img src="../assets/img/logo.png" width="50" height="70" class="d-inline-block" alt="">
        SEKAWAN PUTRA ABADI
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse d-flex justify-content-end" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
              <div class="container">
              <button class="btn btn-primary me-4" type="button">
              <a href="pesan.php"><i class="fa-regular fa-message" style="color: #ffffff;"></i></i></a>
              </button>
               <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#staticBackdrop" aria-controls="staticBackdrop">
               <i class="fa-sharp fa-solid fa-bars"></i>
                </button>
             </div>
          </li>
        </ul>
      </div>
    </div>
    </nav>
  </div>
      <!-- navbar -->
  <div class="offcanvas offcanvas-start" data-bs-backdrop="static" tabindex="-1" id="staticBackdrop" aria-labelledby="staticBackdropLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="staticBackdropLabel">CV SEKAWAN PUTRA ABADI</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <ul class="list-group list-group-flush">
      <li class="list-group-item active mb-2" aria-current="true"><a href="dashboard.php"><i class="fa-solid fa-house" style="color: #ffffff;"><p  class="d-inline p-2 bg-primary text-white">Dashboard</p></i></a></li>
      <li class="list-group-item mb-2"><a href="proyek.php"><i class="fa-solid fa-handshake"> <p  class="d-inline p-2 ">Data Pengalaman Kerja</p></i></a></li>
      <li class="list-group-item mb-2"><a href="bidangusaha.php"><i class="fa-solid fa-layer-group"> <p  class="d-inline p-2 ">Data Bidang Usaha</p></i></a></li>
      <li class="list-group-item mb-2"><a href="pesan.php"><i class="fa-solid fa-comments"><p  class="d-inline p-2 ">Pesan Masuk</p></i></a></li>
    </ul>
  </div>
</div>
  <!-- content -->
  <style>
    .dashboard{
      margin-top : 100px;
    }
    .card-body{
      color : white;
      border-radius : 10px;
    }
  </style>

  <div class="dashboard">
    <div class="container">
    <div class="row align-items-start">
    <div class="col d-flex justify-content-center">
    <div class="card" style="width: 18rem;">
      <!-- <img src="img/pengalaman.jpeg" class="card-img-top"> -->
      <div class="card-body bg-primary">
      <h3 class="card-title">DATA PROYEK</h3>
      <h1 class="card-title d-inline p-2"><i class="fa-solid fa-handshake fa-sm"></i></i></h1>
      <h1 class=" card-subtitle d-inline p-2 mb-5"><?= $jumlah_proyek?></h1>
      <a href="proyek.php" class="btn btn-light p-3 d-flex justify-content-center">VIEW</a>
      </div>
    </div>
    </div>
    <div class="col d-flex justify-content-center">
    <div class="card" style="width: 18rem;">
      <!-- <img src="img/pengalaman.jpeg" class="card-img-top" > -->
      <div class="card-body bg-primary">
      <h3 class="card-title ">Data Bidang Usaha</h3>
      <h1 class="card-title d-inline p-2"><i class="fa-solid fa-layer-group fa-sm" ></i></h1>
      <h1 class=" card-subtitle d-inline p-2 mb-5"><?= $jumlah_bidang?></h1>
      <a href="bidangusaha.php" class="btn btn-light p-3 d-flex justify-content-center">VIEW</a>
      </div>
    </div>
    </div>
    <div class="col d-flex justify-content-center">
    <div class="card" style="width: 18rem;">
    <!-- <img src="img/pengalaman.jpeg" class="card-img-top"> -->
      <div class="card-body bg-primary">
      <h3 class="card-title">Pesan Masuk</h3>
      <h1 class="card-title d-inline p-2"><i class="fa-brands fa-rocketchat"></i></h1>
      <h1 class=" card-subtitle d-inline p-2 mb-5"><?= $jumlah_bidang?></h1>
      <a href="proyek.php" class="btn btn-light p-3 d-flex justify-content-center">VIEW</a>
      </div>
    </div>
    </div>
  </div>

<!-- gambar grafik -->
<div class="card text-center mt-5">
  <div class="card-header">
  <form action="">
    <ul class="nav nav-tabs card-header-tabs">
      <li class="nav-item">
        <button class="nav-link active" name="pindah" value="1" type="submit">Berdasarkan Lokasi</button>  
      </li>
      <li class="nav-item">
      <button class="nav-link active" name="pindah" value="2" type="submit">Berdasarkan Kategori</button> 
      </li> 
      <li class="nav-item">
      <button class="nav-link active" name="pindah" value="3" type="submit">Berdasarkan Bidang usaha</button> 
      </li>   
    </ul>
    </form>
  </div>
  
  <div class="card-body bg-dark">
    <?php if($id ==1):?>
    <h2 class="card-title">Grafik Berdasarkan Lokasi</h2>
    <p class="card-text"><img src="img/grafik.png" class="card-img-top" alt=""></p>
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
    <?php elseif($id == 2): ?>
    <h2 class="card-title">Grafik Berdasarkan Kategori</h2>
    <p class="card-text"><img src="img/grafik2.jpg" class="card-img-top" alt=""></p>
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
    <?php else :?>
    <h2 class="card-title">Grafik Berdasarkan Bidang Usaha</h2>
    <p class="card-text"><img src="img/grafik3.jpg" class="card-img-top" alt=""></p>
    <!-- <a href="#" class="btn btn-primary">Go somewhere</a> -->
    <?php endif;?>  
  </div>
</div>
<!-- endgambar grafik -->
<!-- end kontainer -->
</div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
 