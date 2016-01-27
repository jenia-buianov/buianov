DROP TABLE admin_blocks;

CREATE TABLE `admin_blocks` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `title_lang` varchar(100) NOT NULL,
  `text_lang` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL,
  `icon` varchar(500) NOT NULL,
  `href` varchar(500) NOT NULL,
  `orders` varchar(5) NOT NULL,
  `system` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

INSERT INTO admin_blocks VALUES("1","home","","modules","fa-home","","1","y");
INSERT INTO admin_blocks VALUES("2","pages","","modules","fa-files-o","pages","2","y");
INSERT INTO admin_blocks VALUES("3","statistic","","modules","fa-bar-chart-o","statistic","3","y");
INSERT INTO admin_blocks VALUES("4","users","","modules","fa-user","users","5","y");
INSERT INTO admin_blocks VALUES("5","admin users","","modules","fa-check","admin_users","4","y");
INSERT INTO admin_blocks VALUES("7","widgets","","apps","fa-briefcase","widgets","","y");
INSERT INTO admin_blocks VALUES("8","plugins","","apps","fa-headphones","plugins","","y");
INSERT INTO admin_blocks VALUES("9","calendar","","apps","fa-calendar","calendar","","y");
INSERT INTO admin_blocks VALUES("10","todo","","apps","fa-pencil-square-o","todo","","y");
INSERT INTO admin_blocks VALUES("11","inbox","","apps","fa-inbox","inbox","","y");
INSERT INTO admin_blocks VALUES("12","admin templates","","templates","fa-book","templates","","y");
INSERT INTO admin_blocks VALUES("13","messages templates","","templates","fa-file-o","messages_templates","","y");
INSERT INTO admin_blocks VALUES("14","write admin","","templates","fa-bold","contacts","","y");
INSERT INTO admin_blocks VALUES("15","chat","","apps","fa-star","chat","","y");



DROP TABLE admin_calendar;

CREATE TABLE `admin_calendar` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `uid` int(3) NOT NULL,
  `private` varchar(1) NOT NULL,
  `title_lang` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE admin_chat;

CREATE TABLE `admin_chat` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `viewed` varchar(1) NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL,
  `time` varchar(10) NOT NULL,
  `from` varchar(50) NOT NULL,
  `to` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

INSERT INTO admin_chat VALUES("1","y","Test First Message","2016-01-05","10:00:00","Алексей Кобзев","chatroom");
INSERT INTO admin_chat VALUES("2","y","Второй тест","2016-01-05","11:00:00","Евгений Кучерук","chatroom");
INSERT INTO admin_chat VALUES("3","y","Test Second Message","2016-01-05","12:00:00","Алексей Кобзев","chatroom");
INSERT INTO admin_chat VALUES("4","y","Test Second Message","2016-01-05","12:00:00","Алексей Кобзев","chatroom");
INSERT INTO admin_chat VALUES("5","y","Test Second Message","2016-01-05","12:00:00","Алексей Кобзев","chatroom");
INSERT INTO admin_chat VALUES("6","y","Test Second Message","2016-01-05","12:00:00","Алексей Кобзев","chatroom");
INSERT INTO admin_chat VALUES("7","y","hsjfhkjshdfk jshf kjhsjkf nskjh fkhsdj","2016-01-06","14:34:31","chatroom","Алексей Кобзев");
INSERT INTO admin_chat VALUES("8","y","Sending message &lt;a href=&quot;http://google.com&quot;&gt;lnk&lt;/a&gt;","2016-01-06","14:38:44","chatroom","Евгений Кучерук");
INSERT INTO admin_chat VALUES("9","y","А где первый тест","2016-01-06","14:39:27","chatroom","Евгений Кучерук");
INSERT INTO admin_chat VALUES("10","y","там, далеко!","2016-01-06","14:39:40","chatroom","Евгений Кучерук");
INSERT INTO admin_chat VALUES("11","n","SEnd my message","2016-01-06","15:27:11","chatroom","Евгений Кучерук");
INSERT INTO admin_chat VALUES("12","y","Test Second Message","2016-01-05","12:00:00","Алексей Кобзев","chatroom");
INSERT INTO admin_chat VALUES("13","y","Второй тест","2016-01-05","11:00:00","Евгений Кучерук","chatroom");



DROP TABLE admin_code;

