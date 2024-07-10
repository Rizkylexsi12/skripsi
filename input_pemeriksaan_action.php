<?php
    require "include/connection.php";
    include 'looping_generator.php';

    $user_id = $_POST['user_id'];
    $pasien_id = $_POST['pasien_id'];
    $subjective = $_POST['keluhan_utama'];
    $objective = $_POST['hasil_pemeriksaan'];
    $assessment = $_POST['diagnosa'];
    $plan = $_POST['pemeriksaan_dan_tindakan'];

    $encrypt_subjective = encrypt($subjective, $aes);
    $encrypt_objective = encrypt($objective, $aes);
    $encrypt_assessment = encrypt($assessment, $aes);
    $encrypt_plan = encrypt($plan, $aes);

    date_default_timezone_set('Asia/Jakarta');
    $current_date_time = date('Y-m-d H:i');
    $encrypt_tanggal_kunjungan = encrypt($current_date_time, $aes);

    $sql = "INSERT INTO rekam_medis (user_id, pasien_id, subjective, objective, assessment, plan, tanggal_kunjungan) VALUES ('$user_id', '$pasien_id', '$encrypt_subjective', '$encrypt_objective', '$encrypt_assessment', '$encrypt_plan', '$encrypt_tanggal_kunjungan')";
    
    if ($db->query($sql) === true) {
        header("location:lakukan_pemeriksaan.php");
    } else {
        echo "Error: " . $sql . "<br>" . $db->error;
    }
?>