-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 23 okt 2022 om 15:36
-- Serverversie: 10.4.25-MariaDB
-- PHP-versie: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zuzu`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `klant`
--

CREATE TABLE `klant` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `adres` varchar(255) NOT NULL,
  `postcode` varchar(7) NOT NULL,
  `woonplaats` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `klant`
--

INSERT INTO `klant` (`id`, `fname`, `lname`, `email`, `adres`, `postcode`, `woonplaats`) VALUES
(1, 'name', 'achtername', 'email@email.com', 'nsdjf', '1234 AA', 'DJKADJFKS'),
(2, 'Lulu', 'Rijpkema', 'email@email.com', 'straat 123', '2555 AA', 'Den Haag'),
(3, 'Lulu', 'Rijpkema', 'email@email.com', 'straat 123', '2555 AA', 'Den Haag'),
(4, 'gdsgg', 'sfsdafa', 'email@email.com', 'asfsa', '2134 AA', ''),
(5, 'safddsaf', 'dsfsfsdfds', 'fsdfsdf@sgjsdb.com', 'asdas 32', '3243 CC', 'Den Haag'),
(6, 'FDSFSD ', 'FSDFDS', 'email@emailcom', 'sargdsa 32', '2312 FF', 'gdfgfdgd'),
(7, 'sadsa', 'dasdas', 'asdasd@h', 'asdas', 'asdasd', 'sadsada'),
(8, 'fdsfdsf', 'sdfds', 'sfdsfds@jfndskjf', 'fdsfds', 'fdsfds', 'fsdfds'),
(9, 'dsfdsf', 'sdfdsf', 'dsfsd@dsfs', 'fdsfsd', 'fsdfdsf', 'fsdfds'),
(10, 'sadsa', 'asdsa', 'dsadsa@sahdsa.com', 'dsadsa', 'dasda', 'asdsa'),
(11, 'dasdsa', 'sadsadas', 'jdjsakldj@kjdsklfjs.com', 'asdsadsad', '3231 AA', 'dasdsa dasdsa'),
(12, 'Obama', 'Barack', 'email@email.com', 'street 1221', '2143 AA', 'City'),
(13, 'w', 'w', 'ww@gmail.com', 'fdhjskfjk 231', 'fdsf 33', 'asfasfsa');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `sushi`
--

CREATE TABLE `sushi` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` decimal(5,2) NOT NULL,
  `category` varchar(255) NOT NULL,
  `stars` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `sushi`
--

INSERT INTO `sushi` (`id`, `name`, `quantity`, `price`, `category`, `stars`) VALUES
(1, 'Zalm', 20, '4.00', 'Nigiri', 4),
(2, 'Tonijn', 20, '4.00', 'Nigiri', 4),
(3, 'Mango', 20, '4.00', 'Nigiri', 3),
(4, 'Mango', 20, '9.00', 'Poke', 4),
(5, 'Salmon', 20, '9.00', 'Poke', 5),
(6, 'Tuna', 20, '9.00', 'Poke', 5),
(7, 'Avocado', 20, '6.00', 'Soft Shell', 5),
(8, 'Mango', 20, '6.00', 'Soft Shell', 4),
(9, 'Salmon', 20, '6.00', 'Soft Shell', 5),
(10, 'California', 20, '6.00', 'Uramaki', 5),
(11, 'Salmon', 20, '6.00', 'Uramaki', 3),
(12, 'Tempura Ebi', 20, '6.00', 'Uramaki', 4);

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `klant`
--
ALTER TABLE `klant`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `sushi`
--
ALTER TABLE `sushi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `klant`
--
ALTER TABLE `klant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT voor een tabel `sushi`
--
ALTER TABLE `sushi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
