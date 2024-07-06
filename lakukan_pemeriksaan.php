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
                <h3>Lakukan Pemeriksaan</h3>
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
                                <hr>
                                <div class="table-responsive">
                                    <table class="table table-border table-striped mb-0" style="width: 1250px;margin-left: 30px;margin-right: 30px;">
                                        <?php
                                            include 'include/connection.php';
                                            include 'aes_new.php';

                                            $aes = new AES256();

                                            $search = isset($_GET['search']) ? $_GET['search'] : '';

                                            $sql = "SELECT * FROM pasien";
                                            if ($search) {
                                                $sql .= " WHERE nama_pasien LIKE '%" . $db->real_escape_string($search) . "%'";
                                            }
                                            $result = $db->query($sql);
                                            $i = 1;
                                            $found = false;
                                        
                                            while ($row = $result->fetch_object()) {
                                                $found = true;
                                            }
                                        
                                            if ($found) {
                                                // Reset result pointer and execute query again
                                                $result = $db->query($sql);
                                            
                                                echo '<div class="table-responsive">
                                                    <table class="table table-border table-striped mb-0" style="width: 1250px;margin-left: 30px;margin-right: 30px;">
                                                        <caption> Tabel User </caption>
                                                        <tr>
                                                            <th class="text-center" style="width: 30px">No.</th>
                                                            <th class="text-center" style="width: 80px">Nama Pasien</th>
                                                            <th class="text-center" style="width: 50px">Tanggal Lahir</th>
                                                            <th class="text-center" style="width: 40px">Jenis Kelamin</th>
                                                            <th class="text-center" style="width: 40px">Golongan Darah</th>
                                                            <th class="text-center" style="width: 40px">Actions</th>
                                                        </tr>';
                                        
                                                while ($row = $result->fetch_object()) {
                                                    echo "<tr>
                                                        <td class='text-center'>" . ($i++) . "</td>
                                                        <td class='text-center'>". $aes->decrypt($row->nama_pasien) ."</td>
                                                        <td class='text-center'>". $aes->decrypt($row->tanggal_lahir) ."</td>
                                                        <td class='text-center'>". $aes->decrypt($row->jenis_kelamin) ."</td>
                                                        <td class='text-center'>". $aes->decrypt($row->golongan_darah) ."</td>
                                                        <td class='text-center'>
                                                            <div class='btn-group mb-1'>
                                                                <div class='dropdown text-center'>
                                                                    <button class='btn btn-outline-primary btn-sm' type='button'>
                                                                        <a href='detail_pemeriksaan.php?id={$row->pasien_id}' style='text-decoration: none; color: inherit;'>Detail</a>
                                                                    </button>
                                                                    <button class='btn btn-success btn-sm' type='button'>
                                                                        <a href='input_pemeriksaan.php?id={$row->pasien_id}' style='text-decoration: none; color: inherit;'>Periksa</a>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </td>
                                                      </tr>\n";
                                                }
                                        
                                                echo '</table>
                                                </div>';
                                            } else {
                                                echo "<p class='text-center'>Data tidak ditemukan. <a href='pasien_tambah.php' class='btn btn-outline-success btn-sm'>Tambah Pasien</a></p>";
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