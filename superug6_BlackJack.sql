-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2021 at 12:03 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.3.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `superug6_BlackJack`
--

-- --------------------------------------------------------

--
-- Table structure for table `checkouts`
--

CREATE TABLE `checkouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `voucher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `Order_ID` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Order_Status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Payer_Given_Name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Payer_Sur_Name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Payer_Email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Payer_ID` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Paid_Amount` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Paid_At` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `checkouts`
--

INSERT INTO `checkouts` (`id`, `user_id`, `voucher_id`, `Order_ID`, `Order_Status`, `Payer_Given_Name`, `Payer_Sur_Name`, `Payer_Email`, `Payer_ID`, `Paid_Amount`, `Paid_At`, `created_at`, `updated_at`) VALUES
(1, 2, 76, '7NN07967CB632083S', 'COMPLETED', 'test', 'buyer', '2stoneslots-buyer@gmail.com', 'XT3EJTPFZYP8U', '200.00', '2021-04-19', '2021-04-19 06:11:57', '2021-04-19 06:11:57'),
(2, 2, 77, '8BJ69506UA9324830', 'COMPLETED', 'test', 'buyer', '2stoneslots-buyer@gmail.com', 'XT3EJTPFZYP8U', '200.00', '2021-04-19', '2021-04-19 06:32:33', '2021-04-19 06:32:33'),
(3, 2, 78, '6YW58103ET643233J', 'COMPLETED', 'test', 'buyer', '2stoneslots-buyer@gmail.com', 'XT3EJTPFZYP8U', '200.00', '2021-04-19', '2021-04-19 06:33:25', '2021-04-19 06:33:25'),
(4, 2, 79, '0UV260101C521472U', 'COMPLETED', 'test', 'buyer', '2stoneslots-buyer@gmail.com', 'XT3EJTPFZYP8U', '200.00', '2021-04-19', '2021-04-19 06:34:26', '2021-04-19 06:34:26');

-- --------------------------------------------------------

--
-- Table structure for table `continents`
--

CREATE TABLE `continents` (
  `code` varchar(2) NOT NULL DEFAULT '',
  `name` varchar(15) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `continents`
--

INSERT INTO `continents` (`code`, `name`) VALUES
('AF', 'Africa'),
('AN', 'Antarctica'),
('AS', 'Asia'),
('EU', 'Europe'),
('NA', 'North America'),
('OC', 'Oceania'),
('SA', 'South America');

-- --------------------------------------------------------

--
-- Table structure for table `countries`
--

CREATE TABLE `countries` (
  `code` varchar(2) NOT NULL DEFAULT '',
  `name` varchar(50) NOT NULL DEFAULT '',
  `native` varchar(50) NOT NULL DEFAULT '',
  `phone` varchar(15) NOT NULL DEFAULT '',
  `continent` varchar(2) NOT NULL DEFAULT '',
  `capital` varchar(50) NOT NULL DEFAULT '',
  `currency` varchar(30) NOT NULL DEFAULT '',
  `languages` varchar(30) NOT NULL DEFAULT ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `countries`
--

INSERT INTO `countries` (`code`, `name`, `native`, `phone`, `continent`, `capital`, `currency`, `languages`) VALUES
('AD', 'Andorra', 'Andorra', '376', 'EU', 'Andorra la Vella', 'EUR', 'ca'),
('AE', 'United Arab Emirates', 'دولة الإمارات العربية المتحدة', '971', 'AS', 'Abu Dhabi', 'AED', 'ar'),
('AF', 'Afghanistan', 'افغانستان', '93', 'AS', 'Kabul', 'AFN', 'ps,uz,tk'),
('AG', 'Antigua and Barbuda', 'Antigua and Barbuda', '1268', 'NA', 'Saint John\'s', 'XCD', 'en'),
('AI', 'Anguilla', 'Anguilla', '1264', 'NA', 'The Valley', 'XCD', 'en'),
('AL', 'Albania', 'Shqipëria', '355', 'EU', 'Tirana', 'ALL', 'sq'),
('AM', 'Armenia', 'Հայաստան', '374', 'AS', 'Yerevan', 'AMD', 'hy,ru'),
('AO', 'Angola', 'Angola', '244', 'AF', 'Luanda', 'AOA', 'pt'),
('AQ', 'Antarctica', 'Antarctica', '672', 'AN', '', '', ''),
('AR', 'Argentina', 'Argentina', '54', 'SA', 'Buenos Aires', 'ARS', 'es,gn'),
('AS', 'American Samoa', 'American Samoa', '1684', 'OC', 'Pago Pago', 'USD', 'en,sm'),
('AT', 'Austria', 'Österreich', '43', 'EU', 'Vienna', 'EUR', 'de'),
('AU', 'Australia', 'Australia', '61', 'OC', 'Canberra', 'AUD', 'en'),
('AW', 'Aruba', 'Aruba', '297', 'NA', 'Oranjestad', 'AWG', 'nl,pa'),
('AX', 'Åland', 'Åland', '358', 'EU', 'Mariehamn', 'EUR', 'sv'),
('AZ', 'Azerbaijan', 'Azərbaycan', '994', 'AS', 'Baku', 'AZN', 'az'),
('BA', 'Bosnia and Herzegovina', 'Bosna i Hercegovina', '387', 'EU', 'Sarajevo', 'BAM', 'bs,hr,sr'),
('BB', 'Barbados', 'Barbados', '1246', 'NA', 'Bridgetown', 'BBD', 'en'),
('BD', 'Bangladesh', 'Bangladesh', '880', 'AS', 'Dhaka', 'BDT', 'bn'),
('BE', 'Belgium', 'België', '32', 'EU', 'Brussels', 'EUR', 'nl,fr,de'),
('BF', 'Burkina Faso', 'Burkina Faso', '226', 'AF', 'Ouagadougou', 'XOF', 'fr,ff'),
('BG', 'Bulgaria', 'България', '359', 'EU', 'Sofia', 'BGN', 'bg'),
('BH', 'Bahrain', '‏البحرين', '973', 'AS', 'Manama', 'BHD', 'ar'),
('BI', 'Burundi', 'Burundi', '257', 'AF', 'Bujumbura', 'BIF', 'fr,rn'),
('BJ', 'Benin', 'Bénin', '229', 'AF', 'Porto-Novo', 'XOF', 'fr'),
('BL', 'Saint Barthélemy', 'Saint-Barthélemy', '590', 'NA', 'Gustavia', 'EUR', 'fr'),
('BM', 'Bermuda', 'Bermuda', '1441', 'NA', 'Hamilton', 'BMD', 'en'),
('BN', 'Brunei', 'Negara Brunei Darussalam', '673', 'AS', 'Bandar Seri Begawan', 'BND', 'ms'),
('BO', 'Bolivia', 'Bolivia', '591', 'SA', 'Sucre', 'BOB,BOV', 'es,ay,qu'),
('BQ', 'Bonaire', 'Bonaire', '5997', 'NA', 'Kralendijk', 'USD', 'nl'),
('BR', 'Brazil', 'Brasil', '55', 'SA', 'Brasília', 'BRL', 'pt'),
('BS', 'Bahamas', 'Bahamas', '1242', 'NA', 'Nassau', 'BSD', 'en'),
('BT', 'Bhutan', 'ʼbrug-yul', '975', 'AS', 'Thimphu', 'BTN,INR', 'dz'),
('BV', 'Bouvet Island', 'Bouvetøya', '47', 'AN', '', 'NOK', 'no,nb,nn'),
('BW', 'Botswana', 'Botswana', '267', 'AF', 'Gaborone', 'BWP', 'en,tn'),
('BY', 'Belarus', 'Белару́сь', '375', 'EU', 'Minsk', 'BYN', 'be,ru'),
('BZ', 'Belize', 'Belize', '501', 'NA', 'Belmopan', 'BZD', 'en,es'),
('CA', 'Canada', 'Canada', '1', 'NA', 'Ottawa', 'CAD', 'en,fr'),
('CC', 'Cocos [Keeling] Islands', 'Cocos (Keeling) Islands', '61', 'AS', 'West Island', 'AUD', 'en'),
('CD', 'Democratic Republic of the Congo', 'République démocratique du Congo', '243', 'AF', 'Kinshasa', 'CDF', 'fr,ln,kg,sw,lu'),
('CF', 'Central African Republic', 'Ködörösêse tî Bêafrîka', '236', 'AF', 'Bangui', 'XAF', 'fr,sg'),
('CG', 'Republic of the Congo', 'République du Congo', '242', 'AF', 'Brazzaville', 'XAF', 'fr,ln'),
('CH', 'Switzerland', 'Schweiz', '41', 'EU', 'Bern', 'CHE,CHF,CHW', 'de,fr,it'),
('CI', 'Ivory Coast', 'Côte d\'Ivoire', '225', 'AF', 'Yamoussoukro', 'XOF', 'fr'),
('CK', 'Cook Islands', 'Cook Islands', '682', 'OC', 'Avarua', 'NZD', 'en'),
('CL', 'Chile', 'Chile', '56', 'SA', 'Santiago', 'CLF,CLP', 'es'),
('CM', 'Cameroon', 'Cameroon', '237', 'AF', 'Yaoundé', 'XAF', 'en,fr'),
('CN', 'China', '中国', '86', 'AS', 'Beijing', 'CNY', 'zh'),
('CO', 'Colombia', 'Colombia', '57', 'SA', 'Bogotá', 'COP', 'es'),
('CR', 'Costa Rica', 'Costa Rica', '506', 'NA', 'San José', 'CRC', 'es'),
('CU', 'Cuba', 'Cuba', '53', 'NA', 'Havana', 'CUC,CUP', 'es'),
('CV', 'Cape Verde', 'Cabo Verde', '238', 'AF', 'Praia', 'CVE', 'pt'),
('CW', 'Curacao', 'Curaçao', '5999', 'NA', 'Willemstad', 'ANG', 'nl,pa,en'),
('CX', 'Christmas Island', 'Christmas Island', '61', 'AS', 'Flying Fish Cove', 'AUD', 'en'),
('CY', 'Cyprus', 'Κύπρος', '357', 'EU', 'Nicosia', 'EUR', 'el,tr,hy'),
('CZ', 'Czech Republic', 'Česká republika', '420', 'EU', 'Prague', 'CZK', 'cs,sk'),
('DE', 'Germany', 'Deutschland', '49', 'EU', 'Berlin', 'EUR', 'de'),
('DJ', 'Djibouti', 'Djibouti', '253', 'AF', 'Djibouti', 'DJF', 'fr,ar'),
('DK', 'Denmark', 'Danmark', '45', 'EU', 'Copenhagen', 'DKK', 'da'),
('DM', 'Dominica', 'Dominica', '1767', 'NA', 'Roseau', 'XCD', 'en'),
('DO', 'Dominican Republic', 'República Dominicana', '1809,1829,1849', 'NA', 'Santo Domingo', 'DOP', 'es'),
('DZ', 'Algeria', 'الجزائر', '213', 'AF', 'Algiers', 'DZD', 'ar'),
('EC', 'Ecuador', 'Ecuador', '593', 'SA', 'Quito', 'USD', 'es'),
('EE', 'Estonia', 'Eesti', '372', 'EU', 'Tallinn', 'EUR', 'et'),
('EG', 'Egypt', 'مصر‎', '20', 'AF', 'Cairo', 'EGP', 'ar'),
('EH', 'Western Sahara', 'الصحراء الغربية', '212', 'AF', 'El Aaiún', 'MAD,DZD,MRU', 'es'),
('ER', 'Eritrea', 'ኤርትራ', '291', 'AF', 'Asmara', 'ERN', 'ti,ar,en'),
('ES', 'Spain', 'España', '34', 'EU', 'Madrid', 'EUR', 'es,eu,ca,gl,oc'),
('ET', 'Ethiopia', 'ኢትዮጵያ', '251', 'AF', 'Addis Ababa', 'ETB', 'am'),
('FI', 'Finland', 'Suomi', '358', 'EU', 'Helsinki', 'EUR', 'fi,sv'),
('FJ', 'Fiji', 'Fiji', '679', 'OC', 'Suva', 'FJD', 'en,fj,hi,ur'),
('FK', 'Falkland Islands', 'Falkland Islands', '500', 'SA', 'Stanley', 'FKP', 'en'),
('FM', 'Micronesia', 'Micronesia', '691', 'OC', 'Palikir', 'USD', 'en'),
('FO', 'Faroe Islands', 'Føroyar', '298', 'EU', 'Tórshavn', 'DKK', 'fo'),
('FR', 'France', 'France', '33', 'EU', 'Paris', 'EUR', 'fr'),
('GA', 'Gabon', 'Gabon', '241', 'AF', 'Libreville', 'XAF', 'fr'),
('GB', 'United Kingdom', 'United Kingdom', '44', 'EU', 'London', 'GBP', 'en'),
('GD', 'Grenada', 'Grenada', '1473', 'NA', 'St. George\'s', 'XCD', 'en'),
('GE', 'Georgia', 'საქართველო', '995', 'AS', 'Tbilisi', 'GEL', 'ka'),
('GF', 'French Guiana', 'Guyane française', '594', 'SA', 'Cayenne', 'EUR', 'fr'),
('GG', 'Guernsey', 'Guernsey', '44', 'EU', 'St. Peter Port', 'GBP', 'en,fr'),
('GH', 'Ghana', 'Ghana', '233', 'AF', 'Accra', 'GHS', 'en'),
('GI', 'Gibraltar', 'Gibraltar', '350', 'EU', 'Gibraltar', 'GIP', 'en'),
('GL', 'Greenland', 'Kalaallit Nunaat', '299', 'NA', 'Nuuk', 'DKK', 'kl'),
('GM', 'Gambia', 'Gambia', '220', 'AF', 'Banjul', 'GMD', 'en'),
('GN', 'Guinea', 'Guinée', '224', 'AF', 'Conakry', 'GNF', 'fr,ff'),
('GP', 'Guadeloupe', 'Guadeloupe', '590', 'NA', 'Basse-Terre', 'EUR', 'fr'),
('GQ', 'Equatorial Guinea', 'Guinea Ecuatorial', '240', 'AF', 'Malabo', 'XAF', 'es,fr'),
('GR', 'Greece', 'Ελλάδα', '30', 'EU', 'Athens', 'EUR', 'el'),
('GS', 'South Georgia and the South Sandwich Islands', 'South Georgia', '500', 'AN', 'King Edward Point', 'GBP', 'en'),
('GT', 'Guatemala', 'Guatemala', '502', 'NA', 'Guatemala City', 'GTQ', 'es'),
('GU', 'Guam', 'Guam', '1671', 'OC', 'Hagåtña', 'USD', 'en,ch,es'),
('GW', 'Guinea-Bissau', 'Guiné-Bissau', '245', 'AF', 'Bissau', 'XOF', 'pt'),
('GY', 'Guyana', 'Guyana', '592', 'SA', 'Georgetown', 'GYD', 'en'),
('HK', 'Hong Kong', '香港', '852', 'AS', 'City of Victoria', 'HKD', 'zh,en'),
('HM', 'Heard Island and McDonald Islands', 'Heard Island and McDonald Islands', '61', 'AN', '', 'AUD', 'en'),
('HN', 'Honduras', 'Honduras', '504', 'NA', 'Tegucigalpa', 'HNL', 'es'),
('HR', 'Croatia', 'Hrvatska', '385', 'EU', 'Zagreb', 'HRK', 'hr'),
('HT', 'Haiti', 'Haïti', '509', 'NA', 'Port-au-Prince', 'HTG,USD', 'fr,ht'),
('HU', 'Hungary', 'Magyarország', '36', 'EU', 'Budapest', 'HUF', 'hu'),
('ID', 'Indonesia', 'Indonesia', '62', 'AS', 'Jakarta', 'IDR', 'id'),
('IE', 'Ireland', 'Éire', '353', 'EU', 'Dublin', 'EUR', 'ga,en'),
('IL', 'Israel', 'יִשְׂרָאֵל', '972', 'AS', 'Jerusalem', 'ILS', 'he,ar'),
('IM', 'Isle of Man', 'Isle of Man', '44', 'EU', 'Douglas', 'GBP', 'en,gv'),
('IN', 'India', 'भारत', '91', 'AS', 'New Delhi', 'INR', 'hi,en'),
('IO', 'British Indian Ocean Territory', 'British Indian Ocean Territory', '246', 'AS', 'Diego Garcia', 'USD', 'en'),
('IQ', 'Iraq', 'العراق', '964', 'AS', 'Baghdad', 'IQD', 'ar,ku'),
('IR', 'Iran', 'ایران', '98', 'AS', 'Tehran', 'IRR', 'fa'),
('IS', 'Iceland', 'Ísland', '354', 'EU', 'Reykjavik', 'ISK', 'is'),
('IT', 'Italy', 'Italia', '39', 'EU', 'Rome', 'EUR', 'it'),
('JE', 'Jersey', 'Jersey', '44', 'EU', 'Saint Helier', 'GBP', 'en,fr'),
('JM', 'Jamaica', 'Jamaica', '1876', 'NA', 'Kingston', 'JMD', 'en'),
('JO', 'Jordan', 'الأردن', '962', 'AS', 'Amman', 'JOD', 'ar'),
('JP', 'Japan', '日本', '81', 'AS', 'Tokyo', 'JPY', 'ja'),
('KE', 'Kenya', 'Kenya', '254', 'AF', 'Nairobi', 'KES', 'en,sw'),
('KG', 'Kyrgyzstan', 'Кыргызстан', '996', 'AS', 'Bishkek', 'KGS', 'ky,ru'),
('KH', 'Cambodia', 'Kâmpŭchéa', '855', 'AS', 'Phnom Penh', 'KHR', 'km'),
('KI', 'Kiribati', 'Kiribati', '686', 'OC', 'South Tarawa', 'AUD', 'en'),
('KM', 'Comoros', 'Komori', '269', 'AF', 'Moroni', 'KMF', 'ar,fr'),
('KN', 'Saint Kitts and Nevis', 'Saint Kitts and Nevis', '1869', 'NA', 'Basseterre', 'XCD', 'en'),
('KP', 'North Korea', '북한', '850', 'AS', 'Pyongyang', 'KPW', 'ko'),
('KR', 'South Korea', '대한민국', '82', 'AS', 'Seoul', 'KRW', 'ko'),
('KW', 'Kuwait', 'الكويت', '965', 'AS', 'Kuwait City', 'KWD', 'ar'),
('KY', 'Cayman Islands', 'Cayman Islands', '1345', 'NA', 'George Town', 'KYD', 'en'),
('KZ', 'Kazakhstan', 'Қазақстан', '76,77', 'AS', 'Astana', 'KZT', 'kk,ru'),
('LA', 'Laos', 'ສປປລາວ', '856', 'AS', 'Vientiane', 'LAK', 'lo'),
('LB', 'Lebanon', 'لبنان', '961', 'AS', 'Beirut', 'LBP', 'ar,fr'),
('LC', 'Saint Lucia', 'Saint Lucia', '1758', 'NA', 'Castries', 'XCD', 'en'),
('LI', 'Liechtenstein', 'Liechtenstein', '423', 'EU', 'Vaduz', 'CHF', 'de'),
('LK', 'Sri Lanka', 'śrī laṃkāva', '94', 'AS', 'Colombo', 'LKR', 'si,ta'),
('LR', 'Liberia', 'Liberia', '231', 'AF', 'Monrovia', 'LRD', 'en'),
('LS', 'Lesotho', 'Lesotho', '266', 'AF', 'Maseru', 'LSL,ZAR', 'en,st'),
('LT', 'Lithuania', 'Lietuva', '370', 'EU', 'Vilnius', 'EUR', 'lt'),
('LU', 'Luxembourg', 'Luxembourg', '352', 'EU', 'Luxembourg', 'EUR', 'fr,de,lb'),
('LV', 'Latvia', 'Latvija', '371', 'EU', 'Riga', 'EUR', 'lv'),
('LY', 'Libya', '‏ليبيا', '218', 'AF', 'Tripoli', 'LYD', 'ar'),
('MA', 'Morocco', 'المغرب', '212', 'AF', 'Rabat', 'MAD', 'ar'),
('MC', 'Monaco', 'Monaco', '377', 'EU', 'Monaco', 'EUR', 'fr'),
('MD', 'Moldova', 'Moldova', '373', 'EU', 'Chișinău', 'MDL', 'ro'),
('ME', 'Montenegro', 'Црна Гора', '382', 'EU', 'Podgorica', 'EUR', 'sr,bs,sq,hr'),
('MF', 'Saint Martin', 'Saint-Martin', '590', 'NA', 'Marigot', 'EUR', 'en,fr,nl'),
('MG', 'Madagascar', 'Madagasikara', '261', 'AF', 'Antananarivo', 'MGA', 'fr,mg'),
('MH', 'Marshall Islands', 'M̧ajeļ', '692', 'OC', 'Majuro', 'USD', 'en,mh'),
('MK', 'North Macedonia', 'Северна Македонија', '389', 'EU', 'Skopje', 'MKD', 'mk'),
('ML', 'Mali', 'Mali', '223', 'AF', 'Bamako', 'XOF', 'fr'),
('MM', 'Myanmar [Burma]', 'မြန်မာ', '95', 'AS', 'Naypyidaw', 'MMK', 'my'),
('MN', 'Mongolia', 'Монгол улс', '976', 'AS', 'Ulan Bator', 'MNT', 'mn'),
('MO', 'Macao', '澳門', '853', 'AS', '', 'MOP', 'zh,pt'),
('MP', 'Northern Mariana Islands', 'Northern Mariana Islands', '1670', 'OC', 'Saipan', 'USD', 'en,ch'),
('MQ', 'Martinique', 'Martinique', '596', 'NA', 'Fort-de-France', 'EUR', 'fr'),
('MR', 'Mauritania', 'موريتانيا', '222', 'AF', 'Nouakchott', 'MRU', 'ar'),
('MS', 'Montserrat', 'Montserrat', '1664', 'NA', 'Plymouth', 'XCD', 'en'),
('MT', 'Malta', 'Malta', '356', 'EU', 'Valletta', 'EUR', 'mt,en'),
('MU', 'Mauritius', 'Maurice', '230', 'AF', 'Port Louis', 'MUR', 'en'),
('MV', 'Maldives', 'Maldives', '960', 'AS', 'Malé', 'MVR', 'dv'),
('MW', 'Malawi', 'Malawi', '265', 'AF', 'Lilongwe', 'MWK', 'en,ny'),
('MX', 'Mexico', 'México', '52', 'NA', 'Mexico City', 'MXN', 'es'),
('MY', 'Malaysia', 'Malaysia', '60', 'AS', 'Kuala Lumpur', 'MYR', 'ms'),
('MZ', 'Mozambique', 'Moçambique', '258', 'AF', 'Maputo', 'MZN', 'pt'),
('NA', 'Namibia', 'Namibia', '264', 'AF', 'Windhoek', 'NAD,ZAR', 'en,af'),
('NC', 'New Caledonia', 'Nouvelle-Calédonie', '687', 'OC', 'Nouméa', 'XPF', 'fr'),
('NE', 'Niger', 'Niger', '227', 'AF', 'Niamey', 'XOF', 'fr'),
('NF', 'Norfolk Island', 'Norfolk Island', '672', 'OC', 'Kingston', 'AUD', 'en'),
('NG', 'Nigeria', 'Nigeria', '234', 'AF', 'Abuja', 'NGN', 'en'),
('NI', 'Nicaragua', 'Nicaragua', '505', 'NA', 'Managua', 'NIO', 'es'),
('NL', 'Netherlands', 'Nederland', '31', 'EU', 'Amsterdam', 'EUR', 'nl'),
('NO', 'Norway', 'Norge', '47', 'EU', 'Oslo', 'NOK', 'no,nb,nn'),
('NP', 'Nepal', 'नपल', '977', 'AS', 'Kathmandu', 'NPR', 'ne'),
('NR', 'Nauru', 'Nauru', '674', 'OC', 'Yaren', 'AUD', 'en,na'),
('NU', 'Niue', 'Niuē', '683', 'OC', 'Alofi', 'NZD', 'en'),
('NZ', 'New Zealand', 'New Zealand', '64', 'OC', 'Wellington', 'NZD', 'en,mi'),
('OM', 'Oman', 'عمان', '968', 'AS', 'Muscat', 'OMR', 'ar'),
('PA', 'Panama', 'Panamá', '507', 'NA', 'Panama City', 'PAB,USD', 'es'),
('PE', 'Peru', 'Perú', '51', 'SA', 'Lima', 'PEN', 'es'),
('PF', 'French Polynesia', 'Polynésie française', '689', 'OC', 'Papeetē', 'XPF', 'fr'),
('PG', 'Papua New Guinea', 'Papua Niugini', '675', 'OC', 'Port Moresby', 'PGK', 'en'),
('PH', 'Philippines', 'Pilipinas', '63', 'AS', 'Manila', 'PHP', 'en'),
('PK', 'Pakistan', 'Pakistan', '92', 'AS', 'Islamabad', 'PKR', 'en,ur'),
('PL', 'Poland', 'Polska', '48', 'EU', 'Warsaw', 'PLN', 'pl'),
('PM', 'Saint Pierre and Miquelon', 'Saint-Pierre-et-Miquelon', '508', 'NA', 'Saint-Pierre', 'EUR', 'fr'),
('PN', 'Pitcairn Islands', 'Pitcairn Islands', '64', 'OC', 'Adamstown', 'NZD', 'en'),
('PR', 'Puerto Rico', 'Puerto Rico', '1787,1939', 'NA', 'San Juan', 'USD', 'es,en'),
('PS', 'Palestine', 'فلسطين', '970', 'AS', 'Ramallah', 'ILS', 'ar'),
('PT', 'Portugal', 'Portugal', '351', 'EU', 'Lisbon', 'EUR', 'pt'),
('PW', 'Palau', 'Palau', '680', 'OC', 'Ngerulmud', 'USD', 'en'),
('PY', 'Paraguay', 'Paraguay', '595', 'SA', 'Asunción', 'PYG', 'es,gn'),
('QA', 'Qatar', 'قطر', '974', 'AS', 'Doha', 'QAR', 'ar'),
('RE', 'Réunion', 'La Réunion', '262', 'AF', 'Saint-Denis', 'EUR', 'fr'),
('RO', 'Romania', 'România', '40', 'EU', 'Bucharest', 'RON', 'ro'),
('RS', 'Serbia', 'Србија', '381', 'EU', 'Belgrade', 'RSD', 'sr'),
('RU', 'Russia', 'Россия', '7', 'EU', 'Moscow', 'RUB', 'ru'),
('RW', 'Rwanda', 'Rwanda', '250', 'AF', 'Kigali', 'RWF', 'rw,en,fr'),
('SA', 'Saudi Arabia', 'العربية السعودية', '966', 'AS', 'Riyadh', 'SAR', 'ar'),
('SB', 'Solomon Islands', 'Solomon Islands', '677', 'OC', 'Honiara', 'SBD', 'en'),
('SC', 'Seychelles', 'Seychelles', '248', 'AF', 'Victoria', 'SCR', 'fr,en'),
('SD', 'Sudan', 'السودان', '249', 'AF', 'Khartoum', 'SDG', 'ar,en'),
('SE', 'Sweden', 'Sverige', '46', 'EU', 'Stockholm', 'SEK', 'sv'),
('SG', 'Singapore', 'Singapore', '65', 'AS', 'Singapore', 'SGD', 'en,ms,ta,zh'),
('SH', 'Saint Helena', 'Saint Helena', '290', 'AF', 'Jamestown', 'SHP', 'en'),
('SI', 'Slovenia', 'Slovenija', '386', 'EU', 'Ljubljana', 'EUR', 'sl'),
('SJ', 'Svalbard and Jan Mayen', 'Svalbard og Jan Mayen', '4779', 'EU', 'Longyearbyen', 'NOK', 'no'),
('SK', 'Slovakia', 'Slovensko', '421', 'EU', 'Bratislava', 'EUR', 'sk'),
('SL', 'Sierra Leone', 'Sierra Leone', '232', 'AF', 'Freetown', 'SLL', 'en'),
('SM', 'San Marino', 'San Marino', '378', 'EU', 'City of San Marino', 'EUR', 'it'),
('SN', 'Senegal', 'Sénégal', '221', 'AF', 'Dakar', 'XOF', 'fr'),
('SO', 'Somalia', 'Soomaaliya', '252', 'AF', 'Mogadishu', 'SOS', 'so,ar'),
('SR', 'Suriname', 'Suriname', '597', 'SA', 'Paramaribo', 'SRD', 'nl'),
('SS', 'South Sudan', 'South Sudan', '211', 'AF', 'Juba', 'SSP', 'en'),
('ST', 'São Tomé and Príncipe', 'São Tomé e Príncipe', '239', 'AF', 'São Tomé', 'STN', 'pt'),
('SV', 'El Salvador', 'El Salvador', '503', 'NA', 'San Salvador', 'SVC,USD', 'es'),
('SX', 'Sint Maarten', 'Sint Maarten', '1721', 'NA', 'Philipsburg', 'ANG', 'nl,en'),
('SY', 'Syria', 'سوريا', '963', 'AS', 'Damascus', 'SYP', 'ar'),
('SZ', 'Swaziland', 'Swaziland', '268', 'AF', 'Lobamba', 'SZL', 'en,ss'),
('TC', 'Turks and Caicos Islands', 'Turks and Caicos Islands', '1649', 'NA', 'Cockburn Town', 'USD', 'en'),
('TD', 'Chad', 'Tchad', '235', 'AF', 'N\'Djamena', 'XAF', 'fr,ar'),
('TF', 'French Southern Territories', 'Territoire des Terres australes et antarctiques fr', '262', 'AN', 'Port-aux-Français', 'EUR', 'fr'),
('TG', 'Togo', 'Togo', '228', 'AF', 'Lomé', 'XOF', 'fr'),
('TH', 'Thailand', 'ประเทศไทย', '66', 'AS', 'Bangkok', 'THB', 'th'),
('TJ', 'Tajikistan', 'Тоҷикистон', '992', 'AS', 'Dushanbe', 'TJS', 'tg,ru'),
('TK', 'Tokelau', 'Tokelau', '690', 'OC', 'Fakaofo', 'NZD', 'en'),
('TL', 'East Timor', 'Timor-Leste', '670', 'OC', 'Dili', 'USD', 'pt'),
('TM', 'Turkmenistan', 'Türkmenistan', '993', 'AS', 'Ashgabat', 'TMT', 'tk,ru'),
('TN', 'Tunisia', 'تونس', '216', 'AF', 'Tunis', 'TND', 'ar'),
('TO', 'Tonga', 'Tonga', '676', 'OC', 'Nuku\'alofa', 'TOP', 'en,to'),
('TR', 'Turkey', 'Türkiye', '90', 'AS', 'Ankara', 'TRY', 'tr'),
('TT', 'Trinidad and Tobago', 'Trinidad and Tobago', '1868', 'NA', 'Port of Spain', 'TTD', 'en'),
('TV', 'Tuvalu', 'Tuvalu', '688', 'OC', 'Funafuti', 'AUD', 'en'),
('TW', 'Taiwan', '臺灣', '886', 'AS', 'Taipei', 'TWD', 'zh'),
('TZ', 'Tanzania', 'Tanzania', '255', 'AF', 'Dodoma', 'TZS', 'sw,en'),
('UA', 'Ukraine', 'Україна', '380', 'EU', 'Kyiv', 'UAH', 'uk'),
('UG', 'Uganda', 'Uganda', '256', 'AF', 'Kampala', 'UGX', 'en,sw'),
('UM', 'U.S. Minor Outlying Islands', 'United States Minor Outlying Islands', '1', 'OC', '', 'USD', 'en'),
('US', 'United States', 'United States', '1', 'NA', 'Washington D.C.', 'USD,USN,USS', 'en'),
('UY', 'Uruguay', 'Uruguay', '598', 'SA', 'Montevideo', 'UYI,UYU', 'es'),
('UZ', 'Uzbekistan', 'O‘zbekiston', '998', 'AS', 'Tashkent', 'UZS', 'uz,ru'),
('VA', 'Vatican City', 'Vaticano', '379', 'EU', 'Vatican City', 'EUR', 'it,la'),
('VC', 'Saint Vincent and the Grenadines', 'Saint Vincent and the Grenadines', '1784', 'NA', 'Kingstown', 'XCD', 'en'),
('VE', 'Venezuela', 'Venezuela', '58', 'SA', 'Caracas', 'VES', 'es'),
('VG', 'British Virgin Islands', 'British Virgin Islands', '1284', 'NA', 'Road Town', 'USD', 'en'),
('VI', 'U.S. Virgin Islands', 'United States Virgin Islands', '1340', 'NA', 'Charlotte Amalie', 'USD', 'en'),
('VN', 'Vietnam', 'Việt Nam', '84', 'AS', 'Hanoi', 'VND', 'vi'),
('VU', 'Vanuatu', 'Vanuatu', '678', 'OC', 'Port Vila', 'VUV', 'bi,en,fr'),
('WF', 'Wallis and Futuna', 'Wallis et Futuna', '681', 'OC', 'Mata-Utu', 'XPF', 'fr'),
('WS', 'Samoa', 'Samoa', '685', 'OC', 'Apia', 'WST', 'sm,en'),
('XK', 'Kosovo', 'Republika e Kosovës', '377,381,383,386', 'EU', 'Pristina', 'EUR', 'sq,sr'),
('YE', 'Yemen', 'اليَمَن', '967', 'AS', 'Sana\'a', 'YER', 'ar'),
('YT', 'Mayotte', 'Mayotte', '262', 'AF', 'Mamoudzou', 'EUR', 'fr'),
('ZA', 'South Africa', 'South Africa', '27', 'AF', 'Pretoria', 'ZAR', 'af,en,nr,st,ss,tn,ts,ve,xh,zu'),
('ZM', 'Zambia', 'Zambia', '260', 'AF', 'Lusaka', 'ZMW', 'en'),
('ZW', 'Zimbabwe', 'Zimbabwe', '263', 'AF', 'Harare', 'USD,ZAR,BWP,GBP,AUD,CNY,INR,JP', 'en,sn,nd');

-- --------------------------------------------------------

--
-- Table structure for table `dashboardsettings`
--

CREATE TABLE `dashboardsettings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sitetitle` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `siteLogo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `dashboardsettings`
--

