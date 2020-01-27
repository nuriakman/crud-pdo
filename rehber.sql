-- Adminer 4.7.5 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP DATABASE IF EXISTS `telefon_rehberi`;
CREATE DATABASE `telefon_rehberi` /*!40100 DEFAULT CHARACTER SET utf8 COLLATE utf8_turkish_ci */;
USE `telefon_rehberi`;

DROP TABLE IF EXISTS `rehber`;
CREATE TABLE `rehber` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `adisoyadi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `telefonu` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `birimi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

INSERT INTO `rehber` (`id`, `adisoyadi`, `telefonu`, `birimi`) VALUES
(2,	'Nuri Akman',	'1112233',	'Bilgi İşlem'),
(3,	'Hasan Çiçek',	'4445566',	'Personel Dairesi');

-- 2020-01-27 04:53:26
