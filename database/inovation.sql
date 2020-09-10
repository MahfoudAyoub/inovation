-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2020 at 11:16 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inovation`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `userID` int(11) NOT NULL,
  `postID` int(11) NOT NULL,
  `comment` text NOT NULL,
  `createdOn` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `userID`, `postID`, `comment`, `createdOn`) VALUES
(29, 13, 20, 'first comment', '2020-09-09 18:56:09'),
(33, 13, 20, 'second comment', '2020-09-09 21:30:03'),
(46, 13, 20, 'nice post', '2020-09-09 23:56:14'),
(48, 13, 20, 'nice parole', '2020-09-10 14:00:41');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `topic_id` int(11) DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `published` tinyint(4) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `topic_id`, `title`, `image`, `body`, `published`, `created_at`) VALUES
(18, 13, 4, 'Why should boys have all the fun? it\'s the women who are making india an alcohol-loving contry', '1599510676_image_6.png', '&lt;p&gt;Lorem&amp;nbsp;ipsum&amp;nbsp;dolor&amp;nbsp;sit&amp;nbsp;amet&amp;nbsp;consectetur&amp;nbsp;adipisicing&amp;nbsp;elit.&amp;nbsp;Neque&amp;nbsp;voluptas&amp;nbsp;deserunt&amp;nbsp;beatae adipisci&amp;nbsp;iusto&amp;nbsp;totam&amp;nbsp;placeat&amp;nbsp;corrupti&amp;nbsp;ipsum,&amp;nbsp;tempora&amp;nbsp;magnam&amp;nbsp;incidunt&amp;nbsp;aperiam&amp;nbsp;tenetur&amp;nbsp;anobis,&amp;nbsp;voluptate,&amp;nbsp;numquam&amp;nbsp;architecto&amp;nbsp;fugit.&amp;nbsp;Eligendi&amp;nbsp;quidem&amp;nbsp;ipsam&amp;nbsp;ducimus&amp;nbsp;minus&amp;nbsp;magniillum&amp;nbsp;similique&amp;nbsp;veniam&amp;nbsp;tempore&amp;nbsp;unde?&lt;/p&gt;', 1, '2020-09-07 17:41:53'),
(19, 13, 5, 'Why should boys have all the fun? it\'s the women who are making india analcohol-loving contry', '1599580128_feature-img1.jpg', '&lt;p&gt;Lorem&amp;nbsp;ipsum&amp;nbsp;dolor&amp;nbsp;sit&amp;nbsp;amet&amp;nbsp;consectetur&amp;nbsp;adipisicing&amp;nbsp;elit.&amp;nbsp;Neque&amp;nbsp;voluptas&amp;nbsp;deserunt&amp;nbsp;beataeadipisci&amp;nbsp;iusto&amp;nbsp;totam&amp;nbsp;placeat&amp;nbsp;corrupti&amp;nbsp;ipsum,&amp;nbsp;tempora&amp;nbsp;magnam&amp;nbsp;incidunt&amp;nbsp;aperiam&amp;nbsp;tenetur&amp;nbsp;anobis,&amp;nbsp;voluptate,&amp;nbsp;numquam&amp;nbsp;architecto&amp;nbsp;fugit.&amp;nbsp;Eligendi&amp;nbsp;quidem&amp;nbsp;ipsam&amp;nbsp;ducimus&amp;nbsp;minus&amp;nbsp;magniillum&amp;nbsp;similique&amp;nbsp;veniam&amp;nbsp;tempore&amp;nbsp;unde?&lt;/p&gt;', 1, '2020-09-07 17:43:17'),
(20, 13, 3, 'it\'s the women who are making india an alcohol-loving contry', '1599580099_blog1.png', '&lt;p&gt;it\'s the women who are making india an alcohol-loving contry&lt;/p&gt;&lt;p&gt;it\'s the women who are making india an alcohol-loving contry&lt;/p&gt;&lt;p&gt;it\'s the women who are making india an alcohol-loving contry&lt;/p&gt;&lt;p&gt;it\'s the women who are making india an alcohol-loving contry&lt;/p&gt;&lt;p&gt;it\'s the women who are making india an alcohol-loving contry&lt;/p&gt;&lt;p&gt;it\'s the women who are making india an alcohol-loving contry&lt;/p&gt;&lt;p&gt;it\'s the women who are making india an alcohol-loving contry&lt;/p&gt;&lt;p&gt;it\'s the women who are making india an alcohol-loving contry&lt;/p&gt;&lt;p&gt;it\'s the women who are making india an alcohol-loving contry&lt;/p&gt;', 1, '2020-09-08 16:48:19'),
(21, 13, 3, 'it\'s the women who are making india an alcohol-loving ', '1599580163_blog1.png', '&lt;p&gt;Lorem&amp;nbsp;ipsum&amp;nbsp;dolor&amp;nbsp;sit&amp;nbsp;amet&amp;nbsp;consectetur&amp;nbsp;adipisicing&amp;nbsp;elit.&amp;nbsp;Neque&amp;nbsp;voluptas&amp;nbsp;deserunt&amp;nbsp;beataeadipisci&amp;nbsp;iusto&amp;nbsp;totam&amp;nbsp;placeat&amp;nbsp;corrupti&amp;nbsp;ipsum,&amp;nbsp;tempora&amp;nbsp;magnam&amp;nbsp;incidunt&amp;nbsp;aperiam&amp;nbsp;tenetur&amp;nbsp;anobis,&amp;nbsp;voluptate,&amp;nbsp;numquam&amp;nbsp;architecto&amp;nbsp;fugit.&amp;nbsp;Eligendi&amp;nbsp;quidem&amp;nbsp;ipsam&amp;nbsp;ducimus&amp;nbsp;minus&amp;nbsp;magniillum&amp;nbsp;similique&amp;nbsp;veniam&amp;nbsp;tempore&amp;nbsp;unde?&lt;/p&gt;', 1, '2020-09-08 16:49:23');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `commentID` int(11) NOT NULL,
  `comment` text NOT NULL,
  `createdOn` datetime NOT NULL,
  `userID` int(11) NOT NULL,
  `postID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `commentID`, `comment`, `createdOn`, `userID`, `postID`) VALUES
