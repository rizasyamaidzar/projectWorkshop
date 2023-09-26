<?php
  require "admin/function.php";
  // ambil data dari url
  $id = $_GET["id"];
  $simpan = $_GET['halaman'];
  // query data mahasiswa berdasarkan id
  $proyek = query("SELECT * FROM proyek WHERE id = $id")[0];
 
  //  konfigurasi pagination
$jumlahDataPerhalaman = 5;
$jumlahData = count(query("SELECT * FROM proyek"));
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
$halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
$awalData = ($jumlahDataPerhalaman * $halamanAktif) -$jumlahDataPerhalaman;
$lainya = query("SELECT * FROM proyek LIMIT $awalData,$jumlahDataPerhalaman");
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <div class="container">
    <div class="row align-items-start">
    <div class="col-10">
    <div class="card" style="width: 50rem;">
  <img src="admin/img/<?= $proyek["foto"]?>"class="card-img-top" alt="...">
  <div class="card-body">
    <h1 class="card-title"><?= $proyek['nama'];?></h1>
    <h5 class="card-title">Nilai Kontrak : Rp.<?= $proyek['nilai_kontrak'];?></h5>
  </div>
  <!-- tampil data -->
  <ul class="list-group list-group-flush">
    <li class="list-group-item"><h5 class="card-text">Kategori : <?= $proyek['kategori'];?></h5></li>
    <li class="list-group-item"><h5 class="card-text">Lingkup Pekerjaan : <?= $proyek['lingkup'];?></h5></li>
    <li class="list-group-item"><h5 class="card-text">Bidang Usaha : <?= $proyek['bidang_usaha'];?></h5></li>
    <li class="list-group-item"><h5 class="card-text">Lokasi : <?= $proyek['lokasi'];?></h5></li>
    <li class="list-group-item"><h5>Nomor Kontrak : <?= $proyek['no_kontrak'];?></h5></li>
    <li class="list-group-item"><h5>Tanggal Kontrak : <?= $proyek['tgl_kontrak'];?></h5></li>
    <li class="list-group-item"><h5>Pemberi Tugas : <?= $proyek['pemberi_tugas'];?></h5></li>
    <li class="list-group-item"><h5>Serah Terima : <?= $proyek['serah_terima'];?></h5></li>
  </ul>
  <div class="card-body">
    <a href="proyek.php" class="btn btn-danger">kembali</a>
  </div>
</div>
    </div>
    <div class="col">
    <?php $i=1; ?>
    <?php foreach($lainya as $pro):?>
    <div class="card" style="width: 10rem;">
    <img src="admin/img/<?= $pro["foto"]?>" class="card-img-top" alt="...">
    <div class="card-body">
    <p class="card-text"><?= $pro["nama"]?></p>
    <p class="card-text">Rp.<?= $pro["nilai_kontrak"]?></p>
    <a href="?id=<?=$pro['id']?>&halaman=<?= $simpan;?>" class="btn btn-primary">view detail</a>
    </div>
    </div>
    <?php $i++; ?>
    <?php endforeach;?>

    </div>
    </div>
    <!-- pagination -->
    <div class="pagination justify-content-end">
            <ul class="pagination pagination-sm">
            <?php for($i= 1;$i<=$jumlahHalaman;$i++):?>
            <?php if($i == $halamanAktif) :?>
                <li class="page-item active" aria-current="page">
                <a class="page-link" href="?id=<?=$proyek['id']?>&halaman=<?= $i;?>" style=""><?= $i;?></a>
                </li>
            <?php else:?>
                <li class="page-item" aria-current="page">
                <a class="page-link" href="?id=<?=$proyek['id']?>&halaman=<?= $i;?>"><?= $i;?></a>
                </li>
            <?php endif;?>
            <?php endfor;?>
            </ul>
        </nav>
    </div>
    <!-- end container -->
  </div>
    
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