INSERT INTO `dashboardsettings` (`id`, `sitetitle`, `siteLogo`, `created_at`, `updated_at`) VALUES
(1, 'Gold Star', 'logo.png', NULL, '2021-02-04 05:17:47');

-- --------------------------------------------------------

--
-- Table structure for table `egyptian_nights`
--

CREATE TABLE `egyptian_nights` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `game_id` bigint(20) UNSIGNED DEFAULT NULL,
  `win_occurrence` int(10) UNSIGNED DEFAULT 30,
  `slot_cash` double DEFAULT 100,
  `min_reel_loop` int(10) UNSIGNED DEFAULT 1,
  `reel_delay` int(10) UNSIGNED DEFAULT 0,
  `time_show_win` int(10) UNSIGNED DEFAULT 2000,
  `time_show_all_wins` int(10) UNSIGNED DEFAULT 2000,
  `bonus_occurrence` int(10) UNSIGNED DEFAULT 15,
  `show_credits` tinyint(4) DEFAULT 0,
  `audio_enable_on_startup` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `egyptian_nights`
--

INSERT INTO `egyptian_nights` (`id`, `game_id`, `win_occurrence`, `slot_cash`, `min_reel_loop`, `reel_delay`, `time_show_win`, `time_show_all_wins`, `bonus_occurrence`, `show_credits`, `audio_enable_on_startup`, `created_at`, `updated_at`) VALUES
(1, 9, 5, 100, 1, 0, 2000, 2000, 5, 0, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gameAvatar` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `win_occurrence` int(10) UNSIGNED DEFAULT 30,
  `slot_cash` double DEFAULT 100,
  `bonus_occurrence` int(10) UNSIGNED DEFAULT 15,
  `min_reel_loop` int(10) UNSIGNED DEFAULT 1,
  `reel_delay` int(10) UNSIGNED DEFAULT 0,
  `time_show_win` int(10) UNSIGNED DEFAULT 2000,
  `time_show_all_wins` int(10) UNSIGNED DEFAULT 2000,
  `min_bet` double DEFAULT 0.25,
  `max_bet` double DEFAULT 5,
  `max_hold` bigint(20) UNSIGNED DEFAULT 3,
  `perc_win_prize_1` double DEFAULT 50,
  `perc_win_prize_2` double DEFAULT 35,
  `perc_win_prize_3` double DEFAULT 15,
  `show_credits` tinyint(4) DEFAULT 0,
  `audio_enable_on_startup` tinyint(4) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `name`, `gameAvatar`, `description`, `win_occurrence`, `slot_cash`, `bonus_occurrence`, `min_reel_loop`, `reel_delay`, `time_show_win`, `time_show_all_wins`, `min_bet`, `max_bet`, `max_hold`, `perc_win_prize_1`, `perc_win_prize_2`, `perc_win_prize_3`, `show_credits`, `audio_enable_on_startup`, `created_at`, `updated_at`) VALUES
(1, 'The Fruits Slot Machine', 'edc707ca33a700d67cff700a35ea8d1286a6e2ff', NULL, 25, 100, 15, 1, 0, 2000, 2000, 0.25, 0.25, 3, 50, 35, 15, 0, 0, NULL, '2021-02-06 04:09:45'),
(2, 'Lucky Slot Machine', '42e78c02a624eec378cde56a9782cc6c6fb335e0', NULL, 25, 50, 5, 1, 0, 2000, 2000, 0.5, 0.5, 3, 5, 10, 15, 1, 1, NULL, '2021-02-06 06:33:38'),
(3, 'Wheel Of Fortune', 'd369ce8d75ff0cc28c23b266fe80a33ece990bc4', NULL, 25, 100, 15, 1, 0, 2000, 2000, 5, 5, 3, 50, 35, 15, 0, 0, NULL, '2021-02-06 03:54:02'),
(4, 'Lucky Christmas', 'e1366a6cd5dfa10f131657fa9b100cd6356a09d7', NULL, 25, 100, 5, 1, 0, 2000, 2000, 0.25, 1, 3, 10, 35, 15, 0, 0, NULL, '2021-02-06 03:57:11'),
(5, 'Soccer Slot Machine', '7b2792bfe824122bc91d02b54776ecadd00791a5', NULL, 25, 100, 15, 1, 0, 2000, 2000, 0.25, 0.25, 3, 50, 35, 15, 0, 0, NULL, '2021-02-06 04:03:46'),
(6, 'Ramses Treasure', '46232a8b402b81637957f301731d9b41625d5d6c', NULL, 25, 100, 5, 1, 0, 2000, 2000, 1, 1, 3, 50, 35, 15, 0, 0, NULL, '2021-02-06 04:03:03'),
(7, 'Egyptian Nights', '2c90eb259f8bf8fe219538248f40a2caf69a5d9c', NULL, 25, 100, 15, 1, 0, 2000, 2000, 0.05, 0.25, 3, 50, 35, 15, 0, 0, NULL, '2021-02-06 04:00:56'),
(8, 'Egyptian Slot', '4a622e84b3b58b0d56ac4de3f20ffe5ba91a1cc3', NULL, 25, 100, 15, 1, 0, 2000, 2000, 0.25, 0.25, 3, 50, 35, 15, 0, 0, NULL, '2021-02-06 04:02:24'),
(9, 'Slot Mania', '628a751255ac0999b7ef2c5fc827efb0b17c723a', NULL, 25, 100, 15, 1, 0, 2000, 2000, 0.25, 0.25, 3, 50, 35, 15, 0, 0, NULL, '2021-03-19 08:28:33');

-- --------------------------------------------------------

--
-- Table structure for table `landingpage`
--

CREATE TABLE `landingpage` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_heading` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `hero_image` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `short_description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `long_description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `about_heading` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `about_description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `landingpage`
--

INSERT INTO `landingpage` (`id`, `page_heading`, `hero_image`, `short_description`, `long_description`, `about_heading`, `about_description`, `created_at`, `updated_at`) VALUES
(1, 'Online Casino', 'be6541b095b6833a83c3d5eefa09dc13076214f8', 'Genuine Money Transaction', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s.', 'About Us', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. \r\n\r\nIt was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum', '2020-12-22 11:32:52', '2020-12-23 09:56:15');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `code` varchar(2) NOT NULL DEFAULT '',
  `name` varchar(50) NOT NULL DEFAULT '',
  `native` varchar(50) NOT NULL DEFAULT '',
  `rtl` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`code`, `name`, `native`, `rtl`) VALUES
('af', 'Afrikaans', 'Afrikaans', 0),
('am', 'Amharic', 'አማርኛ', 0),
('ar', 'Arabic', 'العربية', 1),
('ay', 'Aymara', 'Aymar', 0),
('az', 'Azerbaijani', 'Azərbaycanca / آذربايجان', 0),
('be', 'Belarusian', 'Беларуская', 0),
('bg', 'Bulgarian', 'Български', 0),
('bi', 'Bislama', 'Bislama', 0),
('bn', 'Bengali', 'বাংলা', 0),
('bs', 'Bosnian', 'Bosanski', 0),
('ca', 'Catalan', 'Català', 0),
('ch', 'Chamorro', 'Chamoru', 0),
('cs', 'Czech', 'Česky', 0),
('da', 'Danish', 'Dansk', 0),
('de', 'German', 'Deutsch', 0),
('dv', 'Divehi', 'ދިވެހިބަސް', 1),
('dz', 'Dzongkha', 'ཇོང་ཁ', 0),
('el', 'Greek', 'Ελληνικά', 0),
('en', 'English', 'English', 0),
('es', 'Spanish', 'Español', 0),
('et', 'Estonian', 'Eesti', 0),
('eu', 'Basque', 'Euskara', 0),
('fa', 'Persian', 'فارسی', 1),
('ff', 'Peul', 'Fulfulde', 0),
('fi', 'Finnish', 'Suomi', 0),
('fj', 'Fijian', 'Na Vosa Vakaviti', 0),
('fo', 'Faroese', 'Føroyskt', 0),
('fr', 'French', 'Français', 0),
('ga', 'Irish', 'Gaeilge', 0),
('gl', 'Galician', 'Galego', 0),
('gn', 'Guarani', 'Avañe\'ẽ', 0),
('gv', 'Manx', 'Gaelg', 0),
('he', 'Hebrew', 'עברית', 1),
('hi', 'Hindi', 'हिन्दी', 0),
('hr', 'Croatian', 'Hrvatski', 0),
('ht', 'Haitian', 'Krèyol ayisyen', 0),
('hu', 'Hungarian', 'Magyar', 0),
('hy', 'Armenian', 'Հայերեն', 0),
('id', 'Indonesian', 'Bahasa Indonesia', 0),
('is', 'Icelandic', 'Íslenska', 0),
('it', 'Italian', 'Italiano', 0),
('ja', 'Japanese', '日本語', 0),
('ka', 'Georgian', 'ქართული', 0),
('kg', 'Kongo', 'KiKongo', 0),
('kk', 'Kazakh', 'Қазақша', 0),
('kl', 'Greenlandic', 'Kalaallisut', 0),
('km', 'Cambodian', 'ភាសាខ្មែរ', 0),
('ko', 'Korean', '한국어', 0),
('ku', 'Kurdish', 'Kurdî / كوردی', 1),
('ky', 'Kirghiz', 'Kırgızca / Кыргызча', 0),
('la', 'Latin', 'Latina', 0),
('lb', 'Luxembourgish', 'Lëtzebuergesch', 0),
('ln', 'Lingala', 'Lingála', 0),
('lo', 'Laotian', 'ລາວ / Pha xa lao', 0),
('lt', 'Lithuanian', 'Lietuvių', 0),
('lu', 'Luba-Katanga', 'Tshiluba', 0),
('lv', 'Latvian', 'Latviešu', 0),
('mg', 'Malagasy', 'Malagasy', 0),
('mh', 'Marshallese', 'Kajin Majel / Ebon', 0),
('mi', 'Maori', 'Māori', 0),
('mk', 'Macedonian', 'Македонски', 0),
('mn', 'Mongolian', 'Монгол', 0),
('ms', 'Malay', 'Bahasa Melayu', 0),
('mt', 'Maltese', 'bil-Malti', 0),
('my', 'Burmese', 'မြန်မာစာ', 0),
('na', 'Nauruan', 'Dorerin Naoero', 0),
('nb', 'Norwegian Bokmål', 'Norsk bokmål', 0),
('nd', 'North Ndebele', 'Sindebele', 0),
('ne', 'Nepali', 'नेपाली', 0),
('nl', 'Dutch', 'Nederlands', 0),
('nn', 'Norwegian Nynorsk', 'Norsk nynorsk', 0),
('no', 'Norwegian', 'Norsk', 0),
('nr', 'South Ndebele', 'isiNdebele', 0),
('ny', 'Chichewa', 'Chi-Chewa', 0),
('oc', 'Occitan', 'Occitan', 0),
('pa', 'Panjabi / Punjabi', 'ਪੰਜਾਬੀ / पंजाबी / پنجابي', 0),
('pl', 'Polish', 'Polski', 0),
('ps', 'Pashto', 'پښتو', 1),
('pt', 'Portuguese', 'Português', 0),
('qu', 'Quechua', 'Runa Simi', 0),
('rn', 'Kirundi', 'Kirundi', 0),
('ro', 'Romanian', 'Română', 0),
('ru', 'Russian', 'Русский', 0),
('rw', 'Rwandi', 'Kinyarwandi', 0),
('sg', 'Sango', 'Sängö', 0),
('si', 'Sinhalese', 'සිංහල', 0),
('sk', 'Slovak', 'Slovenčina', 0),
('sl', 'Slovenian', 'Slovenščina', 0),
('sm', 'Samoan', 'Gagana Samoa', 0),
('sn', 'Shona', 'chiShona', 0),
('so', 'Somalia', 'Soomaaliga', 0),
('sq', 'Albanian', 'Shqip', 0),
('sr', 'Serbian', 'Српски', 0),
('ss', 'Swati', 'SiSwati', 0),
('st', 'Southern Sotho', 'Sesotho', 0),
('sv', 'Swedish', 'Svenska', 0),
('sw', 'Swahili', 'Kiswahili', 0),
('ta', 'Tamil', 'தமிழ்', 0),
('tg', 'Tajik', 'Тоҷикӣ', 0),
('th', 'Thai', 'ไทย / Phasa Thai', 0),
('ti', 'Tigrinya', 'ትግርኛ', 0),
('tk', 'Turkmen', 'Туркмен / تركمن', 0),
('tn', 'Tswana', 'Setswana', 0),
('to', 'Tonga', 'Lea Faka-Tonga', 0),
('tr', 'Turkish', 'Türkçe', 0),
('ts', 'Tsonga', 'Xitsonga', 0),
('uk', 'Ukrainian', 'Українська', 0),
('ur', 'Urdu', 'اردو', 1),
('uz', 'Uzbek', 'Ўзбек', 0),
('ve', 'Venda', 'Tshivenḓa', 0),
('vi', 'Vietnamese', 'Tiếng Việt', 0),
('xh', 'Xhosa', 'isiXhosa', 0),
('zh', 'Chinese', '中文', 0),
('zu', 'Zulu', 'isiZulu', 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2020_11_25_110461_create_vouchers_table', 1),
(2, '2020_11_25_110462_create_vouchers_table', 2),
(3, '2021_03_09_120610_create_paypal_credentials_table', 3),
(4, '2013_10_14_000000_create_users_table', 4),
(5, '2020_11_25_110463_create_vouchers_table', 5),
(6, '2021_04_16_193208_create_checkouts_table', 6),
(7, '2021_04_17_205425_create_paypal_accounts_table', 7),
(8, '2021_04_19_100854_create_user_recharge_cards_table', 8),
(9, '2021_04_16_193209_create_checkouts_table', 9),
(10, '2021_04_18_110040_create_payouts_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('shankhantanoli@gmail.com', '$2y$10$jR3KSUXvXU9PslxYDpYQYu7HHQi0O5O7Ceq6n9pqAVA49L9KWyOCe', '2020-12-23 03:45:50');

-- --------------------------------------------------------

--
-- Table structure for table `payouts`
--

CREATE TABLE `payouts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `voucher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `payout_item_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `activity_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transaction_status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `payout_batch_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `receiver_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `amount_value` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `payouts`
--

INSERT INTO `payouts` (`id`, `user_id`, `voucher_id`, `payout_item_id`, `transaction_id`, `activity_id`, `transaction_status`, `payout_batch_id`, `receiver_id`, `amount_value`, `created_at`, `updated_at`) VALUES
(1, NULL, NULL, NULL, NULL, NULL, 'SUCCESS', NULL, '2stoneslots-buyer@gmail.com', '200.00', '2021-04-19 09:15:01', '2021-04-19 09:15:01'),
(2, 2, 46, 'HMN6ETQRWS826', '11J20913GW497561F', '93299178FM990622V', 'SUCCESS', '2LNXAFZTPWKZJ', '2stoneslots-buyer@gmail.com', '200.00', '2021-04-19 09:17:20', '2021-04-19 09:17:20'),
(3, 2, 42, '9VE6Q7TXDHVH6', '5KN42206SK961920V', '30310894VE082253W', 'SUCCESS', 'AF8HJSX29A3CW', '2stoneslots-buyer@gmail.com', '200.00', '2021-04-19 19:49:55', '2021-04-19 19:49:55'),
(4, 2, 73, 'C3B3VV9QBENFN', '96397791NA4824116', '71S79230F90801705', 'SUCCESS', 'PPA5ZRDEFQF62', '2stoneslots-buyer@gmail.com', '200.00', '2021-04-19 19:50:51', '2021-04-19 19:50:51');

-- --------------------------------------------------------

--
-- Table structure for table `paypal_accounts`
--

CREATE TABLE `paypal_accounts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `paypal_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paypal_accounts`
--

INSERT INTO `paypal_accounts` (`id`, `user_id`, `paypal_id`, `created_at`, `updated_at`) VALUES
(5, 2, '2stoneslots-buyer@gmail.com', '2021-04-17 17:07:29', '2021-04-17 19:08:01'),
(6, 2, 'geo@gmail.com', '2021-04-17 17:07:29', '2021-04-17 19:12:50'),
(8, 3, 'geo@gmail.com', '2021-04-17 17:07:29', '2021-04-17 19:07:12');

-- --------------------------------------------------------

--
-- Table structure for table `paypal_credentials`
--

CREATE TABLE `paypal_credentials` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `PAYPAL_MODE` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `PAYPAL_SANDBOX_CLIENT_ID` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `PAYPAL_SANDBOX_SECRET` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `PAYPAL_SANDBOX_ACCOUNT` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `PAYPAL_LIVE_CLIENT_ID` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `PAYPAL_LIVE_SECRET` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `paypal_credentials`
--

INSERT INTO `paypal_credentials` (`id`, `PAYPAL_MODE`, `PAYPAL_SANDBOX_CLIENT_ID`, `PAYPAL_SANDBOX_SECRET`, `PAYPAL_SANDBOX_ACCOUNT`, `PAYPAL_LIVE_CLIENT_ID`, `PAYPAL_LIVE_SECRET`, `created_at`, `updated_at`) VALUES
(1, 'sandbox', 'AddFCFFqEESpH_0C4GaGhKsZiEhB0zpKkfh2sdam6NjlTwLhOJMCSrDsIJYNUBSexpvufB_rH8vafjCT', 'EE4y_bpiDpNOiVvqRfJVJhCJiHOQRqrInxtNQIxUwSXblnQgP6zRbv1Z4JE0E3KQgjb0bEyve1uTzoL-', '2stoneslots-facilitator@gmail.com', NULL, NULL, '2021-03-09 08:24:48', '2021-03-09 08:24:48');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL DEFAULT 2,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type` enum('Admin','customer','Cashier') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'customer',
  `firstname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `lastname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address1` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `address2` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` mediumtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `state` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `postalcode` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `avatar`, `type`, `firstname`, `lastname`, `email`, `email_verified_at`, `phone`, `address1`, `address2`, `country`, `city`, `state`, `postalcode`, `password`, `remember_token`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, 1, NULL, 'Admin', 'Admin', 'admin', 'admin@admin.com', '2020-10-15 02:13:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$CyN2UBAvQs6s2PHo.nT8.uyDeWmMNZblfSRBg6TQ7V8kz8MxKJOC2', NULL, NULL, '2020-10-14 21:12:48', '2020-10-14 21:12:48'),
(2, 2, NULL, 'customer', 'Shan', 'Khan', 'user@user.com', '2020-11-03 12:56:22', '+100000000', 'Islamabad', 'Islamabad', 'Pakistan', 'Islamabad', 'ICT', '44000', '$2y$10$H1Ez23t7QtsmCzrN08715e6RiuiK.MuCb0jly0C0s3wPtOTNcaK0u', 'Lya8csy5REbl0iWnTOkEMkB9uYK0k5FmSuJLVJ7MsULvuqzNsAe1m65kmKnN', NULL, '2020-10-14 21:12:48', '2021-01-13 02:16:18'),
(3, 2, NULL, 'customer', 'Shan', 'Khan', 'shankhantanoli@gmail.com', '2020-11-06 13:10:15', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$BLmBcPD5gcBGasp6rTr1MeMRXs3WmjidylUD56iTv/azwNzQDEvKe', NULL, NULL, '2020-11-06 08:10:01', '2021-01-13 01:09:31'),
(28, 2, NULL, 'customer', 'Game', 'Player', 'Player970@email.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$Wf0jasoMwAIxWTB2JvM4/.aea980keb5GOQMGZTIIV1U/IyzuK0oi', NULL, NULL, '2021-02-14 04:14:01', '2021-02-14 04:14:01'),
(29, 2, NULL, 'customer', 'Game', 'Player', 'Player141@email.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$ZA3XEDwS9.eyXRV.9l74Fe6HntW6vZfW1nWYEZkkyUaHS9lq8vZIa', NULL, NULL, '2021-02-14 04:14:01', '2021-02-14 04:14:01'),
(30, 2, NULL, 'customer', 'Game', 'Player', 'Player676@email.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$2CBbOLS9.WT7sc8D0NQwrO835uFtn7LnFMNvI7IE.0GPAsoFSbKBq', NULL, NULL, '2021-02-14 04:14:01', '2021-02-14 04:14:01'),
(31, 2, NULL, 'customer', 'Game', 'Player', 'Player518@email.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$LwAtIZFrrkZtRk.XHIy.iu0QQrqZXn0vLbdOIX6SYA21zQOQDkK0e', NULL, NULL, '2021-02-14 04:14:02', '2021-02-14 04:14:02'),
(32, 2, NULL, 'customer', 'Game', 'Player', 'Player31@email.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$/H46R0A739dUxSLaTGrgOeGURj87aId0XSTWfrDABNcTsF2HFDKR.', NULL, NULL, '2021-02-14 04:14:02', '2021-02-14 04:14:02'),
(33, 2, NULL, 'customer', 'Game', 'Player', 'Player325@email.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$yWO0IQC573TqZlvy2awL4urpmLiYr6ycf6wkttBEQSzv7OL5UzF.i', NULL, NULL, '2021-02-14 04:14:02', '2021-02-14 04:14:02'),
(34, 2, NULL, 'customer', 'Game', 'Player', 'Player425@email.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$2RM0O71a8ZUIrV2U3YdFae6CzuFMS0m0LJvwk.OxeZpSJyqNAwCZS', NULL, NULL, '2021-02-14 04:14:02', '2021-02-14 04:14:02'),
(35, 2, NULL, 'customer', 'Game', 'Player', 'Player467@email.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$RpSCD0zDRhZ4EdbfKffIk.HJeztEsH/JXFJPwkHIv2Kl9KFN6.Wti', NULL, NULL, '2021-02-14 04:14:02', '2021-02-14 04:14:02'),
(36, 2, NULL, 'customer', 'Game', 'Player', 'Player408@email.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$wkriQUsUBP6PctP.5.cgqebaG1CVqPcd7t81qNNLOW47fXL8T6MjK', NULL, NULL, '2021-02-14 04:14:02', '2021-02-14 04:14:02'),
(37, 2, NULL, 'customer', 'Game', 'Player', 'Player638@email.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$25NI8bX8hOpn7Ryyz7prB.t68Wf1FwxNnVWidzs0mp6yrBjn54tT2', NULL, NULL, '2021-02-14 04:14:02', '2021-02-14 04:14:02'),
(58, 3, NULL, 'Cashier', 'Cashier', 'cashier', 'cashier@cashier.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$d6wIV013pJkeEJYdESWByewVz3/IR9kwQ4VDygXN6U0kMXonx4UsG', NULL, NULL, '2021-02-14 07:31:01', '2021-02-14 07:31:01'),
(59, 2, NULL, 'customer', 'Game', 'Player', 'Player165@email.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$OyHL8LnLAPsIzD0CLs5wh.yjrb0JhHmct.5Cm8Gmg1ihmuMoiLZfO', NULL, NULL, '2021-04-17 15:46:37', '2021-04-17 15:46:37'),
(60, 2, NULL, 'customer', 'Game', 'Player', 'Player98@email.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$IDN/tRACx/CQcQ8nQ/R4EOMs80zsE/kA2cyy3ESrxHQKZASQRvDgK', NULL, NULL, '2021-04-17 15:46:37', '2021-04-17 15:46:37'),
(61, 2, NULL, 'customer', 'Game', 'Player', 'Player598@email.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$PPgqwV0uBy6DIO.1ckNSoOLaRJ1AKZoHS0Qtt87EUg7I6yJt8AZvC', NULL, NULL, '2021-04-17 15:46:37', '2021-04-17 15:46:37'),
(62, 2, NULL, 'customer', 'Game', 'Player', 'Player955@email.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$iXnG490kyWxghuPbEhVnK.YZqlmljX1aZORF86dQdCdNpd8VDoaUm', NULL, NULL, '2021-04-17 15:46:37', '2021-04-17 15:46:37'),
(63, 2, NULL, 'customer', 'Game', 'Player', 'Player780@email.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$Zl0lhVuCGRreMmf6rYytJOzUKyMONGR4FW7YXEH1DmqTuR4j0Gg1q', NULL, NULL, '2021-04-17 15:46:37', '2021-04-17 15:46:37'),
(64, 2, NULL, 'customer', 'Game', 'Player', 'Player588@email.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$zcgCMHaNZWHsO8O3VQFpCOaKLMLPngOrp9UwFfGqiryupERZaSjsm', NULL, NULL, '2021-04-17 15:46:37', '2021-04-17 15:46:37'),
(65, 2, NULL, 'customer', 'Game', 'Player', 'Player862@email.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$kHg8duAvOkJjdtx5xpcQu.olUvh1QoponmkA0SXR34pU4clk.bQsu', NULL, NULL, '2021-04-17 15:46:37', '2021-04-17 15:46:37'),
(66, 2, NULL, 'customer', 'Game', 'Player', 'Player501@email.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$WkalNMVDf7eWL7pOp2FW0OyoFIUodZ/zJC/Ry0SmRudwYmubBxBOW', NULL, NULL, '2021-04-17 15:46:37', '2021-04-17 15:46:37'),
(67, 2, NULL, 'customer', 'Game', 'Player', 'Player284@email.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$z4RiiSSIq3wCymtz6zG1W.OrUPTRIghMJvONf33dyCHIkYHkn3Hj.', NULL, NULL, '2021-04-17 15:46:38', '2021-04-17 15:46:38'),
(68, 2, NULL, 'customer', 'Game', 'Player', 'Player870@email.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$AZ2rI6fHRYLbadKzII3BouHVhI3KCE65oAgGV10XKizWgtDiORFzS', NULL, NULL, '2021-04-17 15:46:38', '2021-04-17 15:46:38'),
(69, 2, NULL, 'customer', 'Game', 'Player', 'Player528@email.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$kNGmLL6ZQ5vEbPGYxg4pF.GUQoGz8PCNHl0gRIn4y5UM4jTLXY8ha', NULL, NULL, '2021-04-17 15:47:39', '2021-04-17 15:47:39'),
(70, 2, NULL, 'customer', 'Game', 'Player', 'Player665@email.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$uYxfN0F4l/cx7r2Tx/pjPuO/5IiHTssMnOzzpMNeYrB3hDm84VU0a', NULL, NULL, '2021-04-17 15:47:39', '2021-04-17 15:47:39'),
(71, 2, NULL, 'customer', 'Game', 'Player', 'Player607@email.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$Dr7mPfpNMCQSciVejVAG6uPs3p/QrSv3S8PoCE7taqbreLK1Iilhq', NULL, NULL, '2021-04-17 15:47:39', '2021-04-17 15:47:39'),
(72, 2, NULL, 'customer', 'Game', 'Player', 'Player924@email.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$XQPyb7u8s4naoQrBWFPyye9mDiADfCOsThl2KmLxWyHbp1P2/N4A6', NULL, NULL, '2021-04-17 15:47:40', '2021-04-17 15:47:40'),
(73, 2, NULL, 'customer', 'Game', 'Player', 'Player784@email.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$5p.ij2wWIXd4Zz0yqIgC5Okza481rvHE/4fxtx3iB/YgycI8KoV7i', NULL, NULL, '2021-04-17 15:47:40', '2021-04-17 15:47:40'),
(74, 2, NULL, 'customer', 'Game', 'Player', 'Player84@email.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$CQAKygHZSIcllXEj0s1KQOzx.JgCqqNSMBQ1pR0zdrMs/KgjBMV0S', NULL, NULL, '2021-04-17 15:47:40', '2021-04-17 15:47:40'),
(75, 2, NULL, 'customer', 'Game', 'Player', 'Player290@email.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$Nby1asjHXvYiClVEMP.MauLxiW.FkLudSg8WApi3O6BCNcWSE7Y8e', NULL, NULL, '2021-04-17 15:47:40', '2021-04-17 15:47:40'),
(76, 2, NULL, 'customer', 'Game', 'Player', 'Player287@email.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$doJmPfblQrkoR3LtEJtuxe51WTKbtpDReATxg89.Xw6oDd91Vdgwm', NULL, NULL, '2021-04-17 15:47:40', '2021-04-17 15:47:40'),
(77, 2, NULL, 'customer', 'Game', 'Player', 'Player495@email.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$vtmbqs1.RI6rUQmF4/msBul50bfyIQlkD43SbMCsqoTRbnZALxzrq', NULL, NULL, '2021-04-17 15:47:40', '2021-04-17 15:47:40'),
(78, 2, NULL, 'customer', 'Game', 'Player', 'Player705@email.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$pOWtmq/zPtXTT5SfUD3JZOjClYJDcCA5hBu4oWPAIWdbEKEn0Npba', NULL, NULL, '2021-04-17 15:47:40', '2021-04-17 15:47:40'),
(79, 2, NULL, 'customer', 'Shan', 'Khan', 'shankhantanoli1@gmail.com', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '$2y$10$ZgGPzIk2WNWSjudQiUyZQ.ncqF2TunXium4bbkiidWn/SomIobuTy', NULL, NULL, '2021-04-22 05:02:58', '2021-04-22 05:02:58');

-- --------------------------------------------------------

--
-- Table structure for table `user_recharge_cards`
--

CREATE TABLE `user_recharge_cards` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `voucher_id` bigint(20) UNSIGNED DEFAULT NULL,
  `Order_ID` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Order_Status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Payer_Given_Name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Payer_Sur_Name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Payer_Email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Payer_ID` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Paid_Amount` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `Paid_At` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_recharge_cards`
--

INSERT INTO `user_recharge_cards` (`id`, `user_id`, `voucher_id`, `Order_ID`, `Order_Status`, `Payer_Given_Name`, `Payer_Sur_Name`, `Payer_Email`, `Payer_ID`, `Paid_Amount`, `Paid_At`, `created_at`, `updated_at`) VALUES
(1, 2, 37, '7R320610MY822393B', 'COMPLETED', 'test', 'buyer', '2stoneslots-buyer@gmail.com', 'XT3EJTPFZYP8U', '200.00', '2021-04-19', '2021-04-19 06:57:41', '2021-04-19 06:57:41'),
(2, 2, 37, '0FA84272WK1379439', 'COMPLETED', 'test', 'buyer', '2stoneslots-buyer@gmail.com', 'XT3EJTPFZYP8U', '200.00', '2021-04-19', '2021-04-19 07:02:43', '2021-04-19 07:02:43'),
(3, 2, 39, '67P71822BH4591024', 'COMPLETED', 'test', 'buyer', '2stoneslots-buyer@gmail.com', 'XT3EJTPFZYP8U', '200.00', '2021-04-19', '2021-04-19 07:12:19', '2021-04-19 07:12:19'),
(4, 2, 48, '6LH9942753053154Y', 'COMPLETED', 'test', 'buyer', '2stoneslots-buyer@gmail.com', 'XT3EJTPFZYP8U', '700.00', '2021-04-19', '2021-04-19 07:13:45', '2021-04-19 07:13:45');

-- --------------------------------------------------------

--
-- Table structure for table `user_voucher`
--

CREATE TABLE `user_voucher` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `voucher_id` bigint(20) UNSIGNED NOT NULL,
  `redeemed_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `user_voucher`
--

INSERT INTO `user_voucher` (`id`, `user_id`, `voucher_id`, `redeemed_at`) VALUES
(31, 2, 79, '2021-04-19 19:51:49');

-- --------------------------------------------------------

--
-- Table structure for table `vouchers`
--

CREATE TABLE `vouchers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `code` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_credientals` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cashout_at` date DEFAULT NULL,
  `recharge_count` bigint(20) UNSIGNED DEFAULT 0,
  `model_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8_unicode_ci DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `vouchers`
--

INSERT INTO `vouchers` (`id`, `name`, `code`, `user_id`, `user_credientals`, `price`, `status`, `cashout_at`, `recharge_count`, `model_type`, `model_id`, `data`, `expires_at`, `created_at`, `updated_at`) VALUES
(11, 'Promo Cards', '6517-6732-4897-4771', 28, 'jLf2tKi4ZyE=', 1000, 'redeemed', NULL, 0, 'App\\User', 1, '[]', NULL, '2021-02-13 14:00:00', '2021-02-14 06:09:52'),
(12, 'Promo Cards', '3369-2730-5734-1381', 29, 'jLf2tKi4ZyE=', 0, 'CashOut', '2021-03-22', 0, 'App\\User', 1, '[]', NULL, '2021-02-13 14:00:00', '2021-03-22 17:21:12'),
(13, 'Promo Cards', '6722-9375-5825-8307', 30, 'jLf2tKi4ZyE=', 0, 'CashOut', '2021-03-22', 0, 'App\\User', 1, '[]', NULL, '2021-02-13 14:00:00', '2021-03-22 17:21:49'),
(14, 'Promo Cards', '4796-9573-0701-5846', 31, 'jLf2tKi4ZyE=', 990, 'available', NULL, 0, 'App\\User', 1, '[]', NULL, '2021-02-13 14:00:00', '2021-04-04 14:05:21'),
(15, 'Promo Cards', '8120-5830-2490-1449', 32, 'jLf2tKi4ZyE=', 1000, 'available', NULL, 0, 'App\\User', 1, '[]', NULL, '2021-02-13 14:00:00', '2021-02-14 04:14:02'),
(16, 'Promo Cards', '1710-2784-1173-0595', 33, 'jLf2tKi4ZyE=', 1000, 'available', NULL, 0, 'App\\User', 1, '[]', NULL, '2021-02-13 14:00:00', '2021-02-14 04:14:02'),
(17, 'Promo Cards', '4729-7974-6483-9134', 34, 'jLf2tKi4ZyE=', 1000, 'available', NULL, 0, 'App\\User', 1, '[]', NULL, '2021-02-13 14:00:00', '2021-02-14 04:14:02'),
(18, 'Promo Cards', '1131-9757-0889-2942', 35, 'jLf2tKi4ZyE=', 1000, 'available', NULL, 0, 'App\\User', 1, '[]', NULL, '2021-02-13 14:00:00', '2021-02-14 04:14:02'),
(19, 'Promo Cards', '9727-4047-6841-0720', 36, 'jLf2tKi4ZyE=', 1000, 'available', NULL, 0, 'App\\User', 1, '[]', NULL, '2021-02-13 14:00:00', '2021-02-14 04:14:02'),
(20, 'Promo Cards', '8654-7409-9756-4403', 37, 'jLf2tKi4ZyE=', 1000, 'available', NULL, 0, 'App\\User', 1, '[]', NULL, '2021-02-13 14:00:00', '2021-02-14 04:14:02'),
(34, 'Shan', '5763-7567-8827-0053', 58, 'jLf2tKi4ZyE=', 0, 'redeemed', NULL, 0, 'App\\User', 58, '[]', NULL, '2021-02-14 07:31:01', '2021-02-14 07:31:01'),
(35, 'CardName', '4284-9686-3011-7553', 3, NULL, 200, 'available', NULL, 0, 'App\\User', 2, '[]', NULL, '2021-04-16 15:53:48', '2021-04-16 15:53:48'),
(36, 'CardName', '9166-9389-2980-5653', NULL, NULL, 200, 'available', NULL, 0, 'App\\User', 2, '[]', NULL, '2021-04-16 15:56:00', '2021-04-16 15:56:00'),
(37, 'Reacharged', '2113-9100-8820-3095', 2, NULL, 400, 'recharged', NULL, 1, 'App\\User', 2, '[]', NULL, '2021-04-16 15:58:59', '2021-04-19 10:00:22'),
(38, 'CardName', '3071-0600-8927-7976', 3, NULL, 175, 'redeemed', NULL, 0, 'App\\User', 3, '[]', NULL, '2021-04-16 15:59:47', '2021-04-17 15:40:36'),
(39, 'CardName', '4548-6239-3993-1979', 2, NULL, 400, 'recharged', NULL, 1, 'App\\User', 2, '[]', NULL, '2021-04-16 16:01:56', '2021-04-19 07:12:19'),
(40, 'CardName', '1226-4750-6783-2658', 2, NULL, 2000, 'available', NULL, 0, 'App\\User', 2, '[]', NULL, '2021-04-16 16:03:51', '2021-04-17 13:11:06'),
(41, 'CardName', '0717-8496-8171-5608', 2, NULL, 0, 'CashOut', '2021-04-19', 0, 'App\\User', 2, '[]', NULL, '2021-04-16 16:15:15', '2021-04-19 14:15:01'),
(42, 'Sample Card', '8040-9780-7658-2883', 2, NULL, 0, 'CashOut', '2021-04-20', 0, 'App\\User', 2, '[]', NULL, '2021-04-16 16:15:39', '2021-04-19 19:49:55'),
(43, 'Sample Card', '4048-8093-0088-3367', 2, NULL, 200, 'available', NULL, 0, 'App\\User', 2, '[]', NULL, '2021-04-16 16:15:50', '2021-04-16 16:15:50'),
(44, 'Sample Card', '2460-7494-0840-2688', 2, NULL, 200, 'available', NULL, 0, 'App\\User', 2, '[]', NULL, '2021-04-16 16:16:13', '2021-04-16 16:16:13'),
(45, 'Sample Card', '0896-0447-5777-4722', 2, NULL, 200, 'available', NULL, 0, 'App\\User', 2, '[]', NULL, '2021-04-16 16:17:30', '2021-04-16 16:17:46'),
(46, 'Sample Card', '5029-5710-8632-2407', 2, NULL, 0, 'CashOut', '2021-04-19', 0, 'App\\User', 2, '[]', NULL, '2021-04-16 16:17:51', '2021-04-19 14:17:20'),
(47, 'Sample Card', '2937-8084-9023-9984', 2, NULL, 200, 'available', NULL, 0, 'App\\User', 2, '[]', NULL, '2021-04-16 16:17:56', '2021-04-16 16:18:09'),
(48, 'GiftCard', '6298-1446-5317-5618', 2, NULL, 2700, 'recharged', NULL, 1, 'App\\User', 2, '[]', NULL, '2021-04-16 16:25:56', '2021-04-19 07:13:45'),
(49, 'GiftCard', '1297-6090-8537-5221', 2, NULL, 700, 'available', NULL, 0, 'App\\User', 2, '[]', NULL, '2021-04-16 16:46:37', '2021-04-16 16:46:42'),
(50, 'My Promo Card', '1474-0945-5879-2395', 2, NULL, 200, 'available', NULL, 0, 'App\\User', 2, '[]', NULL, '2021-04-16 16:50:04', '2021-04-18 14:02:58'),
(52, 'Promo Cards', '0824-5565-8200-6745', 59, NULL, 1000, 'available', NULL, 0, 'App\\User', 1, '[]', NULL, '2021-04-17 19:00:00', '2021-04-17 15:46:37'),
(53, 'Promo Cards', '5052-9391-8534-2076', 60, NULL, 1000, 'available', NULL, 0, 'App\\User', 1, '[]', NULL, '2021-04-17 19:00:00', '2021-04-17 15:46:37'),
(54, 'Promo Cards', '2477-7976-3415-8473', 61, NULL, 1000, 'available', NULL, 0, 'App\\User', 1, '[]', NULL, '2021-04-17 19:00:00', '2021-04-17 15:46:37'),
(55, 'Promo Cards', '8408-4674-3360-6399', 62, NULL, 1000, 'available', NULL, 0, 'App\\User', 1, '[]', NULL, '2021-04-17 19:00:00', '2021-04-17 15:46:37'),
(56, 'Promo Cards', '3728-8868-0252-9487', 63, NULL, 1000, 'available', NULL, 0, 'App\\User', 1, '[]', NULL, '2021-04-17 19:00:00', '2021-04-17 15:46:37'),
(57, 'Promo Cards', '7041-4616-4721-7539', 64, NULL, 1000, 'available', NULL, 0, 'App\\User', 1, '[]', NULL, '2021-04-17 19:00:00', '2021-04-17 15:46:37'),
(58, 'Promo Cards', '2689-1304-1379-8317', 65, NULL, 1000, 'available', NULL, 0, 'App\\User', 1, '[]', NULL, '2021-04-17 19:00:00', '2021-04-17 15:46:37'),
(59, 'Promo Cards', '9984-2934-9307-5609', 66, NULL, 1000, 'available', NULL, 0, 'App\\User', 1, '[]', NULL, '2021-04-17 19:00:00', '2021-04-17 15:46:37'),
(60, 'Promo Cards', '3318-0252-5184-9062', 67, NULL, 1000, 'available', NULL, 0, 'App\\User', 1, '[]', NULL, '2021-04-17 19:00:00', '2021-04-17 15:46:38'),
(61, 'Promo Cards', '5381-9511-2081-3494', 68, NULL, 1000, 'available', NULL, 0, 'App\\User', 1, '[]', NULL, '2021-04-17 19:00:00', '2021-04-17 15:46:38'),
(62, 'New Year Card', '7948-8729-9953-4659', 69, NULL, 2000, 'redeemed', NULL, 0, 'App\\User', 1, '[]', NULL, '2021-04-17 19:00:00', '2021-04-17 15:49:29'),
(63, 'New Year Card', '6914-5513-0213-3713', 70, NULL, 2000, 'available', NULL, 0, 'App\\User', 1, '[]', NULL, '2021-04-17 19:00:00', '2021-04-17 15:47:39'),
(64, 'New Year Card', '7399-0285-6784-4740', 71, NULL, 2000, 'available', NULL, 0, 'App\\User', 1, '[]', NULL, '2021-04-17 19:00:00', '2021-04-17 15:47:39'),
(65, 'New Year Card', '2563-8026-9927-5220', 72, NULL, 2000, 'available', NULL, 0, 'App\\User', 1, '[]', NULL, '2021-04-17 19:00:00', '2021-04-17 15:47:40'),
(66, 'New Year Card', '9236-3138-5873-5805', 73, NULL, 2000, 'available', NULL, 0, 'App\\User', 1, '[]', NULL, '2021-04-17 19:00:00', '2021-04-17 15:47:40'),
(67, 'New Year Card', '2837-3846-6438-4716', 74, NULL, 2000, 'available', NULL, 0, 'App\\User', 1, '[]', NULL, '2021-04-17 19:00:00', '2021-04-17 15:47:40'),
(68, 'New Year Card', '7082-1251-5186-8919', 75, NULL, 2000, 'available', NULL, 0, 'App\\User', 1, '[]', NULL, '2021-04-17 19:00:00', '2021-04-17 15:47:40'),
(69, 'New Year Card', '8585-2844-2139-5118', 76, NULL, 2000, 'available', NULL, 0, 'App\\User', 1, '[]', NULL, '2021-04-17 19:00:00', '2021-04-17 15:47:40'),
(70, 'New Year Card', '7521-5143-5365-6861', 77, NULL, 2000, 'available', NULL, 0, 'App\\User', 1, '[]', NULL, '2021-04-17 19:00:00', '2021-04-17 15:47:40'),
(71, 'New Year Card', '7184-1119-0072-4816', 78, NULL, 2000, 'available', NULL, 0, 'App\\User', 1, '[]', NULL, '2021-04-17 19:00:00', '2021-04-17 15:47:40'),
(72, 'GiftCard', '2249-0234-5996-7712', 2, NULL, 200, 'available', NULL, 0, 'App\\User', 2, '[]', NULL, '2021-04-18 15:03:45', '2021-04-18 15:04:07'),
(73, 'GiftCard', '2636-6830-4415-1423', 2, NULL, 0, 'CashOut', '2021-04-20', 0, 'App\\User', 2, '[]', NULL, '2021-04-19 06:06:31', '2021-04-19 19:50:51'),
(74, 'GiftCard', '2462-4567-2244-3111', 2, NULL, 200, 'available', NULL, 0, 'App\\User', 2, '[]', NULL, '2021-04-19 06:08:48', '2021-04-19 06:08:48'),
(75, 'GiftCard', '7779-0293-9582-7844', 2, NULL, 200, 'available', NULL, 0, 'App\\User', 2, '[]', NULL, '2021-04-19 06:10:16', '2021-04-19 06:10:16'),
(76, 'GiftCard', '6030-7116-7723-5507', 2, NULL, 200, 'available', NULL, 0, 'App\\User', 2, '[]', NULL, '2021-04-19 06:11:57', '2021-04-19 06:31:37'),
(77, 'GiftCard', '0912-0485-3831-4996', 2, NULL, 200, 'available', NULL, 0, 'App\\User', 2, '[]', NULL, '2021-04-19 06:32:33', '2021-04-19 06:33:33'),
(78, 'GiftCard', '0018-8774-8034-1314', 2, NULL, 200, 'available', NULL, 0, 'App\\User', 2, '[]', NULL, '2021-04-19 06:33:25', '2021-04-19 06:33:25'),
(79, 'GiftCard', '8190-4368-7012-6383', 2, NULL, 200, 'redeemed', NULL, 0, 'App\\User', 2, '[]', NULL, '2021-04-19 06:34:26', '2021-04-19 19:51:50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `checkouts_user_id_foreign` (`user_id`),
  ADD KEY `checkouts_voucher_id_foreign` (`voucher_id`);

--
-- Indexes for table `continents`
--
ALTER TABLE `continents`
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `countries`
--
ALTER TABLE `countries`
  ADD UNIQUE KEY `code` (`code`),
  ADD KEY `continent` (`continent`);

--
-- Indexes for table `dashboardsettings`
--
ALTER TABLE `dashboardsettings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `egyptian_nights`
--
ALTER TABLE `egyptian_nights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `landingpage`
--
ALTER TABLE `landingpage`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payouts`
--
ALTER TABLE `payouts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payouts_user_id_foreign` (`user_id`),
  ADD KEY `payouts_voucher_id_foreign` (`voucher_id`);

--
-- Indexes for table `paypal_accounts`
--
ALTER TABLE `paypal_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `paypal_accounts_user_id_foreign` (`user_id`);

--
-- Indexes for table `paypal_credentials`
--
ALTER TABLE `paypal_credentials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_recharge_cards`
--
ALTER TABLE `user_recharge_cards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_recharge_cards_user_id_foreign` (`user_id`),
  ADD KEY `user_recharge_cards_voucher_id_foreign` (`voucher_id`);

--
-- Indexes for table `user_voucher`
--
ALTER TABLE `user_voucher`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_voucher_user_id_foreign` (`user_id`),
  ADD KEY `user_voucher_voucher_id_foreign` (`voucher_id`);

--
-- Indexes for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vouchers_code_unique` (`code`),
  ADD KEY `vouchers_model_type_model_id_index` (`model_type`,`model_id`),
  ADD KEY `vouchers_user_id_foreign` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkouts`
--
ALTER TABLE `checkouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `dashboardsettings`
--
ALTER TABLE `dashboardsettings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `egyptian_nights`
--
ALTER TABLE `egyptian_nights`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `landingpage`
--
ALTER TABLE `landingpage`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payouts`
--
ALTER TABLE `payouts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `paypal_accounts`
--
ALTER TABLE `paypal_accounts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `paypal_credentials`
--
ALTER TABLE `paypal_credentials`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `user_recharge_cards`
--
ALTER TABLE `user_recharge_cards`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user_voucher`
--
ALTER TABLE `user_voucher`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `checkouts`
--
ALTER TABLE `checkouts`
  ADD CONSTRAINT `checkouts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `checkouts_voucher_id_foreign` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`);

--
-- Constraints for table `payouts`
--
ALTER TABLE `payouts`
  ADD CONSTRAINT `payouts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `payouts_voucher_id_foreign` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`);

--
-- Constraints for table `paypal_accounts`
--
ALTER TABLE `paypal_accounts`
  ADD CONSTRAINT `paypal_accounts_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `user_recharge_cards`
--
ALTER TABLE `user_recharge_cards`
  ADD CONSTRAINT `user_recharge_cards_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_recharge_cards_voucher_id_foreign` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`);

--
-- Constraints for table `user_voucher`
--
ALTER TABLE `user_voucher`
  ADD CONSTRAINT `user_voucher_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `user_voucher_voucher_id_foreign` FOREIGN KEY (`voucher_id`) REFERENCES `vouchers` (`id`);

--
-- Constraints for table `vouchers`
--
ALTER TABLE `vouchers`
  ADD CONSTRAINT `vouchers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
