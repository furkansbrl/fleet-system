<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Filo Yönetim Sistemi</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">

    <style>
        .horizontal-list {
            display: flex;
            list-style: none;
            padding: 0;
        }

        .horizontal-list li {
            margin-right: 11px;
        }

        .horizontal-list li a {
            font-size: 15px;
        }
    </style>
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <div class="page-container">
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.php"><img src="assets/images/icon/IETT.PNG" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li class="active">
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-direction-alt"></i><span>Menü</span></a>
                                <ul class="collapse">
                                    <li class="active"><a href="index.php">Anasayfa</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-check-box"></i>
                                    <span>Ekle</span></a>
                                <ul class="collapse">
                                    <li><a href="hatekle.php">Hat Ekle</a></li>
                                    <li><a href="soforekle.php">Şoför Ekle</a></li>
                                    <li><a href="aracekle.php">Araç Ekle</a></li>
                                    <li><a href="gorevekle.php">Görev Ekle</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-email"></i><span>Mesajlar</span></a>
                                <ul class="collapse">
                                    <li><a href="mesajlistesi.php">Mesaj Listesi</a></li>
                                </ul>
                            </li>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-alert"></i><span>Arızalar</span></a>
                                <ul class="collapse">
                                    <li><a href="arizalistesi.php">Arıza Listesi</a></li>
                                </ul>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <div class="main-content">
            <div class="header-area">
                <div class="row align-items-center">
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="search-box pull-left">
                            <form action="#">
                                <input type="text" name="search" placeholder="Search..." required>
                                <i class="ti-search"></i>
                            </form>
                        </div>
                    </div>

                    <div class="col-md-6 col-sm-4 clearfix">
                        <ul class="notification-area pull-right">
                            <li id="full-view"><i class="ti-fullscreen"></i></li>
                            <li id="full-view-exit"><i class="ti-zoom-out"></i></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">FYS</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Anasayfa</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-content-inner">

                <?php
                include("ayar.php");
                if ($baglanti->connect_error) {
                    die("Bağlantı hatası: " . $baglanti->connect_error);
                }
                ?>

                <div class="row mt-5 mb-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-sm-flex justify-content-between align-items-center">
                                    <h4 class="header-title mb-0">Hatlar & Görevler</h4>
                                </div>

                                <div class="mt-3">
                                    <ul class="horizontal-list">
                                        <?php
                                        include("ayar.php");

                                        $HatSorgu = "SELECT * FROM hat";
                                        $HatSonuc = $baglanti->query($HatSorgu);

                                        if ($HatSonuc->num_rows > 0) {
                                            while ($HatCikti = $HatSonuc->fetch_assoc()) {
                                                echo '<li><a href="gorevler.php?hat_id=' . $HatCikti["HatID"] . '">' . $HatCikti["HatKod"] . '</a></li>';
                                            }
                                        } else {
                                            echo '<p>Henüz hiç hat eklenmemiş</p>';
                                        }
                                        $baglanti->close();
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mt-5">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title mb-4">Görev Listesi</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead class="thead-dark">
                                            <tr>
                                                <th scope="col">HAT</th>
                                                <th scope="col">GÜZERGAH</th>
                                                <th scope="col">ŞOFÖR SİCİL NO</th>
                                                <th scope="col">KAPI NO</th>
                                                <th scope="col">SAAT</th>
                                                <th scope="col">DURUM</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include("ayar.php");

                                            $gorevSorgu = "SELECT g.*, h.HatKod, d.DurumAdi
               FROM gorev g
               INNER JOIN hat h ON g.HatID = h.HatID
               INNER JOIN durumlar d ON g.DurumID = d.DurumID
               ORDER BY
                   CASE
                       WHEN h.HatKod BETWEEN 'A' AND 'Z' THEN 1
                       WHEN h.HatKod BETWEEN '1' AND '9' THEN 2
                       ELSE 3
                   END,
                   h.HatKod";
                                            $gorevSonuc = $baglanti->query($gorevSorgu);

                                            if ($gorevSonuc->num_rows > 0) {
                                                while ($gorevCikti = $gorevSonuc->fetch_assoc()) {
                                                    echo "<tr>";
                                                    echo "<td>" . $gorevCikti["HatKod"] . "</td>";
                                                    echo "<td>" . $gorevCikti["GuzergahID"] . "</td>";
                                                    echo "<td>" . $gorevCikti["SoforID"] . "</td>";
                                                    echo "<td>" . $gorevCikti["AracID"] . "</td>";
                                                    echo "<td>" . substr($gorevCikti["SaatID"], 0, 5) . "</td>";
                                                    echo "<td>" . $gorevCikti["DurumAdi"] . "</td>";
                                                    echo "</tr>";
                                                }
                                            } else {
                                                echo "<tr><td colspan='6'>Henüz hiç görev eklenmemiş</td></tr>";
                                            }

                                            $baglanti->close();
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer>
                <div class="footer-area mt-2">
                    <p>Copyright 2023 © Tüm hakları saklıdır <a href="https://iett.gov.tr/">İETT</a>.</p>
                </div>
            </footer>
        </div>

        <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/jquery.slimscroll.min.js"></script>
        <script src="assets/js/jquery.slicknav.min.js"></script>
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/scripts.js"></script>
</body>
</html>