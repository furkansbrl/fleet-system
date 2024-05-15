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
    .element-selector {
    cursor: pointer;
}
    .table-cell-link {
    cursor: pointer;
}   
    .table-cell-link:hover {
    background-color: #00bfff;
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
                                <li><span>Görevler</span></li>
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
                                <h4 class="header-title">Görev Listesi</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table class="table table-hover progress-table text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">HAT</th>
                                                    <th scope="col">GÜZERGAH</th>
                                                    <th scope="col">ŞOFÖR SİCİL NO</th>
                                                    <th scope="col">KAPI NO</th>
                                                    <th scope="col">SAAT</th>
                                                    <th scope="col">DURUM</th>
                                                    <th scope="col">DEPAR</th>
                                                    <th scope="col">MESAJ</th>
                                                    <th scope="col">ARIZA</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include("ayar.php");

                                                if ($baglanti->connect_error) {
                                                    die("Veritabanı Bağlantı Hatası: " . $baglanti->connect_error);
                                                }

                                                if (isset($_GET["hat_id"])) {
                                                    $hatID = $_GET["hat_id"];

                                                    $sql = "SELECT g.*, h.HatKod 
        FROM gorev g
        INNER JOIN hat h ON g.HatID = h.HatID
        WHERE g.HatID = $hatID";

                                                    $result = $baglanti->query($sql);

                                                    if ($result->num_rows > 0) {
                                                        while ($row = $result->fetch_assoc()) {
                                                            echo "<tr>";
                                                            echo "<td>" . $row["HatKod"] . "</td>";
                                                            echo "<td>" . $row["GuzergahID"] . "</td>";
                                                            echo "<td>" . $row["SoforID"] . "</td>";
                                                            echo "<td>" . $row["AracID"] . "</td>";
                                                            $saatDakika = substr($row["SaatID"], 0, 5);
                                                            echo "<td>" . $saatDakika . "</td>";

                                                            $durumID = $row["DurumID"];
                                                            $durumSorgu = "SELECT DurumAdi FROM durumlar WHERE DurumID = $durumID";
                                                            $durumSonuc = $baglanti->query($durumSorgu);
                                                            if ($durumSonuc->num_rows > 0) {
                                                                $durumCikti = $durumSonuc->fetch_assoc();

                                                                $durumHarf = $durumCikti["DurumAdi"];

                                                                echo "<td class='element-selector table-cell-link'><span class='durum-degistir' data-toggle='modal' data-target='#durumModal' data-gorev-id='" . $row["ID"] . "' data-durum='" . $durumID . "'>" . $durumCikti["DurumAdi"] . "</span></td>";
                                                            } else {
                                                                echo "<td>-</td>";
                                                            }

                                                            echo "<td>
                                                            <button class='btn btn-primary btn-sm depo-ver-btn'
                                                            data-toggle='modal'
                                                            data-target='#deparModal'
                                                            data-gorev-id='" . $row["ID"] . "'
                                                            data-hat-id='" . $row["HatID"] . "'
                                                            data-guzergah-kod='" . $row["GuzergahID"] . "'
                                                            data-saat-id='" . $saatDakika . "'>Depar Ver</button>
                                                    
  </td>";

                                                            echo "<td>
        <button class='btn btn-warning btn-sm mesaj-gonder-btn'
                data-toggle='modal'
                data-target='#mesajGonderModal'
                data-gorev-id='" . $row["ID"] . "'
                data-kapino='" . $row["AracID"] . "'>Mesaj Gönder</button>
      </td>";



                                                            echo "<td>
<button class='btn btn-danger btn-sm ariza-ac-btn'
        data-toggle='modal'
        data-target='#arizaAcModal'
        data-gorev-id='" . $row["ID"] . "'
        data-arac-id='" . $row["AracID"] . "'>Arıza Aç</button>
</td>";



                                                            echo "</tr>";
                                                        }
                                                    } else {
                                                        echo "<tr><td colspan='9'>Görev Kaydı Bulunamadı !</td></tr>";
                                                    }
                                                } else {
                                                    echo "<tr><td colspan='9'>Hat ID belirtilmemiş.</td></tr>";
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

            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script>

                /* Durum Güncelleme JS */
                $(document).ready(function() {
                    $(".durum-degistir").click(function() {
                        var gorevId = $(this).data("gorev-id");
                        var durumlar = $(this).data("durumlar");
                        $("#gorevId").val(gorevId);
                        $("#durumSelect").val(durumlar);
                    });

                    $("#durumGuncelleBtn").click(function() {
                        var gorevId = $("#gorevId").val();
                        var durumlar = $("#durumSelect").val();

                        $.ajax({
                            url: "durum_guncelle.php",
                            method: "POST",
                            data: {
                                gorev_id: gorevId,
                                yeni_durum: durumlar
                            },
                            success: function(response) {
                                if (response !== "") {
                                    $(".durum-degistir[data-gorev-id='" + gorevId + "']").text(response);
                                    $("#durumModal").modal("show");
                                    location.reload();
                                } else {
                                    alert("Durum güncelleme hatası: Bilinmeyen durum");
                                }
                            },
                            error: function(xhr, status, error) {
                                alert("Durum güncelleme hatası: " + error);
                            }
                        });
                    });
                });
            </script>

            <script>
                /* Depar Verme JS */
                $(document).ready(function() {
        $(".depo-ver-btn").click(function() {
            var gorevId = $(this).data("gorev-id");
            var guzergahKod = $(this).data("guzergah-kod");
            var saatId = $(this).data("saat-id");

            $("#gorevId").val(gorevId);
            $("#guzergahKod").val(guzergahKod);
            $("#saatId").val(saatId);

            $("#deparModal").modal("show");
        });

        $("#deparVerBtn").click(function() {
            var gorevId = $("#gorevId").val();
            var guzergahKod = $("#guzergahKod").val();
            var saatId = $("#saatId").val();


            $.ajax({
                url: "depar_guncelle.php",
                method: "POST",
                data: {
                    gorev_id: gorevId,
                    guzergah_kod: guzergahKod,
                    saat_id: saatId
                },
                success: function(response) {
                    if (response == "success") {
                        $("#deparModal").modal("hide");
                        location.reload();
                    } else {
                        alert("Depar Verme işlemi sırasında bir hata oluştu.");
                    }
                },
                error: function(xhr, status, error) {
                    alert("Hata: " + error);
                }
            });
        });
    });
            </script>

            <script>
                /* Mesaj Gönder JS */
                $(document).ready(function() {
                    $(document).on("click", ".mesaj-gonder-btn", function() {
                        var gorevID = $(this).data("gorev-id");
                        var kapino = $(this).data("kapino");

                        $("#kapino").val(kapino);
                        $("#gorevID").val(gorevID);
                        $("#mesajGonderModal").modal("show");
                    });

                    $("#mesajGonderForm").submit(function(e) {
                        e.preventDefault();
                        var kapino = $("#kapino").val();
                        var mesaj = $("#mesaj").val();
                        var gorevID = $("#gorevID").val();

                        $.ajax({
                            url: "mesaj_gonder.php", // Mesajı kaydedecek PHP dosyasının yolu
                            method: "POST",
                            data: {
                                kapino: kapino,
                                mesaj: mesaj,
                                gorevID: gorevID
                            },
                            success: function(response) {
                                $("#mesajGonderModal").modal("hide");
                                location.reload(); // Sayfayı yenile
                            },
                            error: function(xhr, status, error) {
                                console.error(error);
                            }
                        });
                    });
                });
            </script>

            <script>
                /* Arıza Aç JS */
                $(document).ready(function() {
                    $(document).on("click", ".ariza-ac-btn", function() {
                        var gorevID = $(this).data("gorev-id");
                        var aracID = $(this).data("arac-id");

                        $("#aracID").val(aracID);
                        $("#gorevID").val(gorevID);

                        $("#arizaAcModal").modal("show");
                    });

                    $("#arizaAcForm").submit(function(e) {
                        e.preventDefault();

                        var aracID = $("#aracID").val();
                        var ariza = $("#ariza").val();
                        var gorevID = $("#gorevID").val();

                        $.ajax({
                            url: "ariza_ac.php",
                            method: "POST",
                            data: {
                                aracID: aracID,
                                ariza: ariza,
                                gorevID: gorevID
                            },
                            success: function(response) {
                                $("#arizaAcModal").modal("hide");
                                location.reload();
                            },
                            error: function(xhr, status, error) {
                                console.error(error);
                            }
                        });
                    });
                });
            </script>

            <!-- Durum Güncelleme -->
            <div class="modal fade" id="durumModal" tabindex="-1" role="dialog" aria-labelledby="durumModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="durumModalLabel">Durumu Güncelle</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="durum_guncelle.php" method="POST" id="durumForm">
                                <input type="hidden" id="gorevId" name="gorev_id" value="">
                                <label for="durumSelect">Yeni Durumu Seçin:</label>
                                <select id="durumSelect" name="durumlar" class="form-control">
                                    <option value="1">B</option>
                                    <option value="2">A</option>
                                    <option value="3">T</option>
                                    <option value="4">I</option>
                                </select>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                            <button type="button" class="btn btn-primary" id="durumGuncelleBtn">Güncelle</button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Depar Verme -->
<div class="modal fade" id="deparModal" tabindex="-1" role="dialog" aria-labelledby="deparModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="deparModalLabel">Depar Ver</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="depar_guncelle.php" method="POST" id="deparForm">
                    <input type="hidden" id="gorevId" name="gorev_id">
                    <div class="form-group">
                        <label for="guzergahKod">Güzergah Kodu:</label>
                        <input type="text" class="form-control" id="guzergahKod" name="guzergah_kod">
                    </div>
                    <div class="form-group">
                        <label for="saatId">Saat:</label>
                        <input type="time" class="form-control" id="saatId" name="saat_id">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
                <button type="button" class="btn btn-primary" id="deparVerBtn">Depar Ver</button>
            </div>
        </div>
    </div>
</div>

            <!-- Mesaj Gönder -->
            <div class="modal fade" id="mesajGonderModal" tabindex="-1" aria-labelledby="mesajGonderModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="mesajGonderModalLabel">Mesaj Gönder</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Kapat">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form id="mesajGonderForm">
                                <div class="form-group">
                                    <label for="kapino">Kapı No:</label>
                                    <input type="text" class="form-control" id="kapino" name="kapino" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="mesaj">Mesaj İçeriği:</label>
                                    <textarea class="form-control" id="mesaj" name="mesaj" rows="4" required></textarea>
                                </div>
                                <input type="hidden" id="gorevID" name="gorevID">
                                <button type="submit" class="btn btn-warning">Mesaj Gönder</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Arıza Aç -->
            <div class="modal fade" id="arizaAcModal" tabindex="-1" aria-labelledby="arizaAcModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="arizaAcModalLabel">Arıza Aç</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Kapat">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="ariza_ac.php" method="POST" id="arizaAcForm">
                                <div class="form-group">
                                    <label for="aracID">Kapı No:</label>
                                    <input type="text" class="form-control" id="aracID" name="aracID" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="ariza">Arıza İçeriği:</label>
                                    <textarea class="form-control" id="ariza" name="ariza" rows="4" required></textarea>
                                </div>
                                <input type="hidden" id="gorevID" name="gorevID">

                                <button type="submit" class="btn btn-danger">Arıza Aç</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


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