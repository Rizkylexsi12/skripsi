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
                <h3>Tambah User</h3>
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
                                                <input type="text" class="form-control" name="username">
                                            </div>
                                            <div class="form-group" style="flex-grow: 2;">
                                                <label for="role">Role</label>
                                                <select class="form-control form-select" name="role">
                                                    <option value="petugas">Petugas</option>
                                                    <option value="dokter">Dokter</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="text" class="form-control" name="password">
                                        </div>
                                        <div class="form-group">
                                            <label for="nama_lengkap">Nama Lengkap</label>
                                            <input type="text" class="form-control" name="nama_lengkap">
                                        </div>
                                        <div class="form-group">
                                            <label for="nik">Nomor Induk Karyawan</label>
                                            <input type="text" class="form-control" name="nik" maxlength="10" pattern="\d{10}" title="NIK harus terdiri dari 10 karakter angka">
                                        </div>
                                        <div style="display: flex;">
                                            <div class="form-group" style="flex-grow: 2; margin-right: 10px;">
                                                <label for="no_ktp">No. KTP</label>
                                                <input type="text" class="form-control" name="no_ktp" maxlength="16" pattern="\d{16}" title="No. KTP harus terdiri dari 16 karakter angka">
                                            </div>
                                            <div class="form-group" style="flex-grow: 2; margin-right: 10px;">
                                                <label for="tempat_lahir">Tempat Lahir</label>
                                                <input type="text" class="form-control" name="tempat_lahir">
                                            </div>
                                            <div class="form-group" style="flex-grow: 2; margin-right: 10px;">
                                                <label for="tanggal_lahir">Tanggal Lahir</label>
                                                <input type="date" class="form-control" name="tanggal_lahir">
                                            </div>
                                            <div class="form-group" style="flex-grow: 2;">
                                                <label for="jenis_kelamin">Jenis Kelamin</label>
                                                <select class="form-control form-select" name="jenis_kelamin">
                                                    <option value="L">Laki - Laki</option>
                                                    <option value="P">Perempuan</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label for="alamat">Alamat</label>
                                            <input type="text" class="form-control" name="alamat">
                                        </div>
                                        <div class="form-group">
                                            <label for="no_telepon">No. Telp</label>
                                            <input type="text" class="form-control" name="no_telepon" maxlength="13">
                                        </div>
                                        <div style="display: flex; justify-content: space-around;">
                                            <div class="form-group" style="flex-grow: 2; margin-right: 10px;">
                                                <label for="nomor_str">Nomor STR</label>
                                                <input type="text" class="form-control" name="nomor_str" maxlength="15">
                                            </div>
                                            <div class="form-group" style="flex-grow: 2;">
                                                <label for="tanggal_str">Tanggal STR</label>
                                                <input type="date" class="form-control" name="tanggal_str">
                                            </div>
                                        </div>
                                        <div style="display: flex; justify-content: space-around;">
                                            <div class="form-group" style="flex-grow: 2; margin-right: 10px;">
                                                <label for="nomor_sip">Nomor SIP</label>
                                                <input type="text" class="form-control" name="nomor_sip" maxlength="10">
                                            </div>
                                            <div class="form-group" style="flex-grow: 2;">
                                                <label for="tanggal_sip">Tanggal SIP</label>
                                                <input type="date" class="form-control" name="tanggal_sip">
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