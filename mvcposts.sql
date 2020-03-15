-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 15, 2020 at 09:46 PM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `MvcPosts`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `title`, `body`, `created_at`) VALUES
(1, 5, 'post 1', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores distinctio odio nulla illum sapiente ipsa culpa ea neque vitae possimus blanditiis enim incidunt provident optio, quaerat dolor inventore voluptatem repellat?', '2020-03-11 21:03:25'),
(2, 5, 'post 2', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores distinctio odio nulla illum sapiente ipsa culpa ea neque vitae possimus blanditiis enim incidunt provident optio, quaerat dolor inventore voluptatem repellat?', '2020-03-11 21:03:25'),
(3, 5, 'Mi tercer post', 'dfimm  Lorem ipsum, dolor sit amet consectetur adipisicing elit. Illum dicta esse asperiores molestias repudiandae cumque suscipit aliquam molestiae saepe facere minima obcaecati, quas amet autem laboriosam ad blanditiis atque debitis.           plo', '2020-03-12 20:45:12');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `created_at`) VALUES
(5, 'jonh doe', 'luis@gmail.com', '$2y$10$kf872YEuTS53Ghl4BCRyaOYIgj1O5mtwduRIyn.c5EBtpyew8O6by', '2020-03-09 22:34:32'),
(9, 'Alex', 'alex@correo.com', '$2y$10$9i6.8z9Po3Rk1gHFx97Y6.SBA3673kSqyQo6pGnI02wQ8uIxy5IpO', '2020-03-10 23:05:46');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
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
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