(9, 29, 'replay to ayoubAdmin', '2020-09-10 17:04:25', 14, 20),
(10, 29, 'uhhhhhhhhhhhhh', '2020-09-10 17:04:33', 14, 20);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `name`, `description`) VALUES
(2, 'design art-mode', '<h1>DESIGN</h1><p>design news and projects on designboom spotlight a wide range of projects, from graphic and industrial design to fashion and interior studies. we cover the work of the leading protagonists in the world of design, as well as emerging designers and university graduates. check back for breaking news stories, in-depth features, and one-on-one interviews. many contributions are submitted directly by our global audience of readers, offering a unique cultural take on how design is developing in different parts of the world.</p>'),
(3, 'inovation', '<p>Innovation and creativity</p><p>In this engaging presentation, McKinsey principal Nathan Marston explains why innovation is increasingly important to driving corporate growth and brings to life the eight essentials of innovation performance.</p>'),
(4, 'degitale', ''),
(5, 'design', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `admin` tinyint(4) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `admin`, `username`, `email`, `password`, `created_at`) VALUES
(13, 1, 'ayoubAdmin', 'mahfoudAyoub123@gmail.com', '$2y$10$3.MOc0YyKLxFsrQ7qkTPP.TpdVu4FHDG5YdIPXZ2NtiR7j6fHmRW.', '2020-09-06 23:40:18'),
(14, 0, 'ayoubGuest', 'mahfoudAyoub@gmail.com', '$2y$10$EYelujgOZVvrkLq66YlDue2lCGUTeOiY52f7pl49Zdb4tah2JugjW', '2020-09-07 13:09:03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userID` (`userID`),
  ADD KEY `comments_ibfk_1` (`postID`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `topic_id` (`topic_id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `commentID` (`commentID`),
  ADD KEY `userID` (`userID`),
  ADD KEY `postID` (`postID`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`postID`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topics` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_ibfk_1` FOREIGN KEY (`commentID`) REFERENCES `comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `replies_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `replies_ibfk_3` FOREIGN KEY (`postID`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
