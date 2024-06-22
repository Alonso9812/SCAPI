-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Versión del servidor:         11.3.0-MariaDB - mariadb.org binary distribution
-- SO del servidor:              Win64
-- HeidiSQL Versión:             12.5.0.6677
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Volcando estructura de base de datos para api-admin
CREATE DATABASE IF NOT EXISTS `api-admin` /*!40100 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci */;
USE `api-admin`;

-- Volcando estructura para tabla api-admin.campañas
CREATE TABLE IF NOT EXISTS `campañas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `ubicacion` varchar(255) NOT NULL,
  `fecha` datetime NOT NULL,
  `alimentacion` varchar(255) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `tipo` bigint(20) unsigned NOT NULL,
  `inOex` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Activo',
  PRIMARY KEY (`id`),
  KEY `campanas_tipo_foreign` (`tipo`),
  CONSTRAINT `campanas_tipo_foreign` FOREIGN KEY (`tipo`) REFERENCES `tiposvolcamp` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=42 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla api-admin.campañas: ~10 rows (aproximadamente)
INSERT INTO `campañas` (`id`, `nombre`, `descripcion`, `ubicacion`, `fecha`, `alimentacion`, `capacidad`, `tipo`, `inOex`, `status`) VALUES
	(2, 'Charla sobre los deepfakes', 'Se hablará sobre los deepfakes', 'UNA Campus Nicoya', '2024-06-22 08:00:00', 'No', 20, 4, 'Interno', 'Inactivo'),
	(4, 'Charla E3', 'Se hablara sobre los nuevos juegos presentados en la E3', 'Universidad Nacional Campus Nicoya', '2024-07-18 08:00:00', 'No', 30, 31, 'Interno', 'Inactivo'),
	(19, 'Charla contra el acoso sexual', 'Se hablará sobre el acoso en la Universidad y como denunciarlo', 'Universidad Nacional Campus Nicoya', '2024-08-03 08:00:00', 'No', 70, 34, 'Interno', 'Inactivo'),
	(26, 'Ambiente libre de químicos', 'Charla sobre el manejo de químicos en la agricultura', 'Universidad Nacional Campus Nicoya', '2024-10-25 12:52:00', 'Sí', 25, 4, 'Interno', 'Inactivo'),
	(36, 'Charla sobre IA', 'Se hablará sobre la inteligencia artificial', 'UNA Campus Nicoya', '2024-01-19 00:00:00', 'Sí', 30, 4, 'Interno', 'Inactivo'),
	(37, 'Charla sobre la gamificación', 'Se hablará sobre los beneficios de la gamificación', 'UNA Campus Nicoya', '2024-09-28 09:30:00', 'Sí', 10, 4, 'Interno', 'Activo'),
	(38, 'Charla sobre el cáncer', 'se hablará sobre como detectar el cáncer', 'Parque Nicoya', '2024-09-25 10:30:00', 'No', 100, 4, 'Externo', 'Activo'),
	(39, 'Charla sobre pymes', 'Se hablará sobre las pymes y sus beneficios', 'Parque Nicoya', '2024-09-13 08:30:00', 'No', 20, 4, 'Externo', 'Activo'),
	(40, 'Convivio Universitario', 'Charla social para estudiantes universitarios', 'Una Nicoya', '2024-08-23 19:01:00', 'Sí', 100, 4, 'Interno', 'Activo'),
	(41, 'Charla Universidad', 'Una charla', 'UNA', '2024-06-22 09:30:00', 'No', 10, 4, 'Externo', 'Activo');

-- Volcando estructura para tabla api-admin.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla api-admin.failed_jobs: ~0 rows (aproximadamente)

-- Volcando estructura para tabla api-admin.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla api-admin.migrations: ~12 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_07_10_035136_create_voluntarios_table', 1),
	(6, '2023_07_10_035144_create_nuevos_puntos_table', 1),
	(7, '2023_08_25_193142_create_usuarios_table', 1),
	(8, '2023_09_03_215059_create_roles_table', 1),
	(9, '2023_09_05_214049_create_reservaciones_table', 1),
	(10, '2023_09_26_134044_create_tiposvolcamp_table', 1),
	(11, '2023_12_31_235243_update_voluntariados_table', 1),
	(12, '2024_01_03_004110_update_campañas__table', 1);

-- Volcando estructura para tabla api-admin.nuevos_puntos
CREATE TABLE IF NOT EXISTS `nuevos_puntos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombrePunto` varchar(255) NOT NULL,
  `descripcionPunto` varchar(255) NOT NULL,
  `ubicacionPunto` varchar(255) NOT NULL,
  `galeria` varchar(255) NOT NULL,
  `statusPunto` varchar(255) NOT NULL DEFAULT 'Activo',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla api-admin.nuevos_puntos: ~4 rows (aproximadamente)
INSERT INTO `nuevos_puntos` (`id`, `nombrePunto`, `descripcionPunto`, `ubicacionPunto`, `galeria`, `statusPunto`, `created_at`, `updated_at`) VALUES
	(22, 'Sendero Cornizuelo', 'Espacio en el cual se puede aprecir diferente flora y fauna', 'Universidad Nacional Campus Nicoya', '1718300355.webp', 'Activo', NULL, NULL),
	(23, 'Nimbu', 'Captación de agua de lluvia para potabilizarla', 'Universidad Nacional Campus Nicoya', '1718300494.webp', 'Activo', NULL, NULL),
	(24, 'Meliponario', 'Un meliponario es una instalación destinada a la cría y manejo de abejas sin aguijón (meliponas), enfocada en la producción de miel, polinización y conservación de estas especies.', 'Universidad Nacional  Campus Nicoya', '1718306174.webp', 'Activo', NULL, NULL),
	(25, 'Abrevadero', 'Estaque pequeño que siempre tiene agua para los animales', 'Sendero Cornizuelo UNA Campus Nicoya', '1718937220.webp', 'Activo', NULL, NULL);

-- Volcando estructura para tabla api-admin.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla api-admin.password_reset_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla api-admin.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla api-admin.personal_access_tokens: ~0 rows (aproximadamente)

-- Volcando estructura para tabla api-admin.reservaciones
CREATE TABLE IF NOT EXISTS `reservaciones` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombreVis` varchar(255) NOT NULL,
  `apell1Vis` varchar(255) NOT NULL,
  `apell2Vis` varchar(255) NOT NULL,
  `cedulaVis` varchar(255) NOT NULL,
  `fechaReserva` datetime NOT NULL,
  `cupo` varchar(255) NOT NULL,
  `telefonoVis` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'nueva',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=35 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla api-admin.reservaciones: ~12 rows (aproximadamente)
