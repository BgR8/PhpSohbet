-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 21 Eki 2017, 17:04:35
-- Sunucu sürümü: 5.6.17
-- PHP Sürümü: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Veritabanı: `sohbet`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `oda`
--

CREATE TABLE IF NOT EXISTS `oda` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `isim` varchar(255) NOT NULL,
  `sahip` int(11) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Tablo döküm verisi `oda`
--

INSERT INTO `oda` (`ID`, `isim`, `sahip`) VALUES
(1, 'dasd', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `odakatilimci`
--

CREATE TABLE IF NOT EXISTS `odakatilimci` (
  `odano` int(11) NOT NULL,
  `uyeno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Tablo döküm verisi `odakatilimci`
--

INSERT INTO `odakatilimci` (`odano`, `uyeno`) VALUES
(1, 1),
(1, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uye`
--

CREATE TABLE IF NOT EXISTS `uye` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `rumuz` varchar(255) NOT NULL,
  `sifre` varchar(255) NOT NULL,
  `oturum` varchar(70) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Tablo döküm verisi `uye`
--

INSERT INTO `uye` (`ID`, `rumuz`, `sifre`, `oturum`) VALUES
(1, 'a', '1', 'a0af6fe9a47380828898b629bf89dcb5'),
(2, 'b', '2', '97bfdf5cede60c96a2cb2e048b2ed9d3');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
