-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 14-Jun-2022 às 07:31
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `gerenciador_resumos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliadores`
--

CREATE TABLE `avaliadores` (
  `id_avaliador` int(11) NOT NULL,
  `nome_avaliador` varchar(200) NOT NULL,
  `telefone` varchar(13) NOT NULL,
  `email` varchar(200) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `senha_avaliador` text NOT NULL,
  `instituicao_avaliador` varchar(45) NOT NULL,
  `termo_avaliador` text DEFAULT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `avaliadores`
--

INSERT INTO `avaliadores` (`id_avaliador`, `nome_avaliador`, `telefone`, `email`, `data_cadastro`, `senha_avaliador`, `instituicao_avaliador`, `termo_avaliador`, `nivel`) VALUES
(34, 'Avaliador', '68786578678', 'avaliador@gmail.com', '2022-06-12 23:39:18', '$2y$10$MYKpgHmc72E1pc4OcphbaOuuil4IZFgx9Y7Vu1IwgEc52c.x9uqAi', 'UFAC', NULL, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reeducandos`
--

CREATE TABLE `reeducandos` (
  `id_reeducando` int(11) NOT NULL,
  `nome_reeducando` varchar(200) NOT NULL,
  `rgc_reeducando` int(11) NOT NULL,
  `data_cadastro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `reeducandos`
--

INSERT INTO `reeducandos` (`id_reeducando`, `nome_reeducando`, `rgc_reeducando`, `data_cadastro`) VALUES
(10, 'João', 1234, '2022-06-14 00:04:40');

-- --------------------------------------------------------

--
-- Estrutura da tabela `relatorios`
--

CREATE TABLE `relatorios` (
  `id_relatorio` int(11) NOT NULL,
  `nota_conteudo` float NOT NULL,
  `nota_estrutura` float NOT NULL,
  `nota_ortografia` float NOT NULL,
  `observacoes_relatorio` text NOT NULL,
  `status_relatorio` varchar(15) NOT NULL,
  `id_rgc` int(11) NOT NULL,
  `id_avaliadores` int(11) NOT NULL,
  `id_resumo` int(11) NOT NULL,
  `data_cadastro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `relatorios`
--

INSERT INTO `relatorios` (`id_relatorio`, `nota_conteudo`, `nota_estrutura`, `nota_ortografia`, `observacoes_relatorio`, `status_relatorio`, `id_rgc`, `id_avaliadores`, `id_resumo`, `data_cadastro`) VALUES
(18, 3, 2, 2, 'Teste', '1', 1234, 34, 39, '2022-06-14 00:26:45');

-- --------------------------------------------------------

--
-- Estrutura da tabela `resumos`
--

CREATE TABLE `resumos` (
  `id_resumo` int(11) NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `arquivo` text NOT NULL,
  `comentario` text DEFAULT NULL,
  `data_cadastro` datetime NOT NULL,
  `fk_id_escritor` int(11) NOT NULL,
  `fk_id_avaliador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `resumos`
--

INSERT INTO `resumos` (`id_resumo`, `titulo`, `arquivo`, `comentario`, `data_cadastro`, `fk_id_escritor`, `fk_id_avaliador`) VALUES
(39, 'O Melhor de Mim', '8d1b448a0eadc095764944f6d1cd18bfcalendarioacademicoere2021.pdf', NULL, '2022-06-14 00:06:09', 10, 34);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nome_usuario` varchar(60) NOT NULL,
  `email_usuario` varchar(150) NOT NULL,
  `senha_usuario` text NOT NULL,
  `nivel_usuario` int(11) NOT NULL,
  `data_cadastro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome_usuario`, `email_usuario`, `senha_usuario`, `nivel_usuario`, `data_cadastro`) VALUES
(15, 'Diretor', 'diretor@gmail.com', '$2y$10$zZ./O2G3dNy.5ConRp/jH.PjJeBQD2y.jqbtLHAgCifrGNWZAXpHO', 4, '2022-06-13 23:10:49'),
(16, 'Estagiário', 'estagiario@gmail.com', '$2y$10$7LkB687iEGu2m4KLPGLFHeWukBf5.qTqQ90mI2Wr9SCOhRuGVvBAO', 1, '2022-06-13 23:27:15'),
(17, 'Administrador', 'administrador@gmail.com', '$2y$10$tn5sYzw9bVUjXpg.WlhSk.R5qc/jElMye0pthU4q9ay5jQzHVwYdi', 0, '2022-06-13 23:27:55');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `avaliadores`
--
ALTER TABLE `avaliadores`
  ADD PRIMARY KEY (`id_avaliador`);

--
-- Índices para tabela `reeducandos`
--
ALTER TABLE `reeducandos`
  ADD PRIMARY KEY (`id_reeducando`);

--
-- Índices para tabela `relatorios`
--
ALTER TABLE `relatorios`
  ADD PRIMARY KEY (`id_relatorio`);

--
-- Índices para tabela `resumos`
--
ALTER TABLE `resumos`
  ADD PRIMARY KEY (`id_resumo`),
  ADD KEY `fk_redacao_escritor` (`fk_id_escritor`),
  ADD KEY `fk_redacao_avaliador` (`fk_id_avaliador`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avaliadores`
--
ALTER TABLE `avaliadores`
  MODIFY `id_avaliador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `reeducandos`
--
ALTER TABLE `reeducandos`
  MODIFY `id_reeducando` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `relatorios`
--
ALTER TABLE `relatorios`
  MODIFY `id_relatorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `resumos`
--
ALTER TABLE `resumos`
  MODIFY `id_resumo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `resumos`
--
ALTER TABLE `resumos`
  ADD CONSTRAINT `fk_redacao_avaliador` FOREIGN KEY (`fk_id_avaliador`) REFERENCES `avaliadores` (`id_avaliador`),
  ADD CONSTRAINT `fk_redacao_escritor` FOREIGN KEY (`fk_id_escritor`) REFERENCES `reeducandos` (`id_reeducando`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
