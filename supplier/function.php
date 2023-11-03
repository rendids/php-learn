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
        $harga =htmlspecialchars ($data['no_telp']);
        $stok =htmlspecialchars ($data['alamat']);

        if (empty($harga)) {
            echo "<script>alert('Nomor telepon tidak boleh kosong.');</script>";
            return 0;
        }

        if (strlen($stok) > 255) {
            echo "<script>alert('Alamat tidak boleh lebih dari 255 karakter.');</script>";
            return 0;
        }


        $query = "INSERT INTO supplier VALUE ('', '$nama', '$harga', '$stok')";
        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);
    }




    function hapus($id)
    {
        global $conn;

        try{

            mysqli_query($conn, "DELETE FROM supplier WHERE id_supplier = $id");
        
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
        $nama =htmlspecialchars( $data['nama_supplier']);
        $harga =htmlspecialchars ($data['no_telp']);
        $stok =htmlspecialchars ($data['alamat']);

        if (empty($harga)) {
            echo "<script>alert('Nomor telepon tidak boleh kosong.');</script>";
            return 0;
        }

        if (strlen($stok) > 255) {
            echo "<script>alert('Alamat tidak boleh lebih dari 255 karakter.');</script>";
            return 0;
        }

        $query = "UPDATE supplier SET
            nama_supplier ='$nama', 
            no_telp ='$harga', 
            alamat = '$stok'
            WHERE id_supplier= $id";

        mysqli_query($conn, $query);

        return mysqli_affected_rows($conn);
    }
    ?>