-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 05, 2017 at 09:29 AM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--
CREATE DATABASE IF NOT EXISTS `blog` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `blog`;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `title` varchar(200) NOT NULL,
  `brief_text` varchar(200) NOT NULL,
  `text` text NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `brief_text`, `text`, `created_at`, `updated_at`) VALUES
(1, 1, 'Science has not yet mastered prophecy', 'We predict too much for the next year and yet far too little for the next ten.', '<p>Never in all their history have men been able truly to conceive of &nbsp;the world as one: a single sphere, a globe, having the qualities of a &nbsp;globe, a round earth in which all the directions eventually meet, in &nbsp;which there is no center because every point, or none, is center &mdash; an &nbsp;equal earth which all men occupy as equals. The airman&#39;s earth, if free &nbsp;men make it, will be truly round: a globe in practice, not in theory.</p><p>Science &nbsp;cuts two ways, of course; its products can be used for both good and &nbsp;evil. But there&#39;s no turning back from science. The early warnings about &nbsp;technological dangers also come from science.</p><p>What was most significant about the lunar voyage was not that man set foot on the Moon but that they set eye on the earth.</p><p>A &nbsp;Chinese tale tells of some men sent to harm a young girl who, upon &nbsp;seeing her beauty, become her protectors rather than her violators. &nbsp;That&#39;s how I felt seeing the Earth for the first time. I could not help &nbsp;but love and cherish her.</p><p>For those who have seen the Earth from &nbsp;space, and for the hundreds and perhaps thousands more who will, the &nbsp;experience most certainly changes your perspective. The things that we &nbsp;share in our world are far more valuable than those which divide us.</p><h2>The Final Frontier</h2><p>There &nbsp;can be no thought of finishing for &lsquo;aiming for the stars.&rsquo; Both &nbsp;figuratively and literally, it is a task to occupy the generations. And &nbsp;no matter how much progress one makes, there is always the thrill of &nbsp;just beginning.</p><p>There can be no thought of finishing for &lsquo;aiming &nbsp;for the stars.&rsquo; Both figuratively and literally, it is a task to occupy &nbsp;the generations. And no matter how much progress one makes, there is &nbsp;always the thrill of just beginning.</p><blockquote>The dreams of &nbsp;yesterday are the hopes of today and the reality of tomorrow. Science &nbsp;has not yet mastered prophecy. We predict too much for the next year and &nbsp;yet far too little for the next ten.</blockquote><p>Spaceflights cannot &nbsp;be stopped. This is not the work of any one man or even a group of men. &nbsp;It is a historical process which mankind is carrying out in accordance &nbsp;with the natural laws of human development.</p><h2>Reaching for the Stars</h2><p>As &nbsp;we got further and further away, it [the Earth] diminished in size. &nbsp;Finally it shrank to the size of a marble, the most beautiful you can &nbsp;imagine. That beautiful, warm, living object looked so fragile, so &nbsp;delicate, that if you touched it with a finger it would crumble and fall &nbsp;apart. Seeing this has to change a man.</p><p>To go places and do things that have never been done before &ndash; that&rsquo;s what living is all about.</p><p>Space, &nbsp;the final frontier. These are the voyages of the Starship Enterprise. &nbsp;Its five-year mission: to explore strange new worlds, to seek out new &nbsp;life and new civilizations, to boldly go where no man has gone before.</p><p>As &nbsp;I stand out here in the wonders of the unknown at Hadley, I sort of &nbsp;realize there&rsquo;s a fundamental truth to our nature, Man must explore, and &nbsp;this is exploration at its greatest.</p>', 1496313600, 1496509749),
(2, 1, 'Man must explore, and this is exploration at its greatest', 'Problems look mighty small from 150 miles up', '<p>Never in all their history have men been able truly to conceive of the world as one: a single sphere, a globe, having the qualities of a globe, a round earth in which all the directions eventually meet, in which there is no center because every point, or none, is center &mdash; an equal earth which all men occupy as equals. The airman&#39;s earth, if free men make it, will be truly round: a globe in practice, not in theory.</p><p>Science cuts two ways, of course; its products can be used for both good and evil. But there&#39;s no turning back from science. The early warnings about technological dangers also come from science.</p><p>What was most significant about the lunar voyage was not that man set foot on the Moon but that they set eye on the earth.</p><p>A Chinese tale tells of some men sent to harm a young girl who, upon seeing her beauty, become her protectors rather than her violators. That&#39;s how I felt seeing the Earth for the first time. I could not help but love and cherish her.</p><p>For those who have seen the Earth from space, and for the hundreds and perhaps thousands more who will, the experience most certainly changes your perspective. The things that we share in our world are far more valuable than those which divide us.</p><h2>The Final Frontier</h2><p>There can be no thought of finishing for &lsquo;aiming for the stars.&rsquo; Both figuratively and literally, it is a task to occupy the generations. And no matter how much progress one makes, there is always the thrill of just beginning.</p><p>There can be no thought of finishing for &lsquo;aiming for the stars.&rsquo; Both figuratively and literally, it is a task to occupy the generations. And no matter how much progress one makes, there is always the thrill of just beginning.</p><blockquote>The dreams of yesterday are the hopes of today and the reality of tomorrow. Science has not yet mastered prophecy. We predict too much for the next year and yet far too little for the next ten.</blockquote><p>Spaceflights cannot be stopped. This is not the work of any one man or even a group of men. It is a historical process which mankind is carrying out in accordance with the natural laws of human development.</p><h2>Reaching for the Stars</h2><p>As we got further and further away, it [the Earth] diminished in size. Finally it shrank to the size of a marble, the most beautiful you can imagine. That beautiful, warm, living object looked so fragile, so delicate, that if you touched it with a finger it would crumble and fall apart. Seeing this has to change a man.</p>', 1496503026, 1496509094),
(3, 1, 'Failure is not an option', 'Many say exploration is part of our destiny, but it’s actually our duty to future generations.', '<p>Never in all their history have men been able truly to conceive of the world as one: a single sphere, a globe, having the qualities of a globe, a round earth in which all the directions eventually meet, in which there is no center because every point, or none, is center &mdash; an equal earth which all men occupy as equals. The airman&#39;s earth, if free men make it, will be truly round: a globe in practice, not in theory.</p><p>Science cuts two ways, of course; its products can be used for both good and evil. But there&#39;s no turning back from science. The early warnings about technological dangers also come from science.</p><p>What was most significant about the lunar voyage was not that man set foot on the Moon but that they set eye on the earth.</p><p>A Chinese tale tells of some men sent to harm a young girl who, upon seeing her beauty, become her protectors rather than her violators. That&#39;s how I felt seeing the Earth for the first time. I could not help but love and cherish her.</p><p>For those who have seen the Earth from space, and for the hundreds and perhaps thousands more who will, the experience most certainly changes your perspective. The things that we share in our world are far more valuable than those which divide us.</p><h2>The Final Frontier</h2><p>There can be no thought of finishing for &lsquo;aiming for the stars.&rsquo; Both figuratively and literally, it is a task to occupy the generations. And no matter how much progress one makes, there is always the thrill of just beginning.</p><p>There can be no thought of finishing for &lsquo;aiming for the stars.&rsquo; Both figuratively and literally, it is a task to occupy the generations. And no matter how much progress one makes, there is always the thrill of just beginning.</p><blockquote>The dreams of yesterday are the hopes of today and the reality of tomorrow. Science has not yet mastered prophecy. We predict too much for the next year and yet far too little for the next ten.</blockquote><p>Spaceflights cannot be stopped. This is not the work of any one man or even a group of men. It is a historical process which mankind is carrying out in accordance with the natural laws of human development.</p><h2>Reaching for the Stars</h2><p>As we got further and further away, it [the Earth] diminished in size. Finally it shrank to the size of a marble, the most beautiful you can imagine. That beautiful, warm, living object looked so fragile, so delicate, that if you touched it with a finger it would crumble and fall apart. Seeing this has to change a man.</p><p>To go places and do things that have never been done before &ndash; that&rsquo;s what living is all about.</p><p>Space, the final frontier. These are the voyages of the Starship Enterprise. Its five-year mission: to explore strange new worlds, to seek out new life and new civilizations, to boldly go where no man has gone before.</p><p>As I stand out here in the wonders of the unknown at Hadley, I sort of realize there&rsquo;s a fundamental truth to our nature, Man must explore, and this is exploration at its greatest.</p>', 1496503131, 1496509665);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(250) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `name`, `created_at`) VALUES
(1, 'user1', '$2y$10$7och3gvkqDSOLQthepZvUOYl.HTRCFCajAGa3Z1c0lJmYlgOmHu8a', 'user1@example.com', 'User 1', 1496313600),
(2, 'user2', '$2y$10$NivikYDmn83b8SHkpmt7VuR2rkuc129hiUYKE.00.rqHFCoug/okG', 'user2@example.com', 'User 2', 1496313600);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
