
SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `voto_config`
-- ----------------------------
DROP TABLE IF EXISTS `vote_voto_config`;
CREATE TABLE `vote_voto_config` (
  `id` varchar(200) DEFAULT NULL,
  `valor` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of vote_voto_config
-- ----------------------------
INSERT INTO `vote_voto_config` VALUES ('seu_id_topgs200', '101349');
INSERT INTO `vote_voto_config` VALUES ('item_id', '6393');
INSERT INTO `vote_voto_config` VALUES ('quantidade', '2');

-- ----------------------------
-- Table structure for `vote_totalvoto`
-- ----------------------------
DROP TABLE IF EXISTS `vote_totalvoto`;
CREATE TABLE `vote_totalvoto` (
  `votos` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of vote_totalvoto
-- ----------------------------
INSERT INTO `vote_totalvoto` VALUES ('1');

-- ----------------------------
-- Table structure for `vote_loginvotos`
-- ----------------------------
DROP TABLE IF EXISTS `vote_loginvotos`;
CREATE TABLE `vote_loginvotos` (
  `login` varchar(100) DEFAULT NULL,
  `datadovoto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of vote_loginvotos
-- ----------------------------

-- ----------------------------
-- Table structure for `vote_lista_top`
-- ----------------------------
DROP TABLE IF EXISTS `vote_lista_top`;
CREATE TABLE `vote_lista_top` (
  `ordem` int(11) NOT NULL AUTO_INCREMENT,
  `link_voto` varchar(300) DEFAULT NULL,
  `link_botao` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`ordem`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of vote_lista_top
-- ----------------------------
INSERT INTO `vote_lista_top` VALUES ('1', 'http://mpogtop.com/in/1267348116', 'http://mpogtop.com/images/new/mpoglineage2.jpg');
INSERT INTO `vote_lista_top` VALUES ('2', 'http://l2topzone.com/vote.php?id=5675', 'http://image.l2topzone.com/l2topzone.com.jpg');
INSERT INTO `vote_lista_top` VALUES ('3', 'http://www.l2top.co/vote/server/1204', 'http://nsae01.casimages.net/img/2013/04/22/13042203003436169.png');
INSERT INTO `vote_lista_top` VALUES ('4', 'http://www.top100arena.com/in.asp?id=34307 ', 'http://www.top100arena.com/hit.asp?id=34307&c=La2&t=2');
INSERT INTO `vote_lista_top` VALUES ('5', 'http://www.gtop100.com/in.php?site=45190', 'http://www.gtop100.com/images/votebutton.jpg');
INSERT INTO `vote_lista_top` VALUES ('6', 'entregar.php', 'http://negakih.com/img/confirmar_votaciones.png');
-- ----------------------------
-- Table structure for `vote_ipvotos`
-- ----------------------------
DROP TABLE IF EXISTS `vote_ipvotos`;
CREATE TABLE `vote_ipvotos` (
  `ip` varchar(50) DEFAULT NULL,
  `datadovoto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of vote_ipvotos
-- ----------------------------
