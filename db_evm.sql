-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.26 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.0.0.5919
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para db_evm
CREATE DATABASE IF NOT EXISTS `db_evm` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_evm`;

-- Copiando estrutura para tabela db_evm.tb_blog
CREATE TABLE IF NOT EXISTS `tb_blog` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conteudo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `classificacao` int DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `usuario` int DEFAULT NULL,
  `status` enum('A','I') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_blog_classificacao` (`classificacao`),
  KEY `fk_blog_usuario` (`usuario`),
  CONSTRAINT `fk_blog_classificacao` FOREIGN KEY (`classificacao`) REFERENCES `tb_classificacoes` (`id`),
  CONSTRAINT `fk_blog_usuario` FOREIGN KEY (`usuario`) REFERENCES `tb_usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_evm.tb_blog: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_blog` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_blog` ENABLE KEYS */;

-- Copiando estrutura para tabela db_evm.tb_blog_comentarios
CREATE TABLE IF NOT EXISTS `tb_blog_comentarios` (
  `blog` int DEFAULT NULL,
  `visitante` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `comentario` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `data_cadastro` datetime DEFAULT NULL,
  `ip` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_aprovacao` datetime DEFAULT NULL,
  `usuario` int DEFAULT NULL,
  `status` enum('A','I') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  KEY `fk_blog_comentario` (`blog`),
  KEY `fk_blog_comentario_usuario` (`usuario`),
  CONSTRAINT `fk_blog_comentario` FOREIGN KEY (`blog`) REFERENCES `tb_blog` (`id`),
  CONSTRAINT `fk_blog_comentario_usuario` FOREIGN KEY (`usuario`) REFERENCES `tb_usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_evm.tb_blog_comentarios: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_blog_comentarios` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_blog_comentarios` ENABLE KEYS */;

-- Copiando estrutura para tabela db_evm.tb_blog_logs
CREATE TABLE IF NOT EXISTS `tb_blog_logs` (
  `id` int DEFAULT NULL,
  `titulo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `conteudo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `classificacao` int DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `data_alteracao` datetime DEFAULT NULL,
  `usuario` int DEFAULT NULL,
  `status` enum('A','I') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  KEY `fk_blog_log` (`id`),
  KEY `fk_blog_log_classificacao` (`classificacao`),
  KEY `fk_blog_log_usuario` (`usuario`),
  CONSTRAINT `fk_blog_log` FOREIGN KEY (`id`) REFERENCES `tb_blog` (`id`),
  CONSTRAINT `fk_blog_log_classificacao` FOREIGN KEY (`classificacao`) REFERENCES `tb_classificacoes` (`id`),
  CONSTRAINT `fk_blog_log_usuario` FOREIGN KEY (`usuario`) REFERENCES `tb_usuarios` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_evm.tb_blog_logs: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_blog_logs` DISABLE KEYS */;
/*!40000 ALTER TABLE `tb_blog_logs` ENABLE KEYS */;

