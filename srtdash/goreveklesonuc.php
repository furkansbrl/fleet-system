<?php
include("ayar.php");

if ($baglanti->connect_error) {
    die("Veritabanı bağlantı hatası: " . $baglanti->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $GelenHat = $_POST["hat"];
    $GelenGuzergah = $_POST["guzergah"];
    $GelenKapiNo = $_POST["kapino"];
    $GelenSaat = $_POST["saat"];
    $GelenSicil = $_POST["sicilno"];
    $DurumID = 1;

    include("ayar.php");

    $hatIDSorgu = "SELECT HatID FROM hat WHERE HatKod = ?";
    $stmt = $baglanti->prepare($hatIDSorgu);
    $stmt->bind_param("s", $GelenHat);
    $stmt->execute();
    $stmt->bind_result($HatID);
    $stmt->fetch();
    $stmt->close();

    $gorevEkleSorgu = "INSERT INTO gorev (HatID, GuzergahID, AracID, SaatID, SoforID, DurumID, KayitZamaniID)
                       VALUES (?, ?, ?, ?, ?, ?, NOW())";
    $stmt = $baglanti->prepare($gorevEkleSorgu);
    $stmt->bind_param("ssssss", $HatID, $GelenGuzergah, $GelenKapiNo, $GelenSaat, $GelenSicil, $DurumID);

    if ($stmt->execute()) {
        header("Refresh: 0; gorevekle.php");
    } else {
        header('Location:404.php');
    }

    $stmt->close();
    $baglanti->close();
} 
?>