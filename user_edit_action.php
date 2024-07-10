<?php
    require "include/connection.php";
    include "looping_generator.php";

    $id = $_POST['user_id'];
    $username = $_POST['username'];
    $role = $_POST['role'];
    $password = $_POST['password'];
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

    $encrypt_username = encrypt($username, $aes);
    $encrypt_role = encrypt($role, $aes);
    $encrypt_password = encrypt($password, $aes);
    $encrypt_nama_lengkap = encrypt($nama_lengkap, $aes);
    $encrypt_nik = encrypt($nik, $aes);
    $encrypt_no_ktp = encrypt($no_ktp, $aes);
    $encrypt_tempat_lahir = encrypt($tempat_lahir, $aes);
    $encrypt_tanggal_lahir = encrypt($tanggal_lahir, $aes);
    $encrypt_jenis_kelamin = encrypt($jenis_kelamin, $aes);
    $encrypt_alamat = encrypt($alamat, $aes);
    $encrypt_no_telepon = encrypt($no_telepon, $aes);
    $encrypt_nomor_str = encrypt($nomor_str, $aes);
    $encrypt_tanggal_str = encrypt($tanggal_str, $aes);
    $encrypt_nomor_sip = encrypt($nomor_sip, $aes);
    $encrypt_tanggal_sip = encrypt($tanggal_sip, $aes);

    $sql = "UPDATE user SET username='$encrypt_username',role='$encrypt_role',password='$encrypt_password',nama_lengkap='$encrypt_nama_lengkap',nik='$encrypt_nik',nomor_ktp='$encrypt_no_ktp',tempat_lahir='$encrypt_tempat_lahir',tanggal_lahir='$encrypt_tanggal_lahir',jenis_kelamin='$encrypt_jenis_kelamin',alamat='$encrypt_alamat',nomor_telepon='$encrypt_no_telepon',nomor_str='$encrypt_nomor_str',tanggal_str='$encrypt_tanggal_str',nomor_sip='$encrypt_nomor_sip',tanggal_sip='$encrypt_tanggal_sip' WHERE user_id='$id'";

    $result = $db->query($sql);

    header("location:user.php");
?>