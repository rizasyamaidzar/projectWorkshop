<?php
    require "function.php";
    $data_pesan = mysqli_query($conn,"SELECT * FROM pesan ");
    $pesan = pesan("SELECT * FROM pesan ORDER BY jawaban");
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
        <li class="list-group-item mb-2"><a href="dashboard.php"><i class="fa-solid fa-house"><p  class="d-inline p-2 ">Dashboard</p></i></a></li>
        <li class="list-group-item mb-2"><a href="proyek.php"><i class="fa-solid fa-handshake"> <p  class="d-inline p-2 ">Data Pengalaman Kerja</p></i></a></li>
        <li class="list-group-item mb-2"><a href="bidangusaha.php"><i class="fa-solid fa-layer-group"> <p  class="d-inline p-2 ">Data Bidang Usaha</p></i></a></li>
        <li class="list-group-item active mb-2" aria-current="true"><a href="pesan.php"><i class="fa-solid fa-comments"  style="color: #ffffff;"><p  class="d-inline p-2 bg-primary text-white ">Pesan Masuk</p></i></a></li>
        </ul>
    </div>
    </div>
    <style>
        .pesan{
            margin-top : 100px;
        }
    </style>
    <div class="pesan">
    <div class="container">
        <div class="card text-center">
        <div class="card-header">
            <h3>Pesan Masuk</h3>
        </div>
        <div class="card-body">
            <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Pertanyaan</th>
                    <th scope="col">Jawaban</th>
                    <th scope="col">Status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1 ;?>
            <?php foreach($pesan as $pr ) :?>
                <tr>
                <th scope="row"><?= $i; ?></th>
                    <td><?= $pr["nama"] ;?></td>
                    <td><?= $pr["email"] ;?></td>
                    <td><?= $pr["judul"] ;?></td>
                    <td><?= $pr["pertanyaan"] ;?></td>
                    <td><?= $pr["jawaban"] ;?></td>
                    <td><?= $pr["statuss"] ;?></td>
                    <td>
                    <a href="editpesan.php?id=<?= $pr['id'] ;?>"><button style="color : #00ff2a;"><i class="fa-solid fa-pen-to-square"></i>JAWAB</button></a>
                    <a href="hapuspesan.php?id=<?= $pr['id'] ;?>" onclick="return confirm('Apakah anda yakin?')"><button style="color : #ff0000;"><i class="fa-solid fa-trash-can"></i>Hapus</button></a>
                    </td>
                </tr>
            <?php $i++; ?>
            <?php endforeach;?>
            </tbody>
            </table>
        </div>
        <div class="card-footer text-muted">
            2 days ago
        </div>
        </div>
    </div>
    </div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  </body>
</html>