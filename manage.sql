/*
 Navicat Premium Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50626
 Source Host           : 127.0.0.1
 Source Database       : manage

 Target Server Type    : MySQL
 Target Server Version : 50626
 File Encoding         : utf-8

 Date: 03/02/2016 02:06:02 AM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `archive`
-- ----------------------------
DROP TABLE IF EXISTS `archive`;
CREATE TABLE `archive` (
  `SID` varchar(20) NOT NULL COMMENT '学生编号',
  `name` varchar(10) NOT NULL,
  `sex` varchar(10) DEFAULT NULL,
  `birthday` date DEFAULT NULL,
  `school` varchar(20) DEFAULT NULL,
  `grade` varchar(10) DEFAULT NULL,
  `student_type` varchar(10) DEFAULT NULL,
  `phone_number` varchar(20) DEFAULT NULL,
  `qq` varchar(20) DEFAULT NULL,
  `wechat` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `consult_date` datetime DEFAULT NULL,
  `info_channel` varchar(20) DEFAULT NULL,
  `good_subject` varchar(10) DEFAULT NULL,
  `bad_subject` varchar(10) DEFAULT NULL,
  `interest` varchar(255) DEFAULT NULL,
  `remediation_experience` varchar(10) DEFAULT NULL,
  `questionnaire_compelete` int(11) DEFAULT '0' COMMENT '问卷调查完成',
  `paper_analysis_compelete` int(11) DEFAULT '0' COMMENT '试卷分析完成 0-未开始 1-未完成 2-已完成',
  PRIMARY KEY (`SID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `archive`
-- ----------------------------
BEGIN;
INSERT INTO `archive` VALUES ('1600001', '刘鹏', '女', '1992-10-20', '哈尔滨工业大学', '高三', '文科', '18634924471', '842225312', '842225312', '哈尔滨丽景家园', '2016-03-02 00:42:06', '微信公众号', '物理', '生物', '电子游戏', '没有', '0', '0'), ('1600002', '林蝉', '男', '1993-06-09', '黑龙江科技大学', '高二', '理科', '18636451176', '51176', '51176', '哈工大2公寓', '2016-03-02 01:49:58', '朋友介绍', '化学', '历史', '运动', '有', '1', '0');
COMMIT;

-- ----------------------------
--  Table structure for `questionnaire`
-- ----------------------------
DROP TABLE IF EXISTS `questionnaire`;
CREATE TABLE `questionnaire` (
  `SID` varchar(11) NOT NULL,
  `title_id` int(11) NOT NULL,
  `answer_id` int(11) NOT NULL,
  `update_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `questionnaire`
-- ----------------------------
BEGIN;
INSERT INTO `questionnaire` VALUES ('1600002', '9', '27', '2016-03-02 01:53:29'), ('1600002', '16', '48', '2016-03-02 01:53:29');
COMMIT;

-- ----------------------------
--  Table structure for `questionnaire_answer`
-- ----------------------------
DROP TABLE IF EXISTS `questionnaire_answer`;
CREATE TABLE `questionnaire_answer` (
  `answer_id` int(11) NOT NULL AUTO_INCREMENT,
  `title_id` int(11) NOT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `score` int(11) DEFAULT NULL,
  PRIMARY KEY (`answer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `questionnaire_answer`
-- ----------------------------
BEGIN;
INSERT INTO `questionnaire_answer` VALUES ('1', '1', '符合', '3'), ('2', '1', '一般符合', '2'), ('3', '1', '不符合', '1'), ('4', '2', '符合', '3'), ('5', '2', '一般符合', '2'), ('6', '2', '不符合', '1'), ('7', '3', '符合', '1'), ('8', '3', '一般符合', '2'), ('9', '3', '不符合', '3'), ('10', '4', '符合', '1'), ('11', '4', '一般符合', '2'), ('12', '4', '不符合', '3'), ('13', '5', '符合', '3'), ('14', '5', '一般符合', '2'), ('15', '5', '不符合', '1'), ('16', '6', '符合', '3'), ('17', '6', '一般符合', '2'), ('18', '6', '不符合', '1'), ('19', '7', '符合', '1'), ('20', '7', '一般符合', '2'), ('21', '7', '不符合', '3'), ('22', '8', '符合', '3'), ('23', '8', '一般符合', '2'), ('24', '8', '不符合', '1'), ('25', '9', '符合', '3'), ('26', '9', '一般符合', '2'), ('27', '9', '不符合', '1'), ('28', '10', '符合', '3'), ('29', '10', '一般符合', '2'), ('30', '10', '不符合', '1'), ('31', '11', '符合', '1'), ('32', '11', '一般符合', '2'), ('33', '11', '不符合', '3'), ('34', '12', '符合', '3'), ('35', '12', '一般符合', '2'), ('36', '12', '不符合', '1'), ('37', '13', '符合', '1'), ('38', '13', '一般符合', '2'), ('39', '13', '不符合', '3'), ('40', '14', '符合', '3'), ('41', '14', '一般符合', '2'), ('42', '14', '不符合', '1'), ('43', '15', '符合', '3'), ('44', '15', '一般符合', '2'), ('45', '15', '不符合', '1'), ('46', '16', '符合', '1'), ('47', '16', '一般符合', '2'), ('48', '16', '不符合', '3'), ('49', '17', '符合', '3'), ('50', '17', '一般符合', '2'), ('51', '17', '不符合', '1'), ('52', '18', '符合', '3'), ('53', '18', '一般符合', '2'), ('54', '18', '不符合', '1'), ('55', '19', '符合', '3'), ('56', '19', '一般符合', '2'), ('57', '19', '不符合', '1'), ('58', '20', '符合', '3'), ('59', '20', '一般符合', '2'), ('60', '20', '不符合', '1'), ('61', '21', '符合', '3'), ('62', '21', '一般符合', '2'), ('63', '21', '不符合', '1'), ('64', '22', '符合', '3'), ('65', '22', '一般符合', '2'), ('66', '22', '不符合', '1'), ('67', '23', '符合', '1'), ('68', '23', '一般符合', '2'), ('69', '23', '不符合', '3'), ('70', '24', '符合', '1'), ('71', '24', '一般符合', '2'), ('72', '24', '不符合', '3'), ('73', '25', '符合', '3'), ('74', '25', '一般符合', '2'), ('75', '25', '不符合', '1'), ('76', '26', '符合', '3'), ('77', '26', '一般符合', '2'), ('78', '26', '不符合', '1'), ('79', '27', '符合', '3'), ('80', '27', '一般符合', '2'), ('81', '27', '不符合', '1');
COMMIT;

-- ----------------------------
--  Table structure for `questionnaire_title`
-- ----------------------------
DROP TABLE IF EXISTS `questionnaire_title`;
CREATE TABLE `questionnaire_title` (
  `title_id` int(11) NOT NULL AUTO_INCREMENT,
  `cid` int(11) DEFAULT NULL,
  `title` varchar(255) DEFAULT NULL,
  `enable` int(11) DEFAULT '1',
  PRIMARY KEY (`title_id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `questionnaire_title`
-- ----------------------------
BEGIN;
INSERT INTO `questionnaire_title` VALUES ('1', '1', '很明确学习的目的是什么', '1'), ('2', '1', '认为自己努力学习就能达到自己的目标', '1'), ('3', '1', '大家都学习，我就学习，没有目标', '1'), ('4', '1', '家长让我干嘛我就干嘛，所以家长让我学习我就学习', '1'), ('5', '1', '我享受学习这个过程，不重视最后的结果，努力就好', '1'), ('6', '2', '会整理笔记、预习、复习、整理归纳错题本', '1'), ('7', '2', '迷信采用题海战术，多做题总有好处', '1'), ('8', '2', '我喜欢根据自己的理解，用自己的话去回答，很少硬背课本上的字句', '1'), ('9', '2', '习功课时，我常常把学过的知识列成表或画成图，借以揭露各种知识（如各种概念、定理、公式、事物的特性等）的区别和联系', '1'), ('10', '2', '我常常把学到的各种知识进行比较，发现它们之间的异同和联系', '1'), ('11', '2', '我一般是没有先复习功课，就动手做作业', '1'), ('12', '3', '会主动问同学、老师不会的问题', '1'), ('13', '3', '存在偏科，但是会主动学习自己学不好的科目', '1'), ('14', '3', '我往往把不理解的问题或联想起来的问题记下，以便课后进一步思考、弄清', '1'), ('15', '3', '经常阅读能启发自己的文字', '1'), ('16', '3', '感觉自己比较懒，只愿意看，不愿意动笔', '1'), ('17', '3', '经常和父母、老师沟通自己的学习状况', '1'), ('18', '4', '除了完成作业以外还能安排其他的复习', '1'), ('19', '4', '课堂上你的注意力能够集中一半以上时间听课', '1'), ('20', '4', '能劳逸结合，合理安排自己的学习和休息', '1'), ('21', '4', '利用零碎的时间去记忆零碎的知识', '1'), ('22', '4', '有拖延症，所有的任务和安排不到最后一刻绝对不做', '1'), ('23', '5', '上课时，我头脑里往往会想些别的事，以致老师讲解的许多内容，我似乎都没有听到', '1'), ('24', '5', '我平时没有时间去复习各种功课，一般都是老师要考哪一科是我才去复习哪一科', '1'), ('25', '5', '发下的卷子或作业,如果有做错的,我总要弄清楚为什么错了,怎样做才对', '1'), ('26', '5', '我重视学习经验的总结，并时常和同学交流学习经验', '1'), ('27', '5', '平时学习中遇到难题我会选择把它研究清楚', '1');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
