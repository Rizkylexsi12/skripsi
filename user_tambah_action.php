<?php
    require "include/connection.php";
    include "looping_generator.php";

    // $awal = microtime(true);
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

    $sql = "INSERT INTO user (username, role, password, nama_lengkap, nik, nomor_ktp, tempat_lahir, tanggal_lahir, jenis_kelamin, alamat, nomor_telepon, nomor_str, tanggal_str, nomor_sip, tanggal_sip) VALUES ('$encrypt_username', '$encrypt_role', '$encrypt_password', '$encrypt_nama_lengkap', '$encrypt_nik', '$encrypt_no_ktp', '$encrypt_tempat_lahir', '$encrypt_tanggal_lahir', '$encrypt_jenis_kelamin', '$encrypt_alamat', '$encrypt_no_telepon', '$encrypt_nomor_str', '$encrypt_tanggal_str', '$encrypt_nomor_sip', '$encrypt_tanggal_sip')";
    
    if ($db->query($sql) === true) {
        // $akhir = microtime(true);
        // $lama = $akhir - $awal;
        // session_start();
        // $_SESSION['message'] = "Lama eksekusi script adalah: " . $lama . " detik";
        header("location:user.php");
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
?>