-- phpMyAdmin SQL Dump
-- version 4.5.2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Tempo de geração: 07/01/2021 às 14:06
-- Versão do servidor: 10.1.10-MariaDB
-- Versão do PHP: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `biblioteca`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `alunos`
--

CREATE TABLE `alunos` (
  `id_aluno` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `rua` varchar(255) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `cep` varchar(100) NOT NULL,
  `turma` varchar(10) NOT NULL,
  `serie` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `alunos`
--

INSERT INTO `alunos` (`id_aluno`, `nome`, `rua`, `numero`, `cidade`, `bairro`, `estado`, `cep`, `turma`, `serie`) VALUES
(8, 'Joao Victo Sousa da Silva', 'Rua João Inácio', '91', 'Pacatuba', 'Jacho', 'CE', '61800780', 'B', '5'),
(12, 'jhfgjfgjf', 'Rua João Inácio', '56456', 'Pacatuba', 'Alto São João', 'CE', '61800780', 'B', '2'),
(13, 'hjhjghj', 'Rua João Inácio', '645645', 'Pacatuba', 'Alto São João', 'CE', '61800780', 'C', '2');

-- --------------------------------------------------------

--
-- Estrutura para tabela `emprestimos`
--

CREATE TABLE `emprestimos` (
  `id_emprestimo` int(11) NOT NULL,
  `id_aluno_fk` int(11) NOT NULL,
  `id_livro_fk` int(11) NOT NULL,
  `data_emprestimo` varchar(12) NOT NULL,
  `data_devolucao` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `fila_de_espera`
--

CREATE TABLE `fila_de_espera` (
  `id_fila_de_espera` int(11) NOT NULL,
  `id_aluno_fk` int(11) NOT NULL,
  `id_livro_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `fila_de_espera`
--

INSERT INTO `fila_de_espera` (`id_fila_de_espera`, `id_aluno_fk`, `id_livro_fk`) VALUES
(1, 12, 3);

-- --------------------------------------------------------

--
-- Estrutura para tabela `livros`
--

CREATE TABLE `livros` (
  `id_livro` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `cdd` varchar(255) NOT NULL,
  `data_publicacao` varchar(20) NOT NULL,
  `editora` varchar(255) NOT NULL,
  `local` varchar(255) NOT NULL,
  `estante` varchar(255) NOT NULL,
  `disponivel` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `livros`
--

INSERT INTO `livros` (`id_livro`, `titulo`, `autor`, `cdd`, `data_publicacao`, `editora`, `local`, `estante`, `disponivel`) VALUES
(1, 'Ultimos dias de krypton', 'Kevin J. Anderson', '5552485245', '12/10/2014', 'Leya', 'São Paulo', '13', 'Sim'),
(3, 'Wayne de Ghotan', 'Kevin J. Anderson', '88748788', '26/09/2020', 'leya', 'jacho', '4', 'Sim'),
(4, 'Alyce no pais das maravilhas', 'desconhecido', '454415', '23/06/2015', 'forceByBooks', 'sei la tbm', '10', 'Sim');

-- --------------------------------------------------------

--
-- Estrutura para tabela `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Fazendo dump de dados para tabela `login`
--

INSERT INTO `login` (`id`, `user`, `senha`) VALUES
(1, 'Admin', 'admin');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `alunos`
--
ALTER TABLE `alunos`
  ADD PRIMARY KEY (`id_aluno`);

--
-- Índices de tabela `emprestimos`
--
ALTER TABLE `emprestimos`
  ADD PRIMARY KEY (`id_emprestimo`),
  ADD KEY `id_aluno_fk` (`id_aluno_fk`),
  ADD KEY `id_livro_fk` (`id_livro_fk`);

--
-- Índices de tabela `fila_de_espera`
--
ALTER TABLE `fila_de_espera`
  ADD PRIMARY KEY (`id_fila_de_espera`),
  ADD KEY `id_aluno_fk` (`id_aluno_fk`),
  ADD KEY `id_livro_fk` (`id_livro_fk`);

--
-- Índices de tabela `livros`
--
ALTER TABLE `livros`
  ADD PRIMARY KEY (`id_livro`);

--
-- Índices de tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `alunos`
--
ALTER TABLE `alunos`
  MODIFY `id_aluno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de tabela `emprestimos`
--
ALTER TABLE `emprestimos`
  MODIFY `id_emprestimo` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de tabela `fila_de_espera`
--
ALTER TABLE `fila_de_espera`
  MODIFY `id_fila_de_espera` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `livros`
--
ALTER TABLE `livros`
  MODIFY `id_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `emprestimos`
--
ALTER TABLE `emprestimos`
  ADD CONSTRAINT `emprestimos_ibfk_1` FOREIGN KEY (`id_aluno_fk`) REFERENCES `alunos` (`id_aluno`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `emprestimos_ibfk_2` FOREIGN KEY (`id_livro_fk`) REFERENCES `livros` (`id_livro`);

--
-- Restrições para tabelas `fila_de_espera`
--
ALTER TABLE `fila_de_espera`
  ADD CONSTRAINT `fila_de_espera_ibfk_1` FOREIGN KEY (`id_aluno_fk`) REFERENCES `alunos` (`id_aluno`),
  ADD CONSTRAINT `fila_de_espera_ibfk_2` FOREIGN KEY (`id_livro_fk`) REFERENCES `livros` (`id_livro`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
