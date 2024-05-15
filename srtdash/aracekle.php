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
                                <li><span>Araçlar</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container mt-5">
                <?php
                include("ayar.php");

                $sorgu = "SELECT * FROM arac";
                $sonuc = $baglanti->query($sorgu);

                if ($sonuc->num_rows > 0) {
                    echo '<div>';
                    echo '<h2 class="mt-4 mb-3">Araçlar Listesi</h2>';
                    echo '<table class="table table-hover">';
                    echo '<thead>';
                    echo '<tr>';
                    echo '<th scope="col">Kapı Numarası</th>';
                    echo '<th scope="col">Araç Plaka</th>';
                    echo '<th scope="col">Düzenle</th>';
                    echo '</tr>';
                    echo '</thead>';
                    echo '<tbody>';

                    while ($row = $sonuc->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td>' . $row["KapiNo"] . '</td>';
                        echo '<td>' . $row["Plaka"] . '</td>';
                        echo '<td>';
                        echo '<button class="btn btn-primary btn-sm duzenle-btn" data-toggle="modal" data-target="#duzenleModal" data-arac-id="' . $row["ID"] . '" data-kapi-no="' . $row["KapiNo"] . '" data-plaka="' . $row["Plaka"] . '">Düzenle</button>';
                        echo '</td>';
                        echo '</tr>';
                    }

                    echo '</tbody>';
                    echo '</table>';
                    echo '</div>';
                } else {
                    echo '<p>Henüz hiç araç eklenmemiş.</p>';
                }

                $baglanti->close();
                ?>
                <div class="modal fade" id="duzenleModal" tabindex="-1" role="dialog" aria-labelledby="duzenleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="duzenleModalLabel">Araç Bilgilerini Düzenle</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="aracDuzenleForm">
                                    <input type="hidden" id="aracId" name="arac_id" value="">
                                    <div class="form-group">
                                        <label for="yeniKapiNo">Yeni Kapı Numarası:</label>
                                        <input type="text" class="form-control" id="yeniKapiNo" name="yeni_kapi_no" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="yeniPlaka">Yeni Plaka:</label>
                                        <input type="text" class="form-control" id="yeniPlaka" name="yeni_plaka" required>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                                <button type="button" class="btn btn-primary" id="aracDuzenleBtn">Düzenle</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                <script>
                    $(document).ready(function() {
                        $(".duzenle-btn").click(function() {
                            var aracId = $(this).data("arac-id");
                            var kapiNo = $(this).data("kapi-no");
                            var plaka = $(this).data("plaka");
                            $("#aracId").val(aracId);
                            $("#yeniKapiNo").val(kapiNo);
                            $("#yeniPlaka").val(plaka);
                        });

                        $("#aracDuzenleBtn").click(function() {
                            var aracId = $("#aracId").val();
                            var yeniKapiNo = $("#yeniKapiNo").val();
                            var yeniPlaka = $("#yeniPlaka").val();

                            $.ajax({
                                url: "arac_duzenle.php",
                                method: "POST",
                                data: {
                                    arac_id: aracId,
                                    yeni_kapi_no: yeniKapiNo,
                                    yeni_plaka: yeniPlaka
                                },
                                success: function(response) {
                                    if (response == "success") {
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
                <h2 class="mb-4">Araç Ekle</h2>
                <form id="aracForm" action="araceklesonuc.php" method="POST">
                    <div class="form-group">
                        <label class="mt-3" for="kapino">Kapı Numarası:</label>
                        <input type="text" class="form-control w-25" id="kapino" name="kapino" required>

                        <label class="mt-3" for="plakano">Araç Plaka:</label>
                        <input type="text" class="form-control w-25" id="plakano" name="plakano" required>
                    </div>
                    <button type="submit" class="btn btn-success mt-2">Kaydet</button>
                </form>
            </div>

            <script>

                $("#aracForm").submit(function(e) {
                    e.preventDefault(); // Sayfanın yeniden yüklenmesini engelle

                    $.ajax({
                        type: "POST",
                        url: $(this).attr("action"),
                        data: $(this).serialize(),
                        success: function(response) {
                            // İşlem başarılı olduğunda sayfayı yenile
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            // Hata durumunda gereken işlemleri yapabilirsiniz
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