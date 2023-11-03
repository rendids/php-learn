<?php

$conn = mysqli_connect("localhost", "root", "", "tokoku");

function registrasi($data){
    global $conn;
    $username = strtolower(stripslashes($data['nama_pembeli']));
    $jk= $data ['jk'];
    $alamat = $data['alamat'];
    $email = $data['email'];
    $pw = mysqli_real_escape_string( $conn, $data['password']);
    $pw2 = mysqli_real_escape_string( $conn, $data['password2']);

    // cek username
    $result = mysqli_query($conn, "SELECT nama_pembeli FROM pembeli WHERE nama_pembeli = '$username'");

    if(mysqli_fetch_assoc($result)){
        echo"<script>alert('username terdaftar')</script>";
        return false;
    }

    // cek email
    $result = mysqli_query($conn, "SELECT email FROM pembeli WHERE email = '$email'");

    if(mysqli_fetch_assoc($result)){
        echo"<script>alert('email yang anda masukan sudah terdaftar')</script>";
        return false;
    }

    // cek konfirmasi
    if ($pw !== $pw2){
    echo"<script>alert('konfirmasi terlebih dahulu password')</script>";
    return false;
    }

    $minimumPasswordLength = 5;
    if (strlen($pw) < $minimumPasswordLength) {
        echo "<script>alert('password minimal $minimumPasswordLength karakter.')</script>";
        return false;
    }

    $maximumAlamatLength = 255;
    if (strlen($alamat) > $maximumAlamatLength) {
        echo "<script>alert('alamat lebih dari $maximumAlamatLength karakter.')</script>";
        return false;
    }

    // enkripsi
    $pw = password_hash($pw, PASSWORD_DEFAULT);

    $query = "INSERT INTO pembeli VALUE ('', '$username', '$jk', '$alamat', '$email', '$pw')";
    mysqli_query($conn,$query);

    return mysqli_affected_rows($conn);

}