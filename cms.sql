-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2020 at 08:43 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(11) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(1, 'PHP'),
(2, 'C#'),
(3, 'C++');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `comment_post_id` varchar(255) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(1, '6', 'Fahad Nouman', 'khanniaz916@gmail.com', 'hjgjhgjhghjgjgj', 'approved', '2019-08-20');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_cat_id` int(11) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_user` varchar(255) NOT NULL,
  `post_date` varchar(255) NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` varchar(255) NOT NULL,
  `post_status` varchar(255) NOT NULL,
  `post_views_count` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_cat_id`, `post_title`, `post_user`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(1, 1, 'Post1', 'root', '19-08-20', '10.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex dolorem quas perferendis iusto distinctio facilis, recusandae blanditiis. Tenetur quam assumenda ullam, vitae maxime debitis, dicta obcaecati perferendis, corporis itaque nisi.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex dolorem quas perferendis iusto distinctio facilis, recusandae blanditiis. Tenetur quam assumenda ullam, vitae maxime debitis, dicta obcaecati perferendis, corporis itaque nisi.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex dolorem quas perferendis iusto distinctio facilis, recusandae blanditiis. Tenetur quam assumenda ullam, vitae maxime debitis, dicta obcaecati perferendis, corporis itaque nisi.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex dolorem quas perferendis iusto distinctio facilis, recusandae blanditiis. Tenetur quam assumenda ullam, vitae maxime debitis, dicta obcaecati perferendis, corporis itaque nisi.', 'java,php,c#', '0', 'published', 0),
