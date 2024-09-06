-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 29/08/2024 às 14:22
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `nutrivida`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `cliente`
--

CREATE TABLE `cliente` (
  `cli_id` int(11) NOT NULL,
  `cli_nome` varchar(140) NOT NULL,
  `cli_email` varchar(140) NOT NULL,
  `cli_telefone` varchar(14) NOT NULL,
  `cli_senha` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`cli_id`, `cli_nome`, `cli_email`, `cli_telefone`, `cli_senha`) VALUES
(1, 'Caio Henrique Marioto de Moraes', 'caiomatematicanota10@gmail.com', '(12)99663-0970', '12345');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `Fun_id` int(11) NOT NULL,
  `Fun_nome` varchar(256) NOT NULL,
  `Fun_Email` varchar(140) NOT NULL,
  `Fun_Telefone` varchar(14) NOT NULL,
  `fun_senha` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`Fun_id`, `Fun_nome`, `Fun_Email`, `Fun_Telefone`, `fun_senha`) VALUES
(1, 'Joao', 'joao@gmail.com', '(12)99888-0999', '123');

-- --------------------------------------------------------

--
-- Estrutura para tabela `item`
--

CREATE TABLE `item` (
  `ite_id` int(11) NOT NULL,
  `ite_quantidade` int(11) NOT NULL,
  `ped_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `item`
--

INSERT INTO `item` (`ite_id`, `ite_quantidade`, `ped_id`, `pro_id`) VALUES
(1, 10, 1, 1);

--
-- Acionadores `item`
--
DELIMITER $$
CREATE TRIGGER `ins_venda` AFTER INSERT ON `item` FOR EACH ROW UPDATE produto SET produto.pro_quantidade = produto.pro_quantidade - new.ite_quantidade WHERE produto.pro_id = new.pro_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `pedido`
--

CREATE TABLE `pedido` (
  `ped_id` int(11) NOT NULL,
  `ped_data` date NOT NULL,
  `ped_endereco` varchar(140) DEFAULT NULL,
  `cli_id` int(11) NOT NULL,
  `fun_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pedido`
--

INSERT INTO `pedido` (`ped_id`, `ped_data`, `ped_endereco`, `cli_id`, `fun_id`) VALUES
(1, '2024-05-16', 'Rua exemplo', 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `produto`
--

CREATE TABLE `produto` (
  `pro_id` int(11) NOT NULL,
  `pro_nome` varchar(100) DEFAULT NULL,
  `pro_preco` decimal(6,2) DEFAULT NULL,
  `pro_quantidade` int(11) NOT NULL,
  `pro_limitacao` varchar(100) DEFAULT NULL,
  `pro_path1` varchar(256) NOT NULL,
  `pro_path2` varchar(256) NOT NULL,
  `sec_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`pro_id`, `pro_nome`, `pro_preco`, `pro_quantidade`, `pro_limitacao`, `pro_path1`, `pro_path2`, `sec_id`) VALUES
(1, 'Maçã', 5.00, 100, 'Nenhuma', '', '', 1),
(2, 'Banana', 7.00, 100, 'Nenhuma', './imgProds/banana.jpg', './imgProds/banana2.jpg', 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `reclamacoes`
--

CREATE TABLE `reclamacoes` (
  `rec_id` int(11) NOT NULL,
  `rec_texto` text NOT NULL,
  `cli_id` int(11) NOT NULL,
  `fun_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `secao`
--

CREATE TABLE `secao` (
  `sec_id` int(11) NOT NULL,
  `sec_nome` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `secao`
--

INSERT INTO `secao` (`sec_id`, `sec_nome`) VALUES
(1, 'Frutas'),
(2, 'Laticíneos');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`cli_id`);

--
-- Índices de tabela `funcionario`
--
ALTER TABLE `funcionario`
  ADD PRIMARY KEY (`Fun_id`);

--
-- Índices de tabela `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`ite_id`),
  ADD KEY `ped_id` (`ped_id`),
  ADD KEY `pro_id` (`pro_id`);

--
-- Índices de tabela `pedido`
--
ALTER TABLE `pedido`
  ADD PRIMARY KEY (`ped_id`),
  ADD KEY `cli_id` (`cli_id`),
  ADD KEY `fun_id` (`fun_id`);

--
-- Índices de tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`pro_id`),
  ADD KEY `sec_id` (`sec_id`);

--
-- Índices de tabela `reclamacoes`
--
ALTER TABLE `reclamacoes`
  ADD PRIMARY KEY (`rec_id`),
  ADD KEY `cli_id` (`cli_id`),
  ADD KEY `fun_id` (`fun_id`);

--
-- Índices de tabela `secao`
--
ALTER TABLE `secao`
  ADD PRIMARY KEY (`sec_id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `cli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `Fun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `item`
--
ALTER TABLE `item`
  MODIFY `ite_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `ped_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `reclamacoes`
--
ALTER TABLE `reclamacoes`
  MODIFY `rec_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `secao`
--
ALTER TABLE `secao`
  MODIFY `sec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`ped_id`) REFERENCES `pedido` (`ped_id`),
  ADD CONSTRAINT `item_ibfk_2` FOREIGN KEY (`pro_id`) REFERENCES `produto` (`pro_id`);

--
-- Restrições para tabelas `pedido`
--
ALTER TABLE `pedido`
  ADD CONSTRAINT `pedido_ibfk_1` FOREIGN KEY (`cli_id`) REFERENCES `cliente` (`cli_id`),
  ADD CONSTRAINT `pedido_ibfk_2` FOREIGN KEY (`fun_id`) REFERENCES `funcionario` (`Fun_id`);

--
-- Restrições para tabelas `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`sec_id`) REFERENCES `secao` (`sec_id`);

--
-- Restrições para tabelas `reclamacoes`
--
ALTER TABLE `reclamacoes`
  ADD CONSTRAINT `reclamacoes_ibfk_1` FOREIGN KEY (`cli_id`) REFERENCES `cliente` (`cli_id`),
  ADD CONSTRAINT `reclamacoes_ibfk_2` FOREIGN KEY (`fun_id`) REFERENCES `funcionario` (`Fun_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
