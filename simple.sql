DROP TABLE IF EXISTS `features`;

CREATE TABLE `features` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL DEFAULT '',
  `description` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `features` (`id`, `title`, `description`)
VALUES
	(1,'MVC structure','Models, views, controllers, well orgazined in their folders'),
	(2,'Core features','Autoloading, dependency injection, request handling, routing, CRUD methods, flash messages'),
	(3,'CSS framework','Foundation to the rescue!'),
	(4,'Assets compilation','A nice Gulpfile to compile (saas), minify (cssnano) and clean (purgecss) your CSS'),
	(5,'Live reload','Browsersync is ready to go'),
	(6,'Clean code','Well structured, namespaced and documented project');
