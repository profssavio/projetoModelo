-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: db
-- Tempo de geração: 09/06/2022 às 22:58
-- Versão do servidor: 8.0.29
-- Versão do PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dbmodelo`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_abono`
--

CREATE TABLE `tb_abono` (
  `id` int NOT NULL,
  `data_inicial` date NOT NULL,
  `data_final` date NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `tipo_abono` int NOT NULL,
  `servidor` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_cargo`
--

CREATE TABLE `tb_cargo` (
  `id` int NOT NULL,
  `cargo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_servidor`
--

CREATE TABLE `tb_servidor` (
  `id` int NOT NULL,
  `matricula` varchar(10) NOT NULL,
  `nome` varchar(60) NOT NULL,
  `situacao` char(1) NOT NULL DEFAULT 'A',
  `data_admissao` date NOT NULL,
  `data_criacao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cargo` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tb_tipo_abono`
--

CREATE TABLE `tb_tipo_abono` (
  `id` int NOT NULL,
  `tipo` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `tb_abono`
--
ALTER TABLE `tb_abono`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_abono_tipo_abono` (`tipo_abono`),
  ADD KEY `fk_abono_servidor` (`servidor`);

--
-- Índices de tabela `tb_cargo`
--
ALTER TABLE `tb_cargo`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `tb_servidor`
--
ALTER TABLE `tb_servidor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `matricula` (`matricula`),
  ADD KEY `fk_servidor_cargo` (`cargo`);

--
-- Índices de tabela `tb_tipo_abono`
--
ALTER TABLE `tb_tipo_abono`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_abono`
--
ALTER TABLE `tb_abono`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_cargo`
--
ALTER TABLE `tb_cargo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_servidor`
--
ALTER TABLE `tb_servidor`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_tipo_abono`
--
ALTER TABLE `tb_tipo_abono`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `tb_abono`
--
ALTER TABLE `tb_abono`
  ADD CONSTRAINT `fk_abono_servidor` FOREIGN KEY (`servidor`) REFERENCES `tb_servidor` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `fk_abono_tipo_abono` FOREIGN KEY (`tipo_abono`) REFERENCES `tb_tipo_abono` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Restrições para tabelas `tb_servidor`
--
ALTER TABLE `tb_servidor`
  ADD CONSTRAINT `fk_servidor_cargo` FOREIGN KEY (`cargo`) REFERENCES `tb_cargo` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
