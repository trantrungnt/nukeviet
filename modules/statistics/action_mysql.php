<?php

/**
 * @Project NUKEVIET 3.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2012 VINADES.,JSC. All rights reserved
 * @Createdate 2-10-2010 20:59
 */

if( ! defined( 'NV_IS_FILE_MODULES' ) ) die( 'Stop!!!' );

$sql_drop_module = array();

$sql_drop_module[] = "DROP TABLE IF EXISTS " . $db_config['prefix'] . "_" . $lang . "_counter";

$sql_create_module = $sql_drop_module;

$sql_create_module[] = "CREATE TABLE " . $db_config['prefix'] . "_" . $lang . "_counter (
	 c_type varchar(100) NOT NULL,
	 c_val varchar(100) NOT NULL,
	 c_count int(11) unsigned NOT NULL DEFAULT '0',
	 last_update int(11) NOT NULL DEFAULT '0',
	 UNIQUE KEY c_type (c_type,c_val)
) ENGINE=MyISAM";

$sql_create_module[] = "INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_counter (c_type, c_val, c_count, last_update) VALUES
 ('c_time', 'start', 0, 0),
 ('c_time', 'last', 0, 0),
 ('total', 'hits', 0, 0),
 ('year', '2013', 0, 0),
 ('year', '2014', 0, 0),
 ('year', '2015', 0, 0),
 ('year', '2016', 0, 0),
 ('year', '2017', 0, 0),
 ('year', '2018', 0, 0),
 ('year', '2019', 0, 0),
 ('year', '2020', 0, 0),
 ('month', 'Jan', 0, 0),
 ('month', 'Feb', 0, 0),
 ('month', 'Mar', 0, 0),
 ('month', 'Apr', 0, 0),
 ('month', 'May', 0, 0),
 ('month', 'Jun', 0, 0),
 ('month', 'Jul', 0, 0),
 ('month', 'Aug', 0, 0),
 ('month', 'Sep', 0, 0),
 ('month', 'Oct', 0, 0),
 ('month', 'Nov', 0, 0),
 ('month', 'Dec', 0, 0),
 ('day', '01', 0, 0),
 ('day', '02', 0, 0),
 ('day', '03', 0, 0),
 ('day', '04', 0, 0),
 ('day', '05', 0, 0),
 ('day', '06', 0, 0),
 ('day', '07', 0, 0),
 ('day', '08', 0, 0),
 ('day', '09', 0, 0),
 ('day', '10', 0, 0),
 ('day', '11', 0, 0),
 ('day', '12', 0, 0),
 ('day', '13', 0, 0),
 ('day', '14', 0, 0),
 ('day', '15', 0, 0),
 ('day', '16', 0, 0),
 ('day', '17', 0, 0),
 ('day', '18', 0, 0),
 ('day', '19', 0, 0),
 ('day', '20', 0, 0),
 ('day', '21', 0, 0),
 ('day', '22', 0, 0),
 ('day', '23', 0, 0),
 ('day', '24', 0, 0),
 ('day', '25', 0, 0),
 ('day', '26', 0, 0),
 ('day', '27', 0, 0),
 ('day', '28', 0, 0),
 ('day', '29', 0, 0),
 ('day', '30', 0, 0),
 ('day', '31', 0, 0),
 ('dayofweek', 'Sunday', 0, 0),
 ('dayofweek', 'Monday', 0, 0),
 ('dayofweek', 'Tuesday', 0, 0),
 ('dayofweek', 'Wednesday', 0, 0),
 ('dayofweek', 'Thursday', 0, 0),
 ('dayofweek', 'Friday', 0, 0),
 ('dayofweek', 'Saturday', 0, 0),
 ('hour', '00', 0, 0),
 ('hour', '01', 0, 0),
 ('hour', '02', 0, 0),
 ('hour', '03', 0, 0),
 ('hour', '04', 0, 0),
 ('hour', '05', 0, 0),
 ('hour', '06', 0, 0),
 ('hour', '07', 0, 0),
 ('hour', '08', 0, 0),
 ('hour', '09', 0, 0),
 ('hour', '10', 0, 0),
 ('hour', '11', 0, 0),
 ('hour', '12', 0, 0),
 ('hour', '13', 0, 0),
 ('hour', '14', 0, 0),
 ('hour', '15', 0, 0),
 ('hour', '16', 0, 0),
 ('hour', '17', 0, 0),
 ('hour', '18', 0, 0),
 ('hour', '19', 0, 0),
 ('hour', '20', 0, 0),
 ('hour', '21', 0, 0),
 ('hour', '22', 0, 0),
 ('hour', '23', 0, 0),
 ('bot', 'Alexa', 0, 0),
 ('bot', 'AltaVista Scooter', 0, 0),
 ('bot', 'Altavista Mercator', 0, 0),
 ('bot', 'Altavista Search', 0, 0),
 ('bot', 'Aport.ru Bot', 0, 0),
 ('bot', 'Ask Jeeves', 0, 0),
 ('bot', 'Baidu', 0, 0),
 ('bot', 'Exabot', 0, 0),
 ('bot', 'FAST Enterprise', 0, 0),
 ('bot', 'FAST WebCrawler', 0, 0),
 ('bot', 'Francis', 0, 0),
 ('bot', 'Gigablast', 0, 0),
 ('bot', 'Google AdsBot', 0, 0),
 ('bot', 'Google Adsense', 0, 0),
 ('bot', 'Google Bot', 0, 0),
 ('bot', 'Google Desktop', 0, 0),
 ('bot', 'Google Feedfetcher', 0, 0),
 ('bot', 'Heise IT-Markt', 0, 0),
 ('bot', 'Heritrix', 0, 0),
 ('bot', 'IBM Research', 0, 0),
 ('bot', 'ICCrawler - ICjobs', 0, 0),
 ('bot', 'Ichiro', 0, 0),
 ('bot', 'InfoSeek Spider', 0, 0),
 ('bot', 'Lycos.com Bot', 0, 0),
 ('bot', 'MSN Bot', 0, 0),
 ('bot', 'MSN Bot Media', 0, 0),
 ('bot', 'MSN Bot News', 0, 0),
 ('bot', 'MSN NewsBlogs', 0, 0),
 ('bot', 'Majestic-12', 0, 0),
 ('bot', 'Metager', 0, 0),
 ('bot', 'NG-Search', 0, 0),
 ('bot', 'Nutch Bot', 0, 0),
 ('bot', 'NutchCVS', 0, 0),
 ('bot', 'OmniExplorer', 0, 0),
 ('bot', 'Online Link Validator', 0, 0),
 ('bot', 'Open-source Web Search', 0, 0),
 ('bot', 'Psbot', 0, 0),
 ('bot', 'Rambler', 0, 0),
 ('bot', 'SEO Crawler', 0, 0),
 ('bot', 'SEOSearch', 0, 0),
 ('bot', 'Seekport', 0, 0),
 ('bot', 'Sensis', 0, 0),
 ('bot', 'Seoma', 0, 0),
 ('bot', 'Snappy', 0, 0),
 ('bot', 'Steeler', 0, 0),
 ('bot', 'Synoo', 0, 0),
 ('bot', 'Telekom', 0, 0),
 ('bot', 'TurnitinBot', 0, 0),
 ('bot', 'Vietnamese Search', 0, 0),
 ('bot', 'Voyager', 0, 0),
 ('bot', 'W3 Sitesearch', 0, 0),
 ('bot', 'W3C Linkcheck', 0, 0),
 ('bot', 'W3C Validator', 0, 0),
 ('bot', 'WiseNut', 0, 0),
 ('bot', 'YaCy', 0, 0),
 ('bot', 'Yahoo Bot', 0, 0),
 ('bot', 'Yahoo MMCrawler', 0, 0),
 ('bot', 'Yahoo Slurp', 0, 0),
 ('bot', 'YahooSeeker', 0, 0),
 ('bot', 'Yandex', 0, 0),
 ('bot', 'Yandex Blog', 0, 0),
 ('bot', 'Yandex Direct Bot', 0, 0),
 ('bot', 'Yandex Something', 0, 0),
 ('browser', 'netcaptor', 0, 0),
 ('browser', 'opera', 0, 0),
 ('browser', 'aol', 0, 0),
 ('browser', 'aol2', 0, 0),
 ('browser', 'mosaic', 0, 0),
 ('browser', 'k-meleon', 0, 0),
 ('browser', 'konqueror', 0, 0),
 ('browser', 'avantbrowser', 0, 0),
 ('browser', 'avantgo', 0, 0),
 ('browser', 'proxomitron', 0, 0),
 ('browser', 'chrome', 0, 0),
 ('browser', 'safari', 0, 0),
 ('browser', 'lynx', 0, 0),
 ('browser', 'links', 0, 0),
 ('browser', 'galeon', 0, 0),
 ('browser', 'abrowse', 0, 0),
 ('browser', 'amaya', 0, 0),
 ('browser', 'ant', 0, 0),
 ('browser', 'aweb', 0, 0),
 ('browser', 'beonex', 0, 0),
 ('browser', 'blazer', 0, 0),
 ('browser', 'camino', 0, 0),
 ('browser', 'chimera', 0, 0),
 ('browser', 'columbus', 0, 0),
 ('browser', 'crazybrowser', 0, 0),
 ('browser', 'curl', 0, 0),
 ('browser', 'deepnet', 0, 0),
 ('browser', 'dillo', 0, 0),
 ('browser', 'doris', 0, 0),
 ('browser', 'elinks', 0, 0),
 ('browser', 'epiphany', 0, 0),
 ('browser', 'ibrowse', 0, 0),
 ('browser', 'icab', 0, 0),
 ('browser', 'ice', 0, 0),
 ('browser', 'isilox', 0, 0),
 ('browser', 'lotus', 0, 0),
 ('browser', 'lunascape', 0, 0),
 ('browser', 'maxthon', 0, 0),
 ('browser', 'mbrowser', 0, 0),
 ('browser', 'multibrowser', 0, 0),
 ('browser', 'nautilus', 0, 0),
 ('browser', 'netfront', 0, 0),
 ('browser', 'netpositive', 0, 0),
 ('browser', 'omniweb', 0, 0),
 ('browser', 'oregano', 0, 0),
 ('browser', 'phaseout', 0, 0),
 ('browser', 'plink', 0, 0),
 ('browser', 'phoenix', 0, 0),
 ('browser', 'shiira', 0, 0),
 ('browser', 'sleipnir', 0, 0),
 ('browser', 'slimbrowser', 0, 0),
 ('browser', 'staroffice', 0, 0),
 ('browser', 'sunrise', 0, 0),
 ('browser', 'voyager', 0, 0),
 ('browser', 'w3m', 0, 0),
 ('browser', 'webtv', 0, 0),
 ('browser', 'xiino', 0, 0),
 ('browser', 'explorer', 0, 0),
 ('browser', 'firefox', 0, 0),
 ('browser', 'netscape', 0, 0),
 ('browser', 'netscape2', 0, 0),
 ('browser', 'mozilla', 0, 0),
 ('browser', 'mozilla2', 0, 0),
 ('browser', 'firebird', 0, 0),
 ('browser', 'Mobile', 0, 0),
 ('browser', 'Unknown', 0, 0),
 ('os', 'windows7', 0, 0),
 ('os', 'windowsvista', 0, 0),
 ('os', 'windows2003', 0, 0),
 ('os', 'windowsxp', 0, 0),
 ('os', 'windowsxp2', 0, 0),
 ('os', 'windows2k', 0, 0),
 ('os', 'windows95', 0, 0),
 ('os', 'windowsce', 0, 0),
 ('os', 'windowsme', 0, 0),
 ('os', 'windowsme2', 0, 0),
 ('os', 'windowsnt', 0, 0),
 ('os', 'windowsnt2', 0, 0),
 ('os', 'windows98', 0, 0),
 ('os', 'windows', 0, 0),
 ('os', 'linux', 0, 0),
 ('os', 'linux2', 0, 0),
 ('os', 'linux3', 0, 0),
 ('os', 'macosx', 0, 0),
 ('os', 'macppc', 0, 0),
 ('os', 'mac', 0, 0),
 ('os', 'amiga', 0, 0),
 ('os', 'beos', 0, 0),
 ('os', 'freebsd', 0, 0),
 ('os', 'freebsd2', 0, 0),
 ('os', 'irix', 0, 0),
 ('os', 'netbsd', 0, 0),
 ('os', 'netbsd2', 0, 0),
 ('os', 'os2', 0, 0),
 ('os', 'os22', 0, 0),
 ('os', 'openbsd', 0, 0),
 ('os', 'openbsd2', 0, 0),
 ('os', 'palm', 0, 0),
 ('os', 'palm2', 0, 0),
 ('os', 'Unspecified', 0, 0),
 ('country', 'AD', 0, 0),
 ('country', 'AE', 0, 0),
 ('country', 'AF', 0, 0),
 ('country', 'AG', 0, 0),
 ('country', 'AI', 0, 0),
 ('country', 'AL', 0, 0),
 ('country', 'AM', 0, 0),
 ('country', 'AN', 0, 0),
 ('country', 'AO', 0, 0),
 ('country', 'AQ', 0, 0),
 ('country', 'AR', 0, 0),
 ('country', 'AS', 0, 0),
 ('country', 'AT', 0, 0),
 ('country', 'AU', 0, 0),
 ('country', 'AW', 0, 0),
 ('country', 'AZ', 0, 0),
 ('country', 'BA', 0, 0),
 ('country', 'BB', 0, 0),
 ('country', 'BD', 0, 0),
 ('country', 'BE', 0, 0),
 ('country', 'BF', 0, 0),
 ('country', 'BG', 0, 0),
 ('country', 'BH', 0, 0),
 ('country', 'BI', 0, 0),
 ('country', 'BJ', 0, 0),
 ('country', 'BM', 0, 0),
 ('country', 'BN', 0, 0),
 ('country', 'BO', 0, 0),
 ('country', 'BR', 0, 0),
 ('country', 'BS', 0, 0),
 ('country', 'BT', 0, 0),
 ('country', 'BW', 0, 0),
 ('country', 'BY', 0, 0),
 ('country', 'BZ', 0, 0),
 ('country', 'CA', 0, 0),
 ('country', 'CD', 0, 0),
 ('country', 'CF', 0, 0),
 ('country', 'CG', 0, 0),
 ('country', 'CH', 0, 0),
 ('country', 'CI', 0, 0),
 ('country', 'CK', 0, 0),
 ('country', 'CL', 0, 0),
 ('country', 'CM', 0, 0),
 ('country', 'CN', 0, 0),
 ('country', 'CO', 0, 0),
 ('country', 'CR', 0, 0),
 ('country', 'CS', 0, 0),
 ('country', 'CU', 0, 0),
 ('country', 'CV', 0, 0),
 ('country', 'CY', 0, 0),
 ('country', 'CZ', 0, 0),
 ('country', 'DE', 0, 0),
 ('country', 'DJ', 0, 0),
 ('country', 'DK', 0, 0),
 ('country', 'DM', 0, 0),
 ('country', 'DO', 0, 0),
 ('country', 'DZ', 0, 0),
 ('country', 'EC', 0, 0),
 ('country', 'EE', 0, 0),
 ('country', 'EG', 0, 0),
 ('country', 'ER', 0, 0),
 ('country', 'ES', 0, 0),
 ('country', 'ET', 0, 0),
 ('country', 'EU', 0, 0),
 ('country', 'FI', 0, 0),
 ('country', 'FJ', 0, 0),
 ('country', 'FK', 0, 0),
 ('country', 'FM', 0, 0),
 ('country', 'FO', 0, 0),
 ('country', 'FR', 0, 0),
 ('country', 'GA', 0, 0),
 ('country', 'GB', 0, 0),
 ('country', 'GD', 0, 0),
 ('country', 'GE', 0, 0),
 ('country', 'GF', 0, 0),
 ('country', 'GH', 0, 0),
 ('country', 'GI', 0, 0),
 ('country', 'GL', 0, 0),
 ('country', 'GM', 0, 0),
 ('country', 'GN', 0, 0),
 ('country', 'GP', 0, 0),
 ('country', 'GQ', 0, 0),
 ('country', 'GR', 0, 0),
 ('country', 'GS', 0, 0),
 ('country', 'GT', 0, 0),
 ('country', 'GU', 0, 0),
 ('country', 'GW', 0, 0),
 ('country', 'GY', 0, 0),
 ('country', 'HK', 0, 0),
 ('country', 'HN', 0, 0),
 ('country', 'HR', 0, 0),
 ('country', 'HT', 0, 0),
 ('country', 'HU', 0, 0),
 ('country', 'ID', 0, 0),
 ('country', 'IE', 0, 0),
 ('country', 'IL', 0, 0),
 ('country', 'IN', 0, 0),
 ('country', 'IO', 0, 0),
 ('country', 'IQ', 0, 0),
 ('country', 'IR', 0, 0),
 ('country', 'IS', 0, 0),
 ('country', 'IT', 0, 0),
 ('country', 'JM', 0, 0),
 ('country', 'JO', 0, 0),
 ('country', 'JP', 0, 0),
 ('country', 'KE', 0, 0),
 ('country', 'KG', 0, 0),
 ('country', 'KH', 0, 0),
 ('country', 'KI', 0, 0),
 ('country', 'KM', 0, 0),
 ('country', 'KN', 0, 0),
 ('country', 'KR', 0, 0),
 ('country', 'KW', 0, 0),
 ('country', 'KY', 0, 0),
 ('country', 'KZ', 0, 0),
 ('country', 'LA', 0, 0),
 ('country', 'LB', 0, 0),
 ('country', 'LC', 0, 0),
 ('country', 'LI', 0, 0),
 ('country', 'LK', 0, 0),
 ('country', 'LR', 0, 0),
 ('country', 'LS', 0, 0),
 ('country', 'LT', 0, 0),
 ('country', 'LU', 0, 0),
 ('country', 'LV', 0, 0),
 ('country', 'LY', 0, 0),
 ('country', 'MA', 0, 0),
 ('country', 'MC', 0, 0),
 ('country', 'MD', 0, 0),
 ('country', 'MG', 0, 0),
 ('country', 'MH', 0, 0),
 ('country', 'MK', 0, 0),
 ('country', 'ML', 0, 0),
 ('country', 'MM', 0, 0),
 ('country', 'MN', 0, 0),
 ('country', 'MO', 0, 0),
 ('country', 'MP', 0, 0),
 ('country', 'MQ', 0, 0),
 ('country', 'MR', 0, 0),
 ('country', 'MT', 0, 0),
 ('country', 'MU', 0, 0),
 ('country', 'MV', 0, 0),
 ('country', 'MW', 0, 0),
 ('country', 'MX', 0, 0),
 ('country', 'MY', 0, 0),
 ('country', 'MZ', 0, 0),
 ('country', 'NA', 0, 0),
 ('country', 'NC', 0, 0),
 ('country', 'NE', 0, 0),
 ('country', 'NF', 0, 0),
 ('country', 'NG', 0, 0),
 ('country', 'NI', 0, 0),
 ('country', 'NL', 0, 0),
 ('country', 'NO', 0, 0),
 ('country', 'NP', 0, 0),
 ('country', 'NR', 0, 0),
 ('country', 'NU', 0, 0),
 ('country', 'NZ', 0, 0),
 ('country', 'OM', 0, 0),
 ('country', 'PA', 0, 0),
 ('country', 'PE', 0, 0),
 ('country', 'PF', 0, 0),
 ('country', 'PG', 0, 0),
 ('country', 'PH', 0, 0),
 ('country', 'PK', 0, 0),
 ('country', 'PL', 0, 0),
 ('country', 'PR', 0, 0),
 ('country', 'PS', 0, 0),
 ('country', 'PT', 0, 0),
 ('country', 'PW', 0, 0),
 ('country', 'PY', 0, 0),
 ('country', 'QA', 0, 0),
 ('country', 'RE', 0, 0),
 ('country', 'RO', 0, 0),
 ('country', 'RU', 0, 0),
 ('country', 'RW', 0, 0),
 ('country', 'SA', 0, 0),
 ('country', 'SB', 0, 0),
 ('country', 'SC', 0, 0),
 ('country', 'SD', 0, 0),
 ('country', 'SE', 0, 0),
 ('country', 'SG', 0, 0),
 ('country', 'SI', 0, 0),
 ('country', 'SK', 0, 0),
 ('country', 'SL', 0, 0),
 ('country', 'SM', 0, 0),
 ('country', 'SN', 0, 0),
 ('country', 'SO', 0, 0),
 ('country', 'SR', 0, 0),
 ('country', 'ST', 0, 0),
 ('country', 'SV', 0, 0),
 ('country', 'SY', 0, 0),
 ('country', 'SZ', 0, 0),
 ('country', 'TD', 0, 0),
 ('country', 'TF', 0, 0),
 ('country', 'TG', 0, 0),
 ('country', 'TH', 0, 0),
 ('country', 'TJ', 0, 0),
 ('country', 'TK', 0, 0),
 ('country', 'TL', 0, 0),
 ('country', 'TM', 0, 0),
 ('country', 'TN', 0, 0),
 ('country', 'TO', 0, 0),
 ('country', 'TR', 0, 0),
 ('country', 'TT', 0, 0),
 ('country', 'TV', 0, 0),
 ('country', 'TW', 0, 0),
 ('country', 'TZ', 0, 0),
 ('country', 'UA', 0, 0),
 ('country', 'UG', 0, 0),
 ('country', 'US', 0, 0),
 ('country', 'UY', 0, 0),
 ('country', 'UZ', 0, 0),
 ('country', 'VA', 0, 0),
 ('country', 'VC', 0, 0),
 ('country', 'VE', 0, 0),
 ('country', 'VG', 0, 0),
 ('country', 'VI', 0, 0),
 ('country', 'VN', 0, 0),
 ('country', 'VU', 0, 0),
 ('country', 'WS', 0, 0),
 ('country', 'YE', 0, 0),
 ('country', 'YT', 0, 0),
 ('country', 'YU', 0, 0),
 ('country', 'ZA', 0, 0),
 ('country', 'ZM', 0, 0),
 ('country', 'ZW', 0, 0),
 ('country', 'ZZ', 0, 0),
 ('country', 'unkown', 0, 0)";

?>