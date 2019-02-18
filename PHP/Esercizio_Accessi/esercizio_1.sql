-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Creato il: Feb 18, 2019 alle 13:12
-- Versione del server: 10.1.30-MariaDB
-- Versione PHP: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `esercizio_1`
--
CREATE DATABASE IF NOT EXISTS `esercizio_1` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `esercizio_1`;

-- --------------------------------------------------------

--
-- Struttura della tabella `accessi`
--

CREATE TABLE `accessi` (
  `id` int(5) NOT NULL,
  `id_ut` text NOT NULL,
  `inizio` datetime NOT NULL,
  `fine` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `accessi`
--

INSERT INTO `accessi` (`id`, `id_ut`, `inizio`, `fine`) VALUES
(15, 'ricky', '2019-02-18 12:19:16', '2019-02-18 12:30:29'),
(16, 'eltar', '2019-02-18 12:30:38', '2019-02-18 12:36:33'),
(17, 'eltar', '2019-02-18 12:37:04', '2019-02-18 12:38:41'),
(18, 'albi', '2019-02-18 12:38:53', '2019-02-18 12:39:46'),
(19, 'eltar', '2019-02-18 12:40:11', '2019-02-18 12:42:01'),
(20, 'zola', '2019-02-18 12:42:09', '2019-02-18 12:53:22'),
(21, 'eltar', '2019-02-18 12:56:50', '2019-02-18 13:05:55');

-- --------------------------------------------------------

--
-- Struttura della tabella `utenti`
--

CREATE TABLE `utenti` (
  `id` int(5) NOT NULL,
  `cognome` text NOT NULL,
  `nome` text NOT NULL,
  `nickname` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  `indirizzo` text NOT NULL,
  `ddn` date NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dump dei dati per la tabella `utenti`
--

INSERT INTO `utenti` (`id`, `cognome`, `nome`, `nickname`, `password`, `email`, `indirizzo`, `ddn`, `isAdmin`) VALUES
(1, 'Rizza', 'Giovanni', 'eltar', 'siis', 'eltarsilence@gmail.com', 'Via Verdi 53', '2000-08-16', 1),
(2, 'Siliqua', 'Riccardo', 'ricky', 'siis', 'laal@gmail.com', 'via bione 33', '2000-12-21', 1),
(3, 'Canipari', 'Alberto', 'albi', 'suus', 'alberto@gmail.com', 'via tosse 15', '2000-08-05', 0),
(4, 'Zola', 'Francesco', 'zola', '1234', 'francesco.zola79@gmail.com', 'via del prof 92', '1990-01-01', 1);

--
-- Indici per le tabelle scaricate
--

--
-- Indici per le tabelle `accessi`
--
ALTER TABLE `accessi`
  ADD PRIMARY KEY (`id`);

--
-- Indici per le tabelle `utenti`
--
ALTER TABLE `utenti`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT per le tabelle scaricate
--

--
-- AUTO_INCREMENT per la tabella `accessi`
--
ALTER TABLE `accessi`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT per la tabella `utenti`
--
ALTER TABLE `utenti`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
