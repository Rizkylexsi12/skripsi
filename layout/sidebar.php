<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <a href="./" style="color: #1babe2;">Zi.Care</a>
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title"><h3>Hi, <?php echo $_SESSION['username'] ?></h3></li>
                <li class="sidebar-item">
                    <a href="./" class='sidebar-link'>
                        <i class="bi bi-grid-fill" style="color: #1babe2;"></i>
                        <span style="color: #1babe2;">Dashboard</span>
                    </a>
                </li>
                <li class="sidebar-item  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-archive-fill" style="color: #1babe2;"></i>
                        <span style="color: #1babe2;">Data</span>
                    </a>
                    <ul class="submenu">
                        <?php if ($_SESSION['role'] == 'petugas') { ?>
                            <li class="submenu-item ">
                                <a href="user.php" style="color: #1babe2;">Master User</a>
                            </li>
                        <?php } ?>
                        <!-- <li class="submenu-item ">
                            <a href="user.php" style="color: #1babe2;">Master User</a>
                        </li> -->
                        <li class="submenu-item ">
                            <a href="pasien.php" style="color: #1babe2;">Master Pasien</a>
                        </li>
                    </ul>
                </li>
                <li class="sidebar-item">
                    <a href="lakukan_pemeriksaan.php" class='sidebar-link' style="color: #1babe2;">
                        <i class="bi bi-file-earmark-check-fill" style="color: #1babe2;"></i>
                        <span>Lakukan Pemeriksaan</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="bantuan.php" class='sidebar-link'>
                        <i class="bi bi-info-square-fill" style="color: #1babe2;"></i>
                        <span style="color: #1babe2;">Bantuan</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a href="logout.php" class='sidebar-link'>
                        <i class="bi bi-box-arrow-right" style="color: red;"></i>
                        <span style="color: red;">Logout</span>
                    </a>
                </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>