-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Время создания: Янв 07 2016 г., 17:12
-- Версия сервера: 5.5.25
-- Версия PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `buianov`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admin_top_menu_block`
--


UPDATE `admin_languages` SET `active`='y' WHERE `lang`='English';
UPDATE `admin_version` SET `active`='n';
INSERT INTO `admin_translation`(`lang`,`title`,`text`)VALUES('ru','update 1.0','Вы успешно обновили Адин-панель до версии 1.0');
INSERT INTO `admin_version`(`version`,`active`)VALUES('1','y');
INSERT INTO `admin_notifications`(`val`,`type`,`viewed`,`title_lang`,`icon`,`open_window`)VALUES('6270887151','success','n','update 1.0','fa-bold','upd1');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
