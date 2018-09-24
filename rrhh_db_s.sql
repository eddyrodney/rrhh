/*
 Navicat MySQL Data Transfer

 Source Server         : localhost
 Source Server Type    : MySQL
 Source Server Version : 100132
 Source Host           : localhost:3306
 Source Schema         : rrhh_db

 Target Server Type    : MySQL
 Target Server Version : 100132
 File Encoding         : 65001

 Date: 23/09/2018 20:33:53
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for abilities
-- ----------------------------
DROP TABLE IF EXISTS `abilities`;
CREATE TABLE `abilities`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `state_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 21 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for applicants
-- ----------------------------
DROP TABLE IF EXISTS `applicants`;
CREATE TABLE `applicants`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ssn` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `second_name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lastname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `second_lastname` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `department_id` int(11) NOT NULL,
  `salary` int(10) NULL DEFAULT NULL,
  `referer` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `training_id` int(11) NULL DEFAULT NULL,
  `ability_id` int(11) NOT NULL,
  `experience_id` int(11) NULL DEFAULT NULL,
  `company_id` int(11) NULL DEFAULT NULL,
  `type_id` int(11) NULL DEFAULT NULL,
  `position_id` int(11) NOT NULL,
  `state_id` int(11) NULL DEFAULT NULL,
  `date` datetime(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `department_id`, `ability_id`, `position_id`) USING BTREE,
  INDEX `department_id`(`department_id`) USING BTREE,
  INDEX `training_id`(`training_id`) USING BTREE,
  INDEX `ability_id`(`ability_id`) USING BTREE,
  INDEX `experience_id`(`experience_id`) USING BTREE,
  INDEX `company_id`(`company_id`) USING BTREE,
  INDEX `type_id`(`type_id`) USING BTREE,
  INDEX `position_id`(`position_id`) USING BTREE,
  INDEX `state_id`(`state_id`) USING BTREE,
  INDEX `id`(`id`) USING BTREE,
  CONSTRAINT `applicants_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `applicants_ibfk_2` FOREIGN KEY (`training_id`) REFERENCES `training` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `applicants_ibfk_3` FOREIGN KEY (`ability_id`) REFERENCES `abilities` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `applicants_ibfk_4` FOREIGN KEY (`experience_id`) REFERENCES `job_experience` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `applicants_ibfk_5` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `applicants_ibfk_6` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `applicants_ibfk_7` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `applicants_ibfk_8` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 19 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for companies
-- ----------------------------
DROP TABLE IF EXISTS `companies`;
CREATE TABLE `companies`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `state_id` int(11) NOT NULL,
  PRIMARY KEY (`id`, `state_id`) USING BTREE,
  INDEX `id`(`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for departments
-- ----------------------------
DROP TABLE IF EXISTS `departments`;
CREATE TABLE `departments`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `state_id` int(11) NOT NULL,
  `company_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `state_id`) USING BTREE,
  INDEX `id`(`id`) USING BTREE,
  INDEX `state_id`(`state_id`) USING BTREE,
  INDEX `company_id`(`company_id`) USING BTREE,
  CONSTRAINT `departments_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `departments_ibfk_2` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for employees
-- ----------------------------
DROP TABLE IF EXISTS `employees`;
CREATE TABLE `employees`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ssn` varchar(15) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `secondname` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lastname` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `secondlastname` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `department_id` int(11) NOT NULL,
  `startdate` datetime(0) NULL DEFAULT NULL,
  `position_id` int(11) NULL DEFAULT NULL,
  `monthlysalary` decimal(10, 2) NULL DEFAULT NULL,
  `type_id` int(11) NULL DEFAULT NULL,
  `state_id` int(11) NOT NULL,
  `date` datetime(0) NULL DEFAULT NULL,
  `company_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `department_id`, `state_id`) USING BTREE,
  INDEX `department_id`(`department_id`) USING BTREE,
  INDEX `state_id`(`state_id`) USING BTREE,
  INDEX `type_id`(`type_id`) USING BTREE,
  INDEX `company_id`(`company_id`) USING BTREE,
  INDEX `position_id`(`position_id`) USING BTREE,
  CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `employees_ibfk_3` FOREIGN KEY (`type_id`) REFERENCES `types` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `employees_ibfk_4` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `employees_ibfk_5` FOREIGN KEY (`position_id`) REFERENCES `positions` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 14 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for job_experience
-- ----------------------------
DROP TABLE IF EXISTS `job_experience`;
CREATE TABLE `job_experience`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `company_id` int(11) NULL DEFAULT NULL,
  `job_title` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `startdate` datetime(0) NULL DEFAULT NULL,
  `enddate` datetime(0) NULL DEFAULT NULL,
  `salary` decimal(10, 2) NULL DEFAULT NULL,
  `company_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `applicant_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  INDEX `id`(`id`) USING BTREE,
  INDEX `company_id`(`company_id`) USING BTREE,
  INDEX `applicant_id`(`applicant_id`) USING BTREE,
  CONSTRAINT `job_experience_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `job_experience_ibfk_2` FOREIGN KEY (`applicant_id`) REFERENCES `applicants` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 13 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for languages
-- ----------------------------
DROP TABLE IF EXISTS `languages`;
CREATE TABLE `languages`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `state_id` int(11) NOT NULL,
  PRIMARY KEY (`id`, `state_id`) USING BTREE,
  INDEX `state_id`(`state_id`) USING BTREE,
  CONSTRAINT `languages_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for levels
-- ----------------------------
DROP TABLE IF EXISTS `levels`;
CREATE TABLE `levels`  (
  `id` int(11) NOT NULL,
  `name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for positions
-- ----------------------------
DROP TABLE IF EXISTS `positions`;
CREATE TABLE `positions`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `lowestpayment` decimal(10, 2) NULL DEFAULT NULL,
  `highestpayment` decimal(10, 2) NULL DEFAULT NULL,
  `state_id` int(11) NOT NULL,
  `risk_id` int(11) NOT NULL,
  `department_id` int(11) NULL DEFAULT NULL,
  `company_id` int(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`, `state_id`, `risk_id`) USING BTREE,
  INDEX `state_id`(`state_id`) USING BTREE,
  INDEX `risk_id`(`risk_id`) USING BTREE,
  INDEX `department_id`(`department_id`) USING BTREE,
  INDEX `company_id`(`company_id`) USING BTREE,
  INDEX `id`(`id`) USING BTREE,
  CONSTRAINT `positions_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `positions_ibfk_2` FOREIGN KEY (`risk_id`) REFERENCES `risks` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `positions_ibfk_3` FOREIGN KEY (`department_id`) REFERENCES `departments` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `positions_ibfk_4` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for risks
-- ----------------------------
DROP TABLE IF EXISTS `risks`;
CREATE TABLE `risks`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 4 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for states
-- ----------------------------
DROP TABLE IF EXISTS `states`;
CREATE TABLE `states`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for training
-- ----------------------------
DROP TABLE IF EXISTS `training`;
CREATE TABLE `training`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `details` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `startdate` datetime(0) NULL DEFAULT NULL,
  `enddate` datetime(0) NULL DEFAULT NULL,
  `institution` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `skill_lvl_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  PRIMARY KEY (`id`, `skill_lvl_id`, `state_id`) USING BTREE,
  INDEX `id`(`id`) USING BTREE,
  INDEX `skill_lvl_id`(`skill_lvl_id`) USING BTREE,
  INDEX `state_id`(`state_id`) USING BTREE,
  CONSTRAINT `training_ibfk_1` FOREIGN KEY (`skill_lvl_id`) REFERENCES `levels` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  CONSTRAINT `training_ibfk_2` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT
) ENGINE = InnoDB AUTO_INCREMENT = 2 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Table structure for types
-- ----------------------------
DROP TABLE IF EXISTS `types`;
CREATE TABLE `types`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

SET FOREIGN_KEY_CHECKS = 1;
