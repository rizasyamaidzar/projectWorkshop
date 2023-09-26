<?php

    // membuat koneksi
    // $conn = mysqli_connect("localhost","root","","cv_spa");
    // koneksi fungsi
    require "function.php";
    if(isset($_POST['submit'])){
        // mengecek data berhasil ditambahkan atau tidak
        // var_dump($_POST);
        // var_dump($_FILES);
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

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
    <form action="" method="post" enctype="multipart/form-data">
        <ul>
            <li>
                <label for="klasifikasi">Klasifikasi</label>
                <input type="text" name="klasifikasi" id ="klasifikasi">
            </li>
            <li>
                <label for="kode">Kode</label>
                <input type="text" name="kode" id ="kode">
            </li>
            <li>
                <label for="subkla">Sub Klasifikasi</label>
                <input type="text" name="sub_klasifikasi" id ="subkla">
            </li>
            <li>
                <label for="subkua">Sub Kualifikasi</label>
                <input type="text" name="sub_kualifikasi" id ="subkua">
            </li>
            <li>
                <button type="submit" name="submit">tambah</button>
            </li>
        </ul>
    </form>
</body>
</html>