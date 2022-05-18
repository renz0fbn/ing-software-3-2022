CREATE TABLE `Users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lastName` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` int(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 3 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;


CREATE TABLE `News` (
	`idNoticia` int(11) NOT NULL AUTO_INCREMENT,
	`titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
	`created_at` timestamp NOT NULL DEFAULT current_timestamp(),
	`updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
	`resumen` text COLLATE utf8mb4_unicode_ci NOT NULL,
	`cuerpo` text COLLATE utf8mb4_unicode_ci NOT NULL,
    `categoria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `idUsuario` int(11) NOT NULL,
    `autor` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
    `thumbail` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
    PRIMARY KEY (`idNoticia`),
    KEY `idUsuario` (`idUsuario`),
    CONSTRAINT `News_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `Users` (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 3 DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;
