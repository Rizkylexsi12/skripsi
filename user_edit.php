<?php
    require "include/connection.php";
    include "looping_generator.php";

    $id = $_GET['id'];
    $sql = "SELECT * FROM user WHERE user_id = '$id' ";
    $result = $db->query($sql);
    $row = $result->fetch_array();
?>
<!DOCTYPE html>
<html lang="en">
    <?php
        require "layout/head.php";
    ?>
<body>
    <div id="app">
        <?php require "layout/sidebar.php";?>
        <div id="main">
            <div class="page-heading">
                <h3>Edit User</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col">
                                    <form action="user_edit_action.php" method="POST">
                                        <div style="display: flex; justify-content: space-around;">
                                            <div class="form-group" style="flex-grow: 2; margin-right: 10px;">
                                                <label for="username">Username</label>
                                                <input type="text" class="form-control" name="user_id" value="<?=$row['user_id'];?>" hidden>
                                                <input type="text" class="form-control" name="username" value="<?=decrypt($row['username'], $aes);?>">
                                            </div>
                                            <div class="form-group" style="flex-grow: 2;">
                                                <label for="role">Role</label>
                                                <select class="form-control form-select" name="role">
                                                    <option value="petugas" <?=decrypt($row['role'], $aes) == 'petugas' ? 'selected' : '';?>>Petugas</option>
                                                    <option value="dokter" <?=decrypt($row['role'], $aes) == 'dokter' ? 'selected' : '';?>>Dokter</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="text" class="form-control" name="password" value="<?=decrypt($row['password'], $aes);?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_lengkap">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="nama_lengkap" value="<?=decrypt($row['nama_lengkap'], $aes);?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="nik">NIK</label>
                                            <input type="text" class="form-control" name="nik" value="<?=decrypt($row['nik'], $aes);?>" maxlength="10" pattern="\d{10}" title="NIK harus terdiri dari 10 karakter angka">
                                        </div>
                                        <div style="display: flex; justify-content: space-between;">
                                            <div class="form-group" style="flex-grow: 2; margin-right: 10px;">
                                                <label for="no_ktp">No. KTP</label>
                                                <input type="text" class="form-control" name="no_ktp" value="<?=decrypt($row['nomor_ktp'], $aes);?>" maxlength="16" pattern="\d{16}" title="No. KTP harus terdiri dari 16 karakter angka">
                                            </div>
                                            <div class="form-group" style="flex-grow: 2; margin-right: 10px;">
                                                <label for="tempat_lahir">Tempat Lahir</label>
                                                <input type="text" class="form-control" name="tempat_lahir" value="<?=decrypt($row['tempat_lahir'], $aes);?>">
                                            </div>
                                            <div class="form-group" style="flex-grow: 2; margin-right: 10px;">
                                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                                <input type="date" class="form-control" name="tanggal_lahir" value="<?=decrypt($row['tanggal_lahir'], $aes);?>">
                                            </div>
                                            <div class="form-group" style="flex-grow: 2;">
                                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                                <select class="form-control form-select" name="jenis_kelamin">
                                                    <option value="L" <?=decrypt($row['jenis_kelamin'], $aes) == 'L' ? 'selected' : '';?>>Laki - Laki</option>
                                                    <option value="P" <?=decrypt($row['jenis_kelamin'], $aes) == 'P' ? 'selected' : '';?>>Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control" name="alamat" value="<?=decrypt($row['alamat'], $aes);?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="no_telepon">No. Telp</label>
                                            <input type="text" class="form-control" name="no_telepon" maxlength="13" value="<?=decrypt($row['nomor_telepon'], $aes);?>">
                                        </div>
                                        <div style="display: flex; justify-content: space-around;">
                                            <div class="form-group" style="flex-grow: 2; margin-right: 10px;">
                                                <label for="nomor_str">Nomor STR</label>
                                                <input type="text" class="form-control" name="nomor_str" value="<?=decrypt($row['nomor_str'], $aes);?>" maxlength="15">
                                            </div>
                                            <div class="form-group" style="flex-grow: 2;">
                                                <label for="tanggal_str">Tanggal STR</label>
                                                <input type="date" class="form-control" name="tanggal_str" value="<?=decrypt($row['tanggal_str'], $aes);?>">
                                            </div>
                                        </div>
                                        <div style="display: flex; justify-content: space-around;">
                                            <div class="form-group" style="flex-grow: 2; margin-right: 10px;">
                                                <label for="nomor_sip">Nomor SIP</label>
                                                <input type="text" class="form-control" name="nomor_sip" value="<?=decrypt($row['nomor_sip'], $aes);?>" maxlength="10">
                                            </div>
                                            <div class="form-group" style="flex-grow: 2;">
                                                <label for="tanggal_sip">Tanggal SIP</label>
                                                <input type="date" class="form-control" name="tanggal_sip" value="<?=decrypt($row['tanggal_sip'], $aes);?>">
                                            </div>
                                        </div>
                                        <div style="margin-top: 0.5rem">
                                            <button type="submit" class="btn btn-info btn-md" style="background-color: #169859;">Simpan</button>
                                            <button class="btn btn-danger btn-md"><a href="user.php" style="text-decoration: none; color: inherit;">Batal</a></button>
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