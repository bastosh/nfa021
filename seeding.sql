# ************************************************************
# Sequel Pro SQL dump
# Version 4541
#
# http://www.sequelpro.com/
# https://github.com/sequelpro/sequelpro
#
# Hôte: 127.0.0.1 (MySQL 5.5.5-10.3.7-MariaDB)
# Base de données: catclinic
# Temps de génération: 2019-02-22 00:23:37 +0000
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

CREATE TABLE `features` (
  `id` int(3) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '',
  `published` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `features` WRITE;
/*!40000 ALTER TABLE `features` DISABLE KEYS */;

INSERT INTO `features` (`id`, `title`, `published`, `created_at`, `updated_at`)
VALUES
	(1,'Radiographie',1,'2018-11-28 09:49:27','2019-01-17 23:33:26'),
	(2,'Échographie',1,'2018-11-28 09:49:27','2019-01-17 23:20:59'),
	(3,'Analyses sanguines',1,'2018-11-28 09:49:27','2019-01-17 23:21:05'),
	(4,'Laboratoire et cytologie',1,'2018-11-28 09:49:27','2019-01-17 22:27:02'),
	(5,'Dentisterie',1,'2018-11-28 09:49:27','2019-01-17 22:27:25'),
	(6,'Chirurgie',1,'2018-11-28 09:49:27','2019-01-17 22:27:48'),
	(7,'Hospitalisation',1,'2018-11-28 09:49:27','2019-01-17 22:28:06'),
	(8,'Service de garde 24h/24 7j/7',1,'2018-11-28 09:49:27','2019-01-17 22:28:06');

/*!40000 ALTER TABLE `features` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table guides
# ------------------------------------------------------------

CREATE TABLE `guides` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL DEFAULT '',
  `slug` varchar(60) NOT NULL DEFAULT '',
  `description` text NOT NULL,
  `published` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `guides` WRITE;
/*!40000 ALTER TABLE `guides` DISABLE KEYS */;

INSERT INTO `guides` (`id`, `title`, `slug`, `description`, `published`, `created_at`, `updated_at`)
VALUES
	(1,'Maladies et vaccination','maladies-et-vaccination','<p>L&rsquo;un des meilleurs moyens de permettre &agrave; votre chat de vivre en bonne sant&eacute; pendant de nombreuses ann&eacute;es est de le faire vacciner contre les maladies f&eacute;lines les plus r&eacute;pandues.</p>\r\n\r\n<p>Au cours des premi&egrave;res semaines de son existence votre chat a re&ccedil;u, par le lait de sa m&egrave;re, des anticorps qui l&rsquo;ont immunis&eacute; contre certaines maladies.</p>\r\n\r\n<p>Apr&egrave;s cette p&eacute;riode, c&rsquo;est &agrave; vous qu&rsquo;il revient de prot&eacute;ger votre compagnon, avec l&rsquo;aide et les conseils de votre v&eacute;t&eacute;rinaire.</p>\r\n',1,'2019-01-17 19:42:12','2019-02-17 19:58:56'),
	(2,'Comment un vaccin fonctionne-t-il ?','comment-un-vaccin-fonctionne-t-il','<p>Un vaccin contient une petite quantit&eacute; de virus, de bact&eacute;ries ou d&#39;autres organismes causant des maladies. Ceux-ci ont &eacute;t&eacute; soit att&eacute;nu&eacute;s soit &laquo; tu&eacute;s &raquo;.</p>\r\n\r\n<p>Lorsque ces organismes sont administr&eacute;s &agrave; votre chat, ils stimulent son syst&egrave;me immunitaire qui produit des cellules et des prot&eacute;ines qui combattent la maladie, &laquo; les anticorps &raquo;, et prot&egrave;gent votre animal contre certaines maladies.</p>\r\n',1,'2019-01-17 23:03:57','2019-02-17 19:59:52'),
	(3,'Quand faire vacciner son chat ?','quand-faire-vacciner-son-chat','<p>En g&eacute;n&eacute;ral, l&rsquo;immunit&eacute; que re&ccedil;oit un chaton &agrave; sa naissance commence &agrave; s&rsquo;estomper apr&egrave;s neuf semaines. C&rsquo;est alors le moment, habituellement, de lui administrer ses premiers vaccins. Il doit recevoir un rappel de 3 &agrave; 4 semaines plus tard.</p>\r\n\r\n<p>Par la suite, votre chat devra se faire vacciner r&eacute;guli&egrave;rement toute sa vie. Bien s&ucirc;r, ce ne sont que des lignes directrices. Votre v&eacute;t&eacute;rinaire sera en mesure de d&eacute;terminer le programme de vaccination qui r&eacute;pondra parfaitement aux besoins de votre compagnon.</p>\r\n',1,'2019-01-17 23:04:17','2019-02-17 20:04:51'),
	(4,'Les dangers domestiques','les-dangers-domestiques','<h2>Comment faire de votre maison un endroit s&ucirc;r pour vos animaux domestiques ?</h2>\r\n\r\n<p>Tout comme les parents rendent leur maison &agrave; l&rsquo;&eacute;preuve de leurs enfants, les propri&eacute;taires d&rsquo;animaux domestiques devraient faire de m&ecirc;me pour leur animal domestique. Nos compagnons &agrave; quatre pattes sont comme les b&eacute;b&eacute;s et les bambins: curieux de nature, ils sont port&eacute;s &agrave; explorer leur environnement avec leurs pattes et leurs griffes et &agrave; go&ucirc;ter &agrave; tout.</p>\r\n\r\n<h2>Dans la maison</h2>\r\n\r\n<p>Installez des moustiquaires dans les fen&ecirc;tres pour &eacute;viter les chutes. Ne laissez pas les jeunes animaux sur un balcon, un perron ou une terrasse sur&eacute;lev&eacute;s.</p>\r\n\r\n<p>Un grand nombre de plantes d&rsquo;int&eacute;rieur, comme le dieffenbachia, le philodendron en fer de lance, la plante araign&eacute;e, sont toxiques quand elles sont ing&eacute;r&eacute;es. Enlevez-les ou placez-les hors d&rsquo;atteinte dans des jardini&egrave;res suspendues.</p>\r\n\r\n<p>Les chiots et les chatons adorent m&acirc;chouiller lorsqu&rsquo;ils font leurs dents. Par cons&eacute;quent, d&eacute;branchez ou enlevez les cordons &eacute;lectriques ou couvrez-les.</p>\r\n\r\n<p>Ne laissez pas votre animal sans surveillance dans une pi&egrave;ce dans laquelle un feu de foyer est allum&eacute; ou une chaufferette fonctionne.</p>\r\n\r\n<p>Les sacs de plastique sont bien amusants, mais votre animal peut s&rsquo;&eacute;touffer en jouant avec eux.</p>\r\n\r\n<p>Dites-vous bien que si votre animal domestique peut se mettre quelque chose dans la gueule, il est fort probable qu&rsquo;il le fera. Ne laissez donc pas tra&icirc;ner de petits objets pointus et faciles &agrave; avaler.</p>\r\n',1,'2019-01-17 23:04:56','2019-02-17 20:00:27'),
	(5,'Administration des médicaments','administration-des-medicaments','<p>Tout comme vous, votre animal sera malade et il est probable que vous deviez lui administrer des m&eacute;dicaments prescrits par votre v&eacute;t&eacute;rinaire. L&rsquo;emploi d&rsquo;une bonne m&eacute;thode facilitera la vie de tout le monde:</p>\r\n\r\n<h2>Les comprim&eacute;s ou g&eacute;lules</h2>\r\n\r\n<p>C&#39;est certainement le seul m&eacute;dicament qu&#39;on puisse lui administrer sans probl&egrave;me. Contrairement &agrave; ce qu&#39;on croit, votre animal est parfaitement capable d&#39;avaler des gros comprim&eacute;s&nbsp;</p>\r\n\r\n<p>1re &eacute;tape : Placez le comprim&eacute; entre vos doigts. De l&rsquo;autre main, tenez sa t&ecirc;te par derri&egrave;re. Le menton doit passer &agrave; la verticale.&nbsp;</p>\r\n\r\n<p>2e &eacute;tape : Maintenant, ses yeux fixent le plafond, la l&egrave;vre inf&eacute;rieure baille spontan&eacute;ment. Si votre animal n&rsquo;ouvre pas la gueule, exercez une l&eacute;g&egrave;re pression sur sa m&acirc;choire inf&eacute;rieure &agrave; l&rsquo;aide de votre majeur.&nbsp;</p>\r\n\r\n<p>3e &eacute;tape : Laissez votre majeur sur les petites incisives de votre animal afin que sa gueule reste ouverte. : D&eacute;posez le comprim&eacute; le plus loin possible dans la gueule. Refermez la gueule&nbsp;</p>\r\n\r\n<p>4e &eacute;tape : Masser sa gorge ou soufflez sur son nez pour l&rsquo;inciter &agrave; d&eacute;glutir.&nbsp;</p>\r\n\r\n<h2>Les liquides</h2>\r\n\r\n<p>Agitez le flacon si cela est demand&eacute;.&nbsp;</p>\r\n\r\n<p>1re &eacute;tape : Tout d&rsquo;abord, remplissez une seringue du m&eacute;dicament.</p>\r\n\r\n<p>2e &eacute;tape : Le m&eacute;dicament liquide doit &ecirc;tre vers&eacute; dans l&#39;espace entre la canine et les molaires.</p>\r\n\r\n<p>3e &eacute;tape : Tenez les m&acirc;choires de votre animal ferm&eacute;es et renversez l&eacute;g&egrave;rement sa t&ecirc;te vers l&rsquo;arri&egrave;re.&nbsp;</p>\r\n\r\n<h2>Conseils pratiques</h2>\r\n\r\n<p>Lisez attentivement l&#39;&eacute;tiquette.</p>\r\n\r\n<p>Demandez &agrave; votre v&eacute;t&eacute;rinaire &agrave; quel moment du repas le m&eacute;dicament peut &ecirc;tre donn&eacute;.</p>\r\n\r\n<p>Cachez le comprim&eacute; dans un morceau d&#39;aliment app&egrave;tent (viande hach&eacute;e, fromage).</p>\r\n\r\n<p>Demandez &agrave; un ami ou &agrave; un membre de la famille de vous aider.</p>\r\n\r\n<p>Lorsque la taille de l&#39;animal le permet, il est plus facile d&#39;administrer des m&eacute;dicaments si l&#39;animal est plac&eacute; sur une table.</p>\r\n\r\n<p>Lorsque vous donnez un m&eacute;dicament, demeurez calme, car votre animal peut sentir votre nervosit&eacute;, ce qui rendra votre t&acirc;che plus difficile.</p>\r\n\r\n<p>Vous devez toujours le f&eacute;liciter et le r&eacute;compenser avec une g&acirc;terie.</p>\r\n\r\n<p>Pour &eacute;viter de mettre vos doigts dans la gueule de votre compagnon, vous pouvez utiliser une seringue sp&eacute;ciale. Il s&rsquo;agit d&rsquo;un tube en plastique similaire &agrave; une seringue qui permet de d&eacute;poser le comprim&eacute; ou la capsule dans la gueule de l&rsquo;animal.&nbsp;</p>\r\n',1,'2019-01-17 23:04:56','2019-02-17 20:01:38'),
	(6,'Comportement de votre chat','comportement-de-votre-chat','<h2>Notions de base</h2>\r\n\r\n<p>Le chat est devenu l&rsquo;animal de compagnie le plus populaire en Europe. Bien qu&rsquo;il soit tr&egrave;s diff&eacute;rent du chien, le chat est animal sociable et ind&eacute;pendant, demandant &eacute;norm&eacute;ment d&rsquo;affection !</p>\r\n\r\n<p>Quand vous adoptez un chaton ou un chat, vous devez d&eacute;cider s&rsquo;il vivra seulement &agrave; l&rsquo;int&eacute;rieur ou s&rsquo;il pourra aller dehors. Les deux situations comportent des avantages et des inconv&eacute;nients.</p>\r\n\r\n<p>Les chats qui vont dehors sont plus expos&eacute;s aux maladies et leur esp&eacute;rance de vie peut &ecirc;tre beaucoup plus courte que celle des chats d&rsquo;appartement, car ils peuvent se faire heurter par une voiture ou se faire attaquer par d&rsquo;autres animaux.</p>\r\n\r\n<p>Par contre, si votre chat ne sort pas, vous devez le stimuler mentalement et physiquement, jouer avec lui et lui faire faire de l&rsquo;exercice. Il devra &eacute;galement disposer d&rsquo;un poteau &agrave; griffer et d&rsquo;une liti&egrave;re propre.&nbsp;</p>\r\n',1,'2019-01-17 23:04:56','2019-02-17 20:02:19'),
	(7,'Choisir son griffoir','choisir-son-griffoir','<p>Faire ses griffes est un geste naturel pour un chat; cette activit&eacute; commence d&egrave;s l&rsquo;&acirc;ge de 5 semaines. Cela permet &agrave; l&rsquo;animal de laisser des ph&eacute;rormones qui servent &agrave; communiquer avec les autres animaux. Toutefois, ce geste tout &agrave; fait normal peut devenir probl&eacute;matique quand votre chat s&rsquo;en prend &agrave; vos tapis et &agrave; vos meubles. Il faudra acheter un griffoir et le disposer &agrave; un endroit bien &agrave; lui pour faire ses griffes.&nbsp;</p>\r\n\r\n<p>Attention, les griffoirs que l&rsquo;on trouve dans le commerce ne plaisent pas &agrave; tous les chats.&nbsp;</p>\r\n\r\n<p>Id&eacute;alement, le griffoir doit &ecirc;tre plus grand que le chat debout sur ses pattes arri&egrave;re et doit &ecirc;tre plac&eacute; bien en vue dans un endroit facile d&rsquo;acc&egrave;s.&nbsp;</p>\r\n\r\n<p>&Eacute;vitez de changer tout le temps de griffoir. En effet, plus le poteau aura &eacute;t&eacute; griff&eacute; et sera d&eacute;labr&eacute;, plus votre chat l&rsquo;aimera et l&rsquo;utilisera.</p>\r\n',1,'2019-01-17 23:04:56','2019-02-17 20:02:57');

/*!40000 ALTER TABLE `guides` ENABLE KEYS */;
UNLOCK TABLES;


# Affichage de la table images
# ------------------------------------------------------------

CREATE TABLE `images` (
  `image_id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `guide_id` int(11) DEFAULT NULL,
  `image_name` varchar(100) NOT NULL DEFAULT '',
  `text_alt` varchar(100) NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  PRIMARY KEY (`image_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;

INSERT INTO `images` (`image_id`, `guide_id`, `image_name`, `text_alt`, `created_at`, `updated_at`)
VALUES
	(1,1,'les-vaccins-chez-le-chat.jpg','Chat recevant un vaccin','2019-02-18 23:54:31','2019-02-18 23:53:45'),
	(2,2,'vaccin.jpg','Matériel de vaccination','2019-02-18 23:56:02','2019-02-18 23:55:16'),
	(3,3,'chat-rappel.jpg','Chat dans un panier','2019-02-18 23:55:55','2019-02-18 23:55:50'),
	(4,4,'dangers-de-la-maison-pour-le-chat.jpg','Chat dans une machine à laver','2019-02-18 23:56:49','2019-02-18 23:56:43'),
	(5,5,'donner_un_medicament_a_son_chat.jpg','Chat regardant une main tendue avec un cachet','2019-02-18 23:57:25','2019-02-18 23:57:21'),
	(6,6,'chat-comportement-comprendre.jpg','Chaton au-dessus d’un bocal avec un poisson rouge','2019-02-18 23:58:15','2019-02-18 23:58:11'),
	(7,7,'griffoir-carton.jpg','Un chat et trois griffoirs en carton','2019-02-18 23:58:58','2019-02-18 23:58:54');

/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;



/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
