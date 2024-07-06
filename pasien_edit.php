<?php
    require "include/connection.php";
    require "aes_new.php";

    $aes = new AES256();
    
    $id = $_GET['id'];
    $sql = "SELECT * FROM pasien WHERE pasien_id = '$id' ";
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
                    <h3>Edit Pasien</h3>
                </div>
                <div class="page-content">
                <section class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <form action="pasien_edit_action.php" method="POST">
                                <div class="form-group">
                                    <label for="basicInput">Nama Pasien</label>
                                    <input type="text" class="form-control" name="pasien_id" value="<?=$row['pasien_id'];?>" hidden>
                                    <input type="text" class="form-control" name="nama_pasien" value="<?=$aes->decrypt($row['nama_pasien']);?>">
                                </div>
                                <div style="display: flex;">
                                    <div class="form-group" style="margin-right: 20px; width: 400px;">
                                        <label for="tinggiBadan">No. KTP</label>
                                        <input type="text" class="form-control" name="no_ktp" maxlength="16" value="<?=$aes->decrypt($row['nomor_ktp']);?>" pattern="\d{16}" title="No. KTP harus terdiri dari 16 karakter angka">
                                    </div>
                                    <div class="form-group" style="margin-right: 20px; width: 400px;">
                                        <label for="beratBadan">Tempat Lahir</label>
                                        <input type="text" class="form-control" name="tempat_lahir" value="<?=$aes->decrypt($row['tempat_lahir']);?>">
                                    </div>
                                    <div class="form-group" style="margin-right: 20px; width: 300px;">
                                        <label for="beratBadan">Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tanggal_lahir" value="<?=$aes->decrypt($row['tanggal_lahir']);?>">
                                    </div>
                                    <div class="form-group" style="width: 300px;">
                                        <label for="basicInput">Jenis Kelamin</label>
                                        <select class="form-control form-select" name="jenis_kelamin">
                                            <option value="L" <?=$aes->decrypt($row['jenis_kelamin']) == 'L' ? 'selected' : '';?>>Laki - Laki</option>
                                            <option value="P" <?=$aes->decrypt($row['jenis_kelamin']) == 'P' ? 'selected' : '';?>>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="basicInput">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" value="<?=$aes->decrypt($row['alamat']);?>">
                                </div>
                                <div class="form-group">
                                    <label for="basicInput">No. Telp</label>
                                    <input type="text" class="form-control" name="no_telepon" maxlength="13" value="<?=$aes->decrypt($row['nomor_telepon']);?>">
                                </div>
                                <div class="form-row" style="display: flex;">
                                    <div class="form-group" style="margin-right: 20px; width: 400px;">
                                        <label for="tinggiBadan">Tinggi Badan (cm)</label>
                                        <input type="number" class="form-control" name="tinggi_badan" value="<?=$aes->decrypt($row['tinggi_badan']);?>">
                                    </div>
                                    <div class="form-group" style="margin-right: 20px; width: 400px;">
                                        <label for="beratBadan">Berat Badan (kg)</label>
                                        <input type="number" class="form-control" name="berat_badan" value="<?=$aes->decrypt($row['berat_badan']);?>">
                                    </div>
                                    <div class="form-group" style="width: 500px;">
                                        <label for="beratBadan">Golongan Darah</label>
                                        <select class="form-control form-select" name="golongan_darah">
                                            <option value="A" <?=$aes->decrypt($row['golongan_darah']) == 'A' ? 'selected' : '';?>>A</option>
                                            <option value="B" <?=$aes->decrypt($row['golongan_darah']) == 'B' ? 'selected' : '';?>>B</option>
                                            <option value="AB" <?=$aes->decrypt($row['golongan_darah']) == 'AB' ? 'selected' : '';?>>AB</option>
                                            <option value="O" <?=$aes->decrypt($row['golongan_darah']) == 'O' ? 'selected' : '';?>>O</option>
                                            <option value="-" <?=$aes->decrypt($row['golongan_darah']) == '-' ? 'selected' : '';?>>Tidak tahu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="basicInput">Riwayat Alergi</label>
                                    <input type="text" class="form-control" name="riwayat_alergi" value="<?=$aes->decrypt($row['riwayat_alergi']);?>">
                                </div>
                                <button type="submit" class="btn btn-info btn-md" style="background-color: #169859;">Simpan</button>
                                <button class="btn btn-danger btn-md"><a href="pasien.php" style="text-decoration: none; color: inherit;">Batal</a></button>
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