INSERT INTO `reservaciones` (`id`, `nombreVis`, `apell1Vis`, `apell2Vis`, `cedulaVis`, `fechaReserva`, `cupo`, `telefonoVis`, `email`, `status`, `created_at`, `updated_at`) VALUES
	(7, 'Lisseth', 'Segura', 'Boza', '503080510', '2024-03-21 13:46:00', '20', 85634819, 'lissethsegura1121@gmail.com', 'nueva', NULL, NULL),
	(11, 'Andrid', 'Montero', 'Lopez', '504380687', '2024-04-08 00:00:00', '1', 60757626, 'andrid04@gmail.com', 'nueva', NULL, NULL),
	(14, 'Ashton', 'Alvarado', 'Montiel', '05-0204-0201', '2024-04-30 00:00:00', '70', 86091029, 'mackencyigirlmore@gmail.com', 'nueva', NULL, NULL),
	(25, 'Cristopher', 'Montiel', 'Sequeira', '51590008', '2024-06-20 00:00:00', '3', 85129634, 'cristopher@1234.com', 'nueva', NULL, NULL),
	(26, 'Cristopher', 'Montiel', 'Sequeira', '51590008', '2024-06-20 00:00:00', '3', 85129634, 'cristopher@1234.com', 'nueva', NULL, NULL),
	(28, 'juan', 'perez', 'duarte', '405870123', '2024-06-29 00:00:00', '50', 85456878, 'juan@gmail.com', 'nueva', NULL, NULL),
	(29, 'Alonso', 'López', 'Aguero', '504230705', '2024-06-28 00:00:00', '100', 63678481, 'admin@gmail.com', 'nueva', NULL, NULL),
	(30, 'Alonso', 'López', 'Aguero', '504230705', '2024-06-28 00:00:00', '100', 63678481, 'admin@gmail.com', 'nueva', NULL, NULL),
	(31, 'Jareth', 'Moraga', 'Segura', '504390312', '2024-06-28 00:00:00', '12', 85763191, 'Moragajareth6@gmail.com', 'nueva', NULL, NULL),
	(32, 'Alonso', 'lopez', 'aguero', '105780215', '2024-06-26 00:00:00', '100', 62548785, 'jordi@gmail.com', 'nueva', NULL, NULL),
	(33, 'Anabel', 'Torres', 'Marin', '4545523552', '2024-06-22 22:02:00', '100', 67876412, 'nelson@gmail.com', 'nueva', NULL, NULL),
	(34, 'Alondo', 'López', 'Agüero', '409870654', '2024-06-27 00:00:00', '100', 63674523, 'jordialonsolopezaguero@gmail.com', 'nueva', NULL, NULL);

