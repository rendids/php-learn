<?php 
require 'function.php';
$id = $_GET["id"];

if( hapus($id) > 0){
    echo " <script>
    alert('data berhasil dihapus');
    document.location.href = 'index.php';
    </script>
    ";
} 
elseif(hapus($id) == false){
    echo"<script>
    alert('data tidak dapat di hapus karena sedang digunakan');
    document.location.href = 'index.php';
</script>";
}
    
    else {
    echo "
    <script>
        alert('data gagal dihapus');
        document.location.href = 'index.php';
    </script>
";
}

?>