CREATE TABLE `admin_code` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(10) NOT NULL,
  `ip` varchar(10) NOT NULL,
  `session` varchar(10) NOT NULL,
  `uid` int(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

INSERT INTO admin_code VALUES("1","Z52Z14QK5","0000-00-00","","127.0.0.1","","0");
INSERT INTO admin_code VALUES("2","AHO5SK2P","0000-00-00","","127.0.0.1","XIX9DZFNH9","1");
INSERT INTO admin_code VALUES("3","5AT3TB1KJ","0000-00-00","","127.0.0.1","","0");
INSERT INTO admin_code VALUES("4","C2DXME350","0000-00-00","","127.0.0.1","8OEVNOPH45","1");
INSERT INTO admin_code VALUES("5","9YI85A1MNG","0000-00-00","","127.0.0.1","MW9L78N07U","1");
INSERT INTO admin_code VALUES("6","TCOBUKWZ9F","0000-00-00","","127.0.0.1","","0");
INSERT INTO admin_code VALUES("7","V2CLKDFUN4","0000-00-00","","127.0.0.1","P3JPWXYBBH","1");
INSERT INTO admin_code VALUES("8","AUDCUJ73","2015-12-22","","127.0.0.1","4UXMUYME","0");
INSERT INTO admin_code VALUES("9","WSOJMWED","2015-12-22","","127.0.0.1","BN367FEH","1");
INSERT INTO admin_code VALUES("10","KWDWB7BBE1","2015-12-22","","127.0.0.1","BI6BT1B4LQ","1");
INSERT INTO admin_code VALUES("11","JFHLMQNT83","2015-12-22","","127.0.0.1","PJ593F11","1");
INSERT INTO admin_code VALUES("12","14HXDRXO","2015-12-23","","127.0.0.1","42DF9KEJ","1");
INSERT INTO admin_code VALUES("13","0AJ514I95","2015-12-23","","127.0.0.1","L71XGJPY","1");
INSERT INTO admin_code VALUES("14","PB9EM4WKD9","2015-12-25","","127.0.0.1","C8MZHYII","1");
INSERT INTO admin_code VALUES("15","XH10XH5KEX","2015-12-28","","127.0.0.1","O5C40H48Z4","1");
INSERT INTO admin_code VALUES("16","GLVL1K16OX","2015-12-29","","127.0.0.1","FXW2EOLV3","1");
INSERT INTO admin_code VALUES("17","D40VXCOO","2016-01-02","","127.0.0.1","D8KHI5Q8M4","1");
INSERT INTO admin_code VALUES("18","5VQD64DS1","2016-01-03","","127.0.0.1","N3EQMCDSXG","1");
INSERT INTO admin_code VALUES("19","PUQIVARU9C","2016-01-03","","127.0.0.1","UO3EAK96S","1");
INSERT INTO admin_code VALUES("20","VW05Y7E8JA","2016-01-03","","127.0.0.1","5TS208S0","1");
INSERT INTO admin_code VALUES("21","5AT3TB1KJ","2016-01-03","","127.0.0.1","","1");
INSERT INTO admin_code VALUES("22","0GVEX14HY","2016-01-03","","127.0.0.1","","1");
INSERT INTO admin_code VALUES("23","GAY3HU47Z","2016-01-03","","127.0.0.1","17F2EQS5X3","1");
INSERT INTO admin_code VALUES("24","NUYL9F1JO8","2016-01-03","","127.0.0.1","","1");
INSERT INTO admin_code VALUES("25","5SEN39WC","2016-01-03","","127.0.0.1","5CHXZ3U8A","1");
INSERT INTO admin_code VALUES("26","X0LGKLOR3W","2016-01-03","","127.0.0.1","OIN35M2BHV","1");
INSERT INTO admin_code VALUES("27","1H7R11G74","2016-01-03","","127.0.0.1","","1");
INSERT INTO admin_code VALUES("28","0SKK8P0H","2016-01-03","","127.0.0.1","","5");
INSERT INTO admin_code VALUES("29","WNIEQ9SAI","2016-01-03","","127.0.0.1","WNIEQ9SAI","5");
INSERT INTO admin_code VALUES("30","N743F5RAX","2016-01-04","","127.0.0.1","","1");
INSERT INTO admin_code VALUES("31","GHMKVAQBW","2016-01-04","","127.0.0.1","","1");
INSERT INTO admin_code VALUES("32","UVLFFPVJT","2016-01-04","","127.0.0.1","42OAYRGJU","1");
INSERT INTO admin_code VALUES("33","GJKYMWE8","2016-01-04","","127.0.0.1","GJKYMWE8","5");
INSERT INTO admin_code VALUES("34","7T9HONUYP","2016-01-04","","127.0.0.1","7T9HONUYP","5");
INSERT INTO admin_code VALUES("35","L154FZF4","2016-01-04","","127.0.0.1","L154FZF4","5");
INSERT INTO admin_code VALUES("36","71WJQTUB4","2016-01-04","","127.0.0.1","71WJQTUB4","5");
INSERT INTO admin_code VALUES("37","WF6R6GIKZ","2016-01-04","","127.0.0.1","WF6R6GIKZ","5");
INSERT INTO admin_code VALUES("38","V4DZKAID50","2016-01-05","","127.0.0.1","V4DZKAID50","1");



DROP TABLE admin_inbox;

CREATE TABLE `admin_inbox` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `from` varchar(255) NOT NULL,
  `to` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(10) NOT NULL,
  `message` text NOT NULL,
  `attachaments` text NOT NULL,
  `folder` int(3) NOT NULL,
  `email_id` int(3) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `viewed` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE admin_inbox_folders;

CREATE TABLE `admin_inbox_folders` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `email_id` int(3) NOT NULL,
  `folder_title` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE admin_inbox_list;

CREATE TABLE `admin_inbox_list` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `email` varchar(255) NOT NULL,
  `password` varchar(30) NOT NULL,
  `host` varchar(255) NOT NULL,
  `port` varchar(3) NOT NULL,
  `auth` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE admin_languages;

CREATE TABLE `admin_languages` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `lang` varchar(30) NOT NULL,
  `active` varchar(1) NOT NULL,
  `abb` varchar(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO admin_languages VALUES("1","Русский","y","ru");
INSERT INTO admin_languages VALUES("2","English","y","en");



DROP TABLE admin_notifications;

CREATE TABLE `admin_notifications` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `viewed` varchar(1) NOT NULL,
  `title_lang` varchar(100) NOT NULL,
  `icon` varchar(100) NOT NULL,
  `type` varchar(10) NOT NULL,
  `open_window` varchar(500) NOT NULL,
  `val` varchar(10) NOT NULL,
  `time` varchar(10) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

INSERT INTO admin_notifications VALUES("2","n","another_page_added","fa-files-o","info","http://localhost/buianov/another_page","6270809128","02:14:44","2015-12-28");
INSERT INTO admin_notifications VALUES("6","n","another_page_edited","fa-files-o","info","http://localhost/buianov/another_page","6270809519","03:19:55","2015-12-28");
INSERT INTO admin_notifications VALUES("8","n","second_page_edited","fa-files-o","info","http://localhost/buianov/second_page","6270809554","03:25:40","2015-12-28");
INSERT INTO admin_notifications VALUES("9","n","second_page_edited","fa-files-o","info","http://localhost/buianov/second_page","6270809555","03:25:58","2015-12-28");
INSERT INTO admin_notifications VALUES("13","n","new_page_edited","fa-files-o","info","http://localhost/buianov/new_page","6270809655","03:42:35","2015-12-28");
INSERT INTO admin_notifications VALUES("16","n","jenia_added","fa-user","info","http://localhost/buianov/jenia","6270814216","16:22:45","2015-12-28");
INSERT INTO admin_notifications VALUES("17","n","page_a_added","fa-files-o","info","http://localhost/buianov/page_a","6270814223","16:23:52","2015-12-28");
INSERT INTO admin_notifications VALUES("21","n","jenia_edited","fa-arrow-up","info","http://localhost/buianov/jenia","6270822617","15:42:51","2015-12-29");
INSERT INTO admin_notifications VALUES("22","n","new_o_added","fa-files-o","info","http://localhost/buianov/new_o","6270822650","15:48:25","2015-12-29");
INSERT INTO admin_notifications VALUES("25","n","left_block_added","fa-chevron-left","info","http://localhost/buianov/left_block","6270856589","14:04:50","2016-01-03");
INSERT INTO admin_notifications VALUES("26","n","_edited","fa-arrow-up","info","http://localhost/buianov/","6270864824","12:57:25","2016-01-04");
INSERT INTO admin_notifications VALUES("27","n","admin_edited","fa-lock","info","http://localhost/buianov/admin","6270864923","13:13:53","2016-01-04");
INSERT INTO admin_notifications VALUES("28","n","jenia_edited","fa-user","info","http://localhost/buianov/jenia","6270864999","13:26:30","2016-01-04");
INSERT INTO admin_notifications VALUES("30","n","avaliable new version","fa-upload","danger","upd","6270887151","02:58:30","2016-01-07");
INSERT INTO admin_notifications VALUES("31","n","update 1.0","fa-bold","success","upd1","6270887151","","0000-00-00");



DROP TABLE admin_pages;

CREATE TABLE `admin_pages` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `title_lang` varchar(100) NOT NULL,
  `text_lang` varchar(100) NOT NULL,
  `page` varchar(256) NOT NULL,
  `showed` varchar(1) NOT NULL,
  `sending` varchar(1) NOT NULL,
  `include_file` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

INSERT INTO admin_pages VALUES("1","home","","home","y","n","home.php");
INSERT INTO admin_pages VALUES("2","pages","","pages","y","n","pages.php");
INSERT INTO admin_pages VALUES("3","statistic","","statistic","y","n","statistic.php");
INSERT INTO admin_pages VALUES("4","pages","","pages","y","n","pages.php");
INSERT INTO admin_pages VALUES("5","statistic","","statistic","y","n","statistic.php");
INSERT INTO admin_pages VALUES("6","pages","","pages","y","n","pages.php");
INSERT INTO admin_pages VALUES("7","statistic","","statistic","y","n","statistic.php");
INSERT INTO admin_pages VALUES("8","","","add_page","y","","add_page.php");
INSERT INTO admin_pages VALUES("9","edit_page","","edit_page","y","n","edit_page.php");
INSERT INTO admin_pages VALUES("10","admin users","","admin_users","y","n","admin_users.php");
INSERT INTO admin_pages VALUES("11","","","add_admin_user","y","n","add_admin_user.php");
INSERT INTO admin_pages VALUES("12","","","edit_admin_user","y","n","edit_admin_user.php");
INSERT INTO admin_pages VALUES("13","settings","","settings","y","n","settings.php");
INSERT INTO admin_pages VALUES("14","","","settings/left","y","n","left.php");
INSERT INTO admin_pages VALUES("15","","","add_left","y","n","add_left.php");
INSERT INTO admin_pages VALUES("16","","","settings/language","y","n","language.php");
INSERT INTO admin_pages VALUES("17","","","settings/security","y","n","security.php");
INSERT INTO admin_pages VALUES("18","","","logout","n","n","");
INSERT INTO admin_pages VALUES("19","","","follow_lnk","n","n","follow_lnk.php");
INSERT INTO admin_pages VALUES("20","","","contacts","y","n","contacts.php");
INSERT INTO admin_pages VALUES("21","","","chat","y","n","chat.php");
INSERT INTO admin_pages VALUES("22","","","settings/backup","y","n","backup.php");



DROP TABLE admin_plugins;

CREATE TABLE `admin_plugins` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `title_lang` varchar(100) NOT NULL,
  `text_lang` varchar(100) NOT NULL,
  `connected` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE admin_poup;

CREATE TABLE `admin_poup` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `page` varchar(100) NOT NULL,
  `poup_id` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE admin_poup_content;

CREATE TABLE `admin_poup_content` (
  `id` int(3) NOT NULL,
  `title_lang` varchar(100) NOT NULL,
  `text_lang` varchar(100) NOT NULL,
  `include_file` varchar(100) NOT NULL,
  `refresh` varchar(5) NOT NULL,
  `color` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE admin_right;

CREATE TABLE `admin_right` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `title_lang` varchar(100) NOT NULL,
  `include_file` varchar(500) NOT NULL,
  `pr` int(3) NOT NULL,
  `type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE admin_session;

CREATE TABLE `admin_session` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `ip` varchar(25) NOT NULL,
  `page` varchar(500) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(10) NOT NULL,
  `code` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE admin_settings;

CREATE TABLE `admin_settings` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `value` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO admin_settings VALUES("1","Admin Panel \"Buianov.ru\"");



DROP TABLE admin_todo;

CREATE TABLE `admin_todo` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title_lang` varchar(100) NOT NULL,
  `done` varchar(1) NOT NULL,
  `date` date NOT NULL,
  `time` varchar(10) NOT NULL,
  `description_lang` varchar(100) NOT NULL,
  `time_period` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE admin_top_menu;

CREATE TABLE `admin_top_menu` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `title_lang` varchar(100) NOT NULL,
  `href` text NOT NULL,
  `separated` varchar(1) NOT NULL,
  `order` int(3) NOT NULL,
  `block_id` int(11) NOT NULL,
  `bl` int(3) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO admin_top_menu VALUES("1","top_menu1","","","1","0","1");
INSERT INTO admin_top_menu VALUES("2","top_menu2","","","1","0","1");
INSERT INTO admin_top_menu VALUES("3","top_menu3","","","1","1","1");



DROP TABLE admin_top_menu_block;

CREATE TABLE `admin_top_menu_block` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `title_lang` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO admin_top_menu_block VALUES("1","first");



DROP TABLE admin_translation;

CREATE TABLE `admin_translation` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `lang` varchar(3) NOT NULL,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=281 DEFAULT CHARSET=utf8;

INSERT INTO admin_translation VALUES("1","ru","first","Верхнее меню");
INSERT INTO admin_translation VALUES("2","ru","top_menu1","Первый блок");
INSERT INTO admin_translation VALUES("3","ru","top_menu2","Второй блок");
INSERT INTO admin_translation VALUES("4","ru","top_menu3","Элемент блока");
INSERT INTO admin_translation VALUES("5","ru","search","Поиск");
INSERT INTO admin_translation VALUES("6","ru","search_advanced","Расширенный поиск");
INSERT INTO admin_translation VALUES("7","ru","add","Добавить");
INSERT INTO admin_translation VALUES("8","ru","users","Пользователи");
INSERT INTO admin_translation VALUES("9","ru","inbox","Почта");
INSERT INTO admin_translation VALUES("10","ru","inbox","Почта");
INSERT INTO admin_translation VALUES("11","ru","chat","Чат");
INSERT INTO admin_translation VALUES("12","ru","settings","Настройки");
INSERT INTO admin_translation VALUES("13","ru","plugins","Плагины");
INSERT INTO admin_translation VALUES("14","ru","notification","Оповещения");
INSERT INTO admin_translation VALUES("15","ru","all_notifications","Просмотреть все оповещения");
INSERT INTO admin_translation VALUES("16","ru","welcome","Здравствуйте");
INSERT INTO admin_translation VALUES("17","ru","modules","Блоки");
INSERT INTO admin_translation VALUES("18","ru","apps","Доп. функции");
INSERT INTO admin_translation VALUES("19","ru","templates","Шаблоны");
INSERT INTO admin_translation VALUES("21","ru","home","Главная");
INSERT INTO admin_translation VALUES("22","ru","pages","Страницы");
INSERT INTO admin_translation VALUES("23","ru","statistic","Статистика");
INSERT INTO admin_translation VALUES("24","ru","no_notifications","Нет оповещений");
INSERT INTO admin_translation VALUES("25","ru","minutes","минут");
INSERT INTO admin_translation VALUES("26","ru","ago","назад");
INSERT INTO admin_translation VALUES("27","ru","secundes","секунд");
INSERT INTO admin_translation VALUES("28","ru","hours","часов");
INSERT INTO admin_translation VALUES("29","ru","no_widget","Виджеты не подключены");
INSERT INTO admin_translation VALUES("30","ru","right_settings","Настроить правую панель");
INSERT INTO admin_translation VALUES("31","ru","admin users","Админ пользователи");
INSERT INTO admin_translation VALUES("33","ru","widgets","Виджеты");
INSERT INTO admin_translation VALUES("34","ru","calendar","Ежедневник");
INSERT INTO admin_translation VALUES("35","ru","todo","Задачи");
INSERT INTO admin_translation VALUES("36","ru","messages templates","Шаблоны сообщений");
INSERT INTO admin_translation VALUES("37","ru","admin templates","Шаблоны админ-панели");
INSERT INTO admin_translation VALUES("38","ru","write admin","Написать администратору");
INSERT INTO admin_translation VALUES("40","ru","page search","Поиск по страницам");
INSERT INTO admin_translation VALUES("41","ru","nothing found","Ничего не найдено");
INSERT INTO admin_translation VALUES("45","ru","title page","Название страницы");
INSERT INTO admin_translation VALUES("46","ru","page","Страница");
INSERT INTO admin_translation VALUES("47","ru","edit","Редактировать");
INSERT INTO admin_translation VALUES("48","ru","delete","Удалить");
INSERT INTO admin_translation VALUES("49","ru","add_page","Добавить страницу");
INSERT INTO admin_translation VALUES("50","ru","shown","Видима");
INSERT INTO admin_translation VALUES("51","ru","yes","Да");
INSERT INTO admin_translation VALUES("52","ru","no","Нет");
INSERT INTO admin_translation VALUES("54","ru","adding page","Добавление страницы");
INSERT INTO admin_translation VALUES("90","ru","page text","Полный текст");
INSERT INTO admin_translation VALUES("91","ru","visible","Доступна пользователям");
INSERT INTO admin_translation VALUES("92","ru","not found","не указаны");
INSERT INTO admin_translation VALUES("93","ru","not visible","Не доступна");
INSERT INTO admin_translation VALUES("94","ru","page added","Страница успешно добалвенна");
INSERT INTO admin_translation VALUES("95","ru","error added","Ошибка добавления");
INSERT INTO admin_translation VALUES("98","ru","editing page","Редактирование страницы");
INSERT INTO admin_translation VALUES("99","ru","page edited","Страница успешно измененна");
INSERT INTO admin_translation VALUES("100","ru","error edited","Ошибка редактирования");
INSERT INTO admin_translation VALUES("101","ru","edit","Изменить");
INSERT INTO admin_translation VALUES("105","ru","second_page_added","Страница успешно добалвенна <b>Название второй страницы</b>");
INSERT INTO admin_translation VALUES("108","ru","second_page_added","Страница успешно добалвенна <b>Название второй страницы</b>");
INSERT INTO admin_translation VALUES("110","ru","another_page_added","Страница успешно добалвенна <b>Третья страница</b>");
INSERT INTO admin_translation VALUES("115","ru","pages added","Страница успешно добаленна");
INSERT INTO admin_translation VALUES("116","ru","pages edited","Страница успешно измененна");
INSERT INTO admin_translation VALUES("117","ru","another_page_edited","Страница успешно измененна <b>Третья страница</b>");
INSERT INTO admin_translation VALUES("120","ru","another_page_edited","Страница успешно измененна <b>Третья страница</b>");
INSERT INTO admin_translation VALUES("122","ru","another_page_edited","Страница успешно измененна <b>Третья страница</b>");
INSERT INTO admin_translation VALUES("124","ru","another_page_edited","Страница успешно измененна <b>Третья страница</b>");
INSERT INTO admin_translation VALUES("129","ru","second_page_edited","Страница успешно измененна <b>Название второй страницы</b>");
INSERT INTO admin_translation VALUES("131","en","second_page_edited","Initial-scale=1, minimum-scale=1, width=device-width <b>Second page title</b>");
INSERT INTO admin_translation VALUES("132","ru","second_page_edited","Страница успешно измененна <b>Название второй страницы</b>");
INSERT INTO admin_translation VALUES("133","en","second_page_edited","Initial-scale=1, minimum-scale=1, width=device-width <b>Second page title</b>");
INSERT INTO admin_translation VALUES("146","ru","new_page_edited","Страница успешно измененна <b>Третья страница  2</b>");
INSERT INTO admin_translation VALUES("147","ru","security","Безопасность");
INSERT INTO admin_translation VALUES("148","ru","sing out","Выход");
INSERT INTO admin_translation VALUES("149","ru","name","Имя и Фамилия");
INSERT INTO admin_translation VALUES("150","ru","login","Логин");
INSERT INTO admin_translation VALUES("151","ru","email","E-mail");
INSERT INTO admin_translation VALUES("152","ru","group","Группа");
INSERT INTO admin_translation VALUES("153","ru","language","Язык");
INSERT INTO admin_translation VALUES("155","ru","adding admin user","Добавление админ пользователя");
INSERT INTO admin_translation VALUES("156","ru","password","Пароль");
INSERT INTO admin_translation VALUES("158","ru","admin user added","Админ пользователь успешно добавлен");
INSERT INTO admin_translation VALUES("159","ru","admin_users added","Админ пользователь успешно добавлен");
INSERT INTO admin_translation VALUES("167","ru","jenia_added","Админ пользователь успешно добавлен <b>jenia</b>");
INSERT INTO admin_translation VALUES("170","ru","page_a_added","Страница успешно добаленна <b>Название страницы А</b>");
INSERT INTO admin_translation VALUES("173","ru","editing admin user","Редактирование админ пользователей");
INSERT INTO admin_translation VALUES("174","ru","admin user edited","Админ пользователь успешно отредактирован");
INSERT INTO admin_translation VALUES("175","ru","admin_users edited","Админ пользователь успешно отредактирован");
INSERT INTO admin_translation VALUES("181","ru","jenia_edited","Админ пользователь успешно отредактирован <b>jenia</b>");
INSERT INTO admin_translation VALUES("182","ru","new_o_added","Страница успешно добаленна <b>лыфыврлоралорывлоар</b>");
INSERT INTO admin_translation VALUES("183","en","Страница успешно добаленна <b>лыфыврлоралорывлоар</b> added","Initial-scale=1, minimum-scale=1, width=device-width");
INSERT INTO admin_translation VALUES("184","en","new_o_added","Initial-scale=1, minimum-scale=1, width=device-width <b>Enjasdhkjsa</b>");
INSERT INTO admin_translation VALUES("185","ru","new_o_edited","Страница успешно измененна <b>лыфыврлоралорывлоар</b>");
INSERT INTO admin_translation VALUES("186","ru","left_menu","Левое меню");
INSERT INTO admin_translation VALUES("187","ru","params","Переменные");
INSERT INTO admin_translation VALUES("188","ru","left_menu","Левое меню");
INSERT INTO admin_translation VALUES("189","ru","params","Переменные");
INSERT INTO admin_translation VALUES("190","ru","profile","Профиль");
INSERT INTO admin_translation VALUES("191","ru","Securiry","Безопасность");
INSERT INTO admin_translation VALUES("192","ru","right_menu","Правое меню");
INSERT INTO admin_translation VALUES("193","ru","panels","Панели");
INSERT INTO admin_translation VALUES("194","ru","top_menu","Верхнее меню");
INSERT INTO admin_translation VALUES("196","ru","title","Название");
INSERT INTO admin_translation VALUES("197","ru","href","Ссылка");
INSERT INTO admin_translation VALUES("198","ru","icon","Иконка");
INSERT INTO admin_translation VALUES("199","ru","adding left","Левая панель");
INSERT INTO admin_translation VALUES("200","ru","left added","Добавлено в левую панель");
INSERT INTO admin_translation VALUES("201","ru","admin_blocks added","Initial-scale=1, minimum-scale=1, width=device-width");
INSERT INTO admin_translation VALUES("202","ru","left_block4516_added","Initial-scale=1, minimum-scale=1, width=device-width <b>Левый блок</b>");
INSERT INTO admin_translation VALUES("203","en","Initial-scale=1, minimum-scale=1, width=device-width <b>Левый блок</b> added","Initial-scale=1, minimum-scale=1, width=device-width");
INSERT INTO admin_translation VALUES("204","en","left_block4516_added","Initial-scale=1, minimum-scale=1, width=device-width <b>First Left Block</b>");
INSERT INTO admin_translation VALUES("205","ru","left_block4516","Initial-scale=1, minimum-scale=1, width=device-width");
INSERT INTO admin_translation VALUES("206","ru","admin_blocks added","В левую панель добавлена");
INSERT INTO admin_translation VALUES("215","ru","left_block","Левый блок");
INSERT INTO admin_translation VALUES("216","en","left_block","Left block");
INSERT INTO admin_translation VALUES("217","ru","left_block_added","Initial-scale=1, minimum-scale=1, width=device-width <b>Пробный блок</b>");
INSERT INTO admin_translation VALUES("218","en","Initial-scale=1, minimum-scale=1, width=device-width <b>Пробный блок</b> added","Initial-scale=1, minimum-scale=1, width=device-width");
INSERT INTO admin_translation VALUES("219","en","left_block_added","Initial-scale=1, minimum-scale=1, width=device-width <b>First Left block</b>");
INSERT INTO admin_translation VALUES("220","ru","backup","Back Up");
INSERT INTO admin_translation VALUES("221","ru","enter","Вход");
INSERT INTO admin_translation VALUES("222","ru","code_send","Код входа выслан вам на e-mail. У вас есть 5 минут для входа с данным кодом.");
INSERT INTO admin_translation VALUES("223","ru","code","Код");
INSERT INTO admin_translation VALUES("224","ru","enter error","Логин или пароль не верны");
INSERT INTO admin_translation VALUES("225","ru","code_en","Код входа");
INSERT INTO admin_translation VALUES("226","ru","thank_lang","Благодарим вас за использование услуг \"BUIANOV\"!");
INSERT INTO admin_translation VALUES("227","ru","code_ap","Ваш код для входа в админ-панель:");
INSERT INTO admin_translation VALUES("230","ru","ok_send_code","Отправлять код безопасности для входа в админ-панель");
INSERT INTO admin_translation VALUES("231","ru","no_send_code","НЕ отправлять код безопасности для входа в админ-панель");
INSERT INTO admin_translation VALUES("232","ru","snd_code","Отправка кода безопасности");
INSERT INTO admin_translation VALUES("233","ru","_edited","Админ пользователь успешно отредактирован <b></b>");
INSERT INTO admin_translation VALUES("234","ru","_edited","Админ пользователь успешно отредактирован <b></b>");
INSERT INTO admin_translation VALUES("235","ru","admin_edited","Админ пользователь успешно отредактирован <b>admin</b>");
INSERT INTO admin_translation VALUES("236","ru","admin_edited","Админ пользователь успешно отредактирован <b>admin</b>");
INSERT INTO admin_translation VALUES("237","ru","admin_edited","Админ пользователь успешно отредактирован <b>admin</b>");
INSERT INTO admin_translation VALUES("238","ru","change_pass","Изменить пароль входа");
INSERT INTO admin_translation VALUES("239","ru","change pass","Initial-scale=1, minimum-scale=1, width=device-width");
INSERT INTO admin_translation VALUES("240","ru","jenia_edited","Админ пользователь успешно отредактирован <b>jenia</b>");
INSERT INTO admin_translation VALUES("241","ru","code was send","На ваш E-mail было отправлено письмо.");
INSERT INTO admin_translation VALUES("242","ru","error send code","Ошибка отправки письма на E-mail");
INSERT INTO admin_translation VALUES("243","ru","code_sec","Код безопасности");
INSERT INTO admin_translation VALUES("244","ru","follow link","Пожалуйста пройдите по ссылке чтобы изменить пароль для входа в админ-панель");
INSERT INTO admin_translation VALUES("245","ru","old pass","Старый пароль");
INSERT INTO admin_translation VALUES("246","ru","new password","Новый пароль");
INSERT INTO admin_translation VALUES("247","ru","repeat password","Повторите пароль");
INSERT INTO admin_translation VALUES("248","ru","menu","Меню");
INSERT INTO admin_translation VALUES("249","ru","right_panel","Правая панель");
INSERT INTO admin_translation VALUES("250","ru","subject","Тема письма");
INSERT INTO admin_translation VALUES("251","ru","find error","Сообщить об ошибке");
INSERT INTO admin_translation VALUES("252","ru ","make order","Заказать услуги");
INSERT INTO admin_translation VALUES("253","ru","other subject","Другое");
INSERT INTO admin_translation VALUES("254","ru","from company","от лица компании");
INSERT INTO admin_translation VALUES("255","ru","by myself","личное письмо");
INSERT INTO admin_translation VALUES("257","ru","message from","Письмо от");
INSERT INTO admin_translation VALUES("258","ru","message","Текст письма");
INSERT INTO admin_translation VALUES("259","ru","send message","Отправить");
INSERT INTO admin_translation VALUES("260","ru","enter error","Ошибка входа");
INSERT INTO admin_translation VALUES("261","ru","active chats","Активные чаты");
INSERT INTO admin_translation VALUES("263","ru","select chat user","Пожалуйста, выберите пользователя из активных чатов");
INSERT INTO admin_translation VALUES("264","ru","enter message","Пожалуйста, введите сообщение");
INSERT INTO admin_translation VALUES("265","ru","enter username","Пожалуйста, введите имя пользователя");
INSERT INTO admin_translation VALUES("266","ru","no chat","Вы еще не общались с данным пользователем");
INSERT INTO admin_translation VALUES("267","ru","no found","Ничего не найдено");
INSERT INTO admin_translation VALUES("268","ru","create backup","Создать back up  версию");
INSERT INTO admin_translation VALUES("269","ru","was created backup","Была создана backup версия ");
INSERT INTO admin_translation VALUES("270","ru","close","ЗАКРЫТЬ ОКНО");
INSERT INTO admin_translation VALUES("271","ru","version admin panel","Версия Админ-панели");
INSERT INTO admin_translation VALUES("272","ru","use backup","Восстановить");
INSERT INTO admin_translation VALUES("277","ru","avaliable new version","Доступна новая версия");
INSERT INTO admin_translation VALUES("278","ru","update","Обновление");



DROP TABLE admin_users;

CREATE TABLE `admin_users` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `user` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `group` varchar(10) NOT NULL,
  `name` varchar(40) NOT NULL,
  `lang` varchar(3) NOT NULL,
  `send_code` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO admin_users VALUES("1","admin","password","jenia.don.bosco@gmail.com","Admin","Eugen Buianov","ru","n");
INSERT INTO admin_users VALUES("5","jenia","user","jeniabuianov@gmail.com","Moder","Евгений Буянов","ru","n");



DROP TABLE admin_version;

CREATE TABLE `admin_version` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `version` varchar(5) NOT NULL,
  `backup_folder` varchar(100) NOT NULL,
  `active` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

INSERT INTO admin_version VALUES("1","0","","n");
INSERT INTO admin_version VALUES("30","1","","y");



DROP TABLE avaliable_adminpanel;

CREATE TABLE `avaliable_adminpanel` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `version` varchar(10) NOT NULL,
  `install_path` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE icons;

CREATE TABLE `icons` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `class` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=817 DEFAULT CHARSET=utf8;

INSERT INTO icons VALUES("1"," bluetooth");
INSERT INTO icons VALUES("2"," bluetooth-b");
INSERT INTO icons VALUES("3"," codiepie");
INSERT INTO icons VALUES("4"," credit-card-alt");
INSERT INTO icons VALUES("5"," edge");
INSERT INTO icons VALUES("6","fort-awesome");
INSERT INTO icons VALUES("7"," hashtag");
INSERT INTO icons VALUES("8"," mixcloud");
INSERT INTO icons VALUES("9"," modx");
INSERT INTO icons VALUES("10"," pause-circle");
INSERT INTO icons VALUES("11"," pause-circle-o");
INSERT INTO icons VALUES("12"," percent");
INSERT INTO icons VALUES("13"," product-hunt");
INSERT INTO icons VALUES("14"," reddit-alien");
INSERT INTO icons VALUES("15"," scribd");
INSERT INTO icons VALUES("16"," shopping-bag");
INSERT INTO icons VALUES("17"," shopping-basket");
INSERT INTO icons VALUES("18"," stop-circle");
INSERT INTO icons VALUES("19"," stop-circle-o");
INSERT INTO icons VALUES("20"," usb");
INSERT INTO icons VALUES("21"," adjust");
INSERT INTO icons VALUES("22"," anchor");
INSERT INTO icons VALUES("23"," archive");
INSERT INTO icons VALUES("24"," area-chart");
INSERT INTO icons VALUES("25"," arrows");
INSERT INTO icons VALUES("26"," arrows-h");
INSERT INTO icons VALUES("27"," arrows-v");
INSERT INTO icons VALUES("28"," asterisk");
INSERT INTO icons VALUES("29"," at");
INSERT INTO icons VALUES("30"," automobile ");
INSERT INTO icons VALUES("31"," balance-scale");
INSERT INTO icons VALUES("32"," ban");
INSERT INTO icons VALUES("33"," bank ");
INSERT INTO icons VALUES("34"," bar-chart");
INSERT INTO icons VALUES("35"," bar-chart-o ");
INSERT INTO icons VALUES("36"," barcode");
INSERT INTO icons VALUES("37"," bars");
INSERT INTO icons VALUES("38"," battery-0 ");
INSERT INTO icons VALUES("39"," battery-1 ");
INSERT INTO icons VALUES("40"," battery-2 ");
INSERT INTO icons VALUES("41"," battery-3 ");
INSERT INTO icons VALUES("42"," battery-4 ");
INSERT INTO icons VALUES("43"," battery-empty");
INSERT INTO icons VALUES("44"," battery-full");
INSERT INTO icons VALUES("45"," battery-half");
INSERT INTO icons VALUES("46"," battery-quarter");
INSERT INTO icons VALUES("47"," battery-three-quarters");
INSERT INTO icons VALUES("48"," bed");
INSERT INTO icons VALUES("49"," beer");
INSERT INTO icons VALUES("50"," bell");
INSERT INTO icons VALUES("51"," bell-o");
INSERT INTO icons VALUES("52"," bell-slash");
INSERT INTO icons VALUES("53"," bell-slash-o");
INSERT INTO icons VALUES("54"," bicycle");
INSERT INTO icons VALUES("55"," binoculars");
INSERT INTO icons VALUES("56"," birthday-cake");
INSERT INTO icons VALUES("57"," bluetooth");
INSERT INTO icons VALUES("58"," bluetooth-b");
INSERT INTO icons VALUES("59"," bolt");
INSERT INTO icons VALUES("60"," bomb");
INSERT INTO icons VALUES("61"," book");
INSERT INTO icons VALUES("62"," bookmark");
INSERT INTO icons VALUES("63"," bookmark-o");
INSERT INTO icons VALUES("64"," briefcase");
INSERT INTO icons VALUES("65"," bug");
INSERT INTO icons VALUES("66"," building");
INSERT INTO icons VALUES("67"," building-o");
INSERT INTO icons VALUES("68"," bullhorn");
INSERT INTO icons VALUES("69"," bullseye");
INSERT INTO icons VALUES("70"," bus");
INSERT INTO icons VALUES("71"," cab ");
INSERT INTO icons VALUES("72"," calculator");
INSERT INTO icons VALUES("73"," calendar");
INSERT INTO icons VALUES("74"," calendar-check-o");
INSERT INTO icons VALUES("75"," calendar-minus-o");
INSERT INTO icons VALUES("76"," calendar-o");
INSERT INTO icons VALUES("77"," calendar-plus-o");
INSERT INTO icons VALUES("78"," calendar-times-o");
INSERT INTO icons VALUES("79"," camera");
INSERT INTO icons VALUES("80"," camera-retro");
INSERT INTO icons VALUES("81"," car");
INSERT INTO icons VALUES("82"," caret-square-o-down");
INSERT INTO icons VALUES("83"," caret-square-o-left");
INSERT INTO icons VALUES("84"," caret-square-o-right");
INSERT INTO icons VALUES("85"," caret-square-o-up");
INSERT INTO icons VALUES("86"," cart-arrow-down");
INSERT INTO icons VALUES("87"," cart-plus");
INSERT INTO icons VALUES("88"," cc");
INSERT INTO icons VALUES("89"," certificate");
INSERT INTO icons VALUES("90"," check");
INSERT INTO icons VALUES("91"," check-circle");
INSERT INTO icons VALUES("92"," check-circle-o");
INSERT INTO icons VALUES("93"," check-square");
INSERT INTO icons VALUES("94"," check-square-o");
INSERT INTO icons VALUES("95"," child");
INSERT INTO icons VALUES("96"," circle");
INSERT INTO icons VALUES("97"," circle-o");
INSERT INTO icons VALUES("98"," circle-o-notch");
INSERT INTO icons VALUES("99"," circle-thin");
INSERT INTO icons VALUES("100"," clock-o");
INSERT INTO icons VALUES("101"," clone");
INSERT INTO icons VALUES("102"," close ");
INSERT INTO icons VALUES("103"," cloud");
INSERT INTO icons VALUES("104"," cloud-download");
INSERT INTO icons VALUES("105"," cloud-upload");
INSERT INTO icons VALUES("106"," code");
INSERT INTO icons VALUES("107"," code-fork");
INSERT INTO icons VALUES("108"," coffee");
INSERT INTO icons VALUES("109"," cog");
INSERT INTO icons VALUES("110"," cogs");
INSERT INTO icons VALUES("111"," comment");
INSERT INTO icons VALUES("112"," comment-o");
INSERT INTO icons VALUES("113"," commenting");
INSERT INTO icons VALUES("114"," commenting-o");
INSERT INTO icons VALUES("115"," comments");
INSERT INTO icons VALUES("116"," comments-o");
INSERT INTO icons VALUES("117"," compass");
INSERT INTO icons VALUES("118"," copyright");
INSERT INTO icons VALUES("119"," creative-commons");
INSERT INTO icons VALUES("120"," credit-card");
INSERT INTO icons VALUES("121"," credit-card-alt");
INSERT INTO icons VALUES("122"," crop");
INSERT INTO icons VALUES("123"," crosshairs");
INSERT INTO icons VALUES("124"," cube");
INSERT INTO icons VALUES("125"," cubes");
INSERT INTO icons VALUES("126"," cutlery");
INSERT INTO icons VALUES("127"," dashboard ");
INSERT INTO icons VALUES("128"," database");
INSERT INTO icons VALUES("129"," desktop");
INSERT INTO icons VALUES("130"," diamond");
INSERT INTO icons VALUES("131"," dot-circle-o");
INSERT INTO icons VALUES("132"," download");
INSERT INTO icons VALUES("133"," edit ");
INSERT INTO icons VALUES("134"," ellipsis-h");
INSERT INTO icons VALUES("135"," ellipsis-v");
INSERT INTO icons VALUES("136"," envelope");
INSERT INTO icons VALUES("137"," envelope-o");
INSERT INTO icons VALUES("138"," envelope-square");
INSERT INTO icons VALUES("139"," eraser");
INSERT INTO icons VALUES("140"," exchange");
INSERT INTO icons VALUES("141"," exclamation");
INSERT INTO icons VALUES("142"," exclamation-circle");
INSERT INTO icons VALUES("143"," exclamation-triangle");
INSERT INTO icons VALUES("144"," external-link");
INSERT INTO icons VALUES("145"," external-link-square");
INSERT INTO icons VALUES("146"," eye");
INSERT INTO icons VALUES("147"," eye-slash");
INSERT INTO icons VALUES("148"," eyedropper");
INSERT INTO icons VALUES("149"," fax");
INSERT INTO icons VALUES("150"," feed ");
INSERT INTO icons VALUES("151"," female");
INSERT INTO icons VALUES("152"," fighter-jet");
INSERT INTO icons VALUES("153"," file-archive-o");
INSERT INTO icons VALUES("154"," file-audio-o");
INSERT INTO icons VALUES("155"," file-code-o");
INSERT INTO icons VALUES("156"," file-excel-o");
INSERT INTO icons VALUES("157"," file-image-o");
INSERT INTO icons VALUES("158"," file-movie-o ");
INSERT INTO icons VALUES("159"," file-pdf-o");
INSERT INTO icons VALUES("160"," file-photo-o ");
INSERT INTO icons VALUES("161"," file-picture-o ");
INSERT INTO icons VALUES("162"," file-powerpoint-o");
INSERT INTO icons VALUES("163"," file-sound-o ");
INSERT INTO icons VALUES("164"," file-video-o");
INSERT INTO icons VALUES("165"," file-word-o");
INSERT INTO icons VALUES("166"," file-zip-o ");
INSERT INTO icons VALUES("167"," film");
INSERT INTO icons VALUES("168"," filter");
INSERT INTO icons VALUES("169"," fire");
INSERT INTO icons VALUES("170"," fire-extinguisher");
INSERT INTO icons VALUES("171"," flag");
INSERT INTO icons VALUES("172"," flag-checkered");
INSERT INTO icons VALUES("173"," flag-o");
INSERT INTO icons VALUES("174"," flash ");
INSERT INTO icons VALUES("175"," flask");
INSERT INTO icons VALUES("176"," folder");
INSERT INTO icons VALUES("177"," folder-o");
INSERT INTO icons VALUES("178"," folder-open");
INSERT INTO icons VALUES("179"," folder-open-o");
INSERT INTO icons VALUES("180"," frown-o");
INSERT INTO icons VALUES("181"," futbol-o");
INSERT INTO icons VALUES("182"," gamepad");
INSERT INTO icons VALUES("183"," gavel");
INSERT INTO icons VALUES("184"," gear ");
INSERT INTO icons VALUES("185"," gears ");
INSERT INTO icons VALUES("186"," gift");
INSERT INTO icons VALUES("187"," glass");
INSERT INTO icons VALUES("188"," globe");
INSERT INTO icons VALUES("189"," graduation-cap");
INSERT INTO icons VALUES("190"," group ");
INSERT INTO icons VALUES("191"," hand-grab-o ");
INSERT INTO icons VALUES("192"," hand-lizard-o");
INSERT INTO icons VALUES("193"," hand-paper-o");
INSERT INTO icons VALUES("194"," hand-peace-o");
INSERT INTO icons VALUES("195"," hand-pointer-o");
INSERT INTO icons VALUES("196"," hand-rock-o");
INSERT INTO icons VALUES("197"," hand-scissors-o");
INSERT INTO icons VALUES("198"," hand-spock-o");
INSERT INTO icons VALUES("199"," hand-stop-o ");
INSERT INTO icons VALUES("200"," hashtag");
INSERT INTO icons VALUES("201"," hdd-o");
INSERT INTO icons VALUES("202"," headphones");
INSERT INTO icons VALUES("203"," heart");
INSERT INTO icons VALUES("204"," heart-o");
INSERT INTO icons VALUES("205"," heartbeat");
INSERT INTO icons VALUES("206"," history");
INSERT INTO icons VALUES("207"," home");
INSERT INTO icons VALUES("208"," hotel ");
INSERT INTO icons VALUES("209"," hourglass");
INSERT INTO icons VALUES("210"," hourglass-1 ");
INSERT INTO icons VALUES("211"," hourglass-2 ");
INSERT INTO icons VALUES("212"," hourglass-3 ");
INSERT INTO icons VALUES("213"," hourglass-end");
INSERT INTO icons VALUES("214"," hourglass-half");
INSERT INTO icons VALUES("215"," hourglass-o");
INSERT INTO icons VALUES("216"," hourglass-start");
INSERT INTO icons VALUES("217"," i-cursor");
INSERT INTO icons VALUES("218"," image ");
INSERT INTO icons VALUES("219"," inbox");
INSERT INTO icons VALUES("220"," industry");
INSERT INTO icons VALUES("221"," info");
INSERT INTO icons VALUES("222"," info-circle");
INSERT INTO icons VALUES("223"," institution ");
INSERT INTO icons VALUES("224"," key");
INSERT INTO icons VALUES("225"," keyboard-o");
INSERT INTO icons VALUES("226"," language");
INSERT INTO icons VALUES("227"," laptop");
INSERT INTO icons VALUES("228"," leaf");
INSERT INTO icons VALUES("229"," legal ");
INSERT INTO icons VALUES("230"," lemon-o");
INSERT INTO icons VALUES("231"," level-down");
INSERT INTO icons VALUES("232"," level-up");
INSERT INTO icons VALUES("233"," life-bouy ");
INSERT INTO icons VALUES("234"," life-buoy ");
INSERT INTO icons VALUES("235"," life-ring");
INSERT INTO icons VALUES("236"," life-saver ");
INSERT INTO icons VALUES("237"," lightbulb-o");
INSERT INTO icons VALUES("238"," line-chart");
INSERT INTO icons VALUES("239"," location-arrow");
INSERT INTO icons VALUES("240"," lock");
INSERT INTO icons VALUES("241"," magic");
INSERT INTO icons VALUES("242"," magnet");
INSERT INTO icons VALUES("243"," mail-forward ");
INSERT INTO icons VALUES("244"," mail-reply ");
INSERT INTO icons VALUES("245"," mail-reply-all ");
INSERT INTO icons VALUES("246"," male");
INSERT INTO icons VALUES("247"," map");
INSERT INTO icons VALUES("248"," map-marker");
INSERT INTO icons VALUES("249"," map-o");
INSERT INTO icons VALUES("250"," map-pin");
INSERT INTO icons VALUES("251"," map-signs");
INSERT INTO icons VALUES("252"," meh-o");
INSERT INTO icons VALUES("253"," microphone");
INSERT INTO icons VALUES("254"," microphone-slash");
INSERT INTO icons VALUES("255"," minus");
INSERT INTO icons VALUES("256"," minus-circle");
INSERT INTO icons VALUES("257"," minus-square");
INSERT INTO icons VALUES("258"," minus-square-o");
INSERT INTO icons VALUES("259"," mobile");
INSERT INTO icons VALUES("260"," mobile-phone ");
INSERT INTO icons VALUES("261"," money");
INSERT INTO icons VALUES("262"," moon-o");
INSERT INTO icons VALUES("263"," mortar-board ");
INSERT INTO icons VALUES("264"," motorcycle");
INSERT INTO icons VALUES("265"," mouse-pointer");
INSERT INTO icons VALUES("266"," music");
INSERT INTO icons VALUES("267"," navicon ");
INSERT INTO icons VALUES("268"," newspaper-o");
INSERT INTO icons VALUES("269"," object-group");
INSERT INTO icons VALUES("270"," object-ungroup");
INSERT INTO icons VALUES("271"," paint-brush");
INSERT INTO icons VALUES("272"," paper-plane");
INSERT INTO icons VALUES("273"," paper-plane-o");
INSERT INTO icons VALUES("274"," paw");
INSERT INTO icons VALUES("275"," pencil");
INSERT INTO icons VALUES("276"," pencil-square");
INSERT INTO icons VALUES("277"," pencil-square-o");
INSERT INTO icons VALUES("278"," percent");
INSERT INTO icons VALUES("279"," phone");
INSERT INTO icons VALUES("280"," phone-square");
INSERT INTO icons VALUES("281"," photo ");
INSERT INTO icons VALUES("282"," picture-o");
INSERT INTO icons VALUES("283"," pie-chart");
INSERT INTO icons VALUES("284"," plane");
INSERT INTO icons VALUES("285"," plug");
INSERT INTO icons VALUES("286"," plus");
INSERT INTO icons VALUES("287"," plus-circle");
INSERT INTO icons VALUES("288"," plus-square");
INSERT INTO icons VALUES("289"," plus-square-o");
INSERT INTO icons VALUES("290"," power-off");
INSERT INTO icons VALUES("291"," print");
INSERT INTO icons VALUES("292"," puzzle-piece");
INSERT INTO icons VALUES("293"," qrcode");
INSERT INTO icons VALUES("294"," question");
INSERT INTO icons VALUES("295"," question-circle");
INSERT INTO icons VALUES("296"," quote-left");
INSERT INTO icons VALUES("297"," quote-right");
INSERT INTO icons VALUES("298"," random");
INSERT INTO icons VALUES("299"," recycle");
INSERT INTO icons VALUES("300"," refresh");
INSERT INTO icons VALUES("301"," registered");
INSERT INTO icons VALUES("302"," remove ");
INSERT INTO icons VALUES("303"," reorder ");
INSERT INTO icons VALUES("304"," reply");
INSERT INTO icons VALUES("305"," reply-all");
INSERT INTO icons VALUES("306"," retweet");
INSERT INTO icons VALUES("307"," road");
INSERT INTO icons VALUES("308"," rocket");
INSERT INTO icons VALUES("309"," rss");
INSERT INTO icons VALUES("310"," rss-square");
INSERT INTO icons VALUES("311"," search");
INSERT INTO icons VALUES("312"," search-minus");
INSERT INTO icons VALUES("313"," search-plus");
INSERT INTO icons VALUES("314"," send ");
INSERT INTO icons VALUES("315"," send-o ");
INSERT INTO icons VALUES("316"," server");
INSERT INTO icons VALUES("317"," share");
INSERT INTO icons VALUES("318"," share-alt");
INSERT INTO icons VALUES("319"," share-alt-square");
INSERT INTO icons VALUES("320"," share-square");
INSERT INTO icons VALUES("321"," share-square-o");
INSERT INTO icons VALUES("322"," shield");
INSERT INTO icons VALUES("323"," ship");
INSERT INTO icons VALUES("324"," shopping-bag");
INSERT INTO icons VALUES("325"," shopping-basket");
INSERT INTO icons VALUES("326"," shopping-cart");
INSERT INTO icons VALUES("327"," sign-in");
INSERT INTO icons VALUES("328"," sign-out");
INSERT INTO icons VALUES("329"," signal");
INSERT INTO icons VALUES("330"," sitemap");
INSERT INTO icons VALUES("331"," sliders");
INSERT INTO icons VALUES("332"," smile-o");
INSERT INTO icons VALUES("333"," soccer-ball-o ");
INSERT INTO icons VALUES("334"," sort");
INSERT INTO icons VALUES("335"," sort-alpha-asc");
INSERT INTO icons VALUES("336"," sort-alpha-desc");
INSERT INTO icons VALUES("337"," sort-amount-asc");
INSERT INTO icons VALUES("338"," sort-amount-desc");
INSERT INTO icons VALUES("339"," sort-asc");
INSERT INTO icons VALUES("340"," sort-desc");
INSERT INTO icons VALUES("341"," sort-down ");
INSERT INTO icons VALUES("342"," sort-numeric-asc");
INSERT INTO icons VALUES("343"," sort-numeric-desc");
INSERT INTO icons VALUES("344"," sort-up ");
INSERT INTO icons VALUES("345"," space-shuttle");
INSERT INTO icons VALUES("346"," spinner");
INSERT INTO icons VALUES("347"," spoon");
INSERT INTO icons VALUES("348"," square");
INSERT INTO icons VALUES("349"," square-o");
INSERT INTO icons VALUES("350"," star");
INSERT INTO icons VALUES("351"," star-half");
INSERT INTO icons VALUES("352"," star-half-empty ");
INSERT INTO icons VALUES("353"," star-half-full ");
INSERT INTO icons VALUES("354"," star-half-o");
INSERT INTO icons VALUES("355"," star-o");
INSERT INTO icons VALUES("356"," sticky-note");
INSERT INTO icons VALUES("357"," sticky-note-o");
INSERT INTO icons VALUES("358"," street-view");
INSERT INTO icons VALUES("359"," suitcase");
INSERT INTO icons VALUES("360"," sun-o");
INSERT INTO icons VALUES("361"," support ");
INSERT INTO icons VALUES("362"," tablet");
INSERT INTO icons VALUES("363"," tachometer");
INSERT INTO icons VALUES("364"," tag");
INSERT INTO icons VALUES("365"," tags");
INSERT INTO icons VALUES("366"," tasks");
INSERT INTO icons VALUES("367"," taxi");
INSERT INTO icons VALUES("368"," television");
INSERT INTO icons VALUES("369"," terminal");
INSERT INTO icons VALUES("370"," thumb-tack");
INSERT INTO icons VALUES("371"," thumbs-down");
INSERT INTO icons VALUES("372"," thumbs-o-down");
INSERT INTO icons VALUES("373"," thumbs-o-up");
INSERT INTO icons VALUES("374"," thumbs-up");
INSERT INTO icons VALUES("375"," ticket");
INSERT INTO icons VALUES("376"," times");
INSERT INTO icons VALUES("377"," times-circle");
INSERT INTO icons VALUES("378"," times-circle-o");
INSERT INTO icons VALUES("379"," tint");
INSERT INTO icons VALUES("380"," toggle-down ");
INSERT INTO icons VALUES("381"," toggle-left ");
INSERT INTO icons VALUES("382"," toggle-off");
INSERT INTO icons VALUES("383"," toggle-on");
INSERT INTO icons VALUES("384"," toggle-right ");
INSERT INTO icons VALUES("385"," toggle-up ");
INSERT INTO icons VALUES("386"," trademark");
INSERT INTO icons VALUES("387"," trash");
INSERT INTO icons VALUES("388"," trash-o");
INSERT INTO icons VALUES("389"," tree");
INSERT INTO icons VALUES("390"," trophy");
INSERT INTO icons VALUES("391"," truck");
INSERT INTO icons VALUES("392"," tty");
INSERT INTO icons VALUES("393"," tv ");
INSERT INTO icons VALUES("394"," umbrella");
INSERT INTO icons VALUES("395"," university");
INSERT INTO icons VALUES("396"," unlock");
INSERT INTO icons VALUES("397"," unlock-alt");
INSERT INTO icons VALUES("398"," unsorted ");
INSERT INTO icons VALUES("399"," upload");
INSERT INTO icons VALUES("400"," user");
INSERT INTO icons VALUES("401"," user-plus");
INSERT INTO icons VALUES("402"," user-secret");
INSERT INTO icons VALUES("403"," user-times");
INSERT INTO icons VALUES("404"," users");
INSERT INTO icons VALUES("405"," video-camera");
INSERT INTO icons VALUES("406"," volume-down");
INSERT INTO icons VALUES("407"," volume-off");
INSERT INTO icons VALUES("408"," volume-up");
INSERT INTO icons VALUES("409"," warning ");
INSERT INTO icons VALUES("410"," wheelchair");
INSERT INTO icons VALUES("411"," wifi");
INSERT INTO icons VALUES("412"," wrench");
INSERT INTO icons VALUES("413"," hand-grab-o ");
INSERT INTO icons VALUES("414"," hand-lizard-o");
INSERT INTO icons VALUES("415"," hand-o-down");
INSERT INTO icons VALUES("416"," hand-o-left");
INSERT INTO icons VALUES("417"," hand-o-right");
INSERT INTO icons VALUES("418"," hand-o-up");
INSERT INTO icons VALUES("419"," hand-paper-o");
INSERT INTO icons VALUES("420"," hand-peace-o");
INSERT INTO icons VALUES("421"," hand-pointer-o");
INSERT INTO icons VALUES("422"," hand-rock-o");
INSERT INTO icons VALUES("423"," hand-scissors-o");
INSERT INTO icons VALUES("424"," hand-spock-o");
INSERT INTO icons VALUES("425"," hand-stop-o ");
INSERT INTO icons VALUES("426"," thumbs-down");
INSERT INTO icons VALUES("427"," thumbs-o-down");
INSERT INTO icons VALUES("428"," thumbs-o-up");
INSERT INTO icons VALUES("429"," thumbs-up");
INSERT INTO icons VALUES("430"," ambulance");
INSERT INTO icons VALUES("431"," automobile ");
INSERT INTO icons VALUES("432"," bicycle");
INSERT INTO icons VALUES("433"," bus");
INSERT INTO icons VALUES("434"," cab ");
INSERT INTO icons VALUES("435"," car");
INSERT INTO icons VALUES("436"," fighter-jet");
INSERT INTO icons VALUES("437"," motorcycle");
INSERT INTO icons VALUES("438"," plane");
INSERT INTO icons VALUES("439"," rocket");
INSERT INTO icons VALUES("440"," ship");
INSERT INTO icons VALUES("441"," space-shuttle");
INSERT INTO icons VALUES("442"," subway");
INSERT INTO icons VALUES("443"," taxi");
INSERT INTO icons VALUES("444"," train");
INSERT INTO icons VALUES("445"," truck");
INSERT INTO icons VALUES("446"," wheelchair");
INSERT INTO icons VALUES("447"," genderless");
INSERT INTO icons VALUES("448"," intersex ");
INSERT INTO icons VALUES("449"," mars");
INSERT INTO icons VALUES("450"," mars-double");
INSERT INTO icons VALUES("451"," mars-stroke");
INSERT INTO icons VALUES("452"," mars-stroke-h");
INSERT INTO icons VALUES("453"," mars-stroke-v");
INSERT INTO icons VALUES("454"," mercury");
INSERT INTO icons VALUES("455"," neuter");
INSERT INTO icons VALUES("456"," transgender");
INSERT INTO icons VALUES("457"," transgender-alt");
INSERT INTO icons VALUES("458"," venus");
INSERT INTO icons VALUES("459"," venus-double");
INSERT INTO icons VALUES("460"," venus-mars");
INSERT INTO icons VALUES("461"," file");
INSERT INTO icons VALUES("462"," file-archive-o");
INSERT INTO icons VALUES("463"," file-audio-o");
INSERT INTO icons VALUES("464"," file-code-o");
INSERT INTO icons VALUES("465"," file-excel-o");
INSERT INTO icons VALUES("466"," file-image-o");
INSERT INTO icons VALUES("467"," file-movie-o ");
INSERT INTO icons VALUES("468"," file-o");
INSERT INTO icons VALUES("469"," file-pdf-o");
INSERT INTO icons VALUES("470"," file-photo-o ");
INSERT INTO icons VALUES("471"," file-picture-o ");
INSERT INTO icons VALUES("472"," file-powerpoint-o");
INSERT INTO icons VALUES("473"," file-sound-o ");
INSERT INTO icons VALUES("474"," file-text");
INSERT INTO icons VALUES("475"," file-text-o");
INSERT INTO icons VALUES("476"," file-video-o");
INSERT INTO icons VALUES("477"," file-word-o");
INSERT INTO icons VALUES("478"," file-zip-o ");
INSERT INTO icons VALUES("479"," circle-o-notch");
INSERT INTO icons VALUES("480"," cog");
INSERT INTO icons VALUES("481"," gear ");
INSERT INTO icons VALUES("482"," refresh");
INSERT INTO icons VALUES("483"," spinner");
INSERT INTO icons VALUES("484"," check-square");
INSERT INTO icons VALUES("485"," check-square-o");
INSERT INTO icons VALUES("486"," circle");
INSERT INTO icons VALUES("487"," circle-o");
INSERT INTO icons VALUES("488"," dot-circle-o");
INSERT INTO icons VALUES("489"," minus-square");
INSERT INTO icons VALUES("490"," minus-square-o");
INSERT INTO icons VALUES("491"," plus-square");
INSERT INTO icons VALUES("492"," plus-square-o");
INSERT INTO icons VALUES("493"," square");
INSERT INTO icons VALUES("494"," square-o");
INSERT INTO icons VALUES("495"," cc-amex");
INSERT INTO icons VALUES("496"," cc-diners-club");
INSERT INTO icons VALUES("497"," cc-discover");
INSERT INTO icons VALUES("498"," cc-jcb");
INSERT INTO icons VALUES("499"," cc-mastercard");
INSERT INTO icons VALUES("500"," cc-paypal");
INSERT INTO icons VALUES("501"," cc-stripe");
INSERT INTO icons VALUES("502"," cc-visa");
INSERT INTO icons VALUES("503"," credit-card");
INSERT INTO icons VALUES("504"," credit-card-alt");
INSERT INTO icons VALUES("505"," google-wallet");
INSERT INTO icons VALUES("506"," paypal");
INSERT INTO icons VALUES("507"," area-chart");
INSERT INTO icons VALUES("508"," bar-chart");
INSERT INTO icons VALUES("509"," bar-chart-o ");
INSERT INTO icons VALUES("510"," line-chart");
INSERT INTO icons VALUES("511"," pie-chart");
INSERT INTO icons VALUES("512"," bitcoin ");
INSERT INTO icons VALUES("513"," btc");
INSERT INTO icons VALUES("514"," cny ");
INSERT INTO icons VALUES("515"," dollar ");
INSERT INTO icons VALUES("516"," eur");
INSERT INTO icons VALUES("517"," euro ");
INSERT INTO icons VALUES("518"," gbp");
INSERT INTO icons VALUES("519"," gg");
INSERT INTO icons VALUES("520"," gg-circle");
INSERT INTO icons VALUES("521"," ils");
INSERT INTO icons VALUES("522"," inr");
INSERT INTO icons VALUES("523"," jpy");
INSERT INTO icons VALUES("524"," krw");
INSERT INTO icons VALUES("525"," money");
INSERT INTO icons VALUES("526"," rmb ");
INSERT INTO icons VALUES("527"," rouble ");
INSERT INTO icons VALUES("528"," rub");
INSERT INTO icons VALUES("529"," ruble ");
INSERT INTO icons VALUES("530"," rupee ");
INSERT INTO icons VALUES("531"," shekel ");
INSERT INTO icons VALUES("532"," sheqel ");
INSERT INTO icons VALUES("533"," try");
INSERT INTO icons VALUES("534"," turkish-lira ");
INSERT INTO icons VALUES("535"," usd");
INSERT INTO icons VALUES("536"," won ");
INSERT INTO icons VALUES("537"," yen ");
INSERT INTO icons VALUES("538"," align-center");
INSERT INTO icons VALUES("539"," align-justify");
INSERT INTO icons VALUES("540"," align-left");
INSERT INTO icons VALUES("541"," align-right");
INSERT INTO icons VALUES("542"," bold");
INSERT INTO icons VALUES("543"," chain ");
INSERT INTO icons VALUES("544"," chain-broken");
INSERT INTO icons VALUES("545"," clipboard");
INSERT INTO icons VALUES("546"," columns");
INSERT INTO icons VALUES("547"," copy ");
INSERT INTO icons VALUES("548"," cut ");
INSERT INTO icons VALUES("549"," dedent ");
INSERT INTO icons VALUES("550"," eraser");
INSERT INTO icons VALUES("551"," file");
INSERT INTO icons VALUES("552"," file-o");
INSERT INTO icons VALUES("553"," file-text");
INSERT INTO icons VALUES("554"," file-text-o");
INSERT INTO icons VALUES("555"," files-o");
INSERT INTO icons VALUES("556"," floppy-o");
INSERT INTO icons VALUES("557"," font");
INSERT INTO icons VALUES("558"," header");
INSERT INTO icons VALUES("559"," indent");
INSERT INTO icons VALUES("560"," italic");
INSERT INTO icons VALUES("561"," link");
INSERT INTO icons VALUES("562"," list");
INSERT INTO icons VALUES("563"," list-alt");
INSERT INTO icons VALUES("564"," list-ol");
INSERT INTO icons VALUES("565"," list-ul");
INSERT INTO icons VALUES("566"," outdent");
INSERT INTO icons VALUES("567"," paperclip");
INSERT INTO icons VALUES("568"," paragraph");
INSERT INTO icons VALUES("569"," paste ");
INSERT INTO icons VALUES("570"," repeat");
INSERT INTO icons VALUES("571"," rotate-left ");
INSERT INTO icons VALUES("572"," rotate-right ");
INSERT INTO icons VALUES("573"," save ");
INSERT INTO icons VALUES("574"," scissors");
INSERT INTO icons VALUES("575"," strikethrough");
INSERT INTO icons VALUES("576"," subscript");
INSERT INTO icons VALUES("577"," superscript");
INSERT INTO icons VALUES("578"," table");
INSERT INTO icons VALUES("579"," text-height");
INSERT INTO icons VALUES("580"," text-width");
INSERT INTO icons VALUES("581"," th");
INSERT INTO icons VALUES("582"," th-large");
INSERT INTO icons VALUES("583"," th-list");
INSERT INTO icons VALUES("584"," underline");
INSERT INTO icons VALUES("585"," undo");
INSERT INTO icons VALUES("586"," unlink ");
INSERT INTO icons VALUES("587"," angle-double-down");
INSERT INTO icons VALUES("588"," angle-double-left");
INSERT INTO icons VALUES("589"," angle-double-right");
INSERT INTO icons VALUES("590"," angle-double-up");
INSERT INTO icons VALUES("591"," angle-down");
INSERT INTO icons VALUES("592"," angle-left");
INSERT INTO icons VALUES("593"," angle-right");
INSERT INTO icons VALUES("594"," angle-up");
INSERT INTO icons VALUES("595"," arrow-circle-down");
INSERT INTO icons VALUES("596"," arrow-circle-left");
INSERT INTO icons VALUES("597"," arrow-circle-o-down");
INSERT INTO icons VALUES("598"," arrow-circle-o-left");
INSERT INTO icons VALUES("599"," arrow-circle-o-right");
INSERT INTO icons VALUES("600"," arrow-circle-o-up");
INSERT INTO icons VALUES("601"," arrow-circle-right");
INSERT INTO icons VALUES("602"," arrow-circle-up");
INSERT INTO icons VALUES("603"," arrow-down");
INSERT INTO icons VALUES("604"," arrow-left");
INSERT INTO icons VALUES("605"," arrow-right");
INSERT INTO icons VALUES("606"," arrow-up");
INSERT INTO icons VALUES("607"," arrows");
INSERT INTO icons VALUES("608"," arrows-alt");
INSERT INTO icons VALUES("609"," arrows-h");
INSERT INTO icons VALUES("610"," arrows-v");
INSERT INTO icons VALUES("611"," caret-down");
INSERT INTO icons VALUES("612"," caret-left");
INSERT INTO icons VALUES("613"," caret-right");
INSERT INTO icons VALUES("614"," caret-square-o-down");
INSERT INTO icons VALUES("615"," caret-square-o-left");
INSERT INTO icons VALUES("616"," caret-square-o-right");
INSERT INTO icons VALUES("617"," caret-square-o-up");
INSERT INTO icons VALUES("618"," caret-up");
INSERT INTO icons VALUES("619"," chevron-circle-down");
INSERT INTO icons VALUES("620"," chevron-circle-left");
INSERT INTO icons VALUES("621"," chevron-circle-right");
INSERT INTO icons VALUES("622"," chevron-circle-up");
INSERT INTO icons VALUES("623"," chevron-down");
INSERT INTO icons VALUES("624"," chevron-left");
INSERT INTO icons VALUES("625"," chevron-right");
INSERT INTO icons VALUES("626"," chevron-up");
INSERT INTO icons VALUES("627"," exchange");
INSERT INTO icons VALUES("628"," hand-o-down");
INSERT INTO icons VALUES("629"," hand-o-left");
INSERT INTO icons VALUES("630"," hand-o-right");
INSERT INTO icons VALUES("631"," hand-o-up");
INSERT INTO icons VALUES("632"," long-arrow-down");
INSERT INTO icons VALUES("633"," long-arrow-left");
INSERT INTO icons VALUES("634"," long-arrow-right");
INSERT INTO icons VALUES("635"," long-arrow-up");
INSERT INTO icons VALUES("636"," toggle-down ");
INSERT INTO icons VALUES("637"," toggle-left ");
INSERT INTO icons VALUES("638"," toggle-right ");
INSERT INTO icons VALUES("639"," toggle-up ");
INSERT INTO icons VALUES("640"," arrows-alt");
INSERT INTO icons VALUES("641"," backward");
INSERT INTO icons VALUES("642"," compress");
INSERT INTO icons VALUES("643"," eject");
INSERT INTO icons VALUES("644"," expand");
INSERT INTO icons VALUES("645"," fast-backward");
INSERT INTO icons VALUES("646"," fast-forward");
INSERT INTO icons VALUES("647"," forward");
INSERT INTO icons VALUES("648"," pause");
INSERT INTO icons VALUES("649"," pause-circle");
INSERT INTO icons VALUES("650"," pause-circle-o");
INSERT INTO icons VALUES("651"," play");
INSERT INTO icons VALUES("652"," play-circle");
INSERT INTO icons VALUES("653"," play-circle-o");
INSERT INTO icons VALUES("654"," random");
INSERT INTO icons VALUES("655"," step-backward");
INSERT INTO icons VALUES("656"," step-forward");
INSERT INTO icons VALUES("657"," stop");
INSERT INTO icons VALUES("658"," stop-circle");
INSERT INTO icons VALUES("659"," stop-circle-o");
INSERT INTO icons VALUES("660"," youtube-play");
INSERT INTO icons VALUES("661"," 500px");
INSERT INTO icons VALUES("662"," adn");
INSERT INTO icons VALUES("663"," amazon");
INSERT INTO icons VALUES("664"," android");
INSERT INTO icons VALUES("665"," angellist");
INSERT INTO icons VALUES("666"," apple");
INSERT INTO icons VALUES("667"," behance");
INSERT INTO icons VALUES("668"," behance-square");
INSERT INTO icons VALUES("669"," bitbucket");
INSERT INTO icons VALUES("670"," bitbucket-square");
INSERT INTO icons VALUES("671"," bitcoin ");
INSERT INTO icons VALUES("672"," black-tie");
INSERT INTO icons VALUES("673"," bluetooth");
INSERT INTO icons VALUES("674"," bluetooth-b");
INSERT INTO icons VALUES("675"," btc");
INSERT INTO icons VALUES("676"," buysellads");
INSERT INTO icons VALUES("677"," cc-amex");
INSERT INTO icons VALUES("678"," cc-diners-club");
INSERT INTO icons VALUES("679"," cc-discover");
INSERT INTO icons VALUES("680"," cc-jcb");
INSERT INTO icons VALUES("681"," cc-mastercard");
INSERT INTO icons VALUES("682"," cc-paypal");
INSERT INTO icons VALUES("683"," cc-stripe");
INSERT INTO icons VALUES("684"," cc-visa");
INSERT INTO icons VALUES("685"," chrome");
INSERT INTO icons VALUES("686"," codepen");
INSERT INTO icons VALUES("687"," codiepie");
INSERT INTO icons VALUES("688"," connectdevelop");
INSERT INTO icons VALUES("689"," contao");
INSERT INTO icons VALUES("690"," css3");
INSERT INTO icons VALUES("691"," dashcube");
INSERT INTO icons VALUES("692"," delicious");
INSERT INTO icons VALUES("693"," deviantart");
INSERT INTO icons VALUES("694"," digg");
INSERT INTO icons VALUES("695"," dribbble");
INSERT INTO icons VALUES("696"," dropbox");
INSERT INTO icons VALUES("697"," drupal");
INSERT INTO icons VALUES("698"," edge");
INSERT INTO icons VALUES("699"," empire");
INSERT INTO icons VALUES("700"," expeditedssl");
INSERT INTO icons VALUES("701"," facebook");
INSERT INTO icons VALUES("702"," facebook-f ");
INSERT INTO icons VALUES("703"," facebook-official");
INSERT INTO icons VALUES("704"," facebook-square");
INSERT INTO icons VALUES("705"," firefox");
INSERT INTO icons VALUES("706"," flickr");
INSERT INTO icons VALUES("707"," fonticons");
INSERT INTO icons VALUES("708"," fort-awesome");
INSERT INTO icons VALUES("709"," forumbee");
INSERT INTO icons VALUES("710"," foursquare");
INSERT INTO icons VALUES("711"," ge ");
INSERT INTO icons VALUES("712"," get-pocket");
INSERT INTO icons VALUES("713"," gg");
INSERT INTO icons VALUES("714"," gg-circle");
INSERT INTO icons VALUES("715"," git");
INSERT INTO icons VALUES("716"," git-square");
INSERT INTO icons VALUES("717"," github");
INSERT INTO icons VALUES("718"," github-alt");
INSERT INTO icons VALUES("719"," github-square");
INSERT INTO icons VALUES("720"," gittip ");
INSERT INTO icons VALUES("721"," google");
INSERT INTO icons VALUES("722"," google-plus");
INSERT INTO icons VALUES("723"," google-plus-square");
INSERT INTO icons VALUES("724"," google-wallet");
INSERT INTO icons VALUES("725"," gratipay");
INSERT INTO icons VALUES("726"," hacker-news");
INSERT INTO icons VALUES("727"," houzz");
INSERT INTO icons VALUES("728"," html5");
INSERT INTO icons VALUES("729"," instagram");
INSERT INTO icons VALUES("730"," internet-explorer");
INSERT INTO icons VALUES("731"," ioxhost");
INSERT INTO icons VALUES("732"," joomla");
INSERT INTO icons VALUES("733"," jsfiddle");
INSERT INTO icons VALUES("734"," lastfm");
INSERT INTO icons VALUES("735"," lastfm-square");
INSERT INTO icons VALUES("736"," leanpub");
INSERT INTO icons VALUES("737"," linkedin");
INSERT INTO icons VALUES("738"," linkedin-square");
INSERT INTO icons VALUES("739"," linux");
INSERT INTO icons VALUES("740"," maxcdn");
INSERT INTO icons VALUES("741"," meanpath");
INSERT INTO icons VALUES("742"," medium");
INSERT INTO icons VALUES("743"," mixcloud");
INSERT INTO icons VALUES("744"," modx");
INSERT INTO icons VALUES("745"," odnoklassniki");
INSERT INTO icons VALUES("746"," odnoklassniki-square");
INSERT INTO icons VALUES("747"," opencart");
INSERT INTO icons VALUES("748"," openid");
INSERT INTO icons VALUES("749"," opera");
INSERT INTO icons VALUES("750"," optin-monster");
INSERT INTO icons VALUES("751"," pagelines");
INSERT INTO icons VALUES("752"," paypal");
INSERT INTO icons VALUES("753"," pied-piper");
INSERT INTO icons VALUES("754"," pied-piper-alt");
INSERT INTO icons VALUES("755"," pinterest");
INSERT INTO icons VALUES("756"," pinterest-p");
INSERT INTO icons VALUES("757"," pinterest-square");
INSERT INTO icons VALUES("758"," product-hunt");
INSERT INTO icons VALUES("759"," qq");
INSERT INTO icons VALUES("760"," ra ");
INSERT INTO icons VALUES("761"," rebel");
INSERT INTO icons VALUES("762"," reddit");
INSERT INTO icons VALUES("763"," reddit-alien");
INSERT INTO icons VALUES("764"," reddit-square");
INSERT INTO icons VALUES("765"," renren");
INSERT INTO icons VALUES("766"," safari");
INSERT INTO icons VALUES("767"," scribd");
INSERT INTO icons VALUES("768"," sellsy");
INSERT INTO icons VALUES("769"," share-alt");
INSERT INTO icons VALUES("770"," share-alt-square");
INSERT INTO icons VALUES("771"," shirtsinbulk");
INSERT INTO icons VALUES("772"," simplybuilt");
INSERT INTO icons VALUES("773"," skyatlas");
INSERT INTO icons VALUES("774"," skype");
INSERT INTO icons VALUES("775"," slack");
INSERT INTO icons VALUES("776"," slideshare");
INSERT INTO icons VALUES("777"," soundcloud");
INSERT INTO icons VALUES("778"," spotify");
INSERT INTO icons VALUES("779"," stack-exchange");
INSERT INTO icons VALUES("780"," stack-overflow");
INSERT INTO icons VALUES("781"," steam");
INSERT INTO icons VALUES("782"," steam-square");
INSERT INTO icons VALUES("783"," stumbleupon");
INSERT INTO icons VALUES("784"," stumbleupon-circle");
INSERT INTO icons VALUES("785"," tencent-weibo");
INSERT INTO icons VALUES("786"," trello");
INSERT INTO icons VALUES("787"," tripadvisor");
INSERT INTO icons VALUES("788"," tumblr");
INSERT INTO icons VALUES("789"," tumblr-square");
INSERT INTO icons VALUES("790"," twitch");
INSERT INTO icons VALUES("791"," twitter");
INSERT INTO icons VALUES("792"," twitter-square");
INSERT INTO icons VALUES("793"," usb");
INSERT INTO icons VALUES("794"," viacoin");
INSERT INTO icons VALUES("795"," vimeo");
INSERT INTO icons VALUES("796"," vimeo-square");
INSERT INTO icons VALUES("797"," vine");
INSERT INTO icons VALUES("798"," vk");
INSERT INTO icons VALUES("799"," wechat ");
INSERT INTO icons VALUES("800"," weibo");
INSERT INTO icons VALUES("801"," weixin");
INSERT INTO icons VALUES("802"," whatsapp");
INSERT INTO icons VALUES("803"," wikipedia-w");
INSERT INTO icons VALUES("804"," windows");
INSERT INTO icons VALUES("805"," wordpress");
INSERT INTO icons VALUES("806"," xing");
INSERT INTO icons VALUES("807"," xing-square");
INSERT INTO icons VALUES("808"," y-combinator");
INSERT INTO icons VALUES("809"," y-combinator-square ");
INSERT INTO icons VALUES("810"," yahoo");
INSERT INTO icons VALUES("811"," yc ");
INSERT INTO icons VALUES("812"," yc-square ");
INSERT INTO icons VALUES("813"," yelp");
INSERT INTO icons VALUES("814"," youtube");
INSERT INTO icons VALUES("815"," youtube-play");
INSERT INTO icons VALUES("816"," youtube-square");



DROP TABLE languages;

CREATE TABLE `languages` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `lang` varchar(3) NOT NULL,
  `title` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO languages VALUES("1","ru","Русский");
INSERT INTO languages VALUES("2","en","English");



DROP TABLE notification;

CREATE TABLE `notification` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `title_lang` varchar(100) NOT NULL,
  `text_lang` varchar(100) NOT NULL,
  `href` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




DROP TABLE pages;

CREATE TABLE `pages` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `title_lang` varchar(100) NOT NULL,
  `text_lang` varchar(100) NOT NULL,
  `page` varchar(100) NOT NULL,
  `shown` varchar(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT INTO pages VALUES("1","home_page","","home","y");
INSERT INTO pages VALUES("4","text4836","text4836_t","text","n");
INSERT INTO pages VALUES("6","second_page","second_page_t","second_page","y");
INSERT INTO pages VALUES("7","another_page","another_page_t","new_page","n");
INSERT INTO pages VALUES("8","page_a","page_a_t","page_a","y");
INSERT INTO pages VALUES("9","new_o","new_o_t","new_o","n");



DROP TABLE translation;

CREATE TABLE `translation` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `lang` varchar(3) NOT NULL,
  `title` varchar(100) NOT NULL,
  `text` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=104 DEFAULT CHARSET=utf8;

INSERT INTO translation VALUES("1","ru","home_page","Стартовая страница");
INSERT INTO translation VALUES("2","ru","1_page","1 страница");
INSERT INTO translation VALUES("23","ru","text","Русский заголовок");
INSERT INTO translation VALUES("24","ru","text_t","Полный текст (Русский)");
INSERT INTO translation VALUES("25","en","text","English title");
INSERT INTO translation VALUES("26","en","text_t","Полный текст (English)");
INSERT INTO translation VALUES("27","ru","text4836","Ру");
INSERT INTO translation VALUES("28","ru","text4836_t","Полный текст (Русский)");
INSERT INTO translation VALUES("29","en","text4836","Eng");
INSERT INTO translation VALUES("30","en","text4836_t","Полный текст (English)");
INSERT INTO translation VALUES("42","ru","second_page","Название второй страницы");
INSERT INTO translation VALUES("43","ru","second_page_t","Полный текст (Русский)");
INSERT INTO translation VALUES("44","en","second_page","Second page title");
INSERT INTO translation VALUES("45","en","second_page_t","Полный текст (English)");
INSERT INTO translation VALUES("46","ru","another_page","Третья страница  2");
INSERT INTO translation VALUES("47","ru","another_page_t","Полный текст (Русский)");
INSERT INTO translation VALUES("48","en","another_page","Third page 3");
INSERT INTO translation VALUES("49","en","another_page_t","Eng Text");
INSERT INTO translation VALUES("52","ru","","Initial-scale=1, minimum-scale=1, width=device-width");
INSERT INTO translation VALUES("53","en","","Initial-scale=1, minimum-scale=1, width=device-width");
INSERT INTO translation VALUES("54","ru","jenia","");
INSERT INTO translation VALUES("55","ru","jenia_t","");
INSERT INTO translation VALUES("56","en","jenia","");
INSERT INTO translation VALUES("57","en","jenia_t","");
INSERT INTO translation VALUES("58","ru","jenia5954","");
INSERT INTO translation VALUES("59","ru","jenia5954_t","");
INSERT INTO translation VALUES("60","en","jenia5954","");
INSERT INTO translation VALUES("61","en","jenia5954_t","");
INSERT INTO translation VALUES("62","ru","jenia2170","");
INSERT INTO translation VALUES("63","ru","jenia2170_t","");
INSERT INTO translation VALUES("64","en","jenia2170","");
INSERT INTO translation VALUES("65","en","jenia2170_t","");
INSERT INTO translation VALUES("66","ru","jenia7467","");
INSERT INTO translation VALUES("67","ru","jenia7467_t","");
INSERT INTO translation VALUES("68","en","jenia7467","");
INSERT INTO translation VALUES("69","en","jenia7467_t","");
INSERT INTO translation VALUES("70","ru","jenia4938","");
INSERT INTO translation VALUES("71","ru","jenia4938_t","");
INSERT INTO translation VALUES("72","en","jenia4938","");
INSERT INTO translation VALUES("73","en","jenia4938_t","");
INSERT INTO translation VALUES("74","ru","jenia3737","Initial-scale=1, minimum-scale=1, width=device-width");
INSERT INTO translation VALUES("75","en","jenia3737","Initial-scale=1, minimum-scale=1, width=device-width");
INSERT INTO translation VALUES("76","ru","jenia9926","Initial-scale=1, minimum-scale=1, width=device-width");
INSERT INTO translation VALUES("77","en","jenia9926","Initial-scale=1, minimum-scale=1, width=device-width");
INSERT INTO translation VALUES("78","ru","page_a","Название страницы А");
INSERT INTO translation VALUES("79","ru","page_a_t","");
INSERT INTO translation VALUES("80","en","page_a","Title of Page");
INSERT INTO translation VALUES("81","en","page_a_t","");
INSERT INTO translation VALUES("82","ru","new_o","лыфыврлоралорывлоар");
INSERT INTO translation VALUES("83","ru","new_o_t","");
INSERT INTO translation VALUES("84","en","new_o","Enjasdhkjsa");
INSERT INTO translation VALUES("85","en","new_o_t","");
INSERT INTO translation VALUES("86","ru","left_block","Пробный блок");
INSERT INTO translation VALUES("87","ru","left_block_t","");
INSERT INTO translation VALUES("88","en","left_block","First Left block");
INSERT INTO translation VALUES("89","en","left_block_t","");
INSERT INTO translation VALUES("90","ru","left_block9734","Пробный блок");
INSERT INTO translation VALUES("91","ru","left_block9734_t","");
INSERT INTO translation VALUES("92","en","left_block9734","First Left block");
INSERT INTO translation VALUES("93","en","left_block9734_t","");
INSERT INTO translation VALUES("94","ru","left_block1171","Пробный блок");
INSERT INTO translation VALUES("95","en","left_block1171","First Left block");
INSERT INTO translation VALUES("96","ru","left_block9809","Пробный блок");
INSERT INTO translation VALUES("97","en","left_block9809","First Left block");
INSERT INTO translation VALUES("98","ru","left_block7280","Пробный блок");
INSERT INTO translation VALUES("99","en","left_block7280","First Left block");
INSERT INTO translation VALUES("100","ru","left_block4516","Левый блок");
INSERT INTO translation VALUES("101","en","left_block4516","First Left Block");
INSERT INTO translation VALUES("102","Рус","left_block9953","Initial-scale=1, minimum-scale=1, width=device-width");
INSERT INTO translation VALUES("103","Eng","left_block9953","Initial-scale=1, minimum-scale=1, width=device-width");



