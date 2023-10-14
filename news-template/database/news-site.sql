-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2023 at 02:45 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `news-site`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `post` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(39, 'national', 2),
(38, 'entertainment', 3),
(37, 'sports', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `comment` varchar(500) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_email`, `comment`, `date`) VALUES
(1, 1, 'admin@gmail.com', 'dfgv', '2023-10-09 12:28:16'),
(2, 4, 'admin@gmail.com', 'woow', '2023-10-09 12:33:21');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `post_date` varchar(50) NOT NULL,
  `author` int(11) NOT NULL,
  `post_img` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES
(3, 'Adipurush: Why audiences turned against this Bollywood epic', 'It was the latest in a line of films that have claimed some connection with either Hindu religious beliefs or nationalism and in some cases, both. The formula worked for some but backfired for Adipurush - the people it was expected to please and entertain have turned against it. The makers of Adipurush say the film is inspired by the Hindu epic Ramayana. The Ramayana depicts the victory of Hindu god Ram over the demon king Ravana after the latter kidnaps his wife, Sita. The film, made in Hindi and Telugu languages, should have reversed a lacklustre quarter for Bollywood at the box office. But the downturn in its fortunes was swift. Upon release, the film received near-unanimous negative reviews. Opposition leaders criticised the film while two cities in neighbouring Nepal banned all Bollywood films till an \"objectionable\" line was deleted from it.\r\nIndia film dialogue sparks Bollywood ban in Nepal\r\nThe final punch came in the form of a backlash from audiences that took even the makers aback. Protests were held in different parts of India while some Hindu groups demanded a ban on the film. Adipurush\'s director Om Raut and writer Manoj Muntashir received death threats and now have police protection Critics say Adipurush is among a string of recent films that aim at appealing to Hindu viewers. Some of them have also been accused of fuelling religious polarisation. Films like The Kashmir Files and The Kerala Story - both of which were criticised by many for distorting facts and Islamophobia - were big hits at the box office.\r\n\r\nSome have also objected to how Ravana - a devotee of the Hindu god Shiva, a talented musician and a powerful king - has been depicted in the film.With kohl-rimmed eyes and in dark attire, \"Ravana [in Adipurush] is modelled on Bollywood\'s now popular image of the Mughal villain\", says writer and critic Sowmya Rajendran.', '38', '09 Oct, 2023', 29, '1632631560087.jpg'),
(4, 'Adipurush: Why audiences turned against this Bollywood epic', 'Adipurush: Why audiences turned against this Bollywood epic', '38', '09 Oct, 2023', 29, 'WhatsApp Video 2023-09-14 at 13.19.24.mp4');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `role` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(24, 'Vishal', 'Kushwaha', 'arjun', 'ae1285ab8aaaca3c8fb0f140c815a983', 1),
(29, 'vishal', 'kushwaha', 'Vishal@123', 'ae1285ab8aaaca3c8fb0f140c815a983', 1),
(28, 'akshay', 'kumar', 'akshay', 'fc2aa0b552143f168cc3fc55dc4b00fd', 0),
(30, 'ajay', 'Deogan', 'Ajay@123', 'a08ee45ef214dc905e59bfcc4c263565', 0),
(32, 'Akshay', 'Kushwaha', 'akshay3', '21232f297a57a5a743894a0e4a801fc3', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `fname` varchar(10) NOT NULL,
  `lname` varchar(10) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fname`, `lname`, `email`, `password`) VALUES
(1, 'Akshay', 'Kushwaha', 'admin@gmail.com', '123'),
(3, 'vishal', 'Kushwaha', 'vk649990@gmail.com', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD UNIQUE KEY `post_id` (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
