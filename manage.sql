/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 50626
 Source Host           : 127.0.0.1
 Source Database       : manage

 Target Server Type    : MySQL
 Target Server Version : 50626
 File Encoding         : utf-8

 Date: 03/14/2016 04:23:44 AM
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
  `questionnaire_complete` int(11) DEFAULT '0' COMMENT '问卷调查完成',
  `paper_analysis_complete` int(11) DEFAULT '0' COMMENT '试卷分析完成 0-未开始 1-未完成 2-已完成',
  PRIMARY KEY (`SID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `archive`
-- ----------------------------
BEGIN;
INSERT INTO `archive` VALUES ('1600001', '刘鹏', '男', '1992-10-20', '哈尔滨工业大学', '高二', '文科', '18634924471', '842225312', '842225312', '哈尔滨丽景家园', '2016-03-02 00:42:06', '偶尔发现', '生物', '物理', '电影', '没有', '2', '2'), ('1600002', '林蝉', '男', '1993-06-09', '黑龙江科技大学', '高二', '理科', '18636451176', '51176', '51176', '哈工大2公寓', '2016-03-02 01:49:58', '朋友介绍', '化学', '历史', '运动', '有', '2', '2'), ('1600003', '曹松平', '女', '1993-09-19', '清华大学', '高三', '理科', '13947562245', '562245', '562245', '江苏省贵源小区', '2016-03-02 02:15:18', '偶尔发现', '物理', '生物', '电子游戏', '有', '1', '2');
COMMIT;

-- ----------------------------
--  Table structure for `paper_analysis`
-- ----------------------------
DROP TABLE IF EXISTS `paper_analysis`;
CREATE TABLE `paper_analysis` (
  `SID` varchar(20) DEFAULT NULL,
  `pat_id` int(11) DEFAULT NULL,
  `title_id` int(11) DEFAULT NULL,
  `answer_id` int(11) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `paper_analysis`
-- ----------------------------
BEGIN;
INSERT INTO `paper_analysis` VALUES ('1600003', '1', '1', '3', '2016-03-09 01:51:45'), ('1600003', '1', '2', '5', '2016-03-09 01:51:45'), ('1600003', '1', '3', '8', '2016-03-09 01:51:45'), ('1600003', '1', '4', '11', '2016-03-09 01:51:45'), ('1600003', '2', '1', '3', '2016-03-09 03:24:28'), ('1600003', '2', '2', '5', '2016-03-09 03:24:28'), ('1600003', '2', '3', '9', '2016-03-09 03:24:28'), ('1600002', '1', '1', '3', '2016-03-09 03:25:20'), ('1600002', '1', '2', '5', '2016-03-09 03:25:20'), ('1600002', '1', '3', '9', '2016-03-09 03:25:20'), ('1600002', '1', '4', '10', '2016-03-09 03:25:20'), ('1600003', '3', '1', '3', '2016-03-09 03:59:05'), ('1600003', '3', '2', '6', '2016-03-09 03:59:05'), ('1600003', '3', '3', '8', '2016-03-09 03:59:05'), ('1600003', '3', '4', '10', '2016-03-09 03:59:05'), ('1600002', '3', '1', '3', '2016-03-09 04:05:22'), ('1600002', '3', '2', '6', '2016-03-09 04:05:22'), ('1600002', '3', '3', '8', '2016-03-09 04:05:22'), ('1600002', '3', '4', '10', '2016-03-09 04:05:22'), ('1600002', '2', '1', '3', '2016-03-09 04:06:47'), ('1600002', '2', '2', '4', '2016-03-09 04:06:47'), ('1600002', '2', '3', '9', '2016-03-09 04:06:47'), ('1600002', '2', '4', '12', '2016-03-09 04:06:47'), ('1600001', '2', '1', '3', '2016-03-09 04:33:49'), ('1600001', '2', '2', '6', '2016-03-09 04:33:49'), ('1600001', '2', '3', '7', '2016-03-09 04:33:49'), ('1600001', '2', '4', '11', '2016-03-09 04:33:49'), ('1600001', '1', '1', '3', '2016-03-09 05:09:01'), ('1600001', '1', '2', '6', '2016-03-09 05:09:01'), ('1600001', '1', '3', '8', '2016-03-09 05:09:01'), ('1600001', '1', '4', '11', '2016-03-09 05:09:01'), ('1600003', '4', '1', '3', '2016-03-12 18:00:23'), ('1600003', '4', '2', '6', '2016-03-12 18:00:23'), ('1600003', '4', '3', '9', '2016-03-12 18:00:23'), ('1600003', '4', '4', '10', '2016-03-12 18:00:23');
COMMIT;

-- ----------------------------
--  Table structure for `paper_analysis_answer`
-- ----------------------------
DROP TABLE IF EXISTS `paper_analysis_answer`;
CREATE TABLE `paper_analysis_answer` (
  `answer_id` int(11) NOT NULL AUTO_INCREMENT,
  `title_id` int(11) NOT NULL,
  `answer` varchar(255) DEFAULT NULL,
  `score` float DEFAULT NULL,
  PRIMARY KEY (`answer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `paper_analysis_answer`
-- ----------------------------
BEGIN;
INSERT INTO `paper_analysis_answer` VALUES ('1', '1', '简单', '0.975'), ('2', '1', '一般', '1'), ('3', '1', '困难', '1.025'), ('4', '2', '初级', '0.97'), ('5', '2', '中级', '1'), ('6', '2', '高级', '1.03'), ('7', '3', '不熟悉', '0.975'), ('8', '3', '一般', '1'), ('9', '3', '熟悉', '1.025'), ('10', '4', '答不完题，且每道题目并不完整', '0.98'), ('11', '4', '每题有失分，会的可以基本解答', '1'), ('12', '4', '有效时间内可以完美答题', '1.02');
COMMIT;

-- ----------------------------
--  Table structure for `paper_analysis_detail`
-- ----------------------------
DROP TABLE IF EXISTS `paper_analysis_detail`;
CREATE TABLE `paper_analysis_detail` (
  `paper_analysis_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Table structure for `paper_analysis_title`
-- ----------------------------
DROP TABLE IF EXISTS `paper_analysis_title`;
CREATE TABLE `paper_analysis_title` (
  `title_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `enable` int(11) NOT NULL DEFAULT '1',
  PRIMARY KEY (`title_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `paper_analysis_title`
-- ----------------------------
BEGIN;
INSERT INTO `paper_analysis_title` VALUES ('1', '试卷难度分类', '1'), ('2', '学生分类', '1'), ('3', '知识点熟悉度', '1'), ('4', '答题习惯，时间安排', '1');
COMMIT;

-- ----------------------------
--  Table structure for `paper_analysis_transaction`
-- ----------------------------
DROP TABLE IF EXISTS `paper_analysis_transaction`;
CREATE TABLE `paper_analysis_transaction` (
  `SID` varchar(20) NOT NULL,
  `pat_id` int(11) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `score_1` int(11) DEFAULT NULL,
  `score_2` int(11) DEFAULT NULL,
  `score_3` int(11) DEFAULT NULL,
  `analysis_complete` int(11) DEFAULT '0',
  PRIMARY KEY (`SID`,`pat_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `paper_analysis_transaction`
-- ----------------------------
BEGIN;
INSERT INTO `paper_analysis_transaction` VALUES ('1600001', '1', '物理', '23', '123', '33', '2'), ('1600001', '2', '生物', '221', '112', '212', '2'), ('1600002', '1', '生物', '88', '66', '75', '2'), ('1600002', '2', '数学', '23', '55', '66', '2'), ('1600002', '3', '化学', '12', '33', '22', '2'), ('1600003', '1', '物理', '123', '112', '122', '2'), ('1600003', '4', '数学', '324', '123', '432', '2');
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
INSERT INTO `questionnaire` VALUES ('1600001', '1', '2', '2016-03-02 02:14:01'), ('1600001', '2', '4', '2016-03-02 02:14:01'), ('1600001', '3', '7', '2016-03-02 02:14:01'), ('1600001', '4', '12', '2016-03-02 02:14:01'), ('1600001', '5', '13', '2016-03-02 02:14:01'), ('1600001', '6', '16', '2016-03-02 02:14:01'), ('1600001', '7', '20', '2016-03-02 02:14:01'), ('1600001', '8', '22', '2016-03-02 02:14:01'), ('1600001', '9', '25', '2016-03-02 02:14:01'), ('1600001', '10', '30', '2016-03-02 02:14:01'), ('1600001', '11', '32', '2016-03-02 02:14:01'), ('1600001', '12', '36', '2016-03-02 02:14:01'), ('1600001', '13', '37', '2016-03-02 02:14:01'), ('1600001', '14', '40', '2016-03-02 02:14:01'), ('1600001', '15', '44', '2016-03-02 02:14:01'), ('1600001', '16', '48', '2016-03-02 02:14:01'), ('1600001', '17', '49', '2016-03-02 02:14:01'), ('1600001', '18', '53', '2016-03-02 02:14:01'), ('1600001', '19', '56', '2016-03-02 02:14:01'), ('1600001', '20', '59', '2016-03-02 02:14:01'), ('1600001', '21', '61', '2016-03-02 02:14:01'), ('1600001', '22', '64', '2016-03-02 02:14:01'), ('1600001', '23', '68', '2016-03-02 02:14:01'), ('1600001', '24', '72', '2016-03-02 02:14:01'), ('1600001', '25', '74', '2016-03-02 02:14:01'), ('1600001', '26', '78', '2016-03-02 02:14:01'), ('1600001', '27', '81', '2016-03-02 02:14:01'), ('1600002', '1', '1', '2016-03-03 12:06:15'), ('1600002', '2', '6', '2016-03-03 12:06:15'), ('1600002', '3', '9', '2016-03-03 12:06:15'), ('1600002', '4', '10', '2016-03-03 12:06:15'), ('1600002', '5', '15', '2016-03-03 12:06:15'), ('1600002', '6', '18', '2016-03-03 12:06:15'), ('1600002', '7', '19', '2016-03-03 12:06:15'), ('1600002', '8', '24', '2016-03-03 12:06:15'), ('1600002', '9', '27', '2016-03-03 12:06:15'), ('1600002', '10', '30', '2016-03-03 12:06:15'), ('1600002', '11', '33', '2016-03-03 12:06:15'), ('1600002', '12', '36', '2016-03-03 12:06:15'), ('1600002', '13', '37', '2016-03-03 12:06:15'), ('1600002', '14', '40', '2016-03-03 12:06:15'), ('1600002', '15', '43', '2016-03-03 12:06:15'), ('1600002', '16', '48', '2016-03-03 12:06:15'), ('1600002', '17', '49', '2016-03-03 12:06:15'), ('1600002', '18', '52', '2016-03-03 12:06:15'), ('1600002', '19', '56', '2016-03-03 12:06:15'), ('1600002', '20', '60', '2016-03-03 12:06:15'), ('1600002', '21', '63', '2016-03-03 12:06:15'), ('1600002', '22', '64', '2016-03-03 12:06:15'), ('1600002', '23', '67', '2016-03-03 12:06:15'), ('1600002', '24', '70', '2016-03-03 12:06:15'), ('1600002', '25', '73', '2016-03-03 12:06:15'), ('1600002', '26', '76', '2016-03-03 12:06:15'), ('1600002', '27', '79', '2016-03-03 12:06:15'), ('1600003', '8', '24', '2016-03-09 04:04:54'), ('1600003', '13', '39', '2016-03-09 04:04:54'), ('1600003', '25', '74', '2016-03-09 04:04:54');
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
--  Table structure for `questionnaire_category`
-- ----------------------------
DROP TABLE IF EXISTS `questionnaire_category`;
CREATE TABLE `questionnaire_category` (
  `cid` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`cid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `questionnaire_category`
-- ----------------------------
BEGIN;
INSERT INTO `questionnaire_category` VALUES ('1', '一、学习目标'), ('2', '二、学习方法'), ('3', '三、学习主动性'), ('4', '四、时间管理'), ('5', '五、学习状态');
COMMIT;

-- ----------------------------
--  Table structure for `questionnaire_result`
-- ----------------------------
DROP TABLE IF EXISTS `questionnaire_result`;
CREATE TABLE `questionnaire_result` (
  `cid` int(11) DEFAULT NULL,
  `lower_score` int(11) DEFAULT NULL,
  `upper_score` int(11) DEFAULT NULL,
  `weight` double DEFAULT NULL,
  `result` varchar(255) DEFAULT NULL,
  `suggestion` text
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
--  Records of `questionnaire_result`
-- ----------------------------
BEGIN;
INSERT INTO `questionnaire_result` VALUES ('1', '5', '8', '0.98', '不明确', '学生学习目标不明确，应首先发现自己的兴趣，之后根据兴趣和老师。家长进行沟通，在他人的辅助下，明确自己的学习目标。'), ('1', '9', '12', '1', '一般明确', '学生学习目标较为清晰，应结合自己的兴趣，和家长老师进行沟通，进一步明确自己学习的目标。'), ('1', '13', '15', '1.02', '目标明确', '学生学习目标明确，在高中学习的过程中结合自己未来的目标稍微进行学科侧重，可以多方面的获取对自己未来有益的信息。'), ('2', '6', '9', '0.95', '学习方法亟待改变', '学生现阶段学习方法不利于现在的学习，应进行针对性的设计。养成定时学习的习惯，在时间分配得当的基础上，养成 复习-作业-整理-总结 为循环的学习习惯，养成整理笔记、整理错题本、周期性复习、运用图形记忆、经常进行知识点系统的总结和归纳等、对比记忆等学习方法。'), ('2', '10', '15', '1', '学习方法一般，需要进行改良', '学生学习方法适用于短期学习，不利于长期记忆及最终备考。将现阶段一些好的学习方法进行保留，但是改变一些糟粕的学习方法，例如题海战术。注重培养全面思考问题的能力，养成整理笔记、整理错题本、周期性复习、运用图形记忆、经常进行知识点系统的总结和归纳等、对比记忆等学习方法。'), ('2', '16', '18', '1.05', '掌握良好的学习方法', '学生现阶段的学习方法有利于学生进一步提高成绩。继续保持现阶段的良好的学习方法，注重运用图形记忆、经常进行知识点系统的总结和归纳，根据自己局部较弱的部分，进行重点强化，从而进一步提高成绩。'), ('3', '6', '9', '0.99', '主动性差', '学生学习主动性差，需要人为对学习进度、内容进行详细的规划。应帮助其分析弱势科目及其弱势的原因，有针对性的进行人为指导，学习安排。训练其多问、多总结的学习习惯。'), ('3', '10', '15', '1', '主动性一般', '学生学习主动性一般，需要外力因素进行推进。应明确现在主要的弱势科目和强势科目，根据具体学习情况，进行科目学习的安排，主动对弱势科目进行提高。养成多问，多总结的好习惯，充分利用老师、同学等资源。'), ('3', '16', '18', '1.01', '主动性强', '学生学习主动性强，有较好的自学能力。应继续保持，并优化自己的学习目的及学习方法，达到事半功倍的效果。'), ('4', '5', '8', '0.96', '不可控', '学生学习、休息全看心情，对未来学习发展不利。应引入家长、老师等外力帮助其进行时间管理，明确应该大部分分配时间的学科及补习等活动，形成具体的作息时间表，养成定时学习的习惯，客服犯懒心理，不仅要动眼看，还要动手写。'), ('4', '9', '12', '1', '基本可控', '学生时间规划具有半自主性，在自己的规划的基础上应该根据具体弱势的科目安排重点时间段的复习和巩固。应该养成定时学习的习惯，客服犯懒心理，不仅要动眼看，还要动手写。'), ('4', '13', '15', '1.04', '高效', '生活时间规划高效，应继续保持。'), ('5', '5', '8', '0.96', '状态低迷', '没有学习状态，应由老师、家长外力干预进行学习状态的调整和培养，切忌强加压力，让孩子体会到自主学习的乐趣才是重中之重。应该注意运用合理的方式方法，提高学习效率，在学习之前应理清思绪，发现学习问题及时解决，不要耽搁，明确学习时间安排，注意劳逸结合。'), ('5', '9', '12', '1', '状态一般', '学习状态一般，应该注意运用合理的方式方法，提高学习效率，在学习之前应理清思绪，发现学习问题及时解决，不要耽搁，明确学习时间安排，注意劳逸结合。'), ('5', '13', '15', '1.04', '状态很好', '目前的学习状态有利于学习提高，请继续保持，如果某阶段发现学习状态低迷，请及时进行调整，注意劳逸结合。');
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
