<?php
    // membuat koneksi database
    $conn = mysqli_connect("localhost","root","","cv_spa");
    // function tabel ptoyek
    // tampil data proyek
    function query($query){
        global $conn;
        $result = mysqli_query($conn,$query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    // tambah data pengalaman kerja
    function tambah($data){ 
        global $conn;
        // htmlspecialchars untuk menghindari dari user memasukan script
        $nama = htmlspecialchars($data['nama']);
        $lingkup = htmlspecialchars($data['lingkup']);
        $kategori = htmlspecialchars($data['kategori']);
        $lokasi = htmlspecialchars($data['lokasi']);
        $pemberi = htmlspecialchars($data['tugas']);
        $nok = htmlspecialchars($data['nokontrak']);
        $tanggal = htmlspecialchars($data['tanggal']);
        $nilai = htmlspecialchars($data['nilai']);
        $serah = htmlspecialchars($data['serah']);
        $bidang = htmlspecialchars($data['bidang']);
        // $foto = htmlspecialchars($data['foto']);
        // upload gambar
        $foto = upload();
        // kondisi
        if(!$foto){
            return false;
        }

        $add = "INSERT INTO proyek VALUES ('', '$nama','$lingkup','$kategori','$lokasi','$pemberi','$nok','$tanggal','$nilai','$serah','$bidang','$foto' )";
        mysqli_query($conn,$add);
        // mengembalikan untuk mengecek data berhasil ditambahkan atau tidak
        return mysqli_affected_rows($conn);
    }
    function upload(){
        // mengambil dari upload untuk melihatnya menggunakan vardump($_FILES)
        $namaFile = $_FILES['foto']['name'];
        $ukuranFile = $_FILES['foto']['size'];
        $erorr = $_FILES['foto']['error'];
        $tmpName = $_FILES['foto']['tmp_name'];

        // cek apakah tidak ada gambar yang diupload
        if($erorr === 4){
            echo "<script>
                alert('Pilih gambar terlebih dahulu!');
            </script>";
            return false;
        }

        // mengecek yang diupload file gambar apa bukan
        // menentukan file yang boleh diupload
        $ekstensiGambarValid =['jpg','jpeg','png'];
        $ekstensiGambar = explode('.',$namaFile);
        $ekstensiGambar =strtolower(end($ekstensiGambar));
        
        if( !in_array($ekstensiGambar, $ekstensiGambarValid)){
            echo "<script>
                alert('Yang anda upload bukan gambar!!');
            </script>";
            return false; 
        }
        // mengecek ukuran apakah udah sesuai apa belum
        if($ukuranFile > 1000000){
            echo "<script>
                alert('Ukuran gambar terlalu besar!!');
            </script>";
            return false;
        }
        // lolos pengecekan dan siap upload
        // generate nama random untuk nama gambar baru
        $namaFileBaru = uniqid();
        $namaFileBaru .= '.';
        $namaFileBaru .= $ekstensiGambar;
        move_uploaded_file($tmpName,'img/' . $namaFileBaru);

        return $namaFileBaru;
    }
    // hapus proyek
    function hapus($id){
        global $conn;

        mysqli_query($conn, "DELETE FROM proyek WHERE id = $id");
        return mysqli_affected_rows($conn);
    }
    // edit proyek
    function ubah($data){ 
        global $conn;
        // htmlspecialchars untuk menghindari dari user memasukan script
        $id = $data['id'];
        $nama = htmlspecialchars($data['nama']);
        $lingkup = htmlspecialchars($data['lingkup']);
        $kategori = htmlspecialchars($data['kategori']);
        $lokasi = htmlspecialchars($data['lokasi']);
        $pemberi = htmlspecialchars($data['tugas']);
        $nok = htmlspecialchars($data['nokontrak']);
        $tanggal = htmlspecialchars($data['tanggal']);
        $nilai = htmlspecialchars($data['nilai']);
        $serah = htmlspecialchars($data['serah']);
        $bidang = htmlspecialchars($data['bidang']);
        // $foto = htmlspecialchars($data['foto']);
        $fotoLama = htmlspecialchars($data['fotoLama']);

        // mengecek apakah user pilih gambar baru atau tidak
        if($_FILES['foto']['error']==4){
            $foto = $fotoLama;
        }
        else{
            $foto = upload();
        }

        $edit = "UPDATE proyek SET 
            nama = '$nama',
            lingkup = '$lingkup',
            kategori = '$kategori',
            lokasi = '$lokasi',
            pemberi_tugas = '$pemberi',
            no_kontrak ='$nok',
            tgl_kontrak = '$tanggal',
            nilai_kontrak = $nilai,
            serah_terima ='$serah',   
            bidang_usaha ='$bidang',
            foto = '$foto'
            WHERE id = $id
        ";
        mysqli_query($conn,$edit);
        // mengembalikan untuk mengecek data berhasil ditambahkan atau tidak
        return mysqli_affected_rows($conn);
    }
    // pencarian dan filter tabel proyek
    function cari($keyword){
        $query =" SELECT * FROM proyek WHERE nama LIKE '%$keyword%' OR lingkup LIKE '%$keyword%' OR kategori LIKE '%$keyword%' OR lokasi LIKE '%$keyword%' OR pemberi_tugas LIKE '%$keyword%' OR no_kontrak LIKE '%$keyword%' OR tgl_kontrak LIKE '%$keyword%' OR bidang_usaha LIKE '%$keyword%'" ;
        return query($query);
    }
    function filter($tgl){
        $query =" SELECT * FROM proyek WHERE tgl_kontrak = '$tgl'";
        return query($query);
    }
    function bidang($bidang){
        $query =" SELECT * FROM proyek WHERE bidang_usaha = '$bidang'";
        return query($query);
    }
    function jumlah($bidang){
        global $conn;
        $sql ="SELECT COUNT(bidang_usaha) FROM proyek where bidang_usaha ='$bidang'"; 
        $query = mysqli_query($conn,$sql);
        $result = mysqli_fetch_array($query);
        // echo "Jumlah data dengan fungsi MySQL count(): {$result['bidang_usaha']} <br/>";
        // var_dump($result);
        return $result;
    }
    // pagination
    // function pagination($aktif){
    //     //  konfigurasi pagination
    //     $halamanAktif = $aktif;
    //     var_dump($halamanAktif);
        
    //     $jumlahDataPerhalaman = 2;
    //     $jumlahData = count(query("SELECT * FROM proyek"));
    //     $jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
    //     // $halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;
    //     $awalData = ($jumlahDataPerhalaman * $halamanAktif) -$jumlahDataPerhalaman;
    //      $proyek = query("SELECT * FROM proyek LIMIT $awalData,$jumlahDataPerhalaman");
    //     return $proyek;
    // }
    // jumlah tabel di pengalaman kerja



    // BIDANG USAHAAAAAAAAAAAAAAAAAAAAAAAAAAAA===============================
    // function data bidang usaha
     // tampil data usaha
     function tampilbidang($query){
        global $conn;
        $result = mysqli_query($conn,$query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }

    // tambah data bidang usaha
    function tambahbidang($data){ 
        global $conn;
        // htmlspecialchars untuk menghindari dari user memasukan script
        $klasifikasi = htmlspecialchars($data['klasifikasi']);
        $kode = htmlspecialchars($data['kode']);
        $subkla = htmlspecialchars($data['sub_klasifikasi']);
        $kualifikasi = htmlspecialchars($data['sub_kualifikasi']);
        $add = "INSERT INTO bidang_usaha VALUES ('', '$klasifikasi','$kode','$subkla','$kualifikasi')";
        mysqli_query($conn,$add);
        // mengembalikan untuk mengecek data berhasil ditambahkan atau tidak
        return mysqli_affected_rows($conn);
    }
     // hapus bidang usaha
     function hapusbidang($id){
        global $conn;

        mysqli_query($conn, "DELETE FROM bidang_usaha WHERE id = $id");
        return mysqli_affected_rows($conn);
    }
    function ubahbidang($data){ 
        global $conn;
        // htmlspecialchars untuk menghindari dari user memasukan script
        $id = $data['id'];
        $klasifikasi = htmlspecialchars($data['klasifikasi']);
        $kode = htmlspecialchars($data['kode']);
        $subkla = htmlspecialchars($data['sub_klasifikasi']);
        $kualifikasi = htmlspecialchars($data['sub_kualifikasi']);
        $edit = "UPDATE bidang_usaha SET 
            klasifikasi = '$klasifikasi',
            kode = '$kode',
            sub_klasifikasi = '$subkla',
            sub_kualifikasi = '$kualifikasi'
            WHERE id = $id
        ";
        mysqli_query($conn,$edit);
        // mengembalikan untuk mengecek data berhasil ditambahkan atau tidak
        return mysqli_affected_rows($conn);
    }
    //  pencarian dan filter tabel bidang usaha
    function caribidang($keyword){
        $query =" SELECT * FROM bidang_usaha WHERE klasifikasi LIKE '%$keyword%' OR kode LIKE '%$keyword%' OR sub_klasifikasi LIKE '%$keyword%' OR sub_kualifikasi LIKE '%$keyword%'";
        return query($query);
    }
    function filtersub($sub){
        $query =" SELECT * FROM bidang_usaha WHERE sub_klasifikasi = '$sub'";
        return query($query);
    }

    // data pesan
     // tampil data proyek
     function pesan($query){
        global $conn;
        $result = mysqli_query($conn,$query);
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)){
            $rows[] = $row;
        }
        return $rows;
    }
    // hapus bidang usaha
    function hapuspesan($id){
        global $conn;

        mysqli_query($conn, "DELETE FROM pesan WHERE id = $id");
        return mysqli_affected_rows($conn);
    }
    function ubahpesan($data){ 
        global $conn;
        // htmlspecialchars untuk menghindari dari user memasukan script
        $id = $data['id'];
        $nama = htmlspecialchars($data['nama']);
        $email = htmlspecialchars($data['email']);
        $judul = htmlspecialchars($data['judul']);
        $pertanyaan = htmlspecialchars($data['pertanyaan']);
        $jawaban = htmlspecialchars($data['jawaban']);
        $status = htmlspecialchars($data['status']);
        $edit = "UPDATE pesan SET 
            nama = '$nama',
            email = '$email',
            judul = '$judul',
            pertanyaan = '$pertanyaan',
            jawaban = '$jawaban',
            statuss = '$status'
            WHERE id = $id
        ";
        mysqli_query($conn,$edit);
        // mengembalikan untuk mengecek data berhasil ditambahkan atau tidak
        return mysqli_affected_rows($conn);
    }
    // pesanan masuk ditambahkan dari user
    function kirimpesan($data){ 
        global $conn;
        // htmlspecialchars untuk menghindari dari user memasukan script
        $nama = htmlspecialchars($data['nama']);
        $email = htmlspecialchars($data['email']);
        $judul = htmlspecialchars($data['judul']);
        $pertanyaan = htmlspecialchars($data['pertanyaan']);
        $add = "INSERT INTO pesan VALUES ('', '$nama','$email','$judul','$pertanyaan','','')";
        mysqli_query($conn,$add);
        // mengembalikan untuk mengecek data berhasil ditambahkan atau tidak
        return mysqli_affected_rows($conn);
    }
?>