-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 01 Mar 2014, 09:16:43
-- Sunucu sürümü: 5.6.11
-- PHP Sürümü: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `studcoun`
--
CREATE DATABASE IF NOT EXISTS `studcoun` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `studcoun`;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `accommadation`
--

CREATE TABLE IF NOT EXISTS `accommadation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `contact` varchar(45) NOT NULL,
  `type` int(1) NOT NULL COMMENT '0-devlet yurdu,1-ozel yurt,2-otel,3-pansiyon,4-kiralik ev',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `activity`
--

CREATE TABLE IF NOT EXISTS `activity` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `quota` int(4) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `place` varchar(255) DEFAULT NULL,
  `time` datetime NOT NULL COMMENT 'Etkinlikler icin tablo.',
  `activity_time` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `role` int(1) NOT NULL COMMENT '0-superadmin, 1-admin',
  `status` varchar(45) NOT NULL DEFAULT '1' COMMENT '1-aktif,2-pasif',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='Sistem yonetici kullanici tablosu.' AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`, `firstname`, `lastname`, `role`, `status`) VALUES
(1, 'hasantktl@gmail.com', '1234', 'Hasan', 'Tokatlı', 0, '1'),
(2, 'buket_ylmaz@hotmail.com', '1234', 'Buket', 'Yılmaz', 1, '2');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gallery`
--

CREATE TABLE IF NOT EXISTS `gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `filename` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `summary` text NOT NULL,
  `content` text NOT NULL,
  `time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COMMENT='duyuru ve haberler için' AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `news`
--

INSERT INTO `news` (`id`, `title`, `summary`, `content`, `time`) VALUES
(1, 'Sitenin yazılımı başladı', 'Web sitemizin web uygulamasına ait yazılım kodlamasına başlandı.', 'Web sitemiz için web uygulaması analizi uzun süredir devam etmekteydi.\r\nNihayet analizler tamamlandı. Analiz sonuçlarına göre web yazılımın geliştirilmesine başlandı.', '2014-02-23 10:37:55'),
(2, 'sada', 'dsad', 'asd', '2014-02-23 12:14:19');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `news_photo`
--

CREATE TABLE IF NOT EXISTS `news_photo` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `news_id` int(11) NOT NULL,
  `filename` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `news_id` (`news_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL COMMENT 'Sisteme kayit olacak yabanci ogrenciler icin kullanilan tablo.',
  `university_name` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `birthdate` date NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `gender` int(1) NOT NULL COMMENT '0-erkek,1-kadın',
  `registration_time` datetime NOT NULL,
  `country_id` int(11) NOT NULL,
  `status` int(1) DEFAULT '0' COMMENT '''0-aktivasyon yapmamış,1-aktif,2-aktivasyon ok fakat pasif''',
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='Yabanci ogrenciler icin tablo.' AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `university`
--

CREATE TABLE IF NOT EXISTS `university` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(50) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `contact_name` varchar(100) NOT NULL,
  `description` text,
  `address` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `volunteer`
--

CREATE TABLE IF NOT EXISTS `volunteer` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `university_id` int(11) DEFAULT NULL,
  `faculty` varchar(255) NOT NULL,
  `department` varchar(255) NOT NULL,
  `tel` varchar(20) NOT NULL,
  `birthdate` date NOT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `registration_time` datetime NOT NULL,
  `language_document` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `gender` int(1) NOT NULL COMMENT '0-erkek 1- kadin',
  `status` int(1) NOT NULL DEFAULT '0' COMMENT '0-aktivasyon yapilmamis,1-aktif,2-aktivasyon yapilmis pasif uye',
  PRIMARY KEY (`id`),
  KEY `university_id` (`university_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='gonullu uye tablosu ';

--
-- Dökümü yapılmış tablolar için kısıtlamalar
--

--
-- Tablo kısıtlamaları `news_photo`
--
ALTER TABLE `news_photo`
  ADD CONSTRAINT `news_photo_ibfk_1` FOREIGN KEY (`news_id`) REFERENCES `news` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_ibfk_1` FOREIGN KEY (`country_id`) REFERENCES `country` (`id`) ON UPDATE CASCADE;

--
-- Tablo kısıtlamaları `volunteer`
--
ALTER TABLE `volunteer`
  ADD CONSTRAINT `volunteer_ibfk_1` FOREIGN KEY (`university_id`) REFERENCES `university` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
