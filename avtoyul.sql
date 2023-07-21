-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Ноя 10 2021 г., 18:35
-- Версия сервера: 5.7.29
-- Версия PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `avtoyul`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admission`
--

CREATE TABLE `admission` (
  `id` int(11) NOT NULL,
  `order_by` smallint(6) DEFAULT '0',
  `status` tinyint(4) DEFAULT '1',
  `phone` varchar(20) DEFAULT NULL,
  `fax` varchar(20) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `site` varchar(200) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `blog` varchar(200) DEFAULT NULL,
  `biography` varchar(200) DEFAULT NULL,
  `level_name` text NOT NULL,
  `name` text NOT NULL,
  `reception_days` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `advertise`
--

CREATE TABLE `advertise` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `category` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `advertise_lang`
--

CREATE TABLE `advertise_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `album`
--

CREATE TABLE `album` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(600) DEFAULT NULL,
  `creator` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` int(11) DEFAULT '0',
  `order_by` int(11) DEFAULT NULL,
  `seen_count` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `album`
--

INSERT INTO `album` (`id`, `name`, `description`, `creator`, `created_date`, `status`, `order_by`, `seen_count`) VALUES
(1, 'Portfolio', '', 1, '2021-11-05 16:57:57', 1, 10, 71);

-- --------------------------------------------------------

--
-- Структура таблицы `album_lang`
--

CREATE TABLE `album_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(600) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `attach`
--

