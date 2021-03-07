-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Хост: localhost
-- Время создания: Мар 04 2021 г., 07:29
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
  `description` text,
  `image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `catalog`
--

INSERT INTO `catalog` (`id`, `name`, `price`, `description`, `image`) VALUES
(1, 'Яблоко', 12, 'Яблоко-плод,который растет на дереве.Очень сочный и вкусный плод.Бывает разных цветов но чаще всего красного и зеленного.Внутри имеются семячки,то что осталось у него от дерева.', ''),
(2, 'Пицца', 24, 'Пи́цца (итал. pizza от итал. pizzicare — быть острым) — итальянское национальное блюдо в виде круглой открытой лепёшки, покрытой в классическом варианте томатами и расплавленным сыром. Сыр является главным ингредиентом пиццы (как правило, моцарелла).', ''),
(3, 'Чай', 1, 'Чёрный чай – максимально ферментированный чайный лист, дающий плотный тёмный настой. Если классифицировать чайные листы для его приготовления от низа стебля до макушки (типсов), то можно встретить следующие обозначения: S – «сушонг» - нижние крупные листья, скрученные по длине;', ''),
(4, 'Арбуз', 20, NULL, NULL),
(5, 'Ананас', 30, NULL, NULL),
(6, 'Киви', 4, NULL, NULL),
(7, 'Банан', 3, NULL, NULL),
(8, 'Абрикос', 3, NULL, NULL),
(9, 'Персик', 16, NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `catalog`
--
ALTER TABLE `catalog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `catalog`
--
ALTER TABLE `catalog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
