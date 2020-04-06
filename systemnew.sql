-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 07-Abr-2020 às 01:27
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `systemnew`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias`
--

CREATE TABLE `noticias` (
  `id` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `texto` text NOT NULL,
  `imagem` text NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `data` varchar(255) NOT NULL,
  `autor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `noticias`
--

INSERT INTO `noticias` (`id`, `titulo`, `descricao`, `texto`, `imagem`, `categoria`, `data`, `autor`) VALUES
(1, 'Primeira Notícia', 'Primeira descrição', 'Primeiro texto de notícia', 'noticia-a7505792229d3247436fa862d89d7b0d.jpg', '3', '1586213826', 'Nícollas Silva'),
(2, 'Segunda notícia', 'Esta é a descrição da segunda notícia', 'Notícia 2', 'noticia-4f1f97a986683e41792b91e9e2c43885.png', '5', '1586213896', 'Nicollas'),
(3, 'Testando notícia 3', 'Testando terceira notícia', 'Essa é a terceira notícia', 'noticia-e41f65a35978392a169547d856f28cb9.jpg', '4', '1586213756', 'Nicollas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `noticias_cat`
--

CREATE TABLE `noticias_cat` (
  `id` int(11) NOT NULL,
  `categoria` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `noticias_cat`
--

INSERT INTO `noticias_cat` (`id`, `categoria`) VALUES
(1, 'Esporte'),
(2, 'Mundo'),
(3, 'Novidades'),
(4, 'Política'),
(5, 'Fofocas');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `noticias_cat`
--
ALTER TABLE `noticias_cat`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `noticias_cat`
--
ALTER TABLE `noticias_cat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
