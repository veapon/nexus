CREATE TABLE `blackjack` (
  `userid` int(11) NOT NULL default '0',
  `points` int(11) NOT NULL default '0',
  `status` enum('playing','waiting') collate utf8_bin NOT NULL default 'playing',
  `cards` text collate utf8_bin NOT NULL,
  `date` int(11) default '0',
  `gameover` enum('yes','no') collate utf8_bin NOT NULL default 'no',
  PRIMARY KEY  (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_bin;


CREATE TABLE `cards` (
  `id` int(11) NOT NULL auto_increment,
  `points` int(11) NOT NULL default '0',
  `pic` text collate utf8_bin NOT NULL,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_bin AUTO_INCREMENT=53 ;

-- 
-- Dumping data for table `cards`
-- 

INSERT INTO `cards` VALUES (1, 2, '2p.jpg');
INSERT INTO `cards` VALUES (2, 3, '3p.jpg');
INSERT INTO `cards` VALUES (3, 4, '4p.jpg');
INSERT INTO `cards` VALUES (4, 5, '5p.jpg');
INSERT INTO `cards` VALUES (5, 6, '6p.jpg');
INSERT INTO `cards` VALUES (6, 7, '7p.jpg');
INSERT INTO `cards` VALUES (7, 8, '8p.jpg');
INSERT INTO `cards` VALUES (8, 9, '9p.jpg');
INSERT INTO `cards` VALUES (9, 10, '10p.jpg');
INSERT INTO `cards` VALUES (10, 10, 'vp.jpg');
INSERT INTO `cards` VALUES (11, 10, 'dp.jpg');
INSERT INTO `cards` VALUES (12, 10, 'kp.jpg');
INSERT INTO `cards` VALUES (13, 1, 'tp.jpg');
INSERT INTO `cards` VALUES (14, 2, '2b.jpg');
INSERT INTO `cards` VALUES (15, 3, '3b.jpg');
INSERT INTO `cards` VALUES (16, 4, '4b.jpg');
INSERT INTO `cards` VALUES (17, 5, '5b.jpg');
INSERT INTO `cards` VALUES (18, 6, '6b.jpg');
INSERT INTO `cards` VALUES (19, 7, '7b.jpg');
INSERT INTO `cards` VALUES (20, 8, '8b.jpg');
INSERT INTO `cards` VALUES (21, 9, '9b.jpg');
INSERT INTO `cards` VALUES (22, 10, '10b.jpg');
INSERT INTO `cards` VALUES (23, 10, 'vb.jpg');
INSERT INTO `cards` VALUES (24, 10, 'db.jpg');
INSERT INTO `cards` VALUES (25, 10, 'kb.jpg');
INSERT INTO `cards` VALUES (26, 1, 'tb.jpg');
INSERT INTO `cards` VALUES (27, 2, '2k.jpg');
INSERT INTO `cards` VALUES (28, 3, '3k.jpg');
INSERT INTO `cards` VALUES (29, 4, '4k.jpg');
INSERT INTO `cards` VALUES (30, 5, '5k.jpg');
INSERT INTO `cards` VALUES (31, 6, '6k.jpg');
INSERT INTO `cards` VALUES (32, 7, '7k.jpg');
INSERT INTO `cards` VALUES (33, 8, '8k.jpg');
INSERT INTO `cards` VALUES (34, 9, '9k.jpg');
INSERT INTO `cards` VALUES (35, 10, '10k.jpg');
INSERT INTO `cards` VALUES (36, 10, 'vk.jpg');
INSERT INTO `cards` VALUES (37, 10, 'dk.jpg');
INSERT INTO `cards` VALUES (38, 10, 'kk.jpg');
INSERT INTO `cards` VALUES (39, 1, 'tk.jpg');
INSERT INTO `cards` VALUES (40, 2, '2c.jpg');
INSERT INTO `cards` VALUES (41, 3, '3c.jpg');
INSERT INTO `cards` VALUES (42, 4, '4c.jpg');
INSERT INTO `cards` VALUES (43, 5, '5c.jpg');
INSERT INTO `cards` VALUES (44, 6, '6c.jpg');
INSERT INTO `cards` VALUES (45, 7, '7c.jpg');
INSERT INTO `cards` VALUES (46, 8, '8c.jpg');
INSERT INTO `cards` VALUES (47, 9, '9c.jpg');
INSERT INTO `cards` VALUES (48, 10, '10c.jpg');
INSERT INTO `cards` VALUES (49, 10, 'vc.jpg');
INSERT INTO `cards` VALUES (50, 10, 'dc.jpg');
INSERT INTO `cards` VALUES (51, 10, 'kc.jpg');
INSERT INTO `cards` VALUES (52, 1, 'tc.jpg');


ALTER TABLE users ADD `bjwins` int(10) NOT NULL default '0';
ALTER TABLE users ADD `bjlosses` int(10) NOT NULL default '0';
ALTER TABLE users ADD `bjstatistics` int(10) NOT NULL default '0';