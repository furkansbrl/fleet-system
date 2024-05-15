<?php
include("ayar.php");

if (isset($_POST["gorevID"]) && isset($_POST["mesaj"])) {
    $gorevID = $_POST["gorevID"];
    $mesaj = $_POST["mesaj"];
    $mesajEkleSorgu = "INSERT INTO mesaj (AracID, Icerik, KayitZamani, OkunduOkunmadi) 
                       SELECT AracID, ?, NOW(), 0 FROM gorev WHERE ID = ?";
    $stmt = $baglanti->prepare($mesajEkleSorgu);
    $stmt->bind_param("si", $mesaj, $gorevID);

    if ($stmt->execute()) {
        echo "success";
    } else {
        echo "error";
    }

    $stmt->close();
} else {
    echo "missing_params";
}
$baglanti->close();
?>
