<?php

include("ayar.php");

$GelenKapiNo = $_POST["kapino"];
$GelenPlakaNo = $_POST["plakano"];

$EkleSorgusu = "INSERT INTO arac (KapiNo, Plaka) VALUES (?,?)";

$AracSql = $baglanti->prepare($EkleSorgusu);
$AracSql->bind_param("ss", $GelenKapiNo, $GelenPlakaNo);

if ($AracSql->execute()) {
    echo "Araç başarıyla eklendi.";
} else {
    echo "Araç eklenirken bir hata oluştu."  . $AracSql->error;
}

$AracSql->close();
$baglanti->close();
?>