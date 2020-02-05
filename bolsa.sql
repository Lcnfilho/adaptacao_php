-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 05-Fev-2020 às 13:27
-- Versão do servidor: 5.7.29-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bolsa`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `descricao` varchar(220) CHARACTER SET utf8 NOT NULL,
  `unidade` varchar(220) CHARACTER SET utf8 NOT NULL,
  `valor` varchar(50) CHARACTER SET utf8 NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`id`, `descricao`, `unidade`, `valor`, `created`, `modified`) VALUES
(1, 'arroz', 'Kg', '10.99', '2019-12-17 17:04:18', '2020-02-03 17:37:31'),
(2, 'feijÃ£o preto', 'Kg', '6.90', '2019-12-17 18:22:35', '2020-02-05 12:47:44'),
(3, 'macarrÃ£o', 'Kg', '3.90', '2019-12-17 18:27:13', '2020-02-05 12:47:31'),
(7, 'arroz integral', 'Kg', '14.00', '2020-01-23 19:12:15', '2020-02-03 17:15:19'),
(8, 'maracuja', 'Un.', '0.99', '2020-02-03 17:17:03', '2020-02-05 12:46:18'),
(9, 'leite', 'L', '1.89', '2020-02-05 12:38:10', '2020-02-05 12:49:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
