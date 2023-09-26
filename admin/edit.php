<?php

    // membuat koneksi
    // $conn = mysqli_connect("localhost","root","","cv_spa");
    // koneksi fungsi
    require "function.php";
    // ambil data dari url
    $id = $_GET["id"];
    $bidangusaha = tampilbidang("SELECT * FROM bidang_usaha");
    // query data mahasiswa berdasarkan id
    $proy = query("SELECT * FROM proyek WHERE id = $id")[0];

    if(isset($_POST['submit'])){
        // mengecek data berhasil ditambahkan atau tidak
        // var_dump($_POST);
        // exit;
        if( ubah($_POST) > 0 ){
            echo "
                <script>
                    alert('data berhasil diupdate');
                    document.location.href = 'proyek.php';
                </script>  
            ";
        }
        else{
            echo "
                <script>
                    alert('data gagal diupdate');
                    document.location.href = 'proyek.php';
                </script>  
            ";
        }


    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Document</title>
</head>
<body>
<div class="container">
 <div class="spaci">
        <h1></h1>
    </div>
    <div class="card" >
        <div class="card-header d-flex justify-content-center">
            <h1>Tambah Data Pengalaman Kerja</h1>
        </div>
        <div class="card-body">
        <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $proy["id"]?>">
        <input type="hidden" name="fotoLama" value="<?= $proy["foto"]?>">
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Paket Pekerjaan</label>
            <input type="text" name="nama" class="form-control" id="nama" value="<?= $proy["nama"]?>">
        </div>
        <div class="mb-3">
            <label for="lingkup" class="form-label">Lingkup Pekerjaan</label>
            <input type="text" class="form-control" name="lingkup" id ="lingkup" value="<?= $proy["lingkup"]?>">
        </div>
        <div class="mb-3">
            <label for="kategori" class="form-label">Kategori</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="kategori">
            <option selected value="<?= $proy["kategori"]?>"><?= $proy["kategori"]?></option>
                <option value="Tender">TENDER</option>
                <option value="Non Tender">NON TENDER</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="lokasi" class="form-label">Lokasi</label>
            <input type="text" class="form-control" name="lokasi" id ="lokasi" value="<?= $proy["lokasi"]?>">
        </div>
        <div class="mb-3">
            <label for="tugas" class="form-label">Pemberi Tugas</label>
            <input type="text" class="form-control" name="tugas" id ="tugas" value="<?= $proy["pemberi_tugas"]?>">
        </div>
        <div class="mb-3">
            <label for="nokontrak" class="form-label">Nomor Kontrak</label>
            <input type="text" class="form-control" name="nokontrak" id ="nokontrak" value="<?= $proy["no_kontrak"]?>">
        </div>
        <div class="mb-3">
            <label for="tanggal" class="form-label">Tanggal Kontrak</label>
            <input type="date" class="form-control" name="tanggal" id ="tanggal" value="<?= $proy["tgl_kontrak"]?>">
        </div>
        <div class="mb-3">
            <label for="nilai" class="form-label">Nilai Kontrak</label>
        <div class="input-group mb-3">
            <span class="input-group-text">Rp.</span>
            <input type="number" name="nilai" id="nilai" value="<?= $proy["nilai_kontrak"]?>" class="form-control" aria-label="Dollar amount (with dot and two decimal places)">
        </div>
        </div>
        <div class="mb-3">
            <label for="serah" class="form-label">BA / Serah Terima</label>
            <input type="text" class="form-control" name="serah" id ="serah" value="<?= $proy["serah_terima"]?>">
        </div>
        <div class="mb-3">
            <label for="bidang" class="form-label">Bidang Usaha</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="bidang">
                <option selected value="<?= $proy["bidang_usaha"]?>"><?= $proy["bidang_usaha"]?></option>
                <?php foreach($bidangusaha as $bu) : ?>
                <option value="<?= $bu['sub_klasifikasi'];?>"><?= $bu['sub_klasifikasi'];?></option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="mb-3">
            <label for="foto" class="form-label">Foto</label>
        <div class="input-group mb-3">
            <img src="img/<?= $proy["foto"]?>" alt="" width="150">
            <input type="file" class="form-control" name="foto" id ="foto">
            <label class="input-group-text"  for="foto">Upload</label>
        </div>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        <a href="proyek.php"><button type="button" class="btn btn-danger">Cancel</button></a> 
    </form>
    </div>
</div>

</body>
</html>