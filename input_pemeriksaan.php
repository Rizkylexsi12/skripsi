<?php
require "include/connection.php";
include 'looping_generator.php';

$id = $_GET['id'];
$sql = "SELECT * FROM pasien WHERE pasien_id = '$id'";
$result = $db->query($sql);
$row = $result->fetch_array();
?>
<!DOCTYPE html>
<html lang="en">
    <?php require "layout/head.php";?>
    <body>
        <div id="app">
            <?php require "layout/sidebar.php";?>
            <div id="main">
                <header class="mb-3">
                    <a href="#" class="burger-btn d-block d-xl-none">
                        <i class="bi bi-justify fs-3"></i>
                    </a>
                </header>
                <div class="page-heading">
                    <h3>Input Pemeriksaan</h3>
                </div>
                <div class="page-content">
                <section class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <form action="input_pemeriksaan_action.php" method="POST">
                                    <input type="hidden" name="user_id" value="<?=$user_id;?>">
                                    <input type="hidden" name="pasien_id" value="<?=$id;?>">
                                    <div style="display: flex;">
                                        <div class="form-group" style="margin-right: 20px; width: 400px;">
                                            <label for="tinggiBadan">Nama Pasien</label>
                                            <input type="text" class="form-control" name="no_ktp" value="<?=decrypt($row['nama_pasien'], $aes);?>" disabled>
                                        </div>
                                        <div class="form-group" style="margin-right: 20px; width: 400px;">
                                            <label for="beratBadan">Tanggal Lahir</label>
                                            <input type="text" class="form-control" name="tempat_lahir" value="<?=decrypt($row['tempat_lahir'], $aes);?>" disabled>
                                        </div>
                                        <div class="form-group" style="margin-right: 20px; width: 300px;">
                                            <label for="beratBadan">Jenis Kelamin</label>
                                            <input type="date" class="form-control" name="tanggal_lahir" value="<?=decrypt($row['tanggal_lahir'], $aes);?>" disabled>
                                        </div>
                                        <div class="form-group" style="width: 300px;">
                                            <label for="basicInput">Golongan Darah</label>
                                            <select class="form-control form-select" name="jenis_kelamin" disabled>
                                                <option value="L" <?=decrypt($row['jenis_kelamin'], $aes) == 'L' ? 'selected' : '';?>>Laki - Laki</option>
                                                <option value="P" <?=decrypt($row['jenis_kelamin'], $aes) == 'P' ? 'selected' : '';?>>Perempuan</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="basicInput">Riwayat Alergi</label>
                                        <input type="text" class="form-control" name="riwayat_alergi" value="<?=decrypt($row['riwayat_alergi'], $aes);?>" disabled>
                                    </div>
                                    <hr>
                                    <h3>Subjective</h3>
                                    <div class="form-group">
                                        <label for="basicInput">Keluhan Utama</label>
                                        <input type="text" class="form-control" name="keluhan_utama">
                                    </div>
                                    <h3>Objective</h3>
                                    <div class="form-group">
                                        <label for="basicInput">Hasil Pemeriksaan</label>
                                        <input type="text" class="form-control" name="hasil_pemeriksaan">
                                    </div>
                                    <h3>Assessment</h3>
                                    <div class="form-group">
                                        <label for="basicInput">Diagnosa</label>
                                        <select class="form-control form-select" name="diagnosa">
                                            <option value="19.0 sakit kepala">19.0 Sakit Kepala</option>
                                            <option value="29.5 demam">29.5 Demam</option>
                                        </select>
                                    </div>
                                    <h3>Plan</h3>
                                    <div class="form-group">
                                        <label for="basicInput">Pemeriksaan dan Tindakan</label>
                                        <input type="text" class="form-control" name="pemeriksaan_dan_tindakan">
                                    </div>
                                    <button type="submit" class="btn btn-info btn-md" style="background-color: #169859;">Simpan</button>
                                    <button class="btn btn-danger btn-md"><a href="lakukan_pemeriksaan.php" style="text-decoration: none; color: inherit;">Batal</a></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                </section>
            </div>
            </div>
        </div>
        <?php require "layout/js.php";?>
    </body>
</html>
