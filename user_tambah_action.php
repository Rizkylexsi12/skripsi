<?php
    require "include/connection.php";

    $username = $_POST['username'];
    $role = $_POST['role'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $nik = $_POST['nik'];
    $no_ktp = $_POST['no_ktp'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];
    $nomor_str = $_POST['nomor_str'];
    $tanggal_str = $_POST['tanggal_str'];
    $nomor_sip = $_POST['nomor_sip'];
    $tanggal_sip = $_POST['tanggal_sip'];

    // $x = $db->query($sql);
    // var_dump($x);
    $sql = "INSERT INTO user (username, role, nama_lengkap, nik, nomor_ktp, tempat_lahir, tanggal_lahir, jenis_kelamin, alamat, nomor_telepon, nomor_str, tanggal_str, nomor_sip, tanggal_sip) VALUES ('$username', '$role', '$nama_lengkap', '$nik', '$no_ktp', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$alamat', '$no_telepon', '$nomor_str', '$tanggal_str', '$nomor_sip', '$tanggal_sip')";
    
    if ($db->query($sql) === true) {
        header("location:user.php");
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
?>