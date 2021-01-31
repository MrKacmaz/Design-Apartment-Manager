-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 31 Oca 2021, 15:41:25
-- Sunucu sürümü: 10.4.11-MariaDB
-- PHP Sürümü: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `webdatabase`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `billpayers`
--

CREATE TABLE `billpayers` (
  `uniquePayerID` int(11) NOT NULL,
  `billPayersID` int(11) NOT NULL,
  `payerID` int(11) NOT NULL,
  `payerDate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `billpayers`
--

INSERT INTO `billpayers` (`uniquePayerID`, `billPayersID`, `payerID`, `payerDate`) VALUES
(78, 51, 39, NULL),
(79, 51, 40, NULL),
(80, 51, 42, NULL),
(81, 51, 36, '2021-01-31'),
(82, 51, 58, '2021-01-31'),
(83, 51, 54, NULL);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bills`
--

CREATE TABLE `bills` (
  `billID` int(11) NOT NULL,
  `billDate` date NOT NULL DEFAULT current_timestamp(),
  `periot` varchar(32) DEFAULT NULL,
  `billType` varchar(32) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `isOK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `bills`
--

INSERT INTO `bills` (`billID`, `billDate`, `periot`, `billType`, `amount`, `isOK`) VALUES
(51, '2021-01-01', 'Ocak', 'rent', 850, 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `complains`
--

CREATE TABLE `complains` (
  `complainID` int(11) NOT NULL,
  `userName` varchar(50) NOT NULL,
  `userSurname` varchar(50) NOT NULL,
  `userUsername` varchar(50) NOT NULL,
  `userFlatno` int(11) NOT NULL,
  `about` varchar(50) NOT NULL,
  `userComplain` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `complains`
--

INSERT INTO `complains` (`complainID`, `userName`, `userSurname`, `userUsername`, `userFlatno`, `about`, `userComplain`) VALUES
(12, 'alperen', 'kaçmaz', 'mrkacmaz', 1, 'TENANT', 'There is a lot of noise on the upper floors at night. Please pay attention'),
(14, 'alperen', 'KAÇMAZ', 'mrkacmaz', 1, 'OTHER', 'asdasdasd');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `maintopics`
--

CREATE TABLE `maintopics` (
  `mainTopicsID` int(11) NOT NULL,
  `mainTopicsTitle` varchar(250) NOT NULL,
  `mainTopicsContent` varchar(500) NOT NULL,
  `isOK` enum('1','0') NOT NULL,
  `mainTopicsTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `maintopics`
--

INSERT INTO `maintopics` (`mainTopicsID`, `mainTopicsTitle`, `mainTopicsContent`, `isOK`, `mainTopicsTime`) VALUES
(1, 'HELLO EVERYONE', 'You are a tenant in this apartment. necessary information etc. will be told. Log in to the system at the beginning and mid-month.', '1', '2021-01-30 21:23:05'),
(2, 'INFORMATION', 'Adress : ATALAR MAH. 952.SOK NO: DAİRE NO / 6 PAMUKKALE / DENİZLİ\r\n\r\nInfrastructure: TURKSAT 100Mbps FIBER OPTIC INTERNET CONNECTION ', '1', '2021-01-30 21:23:38'),
(4, 'PAYMENT', 'Prices are updated month to month. New bills are issued in the first week of each month. Extra information appears under this heading on your homepage. When the winter season is entered, the pool is closed and the common natural gas is opened for use. The natural gas system is central. Therefore, everyone pays an equal amount.', '1', '2021-01-30 21:09:49');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `usersinfo`
--

CREATE TABLE `usersinfo` (
  `userID` int(11) NOT NULL,
  `isAdmin` enum('user','admin') NOT NULL DEFAULT 'user',
  `userName` varchar(32) DEFAULT 'UNKNOWN',
  `userSurname` varchar(32) DEFAULT 'UNKNOWN',
  `userUsername` varchar(32) DEFAULT 'UNKNOWN',
  `userFlatno` varchar(2) DEFAULT NULL,
  `userGSM` varchar(10) DEFAULT 'UNKNOWN',
  `userEmail` varchar(32) DEFAULT 'UNKNOWN',
  `userPassword` varchar(32) NOT NULL,
  `registerTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `usersinfo`
--

INSERT INTO `usersinfo` (`userID`, `isAdmin`, `userName`, `userSurname`, `userUsername`, `userFlatno`, `userGSM`, `userEmail`, `userPassword`, `registerTime`) VALUES
(36, 'user', 'alperen', 'KAÇMAZ', 'mrkacmaz', '5', '5310146762', 'alperen@gmail.com', 'dd28e50635038e9cf3a648c2dd17ad0a', '2021-01-30 23:28:40'),
(39, 'admin', 'baran', 'KAÇMAZ', 'mcmonkey', '2', '5551234567', 'baran@gmail.com', 'c170b38f663bb69d68490b6eb8ae4c8d', '2021-01-30 23:16:03'),
(40, 'user', 'betül', 'GÖZEN', 'mrsgozen', '3', '5551234567', 'betul@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-01-05 14:39:01'),
(42, 'user', 'ali', 'KIRGIZ', 'kerpeten', '4', '5310146762', 'kerpeten@ali.com', 'f786ab7b63b9da0bf973710489f71aee', '2021-01-30 19:30:50'),
(54, 'user', 'beytullah', 'CETIN', 'cetin', '9', '5551231231', 'asd@asd.com', 'eb62f6b9306db575c2d596b1279627a4', '2021-01-30 19:54:29'),
(58, 'user', 'hakan', 'ALTUN', 'hAltun', '8', '5551231231', 'asd@asd.com', 'eb62f6b9306db575c2d596b1279627a4', '2021-01-30 22:45:28');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `billpayers`
--
ALTER TABLE `billpayers`
  ADD PRIMARY KEY (`uniquePayerID`);

--
-- Tablo için indeksler `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`billID`);

--
-- Tablo için indeksler `complains`
--
ALTER TABLE `complains`
  ADD PRIMARY KEY (`complainID`);

--
-- Tablo için indeksler `maintopics`
--
ALTER TABLE `maintopics`
  ADD PRIMARY KEY (`mainTopicsID`);

--
-- Tablo için indeksler `usersinfo`
--
ALTER TABLE `usersinfo`
  ADD PRIMARY KEY (`userID`),
  ADD UNIQUE KEY `userFlatno` (`userFlatno`),
  ADD UNIQUE KEY `userUsername` (`userUsername`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `billpayers`
--
ALTER TABLE `billpayers`
  MODIFY `uniquePayerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- Tablo için AUTO_INCREMENT değeri `bills`
--
ALTER TABLE `bills`
  MODIFY `billID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- Tablo için AUTO_INCREMENT değeri `complains`
--
ALTER TABLE `complains`
  MODIFY `complainID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Tablo için AUTO_INCREMENT değeri `maintopics`
--
ALTER TABLE `maintopics`
  MODIFY `mainTopicsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `usersinfo`
--
ALTER TABLE `usersinfo`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