-- Volcando estructura para tabla api-admin.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla api-admin.roles: ~0 rows (aproximadamente)

-- Volcando estructura para tabla api-admin.solicitudes
CREATE TABLE IF NOT EXISTS `solicitudes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nomSoli` varchar(255) NOT NULL,
  `apellSoli1` varchar(255) NOT NULL,
  `apellSoli2` varchar(255) NOT NULL,
  `numSoli` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `tituloVC` varchar(255) NOT NULL,
  `descripVC` varchar(255) NOT NULL,
  `alimentacion` varchar(255) NOT NULL,
  `lugarVC` varchar(255) NOT NULL,
  `tipoSoli` varchar(255) NOT NULL,
  `fechaSoli` datetime NOT NULL,
  `statusSoli` varchar(255) NOT NULL DEFAULT 'Nueva',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=40 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla api-admin.solicitudes: ~1 rows (aproximadamente)
INSERT INTO `solicitudes` (`id`, `nomSoli`, `apellSoli1`, `apellSoli2`, `numSoli`, `email`, `tituloVC`, `descripVC`, `alimentacion`, `lugarVC`, `tipoSoli`, `fechaSoli`, `statusSoli`) VALUES
	(38, 'Cristopher', 'Montiel', 'Sequeira', 84356709, 'cristopher@1234.com', 'Voluntariado', 'Se solicita colaboración para la limpieza de los alrededores del parque de Nicoya', 'No', 'Plazoleta Parque Nicoya', 'VOLUNTARIADO', '2024-06-21 00:00:00', 'Nueva');

