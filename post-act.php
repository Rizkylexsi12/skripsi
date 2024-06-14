<?php
    include 'include/connection.php';
    include 'aes.php';

    $name = $_POST['nama'];
    $tgl_lahir = $_POST['ttl'];
    
    $encrypted_data = encryptAES256($name, $key);
    $encrypted_tgl_lahir = encryptAES256($tgl_lahir, $key);
    $sql = "INSERT INTO pasien (nama_pasien, hasil_enkripsi, tgl_lahir) VALUES ('$name', '$encrypted_data', '$encrypted_tgl_lahir')";

    if ($db->query($sql) === true) {
        header("location:index.php");
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
?>