<?php
    require "include/connection.php";

    // $user_id = $_SESSION['user_id'];
    $user_id = $_POST['user_id'];
    $pasien_id = $_POST['pasien_id'];
    $subjective = $_POST['keluhan_utama'];
    $objective = $_POST['hasil_pemeriksaan'];
    $assessment = $_POST['diagnosa'];
    $plan = $_POST['pemeriksaan_dan_tindakan'];

    $sql = "INSERT INTO rekam_medis (user_id, pasien_id, subjective, objective, assessment, plan, tanggal_kunjungan) VALUES ('$user_id', '$pasien_id', '$subjective', '$objective', '$assessment', '$plan', now())";
    
    if ($db->query($sql) === true) {
        header("location:lakukan_pemeriksaan.php");
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
?>