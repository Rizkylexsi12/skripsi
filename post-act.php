<?php
    include 'include/connection.php';
    include 'aes.php';

    $name = $_POST['nama'];
    $tgl_lahir = $_POST['ttl'];
    
    $encrypted_data = encryptAES256($name, $key);
    $encrypted_tgl_lahir = encryptAES256($tgl_lahir, $key);
    $sql = "INSERT INTO pasien (nama_pasien, dob_pasien, enkripsi_nama, enkripsi_dob) VALUES ('$encrypted_data', '$encrypted_tgl_lahir', '$encrypted_data', '$encrypted_tgl_lahir')";

    if ($db->query($sql) === true) {
        header("location:index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }

    //

    // include 'include/connection.php';
    // include 'aes_new.php';

    // $name = $_POST['nama'];
    // $tgl_lahir = $_POST['ttl'];
    
    // $aes = new AES256();

    // $encrypted_nama = $aes->encrypt($name);
    // $encrypted_dob = $aes->encrypt($tgl_lahir);

    // $sql = "INSERT INTO pasien (nama_pasien, dob_pasien, enkripsi_nama, enkripsi_dob) VALUES ('$encrypted_nama', '$encrypted_dob', '$encrypted_nama', '$encrypted_dob')";

    // if ($db->query($sql) === true) {
    //     header("location:index.php");
    // } else {
    //     echo "Error: " . $sql . "<br>" . $db->error;
    // }
?>