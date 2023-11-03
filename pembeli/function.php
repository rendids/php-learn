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
    $nama =htmlspecialchars( $data['nama_supplier']);
    $jk =htmlspecialchars ($data['jk']);
    $harga =htmlspecialchars ($data['no_telp']);
    $stok =htmlspecialchars ($data['alamat']);
    $em =htmlspecialchars ($data['email']);




    
    $query = "INSERT INTO pembeli VALUE ('', '$nama', '$jk', '$harga', '$stok', '$em')";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}


 

// function upload(){
//     $namafile = $_FILES ['images']['name'];
//     $ukuranfile = $_FILES ['images']['size'];
//     $eror = $_FILES ['images']['erorr'];
//     $tmpname = $_FILES ['images']['tmp_name'];

//     if ($eror === 4){
//         echo "<script> alert('pilih gambar!') </script>";
//         return false;
//     }

//     $ekstensigambarvalid = ['jpg', 'jpeg', 'png'];
//     $ekstensigambar = explode('.', $namafile);
//     $ekstensigambar= strtolower(end($ekstensigambar));
//     if ( !in_array($ekstensigambar, $ekstensigambarvalid)) {
//         echo"<script> alert('yang anda pilih bukan gambar!') </script>";
//         return false;
//     }

//     move_uploaded_file($tmpname, 'images/' . $namafile);

//     return $namafile;
// }



function hapus($id)
{
    global $conn;
    mysqli_query($conn, "DELETE FROM pembeli WHERE id_pembeli = $id");

    return mysqli_affected_rows($conn);
}
function ubah($data)
{
    global $conn;

    $id = $data ['id'];
    $nama =htmlspecialchars( $data['nama_supplier']);
    $jk =htmlspecialchars ($data['jk']);
    $harga =htmlspecialchars ($data['no_telp']);
    $stok =htmlspecialchars ($data['alamat']);
    $em =htmlspecialchars ($data['email']);

    $query = "UPDATE pembeli SET
        nama_supplier ='$nama',
        jk = '$jk', 
        no_telp ='$harga', 
        alamat = '$stok',
        email = '$em'
        WHERE id_pembeli= $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
?>