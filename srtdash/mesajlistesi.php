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
                                <li><span>Mesajlar</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="main-content-inner">
                <div class="row">
                    <div class="col-12 mt-5 mb-4 mx-auto">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title">Mesaj Listesi</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-hover progress-table text-center">
                                            <thead class="text-uppercase bg-warning">
                                                <tr class="bg-warning">
                                                    <th scope="col">ID</th>
                                                    <th scope="col">KAPI NUMARASI</th>
                                                    <th scope="col">MESAJ İÇERİĞİ</th>
                                                    <th scope="col">KAYIT ZAMANI</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include("ayar.php");

                                                if ($baglanti->connect_error) {
                                                    die("Veritabanı Bağlantı Hatası: " . $baglanti->connect_error);
                                                }
                                                $sql = "SELECT * FROM mesaj";

                                                $result = $baglanti->query($sql);

                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo "<tr>";
                                                        echo "<td>" . $row["ID"] . "</td>";
                                                        echo "<td>" . $row["AracID"] . "</td>";
                                                        echo "<td>" . $row["Icerik"] . "</td>";
                                                        echo "<td>";
                                                        echo date('d-m-Y', strtotime($row["KayitZamani"]));
                                                        echo "<br>";
                                                        echo date('H:i:s', strtotime($row["KayitZamani"]));
                                                        echo "</td>";
                                                        echo "</tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='3'>Veri bulunamadı.</td></tr>";
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