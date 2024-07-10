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
            <div class="page-heading">
                <h3>Master Pasien</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <form method="GET" action="">
                                        <div>
                                            <label for="basicInput">Cari Pasien :</label>
                                            <div class="form-group"  style="display: flex;">
                                                <input type="text" class="form-control" name="search" style="margin-right: 20px;">
                                                <div class="input-group-append">
                                                    <button class="btn btn-outline-secondary" type="submit" id="button-addon2">Cari</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="ml-auto">
                                    <button type="button" class="btn btn-outline-success btn-sm" style="margin-left: 20px;">
                                        <a href="pasien_tambah.php" style="text-decoration: none; color: inherit;">Tambah Pasien</a>
                                    </button>
                                </div>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table table-border table-striped mb-0" style="width: 1250px;margin-left: 30px;margin-right: 30px;">
                                        <?php
                                            include 'include/connection.php';
                                            include 'looping_generator.php';

                                            $search = isset($_GET['search']) ? $_GET['search'] : '';

                                            $sql = "SELECT * FROM pasien";
                                            $result = $db->query($sql);

                                            $data_pasien = [];
                                            while ($row = $result->fetch_object()) {
                                                $decrypted_name = decrypt($row->nama_pasien, $aes);
                                                if ($search && stripos($decrypted_name, $search) === false) {
                                                    continue;
                                                }
                                                $data_pasien[] = [
                                                    'id' => $row->pasien_id,
                                                    'nama_pasien' => $decrypted_name,
                                                    'tanggal_lahir' => decrypt($row->tanggal_lahir, $aes),
                                                    'jenis_kelamin' => decrypt($row->jenis_kelamin, $aes),
                                                    'golongan_darah' => decrypt($row->golongan_darah, $aes)
                                                ];
                                            }
                                        
                                            if (!empty($data_pasien)) {
                                                echo '<div class="table-responsive">
                                                    <table class="table table-border table-striped mb-0" style="width: 1250px;margin-left: 30px;margin-right: 30px;">
                                                        <caption> Tabel User </caption>
                                                        <tr>
                                                            <th class="text-center" style="width: 50px">No.</th>
                                                            <th class="text-center" style="width: 50px">Nama Pasien</th>
                                                            <th class="text-center" style="width: 50px">Tanggal Lahir</th>
                                                            <th class="text-center" style="width: 100px">Jenis Kelamin</th>
                                                            <th class="text-center" style="width: 120px">Golongan Darah</th>
                                                            <th class="text-center" style="width: 150px">Actions</th>
                                                        </tr>';
                                            
                                                $i = 1;
                                                foreach ($data_pasien as $pasien) {
                                                    echo "<tr>
                                                        <td class='text-center'>" . ($i++) . "</td>
                                                        <td>". $pasien['nama_pasien'] ."</td>
                                                        <td class='text-center'>". $pasien['tanggal_lahir'] ."</td>
                                                        <td class='text-center'>". $pasien['jenis_kelamin'] ."</td>
                                                        <td class='text-center'>". $pasien['golongan_darah'] ."</td>
                                                        <td class='text-center'>
                                                            <div class='btn-group mb-1'>
                                                                <div class='dropdown text-center'>
                                                                    <button class='btn btn-sm' type='button' style='background-color: #169859;color: white;'>
                                                                        <a href='pasien_detail.php?id={$pasien['id']}' style='text-decoration: none; color: inherit;'>Detail</a>
                                                                    </button>
                                                                    <button class='btn btn-secondary btn-sm' type='button'>
                                                                        <a href='pasien_edit.php?id={$pasien['id']}' style='text-decoration: none; color: inherit;'>Edit</a>
                                                                    </button>";
                        if ($_SESSION['role'] == 'petugas') { echo "<button class='btn btn-danger btn-sm' type='button' style='margin-left: 5px;'>
                                                                        <a href='pasien_hapus.php?id={$pasien['id']}' style='text-decoration: none; color: inherit;'>Delete</a>
                                                                    </button>"; }
                                                           echo "</div>
                                                            </div>
                                                        </td>
                                                    </tr>\n";
                                                }
                                            
                                                echo '</table>
                                                </div>';
                                            } else {
                                                echo "<p class='text-center'>Data tidak ditemukan.</p>";
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
