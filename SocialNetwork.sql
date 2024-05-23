-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost
-- Время создания: Май 23 2024 г., 22:39
-- Версия сервера: 10.4.32-MariaDB
-- Версия PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `SocialNetwork`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `text_comment` text NOT NULL,
  `time_com` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `comment`
--

INSERT INTO `comment` (`id_comment`, `id_user`, `id_post`, `text_comment`, `time_com`) VALUES
(50, 38, 76, 'в 18 00', '2024-05-23 16:38:00'),
(51, 38, 75, 'Пошли в кино', '2024-05-23 16:38:09'),
(52, 39, 76, 'я пойду', '2024-05-23 16:39:01'),
(53, 36, 76, 'Я тоже хочу пойти', '2024-05-23 16:49:04'),
(54, 42, 76, 'Я не смогу, буду занят(', '2024-05-23 16:53:29'),
(55, 43, 77, 'Норм', '2024-05-23 18:07:05');

-- --------------------------------------------------------

--
-- Структура таблицы `likePost`
--

CREATE TABLE `likePost` (
  `id_like` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `likePost`
--

INSERT INTO `likePost` (`id_like`, `id_user`, `id_post`) VALUES
(49, 36, 76),
(48, 37, 74),
(51, 39, 76),
(52, 39, 77),
(54, 40, 76),
(53, 40, 77),
(56, 42, 76);

--
-- Триггеры `likePost`
--
DELIMITER $$
CREATE TRIGGER `after_likePost_delete` AFTER DELETE ON `likePost` FOR EACH ROW BEGIN
  UPDATE post SET likes = likes - 1 WHERE id_post = OLD.id_post;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `after_likePost_insert` AFTER INSERT ON `likePost` FOR EACH ROW BEGIN
  UPDATE post SET likes = likes + 1 WHERE id_post = NEW.id_post;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Структура таблицы `message`
--

CREATE TABLE `message` (
  `id_message` int(11) NOT NULL,
  `idFrom` int(11) NOT NULL,
  `idIn` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp(),
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `message`
--

INSERT INTO `message` (`id_message`, `idFrom`, `idIn`, `time`, `text`) VALUES
(60, 37, 36, '2024-05-23 16:36:27', 'Привет!'),
(61, 39, 36, '2024-05-23 16:39:20', 'Как дела?'),
(62, 36, 39, '2024-05-23 16:49:43', 'Хорошо, у тебя как?'),
(63, 36, 39, '2024-05-23 16:49:47', 'Что нового?'),
(64, 39, 36, '2024-05-23 16:50:01', 'У меня всё отлично, вчера ходил на хоккей!'),
(65, 36, 39, '2024-05-23 16:50:15', 'Вау, я тоже пойду на следующей неделе.'),
(66, 38, 36, '2024-05-23 16:51:06', 'Вчера была классная вечеринка!'),
(67, 40, 36, '2024-05-23 16:51:58', 'Позвони мне'),
(68, 41, 36, '2024-05-23 16:52:44', 'Нет'),
(69, 42, 36, '2024-05-23 16:53:16', 'Да!');

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE `post` (
  `id_post` int(11) NOT NULL,
  `user_id_post` int(11) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp(),
  `textPost` varchar(255) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `likes` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `post`
--

INSERT INTO `post` (`id_post`, `user_id_post`, `created`, `textPost`, `image`, `likes`) VALUES
(74, 37, '2024-05-23 16:35:34', 'Сегодня классный день', '', 1),
(75, 37, '2024-05-23 16:36:06', 'А вчера было как то не очень(', '', 0),
(76, 38, '2024-05-23 16:37:09', 'Кто завтра хочет со мной пойти в кино?', '', 4),
(77, 39, '2024-05-23 16:47:51', 'как жизнь у вас?', '', 2),
(78, 36, '2024-05-23 17:11:18', 'Это мой 1 пост', '', 0),
(79, 36, '2024-05-23 17:11:24', 'А это мой 2 пост', '', 0),
(80, 36, '2024-05-23 17:26:15', 'КРАСАВЧИК', '1675444273_gas-kvas-com-p-fonovie-risunki-dlya-avatarki-35.jpg', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `subscriber`
--

CREATE TABLE `subscriber` (
  `id_subscriber` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `idSub` int(11) NOT NULL,
  `time_sub` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `subscriber`
--

INSERT INTO `subscriber` (`id_subscriber`, `id`, `idSub`, `time_sub`) VALUES
(48, 36, 37, '2024-05-23 16:36:16'),
(49, 35, 37, '2024-05-23 16:36:17'),
(50, 37, 38, '2024-05-23 16:38:15'),
(51, 36, 38, '2024-05-23 16:38:17'),
(52, 35, 36, '2024-05-23 16:53:43'),
(53, 37, 36, '2024-05-23 16:53:44'),
(54, 38, 36, '2024-05-23 16:53:44'),
(55, 39, 36, '2024-05-23 16:53:45'),
(56, 36, 42, '2024-05-23 16:53:50');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id_users` int(12) NOT NULL,
  `info` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `admin` tinyint(1) DEFAULT 0,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id_users`, `info`, `avatar`, `email`, `admin`, `username`, `password`, `created`) VALUES
(35, NULL, NULL, 'user1@mail.ru', 0, 'user1', '$2y$10$iHbNrjK2M9DaC4ecgKU3nu7BmExIqEVthjnptMn8wMJGO9G6j.Ga6', '2024-05-23 15:47:56'),
(36, 'Я красавчик!', '', 'user2@mail.ru', 0, 'user2', '$2y$10$TuFa66QmrvZg1rPH4ZQgbumMTIM1FfnmUrtsf0pwA3/oa71Kwsh9O', '2024-05-23 16:33:48'),
(37, 'Я очень крутой', '', 'user3@mail.ru', 0, 'user3', '$2y$10$B84eCWZrPu8VCOZWykPXguLfrsi7LA5zxTvMb1d0GkSovqVkD8Pfq', '2024-05-23 16:35:03'),
(38, NULL, NULL, 'user4@mail.ru', 0, 'user4', '$2y$10$5SGNxxe5Z8bnKqukCrp8ue5fgKTYMR6vKKe1mf1KeEPyD5b.6g/Gq', '2024-05-23 16:36:53'),
(39, '', 'ava-vk-animal-91.jpg', 'user5@mail.ru', 0, 'user5', '$2y$10$6UiByNLQE/MZcRLaa6a9i.tEBmWeuVvy.d5jAHgtkYl3je03DB7Xu', '2024-05-23 16:38:48'),
(40, NULL, NULL, 'user6@mail.ru', 0, 'user6', '$2y$10$XKBAg/rTsT0hkY38oht8HOwV1dBOfzpVzKNDEw0CMo2OyUkJPOBOi', '2024-05-23 16:51:31'),
(41, NULL, NULL, 'user7@mail.ru', 0, 'user7', '$2y$10$cnqNd.ShQXE6KewNCUbOIu5dLdYlRMyuXbp2dEDUKcFUr70tumPay', '2024-05-23 16:52:34'),
(42, NULL, NULL, 'user8@mail.ru', 0, 'user8', '$2y$10$mgGgg5MkJREhlo3qYYs3XOINnWeUFPt/NDAuPLYLtiX/IRWvirSk.', '2024-05-23 16:53:05'),
(43, NULL, NULL, 'admin@mail.ru', 1, 'admin', '$2y$10$U0qVsOIM0tQ50ggZfIsTEe6luiQ5TD8NaTmdcU6c.YN1bsx3s8uYK', '2024-05-23 17:30:15');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_post` (`id_post`);

--
-- Индексы таблицы `likePost`
--
ALTER TABLE `likePost`
  ADD PRIMARY KEY (`id_like`),
  ADD UNIQUE KEY `unique_like_pair` (`id_user`,`id_post`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_post` (`id_post`);

--
-- Индексы таблицы `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `idFrom` (`idFrom`),
  ADD KEY `idIn` (`idIn`);

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `user_id_post` (`user_id_post`);

--
-- Индексы таблицы `subscriber`
--
ALTER TABLE `subscriber`
  ADD PRIMARY KEY (`id_subscriber`),
  ADD UNIQUE KEY `unique_subscriber_pair` (`id`,`idSub`),
  ADD KEY `id` (`id`),
  ADD KEY `idSub` (`idSub`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT для таблицы `likePost`
--
ALTER TABLE `likePost`
  MODIFY `id_like` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT для таблицы `message`
--
ALTER TABLE `message`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT для таблицы `post`
--
ALTER TABLE `post`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT для таблицы `subscriber`
--
ALTER TABLE `subscriber`
  MODIFY `id_subscriber` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_users`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`id_post`) REFERENCES `post` (`id_post`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `likePost`
--
ALTER TABLE `likePost`
  ADD CONSTRAINT `likePost_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id_users`) ON DELETE CASCADE,
  ADD CONSTRAINT `likePost_ibfk_2` FOREIGN KEY (`id_post`) REFERENCES `post` (`id_post`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`idFrom`) REFERENCES `users` (`id_users`) ON DELETE CASCADE,
  ADD CONSTRAINT `message_ibfk_2` FOREIGN KEY (`idIn`) REFERENCES `users` (`id_users`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id_post`) REFERENCES `users` (`id_users`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `subscriber`
--
ALTER TABLE `subscriber`
  ADD CONSTRAINT `subscriber_ibfk_1` FOREIGN KEY (`id`) REFERENCES `users` (`id_users`) ON DELETE CASCADE,
  ADD CONSTRAINT `subscriber_ibfk_2` FOREIGN KEY (`idSub`) REFERENCES `users` (`id_users`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
