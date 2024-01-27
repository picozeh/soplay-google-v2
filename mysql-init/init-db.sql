CREATE DATABASE IF NOT EXISTS users_login;

USE users_login;

CREATE TABLE IF NOT EXISTS `users` (
    `id` int(11) NOT NULL AUTO_INCREMENT, `login_id` varchar(150) COLLATE utf8mb4_unicode_ci NOT NULL, `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL, `email` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL, `profile_image` text COLLATE utf8mb4_unicode_ci NOT NULL, PRIMARY KEY (`id`), UNIQUE KEY `login_id` (`login_id`)
) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_unicode_ci;