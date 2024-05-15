<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "filoo";

try {
    $baglanti = new mysqli($servername, $username, $password, $dbname);
    
    if ($baglanti->connect_error) {
        throw new Exception("Veritabanı bağlantı hatası: " . $baglanti->connect_error);
    }
} catch (Exception $e) {
    echo "Hata: " . $e->getMessage();
}

?>
