-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 13, 2017 at 06:56 AM
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
(6, 'Demo 1', '22222', '123456', 0, '', 'johnson@mailinator.com', 'http://www.facebook.com', 'http://www.twitter.com', '+918870947750', 'New York', 'wewewe', 'qwerty', '15', '231', '451115', 'qwqw', 'qwqw', 'http://www.google.com', 40000, 4500, 34, 'http://www.google.com', '', '', 34000, 23000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '1,2,8,14'),
(7, 'Sam Club', 'sam', '', 0, '', 'sam@mailinator.com', '', '', '+918870947750', 'New York', '', 'New', '', '64', '', '', '', 'http://www.google.com', 40000, 4500, 30000, '', '', '', 34000, 23000, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '12,14');

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
  `ClubID` varchar(200) NOT NULL,
  `UserID` varchar(200) NOT NULL COMMENT 'The user who is assigned to the physical card',
  `RegisteredDate` date NOT NULL COMMENT 'When the card is assigned to a user'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `registration_cards`
--

INSERT INTO `registration_cards` (`ID`, `CardNumber`, `ClubID`, `UserID`, `RegisteredDate`) VALUES
(1, 'CN001', '0', '0', '2017-07-11'),
(2, 'CN002', '0', '0', '2017-07-11'),
(3, 'CN003', '0', '0', '2017-07-11'),
(4, 'CN004', '0', '0', '2017-07-11'),
(5, 'CN005', '0', '0', '2017-07-11'),
(6, 'CN006', '0', '0', '2017-07-11'),
(7, 'CN007', '0', '0', '2017-07-11'),
(8, 'CN008', '0', '0', '2017-07-11'),
(9, 'CN009', '0', '0', '2017-07-11'),
(10, 'CN0010', '0', '0', '2017-07-11'),
(11, 'AB001', '0', '0', '2017-07-11'),
(12, 'AB002', '0', '0', '2017-07-11'),
(13, 'AB003', '0', '0', '2017-07-11'),
(14, 'AB004', '0', '0', '2017-07-11'),
(15, 'AB005', '0', '0', '2017-07-11'),
(16, 'AB006', '0', '0', '2017-07-11'),
(17, 'AB007', '0', '0', '2017-07-11'),
(18, 'AB008', '0', '0', '2017-07-11'),
(19, 'AB009', '0', '0', '2017-07-11'),
(20, 'AB0010', '0', '0', '2017-07-11'),
(21, 'AB0011', '0', '0', '2017-07-11'),
(22, 'AB0012', '0', '0', '2017-07-11'),
(23, 'AB0013', '0', '0', '2017-07-11'),
(24, 'AB0014', '0', '0', '2017-07-11'),
(25, 'AB0015', '0', '0', '2017-07-11'),
(26, 'AB0016', '0', '0', '2017-07-11'),
(27, 'AB0017', '0', '0', '2017-07-11'),
(28, 'AB0018', '0', '0', '2017-07-11'),
(29, 'AB0019', '0', '0', '2017-07-11'),
(30, 'AB0020', '0', '0', '2017-07-11'),
(31, 'AB0021', '0', '0', '2017-07-11'),
(32, 'AB0022', '0', '0', '2017-07-11'),
(33, 'AB0023', '0', '0', '2017-07-11'),
(34, 'AB0024', '0', '0', '2017-07-11'),
(35, 'AB0025', '0', '0', '2017-07-11'),
(36, 'AB0026', '0', '0', '2017-07-11'),
(37, 'AB0027', '0', '0', '2017-07-11'),
(38, 'AB0028', '0', '0', '2017-07-11'),
(39, 'AB0029', '0', '0', '2017-07-11'),
(40, 'AB0030', '0', '0', '2017-07-11'),
(41, 'AB0031', '0', '0', '2017-07-11'),
(42, 'AB0032', '0', '0', '2017-07-11'),
(43, 'AB0033', '0', '0', '2017-07-11'),
(44, 'AB0034', '0', '0', '2017-07-11'),
(45, 'AB0035', '0', '0', '2017-07-11'),
(46, 'AB0036', '0', '0', '2017-07-11'),
(47, 'AB0037', '0', '0', '2017-07-11'),
(48, 'AB0038', '0', '0', '2017-07-11'),
(49, 'AB0039', '0', '0', '2017-07-11'),
(50, 'AB0040', '0', '0', '2017-07-11'),
(51, 'AB0041', '0', '0', '2017-07-11'),
(52, 'AB0042', '0', '0', '2017-07-11'),
(53, 'AB0043', '0', '0', '2017-07-11'),
(54, 'AB0044', '0', '0', '2017-07-11'),
(55, 'AB0045', '0', '0', '2017-07-11'),
(56, 'AB0046', '0', '0', '2017-07-11'),
(57, 'AB0047', '0', '0', '2017-07-11'),
(58, 'AB0048', '0', '0', '2017-07-11'),
(59, 'AB0049', '0', '0', '2017-07-11'),
(60, 'AB0050', '0', '0', '2017-07-11'),
(61, 'PH001', '0', '0', '2017-07-11'),
(62, 'PH002', '0', '0', '2017-07-11'),
(63, 'PH003', '0', '0', '2017-07-11'),
(64, 'PH004', '0', '0', '2017-07-11'),
(65, 'PH005', '0', '0', '2017-07-11'),
(66, 'PH006', '0', '0', '2017-07-11'),
(67, 'PH007', '0', '0', '2017-07-11'),
(68, 'PH008', '0', '0', '2017-07-11'),
(69, 'PH009', '0', '0', '2017-07-11'),
(70, 'PH0010', '0', '0', '2017-07-11'),
(71, 'PH0011', '0', '0', '2017-07-11'),
(72, 'PH0012', '0', '0', '2017-07-11'),
(73, 'PH0013', '0', '0', '2017-07-11'),
(74, 'PH0014', '0', '0', '2017-07-11'),
(75, 'PH0015', '0', '0', '2017-07-11'),
(76, 'PH0016', '0', '0', '2017-07-11'),
(77, 'PH0017', '0', '0', '2017-07-11'),
(78, 'PH0018', '0', '0', '2017-07-11'),
(79, 'PH0019', '0', '0', '2017-07-11'),
(80, 'PH0020', '0', '0', '2017-07-11'),
(81, 'PH0021', '0', '0', '2017-07-11'),
(82, 'PH0022', '0', '0', '2017-07-11'),
(83, 'PH0023', '0', '0', '2017-07-11'),
(84, 'PH0024', '0', '0', '2017-07-11'),
(85, 'PH0025', '0', '0', '2017-07-11'),
(86, 'PH0026', '0', '0', '2017-07-11'),
(87, 'PH0027', '0', '0', '2017-07-11'),
(88, 'PH0028', '0', '0', '2017-07-11'),
(89, 'PH0029', '0', '0', '2017-07-11'),
(90, 'PH0030', '0', '0', '2017-07-11'),
(91, 'PH0031', '0', '0', '2017-07-11'),
(92, 'PH0032', '0', '0', '2017-07-11'),
(93, 'PH0033', '0', '0', '2017-07-11'),
(94, 'PH0034', '0', '0', '2017-07-11'),
(95, 'PH0035', '0', '0', '2017-07-11'),
(96, 'PH0036', '0', '0', '2017-07-11'),
(97, 'PH0037', '0', '0', '2017-07-11'),
(98, 'PH0038', '0', '0', '2017-07-11'),
(99, 'PH0039', '0', '0', '2017-07-11'),
(100, 'PH0040', '0', '0', '2017-07-11'),
(101, 'PH0041', '0', '0', '2017-07-11'),
(102, 'PH0042', '0', '0', '2017-07-11'),
(103, 'PH0043', '0', '0', '2017-07-11'),
(104, 'PH0044', '0', '0', '2017-07-11'),
(105, 'PH0045', '0', '0', '2017-07-11'),
(106, 'PH0046', '0', '0', '2017-07-11'),
(107, 'PH0047', '0', '0', '2017-07-11'),
(108, 'PH0048', '0', '0', '2017-07-11'),
(109, 'PH0049', '0', '0', '2017-07-11'),
(110, 'PH0050', '0', '0', '2017-07-11'),
(111, 'KIM001', '4', '0', '2017-07-12'),
(112, 'KIM002', '4', '0', '2017-07-12'),
(113, 'KIM003', '4', '0', '2017-07-12'),
(114, 'KIM004', '4', '0', '2017-07-12'),
(115, 'KIM005', '4', '0', '2017-07-12'),
(116, 'KIM006', '4', '0', '2017-07-12'),
(117, 'KIM007', '4', '0', '2017-07-12'),
(118, 'KIM008', '4', '0', '2017-07-12'),
(119, 'KIM009', '4', '0', '2017-07-12'),
(120, 'KIM0010', '4', '0', '2017-07-12'),
(121, 'ABC100', '4', '0', '2017-07-12'),
(122, 'ABC101', '4', '0', '2017-07-12'),
(123, 'ABC102', '4', '0', '2017-07-12'),
(124, 'ABC103', '4', '0', '2017-07-12'),
(125, 'ABC104', '4', '0', '2017-07-12'),
(126, 'ABC105', '4', '0', '2017-07-12'),
(127, 'ABC106', '4', '0', '2017-07-12'),
(128, 'ABC107', '4', '0', '2017-07-12'),
(129, 'ABC108', '4', '0', '2017-07-12'),
(130, 'ABC109', '4', '0', '2017-07-12'),
(131, 'ABC110', '4', '0', '2017-07-12'),
(132, 'ABC111', '4', '0', '2017-07-12'),
(133, 'ABC112', '4', '0', '2017-07-12'),
(134, 'ABC113', '4', '0', '2017-07-12'),
(135, 'ABC114', '4', '0', '2017-07-12'),
(136, 'ABC115', '4', '0', '2017-07-12'),
(137, 'ABC116', '4', '0', '2017-07-12'),
(138, 'ABC117', '4', '0', '2017-07-12'),
(139, 'ABC118', '4', '0', '2017-07-12'),
(140, 'ABC119', '4', '0', '2017-07-12'),
(141, 'ABC120', '4', '0', '2017-07-12'),
(142, 'ABC121', '4', '0', '2017-07-12'),
(143, 'ABC122', '4', '0', '2017-07-12'),
(144, 'ABC123', '4', '0', '2017-07-12'),
(145, 'ABC124', '4', '0', '2017-07-12'),
(146, 'ABC125', '4', '0', '2017-07-12'),
(147, 'ABC126', '4', '0', '2017-07-12'),
(148, 'ABC127', '4', '0', '2017-07-12'),
(149, 'ABC128', '4', '0', '2017-07-12'),
(150, 'ABC129', '4', '0', '2017-07-12'),
(151, 'ABC130', '4', '0', '2017-07-12'),
(152, 'ABC131', '4', '0', '2017-07-12'),
(153, 'ABC132', '4', '0', '2017-07-12'),
(154, 'ABC133', '4', '0', '2017-07-12'),
(155, 'ABC134', '4', '0', '2017-07-12'),
(156, 'ABC135', '4', '0', '2017-07-12'),
(157, 'ABC136', '4', '0', '2017-07-12'),
(158, 'ABC137', '4', '0', '2017-07-12'),
(159, 'ABC138', '4', '0', '2017-07-12'),
(160, 'ABC139', '4', '0', '2017-07-12'),
(161, 'ABC140', '4', '0', '2017-07-12'),
(162, 'ABC141', '4', '0', '2017-07-12'),
(163, 'ABC142', '4', '0', '2017-07-12'),
(164, 'ABC143', '4', '0', '2017-07-12'),
(165, 'ABC144', '4', '0', '2017-07-12'),
(166, 'ABC145', '4', '0', '2017-07-12'),
(167, 'ABC146', '4', '0', '2017-07-12'),
(168, 'ABC147', '4', '0', '2017-07-12'),
(169, 'ABC148', '4', '0', '2017-07-12'),
(170, 'ABC149', '4', '0', '2017-07-12'),
(171, 'ABC150', '4', '0', '2017-07-12'),
(172, 'AB1', '', '0', '2017-07-12'),
(173, 'AB2', '', '0', '2017-07-12'),
(174, 'AB3', '', '0', '2017-07-12'),
(175, 'AB4', '', '0', '2017-07-12'),
(176, 'AB5', '', '0', '2017-07-12'),
(177, 'AB1', '4', '0', '2017-07-12'),
(178, 'AB2', '4', '0', '2017-07-12'),
(179, 'AB3', '4', '0', '2017-07-12'),
(180, 'AB4', '4', '0', '2017-07-12'),
(181, 'AB5', '4', '0', '2017-07-12'),
(182, 'AB6', '4', '0', '2017-07-12'),
(183, 'AB7', '4', '0', '2017-07-12'),
(184, 'KIM201', '4', '0', '2017-07-12'),
(185, 'KIM202', '4', '0', '2017-07-12'),
(186, 'KIM203', '4', '0', '2017-07-12'),
(187, 'KIM204', '4', '0', '2017-07-12'),
(188, 'KIM205', '4', '0', '2017-07-12'),
(189, 'KIM206', '4', '0', '2017-07-12'),
(190, 'KIM207', '4', '0', '2017-07-12'),
(191, 'KIM208', '4', '0', '2017-07-12'),
(192, 'KIM209', '4', '0', '2017-07-12'),
(193, 'KIM210', '4', '0', '2017-07-12'),
(194, 'KIM211', '4', '0', '2017-07-12'),
(195, 'KIM212', '4', '0', '2017-07-12'),
(196, 'KIM213', '4', '0', '2017-07-12'),
(197, 'KIM214', '4', '0', '2017-07-12'),
(198, 'KIM215', '4', '0', '2017-07-12'),
(199, 'KIM216', '4', '0', '2017-07-12'),
(200, 'KIM217', '4', '0', '2017-07-12'),
(201, 'KIM218', '4', '0', '2017-07-12'),
(202, 'KIM219', '4', '0', '2017-07-12'),
(203, 'KIM220', '4', '0', '2017-07-12'),
(204, 'KIM221', '4', '0', '2017-07-12'),
(205, 'KIM222', '4', '0', '2017-07-12'),
(206, 'KIM223', '4', '0', '2017-07-12'),
(207, 'KIM224', '4', '0', '2017-07-12'),
(208, 'KIM225', '4', '0', '2017-07-12'),
(209, 'KIM226', '4', '0', '2017-07-12'),
(210, 'KIM227', '4', '0', '2017-07-12'),
(211, 'KIM228', '4', '0', '2017-07-12'),
(212, 'KIM229', '4', '0', '2017-07-12'),
(213, 'KIM230', '4', '0', '2017-07-12'),
(214, 'KIM231', '4', '0', '2017-07-12'),
(215, 'KIM232', '4', '0', '2017-07-12'),
(216, 'KIM233', '4', '0', '2017-07-12'),
(217, 'KIM234', '4', '0', '2017-07-12'),
(218, 'KIM235', '4', '0', '2017-07-12'),
(219, 'KIM236', '4', '0', '2017-07-12'),
(220, 'KIM237', '4', '0', '2017-07-12'),
(221, 'KIM238', '4', '0', '2017-07-12'),
(222, 'KIM239', '4', '0', '2017-07-12'),
(223, 'KIM240', '4', '0', '2017-07-12'),
(224, 'KIM241', '4', '0', '2017-07-12'),
(225, 'KIM242', '4', '0', '2017-07-12'),
(226, 'KIM243', '4', '0', '2017-07-12'),
(227, 'KIM244', '4', '0', '2017-07-12'),
(228, 'KIM245', '4', '0', '2017-07-12'),
(229, 'KIM246', '4', '0', '2017-07-12'),
(230, 'KIM247', '4', '0', '2017-07-12'),
(231, 'KIM248', '4', '0', '2017-07-12'),
(232, 'KIM249', '4', '0', '2017-07-12'),
(233, 'KIM250', '4', '0', '2017-07-12'),
(234, 'KIM251', '4', '0', '2017-07-12'),
(235, 'KIM252', '4', '0', '2017-07-12'),
(236, 'KIM253', '4', '0', '2017-07-12'),
(237, 'KIM254', '4', '0', '2017-07-12'),
(238, 'KIM255', '4', '0', '2017-07-12'),
(239, 'KIM256', '4', '0', '2017-07-12'),
(240, 'KIM257', '4', '0', '2017-07-12'),
(241, 'KIM258', '4', '0', '2017-07-12'),
(242, 'KIM259', '4', '0', '2017-07-12'),
(243, 'KIM260', '4', '0', '2017-07-12'),
(244, 'KIM261', '4', '0', '2017-07-12'),
(245, 'KIM262', '4', '0', '2017-07-12'),
(246, 'KIM263', '4', '0', '2017-07-12'),
(247, 'KIM264', '4', '0', '2017-07-12'),
(248, 'KIM265', '4', '0', '2017-07-12'),
(249, 'KIM266', '4', '0', '2017-07-12'),
(250, 'KIM267', '4', '0', '2017-07-12'),
(251, 'KIM268', '4', '0', '2017-07-12'),
(252, 'KIM269', '4', '0', '2017-07-12'),
(253, 'KIM270', '4', '0', '2017-07-12'),
(254, 'KIM271', '4', '0', '2017-07-12'),
(255, 'KIM272', '4', '0', '2017-07-12'),
(256, 'KIM273', '4', '0', '2017-07-12'),
(257, 'KIM274', '4', '0', '2017-07-12'),
(258, 'KIM275', '4', '0', '2017-07-12'),
(259, 'KIM276', '4', '0', '2017-07-12'),
(260, 'KIM277', '4', '0', '2017-07-12'),
(261, 'KIM278', '4', '0', '2017-07-12'),
(262, 'KIM279', '4', '0', '2017-07-12'),
(263, 'KIM280', '4', '0', '2017-07-12'),
(264, 'KIM281', '4', '0', '2017-07-12'),
(265, 'KIM282', '4', '0', '2017-07-12'),
(266, 'KIM283', '4', '0', '2017-07-12'),
(267, 'KIM284', '4', '0', '2017-07-12'),
(268, 'KIM285', '4', '0', '2017-07-12'),
(269, 'KIM286', '4', '0', '2017-07-12'),
(270, 'KIM287', '4', '0', '2017-07-12'),
(271, 'KIM288', '4', '0', '2017-07-12'),
(272, 'KIM289', '4', '0', '2017-07-12'),
(273, 'KIM290', '4', '0', '2017-07-12'),
(274, 'KIM291', '4', '0', '2017-07-12'),
(275, 'KIM292', '4', '0', '2017-07-12'),
(276, 'KIM293', '4', '0', '2017-07-12'),
(277, 'KIM294', '4', '0', '2017-07-12'),
(278, 'KIM295', '4', '0', '2017-07-12'),
(279, 'KIM296', '4', '0', '2017-07-12'),
(280, 'KIM297', '4', '0', '2017-07-12'),
(281, 'KIM298', '4', '0', '2017-07-12'),
(282, 'KIM299', '4', '0', '2017-07-12'),
(283, 'KIM300', '4', '0', '2017-07-12'),
(284, 'KIM000201', '4', '0', '2017-07-12'),
(285, 'KIM000202', '4', '0', '2017-07-12'),
(286, 'KIM000203', '4', '0', '2017-07-12'),
(287, 'KIM000204', '4', '0', '2017-07-12'),
(288, 'KIM000205', '4', '0', '2017-07-12'),
(289, 'KIM000206', '4', '0', '2017-07-12'),
(290, 'KIM000207', '4', '0', '2017-07-12'),
(291, 'KIM000208', '4', '0', '2017-07-12'),
(292, 'KIM000209', '4', '0', '2017-07-12'),
(293, 'KIM000210', '4', '0', '2017-07-12'),
(294, 'KIM000211', '4', '0', '2017-07-12'),
(295, 'KIM000212', '4', '0', '2017-07-12'),
(296, 'KIM000213', '4', '0', '2017-07-12'),
(297, 'KIM000214', '4', '0', '2017-07-12'),
(298, 'KIM000215', '4', '0', '2017-07-12'),
(299, 'KIM000216', '4', '0', '2017-07-12'),
(300, 'KIM000217', '4', '0', '2017-07-12'),
(301, 'KIM000218', '4', '0', '2017-07-12'),
(302, 'KIM000219', '4', '0', '2017-07-12'),
(303, 'KIM000220', '4', '0', '2017-07-12'),
(304, 'KIM000221', '4', '0', '2017-07-12'),
(305, 'KIM000222', '4', '0', '2017-07-12'),
(306, 'KIM000223', '4', '0', '2017-07-12'),
(307, 'KIM000224', '4', '0', '2017-07-12'),
(308, 'KIM000225', '4', '0', '2017-07-12'),
(309, 'KIM000226', '4', '0', '2017-07-12'),
(310, 'KIM000227', '4', '0', '2017-07-12'),
(311, 'KIM000228', '4', '0', '2017-07-12'),
(312, 'KIM000229', '4', '0', '2017-07-12'),
(313, 'KIM000230', '4', '0', '2017-07-12'),
(314, 'KIM000231', '4', '0', '2017-07-12'),
(315, 'KIM000232', '4', '0', '2017-07-12'),
(316, 'KIM000233', '4', '0', '2017-07-12'),
(317, 'KIM000234', '4', '0', '2017-07-12'),
(318, 'KIM000235', '4', '0', '2017-07-12'),
(319, 'KIM000236', '4', '0', '2017-07-12'),
(320, 'KIM000237', '4', '0', '2017-07-12'),
(321, 'KIM000238', '4', '0', '2017-07-12'),
(322, 'KIM000239', '4', '0', '2017-07-12'),
(323, 'KIM000240', '4', '0', '2017-07-12'),
(324, 'KIM000241', '4', '0', '2017-07-12'),
(325, 'KIM000242', '4', '0', '2017-07-12'),
(326, 'KIM000243', '4', '0', '2017-07-12'),
(327, 'KIM000244', '4', '0', '2017-07-12'),
(328, 'KIM000245', '4', '0', '2017-07-12'),
(329, 'KIM000246', '4', '0', '2017-07-12'),
(330, 'KIM000247', '4', '0', '2017-07-12'),
(331, 'KIM000248', '4', '0', '2017-07-12'),
(332, 'KIM000249', '4', '0', '2017-07-12'),
(333, 'KIM000250', '4', '0', '2017-07-12'),
(334, 'KIM000251', '4', '0', '2017-07-12'),
(335, 'KIM000252', '4', '0', '2017-07-12'),
(336, 'KIM000253', '4', '0', '2017-07-12'),
(337, 'KIM000254', '4', '0', '2017-07-12'),
(338, 'KIM000255', '4', '0', '2017-07-12'),
(339, 'KIM000256', '4', '0', '2017-07-12'),
(340, 'KIM000257', '4', '0', '2017-07-12'),
(341, 'KIM000258', '4', '0', '2017-07-12'),
(342, 'KIM000259', '4', '0', '2017-07-12'),
(343, 'KIM000260', '4', '0', '2017-07-12'),
(344, 'KIM000261', '4', '0', '2017-07-12'),
(345, 'KIM000262', '4', '0', '2017-07-12'),
(346, 'KIM000263', '4', '0', '2017-07-12'),
(347, 'KIM000264', '4', '0', '2017-07-12'),
(348, 'KIM000265', '4', '0', '2017-07-12'),
(349, 'KIM000266', '4', '0', '2017-07-12'),
(350, 'KIM000267', '4', '0', '2017-07-12'),
(351, 'KIM000268', '4', '0', '2017-07-12'),
(352, 'KIM000269', '4', '0', '2017-07-12'),
(353, 'KIM000270', '4', '0', '2017-07-12'),
(354, 'KIM000271', '4', '0', '2017-07-12'),
(355, 'KIM000272', '4', '0', '2017-07-12'),
(356, 'KIM000273', '4', '0', '2017-07-12'),
(357, 'KIM000274', '4', '0', '2017-07-12'),
(358, 'KIM000275', '4', '0', '2017-07-12'),
(359, 'KIM000276', '4', '0', '2017-07-12'),
(360, 'KIM000277', '4', '0', '2017-07-12'),
(361, 'KIM000278', '4', '0', '2017-07-12'),
(362, 'KIM000279', '4', '0', '2017-07-12'),
(363, 'KIM000280', '4', '0', '2017-07-12'),
(364, 'KIM000281', '4', '0', '2017-07-12'),
(365, 'KIM000282', '4', '0', '2017-07-12'),
(366, 'KIM000283', '4', '0', '2017-07-12'),
(367, 'KIM000284', '4', '0', '2017-07-12'),
(368, 'KIM000285', '4', '0', '2017-07-12'),
(369, 'KIM000286', '4', '0', '2017-07-12'),
(370, 'KIM000287', '4', '0', '2017-07-12'),
(371, 'KIM000288', '4', '0', '2017-07-12'),
(372, 'KIM000289', '4', '0', '2017-07-12'),
(373, 'KIM000290', '4', '0', '2017-07-12'),
(374, 'KIM000291', '4', '0', '2017-07-12'),
(375, 'KIM000292', '4', '0', '2017-07-12'),
(376, 'KIM000293', '4', '0', '2017-07-12'),
(377, 'KIM000294', '4', '0', '2017-07-12'),
(378, 'KIM000295', '4', '0', '2017-07-12'),
(379, 'KIM000296', '4', '0', '2017-07-12'),
(380, 'KIM000297', '4', '0', '2017-07-12'),
(381, 'KIM000298', '4', '0', '2017-07-12'),
(382, 'KIM000299', '4', '0', '2017-07-12'),
(383, 'KIM000300', '4', '0', '2017-07-12'),
(384, 'OMD00000001', '4', '0', '2017-07-12'),
(385, 'OMD00000002', '4', '0', '2017-07-12'),
(386, 'OMD00000003', '4', '0', '2017-07-12'),
(387, 'OMD00000004', '4', '0', '2017-07-12'),
(388, 'OMD00000005', '4', '0', '2017-07-12'),
(389, 'OMD00000006', '4', '0', '2017-07-12'),
(390, 'OMD00000007', '4', '0', '2017-07-12'),
(391, 'OMD00000008', '4', '0', '2017-07-12'),
(392, 'OMD00000009', '4', '0', '2017-07-12'),
(393, 'OMD00000010', '4', '0', '2017-07-12'),
(394, 'OMD00000011', '4', '0', '2017-07-12'),
(395, 'OMD00000012', '4', '0', '2017-07-12'),
(396, 'OMD00000013', '4', '0', '2017-07-12'),
(397, 'OMD00000014', '4', '0', '2017-07-12'),
(398, 'OMD00000015', '4', '0', '2017-07-12'),
(399, 'OMD00000016', '4', '0', '2017-07-12'),
(400, 'OMD00000017', '4', '0', '2017-07-12'),
(401, 'OMD00000018', '4', '0', '2017-07-12'),
(402, 'OMD00000019', '4', '0', '2017-07-12'),
(403, 'OMD00000020', '4', '0', '2017-07-12'),
(404, 'OMD00000021', '4', '0', '2017-07-12'),
(405, 'OMD00000022', '4', '0', '2017-07-12'),
(406, 'OMD00000023', '4', '0', '2017-07-12'),
(407, 'OMD00000024', '4', '0', '2017-07-12'),
(408, 'OMD00000025', '4', '0', '2017-07-12'),
(409, 'OMD00000026', '4', '0', '2017-07-12'),
(410, 'OMD00000027', '4', '0', '2017-07-12'),
(411, 'OMD00000028', '4', '0', '2017-07-12'),
(412, 'OMD00000029', '4', '0', '2017-07-12'),
(413, 'OMD00000030', '4', '0', '2017-07-12'),
(414, 'OMD00000031', '4', '0', '2017-07-12'),
(415, 'OMD00000032', '4', '0', '2017-07-12'),
(416, 'OMD00000033', '4', '0', '2017-07-12'),
(417, 'OMD00000034', '4', '0', '2017-07-12'),
(418, 'OMD00000035', '4', '0', '2017-07-12'),
(419, 'OMD00000036', '4', '0', '2017-07-12'),
(420, 'OMD00000037', '4', '0', '2017-07-12'),
(421, 'OMD00000038', '4', '0', '2017-07-12'),
(422, 'OMD00000039', '4', '0', '2017-07-12'),
(423, 'OMD00000040', '4', '0', '2017-07-12'),
(424, 'OMD00000041', '4', '0', '2017-07-12'),
(425, 'OMD00000042', '4', '0', '2017-07-12'),
(426, 'OMD00000043', '4', '0', '2017-07-12'),
(427, 'OMD00000044', '4', '0', '2017-07-12'),
(428, 'OMD00000045', '4', '0', '2017-07-12'),
(429, 'OMD00000046', '4', '0', '2017-07-12'),
(430, 'OMD00000047', '4', '0', '2017-07-12'),
(431, 'OMD00000048', '4', '0', '2017-07-12'),
(432, 'OMD00000049', '4', '0', '2017-07-12'),
(433, 'OMD00000050', '4', '0', '2017-07-12'),
(434, 'OMD00000051', '4', '0', '2017-07-12'),
(435, 'OMD00000052', '4', '0', '2017-07-12'),
(436, 'OMD00000053', '4', '0', '2017-07-12'),
(437, 'OMD00000054', '4', '0', '2017-07-12'),
(438, 'OMD00000055', '4', '0', '2017-07-12'),
(439, 'OMD00000056', '4', '0', '2017-07-12'),
(440, 'OMD00000057', '4', '0', '2017-07-12'),
(441, 'OMD00000058', '4', '0', '2017-07-12'),
(442, 'OMD00000059', '4', '0', '2017-07-12'),
(443, 'OMD00000060', '4', '0', '2017-07-12'),
(444, 'OMD00000061', '4', '0', '2017-07-12'),
(445, 'OMD00000062', '4', '0', '2017-07-12'),
(446, 'OMD00000063', '4', '0', '2017-07-12'),
(447, 'OMD00000064', '4', '0', '2017-07-12'),
(448, 'OMD00000065', '4', '0', '2017-07-12'),
(449, 'OMD00000066', '4', '0', '2017-07-12'),
(450, 'OMD00000067', '4', '0', '2017-07-12'),
(451, 'OMD00000068', '4', '0', '2017-07-12'),
(452, 'OMD00000069', '4', '0', '2017-07-12'),
(453, 'OMD00000070', '4', '0', '2017-07-12'),
(454, 'OMD00000071', '4', '0', '2017-07-12'),
(455, 'OMD00000072', '4', '0', '2017-07-12'),
(456, 'OMD00000073', '4', '0', '2017-07-12'),
(457, 'OMD00000074', '4', '0', '2017-07-12'),
(458, 'OMD00000075', '4', '0', '2017-07-12'),
(459, 'OMD00000076', '4', '0', '2017-07-12'),
(460, 'OMD00000077', '4', '0', '2017-07-12'),
(461, 'OMD00000078', '4', '0', '2017-07-12'),
(462, 'OMD00000079', '4', '0', '2017-07-12'),
(463, 'OMD00000080', '4', '0', '2017-07-12'),
(464, 'OMD00000081', '4', '0', '2017-07-12'),
(465, 'OMD00000082', '4', '0', '2017-07-12'),
(466, 'OMD00000083', '4', '0', '2017-07-12'),
(467, 'OMD00000084', '4', '0', '2017-07-12'),
(468, 'OMD00000085', '4', '0', '2017-07-12'),
(469, 'OMD00000086', '4', '0', '2017-07-12'),
(470, 'OMD00000087', '4', '0', '2017-07-12'),
(471, 'OMD00000088', '4', '0', '2017-07-12'),
(472, 'OMD00000089', '4', '0', '2017-07-12'),
(473, 'OMD00000090', '4', '0', '2017-07-12'),
(474, 'OMD00000091', '4', '0', '2017-07-12'),
(475, 'OMD00000092', '4', '0', '2017-07-12'),
(476, 'OMD00000093', '4', '0', '2017-07-12'),
(477, 'OMD00000094', '4', '0', '2017-07-12'),
(478, 'OMD00000095', '4', '0', '2017-07-12'),
(479, 'OMD00000096', '4', '0', '2017-07-12'),
(480, 'OMD00000097', '4', '0', '2017-07-12'),
(481, 'OMD00000098', '4', '0', '2017-07-12'),
(482, 'OMD00000099', '4', '0', '2017-07-12'),
(483, 'OMD00000100', '4', '0', '2017-07-12'),
(484, 'OMD00000101', '4', '0', '2017-07-12');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_firstname` varchar(255) NOT NULL,
  `admin_lastname` varchar(255) NOT NULL,
  `admin_userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_golfclub`
--

CREATE TABLE `tbl_golfclub` (
  `golfclub_id` int(11) NOT NULL COMMENT 'Unique system reference',
  `golfclub_name` varchar(255) NOT NULL COMMENT 'Name of the Golf Cours',
  `golfclub_facebookUrl` varchar(255) DEFAULT NULL COMMENT 'Link to the Club’s Facebook Page',
  `golfclub_twitterUrl` varchar(255) DEFAULT NULL COMMENT 'Link to the Club’s Twitter Page',
  `golfclub_phone` varchar(50) DEFAULT NULL COMMENT 'Phone Number for the course',
  `golfclub_address1` varchar(255) DEFAULT NULL COMMENT 'Address Line 1 of the Club',
  `golfclub_address2` varchar(255) DEFAULT NULL COMMENT 'Address Line 2 of the Club',
  `golfclub_town` varchar(255) NOT NULL COMMENT 'Town of the Club',
  `golfclub_countryID` int(11) NOT NULL COMMENT 'Country of the Club',
  `golfclub_countyID` int(11) DEFAULT NULL COMMENT 'County of the Club',
  `golfclub_postCode` varchar(100) DEFAULT NULL COMMENT 'Postcode of the Club',
  `golfclub_addressNotes` varchar(300) DEFAULT NULL COMMENT 'Description field for clubs to enter directions etc.',
  `golfclub_description` varchar(500) DEFAULT NULL COMMENT '250 max word limit description of the club',
  `golfclub_websiteUrl` varchar(255) NOT NULL COMMENT 'Link to the Club’s website',
  `golfclub_holes` int(11) NOT NULL COMMENT 'How many holes the golf course has',
  `golfclub_yardage` int(11) NOT NULL COMMENT 'The total yardage of the course',
  `golfclub_par` int(11) NOT NULL COMMENT 'The total Par of the course',
  `golfclub_gpgUrl` varchar(255) DEFAULT NULL COMMENT 'Link to the Club’s GPG Page',
  `golfclub_logo` varchar(255) DEFAULT NULL COMMENT 'ClubLogo	varchar(255)	URL to the club''s logo image',
  `golfclub_greenFeeFrom` int(11) NOT NULL COMMENT 'The lowest price of green fee at the club (no decimals)',
  `golfclub_greenFeeTo` int(11) NOT NULL COMMENT 'The highest price of green fee at the club (no decimals)',
  `golfclub_facilities` varchar(255) DEFAULT NULL,
  `golfclub_userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_golfclub`
--

INSERT INTO `tbl_golfclub` (`golfclub_id`, `golfclub_name`, `golfclub_facebookUrl`, `golfclub_twitterUrl`, `golfclub_phone`, `golfclub_address1`, `golfclub_address2`, `golfclub_town`, `golfclub_countryID`, `golfclub_countyID`, `golfclub_postCode`, `golfclub_addressNotes`, `golfclub_description`, `golfclub_websiteUrl`, `golfclub_holes`, `golfclub_yardage`, `golfclub_par`, `golfclub_gpgUrl`, `golfclub_logo`, `golfclub_greenFeeFrom`, `golfclub_greenFeeTo`, `golfclub_facilities`, `golfclub_userID`) VALUES
(4, 'Kim', 'http://www.google.com', 'http://www.google.com', '343454', 'kimas', 'asacjhd', 'uytuyt', 231, 5, '657', 'jhgtuyyu', 'yutuytghvjg', 'http://www.google.com', 65656, 6565465, 65465, 'http://www.google.com', '20170706010156_256x256.png', 5000, 500000, '6,8,12,14', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_golfer`
--

