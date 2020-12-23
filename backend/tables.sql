-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Дек 23 2020 г., 11:41
-- Версия сервера: 10.3.22-MariaDB
-- Версия PHP: 7.2.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `finalforum`
--

-- --------------------------------------------------------

--
-- Структура таблицы `ff_accounts`
--

CREATE TABLE `ff_accounts` (
  `id` int(11) NOT NULL,
  `username` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reg_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `ff_admins`
--

CREATE TABLE `ff_admins` (
  `id` int(11) NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `ff_api_tokens`
--

CREATE TABLE `ff_api_tokens` (
  `id` int(11) NOT NULL,
  `token` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `ff_config`
--

CREATE TABLE `ff_config` (
  `id` int(11) NOT NULL,
  `board_title` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `board_msg` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `ff_config`
--

INSERT INTO `ff_config` (`id`, `board_title`, `board_msg`) VALUES
(1, 'FinalForum', 'Добро пожаловать!');

-- --------------------------------------------------------

--
-- Структура таблицы `ff_likes`
--

CREATE TABLE `ff_likes` (
  `id` int(11) NOT NULL,
  `like_author` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `liked_thread_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `liked_comment_id` varchar(11) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `ff_profile_comments`
--

CREATE TABLE `ff_profile_comments` (
  `id` int(11) NOT NULL,
  `parent_profile` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_container` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_author` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `ff_replies`
--

CREATE TABLE `ff_replies` (
  `id` int(11) NOT NULL,
  `parent_thread` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `reply_container` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `ff_threads`
--

CREATE TABLE `ff_threads` (
  `id` int(11) NOT NULL,
  `thread_name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `thread_author` varchar(25) COLLATE utf8mb4_unicode_ci NOT NULL,
  `thread_container` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `ff_accounts`
--
ALTER TABLE `ff_accounts`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ff_admins`
--
ALTER TABLE `ff_admins`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ff_api_tokens`
--
ALTER TABLE `ff_api_tokens`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ff_config`
--
ALTER TABLE `ff_config`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ff_likes`
--
ALTER TABLE `ff_likes`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ff_profile_comments`
--
ALTER TABLE `ff_profile_comments`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ff_replies`
--
ALTER TABLE `ff_replies`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `ff_threads`
--
ALTER TABLE `ff_threads`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `ff_accounts`
--
ALTER TABLE `ff_accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `ff_admins`
--
ALTER TABLE `ff_admins`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `ff_api_tokens`
--
ALTER TABLE `ff_api_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `ff_config`
--
ALTER TABLE `ff_config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `ff_likes`
--
ALTER TABLE `ff_likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `ff_profile_comments`
--
ALTER TABLE `ff_profile_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `ff_replies`
--
ALTER TABLE `ff_replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `ff_threads`
--
ALTER TABLE `ff_threads`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
