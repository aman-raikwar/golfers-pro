-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 03, 2017 at 08:25 AM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 7.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `golfer`
--
CREATE DATABASE IF NOT EXISTS `golfer` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `golfer`;

-- --------------------------------------------------------

--
-- Table structure for table `card_membership_category`
--

CREATE TABLE `card_membership_category` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `card_membership_category`
--

INSERT INTO `card_membership_category` (`id`, `name`, `status`, `created_at`) VALUES
(1, 'Level 1', 1, '2017-07-01 02:51:47'),
(2, 'Level 2', 1, '2017-07-01 02:51:47'),
(3, 'Level 3', 1, '2017-07-01 02:51:57'),
(4, 'Level 4', 1, '2017-07-01 02:51:57');

-- --------------------------------------------------------

--
-- Table structure for table `card_readers`
--

CREATE TABLE `card_readers` (
  `ID` int(11) NOT NULL COMMENT 'Unique system reference',
  `ReaderName` varchar(200) NOT NULL COMMENT 'The unique number of the physical reader',
  `GolfCourse` varchar(200) NOT NULL COMMENT 'The ID of the Golf Course associated with this reader'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `club_functionality`
--

CREATE TABLE `club_functionality` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` tinyint(4) DEFAULT '1',
  `created_at` datetime DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `club_functionality`
--

INSERT INTO `club_functionality` (`id`, `name`, `status`, `created_at`) VALUES
(1, 'Driving Range', 1, '2017-07-01 01:51:45'),
(2, 'Practice Ground', 1, '2017-07-01 01:51:45'),
(3, 'Practice Net', 1, '2017-07-01 01:52:01'),
(4, 'Putting Green', 1, '2017-07-01 01:52:01'),
(5, 'Swing Studio', 1, '2017-07-01 01:52:14'),
(6, 'Buggy Hire', 1, '2017-07-01 01:52:14'),
(7, 'Trolley Hire', 1, '2017-07-01 01:52:27'),
(8, 'Allows Society Days', 1, '2017-07-01 01:52:27'),
(9, 'Venue Hire', 1, '2017-07-01 01:52:39'),
(10, 'Showers', 1, '2017-07-01 01:52:39'),
(11, 'Snooker', 1, '2017-07-01 01:52:56'),
(12, 'Gym', 1, '2017-07-01 01:52:56'),
(13, 'Swimming Pool', 1, '2017-07-01 01:53:22'),
(14, 'Accommodation', 1, '2017-07-01 01:53:22');

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `code` varchar(2) CHARACTER SET latin1 NOT NULL,
  `dialing_code` varchar(2) CHARACTER SET latin1 NOT NULL,
  `short_name` varchar(128) CHARACTER SET latin1 NOT NULL,
  `long_name` varchar(128) CHARACTER SET latin1 NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `nationality` varchar(50) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `code`, `dialing_code`, `short_name`, `long_name`, `is_active`, `nationality`) VALUES
(1, 'af', '', 'afg', 'Afghanistan', 0, 'Afghan'),
(2, 'ax', '', 'ala', 'Aland Islands', 0, 'Allandish'),
(3, 'al', '', 'alb', 'Albania', 0, 'Albanian'),
(4, 'dz', '', 'dza', 'Algeria', 0, 'Algerian'),
(5, 'as', '', 'asm', 'American Samoa', 0, 'American Samoan'),
(6, 'ad', '', 'and', 'Andorra', 0, 'Andorran'),
(7, 'ao', '', 'ago', 'Angola', 0, 'Angolan'),
(8, 'ai', '', 'aia', 'Anguilla', 0, 'Anguillan'),
(9, 'aq', '', '', 'Antarctica', 0, 'Antarctican'),
(10, 'ag', '', 'atg', 'Antigua and Barbuda', 0, 'Antiguan/Barbudan'),
(11, 'ar', '', 'arg', 'Argentina', 0, 'Argentinean'),
(12, 'am', '', 'arm', 'Armenia', 0, 'Armenian'),
(13, 'aw', '', 'abw', 'Aruba', 0, 'Aruban'),
(14, 'au', '', 'aus', 'Australia', 0, 'Australian'),
(15, 'at', '', 'aut', 'Austria', 0, 'Austrian'),
(16, 'az', '', 'aze', 'Azerbaijan', 0, 'Azerbaijani'),
(17, 'bs', '', 'bhs', 'Bahamas', 0, 'Bahamian'),
(18, 'bh', '', 'bhr', 'Bahrain', 0, 'Bahraini'),
(19, 'bd', '', 'bgd', 'Bangladesh', 0, 'Bangladeshi'),
(20, 'bb', '', 'brb', 'Barbados', 0, 'Barbadian'),
(21, 'by', '', 'blr', 'Belarus', 0, 'Belarusian'),
(22, 'be', '', 'bel', 'Belgium', 0, 'Belgian'),
(23, 'bz', '', 'blz', 'Belize', 0, 'Belizean'),
(24, 'bj', '', 'ben', 'Benin', 0, 'Beninese'),
(25, 'bm', '', 'bmu', 'Bermuda', 0, 'Bermudian'),
(26, 'bt', '', 'btn', 'Bhutan', 0, 'Bhutanese'),
(27, 'bo', '', 'bol', 'Plurinational State of Bolivia,', 0, 'Bolivian'),
(28, 'bq', '', 'bes', 'Bonaire, Sint Eustatius and Saba', 0, 'bonair'),
(29, 'ba', '', 'bih', 'Bosnia and Herzegovina', 0, 'Bosnian/Herzegovinian'),
(30, 'bw', '', 'bwa', 'Botswana', 0, 'Motswana'),
(31, 'bv', '', '', 'Bouvet Island', 0, 'bouvet'),
(32, 'br', '', 'bra', 'Brazil', 0, 'Brazilian'),
(33, 'io', '', '', 'British Indian Ocean Territory', 0, 'Chagossians'),
(34, 'bn', '', 'brn', 'Brunei Darussalam', 0, 'Bruneian'),
(35, 'bg', '', 'bgr', 'Bulgaria', 0, 'Bulgarian'),
(36, 'bf', '', 'bfa', 'Burkina Faso', 0, 'Burkinab'),
(37, 'bi', '', 'bdi', 'Burundi', 0, 'Burundian'),
(38, 'kh', '', 'khm', 'Cambodia', 0, 'Cambodian'),
(39, 'cm', '', 'cmr', 'Cameroon', 0, 'Cameroonian'),
(40, 'ca', '', 'can', 'Canada', 0, 'Canadian'),
(41, 'cv', '', 'cpv', 'Cape Verde', 0, 'Cape Verdean'),
(42, 'ky', '', 'cym', 'Cayman Islands', 0, 'Caymanian'),
(43, 'cf', '', 'caf', 'Central African Republic', 0, 'Central African'),
(44, 'td', '', 'tcd', 'Chad', 0, 'Chadian'),
(45, 'cl', '', 'chl', 'Chile', 0, 'Chilean'),
(46, 'cn', '', 'chn', 'China', 0, 'Chinese'),
(47, 'cx', '', '', 'Christmas Island', 0, 'Christmas Island'),
(48, 'cc', '', '', 'Cocos (Keeling) Islands', 0, 'Cocos Island'),
(49, 'co', '', 'col', 'Colombia', 0, 'Colombian'),
(50, 'km', '', 'com', 'Comoros', 0, 'Comorian'),
(51, 'cg', '', 'cog', 'Congo', 0, 'Congolese'),
(52, 'ck', '', 'cok', 'Cook Islands', 0, 'Cook Island'),
(53, 'cr', '', 'cri', 'Costa Rica', 0, 'Costa Rican'),
(54, 'ci', '', 'civ', 'Cote d''Ivoire', 0, 'Ivorian'),
(55, 'hr', '', 'hrv', 'Croatia', 0, 'Croatian'),
(56, 'cu', '', 'cub', 'Cuba', 0, 'Cuban'),
(57, 'cw', '', 'cuw', 'Curacao', 0, 'Curacaoan'),
(58, 'cy', '', 'cyp', 'Cyprus', 0, 'Cypriot'),
(59, 'cz', '', 'cze', 'Czech Republic', 0, 'Czech'),
(60, 'dk', '', 'dnk', 'Denmark', 0, 'Danish'),
(61, 'dj', '', 'dji', 'Djibouti', 0, 'Djiboutian'),
(62, 'dm', '', 'dma', 'Dominica', 0, 'Dominicand'),
(63, 'do', '', 'dom', 'Dominican Republic', 0, 'Dominicane'),
(64, 'ec', '', 'ecu', 'Ecuador', 0, 'Ecuadorian'),
(65, 'eg', '', 'egy', 'Egypt', 0, 'Egyptian'),
(66, 'sv', '', 'slv', 'El Salvador', 0, 'Salvadoran'),
(67, 'gq', '', 'gnq', 'Equatorial Guinea', 0, 'Equatorial Guinean'),
(68, 'er', '', 'eri', 'Eritrea', 0, 'Eritrean'),
(69, 'ee', '', 'est', 'Estonia', 0, 'Estonian'),
(70, 'et', '', 'eth', 'Ethiopia', 0, 'Ethiopian'),
(71, 'fk', '', 'flk', 'Falkland Islands (Malvinas)', 0, 'Falkland Island'),
(72, 'fo', '', 'fro', 'Faroe Islands', 0, 'Faroese'),
(73, 'fj', '', 'fji', 'Fiji', 0, 'Fijian'),
(74, 'fi', '', 'fin', 'Finland', 0, 'Finnish'),
(75, 'fr', '', 'fra', 'France', 0, 'French'),
(76, 'gf', '', 'guf', 'French Guiana', 0, 'French Guianese'),
(77, 'pf', '', 'pyf', 'French Polynesia', 0, 'French Polynesian'),
(78, 'ga', '', 'gab', 'Gabon', 0, 'French Southern'),
(79, 'gm', '', 'gmb', 'Gambia', 0, 'Gambian'),
(80, 'ge', '', 'geo', 'Georgia', 0, 'Georgian'),
(81, 'de', '', 'deu', 'Germany', 0, 'German'),
(82, 'gh', '', 'gha', 'Ghana', 0, 'Ghanaian'),
(83, 'gi', '', 'gib', 'Gibraltar', 0, 'Gibraltar'),
(84, 'gr', '', 'grc', 'Greece', 0, 'Greek'),
(85, 'gl', '', 'grl', 'Greenland', 0, 'Greenlandic'),
(86, 'gd', '', 'grd', 'Grenada', 0, 'Grenadian'),
(87, 'gp', '', 'glp', 'Guadeloupe', 0, 'Guadeloupe'),
(88, 'gu', '', 'gum', 'Guam', 0, 'Guamanian'),
(89, 'gt', '', 'gtm', 'Guatemala', 0, 'Guatemalan'),
(90, 'gg', '', 'ggy', 'Guernsey', 0, 'Guernsey'),
(91, 'gn', '', 'gin', 'Guinea', 0, 'Guinean'),
(92, 'gw', '', 'gnb', 'Guinea-Bissau', 0, 'Guinean'),
(93, 'gy', '', 'guy', 'Guyana', 0, 'Guyanese'),
(94, 'ht', '', 'hti', 'Haiti', 0, 'Haitian'),
(95, 'hn', '', 'hnd', 'Honduras', 0, 'Honduran'),
(96, 'hk', '', 'hkg', 'Hong Kong', 0, 'Hongkongese'),
(97, 'hu', '', 'hun', 'Hungary', 0, 'Hungarian'),
(98, 'is', '', 'isl', 'Iceland', 0, 'Icelandic'),
(99, 'in', '', 'ind', 'India', 0, 'Indian'),
(100, 'id', '', 'idn', 'Indonesia', 0, 'Indonesian'),
(101, 'ir', '', 'irn', 'Iran', 0, 'Iranian'),
(102, 'iq', '', 'irq', 'Iraq', 0, 'Iraqi'),
(103, 'ie', '', 'irl', 'Ireland', 1, 'Irish'),
(104, 'im', '', 'imn', 'Isle of Man', 0, 'Manx'),
(105, 'il', '', 'isr', 'Israel', 0, 'Israeli'),
(106, 'it', '', 'ita', 'Italy', 0, 'Italian'),
(107, 'jm', '', 'jam', 'Jamaica', 0, 'Jamaican'),
(108, 'jp', '', 'jpn', 'Japan', 0, 'Japanese'),
(109, 'je', '', 'jey', 'Jersey', 0, 'Jerseymen'),
(110, 'jo', '', 'jor', 'Jordan', 0, 'Jordanian'),
(111, 'kz', '', 'kaz', 'Kazakhstan', 0, 'Kazakh'),
(112, 'ke', '', 'ken', 'Kenya', 0, 'Kenyan'),
(113, 'ki', '', 'kir', 'Kiribati', 0, 'I-Kiribati'),
(114, 'kp', '', 'prk', 'South Korea', 0, 'Korean'),
(115, 'kr', '', 'kor', 'North Korea', 0, 'Korean'),
(116, 'kw', '', 'kwt', 'Kuwait', 0, 'Kuwaiti'),
(117, 'kg', '', 'kgz', 'Kyrgyzstan', 0, 'Kyrgyzstani'),
(118, 'la', '', 'lao', 'People''s Democratic Republic Lao', 0, 'Laotian'),
(119, 'lv', '', 'lva', 'Latvia', 0, 'Latvian'),
(120, 'lb', '', 'lbn', 'Lebanon', 0, 'Lebanese'),
(121, 'ls', '', 'lso', 'Lesotho', 0, 'Basotho'),
(122, 'lr', '', 'lbr', 'Liberia', 0, 'Liberian'),
(123, 'ly', '', 'lby', 'Libya', 0, 'Libyan'),
(124, 'li', '', 'lie', 'Liechtenstein', 0, 'Liechtenstein'),
(125, 'lt', '', 'ltu', 'Lithuania', 0, 'Lithuanian'),
(126, 'lu', '', 'lux', 'Luxembourg', 0, 'Luxembourgish'),
(127, 'mo', '', 'mac', 'Macao', 0, 'Macanese'),
(128, 'mg', '', 'mdg', 'Madagascar', 0, 'Malagasy'),
(129, 'mw', '', 'mwi', 'Malawi', 0, 'Malawian'),
(130, 'my', '', 'mys', 'Malaysia', 0, 'Malaysian'),
(131, 'mv', '', 'mdv', 'Maldives', 0, 'Maldivian'),
(132, 'ml', '', 'mli', 'Mali', 0, 'Malian'),
(133, 'mt', '', 'mlt', 'Malta', 0, 'Maltese'),
(134, 'mh', '', 'mhl', 'Marshall Islands', 0, 'Marshallese'),
(135, 'mq', '', 'mtq', 'Martinique', 0, 'Martiniquais'),
(136, 'mr', '', 'mrt', 'Mauritania', 0, 'Mauritanian'),
(137, 'mu', '', 'mus', 'Mauritius', 0, 'Mauritian'),
(138, 'yt', '', 'myt', 'Mayotte', 0, 'Mahoran'),
(139, 'mx', '', 'mex', 'Mexico', 0, 'Mexican'),
(140, 'fm', '', 'fsm', 'Federated States of Micronesia', 0, 'Micronesian'),
(141, 'md', '', 'mda', 'Moldova, Republic of', 0, 'Moldovan'),
(142, 'mc', '', 'mco', 'Monaco', 0, 'Mon?gasque, Monacan'),
(143, 'mn', '', 'mng', 'Mongolia', 0, 'Mongolian'),
(144, 'me', '', 'mne', 'Montenegro', 0, 'Montenegrin'),
(145, 'ms', '', 'msr', 'Montserrat', 0, 'Montserratian'),
(146, 'ma', '', 'mar', 'Morocco', 0, 'Moroccan'),
(147, 'mz', '', 'moz', 'Mozambique', 0, 'Mozambican'),
(148, 'nm', '', 'nam', 'namibia', 0, 'Namibian'),
(149, 'na', '', 'nam', 'Namibia', 0, 'Namibian'),
(150, 'nr', '', 'nru', 'Nauru', 0, 'Nauruan'),
(151, 'np', '', 'npl', 'Nepal', 0, 'Nepali'),
(152, 'nl', '', 'nld', 'Netherlands', 0, 'Dutch'),
(153, 'nc', '', 'ncl', 'New Caledonia', 0, 'New Caledonian'),
(154, 'nz', '', 'nzl', 'New Zealand', 0, 'New Zealand'),
(155, 'ni', '', 'nic', 'Nicaragua', 0, 'Nicaraguan'),
(156, 'ne', '', 'ner', 'Niger', 0, 'Nigerien'),
(157, 'ng', '', 'nga', 'Nigeria', 0, 'Nigerian'),
(158, 'nu', '', 'niu', 'Niue', 0, 'Niuean'),
(159, 'nf', '', 'nfk', 'Norfolk Island', 0, 'Norfolk Islander'),
(160, 'mp', '', 'mnp', 'Northern Mariana Islands', 0, 'Northern Marianan'),
(161, 'no', '', 'nor', 'Norway', 0, 'Norwegian'),
(162, 'om', '', 'omn', 'Oman', 0, 'Omani'),
(163, 'pk', '', 'pak', 'Pakistan', 0, 'Pakistani'),
(164, 'pw', '', 'plw', 'Palau', 0, 'Palauan'),
(165, 'ps', '', 'pse', 'Palestine', 0, 'Palestinian'),
(166, 'pa', '', 'pan', 'Panama', 0, 'Panamanian'),
(167, 'pg', '', 'png', 'Papua New Guinea', 0, 'Papua New Guinean'),
(168, 'py', '', 'pry', 'Paraguay', 0, 'Paraguayan'),
(169, 'pe', '', 'per', 'Peru', 0, 'Peruvian'),
(170, 'ph', '', 'phl', 'Philippines', 0, 'Filipino'),
(171, 'pn', '', 'pcn', 'Pitcairn', 0, 'Pitcairn Island'),
(172, 'pl', '', 'pol', 'Poland', 0, 'Polish'),
(173, 'pt', '', 'prt', 'Portugal', 0, 'Portuguese'),
(174, 'pr', '', 'pri', 'Puerto Rico', 0, 'Puerto Rican'),
(175, 'qa', '', 'qat', 'Qatar', 0, 'Qatari'),
(176, 're', '', 'reu', 'Reunion', 0, 'Reunionese'),
(177, 'ro', '', 'rou', 'Romania', 0, 'Romanian'),
(178, 'ru', '', 'rus', 'Russian Federation', 0, 'Russian'),
(179, 'rw', '', 'rwa', 'Rwanda', 0, 'Rwandan'),
(180, 'ws', '', 'wsm', 'Samoa', 0, 'Samoan'),
(181, 'sm', '', 'smr', 'San Marino', 0, 'Sammarinese'),
(182, 'sa', '', 'sau', 'Saudi Arabia', 0, 'Saudi Arabian'),
(183, 'sn', '', 'sen', 'Senegal', 0, 'Senegalese'),
(184, 'rs', '', 'srb', 'Serbia', 0, 'Serbian'),
(185, 'sc', '', 'syc', 'Seychelles', 0, 'Seychellois'),
(186, 'sl', '', 'sle', 'Sierra Leone', 0, 'Sierra Leonean'),
(187, 'sg', '', 'sgp', 'Singapore', 0, 'Singapore'),
(188, 'sk', '', 'svk', 'Slovakia', 0, 'Slovak'),
(189, 'si', '', 'svn', 'Slovenia', 0, 'Slovenian'),
(190, 'sb', '', 'slb', 'Solomon Islands', 0, 'Solomon Island'),
(191, 'so', '', 'som', 'Somalia', 0, 'Somalian'),
(192, 'za', '', 'zaf', 'South Africa', 0, 'South African'),
(193, 'ss', '', 'ssd', 'South Sudan', 0, 'South Sudanese'),
(194, 'es', '', 'esp', 'Spain', 0, 'Spanish'),
(195, 'lk', '', 'lka', 'Sri Lanka', 0, 'Sri Lankan'),
(196, 'sd', '', 'sdn', 'Sudan', 0, 'Sudanese'),
(197, 'sr', '', 'sur', 'Suriname', 0, 'Surinamese'),
(198, 'sz', '', 'swz', 'Swaziland', 0, 'Swazi'),
(199, 'se', '', 'swe', 'Sweden', 0, 'Swedish'),
(200, 'ch', '', 'che', 'Switzerland', 0, 'Swiss'),
(201, 'sy', '', 'syr', 'Syrian Arab Republic', 0, 'Syrian'),
(202, 'tw', '', '', 'Taiwan, Province of China', 0, 'Taiwanese'),
(203, 'tj', '', 'tjk', 'Tajikistan', 0, 'Tajikistani'),
(204, 'tz', '', 'tza', 'United Republic of Tanzania', 0, 'Tanzanian'),
(205, 'th', '', 'tha', 'Thailand', 0, 'Thai'),
(206, 'tg', '', 'tgo', 'Togo', 0, 'Togolese'),
(207, 'to', '', 'ton', 'Tonga', 0, 'Tongan'),
(208, 'tt', '', 'tto', 'Trinidad and Tobago', 0, 'Trinidadian'),
(209, 'tn', '', 'tun', 'Tunisia', 0, 'Tunisian'),
(210, 'tr', '', 'tur', 'Turkey', 0, 'Turkish'),
(211, 'tm', '', 'tkm', 'Turkmenistan', 0, 'Turkmen'),
(212, 'tc', '', 'tca', 'Turks and Caicos Islands', 0, 'none'),
(213, 'tv', '', 'tuv', 'Tuvalu', 0, 'Tuvaluan'),
(214, 'ug', '', 'uga', 'Uganda', 0, 'Ugandan'),
(215, 'ua', '', 'ukr', 'Ukraine', 0, 'Ukrainian'),
(216, 'ae', '', 'are', 'United Arab Emirates', 0, 'Emirati'),
(217, 'gb', '', 'gbr', 'United Kingdom', 0, 'British'),
(218, 'us', '', 'usa', 'United States', 0, 'American'),
(219, 'uy', '', 'ury', 'Uruguay', 0, 'Uruguayan'),
(220, 'uz', '', 'uzb', 'Uzbekistan', 0, 'Uzbekistani'),
(221, 'vu', '', 'vut', 'Vanuatu', 0, 'Ni-Vanuatu'),
(222, 've', '', 'ven', 'Venezuela', 0, 'Venezuelan'),
(223, 'vn', '', 'vnm', 'Viet Nam', 0, 'Vietnamese'),
(224, 'vg', '', 'vgb', 'Virgin Islands, British', 0, 'Virgin Island(British)'),
(225, 'vi', '', 'vir', 'Virgin Islands, U.S.', 0, 'Virgin Island (US)'),
(226, 'wf', '', 'wlf', 'Wallis and Futuna', 0, 'Wallisian/Futunan'),
(227, 'eh', '', 'esh', 'Western Sahara', 0, 'Sahrawian'),
(228, 'ye', '', 'yem', 'Yemen', 0, 'Yemeni'),
(229, 'zm', '', 'zmb', 'Zambia', 0, 'Zambian'),
(230, 'zw', '', 'zwe', 'Zimbabwe', 0, 'Zimbabwean'),
(231, 'en', '', 'eng', 'England', 1, 'English'),
(232, 'st', '', 'sco', 'Scotland', 1, 'Scot'),
(233, 'wa', '', 'wal', 'Wales', 1, 'Wales'),
(234, 'nd', '', 'nir', 'Northern Ireland', 1, 'Irish');

-- --------------------------------------------------------

--
-- Table structure for table `county`
--

CREATE TABLE `county` (
  `id` int(11) UNSIGNED NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `name` varchar(255) COLLATE utf8_bin NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Dumping data for table `county`
--

INSERT INTO `county` (`id`, `country_id`, `name`, `is_active`) VALUES
(1, 231, 'Avon', 1),
(2, 231, 'Bedfordshire', 1),
(3, 231, 'Berkshire', 1),
(4, 231, 'City of Bristol', 0),
(5, 231, 'Buckinghamshire', 1),
(6, 231, 'Cambridgeshire', 1),
(7, 231, 'Cambridgeshire and Isle of Ely', 0),
(8, 231, 'Cheshire', 1),
(9, 231, 'Cleveland', 0),
(10, 231, 'Cornwall', 1),
(11, 231, 'Cumberland', 0),
(12, 231, 'Cumbria', 1),
(13, 231, 'Derbyshire', 1),
(14, 231, 'Devon', 1),
(15, 231, 'Dorset', 1),
(16, 231, 'Durham', 1),
(17, 231, 'East Suffolk', 0),
(18, 231, 'East Sussex', 0),
(19, 231, 'Essex', 1),
(20, 231, 'Gloucestershire', 1),
(21, 231, 'Greater London', 0),
(22, 231, 'Greater Manchester', 0),
(23, 231, 'Hampshire', 1),
(24, 231, 'Hereford and Worcester', 0),
(25, 231, 'Herefordshire', 1),
(26, 231, 'Hertfordshire', 1),
(27, 231, 'Humberside', 1),
(28, 231, 'Huntingdon and Peterborough', 0),
(29, 231, 'Huntingdonshire', 0),
(30, 231, 'Isle of Ely', 0),
(31, 231, 'Isle of Wight', 1),
(32, 231, 'Kent', 1),
(33, 231, 'Lancashire', 1),
(34, 231, 'Leicestershire', 1),
(35, 231, 'Lincolnshire', 1),
(36, 231, 'Lincolnshire, Parts of Holland', 0),
(37, 231, 'Lincolnshire, Parts of Kesteven', 0),
(38, 231, 'Lincolnshire, Parts of Lindsey', 0),
(39, 231, 'London', 1),
(40, 231, 'City of London', 0),
(41, 231, 'Merseyside', 1),
(42, 231, 'Middlesex', 1),
(43, 231, 'Norfolk', 1),
(44, 231, 'Northamptonshire', 1),
(45, 231, 'Northumberland', 1),
(46, 231, 'North Humberside', 0),
(47, 231, 'North Yorkshire', 0),
(48, 231, 'Nottinghamshire', 1),
(49, 231, 'Oxfordshire', 1),
(50, 231, 'Soke of Peterborough', 0),
(51, 231, 'Rutland', 1),
(52, 231, 'Shropshire', 1),
(53, 231, 'Somerset', 1),
(54, 231, 'South Humberside', 0),
(55, 231, 'South Yorkshire', 0),
(56, 231, 'Staffordshire', 1),
(57, 231, 'Suffolk', 1),
(58, 231, 'Surrey', 1),
(59, 231, 'Sussex', 1),
(60, 231, 'Tyne and Wear', 1),
(61, 231, 'Warwickshire', 1),
(62, 231, 'West Midlands', 1),
(63, 231, 'Westmorland', 0),
(64, 231, 'West Suffolk', 0),
(65, 231, 'West Sussex', 0),
(66, 231, 'West Yorkshire', 0),
(67, 231, 'Wiltshire', 1),
(68, 231, 'Worcestershire', 1),
(69, 231, 'Yorkshire', 1),
(70, 231, 'Yorkshire, East Riding', 0),
(71, 231, 'Yorkshire, North Riding', 0),
(72, 231, 'Yorkshire, West Riding', 0),
(73, 232, 'City of Aberdeen', 1),
(74, 232, 'Aberdeenshire', 1),
(75, 232, 'Angus (Forfarshire)', 1),
(76, 232, 'Argyll', 1),
(77, 232, 'Ayrshire', 1),
(78, 232, 'Banffshire', 1),
(79, 232, 'Berwickshire', 1),
(80, 232, 'Bute', 1),
(81, 232, 'Caithness', 1),
(82, 232, 'Clackmannanshire', 1),
(83, 232, 'Cromartyshire', 1),
(84, 232, 'Dumfriesshire', 1),
(85, 232, 'Dunbartonshire (Dumbarton)', 1),
(86, 232, 'City of Dundee', 1),
(87, 232, 'East Lothian (Haddingtonshire)', 1),
(88, 232, 'City of Edinburgh', 1),
(89, 232, 'Fife', 1),
(90, 232, 'City of Glasgow', 1),
(91, 232, 'Inverness-shire', 1),
(92, 232, 'Kincardineshire', 1),
(93, 232, 'Kinross-shire', 1),
(94, 232, 'Kirkcudbrightshire', 1),
(95, 232, 'Lanarkshire', 1),
(96, 232, 'Midlothian (County of Edinburgh)', 1),
(97, 232, 'Moray (Elginshire)', 1),
(98, 232, 'Nairnshire', 1),
(99, 232, 'Orkney', 1),
(100, 232, 'Peeblesshire', 1),
(101, 232, 'Perthshire', 1),
(102, 232, 'Renfrewshire', 1),
(103, 232, 'Ross and Cromarty', 1),
(104, 232, 'Ross-shire', 1),
(105, 232, 'Roxburghshire', 1),
(106, 232, 'Selkirkshire', 1),
(107, 232, 'Shetland (Zetland)', 1),
(108, 232, 'Stirlingshire', 1),
(109, 232, 'Sutherland', 1),
(110, 232, 'West Lothian (Linlithgowshire)', 1),
(111, 232, 'Wigtownshire', 1),
(112, 233, 'Anglesey', 1),
(113, 233, 'Brecknockshire', 1),
(114, 233, 'Caernarfonshire', 1),
(115, 233, 'Ceredigion', 1),
(116, 233, 'Carmarthenshire', 1),
(117, 233, 'Clwyd', 1),
(118, 233, 'Denbighshire', 1),
(119, 233, 'Dyfed', 1),
(120, 233, 'Flintshire', 1),
(121, 233, 'Glamorgan', 1),
(122, 233, 'Gwent', 1),
(123, 233, 'Gwynedd', 1),
(124, 233, 'Merionethshire', 1),
(125, 233, 'Mid Glamorgan', 1),
(126, 233, 'Monmouthshire', 1),
(127, 233, 'Montgomeryshire', 1),
(128, 233, 'Pembrokeshire', 1),
(129, 233, 'Powys', 1),
(130, 233, 'Radnorshire', 1),
(131, 233, 'South Glamorgan', 1),
(132, 233, 'West Glamorgan', 1),
(133, 234, 'Antrim', 1),
(134, 234, 'Armagh', 1),
(135, 234, 'City of Belfast', 1),
(136, 234, 'Down', 1),
(137, 234, 'Fermanagh', 1),
(138, 234, 'Londonderry', 1),
(139, 234, 'City of Londonderry', 1),
(140, 234, 'Tyrone', 1),
(141, 103, 'Carlow', 1),
(142, 103, 'Cavan', 1),
(143, 103, 'Clare', 1),
(144, 103, 'Cork', 1),
(145, 103, 'Donegal', 1),
(146, 103, 'Dublin', 1),
(147, 103, 'Galway', 1),
(148, 103, 'Kerry', 1),
(149, 103, 'Kildare', 1),
(150, 103, 'Kilkenny', 1),
(151, 103, 'Laois', 1),
(152, 103, 'Leitrim', 1),
(153, 103, 'Limerick', 1),
(154, 103, 'Longford', 1),
(155, 103, 'Louth', 1),
(156, 103, 'Mayo', 1),
(157, 103, 'Meath', 1),
(158, 103, 'Monaghan', 1),
(159, 103, 'Offaly', 1),
(160, 103, 'Roscommon', 1),
(161, 103, 'Sligo', 1),
(162, 103, 'Tipperary', 1),
(163, 103, 'Waterford', 1),
(164, 103, 'Westmeath', 1),
(165, 103, 'Wexford', 1),
(166, 103, 'Wicklow', 1),
(167, 103, 'Dun Laoghaire-Rathdown', 1),
(168, 103, 'Fingal', 1),
(169, 103, 'North Tipperary', 1),
(170, 103, 'South Dublin', 1),
(171, 103, 'South Tipperary', 1),
(172, 233, 'Conwy', 1),
(173, 233, 'Porthcawl', 1);

-- --------------------------------------------------------

--
-- Table structure for table `golfcourse`
--

CREATE TABLE `golfcourse` (
  `ID` int(11) NOT NULL COMMENT 'Unique system reference',
  `Name` varchar(200) NOT NULL COMMENT 'Name of the Golf Cours',
  `LoginID` varchar(200) NOT NULL COMMENT 'Login ID for the Golf Course',
  `Password` varchar(200) NOT NULL COMMENT 'Password for access',
  `IsAdmin` tinyint(1) NOT NULL COMMENT 'Marks the user as an admin user',
  `Activationkey` varchar(255) NOT NULL COMMENT 'Activation key used during registration process',
  `Email` varchar(255) NOT NULL COMMENT 'Email address of the user',
  `ClubFacebook` varchar(255) NOT NULL COMMENT 'Link to the Club’s Facebook Page',
  `ClubTwitter` varchar(255) NOT NULL COMMENT 'Link to the Club’s Twitter Page',
  `ContactNumber` varchar(255) NOT NULL COMMENT 'Phone Number for the course',
  `Address1` varchar(255) NOT NULL COMMENT 'Address Line 1 of the Club',
  `Address2` varchar(255) NOT NULL COMMENT 'Address Line 2 of the Club',
  `Town` varchar(255) NOT NULL COMMENT 'Town of the Club',
  `County` varchar(255) NOT NULL COMMENT 'County of the Club',
  `Country` varchar(255) NOT NULL COMMENT 'Country of the Club',
  `PostCode` varchar(255) NOT NULL COMMENT 'Postcode of the Club',
  `AddressNote` varchar(255) NOT NULL COMMENT 'Description field for clubs to enter directions etc.',
  `ClubDescription` varchar(255) NOT NULL COMMENT '250 max word limit description of the club',
  `ClubUrl` varchar(255) NOT NULL COMMENT 'Link to the Club’s website',
  `ClubHoles` int(11) NOT NULL COMMENT 'How many holes the golf course has',
  `ClubYardage` int(11) NOT NULL COMMENT 'The total yardage of the course',
  `ClubPar` int(11) NOT NULL COMMENT 'The total Par of the course',
  `GpgUrl` varchar(255) NOT NULL COMMENT 'Link to the Club’s GPG Page',
  `ClubLogo` varchar(255) NOT NULL COMMENT 'ClubLogo	varchar(255)	URL to the club''s logo image',
  `MainImage` varchar(255) NOT NULL COMMENT 'URL to the main club image',
  `GreenFeeFrom` int(11) NOT NULL COMMENT 'The lowest price of green fee at the club (no decimals)',
  `GreenFeeTo` int(11) NOT NULL COMMENT 'The highest price of green fee at the club (no decimals)',
  `hasDrivingRange` tinyint(1) NOT NULL COMMENT 'If the club has a driving range',
  `hasPracticeGround` tinyint(1) NOT NULL COMMENT 'If the club has a Practise Ground',
  `hasPracticeNet` tinyint(1) NOT NULL COMMENT 'If the club has a Practise Net',
  `hasPuttingGreen` tinyint(1) NOT NULL COMMENT 'If the club has a Putting Green',
  `hasSwingStudio` tinyint(1) NOT NULL COMMENT 'hasSwingStudio	boolean	If the club has a Swing Studio',
  `hasBuggyHire` tinyint(1) NOT NULL COMMENT 'If the club has Buggy Hire',
  `hasTrolleyHire` tinyint(1) NOT NULL COMMENT 'If the club has Trolley Hire',
  `allowsSociety` tinyint(1) NOT NULL COMMENT 'If the club allows for Society Days',
  `hasVenueHire` tinyint(1) NOT NULL COMMENT 'If the club hires out its venue',
  `hasShowers` tinyint(1) NOT NULL COMMENT 'If the club has showers',
  `hasSnooker` tinyint(1) NOT NULL COMMENT 'If the club has a snooker table',
  `hasGym` tinyint(1) NOT NULL COMMENT 'If the club has a gym',
  `hasSwimming` tinyint(1) NOT NULL COMMENT 'hasSwimming	boolean	If the club has a swimming pool',
  `hasAccommodation` tinyint(1) NOT NULL COMMENT 'If the club has accommodation',
  `ClubFacilities` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `golfcourse`
--

INSERT INTO `golfcourse` (`ID`, `Name`, `LoginID`, `Password`, `IsAdmin`, `Activationkey`, `Email`, `ClubFacebook`, `ClubTwitter`, `ContactNumber`, `Address1`, `Address2`, `Town`, `County`, `Country`, `PostCode`, `AddressNote`, `ClubDescription`, `ClubUrl`, `ClubHoles`, `ClubYardage`, `ClubPar`, `GpgUrl`, `ClubLogo`, `MainImage`, `GreenFeeFrom`, `GreenFeeTo`, `hasDrivingRange`, `hasPracticeGround`, `hasPracticeNet`, `hasPuttingGreen`, `hasSwingStudio`, `hasBuggyHire`, `hasTrolleyHire`, `allowsSociety`, `hasVenueHire`, `hasShowers`, `hasSnooker`, `hasGym`, `hasSwimming`, `hasAccommodation`, `ClubFacilities`) VALUES
(1, 'Aberdare Golf Club', '610603', '123456', 0, '', 'test@gmail.com', '', '', '610603', 'Test', 'Test', 'Test', '', '', 'Test', 'Test', '610603', 'Test', 6, 3, 5, 'Test', 'fghjgffvg', '', 1, 1, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL),
(2, 'Rick Clubs', '22222', '123456', 0, '', 'rickclub@mailinator.com', '', '', '+918870947750', 'New York', 'New Your', 'London', '', '', '440024', 'Test', 'Test Desc', 'http://www.google.com', 30000, 2000, 4500, 'http://www.google.com', '1439656912_square-facebook.png', '', 40000, 23000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL),
(3, 'Thomas Club', '6756', '1234566', 0, '', 'thomas@mailinator.com', '', '', '4567892341', 'Indore', 'Indore', 'London', '', '', '3456', 'Test', 'This is test description', 'http://www.google.com', 40000, 4500, 30000, 'http://www.google.com', '', '', 34000, 2300, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL),
(4, 'Test Name', '23045', '123456', 0, '', 'swmishra26@gmail.com', '', '', '+918870947750', '245 jawahar nagar', 'new', 'New York', '', '', '440024', '', '', 'http://www.google.com', 40000, 4500, 34, 'http://www.google.com', '', '', 34000, 23000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2,4,5,8,10,11,14'),
(5, 'yutuyt', '23045', '123456', 0, '', 'sam@mailinator.com', '', '', '+918870947750', '6 Patel Colony', '12121', 'indore', '', '', '440024', '', '', 'http://www.google.com', 40000, 4500, 34, 'http://www.google.com', '', '', 34000, 23000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '1,2,11,12'),
(6, 'Demo 1', '22222', '123456', 0, '', 'johnson@mailinator.com', 'http://www.facebook.com', 'http://www.twitter.com', '+918870947750', 'New York', 'wewewe', 'qwerty', '15', '231', '451115', 'qwqw', 'qwqw', 'http://www.google.com', 40000, 4500, 34, 'http://www.google.com', '', '', 34000, 23000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '1,2,8,14');

-- --------------------------------------------------------

--
-- Table structure for table `player`
--

CREATE TABLE `player` (
  `ID` int(11) NOT NULL,
  `FirstClubID` int(11) NOT NULL COMMENT 'Which golf club they a member of. Can also be ''None'', which we will store in the platform as ''Nomad'' Club',
  `FirstName` varchar(200) NOT NULL,
  `LastName` varchar(200) NOT NULL,
  `DateOfBirth` date NOT NULL,
  `Email` varchar(200) NOT NULL,
  `Address` varchar(200) DEFAULT NULL,
  `RegisterationKey` varchar(100) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `password_hash` varchar(200) NOT NULL,
  `isRegistered` int(11) DEFAULT '0',
  `PhoneNo` varchar(100) DEFAULT NULL,
  `Title` varchar(100) DEFAULT NULL,
  `IsMemberOfAnotherClub` varchar(100) DEFAULT NULL,
  `OtherClubName` varchar(100) DEFAULT NULL,
  `Gender` varchar(100) DEFAULT NULL,
  `Address2` varchar(200) DEFAULT NULL,
  `Town` varchar(100) DEFAULT NULL,
  `County` varchar(100) DEFAULT NULL,
  `Country` int(11) DEFAULT NULL,
  `CountyCardId` varchar(100) NOT NULL,
  `CountyCardNumber` varchar(100) NOT NULL,
  `PostCode` varchar(100) DEFAULT NULL,
  `Notes` varchar(200) DEFAULT NULL,
  `player_lifetime_id` varchar(256) NOT NULL,
  `optIn` int(11) NOT NULL,
  `activation_key` varchar(255) DEFAULT NULL,
  `on_date` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `OpgRegType` varchar(100) NOT NULL COMMENT 'This refers to the Golfer Card levels of 1,2,3 etc. For now, just put generic names.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `player`
--

INSERT INTO `player` (`ID`, `FirstClubID`, `FirstName`, `LastName`, `DateOfBirth`, `Email`, `Address`, `RegisterationKey`, `password`, `password_hash`, `isRegistered`, `PhoneNo`, `Title`, `IsMemberOfAnotherClub`, `OtherClubName`, `Gender`, `Address2`, `Town`, `County`, `Country`, `CountyCardId`, `CountyCardNumber`, `PostCode`, `Notes`, `player_lifetime_id`, `optIn`, `activation_key`, `on_date`, `OpgRegType`) VALUES
(1, 1, 'admin', 'admin', '2017-06-01', 'admin@golfer.com', 'test', 'test', '', 'admin', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', NULL, NULL, '', 0, NULL, '2017-06-25 10:38:56', ''),
(2, 3, 'Sam', 'Raikwar', '0000-00-00', 'sam@mailinator.com', 'indore', NULL, '', '', 0, '678987688', 'Mr.', '2', '1', 'M', 'yyyy', 'indore', '11', 231, '', '', '346', 'This is my test information', '', 0, NULL, '2017-06-30 22:19:46', '2'),
(3, 2, 'Aman', 'Raikwar', '0000-00-00', 'aman@gmail.com', '', NULL, '', '123456', 0, '', 'Mr.', NULL, NULL, 'M', '', 'Jabalpur', '5', 231, '5', '', '123', NULL, '', 1, NULL, '2017-07-01 22:22:17', '1'),
(4, 3, 'Sam', 'pop', '0000-00-00', 'sam@mailinator.com', 'indore', 'aman', '', '123456', 0, '0987654321', 'Mr.', '2', '1', '', 'wert', 'indore', '5', 231, '5', '', '346', NULL, '', 1, NULL, '2017-07-01 22:28:44', '1'),
(5, 4, 'qwqw', 'asasa', '1999-07-01', 'swmishra26@gmail.com', '245 jawahar nagar', NULL, '', '123456', 0, '123456', 'Mr.', '2', '3', 'F', 'qwwwqqqqqqq', 'nagpur', '15', 231, '', '', '440024', NULL, '', 1, NULL, '2017-07-01 22:34:57', '3'),
(6, 1, 'Pratik', 'Soni', '1999-07-02', 'pratik@gmail.com', '', NULL, '', '123456', 0, '', '', '1', NULL, 'M', '', 'test', '4', 231, '', '', '12345', NULL, '', 1, NULL, '2017-07-02 00:00:15', ''),
(7, 3, 'Priya', 'Jain', '1999-06-10', 'priya@gmail.com', '', NULL, '', '123456', 0, '', '', '1', NULL, 'F', '', 'qqqq', '6', 231, '', '', '1212334', NULL, '', 1, NULL, '2017-07-02 00:02:37', ''),
(8, 3, 'Aman', 'Raikwar', '1999-02-16', 'swmishra2116@gmail.com', '', NULL, '', '123456', 0, '', '', NULL, NULL, '', '', 'tyuiop', '9', 231, '', '', '12344', NULL, '', 1, NULL, '2017-07-02 00:07:20', ''),
(9, 1, 'Arvind', 'Bavariya', '1999-02-03', 'arvind@gmail.com', '', '?nn??JU?\0aG??{Y??N???T???g???w?s', '', '123456', 0, '', '', NULL, NULL, '', '', 'qwerrer', '6', 231, '', '', '123456', NULL, '', 1, NULL, '2017-07-02 14:03:41', '');

-- --------------------------------------------------------

--
-- Table structure for table `playeractivity`
--

CREATE TABLE `playeractivity` (
  `ID` int(11) NOT NULL COMMENT 'Unique system reference',
  `ReaderID` varchar(100) NOT NULL COMMENT 'Reference ID of the Card Reader, which is the referenced in the reader table to determine which golf club the golfer has checked-in at.',
  `CardID` varchar(100) NOT NULL COMMENT 'The unique Card ID captured during check-in which is then referenced in the Registration Card table to work out which player check-in.',
  `Date` datetime NOT NULL COMMENT 'When the check-in occurred (day and time)'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `registration_cards`
--

CREATE TABLE `registration_cards` (
  `ID` int(11) NOT NULL COMMENT 'Unique system reference',
  `CardNumber` varchar(200) NOT NULL COMMENT 'The card number assigned to the physical card',
  `UserID` varchar(200) NOT NULL COMMENT 'The user who is assigned to the physical card',
  `RegisteredDate` date NOT NULL COMMENT 'When the card is assigned to a user',
  `ClubID` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `card_membership_category`
--
ALTER TABLE `card_membership_category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `card_readers`
--
ALTER TABLE `card_readers`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `reader_name` (`ReaderName`);

--
-- Indexes for table `club_functionality`
--
ALTER TABLE `club_functionality`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `functionality_name` (`name`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `idx_ogn_country` (`code`);

--
-- Indexes for table `county`
--
ALTER TABLE `county`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `golfcourse`
--
ALTER TABLE `golfcourse`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `player`
--
ALTER TABLE `player`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `playeractivity`
--
ALTER TABLE `playeractivity`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `registration_cards`
--
ALTER TABLE `registration_cards`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `card_membership_category`
--
ALTER TABLE `card_membership_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `card_readers`
--
ALTER TABLE `card_readers`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique system reference';
--
-- AUTO_INCREMENT for table `club_functionality`
--
ALTER TABLE `club_functionality`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;
--
-- AUTO_INCREMENT for table `county`
--
ALTER TABLE `county`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=174;
--
-- AUTO_INCREMENT for table `golfcourse`
--
ALTER TABLE `golfcourse`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique system reference', AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `player`
--
ALTER TABLE `player`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `playeractivity`
--
ALTER TABLE `playeractivity`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique system reference';
--
-- AUTO_INCREMENT for table `registration_cards`
--
ALTER TABLE `registration_cards`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique system reference';
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
