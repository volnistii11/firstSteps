-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Фев 10 2021 г., 12:48
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
-- Структура таблицы `catalog`
--

CREATE TABLE `catalog` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `catalog`
--

INSERT INTO `catalog` (`id`, `name`, `price`, `description`) VALUES
(1, 'Яблоко', 12, 'Яблоко-плод,который растет на дереве.Очень сочный и вкусный плод.Бывает разных цветов но чаще всего красного и зеленного.Внутри имеются семячки,то что осталось у него от дерева.'),
(2, 'Пицца', 24, 'Пи́цца (итал. pizza от итал. pizzicare — быть острым) — итальянское национальное блюдо в виде круглой открытой лепёшки, покрытой в классическом варианте томатами и расплавленным сыром. Сыр является главным ингредиентом пиццы (как правило, моцарелла).'),
(3, 'Чай', 1, 'Чёрный чай – максимально ферментированный чайный лист, дающий плотный тёмный настой. Если классифицировать чайные листы для его приготовления от низа стебля до макушки (типсов), то можно встретить следующие обозначения: S – «сушонг» - нижние крупные листья, скрученные по длине;');

-- --------------------------------------------------------

--
-- Структура таблицы `catalog_feedback`
--

CREATE TABLE `catalog_feedback` (
  `id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `feedback` text NOT NULL,
  `id_catalog` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `catalog_feedback`
--

INSERT INTO `catalog_feedback` (`id`, `author`, `feedback`, `id_catalog`) VALUES
(1, 'Nick', 'Яблоко-плод,который растет на дереве.Очень сочный и вкусный плод.Бывает разных цветов но чаще всего красного и зеленного.Внутри имеются семячки,то что осталось у него от дерева.', 1),
(2, 'кука', 'Пи́цца (итал. pizza от итал. pizzicare — быть острым) — итальянское национальное блюдо в виде круглой открытой лепёшки, покрытой в классическом варианте томатами и расплавленным сыром. Сыр является главным ингредиентом пиццы (как правило, моцарелла).', 2),
(3, 'кек', 'Чёрный чай – максимально ферментированный чайный лист, дающий плотный тёмный настой. Если классифицировать чайные листы для его приготовления от низа стебля до макушки (типсов), то можно встретить следующие обозначения: S – «сушонг» - нижние крупные листья, скрученные по длине;', 3),
(5, 'asdasd', 'asdsada', 3);

-- --------------------------------------------------------

--
-- Структура таблицы `feedback`
--

CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `feedback` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `feedback`) VALUES
(9, 'admin', 'test'),
(10, 'user', 'Привет'),
(11, '&lt;script&gt;', '123'),
(12, 'Петя', 'Как дела'),
(13, 'Петя', 'Как дела2'),
(14, '11', '111'),
(15, 'Новое22', 'сообщение22'),
(18, '312', '123'),
(19, '123', '123');

-- --------------------------------------------------------

--
-- Структура таблицы `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `views` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods`
--

INSERT INTO `goods` (`id`, `name`, `size`, `views`) VALUES
(1, '01.jpg', 111456, 26),
(2, '02.jpg', 70076, 28),
(3, '03.jpg', 70215, 1),
(4, '04.jpg', 61733, 101),
(5, '05.jpg', 160617, 455),
(6, '06.jpg', 89871, 11),
(7, '07.jpg', 99418, 12),
(8, '08.jpg', 103775, 78),
(9, '09.jpg', 81022, 86),
(10, '10.jpg', 97127, 55),
(11, '11.jpg', 98579, 66),
(12, '12.jpg', 139286, 88),
(13, '13.jpg', 113016, 5),
(14, '14.jpg', 151814, 98),
(15, '15.jpg', 112488, 566),
(16, 'abstract-colors-unreal-clouds-1927.jpg', 1216203, 10091),
(17, '111.PNG', 8558, 4);

-- --------------------------------------------------------

--
-- Структура таблицы `goods_feedback`
--

CREATE TABLE `goods_feedback` (
  `f_id` int(11) NOT NULL,
  `f_name` varchar(255) NOT NULL,
  `f_feedback` text NOT NULL,
  `f_id_goods` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `goods_feedback`
--

INSERT INTO `goods_feedback` (`f_id`, `f_name`, `f_feedback`, `f_id_goods`) VALUES
(20, 'dasd', 'asdasd', 16),
(21, 'dasd', 'asdsad', 16),
(22, '', '', 0),
(23, 'asdsa', 'vxcvxcv', 16),
(24, 'gbnhgfj', 'bmvbnm', 16),
(25, 'cxzxzc', 'zxcxzc', 16),
(26, '123', '123sadsd', 16),
(27, '21312', '123213', 16),
(28, '123123', '23132', 0),
(29, '123123', '13123', 16),
(30, '123123', '123123sasa', 16),
(31, 'asdasd', 'asdasd', 16),
(34, 'qqqqqq', 'qqqqqqqq', 16),
(35, '123123ssssssssss', '12312312', 16),
(38, 'asdasdssssss', 'zxczxczxc', 15);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `catalog_feedback`
--
ALTER TABLE `catalog_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `goods_feedback`
--
ALTER TABLE `goods_feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT для таблицы `catalog_feedback`
--
ALTER TABLE `catalog_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT для таблицы `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT для таблицы `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT для таблицы `goods_feedback`
--
ALTER TABLE `goods_feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
