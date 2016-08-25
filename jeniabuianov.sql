-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 20, 2016 at 04:26 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jeniabuianov`
--

-- --------------------------------------------------------

--
-- Table structure for table `buianov_admin_email_list`
--

CREATE TABLE `buianov_admin_email_list` (
  `emailID` int(3) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `host` varchar(35) NOT NULL,
  `auth` varchar(4) NOT NULL,
  `port` varchar(4) NOT NULL,
  `isEnabled` int(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buianov_admin_inbox`
--

CREATE TABLE `buianov_admin_inbox` (
  `inboxID` int(255) NOT NULL,
  `emailID` int(3) NOT NULL,
  `isEnabled` int(1) NOT NULL,
  `Seen` int(1) NOT NULL,
  `attach` text NOT NULL,
  `Text` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timeseconds` varchar(15) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `dateRead` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `emailFrom` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buianov_admin_languages`
--

CREATE TABLE `buianov_admin_languages` (
  `languageID` int(3) NOT NULL,
  `languageShort` varchar(3) NOT NULL,
  `languageFull` varchar(25) NOT NULL,
  `Country` varchar(30) NOT NULL,
  `isEnabled` int(1) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateModificated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buianov_admin_languages`
--

INSERT INTO `buianov_admin_languages` (`languageID`, `languageShort`, `languageFull`, `Country`, `isEnabled`, `dateAdded`, `dateModificated`) VALUES
(1, 'ru', 'Русский', 'Russia', 1, '2016-07-18 07:38:43', '0000-00-00 00:00:00'),
(2, 'en', 'English', 'England', 0, '2016-07-18 08:46:56', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `buianov_admin_modules`
--

CREATE TABLE `buianov_admin_modules` (
  `moduleID` int(3) NOT NULL,
  `moduleTitle` varchar(250) NOT NULL,
  `moduleNameLang` varchar(250) NOT NULL COMMENT 'идентификатор названия в таблице переводов',
  `moduleDirectory` varchar(50) NOT NULL COMMENT 'путь на сервере к папке модуля',
  `StartFile` varchar(300) NOT NULL COMMENT 'подключаемый файл(обычно совпадает с moduleTitle)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buianov_admin_modules`
--

INSERT INTO `buianov_admin_modules` (`moduleID`, `moduleTitle`, `moduleNameLang`, `moduleDirectory`, `StartFile`) VALUES
(1, 'homepage', 'homepage', '', ''),
(2, 'projects', 'projects', 'system/projects/', 'projectsClass.php');

-- --------------------------------------------------------

--
-- Table structure for table `buianov_admin_notifications`
--

CREATE TABLE `buianov_admin_notifications` (
  `notificationID` int(255) NOT NULL,
  `notificationTitleLang` varchar(250) NOT NULL,
  `Link` varchar(250) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timeSeconds` varchar(15) NOT NULL,
  `Seen` int(1) NOT NULL,
  `Icon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buianov_admin_sent`
--

CREATE TABLE `buianov_admin_sent` (
  `sentID` int(255) NOT NULL,
  `isEnabled` int(1) NOT NULL,
  `text` text NOT NULL,
  `attach` text NOT NULL,
  `emailTo` varchar(50) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timeSeconds` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `buianov_admin_translation`
--

CREATE TABLE `buianov_admin_translation` (
  `translationID` int(255) NOT NULL,
  `translationTitleLang` varchar(250) NOT NULL,
  `LanguageID` int(3) NOT NULL,
  `text` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timeSeconds` varchar(15) NOT NULL,
  `isEnabled` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buianov_admin_translation`
--

INSERT INTO `buianov_admin_translation` (`translationID`, `translationTitleLang`, `LanguageID`, `text`, `timestamp`, `timeSeconds`, `isEnabled`) VALUES
(1, 'homepage', 1, 'Главная', '2016-07-18 07:39:37', '', 1),
(2, 'projects', 1, 'Проекты', '2016-07-18 07:39:37', '', 1),
(3, 'search', 1, 'Поиск', '2016-07-18 21:44:57', '2613560504', 1),
(4, 'logout', 1, 'Выход', '2016-07-18 21:44:57', '2613560504', 1),
(5, 'NoNotifications', 1, 'Нет оповещений', '2016-07-20 13:34:22', '2613564934', 1);

-- --------------------------------------------------------

--
-- Table structure for table `buianov_blocks`
--

CREATE TABLE `buianov_blocks` (
  `blockID` int(3) NOT NULL,
  `blockLangTitle` varchar(250) NOT NULL COMMENT 'текст в поле языка, идентификатор для данного блока',
  `blockContent` text NOT NULL,
  `isEnabled` int(1) NOT NULL,
  `timeSeconds` varchar(15) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `languageID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `buianov_currency`
--

CREATE TABLE `buianov_currency` (
  `currencyID` int(3) NOT NULL,
  `currencyShortName` varchar(5) NOT NULL,
  `isEnabled` int(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timeSeconds` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `buianov_customers`
--

CREATE TABLE `buianov_customers` (
  `customerID` int(3) NOT NULL,
  `contactID` int(3) NOT NULL,
  `customerName` varchar(20) NOT NULL,
  `projectTitle` varchar(50) NOT NULL,
  `projectID` int(3) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timeSeconds` varchar(15) NOT NULL,
  `price` int(8) NOT NULL,
  `currencyID` int(3) NOT NULL,
  `equalsPrices` text NOT NULL,
  `isEnabled` int(1) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `buianov_errors`
--

CREATE TABLE `buianov_errors` (
  `errorID` int(3) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timeSeconds` varchar(15) NOT NULL,
  `Seen` int(1) NOT NULL,
  `text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `buianov_examples`
--

CREATE TABLE `buianov_examples` (
  `exmpleID` int(3) NOT NULL,
  `projectID` int(3) NOT NULL,
  `Root` varchar(250) NOT NULL COMMENT 'путь к папке проекта на сервере',
  `RootBackup` varchar(250) NOT NULL COMMENT 'путь к файлу бэкапа с бд на сервере',
  `Database` varchar(250) NOT NULL COMMENT 'параметры для создания бд',
  `TempTable` varchar(64) NOT NULL COMMENT 'временное название таблицы создаваемых в бд',
  `isEnabled` int(1) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `timeSeconds` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `buianov_forms`
--

CREATE TABLE `buianov_forms` (
  `formID` int(3) NOT NULL,
  `formLangTitle` varchar(250) NOT NULL,
  `isEnabled` int(1) NOT NULL,
  `timeSeconds` varchar(15) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `formContent` text NOT NULL,
  `languageID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `buianov_languages`
--

CREATE TABLE `buianov_languages` (
  `languageID` int(3) NOT NULL,
  `languageShort` varchar(3) NOT NULL,
  `languageFull` varchar(25) NOT NULL,
  `Country` varchar(30) NOT NULL,
  `isEnabled` int(1) NOT NULL,
  `dateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `dateModificated` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buianov_languages`
--

INSERT INTO `buianov_languages` (`languageID`, `languageShort`, `languageFull`, `Country`, `isEnabled`, `dateAdded`, `dateModificated`) VALUES
(1, 'ru', 'Русский', 'Russia', 1, '2016-07-18 07:38:43', '0000-00-00 00:00:00'),
(2, 'en', 'English', 'England', 0, '2016-07-18 08:46:56', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `buianov_modules`
--

CREATE TABLE `buianov_modules` (
  `moduleID` int(3) NOT NULL,
  `moduleTitle` varchar(250) NOT NULL,
  `moduleNameLang` varchar(250) NOT NULL COMMENT 'идентификатор названия в таблице переводов',
  `moduleDirectory` varchar(50) NOT NULL COMMENT 'путь на сервере к папке модуля',
  `StartFile` varchar(300) NOT NULL COMMENT 'подключаемый файл(обычно совпадает с moduleTitle)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buianov_modules`
--

INSERT INTO `buianov_modules` (`moduleID`, `moduleTitle`, `moduleNameLang`, `moduleDirectory`, `StartFile`) VALUES
(1, 'homepage', 'homepage', '', ''),
(2, 'projects', 'projects', 'system/projects/', 'projectsClass.php');

-- --------------------------------------------------------

--
-- Table structure for table `buianov_orders`
--

CREATE TABLE `buianov_orders` (
  `orderID` int(3) NOT NULL,
  `Name` varchar(25) NOT NULL,
  `Phone` varchar(15) NOT NULL,
  `Category` varchar(30) NOT NULL COMMENT 'название категории в таблице переводов',
  `timeSeconds` varchar(15) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `Email` int(64) NOT NULL,
  `Text` text NOT NULL,
  `Type` varchar(10) NOT NULL COMMENT 'call - заказать звонок, order - заказ',
  `StatusSeen` int(1) NOT NULL COMMENT '1 - просмотрено, 0 не просмотрено',
  `StatusAccepted` int(1) NOT NULL COMMENT '1 - принято, 0 не принято'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `buianov_pages`
--

CREATE TABLE `buianov_pages` (
  `pageID` int(3) NOT NULL,
  `pageLangTitle` varchar(250) NOT NULL,
  `pageURL` varchar(255) NOT NULL,
  `pageLangContent` varchar(250) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timeSeconds` varchar(15) NOT NULL,
  `isEnabled` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `buianov_projectcategories`
--

CREATE TABLE `buianov_projectcategories` (
  `categoryID` int(3) NOT NULL,
  `categoryTitleLang` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isEnabled` int(1) NOT NULL,
  `categoryURL` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `buianov_projects`
--

CREATE TABLE `buianov_projects` (
  `projectID` int(5) NOT NULL,
  `projectLangTitle` varchar(250) NOT NULL,
  `projectLangText` varchar(250) NOT NULL,
  `categoryID` int(3) NOT NULL,
  `timeSeconds` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `timestamp` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `isEnabled` int(1) NOT NULL,
  `projectURL` varchar(255) NOT NULL,
  `linkToView` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `buianov_settings`
--

CREATE TABLE `buianov_settings` (
  `settingID` int(11) NOT NULL,
  `settingName` varchar(255) NOT NULL,
  `settingValue` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `isEnabled` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buianov_settings`
--

INSERT INTO `buianov_settings` (`settingID`, `settingName`, `settingValue`, `timestamp`, `isEnabled`) VALUES
(1, 'homeURL', 'http://localhost:8080/buianov/', '2016-07-18 08:16:01', 1),
(2, 'adminURL', 'http://localhost:8080/buianov/admin/', '2016-07-18 20:23:35', 1),
(3, 'ADMINUSER', 'admin', '2016-07-18 20:23:35', 1),
(4, 'ADMINPASSWORD', 'password', '2016-07-18 20:23:49', 1),
(5, 'SITETITLE', 'Евгений Буянов - WEB разработка, Android приложения, Сведение и создание инструменталов', '2016-07-18 20:53:59', 1),
(6, 'SITEDESCRIPTION', 'Удивляем вместе', '2016-07-18 20:53:59', 1),
(7, 'AMINPANELTITLE', 'AP', '2016-07-18 20:56:56', 1);

-- --------------------------------------------------------

--
-- Table structure for table `buianov_todaycurrency`
--

CREATE TABLE `buianov_todaycurrency` (
  `todayID` int(255) NOT NULL,
  `currencyID` int(3) NOT NULL,
  `valueBuy` varchar(5) NOT NULL,
  `valuePay` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `buianov_translation`
--

CREATE TABLE `buianov_translation` (
  `translationID` int(255) NOT NULL,
  `translationTitleLang` varchar(250) NOT NULL,
  `LanguageID` int(3) NOT NULL,
  `text` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timeSeconds` varchar(15) NOT NULL,
  `isEnabled` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `buianov_translation`
--

INSERT INTO `buianov_translation` (`translationID`, `translationTitleLang`, `LanguageID`, `text`, `timestamp`, `timeSeconds`, `isEnabled`) VALUES
(1, 'homepage', 1, 'Главная', '2016-07-18 07:39:37', '', 1),
(2, 'projects', 1, 'Проекты', '2016-07-18 07:39:37', '', 1);

-- --------------------------------------------------------

--
-- Table structure for table `buianov_visits`
--

CREATE TABLE `buianov_visits` (
  `visitID` int(255) NOT NULL,
  `IP` varchar(20) NOT NULL,
  `visitPage` varchar(255) NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `timeSeconds` varchar(15) NOT NULL,
  `languageID` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `buianov_admin_email_list`
--
ALTER TABLE `buianov_admin_email_list`
  ADD PRIMARY KEY (`emailID`);

--
-- Indexes for table `buianov_admin_inbox`
--
ALTER TABLE `buianov_admin_inbox`
  ADD PRIMARY KEY (`inboxID`);

--
-- Indexes for table `buianov_admin_languages`
--
ALTER TABLE `buianov_admin_languages`
  ADD PRIMARY KEY (`languageID`);

--
-- Indexes for table `buianov_admin_modules`
--
ALTER TABLE `buianov_admin_modules`
  ADD PRIMARY KEY (`moduleID`);

--
-- Indexes for table `buianov_admin_notifications`
--
ALTER TABLE `buianov_admin_notifications`
  ADD PRIMARY KEY (`notificationID`);

--
-- Indexes for table `buianov_admin_sent`
--
ALTER TABLE `buianov_admin_sent`
  ADD PRIMARY KEY (`sentID`);

--
-- Indexes for table `buianov_admin_translation`
--
ALTER TABLE `buianov_admin_translation`
  ADD PRIMARY KEY (`translationID`);

--
-- Indexes for table `buianov_blocks`
--
ALTER TABLE `buianov_blocks`
  ADD PRIMARY KEY (`blockID`);

--
-- Indexes for table `buianov_currency`
--
ALTER TABLE `buianov_currency`
  ADD PRIMARY KEY (`currencyID`);

--
-- Indexes for table `buianov_customers`
--
ALTER TABLE `buianov_customers`
  ADD PRIMARY KEY (`customerID`);

--
-- Indexes for table `buianov_errors`
--
ALTER TABLE `buianov_errors`
  ADD PRIMARY KEY (`errorID`);

--
-- Indexes for table `buianov_examples`
--
ALTER TABLE `buianov_examples`
  ADD PRIMARY KEY (`exmpleID`);

--
-- Indexes for table `buianov_forms`
--
ALTER TABLE `buianov_forms`
  ADD PRIMARY KEY (`formID`);

--
-- Indexes for table `buianov_languages`
--
ALTER TABLE `buianov_languages`
  ADD PRIMARY KEY (`languageID`);

--
-- Indexes for table `buianov_modules`
--
ALTER TABLE `buianov_modules`
  ADD PRIMARY KEY (`moduleID`);

--
-- Indexes for table `buianov_orders`
--
ALTER TABLE `buianov_orders`
  ADD PRIMARY KEY (`orderID`);

--
-- Indexes for table `buianov_pages`
--
ALTER TABLE `buianov_pages`
  ADD PRIMARY KEY (`pageID`);

--
-- Indexes for table `buianov_projectcategories`
--
ALTER TABLE `buianov_projectcategories`
  ADD PRIMARY KEY (`categoryID`);

--
-- Indexes for table `buianov_projects`
--
ALTER TABLE `buianov_projects`
  ADD PRIMARY KEY (`projectID`);

--
-- Indexes for table `buianov_settings`
--
ALTER TABLE `buianov_settings`
  ADD PRIMARY KEY (`settingID`);

--
-- Indexes for table `buianov_todaycurrency`
--
ALTER TABLE `buianov_todaycurrency`
  ADD PRIMARY KEY (`todayID`);

--
-- Indexes for table `buianov_translation`
--
ALTER TABLE `buianov_translation`
  ADD PRIMARY KEY (`translationID`);

--
-- Indexes for table `buianov_visits`
--
ALTER TABLE `buianov_visits`
  ADD PRIMARY KEY (`visitID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `buianov_admin_email_list`
--
ALTER TABLE `buianov_admin_email_list`
  MODIFY `emailID` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `buianov_admin_inbox`
--
ALTER TABLE `buianov_admin_inbox`
  MODIFY `inboxID` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `buianov_admin_languages`
--
ALTER TABLE `buianov_admin_languages`
  MODIFY `languageID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `buianov_admin_modules`
--
ALTER TABLE `buianov_admin_modules`
  MODIFY `moduleID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `buianov_admin_notifications`
--
ALTER TABLE `buianov_admin_notifications`
  MODIFY `notificationID` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `buianov_admin_sent`
--
ALTER TABLE `buianov_admin_sent`
  MODIFY `sentID` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `buianov_admin_translation`
--
ALTER TABLE `buianov_admin_translation`
  MODIFY `translationID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `buianov_blocks`
--
ALTER TABLE `buianov_blocks`
  MODIFY `blockID` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `buianov_currency`
--
ALTER TABLE `buianov_currency`
  MODIFY `currencyID` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `buianov_customers`
--
ALTER TABLE `buianov_customers`
  MODIFY `customerID` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `buianov_errors`
--
ALTER TABLE `buianov_errors`
  MODIFY `errorID` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `buianov_examples`
--
ALTER TABLE `buianov_examples`
  MODIFY `exmpleID` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `buianov_forms`
--
ALTER TABLE `buianov_forms`
  MODIFY `formID` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `buianov_languages`
--
ALTER TABLE `buianov_languages`
  MODIFY `languageID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `buianov_modules`
--
ALTER TABLE `buianov_modules`
  MODIFY `moduleID` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `buianov_orders`
--
ALTER TABLE `buianov_orders`
  MODIFY `orderID` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `buianov_pages`
--
ALTER TABLE `buianov_pages`
  MODIFY `pageID` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `buianov_projectcategories`
--
ALTER TABLE `buianov_projectcategories`
  MODIFY `categoryID` int(3) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `buianov_projects`
--
ALTER TABLE `buianov_projects`
  MODIFY `projectID` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `buianov_settings`
--
ALTER TABLE `buianov_settings`
  MODIFY `settingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `buianov_todaycurrency`
--
ALTER TABLE `buianov_todaycurrency`
  MODIFY `todayID` int(255) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `buianov_translation`
--
ALTER TABLE `buianov_translation`
  MODIFY `translationID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `buianov_visits`
--
ALTER TABLE `buianov_visits`
  MODIFY `visitID` int(255) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
