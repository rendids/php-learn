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
    $nama =htmlspecialchars( $data['id_barang']);
    $harga =htmlspecialchars ($data['id_pembeli']);
    $stok =htmlspecialchars ($data['tanggal']);
    $ktr =htmlspecialchars ($data['keterangan']);

    if (strlen($ktr) > 255) {
        echo "<script>alert('keterangan tidak boleh lebih dari 255 karakter.');</script>";
        return 0;
    }

    
    $query = "INSERT INTO transaksi VALUE ('', '$nama', '$harga', '$stok', '$ktr')";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);
}




function hapus($id)
{
    global $conn;
    try{
        mysqli_query($conn, "DELETE FROM transaksi WHERE id_transaksi = $id");
    
        return mysqli_affected_rows($conn);
    }
    catch(Exception $i){
        return false;
    }
}
function ubah($data)
{
    global $conn;

    $id = $data ['id'];
    $nama =htmlspecialchars( $data['id_barang']);
    $harga =htmlspecialchars ($data['id_pembeli']);
    $stok =htmlspecialchars ($data['tanggal']);
    $ktr =htmlspecialchars ($data['keterangan']);

    if (strlen($ktr) > 255) {
        echo "<script>alert('keterangan tidak boleh lebih dari 255 karakter.');</script>";
        return 0;
    }

    $query = "UPDATE transaksi SET
        id_barang ='$nama', 
        id_pembeli ='$harga', 
        tanggal = '$stok',
        keterangan = '$ktr'
        WHERE id_transaksi= $id";

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
?>