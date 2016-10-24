-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2016 at 10:30 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `meditore`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `i_id` int(11) NOT NULL,
  `vendor` int(11) NOT NULL,
  `sale_first_id` int(11) NOT NULL,
  `sale_last_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE IF NOT EXISTS `medicine` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `potency` varchar(255) NOT NULL,
  `vendor` int(11) NOT NULL,
  `sale_price` float NOT NULL,
  `purchase_price` float NOT NULL,
  `tab_amount` int(11) NOT NULL,
  `pack_quanlity` int(11) NOT NULL,
  `company_name` varchar(64) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`),
  KEY `vendor` (`vendor`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=75 ;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`id`, `name`, `type`, `potency`, `vendor`, `sale_price`, `purchase_price`, `tab_amount`, `pack_quanlity`, `company_name`, `description`) VALUES
(32, 'Sopoline Dunn', 'tablet', 'Et quia magni doloribus minima optio ad aut aute pariatur Possimus ut ex sed beatae repellendus', 9, 10, 24, 77, 3271, 'Ifeoma Hopper', 'Mollitia reprehenderit mollit dolore enim iste quae ut ab aut aperiam sit.'),
(33, 'Merritt Jennings', 'tablet', 'Quam sit amet sint dolore et ullamco aut perspiciatis molestiae officia nisi neque tempora', 12, 55, 71, 43, 2101, 'Hollee Mayer', 'Tempore, consequatur, excepteur laborum ratione dolor laboriosam, sed autem praesentium.'),
(34, 'Ian Prince', 'drops', 'Adipisci sed consectetur deleniti quis ut accusantium iusto dolores a quaerat excepteur non eum ut deserunt', 10, 83, 33, 0, 17, 'Joy Manning', 'In qui eveniet, anim qui dolorum est, voluptatem corrupti, architecto nostrum mollitia distinctio.'),
(35, 'Dane Flowers', 'drops', 'Inventore minim totam lorem similique ab aut tempor reprehenderit nostrum anim fugit blanditiis nostrud adipisci fugit delectus consectetur', 9, 14, 16, 0, 1, 'Armand Anderson', 'Commodo in voluptatem. Consectetur debitis amet, anim eveniet, optio, et.'),
(36, 'Shoshana Espinoza', 'other', 'Est occaecat eligendi tempor provident velit quasi quo ad quis maxime velit enim', 10, 67, 63, 0, 78, 'Mercedes Lamb', 'Occaecat tenetur autem ratione consequat. Similique voluptate non qui eu et enim delectus, rerum laborum.'),
(37, 'Kieran Fuller', 'injection', 'Quia explicabo Consequuntur commodi laboris veniam', 10, 92, 78, 0, 88, 'Halla Foster', 'Excepturi sed veniam, quia autem aut et et qui excepteur et veritatis possimus, sint amet, culpa, non voluptas.'),
(38, 'Callum Meadows', 'inhalers', 'Ut voluptates quis ducimus quod ad doloremque dolore aliquid velit repellendus Dolore', 10, 80, 12, 0, 92, 'Gavin Alford', 'Amet, aliquid autem non maxime elit, tempor alias voluptatibus officiis voluptatibus nihil esse, impedit, quisquam omnis.'),
(39, 'Daniel Suarez', 'other', 'Aut aliquam quis porro dolore', 12, 78, 28, 0, 87, 'Indigo Fitzpatrick', 'Minima in praesentium dolor unde dignissimos doloremque occaecat necessitatibus voluptatem itaque consectetur, non magni facilis quas molestiae nemo aliquip.'),
(40, 'Tatum Mclaughlin', 'syrup', 'Quod ad excepturi quidem quia eos eaque dolores deserunt voluptatem Atque consequatur ab', 9, 92, 90, 0, 7, 'Jordan Knowles', 'Nam nobis adipisicing in ipsum, magnam et a ut odio nihil delectus, non aperiam iusto ad.'),
(41, 'Fulton Chandler', 'powder', 'Quia qui provident quis consectetur iure nisi qui', 10, 77, 8, 0, 36, 'Riley Austin', 'Quis accusamus vel fugit, et amet, quia ipsa, laborum. Facilis.'),
(42, 'Nehru Ferguson', 'other', 'Ullam cum officia est fugit', 12, 76, 2, 0, 64, 'Charde Shaffer', 'Et exercitation fugiat, totam ad enim est occaecat voluptas delectus, in consequuntur vel vero similique.'),
(43, 'Nina Hendrix', 'injection', 'Eum in autem sed tempor eveniet ea duis placeat exercitationem dolorum et perferendis est totam consequat In sit nisi delectus', 12, 21, 68, 0, 53, 'Octavius Burns', 'Accusantium aut reprehenderit eos, quia praesentium in numquam aliquid consequat. Perferendis voluptatum quis.'),
(44, 'Rajah Boone', 'injection', 'Vel consequatur Qui voluptates inventore pariatur Quo qui incidunt blanditiis eum', 11, 2, 65, 0, 5, 'Germane Hopkins', 'Sunt laudantium, excepturi obcaecati adipisicing proident, ea esse non est id natus nemo suscipit soluta delectus, eveniet, qui culpa, vel.'),
(45, 'Maggy Huffman', 'injection', 'Amet molestiae laborum Ea et voluptatem Est voluptas velit molestias velit quasi id sunt vero', 10, 11, 87, 0, 48, 'Preston Pope', 'Dolore facere odit culpa aperiam atque explicabo. Veniam, ut laborum. Ipsa, qui sed quia.'),
(46, 'Alec Gilliam', 'injection', 'Cupiditate et ex nostrud commodo autem', 10, 8, 23, 0, 56, 'Uta Adams', 'Eum architecto sunt nesciunt, deleniti magnam id laboriosam, est illum, id dignissimos.'),
(47, 'Denton Hutchinson', 'syrup', 'Aut aliqua Exercitationem officia voluptatem', 12, 77, 6, 0, 93, 'Alisa Moody', 'Et labore labore deserunt non omnis commodi laboris vero in et nulla deleniti sit.'),
(48, 'Diana Bean', 'injection', 'Vel est elit ipsa in id in quia facere laborum quia', 11, 30, 99, 0, 12, 'Barrett Reilly', 'Nihil minima veniam, a dolorum in illo expedita sequi magna odit id.'),
(49, 'Myles Maddox', 'capsule', 'Velit id itaque tempora ea ea qui Nam laboris aut deserunt incididunt ex rerum veniam debitis porro ab culpa', 9, 72, 9, 24, 0, 'Lavinia Clarke', 'Velit dolores dolore id ut velit accusamus enim consequuntur distinctio. Culpa eos autem.'),
(50, 'Callum English', 'other', 'Quia id et exercitation dolores aperiam iusto amet dolore earum do laborum', 9, 1000, 900, 0, 82, 'Damian Faulkner', 'Sint facere porro commodi architecto et sunt est modi aperiam quis odit laborum. Dolor id, aliquip consequuntur.'),
(65, 'Demetria Barron', 'liquid', 'Eum ad sit esse sunt vitae', 11, 68, 11, 0, 74, 'Sonia Wagner', 'Rem in sit sequi porro et aute est distinctio. Exercitation error est aliquid maiores ab delectus.'),
(66, 'Rama Wong', 'liquid', 'Excepteur et temporibus reprehenderit culpa est sapiente beatae quo aperiam consequat', 12, 10, 6, 0, 1, 'Hamish Fowler', 'Quidem nostrud consectetur, minus rerum enim in ut architecto commodi aut ea veritatis.'),
(67, 'Allistair Stephens', 'drops', 'Inventore ex consequatur sint reiciendis ratione et natus ad sed eveniet eos ratione porro et ea', 11, 18, 58, 0, 85, 'Rafael Newton', 'Ut quo illo totam ex ea et delectus, consequatur? Voluptate tempor voluptatum fugiat, animi, aperiam est quasi molestiae veniam, est.'),
(68, 'Kay Haynes', 'powder', 'Odit earum ex numquam perferendis esse voluptas nulla', 10, 69, 21, 0, 45, 'Ocean Petty', 'Ut deserunt sed dolore eos cupidatat magna do nobis dolorem itaque officiis proident.'),
(70, 'Rachel Sloan', 'liquid', 'Quia nulla error lorem accusamus quis excepturi minim', 9, 47, 23, 0, 36, 'Aphrodite Kemp', 'Aut pariatur. In consectetur, deserunt at totam ea sint, possimus, et deserunt qui est omnis est beatae consequatur.'),
(71, 'Clayton Smith', 'powder', 'Laborum Qui dolor ut eos officia quos', 9, 77, 35, 0, 108, 'Aurora Weeks', 'Cupiditate placeat, dolor suscipit quia voluptatibus molestiae odit ut quas ipsum, exercitation et adipisci eius eius.'),
(72, 'Ignatius Patrick', 'injection', 'Quod quaerat omnis ipsa veniam assumenda sit doloremque qui fugiat qui quaerat accusantium tempora modi velit aut in', 9, 24, 77, 0, 19, 'Omar Dodson', 'Voluptates ut pariatur? Est commodi quis voluptas similique voluptas iste culpa, cupiditate quo neque voluptas id voluptatem vel.'),
(73, 'Shea Whitney', 'capsule', 'Consectetur aut eum inventore necessitatibus minus in magni dolorum voluptates necessitatibus assumenda ducimus consequat Aliquip et voluptas blanditiis', 15, 85, 63, 77, 75, 'Hop Castro', 'Sit, voluptatibus elit, consequatur, quis irure quas mollit unde perferendis error cillum ut ut dicta veniam, in est.'),
(74, 'Hashim Rodriguez', 'inhalers', 'Dolor delectus nobis velit aut molestiae autem est quisquam perspiciatis consectetur quas aliquid et assumenda', 12, 20, 75, 0, 94, 'Evelyn Aguilar', 'Saepe accusantium sapiente sint, quod suscipit ut repellendus. Nihil ab deserunt.');

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE IF NOT EXISTS `sale` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `total_tab` int(11) NOT NULL,
  `sale_price` int(11) NOT NULL,
  `purchase_price` int(11) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`s_id`),
  KEY `m_id` (`m_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=26 ;

--
-- Dumping data for table `sale`
--

INSERT INTO `sale` (`s_id`, `m_id`, `qty`, `total_tab`, `sale_price`, `purchase_price`, `datetime`) VALUES
(1, 32, 6, 467, 0, 0, '2016-04-24 22:53:26'),
(2, 32, 10, 805, 0, 0, '2016-04-24 22:54:24'),
(3, 38, 1, 0, 0, 0, '2016-04-24 22:57:24'),
(4, 32, 2, 231, 0, 0, '2016-04-24 22:57:24'),
(5, 49, 2, 51, 0, 0, '2016-04-24 22:57:43'),
(6, 50, 1, 0, 0, 0, '2016-04-25 01:24:00'),
(7, 49, 1, 25, 0, 0, '2016-04-25 01:24:00'),
(8, 50, 1, 0, 0, 0, '2016-04-27 14:32:57'),
(9, 49, 1, 26, 0, 0, '2016-04-27 14:32:57'),
(10, 50, 1, 0, 0, 0, '2016-04-29 01:07:06'),
(11, 50, 2, 0, 0, 0, '2016-04-29 01:08:46'),
(12, 49, 2, 48, 0, 0, '2016-04-29 01:08:46'),
(13, 48, 3, 0, 0, 0, '2016-04-29 01:08:46'),
(14, 47, 3, 0, 0, 0, '2016-04-29 01:08:46'),
(15, 46, 3, 0, 0, 0, '2016-04-29 01:08:46'),
(16, 37, 2, 0, 0, 0, '2016-04-29 01:08:46'),
(17, 73, 1, 77, 85, 63, '2016-04-30 17:11:31'),
(18, 72, 3, 0, 24, 77, '2016-04-30 17:12:37'),
(19, 73, 2, 155, 85, 63, '2016-04-30 17:13:28'),
(20, 73, 1, 77, 85, 63, '2016-04-30 17:14:05'),
(21, 73, 9, 693, 85, 63, '2016-04-30 17:15:58'),
(22, 73, 1, 78, 85, 63, '2016-04-30 17:36:30'),
(23, 72, 2, 0, 24, 77, '2016-06-28 01:21:40'),
(24, 71, 2, 0, 77, 35, '2016-06-28 01:21:40'),
(25, 33, 1, 49, 55, 71, '2016-06-28 01:21:40');

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE IF NOT EXISTS `vendor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `mobile_no` varchar(64) NOT NULL,
  `description` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`id`, `name`, `address`, `phone_no`, `mobile_no`, `description`) VALUES
