<!DOCTYPE html>
<html lang="en">
    <?php
        require "layout/head.php";
        require "include/connection.php";
    ?>
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
                <h3>Tambah Pasien</h3>
            </div>
            <div class="page-content">
                <section class="row">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col">
                                <form action="pasien_tambah_action.php" method="POST">
                                <div class="form-group">
                                    <label for="basicInput">Nama Pasien</label>
                                    <input type="text" class="form-control" name="nama_pasien">
                                </div>
                                <div style="display: flex;">
                                    <div class="form-group" style="margin-right: 20px; width: 400px;">
                                        <label for="tinggiBadan">No. KTP</label>
                                        <input type="text" class="form-control" name="no_ktp" maxlength="16">
                                    </div>
                                    <div class="form-group" style="margin-right: 20px; width: 400px;">
                                        <label for="beratBadan">Tempat Lahir</label>
                                        <input type="text" class="form-control" name="tempat_lahir">
                                    </div>
                                    <div class="form-group" style="margin-right: 20px; width: 300px;">
                                        <label for="beratBadan">Tanggal Lahir</label>
                                        <input type="date" class="form-control" name="tanggal_lahir">
                                    </div>
                                    <div class="form-group" style="width: 300px;">
                                        <label for="basicInput">Jenis Kelamin</label>
                                        <select class="form-control form-select" name="jenis_kelamin">
                                            <option value="L">Laki - Laki</option>
                                            <option value="P">Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="basicInput">Alamat</label>
                                    <input type="text" class="form-control" name="alamat">
                                </div>
                                <div class="form-group">
                                    <label for="basicInput">No. Telp</label>
                                    <input type="text" class="form-control" name="no_telepon" maxlength="13">
                                </div>
                                <div class="form-row" style="display: flex;">
                                    <div class="form-group" style="margin-right: 20px; width: 400px;">
                                        <label for="tinggiBadan">Tinggi Badan (cm)</label>
                                        <input type="number" class="form-control" name="tinggi_badan">
                                    </div>
                                    <div class="form-group" style="margin-right: 20px; width: 400px;">
                                        <label for="beratBadan">Berat Badan (kg)</label>
                                        <input type="number" class="form-control" name="berat_badan">
                                    </div>
                                    <div class="form-group" style="width: 500px;">
                                        <label for="beratBadan">Golongan Darah</label>
                                        <select class="form-control form-select" name="golongan_darah">
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
                                    <input type="text" class="form-control" name="riwayat_alergi">
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
    </div>
    <?php require "layout/js.php";?>
</body>
</html>