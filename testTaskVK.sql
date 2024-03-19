-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 19 2024 г., 22:16
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `testTaskVK`
--

-- --------------------------------------------------------

--
-- Структура таблицы `Quest`
--

CREATE TABLE `Quest` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `cost` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `Quest`
--

INSERT INTO `Quest` (`id`, `name`, `cost`) VALUES
(4, 'Take a walk in the park', 4),
(5, 'Wash the dishes', 7),
(6, 'Go out for a run', 10);

-- --------------------------------------------------------

--
-- Структура таблицы `User`
--

CREATE TABLE `User` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `balance` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `User`
--

INSERT INTO `User` (`id`, `name`, `balance`) VALUES
(1, 'Ron', 4),
(2, 'Bob', 7),
(3, 'Alice', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `UserQuest`
--

CREATE TABLE `UserQuest` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `quest_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `UserQuest`
--

INSERT INTO `UserQuest` (`id`, `user_id`, `quest_id`) VALUES
(1, 1, 1),
(2, 1, 2),
(4, 1, 3),
(23, 2, 2),
(24, 2, 3);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `Quest`
--
ALTER TABLE `Quest`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `UserQuest`
--
ALTER TABLE `UserQuest`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `Quest`
--
ALTER TABLE `Quest`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `User`
--
ALTER TABLE `User`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `UserQuest`
--
ALTER TABLE `UserQuest`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