(9, 'Patrick Gonzales', 'Qui et vel officia enim non consectetur vel aliquip voluptate in dolorem', '88', '79', 'Dolore qui in cillum corporis a est voluptas sunt adipisci eum.'),
(10, 'Austin Clark', 'Magnam velit ab similique qui ullamco eos minus id fuga Natus dicta', '30', '86', 'Velit illum, ut dolorum debitis ad molestiae sint praesentium consequuntur voluptatem fugiat, qui quis et cum rerum dignissimos magna.'),
(11, 'Justin Calderon', 'Dolore neque aperiam et ea ea quod rerum sed voluptas molestiae tempore cillum ut', '23', '61', 'Veritatis ut quo aut exercitation qui ut voluptatibus do culpa sint, esse molestias iure quaerat molestiae dolore dolorum est culpa.'),
(12, 'Kelsie Kirby', 'Labore nihil non accusamus delectus aspernatur minim anim ad ut aliquip ut earum ex cupidatat', '94', '48', 'Distinctio. Unde totam ullam et rem ducimus, velit commodo laborum. Voluptatibus.'),
(13, 'Miranda Gentry', 'Voluptatem aliquip fugit enim magni eum occaecat est sed', '59', '65', 'Nisi et aut sapiente in sit, cupidatat ut dolore et quis aut.'),
(14, 'Reed Guerra', 'Illo dolorem temporibus sit cupiditate fuga Necessitatibus quia debitis sed doloremque sint nemo', '40', '91', 'Eum illo reprehenderit, dolores sed ex enim repellendus. Rerum cillum dolor quasi est lorem ut aut sint.'),
(15, 'Gannon Ratliff', 'Rerum animi iste delectus ea', '38', '87', 'Incidunt, adipisicing id dicta sequi ipsum, neque qui eligendi itaque ex corrupti, est, commodo nostrud pariatur.'),
(16, 'Adrian Cook', 'Totam est et quia libero consectetur animi excepturi libero voluptate est quam dignissimos', '50', '51', 'Sed eos, culpa, magni lorem veniam, quo provident, nemo et nihil.');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `medicine`
--
ALTER TABLE `medicine`
  ADD CONSTRAINT `medicine_ibfk_1` FOREIGN KEY (`vendor`) REFERENCES `vendor` (`id`);

--
-- Constraints for table `sale`
--
ALTER TABLE `sale`
  ADD CONSTRAINT `sale_ibfk_1` FOREIGN KEY (`m_id`) REFERENCES `medicine` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
