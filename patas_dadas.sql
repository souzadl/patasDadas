-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: 04-Jul-2018 às 17:22
-- Versão do servidor: 10.2.14-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `patas_dadas`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `acoes`
--

DROP TABLE IF EXISTS `acoes`;
CREATE TABLE IF NOT EXISTS `acoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `acoes`
--

INSERT INTO `acoes` (`id`, `nome`) VALUES
(1, 'add'),
(2, 'edit'),
(3, 'delete'),
(4, 'view'),
(7, 'index');

-- --------------------------------------------------------

--
-- Estrutura da tabela `adotaveis`
--

DROP TABLE IF EXISTS `adotaveis`;
CREATE TABLE IF NOT EXISTS `adotaveis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `porte` char(1) NOT NULL,
  `sexo` char(1) NOT NULL,
  `data_nascimento` date NOT NULL,
  `vacinado` tinyint(1) NOT NULL,
  `vermifugado` tinyint(1) NOT NULL,
  `castrado` tinyint(1) NOT NULL,
  `temperamento` varchar(255) DEFAULT NULL,
  `descricao_site` text DEFAULT NULL,
  `historico_medico` text DEFAULT NULL,
  `url_facebook` varchar(255) DEFAULT NULL,
  `url_intagram` varchar(255) DEFAULT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `users_id` int(11) NOT NULL,
  `tipos_adotaveis_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome` (`nome`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `adotaveis`
--

INSERT INTO `adotaveis` (`id`, `nome`, `porte`, `sexo`, `data_nascimento`, `vacinado`, `vermifugado`, `castrado`, `temperamento`, `descricao_site`, `historico_medico`, `url_facebook`, `url_intagram`, `created`, `modified`, `active`, `users_id`, `tipos_adotaveis_id`) VALUES
(1, 'Tablito', '0', '0', '0000-00-00', 1, 1, 1, '', '', '', '', '', '2018-06-21 20:21:51', '2018-06-21 20:48:01', 1, 16, 3),
(2, 'Tokio', 'M', 'F', '2018-07-04', 1, 1, 0, '', 'Eu sou a Tokio! Fui resgatada ainda mancando pelos voluntários pois havia sido atropelada. Mas depois de uma cirurgia, fisioterapia e acupuntura eu estou ótimo! Corro e brinco muito, e adoro fazer folia com os voluntários e outros cães! Me leva pra casa pra gente se divertir bastante?', 'Deve ser feito limpeza do ferimento todo os dias.\r\n\r\nForam realizados exames para descobrir a causa da falta de apetite.teste\r\n\r\n22/06/2018 12:25:35\r\nOutro teste\r\n\r\n22/06/2018 12:29:12Diego Lemos de Souzaa\r\nMais um teste\r\n\r\n22/06/2018 12:31:21 - Diego Lemos de Souzaa\r\nOutro teste\r\n\r\n22/06/2018 12:38:12 - Diego Lemos de Souzaa\r\nTeste de hora', '', 'https://www.instagram.com/tokiodopatas/', '2018-06-29 18:48:26', '2018-07-04 15:57:57', 1, 16, 3),
(3, 'Teste', 'P', 'M', '0000-00-00', 0, 0, 0, '', '', NULL, '', '', '2018-06-29 19:27:28', '2018-06-29 19:27:28', 0, 16, 3),
(4, 'Fulano', 'P', 'M', '0000-00-00', 0, 0, 0, '', '', NULL, '', '', '2018-06-22 17:13:02', '2018-06-22 17:13:02', 0, 16, 3),
(5, 'Filó', 'G', 'F', '2016-07-02', 0, 0, 0, '', '', '\r\n\r\n22/06/2018 20:03:47 - Diego Lemos de Souzaa\r\nteste', '', '', '2018-07-03 11:33:09', '2018-07-03 11:34:12', 0, 16, 3),
(6, 'Outro teste', 'P', 'M', '0000-00-00', 0, 0, 0, '', '', NULL, '', '', '2018-06-22 20:17:55', '2018-06-22 20:17:55', 0, 16, 3),
(12, 'teste cachorro', 'P', 'M', '0000-00-00', 0, 0, 0, '', '', NULL, '', '', '2018-06-25 22:01:43', '2018-06-25 22:01:43', 0, 16, 3),
(13, 'teste gato', 'P', 'M', '0000-00-00', 0, 0, 0, '', '', NULL, '', '', '2018-06-25 22:05:38', '2018-06-25 22:05:38', 0, 16, 11),
(14, 'teste cão 2', 'P', 'M', '0000-00-00', 0, 0, 0, '', '', NULL, '', '', '2018-06-25 22:49:40', '2018-06-25 23:40:40', 0, 16, 3),
(15, 'Tokio 2', 'P', 'F', '0000-00-00', 0, 0, 0, '', '', NULL, '', '', '2018-06-25 23:13:44', '2018-06-25 23:13:44', 0, 16, 3),
(16, 'Teste auditoria', 'P', 'M', '2018-07-03', 0, 0, 0, '', '', NULL, '', '', '2018-07-03 11:34:46', '2018-07-03 11:35:10', 0, 16, 3);

-- --------------------------------------------------------

--
-- Estrutura da tabela `controles`
--

DROP TABLE IF EXISTS `controles`;
CREATE TABLE IF NOT EXISTS `controles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `controles`
--

INSERT INTO `controles` (`id`, `nome`) VALUES
(1, 'Users'),
(2, 'Adotaveis'),
(3, 'TiposAdotaveis'),
(4, 'TiposPadrinhos'),
(5, 'Pessoas');

-- --------------------------------------------------------

--
-- Estrutura da tabela `fotos`
--

DROP TABLE IF EXISTS `fotos`;
CREATE TABLE IF NOT EXISTS `fotos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `adotaveis_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=30 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `fotos`
--

INSERT INTO `fotos` (`id`, `nome`, `active`, `created`, `modified`, `adotaveis_id`, `users_id`) VALUES
(27, '6a4d703d-c1b6-441d-b14c-c3f973858d15.jpg', 1, '2018-07-04 15:57:57', '2018-07-04 15:57:57', 2, 16),
(28, '04ef0cca-366c-4e09-8e08-60aa94ebbeb9.jpg', 1, '2018-07-04 15:57:57', '2018-07-04 15:57:57', 2, 16),
(29, '1655b64d-4379-48d6-9fc6-9d7989956f95.jpg', 1, '2018-07-04 15:57:57', '2018-07-04 15:57:57', 2, 16),
(18, 'd0d0022a-fb42-450f-a648-b92d6d94f8bb.jpg', 1, '2018-06-25 23:13:44', '2018-06-25 23:13:44', 15, 16),
(19, '4f56b7cb-e5ae-4a8f-90aa-90e240f7d77e.jpg', 1, '2018-06-25 23:13:44', '2018-06-25 23:13:44', 15, 16),
(20, 'f3e4bed5-cddf-48f1-b5ba-e78d75fdb3ae.jpg', 1, '2018-06-25 23:13:44', '2018-06-25 23:13:44', 15, 16),
(21, '30ae6de4-eb28-4612-bf2f-ed212d671563.jpg', 1, '2018-06-29 19:11:04', '2018-06-29 19:11:04', 3, 16),
(22, '1302601a-0d98-48e2-87f0-64520ee5fa59.jpg', 1, '2018-06-29 19:11:04', '2018-06-29 19:11:04', 3, 16),
(23, '3a313ffd-f9bb-422b-8607-8c43f02cbc54.jpg', 1, '2018-06-29 19:11:04', '2018-06-29 19:11:04', 3, 16),
(24, 'e057ba16-d041-48ad-832c-3c865be7b801.jpg', 1, '2018-06-29 19:11:49', '2018-06-29 19:11:49', 3, 16),
(25, 'f17048cc-651f-4718-a85f-a4b88e09aba0.jpg', 1, '2018-06-29 19:11:49', '2018-06-29 19:11:49', 3, 16),
(26, '16a08159-6bbe-411a-aa49-fee27e410bad.jpg', 1, '2018-06-29 19:11:49', '2018-06-29 19:11:49', 3, 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `padrinhos`
--

DROP TABLE IF EXISTS `padrinhos`;
CREATE TABLE IF NOT EXISTS `padrinhos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pessoas_id` int(11) NOT NULL,
  `adotaveis_id` int(11) NOT NULL,
  `tipos_padrinhos_id` int(11) NOT NULL,
  `created` timestamp NULL DEFAULT NULL,
  `modified` timestamp NULL DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=101 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `padrinhos`
--

INSERT INTO `padrinhos` (`id`, `pessoas_id`, `adotaveis_id`, `tipos_padrinhos_id`, `created`, `modified`, `active`, `users_id`) VALUES
(96, 36, 3, 6, '2018-06-29 19:27:28', '2018-06-29 19:27:28', 1, 16),
(95, 36, 3, 5, '2018-06-29 19:27:28', '2018-06-29 19:27:28', 1, 16),
(97, 36, 2, 5, '2018-07-04 15:09:00', '2018-07-04 15:57:57', 1, 16),
(98, 28, 2, 6, '2018-07-04 15:09:00', '2018-07-04 15:57:57', 1, 16),
(99, 36, 2, 7, '2018-07-04 15:09:00', '2018-07-04 15:57:57', 1, 16),
(100, 28, 2, 8, '2018-07-04 15:09:00', '2018-07-04 15:57:57', 1, 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissoes_roles`
--

DROP TABLE IF EXISTS `permissoes_roles`;
CREATE TABLE IF NOT EXISTS `permissoes_roles` (
  `acoes_id` int(11) NOT NULL,
  `controles_id` int(11) NOT NULL,
  `roles_id` int(11) NOT NULL,
  PRIMARY KEY (`acoes_id`,`controles_id`,`roles_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `permissoes_roles`
--

INSERT INTO `permissoes_roles` (`acoes_id`, `controles_id`, `roles_id`) VALUES
(1, 1, 1),
(1, 1, 5),
(1, 2, 1),
(1, 2, 5),
(1, 3, 1),
(1, 3, 5),
(1, 4, 1),
(1, 4, 5),
(1, 5, 1),
(1, 5, 5),
(2, 1, 1),
(2, 1, 5),
(2, 2, 1),
(2, 2, 5),
(2, 3, 1),
(2, 3, 5),
(2, 4, 1),
(2, 4, 5),
(2, 5, 1),
(2, 5, 5),
(3, 1, 5),
(3, 2, 5),
(3, 3, 5),
(3, 4, 5),
(3, 5, 1),
(3, 5, 5),
(4, 1, 1),
(4, 1, 2),
(4, 1, 5),
(4, 2, 1),
(4, 2, 2),
(4, 2, 5),
(4, 3, 1),
(4, 3, 2),
(4, 3, 5),
(4, 4, 1),
(4, 4, 2),
(4, 4, 5),
(4, 5, 2),
(4, 5, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `permissoes_users`
--

DROP TABLE IF EXISTS `permissoes_users`;
CREATE TABLE IF NOT EXISTS `permissoes_users` (
  `acoes_id` int(11) NOT NULL,
  `controles_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`acoes_id`,`controles_id`,`users_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `permissoes_users`
--

INSERT INTO `permissoes_users` (`acoes_id`, `controles_id`, `users_id`) VALUES
(1, 5, 33);

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
--

DROP TABLE IF EXISTS `pessoas`;
CREATE TABLE IF NOT EXISTS `pessoas` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `roles_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome` (`nome`)
) ENGINE=MyISAM AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`id`, `nome`, `email`, `roles_id`, `created`, `modified`, `active`) VALUES
(1, 'Diego Lemos de Souza', 'souzadl@gmail.com', 5, '2018-06-29 00:00:00', '2018-06-29 00:00:00', 1),
(36, 'Outro Padrinho', 'souzadl@gmail.com', 3, '2018-06-29 19:06:39', '2018-06-29 19:06:39', 1),
(28, 'Teste Padrinho', 'souzadl@gmail.com', 3, '2018-06-29 16:41:59', '2018-06-29 17:54:10', 1),
(35, 'Thieli Lemos de Souza', 'souzadl@gmail.com', 4, '2018-06-29 18:08:32', '2018-06-29 18:08:32', 0),
(32, 'Carlos Alberto', 'souzadl@gmail.com', 1, '2018-06-29 17:51:29', '2018-07-02 16:19:00', 1),
(34, 'Teste Adotante', 'souzadl@gmail.com', 4, '2018-06-29 17:53:28', '2018-06-29 17:53:28', 0),
(37, 'Adriano', 'souzadl@gmail.com', 2, '2018-07-03 13:19:33', '2018-07-03 13:19:33', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `active` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `roles`
--

INSERT INTO `roles` (`id`, `nome`, `created`, `modified`, `active`) VALUES
(1, 'Admin', '2018-06-18 17:48:09', '2018-06-23 21:14:48', 1),
(2, 'Voluntário', '2018-06-18 17:48:32', '2018-06-23 21:23:07', 1),
(3, 'Padrinho', '2018-06-24 00:00:00', '2018-06-24 00:00:00', 1),
(4, 'Adotante', '2018-06-23 21:23:34', '2018-06-29 13:19:27', 1),
(5, 'Admin Sistema', '2018-06-28 00:00:00', '2018-06-28 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_adotaveis`
--

DROP TABLE IF EXISTS `tipos_adotaveis`;
CREATE TABLE IF NOT EXISTS `tipos_adotaveis` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `active` tinyint(1) NOT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipos_adotaveis`
--

INSERT INTO `tipos_adotaveis` (`id`, `nome`, `created`, `modified`, `active`, `users_id`) VALUES
(3, 'Cachorro', '2018-06-21 19:55:18', '2018-06-21 19:55:18', 1, 16),
(11, 'Gato', '2018-06-25 21:39:15', '2018-06-25 21:39:15', 1, 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipos_padrinhos`
--

DROP TABLE IF EXISTS `tipos_padrinhos`;
CREATE TABLE IF NOT EXISTS `tipos_padrinhos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `modified` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `active` tinyint(1) NOT NULL,
  `users_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `tipos_padrinhos`
--

INSERT INTO `tipos_padrinhos` (`id`, `nome`, `created`, `modified`, `active`, `users_id`) VALUES
(5, 'Ração', '2018-06-21 21:41:50', '2018-06-21 21:41:50', 1, 16),
(6, 'Castração', '2018-06-21 21:42:10', '2018-06-21 21:42:10', 1, 16),
(7, 'Anti pulgas', '2018-06-21 21:42:59', '2018-06-21 21:42:59', 1, 16),
(8, 'Vacinação', '2018-06-21 21:43:12', '2018-06-21 21:43:12', 1, 16);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` text NOT NULL,
  `pessoas_id` int(11) NOT NULL,
  `roles_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime DEFAULT NULL,
  `active` tinyint(1) NOT NULL DEFAULT 0,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=35 DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `pessoas_id`, `roles_id`, `created`, `modified`, `active`) VALUES
(34, 'adriano', '$2y$10$lOyYG3SRK7Y.L1GI8NV97.Tt4/oi1f9lO2No/jJaJY1uDrnohUPe.', 37, 2, '2018-07-03 13:19:33', '2018-07-03 13:19:33', 0),
(33, 'carlos', '$2y$10$fh4B5walF0nwIUXtwqNb0OU76F/NPP64nxz/Y6NxeBV8f2hJYKyr6', 32, 1, '2018-06-29 17:51:29', '2018-07-02 16:19:00', 1),
(16, 'souzadl', '$2y$10$s99aKr9CL6EgIxSTNLnrHeelt.tlncjl4U4j24S9BO4c7bLOZXhQi', 1, 5, '2018-06-19 18:09:02', '2018-06-29 15:43:46', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
