-- --------------------------------------------------------
-- 主机:                           127.0.0.1
-- 服务器版本:                        5.7.25 - MySQL Community Server (GPL)
-- 服务器操作系统:                      Win64
-- HeidiSQL 版本:                  9.5.0.5284
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


-- 导出 message 的数据库结构
CREATE DATABASE IF NOT EXISTS `message` /*!40100 DEFAULT CHARACTER SET utf8 */;
USE `message`;

-- 导出  表 message.think_login 结构
CREATE TABLE IF NOT EXISTS `think_login` (
  `id` int(8) unsigned NOT NULL AUTO_INCREMENT,
  `status` tinyint(2) NOT NULL DEFAULT '0' COMMENT '登录状态',
  `login_time` int(11) unsigned NOT NULL DEFAULT '0' COMMENT '注册时间',
  `user_id` int(6) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- 正在导出表  message.think_login 的数据：25 rows
DELETE FROM `think_login`;
/*!40000 ALTER TABLE `think_login` DISABLE KEYS */;
INSERT INTO `think_login` (`id`, `status`, `login_time`, `user_id`) VALUES
	(1, 1, 1579098436, 3),
	(2, 1, 1579101599, 1),
	(3, 1, 1579101644, 3),
	(4, 1, 1579101760, 1),
	(5, 1, 1579101901, 3),
	(6, 1, 1579102123, 3),
	(7, 1, 1579102164, 1),
	(8, 1, 1579102713, 1),
	(9, 1, 1579102767, 1),
	(10, 1, 1579103222, 1),
	(11, 1, 1579103377, 3),
	(12, 1, 1579103805, 1),
	(13, 1, 1579104488, 1),
	(14, 1, 1579104544, 1),
	(15, 1, 1579104651, 1),
	(16, 1, 1579104671, 1),
	(17, 1, 1579104774, 1),
	(18, 1, 1579106041, 1),
	(19, 1, 1579109559, 3),
	(20, 1, 1579149678, 3),
	(21, 1, 1580610715, 8),
	(22, 1, 1581219643, 1),
	(23, 1, 1581219663, 1),
	(24, 1, 1581392517, 3),
	(25, 1, 1581392892, 3);
/*!40000 ALTER TABLE `think_login` ENABLE KEYS */;

-- 导出  表 message.think_message 结构
CREATE TABLE IF NOT EXISTS `think_message` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `content` text NOT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `update_time` int(11) unsigned NOT NULL,
  `user_id` int(6) unsigned NOT NULL DEFAULT '0' COMMENT '0代表游客，其他表示会员',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8;

-- 正在导出表  message.think_message 的数据：20 rows
DELETE FROM `think_message`;
/*!40000 ALTER TABLE `think_message` DISABLE KEYS */;
INSERT INTO `think_message` (`id`, `content`, `create_time`, `update_time`, `user_id`) VALUES
	(1, '做最温柔的梦，盛满世间行色匆匆，在渺茫的时空，在千百万人之中，听一听心声。', 1579110766, 1581398583, 3),
	(2, '放假啦！我想去北京、重庆、长沙玩几天！', 1579147469, 1579147469, 0),
	(3, '放假啦！我想去北京、重庆、长沙玩几天！', 1579147588, 1579147588, 0),
	(4, '放假啦！呼啦啦啦', 1579149409, 1579149409, 0),
	(6, '这个夏天想带你环游世界', 1579155254, 1579155254, 3),
	(7, 'see my fly. I`m pround to fly up high', 1579155428, 1579155428, 3),
	(8, '不因气压摇摆，只因有你拥戴', 1579155456, 1579155456, 0),
	(9, '我盼有一个天将你拥入怀，昂然地对着宇宙说，是借着你的风', 1579155504, 1579155504, 3),
	(10, '当我还是一个懵懂的女孩，遇到爱不懂爱，从过去到现在', 1579155548, 1579155548, 3),
	(11, '我盼着有一天能和你相见，骄傲地对着天空说，是借着你的风', 1579155587, 1579155587, 3),
	(12, '黄金海岸的岸边，我们肩并着肩，洁净的蓝天，清澈的水面，吻成一条海平线', 1579155666, 1599155666, 3),
	(13, '看你温柔的双眼，弹着吉他的弦，歌词是诺言，旋律是依恋，唱出一首五月天', 1579155724, 1589155724, 3),
	(14, '大雨冲走了昨天，青春乌云几片，彩虹的旁边，有星星几点，迫不及待在眨眼', 1579155838, 1579155838, 0),
	(15, '海风味道变香甜，沙滩镶满亮片，你哼着永远，我和着不变，合唱一首五月天', 1579155897, 1579155897, 0),
	(16, '煮一壶生死悲欢，欺少年郎，明月依旧何来彷徨；不如坦坦荡荡离别风和浪，天涯一曲不惆怅', 1580611026, 1580611026, 8),
	(17, '穿万水多千山，云深夜未央', 1580648393, 1580648393, 0),
	(18, '我可以跟在你身后，像影子追着光梦游，我可以等在这路口，不管你会不会寂寞', 1581218149, 1581218149, 0),
	(19, '落雪千山多障碍，风也清风也静', 1581219328, 1581219328, 0),
	(20, '看着你看见你如何不懂谦卑，去讲心中理想不会俗气，犹如看得见晨曦，才能欢天喜地', 1581219772, 1581219772, 1),
	(21, '有道是萍水相逢不问瞬间，天涯长欢路延绵，花下一瞬的刹间，换来谁的缘，切莫此去经年', 1581393083, 1581393083, 3);
/*!40000 ALTER TABLE `think_message` ENABLE KEYS */;

-- 导出  表 message.think_user 结构
CREATE TABLE IF NOT EXISTS `think_user` (
  `id` int(6) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(25) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `create_time` int(11) unsigned NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '注册状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- 正在导出表  message.think_user 的数据：9 rows
DELETE FROM `think_user`;
/*!40000 ALTER TABLE `think_user` DISABLE KEYS */;
INSERT INTO `think_user` (`id`, `name`, `password`, `email`, `phone`, `create_time`, `status`) VALUES
	(1, 'admin', '123', '1223@qq.com', '11111111', 1579074243, 0),
	(2, 'admin', '13', '123@qq.com', '13672872003', 1579074243, 1),
	(3, 'admin', '12345', '123@qq.com', '13672872003', 1579074526, 1),
	(4, 'admin', '12345', '123@qq.com', '13672872003', 1579074668, 1),
	(5, 'zjm', '12345', '123@qq.com', '13672872003', 1579074741, 1),
	(6, 'admin', '12345', '123@qq.com', '13542181232', 1579074796, 1),
	(7, 'admin', '11111', '16167274@163.com', '13542181232', 1579075269, 1),
	(8, 'zjm', '123123', '1617274779@qq.com', '13672872004', 1580549654, 1),
	(9, 'zjm', '123123', '1617274779@qq.com', '13672872004', 1580549674, 1);
/*!40000 ALTER TABLE `think_user` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
