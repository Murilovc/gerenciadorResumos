-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 20/01/2022 às 03:51
-- Versão do servidor: 10.4.20-MariaDB
-- Versão do PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `projetoNove`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `avaliadores`
--

CREATE TABLE `avaliadores` (
  `id_avaliador` int(11) NOT NULL,
  `nome_avaliador` varchar(200) NOT NULL,
  `telefone` varchar(13) NOT NULL,
  `email` varchar(200) NOT NULL,
  `data_cadastro` datetime NOT NULL,
  `senha_avaliador` text NOT NULL,
  `instituicao_avaliador` varchar(45) NOT NULL,
  `termo_avaliador` text NOT NULL,
  `nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `avaliadores`
--

INSERT INTO `avaliadores` (`id_avaliador`, `nome_avaliador`, `telefone`, `email`, `data_cadastro`, `senha_avaliador`, `instituicao_avaliador`, `termo_avaliador`, `nivel`) VALUES
(31, 'Paulo Roberto', '68999886655', 'av2@email.com', '2021-12-19 15:50:12', '$2y$10$XCtsQJN1F5lfHadpku33k.H5Y1hoXzIb/bJl6WLwUvXsE0AzMtf4S', 'Teste 01', '', 3),
(32, 'João Avaliador', '68977441133', 'av1@email.com', '2021-12-22 08:31:08', '$2y$10$OgQc23dIKnmqRiBKNmYcD.SxtHF4Ja.mw3zJedPR2vV.H48g4AJM6', 'UFBA', '', 3),
(33, 'Antônio', '68944778811', 'av3@email.com', '2022-01-19 19:57:39', '$2y$10$jIKkVvFNyVknXYu53JDTOOj3Tg7txoj7KENmENMiSIi/Ll3wDzQ1G', 'UFAC', 'aceito', 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `reeducandos`
--

CREATE TABLE `reeducandos` (
  `id_reeducando` int(11) NOT NULL,
  `nome_reeducando` varchar(200) NOT NULL,
  `rgc_reeducando` int(11) NOT NULL,
  `data_cadastro` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `reeducandos`
--

INSERT INTO `reeducandos` (`id_reeducando`, `nome_reeducando`, `rgc_reeducando`, `data_cadastro`) VALUES
(3, 'Paulo Roberto da Silva', 12345, '2021-11-26 23:21:26'),
(4, 'Pedro Soares', 23444, '2021-11-30 10:42:59'),
(8, 'Antônio', 746525, '2022-01-19 20:05:51'),
(9, 'José', 746396, '2022-01-19 20:08:53');

-- --------------------------------------------------------

--
-- Estrutura para tabela `relatorios`
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
-- Despejando dados para a tabela `relatorios`
--

INSERT INTO `relatorios` (`id_relatorio`, `nota_conteudo`, `nota_estrutura`, `nota_ortografia`, `observacoes_relatorio`, `status_relatorio`, `id_rgc`, `id_avaliadores`, `id_resumo`, `data_cadastro`) VALUES
(7, 1.5, 2, 3, 'teste 2', '1', 12345, 32, 37, '2022-01-19 18:36:55'),
(8, 1.5, 2, 1.5, 'teste 3', '1', 23444, 32, 0, '2022-01-19 18:39:20'),
(9, 0.5, 1, 1, 'Testando', '1', 746525, 33, 0, '2022-01-19 18:55:06'),
(10, 3, 2, 1, 'Teste 2021', '2', 746396, 31, 0, '2022-01-19 19:32:36'),
(11, 5, 2, 3, 'tudo', '1', 12345, 32, 0, '2022-01-20 00:29:43'),
(12, 0.5, 0.5, 0.5, 'nada', '2', 12345, 32, 37, '2022-01-20 01:04:16'),
(13, 4, 2, 1, 'metades', '1', 12345, 32, 37, '2022-01-20 01:20:45'),
(14, 2, 1, 1.5, 'paulo', '1', 23444, 31, 0, '2022-01-20 01:53:47'),
(15, 1.5, 1, 1.5, 'av2 teste', '1', 23444, 31, 38, '2022-01-20 02:24:00'),
(16, 1.5, 0, 1, 'foi avaliado', '1', 23444, 31, 38, '2022-01-20 02:34:09');

-- --------------------------------------------------------

--
-- Estrutura para tabela `resumos`
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
-- Despejando dados para a tabela `resumos`
--

INSERT INTO `resumos` (`id_resumo`, `titulo`, `arquivo`, `comentario`, `data_cadastro`, `fk_id_escritor`, `fk_id_avaliador`) VALUES
(37, 'Teste1801', '96966a9a188f043e11b6fce48dc9670eLorem Ipsum.pdf', NULL, '2022-01-19 04:45:05', 3, 32),
(38, 'Teste estágio', '4b5b666e82a69ba81da244a92657b3c8termocompromisso.pdf', NULL, '2022-01-20 01:47:53', 4, 31);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
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
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome_usuario`, `email_usuario`, `senha_usuario`, `nivel_usuario`, `data_cadastro`) VALUES
(12, 'Fred', 'adm@adm.com', '$2y$10$xWIIycOFPhUVJDxIYODcP..2A7BtQql8QWBZdbBlzHQdLshpuXMVC', 0, '2022-01-18 23:31:15'),
(13, 'Fred Tavares', 'diretor@gmail.com', '$2y$10$qJwMyVYp2/Alt5fGpDV0GORsbkh/7RmXrKCg0bQ.ucEA9kCYz5D.6', 4, '2022-01-20 01:23:12'),
(14, 'Rafael Tavares', 'estagiario@hotmail.com', '$2y$10$Pw4r3tckaXWVfiYM/ssw3eBqoMTc4rLkMnUMq5s.M7gfQNN1jE7aK', 1, '2022-01-20 01:45:42');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `avaliadores`
--
ALTER TABLE `avaliadores`
  ADD PRIMARY KEY (`id_avaliador`);

--
-- Índices de tabela `reeducandos`
--
ALTER TABLE `reeducandos`
  ADD PRIMARY KEY (`id_reeducando`);

--
-- Índices de tabela `relatorios`
--
ALTER TABLE `relatorios`
  ADD PRIMARY KEY (`id_relatorio`);

--
-- Índices de tabela `resumos`
--
ALTER TABLE `resumos`
  ADD PRIMARY KEY (`id_resumo`),
  ADD KEY `fk_redacao_escritor` (`fk_id_escritor`),
  ADD KEY `fk_redacao_avaliador` (`fk_id_avaliador`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avaliadores`
--
ALTER TABLE `avaliadores`
  MODIFY `id_avaliador` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `reeducandos`
--
ALTER TABLE `reeducandos`
  MODIFY `id_reeducando` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de tabela `relatorios`
--
ALTER TABLE `relatorios`
  MODIFY `id_relatorio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de tabela `resumos`
--
ALTER TABLE `resumos`
  MODIFY `id_resumo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `resumos`
--
ALTER TABLE `resumos`
  ADD CONSTRAINT `fk_redacao_avaliador` FOREIGN KEY (`fk_id_avaliador`) REFERENCES `avaliadores` (`id_avaliador`),
  ADD CONSTRAINT `fk_redacao_escritor` FOREIGN KEY (`fk_id_escritor`) REFERENCES `reeducandos` (`id_reeducando`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
