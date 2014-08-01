
SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `voto_config`
-- ----------------------------
DROP TABLE IF EXISTS `voto_config`;
CREATE TABLE `voto_config` (
  `id` varchar(200) DEFAULT NULL,
  `valor` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of voto_config
-- ----------------------------
INSERT INTO `voto_config` VALUES ('seu_id_topgs200', '101349');
INSERT INTO `voto_config` VALUES ('item_id', '6393');
INSERT INTO `voto_config` VALUES ('quantidade', '2');

-- ----------------------------
-- Table structure for `totalvoto`
-- ----------------------------
DROP TABLE IF EXISTS `totalvoto`;
CREATE TABLE `totalvoto` (
  `votos` int(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of totalvoto
-- ----------------------------
INSERT INTO `totalvoto` VALUES ('1');

-- ----------------------------
-- Table structure for `loginvotos`
-- ----------------------------
DROP TABLE IF EXISTS `loginvotos`;
CREATE TABLE `loginvotos` (
  `login` varchar(100) DEFAULT NULL,
  `datadovoto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of loginvotos
-- ----------------------------

-- ----------------------------
-- Table structure for `lista_top`
-- ----------------------------
DROP TABLE IF EXISTS `lista_top`;
CREATE TABLE `lista_top` (
  `ordem` int(11) NOT NULL AUTO_INCREMENT,
  `link_voto` varchar(300) DEFAULT NULL,
  `link_botao` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`ordem`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of lista_top
-- ----------------------------
INSERT INTO `lista_top` VALUES ('1', 'http://mpogtop.com/in/1267348116', 'http://mpogtop.com/images/new/mpoglineage2.jpg');
INSERT INTO `lista_top` VALUES ('2', 'http://l2topzone.com/vote.php?id=5675', 'http://image.l2topzone.com/l2topzone.com.jpg');
INSERT INTO `lista_top` VALUES ('3', 'http://www.l2top.co/vote/server/1204', 'http://nsae01.casimages.net/img/2013/04/22/13042203003436169.png');
INSERT INTO `lista_top` VALUES ('4', 'http://www.top100arena.com/in.asp?id=34307 ', 'http://www.top100arena.com/hit.asp?id=34307&c=La2&t=2');
INSERT INTO `lista_top` VALUES ('5', 'http://www.gtop100.com/in.php?site=45190', 'http://www.gtop100.com/images/votebutton.jpg');
INSERT INTO `lista_top` VALUES ('6', 'entregar.php', 'http://negakih.com/img/confirmar_votaciones.png');
-- ----------------------------
-- Table structure for `ipvotos`
-- ----------------------------
DROP TABLE IF EXISTS `ipvotos`;
CREATE TABLE `ipvotos` (
  `ip` varchar(50) DEFAULT NULL,
  `datadovoto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of ipvotos
-- ----------------------------
