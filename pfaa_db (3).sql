-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 17, 2022 at 04:05 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pfaa_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `full_name`, `email`, `password`) VALUES
(1, 'Pages for all Ages', 'pagesforallages@gmail.com', '$2y$10$Nqq/y251QX2Ccvb1Ax7hUuMqQSkG3yRLCxN2KPdetnSP3oaXVH70a');

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`) VALUES
(1, 'JK Rowling'),
(2, 'Stephen King'),
(3, 'H. G. Wells'),
(4, 'N.K. Jemisin '),
(6, 'Natsume Akatsuki');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `author_id` int(11) NOT NULL,
  `description` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `cover` varchar(255) NOT NULL,
  `file` varchar(255) NOT NULL,
  `quantity` int(255) NOT NULL,
  `price` int(255) NOT NULL,
  `book_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `title`, `author_id`, `description`, `category_id`, `cover`, `file`, `quantity`, `price`, `book_status`) VALUES
(5, 'IT', 2, 'It’s a small city, a place as hauntingly familiar as your own hometown. Only in Derry the haunting is real ...  They were seven teenagers when they first stumbled upon the horror. Now they are grown-up men and women who have gone out into the big world to gain success and happiness. But none of them can withstand the force that has drawn them back to Derry to face the nightmare without an end, and the evil without a name.', 2, '62a82f74239277.84231427.jpg', '629a6ad0021c17.80464991.pdf', 6, 230, 1),
(6, 'Harry Potter and the Chamber of Secrets', 1, 'Ever since Harry Potter had come home for the summer, the Dursleys had been so mean and hideous that all Harry wanted was to get back to the Hogwarts School of Witchcraft and Wizardry. But just as he is packing his bags, Harry receives a warning from a strange impish creature who says that if Harry returns to Hogwarts, disaster will strike.', 1, '62a82fcaa79fd8.22484064.jpeg', '629a6ba54fbd89.32464341.pdf', 5, 500, 1),
(7, 'Harry Potter and the Cursed Child – Parts One and Two', 1, 'It was always difficult being Harry Potter and it isn’t much easier now that he is an overworked employee of the Ministry of Magic, a husband and father of three school-age children.  While Harry grapples with a past that refuses to stay where it belongs, his youngest son Albus must struggle with the weight of a family legacy he never wanted. As past and present fuse ominously, both father and son learn the uncomfortable truth: sometimes, darkness comes from unexpected places.', 1, '62a82fe0b1bf67.29520862.jpeg', '629a6c2fcc47b9.37402035.pdf', 5, 250, 1),
(10, 'The Fifth Season', 4, 'Three terrible things happen in a single day. Essun, a woman living an ordinary life in a small town, comes home to find that her husband has brutally murdered their son and kidnapped their daughter. Meanwhile, mighty Sanze -- the world-spanning empire whose innovations have been civilization\'s bedrock for a thousand years -- collapses as most of its citizens are murdered to serve a madman\'s vengeance. And worst of all, across the heart of the vast continent known as the Stillness, a great red rift has been torn into the heart of the earth, spewing ash enough to darken the sky for years. Or centuries.', 3, '62a7fde65af9b4.91700261.jpg', '62a386fb849027.38033206.pdf', 2, 238, 1),
(11, 'Dune', 4, 'Set on the desert planet Arrakis, Dune is the story of the boy Paul Atreides, heir to a noble family tasked with ruling an inhospitable world where the only thing of value is the “spice” melange, a drug capable of extending life and enhancing consciousness. Coveted across the known universe, melange is a prize worth killing for...', 3, '62a7fdac8b0eb7.28795980.jpg', '62a6c0b4049898.15975187.pdf', 2, 1500, 1),
(12, 'The Obelisk Gate', 4, 'The season of endings grows darker as civilization fades into the long cold night. Alabaster Tenring – madman, world-crusher, savior – has returned with a mission: to train his successor, Essun, and thus seal the fate of the Stillness forever.  It continues with a lost daughter, found by the enemy.  It continues with the obelisks, and an ancient mystery converging on answers at last.  The Stillness is the wall which stands against the flow of tradition, the spark of hope long buried under the thickening ashfall. And it will not be broken.', 3, '62a7fdcb9d4e31.63385557.jpg', '62a6e7b3a962d3.14122755.pdf', 12, 212, 1),
(18, 'The Hundred Thousand Kingdoms', 4, 'Yeine Darr is an outcast from the barbarian north. But when her mother dies under mysterious circumstances, she is summoned to the majestic city of Sky. There, to her shock, Yeine is named an heiress to the king. But the throne of the Hundred Thousand Kingdoms is not easily won, and Yeine is thrust into a vicious power struggle.', 6, '62ac739887e5c0.70092727.jpg', '62ac739887f0d3.98569575.pdf', 100, 310, 1),
(19, 'Konosuba_ God_s Blessing on This Wonderful World!, Vol. 3', 6, 'Volume 3 of Konosuba', 1, '62ac89bad58ac5.12586392.jpg', '62ac784e84cea7.44904289.pdf', 123, 2333, 1),
(20, 'Konosuba_ God_s Blessing on This Wonderful World!, Vol. 2', 6, 'Volume 2 of Konosuba', 1, '62ac89cc0f8b62.10276723.jpg', '62ac78751d7d93.34628012.pdf', 232, 515, 1),
(21, 'Harry Potter and the Goblet of Fire', 1, 'Harry is waiting in Privet Drive. The Order of the Phoenix is coming to escort him safely away without Voldemort and his supporters knowing - if they can. But what will Harry do then? How can he fulfil the momentous and seemingly impossible task that Professor Dumbledore has left him?', 1, '62ac88d0c05d77.77509726.jpg', '62ac83735a41c6.61866478.pdf', 100, 1000, 1),
(22, 'The Stone Sky', 4, 'The Moon will soon return. Whether this heralds the destruction of humankind or something worse will depend on two women.  Essun has inherited the power of Alabaster Tenring. With it, she hopes to find her daughter Nassun and forge a world in which every orogene child can grow up safe.  For Nassun, her mother\'s mastery of the Obelisk Gate comes too late. She has seen the evil of the world, and accepted what her mother will not admit: that sometimes what is corrupt cannot be cleansed, only destroyed.', 6, '62ac888e214310.98384317.jpg', '62ac83b9394139.86950913.pdf', 234, 1245, 1),
(23, 'The Kingdom of Gods', 4, 'For two thousand years the Arameri family has ruled the world by enslaving the very gods that created mortalkind. Now the gods are free, and the Arameris\' ruthless grip is slipping. Yet they are all that stands between peace and world-spanning, unending war.', 6, '62ac888078d7b8.87797150.jpg', '62ac845b08f597.56276335.pdf', 244, 425, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(100) NOT NULL,
  `user_id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `quantity` int(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `name`, `price`, `quantity`, `image`) VALUES
(10, 12, 'Harry Potter and the Cursed Child – Parts One and Two', '250', 10, '62a82fe0b1bf67.29520862.jpeg'),
(11, 12, 'IT', '230', 10, '62a82f74239277.84231427.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Adventure'),
(2, 'Horror'),
(3, 'Sci-Fi'),
(5, 'Mystery'),
(6, 'Fantasy'),
(7, 'Romance'),
(8, 'Comedy'),
(9, 'Kugane Maruyama');

-- --------------------------------------------------------

--
-- Table structure for table `trans`
--

CREATE TABLE `trans` (
  `id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `allorders` varchar(255) NOT NULL,
  `totalprice` varchar(100) NOT NULL,
  `dateCheckedOut` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trans`
--

INSERT INTO `trans` (`id`, `user_id`, `allorders`, `totalprice`, `dateCheckedOut`) VALUES
(1, 12, '10 pc/s Harry Potter and the Cursed Child – Parts One and Two<br>10 pc/s IT<br>', '480', '2022-06-17 | 07:04:03pm'),
(3, 13, '8 pc/s IT<br>5 pc/s Harry Potter and the Chamber of Secrets<br>6 pc/s Harry Potter and the Cursed Child – Parts One and Two<br>', '980', '2022-06-17 | 07:51:54pm'),
(5, 13, '12 pc/s The Obelisk Gate<br>', '212', '2022-06-17 | 08:07:12pm');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `mobile` varchar(50) NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `user_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `username`, `email`, `password`, `mobile`, `address`, `city`, `user_role`) VALUES
(1, 'Eric', 'Dango', 'qw', 'test@gmail.com', '244b35fb2af3e6b91a3f4c7d63fafc28', '09309939976', 'USA', 'Taytay', 1),
(3, 'EarlySeven', 'StrikeLand', 'e7sland', 'trioleny@yahoo.com', 'e4e7493047e8dc16546c0927cba4c594', '09123423333', 'USA', 'Taytay', 0),
(5, 'First', 'Last', 'username', 'email@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '09309939976', 'Taytay', 'Rizal', 1),
(6, 'Eric', 'Dango', 'ericdango23', 'joegarcia11.jg@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '09309939976', 'USA', 'Taytay', 1),
(7, 'Eric', 'Dango', 'ericdango23', 'joegarcia11.jg@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '09309939976', 'USA', 'Taytay', 1),
(8, 'Eric', 'Dango', 'test', 'joegarcia11.jg@gmail.com', '098f6bcd4621d373cade4e832627b4f6', '09309939976', 'USA', 'Taytay', 1),
(9, 'Eric', 'Dango', 'ericdango23', 'joegarcia11.jg@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '09309939976', 'USA', 'Taytay', 1),
(10, 'Eric', 'Dango', 'e1', '1@gmail.com', 'qw', '09309939976', 'USA', 'Taytay', 1),
(11, 'Eric', 'Dango', 'qwe', 'joegarcia11.jg@gmail.com', '76d80224611fc919a5d54f0ff9fba446', '09309939976', 'USA', 'Taytay', 1),
(12, 'Eric', 'Dango', 'qwe', 'qwe@gmail.com', '76d80224611fc919a5d54f0ff9fba446', '09309939976', 'USA', 'Taytay', 1),
(13, 'Eric', 'Gwapo', 'ericgwapo', 'ericmapagmahal@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', '09123456789', 'Taytay', 'Rizal', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `trans`
--
ALTER TABLE `trans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `trans`
--
ALTER TABLE `trans`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
