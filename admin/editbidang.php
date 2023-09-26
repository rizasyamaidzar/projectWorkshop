<?php
    // koneksi fungsi
    require "function.php";
    // ambil data dari url
    $id = $_GET["id"];

    // query data mahasiswa berdasarkan id
    $bid = tampilbidang("SELECT * FROM bidang_usaha WHERE id = $id")[0];

    if(isset($_POST['submit'])){
        // mengecek data berhasil ditambahkan atau tidak
        // var_dump($_POST);
        // exit;
        if( ubahbidang($_POST) > 0 ){
            echo "
                <script>
                    alert('data berhasil diupdate');
                    document.location.href = 'bidangusaha.php';
                </script>  
            ";
        }
        else{
            echo "
                <script>
                    alert('data gagal diupdate');
                    document.location.href = 'bidangusaha.php';
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
    <div class="card" >
        <div class="card-header d-flex justify-content-center">
            <h1>Update Data Bidang Usaha</h1>
        </div>
        <div class="card-body">
    <form action="" method="post" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?= $bid["id"]?>">
        <div class="mb-3">
            <label for="nama" class="form-label">Klasifikasi Bidang Usaha</label>
            <input type="text" name="klasifikasi" class="form-control" id="nama" value="<?= $bid["klasifikasi"]?>">
        </div>
        <div class="mb-3">
            <label for="kode" class="form-label">Kode Sub Klasifikasi</label>
            <input type="text" name="kode" class="form-control" id="kode" value="<?= $bid["kode"]?>">
        </div>
        <div class="mb-3">
            <label for="subkla" class="form-label">Sub Klasifikasi</label>
            <input type="text" name="sub_klasifikasi" class="form-control" id="subkla" value="<?= $bid["sub_klasifikasi"]?>">
        </div>
        <div class="mb-3">
            <label for="subkua" class="form-label">Sub Kuslifikasi</label>
            <input type="text" name="sub_kualifikasi" class="form-control" id="subkua" value="<?= $bid["sub_kualifikasi"]?>">
        </div>
        <div class="mb-3">
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
            <a href="bidangusaha.php"><button type="button" class="btn btn-danger">Cancel</button></a>
        </div>
    </form>
        </div>
    </div>
</div>
</body>
</html>