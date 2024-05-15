<?php
include("ayar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $soforId = $_POST["sofor_id"];
    $yeniSicilNo = $_POST["yeni_sicil_no"];
    $yeniAd = $_POST["yeni_ad"];
    $yeniSoyad = $_POST["yeni_soyad"];
    $yeniTelNo = $_POST["yeni_tel_no"];

    $duzenleSorgu = "UPDATE sofor SET SicilNo = ?, Ad = ?, Soyad = ?, TelNo = ? WHERE ID = ?";
    if ($stmt = $baglanti->prepare($duzenleSorgu)) {
        $stmt->bind_param("ssssi", $yeniSicilNo, $yeniAd, $yeniSoyad, $yeniTelNo, $soforId);

        if ($stmt->execute()) {
            echo "success";
        } else {
            echo "Düzenleme hatası: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Sorgu hazırlama hatası: " . $baglanti->error;
    }
}
$baglanti->close();
?>