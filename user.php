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
                <h3>Master User</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <form method="GET" action="">
                                        <div>
                                            <label for="basicInput">Cari User :</label>
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
                                    <a href="user_tambah.php" style="text-decoration: none; color: inherit;">Tambah User</a>
                                    </button>
                                </div>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table table-border table-striped mb-0" style="width: 1250px; margin: 0px 30px;">
                                        <?php
                                            include 'include/connection.php';
                                            include 'aes_new.php';

                                            $aes = new AES256();

                                            $search = isset($_GET['search']) ? $_GET['search'] : '';

                                            $sql = 'SELECT * FROM user';
                                            if ($search) {
                                                $sql .= " WHERE username LIKE '%" . $db->real_escape_string($search) . "%'";
                                            }
                                        
                                            $result = $db->query($sql);
                                            $i = 1;
                                            $found = false;
                                        
                                            while ($row = $result->fetch_object()) {
                                                $found = true;
                                            }
                                            
                                            if ($found) {
                                                $result = $db->query($sql);
                                            
                                                echo '<div class="table-responsive">
                                                    <table class="table table-border table-striped mb-0" style="width: 1250px;margin-left: 30px;margin-right: 30px;">
                                                        <caption> Tabel User </caption>
                                                        <tr>
                                                            <th class="text-center" style="width: 50px">No.</th>
                                                            <th class="text-center" style="width: 100px">Username</th>
                                                            <th class="text-center" style="width: 100px">Nama Lengkap</th>
                                                            <th class="text-center" style="width: 100px">Role</th>
                                                            <th class="text-center" style="width: 100px">Action</th>
                                                        </tr>';
                                            
                                                while ($row = $result->fetch_object()) {
                                                    echo "<tr>
                                                        <td class='text-center'>" . ($i++) . "</td>
                                                        <td class='text-center'>". $aes->decrypt($row->username) ."</td>
                                                        <td class='text-center'>". $aes->decrypt($row->nama_lengkap). "</td>
                                                        <td class='text-center'>". $aes->decrypt($row->role) ."</td>
                                                        <td class='text-center'>
                                                        <div class='btn-group mb-1'>
                                                            <div class='dropdown text-center'>
                                                                <button class='btn btn-sm' type='button' style='background-color: #169859;color: white;'>
                                                                    <a href='user_detail.php?id={$row->user_id}' style='text-decoration: none; color: inherit;'>Detail</a>
                                                                </button>
                                                                <button class='btn btn-secondary btn-sm' type='button'>
                                                                    <a href='user_edit.php?id={$row->user_id}' style='text-decoration: none; color: inherit;'>Edit</a>
                                                                </button>
                                                                <button class='btn btn-danger btn-sm' type='button'>
                                                                    <a href='user_hapus.php?id={$row->user_id}' style='text-decoration: none; color: inherit;'>Delete</a>
                                                                </button>
                                                            </div>
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
                    </div>
                </section>
            </div>
        </div>
    </div>
    <?php require "layout/js.php";?>
</body>
</html>