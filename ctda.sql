-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 23-Ago-2021 às 21:07
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 7.3.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `ctda`
--
CREATE DATABASE IF NOT EXISTS `ctda` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `ctda`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `groups`
--

CREATE TABLE `groups` (
  `id` mediumint(8) UNSIGNED NOT NULL,
  `name` varchar(20) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `groups`
--

INSERT INTO `groups` (`id`, `name`, `description`) VALUES
(1, 'admin', 'Administrator'),
(2, 'members', 'General User');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login_attempts`
--

CREATE TABLE `login_attempts` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `login` varchar(100) NOT NULL,
  `time` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `membros`
--

CREATE TABLE `membros` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `categoria` text NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `membros`
--

INSERT INTO `membros` (`id`, `nome`, `categoria`, `descricao`, `tipo`) VALUES
(6, 'Fábio Manoel França Lobato', 'Coordenador', 'Desc...', 1),
(7, 'Fernando Almeida', 'Pesquisador', 'desc...', 2),
(8, 'Outro', 'Colaborador', 'desc...', 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pagamento`
--

CREATE TABLE `pagamento` (
  `id` int(11) UNSIGNED NOT NULL,
  `descricao` varchar(100) DEFAULT NULL,
  `referencia_pedido` varchar(25) DEFAULT NULL,
  `codigo_transacao` varchar(50) DEFAULT NULL,
  `status_processamento_transacao` varchar(3) DEFAULT NULL,
  `forma_de_pagamento` varchar(20) DEFAULT NULL,
  `data_cadastro` date DEFAULT NULL,
  `ultima_atualizacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `link_boleto` longtext DEFAULT NULL,
  `id_user` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `pagamento`
--

INSERT INTO `pagamento` (`id`, `descricao`, `referencia_pedido`, `codigo_transacao`, `status_processamento_transacao`, `forma_de_pagamento`, `data_cadastro`, `ultima_atualizacao`, `link_boleto`, `id_user`) VALUES
(1, 'Estudantes de graduação e estudantes de escolas técnicas  + Mini Curso', '02043376233', 'B5A35D88-1B66-4939-BFF4-2DBD161F9A74', NULL, NULL, NULL, '2019-10-08 00:44:52', 'https://sandbox.pagseguro.uol.com.br/checkout/payment/booklet/print.jhtml?c=e2570ed4c17fe1a6a5e7a197a734412ac5a6570439412e99c85b563dd304d9b304c060d499118520', 1),
(2, 'Estudantes de graduação e estudantes de escolas técnicas  + Mini Curso', '02043376233', 'C853C415-D3CE-4447-952E-B5C8D691AC89', NULL, NULL, NULL, '2019-10-08 00:45:34', 'https://sandbox.pagseguro.uol.com.br/checkout/payment/booklet/print.jhtml?c=e10b51d8588209e4ec5787e1c88a5e502bae5bcd1fcd3b87c3ccce4698880a60daeeac581db08424', 1),
(3, 'Estudantes de graduação e estudantes de escolas técnicas  + Mini Curso', '02043376233', 'B599C035-3E93-4BB3-879B-BF8E82F90A20', NULL, NULL, NULL, '2019-10-08 00:46:31', 'https://sandbox.pagseguro.uol.com.br/checkout/payment/booklet/print.jhtml?c=3157f8ebc92a7212310b3d95b244b8a5b4919755abebafe64ad4cfadc17885ad47bd1ee7390a0c51', 1),
(4, 'Estudantes de graduação e estudantes de escolas técnicas  + Mini Curso', '02043376233', '461D29C5-8F6E-4811-B3C2-87D8C16A73F8', NULL, NULL, NULL, '2019-10-08 00:47:19', 'https://sandbox.pagseguro.uol.com.br/checkout/payment/booklet/print.jhtml?c=b27c30ad4e49eb020261fbd64d5314282e8d4dd7e0e2326de6601ff7693271863c102fa8aa9e15ff', 1),
(5, 'Estudantes de graduação e estudantes de escolas técnicas  + Mini Curso', '02043376233', 'D6325777-6BAD-4C91-AE5E-C4B4EA6147F8', NULL, NULL, NULL, '2019-10-08 00:51:16', 'https://sandbox.pagseguro.uol.com.br/checkout/payment/booklet/print.jhtml?c=f9b459fc083a341ed626f295f9de4f9d552c04db4043d7c47e8ed351fc3c143b4c7bff48dbdd6f5c', 1),
(6, 'Estudantes de graduação e estudantes de escolas técnicas  + Mini Curso', '02043376233', '98B9E292-7B37-4ADB-9BAB-FC6F583C9804', NULL, NULL, NULL, '2019-10-08 02:27:41', 'https://sandbox.pagseguro.uol.com.br/checkout/payment/booklet/print.jhtml?c=f271ae14b1beeea7d9c21ab7379053157273550f100492ced2639992b76c79b8987154c79c55c4a9', 1),
(7, 'Estudantes de graduação e estudantes de escolas técnicas  + Mini Curso', NULL, NULL, NULL, NULL, NULL, '2019-10-08 02:28:01', NULL, 1),
(12, 'Inscrição de professores e profissionais + Mini Curso', '02043376233', '74D14DAF-0731-437C-88FD-CBEF98BA8DB0', NULL, NULL, NULL, '2019-10-08 03:07:35', 'https://sandbox.pagseguro.uol.com.br/checkout/payment/booklet/print.jhtml?c=fd40133180b5271eeccc5f8ccd6775b74d64328628ee9e015a63faaf7c85af59e6bfa770f77b8c35', 1),
(13, 'Estudantes de graduação e estudantes de escolas técnicas  + Mini Curso', '02043376233', 'DE2137B8-4909-42E6-A146-823CCF2BF102', NULL, NULL, NULL, '2019-10-08 03:10:09', NULL, 1),
(14, 'Profissionais (professores, pesquisadores e técnicos', '02043376233', 'A454C21F-1270-4641-B3D2-7DC06FD76144', NULL, NULL, NULL, '2019-10-08 03:17:33', NULL, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `palestras_minicursos`
--

CREATE TABLE `palestras_minicursos` (
  `id` int(11) UNSIGNED NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `valor` decimal(10,2) NOT NULL,
  `area_tematica` varchar(200) NOT NULL,
  `tipo_atividade` varchar(100) NOT NULL,
  `vagas` int(3) NOT NULL,
  `autor` varchar(100) NOT NULL,
  `data` varchar(20) NOT NULL,
  `horario` varchar(20) NOT NULL,
  `local` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `palestras_minicursos`
--

INSERT INTO `palestras_minicursos` (`id`, `titulo`, `valor`, `area_tematica`, `tipo_atividade`, `vagas`, `autor`, `data`, `horario`, `local`) VALUES
(2, 'Formulação de rações para peixes de água doce', '0.00', 'Aquicultura', 'Minicurso', 18, 'Dr. Manuel Vazquez Vidal Junior', '18/11', 'Indefinido', 'Laboratório de informática ICED – Ufopa/Rondon'),
(3, 'Reação em cadeia polimerase: bases e aplicações para o diagnóstico do sexo genético na aquiculturar', '0.00', 'Aquicultura', 'Minicurso', 20, 'Dr. Marcos Antônio de Oliveira', '19/11', 'Indefinido', 'Laboratório de Biotecnologia Vegetal - IBEF/Tapajó'),
(4, 'Malacocultura', '0.00', 'Aquicultura', 'Minicurso', 35, 'Dr. Henrique Lavander', '19/11', 'Indefinido', 'sala 304 BMT '),
(5, 'Estresse e aquicultura', '0.00', 'Aquicultura', 'Minicurso', 35, 'Dr. Luciano de Oliveira Garcia', '18/11', 'Indefinido', 'sala 304 BMT '),
(6, 'Redação e publicação de artigos científicos', '0.00', 'Aquicultura', 'Minicurso', 35, 'Dra. Rosana Quaresma Maneschy', '19/11', 'Indefinido', 'sala 304 BMT'),
(7, 'Produção de Peixes Ornamentais ', '0.00', 'Aquicultura', 'Minicurso', 13, 'Marcelo Assano', '19/11', 'Indefinido', 'Ufopa'),
(8, 'Elaboração de projetos aquícolas', '0.00', 'Aquicultura', 'Minicurso', 35, 'Artur de Paula Cavalcante', '18/11', 'Indefinido', 'sala 302 BMT'),
(9, 'Estatística aplicada a aquicultura', '0.00', 'Aquicultura', 'Minicurso', 18, 'Dr. Paulo Brasil', '18/11', 'Indefinido', 'Laboratório de informática ICED – Ufopa/Rondo'),
(10, 'Hematologia em teleósteo: métodos de diagnóstico', '0.00', 'Aquicultura', 'Minicurso', 20, 'Dr. Gustavo Claudiano', '18/11', 'Indefinido', 'Laboratório de Biotecnologia Vegetal - IBEF/Tapajó'),
(11, 'COGUMELOS COMESTÍVEIS DA AMAZÔNIA', '0.00', 'Biologia', 'Minicurso', 20, 'Marcos Santana ', 'Indefinida', 'Indefinido', 'Indefinido'),
(12, 'ANALISE HIDROLÓGICA E DE USO E OCUPAÇÃO DE MICROBACIA HIDROGRÁFICA URBANA: O CASO DO IGARAPÉ URUMARI EM SANTARÉM-PA.', '0.00', 'Biologia', 'Minicurso', 20, 'Prof. Dr. Rodolfo Maduro', 'Indefinida', 'Indefinido', 'Indefinido'),
(13, 'PREPARO DE CERVEJAS ARTESANAIS', '0.00', 'Biologia', 'Minicurso', 20, 'Prof. Dr. João Vicente – Pesquisador INPA', 'Indefinida', 'Indefinido', 'Indefinido'),
(14, 'EXTRAÇÃO DE CIANOTOXINAS DE CIANOBACTÉRIAS', '0.00', 'Biologia', 'Minicurso', 10, 'MsC. Francisco Arimatéia Braga', 'Indefinida', 'Indefinido', 'Indefinido'),
(15, 'REDES DE SANEAMENTO', '0.00', 'Engenharias', 'Minicurso', 30, 'Prof. Dr. Marco Aurelio Holanda de Castro', 'Indefinida', 'Indefinido', 'Indefinido'),
(16, 'ENERGIA SOLAR', '0.00', 'Engenharias', 'Minicurso', 30, 'Eng. Symar Pontes ', 'Indefinida', 'Indefinido', 'Indefinido'),
(17, 'TERMOGRAFIA INFRAVERMELHO APLICADA A DIAGNÓSTICO TÉRMICO DE DIFERENTES ALVOS NA AVALIAÇÃO DE SERVIÇOS ECOSSISTÊMICOS NA AMAZÔNIA', '0.00', 'Engenharias', 'Minicurso', 30, 'Dra. Lucieta Guerreiro Martorano ', 'Indefinida', 'Indefinido', 'Indefinido'),
(18, 'COMBATE A INCÊNDIO', '0.00', 'Engenharias', 'Minicurso', 30, 'Prof. Dr. Hélio da Silva Almeida ', 'Indefinida', 'Indefinido', 'Indefinido'),
(19, 'DESENVOLVIMENTO WEB', '0.00', 'Computação', 'Minicurso', 18, 'Prof. Dr. Reginaldo dos Santos Cordeiro Filho', 'Indefinida', 'Indefinido', 'Indefinido'),
(20, 'SO LINUX', '0.00', 'Computação', 'Minicurso', 36, 'Prof. Dr. Reginaldo dos Santos Cordeiro Filho', 'Indefinida', 'Indefinido', 'Indefinido'),
(21, 'DESENVOLVIMENTO DE APLICAÇÃO UTILIZANDO JAVA E JFRAME, INTEGRADO A BANCO DE DADOS SQL', '0.00', 'Computação', 'Minicurso', 18, 'Alecsander Gonçalves de Matos - UFOPA Luis Antônio da Cruz Gomes ', 'Indefinida', 'Indefinido', 'Indefinido');

-- --------------------------------------------------------

--
-- Estrutura da tabela `resume`
--

CREATE TABLE `resume` (
  `id` int(11) NOT NULL,
  `contexto` varchar(500) CHARACTER SET utf8 NOT NULL,
  `motivacao` varchar(500) CHARACTER SET utf8 NOT NULL,
  `objetivos` varchar(500) CHARACTER SET utf8 NOT NULL,
  `produtos` varchar(500) CHARACTER SET utf8 NOT NULL,
  `coordenador` text CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `endereco` varchar(255) CHARACTER SET utf8 NOT NULL,
  `executora` varchar(100) CHARACTER SET utf8 NOT NULL,
  `keywords` varchar(100) CHARACTER SET utf8 NOT NULL,
  `fomento` text CHARACTER SET utf8 NOT NULL,
  `vigencia` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `resume`
--

INSERT INTO `resume` (`id`, `contexto`, `motivacao`, `objetivos`, `produtos`, `coordenador`, `email`, `endereco`, `executora`, `keywords`, `fomento`, `vigencia`) VALUES
(1, 'Trabalhos com as mais diversas finalidades têm sido realizados para analisar diferentes aspectos de uma rede social. Em um contexto mais específico e diferente da tradicional rede social de amigos, redes sociais profissionais podem representar colaborações (que muitas vezes visam lucro ou reconhecimento) e conter conhecimentos escondidos a respeito da interação dos seus integrantes. ', 'Métricas atuais consideram (em sua maioria) apenas propriedades topológicas para averiguar os relacionamentos sociais, o que não é suficiente para compreender as diferentes perspectivas da rede. Ou seja, é necessário considerar a semântica dos relacionamentos e o significado inerente de participação dos indivíduos nos mesmos.', 'O objetivo deste projeto é definir métricas semânticas com base nos dados de redes sociais visando diferentes aplicações e serviços para as mesmas. Suas metas incluem: (i) definir infraestrutura de banco de dados para gerenciar redes sociais de maneira inteligente; (ii) definir métricas para obter conhecimento sobre tais redes incluindo aspectos semânticos e variação temporal; e (iii) utilizar tais métricas para análises em domínios diferentes a fim de definir aplicações importantes a partir do ', 'São produtos esperados: artigos no estilo survey e com resultados de pesquisa, datasets e código publicamente disponíveis, interface de visualização dos resultados, vídeos no estilo pitch para difusão da ciência, dissertações e teses. ', 'Fábio Manoel França Lobato', 'fabio.lobato@ufopa.edu.br', 'Rua Vera Paz, 68040255, Santarém / PA, Brasil', 'Universidade Federal do Oeste do Pará, UFOPA', 'Bancos de Dados, Redes Sociais, Análise de Dados\r\nDatabases, Social Networks, Bibliometrics', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `submissoes`
--

CREATE TABLE `submissoes` (
  `id` int(11) UNSIGNED NOT NULL,
  `titulo` varchar(200) NOT NULL,
  `autor` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `tipotrabalho` varchar(100) NOT NULL,
  `areatematica` varchar(100) NOT NULL,
  `arquivo` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `submissoes`
--

INSERT INTO `submissoes` (`id`, `titulo`, `autor`, `email`, `tipotrabalho`, `areatematica`, `arquivo`, `status`, `id_user`) VALUES
(1, 'Trabalho Teste', 'João Santos', 'js@gmail.com', 'Artigo', 'Computação', 'teste.docx', 1, 5),
(3, 'asasas', 'asasa', 'sasas@hotmail.com', 'asas', 'sasas', 'asasas.pdf', 1, 4),
(4, 'Testando a submissão de trabalhos para o CTDA2019', 'Partipante fulano de tal', 'participante@fulanodetal.com', 'Resumo Simples', 'Aquicultura', 'Testando-a-submissão-de-trabalhos-para-o-CTDA2019.pdf', 1, 7),
(5, 'tttttt', 'Maria', 'maria@gmail.com', 'Artigo', 'Aquicultura', 'tttttt.pdf', 1, 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `username` varchar(100) DEFAULT NULL,
  `category` tinyint(1) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `email` varchar(254) NOT NULL,
  `activation_selector` varchar(255) DEFAULT NULL,
  `activation_code` varchar(255) DEFAULT NULL,
  `forgotten_password_selector` varchar(255) DEFAULT NULL,
  `forgotten_password_code` varchar(255) DEFAULT NULL,
  `forgotten_password_time` int(11) UNSIGNED DEFAULT NULL,
  `remember_selector` varchar(255) DEFAULT NULL,
  `remember_code` varchar(255) DEFAULT NULL,
  `created_on` int(11) UNSIGNED NOT NULL,
  `last_login` int(11) UNSIGNED DEFAULT NULL,
  `active` tinyint(1) UNSIGNED DEFAULT NULL,
  `first_name` varchar(50) DEFAULT NULL,
  `last_name` varchar(50) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `cpf` varchar(20) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `cidade` varchar(200) NOT NULL,
  `bairro` varchar(200) NOT NULL,
  `estado` varchar(25) NOT NULL,
  `cep` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `ip_address`, `username`, `category`, `password`, `salt`, `email`, `activation_selector`, `activation_code`, `forgotten_password_selector`, `forgotten_password_code`, `forgotten_password_time`, `remember_selector`, `remember_code`, `created_on`, `last_login`, `active`, `first_name`, `last_name`, `company`, `phone`, `cpf`, `endereco`, `cidade`, `bairro`, `estado`, `cep`) VALUES
(1, '127.0.0.1', 'administrator', NULL, '$2y$08$200Z6ZZbp3RAEXoaWcMA6uJOFicwNZaqk4oDhqTUiFXFe63MG.Daa', NULL, 'admin@admin.com', NULL, '', NULL, NULL, NULL, NULL, NULL, 1268889823, 1570420049, 1, 'Admin', 'istrator', 'ADMIN', '0', '', '', '', '', '', ''),
(2, '::1', 'Fabrício Almeida do Carmo', 1, '$2y$08$EL6c6WZjZv.HaxBJFSnjXOV8u79kJj7VwzUkb7tW9EX5BnWReZCVG', NULL, 'fabrycio30@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1570073173, 1570211450, 1, NULL, NULL, NULL, NULL, '', '', '', '', '', ''),
(3, '::1', 'Fernando', 2, '$2y$08$qo1HuBAa6bZpYoTiMOemd.Atn5X3KTk8sx3A6zsp8lOY1xIo8dJ26', NULL, 'tinhofernando44@gmail.com', NULL, '981b38693f3d39da43a137b4', NULL, NULL, NULL, NULL, NULL, 1570074149, 1570074205, 1, NULL, NULL, NULL, NULL, '', '', '', '', '', ''),
(4, '::1', 'Fabrício Almeida', 6, '$2y$08$PJDHBv105okc7JwJv9OdFeN1s0QfefxCp46h8voYJpUs4hqfbzUUq', NULL, 'fabrycio30@hotmail.com', NULL, 'da42b4643028e2cf6c84ebfa', NULL, NULL, NULL, NULL, NULL, 1570085919, 1570428454, 1, NULL, NULL, NULL, NULL, '', '', '', '', '', ''),
(5, '::1', 'Dev Vitrine Santarena', 4, '$2y$08$Ik73pDP/3exJfktWkzA4EudON/tYmI0Sd48PJjNGBfbH0d4Xl3JCy', NULL, 'dev@vitrinesantarena.com', NULL, '228ac6138df8b5cab6314069', NULL, NULL, NULL, NULL, NULL, 1570086618, 1570487670, 1, NULL, NULL, NULL, NULL, '02043376233', 'Rua Almirante Barroso', 'Santarém', 'Liberdade', 'PA', ''),
(6, '::1', 'Maria Carmo', 1, '$2y$08$GhrTF0SNOO/J6YLtcQvstO8/MRXdjTfK7Q8nPp7pRCqucFiC17SVG', NULL, 'maria@gmail.com', NULL, 'e56dda02af81a74843a31888', NULL, NULL, NULL, NULL, NULL, 1570422545, 1570499185, 1, NULL, NULL, NULL, NULL, '02043376233', 'Rua Almirante Barroso', 'Santarém', 'Liberdade', 'PA', '68040230'),
(7, '::1', 'Participante Teste', 1, '$2y$08$fPzRboSNdyl2LUtrlPgkxuKbXu6W0iIbX9cPapHPbCyf9eDY7L5bK', NULL, 'participante@ctda.com', NULL, '80f6d2838462fbc995348832', NULL, NULL, NULL, NULL, NULL, 1570437936, 1570437958, 1, NULL, NULL, NULL, NULL, '', '', '', '', '', ''),
(8, '', 'tinho', NULL, 'tinho123', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', '', ''),
(10, '::1', 'Fernando Almeida', NULL, '$2y$08$yyV5Mfr8Pdue1evhP/Ol9uCbpTDxXgQoxLlljxSIGqgr/yQ0EadGu', NULL, 'eutinho@gmail.com', NULL, 'fe4c8c9dc98378ff8bf8225f', NULL, NULL, NULL, NULL, NULL, 1627411450, 1628266881, 1, NULL, NULL, NULL, NULL, '', '', '', '', '', ''),
(11, '::1', 'Fernando Almeida', NULL, '$2y$08$nCjQlbxaKD79V4s/vVGU4ugI6wK6fAdXy2FPWJid13Jm/TX2DCsmu', NULL, 'eunanda@gmail.com', NULL, '4d023a80d5961a22dcc0c8a4', NULL, NULL, NULL, NULL, NULL, 1627614090, 1627614109, 1, NULL, NULL, NULL, NULL, '', '', '', '', '', ''),
(12, '::1', 'eu tinho', NULL, '$2y$08$yq.apMI0ioFRCKy0pkG6DeSLzuDPY8nSAheVtJ0KnGFpATIACNYKm', NULL, 'eee@gmail.com', NULL, 'e3fbb5a8ed8fa40cf07db714', NULL, NULL, NULL, NULL, NULL, 1627666775, NULL, 1, NULL, NULL, NULL, NULL, '', '', '', '', '', ''),
(13, '::1', 'ie fac', NULL, '$2y$08$aZFGlIv04365uyK.xMQoS.Sf2JXG2pEWFNt3X6wTLBzUA7yTH9L/.', NULL, 'www@gmail.com', NULL, '2a39bf870f9533ea2c233353', NULL, NULL, NULL, NULL, NULL, 1627667035, NULL, 1, NULL, NULL, NULL, NULL, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura da tabela `users_groups`
--

CREATE TABLE `users_groups` (
  `id` int(11) UNSIGNED NOT NULL,
  `user_id` int(11) UNSIGNED NOT NULL,
  `group_id` mediumint(8) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users_groups`
--

INSERT INTO `users_groups` (`id`, `user_id`, `group_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(3, 2, 2),
(4, 3, 2),
(5, 4, 2),
(6, 5, 2),
(7, 6, 2),
(8, 7, 2),
(9, 10, 1),
(10, 11, 1),
(11, 12, 1),
(12, 13, 1);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `login_attempts`
--
ALTER TABLE `login_attempts`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `membros`
--
ALTER TABLE `membros`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pagamento`
--
ALTER TABLE `pagamento`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `palestras_minicursos`
--
ALTER TABLE `palestras_minicursos`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `resume`
--
ALTER TABLE `resume`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `submissoes`
--
ALTER TABLE `submissoes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_email` (`email`),
  ADD UNIQUE KEY `uc_activation_selector` (`activation_selector`),
  ADD UNIQUE KEY `uc_forgotten_password_selector` (`forgotten_password_selector`),
  ADD UNIQUE KEY `uc_remember_selector` (`remember_selector`);

--
-- Índices para tabela `users_groups`
--
ALTER TABLE `users_groups`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uc_users_groups` (`user_id`,`group_id`),
  ADD KEY `fk_users_groups_users1_idx` (`user_id`),
  ADD KEY `fk_users_groups_groups1_idx` (`group_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `groups`
--
ALTER TABLE `groups`
  MODIFY `id` mediumint(8) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `login_attempts`
--
ALTER TABLE `login_attempts`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `membros`
--
ALTER TABLE `membros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de tabela `pagamento`
--
ALTER TABLE `pagamento`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `palestras_minicursos`
--
ALTER TABLE `palestras_minicursos`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de tabela `resume`
--
ALTER TABLE `resume`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `submissoes`
--
ALTER TABLE `submissoes`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de tabela `users_groups`
--
ALTER TABLE `users_groups`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `submissoes`
--
ALTER TABLE `submissoes`
  ADD CONSTRAINT `fk_users_submissoes` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Limitadores para a tabela `users_groups`
--
ALTER TABLE `users_groups`
  ADD CONSTRAINT `fk_users_groups_groups1` FOREIGN KEY (`group_id`) REFERENCES `groups` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_users_groups_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
