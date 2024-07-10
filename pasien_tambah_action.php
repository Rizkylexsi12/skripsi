<?php
    require "include/connection.php";
    include "looping_generator.php";

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

    $encrypt_nama_pasien = encrypt($nama_pasien, $aes);
    $encrypt_no_ktp = encrypt($no_ktp, $aes);
    $encrypt_tempat_lahir = encrypt($tempat_lahir, $aes);
    $encrypt_tanggal_lahir = encrypt($tanggal_lahir, $aes);
    $encrypt_jenis_kelamin = encrypt($jenis_kelamin, $aes);
    $encrypt_alamat = encrypt($alamat, $aes);
    $encrypt_no_telepon = encrypt($no_telepon, $aes);
    $encrypt_tinggi_badan = encrypt($tinggi_badan, $aes);
    $encrypt_berat_badan = encrypt($berat_badan, $aes);
    $encrypt_golongan_darah = encrypt($golongan_darah, $aes);
    $encrypt_riwayat_alergi = encrypt($riwayat_alergi, $aes);

    $sql = "INSERT INTO pasien (nama_pasien, nomor_ktp, tempat_lahir, tanggal_lahir, jenis_kelamin, alamat, nomor_telepon, tinggi_badan, berat_badan, golongan_darah, riwayat_alergi) VALUES ('$encrypt_nama_pasien', '$encrypt_no_ktp', '$encrypt_tempat_lahir', '$encrypt_tanggal_lahir', '$encrypt_jenis_kelamin', '$encrypt_alamat', '$encrypt_no_telepon', '$encrypt_tinggi_badan', '$encrypt_berat_badan', '$encrypt_golongan_darah', '$encrypt_riwayat_alergi')";

    if ($db->query($sql) === true) {
        header("location:pasien.php");
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
?>