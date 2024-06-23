<?php
    require "include/connection.php";

    $nama_pasien = $_POST['nama_pasien'];
    $no_ktp = $_POST['no_ktp'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $alamat = $_POST['alamat'];
    $no_telepon = $_POST['no_telepon'];
    $tinggi_badan = $_POST['tinggi_badan'];
    $berat_badan = $_POST['berat_badan'];
    $golongan_darah = $_POST['golongan_darah'];
    $riwayat_alergi = $_POST['riwayat_alergi'];

    // $x = $db->query($sql);
    // var_dump($x);
    $sql = "INSERT INTO pasien (nama_pasien, nomor_ktp, tempat_lahir, tanggal_lahir, jenis_kelamin, alamat, nomor_telepon, tinggi_badan, berat_badan, golongan_darah, riwayat_alergi) VALUES ('$nama_pasien', '$no_ktp', '$tempat_lahir', '$tanggal_lahir', '$jenis_kelamin', '$alamat', '$no_telepon', '$tinggi_badan', '$berat_badan', '$golongan_darah', '$riwayat_alergi')";
    
    if ($db->query($sql) === true) {
        header("location:pasien.php");
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
?>