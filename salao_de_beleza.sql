
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- Copiando estrutura do banco de dados para salao_de_beleza
CREATE DATABASE IF NOT EXISTS `salao_de_beleza` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `salao_de_beleza`;

-- Copiando estrutura para tabela salao_de_beleza.agendamentos
CREATE TABLE IF NOT EXISTS `agendamentos` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `status` enum('novo','cancelado','concluido') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'novo',
  `nome_cliente` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `servico` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL,
  `cliente_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `agendamentos_cliente_id_foreign` (`cliente_id`),
  CONSTRAINT `agendamentos_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela salao_de_beleza.agendamentos: ~4 rows (aproximadamente)
/*!40000 ALTER TABLE `agendamentos` DISABLE KEYS */;
INSERT INTO `agendamentos` (`id`, `status`, `nome_cliente`, `servico`, `data`, `hora`, `cliente_id`, `created_at`, `updated_at`) VALUES
	(8, 'novo', 'Matheus', 'Cabelo', '2020-09-20', '14:00:00', 2, '2020-08-20 11:58:35', '2020-08-20 11:58:35'),
	(9, 'novo', 'Matheus', 'barba', '2020-08-18', '15:00:00', 2, '2020-08-20 11:59:56', '2020-08-20 11:59:56'),
	(10, 'novo', 'Matheus', 'Cabelo', '2020-10-23', '19:00:00', 2, '2020-08-20 12:04:02', '2020-08-20 12:04:02'),
	(11, 'novo', 'Leandro', 'Barba', '2020-09-12', '16:00:00', 3, '2020-08-20 12:27:17', '2020-08-20 12:27:17'),
	(12, 'novo', 'Leandro', 'Cabelo', '2020-08-19', '16:00:00', 3, '2020-08-20 12:31:05', '2020-08-20 12:31:05');
/*!40000 ALTER TABLE `agendamentos` ENABLE KEYS */;

-- Copiando estrutura para tabela salao_de_beleza.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela salao_de_beleza.migrations: ~9 rows (aproximadamente)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2020_08_18_140631_agendamentos', 1),
	(4, '2020_08_18_140640_servicos', 1),
	(5, '2020_08_18_191501_agendamento', 2),
	(6, '2020_08_18_191509_servico', 2),
	(7, '2020_08_18_203007_users', 3),
	(8, '2020_08_18_203017_agendamento', 3),
	(9, '2020_08_19_204658_permissao', 4);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Copiando estrutura para tabela salao_de_beleza.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela salao_de_beleza.password_resets: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Copiando estrutura para tabela salao_de_beleza.permissao
CREATE TABLE IF NOT EXISTS `permissao` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chave_acesso` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela salao_de_beleza.permissao: ~1 rows (aproximadamente)
/*!40000 ALTER TABLE `permissao` DISABLE KEYS */;
INSERT INTO `permissao` (`id`, `nome`, `chave_acesso`) VALUES
	(1, 'Braulino', 'abcde123');
/*!40000 ALTER TABLE `permissao` ENABLE KEYS */;

-- Copiando estrutura para tabela salao_de_beleza.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `permissao` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela salao_de_beleza.users: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `permissao`, `created_at`, `updated_at`) VALUES
	(2, 'Matheus', 'matheus@gmail.com', NULL, '$2y$10$x.UCXcORoiSIVd4.ZpNfWOOuuIo9YO5JK981rnTbQnnRQUimnnuRC', NULL, 0, '2020-08-18 20:36:09', '2020-08-18 20:36:09'),
	(3, 'Leandro', 'leand@gmail.com', NULL, '$2y$10$U/JHZgyToU0UO6KGoeMc9Ok5xZT8.kysqaDuxKNk4eAcJQSy836My', NULL, 0, '2020-08-20 12:26:11', '2020-08-20 12:26:11');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
