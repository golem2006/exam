-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: MySQL-8.2
-- Время создания: Ноя 03 2024 г., 20:34
-- Версия сервера: 8.2.0
-- Версия PHP: 8.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `main`
--

-- --------------------------------------------------------

--
-- Структура таблицы `reg`
--

CREATE TABLE `reg` (
  `pkey` int NOT NULL,
  `logi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `pass` text NOT NULL,
  `fio` text NOT NULL,
  `tel` char(12) NOT NULL,
  `mail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `reg`
--

INSERT INTO `reg` (`pkey`, `logi`, `pass`, `fio`, `tel`, `mail`) VALUES
(1, 'ww', 'wwwwww', 'Виннер Побединский', '79677463432', 'Win@ww.com'),
(2, 'weew', 'dsddddddddddddddddddddd', 'ЫВЫс аы', '89656565', 'ц@d'),
(3, 'w', 'wwwwww', 'Виннер Побединский', '79677463432', 'Win@w.com'),
(4, 'www', 'wwwwwwww', 'Виннер Побединский', '79677463432', 'Win@www.com'),
(5, 'mister', 'wwwwwwww', 'Виннер Побединский', '79677463432', 'coc@23'),
(6, '123', '111111', 'Виннер Побединский', '79671111111', 'Win@w12.com'),
(7, '1233', 'wwwwww', 'Виннер Побединский', '79671111111', 'Win@w123.com'),
(8, 't13', 'wwwwww', 'Уж Кумыс Пон', '79421232123', '1@13'),
(9, 't132', 'wwwwww', 'Уж Кумыс Пон', '79421232123', '1@132'),
(10, '12311', 'wwwwww', 'Виннер Побединский', '79671111111', 'Win@w112.com'),
(11, 't12', 'wwwwww', 'Уж Кумыс Пон', '79421232123', '1@12'),
(12, 'q', 'qqqqqq', 'Уж Кумыс Пон', '79421232123', 'q@q'),
(13, 'user1', '123123', 'Андрей Ноунейм', '79421232123', 'w@w'),
(14, 'user2', '123123', 'Виннер Побединский', '79671111111', 'Win@w12312.com'),
(15, 't121', '123123', 'Уж Кумыс Пон', '79421232123', '1@1212'),
(16, '1234', 'KrytGrytToZovich', 'Крут Грут Зович', '78653415647', 'ezo4kaEz@gmail.com'),
(17, 'niktar', 'qwerty', 'ник', '79321232312', 'Nik@tar'),
(18, 'NiKtar', 'qwerty', 'Гог', '78923913123', 'r@r');

-- --------------------------------------------------------

--
-- Структура таблицы `zayav`
--

CREATE TABLE `zayav` (
  `pkey` int NOT NULL,
  `fio` text NOT NULL,
  `descr` text NOT NULL,
  `num` text NOT NULL,
  `statu` text CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `logi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `zayav`
--

INSERT INTO `zayav` (`pkey`, `fio`, `descr`, `num`, `statu`, `logi`) VALUES
(1, 'Ва ыф в', 'цвцу', 'цу23цу', 'Отклонено', ''),
(2, 'Array', 'eewrr', '123we2', 'Подтверждено', ''),
(3, 'Array', 'desc', '123434', 'Отклонено', ''),
(4, 'Array', '12312313', '12312313131', 'Отклонено', ''),
(5, 'Андрей Ноунейм', '12312313', '12312313131', 'Отклонено', ''),
(6, 'Андрей Ноунейм', '12', '13', 'Подтверждено', ''),
(7, 'Виннер Побединский', '12', '13', 'Отклонено', ''),
(8, 'Виннер Побединский', '535', '453', 'Отклонено', ''),
(9, 'Виннер Побединский', '123123', 'v343vc', 'Отклонено', ''),
(10, 'Виннер Побединский', 't555ttttttttttt', 't5t5t', 'Отклонено', 'user2'),
(11, 'Виннер Побединский', 'Проехал на красный цвет.', 'р453пк', 'Подтверждено', 'w'),
(12, 'Виннер Побединский', 'lolollolo', '1wsw21', 'Отклонено', 'w'),
(13, 'Крут Грут Зович', 'KrytGrytToZovich', '1234', 'Подтверждено', '1234'),
(14, 'ник', '_..----.._\r\n    _-&#039;_..----.._&#039;-_\r\n  .&#039;.  \\       ( `&#039;.&#039;.\r\n / / `\\ `\\       )  \\ \\\r\n| |   _`\\ `\\____(    | |\r\n| |  [__]_\\ `\\__()   | |\r\n| |        `\\ `\\     | |\r\n \\ \\         `\\ `\\  / /\r\n  &#039;.&#039;-._       `\\ `&#039;.&#039;\r\n    `-._`&#039;----&#039;`_.-&#039;\r\n        `&quot;----&quot;`', '23WWW3', 'Подтверждено', 'NiKtar'),
(15, 'ник', '_..----.._\r\n    _-&#039;_..----.._&#039;-_\r\n  .&#039;.  \\       ( `&#039;.&#039;.\r\n / / `\\ `\\       )  \\ \\\r\n| |   _`\\ `\\____(    | |\r\n| |  [__]_\\ `\\__()   | |\r\n| |        `\\ `\\     | |\r\n \\ \\         `\\ `\\  / /\r\n  &#039;.&#039;-._       `\\ `&#039;.&#039;\r\n    `-._`&#039;----&#039;`_.-&#039;\r\n        `&quot;----&quot;`', '23WWW3', 'Отклонено', 'NiKtar');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `reg`
--
ALTER TABLE `reg`
  ADD PRIMARY KEY (`pkey`);

--
-- Индексы таблицы `zayav`
--
ALTER TABLE `zayav`
  ADD PRIMARY KEY (`pkey`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
