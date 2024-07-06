<?php
    require "include/connection.php";
    require "aes_new.php";

    $aes = new AES256();

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

    $encrypt_username = $aes->encrypt($username);
    $encrypt_role = $aes->encrypt($role);
    $encrypt_password = $aes->encrypt($password);
    $encrypt_nama_lengkap = $aes->encrypt($nama_lengkap);
    $encrypt_nik = $aes->encrypt($nik);
    $encrypt_no_ktp = $aes->encrypt($no_ktp);
    $encrypt_tempat_lahir = $aes->encrypt($tempat_lahir);
    $encrypt_tanggal_lahir = $aes->encrypt($tanggal_lahir);
    $encrypt_jenis_kelamin = $aes->encrypt($jenis_kelamin);
    $encrypt_alamat = $aes->encrypt($alamat);
    $encrypt_no_telepon = $aes->encrypt($no_telepon);
    $encrypt_nomor_str = $aes->encrypt($nomor_str);
    $encrypt_tanggal_str = $aes->encrypt($tanggal_str);
    $encrypt_nomor_sip = $aes->encrypt($nomor_sip);
    $encrypt_tanggal_sip = $aes->encrypt($tanggal_sip);

    $sql = "INSERT INTO user (username, role, password, nama_lengkap, nik, nomor_ktp, tempat_lahir, tanggal_lahir, jenis_kelamin, alamat, nomor_telepon, nomor_str, tanggal_str, nomor_sip, tanggal_sip) VALUES ('$encrypt_username', '$encrypt_role', '$encrypt_password', '$encrypt_nama_lengkap', '$encrypt_nik', '$encrypt_no_ktp', '$encrypt_tempat_lahir', '$encrypt_tanggal_lahir', '$encrypt_jenis_kelamin', '$encrypt_alamat', '$encrypt_no_telepon', '$encrypt_nomor_str', '$encrypt_tanggal_str', '$encrypt_nomor_sip', '$encrypt_tanggal_sip')";
    
    if ($db->query($sql) === true) {
        header("location:user.php");
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
?>