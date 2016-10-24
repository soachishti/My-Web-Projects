-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2016 at 10:29 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `smschimp`
--

-- --------------------------------------------------------

--
-- Table structure for table `api_server`
--

CREATE TABLE IF NOT EXISTS `api_server` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `token` varchar(128) DEFAULT NULL,
  `load` int(11) DEFAULT '0',
  `status` enum('Up','Down','','') NOT NULL DEFAULT 'Down',
  `m_id` int(11) DEFAULT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`a_id`),
  KEY `fk_member_idx` (`m_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `api_server`
--

INSERT INTO `api_server` (`a_id`, `token`, `load`, `status`, `m_id`, `created_date`) VALUES
(12, 'TKN_5724fdabcb725', 0, 'Down', 9, '2016-04-30 18:47:07'),
(13, 'TKN_5724fdb493dfd', 0, 'Down', 9, '2016-04-30 18:47:16'),
(14, 'TKN_5724fdb607254', 0, 'Down', 9, '2016-04-30 18:47:18'),
(15, 'TKN_5724fe76831a6', 0, 'Down', 9, '2016-04-30 18:50:30'),
(16, 'TKN_5726237bde325', 0, 'Down', 11, '2016-05-01 15:40:43'),
(17, 'TKN_5726237e2e482', 0, 'Down', 11, '2016-05-01 15:40:46'),
(18, 'TKN_5726237f9bebe', 0, 'Down', 11, '2016-05-01 15:40:47'),
(19, 'TKN_57262380bd947', 0, 'Down', 11, '2016-05-01 15:40:48'),
(20, 'TKN_572717eaa0674', 0, 'Down', 9, '2016-05-02 09:03:38'),
(21, 'TKN_572fa486ba65d', 0, 'Down', 39, '2016-05-08 20:41:42'),
(22, 'TKN_572fa48739d8b', 0, 'Down', 39, '2016-05-08 20:41:43'),
(23, 'TKN_572fa4879e285', 0, 'Down', 39, '2016-05-08 20:41:43'),
(24, 'TKN_572fa48833ca9', 0, 'Down', 39, '2016-05-08 20:41:44'),
(25, 'TKN_572fa488408ef', 0, 'Down', 39, '2016-05-08 20:41:44'),
(26, 'TKN_572fa488ba397', 0, 'Down', 39, '2016-05-08 20:41:44'),
(27, 'TKN_572fa488d068c', 0, 'Down', 39, '2016-05-08 20:41:44'),
(28, 'TKN_572fa488defe3', 0, 'Down', 39, '2016-05-08 20:41:44');

-- --------------------------------------------------------

--
-- Table structure for table `compaign`
--

CREATE TABLE IF NOT EXISTS `compaign` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_id` int(11) NOT NULL,
  `name` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `compaign`
--

INSERT INTO `compaign` (`c_id`, `m_id`, `name`, `description`) VALUES
(3, 9, 'Metal', 'Praesentium facere officia facere maiores expedita mollitia'),
(4, 9, 'Tech Fest', 'Est illum et excepteur minima tempore ut est voluptatem dolorem maxime quis eiusmod voluptate velit eos cupidatat'),
(5, 11, 'Farewell', 'Farewell party messages'),
(7, 39, 'Welcome Party 13', 'Welcome party of batch 13'),
(8, 39, 'Welcome party of batch 14', 'Welcome party of batch 14'),
(9, 39, 'Mega Event', 'University Mega Event'),
(10, 39, 'Welcome Party 15', 'Welcome Party for batch 15'),
(11, 9, 'Kamal Fuller', 'Dolore ipsum ea aut impedit debitis labore est vel quis ullam quia itaque non deleniti minim maiores itaque'),
(12, 9, 'Darius Wagner', 'Nulla reprehenderit do aperiam nihil aliquid ratione fugit tenetur repudiandae laudantium magnam aut deserunt'),
(13, 9, 'Moses Mosley', 'Sapiente dicta voluptatum sint quia deserunt eiusmod dolore voluptas et laborum cupiditate rerum ipsa totam ipsum nisi ex ipsum'),
(14, 9, 'Omar Thomas', 'Blanditiis commodo minus ipsum dolor ipsum dignissimos tempora dolorem sed iusto velit'),
(15, 9, 'Phyllis Pennington', 'Provident qui non hic harum sit in aut est fugiat'),
(16, 9, 'Dane Griffin', 'Sunt recusandae Corrupti cupidatat rerum sunt eligendi at consequatur Odit pariatur Aspernatur'),
(17, 9, 'Macey Bishop', 'Ratione ipsum est provident explicabo Tempora voluptatem Culpa eum consequatur Irure magni quia molestias nisi corrupti qui'),
(18, 9, 'Micah Kinney', 'Voluptate et eum dolor tempore iusto voluptatem in deserunt debitis qui debitis voluptas voluptatem'),
(19, 9, 'Myra Quinn', 'Ut nulla consequuntur fuga Ducimus aliquip harum voluptate adipisicing libero error quasi eu amet qui facere'),
(20, 9, 'Nicholas Potts', 'Sit ut ullam aliquid sunt magni veritatis aut a sed vero saepe deleniti ad vitae dignissimos eiusmod eligendi');

-- --------------------------------------------------------

--
-- Table structure for table `compaignlist`
--

CREATE TABLE IF NOT EXISTS `compaignlist` (
  `cl_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_id` int(11) DEFAULT NULL,
  `l_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`cl_id`),
  KEY `fk_compaign_idx` (`c_id`),
  KEY `fk_listcompaign_idx` (`l_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `compaignlist`
--

INSERT INTO `compaignlist` (`cl_id`, `c_id`, `l_id`) VALUES
(4, 3, 34),
(5, 3, 23),
(6, 3, 39),
(9, 4, 34),
(10, 3, 21),
(11, 5, 44),
(12, 9, 46),
(13, 9, 47),
(14, 9, 48),
(16, 8, 48),
(17, 10, 46);

-- --------------------------------------------------------

--
-- Table structure for table `form`
--

CREATE TABLE IF NOT EXISTS `form` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `form_attributes` text,
  PRIMARY KEY (`f_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `form`
--

INSERT INTO `form` (`f_id`, `form_attributes`) VALUES
(4, '{"type":["text","textarea","dropdown"],"title":["Subject","Message","Batch"],"desc":["What is the subject","What is the message","Dropdown Option"],"option":["","","CS13, CS14, CS15"],"submit":""}'),
(5, '{"type":["text","textarea","dropdown","checkbox","radio"],"title":["Subject","Message","Batch","Batch1","Subject"],"desc":["What is the subject","What is the message","Dropdown Option","Check box option","What is the subject"],"option":["","","CS13, CS14, CS15","Hello","CS13, CS14, CS15"],"submit":""}'),
(6, '{"type":["text","textarea","dropdown"],"title":["Subject","Message","Just Dropdown"],"desc":["","",""],"option":["","","CS12,CS13,CS15"],"submit":""}'),
(7, '{"type":["text"],"title":["Facebook"],"desc":["facebook.com\\/username"],"option":[""],"submit":""}'),
(8, '{"type":["text"],"title":["Facebook ID"],"desc":["Facebook ID"],"option":[""],"submit":""}'),
(9, '{"type":["text"],"title":["Facebook ID"],"desc":["Facebook ID"],"option":[""],"submit":""}'),
(10, '{"type":["password","text"],"title":["Sed modi voluptatem Nam molestiae","Sed modi voluptatem Nam molestiae"],"desc":["Hic fuga Ipsum error at ad minima aut ratione qui quidem et voluptas earum dicta velit dolor","Hic fuga Ipsum error at ad minima aut ratione qui quidem et voluptas earum dicta velit dolor"],"option":["Deleniti ipsa aut necessitatibus et voluptas laboris est ut reprehenderit consectetur totam ut non qui eaque","Deleniti ipsa aut necessitatibus et voluptas laboris est ut reprehenderit consectetur totam ut non qui eaque"],"submit":""}'),
(11, '{"type":["radio"],"title":["Eos esse officia omnis qui non commodi voluptas delectus facilis doloremque impedit architecto aut cupidatat dicta"],"desc":["Excepturi at architecto quam voluptas ad doloribus libero velit totam tempor omnis voluptatum culpa deserunt"],"option":["Nihil enim aute do omnis aliquid iusto qui ipsa nulla"],"submit":""}'),
(12, '{"type":["radio"],"title":["Sint sunt maxime est enim in vitae aliquip velit accusamus tempor duis dolorem est dolores deleniti est ut aut quae"],"desc":["Voluptas voluptate eius qui cumque maxime natus"],"option":["Ut id laudantium minima voluptatibus vero quo"],"submit":""}'),
(13, '{"type":["password"],"title":["Ipsam repudiandae qui minim in et tenetur iure officia tempor eligendi laborum"],"desc":["Exercitation dolore sit aliqua Iure et sint amet cum"],"option":["Iusto in officia est quam consequatur molestiae nesciunt eos voluptatum eum dolor dolore rerum sed est"],"submit":""}'),
(14, '{"type":["textarea"],"title":["Non laudantium dolor asperiores consequatur Incididunt aliquid ut vitae nostrud possimus"],"desc":["Quia minima dolor nostrum non similique"],"option":["Et alias deserunt facere dolor dolore odit non"],"submit":""}'),
(15, '{"type":["password"],"title":["Nihil modi nihil neque anim molestiae qui minima delectus dolores amet blanditiis"],"desc":["Id perferendis suscipit excepteur rem assumenda in tempor"],"option":["Occaecat dolor adipisci a voluptas id"],"submit":""}'),
(16, '{"type":["radio"],"title":["Id facilis qui reprehenderit ut autem perferendis ut reiciendis iure"],"desc":["Sit magni in dolores ea omnis dolor aliqua Et"],"option":["Id quae nulla quisquam atque est neque aliquid mollit voluptatem est dicta voluptas"],"submit":""}'),
(17, '{"type":["radio"],"title":["Neque in expedita atque asperiores voluptatum qui iste consequuntur quia proident optio"],"desc":["Excepturi sunt dolore eaque officia ut recusandae Aute eum nostrud"],"option":["Eligendi quaerat est incidunt reprehenderit nostrud dolor cillum fugiat eum"],"submit":""}');

-- --------------------------------------------------------

--
-- Table structure for table `list`
--

CREATE TABLE IF NOT EXISTS `list` (
  `l_id` int(11) NOT NULL AUTO_INCREMENT,
  `m_id` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `from_email` varchar(45) DEFAULT NULL,
  `from_mobile` varchar(45) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `f_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`l_id`),
  KEY `fk_form_idx` (`f_id`),
  KEY `fk_member_idx` (`m_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data for table `list`
--

INSERT INTO `list` (`l_id`, `m_id`, `name`, `from_email`, `from_mobile`, `description`, `f_id`) VALUES
(21, 9, 'Quyn Tate', 'xomedi@gmail.com', 'Voluptas modi nulla commodi elit dolores lore', 'Sed ipsum natus officia quo recusandae Est molestiae repellendus', 5),
(22, 9, 'Cora Morton', 'xegar@hotmail.com', 'Labore irure quasi consequatur suscipit inven', 'Excepturi in vel irure dolorum libero error aliquid laboris excepteur alias explicabo Reiciendis qui aut', 11),
(23, 9, 'Lesley Donaldson', 'zejokesy@hotmail.com', 'Itaque quia ea quo distinctio Vero et proiden', 'Enim ex sapiente exercitationem eos ea in repellendus Rerum aliquid eos sit asperiores dolor', NULL),
(24, 9, 'Roanna May', 'cucuhybu@gmail.com', 'Quia est ut corrupti autem omnis odit ea', 'Provident voluptas quo modi sed qui cupiditate officia quos et sit quibusdam delectus at autem', 10),
(25, 9, 'Jena Wade', 'rejeraqup@gmail.com', 'Praesentium ut possimus excepturi inventore c', 'Ad pariatur Tenetur vitae necessitatibus tempora ipsum proident obcaecati nisi deserunt nulla obcaecati doloremque ullamco velit veniam qui', NULL),
(27, 9, 'Charles Duke', 'jupitejov@gmail.com', 'Ut nostrum laboris excepteur blanditiis maxim', 'Id quae sit et vel omnis nulla voluptas tempor id debitis pariatur Sapiente', 17),
(28, 9, 'Beau David', 'fesicyt@hotmail.com', 'Proident saepe ut cum architecto ut consectet', 'Placeat et ea deserunt ea omnis omnis veritatis et', 12),
(29, 9, 'Damian Stephenson', 'zymu@gmail.com', 'Illum in nisi eos quo dolorem aperiam dolorem', 'Nesciunt labore quia facere officia cupidatat nostrud mollit praesentium labore eius aliquip suscipit magna aliquid earum amet', 13),
(30, 9, 'Colt Campbell', 'syficys@yahoo.com', 'Inventore veniam aut voluptas quam id dicta v', 'Dolor sed tempore exercitationem ut dolore minim dolores sunt adipisci et eaque a quia quia non sit', 14),
(31, 9, 'Eric Hodges', 'mujy@hotmail.com', 'Sunt ad nisi asperiores ex consequatur Quo au', 'Eu natus rerum quas iste excepteur aut est molestias', 15),
(32, 9, 'Neville Marquez', 'sybo@hotmail.com', 'Voluptatem proident est amet consequat Hic qu', 'Necessitatibus vitae magni quia dolor irure suscipit consequatur Aliquam ad possimus accusantium a sunt', 16),
(33, 9, 'Jada Salas', 'ximup@yahoo.com', 'Eos impedit minima duis modi asperiores facer', 'Consectetur optio in eum repudiandae rerum aliqua Voluptates laboris', NULL),
(34, 9, 'Haley Hoover', 'tedejitedi@gmail.com', 'Dolor sit aliquam nulla laboriosam eligendi u', 'Voluptas consectetur mollitia quod quia ut voluptatem voluptas proident qui magnam ut libero quis consequatur nostrud', NULL),
(35, 9, 'Quinn Mcdaniel', 'xabyw@hotmail.com', 'Porro voluptas nemo sit consequuntur a facere', 'Eos doloribus veniam sit expedita aspernatur in maiores ipsa culpa aliquam esse nobis sit voluptatem ab', NULL),
(36, 9, 'Iona Parker', 'jery@gmail.com', 'Eaque corporis perferendis quia obcaecati ab ', 'Ea odio est accusamus rerum deserunt', NULL),
(37, 9, 'Jerry Boyer', 'toqa@gmail.com', 'Dolor magna ut aliquid autem', 'Occaecat irure qui qui veniam voluptatum maiores natus praesentium necessitatibus aute ea nihil tenetur quas eu dolorem non laboris suscipit', NULL),
(38, 9, 'Penelope Grant', 'ripug@yahoo.com', 'Omnis deleniti atque sed dolores est incididu', 'Et reiciendis tempore est exercitationem laudantium suscipit deserunt tenetur nisi distinctio Odit optio dolore', NULL),
(39, 9, 'Abraham Salas', 'telyxuwete@hotmail.com', 'Eligendi eos voluptas veritatis ea exercitati', 'Officia quaerat perferendis veniam accusamus ullamco est nobis quidem proident labore officia', NULL),
(40, 9, 'Steven Kramer', 'vyzujedeju@gmail.com', 'Eum at recusandae Quis est qui excepteur omni', 'Adipisci dolorem et voluptas non alias irure at voluptate quibusdam maiores totam eu et officia possimus ea elit', NULL),
(41, 9, 'Dean Bennett', 'cibim@hotmail.com', 'Quasi quod suscipit irure aut omnis et volupt', 'Aut sit mollitia a enim excepturi aute optio pariatur', NULL),
(42, 9, 'Yvonne Harvey', 'curaduhym@yahoo.com', 'Voluptatem amet cupidatat nemo placeat verita', 'Cum sint totam earum exercitationem do sed sunt velit', NULL),
(43, 9, 'Oliver Dejesus', 'wewol@yahoo.com', 'Nemo quod animi mollitia qui hic repudiandae ', 'Aliquip nihil eaque quia quas error quia consequat Quas fugiat commodi voluptatibus', NULL),
(44, 11, 'Facebook Friend', 'ebraiz@outlook.com', '0333524111', 'Hello World', 6),
(45, 9, 'Trevor Mathis', 'limo@yahoo.com', 'Necessitatibus ut impedit Nam et hic providen', 'Dolore nihil tenetur qui qui et et odit ad illo perferendis', NULL),
(46, 39, 'Batch 14', 'p146011@nu.edu.pk', '03123456789', 'List of Batch 14', 7),
(47, 39, 'Batch 15', 'p146011@nu.edu.pk', '03123456789', 'List of Batch 15', 9),
(48, 39, 'Batch 13', 'p146011@nu.edu.pk', '03111456789', 'List of Batch 13', 8);

-- --------------------------------------------------------

--
-- Table structure for table `listsubscriber`
--

CREATE TABLE IF NOT EXISTS `listsubscriber` (
  `ls_id` int(11) NOT NULL AUTO_INCREMENT,
  `l_id` int(11) DEFAULT NULL,
  `name` varchar(45) DEFAULT NULL,
  `phone_no` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `other_attributes` text,
  `is_subscribe` enum('Yes','No','','') DEFAULT 'Yes',
  `datetime` datetime DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ls_id`),
  KEY `fk_list_idx` (`l_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data for table `listsubscriber`
--

INSERT INTO `listsubscriber` (`ls_id`, `l_id`, `name`, `phone_no`, `email`, `other_attributes`, `is_subscribe`, `datetime`) VALUES
(1, 30, 'Amal Hansen', '+569-29-3844249', 'putyqazej@hotmail.com', NULL, 'Yes', NULL),
(3, 21, 'Samuel Moss', '+692-12-2027734', 'piruwy@gmail.com', NULL, 'Yes', '2016-05-01 00:04:44'),
(5, 21, 'Cora Farrell', '+784-64-6153066', 'bizare@hotmail.com', NULL, 'Yes', '2016-05-01 00:04:52'),
(6, 21, 'Molly Wolfe', '+317-51-4537303', 'qazekijose@yahoo.com', NULL, 'No', '2016-05-01 00:04:55'),
(7, 21, 'Demetria Joyner', '+828-14-5616634', 'xekimab@gmail.com', NULL, 'Yes', '2016-05-01 00:04:59'),
(8, 21, 'Carissa Mccormick', '+476-28-4660757', 'geno@yahoo.com', NULL, 'Yes', '2016-05-01 00:05:03'),
(9, 22, 'Hunter Bernard', '+159-90-1354235', 'nubufipab@yahoo.com', NULL, 'Yes', '2016-05-01 00:05:07'),
(10, NULL, NULL, NULL, NULL, NULL, 'Yes', '2016-05-01 15:45:22'),
(11, NULL, NULL, NULL, NULL, NULL, 'Yes', '2016-05-01 15:50:13'),
(12, 21, 'Glenna Church', '+847-25-4796612', 'vagymuc@hotmail.com', '{"Subject":" CS15","Message":"Fugiat, id deleniti commodo dicta tempora est, nulla porro velit, doloremque qui fugit, laudantium, id elit, elit, recusandae. Est.","Batch":"CS15","Batch1":"Batch1","submit":""}', 'Yes', '2016-05-01 17:33:12'),
(13, 21, 'Glenna Church', '+847-25-4796612', 'vagymuc@hotmail.com', '{"Subject":" CS15","Message":"Fugiat, id deleniti commodo dicta tempora est, nulla porro velit, doloremque qui fugit, laudantium, id elit, elit, recusandae. Est.","Batch":"CS15","Batch1":"Batch1","submit":""}', 'Yes', '2016-05-01 17:33:26'),
(14, 21, 'Casey Nichols', '+761-50-5404674', 'wavup@gmail.com', '{"Subject":" CS15","Message":"Sunt, et ad est obcaecati sint aut voluptate molestias odit et vero nobis sint omnis.","Batch":"CS15","Batch1":"Batch1","submit":""}', 'Yes', '2016-05-01 20:28:37'),
(15, 21, 'Melyssa Bonner', '+998-73-2776802', 'duxow@gmail.com', '{"Subject":"CS13","Message":"Modi perspiciatis, aperiam dolor non autem adipisicing voluptate excepturi quae hic omnis itaque.","Batch":"CS15","submit":""}', 'Yes', '2016-05-01 20:31:49'),
(16, 21, 'Cora Hinton', '+839-12-4738001', 'pypececefo@gmail.com', '{"Subject":" CS14","Message":"Commodo magni minim et impedit, quos dolores ut fuga. Ut qui libero et dolores aut.","Batch":"CS14","Batch1":"Batch1","submit":""}', 'Yes', '2016-05-01 20:32:59'),
(18, 44, 'Ian Hernandez', '+727-37-1748304', 'ryqacomafu@gmail.com', '{"Subject":"Numquam magna beatae dolor et earum consectetur vel at","Message":"Facilis non molestiae iste vero nostrud voluptate consectetur ex eiusmod ut reprehenderit, non dolore.","Just_Dropdown":"CS13","submit":""}', 'Yes', '2016-05-01 20:39:04'),
(19, 21, 'Griffin Thompson', '+865-54-5232683', 'bomycot@gmail.com', '{"Subject":" CS15","Message":"Facilis earum ad sint quam quia at delectus, nulla est, ipsum, Nam mollit id quod accusamus dolore illum.","Batch":"CS15","submit":""}', 'Yes', '2016-05-02 13:18:59'),
(20, 46, 'Maggy Valencia', '+819-53-3040269', 'divivyc@gmail.com', '{"Facebook":"Fugiat sunt id nesciunt ipsam quis pariatur Dolore distinctio","submit":""}', 'Yes', '2016-05-09 01:32:44'),
(21, 46, 'Tashya Chen', '+646-95-9731111', 'qimufodifi@gmail.com', '{"Facebook":"Sapiente architecto harum temporibus autem odio duis nisi fuga Sit aut voluptates tempora deserunt quos eaque","submit":""}', 'Yes', '2016-05-09 01:32:55'),
(22, 46, 'Beatrice Lewis', '+719-81-4379284', 'foqyv@gmail.com', '{"Facebook":"Ratione qui et non aut qui ut est beatae","submit":""}', 'Yes', '2016-05-09 01:33:06'),
(23, 46, 'Stephanie Pierce', '+472-26-3200616', 'lyse@hotmail.com', '{"Facebook":"Libero nihil qui adipisci exercitationem sit vero ea esse voluptas ea voluptate ullamco pariatur Aut quia cumque aliquip quo","submit":""}', 'Yes', '2016-05-09 01:33:13'),
(24, 46, 'Otto Finch', '+617-82-9074284', 'qozygyqimy@yahoo.com', '{"Facebook":"Aut fugiat Nam elit atque culpa libero dolorum est minima minim","submit":""}', 'Yes', '2016-05-09 01:33:22'),
(25, 47, 'Alana Mccarty', '+263-43-1292479', 'kiherumox@yahoo.com', '{"Facebook_ID":"Ad et molestiae qui ut qui tempore nisi eveniet nostrum explicabo Consequuntur qui qui consectetur id","submit":""}', 'Yes', '2016-05-09 01:34:31'),
(26, 47, 'Cameron Mcneil', '+699-14-5837406', 'zusisowuj@yahoo.com', '{"Facebook_ID":"Commodo et deserunt sed culpa consequat Deserunt harum id animi deleniti velit voluptatem dolores culpa consequatur at aut voluptates cillum","submit":""}', 'Yes', '2016-05-09 01:34:35'),
(27, 47, 'Ishmael Brooks', '+658-65-3172013', 'vikot@yahoo.com', '{"Facebook_ID":"Et porro enim ab deserunt maxime dicta","submit":""}', 'Yes', '2016-05-09 01:34:40'),
(28, 47, 'Mohammad Sparks', '+194-44-9555599', 'ruvocisoje@gmail.com', '{"Facebook_ID":"Amet mollit unde cumque ut reiciendis irure","submit":""}', 'Yes', '2016-05-09 01:34:45'),
(29, 47, 'Leonard Aguilar', '+636-66-7709583', 'guvow@gmail.com', '{"Facebook_ID":"Ut dolore tempore ut et culpa officia id deserunt ut cupiditate","submit":""}', 'Yes', '2016-05-09 01:34:51'),
(30, 48, 'Abigail Rodriguez', '+444-63-2182457', 'posekov@yahoo.com', '{"Facebook_ID":"Officia illo sed et aliquip proident rerum","submit":""}', 'Yes', '2016-05-09 01:35:15'),
(31, 48, 'Malcolm Lopez', '+689-46-1130141', 'vypis@yahoo.com', '{"Facebook_ID":"Cum officia qui sunt atque explicabo Aspernatur veniam quis eos architecto ut","submit":""}', 'Yes', '2016-05-09 01:35:20'),
(32, 48, 'Ursula Graves', '+447-68-5707370', 'limivocy@gmail.com', '{"Facebook_ID":"Ad voluptatem Dolore excepteur quia illo earum voluptate odio consequatur Consequatur voluptate officia in dolorem quia unde molestiae","submit":""}', 'Yes', '2016-05-09 01:35:25'),
(33, 48, 'Philip Baird', '+327-83-9993241', 'qici@yahoo.com', '{"Facebook_ID":"Fuga Labore omnis ea beatae cupiditate id impedit quia facere culpa","submit":""}', 'Yes', '2016-05-09 01:35:29');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE IF NOT EXISTS `members` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `company` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `pass` varchar(64) DEFAULT NULL,
  PRIMARY KEY (`m_id`),
  UNIQUE KEY `email_2` (`email`),
  KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`m_id`, `name`, `company`, `email`, `pass`) VALUES
(9, 'Owais', 'Student', 'soac@outlook.com', 'ad1d0a33d1475e29c577be23e29fdf19e1df3663b7c7ed77272bcf3289f1595e'),
(11, 'Ebraiz', 'Microsoft', 'ebraiz@outlook.com', 'ad1d0a33d1475e29c577be23e29fdf19e1df3663b7c7ed77272bcf3289f1595e'),
(12, 'Amery Bauer', 'Beck and Boone Plc', 'rehaceqata@hotmail.com', 'b2fe8b46929bfa4c65fee9d5d43a2423799b18e360782e9abc27bd420877243e'),
(13, 'Nayda Salinas', 'Daugherty and Chandler Trading', 'sofividep@hotmail.com', 'b2fe8b46929bfa4c65fee9d5d43a2423799b18e360782e9abc27bd420877243e'),
(14, 'Hadley Howell', 'Santana and Ballard Plc', 'buryhonyvi@gmail.com', 'b2fe8b46929bfa4c65fee9d5d43a2423799b18e360782e9abc27bd420877243e'),
(16, 'Olympia Haley', 'Sellers and Christian Trading', 'vozas@hotmail.com', 'b2fe8b46929bfa4c65fee9d5d43a2423799b18e360782e9abc27bd420877243e'),
(17, 'Cullen Merritt', 'Gross Burns Plc', 'mobem@hotmail.com', 'b2fe8b46929bfa4c65fee9d5d43a2423799b18e360782e9abc27bd420877243e'),
(18, 'Talon Hale', 'Mayer and Fitzgerald Trading', 'jylajoto@yahoo.com', 'b2fe8b46929bfa4c65fee9d5d43a2423799b18e360782e9abc27bd420877243e'),
(19, 'Freya Blackburn', 'Miles and Lucas Traders', 'kutaz@yahoo.com', 'b2fe8b46929bfa4c65fee9d5d43a2423799b18e360782e9abc27bd420877243e'),
(20, 'Jordan Gibbs', 'Ball and Hodges Inc', 'lena@hotmail.com', 'b2fe8b46929bfa4c65fee9d5d43a2423799b18e360782e9abc27bd420877243e'),
(21, 'Zelenia Byrd', 'Wilcox and Garza Co', 'najihupy@gmail.com', 'b2fe8b46929bfa4c65fee9d5d43a2423799b18e360782e9abc27bd420877243e'),
(22, 'Zena Mayer', 'Sheppard Ramos LLC', 'mobuc@gmail.com', 'b2fe8b46929bfa4c65fee9d5d43a2423799b18e360782e9abc27bd420877243e'),
(23, 'Dennis Espinoza', 'Ingram Whitfield Co', 'sumo@yahoo.com', 'b2fe8b46929bfa4c65fee9d5d43a2423799b18e360782e9abc27bd420877243e'),
(24, 'Jin Doyle', 'Patel Bernard Associates', 'rebogury@gmail.com', 'b2fe8b46929bfa4c65fee9d5d43a2423799b18e360782e9abc27bd420877243e'),
(25, 'Rae Acevedo', 'Delaney and Pollard Trading', 'farehukuj@gmail.com', 'b2fe8b46929bfa4c65fee9d5d43a2423799b18e360782e9abc27bd420877243e'),
(26, 'Yolanda Todd', 'Sloan and Shaffer Trading', 'rycadep@gmail.com', 'b2fe8b46929bfa4c65fee9d5d43a2423799b18e360782e9abc27bd420877243e'),
(27, 'Britanni Clemons', 'Cain and Martin Co', 'vineraxeb@yahoo.com', 'b2fe8b46929bfa4c65fee9d5d43a2423799b18e360782e9abc27bd420877243e'),
(28, 'Mohammad Mcleod', 'Alford Hurst LLC', 'jyvalod@gmail.com', 'b2fe8b46929bfa4c65fee9d5d43a2423799b18e360782e9abc27bd420877243e'),
(29, 'Kathleen Logan', 'Daniel Wiggins Inc', 'xexihix@gmail.com', 'b2fe8b46929bfa4c65fee9d5d43a2423799b18e360782e9abc27bd420877243e'),
(30, 'Olga Donaldson', 'Hicks Cantrell Traders', 'pojyxo@yahoo.com', 'b2fe8b46929bfa4c65fee9d5d43a2423799b18e360782e9abc27bd420877243e'),
(31, 'Halla Hines', 'Mcgowan Baker Traders', 'gymo@hotmail.com', 'b2fe8b46929bfa4c65fee9d5d43a2423799b18e360782e9abc27bd420877243e'),
(32, 'Alden Cameron', 'Mathis and Zamora Plc', 'fuqysebaz@hotmail.com', 'b2fe8b46929bfa4c65fee9d5d43a2423799b18e360782e9abc27bd420877243e'),
(33, 'Portia Kirby', 'Hurst Landry Inc', 'hicebane@gmail.com', 'b2fe8b46929bfa4c65fee9d5d43a2423799b18e360782e9abc27bd420877243e'),
(34, 'Rhonda Parker', 'Forbes Lyons Co', 'fadizi@yahoo.com', 'b2fe8b46929bfa4c65fee9d5d43a2423799b18e360782e9abc27bd420877243e'),
(35, 'Serina Bates', 'Solis and Alvarado Inc', 'hinityri@yahoo.com', 'b2fe8b46929bfa4c65fee9d5d43a2423799b18e360782e9abc27bd420877243e'),
(37, 'Melyssa Dyer', 'Harmon Woodward Inc', 'goku@hotmail.com', 'b2fe8b46929bfa4c65fee9d5d43a2423799b18e360782e9abc27bd420877243e'),
(38, 'Leonard Chandler', 'Massey and Bowman Inc', 'gumufogi@gmail.com', 'b2fe8b46929bfa4c65fee9d5d43a2423799b18e360782e9abc27bd420877243e'),
(39, 'Owais Chishti', 'FAST Computing Community', 'p146011@nu.edu.pk', 'ad1d0a33d1475e29c577be23e29fdf19e1df3663b7c7ed77272bcf3289f1595e');

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE IF NOT EXISTS `message` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT,
  `subject` varchar(45) DEFAULT NULL,
  `text` varchar(255) DEFAULT NULL,
  `c_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`m_id`),
  KEY `fk_compaignmsg_idx` (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`m_id`, `subject`, `text`, `c_id`) VALUES
(3, 'Fuga Eius commodo et cupidatat exercitation c', 'In ullam labore eligendi eum dolore consequuntur iusto quis id.', 3),
(4, 'Harum impedit reprehenderit at elit odit volu', 'Dolore quis et magni aliqua. Veniam, explicabo. Et occaecat aut consequatur, officiis voluptatem. Maiores ut praesentium deserunt et accusantium consequatur.', 3),
(5, 'Expedita facere omnis molestiae dolore nulla ', 'Ea quam atque numquam consequatur nihil doloribus dicta nostrud unde duis cumque ut provident, dolor.', 3),
(6, 'Ullam quia consequatur maiores doloremque ius', 'Aute et voluptatem dolor voluptatem. Saepe ea distinctio. Consequatur, qui iste ea quas.', 3),
(7, 'Hello World', 'How are you?                ', 5),
(8, 'Omnis itaque ex adipisicing non amet nihil sa', 'Fugiat, est, numquam voluptas ipsum, consectetur tempor quia et voluptatem fugiat, qui consectetur, enim praesentium sint mollitia aliquid ipsa.', 4),
(9, 'Harum quaerat sit at laboris libero quod', 'Magna et modi pariatur? Labore sed similique et cupidatat eu aut.', 4),
(10, 'Reiciendis non quod itaque saepe enim eiusmod', 'Voluptatem, eum ducimus, perferendis aliqua. Ut ipsa, consequatur, molestiae eum dolorum neque quia qui et ut.', 4),
(11, 'Meeting', 'We have meeting at 11:00am today.                ', 9),
(12, 'Get your cards', 'Collect your card from room 7 before 3:50 pm                ', 9),
(13, 'Hello ', '        How are you?        ', 3);

-- --------------------------------------------------------

--
-- Table structure for table `queue`
--

CREATE TABLE IF NOT EXISTS `queue` (
  `q_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_id` int(11) DEFAULT NULL,
  `m_id` int(11) DEFAULT NULL,
  `status` enum('Queued','Processing','Failed','Sent') DEFAULT 'Queued',
  `a_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`q_id`),
  KEY `fk_subscriberqueue_idx` (`s_id`),
  KEY `fk_messagequeue_idx` (`m_id`),
  KEY `fk_serverapi_idx` (`a_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=79 ;

--
-- Dumping data for table `queue`
--

INSERT INTO `queue` (`q_id`, `s_id`, `m_id`, `status`, `a_id`) VALUES
(2, 5, 3, 'Queued', NULL),
(3, 6, 3, 'Queued', NULL),
(4, 7, 3, 'Queued', NULL),
(5, 8, 3, 'Queued', NULL),
(8, 18, 7, 'Queued', NULL),
(9, 20, 11, 'Queued', NULL),
(10, 21, 11, 'Queued', NULL),
(11, 22, 11, 'Queued', NULL),
(12, 23, 11, 'Queued', NULL),
(13, 24, 11, 'Queued', NULL),
(14, 25, 11, 'Queued', NULL),
(15, 26, 11, 'Queued', NULL),
(16, 27, 11, 'Queued', NULL),
(17, 28, 11, 'Queued', NULL),
(18, 29, 11, 'Queued', NULL),
(19, 30, 11, 'Queued', NULL),
(20, 31, 11, 'Queued', NULL),
(21, 32, 11, 'Queued', NULL),
(22, 33, 11, 'Queued', NULL),
(24, 20, 12, 'Queued', NULL),
(25, 21, 12, 'Queued', NULL),
(26, 22, 12, 'Queued', NULL),
(27, 23, 12, 'Queued', NULL),
(28, 24, 12, 'Queued', NULL),
(29, 25, 12, 'Queued', NULL),
(30, 26, 12, 'Queued', NULL),
(31, 27, 12, 'Queued', NULL),
(32, 28, 12, 'Queued', NULL),
(33, 29, 12, 'Queued', NULL),
(34, 30, 12, 'Queued', NULL),
(35, 31, 12, 'Queued', NULL),
(36, 32, 12, 'Queued', NULL),
(37, 33, 12, 'Queued', NULL),
(39, 20, 12, 'Queued', NULL),
(40, 21, 12, 'Queued', NULL),
(41, 22, 12, 'Queued', NULL),
(42, 23, 12, 'Queued', NULL),
(43, 24, 12, 'Queued', NULL),
(44, 25, 12, 'Queued', NULL),
(45, 26, 12, 'Queued', NULL),
(46, 27, 12, 'Queued', NULL),
(47, 28, 12, 'Queued', NULL),
(48, 29, 12, 'Queued', NULL),
(49, 30, 12, 'Queued', NULL),
(50, 31, 12, 'Queued', NULL),
(51, 32, 12, 'Queued', NULL),
(52, 33, 12, 'Queued', NULL),
(53, 3, 13, 'Queued', NULL),
(54, 5, 13, 'Queued', NULL),
(55, 6, 13, 'Queued', NULL),
(56, 7, 13, 'Queued', NULL),
(57, 8, 13, 'Queued', NULL),
(58, 12, 13, 'Queued', NULL),
(59, 13, 13, 'Queued', NULL),
(60, 14, 13, 'Queued', NULL),
(61, 15, 13, 'Queued', NULL),
(62, 16, 13, 'Queued', NULL),
(63, 19, 13, 'Queued', NULL),
(68, 3, 13, 'Queued', NULL),
(69, 5, 13, 'Queued', NULL),
(70, 6, 13, 'Queued', NULL),
(71, 7, 13, 'Queued', NULL),
(72, 8, 13, 'Queued', NULL),
(73, 12, 13, 'Queued', NULL),
(74, 13, 13, 'Queued', NULL),
(75, 14, 13, 'Queued', NULL),
(76, 15, 13, 'Queued', NULL),
(77, 16, 13, 'Queued', NULL),
(78, 19, 13, 'Queued', NULL);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `api_server`
--
ALTER TABLE `api_server`
  ADD CONSTRAINT `fk_memberserver` FOREIGN KEY (`m_id`) REFERENCES `members` (`m_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `compaignlist`
--
ALTER TABLE `compaignlist`
  ADD CONSTRAINT `compaignlist_ibfk_1` FOREIGN KEY (`l_id`) REFERENCES `list` (`l_id`),
  ADD CONSTRAINT `fk_compaign` FOREIGN KEY (`c_id`) REFERENCES `compaign` (`c_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `list`
--
ALTER TABLE `list`
  ADD CONSTRAINT `fk_member` FOREIGN KEY (`m_id`) REFERENCES `members` (`m_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `list_ibfk_1` FOREIGN KEY (`f_id`) REFERENCES `form` (`f_id`);

--
-- Constraints for table `listsubscriber`
--
ALTER TABLE `listsubscriber`
  ADD CONSTRAINT `listsubscriber_ibfk_1` FOREIGN KEY (`l_id`) REFERENCES `list` (`l_id`);

--
-- Constraints for table `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `fk_compaignmsg` FOREIGN KEY (`c_id`) REFERENCES `compaign` (`c_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `queue`
--
ALTER TABLE `queue`
  ADD CONSTRAINT `fk_messagequeue` FOREIGN KEY (`m_id`) REFERENCES `message` (`m_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_serverapi` FOREIGN KEY (`a_id`) REFERENCES `api_server` (`a_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_subscriberqueue` FOREIGN KEY (`s_id`) REFERENCES `listsubscriber` (`ls_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
