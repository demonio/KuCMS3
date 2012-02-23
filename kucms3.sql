SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

DROP TABLE IF EXISTS `hooks`;

CREATE TABLE `hooks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hook` varchar(69) NOT NULL,
  `templates_id` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

insert into `hooks` values('1','Menu vertical','1','0');

DROP TABLE IF EXISTS `pages`;

CREATE TABLE `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `level1` smallint(2) DEFAULT '0',
  `level2` smallint(2) DEFAULT '0',
  `level3` smallint(2) DEFAULT '0',
  `link` varchar(69) DEFAULT NULL,
  `slug` varchar(69) DEFAULT NULL,
  `title` varchar(69) DEFAULT NULL,
  `subtitle` varchar(69) DEFAULT NULL,
  `content` text,
  `hooks_id` int(11) DEFAULT NULL,
  `deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

insert into `pages` values('1','1','0','0','Inicio',null,'Inicio','Inicio','Inicio','1','1'),
 ('2','1','0','0','Inicio','inicio','Inicio','Inicio','<p>\r\n	Inicio</p>\r\n','1','1'),
 ('3','1','0','0','Inicio','inicio','Inicio','Inicio','<p>\r\n	Inicio</p>\r\n','1','1'),
 ('4','1','0','0','Home','home','Inicio','Inicio','<p>\r\n	Inicio</p>\r\n','1','0');

DROP TABLE IF EXISTS `templates`;

CREATE TABLE `templates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template` varchar(69) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

insert into `templates` values('1','default','0');

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(69) NOT NULL,
  `pass` varchar(69) NOT NULL,
  `role` varchar(69) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

insert into `users` values('6','admin','28b076a18c3c11ea8998391835c3c55d','admin','0');

SET FOREIGN_KEY_CHECKS = 1;
