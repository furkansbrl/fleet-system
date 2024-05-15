<?php
include("ayar.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $gorevID = $_POST["gorev_id"];
    $yeniDurum = $_POST["yeni_durum"];

    $durumGuncelleSorgu = "UPDATE gorev SET DurumID = ? WHERE ID = ?";
    
    if ($stmt = $baglanti->prepare($durumGuncelleSorgu)) {
        $stmt->bind_param("si", $yeniDurum, $gorevID);

        if ($stmt->execute()) {
            $durumAdiSorgu = "SELECT DurumAdi FROM durumlar WHERE DurumID = $yeniDurum";
            $durumAdiSonuc = $baglanti->query($durumAdiSorgu);
            
            if ($durumAdiSonuc->num_rows > 0) {
                $durumAdi = $durumAdiSonuc->fetch_assoc()["DurumAdi"];
                echo $durumAdi;
            } else {
                echo "Bilinmeyen Durum";
            }
        } else {
            echo "Durum güncelleme hatası: " . $stmt->error;
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
