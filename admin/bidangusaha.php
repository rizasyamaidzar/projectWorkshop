<?php
 require "function.php";

 $bidang = query("SELECT * FROM bidang_usaha");

 if( isset($_POST['cari'])){
    $bidang = caribidang($_POST['keyword']);
    $tampil = true;
 }

 if(isset($_POST['submit'])){
    // var_dump($_POST);
    // exit;  
     if( tambahbidang($_POST) > 0 ){
        echo "
            <script>
                alert('data berhasil ditambahkan');
                document.location.href = 'bidangusaha.php';
            </script>  
        ";
        }
    else{
        echo "
            <script>
                alert('data gagal ditambahkan');
                document.location.href = 'bidangusaha.php';
            </script>  
        ";
     }
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
    <li class="list-group-item "><a href="dashboard.php"><i class="fa-solid fa-house" ><p  class="d-inline p-2 ">Dashboard</p></i></a></li>
      <li class="list-group-item mb-2"><a href="proyek.php"><i class="fa-solid fa-handshake"> <p  class="d-inline p-2 ">Data Pengalaman Kerja</p></i></a></li>
      <li class="list-group-item active mb-2" aria-current="true"><a href="bidangusaha.php"><i class="fa-solid fa-layer-group" style="color: #ffffff;"> <p  class="d-inline p-2 bg-primary text-white">Data Bidang Usaha</p></i></a></li>
      <li class="list-group-item mb-2"><a href="pesan.php"><i class="fa-solid fa-comments"><p  class="d-inline p-2 ">Pesan Masuk</p></i></a></li>
    </ul>
  </div>
</div>

  <!-- content -->
  <div class="konten">
    <div class="container">
      <div class="h1">Data Bidang Usaha</div><br>
    <div class="container">
        <p>
            <button class="btn btn-success" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
            Tambah Data Bidang Usaha
            </button>
        </p>
    <div class="collapse" id="collapseExample">
    <div class="card card-body">
    <form action="" method="post" enctype="multipart/form-data">
        <div class="row align-items-start">
            <div class="col">
             <div class="mb-3">
                <label for="klasifikasi" class="form-label">Klasifikasi</label>
                <input type="text" name="klasifikasi" class="form-control" id="klasifikasi" required >
             </div>
            </div>
            <div class="col">
            <div class="mb-3">
                <label for="kode" class="form-label">Kode</label>
                <input type="text" name="kode" class="form-control" id="kode" required >
             </div>
            </div>    
        </div>
        <div class="row align-items-start">
            <div class="col">
             <div class="mb-3">
                <label for="subkla" class="form-label">Sub Klasifikasi</label>
                <input type="text" name="sub_klasifikasi" class="form-control" id="subkla" >
             </div>
            </div>
            <div class="col">
            <div class="mb-3">
                <label for="subkua" class="form-label">Sub Kualifikasi</label>
                <input type="text" name="sub_kualifikasi" class="form-control" id="subkua" >
             </div>
            </div>    
        </div>
        <button type="submit" class="btn btn-success" name="submit"><i class="fa-solid fa-plus"></i></button>
    </form>
    </div>
    </div>
      <div class="row align-items-start">
        <div class="col">
        </div>
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

<!-- menampilkan data -->
  <table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Klasifikasi Bidang Usaha</th>
      <th scope="col">Kode SubKlasifikasi</th>
      <th scope="col">Sub Klasifikasi</th>
      <th scope="col">Sub Kualifikasi</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
  <?php $i = 1 ;?>
        <?php foreach($bidang as $bu ) :?>
    <tr>
      <th scope="row"><?= $i; ?></th>
      <td><?= $bu["klasifikasi"] ;?></td>
      <td><?= $bu["kode"] ;?></td>
      <td><?= $bu["sub_klasifikasi"] ;?></td>
      <td><?= $bu["sub_kualifikasi"] ;?></td>
      <td>
      <a href="editbidang.php?id=<?= $bu['id'] ;?>"><button style="color : #00ff2a;"><i class="fa-solid fa-pen-to-square"></i>Edit</button></a>
      <a href="hapusbidang.php?id=<?= $bu['id'] ;?>" onclick="return confirm('Apakah anda yakin?')"><button style="color : #ff0000;"><i class="fa-solid fa-trash-can"></i>Hapus</button></a>
      </td>
    </tr>
    <?php $i++; ?>
    <?php endforeach;?>
  </tbody>
</table>

<!-- pagination -->
    <div class="pagination d-flex justify-content-center" >
    <nav aria-label="...">
    <ul class="pagination">
    <li class="page-item disabled ">
      <span class="page-link">Previous</span>
    </li>
    <li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a></li>
    <li class="page-item ">
      <span class="page-link">2</span>
    </li>
    <li class="page-item"><a class="page-link" href="#">3</a></li>
    <li class="page-item">
      <a class="page-link" href="#">Next</a>
    </li>
  </ul>
</nav>
    </div>
</div>
  </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>
 