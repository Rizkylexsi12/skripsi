<?php
    require "include/connection.php";
    include "looping_generator.php";

    $id = $_POST['pasien_id'];
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


    $sql = "UPDATE pasien SET nama_pasien='$encrypt_nama_pasien',nomor_ktp='$encrypt_no_ktp',tempat_lahir='$encrypt_tempat_lahir',tanggal_lahir='$encrypt_tanggal_lahir',jenis_kelamin='$encrypt_jenis_kelamin',alamat='$encrypt_alamat',nomor_telepon='$encrypt_no_telepon',tinggi_badan='$encrypt_tinggi_badan',berat_badan='$encrypt_berat_badan',golongan_darah='$encrypt_golongan_darah',riwayat_alergi='$encrypt_riwayat_alergi' WHERE pasien_id='$id'";
    
    $result = $db->query($sql);

    header("location:pasien.php");
?>