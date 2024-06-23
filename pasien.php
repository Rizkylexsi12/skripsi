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
                <h3>Master Pasien</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <p class="card-text">
                                        Data-data berikut menampilkan data pasien :
                                    </p>
                                </div>
                                <div class="ml-auto">
                                    <button type="button" class="btn btn-outline-success btn-sm" style="margin-left: 20px;">
                                        <a href="pasien_tambah.php" style="text-decoration: none; color: inherit;">Tambah Pasien</a>
                                    </button>
                                </div>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table table-border table-striped mb-0" style="width: 1250px;margin-left: 30px;margin-right: 30px;">
                                        <caption> Tabel User </caption>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">Nama Pasien</th>
                                            <th class="text-center">Tanggal Lahir</th>
                                            <th class="text-center">Jenis Kelamin</th>
                                            <th class="text-center">Golongan Darah</th>
                                            <th class="text-center">Actions</th>
                                        </tr>
                                        <?php
                                            include 'include/connection.php';
                                            include 'aes.php';

                                            $sql = 'SELECT * FROM pasien';
                                            $result = $db->query($sql);
                                            $i = 1;
                                            while ($row = $result->fetch_object()) {
                                                echo "<tr>
                                                    <td class='text-center'>" . ($i++) . "</td>
                                                    <td class='text-center'>$row->nama_pasien</td>
                                                    <td class='text-center'>$row->tanggal_lahir</td>
                                                    <td class='text-center'>$row->jenis_kelamin</td>
                                                    <td class='text-center'>$row->golongan_darah</td>
                                                    <td class='text-center'>
                                                        <div class='btn-group mb-1'>
                                                            <div class='dropdown text-center'>
                                                                <button class='btn btn-sm' type='button' style='background-color: #169859;color: white;'>
                                                                    <a href='pasien_detail.php?id={$row->pasien_id}' style='text-decoration: none; color: inherit;'>Detail</a>
                                                                </button>
                                                                <button class='btn btn-secondary btn-sm' type='button'>
                                                                    <a href='pasien_edit.php?id={$row->pasien_id}' style='text-decoration: none; color: inherit;'>Edit</a>
                                                                </button>
                                                                <button class='btn btn-danger btn-sm' type='button'>
                                                                    <a href='pasien_hapus.php?id={$row->pasien_id}' style='text-decoration: none; color: inherit;'>Delete</a>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </td>
                                                  </tr>\n";
                                            }
                                            $result->free();
                                        ?>
                                    </table>
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