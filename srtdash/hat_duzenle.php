<?php
include("ayar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hatId = $_POST["hat_id"];
    $yeniHatKod = $_POST["yeni_hat_kod"];
    $yeniHatAd = $_POST["yeni_hat_ad"];

    $duzenleSorgu = "UPDATE hat SET HatKod = ?, HatAd = ? WHERE HatID = ?";
    if ($stmt = $baglanti->prepare($duzenleSorgu)) {
        $stmt->bind_param("ssi", $yeniHatKod, $yeniHatAd, $hatId);

        if ($stmt->execute()) {
            echo "success";
        } else {
            echo "Hata: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Sorgu hazırlama hatası: " . $baglanti->error;
    }
} else {
    echo "Geçersiz istek.";
}
$baglanti->close();
?>