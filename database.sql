-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost
-- Üretim Zamanı: 04 Kas 2019, 17:57:09
-- Sunucu sürümü: 10.4.6-MariaDB
-- PHP Sürümü: 7.3.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `cizikcd`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `site_url` varchar(250) NOT NULL,
  `site_baslik` varchar(250) NOT NULL,
  `site_desc` varchar(300) NOT NULL,
  `site_keyw` varchar(300) NOT NULL,
  `site_tema` varchar(150) NOT NULL,
  `site_durum` int(11) NOT NULL,
  `tema_sayfalama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ayarlar`
--

INSERT INTO `ayarlar` (`site_url`, `site_baslik`, `site_desc`, `site_keyw`, `site_tema`, `site_durum`, `tema_sayfalama`) VALUES
('http://localhost/cizikcd', 'Simple Blog', 'Description', 'php, css, html,jquery, javascript', 'temaV1', 1, '10|10|10|10');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE `kategoriler` (
  `kategori_id` int(11) NOT NULL,
  `kategori_adi` varchar(200) NOT NULL,
  `kategori_link` varchar(200) NOT NULL,
  `kategori_desc` varchar(250) NOT NULL,
  `kategori_keyw` varchar(250) NOT NULL,
  `kategori_anasayfa_konu` varchar(100) NOT NULL,
  `kategori_full_konu` varchar(100) NOT NULL,
  `kategori_tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`kategori_id`, `kategori_adi`, `kategori_link`, `kategori_desc`, `kategori_keyw`, `kategori_anasayfa_konu`, `kategori_full_konu`, `kategori_tarih`) VALUES
(5, 'PHP', 'php', 'php kategorisi', 'php', '', '', '2013-01-30 11:48:30'),
(6, 'Css', 'css', 'css kategorisi', 'css', '', '', '2013-02-06 16:39:58'),
(7, 'Jquery', 'jquery', 'jquery kategorisi', 'jquery', '', '', '2013-02-06 16:40:40');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `konular`
--

CREATE TABLE `konular` (
  `konu_id` int(11) NOT NULL,
  `konu_baslik` varchar(300) NOT NULL,
  `konu_link` varchar(300) NOT NULL,
  `konu_aciklama` text NOT NULL,
  `konu_etiket` varchar(500) NOT NULL,
  `konu_ekleyen` int(11) NOT NULL,
  `konu_tarih` timestamp NOT NULL DEFAULT current_timestamp(),
  `konu_kategori` int(11) NOT NULL,
  `konu_onay` int(11) NOT NULL,
  `konu_anasayfa` int(11) NOT NULL,
  `konu_hit` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `konular`
--

INSERT INTO `konular` (`konu_id`, `konu_baslik`, `konu_link`, `konu_aciklama`, `konu_etiket`, `konu_ekleyen`, `konu_tarih`, `konu_kategori`, `konu_onay`, `konu_anasayfa`, `konu_hit`) VALUES
(13, 'Deneme baslik', 'deneme-baslik', '<p>\r\n	awdwdadawd</p>', 'deneme1,deneme2,deneme3', 1, '2019-11-04 13:29:37', 6, 1, 1, 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `reklamlar`
--

CREATE TABLE `reklamlar` (
  `reklam_id` int(11) NOT NULL,
  `reklam_adi` varchar(200) NOT NULL,
  `reklam_text` text NOT NULL,
  `reklam_tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `sayfalar`
--

CREATE TABLE `sayfalar` (
  `sayfa_id` int(11) NOT NULL,
  `sayfa_baslik` varchar(250) NOT NULL,
  `sayfa_link` varchar(250) NOT NULL,
  `sayfa_icerik` text NOT NULL,
  `sayfa_tarih` timestamp NOT NULL DEFAULT current_timestamp(),
  `sayfa_hit` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `sayfalar`
--

INSERT INTO `sayfalar` (`sayfa_id`, `sayfa_baslik`, `sayfa_link`, `sayfa_icerik`, `sayfa_tarih`, `sayfa_hit`) VALUES
(2, 'HAKKIMDA', 'hakkimda', 'Bu Bir Hakkımda Sayfasıdır.', '2013-02-04 20:51:20', 0),
(3, 'Ä°letiÅŸim', 'iletisim', 'mustafa.goktas07@gmail.com', '2013-02-04 20:53:31', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `uye_id` int(11) NOT NULL,
  `uye_kadi` varchar(200) NOT NULL,
  `uye_link` varchar(200) NOT NULL,
  `uye_sifre` varchar(250) NOT NULL,
  `uye_adi` varchar(250) NOT NULL,
  `uye_eposta` varchar(200) NOT NULL,
  `uye_tarih` timestamp NOT NULL DEFAULT current_timestamp(),
  `uye_rutbe` int(11) NOT NULL,
  `uye_onay` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `uyeler`
--

INSERT INTO `uyeler` (`uye_id`, `uye_kadi`, `uye_link`, `uye_sifre`, `uye_adi`, `uye_eposta`, `uye_tarih`, `uye_rutbe`, `uye_onay`) VALUES
(1, 'admin', 'admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin admin', 'admin@gmail.com', '2013-01-25 19:15:43', 1, 1);

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`site_url`);

--
-- Tablo için indeksler `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD PRIMARY KEY (`kategori_id`);

--
-- Tablo için indeksler `konular`
--
ALTER TABLE `konular`
  ADD PRIMARY KEY (`konu_id`);

--
-- Tablo için indeksler `reklamlar`
--
ALTER TABLE `reklamlar`
  ADD PRIMARY KEY (`reklam_id`);

--
-- Tablo için indeksler `sayfalar`
--
ALTER TABLE `sayfalar`
  ADD PRIMARY KEY (`sayfa_id`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`uye_id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `kategoriler`
--
ALTER TABLE `kategoriler`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `konular`
--
ALTER TABLE `konular`
  MODIFY `konu_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `reklamlar`
--
ALTER TABLE `reklamlar`
  MODIFY `reklam_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Tablo için AUTO_INCREMENT değeri `sayfalar`
--
ALTER TABLE `sayfalar`
  MODIFY `sayfa_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `uye_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
