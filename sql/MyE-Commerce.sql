-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 30, 2023 at 03:59 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `my_ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `description` text NOT NULL,
  `seller` varchar(512) NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `availability` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `name`, `description`, `seller`, `price`, `stock`, `availability`) VALUES
(1, 'Fourchette', 'Couvert de table permettant d\'attraper les aliments, sans les toucher directement avec les doigts.', 'Le Coin Cuisine', 5, 12, 1),
(2, 'Couteau', 'Un couteau est un outil tranchant comportant une lame (suffisamment courte pour ne pas être qualifiée de sabre ou de machette) et un manche permettant de manier l\'outil sans se blesser.', 'La Cuisine du Coin', 3, 0, 1),
(3, 'Cuillère à café', 'La cuillère à café est un couvert de table servant à remuer le sucre ou tout autre produit sucrant se présentant sous forme de poudre ou de liquide, tel que le miel.', 'Le Coin Cuisine', 3, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `author_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `rate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `author_id`, `article_id`, `comment`, `rate`) VALUES
(1, 1, 1, 'Superbe fourchette, j\'aime notamment le manche ouvragé.', 5),
(2, 2, 1, 'J\'ai horreur de ce genre de fourchette. Tout dans la frime, rien dans le pratique. Ce manche coûte plus cher qu\'une nouvelle poêle.', 1),
(3, 1, 2, 'Ce couteau est super, mais je me suis taillé... j\'enlève une étoile.', 4),
(4, 2, 2, 'Finalement mes couverts jetables font plus l\'affaire. De toutes façons je ne mange qu\'avec les doigts. ', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `full_name` varchar(64) NOT NULL,
  `email` varchar(512) NOT NULL,
  `password` varchar(512) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `full_name`, `email`, `password`) VALUES
(1, 'Clément Aver', 'clement.aver@yahoo.fr', 'devine'),
(2, 'John Doe', 'john.doe@mail.com', 'devine');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
