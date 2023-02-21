-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 21 2023 г., 11:45
-- Версия сервера: 8.0.30
-- Версия PHP: 8.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `made_young`
--

-- --------------------------------------------------------

--
-- Структура таблицы `buy_list`
--

CREATE TABLE `buy_list` (
  `id` int UNSIGNED NOT NULL,
  `id_product_buyed` int NOT NULL,
  `id_user_buyer` int NOT NULL,
  `date` datetime NOT NULL,
  `price` int NOT NULL,
  `status` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Дамп данных таблицы `buy_list`
--

INSERT INTO `buy_list` (`id`, `id_product_buyed`, `id_user_buyer`, `date`, `price`, `status`) VALUES
(1, 1, 1, '2023-01-17 12:40:13', 1, 0),
(2, 1, 1, '2023-01-17 12:40:37', 1, 0),
(3, 1, 1, '2023-01-17 12:40:47', 1, 0),
(4, 1, 1, '2023-01-17 12:40:48', 1, 0),
(5, 1, 1, '2023-01-17 12:40:48', 1, 0),
(6, 1, 1, '2023-01-17 12:40:49', 1, 0),
(7, 1, 1, '2023-01-17 12:42:17', 1, 0),
(8, 1, 1, '2023-01-17 12:42:19', 1, 0),
(9, 2, 1, '2023-01-17 12:42:51', 225, 0),
(10, 2, 1, '2023-01-17 12:44:00', 225, 0),
(11, 2, 1, '2023-01-17 12:44:01', 225, 0),
(12, 2, 1, '2023-01-17 12:44:02', 223, 2),
(13, 2, 1, '2023-01-19 14:58:22', 11, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `catalog`
--

CREATE TABLE `catalog` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(32) NOT NULL,
  `description` varchar(256) NOT NULL,
  `price` int NOT NULL,
  `img` varchar(256) NOT NULL,
  `amount` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Дамп данных таблицы `catalog`
--

INSERT INTO `catalog` (`id`, `title`, `description`, `price`, `img`, `amount`) VALUES
(1, 'Руслан', 'Неизлечимо болен с рождения', 1, './assets/img/products/index.jpg', 0),
(2, 'Богдан', 'Красивый, умный, превосходный', 225, './assets/img/products/index.jpg', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `news_events`
--

CREATE TABLE `news_events` (
  `id` int UNSIGNED NOT NULL,
  `title` varchar(128) NOT NULL,
  `tiny_description` varchar(256) NOT NULL,
  `description` varchar(5024) NOT NULL,
  `img` varchar(1024) NOT NULL,
  `date_start` datetime NOT NULL,
  `date_end` datetime NOT NULL,
  `free_space` int NOT NULL,
  `age` int NOT NULL,
  `type` int NOT NULL COMMENT '1 - новость\r\n2 - мероприятие'
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Дамп данных таблицы `news_events`
--

INSERT INTO `news_events` (`id`, `title`, `tiny_description`, `description`, `img`, `date_start`, `date_end`, `free_space`, `age`, `type`) VALUES
(1, 'Уютный вечер', 'Тематический «Уютный вечер» ко дню влюбленных', 'Уютный вечер - это просмотр твоего любимого кино, в интеллектуально-досуговом центре «Сфера» по адресу: пр-т Строителей 30/2б (на территории парка «Здоровья»). ', './assets/img/news_events/48wJxQd-hRQ.jpg', '2023-02-15 16:00:00', '2023-02-15 20:00:00', 35, 0, 2),
(2, 'Благотворительный сбор «сделайдобро.молодежь»', 'Мы приглашаем всех неравнодушных жителей города Альметьевск присоединиться к благотворительной акции ', 'Мы приглашаем всех неравнодушных жителей города Альметьевск присоединиться к благотворительной акции «сделайдобро.молодежь», направленной на помощь реабилитационному центру «Кошкин дом».\r\n\r\nСбор проходит по двум адресам:\r\n- м(п)к «Контакт на Маяковского» (ул. Маяковского 47А).\r\n- планетарий «Сфера» (пр-т. Строителей 30/2б, на территории парка «Здоровья»).\r\n\r\nМы принимаем со вторника по субботу, с 14:00 до 20:00.\r\nТелефон для справок: +7 (917) 925-28-19', './assets/img/news_events/b62aYQJXGdQ.jpg', '2023-02-20 00:00:00', '2023-03-20 23:00:00', 9999, 14, 1),
(3, 'сделано молодежью альметьевска теперь в Telegram! ', 'Новости, опросы, обсуждения и все в одном telegram-канале. Подпишись, если хочешь быть в курсе всех событий', 'Новости, опросы, обсуждения и все в одном telegram-канале. Подпишись, если хочешь быть в курсе всех событий\r\n\r\nhttps://t.me/madeyouthalm', './assets/img/news_events/5XfVzp_B2oU.jpg', '2023-02-21 10:13:49', '2023-02-21 10:13:49', 9999, 14, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(64) NOT NULL,
  `surname` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `tel` varchar(14) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL DEFAULT 'Нет',
  `bth_day` date NOT NULL DEFAULT '1975-12-12',
  `password` varchar(128) NOT NULL,
  `date_reg` datetime NOT NULL,
  `rules` int NOT NULL DEFAULT '0',
  `balance` int NOT NULL DEFAULT '0',
  `ip_reg` varchar(64) NOT NULL,
  `last_ip` varchar(64) NOT NULL,
  `img` varchar(128) CHARACTER SET utf16 COLLATE utf16_general_ci NOT NULL DEFAULT './assets/img/avatars/user.png'
) ENGINE=InnoDB DEFAULT CHARSET=utf16;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `surname`, `email`, `tel`, `bth_day`, `password`, `date_reg`, `rules`, `balance`, `ip_reg`, `last_ip`, `img`) VALUES
(1, 'Богдан', 'Бурмакин', 'r1den0403@icloud.com', 'Нет', '1975-12-12', '8e32cb6fcd1a753c231195dac2ddb6fe', '2023-01-17 09:16:15', 1, 99999099, '127.0.0.1', '127.0.0.1', './assets/img/avatars/bogdan.jpg'),
(2, '123', '123', 'r1waddaw@icloud.com', 'Нет', '1975-12-12', '3a26f50dd4ffa1b2f2fb3e610fd88fd9', '2023-02-18 14:55:35', 0, 0, '127.0.0.1', '127.0.0.1', './assets/img/avatars/user.png');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `buy_list`
--
ALTER TABLE `buy_list`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `catalog`
--
ALTER TABLE `catalog`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `news_events`
--
ALTER TABLE `news_events`
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `buy_list`
--
ALTER TABLE `buy_list`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблицы `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `news_events`
--
ALTER TABLE `news_events`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
