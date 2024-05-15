<?php
include("ayar.php");

if (isset($_POST["gorevID"]) && isset($_POST["ariza"])) {
    $gorevID = $_POST["gorevID"];
    $ariza = $_POST["ariza"];

    $arizaEkleSorgu = "INSERT INTO ariza (AracID, Icerik, KayitZamani) 
                       SELECT AracID, ?, NOW() FROM gorev WHERE ID = ?";
    $stmt = $baglanti->prepare($arizaEkleSorgu);
    $stmt->bind_param("si", $ariza, $gorevID);

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
