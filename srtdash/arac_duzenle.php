<?php
include("ayar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $aracId = $_POST["arac_id"];
    $yeniKapiNo = $_POST["yeni_kapi_no"];
    $yeniPlaka = $_POST["yeni_plaka"];

    $duzenleSorgu = "UPDATE arac SET KapiNo = ?, Plaka = ? WHERE ID = ?";
    if ($stmt = $baglanti->prepare($duzenleSorgu)) {
        $stmt->bind_param("ssi", $yeniKapiNo, $yeniPlaka, $aracId);

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