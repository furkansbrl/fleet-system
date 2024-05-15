<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hatkod = $_POST["hatkod"];
    $hatad = $_POST["hatad"];

    include("ayar.php");

    if ($baglanti->connect_error) {
        echo "Veritabanı bağlantısı başarısız: " . $baglanti->connect_error;
    } else {
        $insert_query = "INSERT INTO hat (HatKod, HatAd) VALUES (?, ?)";
        $stmt = $baglanti->prepare($insert_query);

        if ($stmt->bind_param("ss", $hatkod, $hatad) && $stmt->execute()) {
            $HatID = $stmt->insert_id;

            echo "Hat eklendi!";
        } else {
            echo "Hat eklenirken bir hata oluştu: " . $stmt->error;
        }
        $stmt->close();
        $baglanti->close();
    }
}
?>