CREATE TABLE `tbl_golfer` (
  `golfer_id` int(11) NOT NULL,
  `golfer_title` varchar(100) DEFAULT NULL,
  `golfer_firstname` varchar(200) NOT NULL,
  `golfer_lastname` varchar(200) NOT NULL,
  `golfer_gender` varchar(100) DEFAULT NULL,
  `golfer_dateOfBirth` date NOT NULL,
  `golfer_address1` varchar(200) DEFAULT NULL,
  `golfer_address2` varchar(200) DEFAULT NULL,
  `golfer_phone` varchar(100) DEFAULT NULL,
  `golfer_town` varchar(100) DEFAULT NULL,
  `golfer_firstClubID` int(11) NOT NULL COMMENT 'Which golf club they a member of. Can also be ''None'', which we will store in the platform as ''Nomad'' Club',
  `golfer_isMemberOfAnotherClub` varchar(100) DEFAULT NULL,
  `golfer_otherClubID` varchar(100) DEFAULT NULL,
  `golfer_country` int(11) DEFAULT NULL,
  `golfer_county` varchar(100) DEFAULT NULL,
  `golfer_countyCardId` varchar(100) DEFAULT NULL,
  `golfer_countyCardNumber` varchar(100) DEFAULT NULL,
  `golfer_postCode` varchar(100) DEFAULT NULL,
  `golfer_notes` varchar(200) DEFAULT NULL,
  `golfer_lifetimeID` varchar(256) DEFAULT NULL,
  `golfer_optIn` int(11) DEFAULT NULL,
  `golfer_opgRegType` varchar(100) DEFAULT NULL COMMENT 'This refers to the Golfer Card levels of 1,2,3 etc. For now, just put generic names.',
  `golfer_userID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_golfer`
--

INSERT INTO `tbl_golfer` (`golfer_id`, `golfer_title`, `golfer_firstname`, `golfer_lastname`, `golfer_gender`, `golfer_dateOfBirth`, `golfer_address1`, `golfer_address2`, `golfer_phone`, `golfer_town`, `golfer_firstClubID`, `golfer_isMemberOfAnotherClub`, `golfer_otherClubID`, `golfer_country`, `golfer_county`, `golfer_countyCardId`, `golfer_countyCardNumber`, `golfer_postCode`, `golfer_notes`, `golfer_lifetimeID`, `golfer_optIn`, `golfer_opgRegType`, `golfer_userID`) VALUES
(22, 'Mr.', 'Harish', 'Malviya', 'M', '1992-03-26', 'South Tukoganj', 'Barapathar', '9425388641', 'Indore', 1, '2', '2', 231, '3', NULL, NULL, '6785', NULL, NULL, 1, '3', 14),
(23, 'Mr.', 'Arvind', 'Bavariya', 'M', '1990-08-29', 'Idpre', 'sdsdsd', '918870947750', 'erere', 7, '2', '2', 231, '51', NULL, NULL, '24334', NULL, NULL, 1, '4', 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_role`
--

CREATE TABLE `tbl_role` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_role`
--

INSERT INTO `tbl_role` (`role_id`, `role_name`, `created_at`, `updated_at`, `status`) VALUES
(1, 'Administrator', NULL, NULL, 1),
(2, 'Golfer', '2017-07-04 03:38:30', '2017-07-04 03:38:30', 1),
(3, 'Golf Club', '2017-07-04 03:40:34', '2017-07-04 03:40:34', 1),
(4, 'Customer', '2017-07-06 03:42:13', '2017-07-06 03:42:13', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_username` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_activation_key` varchar(255) DEFAULT NULL,
  `user_auth_key` varchar(255) DEFAULT NULL,
  `user_roleID` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `status` tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_username`, `user_email`, `user_password`, `user_activation_key`, `user_auth_key`, `user_roleID`, `created_at`, `updated_at`, `status`) VALUES
(1, 'golfer', 'golfer@mailinator.com', '$2y$13$V4x9nGuvkOiGtapg335eledPz1fuLXKklXjBeWbw4fEwT.XSERdBK', NULL, 'IPbF7HmBtYlXkMkWUsBitAjtEbM5CGQl', 2, '2017-07-04 06:00:37', '2017-07-04 06:00:37', 1),
(2, 'golfclub', 'golfclub@mailinator.com', '$2y$13$iToW1fc4lwqeGfqoQjQqFelL4GQ2F/1Z/kfdAj42ziT9aTkYGBa2G', 'y1ycCdx5Yju2mrhsH70HuEG2lhNpHJIv_1499365590', 'zUMlKymX30agwPsKZ9bEIfdIp_v4ZbZj', 3, '2017-07-04 06:02:31', '2017-07-06 23:56:30', 1),
(3, 'administrator', 'admin@mailinator.com', '$2y$13$V4x9nGuvkOiGtapg335eledPz1fuLXKklXjBeWbw4fEwT.XSERdBK', NULL, 'IPbF7HmBtYlXkMkWUsBitAjtEbM5CGQl', 1, '2017-07-04 06:00:37', '2017-07-04 06:00:37', 1),
(4, 'priyanka', 'priyanka@mailinator.com', '$2y$13$tgRdvpXTlE8ccg5eYo3s/.Zk/T8k1KqCowFwxijeZQ.as4gcYF1NK', NULL, '4Xz6PeCamp3I0JDGww0ZALkat1VX0Lj4', 2, '2017-07-05 01:00:01', '2017-07-05 01:00:01', 0),
(5, 'sam', 'sam@mailinator.com', '$2y$13$zZGX23ZN/3k4wOmp.q7o.ub/ZGpt5ZkeeTK0aWF8K4alEEfBerXGm', NULL, '6b7WlR-sUheQioUiYf-o41hNQXrBrpXm', 3, '2017-07-05 03:00:16', '2017-07-05 03:00:16', 0),
(6, 'aman', 'golfclub@mailinator.com', '$2y$13$316Tfa3wqRwSrVrBIAhJy.3Q6qXuVglAV33LqfyAPL62ZwzQsJPPe', 'kk32xvFEywNlXmLuD6mNObdKqMoKqrjx_1499372968', 'WyW0h3W-MfPzCSLNNxbHgLZOIvFulwCO', 2, '2017-07-05 04:17:09', '2017-07-07 01:59:28', 1),
(14, 'harish', 'harish@mailinator.com', '$2y$13$d6SHNrepy759zPdiaCGpCO9/OYzG1M4iSWhvXk0HDQXMazlbvyK6O', NULL, 'MgI_eKqmWKScuol6I8VGbztVVeFPbvYg', 2, '2017-07-06 01:54:37', '2017-07-06 01:54:37', 1),
(15, 'arvind2', 'aman@gmail.com', '$2y$13$l0iUAzHqJnZy8pI4B22.l.1.EnBSAL7wOPbS0nk7VREuBVwp0xub2', 'mHSjFxESCzXClFmtsg7v0UCZUMIccO_v_1499298093', 'nJjzjf09TYK0PXhw5boKZOMm2zkbqw1-', 2, '2017-07-06 02:52:26', '2017-07-06 05:11:33', 1),
(17, 'kim', 'thomas@gmail.com', '$2y$13$NUlxe0sJXYjhvhfMgqn2jOqGnHTWmZzBp.2zNYerKwXsNzN0fzYLa', NULL, 'iuBynm7_yjaEvEH6uf2SNaAmMRYr0zCi', 3, '2017-07-06 04:20:01', '2017-07-06 04:37:17', 0);

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
-- Indexes for table `playeractivity`
--
ALTER TABLE `playeractivity`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `registration_cards`
--
ALTER TABLE `registration_cards`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `ClubID` (`ClubID`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD KEY `admin_userID` (`admin_userID`);

--
-- Indexes for table `tbl_golfclub`
--
ALTER TABLE `tbl_golfclub`
  ADD PRIMARY KEY (`golfclub_id`),
  ADD KEY `golfclub_userID` (`golfclub_userID`);

--
-- Indexes for table `tbl_golfer`
--
ALTER TABLE `tbl_golfer`
  ADD PRIMARY KEY (`golfer_id`),
  ADD KEY `golfer_userID` (`golfer_userID`),
  ADD KEY `golfer_firstClubID` (`golfer_firstClubID`);

--
-- Indexes for table `tbl_role`
--
ALTER TABLE `tbl_role`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_username` (`user_username`),
  ADD KEY `user_roleID` (`user_roleID`);

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
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique system reference', AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `playeractivity`
--
ALTER TABLE `playeractivity`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique system reference';
--
-- AUTO_INCREMENT for table `registration_cards`
--
ALTER TABLE `registration_cards`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique system reference', AUTO_INCREMENT=485;
--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_golfclub`
--
ALTER TABLE `tbl_golfclub`
  MODIFY `golfclub_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Unique system reference', AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_golfer`
--
ALTER TABLE `tbl_golfer`
  MODIFY `golfer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `tbl_role`
--
ALTER TABLE `tbl_role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_golfclub`
--
ALTER TABLE `tbl_golfclub`
  ADD CONSTRAINT `tbl_golfclub_ibfk_1` FOREIGN KEY (`golfclub_userID`) REFERENCES `tbl_user` (`user_id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
