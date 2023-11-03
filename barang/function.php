<?php

$conn = mysqli_connect("localhost", "root", "", "tokoku");

//fungsi untuk menampilkan query
function query($query)
{
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;
    $nama =htmlspecialchars( $data['nama_barang']);
    $harga =htmlspecialchars ($data['harga']);
    $stok =htmlspecialchars ($data['stok']);
    $supplier =htmlspecialchars ($data['id_supplier']);

    // gambar
    $gambar = upload();
    if(!$gambar) {
        return false;
    }




    
    $query = "INSERT INTO barang VALUE ('', '$gambar', '$nama', '$harga', '$stok', '$supplier')";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}


 

function upload(){
    $namafile = $_FILES ['images']['name'];
    $ukuranfile = $_FILES ['images']['size'];
    $eror = $_FILES ['images']['error'];
    $tmpname = $_FILES ['images']['tmp_name'];

    if ($eror === 4){
        echo "<script> alert('pilih gambar!') </script>";
        return false;
    }

    
    
    $ekstensigambarvalid = ['jpg', 'jpeg', 'png'];
    $ekstensigambar = explode('.', $namafile);
    $ekstensigambar= strtolower(end($ekstensigambar));
    if ( !in_array($ekstensigambar, $ekstensigambarvalid)) {
        return false;
    }

    $namafilebaru = uniqid();
    $namafilebaru .= '.';
    $namafilebaru .= $ekstensigambar;
    
    move_uploaded_file($tmpname, 'images/' . $namafilebaru);


    return $namafilebaru;
}



function hapus($id)
{
    global $conn;
    try{

        $file = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM barang WHERE id_barang='$id'"));
        $hapus = "DELETE FROM barang WHERE id_barang='$id'";
        mysqli_query($conn,$hapus);
        unlink('images/' . $file["images"]);
        return mysqli_affected_rows($conn);
    }
    catch(Exception){
        return false;
    }
 }
function ubah($data)
{
    global $conn;
    
    $id = $data ['id'];
    $gambarlama =htmlspecialchars($data['gambarlama']);
    $nama =htmlspecialchars( $data['nama_barang']);
    $harga =htmlspecialchars ($data['harga']);
    $stok =htmlspecialchars ($data['stok']);
    $supplier = htmlspecialchars($data['nama_supplier']);

    if ($_FILES['images']['error'] === 4 ){
        $gambar = $gambarlama;
    }
    else{
        $gambar = upload();
        $file = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM barang WHERE id_barang='$id'"));
        unlink('images/' . $file["images"]);
    }

    $query = "UPDATE barang SET
        images ='$gambar',
        nama_barang ='$nama', 
        harga ='$harga', 
        stok = '$stok', 
        nama_supplier ='$supplier'

        WHERE id_barang= $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}

function cari($keyword){
    $query = "SELECT * FROM barang WHERE nama = '$keyword'";
}
?>