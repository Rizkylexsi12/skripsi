<?php
require "include/connection.php";

$id = $_GET['id'];

$sql = "SELECT * FROM pasien WHERE pasien_id = '$id'";
$result = $db->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_array();
} else {
    echo "Pasien tidak ditemukan";
    exit();
}

$sql2 = "SELECT * FROM rekam_medis WHERE pasien_id = '$id'";
$result2 = $db->query($sql2);
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
                    <h3>Detail Pemeriksaan</h3>
                </div>
                <div class="page-content">
                <section class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <input type="hidden" name="user_id" value="<?=$user_id;?>">
                                <input type="hidden" name="pasien_id" value="<?=$id;?>">
                                <div style="display: flex;">
                                    <div class="form-group" style="margin-right: 20px; width: 400px;">
                                        <label for="tinggiBadan">Nama Pasien</label>
                                        <input type="text" class="form-control" name="no_ktp" value="<?=$row['nama_pasien'];?>" disabled>
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
                                        <select class="form-control form-select" name="jenis_kelamin" disabled>
                                            <option value="L" <?=($row['jenis_kelamin'] == 'L') ? 'selected' : '';?>>Laki - Laki</option>
                                            <option value="P" <?=($row['jenis_kelamin'] == 'P') ? 'selected' : '';?>>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="basicInput">Riwayat Alergi</label>
                                    <div style="display: flex;">
                                        <input type="text" class="form-control" name="riwayat_alergi" value="<?=$row['riwayat_alergi'];?>" disabled style="margin-right: 10px;">
                                        <div style="margin-right: 10px;">
                                            <button class="btn btn-success btn-md"><a href="input_pemeriksaan.php?id=<?= $row['pasien_id']; ?>" style="text-decoration: none; color: inherit;">Periksa</a></button>
                                        </div>
                                        <div>
                                            <button class="btn btn-secondary btn-md"><a href="lakukan_pemeriksaan.php" style="text-decoration: none; color: inherit;">Kembali</a></button>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table table-border table-striped mb-0" style="width: 1250px;">
                                        <caption> Tabel Rekam Medis </caption>
                                        <thead>
                                            <tr>
                                                <th class="text-center" style="width: 50px">No.</th>
                                                <th class="text-center" style="width: 50px">Tanggal Kunjungan</th>
                                                <th class="text-center" style="width: 50px">Subjective</th>
                                                <th class="text-center" style="width: 50px">Objective</th>
                                                <th class="text-center" style="width: 50px">Assessment</th>
                                                <th class="text-center" style="width: 50px">Plan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php 
                                        $i = 1;
                                        while ($row2 = $result2->fetch_object()): ?>
                                            <tr>
                                                <td class='text-center'><?=$i++;?></td>
                                                <td class='text-center'><?=$row2->tanggal_kunjungan;?></td>
                                                <td class='text-center'><?=$row2->subjective;?></td>
                                                <td class='text-center'><?=$row2->objective;?></td>
                                                <td class='text-center'><?=$row2->assessment;?></td>
                                                <td class='text-center'><?=$row2->plan;?></td>
                                            </tr>
                                        <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                </div>
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
