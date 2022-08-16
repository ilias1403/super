-- -------------------------------------------------------------
-- TablePlus 3.11.0(352)
--
-- https://tableplus.com/
--
-- Database: super
-- Generation Time: 2022-08-16 17:18:09.4010
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `migrations` (
  `version` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

CREATE TABLE `quotes` (
  `quote_id` int(11) NOT NULL AUTO_INCREMENT,
  `quote` text DEFAULT NULL,
  `author` text DEFAULT NULL,
  `image` text DEFAULT NULL,
  `status` int(1) DEFAULT 1,
  `dt_added` datetime NOT NULL DEFAULT current_timestamp(),
  `dt_updated` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`quote_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `username` varchar(16) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `user_status` int(1) DEFAULT NULL,
  `fcm_token` text DEFAULT NULL,
  `dt_updated` datetime NOT NULL DEFAULT current_timestamp(),
  `dt_added` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `migrations` (`version`) VALUES
('2');

INSERT INTO `quotes` (`quote_id`, `quote`, `author`, `image`, `status`, `dt_added`, `dt_updated`) VALUES
('1', 'Genius is one percent inspiration and ninety-nine percent perspiration.', 'Thomas Edison', NULL, '1', '2022-08-16 16:57:30', '2022-08-16 16:57:30'),
('2', 'You can observe a lot just by watching.', 'Yogi Berra', NULL, '1', '2022-08-16 16:57:30', '2022-08-16 16:57:30'),
('3', 'A house divided against itself cannot stand.', 'Abraham Lincoln', NULL, '1', '2022-08-16 16:57:30', '2022-08-16 16:57:30'),
('4', 'Difficulties increase the nearer we get to the goal.', 'Johann Wolfgang von Goethe', NULL, '1', '2022-08-16 16:57:30', '2022-08-16 16:57:30'),
('5', 'Fate is in your hands and no one elses', 'Byron Pulsifer', NULL, '1', '2022-08-16 16:57:30', '2022-08-16 16:57:30'),
('6', 'Be the chief but never the lord.', 'Lao Tzu', NULL, '1', '2022-08-16 16:57:30', '2022-08-16 16:57:30'),
('7', 'Nothing happens unless first we dream.', 'Carl Sandburg', NULL, '1', '2022-08-16 16:57:30', '2022-08-16 16:57:30'),
('8', 'Well begun is half done.', 'Aristotle', NULL, '1', '2022-08-16 16:57:30', '2022-08-16 16:57:30'),
('9', 'Life is a learning experience, only if you learn.', 'Yogi Berra', NULL, '1', '2022-08-16 16:57:30', '2022-08-16 16:57:30'),
('10', 'Self-complacency is fatal to progress.', 'Margaret Sangster', NULL, '1', '2022-08-16 16:57:30', '2022-08-16 16:57:30'),
('11', 'Peace comes from within. Do not seek it without.', 'Buddha', NULL, '1', '2022-08-16 16:57:30', '2022-08-16 16:57:30'),
('12', 'What you give is what you get.', 'Byron Pulsifer', NULL, '1', '2022-08-16 16:57:30', '2022-08-16 16:57:30'),
('13', 'We can only learn to love by loving.', 'Iris Murdoch', NULL, '1', '2022-08-16 16:57:30', '2022-08-16 16:57:30'),
('14', 'Life is change. Growth is optional. Choose wisely.', 'Karen Clark', NULL, '1', '2022-08-16 16:57:30', '2022-08-16 16:57:30'),
('15', 'Every new day is another chance to change your life.', 'null', NULL, '1', '2022-08-16 16:59:18', '2022-08-16 16:59:18'),
('16', 'Smile, breathe, and go slowly.', 'Thich Nhat Hanh', NULL, '1', '2022-08-16 16:59:18', '2022-08-16 16:59:18'),
('17', 'Nobody will believe in you unless you believe in yourself.', 'Liberace', NULL, '1', '2022-08-16 16:59:18', '2022-08-16 16:59:18'),
('18', 'Do more than dream: work.', 'William Arthur Ward', NULL, '1', '2022-08-16 16:59:18', '2022-08-16 16:59:18'),
('19', 'No man was ever wise by chance.', 'Seneca', NULL, '1', '2022-08-16 16:59:18', '2022-08-16 16:59:18'),
('20', 'Some pursue happiness, others create it.', 'null', NULL, '1', '2022-08-16 16:59:18', '2022-08-16 16:59:18'),
('21', 'He that is giddy thinks the world turns round.', 'William Shakespeare', NULL, '1', '2022-08-16 16:59:18', '2022-08-16 16:59:18');

INSERT INTO `users` (`user_id`, `name`, `username`, `password`, `user_status`, `fcm_token`, `dt_updated`, `dt_added`) VALUES
('1', 'Ilias Daniel Bin Mohd Fazilan', 'ilias_pro', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '1', NULL, '2022-08-16 16:22:55', '2022-08-16 16:22:55'),
('2', 'Zulhakimi bin Zulkifli', 'zul_hemsem', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '1', NULL, '2022-08-16 16:23:33', '2022-08-16 16:23:33');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;