-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Creato il: Mag 28, 2020 alle 12:21
-- Versione del server: 10.4.11-MariaDB
-- Versione PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-library`
--

-- --------------------------------------------------------

--
-- Struttura della tabella `books`
--

CREATE TABLE `books` (
  `id` int(10) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `authors` varchar(50) NOT NULL,
  `edition` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL,
  `quantity` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `books`
--

INSERT INTO `books` (`id`, `isbn`, `title`, `authors`, `edition`, `status`, `quantity`) VALUES
(1, '123456789101', 'Divina Commedia', 'Dante Alleghieri', '9th', 'Available', 8);

-- --------------------------------------------------------

--
-- Struttura della tabella `issue_book`
--

CREATE TABLE `issue_book` (
  `username` varchar(50) NOT NULL,
  `id` int(50) NOT NULL,
  `approve` varchar(50) NOT NULL,
  `issue` varchar(50) NOT NULL,
  `return` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struttura della tabella `librarian`
--

CREATE TABLE `librarian` (
  `firstname` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `librarian`
--

INSERT INTO `librarian` (`firstname`, `surname`, `username`, `password`, `email`, `contact`) VALUES
('Max', 'Sieger', 'max', '123456789', 'maxsieger@gmail.com', '123456789');

-- --------------------------------------------------------

--
-- Struttura della tabella `user`
--

CREATE TABLE `user` (
  `firstname` varchar(50) NOT NULL,
  `surname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `contact` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dump dei dati per la tabella `user`
--

INSERT INTO `user` (`firstname`, `surname`, `username`, `password`, `email`, `contact`) VALUES
('Sam', 'Sieger', 'sam', '123456789', 'samsieger@gmail.com', '123456789');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
