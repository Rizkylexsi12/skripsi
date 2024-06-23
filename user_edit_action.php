<?php
    require "include/connection.php";

    $id = $_POST['user_id'];
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

    $sql = "UPDATE user SET username='$username',role='$role',nama_lengkap='$nama_lengkap',nik='$nik',nomor_ktp='$no_ktp',tempat_lahir='$tempat_lahir',tanggal_lahir='$tanggal_lahir',jenis_kelamin='$jenis_kelamin',alamat='$alamat',nomor_telepon='$no_telepon',nomor_str='$nomor_str',tanggal_str='$tanggal_str',nomor_sip='$nomor_sip',tanggal_sip='$tanggal_sip' WHERE user_id='$id'";

    $result = $db->query($sql);

    header("location:user.php");
?>