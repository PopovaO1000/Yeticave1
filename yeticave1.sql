SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `yeticave1` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `yeticave1`;

CREATE TABLE `bid` (
  `id_bid` int(11) NOT NULL,
  `bid_date` date NOT NULL,
  `bid_sum` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_lot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `category` (
  `id_category` int(11) NOT NULL,
  `name_category` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `lot` (
  `id_lot` int(11) NOT NULL,
  `creation_date` date NOT NULL,
  `lot_name` varchar(100) NOT NULL,
  `descr` varchar(1000) NOT NULL,
  `img` varchar(100) NOT NULL,
  `start_price` int(11) NOT NULL,
  `end_date` date NOT NULL,
  `iteration` int(11) NOT NULL,
  `id_author` int(11) NOT NULL,
  `id_winner` int(11) NOT NULL,
  `id_category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `reg_date` date NOT NULL,
  `email` varchar(20) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `avatar` varchar(100) NOT NULL,
  `contacts` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;


ALTER TABLE `bid`
  ADD PRIMARY KEY (`id_bid`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_lot` (`id_lot`);

ALTER TABLE `category`
  ADD PRIMARY KEY (`id_category`);

ALTER TABLE `lot`
  ADD PRIMARY KEY (`id_lot`),
  ADD KEY `id_author` (`id_author`),
  ADD KEY `id_winner` (`id_winner`),
  ADD KEY `id_category` (`id_category`);

ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);


ALTER TABLE `bid`
  MODIFY `id_bid` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `category`
  MODIFY `id_category` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `lot`
  MODIFY `id_lot` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;


ALTER TABLE `bid`
  ADD CONSTRAINT `bid_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `bid_ibfk_2` FOREIGN KEY (`id_lot`) REFERENCES `lot` (`id_lot`) ON DELETE CASCADE ON UPDATE CASCADE;

ALTER TABLE `lot`
  ADD CONSTRAINT `lot_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id_category`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lot_ibfk_2` FOREIGN KEY (`id_author`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `lot_ibfk_3` FOREIGN KEY (`id_winner`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
