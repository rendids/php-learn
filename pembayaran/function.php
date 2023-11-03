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
    $nama =htmlspecialchars( $data['tgl_bayar']);
    $harga =htmlspecialchars ($data['total_bayar']);
    $stok =htmlspecialchars ($data['id_transaksi']);




    
    $query = "INSERT INTO pembayaran VALUE ('', '$nama', '$harga', '$stok')";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}


 



function hapus($id)
{
    global $conn;
        mysqli_query($conn, "DELETE FROM pembayaran WHERE id_pembayaran = $id");
    
        return mysqli_affected_rows($conn);
}
function ubah($data)
{
    global $conn;

    $id = $data ['id'];
    $nama =htmlspecialchars( $data['tgl_bayar']);
    $harga =htmlspecialchars ($data['total_bayar']);
    $stok =htmlspecialchars ($data['id_transaksi']);

    $query = "UPDATE pembayaran SET
        tgl_bayar ='$nama', 
        total_bayar ='$harga', 
        id_transaksi = '$stok'
        WHERE id_pembayaran= $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
?>