<?php
    require "include/connection.php";
    include 'aes_new.php';

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

    $aes = new AES256();

    $encrypt_nama_pasien = $aes->encrypt($nama_pasien);
    $encrypt_no_ktp = $aes->encrypt($no_ktp);
    $encrypt_tempat_lahir = $aes->encrypt($tempat_lahir);
    $encrypt_tanggal_lahir = $aes->encrypt($tanggal_lahir);
    $encrypt_jenis_kelamin = $aes->encrypt($jenis_kelamin);
    $encrypt_alamat = $aes->encrypt($alamat);
    $encrypt_no_telepon = $aes->encrypt($no_telepon);
    $encrypt_tinggi_badan = $aes->encrypt($tinggi_badan);
    $encrypt_berat_badan = $aes->encrypt($berat_badan);
    $encrypt_golongan_darah = $aes->encrypt($golongan_darah);
    $encrypt_riwayat_alergi = $aes->encrypt($riwayat_alergi);

    $sql = "INSERT INTO pasien (nama_pasien, nomor_ktp, tempat_lahir, tanggal_lahir, jenis_kelamin, alamat, nomor_telepon, tinggi_badan, berat_badan, golongan_darah, riwayat_alergi) VALUES ('$encrypt_nama_pasien', '$encrypt_no_ktp', '$encrypt_tempat_lahir', '$encrypt_tanggal_lahir', '$encrypt_jenis_kelamin', '$encrypt_alamat', '$encrypt_no_telepon', '$encrypt_tinggi_badan', '$encrypt_berat_badan', '$encrypt_golongan_darah', '$encrypt_riwayat_alergi')";

    if ($db->query($sql) === true) {
        header("location:pasien.php");
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
?>