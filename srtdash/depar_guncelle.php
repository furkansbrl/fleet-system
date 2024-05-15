<?php
include("ayar.php");

$gorevId = $_POST["gorev_id"];
$guzergahKod = $_POST["guzergah_kod"];
$saatId = $_POST["saat_id"];

$query = "UPDATE gorev SET GuzergahID = '$guzergahKod', SaatID = '$saatId' WHERE ID = '$gorevId'";
$result = $baglanti->query($query);

if ($result) {
    echo "success";
} else {
    echo "error";
}
$baglanti->close();
?>