CREATE TABLE `attach` (
  `id` int(11) NOT NULL,
  `section` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `guid` varchar(100) NOT NULL,
  `extension` varchar(6) NOT NULL,
  `size` int(11) NOT NULL,
  `creator` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `branch`
--

CREATE TABLE `branch` (
  `id` int(11) NOT NULL,
  `title` varchar(500) NOT NULL,
  `leader` varchar(500) NOT NULL,
  `phone` varchar(500) NOT NULL,
  `email` varchar(500) NOT NULL,
  `address` varchar(500) NOT NULL,
  `leader_info` text NOT NULL,
  `district_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `slug` varchar(500) NOT NULL,
  `map_link` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `branch`
--

INSERT INTO `branch` (`id`, `title`, `leader`, `phone`, `email`, `address`, `leader_info`, `district_id`, `status`, `slug`, `map_link`) VALUES
(1, 'Surxondaryo viloyati Termiz shahar qurilish bo‘limi', 'Qilichov Jo\'ra Baxtiyorovich', '(0 376) 221-22-80 / (0 376) 223-19-22', 'surxondaryo@uzavtoyul.uz', 'Surxondaryo viloyati, Termiz shahri, 190100, Olmazor ko\'chasi, 42-uy', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:100%\">\r\n	<tbody>\r\n		<tr>\r\n			<td>&nbsp;</td>\r\n			<td>\r\n			<p style=\"text-align:center\">&nbsp;</p>\r\n			</td>\r\n			<td>\r\n			<p style=\"text-align:center\">E-mail:</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 107, 1, 'www.surxondaryoavtoyul.uz', '<script type=\"text/javascript\" charset=\"utf-8\" async src=\"https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A6dfb68cab6a20d39bc050f4e5b7f89992f071eaf505b8de248f53c563e892c7f&amp;width=750&amp;height=400&amp;lang=ru_RU&amp;scroll=false\"></script>'),
(2, 'Surxondaryo viloyati  Angor tuman qurilish bo‘limi', 'Qilichov Jo\'ra Baxtiyorovich', '(0 376) 221-22-80 / (0 376) 223-19-22', 'surxondaryo@uzavtoyul.uz', 'Surxondaryo viloyati, Termiz shahri, 190100, Olmazor ko\'chasi, 42-uy', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:662px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:166px\">\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"width:245px\">\r\n			<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n			<p style=\"text-align:center\"><strong>Surxondaryo viloyati Angor tuman qurilish bo&lsquo;limi&nbsp;bosh arxitektori &nbsp;</strong></p>\r\n\r\n			<p style=\"text-align:center\"><strong>Shukurov Rustam</strong></p>\r\n\r\n			<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n			<p style=\"text-align:center\">&nbsp;</p>\r\n			</td>\r\n			<td style=\"width:233px\">\r\n			<p style=\"text-align:center\">Tel :&nbsp; (97)-850-40-33&nbsp;</p>\r\n\r\n			<p style=\"text-align:center\">Qabulxona:</p>\r\n\r\n			<p style=\"text-align:center\">(076) 31-21-659</p>\r\n\r\n			<p style=\"text-align:center\">E-mail: &nbsp;angor@oncon.uz</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 95, 1, 'www.surxondaryoavtoyul.uz', '<script type=\"text/javascript\" charset=\"utf-8\" async src=\"https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A6dfb68cab6a20d39bc050f4e5b7f89992f071eaf505b8de248f53c563e892c7f&amp;width=750&amp;height=400&amp;lang=ru_RU&amp;scroll=false\"></script>'),
(3, 'Surxondaryo viloyati Boysun  tuman qurilish bo‘limi ', 'Qilichov Jo\'ra Baxtiyorovich', ' (0 376) 221-22-80 / (0 376) 223-19-22', 'surxondaryo@uzavtoyul.uz', 'Surxondaryo viloyati, Termiz shahri, 190100, Olmazor ko\'chasi, 42-uy', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:763px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:133px\">\r\n			<p style=\"text-align:center\"><img alt=\"\" height=\"200\" src=\"/kcfinder/upload/images/A.Soyibnazarov.jpg\" width=\"150\" /></p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"text-align:center; width:378px\">\r\n			<p>Surxondaryo viloyati Boysun &nbsp;tuman qurilish bo&lsquo;limi &ndash; tuman bosh arxitektori<br />\r\n			&nbsp; &nbsp; &nbsp;<br />\r\n			Soibnazarov Akmal Mamarajabovich</p>\r\n\r\n			<p>&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n\r\n			<p>(11.03.1989) yil Muzrabot tumani. Oliy, 2013 y. Samarkand DAKI. Muxandis-quruvchi</p>\r\n			</td>\r\n			<td style=\"width:227px\">\r\n			<p style=\"text-align:center\">Tel: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;(94) 465-30-30</p>\r\n\r\n			<p style=\"text-align:center\">Qabulxona: &nbsp; (076) 33-5-22-92</p>\r\n\r\n			<p style=\"text-align:center\">E-mail: &nbsp; &nbsp; &nbsp;boysun@davarx.uz</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n', 96, 1, 'www.surxondaryoavtoyul.uz', '<script type=\"text/javascript\" charset=\"utf-8\" async src=\"https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A6dfb68cab6a20d39bc050f4e5b7f89992f071eaf505b8de248f53c563e892c7f&amp;width=750&amp;height=400&amp;lang=ru_RU&amp;scroll=false\"></script>'),
(4, 'Surxondaryo viloyati  Denov  tuman qurilish bo‘limi', 'Qilichov Jo\'ra Baxtiyorovich', ' (0 376) 221-22-80 / (0 376) 223-19-22', ' www.surxondaryoavtoyul.uz', 'Surxondaryo viloyati, Termiz shahri, 190100, Olmazor ko\'chasi, 42-uy', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:684px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:151px\">\r\n			<p style=\"text-align:center\"><img alt=\"\" height=\"203\" src=\"/kcfinder/upload/images/R.Sattorov.png\" width=\"150\" /></p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"width:295px\">\r\n			<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n			<p style=\"text-align:center\">Surxondaryo viloyati &nbsp;Denov &nbsp;tuman qurilish bo&lsquo;limi &ndash; tuman bosh arxitektori<br />\r\n			&nbsp;<br />\r\n			Sattarov Raxmat Xasanovich</p>\r\n\r\n			<p style=\"text-align:center\">(22.11.1967) &nbsp;yil Denov tumani. Oliy, 1994 yil Toshkent AKI. iqtisodchi</p>\r\n\r\n			<p style=\"text-align:center\">&nbsp;</p>\r\n			</td>\r\n			<td style=\"width:223px\">\r\n			<p style=\"text-align:center\">Tel:&nbsp; (91) 512-62-45</p>\r\n\r\n			<p style=\"text-align:center\">Qabulxona:</p>\r\n\r\n			<p style=\"text-align:center\">(076)-41-31-980</p>\r\n\r\n			<p style=\"text-align:center\">E-mail: &nbsp;&nbsp;denov@davarx.uz</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 97, 1, 'surxondaryo@uzavtoyul.uz', '<script type=\"text/javascript\" charset=\"utf-8\" async src=\"https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A6dfb68cab6a20d39bc050f4e5b7f89992f071eaf505b8de248f53c563e892c7f&amp;width=750&amp;height=400&amp;lang=ru_RU&amp;scroll=false\"></script>'),
(5, 'Surxondaryo viloyati Jarqo‘rg‘on tuman qurilish bo‘limi ', 'Qilichov Jo\'ra Baxtiyorovich', '(0 376) 221-22-80 / (0 376) 223-19-22', 'surxondaryo@uzavtoyul.uz', 'Surxondaryo viloyati, Termiz shahri, 190100, Olmazor ko\'chasi, 42-uy', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:704px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"text-align:center; width:152px\">\r\n			<p style=\"text-align:center\"><img alt=\"\" height=\"184\" src=\"/kcfinder/upload/images/sh.toshpulatov.jpg\" width=\"150\" /></p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"width:335px\">\r\n			<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n			<p style=\"text-align:center\">Surxondaryo viloyati Jarqo&lsquo;rg&lsquo;on tuman qurilish bo&lsquo;limi &ndash;shahar bosh arxitektori &nbsp;<br />\r\n			&nbsp; &nbsp;</p>\r\n\r\n			<p style=\"text-align:center\">&nbsp; &nbsp;&nbsp;Toshpulatov Shavkat Xudjakulovich</p>\r\n\r\n			<p style=\"text-align:center\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n\r\n			<p style=\"text-align:center\">(20.10.1987) yil Jarkurgon tumani. Oliy, 2014 y. Samarkand DAKI.Arxitektor</p>\r\n\r\n			<p style=\"text-align:center\">&nbsp;</p>\r\n			</td>\r\n			<td style=\"width:199px\">\r\n			<p style=\"text-align:center\"><span style=\"line-height:1\">Tel: (90) 245-93-87</span></p>\r\n\r\n			<p style=\"text-align:center\"><span style=\"line-height:1\">Qabulxona: (76) 43-22-251</span></p>\r\n\r\n			<p style=\"text-align:center\"><span style=\"line-height:1\">E-mail:</span></p>\r\n\r\n			<p style=\"text-align:center\"><span style=\"line-height:1\">jarqorgon@oncon.uz</span></p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 98, 1, ' www.surxondaryoavtoyul.uz', '<script type=\"text/javascript\" charset=\"utf-8\" async src=\"https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A6dfb68cab6a20d39bc050f4e5b7f89992f071eaf505b8de248f53c563e892c7f&amp;width=750&amp;height=400&amp;lang=ru_RU&amp;scroll=false\"></script>'),
(6, 'Surxondaryo viloyati Muzrabot tuman qurilish bo‘limi', ' Qilichov Jo\'ra Baxtiyorovich', '(0 376) 221-22-80 / (0 376) 223-19-22', ' surxondaryo@uzavtoyul.uz', ' Surxondaryo viloyati, Termiz shahri, 190100, Olmazor ko\'chasi, 42-uy', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:741px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:97px\">\r\n			<p style=\"text-align:center\"><img alt=\"\" height=\"203\" src=\"/kcfinder/upload/images/S.Islomov.jpg\" width=\"150\" /></p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"width:423px\">\r\n			<p style=\"text-align:center\">Surxondaryo viloyati Muzrabot tuman qurilish bo&lsquo;limi &ndash;shahar bosh arxitektori &nbsp;<br />\r\n			&nbsp;</p>\r\n\r\n			<p style=\"text-align:center\">Islomov Sirojiddin Berdinazarovich</p>\r\n\r\n			<p style=\"text-align:center\">(21.07.1983) &nbsp;yil Sherobod tumani. Oliy, 2008 yil Samarkand DAKI. Arxitektor</p>\r\n			</td>\r\n			<td style=\"width:204px\">\r\n			<p style=\"text-align:center\">Tel: &nbsp;&nbsp; (91) 910-89-83</p>\r\n\r\n			<p style=\"text-align:center\">&nbsp;</p>\r\n\r\n			<p style=\"text-align:center\">E-mail: &nbsp; &nbsp; &nbsp; &nbsp;muzrabot@davarx.uz</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 101, 1, ' www.surxondaryoavtoyul.uz', '<script type=\"text/javascript\" charset=\"utf-8\" async src=\"https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A6dfb68cab6a20d39bc050f4e5b7f89992f071eaf505b8de248f53c563e892c7f&amp;width=750&amp;height=400&amp;lang=ru_RU&amp;scroll=false\"></script>'),
(7, 'Surxondaryo viloyati Oltinsoy tuman qurilish bo‘limi', 'Abdullayev Boxodir Usarovich', '(94) 461-24-77', ' oltinsoy@oncon.uz', 'Oltinsoy tuman Mustaqillik ko\'chasi 8-uy', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:109px\">\r\n			<p style=\"text-align:center\"><img alt=\"\" height=\"213\" src=\"/kcfinder/upload/images/B.Abdullaev.jpg\" width=\"150\" /></p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"width:370px\">\r\n			<p style=\"text-align:center\">Surxondaryo viloyati Oltinsoy tuman qurilish bo&lsquo;limi &ndash;shahar bosh arxitektori &nbsp;&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n\r\n			<p style=\"text-align:center\">Abdullayev Boxodir Usarovich&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n\r\n			<p style=\"text-align:center\">(26.03.1968) yil Sariosiyo tumani. Oliy, 1994 y. Toshkent AKI. Arxitektor</p>\r\n			</td>\r\n			<td>\r\n			<p style=\"text-align:center\">Tel: &nbsp;(94) 461-24-77</p>\r\n\r\n			<p style=\"text-align:center\">Qabulxona: &nbsp;</p>\r\n\r\n			<p style=\"text-align:center\">(076) 34-91-486</p>\r\n\r\n			<p style=\"text-align:center\">E-mail: &nbsp; &nbsp; &nbsp; oltinsoy@davarx.uz</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 94, 1, 'oltinsoy-tuman', '<script type=\"text/javascript\" charset=\"utf-8\" async src=\"https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A6dfb68cab6a20d39bc050f4e5b7f89992f071eaf505b8de248f53c563e892c7f&amp;width=750&amp;height=400&amp;lang=ru_RU&amp;scroll=false\"></script>'),
(8, 'Surxondaryo viloyati Sariosiyo tuman qurilish bo‘limi ', 'Sufiev Manuchexr ', ' (94) 462-17-19', 'sariosiyo@oncon.uz', 'Sariosiyo shaharchasi M.Ulug\'bek mahallasi A.Qaxxor ko\'chasi 1-uy', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:135px\">\r\n			<p style=\"text-align:center\"><img alt=\"\" height=\"136\" src=\"/kcfinder/upload/images/M.Sufiev.jpg\" width=\"150\" /></p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"width:383px\">\r\n			<p style=\"text-align:center\">Surxondaryo viloyati Sariosiyo tuman qurilish bo&lsquo;limi &ndash;shahar bosh arxitektori &nbsp;</p>\r\n\r\n			<p style=\"text-align:center\">Sufiev Manuchexr&nbsp;</p>\r\n\r\n			<p style=\"text-align:center\">(16.01.1985) &nbsp;yil Denov tumani. Oliy, 2012 yil Samarkand DAKI. Bino va inshootlar qurilishi</p>\r\n			</td>\r\n			<td>\r\n			<p style=\"text-align:center\">Tel: &nbsp; (97) 242-17-13</p>\r\n\r\n			<p style=\"text-align:center\">&nbsp; &nbsp; &nbsp; &nbsp;Qabulxona :</p>\r\n\r\n			<p style=\"text-align:center\">&nbsp; (076) 487-64-64</p>\r\n\r\n			<p style=\"text-align:center\">&nbsp;E-mail: &nbsp; &nbsp; &nbsp; &nbsp;sariosiyo@davarx.uz</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 102, 1, 'sariosiyo-tuman', '<script type=\"text/javascript\" charset=\"utf-8\" async src=\"https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A6dfb68cab6a20d39bc050f4e5b7f89992f071eaf505b8de248f53c563e892c7f&amp;width=750&amp;height=400&amp;lang=ru_RU&amp;scroll=false\"></script>'),
(9, 'Surxondaryo viloyati Uzun tuman   qurilish bo‘limi ', 'Elmurodov Abduxamid Murtazaliyevich', '(91) 580-40-00', 'uzun@oncon.uz', 'Uzun tuman O\'zbekiston MFY O\'zbekiston ko\'chasi 7-uy', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:97px\">\r\n			<p style=\"text-align:center\"><img alt=\"\" height=\"201\" src=\"/kcfinder/upload/images/A.Elmurodov.jpg\" width=\"150\" /></p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"width:336px\">\r\n			<p style=\"text-align:center\">Surxondaryo viloyati Uzun tuman &nbsp; qurilish bo&lsquo;limi &ndash;shahar bosh arxitektori &nbsp;<br />\r\n			&nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;</p>\r\n\r\n			<p style=\"text-align:center\">Elmurodov Abduxamid Murtazaliyevich&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n\r\n			<p style=\"text-align:center\">(19.11.1987 ) &nbsp;yil Denov shahri. Oliy, 2015 yil Samarkand DAKI. Arxitektor</p>\r\n			</td>\r\n			<td>\r\n			<p style=\"text-align:center\">Tel: &nbsp; &nbsp;&nbsp;(91) 580-40-00</p>\r\n\r\n			<p style=\"text-align:center\">Qabulxona:</p>\r\n\r\n			<p style=\"text-align:center\">&nbsp; (076) 44-7-34-65</p>\r\n\r\n			<p style=\"text-align:center\">E-mail: &nbsp; &nbsp; &nbsp;uzun@davarx.uz</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 104, 1, 'uzun-tuman', '<script type=\"text/javascript\" charset=\"utf-8\" async src=\"https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A6dfb68cab6a20d39bc050f4e5b7f89992f071eaf505b8de248f53c563e892c7f&amp;width=750&amp;height=400&amp;lang=ru_RU&amp;scroll=false\"></script>'),
(10, 'Surxondaryo viloyati Sherobod tuman qurilish bo‘limi ', 'Ismoilov Akmal Amanovich', '(91) 229-71-11', 'sherabod@oncon.uz', 'Sherobod tuman \"Buyuk ipak yo\'li\" mahallasi R.To\'raqulov 5-uy', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" height=\"154\" src=\"http://terarx.uz/wp-content/uploads/2019/09/sherobod.jpg\" width=\"128\" /></td>\r\n			<td>\r\n			<p style=\"text-align:center\">Surxondaryo viloyati Sherobod tuman qurilish bo&lsquo;limi &ndash;shahar bosh arxitektori &nbsp;<br />\r\n			&nbsp;</p>\r\n\r\n			<p style=\"text-align:center\">Ismoilov Akmal Amanovich</p>\r\n\r\n			<p style=\"text-align:center\">(18.10.1990) &nbsp;yil Angor tumani. Oliy, 2014 yil Toshkent AKI..Shahar qurilishi va xo&lsquo;jaligi</p>\r\n			</td>\r\n			<td>\r\n			<p>Tel:&nbsp;(91) 229-71-11</p>\r\n\r\n			<p>Qabulxona:</p>\r\n\r\n			<p>&nbsp;&nbsp;(076) 32-2-19-80</p>\r\n\r\n			<p>E-mail: &nbsp; &nbsp; &nbsp; &nbsp;sherabod@davarx.uz</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 105, 1, 'sherobod-tuman', '<script type=\"text/javascript\" charset=\"utf-8\" async src=\"https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A6dfb68cab6a20d39bc050f4e5b7f89992f071eaf505b8de248f53c563e892c7f&amp;width=750&amp;height=400&amp;lang=ru_RU&amp;scroll=false\"></script>'),
(11, 'Surxondaryo viloyati Sho‘rchi tuman qurilish bo‘limi ', 'Mamadiyev Najmiddin Baxodirovich', '(91) 900-48-65', ' shorchi@oncon.uz', 'Sho‘rchi tuman Ko\'klam mahallasi Mustaqillik ko\'chasi', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:117px\">\r\n			<p style=\"text-align:center\"><img alt=\"\" height=\"200\" src=\"/kcfinder/upload/images/N.Mamadiev.jpg\" width=\"150\" /></p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"width:460px\">\r\n			<p style=\"text-align:center\">Surxondaryo viloyati Sho&lsquo;rchi tuman qurilish bo&lsquo;limi &ndash;shahar bosh arxitektori &nbsp;<br />\r\n			&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;</p>\r\n\r\n			<p style=\"text-align:center\">Mamadiyev Najmiddin Baxodirovich&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n\r\n			<p style=\"text-align:center\">15.11.1979 yil Sho&lsquo;rchi tumani. Oliy, 2001 y. Toshkent AKI. transport va gidrotexnik inshoatlar qurilish</p>\r\n			</td>\r\n			<td>\r\n			<p>Tel: &nbsp;(91) 900-48-65</p>\r\n\r\n			<p>Qabulxona:</p>\r\n\r\n			<p>&nbsp; (076) 45-7-46-49</p>\r\n\r\n			<p>E-mail: &nbsp; &nbsp;shorchi@davarx.uz</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 106, 1, 'shurchi-tuman', '<script type=\"text/javascript\" charset=\"utf-8\" async src=\"https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A6dfb68cab6a20d39bc050f4e5b7f89992f071eaf505b8de248f53c563e892c7f&amp;width=750&amp;height=400&amp;lang=ru_RU&amp;scroll=false\"></script>'),
(12, 'Surxondaryo viloyati Qiziriq tuman qurilish bo‘limi ', 'Toshqulov  Yo‘ldosh Xolmamatovich', ' (97) 536-14-41', 'qiziriq@oncon.uz', 'Qiziriq tuman Mustaqillik ko\'chasi ', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:128px\">\r\n			<p style=\"text-align:center\"><img alt=\"\" height=\"224\" src=\"/kcfinder/upload/images/Y.Toshqulov.jpg\" width=\"150\" /></p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"width:353px\">\r\n			<p style=\"text-align:center\">Surxondaryo viloyati Qiziriq tuman qurilish bo&lsquo;limi &ndash;shahar bosh arxitektori &nbsp;<br />\r\n			&nbsp;</p>\r\n\r\n			<p style=\"text-align:center\">Toshqulov &nbsp;Yo&lsquo;ldosh Xolmamatovich</p>\r\n\r\n			<p style=\"text-align:center\">(14.03.1974 ) &nbsp;yil Boysun tumani. Oliy, 1997 yil Samarkand DAKI. Arxitektor</p>\r\n			</td>\r\n			<td style=\"width:133px\">\r\n			<p>Tel: (97) 536-14-41</p>\r\n\r\n			<p>Qabulxona:&nbsp;&nbsp;</p>\r\n\r\n			<p>&nbsp; (076) 35-9-16-59</p>\r\n\r\n			<p>E-mail: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;qiziriq@davarx.uz</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 99, 1, 'qiziriq-tuman', '<script type=\"text/javascript\" charset=\"utf-8\" async src=\"https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A6dfb68cab6a20d39bc050f4e5b7f89992f071eaf505b8de248f53c563e892c7f&amp;width=750&amp;height=400&amp;lang=ru_RU&amp;scroll=false\"></script>'),
(13, 'Surxondaryo viloyati Qumqo‘rg‘on tumani qurilish bo‘limi ', 'Mustanov Faxriddin', '(90) 947-52-41', 'qumqorgon@oncon.uz', 'Qumqo‘rg‘on tuman \"Yangi shahar\" mahallasi O\'zbekiston shox ko\'chasi', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:735px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:125px\">\r\n			<p style=\"text-align:center\"><img alt=\"\" height=\"112\" src=\"/kcfinder/upload/images/F.Mustanov.jpg\" width=\"150\" /></p>\r\n\r\n			<p>&nbsp;</p>\r\n			</td>\r\n			<td style=\"width:378px\">\r\n			<p style=\"text-align:center\">Surxondaryo viloyati Qumqo&lsquo;rg&lsquo;on tumani qurilish bo&lsquo;limi &ndash;shahar bosh arxitektori &nbsp;<br />\r\n			&nbsp; &nbsp;&nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n\r\n			<p style=\"text-align:center\">Mustanov Faxriddin&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n\r\n			<p style=\"text-align:center\">(05.12.1985) yil Qumqo&lsquo;rg&lsquo;on &nbsp;tumani. Oliy, 2011 y. Toshkent AKI. Muxandis-quruvchi</p>\r\n			</td>\r\n			<td style=\"width:216px\">\r\n			<p>Tel:&nbsp;</p>\r\n\r\n			<p>Qabulxona: &nbsp;</p>\r\n\r\n			<p>&nbsp;(076) 46-5-21-01</p>\r\n\r\n			<p>E-mail: &nbsp; &nbsp; &nbsp;qumqorgon@davarx.uz</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n', 100, 1, 'qumqurgon-tuman', '<script type=\"text/javascript\" charset=\"utf-8\" async src=\"https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A6dfb68cab6a20d39bc050f4e5b7f89992f071eaf505b8de248f53c563e892c7f&amp;width=750&amp;height=400&amp;lang=ru_RU&amp;scroll=false\"></script>'),
(14, 'Surxondaryo viloyati Avtomobil yo\'llari xududiy boshqarmasi', 'Qilichov Jo\'ra Baxtiyorovich', '(0 376) 221-22-80 / (0 376) 223-19-22', 'surxondaryo@uzavtoyul.uz', 'Surxondaryo viloyati, Termiz shahri, 190100, Olmazor ko\'chasi, 42-uy', '<p>Surxondaryo viloyati, Termiz shahri, 190100, Olmazor ko&#39;chasi, 42-uy</p>\r\n', 193, 1, 'www.surxondaryoavtoyul.uz', '<script type=\"text/javascript\" charset=\"utf-8\" async src=\"https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A6dfb68cab6a20d39bc050f4e5b7f89992f071eaf505b8de248f53c563e892c7f&amp;width=750&amp;height=400&amp;lang=ru_RU&amp;scroll=false\"></script>\r\n'),
(15, 'Surxondaryo viloyati  Termiz tumani qurilish bo‘limi', ' Qilichov Jo\'ra Baxtiyorovich', ' (0 376) 221-22-80 / (0 376) 223-19-22', ' www.surxondaryoavtoyul.uz', 'Surxondaryo viloyati, Termiz shahri, 190100, Olmazor ko\'chasi, 42-uy', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\" style=\"width:777px\">\r\n	<tbody>\r\n		<tr>\r\n			<td style=\"width:101px\">\r\n			<p style=\"text-align:center\"><img alt=\"\" height=\"202\" src=\"/kcfinder/upload/images/Sh.Xolmatov.jpg\" width=\"150\" /></p>\r\n\r\n			<p style=\"text-align:center\">&nbsp;</p>\r\n			</td>\r\n			<td style=\"width:425px\">\r\n			<p style=\"text-align:center\">Surxondaryo viloyati Termiz tumani qurilish bo&lsquo;limi &ndash; tuman bosh arxitektori<br />\r\n			&nbsp; &nbsp; &nbsp;<br />\r\n			Xolmatov Sherzod</p>\r\n\r\n			<p style=\"text-align:center\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;&nbsp;</p>\r\n\r\n			<p style=\"text-align:center\">(11.03.1986) yil Angor&nbsp;tumani. Oliy, 2013 y. Samarkand DAKI. Muxandis-quruvchi</p>\r\n			</td>\r\n			<td style=\"width:184px\">\r\n			<p>Tel: &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;(97) 553-86-86</p>\r\n\r\n			<p>Qabulxona: &nbsp; (076) 36-32-262</p>\r\n\r\n			<p>E-mail: &nbsp; &nbsp; &nbsp;boysun@davarx.uz</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n\r\n<p>&nbsp;</p>\r\n', 103, 1, 'surxondaryo@uzavtoyul.uz', '<script type=\"text/javascript\" charset=\"utf-8\" async src=\"https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3A6dfb68cab6a20d39bc050f4e5b7f89992f071eaf505b8de248f53c563e892c7f&amp;width=750&amp;height=400&amp;lang=ru_RU&amp;scroll=false\"></script>');

-- --------------------------------------------------------

--
-- Структура таблицы `branch_lang`
--

CREATE TABLE `branch_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `title` varchar(500) DEFAULT NULL,
  `leader` varchar(500) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `leader_info` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `branch_lang`
--

INSERT INTO `branch_lang` (`id`, `lang`, `parent`, `title`, `leader`, `address`, `leader_info`) VALUES
(1, 2, 8, 'Sariosiya district construction department of Surkhandarya region', 'Shodmonov Murodullo Saloxiddinovich', 'Nobiohor mahalla, Sariosiya district, March 8, 4th house', '<table border=\"1\" cellpadding=\"1\" cellspacing=\"1\">\r\n	<tbody>\r\n		<tr>\r\n			<td><img alt=\"\" height=\"154\" src=\"http://terarx.uz/wp-content/uploads/2019/09/sari-osiyo-225x300.jpg\" width=\"128\" /></td>\r\n			<td>\r\n			<p style=\"text-align:center\">Sariosiya district construction department of Surkhandarya region - chief architect of the city</p>\r\n\r\n			<p style=\"text-align:center\">Shodmonov Murodullo Saloxiddinovich</p>\r\n\r\n			<p style=\"text-align:center\">(16.01.1985) year Denau district. Higher, 2012 in Samarkand. Construction of buildings and structures</p>\r\n			</td>\r\n			<td>\r\n			<p>Tel: (94) 462-17-19</p>\r\n\r\n			<p>Reception:</p>\r\n\r\n			<p>(076) 48-7-64-16</p>\r\n\r\n			<p>E-mail: sariosiyo@davarx.uz</p>\r\n			</td>\r\n		</tr>\r\n	</tbody>\r\n</table>\r\n'),
(2, 2, 14, 'Surkhandarya region Main Department of Construction', 'Saloxitdinov Alisher Tursunpulatovich', 'Surkhandarya region, Termez city, Amir Temur street 69', '<p>asd</p>\r\n'),
(3, 3, 14, 'Сурхандарьинская область Главное управление строительства', 'Салохитдинов Aлишер Турсунпулатович', 'Сурхандарьинская область, город Термез, улица Амира Темура 69', '<p>assd</p>\r\n');

-- --------------------------------------------------------

--
-- Структура таблицы `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `subject` varchar(255) DEFAULT NULL,
  `body` text NOT NULL,
  `created_date` datetime NOT NULL,
  `phone` text NOT NULL,
  `category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `district`
--

CREATE TABLE `district` (
  `id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `order_by` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `district`
--

INSERT INTO `district` (`id`, `parent`, `name`, `order_by`, `status`) VALUES
(94, 8, 'Oltinsoy tumani', 10, 1),
(95, 8, 'Angor tumani', 20, 1),
(96, 8, 'Boysun tumani', 30, 1),
(97, 8, 'Denov tumani', 40, 1),
(98, 8, 'Jarqo\'rgon tumani', 50, 1),
(99, 8, 'Qiziriq tumani', 60, 1),
(100, 8, 'Qumqo\'rg\'on tumani', 70, 1),
(101, 8, 'Muzrabot tumani', 80, 1),
(102, 8, 'Sariosiyo  tumani', 90, 1),
(103, 8, 'Termiz  tumani', 100, 1),
(104, 8, 'Uzun  tumani', 110, 1),
(105, 8, 'Sherobod  tumani', 120, 1),
(106, 8, 'Sho\'rchi  tumani', 130, 1),
(107, 8, 'Termiz shahar', 140, 1),
(193, 8, 'Viloyat', 1, 1),
(194, 8, 'Bandixon tumani', 160, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `district_lang`
--

CREATE TABLE `district_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `document`
--

CREATE TABLE `document` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `category` int(11) NOT NULL,
  `file` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `link` varchar(255) NOT NULL,
  `file_size` varchar(255) DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `document`
--

INSERT INTO `document` (`id`, `name`, `category`, `file`, `status`, `link`, `file_size`, `created_date`, `update_date`, `description`) VALUES
(1, 'Aholi punktlarini qurishda shaharsozlikni yanada takomillashtirishga doir qo‘shimcha chora-tadbirlar to‘g‘risida', 1, '08a7351c2a6a76427bf91963783fdd45.pdf', 1, 'https://lex.uz/docs/2181325', NULL, '2021-11-08 15:43:00', '2021-11-08 17:02:11', '<p>Aholi punktlarini qurishda shaharsozlik va yer to&lsquo;g&lsquo;risidagi qonun hujjatlariga qat&rsquo;iy rioya etilishini ta&rsquo;minlashga, shuningdek tadbirkorlik maqsadlari uchun yer ajratish tartibini yanada takomillashtirishga doir qo&lsquo;shimcha chora-tadbirlar to&lsquo;g&lsquo;risida (O&lsquo;zbekiston Respublikasi qonun hujjatlari to&lsquo;plami, 2017 y., 27-son, 623-modda)</p>\r\n');

-- --------------------------------------------------------

--
-- Структура таблицы `document_category`
--

CREATE TABLE `document_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `document_category`
--

INSERT INTO `document_category` (`id`, `name`, `status`) VALUES
(1, 'Normativ hujjatlar', 1),
(2, 'Shaharsozlik Xujjatlari', 1),
(3, 'O\'zgarish Kiritilayotgan Xujjatlar', 1),
(4, 'Ishlab Chiqilayotgan Xujjatlar', 1),
(5, 'Farmon', 1),
(6, 'Qaror', 1),
(7, 'Vazirlar Maxkamasining Farmon va Qarorlari', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `document_category_lang`
--

CREATE TABLE `document_category_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `document_lang`
--

CREATE TABLE `document_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` text,
  `description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `email`
--

CREATE TABLE `email` (
  `id` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `faq`
--

CREATE TABLE `faq` (
  `id` int(11) NOT NULL,
  `question` varchar(200) NOT NULL,
  `anons` varchar(600) DEFAULT NULL,
  `answer` text NOT NULL,
  `creator` int(11) DEFAULT NULL,
  `created_date` datetime NOT NULL,
  `order_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `name` text,
  `email` text,
  `phone` text,
  `category` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `faq`
--

INSERT INTO `faq` (`id`, `question`, `anons`, `answer`, `creator`, `created_date`, `order_by`, `status`, `name`, `email`, `phone`, `category`) VALUES
(1, 'Avtoyullarni kengaytirish  va yo‘l qurib berish masalasi', NULL, '<p>Umumfoydalanuvdagi avtomobil yo&lsquo;llarini qurish, rekonstruksiya qilish Investisiya dasturiga asosan amalga oshirilishi, Investisiya dasturi shakllantirilishida inobatga olinib, yo&lsquo;lni kengaytirish (rekonstruksiya) bo&lsquo;yicha takliflar Iqtisodiyot vazirligi, Moliya vazirligi va boshqa vazirlik va idoralarga kiritiladi.</p>\r\n', 1, '2021-11-07 14:15:52', 10, 1, NULL, NULL, NULL, NULL),
(2, 'Ish xaqi masalasi', NULL, '<p>O&lsquo;zbekiston Respublikasi Vazirlar Mahkamasining 1999 yil 17 noyabrdagi &ldquo;Ish haqining o&lsquo;z vaqtida to&lsquo;lanishi uchun vazirliklar, idoralar va xo&lsquo;jalik yurituvchi sub&rsquo;yektlar rahbarlarining javobgarligini oshirish yuzasidan qo&lsquo;shimcha chora-tadbirlar to&lsquo;g&lsquo;risida&rdquo;gi 504- sonli qaroriga asosan tizim korxona va tashkilotlari tomonidan ish xaqidan mavjud qarzdorliklari to&lsquo;lik to&lsquo;lab beriladi.</p>\r\n', 1, '2021-11-07 17:11:41', 20, 1, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `faq_lang`
--

CREATE TABLE `faq_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `question` varchar(200) NOT NULL,
  `anons` varchar(600) DEFAULT NULL,
  `answer` text NOT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `faq_lang`
--

INSERT INTO `faq_lang` (`id`, `lang`, `parent`, `question`, `anons`, `answer`, `status`) VALUES
(1, 3, 2, 'Вопрос заработной платы', NULL, '<p>Постановление Кабинета Министров Республики Узбекистан от 17 ноября 1999 г. &laquo;О дополнительных мерах по повышению ответственности руководителей министерств, ведомств и хозяйственных обществ за своевременную выплату заработной платы&raquo; 504 - Согласно постановлению №, г. предприятия и организации системы полностью погасят имеющуюся задолженность по заработной плате.</p>\r\n', NULL),
(2, 2, 2, 'The issue of wages', NULL, '<p>Resolution of the Cabinet of Ministers of the Republic of Uzbekistan dated November 17, 1999 &quot;On additional measures to increase the responsibility of heads of ministries, departments and business entities for the timely payment of wages&quot; 504 - According to the decision No., the enterprises and organizations of the system will pay off their existing wage arrears in full.</p>\r\n', NULL),
(3, 2, 1, 'Road widening and road construction', NULL, '<p>Proposals for the expansion (reconstruction) of public roads will be submitted to the Ministry of Economy, the Ministry of Finance and other ministries and departments, taking into account the fact that the construction and reconstruction of public roads will be carried out in accordance with the Investment Program.</p>\r\n', NULL),
(4, 3, 1, 'Расширение дороги и строительство дорог', NULL, '<p>Предложения по расширению (реконструкции) автомобильных дорог общего пользования будут представлены в Минэкономики, Минфин и другие министерства и ведомства с учетом того, что строительство и реконструкция автомобильных дорог общего пользования будет осуществляться в соответствии с Инвестиционная программа.</p>\r\n', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `faq_questions`
--

CREATE TABLE `faq_questions` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `question` text NOT NULL,
  `created_date` int(11) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `guests`
--

CREATE TABLE `guests` (
  `id` int(11) NOT NULL,
  `identity` varchar(96) NOT NULL,
  `lastdate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `guests`
--

INSERT INTO `guests` (`id`, `identity`, `lastdate`) VALUES
(1, '46155a0b93d55807a24f2d85776b8269.59fa270f3b5d0.363baea9cba210afac6d7a556fca596e30c46333', 1509566223),
(2, 'a4dae1464fd2def6b7b81c7022208539.59fb4757c3900.4b84b15bff6ee5796152495a230e45e3d7e947d9', 1509640023),
(3, '81f5eae0afbddc87bd0742a529a178bd.5a3fe7ce57df9.4b84b15bff6ee5796152495a230e45e3d7e947d9', 1514137550);

-- --------------------------------------------------------

--
-- Структура таблицы `image`
--

CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `album` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `guid` varchar(100) NOT NULL,
  `extension` varchar(6) NOT NULL,
  `size` int(11) NOT NULL,
  `creator` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `image`
--

INSERT INTO `image` (`id`, `album`, `name`, `guid`, `extension`, `size`, `creator`, `created_date`, `status`) VALUES
(1, 1, '1.jpg', '3bfbcf244c381f8d9f7159c80c73daf0.jpg', 'jpg', 373525, 1, '2021-11-05 00:00:00', 1),
(2, 1, '2.jpg', 'a94f195ff4fb87e54dec4fea7a3d4438.jpg', 'jpg', 139922, 1, '2021-11-05 00:00:00', 1),
(3, 1, '3.jpg', '5b5fe31d25bdfb19d79689fd6d284018.jpg', 'jpg', 133031, 1, '2021-11-05 00:00:00', 1),
(4, 1, '4.jpg', '74e9be5be5d162bfc3c5a1fbe0d057ab.jpg', 'jpg', 354130, 1, '2021-11-05 00:00:00', 1),
(5, 1, '5.jpg', 'a5d5b7bca3ce037a09f4b3220169bc2e.jpg', 'jpg', 373525, 1, '2021-11-05 00:00:00', 1),
(6, 1, 'build.jpg', 'e659cb758a3ff4429f3c36fd70f34a45.jpg', 'jpg', 116397, 1, '2021-11-05 00:00:00', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `languages`
--

CREATE TABLE `languages` (
  `id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `abb` varchar(5) NOT NULL,
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `languages`
--

INSERT INTO `languages` (`id`, `name`, `abb`, `status`) VALUES
(1, 'O`zbekcha', 'uz', 1),
(2, 'English', 'en', 1),
(3, 'Русский', 'ru', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `leader`
--

CREATE TABLE `leader` (
  `id` int(11) NOT NULL,
  `fio` varchar(255) NOT NULL,
  `phone` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `work_day` varchar(255) NOT NULL,
  `resume` longtext NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `task` longtext NOT NULL,
  `position` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `leader_lang`
--

CREATE TABLE `leader_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `fio` varchar(255) DEFAULT NULL,
  `work_day` varchar(255) DEFAULT NULL,
  `resume` longtext,
  `task` longtext,
  `position` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `menu`
--

CREATE TABLE `menu` (
  `id` int(11) NOT NULL,
  `type` int(11) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL,
  `name` varchar(100) NOT NULL,
  `url` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `order_by` int(11) DEFAULT NULL,
  `status` int(11) DEFAULT '0',
  `icon2` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu`
--

INSERT INTO `menu` (`id`, `type`, `parent`, `name`, `url`, `icon`, `order_by`, `status`, `icon2`) VALUES
(1, 0, NULL, 'Boshqarma', '/', NULL, 10, 1, NULL),
(2, 0, 1, 'Boshqarma haqida', '/page/test', NULL, 10, 1, NULL),
(3, 0, 1, 'Bo\'sh ish o\'rinlari', '/page/test', NULL, 20, 1, NULL),
(4, 0, 1, 'Raxbariyat', '/page/test', NULL, 30, 1, NULL),
(5, 0, 1, 'Asosiy vazifalar va funksiyalar', '/page/test', NULL, 40, 1, NULL),
(6, 0, 1, 'Tarkibiy tuzilma', '/page/test', NULL, 50, 1, NULL),
(7, 0, 1, 'Tuman va Shahar bo\'linma boshliqlari', '/page/test', NULL, 60, 1, NULL),
(9, 0, NULL, 'Faoliyat', '/', NULL, 20, 1, NULL),
(10, 0, NULL, 'Hujjatlar', '/', NULL, 30, 1, NULL),
(11, 0, NULL, 'Axborot xizmati', '/', NULL, 50, 1, NULL),
(12, 0, NULL, 'Interaktiv xizmatlar', '/', NULL, 60, 1, NULL),
(13, 0, NULL, 'Bog\'lanish', '/site/contacts', NULL, 70, 1, NULL),
(14, 0, 12, 'Murojaatnoma yuborish', '/page/test', NULL, 10, 1, NULL),
(15, 0, 11, 'Albomlar', '/album/', NULL, 1, 1, NULL),
(16, 0, 12, 'Savol Javoblar', '/site/faq', NULL, 20, 1, NULL),
(17, 0, 10, 'Farmonlar', '/documents/by-cat/2', NULL, 10, 1, NULL),
(18, 0, 10, 'Normativ hujjatlar', '/documents/by-cat/1', NULL, 20, 1, NULL),
(19, 0, 9, 'Ochiq ma\'lumotlar', '/page/test', NULL, 10, 1, NULL),
(20, 0, 9, 'Yoshlar siyosati', '/page/test', NULL, 20, 1, NULL),
(21, 0, 9, 'Statisik ma\'lumotlar', '/page/test', NULL, 30, 1, NULL),
(22, 0, 9, 'Ichki buyruqlar', '/page/test', NULL, 40, 1, NULL),
(23, 0, 10, 'Qarorlar', '/page/test', NULL, 30, 1, NULL),
(24, 0, 11, 'Yangiliklar', '/news/view-all', NULL, 20, 1, NULL),
(25, 0, 11, 'Huquqiy targ\'ibot', '/page/test', NULL, 40, 1, NULL),
(26, 0, 11, 'E\'lonlar', '/page/test', NULL, 50, 1, NULL),
(27, 0, 11, 'Tadbirlar', '/page/test', NULL, 60, 1, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `menu_lang`
--

CREATE TABLE `menu_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `menu_lang`
--

INSERT INTO `menu_lang` (`id`, `lang`, `parent`, `name`) VALUES
(1, 2, 27, 'Events'),
(2, 3, 27, 'События'),
(3, 3, 26, 'Объявления'),
(4, 2, 26, 'Notices'),
(5, 2, 25, 'Legal advocacy'),
(6, 3, 25, 'Правовая защита'),
(7, 3, 24, 'Новости'),
(8, 2, 24, 'News'),
(9, 2, 23, 'Decisions'),
(10, 3, 23, 'Решения'),
(11, 3, 22, 'Внутренние команды'),
(12, 2, 22, 'Internal commands'),
(13, 2, 21, 'Statistical data'),
(14, 3, 21, 'Статистические данные'),
(15, 3, 20, 'Молодежная политика'),
(16, 2, 20, 'Youth policy'),
(17, 2, 19, 'Open data'),
(18, 3, 19, 'Открытые данные'),
(19, 3, 18, 'Нормативная документация'),
(20, 2, 18, 'Normative documents'),
(21, 2, 17, 'Decrees'),
(22, 3, 17, 'Указы'),
(23, 3, 16, 'Вопрос Ответы'),
(24, 2, 16, 'Question Answers'),
(25, 2, 15, 'Albums'),
(26, 3, 15, 'Альбомы'),
(27, 3, 14, 'Подавать заявление'),
(28, 2, 14, 'Submit an application'),
(29, 2, 13, 'Contact'),
(30, 3, 13, 'Контакт'),
(31, 3, 12, 'Интерактивные сервисы'),
(32, 2, 12, 'Interactive services'),
(33, 3, 11, 'Информационная служба'),
(34, 2, 11, 'Information service'),
(35, 2, 10, 'Documents'),
(36, 3, 10, 'Документы'),
(37, 3, 9, 'Деятельность'),
(38, 2, 9, 'Activity'),
(39, 2, 7, 'Heads of District and City Departments'),
(40, 3, 7, 'Главы районных и городских управлений'),
(41, 3, 6, 'Структурная структура'),
(42, 2, 6, 'Structural structure'),
(43, 2, 5, 'Basic tasks and functions'),
(44, 3, 5, 'Основные задачи и функции'),
(45, 3, 4, 'Управление'),
(46, 2, 4, 'Management'),
(47, 2, 3, 'Vacancies'),
(48, 3, 3, 'Вакансии'),
(49, 3, 2, 'О Правлении'),
(50, 2, 2, 'About the Board'),
(51, 2, 1, 'Management'),
(52, 3, 1, 'Управление');

-- --------------------------------------------------------

--
-- Структура таблицы `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL DEFAULT '0',
  `language` varchar(16) NOT NULL DEFAULT '',
  `translation` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `message`
--

INSERT INTO `message` (`id`, `language`, `translation`) VALUES
(1, 'en', 'Interactive services'),
(1, 'ru', 'Интерактивные сервисы'),
(1, 'uz', 'Interaktiv xizmatlar'),
(2, 'en', 'To connect'),
(2, 'ru', 'Для подключения'),
(2, 'uz', 'Bog\'lanish uchun'),
(3, 'en', 'Read More'),
(3, 'ru', 'Более'),
(3, 'uz', 'Batafsil'),
(4, 'en', 'Latest news and messages'),
(4, 'ru', 'Последние новости и сообщения'),
(4, 'uz', 'So\'ngi yangilik va xabarlar'),
(5, 'en', 'Interactive services'),
(5, 'ru', 'Интерактивные сервисы'),
(5, 'uz', 'Interaktiv xizmatlar'),
(6, 'en', 'Home'),
(6, 'ru', 'Главный'),
(6, 'uz', 'Asosiy'),
(7, 'en', 'All news'),
(7, 'ru', 'Все новости'),
(7, 'uz', 'Barcha yangiliklar'),
(8, 'en', 'Search'),
(8, 'ru', 'Поиск'),
(8, 'uz', 'Izlash'),
(9, 'en', 'Albums'),
(9, 'ru', 'Альбомы'),
(9, 'uz', 'Albomlar'),
(10, 'en', 'Question Answers'),
(10, 'ru', 'Вопрос Ответы'),
(10, 'uz', 'Savol Javoblar'),
(11, 'en', 'Address'),
(11, 'ru', 'Адрес'),
(11, 'uz', 'Manzil'),
(12, 'en', 'Email'),
(12, 'ru', 'Эмаил'),
(12, 'uz', 'Email'),
(13, 'en', 'Phone Number'),
(13, 'ru', 'Номер телефона'),
(13, 'uz', 'Telefon Raqam'),
(14, 'en', 'Contact us'),
(14, 'ru', 'Связаться с нами'),
(14, 'uz', 'Biz bilan aloqa'),
(15, 'en', 'Contact'),
(15, 'ru', 'Контакт'),
(15, 'uz', 'Aloqa'),
(16, 'en', 'Documents'),
(16, 'ru', 'Документы'),
(16, 'uz', 'Hujjatlar'),
(17, 'en', 'All documents'),
(17, 'ru', 'Все документы'),
(17, 'uz', 'Barcha hujjatlar'),
(18, 'en', 'Download the document'),
(18, 'ru', 'Скачать документ'),
(18, 'uz', 'Hujjatni yuklab olish'),
(19, 'en', 'Source'),
(19, 'ru', 'Источник'),
(19, 'uz', 'Manba'),
(20, 'en', 'Useful pages'),
(20, 'ru', 'Полезные страницы'),
(20, 'uz', 'Foydali sahifalar'),
(21, 'en', 'Territorial administrations'),
(21, 'ru', 'Территориальные управления'),
(21, 'uz', 'Hududiy boshqarmalar'),
(22, 'en', 'Site Map'),
(22, 'ru', 'Карта сайта'),
(22, 'uz', 'Sayt Xaritasi'),
(23, 'en', 'State Emblem of the Republic of Uzbekistan'),
(23, 'ru', 'Государственный герб Республики Узбекистан'),
(23, 'uz', 'O\'zbekistin Respublikasi Davlat Gerbi'),
(24, 'en', 'National Flag of the Republic of Uzbekistan'),
(24, 'ru', 'Государственный Флаг Республики Узбекистан'),
(24, 'uz', 'O\'zbekistin Respublikasi Davlat Bayrog\'i'),
(25, 'en', 'National Anthem of the Republic of Uzbekistan'),
(25, 'ru', 'Государственный гимн Республики Узбекистан'),
(25, 'uz', 'O\'zbekistin Respublikasi Davlat Madhiyasi'),
(26, 'en', 'Name'),
(26, 'ru', 'Имя'),
(26, 'uz', 'Ism'),
(27, 'en', 'Text'),
(27, 'ru', 'Текст'),
(27, 'uz', 'Matn'),
(28, 'en', 'Send'),
(28, 'ru', 'Отправка'),
(28, 'uz', 'Yuborish'),
(29, 'en', 'Search results'),
(29, 'ru', 'Результаты поиска'),
(29, 'uz', 'Qidiruv natijalari'),
(30, 'en', 'The page is under development!'),
(30, 'ru', 'Страница в разработке!'),
(30, 'uz', 'Sahifa ishlab chiqilmoqda!'),
(31, 'en', 'This page does not exist yet!'),
(31, 'ru', 'Эта страница еще не существует!'),
(31, 'uz', 'Bu sahifa hozrcha mavjud emas!'),
(32, 'en', 'Page not found!'),
(32, 'ru', 'Страница не найдена!'),
(32, 'uz', 'Sahifa topilmadi!');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `visible` int(11) DEFAULT NULL,
  `creator` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` int(11) DEFAULT '0',
  `title` text NOT NULL,
  `second_title` text,
  `anons` varchar(300) NOT NULL,
  `body` text,
  `main_image` varchar(255) DEFAULT NULL,
  `secondary_image` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `seen_count` int(11) DEFAULT '0',
  `event_date` date DEFAULT NULL,
  `ban` tinyint(1) DEFAULT '0',
  `update_date` datetime NOT NULL,
  `slider` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news`
--

INSERT INTO `news` (`id`, `category`, `type`, `visible`, `creator`, `created_date`, `status`, `title`, `second_title`, `anons`, `body`, `main_image`, `secondary_image`, `icon`, `seen_count`, `event_date`, `ban`, `update_date`, `slider`) VALUES
(1, 1, NULL, NULL, 1, '2021-11-01 17:23:17', 1, 'Surxondaryo viloyati avtomobil yo\'llar hududiy boshqarmasi tarkibidagi Uzun Tuman ', 'Surxondaryo viloyati avtomobil yo\'llar hududiy boshqarmasi tarkibidagi Uzun Tuman ', 'Surxondaryo viloyati avtomobil yo\'llar hududiy boshqarmasi tarkibidagi Uzun Tuman yo\'llardan foydalanish unitar korxonasi tomonidan Obod qishloq Davlat dasturi doirasida Uzun tumani Fayzobod MFY ko\'chalari joriy ta\'mirlash ishlari olib borilmoqda.', '<p>Surxondaryo viloyati avtomobil yo&#39;llar hududiy boshqarmasi tarkibidagi Uzun Tuman yo&#39;llardan foydalanish unitar korxonasi tomonidan Obod qishloq Davlat dasturi doirasida Uzun tumani Fayzobod MFY ko&#39;chalari joriy ta&#39;mirlash ishlari olib borilmoqda.</p>\r\n', '22c489a51f388225f694f05939995309.jpg', NULL, NULL, 13, '2021-11-01', 0, '2021-11-10 19:12:21', 1),
(2, 1, NULL, NULL, 1, '2021-11-05 13:56:46', 1, 'Angor tumani Zang Gilambop MFYning ko\'chalarda joriy ta\'mirlash ishlari', 'Angor tumani Zang Gilambop MFYning ko\'chalarda joriy ta\'mirlash ishlari', 'Surxondaryo viloyati avtomobil yo\'llar hududiy boshqarmasi tarkibidagi Angor Tumani yo\'llardan foydalanish unitar korxonasi tomonidan Angor tumani Zang Gilambop MFYning ko\'chalarda joriy ta\'mirlash ishlari olib borildi.', '<p>Surxondaryo viloyati avtomobil yo&#39;llar hududiy boshqarmasi tarkibidagi Uzun Tuman yo&#39;llardan foydalanish unitar korxonasi tomonidan Obod qishloq Davlat dasturi doirasida Uzun tumani Fayzobod MFY ko&#39;chalari joriy ta&#39;mirlash ishlari olib borilmoqda.</p>\r\n', 'e607690c4ef55afaa67851d821422a45.jpg', NULL, NULL, 29, '2021-11-02', 0, '2021-11-06 19:34:14', 1),
(3, 1, NULL, NULL, 1, '2021-11-05 13:57:32', 1, '\"Markaziy Surxon\"MFYning ichki ko\'chalarida asfaltobeton qoplamasi yotqizish ishlari', '\"Markaziy Surxon\"MFYning ichki ko\'chalarida asfaltobeton qoplamasi yotqizish ishlari', 'Surxondaryo viloyati avtomobil yo\'llar hududiy boshqarmasi tarkibidagi Jarqo\'rg\'on tuman yo\'llardan foydalanish unitar korxonasi tomonidan Jarqo\'rg\'on tuman \"Markaziy Surxon\"MFYning ichki ko\'chalarida asfaltobeton qoplamasi yotqizish ishlari olib borilmoqda.', '', '0c23da7cb25eb8adbc85f1f9055432fb.jpg', NULL, NULL, 0, '2021-11-01', 0, '2021-11-05 13:57:32', 1),
(4, 1, NULL, NULL, 1, '2021-11-10 19:09:18', 1, 'Surxondaryo viloyati avtomobil yo\'llar hududiy boshqarmasi tarkibidagi Muzrabot tumani yo\'llardan', 'Surxondaryo viloyati avtomobil yo\'llar hududiy boshqarmasi tarkibidagi Muzrabot tumani yo\'llardan', 'Surxondaryo viloyati avtomobil yo\'llar hududiy boshqarmasi tarkibidagi Muzrabot tumani yo\'llardan', '<p>Surxondaryo viloyati avtomobil yo&#39;llar hududiy boshqarmasi tarkibidagi Muzrabot tumani yo&#39;llardan foydalanish unitar korxonasi tomonidan Muzrabot tumani Chegarachi MFYning Markaziy ko&#39;chasi Joriy ta&#39;mirlash ishlari olib borildi.</p>\r\n', 'd695fd6bb9b1c45b197547c74e310ddb.jpg', NULL, NULL, 0, NULL, 0, '2021-11-10 19:09:18', 0),
(5, 1, NULL, NULL, 1, '2021-11-10 19:15:43', 1, 'Surxondaryo viloyati avtomobil yo\'llar hududiy boshqarmasi tarkibidagi Tuman yo\'llardan foydalanish ', 'Surxondaryo viloyati avtomobil yo\'llar hududiy boshqarmasi tarkibidagi Tuman yo\'llardan foydalanish ', 'Surxondaryo viloyati avtomobil yo\'llar hududiy boshqarmasi tarkibidagi Tuman yo\'llardan foydalanish unitar korxonalari ishchi xodimlari  Ekologik vaziyati yaxshilash hamda havo tozaligini yaxshilash maqsadida ummum milliy loyihasi ishtirok e\'tmoqda.', '<p>Surxondaryo viloyati avtomobil yo&#39;llar hududiy boshqarmasi tarkibidagi Tuman yo&#39;llardan foydalanish unitar korxonalari ishchi xodimlari &nbsp;Ekologik vaziyati yaxshilash hamda havo tozaligini yaxshilash maqsadida ummum milliy loyihasi ishtirok e&#39;tmoqda.</p>\r\n', '2badb763df4faafee27611f1491fb237.jpg', NULL, NULL, 0, NULL, 0, '2021-11-10 19:15:43', 0),
(6, 1, NULL, NULL, 1, '2021-11-10 19:18:09', 1, 'Surxondaryo viloyati avtomobil yo\'llar hududiy boshqarmasi tarkibidagi Sariosiyo tumani yo\'llardan foydalanish unitar korxonasi tomonidan', 'Surxondaryo viloyati avtomobil yo\'llar hududiy boshqarmasi tarkibidagi Sariosiyo tumani yo\'llardan foydalanish unitar korxonasi tomonidan', 'Surxondaryo viloyati avtomobil yo\'llar hududiy boshqarmasi tarkibidagi Sariosiyo tumani yo\'llardan foydalanish unitar korxonasi tomonidan Sariosiyo tumani Obod qishloq davlat dasturi doirasida Marjona MFY Mustaqillik ko\'chasi asfatabeton qoplamasi yotqizish ishlari olib borildi.', '<p>Yo&#39;l qurmoq-savob,<br />\r\nYo&#39;l yurmoq- rohmat.</p>\r\n\r\n<p>Surxondaryo viloyati avtomobil yo&#39;llar hududiy boshqarmasi tarkibidagi Sariosiyo tumani yo&#39;llardan foydalanish unitar korxonasi tomonidan Sariosiyo tumani Obod qishloq davlat dasturi doirasida Marjona MFY Mustaqillik ko&#39;chasi asfatabeton qoplamasi yotqizish ishlari olib borildi.</p>\r\n\r\n<p>Yo&#39;llar Ellarni-Ellarga, manzillarni - manzillarga tutashtiruvchi muhim vositadir.</p>\r\n', '11366d58e86f4e4a174057eca3a90d2e.jpg', NULL, NULL, 0, NULL, 0, '2021-11-10 19:18:09', 0);

-- --------------------------------------------------------

--
-- Структура таблицы `news_category`
--

CREATE TABLE `news_category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(11) DEFAULT '0',
  `order_by` int(11) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news_category`
--

INSERT INTO `news_category` (`id`, `name`, `status`, `order_by`, `parent`) VALUES
(1, 'O\'zbekiston yangiliklari', 1, 10, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `news_category_lang`
--

CREATE TABLE `news_category_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news_category_lang`
--

INSERT INTO `news_category_lang` (`id`, `lang`, `parent`, `name`) VALUES
(1, 2, 1, 'Uzbekistan news'),
(2, 3, 1, 'Новости Узбекистана');

-- --------------------------------------------------------

--
-- Структура таблицы `news_lang`
--

CREATE TABLE `news_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `second_title` varchar(100) DEFAULT NULL,
  `anons` varchar(300) NOT NULL,
  `body` text,
  `main_image` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `news_lang`
--

INSERT INTO `news_lang` (`id`, `lang`, `parent`, `title`, `second_title`, `anons`, `body`, `main_image`, `status`) VALUES
(1, 2, 3, 'Laying of asphalt concrete pavement on the inner streets of \"Central Surkhan\" MFY', NULL, 'The Jarkurgan district unitary enterprise for the use of roads within the Territorial Department of Motor Roads of Surkhandarya region is laying asphalt concrete pavement on the inner streets of the Central Surkhan Farm of Jarkurgan district.', '<p>The Jarkurgan district unitary enterprise for the use of roads within the Territorial Department of Motor Roads of Surkhandarya region is laying asphalt concrete pavement on the inner streets of the Central Surkhan Farm of Jarkurgan district.</p>\r\n', '7f64612e55f3ef18d7d3de87d7d3a3dc.jpg', 1),
(2, 3, 3, 'Укладка асфальтобетонного покрытия внутренних улиц МФМ «Центральный Сурхан».', NULL, 'УПД Джаркурганского района в составе территориального управления автомобильных дорог Сурхандарьинской области укладывает асфальтобетонное покрытие внутренних улиц фермерского хозяйства «Центральный Сурхан» Джаркурганского района.', '<p>УПД Джаркурганского района в составе территориального управления автомобильных дорог Сурхандарьинской области укладывает асфальтобетонное покрытие внутренних улиц фермерского хозяйства &laquo;Центральный Сурхан&raquo; Джаркурганского района.</p>\r\n', '7e2f0b0aee48656ce3a4271d8e85b21c.jpg', 1),
(3, 3, 4, 'С дорог Музработского района, входящего в Территориальное управление ', NULL, 'С дорог Музработского района, входящего в Территориальное управление автомобильных дорог Сурхандарьинской области.', '<p>УП дорожного хозяйства Музработского района Территориального управления автомобильных дорог Сурхандарьинской области проводило текущий ремонт центральной улицы Пограничного хозяйства Музработского района.</p>\r\n', NULL, 1),
(4, 2, 4, 'Muzrabot district is part of the Surkhandarya regional department of highways', NULL, 'Muzrabot district is part of the Surkhandarya regional department of highways', '<p>The unitary enterprise of road use of Muzrabot district within the Territorial Department of Motor Roads of Surkhandarya region carried out the current repair work on the Central Street of the Border Farm of Muzrabot district.</p>\r\n', NULL, 1),
(5, 2, 1, 'Uzun District of the Surkhandarya Regional Department of Motor Roads', NULL, 'Uzun District of the Surkhandarya Regional Department of Motor Roads', '<p>The Uzun Tuman unitary enterprise for the use of roads within the Surkhandarya regional department of highways is carrying out repair work on the streets of Fayzabad MFY in Uzun district within the framework of the State Program for Rural Development.</p>\r\n', NULL, 1),
(6, 3, 1, 'Узунский район Сурхандарьинского областного управления автомобильных дорог', NULL, 'Узунский район Сурхандарьинского областного управления автомобильных дорог', '<p>УП &laquo;Узун Туман&raquo; по эксплуатации дорог Территориального управления автомобильных дорог Сурхандарьинской области проводит ремонтные работы на улицах Файзабадского МФЮ Узунского района в рамках Государственной программы развития села.</p>\r\n', NULL, 1),
(7, 3, 2, 'Текущие ремонтные работы на улице Занг Гиламбоп МФЮ Ангорского района', NULL, 'Дорожное унитарное предприятие Ангорского района Территориального управления автомобильных дорог Сурхандарьинской области провело текущий ремонт на улицах хутора Занг Гиламбоп Ангорского района.', '<p>УП &laquo;Узун Туман&raquo; по эксплуатации дорог Территориального управления автомобильных дорог Сурхандарьинской области проводит ремонтные работы на улицах Файзабадского МФЮ Узунского района в рамках Государственной программы развития села.</p>\r\n', NULL, 1),
(8, 2, 2, 'Current repair works on the streets of Zang Gilambop MFY of Angor district', NULL, 'Angor District Unitary Enterprise for Road Use within the Territorial Department of Motor Roads of Surkhandarya region carried out current repair work on the streets of Zang Gilambop Farm of Angor district.', '<p>The Uzun Tuman unitary enterprise for the use of roads within the Surkhandarya regional department of highways is carrying out repair work on the streets of Fayzabad MFY in Uzun district within the framework of the State Program for Rural Development.</p>\r\n', NULL, 1),
(9, 3, 5, 'Сотрудники унитарных предприятий районного использования автомобильных дорог ', NULL, 'Сотрудники унитарных предприятий районного использования автомобильных дорог Территориального управления автомобильных дорог Сурхандарьинской области участвуют в', '<p>Сотрудники унитарных предприятий районного использования автомобильных дорог Территориального управления автомобильных дорог Сурхандарьинской области участвуют в общероссийском проекте по улучшению экологической обстановки и улучшению качества воздуха.</p>\r\n', NULL, 1),
(10, 2, 5, 'Employees of unitary enterprises of district road use within the Territorial Department of Motor', NULL, 'Employees of unitary enterprises of district road use within the Territorial Department of Motor Roads of Surkhandarya region are participating in a nationwide project to improve the environmental situation and improve air quality.', '<p>Employees of unitary enterprises of district road use within the Territorial Department of Motor Roads of Surkhandarya region are participating in a nationwide project to improve the environmental situation and improve air quality.</p>\r\n', NULL, 1),
(11, 2, 6, 'As part of the state program of rural development of Sariosiya district, the unitary', NULL, 'As part of the state program of rural development of Sariosiya district, the unitary enterprise of road use of Sariosiya district within the Territorial Department of Motor Roads of Surkhandarya region carried out asphalt paving of Mustaqillik Street, Marjona MFY.', '<p>The reward of building a road,<br />\r\nWalking - thank you.</p>\r\n\r\n<p>As part of the state program of rural development of Sariosiya district, the unitary enterprise of road use of Sariosiya district within the Territorial Department of Motor Roads of Surkhandarya region carried out asphalt paving of Mustaqillik Street, Marjona MFY.</p>\r\n\r\n<p>Roads are an important means of connecting Hands to Hands, Addresses to Addresses.</p>\r\n', NULL, 1),
(12, 3, 6, 'В рамках государственной программы развития села Сариосийского района', NULL, 'В рамках государственной программы развития села Сариосийского района унитарное предприятие дорожного хозяйства Сариосийского района Территориального управления автомобильных дорог Сурхандарьинской области выполнило асфальтирование улицы Мустакиллик Марджонского МФЮ.', '<p>Награда за строительство дороги,<br />\r\nПрогулка - спасибо.</p>\r\n\r\n<p>В рамках государственной программы развития села Сариосийского района унитарное предприятие дорожного хозяйства Сариосийского района Территориального управления автомобильных дорог Сурхандарьинской области выполнило асфальтирование улицы Мустакиллик Марджонского МФЮ.</p>\r\n\r\n<p>Дороги являются важным средством соединения рук с руками, адресов с адресами.</p>\r\n', NULL, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `page`
--

CREATE TABLE `page` (
  `id` int(11) NOT NULL,
  `category` varchar(50) DEFAULT NULL,
  `creator` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `status` int(11) DEFAULT '0',
  `title` text NOT NULL,
  `second_title` text,
  `keywords` varchar(300) NOT NULL,
  `body` text,
  `main_image` varchar(255) DEFAULT NULL,
  `secondary_image` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `seen_count` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `page_lang`
--

CREATE TABLE `page_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `second_title` varchar(100) DEFAULT NULL,
  `keywords` varchar(300) NOT NULL,
  `body` text,
  `main_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `partner`
--

CREATE TABLE `partner` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `link` text NOT NULL,
  `status` int(11) NOT NULL,
  `image` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `partner`
--

INSERT INTO `partner` (`id`, `title`, `link`, `status`, `image`) VALUES
(3, 'O\'zbekiston Respublikasi Oliy Majlisi Qonunchilik Palatasi', 'http://parliament.gov.uz/uz/', 1, 'fff9953d476a9d10adbe7cae4e424e9a.png'),
(4, 'O\'zbekiston Respublikasi Prezidenti rasmiy veb-sayti', 'https://president.uz/oz', 1, 'b8a8e31c1c3908e5c99ffadd5a58dd81.png'),
(5, 'Yagona interaktiv davlat xizmatlar portali', 'https://my.gov.uz/uz', 1, '154dc668becbbc9daff76f80e22fe9c5.jpeg'),
(6, 'Harakatlar strategiyasi', 'http://strategy.gov.uz/uz', 1, 'bed7a0f43324584052791e5eabd11f4b.png'),
(7, 'O\'zbekiston Respublikasi Ochiq ma\'lumotlar portali', 'https://data.gov.uz/uz', 1, '9bac606b8ed15f15cc3ab35f779a1711.png'),
(8, 'O\'zbekiston Respublikasi Davlat dasturlari portali', 'http://dd.gov.uz/uz', 1, 'e218f93a181a65bd92f354d6a8346287.png');

-- --------------------------------------------------------

--
-- Структура таблицы `partner_lang`
--

CREATE TABLE `partner_lang` (
  `id` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `partner_lang`
--

INSERT INTO `partner_lang` (`id`, `parent`, `lang`, `title`) VALUES
(1, 2, 3, 'Государственный испытательный центр'),
(2, 2, 2, 'State Testing Center'),
(3, 3, 2, 'Legislative Chamber of the Oliy Majlis of the Republic of Uzbekistan'),
(4, 3, 3, 'Законодательная палата Олий Мажлиса Республики Узбекистан'),
(5, 4, 2, 'Официальный сайт Президента Республики Узбекистан'),
(6, 4, 3, 'Официальный сайт Президента Республики Узбекистан'),
(7, 5, 3, 'Единый интерактивный портал государственных услуг'),
(8, 5, 2, 'Single interactive public services portal'),
(9, 6, 3, 'Стратегия действий'),
(10, 6, 3, 'Стратегия действий'),
(11, 6, 2, 'Action strategy'),
(12, 7, 2, 'Open Data Portal of the Republic of Uzbekistan'),
(13, 7, 3, 'Портал открытых данных Республики Узбекистан'),
(14, 8, 3, 'Портал государственных программ Республики Узбекистан'),
(15, 8, 2, 'Portal of State Programs of the Republic of Uzbekistan');

-- --------------------------------------------------------

--
-- Структура таблицы `pcounter_save`
--

CREATE TABLE `pcounter_save` (
  `save_name` varchar(10) NOT NULL,
  `save_value` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `pcounter_users`
--

CREATE TABLE `pcounter_users` (
  `user_ip` varchar(255) NOT NULL,
  `user_time` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `pcounter_users`
--

INSERT INTO `pcounter_users` (`user_ip`, `user_time`) VALUES
('188e9e131e71966dd788ba05403cbc4c', 1636558071);

-- --------------------------------------------------------

--
-- Структура таблицы `polls`
--

CREATE TABLE `polls` (
  `id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `creator` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `poll_options`
--

CREATE TABLE `poll_options` (
  `id` int(11) NOT NULL,
  `poll` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `category` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `visible` int(11) DEFAULT NULL,
  `creator` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` int(11) DEFAULT '0',
  `title` text NOT NULL,
  `second_title` text,
  `anons` varchar(300) NOT NULL,
  `body` text,
  `main_image` varchar(255) DEFAULT NULL,
  `secondary_image` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `seen_count` int(11) DEFAULT '0',
  `event_date` date DEFAULT NULL,
  `ban` tinyint(1) DEFAULT '0',
  `update_date` datetime NOT NULL,
  `slider` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `post_category`
--

CREATE TABLE `post_category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `status` int(11) DEFAULT '0',
  `order_by` int(11) DEFAULT NULL,
  `parent` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `post_category`
--

INSERT INTO `post_category` (`id`, `name`, `status`, `order_by`, `parent`) VALUES
(1, 'Interaktiv xizmatlar', 1, 10, NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `post_category_lang`
--

CREATE TABLE `post_category_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `post_lang`
--

CREATE TABLE `post_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `second_title` varchar(100) DEFAULT NULL,
  `anons` varchar(300) NOT NULL,
  `body` text,
  `main_image` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `name` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `category` int(11) NOT NULL,
  `file` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `file_size` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_date` datetime DEFAULT NULL,
  `update_date` datetime DEFAULT NULL,
  `district` int(11) NOT NULL,
  `description` longtext COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `project_category`
--

CREATE TABLE `project_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `project_category_lang`
--

CREATE TABLE `project_category_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `project_lang`
--

CREATE TABLE `project_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci,
  `address` varchar(500) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `public_services`
--

CREATE TABLE `public_services` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `link` varchar(255) NOT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `category` int(11) NOT NULL,
  `main_image` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `public_services`
--

INSERT INTO `public_services` (`id`, `name`, `link`, `icon`, `status`, `category`, `main_image`) VALUES
(1, 'Qo\'mita raisi virtual qabulxonasi', '/', '', 1, 2, 'b0b3779dde4471986534ae3a00adeeb5.jpg'),
(2, 'Rahbar qabuliga yozilish', '/', NULL, 1, 2, '00e179544fe9e3e053029c3cd9d5b99d.jpg'),
(3, 'Avtomobil yo\'llari qurish', '/', NULL, 1, 2, 'e1944b859601767424465681d3afde39.jpg'),
(4, 'Savol va Javoblar', '/', NULL, 1, 2, 'd227e402282614eef38329004dafbfd7.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `public_services_category`
--

CREATE TABLE `public_services_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `public_services_category`
--

INSERT INTO `public_services_category` (`id`, `name`, `status`) VALUES
(1, 'Davlat Xizmatlari', 1),
(2, 'Interaktiv Davlat Xizmatlari', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `public_services_category_lang`
--

CREATE TABLE `public_services_category_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `public_services_category_lang`
--

INSERT INTO `public_services_category_lang` (`id`, `lang`, `parent`, `name`) VALUES
(1, 2, 1, 'Public Services'),
(2, 3, 1, 'Общественные услуги'),
(3, 3, 2, 'Интерактивные государственные службы'),
(4, 2, 2, 'Interactive Public Services');

-- --------------------------------------------------------

--
-- Структура таблицы `public_services_lang`
--

CREATE TABLE `public_services_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `public_services_lang`
--

INSERT INTO `public_services_lang` (`id`, `lang`, `parent`, `name`) VALUES
(1, 3, 1, 'Виртуальная приемная председателя комитета'),
(2, 2, 1, 'Virtual reception of the chairman of the committee'),
(3, 2, 2, 'Sign up for a leader\'s appointment'),
(4, 3, 2, 'Записаться на прием к руководителю'),
(5, 3, 3, 'Строительство автомобильных дорог'),
(6, 2, 3, 'Construction of highways'),
(7, 2, 4, 'Questions and Answers'),
(8, 3, 4, 'Вопросы и ответы');

-- --------------------------------------------------------

--
-- Структура таблицы `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `order_by` int(11) DEFAULT '0',
  `status` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `region`
--

INSERT INTO `region` (`id`, `name`, `order_by`, `status`) VALUES
(1, 'Andijon viloyati', 10, 1),
(2, 'Buxoro viloyati', 20, 1),
(3, 'Jizzax viloyati', 30, 1),
(4, 'Qashqadaryo viloyati', 40, 1),
(5, 'Navoiy viloyati', 50, 1),
(6, 'Namangan viloyati', 60, 1),
(7, 'Samarqand viloyati', 70, 1),
(8, 'Surxondaryo viloyati', 80, 1),
(9, 'Sirdaryo viloyati', 90, 1),
(10, 'Toshkent viloyati', 100, 1),
(11, 'Ферганская область', 110, 1),
(12, 'Xorazm viloyati', 120, 1),
(13, 'Qoraqalpog\'iston respublikasi', 130, 1),
(14, 'Toshkent shahri', 140, 1);

-- --------------------------------------------------------

--
-- Структура таблицы `region_lang`
--

CREATE TABLE `region_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `region_lang`
--

INSERT INTO `region_lang` (`id`, `lang`, `parent`, `name`) VALUES
(1, 1, 1, 'Андижанская область'),
(2, 2, 1, 'Andijan Region'),
(3, 2, 2, 'Bukhara Region'),
(4, 1, 2, 'Бухарская область'),
(5, 1, 3, 'Джизакская область'),
(6, 2, 3, 'Jizzakh Region'),
(7, 1, 4, 'Кашкадарьинская область'),
(8, 2, 4, 'Qashqadaryo Region'),
(9, 1, 5, 'Навоийская область'),
(10, 2, 5, 'Navoiy Region'),
(11, 1, 6, 'Наманганская область'),
(12, 2, 6, 'Namangan Region'),
(13, 2, 7, 'Samarqand Region'),
(14, 2, 7, 'Samarqand Region'),
(15, 1, 7, 'Самаркандская область'),
(16, 1, 8, 'Самаркандская область'),
(17, 2, 8, 'Surxondaryo Region'),
(18, 1, 9, 'Сырдарьинская область'),
(19, 2, 9, 'Sirdaryo Region'),
(20, 1, 10, 'Ташкентская область'),
(21, 2, 10, 'Tashkent Region'),
(22, 1, 12, 'Хорезмская область'),
(23, 2, 12, 'Xorazm Region'),
(24, 1, 13, 'Каракалпакстан'),
(25, 2, 13, 'Karakalpakstan'),
(26, 1, 14, 'Ташкент'),
(27, 2, 14, 'Tashkent city'),
(28, 3, 14, 'Toshkent shahri'),
(29, 3, 11, 'Farg\'ona viloyati');

-- --------------------------------------------------------

--
-- Структура таблицы `region_settings`
--

CREATE TABLE `region_settings` (
  `id` int(11) NOT NULL,
  `region_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `full_name` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `leader_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `call_center` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `map_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `region_settings`
--

INSERT INTO `region_settings` (`id`, `region_id`, `full_name`, `leader_name`, `phone1`, `phone2`, `email`, `call_center`, `address`, `map_id`) VALUES
(1, 'angor', 'Surxondaryo viloyat Qurilish bosh boshqarmasi, Angor tuman qurilish bo‘limi', 'Shukurov Rustam', '998(97)-850-40-33 ', '', 'angor@oncon.uz', '(076) 31-21-659', 'Angor Tumani', 2),
(2, 'boysun', 'Surxondaryo viloyat Qurilish bosh boshqarmasi, Boysun tuman qurilish bo‘limi', 'Soibnazarov Akmal Mamarajabovich', '99897-848-20-44', '(94) 465-30-30', 'boysun@oncon.uz', '(076) 33-5-22-92', '', 3),
(3, 'bandixon', 'Surxondaryo viloyat Qurilish bosh boshqarmasi, Bandixon tuman qurilish bo‘limi', 'Fayzullayev Sherzod Ergashovich', '99899-563-86-86', '', 'bandixon@oncon.uz', '', '', 0),
(4, 'muzrabot', 'Surxondaryo viloyat Qurilish bosh boshqarmasi, Muzrabot tuman qurilish bo‘limi', 'Islomov Sirojiddin Berdinazarovich', '99897-848-20-33 ', '(91) 910-89-83', 'muzrabot@oncon.uz', '', '', 6),
(5, 'denov', 'Surxondaryo viloyat Qurilish bosh boshqarmasi, Denov tuman qurilish bo‘limi', 'Elmurodov Abduxamid Murtazaliyevich', '99897-848-40-66 ', '99891580-40-00', 'denov@oncon.uz', '(076)-41-31-980', '', 4),
(6, 'jarqorgon', 'Surxondaryo viloyat Qurilish bosh boshqarmasi, Jarqurg‘on tuman qurilish bo‘limi', 'Chorshanbiyev Sharofiddin Jumayevich', '99897-848-30-55', '', 'jarqorgon@oncon.uz', '(76) 43-22-251', '', 5),
(7, 'qumqorgon', 'Surxondaryo viloyat Qurilish bosh boshqarmasi, Qumqurg‘on tuman qurilish bo‘limi', 'Mustanov Faxriddin', '', '', 'qumqorgon@oncon.uz', '(076) 46-5-21-01', '', 13),
(8, 'qiziriq', 'Surxondaryo viloyat Qurilish bosh boshqarmasi, Qiziriq tuman qurilish bo‘limi', 'Xujamqulov Qaxramon Jamgirovich', '99891-906-20-25', '', 'qiziriq@oncon.uz', '(076) 35-9-16-59', '', 12),
(9, 'oltinsoy', 'Surxondaryo viloyat Qurilish bosh boshqarmasi, Oltinsoy tuman qurilish bo‘limi', 'Eshmuratov Ruslan Rustamovich', '99891-547-33-93', '', 'oltinsoy@oncon.uz', '(076) 34-91-486', '', 7),
(10, 'sariosiyo', 'Surxondaryo viloyat Qurilish bosh boshqarmasi, Sariosiyo tuman qurilish bo‘limi', 'So‘fiyev Manuchexr Safaraliyevich', '99897-352-70-07', '99893-335-77-07', 'sariosiyo@oncon.uz', '(076) 487-64-64', '', 8),
(11, 'termiztuman', 'Surxondaryo viloyat Qurilish bosh boshqarmasi, Termiz tuman qurilish bo‘limi', 'Xolmatov Sherzod Xolimqulovich', '99897-553-86-86', '', 'termiztuman@oncon.uz', '(076) 36-32-262', '', 15),
(12, 'uzun', 'Surxondaryo viloyat Qurilish bosh boshqarmasi, Uzun tuman qurilish bo‘limi', 'Abdullayev Boxodir Usarovich', '99894-461-24-77', '', 'uzun@oncon.uz', '(076) 44-7-34-65', '', 9),
(13, 'sherabod', 'Surxondaryo viloyat Qurilish bosh boshqarmasi, Sherabod tuman qurilish bo‘limi', 'Obruyev Isroil Ibroximovich', '99897-848-30-66', '', 'sherabod@oncon.uz', '(076) 32-2-19-80', '', 10),
(14, 'shorchi', 'Surxondaryo viloyat Qurilish bosh boshqarmasi, Shurchi tuman qurilish bo‘limi', 'Mamadiyev Najmiddin Baxodirovich', '99891-900-48-65', '', 'shorchi@oncon.uz', ' (076) 45-7-46-49', '', 11),
(15, 'termizsh', 'Surxondaryo viloyat Qurilish bosh boshqarmasi, Termiz shaxar qurilish bo‘limi', 'Rabbimov Aziz Olimdjonvich', '99897-848-50-11', '99899-422-01-01', 'termizsh@oncon.uz', '(076) 22-3-10-73', 'Termiz shahar', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `report`
--

CREATE TABLE `report` (
  `id` int(11) NOT NULL,
  `document_type` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  `month` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `closed_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `report_auksion`
--

CREATE TABLE `report_auksion` (
  `id` int(11) NOT NULL,
  `auksion_address` varchar(500) NOT NULL,
  `foydalanish_maqsadi` varchar(500) NOT NULL,
  `maydoni` varchar(100) NOT NULL,
  `auksion_loyihasi` varchar(500) NOT NULL,
  `xulosa_date` date NOT NULL,
  `xulosa_number` int(11) NOT NULL,
  `xulosa_mazmuni` varchar(255) NOT NULL,
  `rad_sababi` varchar(500) NOT NULL,
  `topshirish_sanasi` date NOT NULL,
  `topshirish_number` int(11) NOT NULL,
  `savdo_golibi` varchar(255) NOT NULL,
  `report_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `report_foydalanishga_qabulqilish`
--

CREATE TABLE `report_foydalanishga_qabulqilish` (
  `id` int(11) NOT NULL,
  `hudud_name` varchar(500) NOT NULL,
  `ruxsatnoma_fish` varchar(255) NOT NULL,
  `ruxsatnoma_date` date NOT NULL,
  `xulosa_date` date NOT NULL,
  `xulosa_number` int(11) NOT NULL,
  `natija_ijobiy` varchar(255) NOT NULL,
  `natija_rad` varchar(255) NOT NULL,
  `rad_sababi` varchar(500) NOT NULL,
  `report_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `report_ijro`
--

CREATE TABLE `report_ijro` (
  `id` int(11) NOT NULL,
  `send_date` date NOT NULL,
  `send_number` varchar(500) NOT NULL,
  `report_name` varchar(500) NOT NULL,
  `deadline` int(11) NOT NULL,
  `responsible_man` varchar(500) NOT NULL,
  `position` varchar(500) NOT NULL,
  `execution_state` varchar(500) NOT NULL,
  `report_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `report_murojat`
--

CREATE TABLE `report_murojat` (
  `id` int(11) NOT NULL,
  `xudud_nomi` varchar(500) NOT NULL,
  `murojat_fish` varchar(255) NOT NULL,
  `murojat_date` date NOT NULL,
  `qabul_qilish_date` date NOT NULL,
  `rad_qilish_date` date NOT NULL,
  `rad_sabablari` varchar(500) NOT NULL,
  `report_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `report_offense`
--

CREATE TABLE `report_offense` (
  `id` int(11) NOT NULL,
  `building_owner` varchar(500) DEFAULT NULL,
  `building_name` varchar(500) DEFAULT NULL,
  `doc_number_date` varchar(500) DEFAULT NULL,
  `tribunal_info` varchar(500) DEFAULT NULL,
  `commission_xabarnoma` varchar(500) DEFAULT NULL,
  `commission_davo` varchar(500) DEFAULT NULL,
  `problem_solve` varchar(500) DEFAULT NULL,
  `illegal_order` varchar(500) DEFAULT NULL,
  `legal_order` varchar(500) DEFAULT NULL,
  `report_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `update_date` datetime NOT NULL,
  `user_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `report_ruxsatnoma`
--

CREATE TABLE `report_ruxsatnoma` (
  `id` int(11) NOT NULL,
  `hudud_name` varchar(500) NOT NULL,
  `ruxsatnoma_fish` varchar(255) NOT NULL,
  `ruxsatnoma_date` date NOT NULL,
  `xulosa_date` date NOT NULL,
  `xulosa_number` int(11) NOT NULL,
  `natija_ijobiy` varchar(255) NOT NULL,
  `natija_rad` varchar(255) NOT NULL,
  `rad_sababi` varchar(500) NOT NULL,
  `report_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `report_uyjoy_ruxsatnoma`
--

CREATE TABLE `report_uyjoy_ruxsatnoma` (
  `id` int(11) NOT NULL,
  `hudud_name` varchar(500) NOT NULL,
  `ruxsatnoma_fish` varchar(255) NOT NULL,
  `ruxsatnoma_date` date NOT NULL,
  `xulosa_date` date NOT NULL,
  `xulosa_number` int(11) NOT NULL,
  `natija_ijobiy` varchar(255) NOT NULL,
  `natija_rad` varchar(255) NOT NULL,
  `rad_sababi` varchar(500) NOT NULL,
  `report_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `settings`
--

CREATE TABLE `settings` (
  `id` varchar(100) NOT NULL,
  `val` varchar(1000) NOT NULL,
  `url` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `settings`
--

INSERT INTO `settings` (`id`, `val`, `url`) VALUES
('address', 'Termiz shahar', NULL),
('copyright', 'Sayt materiallarini istalgan shaklda takror berganda yoki tarqatganda O‘zbekiston Respublikasi Avtomobil yo‘llari davlat qo‘mitasi rasmiy saytiga giperhavola berilishi shart! Saytning so\'nggi yangilanish sanasi 26-Oktyabr, 2021.', NULL),
('email', 'info@surxondaryoavtoyul.uz', NULL),
('phone', '+998 88 553 95 95', NULL),
('time_table', 'Ish vaqti : <br>(Dushanba-Juma) -  8:00 - 18:00 <br>\r\n                                Shanba - 8:00 - 15:00 <br>\r\n                                Yakshanba - dam olish kuni', NULL),
('title', 'Surxondaryo viloyat avtomobil <br>yo\'llari bosh boshqarmasi', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `settings_lang`
--

CREATE TABLE `settings_lang` (
  `id` int(11) NOT NULL,
  `lang` int(11) NOT NULL,
  `parent` varchar(100) NOT NULL,
  `val` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `settings_lang`
--

INSERT INTO `settings_lang` (`id`, `lang`, `parent`, `val`) VALUES
(1, 3, 'title', 'Сурхандарьинское областное управление автомобильных дорог'),
(2, 2, 'title', 'Surkhandarya regional department of highways'),
(3, 2, 'email', 'info@surxondaryoavtoyul.uz'),
(4, 3, 'email', 'info@surxondaryoavtoyul.uz'),
(5, 2, 'address', 'Termez city'),
(6, 3, 'address', 'Город Термез'),
(7, 2, 'copyright', 'When reproducing or distributing site materials in any form, a hyperlink to the official website of the State Committee for Motor Roads of the Republic of Uzbekistan must be provided! The last update date of the site is October 26, 2021.'),
(8, 3, 'copyright', 'При воспроизведении или распространении материалов сайта в любой форме обязательно наличие гиперссылки на официальный сайт Государственного комитета автомобильных дорог Республики Узбекистан! Дата последнего обновления сайта - 26 октября 2021 года.'),
(9, 2, 'phone', '+998 88 553 95 95'),
(10, 3, 'phone', '+998 88 553 95 95'),
(11, 3, 'time_table', 'Часы работы: <br> (понедельник-пятница) - 8:00 - 18:00 <br>\r\n                                 Суббота - 8:00 - 15:00 <br>\r\n                                 Воскресенье выходной день'),
(12, 2, 'time_table', 'Opening hours: <br> (Monday-Friday) - 8:00 - 18:00 <br>\r\n                                 Saturday - 8:00 - 15:00 <br>\r\n                                 Sunday is a day off');

-- --------------------------------------------------------

--
-- Структура таблицы `site_user`
--

CREATE TABLE `site_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `creator` int(11) DEFAULT NULL,
  `district_id` int(11) DEFAULT NULL,
  `rank` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `site_user`
--

INSERT INTO `site_user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `creator`, `district_id`, `rank`) VALUES
(2, 'admin', '2oPTB8o2X8oT6eaJq9AhOGXHdJ8RzTTL', '$2y$13$f2p4eJY6u8w8smC9VUN4guMMweinYS93F6NLDeGJIC/m50AnbkvAG', NULL, 'umail@mail.ru', 10, 1594473306, 1594473557, NULL, NULL, 1),
(3, 'oltinsoy_arx', '9LcQI8AnHiROMG0D1U5Top3RIF8mg4Y5', '$2y$13$0dRwBYZqHEa5GhdMJ4Be.eBXUGrrX/j023p9muyt3nLbDXT2NV3CG', NULL, 'oltinsoy@terarx.uz', 10, 1594473330, 1594583987, NULL, 94, 2),
(4, 'angor_arx', 'QMaGroGDw9NuEaubfxOs_5gGy0F2tsbz', '$2y$13$aIwhEc7rXM1C7xNIMYR4ze4ypE1lQqS6ZYX8GZcBWJpqzoHvPWVAK', NULL, 'angor@terarx.uz', 10, 1594588628, 1594588628, NULL, 95, 2),
(5, 'termizsh_arx', 'rA0XgxIbJFL6fHZgpPkEKPSczhRPbNsT', '$2y$13$p5Vc4STUiGPLjW04EoSmwevipRjkU1qaS6.sbT9ZZz9Kd6F4gHHz6', NULL, 'termizsh@terarx.uz', 10, 1598254002, 1598254002, NULL, 107, 2),
(6, 'boysun_arx', 'IvPCLoaVRV60-tSW3viTuvhymNHXnBYw', '$2y$13$jVcgTOWD0XZnubGa/mkv3OGXrluRU2GAyiXZ.sSsrNkMrqeUvfEmG', NULL, 'boysun@terarx.uz', 10, 1598254031, 1598254046, NULL, 96, 2),
(7, 'denov_arx', 'h4PEFV7XVFMaNDeHF8ptJS5vTLn5AQ4j', '$2y$13$10WH/vI.8DW6XpgfejwpiusOizkkIPxlFFegwlSKjSsPSGYTnSXHG', NULL, 'denov@terarx.uz', 10, 1598254077, 1598254077, NULL, 97, 2),
(8, 'jarqurgon_arx', '39VPFdP-yei5FkGgwNtk9qfZ3-Dh7UmP', '$2y$13$JwvAV/I7bxR69vFg7RjGiugNAF7OVTueyIfHQikfnKFS4Bl6CbZDy', NULL, 'jarqurgon@terarx.uz', 10, 1598254394, 1598254394, NULL, 98, 2),
(9, 'qiziriq_arx', '8SCp7N0pRf7s59qyoDT9HVgofzBASFR9', '$2y$13$96gUJbwTuplLD0GpbL9lnumzsbkKLpyAijNXpQOC4wXe2EbyAafRe', NULL, 'qiziriq@terarx.uz', 10, 1598254412, 1598254412, NULL, 99, 2),
(10, 'qumqurgon_arx', 'E3dyyK9G8-8FEJiDZWCYZtXJKCth0M9V', '$2y$13$z4ts1tK61rz6QswGfmTT0.N6LDZD03OCGtz6XTlO1MrPxbL3spk9u', NULL, 'qumqurgon@terarx.uz', 10, 1598254432, 1598254432, NULL, 100, 2),
(11, 'muzrabot_arx', '8MLHZ4BwaV4bIqVch858TNyfmKKootX_', '$2y$13$yYFs3qw3.0TJwBfdaPoIT.9nrY4Bet9kbeVltQBOY15bdq/WdD8HW', NULL, 'muzrabot@terarx.uz', 10, 1598254455, 1598254455, NULL, 101, 2),
(12, 'sariosiyo_arx', 'HpzLNATeJW37cXApvsm4-8KT7Hf_2GwL', '$2y$13$CVnbRQ2AevrFOUYp2wCuyuhZC0Y6mvr2OmN/YMBl5bKHkaMoT0skC', NULL, 'sariosiyo@terarx.uz', 10, 1598254483, 1598254483, NULL, 102, 2),
(13, 'termizt_arx', 'qQRKWzESMz3ZfJeX7AA_VJPtsuw4q2_M', '$2y$13$JS9ofRzWyBEyHwXhIo9DkOIEJ5Ir0Af0OHoGDYwR3fTiYWxG4b1fq', NULL, 'termizt@terarx.uz', 10, 1598254504, 1598254504, NULL, 103, 2),
(14, 'uzun_arx', 'ZrXVqarg6NeZ8SbJwTJQwmcCQ6OFBRoO', '$2y$13$JDlW1dMmgZj4IuEXDZqC9O60BCLXOjuVWCK2u1FmtawKtqr5SiBTS', NULL, 'uzun@terarx.uz', 10, 1598254528, 1598254528, NULL, 104, 2),
(15, 'sherobod_arx', 'zAB1e73X3w9fH51f_xMHh5Go1jaCVIrR', '$2y$13$PdDiMNPRvqqOcp28w2WZs.4qDJH/JuuZphTtCKlZLptcNe4FLFLg2', NULL, 'sherobod@terarx.uz', 10, 1598254549, 1600344263, NULL, 105, 2),
(16, 'shurchi_arx', 'a0nn9QGhio9QWHH_5I6jno1cI-CYb_W1', '$2y$13$VWFRL.BrGxGGoiIdxiIZde.AiKXhVv9ySONjlBuO4Evn9gaBCWKpm', NULL, 'shurchi@terarx.uz', 10, 1598254569, 1598254569, NULL, 106, 2),
(17, 'bandixon_arx', 'E_oZ7IyqQaXNX_-vGHrGWriWORR8ZFDT', '$2y$13$n7UHeqv.D4rw05JdyFIsDOATCcpgP.xhByZ8hhtk2CJcSha3.bq6i', NULL, 'bandixon@oncon.uz', 10, 1601432634, 1601432634, NULL, 194, 2);

-- --------------------------------------------------------

--
-- Структура таблицы `source_message`
--

CREATE TABLE `source_message` (
  `id` int(11) NOT NULL,
  `category` varchar(32) DEFAULT NULL,
  `message` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `source_message`
--

INSERT INTO `source_message` (`id`, `category`, `message`) VALUES
(1, 'main', 'footer_service'),
(2, 'main', 'footer_connect'),
(3, 'main', 'read_more'),
(4, 'main', 'last_news'),
(5, 'main', 'interactive_service'),
(6, 'main', 'home'),
(7, 'main', 'all-news'),
(8, 'main', 'search'),
(9, 'main', 'albums'),
(10, 'main', 'faq'),
(11, 'main', 'address'),
(12, 'main', 'email'),
(13, 'main', 'phone'),
(14, 'main', 'contact_connect'),
(15, 'main', 'contact'),
(16, 'main', 'documents'),
(17, 'main', 'all-documents'),
(18, 'main', 'dowloand_document'),
(19, 'main', 'source'),
(20, 'main', 'partners'),
(21, 'main', 'boards'),
(22, 'main', 'site_boards'),
(23, 'main', 'flag'),
(24, 'main', 'coat'),
(25, 'main', 'gymn'),
(26, 'main', 'name'),
(27, 'main', 'body'),
(28, 'main', 'send'),
(29, 'main', 'search-result'),
(30, 'main', 'test'),
(31, 'main', 'not-found'),
(32, 'main', 'error');

-- --------------------------------------------------------

--
-- Структура таблицы `telegram_settings`
--

CREATE TABLE `telegram_settings` (
  `id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `value` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `telegram_user`
--

CREATE TABLE `telegram_user` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `creator` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `creator`) VALUES
(1, 'admin', 'dArVMsVrEo-9LPrwI4RtJc_I0eAnIIu9', '$2y$13$jy9fwpvDFE3sIZiKdK0VQ.HlRh4dNjgwK9JfOVzZvdIQjCNiEcEji', NULL, '', 10, 1481295772, 1634529443, 1);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admission`
--
ALTER TABLE `admission`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `advertise`
--
ALTER TABLE `advertise`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `advertise_lang`
--
ALTER TABLE `advertise_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `album`
--
ALTER TABLE `album`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `album_lang`
--
ALTER TABLE `album_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `attach`
--
ALTER TABLE `attach`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `branch`
--
ALTER TABLE `branch`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `branch_lang`
--
ALTER TABLE `branch_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `district`
--
ALTER TABLE `district`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `district_lang`
--
ALTER TABLE `district_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `document`
--
ALTER TABLE `document`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `document_category`
--
ALTER TABLE `document_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `document_category_lang`
--
ALTER TABLE `document_category_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `document_lang`
--
ALTER TABLE `document_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `email`
--
ALTER TABLE `email`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `faq_lang`
--
ALTER TABLE `faq_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `faq_questions`
--
ALTER TABLE `faq_questions`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `guests`
--
ALTER TABLE `guests`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `leader`
--
ALTER TABLE `leader`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `leader_lang`
--
ALTER TABLE `leader_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `menu_lang`
--
ALTER TABLE `menu_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`,`language`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news_category`
--
ALTER TABLE `news_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news_category_lang`
--
ALTER TABLE `news_category_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `news_lang`
--
ALTER TABLE `news_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `page_lang`
--
ALTER TABLE `page_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `partner_lang`
--
ALTER TABLE `partner_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `pcounter_save`
--
ALTER TABLE `pcounter_save`
  ADD PRIMARY KEY (`save_name`);

--
-- Индексы таблицы `pcounter_users`
--
ALTER TABLE `pcounter_users`
  ADD PRIMARY KEY (`user_ip`);

--
-- Индексы таблицы `polls`
--
ALTER TABLE `polls`
  ADD PRIMARY KEY (`id`),
  ADD KEY `creator` (`creator`);

--
-- Индексы таблицы `poll_options`
--
ALTER TABLE `poll_options`
  ADD PRIMARY KEY (`id`),
  ADD KEY `poll` (`poll`);

--
-- Индексы таблицы `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `post_category`
--
ALTER TABLE `post_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `post_category_lang`
--
ALTER TABLE `post_category_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `post_lang`
--
ALTER TABLE `post_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `project_category`
--
ALTER TABLE `project_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `project_category_lang`
--
ALTER TABLE `project_category_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `project_lang`
--
ALTER TABLE `project_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `public_services`
--
ALTER TABLE `public_services`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `public_services_category`
--
ALTER TABLE `public_services_category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `public_services_category_lang`
--
ALTER TABLE `public_services_category_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `public_services_lang`
--
ALTER TABLE `public_services_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `region_lang`
--
ALTER TABLE `region_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `region_settings`
--
ALTER TABLE `region_settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `report`
--
ALTER TABLE `report`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `report_auksion`
--
ALTER TABLE `report_auksion`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `report_foydalanishga_qabulqilish`
--
ALTER TABLE `report_foydalanishga_qabulqilish`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `report_ijro`
--
ALTER TABLE `report_ijro`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `report_murojat`
--
ALTER TABLE `report_murojat`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `report_offense`
--
ALTER TABLE `report_offense`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `report_ruxsatnoma`
--
ALTER TABLE `report_ruxsatnoma`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `report_uyjoy_ruxsatnoma`
--
ALTER TABLE `report_uyjoy_ruxsatnoma`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Индексы таблицы `settings_lang`
--
ALTER TABLE `settings_lang`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `site_user`
--
ALTER TABLE `site_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- Индексы таблицы `source_message`
--
ALTER TABLE `source_message`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `telegram_settings`
--
ALTER TABLE `telegram_settings`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `telegram_user`
--
ALTER TABLE `telegram_user`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admission`
--
ALTER TABLE `admission`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `advertise`
--
ALTER TABLE `advertise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `advertise_lang`
--
ALTER TABLE `advertise_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `album`
--
ALTER TABLE `album`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `album_lang`
--
ALTER TABLE `album_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `attach`
--
ALTER TABLE `attach`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `branch`
--
ALTER TABLE `branch`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `branch_lang`
--
ALTER TABLE `branch_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `district`
--
ALTER TABLE `district`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;

--
-- AUTO_INCREMENT для таблицы `district_lang`
--
ALTER TABLE `district_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `document`
--
ALTER TABLE `document`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `document_category`
--
ALTER TABLE `document_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `document_category_lang`
--
ALTER TABLE `document_category_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `document_lang`
--
ALTER TABLE `document_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `email`
--
ALTER TABLE `email`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `faq`
--
ALTER TABLE `faq`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `faq_lang`
--
ALTER TABLE `faq_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `faq_questions`
--
ALTER TABLE `faq_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `guests`
--
ALTER TABLE `guests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `languages`
--
ALTER TABLE `languages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `leader`
--
ALTER TABLE `leader`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `leader_lang`
--
ALTER TABLE `leader_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблицы `menu_lang`
--
ALTER TABLE `menu_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT для таблицы `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `news_category`
--
ALTER TABLE `news_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `news_category_lang`
--
ALTER TABLE `news_category_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `news_lang`
--
ALTER TABLE `news_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `page`
--
ALTER TABLE `page`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `page_lang`
--
ALTER TABLE `page_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `partner`
--
ALTER TABLE `partner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `partner_lang`
--
ALTER TABLE `partner_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `polls`
--
ALTER TABLE `polls`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `poll_options`
--
ALTER TABLE `poll_options`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `post_category`
--
ALTER TABLE `post_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `post_category_lang`
--
ALTER TABLE `post_category_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `post_lang`
--
ALTER TABLE `post_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `project_category`
--
ALTER TABLE `project_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `project_category_lang`
--
ALTER TABLE `project_category_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `project_lang`
--
ALTER TABLE `project_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `public_services`
--
ALTER TABLE `public_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `public_services_category`
--
ALTER TABLE `public_services_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблицы `public_services_category_lang`
--
ALTER TABLE `public_services_category_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `public_services_lang`
--
ALTER TABLE `public_services_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблицы `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблицы `region_lang`
--
ALTER TABLE `region_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблицы `region_settings`
--
ALTER TABLE `region_settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT для таблицы `report`
--
ALTER TABLE `report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `report_auksion`
--
ALTER TABLE `report_auksion`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `report_foydalanishga_qabulqilish`
--
ALTER TABLE `report_foydalanishga_qabulqilish`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `report_ijro`
--
ALTER TABLE `report_ijro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `report_murojat`
--
ALTER TABLE `report_murojat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `report_offense`
--
ALTER TABLE `report_offense`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `report_ruxsatnoma`
--
ALTER TABLE `report_ruxsatnoma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `report_uyjoy_ruxsatnoma`
--
ALTER TABLE `report_uyjoy_ruxsatnoma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `settings_lang`
--
ALTER TABLE `settings_lang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблицы `site_user`
--
ALTER TABLE `site_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT для таблицы `source_message`
--
ALTER TABLE `source_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT для таблицы `telegram_user`
--
ALTER TABLE `telegram_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `polls`
--
ALTER TABLE `polls`
  ADD CONSTRAINT `polls_ibfk_1` FOREIGN KEY (`creator`) REFERENCES `user` (`id`);

--
-- Ограничения внешнего ключа таблицы `poll_options`
--
ALTER TABLE `poll_options`
  ADD CONSTRAINT `poll_options_ibfk_1` FOREIGN KEY (`poll`) REFERENCES `polls` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
