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
                                <li><span>Şoförler</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container mt-5">
                <?php
                include("ayar.php");

                $sorgu = "SELECT * FROM sofor";
                $sonuc = $baglanti->query($sorgu);

                if ($sonuc->num_rows > 0) {
                    echo '<div>';
                    echo '<h2 class="mt-4 mb-3">Şoförler Listesi</h2>';
                    echo '<table class="table table-hover">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th scope="col">Sicil No</th>';
                    echo '<th scope="col">Ad</th>';
                    echo '<th scope="col">Soyad</th>';
                    echo '<th scope="col">Tel No</th>';
                    echo '<th scope="col">Düzenle</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';

                    while ($row = $sonuc->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row["SicilNo"] . '</td>';
                        echo '<td>' . $row["Ad"] . '</td>';
                        echo '<td>' . $row["Soyad"] . '</td>';
                        echo '<td>' . $row["TelNo"] . '</td>';
                        echo '<td>';
                        echo '<button class="btn btn-primary btn-sm duzenle-btn" data-toggle="modal" data-target="#duzenleModal" data-sofor-id="' . $row["ID"] . '" data-sicil-no="' . $row["SicilNo"] . '" data-ad="' . $row["Ad"] . '" data-soyad="' . $row["Soyad"] . '" data-tel-no="' . $row["TelNo"] . '">Düzenle</button>';
                        echo '</td>';
                        echo '</tr>';
                    }

                    echo '</tbody>';
                    echo '</table>';
                    echo '</div>';
                } else {
                    echo '<p>Henüz hiç şoför eklenmemiş.</p>';
                }

                $baglanti->close();
                ?>

                <div class="modal fade" id="duzenleModal" tabindex="-1" role="dialog" aria-labelledby="duzenleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="duzenleModalLabel">Şoför Bilgilerini Düzenle</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="soforDuzenleForm">
                                    <input type="hidden" id="soforId" name="sofor_id" value="">
                                    <div class="form-group">
                                        <label for="yeniSicilNo">Yeni Sicil No:</label>
                                        <input type="text" class="form-control" id="yeniSicilNo" name="yeni_sicil_no">
                                    </div>
                                    <div class="form-group">
                                        <label for="yeniAd">Yeni Ad:</label>
                                        <input type="text" class="form-control" id="yeniAd" name="yeni_ad">
                                    </div>
                                    <div class="form-group">
                                        <label for="yeniSoyad">Yeni Soyad:</label>
                                        <input type="text" class="form-control" id="yeniSoyad" name="yeni_soyad">
                                    </div>
                                    <div class="form-group">
                                        <label for="yeniTelNo">Yeni Tel No:</label>
                                        <input type="text" class="form-control" id="yeniTelNo" name="yeni_tel_no">
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                                <button type="button" class="btn btn-primary" id="soforDuzenleBtn">Düzenle</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $(".duzenle-btn").click(function() {
                            var soforId = $(this).data("sofor-id");
                            var sicilNo = $(this).data("sicil-no");
                            var ad = $(this).data("ad");
                            var soyad = $(this).data("soyad");
                            var telNo = $(this).data("tel-no");
                            $("#soforId").val(soforId);
                            $("#yeniSicilNo").val(sicilNo);
                            $("#yeniAd").val(ad);
                            $("#yeniSoyad").val(soyad);
                            $("#yeniTelNo").val(telNo);
                        });

                        $("#soforDuzenleBtn").click(function() {
                            var soforId = $("#soforId").val();
                            var yeniSicilNo = $("#yeniSicilNo").val();
                            var yeniAd = $("#yeniAd").val();
                            var yeniSoyad = $("#yeniSoyad").val();
                            var yeniTelNo = $("#yeniTelNo").val();

                            $.ajax({
                                url: "sofor_duzenle.php",
                                method: "POST",
                                data: {
                                    sofor_id: soforId,
                                    yeni_sicil_no: yeniSicilNo,
                                    yeni_ad: yeniAd,
                                    yeni_soyad: yeniSoyad,
                                    yeni_tel_no: yeniTelNo
                                },
                                success: function(response) {
                                    if (response === "success") {
                                        location.reload();
                                    } else {
                                        alert("Düzenleme hatası: " + response);
                                    }
                                },
                                error: function(xhr, status, error) {
                                    alert("Düzenleme hatası: " + error);
                                }
                            });
                        });
                    });
                </script>

                <hr>
                <h2 class="mb-3">Şoför Ekle</h2>
                <form id="soforForm" action="soforeklesonuc.php" method="POST">
                    <div class="form-group">
                        <label class="mt-3" for="sicilno">Sicil No:</label>
                        <input type="text" class="form-control w-25" id="sicilno" name="sicilno" required>
                    </div>
                    <div class="form-group">
                        <label class="mt-3" for="ad">Ad:</label>
                        <input type="text" class="form-control w-25" id="ad" name="ad" required>
                    </div>

                    <div class="form-group">
                        <label class="mt-3" for="soyad">Soyad:</label>
                        <input type="text" class="form-control w-25" id="soyad" name="soyad" required>
                    </div>

                    <div class="form-group">
                        <label class="mt-3" for="telno">Tel No:</label>
                        <input type="text" class="form-control w-25" id="telno" name="telno" required>
                    </div>

                    <button type="submit" class="btn btn-success mb-1">Kaydet</button>
                </form>
            </div>

            <script>
                $("#soforForm").submit(function(e) {
                    e.preventDefault();
                    $.ajax({
                        type: "POST",
                        url: $(this).attr("action"),
                        data: $(this).serialize(),
                        success: function(response) {
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                        }
                    });
                });
            </script>

            <script src="\assets\js\jquery.min.js"></script>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        </div>
        <footer>
            <div class="footer-area">
                <p>© Copyright 2023. Tüm hakları saklıdır <a href="https://iett.gov.tr/">İETT</a>.</p>
            </div>
        </footer>
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