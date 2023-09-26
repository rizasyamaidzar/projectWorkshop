<?php
 require "function.php";
 $data_proyek = mysqli_query($conn,"SELECT * FROM proyek");
// // menghitung data pengalaman kerja
 $jumlah_proyek = mysqli_num_rows($data_proyek);
 $bidangusaha = tampilbidang("SELECT * FROM bidang_usaha");
//  konfigurasi pagination
$jumlahDataPerhalaman = 10;
$jumlahData = count(query("SELECT * FROM proyek"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
$halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$awalData = ($jumlahDataPerhalaman * $halamanAktif) -$jumlahDataPerhalaman;
$proyek = query("SELECT * FROM proyek LIMIT $awalData,$jumlahDataPerhalaman");
// pencarian dan filter
// $aktif = $_GET['halaman'];
// $proyek = pagination($aktif); 
//  var_dump($jumlahDataPerhalaman);
//  exit;
 if( isset($_POST['cari'])){
    $proyek = cari($_POST['keyword']);
    $tampil = true;
 }
 if( isset($_POST['filter'])){
    $proyek = filter($_POST['tgl']);
    $filter = true;
 }
 if( isset($_POST['filter_bidang'])){
  $proyek = bidang($_POST['bidang']);
  $jumlah = jumlah($_POST['bidang']);
  $jum = $jumlah['COUNT(bidang_usaha)'];
  $filter_bidang = true;
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
    <link rel="stylesheet" href="style.css">
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
    <li class="list-group-item mb-2"><a href="dashboard.php"><i class="fa-solid fa-house" ><p  class="d-inline p-2 ">Dashboard</p></i></a></li>
      <li class="list-group-item active mb-2" aria-current="true"><a href="proyek.php"><i class="fa-solid fa-handshake" style="color: #ffffff;"> <p  class="d-inline p-2 bg-primary text-white ">Data Pengalaman Kerja</p></i></a></li>
      <li class="list-group-item mb-2"><a href="bidangusaha.php"><i class="fa-solid fa-layer-group"> <p  class="d-inline p-2  ">Data Bidang Usaha</p></i></a></li>
      <li class="list-group-item mb-2"><a href="pesan.php"><i class="fa-solid fa-comments"><p  class="d-inline p-2 ">Pesan Masuk</p></i></a></li>
    </ul>
  </div>
</div>

  <!-- content -->
  <div class="konten">
    <div class="container">
    <div class="card">
      <h1 class="card-header">DATA PENGALAMAN KERJA</h1>
      <h3 class="card-header">JUMLAH DATA : <?= $jumlah_proyek;?></h3>
      <div class="card-body">
       
         <div class="col">
          <a href="tambah.php"><button type="button" class="btn btn-success"> <i class="fa-sharp fa-solid fa-plus"></i>Tambah Data</button></a>
      
      <div class="row align-items-start">
       
      <div class="col d-flex justify-content-end ">
        <form action="" method="post">
        <input type="text" name="keyword" autofocus autocomplete="off" placeholder="masukkan keyword pencarian" size="40">
        <button class="btn btn-primary mb-3 type="submit" name="cari"><i class="fa-solid fa-magnifying-glass"></i></button>
        <?php if(isset($tampil)):?>
        <button class="btn btn-danger mb-3 type="submit" name="kembalii"><i class="fa-solid fa-rotate-left"></i></button>
        <?php endif;?>
        </form>
      </div>
    </div>
    <!-- filter by tanggal -->
    <div class="row align-items-start">
      <!-- filter bidang usaha -->
        <div class="col-9 d-flex justify-content-start"> 
        <form action="" method="post">    
           <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="bidang">
               <option selected>--Filter Bidang Usaha--</option>
               <?php foreach($bidangusaha as $bu) : ?>
               <option value="<?= $bu['sub_klasifikasi'];?>"><?= $bu['sub_klasifikasi'];?></option>
               <?php endforeach;?>
           </select>
           <button class="btn btn-primary mb-3" type="submit" name="filter_bidang"><i class="fa-solid fa-filter"></i></button>
        <?php if(isset($filter_bidang)):?>
          <br><p  class="btn btn-primary">Jumlah Pekerjaan :  <?= $jum;?> </p> <br>
        <button class="btn btn-danger mb-3" type="submit" name="kembalii"><i class="fa-solid fa-rotate-left"></i></button>
        <?php endif;?>
        </form>
        </div>
        <div class="col d-flex justify-content-end">
        <form action="" method="post">
        <input type="date" name="tgl" autofocus autocomplete="off" size="10">
        <button class="btn btn-primary mb-3" type="submit" name="filter"><i class="fa-solid fa-filter" data-date-format="YYYY/DD/MMM" ></i></button>
        <?php if(isset($filter)):?>
        <button class="btn btn-danger mb-3" type="submit" name="kembalii"><i class="fa-solid fa-rotate-left"></i></button>
        <?php endif;?>
        </form>
        </div>
    </div>
  </div>
  </div>
</div>
    
<!-- start table -->
<div class="card text-center">
  <div class="card-header">
    
  </div>
  <div class="card-body">
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Nama</th>
      <th scope="col">Lingkup Pekerjaan</th>
      <th scope="col">Kategori</th>
      <th scope="col">Lokasi</th>
      <th scope="col">Pemberi Tugas</th>
      <th scope="col">Nomor Kontrak</th>
      <th scope="col">Tanggal Kontrak</th>
      <th scope="col">Nilai Kontrak</th>
      <th scope="col">Serah Terima</th>
      <th scope="col">Bidang Usaha</th>
      <th scope="col">Foto</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php $i = 1 ;?>
  <?php foreach($proyek as $pr ) :?>
    <tr>
      <th scope="row"><?= $i; ?></th>
      <td><?= $pr["nama"] ;?></td>
      <td><?= $pr["lingkup"] ;?></td>
      <td><?= $pr["kategori"] ;?></td>
      <td><?= $pr["lokasi"] ;?></td>
      <td><?= $pr["pemberi_tugas"] ;?></td>
      <td><?= $pr["no_kontrak"] ;?></td>
      <td><?= $pr["tgl_kontrak"] ;?></td>
      <td><?= $pr["nilai_kontrak"] ;?></td>
      <td><?= $pr["serah_terima"] ;?></td>
      <td><?= $pr["bidang_usaha"] ;?></td>
      <td><img src="img/<?= $pr["foto"] ;?>" width="50px"> </td>
      <td>
      <a href="edit.php?id=<?= $pr['id'] ;?>"><button style="color : #00ff2a;"><i class="fa-solid fa-pen-to-square"></i>Edit</button></a>
      <a href="hapus.php?id=<?= $pr['id'] ;?>" onclick="return confirm('Apakah anda yakin?')"><button style="color : #ff0000;"><i class="fa-solid fa-trash-can"></i>Hapus</button></a>
      </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach;?>
    </tbody>
    </table>
  </div>
  <div class="card-footer text-muted">
  <nav aria-label="...">
  <ul class="pagination justify-content-center">
    <?php if($halamanAktif>1):?>
    <li class="page-item">
      <a class="page-link" href="?halaman=<?= $halamanAktif-1;?>" tabindex="-1" aria-disabled="true">Previous</a>
    </li>
    <?php endif;?>
    <?php for($i= 1;$i<=$jumlahHalaman;$i++):?>
    <?php if($i == $halamanAktif) :?>
      <li class="page-item active" aria-current="page">
      <a class="page-link" href="?halaman=<?= $i;?>" style=""><?= $i;?></a>
      </li>
    <?php else:?>
      <li class="page-item" aria-current="page">
      <a class="page-link" href="?halaman=<?= $i;?>"><?= $i;?></a>
      </li>
    <?php endif;?>
    <?php endfor;?>

    <?php if($halamanAktif<$jumlahHalaman):?>
    <li class="page-item">
      <a class="page-link" href="?halaman=<?= $halamanAktif+1;?>">Next</a>
    </li>
    <?php endif;?>
  </ul>
</nav>
  </div>
  </div>
  <!-- end konren dan container -->
  </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
 