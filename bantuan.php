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
                <h3>Bantuan
                </h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h2 class="text-center">Informasi Singkat</h2>
                            </div>
                            <div class="card-content">
                                <div class="card-body pt-1">
                                    <ul>
                                        <li><b>Dashboard :</b> Menu ini adalah halaman utama dari EMR Zi.Care</li>
                                        <li><b>Data</b></li>
                                        <ul>
                                            <li><b>Master User :</b> Menu ini berisi data user yang memiliki akses kedalam EMR Zi.Care</li>
                                            <li><b>Master Pasien :</b> Menu ini berisi data pasien beserta rekam medis yang telah terdaftar dalam sistem EMR Zi.Care</li>
                                        </ul>
                                        <li><b>Lakukan Pemeriksaan :</b> Menu ini digunakan oleh Dokter untuk memasukan data rekam medis Pasien</li>
                                        <li><b>Bantuan :</b> Menu ini berisi informasi singkat terkait menu - menu</li>
                                    </ul>
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