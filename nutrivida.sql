-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 24/10/2024 às 12:25
-- Versão do servidor: 10.4.25-MariaDB
-- Versão do PHP: 8.1.10

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `cliente`
--

INSERT INTO `cliente` (`cli_id`, `cli_nome`, `cli_email`, `cli_telefone`, `cli_senha`) VALUES
(1, 'Caio Henrique Marioto de Moraes', 'caiomarioto9@gmail.com', '(12)99663-0970', '12345'),
(3, 'Pedro dos Santos', 'pedrosantos@gmail.com', '(22)22222-2222', 'pedro123');

-- --------------------------------------------------------

--
-- Estrutura para tabela `funcionario`
--

CREATE TABLE `funcionario` (
  `Fun_id` int(11) NOT NULL,
  `Fun_nome` varchar(256) NOT NULL,
  `Fun_Email` varchar(140) NOT NULL,
  `Fun_Telefone` varchar(14) NOT NULL,
  `fun_senha` varchar(16) NOT NULL,
  `fun_status` enum('Online','Offline') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `funcionario`
--

INSERT INTO `funcionario` (`Fun_id`, `Fun_nome`, `Fun_Email`, `Fun_Telefone`, `fun_senha`, `fun_status`) VALUES
(1, 'Joao', 'joao@gmail.com', '(12)99888-0999', '123', 'Online'),
(2, 'Isabela', 'isabela@gmail.com', '(33)33333-3333', '123', 'Offline');

-- --------------------------------------------------------

--
-- Estrutura para tabela `item`
--

CREATE TABLE `item` (
  `ite_id` int(11) NOT NULL,
  `ite_quantidade` int(11) NOT NULL,
  `ped_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Acionadores `item`
--
DELIMITER $$
CREATE TRIGGER `ins_venda` AFTER INSERT ON `item` FOR EACH ROW UPDATE produto SET produto.pro_quantidade = produto.pro_quantidade - new.ite_quantidade WHERE produto.pro_id = new.pro_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `limitacao`
--

CREATE TABLE `limitacao` (
  `lim_id` int(11) NOT NULL,
  `lim_nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `produto`
--

INSERT INTO `produto` (`pro_id`, `pro_nome`, `pro_preco`, `pro_quantidade`, `pro_limitacao`, `pro_path1`, `pro_path2`, `sec_id`) VALUES
(2, 'Banana', '7.70', 1099, 'Nenhuma', './imgProds/banana.jpg', './imgProds/banana2.jpg', 1),
(3, 'Ovo Branco', '10.00', 40, 'Nutrientes', './imgProds/ovos.png', './imgProds/ovos.2.jpg', 3),
(4, 'Ovo Caipira', '12.00', 50, 'Alergia ao ovo e Veganos', './imgProds/ovocaipira2.avif', './imgProds/ovoscaipira.webp', 3),
(5, 'Ovos de codorna ', '15.00', 35, 'Alergia ao ovo e Veganos', './imgProds/ovosdecodorna.jpg', './imgProds/ovodecodorna2.jpg', 3),
(6, 'Achocolatado', '9.00', 200, 'Diabetes', './imgProds/achocolatado.png', './imgProds/achocolatado1.jpg', 4);

-- --------------------------------------------------------

--
-- Estrutura para tabela `prolim`
--

CREATE TABLE `prolim` (
  `prl_id` int(11) NOT NULL,
  `pro_id` int(11) NOT NULL,
  `lim_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `promocao`
--

CREATE TABLE `promocao` (
  `prm_id` int(11) NOT NULL,
  `prm_desconto` int(11) NOT NULL,
  `prm_data` date NOT NULL,
  `pro_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `promocao`
--

INSERT INTO `promocao` (`prm_id`, `prm_desconto`, `prm_data`, `pro_id`) VALUES
(21, 10, '2024-10-24', 2);

--
-- Acionadores `promocao`
--
DELIMITER $$
CREATE TRIGGER `delete_promocao` BEFORE DELETE ON `promocao` FOR EACH ROW BEGIN
    UPDATE produto 
    SET produto.pro_preco = produto.pro_preco / (1 + OLD.prm_desconto / 100)
    WHERE produto.pro_id = OLD.pro_id;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `ins_promocao` AFTER INSERT ON `promocao` FOR EACH ROW BEGIN
    UPDATE produto 
    SET produto.pro_preco = produto.pro_preco * (1 + NEW.prm_desconto / 100)
    WHERE produto.pro_id = NEW.pro_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estrutura para tabela `reclamacoes`
--

CREATE TABLE `reclamacoes` (
  `rec_id` int(11) NOT NULL,
  `rec_texto` text NOT NULL,
  `cli_id` int(11) NOT NULL,
  `fun_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura para tabela `secao`
--

CREATE TABLE `secao` (
  `sec_id` int(11) NOT NULL,
  `sec_nome` varchar(140) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Despejando dados para a tabela `secao`
--

INSERT INTO `secao` (`sec_id`, `sec_nome`) VALUES
(1, 'Frutas'),
(2, 'Laticíneos'),
(3, 'Ovos'),
(4, 'Achocolatado');

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
-- Índices de tabela `limitacao`
--
ALTER TABLE `limitacao`
  ADD PRIMARY KEY (`lim_id`);

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
-- Índices de tabela `prolim`
--
ALTER TABLE `prolim`
  ADD PRIMARY KEY (`prl_id`),
  ADD KEY `pro_id` (`pro_id`),
  ADD KEY `lim_id` (`lim_id`);

--
-- Índices de tabela `promocao`
--
ALTER TABLE `promocao`
  ADD PRIMARY KEY (`prm_id`),
  ADD KEY `pro_id` (`pro_id`);

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
  MODIFY `cli_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `funcionario`
--
ALTER TABLE `funcionario`
  MODIFY `Fun_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `item`
--
ALTER TABLE `item`
  MODIFY `ite_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `limitacao`
--
ALTER TABLE `limitacao`
  MODIFY `lim_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `pedido`
--
ALTER TABLE `pedido`
  MODIFY `ped_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `pro_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `prolim`
--
ALTER TABLE `prolim`
  MODIFY `prl_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `promocao`
--
ALTER TABLE `promocao`
  MODIFY `prm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `reclamacoes`
--
ALTER TABLE `reclamacoes`
  MODIFY `rec_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `secao`
--
ALTER TABLE `secao`
  MODIFY `sec_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
-- Restrições para tabelas `prolim`
--
ALTER TABLE `prolim`
  ADD CONSTRAINT `prolim_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `produto` (`pro_id`),
  ADD CONSTRAINT `prolim_ibfk_2` FOREIGN KEY (`lim_id`) REFERENCES `limitacao` (`lim_id`);

--
-- Restrições para tabelas `promocao`
--
ALTER TABLE `promocao`
  ADD CONSTRAINT `promocao_ibfk_1` FOREIGN KEY (`pro_id`) REFERENCES `produto` (`pro_id`);

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