-- Volcando estructura para tabla api-admin.tiposvolcamp
CREATE TABLE IF NOT EXISTS `tiposvolcamp` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombreTipo` varchar(255) NOT NULL,
  `statusVC` varchar(255) NOT NULL DEFAULT 'Activo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla api-admin.tiposvolcamp: ~5 rows (aproximadamente)
INSERT INTO `tiposvolcamp` (`id`, `nombreTipo`, `statusVC`) VALUES
	(4, 'Social', 'Activo'),
	(31, 'Ambiental', 'Activo'),
	(34, 'Educativo', 'Inactivo'),
	(35, 'Salud', 'Inactivo'),
	(36, 'Político', 'Inactivo');

-- Volcando estructura para tabla api-admin.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `apell1` varchar(255) NOT NULL,
  `apell2` varchar(255) NOT NULL,
  `cedula` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `ocupacion` varchar(255) NOT NULL,
  `rol` varchar(50) DEFAULT 'voluntario',
  `status` varchar(50) DEFAULT 'Activo',
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla api-admin.users: ~5 rows (aproximadamente)
INSERT INTO `users` (`id`, `name`, `email`, `password`, `apell1`, `apell2`, `cedula`, `numero`, `ocupacion`, `rol`, `status`) VALUES
	(2, 'Jareth', 'Moragajareth6@gmail.com', '$2y$10$Vx34ECsbVDcFDloxtqq3k.xk.cn6kcDdgNM.jSL4HP.e0PRqZOjPC', 'Moraga', 'Segura', '504390312', 85763191, 'Estudiante', 'admin', 'Activo'),
	(3, 'Jordi', 'jordi@gmail.com', '$2y$10$.DLcDN01Ik6uJIFAR2Ilq.wvwc50LM6Rkd5nO3QYq.d0v8fIdaBFi', 'López', 'Agüero', '504230705', 63678481, 'Estudiante', 'admin', 'Activo'),
	(4, 'Alexander', 'alexander@gmail.com', '$2y$10$EuhEjiTJIAum.3dQM.XDrOfIhqdY/F583JQ97XpGNpi9hLnw2qfou', 'Alvarado', 'Rodriguez', '118190533', 84154482, 'Estudiante', 'admin', 'Activo'),
	(9, 'Pablo', 'jpespinozamarin02@gmail.com', '$2y$10$SSFpphFP/KSvsHh3nuqkd.9tLMpHDO7nCVr4x.Z0COfwsP5lS2XTa', 'Espinoza', 'Marin', '118160056', 86288168, 'Estudiante', 'voluntario', 'Activo'),
	(10, 'Juan', 'Juan@gmail.com', '$2y$10$D103vuZW/n0MoPtlV.uIeu2WAX2/v8OoV6Rc1mCjFB57blXXzwW3W', 'Alvarado', 'Rodriguez', '81288882', 87873321, 'Estudiante', 'voluntario', 'Activo');

-- Volcando estructura para tabla api-admin.usuariocampana
CREATE TABLE IF NOT EXISTS `usuariocampana` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` bigint(20) unsigned NOT NULL,
  `campaña_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuariocampaña_campaña_id_foreign` (`campaña_id`),
  KEY `usuariocampaña_users_id_foreign` (`users_id`) USING BTREE,
  CONSTRAINT `usuariocampaña_campaña_id_foreign` FOREIGN KEY (`campaña_id`) REFERENCES `campañas` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `usuariocampaña_usuario_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=76 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla api-admin.usuariocampana: ~3 rows (aproximadamente)
INSERT INTO `usuariocampana` (`id`, `users_id`, `campaña_id`, `created_at`, `updated_at`) VALUES
	(73, 9, 2, NULL, NULL),
	(74, 10, 2, NULL, NULL),
	(75, 10, 4, NULL, NULL);

-- Volcando estructura para tabla api-admin.usuarios
CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `apell1` varchar(255) NOT NULL,
  `apell2` varchar(255) NOT NULL,
  `cedula` varchar(255) NOT NULL,
  `numero` int(11) NOT NULL,
  `ocupacion` varchar(255) NOT NULL,
  `rol` varchar(255) NOT NULL DEFAULT 'voluntario',
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Activo',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla api-admin.usuarios: ~0 rows (aproximadamente)

-- Volcando estructura para tabla api-admin.usuario_voluntariados
CREATE TABLE IF NOT EXISTS `usuario_voluntariados` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `users_id` bigint(20) unsigned NOT NULL,
  `voluntariado_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `usuario_voluntariados_voluntariado_id_foreign` (`voluntariado_id`),
  KEY `usuario_voluntariados_usuario_id_foreign` (`users_id`) USING BTREE,
  CONSTRAINT `FK_usuario_voluntariados_api-restful.users` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `usuario_voluntariados_user_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `usuario_voluntariados_voluntariado_id_foreign` FOREIGN KEY (`voluntariado_id`) REFERENCES `voluntariados` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla api-admin.usuario_voluntariados: ~2 rows (aproximadamente)
INSERT INTO `usuario_voluntariados` (`id`, `users_id`, `voluntariado_id`, `created_at`, `updated_at`) VALUES
	(85, 2, 5, NULL, NULL),
	(86, 2, 6, NULL, NULL);

-- Volcando estructura para vista api-admin.vistacampanas
-- Creando tabla temporal para superar errores de dependencia de VIEW
CREATE TABLE `vistacampanas` (
	`Nombre` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`Descripción` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`Ubicación` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`Fecha` DATETIME NOT NULL,
	`Alimentación` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`Capacidad` INT(11) NOT NULL,
	`Tipo` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`Interior/Exterior` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci',
	`Estado` VARCHAR(255) NOT NULL COLLATE 'utf8mb4_unicode_ci'
) ENGINE=MyISAM;

-- Volcando estructura para tabla api-admin.voluntariados
CREATE TABLE IF NOT EXISTS `voluntariados` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `ubicacion` varchar(255) NOT NULL,
  `fecha` datetime NOT NULL,
  `alimentacion` varchar(255) NOT NULL,
  `capacidad` int(11) NOT NULL,
  `tipo` bigint(20) unsigned NOT NULL,
  `inOex` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL DEFAULT 'Activo',
  PRIMARY KEY (`id`),
  KEY `voluntariados_tipo_foreign` (`tipo`),
  CONSTRAINT `voluntariados_tipo_foreign` FOREIGN KEY (`tipo`) REFERENCES `tiposvolcamp` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla api-admin.voluntariados: ~6 rows (aproximadamente)
INSERT INTO `voluntariados` (`id`, `nombre`, `descripcion`, `ubicacion`, `fecha`, `alimentacion`, `capacidad`, `tipo`, `inOex`, `status`) VALUES
	(5, 'Ayuda en el asilo', 'Se brindara ayuda en el asilo de Nicoya para el dia del adulto mayor', 'Asilo Nicoya', '2024-08-29 08:00:00', 'sí', 15, 4, 'Externo', 'Activo'),
	(6, 'Actividad del dia del niño', 'Se solicita colaboracion para las actividades del dia del niño en nicoya', 'Parque Nicoya', '2024-09-09 08:00:00', 'sí', 12, 4, 'Externo', 'Activo'),
	(21, 'Limpieza playa carrillo', 'Se va a limpiar la playa', 'Playa Carrillo', '2024-07-27 08:00:00', 'sí', 20, 31, 'Externo', 'Activo'),
	(22, 'Limpieza Sendero Cornizuelo', 'Se limpiará el Sendero Cornizuelo', 'UNA Campus Nicoya', '2024-02-21 08:05:00', 'sí', 20, 31, 'interno', 'Activo'),
	(23, 'Limpieza Calles', 'Se limpiarán las calles cerca de la Universidad Nacional', 'UNA Campus Nicoya', '2024-02-29 18:12:00', 'sí', 20, 4, 'Externo', 'Activo'),
	(24, 'Reciclaje Activo', 'Recolección de basura reciclable', 'Nicoya centro', '2024-07-25 18:55:00', 'No', 100, 31, 'Externo', 'Activo');

-- Volcando estructura para tabla api-admin.voluntarios
CREATE TABLE IF NOT EXISTS `voluntarios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `apellido1` varchar(255) NOT NULL,
  `apellido2` varchar(255) NOT NULL,
  `carrera` varchar(255) NOT NULL,
  `numero` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Volcando datos para la tabla api-admin.voluntarios: ~0 rows (aproximadamente)

-- Volcando estructura para vista api-admin.vistacampanas
-- Eliminando tabla temporal y crear estructura final de VIEW
DROP TABLE IF EXISTS `vistacampanas`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vistacampanas` AS select `c`.`nombre` AS `Nombre`,`c`.`descripcion` AS `Descripción`,`c`.`ubicacion` AS `Ubicación`,`c`.`fecha` AS `Fecha`,`c`.`alimentacion` AS `Alimentación`,`c`.`capacidad` AS `Capacidad`,`t`.`nombreTipo` AS `Tipo`,`c`.`inOex` AS `Interior/Exterior`,`c`.`status` AS `Estado` from (`campañas` `c` join `tiposvolcamp` `t` on(`c`.`tipo` = `t`.`id`));

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
