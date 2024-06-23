<?php
    require "include/connection.php";

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

    $sql = "UPDATE pasien SET nama_pasien='$nama_pasien',nomor_ktp='$no_ktp',tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',jenis_kelamin='$jenis_kelamin',alamat='$alamat',nomor_telepon='$no_telepon',tinggi_badan='$tinggi_badan',berat_badan='$berat_badan',golongan_darah='$golongan_darah',riwayat_alergi='$riwayat_alergi' WHERE pasien_id='$id'";
    
    $result = $db->query($sql);

    header("location:pasien.php");
?>