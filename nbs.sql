-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 18 Kas 2020, 20:22:46
-- Sunucu sürümü: 10.4.13-MariaDB
-- PHP Sürümü: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `nbs`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bolumler`
--

CREATE TABLE `bolumler` (
  `id` int(11) NOT NULL,
  `bolumadi` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `bolumler`
--

INSERT INTO `bolumler` (`id`, `bolumadi`) VALUES
(1, 'Bilgisayar Mühendisliği'),
(2, 'Elektrik Mühendisliği'),
(3, 'Makina Mühendisliği'),
(4, 'Güzel Sanatlar');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanici`
--

CREATE TABLE `kullanici` (
  `id` int(11) NOT NULL,
  `kuladi` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sifre` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mail` varchar(20) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `kullanici`
--

INSERT INTO `kullanici` (`id`, `kuladi`, `sifre`, `mail`) VALUES
(1, 'Dogusd', '1453', 'dogusdeniz.3558@gmai'),
(3, 'gokselb', '3550', 'gokselb@gmail.com'),
(8, 'GoldenOoze', '14531453', 'golden@ooze.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ogrenciler`
--

CREATE TABLE `ogrenciler` (
  `id` int(11) NOT NULL,
  `ogrenci_no` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ogrenci_adi` varchar(250) COLLATE utf8_unicode_ci NOT NULL,
  `ogrenci_bolumu` varchar(250) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Tablo döküm verisi `ogrenciler`
--

INSERT INTO `ogrenciler` (`id`, `ogrenci_no`, `ogrenci_adi`, `ogrenci_bolumu`) VALUES
(1, '2217', 'Doğuş', 'Bilgisayar Mühendisliği'),
(2, '6710', 'DENİZ', 'Elektrik Mühendisliği'),
(3, '1089', 'seda', 'Güzel Sanatlar'),
(4, '5648', 'Göksel', 'Bilgisayar Mühendisliği'),
(5, '1683', 'Mehmet', 'Makina Mühendisliği'),
(6, '1234', 'ali', 'Bilgisayar Mühendisliği'),
(7, '1197', 'velican', 'Güzel Sanatlar'),
(8, '6598', 'mervenur', 'Güzel Sanatlar'),
(9, '4473', 'ayşe selin', 'Makina Mühendisliği'),
(10, '6913', 'Mahmut ', 'Elektrik Mühendisliği'),
(11, '8079', 'alicanteke', 'Elektrik Mühendisliği'),
(12, '8706', 'Gülşen', 'Makina Mühendisliği'),
(16, '7764', 'MURTAZAAA', 'Makina Mühendisliği'),
(17, '3435', 'Zübeyde', 'Güzel Sanatlar'),
(18, '6046', 'Zeynep', 'Bilgisayar Mühendisliği');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `bolumler`
--
ALTER TABLE `bolumler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanici`
--
ALTER TABLE `kullanici`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `ogrenciler`
--
ALTER TABLE `ogrenciler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `bolumler`
--
ALTER TABLE `bolumler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `kullanici`
--
ALTER TABLE `kullanici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Tablo için AUTO_INCREMENT değeri `ogrenciler`
--
ALTER TABLE `ogrenciler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
