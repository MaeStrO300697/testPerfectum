SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comment`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` bigint(20) NOT NULL,
  `content` text NOT NULL,
  `user_id` bigint(20) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `update_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `content`, `user_id`, `create_at`, `update_at`) VALUES
(1, 'Хороший фильм. Отлиный сюжет', 1, '2020-06-07 22:59:17', '2020-06-07 23:00:01'),
(2, 'Не понравилось', 2, '2020-06-07 22:59:17', '2020-06-07 23:00:01'),
(3, '6\\10', 2, '2020-06-07 22:59:17', '2020-06-07 23:00:18'),
(4, '3\\10', 2, '2020-06-07 23:12:15', '2020-06-07 23:12:15'),
(5, 'норм', 1, '2020-06-07 23:13:41', '2020-06-07 23:13:41'),
(6, 'не очень', 1, '2020-06-07 23:13:41', '2020-06-07 23:13:41'),
(7, 'можно смотреть', 1, '2020-06-07 23:13:41', '2020-06-07 23:13:41'),
(8, 'на один раз', 2, '2020-06-07 23:13:41', '2020-06-07 23:13:41'),
(9, 'не для всех', 1, '2020-06-07 23:13:41', '2020-06-07 23:13:41'),
(10, 'посмотрел бы еще раз', 2, '2020-06-07 23:13:41', '2020-06-07 23:13:41'),
(11, 'Фильм отличный', 1, '2020-06-07 23:13:41', '2020-06-07 23:13:41');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `username`) VALUES
(1, 'artem.kar18@gmail.com', 'Artemii'),
(2, 'artem.kar2020', 'maestro300697');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comment_users_id_fk` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_users_id_fk` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
