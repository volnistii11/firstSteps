-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Апр 03 2021 г., 12:37
-- Версия сервера: 5.7.21-0ubuntu0.16.04.1
-- Версия PHP: 7.0.28-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test`
--

-- --------------------------------------------------------

--
-- Структура таблицы `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `session_id` varchar(255) NOT NULL,
  `catalog_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `basket`
--

INSERT INTO `basket` (`id`, `session_id`, `catalog_id`) VALUES
(86, 'a636i44639p6vbk958e173rrf7', 1),
(87, 'a636i44639p6vbk958e173rrf7', 4),
(88, 'a636i44639p6vbk958e173rrf7', 9),
(89, 'a636i44639p6vbk958e173rrf7', 9);

-- --------------------------------------------------------

--
-- Структура таблицы `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `catalog`
--

INSERT INTO `catalog` (`id`, `name`, `price`, `description`, `image`) VALUES
(1, 'Яблоко', 12, 'Яблоко-плод,который растет на дереве.Очень сочный и вкусный плод.Бывает разных цветов но чаще всего красного и зеленного.Внутри имеются семячки,то что осталось у него от дерева.', 'yabloko.jpg'),
(2, 'Пицца', 24, 'Пи́цца (итал. pizza от итал. pizzicare — быть острым) — итальянское национальное блюдо в виде круглой открытой лепёшки, покрытой в классическом варианте томатами и расплавленным сыром. Сыр является главным ингредиентом пиццы (как правило, моцарелла).', ''),
(3, 'Чай', 1, 'Чёрный чай – максимально ферментированный чайный лист, дающий плотный тёмный настой. Если классифицировать чайные листы для его приготовления от низа стебля до макушки (типсов), то можно встретить следующие обозначения: S – «сушонг» - нижние крупные листья, скрученные по длине;', ''),
(4, 'Арбуз', 20, NULL, 'arbuz.jpg'),
(5, 'Ананас', 30, NULL, 'ananas.png'),
(6, 'Киви', 4, NULL, 'kiwi.jpg'),
(7, 'Банан', 3, NULL, 'banan.jpg'),
(8, 'Абрикос', 3, NULL, 'abrikos.png'),
(9, 'Персик', 16, 'Норм такой', 'persik.png');

-- --------------------------------------------------------

--
-- Структура таблицы `id_order_id_goods`
--

CREATE TABLE `id_order_id_goods` (
  `id` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_catalog` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `id_order_id_goods`
--

INSERT INTO `id_order_id_goods` (`id`, `id_order`, `id_catalog`) VALUES
(140, 375795477, 9),
(141, 375795477, 9),
(142, 375795477, 6),
(143, 375795477, 9),
(144, 375795477, 8),
(145, 375795477, 9),
(146, 375795477, 9),
(147, 375795477, 7),
(148, 1571657672, 1),
(149, 1571657672, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `order_number` int(11) DEFAULT NULL,
  `login` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `login`, `address`, `phone`, `email`, `status`) VALUES
(17, 1935669060, '123', '12323', '+79264647840', '123123@s.d', 'в обработке'),
(18, 1034208938, '123', '12323', '+79264647840', '123123@s.d', 'в обработке'),
(19, 1729307674, '123', '12323', '+79264647840', '123123@s.d', 'в обработке'),
(20, 291294181, '123', '12323', '+79264647840', '123123@s.d', 'в обработке'),
(21, 439373424, '123', '12323', '+79264647840', '123123@s.d', 'в обработке'),
(22, 439713737, '123', '12323', '+79264647840', '123123@s.d', 'в обработке'),
(23, 1290881302, '123', '12323', '+79264647840', '123123@s.d', 'в обработке'),
(24, 878834778, '123', '12323', '+79264647840', '123123@s.d', 'в обработке'),
(25, 1001228814, '123', '12323', '+79264647840', '123123@s.d', 'в обработке'),
(26, 1733391880, '123', '12323', '+79264647840', '123123@s.d', 'в обработке'),
(27, 926297893, '123', '12323', '+79264647840', '123123@s.d', 'в обработке'),
(28, 780532878, '123', '12323', '+79264647840', '123123@s.d', 'в обработке'),
(29, 459618146, '123', '12323', '+79264647840', '123123@s.d', 'в обработке'),
(30, 1586845727, '123', '12323', '+79264647840', '123123@s.d', 'в обработке'),
(31, 375795477, '123', 'L.Tolstoy street, 45', '+79264777854', 'cor.fascio@gmail.com', 'в обработке'),
(32, 1571657672, '123', 'L.Tolstoy street, 45', '+79264647840', 'cor.fascio@gmail.com', 'в обработке'),
(33, 1967985248, '123', '', '', '', 'в обработке'),
(34, 814567564, '123', '', '', '', 'в обработке');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `login` varchar(255) NOT NULL,
  `pass` text NOT NULL,
  `hash` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `hash`) VALUES
(1, 'admin', '$2y$10$iSNrVAK46daP/TDIbYhZM.JzJzmolxfM.B8FrmjhLC44jP91q0X52', '46881230260278df9455c10.79078146'),
(2, 'asd', 'asd', NULL),
(3, 'id', 'id', NULL),
(4, '123', '123', NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `id_order_id_goods`
--
ALTER TABLE `id_order_id_goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;
--
-- AUTO_INCREMENT для таблицы `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `id_order_id_goods`
--
ALTER TABLE `id_order_id_goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=150;
--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