-- Copiando estrutura para tabela db_evm.tb_campanhas
CREATE TABLE IF NOT EXISTS `tb_campanhas` (
  `id` int NOT NULL AUTO_INCREMENT,
  `titulo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `conteudo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `data_cadastro` datetime DEFAULT NULL,
  `usuario` int DEFAULT NULL,
  `status` enum('A','I') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `classificacao` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_usuario_cadastro_campanha` (`usuario`),
  KEY `fk_classificacao_cadastro` (`classificacao`),
  CONSTRAINT `fk_classificacao_cadastro` FOREIGN KEY (`classificacao`) REFERENCES `tb_classificacoes` (`id`),
  CONSTRAINT `fk_usuario_cadastro_campanha` FOREIGN KEY (`usuario`) REFERENCES `tb_usuarios` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_evm.tb_campanhas: ~6 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_campanhas` DISABLE KEYS */;
INSERT INTO `tb_campanhas` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(1, 'Campanha de exemplo 01', '2022-05-02', '2022-05-06', '<p>Conte&uacute;do de exemplo de campanha 01</p>', '2022-05-08 21:11:16', 1, 'A', 3);
INSERT INTO `tb_campanhas` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(2, 'Campanha de exemplo 02', '2022-05-09', '2022-05-13', '<p>Conte&uacute;do de exemplo de campanha 02</p>', '2022-05-08 21:11:23', 1, 'A', 3);
INSERT INTO `tb_campanhas` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(3, 'Campanha de exemplo 03', '2022-05-16', '2022-05-20', '<p>Conte&uacute;do de exemplo de campanha 03</p>', '2022-05-08 21:11:30', 1, 'A', 3);
INSERT INTO `tb_campanhas` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(4, 'Campanha de exemplo 04', '2022-05-23', '2022-05-27', '<p>Conte&uacute;do de exemplo de campanha 04</p>', '2022-05-08 21:11:38', 1, 'A', 3);
INSERT INTO `tb_campanhas` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(5, 'Campanha de exemplo 05', '2022-05-30', '2022-06-03', '<p>Conte&uacute;do de exemplo de campanha 05</p>', '2022-05-08 21:11:45', 1, 'A', 3);
INSERT INTO `tb_campanhas` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(6, 'Campanha de exemplo 06', '2022-06-06', '2022-06-10', '<p>Conte&uacute;do de exemplo de campanha 06</p>\r\n<p><img src="http://ceccatto.ddns.net/uploads/2022-05-09/c022db652dd4d6e5990e75eddf222f03.jpg" alt="" width="404" height="188"></p>', '2022-05-09 21:06:17', 1, 'A', 3);
/*!40000 ALTER TABLE `tb_campanhas` ENABLE KEYS */;

-- Copiando estrutura para tabela db_evm.tb_campanhas_logs
CREATE TABLE IF NOT EXISTS `tb_campanhas_logs` (
  `id` int DEFAULT NULL,
  `titulo` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_inicio` date DEFAULT NULL,
  `data_fim` date DEFAULT NULL,
  `conteudo` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `data_cadastro` datetime DEFAULT NULL,
  `usuario` int DEFAULT NULL,
  `status` enum('A','I') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `classificacao` int DEFAULT NULL,
  KEY `fk_campanha_id` (`id`),
  CONSTRAINT `fk_campanha_id` FOREIGN KEY (`id`) REFERENCES `tb_campanhas` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_evm.tb_campanhas_logs: ~60 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_campanhas_logs` DISABLE KEYS */;
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(1, 'Exemplo 1', '2022-05-02', '2022-05-06', '<p>Exemplo 1</p>', '2022-05-05 20:55:42', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(2, 'Exemplo 2', '2022-05-09', '2022-05-13', '<p>Exemplo 2</p>', '2022-05-05 20:55:54', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(3, 'Exemplo 3', '2022-05-16', '2022-05-20', '<p>Exemplo 3</p>', '2022-05-05 20:56:07', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(4, 'Exemplo 4', '2022-05-23', '2022-05-27', '<p>Exemplo 4</p>', '2022-05-05 20:56:21', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(5, 'Exemplo 5', '2022-05-30', '2022-06-03', '<p>Exemplo 5</p>', '2022-05-05 20:56:38', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(6, 'Exemplo 6', '2022-06-06', '2022-06-10', '<p>Exemplo 6</p>', '2022-05-05 21:34:44', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(6, 'Exemplo 6', '2022-06-06', '2022-06-10', '<p>Exemplo 6</p>', '2022-05-05 21:34:44', 1, 'I', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(6, 'Exemplo 6', '2022-06-06', '2022-06-10', '<p>Exemplo 6</p>', '2022-05-05 21:34:44', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(4, 'Exemplo 4', '2022-05-23', '2022-05-27', '<p>Exemplo 4</p>', '2022-05-05 20:56:21', 1, 'I', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(4, 'Exemplo 4', '2022-05-23', '2022-05-27', '<p>Exemplo 4</p>', '2022-05-05 20:56:21', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(6, 'Exemplo 6', '2022-06-06', '2022-06-10', '<p>Exemplo 6</p>', '2022-05-05 21:34:44', 1, 'I', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(6, 'Exemplo 6', '2022-06-06', '2022-06-10', '<p>Exemplo 6</p>', '2022-05-05 21:34:44', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(4, 'Exemplo 4', '2022-05-23', '2022-05-27', '<p>Exemplo 4</p>', '2022-05-05 20:56:21', 1, 'I', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(4, 'Exemplo 4', '2022-05-23', '2022-05-27', '<p>Exemplo 4</p>', '2022-05-05 20:56:21', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(6, 'Exemplo 6', '2022-06-06', '2022-06-10', '<p>Exemplo 6</p>', '2022-05-05 21:34:44', 1, 'I', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(6, 'Exemplo 6', '2022-06-06', '2022-06-10', '<p>Exemplo 6</p>', '2022-05-05 21:34:44', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(1, 'Campanha de exemplo 01', '2022-05-02', '2022-05-06', '<p>Exemplo 1</p>', '2022-05-08 21:08:09', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(2, 'Campanha de exemplo 02', '2022-05-09', '2022-05-13', '<p>Exemplo 2</p>', '2022-05-08 21:08:18', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(3, 'Campanha de exemplo 03', '2022-05-16', '2022-05-20', '<p>Exemplo 3</p>', '2022-05-08 21:08:26', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(4, 'Campanha de exemplo 04', '2022-05-23', '2022-05-27', '<p>Exemplo 4</p>', '2022-05-08 21:08:33', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(5, 'Campanha de exemplo 05', '2022-05-30', '2022-06-03', '<p>Exemplo 5</p>', '2022-05-08 21:08:40', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(6, 'Campanha de exemplo 06', '2022-06-06', '2022-06-10', '<p>Exemplo 6</p>', '2022-05-08 21:08:47', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(1, 'Campanha de exemplo 01', '2022-05-02', '2022-05-06', '<p>Conte&uacute;do de exemplo de campanha 01</p>', '2022-05-08 21:11:16', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(2, 'Campanha de exemplo 02', '2022-05-09', '2022-05-13', '<p>Conte&uacute;do de exemplo de campanha 02</p>', '2022-05-08 21:11:23', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(3, 'Campanha de exemplo 03', '2022-05-16', '2022-05-20', '<p>Conte&uacute;do de exemplo de campanha 03</p>', '2022-05-08 21:11:30', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(4, 'Campanha de exemplo 04', '2022-05-23', '2022-05-27', '<p>Conte&uacute;do de exemplo de campanha 04</p>', '2022-05-08 21:11:38', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(5, 'Campanha de exemplo 05', '2022-05-30', '2022-06-03', '<p>Conte&uacute;do de exemplo de campanha 05</p>', '2022-05-08 21:11:45', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(6, 'Campanha de exemplo 06', '2022-06-06', '2022-06-10', '<p>Conte&uacute;do de exemplo de campanha 06</p>', '2022-05-08 21:11:52', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(6, 'Campanha de exemplo 06', '2022-06-06', '2022-06-10', '<p>Conte&uacute;do de exemplo de campanha 06</p>', '2022-05-08 21:11:52', 1, 'I', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(6, 'Campanha de exemplo 06', '2022-06-06', '2022-06-10', '<p>Conte&uacute;do de exemplo de campanha 06</p>', '2022-05-08 21:11:52', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(1, 'Campanha de exemplo 01', '2022-05-02', '2022-05-06', '<p>Conte&uacute;do de exemplo de campanha 01</p>', '2022-05-08 21:11:16', 1, 'I', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(2, 'Campanha de exemplo 02', '2022-05-09', '2022-05-13', '<p>Conte&uacute;do de exemplo de campanha 02</p>', '2022-05-08 21:11:23', 1, 'I', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(3, 'Campanha de exemplo 03', '2022-05-16', '2022-05-20', '<p>Conte&uacute;do de exemplo de campanha 03</p>', '2022-05-08 21:11:30', 1, 'I', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(4, 'Campanha de exemplo 04', '2022-05-23', '2022-05-27', '<p>Conte&uacute;do de exemplo de campanha 04</p>', '2022-05-08 21:11:38', 1, 'I', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(5, 'Campanha de exemplo 05', '2022-05-30', '2022-06-03', '<p>Conte&uacute;do de exemplo de campanha 05</p>', '2022-05-08 21:11:45', 1, 'I', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(6, 'Campanha de exemplo 06', '2022-06-06', '2022-06-10', '<p>Conte&uacute;do de exemplo de campanha 06</p>', '2022-05-08 21:11:52', 1, 'I', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(1, 'Campanha de exemplo 01', '2022-05-02', '2022-05-06', '<p>Conte&uacute;do de exemplo de campanha 01</p>', '2022-05-08 21:11:16', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(2, 'Campanha de exemplo 02', '2022-05-09', '2022-05-13', '<p>Conte&uacute;do de exemplo de campanha 02</p>', '2022-05-08 21:11:23', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(3, 'Campanha de exemplo 03', '2022-05-16', '2022-05-20', '<p>Conte&uacute;do de exemplo de campanha 03</p>', '2022-05-08 21:11:30', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(4, 'Campanha de exemplo 04', '2022-05-23', '2022-05-27', '<p>Conte&uacute;do de exemplo de campanha 04</p>', '2022-05-08 21:11:38', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(5, 'Campanha de exemplo 05', '2022-05-30', '2022-06-03', '<p>Conte&uacute;do de exemplo de campanha 05</p>', '2022-05-08 21:11:45', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(6, 'Campanha de exemplo 06', '2022-06-06', '2022-06-10', '<p>Conte&uacute;do de exemplo de campanha 06</p>', '2022-05-08 21:11:52', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(1, 'Campanha de exemplo 01', '2022-05-02', '2022-05-06', '<p>Conte&uacute;do de exemplo de campanha 01</p>', '2022-05-08 21:11:16', 1, 'I', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(2, 'Campanha de exemplo 02', '2022-05-09', '2022-05-13', '<p>Conte&uacute;do de exemplo de campanha 02</p>', '2022-05-08 21:11:23', 1, 'I', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(3, 'Campanha de exemplo 03', '2022-05-16', '2022-05-20', '<p>Conte&uacute;do de exemplo de campanha 03</p>', '2022-05-08 21:11:30', 1, 'I', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(4, 'Campanha de exemplo 04', '2022-05-23', '2022-05-27', '<p>Conte&uacute;do de exemplo de campanha 04</p>', '2022-05-08 21:11:38', 1, 'I', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(5, 'Campanha de exemplo 05', '2022-05-30', '2022-06-03', '<p>Conte&uacute;do de exemplo de campanha 05</p>', '2022-05-08 21:11:45', 1, 'I', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(6, 'Campanha de exemplo 06', '2022-06-06', '2022-06-10', '<p>Conte&uacute;do de exemplo de campanha 06</p>', '2022-05-08 21:11:52', 1, 'I', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(4, 'Campanha de exemplo 04', '2022-05-23', '2022-05-27', '<p>Conte&uacute;do de exemplo de campanha 04</p>', '2022-05-08 21:11:38', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(3, 'Campanha de exemplo 03', '2022-05-16', '2022-05-20', '<p>Conte&uacute;do de exemplo de campanha 03</p>', '2022-05-08 21:11:30', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(1, 'Campanha de exemplo 01', '2022-05-02', '2022-05-06', '<p>Conte&uacute;do de exemplo de campanha 01</p>', '2022-05-08 21:11:16', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(2, 'Campanha de exemplo 02', '2022-05-09', '2022-05-13', '<p>Conte&uacute;do de exemplo de campanha 02</p>', '2022-05-08 21:11:23', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(5, 'Campanha de exemplo 05', '2022-05-30', '2022-06-03', '<p>Conte&uacute;do de exemplo de campanha 05</p>', '2022-05-08 21:11:45', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(6, 'Campanha de exemplo 06', '2022-06-06', '2022-06-10', '<p>Conte&uacute;do de exemplo de campanha 06</p>', '2022-05-08 21:11:52', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(6, 'Campanha de exemplo 06', '2022-06-06', '2022-06-10', '<p>Conte&uacute;do de exemplo de campanha 06</p>', '2022-05-08 21:11:52', 1, 'I', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(6, 'Campanha de exemplo 06', '2022-06-06', '2022-06-10', '<p>Conte&uacute;do de exemplo de campanha 06</p>', '2022-05-08 21:11:52', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(6, 'Campanha de exemplo 06', '2022-06-06', '2022-06-10', '<p>Conte&uacute;do de exemplo de campanha 06</p>\n<p>Conte&uacute;do de exemplo de campanha 06</p>\n<p>Conte&uacute;do de exemplo de campanha 06</p>\n<p>Conte&uacute;do de exemplo de campanha 06</p>\n<p>Conte&uacute;do de exemplo de campanha 06</p>\n<p>Conte&uacute;do de exemplo de campanha 06</p>\n<p>Conte&uacute;do de exemplo de campanha 06</p>\n<p>Conte&uacute;do de exemplo de campanha 06</p>\n<p>Conte&uacute;do de exemplo de campanha 06</p>\n<p>Conte&uacute;do de exemplo de campanha 06</p>\n<p>Conte&uacute;do de exemplo de campanha 06</p>\n<p>Conte&uacute;do de exemplo de campanha 06</p>\n<p>Conte&uacute;do de exemplo de campanha 06</p>\n<p>Conte&uacute;do de exemplo de campanha 06</p>\n<p>Conte&uacute;do de exemplo de campanha 06</p>', '2022-05-09 20:26:15', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(6, 'Campanha de exemplo 06', '2022-06-06', '2022-06-10', '<p>Conte&uacute;do de exemplo de campanha 06</p>', '2022-05-09 20:26:39', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(6, 'Campanha de exemplo 06', '2022-06-06', '2022-06-10', '<p>Conte&uacute;do de exemplo de campanha 06</p>\n<p>Conte&uacute;do de exemplo de campanha 06</p>', '2022-05-09 20:32:15', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(6, 'Campanha de exemplo 06', '2022-06-06', '2022-06-10', '<p>Conte&uacute;do de exemplo de campanha 06</p>', '2022-05-09 20:33:34', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(6, 'Campanha de exemplo 06', '2022-06-06', '2022-06-10', '<p>Conte&uacute;do de exemplo de campanha 06</p>', '2022-05-09 21:06:17', 1, 'A', 3);
INSERT INTO `tb_campanhas_logs` (`id`, `titulo`, `data_inicio`, `data_fim`, `conteudo`, `data_cadastro`, `usuario`, `status`, `classificacao`) VALUES
	(6, 'Campanha de exemplo 06', '2022-06-06', '2022-06-10', '<p>Conte&uacute;do de exemplo de campanha 06</p>\r\n<p><img src="http://ceccatto.ddns.net/uploads/2022-05-09/c022db652dd4d6e5990e75eddf222f03.jpg" alt="" width="404" height="188"></p>', '2022-05-09 21:06:17', 1, 'A', 3);
/*!40000 ALTER TABLE `tb_campanhas_logs` ENABLE KEYS */;

-- Copiando estrutura para tabela db_evm.tb_classificacoes
CREATE TABLE IF NOT EXISTS `tb_classificacoes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `descricao` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_evm.tb_classificacoes: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_classificacoes` DISABLE KEYS */;
INSERT INTO `tb_classificacoes` (`id`, `descricao`) VALUES
	(1, 'Comunicado');
INSERT INTO `tb_classificacoes` (`id`, `descricao`) VALUES
	(2, 'Evento');
INSERT INTO `tb_classificacoes` (`id`, `descricao`) VALUES
	(3, 'Campanha');
/*!40000 ALTER TABLE `tb_classificacoes` ENABLE KEYS */;

-- Copiando estrutura para tabela db_evm.tb_instituicoes
CREATE TABLE IF NOT EXISTS `tb_instituicoes` (
  `id` int NOT NULL AUTO_INCREMENT,
  `tipo` enum('SEDE','SUBSEDE') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefone` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `endereco` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `numero` int DEFAULT NULL,
  `cep` varchar(9) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bairro` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(2) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cidade` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_evm.tb_instituicoes: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_instituicoes` DISABLE KEYS */;
INSERT INTO `tb_instituicoes` (`id`, `tipo`, `email`, `telefone`, `endereco`, `numero`, `cep`, `bairro`, `estado`, `cidade`) VALUES
	(1, 'SEDE', 'contato.sede@admvivianmarcal.com.br', '(41) 3222-7150', 'Rua Barão de Antonina', 325, '83530-050', 'São Francisco', 'PR', 'Curitiba');
INSERT INTO `tb_instituicoes` (`id`, `tipo`, `email`, `telefone`, `endereco`, `numero`, `cep`, `bairro`, `estado`, `cidade`) VALUES
	(2, 'SUBSEDE', 'contato.subsede@admvivianmarcal.com.br', '(41) 3335-3938', 'Rua Mamoré', 1066, '80810-080', 'Mercês', 'PR', 'Curitiba');
/*!40000 ALTER TABLE `tb_instituicoes` ENABLE KEYS */;

-- Copiando estrutura para tabela db_evm.tb_parametros_gerais
CREATE TABLE IF NOT EXISTS `tb_parametros_gerais` (
  `nome` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_logo` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_facebook` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_youtube` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_instagram` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_banner1` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_banner2` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url_banner3` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status_plataforma` enum('A','I') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_evm.tb_parametros_gerais: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_parametros_gerais` DISABLE KEYS */;
INSERT INTO `tb_parametros_gerais` (`nome`, `url_logo`, `url_facebook`, `url_youtube`, `url_instagram`, `url_banner1`, `url_banner2`, `url_banner3`, `status_plataforma`) VALUES
	('Escola Vivian Marçal', NULL, 'https://www.facebook.com/escolavivianmarcal', 'https://www.youtube.com/channel/UCLXRdm4c5lIHgo-FiXR7G3g', NULL, NULL, NULL, NULL, 'A');
/*!40000 ALTER TABLE `tb_parametros_gerais` ENABLE KEYS */;

-- Copiando estrutura para tabela db_evm.tb_usuarios
CREATE TABLE IF NOT EXISTS `tb_usuarios` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `senha` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `data_cadastro` datetime DEFAULT NULL,
  `status` enum('A','I') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nivel` enum('Desenvolvedor','Administrador','Editor') CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_evm.tb_usuarios: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `tb_usuarios` DISABLE KEYS */;
INSERT INTO `tb_usuarios` (`id`, `nome`, `email`, `senha`, `data_cadastro`, `status`, `nivel`) VALUES
	(1, 'Marcelo Ceccatto', 'ceccatto.bkp@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2022-04-26 16:05:33', 'A', 'Desenvolvedor');
INSERT INTO `tb_usuarios` (`id`, `nome`, `email`, `senha`, `data_cadastro`, `status`, `nivel`) VALUES
	(2, 'Professor UP', 'up@up.edu.br', '81dc9bdb52d04dc20036dbd8313ed055', '2022-05-03 13:38:36', 'A', 'Desenvolvedor');
/*!40000 ALTER TABLE `tb_usuarios` ENABLE KEYS */;

-- Copiando estrutura para procedure db_evm.Wipe
DELIMITER //
CREATE PROCEDURE `Wipe`()
BEGIN
	SET foreign_key_checks = 0;
	TRUNCATE tb_campanhas;
	SET foreign_key_checks = 1;
END//
DELIMITER ;

-- Copiando estrutura para trigger db_evm.logs_campanhas_insert
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `logs_campanhas_insert` AFTER INSERT ON `tb_campanhas` FOR EACH ROW BEGIN
	INSERT INTO tb_campanhas_logs(
		id,
	   titulo,
	   data_inicio,
	   data_fim,
	   conteudo,
	   data_cadastro,
	   usuario,
		status,
		classificacao
	) VALUES (
		new.id,
	   new.titulo,
	   new.data_inicio,
	   new.data_fim,
	   new.conteudo,
	   new.data_cadastro,
	   new.usuario,
		new.status,
		new.classificacao
	);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

-- Copiando estrutura para trigger db_evm.logs_campanhas_update
SET @OLDTMP_SQL_MODE=@@SQL_MODE, SQL_MODE='STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
DELIMITER //
CREATE TRIGGER `logs_campanhas_update` AFTER UPDATE ON `tb_campanhas` FOR EACH ROW BEGIN
	INSERT INTO tb_campanhas_logs(
		id,
	   titulo,
	   data_inicio,
	   data_fim,
	   conteudo,
	   data_cadastro,
	   usuario,
		status,
		classificacao
	) VALUES (
		new.id,
	   new.titulo,
	   new.data_inicio,
	   new.data_fim,
	   new.conteudo,
	   new.data_cadastro,
	   new.usuario,
		new.status,
		new.classificacao
	);
END//
DELIMITER ;
SET SQL_MODE=@OLDTMP_SQL_MODE;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
