CREATE TABLE IF NOT EXISTS `movies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  `favorite` boolean NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO `movies` (`id`,`name`, `favorite`) VALUES 
    (1, 'Night in Paradise', true),
    (2, 'Black Hawk Down', false),
    (3, 'Eagle Eye', false),
    (4, 'Men in Black: International', true);
