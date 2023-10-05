CREATE DATABASE `my_ecommerce`;

USE `my_ecommerce`;

CREATE TABLE `users` ( `user_id` INT NOT NULL AUTO_INCREMENT , `full_name` VARCHAR(64) NOT NULL , `email` VARCHAR(512) NOT NULL , `password` VARCHAR(512) NOT NULL , PRIMARY KEY (`user_id`)) ENGINE = MyISAM;

CREATE TABLE `articles` ( `article_id` int(11) NOT NULL, `title` varchar(128) NOT NULL, `description` text NOT NULL, `seller` varchar(512) NOT NULL, `prix` int(11) NOT NULL, `is_enabled` tinyint(1) NOT NULL) ENGINE=MyISAM DEFAULT CHARSET=utf8;

insert into `users` ( `user_id`, `full_name`, `email`, `password`) values (1, 'Clément Aver', 'clement.aver@yahoo.fr', 'devine');

insert into `articles` ( `article_id`, `title`, `seller`, `description`, `prix`, `is_enabled`) values (1, 'Fourchette', 'Le Coin Cuisine', "Couvert de table permettant d'attraper les aliments, sans les toucher directement avec les doigts.", 5, true );
insert into `articles` ( `article_id`, `title`, `seller`, `description`, `prix`, `is_enabled`) values (2, 'Couteau', 'Le Coin Cuisine', "Un couteau est un outil tranchant comportant une lame (suffisamment courte pour ne pas être qualifiée de sabre ou de machette) et un manche permettant de manier l'outil sans se blesser.", 5, true );
insert into `articles` ( `article_id`, `title`, `seller`, `description`, `prix`, `is_enabled`) values (3, 'Cuillère à café', 'Le Coin Cuisine', "La cuillère à café est un couvert de table servant à remuer le sucre ou tout autre produit sucrant se présentant sous forme de poudre ou de liquide, tel que le miel.", 3, false );
