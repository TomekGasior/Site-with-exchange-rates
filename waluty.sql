-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 17 Sty 2018, 21:34
-- Wersja serwera: 10.1.26-MariaDB
-- Wersja PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `waluty`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `spolki`
--

CREATE TABLE `spolki` (
  `id_spolki` int(11) NOT NULL,
  `walor` varchar(30) NOT NULL,
  `cena` double NOT NULL,
  `data_spolki` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `spolki`
--

INSERT INTO `spolki` (`id_spolki`, `walor`, `cena`, `data_spolki`) VALUES
(1, 'TAURONPE', 3.29, '2018-01-17'),
(2, 'PGNIG', 6.67, '2018-01-17'),
(3, 'PGE', 13.35, '2018-01-17'),
(4, 'GETINOBLE', 1.66, '2018-01-17'),
(5, 'PZU', 44.91, '2018-01-17');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownicy`
--

CREATE TABLE `uzytkownicy` (
  `id_uzytkownika` int(11) NOT NULL,
  `login` varchar(30) NOT NULL,
  `haslo` text NOT NULL,
  `uprawnienia` tinyint(4) NOT NULL,
  `data_zarejestrowania` date NOT NULL,
  `imie` varchar(65) NOT NULL,
  `nazwisko` varchar(65) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `uzytkownicy`
--

INSERT INTO `uzytkownicy` (`id_uzytkownika`, `login`, `haslo`, `uprawnienia`, `data_zarejestrowania`, `imie`, `nazwisko`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 2, '2018-01-17', 'Tomasz', 'Gasior'),
(2, 'tomek', 'd0d41f1a3cc3f67dcd74694de9fef1b0', 1, '2018-01-17', 'Jan', 'Kowalski');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `waluty`
--

CREATE TABLE `waluty` (
  `id_waluty` int(11) NOT NULL,
  `nazwa_waluty` varchar(4) NOT NULL,
  `kupno` double NOT NULL,
  `sprzedaz` double NOT NULL,
  `data_waluty` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Zrzut danych tabeli `waluty`
--

INSERT INTO `waluty` (`id_waluty`, `nazwa_waluty`, `kupno`, `sprzedaz`, `data_waluty`) VALUES
(8, 'EUR', 4.1363, 4.1974, '2018-01-17'),
(9, 'USD', 3.3829, 3.4641, '2018-01-17'),
(10, 'CHF', 3.5125, 3.6317, '2018-01-17'),
(11, 'NOK', 0.4231, 0.4402, '2018-01-17'),
(12, 'NIS', 0.97, 1.045, '2018-01-17');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indexes for table `spolki`
--
ALTER TABLE `spolki`
  ADD PRIMARY KEY (`id_spolki`);

--
-- Indexes for table `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  ADD PRIMARY KEY (`id_uzytkownika`);

--
-- Indexes for table `waluty`
--
ALTER TABLE `waluty`
  ADD PRIMARY KEY (`id_waluty`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT dla tabeli `spolki`
--
ALTER TABLE `spolki`
  MODIFY `id_spolki` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT dla tabeli `uzytkownicy`
--
ALTER TABLE `uzytkownicy`
  MODIFY `id_uzytkownika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT dla tabeli `waluty`
--
ALTER TABLE `waluty`
  MODIFY `id_waluty` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
