<?php
    require "include/connection.php";
    
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
                <div class="page-heading">
                    <h3>Detail Pasien</h3>
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
                                    <input type="text" class="form-control" name="nama_pasien" value="<?=$row['nama_pasien'];?>" disabled>
                                </div>
                                <div style="display: flex;">
                                    <div class="form-group" style="margin-right: 20px; width: 400px;">
                                        <label for="tinggiBadan">No. KTP</label>
                                        <input type="text" class="form-control" name="no_ktp" maxlength="16" value="<?=$row['nomor_ktp'];?>" disabled>
                                    </div>
                                    <div class="form-group" style="margin-right: 20px; width: 400px;">
                                        <label for="beratBadan">Tempat Lahir</label>
                                        <input type="text" class="form-control" name="tempat_lahir" value="<?=$row['tempat_lahir'];?>" disabled>
                                    </div>
                                    <div class="form-group" style="margin-right: 20px; width: 300px;">
                                        <label for="beratBadan">Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tanggal_lahir" value="<?=$row['tanggal_lahir'];?>" disabled>
                                    </div>
                                    <div class="form-group" style="width: 300px;">
                                        <label for="basicInput">Jenis Kelamin</label>
                                        <select class="form-control form-select" name="jenis_kelamin" value="<?=$row['jenis_kelamin'];?>" disabled>
                                            <option value="L">Laki - Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="basicInput">Alamat</label>
                                    <input type="text" class="form-control" name="alamat" value="<?=$row['alamat'];?>" disabled>
                                </div>
                                <div class="form-group">
                                    <label for="basicInput">No. Telp</label>
                                    <input type="text" class="form-control" name="no_telepon" maxlength="13" value="<?=$row['nomor_telepon'];?>" disabled>
                                </div>
                                <div class="form-row" style="display: flex;">
                                    <div class="form-group" style="margin-right: 20px; width: 400px;">
                                        <label for="tinggiBadan">Tinggi Badan (cm)</label>
                                        <input type="number" class="form-control" name="tinggi_badan" value="<?=$row['tinggi_badan'];?>" disabled>
                                    </div>
                                    <div class="form-group" style="margin-right: 20px; width: 400px;">
                                        <label for="beratBadan">Berat Badan (kg)</label>
                                        <input type="number" class="form-control" name="berat_badan" value="<?=$row['berat_badan'];?>" disabled>
                                    </div>
                                    <div class="form-group" style="width: 500px;">
                                        <label for="beratBadan">Golongan Darah</label>
                                        <select class="form-control form-select" name="golongan_darah" value="<?=$row['golongan_darah'];?>" disabled>
                                            <option value="A">A</option>
                                            <option value="B">B</option>
                                            <option value="AB">AB</option>
                                            <option value="O">O</option>
                                            <option value="-">Tidak tahu</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="basicInput">Riwayat Alergi</label>
                                    <input type="text" class="form-control" name="riwayat_alergi" value="<?=$row['riwayat_alergi'];?>" disabled>
                                </div>
                                <div style="margin-top: 0.5rem">
                                    <button class="btn btn-secondary btn-md"><a href="pasien.php" style="text-decoration: none; color: inherit;">Kembali</a></button>
                                </div>
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