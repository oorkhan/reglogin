-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Ноя 07 2018 г., 21:51
-- Версия сервера: 10.1.35-MariaDB
-- Версия PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `new_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `parent_comment_id` int(11) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `comment_sender_name` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `comments`
--

INSERT INTO `comments` (`comment_id`, `parent_comment_id`, `comment`, `comment_sender_name`, `date`, `post_id`) VALUES
(1, 0, 'asasas', 'Beleg', '2018-11-04 16:32:40', 16),
(2, 0, 'asdasd', 'Beleg', '2018-11-04 16:35:22', 16),
(3, 0, 'asdsadsad', 'sdsd', '2018-11-04 16:37:34', 16),
(4, 0, 'zsxfcxzfsadfdsfsdf', 'Beleg', '2018-11-04 16:40:12', 16),
(5, 0, 'vcbgfhgfhfgh', 'Beleg', '2018-11-04 16:41:43', 16),
(6, 4, 'Hello Beleg', 'Cutalion', '2018-11-05 16:13:22', 16),
(7, 5, 'What vcbgfhgfhfgh means?', 'Zefir', '2018-11-05 16:37:19', 16),
(8, 0, 'Hello its me zefir.', 'Zefir', '2018-11-05 16:38:15', 16),
(9, 0, 'Where is my bow?', 'Cutalion', '2018-11-05 16:45:27', 16),
(10, 0, 'checking ajax', 'zanza', '2018-11-05 16:47:10', 16),
(11, 10, 'Zanza is ajax working?', 'Muzzy ', '2018-11-05 16:47:42', 16),
(12, 11, 'Ithink problem solved\r\n', 'Sol', '2018-11-05 16:48:20', 16),
(13, 0, 'checking post id post value', 'Beleg', '2018-11-05 17:07:38', 16),
(14, 13, 'asdasd', 'asdfasdas', '2018-11-05 17:58:47', 16),
(15, 0, 'asdfasdas', 'Cutalion', '2018-11-05 18:29:54', 15),
(16, 15, 'vbnvbnvbn', 'asdfasdas', '2018-11-05 18:30:02', 15),
(17, 0, 'asasasas', 'Beleg', '2018-11-07 20:41:57', 14),
(18, 17, 'lk;kl;kl;kl;', 'xcvxcv', '2018-11-07 20:42:08', 14);

-- --------------------------------------------------------

--
-- Структура таблицы `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `url` varchar(100) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Дамп данных таблицы `images`
--

INSERT INTO `images` (`id`, `url`, `post_id`) VALUES
(4, 'uploads/1d6a42f7-0e9a-4eb3-a025-32136f23891c.jpeg', 15),
(5, 'uploads/1e331e27-b4a3-4525-a103-d15e5231049a.jpg', 15),
(6, 'uploads/8a05133d-1ec7-4189-becf-c9c0742164d1.png', 15),
(7, 'uploads/8c9a0118-a309-478b-b381-2ebbb93dcd08.jpg', 15),
(8, 'uploads/1e331e27-b4a3-4525-a103-d15e5231049a.jpg', 16);

-- --------------------------------------------------------

--
-- Структура таблицы `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `body` varchar(500) NOT NULL,
  `user_id` int(11) NOT NULL,
  `deleted` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `user_id`, `deleted`) VALUES
(1, '', '', 3, 1),
(2, 'bashliq', 'salam aleykum..', 3, 1),
(3, 'second post', 'salam', 3, 1),
(4, 'abc', 'nsdja asdjhasd ahdgasugd asdihgasgd', 3, 1),
(5, 'abc', 'ijdsof', 3, 0),
(6, 'abc', 'ijdsof', 3, 0),
(7, 'hjh', 'hju', 3, 0),
(8, 'hjh', 'hju', 3, 0),
(9, 'amkskhgasdh', 'kldshflhdsh sdkfhihsdf', 3, 0),
(10, 'amkskhgasdh', 'kldshflhdsh sdkfhihsdf', 3, 0),
(11, 'ahsdfugh', 'kjsdfo', 3, 0),
(12, 'ahsdfugh', 'kjsdfo', 3, 0),
(13, 'test post', 'test posttest posttest posttest posttest post', 3, 0),
(14, 'test post', 'test posttest posttest posttest posttest post', 3, 0),
(15, 'azerbaycan', 'test posttest posttest posttest posttest post', 3, 0),
(16, 'dsjkgasd', 'hsjqfsau asdg Ahsjqfsau asdg Ahsjqfsau asdg Ahsjqfsau asdg Ahsjqfsau asdg Ahsjqfsau asdg Ahsjqfsau asdg Ahsjqfsau asdg Ahsjqfsau asdg Ahsjqfsau asdg Ahsjqfsau asdg Ahsjqfsau asdg Ahsjqfsau asdg Ahsjqfsau asdg Ahsjqfsau asdg Ahsjqfsau asdg Ahsjqfsau asdg Ahsjqfsau asdg Ahsjqfsau asdg Ahsjqfsau asdg A', 3, 0);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `surname` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile_img` varchar(300) NOT NULL DEFAULT 'profile.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `username`, `password`, `profile_img`) VALUES
(0, 'farid', 'agabalayev', 'farid', '$2y$10$PUVrraOc3V76r73mjGIfCeBdL2mtp5gMLvrYdVbxNLsytSwwUt5IS', 'profile.png'),
(1, 'Orkhan', 'Orujaliyev', 'oorkhan', '', 'profile.png'),
(3, 'jimbo', 'mercury', 'jimbo', '$2y$10$TeA/Evv8ZuoFg3DYk35e6uwQMxD3QiQWemmzIbL7qUaQQNyNopbNC', 'profile.png'),
(4, 'Ilyas', 'Ilyasov', 'ilyas', '$2y$10$eIKL6TpbVhwFiT/RruZQ/Od7os1kxCe2uRfwVg6yuXSDD2CUkmFJ2', '1541088580.jpeg');

-- --------------------------------------------------------

--
-- Структура таблицы `user_content_like`
--

CREATE TABLE `user_content_like` (
  `user_content_like_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_content_like`
--

INSERT INTO `user_content_like` (`user_content_like_id`, `content_id`, `user_id`) VALUES
(2, 16, 3),
(3, 16, 0),
(4, 15, 0),
(5, 14, 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Индексы таблицы `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user_content_like`
--
ALTER TABLE `user_content_like`
  ADD PRIMARY KEY (`user_content_like_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `images`
--
ALTER TABLE `images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT для таблицы `user_content_like`
--
ALTER TABLE `user_content_like`
  MODIFY `user_content_like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
