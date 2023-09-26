<?php
    require 'function.php';
  $id = $_GET['id'];

  if( hapuspesan($id) > 0){
    echo "
                <script>
                    alert('data berhasil dihapus');
                    document.location.href = 'pesan.php';
                </script>  
            ";
  }
  else{
    echo "
        <script>
            alert('data gagal dihapus');
            document.location.href = 'pesan.php';
        </script>  
    ";
}
?>