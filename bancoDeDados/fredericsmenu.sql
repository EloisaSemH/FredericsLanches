-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22-Nov-2017 às 19:42
-- Versão do servidor: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fredericsmenu`
--
DROP DATABASE IF EXISTS `fredericsmenu`;
CREATE DATABASE IF NOT EXISTS `fredericsmenu` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `fredericsmenu`;

DELIMITER $$
--
-- Procedures
--
DROP PROCEDURE IF EXISTS `p_AlterarLanche`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_AlterarLanche` (IN `_nome` VARCHAR(32), IN `_descricao` VARCHAR(255), IN `_ingredientes` VARCHAR(255), IN `_montagem` VARCHAR(255), IN `_tempoPrep` VARCHAR(5), IN `_itensCombo` VARCHAR(64), IN `_calorias` INT(5), IN `_valor` DECIMAL(4,2), IN `_imagem` VARCHAR(32), IN `_id` INT(11))  NO SQL
update 
	lanches 
set 
	nome = _nome,
    descricao = _descricao,
    ingredientes = _ingredientes,
    montagem = _montagem, 
    tempoPrep = _tempoPrep, 
    itensCombo = _itensCombo, 
    calorias = _calorias, 
    valor = _valor, 
    imagem = _imagem
where 
	id = _id$$

DROP PROCEDURE IF EXISTS `p_CadastrarLanche`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_CadastrarLanche` (IN `_nome` VARCHAR(32), IN `_descricao` VARCHAR(255), IN `_ingredientes` VARCHAR(255), IN `_montagem` VARCHAR(255), IN `_tempoPrep` VARCHAR(5), IN `_itensCombo` VARCHAR(64), IN `_calorias` INT(5), IN `_valor` DECIMAL(4,2), IN `_imagem` VARCHAR(32))  NO SQL
insert into lanches (nome, descricao, ingredientes, montagem, tempoPrep, itensCombo, calorias, valor, imagem) values (_nome, _descricao, _ingredientes, _montagem, _tempoPrep, _itensCombo, _calorias, _valor, _imagem)$$

DROP PROCEDURE IF EXISTS `p_ConsultarLanchePorID`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_ConsultarLanchePorID` (IN `_id` INT(11))  NO SQL
select * from lanches where id = _id$$

DROP PROCEDURE IF EXISTS `p_ConsultarLanches`$$
CREATE DEFINER=`root`@`localhost` PROCEDURE `p_ConsultarLanches` ()  NO SQL
SELECT * FROM lanches$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `lanches`
--

DROP TABLE IF EXISTS `lanches`;
CREATE TABLE IF NOT EXISTS `lanches` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(32) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `ingredientes` varchar(255) NOT NULL,
  `montagem` varchar(255) NOT NULL,
  `tempoPrep` varchar(5) NOT NULL,
  `itensCombo` varchar(64) NOT NULL,
  `calorias` int(5) NOT NULL,
  `valor` decimal(4,2) NOT NULL,
  `imagem` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
