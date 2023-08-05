-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 05-Ago-2023 às 01:40
-- Versão do servidor: 8.0.31
-- versão do PHP: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `audote`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `pets`
--

DROP TABLE IF EXISTS `pets`;
CREATE TABLE IF NOT EXISTS `pets` (
  `idPet` int NOT NULL AUTO_INCREMENT,
  `nomePet` varchar(75) DEFAULT NULL,
  `tipoAnimal` varchar(75) DEFAULT NULL,
  `raca` varchar(75) DEFAULT NULL,
  `idadePet` int DEFAULT NULL,
  `porte` varchar(75) DEFAULT NULL,
  `sexo` varchar(50) DEFAULT NULL,
  `descricao` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `vacinas` varchar(75) DEFAULT NULL,
  `vermifugado` varchar(75) DEFAULT NULL,
  `imagemPet` varchar(225) DEFAULT NULL,
  `caracteristicas` varchar(400) NOT NULL,
  `idUsuario` int NOT NULL,
  PRIMARY KEY (`idPet`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `pets`
--

INSERT INTO `pets` (`idPet`, `nomePet`, `tipoAnimal`, `raca`, `idadePet`, `porte`, `sexo`, `descricao`, `vacinas`, `vermifugado`, `imagemPet`, `caracteristicas`, `idUsuario`) VALUES
(8, 'Bob', 'Gato', 'Rottweiler', 9, 'Anão', 'Fêmea', 'Meu gato é pipipopo', 'Vacinado', 'Não vermifugado', 'src/img/pets/3.jpg', 'bravo,irritavél,chato,cricri', 6),
(9, 'Sion', 'Zumbi', 'Demacia', 400, 'Colossal', 'Macho', 'Covardes!!!!!!!!!', 'Não vacinado', 'Não vermifugado', 'src/img/pets/sion.jpg', 'Corajoso,Covarde,Bravo,Guerreiro,Demaciano,Luta por justiça,não se da bem com animais,Não aguenta ver fracos,mata inocentes,Tolo,sábio', 6),
(10, 'A frase jeb', 'Cachorro', 'Vira-lata', 123, 'pequeno', 'Macho', 'história do meu pet', 'Não vacinado', 'Vermifugado', 'src/img/pets/20150812.jpg', 'dócil,carente', 8),
(13, 'TESTE 2 ', 'TESTE 2 ', 'TESTE 2 ', 2, 'TESTE 2 ', 'Macho', 'TESTE 2 TESTE 2 TESTE 2 TESTE 2 TESTE 2 TESTE 2 TESTE 2 TESTE 2 TESTE 2 TESTE 2 ', 'Não vacinado', 'Vermifugado', 'src/img/pets/1.jpg', 'TESTE 2,TESTE 2,TESTE 2,TESTE 2,TESTE 2,TESTE 2,TESTE 2,TESTE 2,TESTE 2', 6),
(11, 'Teste', 'teste', 'teste', 10, 'teste', 'Fêmea', 'teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste teste tes', 'Vacinado', 'Não vermifugado', 'src/img/pets/3.jpg', 'Teste,teste,teste,teste', 6),
(14, 'TESTE 2 ', 'TESTE 2 ', 'TESTE 2 ', 2, 'TESTE 2 ', 'Macho', 'TESTE 2 TESTE 2 TESTE 2 TESTE 2 TESTE 2 TESTE 2 TESTE 2 TESTE 2 TESTE 2 TESTE 2 ', 'Não vacinado', 'Vermifugado', 'src/img/pets/1.jpg', 'TESTE 2,TESTE 2,TESTE 2,TESTE 2,TESTE 2,TESTE 2,TESTE 2,TESTE 2,TESTE 2', 6),
(16, 'TESTE 2 ', 'TESTE 2 ', 'TESTE 2 ', 2, 'TESTE 2 ', 'Macho', 'TESTE 2 TESTE 2 TESTE 2 TESTE 2 TESTE 2 TESTE 2 TESTE 2 TESTE 2 TESTE 2 TESTE 2 ', 'Não vacinado', 'Vermifugado', 'src/img/pets/gata.PNG', 'TESTE 2,TESTE 2,TESTE 2,TESTE 2,TESTE 2,TESTE 2,TESTE 2,TESTE 2,TESTE 2', 6),
(17, 'TESTE 2 ', 'TESTE 2 ', 'TESTE 2 ', 2, 'TESTE 2 ', 'Macho', 'TESTE 2 TESTE 2 TESTE 2 TESTE 2 TESTE 2 TESTE 2 TESTE 2 TESTE 2 TESTE 2 TESTE 2 ', 'Não vacinado', 'Vermifugado', 'src/img/pets/21054207_20131030221640204.webp', 'TESTE 2,TESTE 2,TESTE 2,TESTE 2,TESTE 2,TESTE 2,TESTE 2,TESTE 2,TESTE 2', 6),
(18, 'ted', 'sadsa', 'sdad', 11122, 'dasdsa', 'Macho', 'aaaaaaaaaa', 'Vacinado', 'Não vermifugado', 'src/img/pets/2.jpg', 'dadsa,dsadas,aaaaaaa. aaa', 6);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(75) DEFAULT NULL,
  `tipoConta` varchar(75) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(75) DEFAULT NULL,
  `sobrenome` varchar(100) DEFAULT NULL,
  `cpf` varchar(100) DEFAULT NULL,
  `telefone` varchar(100) DEFAULT NULL,
  `cep` varchar(100) DEFAULT NULL,
  `logradouro` varchar(100) DEFAULT NULL,
  `estado` varchar(100) DEFAULT NULL,
  `cidade` varchar(100) DEFAULT NULL,
  `bairro` varchar(100) DEFAULT NULL,
  `numero` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id`, `nome`, `tipoConta`, `email`, `senha`, `sobrenome`, `cpf`, `telefone`, `cep`, `logradouro`, `estado`, `cidade`, `bairro`, `numero`) VALUES
(6, 'bruno', 'admin', 'ninjutsso@gmail.com', '$2y$10$nlHo.EFLAqREJGqcQ.eFReqJDRCtKZpNU/KNLdTxmzVQ0RephNyl2', 'Coelho', '490.321.478-89', '+55 11 97770-8679', '03380-000', 'Rua Aurora das Dores', 'SP', 'São Paulo', 'Chácara Belenzinho', '345'),
(5, 'Criptografia', 'user', 'cripto@gmail.com', '$2y$10$OX0cWpGlEFTmEOVaIQ6eje1ZWLBs7BUWYqCNbe7CDPJDc9wHa4p32', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'usuario', 'user', 'usuario@usuario.com', '$2y$10$9VeimD5Vd6WhH3pW6/sk4eTxhEEmVq4i8dqLXRIoAmrVZ0tuNTPaq', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'ong', 'admin', 'ong@ong.com', '$2y$10$1ZeQpKN0mFDIHCOA8XAWGun2gawr1cfoTWRmyk1yCCFD9nSMBo1Ra', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, 'lucas', 'user', 'lucas@gmail.com', '$2y$10$yPF2rGHWERcHoHL1pCs87uiFvsuKYHaxv1qm9Uhg2u4CQ5s7FYm46', '', '', '', '', '', '', '', '', ''),
(10, 'teste', 'admin', 'teste@teste.com.br', '$2y$10$LvrnTWm3BMoBbkWv4UBbKe.hKYyaD0a/PHITgx4drZqxNDRzCNACi', '', '', '', '', '', '', '', '', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
