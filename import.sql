-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Anamakine: localhost
-- Üretim Zamanı: 23 Eyl 2017, 02:02:10
-- Sunucu sürümü: 5.5.54-0ubuntu0.14.04.1
-- PHP Sürümü: 5.5.9-1ubuntu4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `hotelspro`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `inventories`
--

CREATE TABLE IF NOT EXISTS `inventories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_code` varchar(8) COLLATE utf8_unicode_ci NOT NULL,
  `allotment` int(11) NOT NULL,
  `price` float(10,2) NOT NULL,
  `date` date NOT NULL,
  `discount` int(11) DEFAULT NULL,
  `max_pax` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=8 ;

--
-- Tablo döküm verisi `inventories`
--

INSERT INTO `inventories` (`id`, `room_code`, `allotment`, `price`, `date`, `discount`, `max_pax`) VALUES
(1, 'STDDBL', 2, 75.00, '2017-11-25', 10, 2),
(2, 'STDDBL', 1, 80.00, '2017-11-26', NULL, 2),
(3, 'STDDBL', 1, 50.00, '2017-11-27', NULL, 2),
(4, 'STDDBL', 0, 40.00, '2017-11-28', 15, 1),
(5, 'STDSNGL', 1, 40.00, '2017-11-25', 20, 1),
(6, 'STDSNGL', 1, 40.00, '2017-11-26', NULL, 1),
(7, 'STDSNGL', 1, 40.00, '2017-11-27', NULL, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
