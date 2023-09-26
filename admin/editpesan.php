<?php
    // koneksi fungsi
    require "function.php";
    // ambil data dari url
    $id = $_GET["id"];

    // query data mahasiswa berdasarkan id
    $pesan = pesan("SELECT * FROM pesan WHERE id = $id")[0];

    if(isset($_POST['submit'])){
        // mengecek data berhasil ditambahkan atau tidak
        // var_dump($_POST);
        // exit;
        if( ubahpesan($_POST) > 0 ){
            echo "
                <script>
                    alert('data berhasil diupdate');
                    document.location.href = 'pesan.php';
                </script>  
            ";
        }
        else{
            echo "
                <script>
                    alert('data gagal diupdate');
                    document.location.href = 'pesan.php';
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
            <h1>Update JAWABAN</h1>
        </div>
        <div class="card-body">
    <form action="" method="post">
        <input type="hidden" name="id" value="<?= $pesan["id"]?>">
        <input type="hidden" name="nama" value="<?= $pesan["nama"]?>">
        <input type="hidden" name="email" value="<?= $pesan["email"]?>">
        <input type="hidden" name="judul" value="<?= $pesan["judul"]?>">
        <input type="hidden" name="pertanyaan" value="<?= $pesan["pertanyaan"]?>">
        <!-- start pertanyaan -->
        <div class="mb-3">
            <div class="card">
            <div class="card-body">
                <label for="nama" class="form-label">Judul</label>
                <input type="text" name="klasifikasi" class="form-control" id="judul" value="<?= $pesan["judul"]?>" readonly>
                <label for="nama" class="form-label">Nama</label>
                <input type="text" name="klasifikasi" class="form-control" id="nama" value="<?= $pesan["nama"]?>" readonly>
                <label for="nama" class="form-label">Email</label>
                <input type="text" name="klasifikasi" class="form-control" id="email" value="<?= $pesan["email"]?>" readonly>
                <label for="nama" class="form-label">Pertanyaan</label>
                <input type="text" name="klasifikasi" class="form-control" id="pertanyaan" value="<?= $pesan["pertanyaan"]?>" readonly>
            </div>
            </div>
        </div>
        <!-- end pertanyaan -->
        <div class="mb-3">
            <label for="jawaban" class="form-label">Jawaban</label>
            <input type="text" name="jawaban" class="form-control" id="jawaban" value="<?= $pesan["jawaban"]?>">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select class="form-select form-select-sm" aria-label=".form-select-sm example" name="status">
                <option selected>--Status--</option>
                <option value="Tampilkan">Tampilkan</option>
                <option value="Jangan Tamplkan">Jangan Tampilkan</option>
            </select>
        </div>
        <div class="mb-3">
            <button type="submit" name="submit" class="btn btn-primary">Update</button>
            <a href="pesan.php"><button type="button" class="btn btn-danger">Cancel</button></a>
        </div>
    </form>
        </div>
    </div>
</div>
</body>
</html>