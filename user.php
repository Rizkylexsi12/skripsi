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
                <h3>Master User</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-content">
                                <div class="card-body">
                                    <p class="card-text">
                                        Data-data berikut menampilkan data user :
                                    </p>
                                </div>
                                <div class="ml-auto">
                                    <button type="button" class="btn btn-outline-success btn-sm" style="margin-left: 20px;">
                                        <a href="user_tambah.php" style="text-decoration: none; color: inherit;">Tambah User</a>
                                    </button>
                                </div>
                                <hr>
                                <div class="table-responsive">
                                    <table class="table table-border table-striped mb-0" style="width: 1250px; margin: 0px 30px;">
                                        <caption> Tabel User </caption>
                                        <tr>
                                            <th class="text-center">No.</th>
                                            <th class="text-center">Username</th>
                                            <th class="text-center">Nama Lengkap</th>
                                            <th class="text-center">Role</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        <?php
                                            include 'include/connection.php';
                                            include 'aes.php';

                                            $sql = 'SELECT * FROM user';
                                            $result = $db->query($sql);
                                            $i = 1;
                                            while ($row = $result->fetch_object()) {
                                                echo "<tr>
                                                    <td class='text-center'>" . ($i++) . "</td>
                                                    <td class='text-center'>$row->username</td>
                                                    <td class='text-center'>$row->nama_lengkap</td>
                                                    <td class='text-center'>$row->role</td>
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