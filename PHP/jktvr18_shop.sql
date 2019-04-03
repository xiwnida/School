-- phpMyAdmin SQL Dump
-- version 4.8.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1
-- Время создания: Апр 03 2019 г., 11:33
-- Версия сервера: 10.1.33-MariaDB
-- Версия PHP: 7.2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `jktvr18_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `idCategory` int(4) NOT NULL,
  `nameCategory` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`idCategory`, `nameCategory`) VALUES
(1, 'одежда'),
(2, 'обувь'),
(3, 'аксессуары');

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE `product` (
  `idProduct` int(11) NOT NULL,
  `nameProduct` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `idCategory` int(11) NOT NULL,
  `idType` int(11) NOT NULL,
  `price` decimal(7,2) NOT NULL,
  `picture` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `product`
--

INSERT INTO `product` (`idProduct`, `nameProduct`, `idCategory`, `idType`, `price`, `picture`) VALUES
(1, 'Короткий свитшот', 1, 1, '20.00', '1.jpg'),
(2, 'Вязаный кардиган', 1, 2, '25.00', '2.jpg'),
(3, 'Рубашка из вискозы с вышивкой', 1, 2, '15.00', '3.jpg'),
(4, 'Свитшот с принтами', 1, 1, '20.00', '4.jpg'),
(5, 'Замшевые кеды', 2, 1, '30.00', '5.jpg'),
(6, 'Шапка', 3, 2, '7.00', '6.jpg'),
(7, 'Ботильоны на молнии', 2, 2, '45.00', '7.jpg'),
(8, 'Ботинки на грубой подошве', 2, 1, '70.00', '8.jpg'),
(9, 'Кожаные перчатки', 3, 1, '15.00', '9.jpg'),
(10, 'Шарф', 3, 2, '12.00', '10.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `productorder`
--

CREATE TABLE `productorder` (
  `idOrder` int(4) NOT NULL,
  `idUser` int(4) NOT NULL,
  `listProduct` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `totalSumma` decimal(11,0) NOT NULL,
  `status` smallint(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `productorder`
--

INSERT INTO `productorder` (`idOrder`, `idUser`, `listProduct`, `date`, `totalSumma`, `status`) VALUES
(1, 18, '$text', '2019-03-28', '100', 1),
(2, 18, '7:1,2:1', '2019-03-28', '70', 1),
(3, 18, '5:1,10:2', '2019-03-28', '54', 1),
(4, 18, '8:1', '2019-03-28', '70', 1),
(5, 19, '8:1', '2019-03-28', '70', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `type`
--

CREATE TABLE `type` (
  `idType` int(4) NOT NULL,
  `nameType` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `type`
--

INSERT INTO `type` (`idType`, `nameType`) VALUES
(1, 'мужчины'),
(2, 'женщины'),
(3, 'дети');

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `idUser` int(11) NOT NULL,
  `nameUser` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `e-mail` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL,
  `pass` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`idUser`, `nameUser`, `e-mail`, `password`, `address`, `status`, `pass`) VALUES
(17, 'qazxswedc', 'qazxswedc@mail.ee', '$2y$10$QoH5vXodxG22R1DE4SwOduaFbg3yl9xiLpghHsISkDcko0zTCTTzO', 'fgjnkyhluyj', 0, '123456'),
(18, 'veera', 'veera96@hotbox.ru', '$2y$10$PrvVlsu4kTkXKZILDw.cE.buK0d.wUJ3Vvma6nUuf7JTGjE3/h3l6', 'ewfewf', 0, 'cntgG123'),
(19, 'lol', 'lol@lol.ru', '$2y$10$v9z9BVWv5BJJ3SqfG/5Z2ucN1rZ0qjgfWs/rPBO4Y0GRuoQon5iZ2', 'lol lol', 0, 'lolol'),
(20, 'admin', 'admin@mail.ru', '$2y$10$S4yPshlnG0OHLH.dbv3qmO9SCUDIIMvXtCeStyndd8KbwY.TiKlEK', 'admin', 1, 'admin');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCategory`);

--
-- Индексы таблицы `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`idProduct`),
  ADD KEY `idCategory` (`idCategory`),
  ADD KEY `idType` (`idType`);

--
-- Индексы таблицы `productorder`
--
ALTER TABLE `productorder`
  ADD PRIMARY KEY (`idOrder`),
  ADD KEY `idUser` (`idUser`);

--
-- Индексы таблицы `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`idType`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD UNIQUE KEY `e-mail` (`e-mail`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `idCategory` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `product`
--
ALTER TABLE `product`
  MODIFY `idProduct` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT для таблицы `productorder`
--
ALTER TABLE `productorder`
  MODIFY `idOrder` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблицы `type`
--
ALTER TABLE `type`
  MODIFY `idType` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`idCategory`) REFERENCES `category` (`idCategory`) ON UPDATE CASCADE,
  ADD CONSTRAINT `product_ibfk_2` FOREIGN KEY (`idType`) REFERENCES `type` (`idType`) ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `productorder`
--
ALTER TABLE `productorder`
  ADD CONSTRAINT `productorder_ibfk_1` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