(2, 2, 'Post2', 'root', '19-08-20', '3Gz5AxO.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex dolorem quas perferendis iusto distinctio facilis, recusandae blanditiis. Tenetur quam assumenda ullam, vitae maxime debitis, dicta obcaecati perferendis, corporis itaque nisi.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex dolorem quas perferendis iusto distinctio facilis, recusandae blanditiis. Tenetur quam assumenda ullam, vitae maxime debitis, dicta obcaecati perferendis, corporis itaque nisi.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex dolorem quas perferendis iusto distinctio facilis, recusandae blanditiis. Tenetur quam assumenda ullam, vitae maxime debitis, dicta obcaecati perferendis, corporis itaque nisi.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex dolorem quas perferendis iusto distinctio facilis, recusandae blanditiis. Tenetur quam assumenda ullam, vitae maxime debitis, dicta obcaecati perferendis, corporis itaque nisi.', 'php', '0', 'published', 0),
(3, 2, 'Post2', 'root', '19-08-20', '3Gz5AxO.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex dolorem quas perferendis iusto distinctio facilis, recusandae blanditiis. Tenetur quam assumenda ullam, vitae maxime debitis, dicta obcaecati perferendis, corporis itaque nisi.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex dolorem quas perferendis iusto distinctio facilis, recusandae blanditiis. Tenetur quam assumenda ullam, vitae maxime debitis, dicta obcaecati perferendis, corporis itaque nisi.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex dolorem quas perferendis iusto distinctio facilis, recusandae blanditiis. Tenetur quam assumenda ullam, vitae maxime debitis, dicta obcaecati perferendis, corporis itaque nisi.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex dolorem quas perferendis iusto distinctio facilis, recusandae blanditiis. Tenetur quam assumenda ullam, vitae maxime debitis, dicta obcaecati perferendis, corporis itaque nisi.', 'php', '0', 'published', 0),
(4, 1, 'Post1', 'root', '19-08-20', '10.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex dolorem quas perferendis iusto distinctio facilis, recusandae blanditiis. Tenetur quam assumenda ullam, vitae maxime debitis, dicta obcaecati perferendis, corporis itaque nisi.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex dolorem quas perferendis iusto distinctio facilis, recusandae blanditiis. Tenetur quam assumenda ullam, vitae maxime debitis, dicta obcaecati perferendis, corporis itaque nisi.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex dolorem quas perferendis iusto distinctio facilis, recusandae blanditiis. Tenetur quam assumenda ullam, vitae maxime debitis, dicta obcaecati perferendis, corporis itaque nisi.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex dolorem quas perferendis iusto distinctio facilis, recusandae blanditiis. Tenetur quam assumenda ullam, vitae maxime debitis, dicta obcaecati perferendis, corporis itaque nisi.', 'java,php,c#', '0', 'published', 0),
(5, 1, 'Post1', 'root', '19-08-20', '10.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex dolorem quas perferendis iusto distinctio facilis, recusandae blanditiis. Tenetur quam assumenda ullam, vitae maxime debitis, dicta obcaecati perferendis, corporis itaque nisi.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex dolorem quas perferendis iusto distinctio facilis, recusandae blanditiis. Tenetur quam assumenda ullam, vitae maxime debitis, dicta obcaecati perferendis, corporis itaque nisi.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex dolorem quas perferendis iusto distinctio facilis, recusandae blanditiis. Tenetur quam assumenda ullam, vitae maxime debitis, dicta obcaecati perferendis, corporis itaque nisi.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex dolorem quas perferendis iusto distinctio facilis, recusandae blanditiis. Tenetur quam assumenda ullam, vitae maxime debitis, dicta obcaecati perferendis, corporis itaque nisi.', 'java,php,c#', '0', 'published', 0),
(6, 2, 'Post2', 'root', '19-08-20', '3Gz5AxO.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex dolorem quas perferendis iusto distinctio facilis, recusandae blanditiis. Tenetur quam assumenda ullam, vitae maxime debitis, dicta obcaecati perferendis, corporis itaque nisi.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex dolorem quas perferendis iusto distinctio facilis, recusandae blanditiis. Tenetur quam assumenda ullam, vitae maxime debitis, dicta obcaecati perferendis, corporis itaque nisi.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex dolorem quas perferendis iusto distinctio facilis, recusandae blanditiis. Tenetur quam assumenda ullam, vitae maxime debitis, dicta obcaecati perferendis, corporis itaque nisi.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex dolorem quas perferendis iusto distinctio facilis, recusandae blanditiis. Tenetur quam assumenda ullam, vitae maxime debitis, dicta obcaecati perferendis, corporis itaque nisi.', 'php', '1', 'published', 0),
(7, 2, 'Post2', 'root', '19-08-20', '3Gz5AxO.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex dolorem quas perferendis iusto distinctio facilis, recusandae blanditiis. Tenetur quam assumenda ullam, vitae maxime debitis, dicta obcaecati perferendis, corporis itaque nisi.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex dolorem quas perferendis iusto distinctio facilis, recusandae blanditiis. Tenetur quam assumenda ullam, vitae maxime debitis, dicta obcaecati perferendis, corporis itaque nisi.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex dolorem quas perferendis iusto distinctio facilis, recusandae blanditiis. Tenetur quam assumenda ullam, vitae maxime debitis, dicta obcaecati perferendis, corporis itaque nisi.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex dolorem quas perferendis iusto distinctio facilis, recusandae blanditiis. Tenetur quam assumenda ullam, vitae maxime debitis, dicta obcaecati perferendis, corporis itaque nisi.', 'php', '0', 'published', 0),
(8, 1, 'Post1', 'root', '24-08-20', '10.jpeg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex dolorem quas perferendis iusto distinctio facilis, recusandae blanditiis. Tenetur quam assumenda ullam, vitae maxime debitis, dicta obcaecati perferendis, corporis itaque nisi.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex dolorem quas perferendis iusto distinctio facilis, recusandae blanditiis. Tenetur quam assumenda ullam, vitae maxime debitis, dicta obcaecati perferendis, corporis itaque nisi.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex dolorem quas perferendis iusto distinctio facilis, recusandae blanditiis. Tenetur quam assumenda ullam, vitae maxime debitis, dicta obcaecati perferendis, corporis itaque nisi.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex dolorem quas perferendis iusto distinctio facilis, recusandae blanditiis. Tenetur quam assumenda ullam, vitae maxime debitis, dicta obcaecati perferendis, corporis itaque nisi.', 'java,php,c#', '0', 'published', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_image` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_firstname`, `user_lastname`, `user_role`, `user_email`, `user_password`, `user_image`) VALUES
(1, 'root', 'root', 'root', 'admin', 'xyz@gmail.com', '$2y$10$VxUuhMUfzu1WstvXoXkTROAEfEoFPc/gMzjtJkL2XNCxKdLJBRCVO', '');

-- --------------------------------------------------------

--
-- Table structure for table `users_online`
--

CREATE TABLE `users_online` (
  `id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_online`
--

INSERT INTO `users_online` (`id`, `session`, `time`) VALUES
(1, 'dgre05bqo6tj9k0p3vupvplull', '1597814829'),
(2, '9maok9rduj1h216p2jjnbk2jta', '1597814871'),
(3, 'g7fqoa7qmgg39d02d8guscfjfv', '1597815816'),
(4, 'qg4kd690mvc4jq17uj6ota8orv', '1598281604');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_online`
--
ALTER TABLE `users_online`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users_online`
--
ALTER TABLE `users_online`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
