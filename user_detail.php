<?php
    require "include/connection.php";
    
    $id = $_GET['id'];
    $sql = "SELECT * FROM user WHERE user_id = '$id' ";
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
                <h3>Detail User</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <form action="user_tambah_action.php" method="POST">
                                        <div style="display: flex; justify-content: space-around;">
                                            <div class="form-group" style="flex-grow: 2; margin-right: 10px;">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control" name="username" value="<?=$row['username'];?>" disabled>
                                            </div>
                                            <div class="form-group" style="flex-grow: 2;">
                                                <label for="role">Role</label>
                                                <select class="form-control form-select" name="role" value="<?=$row['role'];?>" disabled>
                                                    <option value="petugas">Petugas</option>
                                                    <option value="dokter">Dokter</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_lengkap">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="nama_lengkap" value="<?=$row['nama_lengkap'];?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="nik">NIK</label>
                                            <input type="text" class="form-control" name="nik" value="<?=$row['nik'];?>" disabled>
                                        <div style="display: flex; justify-content: space-between;">
                                            <div class="form-group" style="flex-grow: 2; margin-right: 10px;">
                                                <label for="no_ktp">No. KTP</label>
                                                <input type="text" class="form-control" name="no_ktp" maxlength="16" value="<?=$row['nomor_ktp'];?>" disabled>
                                            </div>
                                            <div class="form-group" style="flex-grow: 2; margin-right: 10px;">
                                                <label for="tempat_lahir">Tempat Lahir</label>
                                                <input type="text" class="form-control" name="tempat_lahir" value="<?=$row['tempat_lahir'];?>" disabled>
                                            </div>
                                            <div class="form-group" style="flex-grow: 2; margin-right: 10px;">
                                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                                <input type="date" class="form-control" name="tanggal_lahir" value="<?=$row['tanggal_lahir'];?>" disabled>
                                            </div>
                                            <div class="form-group" style="flex-grow: 2;">
                                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                                <select class="form-control form-select" name="jenis_kelamin" value="<?=$row['jenis_kelamin'];?>" disabled>
                                                    <option value="L">Laki - Laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control" name="alamat" value="<?=$row['alamat'];?>" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="no_telepon">No. Telp</label>
                                            <input type="text" class="form-control" name="no_telepon" maxlength="13" value="<?=$row['nomor_telepon'];?>" disabled>
                                        </div>
                                        <div style="display: flex; justify-content: space-around;">
                                            <div class="form-group" style="flex-grow: 2; margin-right: 10px;">
                                                <label for="nomor_str">Nomor STR</label>
                                                <input type="text" class="form-control" name="nomor_str" value="<?=$row['nomor_str'];?>" disabled>
                                            </div>
                                            <div class="form-group" style="flex-grow: 2;">
                                                <label for="tanggal_str">Tanggal STR</label>
                                                <input type="date" class="form-control" name="tanggal_str" value="<?=$row['tanggal_str'];?>" disabled>
                                            </div>
                                        </div>
                                        <div style="display: flex; justify-content: space-around;">
                                            <div class="form-group" style="flex-grow: 2; margin-right: 10px;">
                                                <label for="nomor_sip">Nomor SIP</label>
                                                <input type="text" class="form-control" name="nomor_sip" value="<?=$row['nomor_sip'];?>" disabled>
                                            </div>
                                            <div class="form-group" style="flex-grow: 2;">
                                                <label for="tanggal_sip">Tanggal SIP</label>
                                                <input type="date" class="form-control" name="tanggal_sip" value="<?=$row['tanggal_sip'];?>" disabled>
                                            </div>
                                        </div>
                                        <div style="margin-top: 0.5rem">
                                            <button class="btn btn-secondary btn-md"><a href="user.php" style="text-decoration: none; color: inherit;">Kembali</a></button>
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