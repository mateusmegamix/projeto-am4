-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 22-Maio-2020 às 22:18
-- Versão do servidor: 8.0.18
-- versão do PHP: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `am4`
--
CREATE DATABASE IF NOT EXISTS `am4` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `am4`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `gestor`
--

DROP TABLE IF EXISTS `gestor`;
CREATE TABLE IF NOT EXISTS `gestor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `login` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(32) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `gestor`
--

INSERT INTO `gestor` (`id`, `nome`, `login`, `senha`) VALUES
(1, 'Mateus Pereira', 'admin', 'e10adc3949ba59abbe56e057f20f883e');

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticia`
--

DROP TABLE IF EXISTS `noticia`;
CREATE TABLE IF NOT EXISTS `noticia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `arquivo` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `data` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `noticia`
--

INSERT INTO `noticia` (`id`, `titulo`, `descricao`, `arquivo`, `data`) VALUES
(1, 'G1 - Informa', 'Volta Redonda - Todos os leitos públicos e privados para tratamento do covid-19  ficam sob responsabilidade da Secretaria Municipal de Saúde.', 'f555845d2257899707ed2d72997b5e26.jpg', '2020-05-20 22:57:25'),
(2, 'Jornal Nacional', ' Segundo a prefeitura, novos 17 pacientes foram diagnosticados com Covid-19. Ao todo, há 594 infectados.', 'efdc2549f6994205ac4035d6255753a1.jpg', '2020-05-22 18:04:46'),
(3, 'Nissan', ' A Nissan decidiu adiar em quase um mês a reabertura de sua fábrica de automóveis em Resende (RJ), parada desde 23 de março.', 'd0b826e2070b10c2a0a3dc44cae9c6c7.jpg', '2020-05-22 18:25:40'),
(4, 'Prefeitura Informa', ' Resende se encontra nas 50 cidades mais inteligentes do Brasil', 'f555845d2257899707ed2d72997b5e26.jpg', '2020-05-22 18:27:17'),
(5, 'Jornal Sao Paulo', ' Segundo a Secretaria Municipal de Saúde, 120 pacientes são considerados curados, por terem passado do período de transmissão do vírus sem apresentarem novos sintomas.', '20e40a1092274baccf4ee002b1b1416e.jpg', '2020-05-22 18:28:58');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
