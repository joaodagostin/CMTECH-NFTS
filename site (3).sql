-- phpMyAdmin SQL Dump
-- version 4.1.4
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15-Nov-2022 às 23:25
-- Versão do servidor: 5.6.15-log
-- PHP Version: 5.5.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `site`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastro_nft`
--

CREATE TABLE IF NOT EXISTS `cadastro_nft` (
  `Nome_nft` varchar(50) NOT NULL,
  `Valor_nft` float NOT NULL,
  `Descricao_nft` varchar(300) NOT NULL,
  `Data_nft` date NOT NULL,
  `Id_nft` int(11) NOT NULL AUTO_INCREMENT,
  `foto_nft` varchar(250) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`Id_nft`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=19 ;

--
-- Extraindo dados da tabela `cadastro_nft`
--

INSERT INTO `cadastro_nft` (`Nome_nft`, `Valor_nft`, `Descricao_nft`, `Data_nft`, `Id_nft`, `foto_nft`, `id`) VALUES
('NFT LEGAL', 2.8, 'eseseseseseseses', '2022-10-24', 7, 'fotoNft/engrenagem.png', 10),
('Japonesa', 6.7, 'sesesfsadfsddsgddddfdgdfsgdsfgd', '2022-10-24', 8, 'fotoNft/8.png', 10),
('Japonesa 2', 5.4, 'Nft muito daora é isso', '2022-10-24', 9, 'fotoNft/7.png', 10),
('NFT do Modric', 12.4, 'asdasdsadasdsadas', '2022-10-24', 10, 'fotoNft/10.png', 10),
('NFT LEGAL', 4.1, 'sdfsdfsdafsafasdfasdfasd', '2022-10-24', 11, 'fotoNft/11.png', 10),
('NFT GREGA', 7.4, 'fgjhwlifguhldisfughdlfi', '2022-10-24', 12, 'fotoNft/15.png', 10),
('NFT DO CALVO', 3, 'hahahahahahahha', '2022-10-24', 13, 'fotoNft/17.png', 12),
('NORDICA', 1.5, 'kfgjdkfhgkdifhgkdsghdsfk\r\n', '2022-10-24', 14, 'fotoNft/18.png', 12),
('MT bom', 5.5, 'skjkadkasdhaksdjhaklsdas', '2022-10-24', 15, 'fotoNft/13.png', 12),
('SIM', 7.1, 'kfsjldfhsldfhsldkfs', '2022-10-24', 16, 'fotoNft/4.png', 12),
('VEIO DA HAVAN', 3.75, 'bunda da havan', '2022-10-24', 17, 'fotoNft/6.png', 12),
('china', 4, 'dfbgsdfgsdfgsadfg', '2022-10-29', 18, 'fotoNft/revolucao-chinesa.jpg', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `colecaoadd`
--

CREATE TABLE IF NOT EXISTS `colecaoadd` (
  `id_add` int(12) NOT NULL,
  `id_colecoes` int(12) NOT NULL,
  `id_nft` int(12) NOT NULL,
  PRIMARY KEY (`id_add`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `colecoes`
--

CREATE TABLE IF NOT EXISTS `colecoes` (
  `id_colecao` int(12) NOT NULL AUTO_INCREMENT,
  `nome_colecao` varchar(250) CHARACTER SET utf8 NOT NULL,
  `id_usuario` int(12) NOT NULL,
  `foto_colecao` varchar(250) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id_colecao`),
  KEY `id_usuario` (`id_usuario`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Extraindo dados da tabela `colecoes`
--

INSERT INTO `colecoes` (`id_colecao`, `nome_colecao`, `id_usuario`, `foto_colecao`) VALUES
(1, 'Nordica', 10, 'fotoColecao/5.png'),
(2, 'Nordica #1', 10, 'fotoColecao/3.png'),
(5, 'Nordica #2', 10, 'fotoColecao/2.png'),
(6, 'Nordica #3', 10, 'fotoColecao/6.png');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contato`
--

CREATE TABLE IF NOT EXISTS `contato` (
  `Nome` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Assunto` varchar(50) NOT NULL,
  `Mensagem` varchar(400) NOT NULL,
  PRIMARY KEY (`Email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contato`
--

INSERT INTO `contato` (`Nome`, `Email`, `Assunto`, `Mensagem`) VALUES
('Pedro', 'parosso@gmail.com', 'hahahahaha', 'top o site');

-- --------------------------------------------------------

--
-- Estrutura da tabela `registro`
--

CREATE TABLE IF NOT EXISTS `registro` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `Nome` varchar(30) NOT NULL,
  `Sobrenome` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Cpf` int(11) NOT NULL,
  `Celular` int(11) NOT NULL,
  `Sexo` varchar(50) NOT NULL,
  `Senha` varchar(20) NOT NULL,
  `Confirmar` varchar(20) NOT NULL,
  `Usuario` varchar(30) NOT NULL,
  `bannerperfil` varchar(250) NOT NULL,
  `fotoperfil` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Extraindo dados da tabela `registro`
--

INSERT INTO `registro` (`id`, `Nome`, `Sobrenome`, `Email`, `Cpf`, `Celular`, `Sexo`, `Senha`, `Confirmar`, `Usuario`, `bannerperfil`, `fotoperfil`) VALUES
(1, 'JOAO', 'DAGOSTIN', 'parossodagostin@gmail.com', 2147483647, 489999999, 'masculino', '34780205', '34780205', 'joaogrd', '0', ''),
(5, 'Pedro', 'Augusto', 'pedroard7@gmail.com', 2147483647, 2147483647, 'masculino', 'pedro', 'pedro', 'pedroard22', '0', ''),
(6, 'ahahaahh', 'shshhshs', 'hshdshhshs@rtyr', 121221121, 121221121, 'masculino', 'hadjhsdauh', 'uhsdushd', 'usdhfsudh', '0', ''),
(7, 'dfsdfsdf', 'sdfsdfsd', 'asda@sdfsdf', 567567567, 567567567, 'masculino', 'gfhfghf', 'fghfgh', 'fghfghf', '0', ''),
(8, 'ghfghhfgh', 'fghfghfgh', 'ghfgh@dfgdfg', 34234234, 34234234, 'masculino', '1111111', '11111111111', 'jkhjkfhjgh', '0', ''),
(9, 'JOAO', 'DAGOSTIN', 'parossodagostin@gmail.com', 2147483647, 938439478, 'masculino', '12345678', '12345678', 'joaogrd', '0', ''),
(10, 'JoÃ£o Gabriel', 'Rosso Dagostin', 'joaopvmn@outlook.com', 2147483647, 0, 'masculino', '12345678', '12345678', 'joaogrd', 'upload/', 'upload/imgminha.jpeg'),
(11, 'gfdfgdfg', 'fdgsdfgsdfg', 'dfgsdfg@asjhas', 2147483647, 2147483647, 'masculino', '123456', '123456', 'pedroard', '0', ''),
(12, 'Lucio', 'Calvo', 'luciocalvo@gmail.com', 2147483647, 345345345, 'masculino', '123', '123', 'lucio', '', '');

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `cadastro_nft`
--
ALTER TABLE `cadastro_nft`
  ADD CONSTRAINT `cadastro_nft_ibfk_1` FOREIGN KEY (`id`) REFERENCES `registro` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
