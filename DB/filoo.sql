-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 07 Eyl 2023, 09:53:28
-- Sunucu sürümü: 10.4.28-MariaDB
-- PHP Sürümü: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `filoo`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `arac`
--

CREATE TABLE `arac` (
  `ID` int(11) NOT NULL,
  `KapiNo` varchar(50) NOT NULL,
  `Plaka` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `arac`
--

INSERT INTO `arac` (`ID`, `KapiNo`, `Plaka`) VALUES
(1, 'O-3433', '34 TN 222'),
(5, 'M-2455', '34 TP 7885');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ariza`
--

CREATE TABLE `ariza` (
  `ID` int(11) NOT NULL,
  `AracID` varchar(50) NOT NULL,
  `Icerik` text NOT NULL,
  `KayitZamani` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `ariza`
--

INSERT INTO `ariza` (`ID`, `AracID`, `Icerik`, `KayitZamani`) VALUES
(1, 'O-3433', 'arıza', '2023-09-04 09:40:40'),
(2, 'O-1043', 'motor', '2023-09-04 09:40:53'),
(3, 'K-3496', 'klima\n', '2023-09-04 09:41:04'),
(4, 'M-4565', 'cam kırık', '2023-09-04 09:41:23');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `durumlar`
--

CREATE TABLE `durumlar` (
  `DurumID` int(11) NOT NULL,
  `DurumAdi` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `durumlar`
--

INSERT INTO `durumlar` (`DurumID`, `DurumAdi`) VALUES
(1, 'B'),
(2, 'A'),
(3, 'T'),
(4, 'I');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gorev`
--

CREATE TABLE `gorev` (
  `ID` int(11) NOT NULL,
  `HatID` int(11) NOT NULL,
  `GuzergahID` varchar(50) NOT NULL,
  `AracID` varchar(50) NOT NULL,
  `SaatID` time NOT NULL,
  `SoforID` int(11) NOT NULL,
  `DurumID` int(11) NOT NULL,
  `KayitZamaniID` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `gorev`
--

INSERT INTO `gorev` (`ID`, `HatID`, `GuzergahID`, `AracID`, `SaatID`, `SoforID`, `DurumID`, `KayitZamaniID`) VALUES
(2, 3, 'KM25_D_D_185', 'O-3498', '12:20:00', 611255, 1, '2023-08-23'),
(3, 3, 'KM25_G_D_079', 'M-4565', '10:20:00', 455698, 2, '2023-08-24'),
(6, 4, 'E10_D_D_079', 'M-2443', '06:00:00', 345566, 2, '2023-08-28'),
(7, 1, '10E_D_D_0778', 'O-3433', '14:50:00', 434456, 3, '2023-08-28'),
(8, 4, 'E10_G_D_851', 'O-1010', '15:55:00', 654587, 3, '2023-08-28'),
(9, 3, 'KM25_G_D', 'K-3222', '15:50:00', 654488, 2, '2023-08-28'),
(10, 3, 'KM25_G_D', 'K-3356', '16:05:00', 654875, 2, '2023-08-28'),
(11, 3, 'KM25_G_D_089', 'K-3322', '00:00:00', 654843, 1, '2023-08-28'),
(12, 3, 'KM25_G_D', 'K-3375', '13:05:00', 654885, 1, '2023-08-28'),
(13, 3, 'KM25_G_D', 'K-3375', '13:05:00', 654885, 2, '2023-08-28'),
(14, 3, 'KM25_G_D', 'K-3375', '13:05:00', 654885, 2, '2023-08-28'),
(15, 3, 'KM25_G_D', 'K-3375', '13:05:00', 654885, 2, '2023-08-28'),
(16, 3, 'KM25_G_D', 'K-3312', '12:05:00', 658585, 1, '2023-08-28'),
(19, 1, '10E_G_D_80', 'K-3446', '08:00:00', 458998, 4, '2023-08-29');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `guzergah`
--

CREATE TABLE `guzergah` (
  `GuzergahID` int(11) NOT NULL,
  `GuzergahKod` varchar(50) NOT NULL,
  `Yon` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `guzergah`
--

INSERT INTO `guzergah` (`GuzergahID`, `GuzergahKod`, `Yon`) VALUES
(1, 'DF-12-KJ', 0),
(2, 'EF-11-KL', 0),
(3, 'DF-12-KJ', 0),
(4, 'KF-12-KJ', 0),
(5, 'DG-12-FD', 0),
(6, 'ER-90-FD', 0),
(7, '99_G_D(12-32)', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `hat`
--

CREATE TABLE `hat` (
  `HatID` int(11) NOT NULL,
  `HatKod` varchar(50) NOT NULL,
  `HatAd` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `hat`
--

INSERT INTO `hat` (`HatID`, `HatKod`, `HatAd`) VALUES
(1, '10E', 'Esatpaşa - Kadıköy'),
(3, 'KM25', 'Kartal - Yenişehir'),
(4, 'E10', 'Kadıköy - Sabiha Gökçen'),
(14, '78A', 'Unkapı - Ataköy');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `mesaj`
--

CREATE TABLE `mesaj` (
  `ID` int(11) NOT NULL,
  `AracID` varchar(50) NOT NULL,
  `Icerik` text NOT NULL,
  `KayitZamani` datetime NOT NULL,
  `OkunduOkunmadi` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `mesaj`
--

INSERT INTO `mesaj` (`ID`, `AracID`, `Icerik`, `KayitZamani`, `OkunduOkunmadi`) VALUES
(1, 'O-3433', 'mesaj gitti mi ?\n', '2023-09-04 09:37:34', 0),
(2, 'O-3498', 'deneme 123', '2023-09-04 09:37:54', 0),
(3, 'M-2443', 'depar atıldı', '2023-09-04 09:39:09', 0),
(4, 'K-3496', 'mesaj\n', '2023-09-04 09:39:42', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sofor`
--

CREATE TABLE `sofor` (
  `ID` int(11) NOT NULL,
  `SicilNo` varchar(50) NOT NULL,
  `Ad` varchar(50) NOT NULL,
  `Soyad` varchar(50) NOT NULL,
  `TelNo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Tablo döküm verisi `sofor`
--

INSERT INTO `sofor` (`ID`, `SicilNo`, `Ad`, `Soyad`, `TelNo`) VALUES
(2, '222545', 'Şeref', 'Haktanır', '5564241232');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `arac`
--
ALTER TABLE `arac`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `KapiNo` (`KapiNo`),
  ADD UNIQUE KEY `Plaka` (`Plaka`);

--
-- Tablo için indeksler `ariza`
--
ALTER TABLE `ariza`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `durumlar`
--
ALTER TABLE `durumlar`
  ADD PRIMARY KEY (`DurumID`);

--
-- Tablo için indeksler `gorev`
--
ALTER TABLE `gorev`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `HatID` (`HatID`),
  ADD KEY `DurumID` (`DurumID`);

--
-- Tablo için indeksler `guzergah`
--
ALTER TABLE `guzergah`
  ADD PRIMARY KEY (`GuzergahID`);

--
-- Tablo için indeksler `hat`
--
ALTER TABLE `hat`
  ADD PRIMARY KEY (`HatID`);

--
-- Tablo için indeksler `mesaj`
--
ALTER TABLE `mesaj`
  ADD PRIMARY KEY (`ID`);

--
-- Tablo için indeksler `sofor`
--
ALTER TABLE `sofor`
  ADD PRIMARY KEY (`ID`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `arac`
--
ALTER TABLE `arac`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Tablo için AUTO_INCREMENT değeri `ariza`
--
ALTER TABLE `ariza`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `gorev`
--
ALTER TABLE `gorev`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Tablo için AUTO_INCREMENT değeri `guzergah`
--
ALTER TABLE `guzergah`
  MODIFY `GuzergahID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `hat`
--
ALTER TABLE `hat`
  MODIFY `HatID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Tablo için AUTO_INCREMENT değeri `mesaj`
--
ALTER TABLE `mesaj`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `sofor`
--
ALTER TABLE `sofor`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `gorev`
--
ALTER TABLE `gorev`
  ADD CONSTRAINT `gorev_ibfk_2` FOREIGN KEY (`HatID`) REFERENCES `hat` (`HatID`),
  ADD CONSTRAINT `gorev_ibfk_3` FOREIGN KEY (`DurumID`) REFERENCES `durumlar` (`DurumID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
