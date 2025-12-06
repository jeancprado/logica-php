-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 25/11/2025 às 00:13
-- Versão do servidor: 8.0.43
-- Versão do PHP: 8.2.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `exercicio_dados`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `exercicio10`
--

CREATE TABLE `exercicio10` (
  `id` int NOT NULL COMMENT 'id temperaturas',
  `measurement_date` date NOT NULL COMMENT 'data da medição',
  `temperature_recorded` decimal(10,0) NOT NULL COMMENT 'temperatura registrada',
  `classification` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL COMMENT 'classificação'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci COMMENT='tabela para o exercicio 10 - monitoramento de temperaturas';

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `exercicio10`
--
ALTER TABLE `exercicio10`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `exercicio10`
--
ALTER TABLE `exercicio10`
  MODIFY `id` int NOT NULL AUTO_INCREMENT COMMENT 'id temperaturas';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
