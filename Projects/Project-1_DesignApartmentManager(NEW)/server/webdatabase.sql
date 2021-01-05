-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 05 Oca 2021, 15:43:03
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
-- Tablo için tablo yapısı `adminpanel`
--

CREATE TABLE `adminpanel` (
  `adminID` int(11) NOT NULL,
  `adminUSERNAME` varchar(32) NOT NULL,
  `adminNAME` varchar(32) NOT NULL,
  `adminSURNAME` varchar(32) NOT NULL,
  `adminGSM` varchar(10) NOT NULL,
  `adminGSM_2` varchar(10) NOT NULL,
  `adminPASSWORD` varchar(50) NOT NULL,
  `adminEMAIL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `adminpanel`
--

INSERT INTO `adminpanel` (`adminID`, `adminUSERNAME`, `adminNAME`, `adminSURNAME`, `adminGSM`, `adminGSM_2`, `adminPASSWORD`, `adminEMAIL`) VALUES
(4, 'mcmonkey', 'Alperen', 'kaçmaz', '5310146762', '5391235487', 'c170b38f663bb69d68490b6eb8ae4c8d', 'alperen703.akm@gmail.com');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `apartmentexpenses`
--

CREATE TABLE `apartmentexpenses` (
  `expensesID` int(11) NOT NULL,
  `corridorLight` int(11) NOT NULL,
  `corridorWater` int(11) NOT NULL,
  `corridorExtra` int(11) NOT NULL,
  `isOK` int(11) NOT NULL,
  `expensesTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `apartmentexpenses`
--

INSERT INTO `apartmentexpenses` (`expensesID`, `corridorLight`, `corridorWater`, `corridorExtra`, `isOK`, `expensesTime`) VALUES
(3, 55, 25, 0, 0, '2021-01-05 14:08:46');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `billpayers`
--

CREATE TABLE `billpayers` (
  `uniquePayerID` int(11) NOT NULL,
  `payerDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `payerID` int(11) NOT NULL,
  `payerName` varchar(32) NOT NULL,
  `payerFlat` int(11) NOT NULL,
  `payerMuch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `billpayers`
--

INSERT INTO `billpayers` (`uniquePayerID`, `payerDate`, `payerID`, `payerName`, `payerFlat`, `payerMuch`) VALUES
(11, '2021-01-05 14:36:12', 36, 'alperen', 1, 662),
(12, '2021-01-05 14:39:31', 42, 'ali', 4, 662),
(13, '2021-01-05 14:41:42', 43, 'kuzey', 5, 662);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `bills`
--

CREATE TABLE `bills` (
  `billID` int(11) NOT NULL,
  `billDate` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rent` int(11) NOT NULL,
  `corridorLight` int(11) NOT NULL,
  `corridorWater` int(11) NOT NULL,
  `corridorCleaning` int(11) NOT NULL,
  `fuel` int(11) NOT NULL,
  `isOK` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `bills`
--

INSERT INTO `bills` (`billID`, `billDate`, `rent`, `corridorLight`, `corridorWater`, `corridorCleaning`, `fuel`, `isOK`) VALUES
(7, '2021-01-05 14:09:51', 650, 55, 25, 40, 0, 0);

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
(12, 'alperen', 'kaçmaz', 'mrkacmaz', 1, 'TENANT', 'There is a lot of noise on the upper floors at night. Please pay attention');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `gardenarrangements`
--

CREATE TABLE `gardenarrangements` (
  `toDoID` int(11) NOT NULL,
  `toDo` varchar(500) NOT NULL,
  `isOK` int(11) NOT NULL,
  `ArragmentTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `gardenarrangements`
--

INSERT INTO `gardenarrangements` (`toDoID`, `toDo`, `isOK`, `ArragmentTime`) VALUES
(3, 'The leaves in the garden will be cleaned.', 0, '2021-01-05 14:08:05');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `maintopics`
--

CREATE TABLE `maintopics` (
  `mainTopicsID` int(11) NOT NULL,
  `mainTopicsTitle` varchar(250) NOT NULL,
  `mainTopicsContent` varchar(500) NOT NULL,
  `isOK` int(11) NOT NULL,
  `mainTopicsTime` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Tablo döküm verisi `maintopics`
--

INSERT INTO `maintopics` (`mainTopicsID`, `mainTopicsTitle`, `mainTopicsContent`, `isOK`, `mainTopicsTime`) VALUES
(1, 'HELLO EVERYONE', 'You are a tenant in this apartment. necessary information etc. will be told. Log in to the system at the beginning and mid-month.', 0, '2021-01-03 22:34:53'),
(2, 'INFORMATION', 'Adress : ATALAR MAH. 952.SOK NO: DAİRE NO / 6 PAMUKKALE / DENİZLİ\r\n\r\nInfrastructure: TURKSAT 100Mbps FIBER OPTIC INTERNET CONNECTION ', 0, '2021-01-04 00:49:30'),
(4, 'PAYMENT', 'Prices are updated month to month. New bills are issued in the first week of each month. Extra information appears under this heading on your homepage. When the winter season is entered, the pool is closed and the common natural gas is opened for use. The natural gas system is central. Therefore, everyone pays an equal amount.', 0, '2021-01-04 00:47:35');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `usersinfo`
--

CREATE TABLE `usersinfo` (
  `userID` int(11) NOT NULL,
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

INSERT INTO `usersinfo` (`userID`, `userName`, `userSurname`, `userUsername`, `userFlatno`, `userGSM`, `userEmail`, `userPassword`, `registerTime`) VALUES
(36, 'alperen', 'KAÇMAZ', 'mrkacmaz', '1', '5310146762', 'alperen@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2021-01-05 14:39:13'),
(39, 'baran', 'KAÇMAZ', 'MrKCMZ', '2', '5551234567', 'baran@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-01-05 13:05:08'),
(40, 'betül', 'GÖZEN', 'mrsgozen', '3', '5551234567', 'betul@gmail.com', '202cb962ac59075b964b07152d234b70', '2021-01-05 14:39:01'),
(42, 'ali', 'KIRGIZ', 'kerpeten', '4', '1234567890', 'kerpeten@ali.com', 'f786ab7b63b9da0bf973710489f71aee', '2021-01-05 14:39:08'),
(43, 'kuzey', 'TEKINOGLU', 'KUZEY', '5', '5555555555', 'kuzey@ayapim.com', '934f25c1c8318b4616bff80cd76750ba', '2021-01-05 14:41:29');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `adminpanel`
--
ALTER TABLE `adminpanel`
  ADD PRIMARY KEY (`adminID`);

--
-- Tablo için indeksler `apartmentexpenses`
--
ALTER TABLE `apartmentexpenses`
  ADD PRIMARY KEY (`expensesID`);

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
-- Tablo için indeksler `gardenarrangements`
--
ALTER TABLE `gardenarrangements`
  ADD PRIMARY KEY (`toDoID`);

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
-- Tablo için AUTO_INCREMENT değeri `adminpanel`
--
ALTER TABLE `adminpanel`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Tablo için AUTO_INCREMENT değeri `apartmentexpenses`
--
ALTER TABLE `apartmentexpenses`
  MODIFY `expensesID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `billpayers`
--
ALTER TABLE `billpayers`
  MODIFY `uniquePayerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Tablo için AUTO_INCREMENT değeri `bills`
--
ALTER TABLE `bills`
  MODIFY `billID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Tablo için AUTO_INCREMENT değeri `complains`
--
ALTER TABLE `complains`
  MODIFY `complainID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Tablo için AUTO_INCREMENT değeri `gardenarrangements`
--
ALTER TABLE `gardenarrangements`
  MODIFY `toDoID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Tablo için AUTO_INCREMENT değeri `maintopics`
--
ALTER TABLE `maintopics`
  MODIFY `mainTopicsID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Tablo için AUTO_INCREMENT değeri `usersinfo`
--
ALTER TABLE `usersinfo`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
