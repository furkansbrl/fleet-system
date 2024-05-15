<?php
include("ayar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $GelenSicilNo = $_POST["sicilno"];
    $GelenAd = $_POST["ad"];
    $GelenSoyad = $_POST["soyad"];
    $GelenTelNo = $_POST["telno"];
    
    $sql = "INSERT INTO sofor (SicilNo, Ad, Soyad, TelNo) VALUES (?, ?, ?, ?)";
    $ekleStmt = $baglanti->prepare($sql);
    
    if ($ekleStmt) {
        $ekleStmt->bind_param("ssss", $GelenSicilNo, $GelenAd, $GelenSoyad, $GelenTelNo);
        if ($ekleStmt->execute()) {
            echo "Şoför başarıyla eklendi.";
        } else {
            echo "Veri eklerken hata oluştu: " . $ekleStmt->error;
        }
        $ekleStmt->close();
    } else {
        echo "Sorgu hatası: " . $baglanti->error;
    }
    
    $baglanti->close();
}
?>