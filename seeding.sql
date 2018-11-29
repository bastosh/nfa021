# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Hôte: 127.0.0.1 (MySQL 5.5.5-10.3.7-MariaDB)
# Base de données: simple
# Temps de génération: 2018-11-28 10:22:29 +0000
# ************************************************************


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


# Affichage de la table features
# ------------------------------------------------------------

DROP TABLE IF EXISTS `features`;

CREATE TABLE `features` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '',
  `description` varchar(255) NOT NULL DEFAULT '',
  `published` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `features` WRITE;
/*!40000 ALTER TABLE `features` DISABLE KEYS */;

INSERT INTO `features` (`id`, `title`, `description`, `published`, `created_at`, `updated_at`)
VALUES
	(1,'MVC structure','Models, views, controllers, well orgazined in their folders',1,'2018-11-28 10:49:27','2018-11-28 10:51:20'),
	(2,'Core features','Autoloading, dependency injection, request handling, routing, CRUD methods, flash messages',1,'2018-11-28 10:49:27','2018-11-28 10:49:27'),
	(3,'CSS framework','Foundation to the rescue!',1,'2018-11-28 10:49:27','2018-11-28 10:49:27'),
	(4,'Assets compilation','A nice Gulpfile to compile (saas), minify (cssnano) and clean (purgecss) your CSS',1,'2018-11-28 10:49:27','2018-11-28 10:49:27'),
	(5,'Live reload','Browsersync is ready to go',1,'2018-11-28 10:49:27','2018-11-28 10:49:27'),
	(6,'Clean code','Well structured, namespaced and documented project',1,'2018-11-28 10:49:27','2018-11-28 10:49:27'),
	(7,'Unpublished feature','This one is a draft',0,'2018-11-28 10:49:27','2018-11-28 10:49:27');

/*!40000 ALTER TABLE `features` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table posts
# ------------------------------------------------------------

DROP TABLE IF EXISTS `posts`;

CREATE TABLE `posts` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL DEFAULT '',
  `content` text NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT 1,
  `cover` varchar(100) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;

INSERT INTO `posts` (`id`, `title`, `content`, `published`, `cover`, `created_at`, `updated_at`)
VALUES
	(1,'New kids on the blog!','<h2>This is the first one</h2>\r\n\r\n<p>A first post is always an event. For sure.</p>\r\n',1,'','2018-11-26 11:15:37','2018-11-28 11:16:52'),
	(2,'Article with an image','<h2>This is a title</h2>\r\n\r\n<p><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </strong></p>\r\n\r\n<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n',1,'laptop.jpg','2018-11-27 10:16:25','2018-11-27 10:16:25'),
	(3,'Another article','<h2>A title</h2>\r\n\r\n<p><strong>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. </strong></p>\r\n\r\n<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n',1,'laptop2.jpg','2018-11-28 10:16:30','2018-11-28 10:16:30');

/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
