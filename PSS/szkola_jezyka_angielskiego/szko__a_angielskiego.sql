-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sty 10, 2026 at 12:00 PM
-- Wersja serwera: 10.4.32-MariaDB
-- Wersja PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `szkoła_angielskiego`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kurs`
--

CREATE TABLE `kurs` (
  `id_kursu` int(11) NOT NULL,
  `nazwa` varchar(100) NOT NULL,
  `lektor_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `kurs`
--

INSERT INTO `kurs` (`id_kursu`, `nazwa`, `lektor_id`) VALUES
(1, 'Angielski A1 - Początkujący', 10),
(2, 'Angielski A2 - Niższy średniozaawansowany', 10),
(3, 'Angielski B2 - Średniozaawansowany', 13),
(4, 'Angielski B2 - Wyższy średniozaawansowany', NULL),
(5, 'Angielski C1 - Zaawansowany', NULL);

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `kursant`
--

CREATE TABLE `kursant` (
  `id_uzytkownika` int(11) NOT NULL,
  `poziom_jezykowy` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `kursant`
--

INSERT INTO `kursant` (`id_uzytkownika`, `poziom_jezykowy`) VALUES
(7, 'A1'),
(11, 'A1'),
(12, 'A1'),
(14, 'A1');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `lektor`
--

CREATE TABLE `lektor` (
  `id_uzytkownika` int(11) NOT NULL,
  `specjalizacja` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `lektor`
--

INSERT INTO `lektor` (`id_uzytkownika`, `specjalizacja`) VALUES
(1, 'General English'),
(10, 'Advanced English & TOEFL');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `material_edukacyjny`
--

CREATE TABLE `material_edukacyjny` (
  `id_materialu` int(11) NOT NULL,
  `kurs_id` int(11) NOT NULL,
  `typ_materialu` varchar(50) DEFAULT NULL,
  `tytul` varchar(150) NOT NULL,
  `opis` text DEFAULT NULL,
  `url_pliku` varchar(255) DEFAULT NULL,
  `data_dodania` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `material_edukacyjny`
--

INSERT INTO `material_edukacyjny` (`id_materialu`, `kurs_id`, `typ_materialu`, `tytul`, `opis`, `url_pliku`, `data_dodania`) VALUES
(1, 1, NULL, 'Słowka ', '', 'https://quizlet.com/pl/527950752/focus-4-unit-1-slownictwo-flash-cards/', '2026-01-09 13:08:33'),
(2, 1, NULL, 'Słowka unit 2', '', 'https://quizlet.com/98890178/jezyk-angielski-2-slowka-unit-2-flash-cards/', '2026-01-10 10:02:00');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `ocena`
--

CREATE TABLE `ocena` (
  `id_oceny` int(11) NOT NULL,
  `kursant_id` int(11) NOT NULL,
  `kurs_id` int(11) NOT NULL,
  `lektor_id` int(11) NOT NULL,
  `wartosc` int(11) NOT NULL,
  `data_wystawienia` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `ocena`
--

INSERT INTO `ocena` (`id_oceny`, `kursant_id`, `kurs_id`, `lektor_id`, `wartosc`, `data_wystawienia`) VALUES
(1, 7, 1, 10, 4, '2026-01-09'),
(2, 11, 1, 10, 4, '2026-01-09'),
(3, 12, 1, 10, 4, '2026-01-09');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `opinia_kursu`
--

CREATE TABLE `opinia_kursu` (
  `id_opinii` int(11) NOT NULL,
  `kursant_id` int(11) NOT NULL,
  `kurs_id` int(11) NOT NULL,
  `tresc_opinii` text NOT NULL,
  `data_utworzenia` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `opinia_kursu`
--

INSERT INTO `opinia_kursu` (`id_opinii`, `kursant_id`, `kurs_id`, `tresc_opinii`, `data_utworzenia`) VALUES
(28, 7, 1, 'Bardzo dobry kurs', '2026-01-09 12:16:21');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `uzytkownik`
--

CREATE TABLE `uzytkownik` (
  `id_uzytkownika` int(11) NOT NULL,
  `login` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `haslo_hash` varchar(255) NOT NULL,
  `imie` varchar(50) NOT NULL,
  `nazwisko` varchar(50) NOT NULL,
  `telefon` varchar(20) DEFAULT NULL,
  `rola` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `uzytkownik`
--

INSERT INTO `uzytkownik` (`id_uzytkownika`, `login`, `email`, `haslo_hash`, `imie`, `nazwisko`, `telefon`, `rola`) VALUES
(1, 'nauczyciel1', 'lektor@englishhub.pl', 'hash', 'Adam', 'Kowalski', NULL, 'lektor'),
(7, 'DawidKrupski1', 'krecik086421@wp.pl', '$2y$10$5wSi7RcEQHOc/YRUm3AF6.YZcs4EpVKrFSbslya/zhtQSDqK9N8sy', 'Marcin', 'Krupski', '123456789', 'kursant'),
(10, 'hubert_lektor', 'hubert.nauczyciel@englishhub.pl', 'test', 'Hubert', 'Wysocki', '555666777', 'admin'),
(11, 'DawidKrupski', 'dawid086421@wp.pl', '$2y$10$DfPAFqSITmMf8XrBIpqReOhImVlg9wiBnHCi2SUNQ5BTJhCmWzcn6', 'Dawid', 'Sledz', '456789123', 'kursant'),
(12, 'DawidKrupski12', 'dawid.krupski@j', '$2y$10$YEBUmxy30QY90P6T3XmSqe4qsor3ek6kiNX727T1A9ldcGWvoNeIy', 'Dawid', 'Mag', '789456123', 'kursant'),
(13, 'robert_lektor', 'robert@englishhub.pl', 'test', 'Robert', 'Językowy', '555444333', 'lektor'),
(14, 'DawidKrupski13', 'tymabrk@gmail.com', '$2y$10$1vjVKgbkyS8jHzyYxMVmVOWwJKA2mRpnRVsvMA690rmYGLopTRFl.', 'Zbyszek', 'Tymbark', '456789123', 'kursant');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `wiadomosc`
--

CREATE TABLE `wiadomosc` (
  `id_wiadomosci` int(11) NOT NULL,
  `nadawca_id` int(11) NOT NULL,
  `odbiorca_id` int(11) NOT NULL,
  `temat` varchar(255) DEFAULT NULL,
  `tresc` text NOT NULL,
  `data_wyslania` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wiadomosc`
--

INSERT INTO `wiadomosc` (`id_wiadomosci`, `nadawca_id`, `odbiorca_id`, `temat`, `tresc`, `data_wyslania`) VALUES
(1, 7, 1, 'Past Simple', 'Podobala mi sie ta lekcja', '2026-01-09 10:08:16'),
(2, 7, 10, 'Past Perfect Simple', 'Mam pytanie odnosnie materiału', '2026-01-09 11:52:17');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zajecia`
--

CREATE TABLE `zajecia` (
  `id_zajec` int(11) NOT NULL,
  `kurs_id` int(11) NOT NULL,
  `lektor_id` int(11) NOT NULL,
  `data_czas` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `temat` varchar(150) DEFAULT NULL,
  `link_do_spotkania` varchar(255) DEFAULT NULL,
  `tryb` varchar(20) DEFAULT 'stacjonarne',
  `miejsce` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `zajecia`
--

INSERT INTO `zajecia` (`id_zajec`, `kurs_id`, `lektor_id`, `data_czas`, `temat`, `link_do_spotkania`, `tryb`, `miejsce`) VALUES
(6, 5, 10, '2026-01-15 23:12:00', 'Past Simple', NULL, 'stacjonarne', 'Sala 30'),
(7, 4, 10, '2026-01-30 23:12:00', 'Past Perfect Simple', NULL, 'stacjonarne', '102');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `zapis_na_kurs`
--

CREATE TABLE `zapis_na_kurs` (
  `id_zapisu` int(11) NOT NULL,
  `kursant_id` int(11) NOT NULL,
  `kurs_id` int(11) NOT NULL,
  `data_zapisu` datetime NOT NULL,
  `tryb` varchar(20) DEFAULT 'online',
  `status` varchar(20) DEFAULT 'oczekujacy'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `zapis_na_kurs`
--

INSERT INTO `zapis_na_kurs` (`id_zapisu`, `kursant_id`, `kurs_id`, `data_zapisu`, `tryb`, `status`) VALUES
(12, 7, 1, '2026-01-09 00:30:23', 'online', 'zakończony'),
(13, 7, 2, '2026-01-09 00:30:24', 'online', 'zakończony'),
(14, 7, 3, '2026-01-09 00:30:25', 'online', 'zakończony'),
(15, 7, 4, '2026-01-09 00:30:25', 'online', 'zakończony'),
(16, 7, 5, '2026-01-09 00:30:26', 'online', 'zakończony'),
(17, 12, 1, '2026-01-09 11:52:43', 'online', 'zakończony'),
(18, 13, 1, '2026-01-09 13:25:23', 'online', 'aktywny');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `kurs`
--
ALTER TABLE `kurs`
  ADD PRIMARY KEY (`id_kursu`),
  ADD KEY `Kurs_Lektor_FK` (`lektor_id`);

--
-- Indeksy dla tabeli `kursant`
--
ALTER TABLE `kursant`
  ADD PRIMARY KEY (`id_uzytkownika`);

--
-- Indeksy dla tabeli `lektor`
--
ALTER TABLE `lektor`
  ADD PRIMARY KEY (`id_uzytkownika`);

--
-- Indeksy dla tabeli `material_edukacyjny`
--
ALTER TABLE `material_edukacyjny`
  ADD PRIMARY KEY (`id_materialu`),
  ADD KEY `Material_Kurs_FK` (`kurs_id`);

--
-- Indeksy dla tabeli `ocena`
--
ALTER TABLE `ocena`
  ADD PRIMARY KEY (`id_oceny`),
  ADD KEY `Ocena_Kursant_FK` (`kursant_id`),
  ADD KEY `Ocena_Kurs_FK` (`kurs_id`),
  ADD KEY `Ocena_Lektor_FK` (`lektor_id`);

--
-- Indeksy dla tabeli `opinia_kursu`
--
ALTER TABLE `opinia_kursu`
  ADD PRIMARY KEY (`id_opinii`),
  ADD KEY `Opinia_Kursu_Kursant_FK` (`kursant_id`),
  ADD KEY `Opinia_Kursu_Kurs_FK` (`kurs_id`);

--
-- Indeksy dla tabeli `uzytkownik`
--
ALTER TABLE `uzytkownik`
  ADD PRIMARY KEY (`id_uzytkownika`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `login` (`login`);

--
-- Indeksy dla tabeli `wiadomosc`
--
ALTER TABLE `wiadomosc`
  ADD PRIMARY KEY (`id_wiadomosci`),
  ADD KEY `Wiadomosc_Nadawca_FK` (`nadawca_id`),
  ADD KEY `Wiadomosc_Odbiorca_FK` (`odbiorca_id`);

--
-- Indeksy dla tabeli `zajecia`
--
ALTER TABLE `zajecia`
  ADD PRIMARY KEY (`id_zajec`),
  ADD KEY `Zajecia_Kurs_FK` (`kurs_id`),
  ADD KEY `Zajecia_Lektor_FK` (`lektor_id`);

--
-- Indeksy dla tabeli `zapis_na_kurs`
--
ALTER TABLE `zapis_na_kurs`
  ADD PRIMARY KEY (`id_zapisu`),
  ADD KEY `kursant_id` (`kursant_id`),
  ADD KEY `kurs_id` (`kurs_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kurs`
--
ALTER TABLE `kurs`
  MODIFY `id_kursu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `material_edukacyjny`
--
ALTER TABLE `material_edukacyjny`
  MODIFY `id_materialu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ocena`
--
ALTER TABLE `ocena`
  MODIFY `id_oceny` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `opinia_kursu`
--
ALTER TABLE `opinia_kursu`
  MODIFY `id_opinii` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `uzytkownik`
--
ALTER TABLE `uzytkownik`
  MODIFY `id_uzytkownika` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `wiadomosc`
--
ALTER TABLE `wiadomosc`
  MODIFY `id_wiadomosci` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `zajecia`
--
ALTER TABLE `zajecia`
  MODIFY `id_zajec` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `zapis_na_kurs`
--
ALTER TABLE `zapis_na_kurs`
  MODIFY `id_zapisu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kurs`
--
ALTER TABLE `kurs`
  ADD CONSTRAINT `Kurs_Lektor_FK` FOREIGN KEY (`lektor_id`) REFERENCES `uzytkownik` (`id_uzytkownika`);

--
-- Constraints for table `kursant`
--
ALTER TABLE `kursant`
  ADD CONSTRAINT `Kursant_Uzytkownik_FK` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownik` (`id_uzytkownika`) ON DELETE CASCADE;

--
-- Constraints for table `lektor`
--
ALTER TABLE `lektor`
  ADD CONSTRAINT `Lektor_Uzytkownik_FK` FOREIGN KEY (`id_uzytkownika`) REFERENCES `uzytkownik` (`id_uzytkownika`) ON DELETE CASCADE;

--
-- Constraints for table `material_edukacyjny`
--
ALTER TABLE `material_edukacyjny`
  ADD CONSTRAINT `Material_Kurs_FK` FOREIGN KEY (`kurs_id`) REFERENCES `kurs` (`id_kursu`) ON DELETE CASCADE;

--
-- Constraints for table `ocena`
--
ALTER TABLE `ocena`
  ADD CONSTRAINT `Ocena_Kurs_FK` FOREIGN KEY (`kurs_id`) REFERENCES `kurs` (`id_kursu`),
  ADD CONSTRAINT `Ocena_Kursant_FK` FOREIGN KEY (`kursant_id`) REFERENCES `kursant` (`id_uzytkownika`),
  ADD CONSTRAINT `Ocena_Lektor_FK` FOREIGN KEY (`lektor_id`) REFERENCES `lektor` (`id_uzytkownika`);

--
-- Constraints for table `opinia_kursu`
--
ALTER TABLE `opinia_kursu`
  ADD CONSTRAINT `Opinia_Kursu_Kurs_FK` FOREIGN KEY (`kurs_id`) REFERENCES `kurs` (`id_kursu`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Opinia_Kursu_Kursant_FK` FOREIGN KEY (`kursant_id`) REFERENCES `uzytkownik` (`id_uzytkownika`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `wiadomosc`
--
ALTER TABLE `wiadomosc`
  ADD CONSTRAINT `Wiadomosc_Nadawca_FK` FOREIGN KEY (`nadawca_id`) REFERENCES `uzytkownik` (`id_uzytkownika`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `Wiadomosc_Odbiorca_FK` FOREIGN KEY (`odbiorca_id`) REFERENCES `uzytkownik` (`id_uzytkownika`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `zajecia`
--
ALTER TABLE `zajecia`
  ADD CONSTRAINT `Zajecia_Kurs_FK` FOREIGN KEY (`kurs_id`) REFERENCES `kurs` (`id_kursu`) ON DELETE CASCADE,
  ADD CONSTRAINT `Zajecia_Lektor_FK` FOREIGN KEY (`lektor_id`) REFERENCES `lektor` (`id_uzytkownika`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
