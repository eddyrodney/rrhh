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

 Date: 23/09/2018 20:33:35
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
-- Records of abilities
-- ----------------------------
INSERT INTO `abilities` VALUES (18, 'HABILIDADES DE IDIOMAS', 1);
INSERT INTO `abilities` VALUES (19, 'ASASASAS', 1);
INSERT INTO `abilities` VALUES (20, 'EGFWEFQDSFWEFWEF', 2);

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
-- Records of applicants
-- ----------------------------
INSERT INTO `applicants` VALUES (5, 'sddgaef', 'JOSE', NULL, 'asja', 'kjsdfkj', 10, -2, 'a', 1, 18, NULL, 1, NULL, 3, 1, '0000-00-00 00:00:00');
INSERT INTO `applicants` VALUES (12, '22132312312122', 'JOSE', NULL, 'Feliz', 'lopez', 10, 23412, 'a', 1, 18, 6, 1, NULL, 3, 1, '0000-00-00 00:00:00');
INSERT INTO `applicants` VALUES (13, '1212', 'PABLO', NULL, 'pica', 'piedra', 8, 1234, 'a', 1, 19, 7, 3, NULL, 4, 1, '0000-00-00 00:00:00');
INSERT INTO `applicants` VALUES (14, '1212', 'PABLO', 'marmol', 'pica', 'piedra', 10, 0, 'a', 1, 18, 8, 1, NULL, 3, 1, '0000-00-00 00:00:00');
INSERT INTO `applicants` VALUES (15, '1212', 'PABLO', 'marmol', 'pica', 'piedra', 10, 0, 'a', 1, 18, 9, 1, NULL, 3, 1, '0000-00-00 00:00:00');
INSERT INTO `applicants` VALUES (16, '121212', 'MIGUELITO', 'la para', 'ajajaja', 'equide', 8, 0, 'aa', 1, 19, 10, 3, NULL, 4, 1, '0000-00-00 00:00:00');
INSERT INTO `applicants` VALUES (17, '121212', 'MIGUELITO', 'la para', 'ajajaja', 'equide', 10, 0, 'a', 1, 18, 11, 1, NULL, 3, 1, '0000-00-00 00:00:00');
INSERT INTO `applicants` VALUES (18, '1212', 'YASON', 'maicol', 'de la cru', 'lope', 8, 12231, 'yason', 1, 19, 12, 3, NULL, 4, 1, '0000-00-00 00:00:00');

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
-- Records of companies
-- ----------------------------
INSERT INTO `companies` VALUES (1, 'ASTER', 2);
INSERT INTO `companies` VALUES (3, 'HOSPITAL DIGITAL DE LA REPUBLICA', 1);
INSERT INTO `companies` VALUES (4, 'UNA GRAN COMPAñIA', 2);

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
-- Records of departments
-- ----------------------------
INSERT INTO `departments` VALUES (2, 'RRHH', 2, 1);
INSERT INTO `departments` VALUES (3, 'RECURSOS HUMANOS', 2, 4);
INSERT INTO `departments` VALUES (4, 'SSS', 2, 3);
INSERT INTO `departments` VALUES (5, 'DSDADSAS', 2, 1);
INSERT INTO `departments` VALUES (6, 'ASAS', 2, 1);
INSERT INTO `departments` VALUES (7, 'ASASAS', 1, 1);
INSERT INTO `departments` VALUES (8, 'RRHH', 1, 3);
INSERT INTO `departments` VALUES (9, 'SADASD', 1, 3);
INSERT INTO `departments` VALUES (10, 'UN', 1, 1);
INSERT INTO `departments` VALUES (11, 'DE', 1, 1);
INSERT INTO `departments` VALUES (12, 'PART', 1, 1);
INSERT INTO `departments` VALUES (13, 'TA', 1, 1);

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
-- Records of employees
-- ----------------------------
INSERT INTO `employees` VALUES (5, '12212', 'jose', 'canseco', 'jdua', 'jdakj', 5, '2018-09-22 17:08:03', 3, 1212.00, 1, 1, '2018-09-05 17:08:23', 1);
INSERT INTO `employees` VALUES (9, '1212', 'YASON', 'maicol', 'de la cru', 'lope', 8, '0000-00-00 00:00:00', 4, 12231.00, NULL, 1, '0000-00-00 00:00:00', 3);
INSERT INTO `employees` VALUES (10, '121212', 'MIGUELITO', 'la para', 'ajajaja', 'equide', 8, '0000-00-00 00:00:00', 4, 0.00, NULL, 1, '0000-00-00 00:00:00', 3);
INSERT INTO `employees` VALUES (11, '1212', 'PABLO', NULL, 'pica', 'piedra', 8, '0000-00-00 00:00:00', 4, 1234.00, NULL, 1, '0000-00-00 00:00:00', 3);
INSERT INTO `employees` VALUES (12, '1212', 'PABLO', 'marmol', 'pica', 'piedra', 10, '2018-09-23 00:00:00', 3, 0.00, NULL, 1, '2018-09-23 00:00:00', 1);
INSERT INTO `employees` VALUES (13, '22132312312122', 'JOSE', NULL, 'Feliz', 'lopez', 10, '2018-09-23 20:28:52', 3, 23412.00, NULL, 1, '2018-09-23 20:28:52', 1);

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
-- Records of job_experience
-- ----------------------------
INSERT INTO `job_experience` VALUES (6, NULL, NULL, NULL, NULL, NULL, NULL, 12);
INSERT INTO `job_experience` VALUES (7, NULL, NULL, NULL, NULL, NULL, NULL, 13);
INSERT INTO `job_experience` VALUES (8, NULL, 'un buen puesto', NULL, '2018-09-19 00:00:00', 4.00, 'un buen lugar', 14);
INSERT INTO `job_experience` VALUES (9, NULL, 'un buen puesto', NULL, '2018-09-19 00:00:00', 4.00, 'un buen lugar', 15);
INSERT INTO `job_experience` VALUES (10, NULL, 'un buen puesto', '2018-09-19 00:00:00', '2018-09-19 00:00:00', 0.00, '', 16);
INSERT INTO `job_experience` VALUES (11, NULL, 'un buen puesto', '2018-09-19 00:00:00', '2018-09-19 00:00:00', 0.00, 'un buen lugar', 17);
INSERT INTO `job_experience` VALUES (12, NULL, 'un buen puesto', '2018-09-19 00:00:00', '2018-09-19 00:00:00', 11212.00, 'un buen lugar', 18);

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
-- Records of languages
-- ----------------------------
INSERT INTO `languages` VALUES (1, 'AA', 1);
INSERT INTO `languages` VALUES (2, 'INGLES', 1);
INSERT INTO `languages` VALUES (3, 'UNA BUENA COMPAñIA', 1);

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
-- Records of levels
-- ----------------------------
INSERT INTO `levels` VALUES (1, 'GRADO');
INSERT INTO `levels` VALUES (2, 'POST-GRADO ');
INSERT INTO `levels` VALUES (3, 'MAESTRIA');
INSERT INTO `levels` VALUES (4, 'TECNICO');
INSERT INTO `levels` VALUES (5, 'GESTION');

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
-- Records of positions
-- ----------------------------
INSERT INTO `positions` VALUES (3, 'LAVADOR DE PLATO', 20000.00, 25000.00, 1, 2, 10, 1);
INSERT INTO `positions` VALUES (4, 'LIMPIA VIDRIOS', 20000.00, 30000.00, 1, 2, 8, 3);

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
-- Records of risks
-- ----------------------------
INSERT INTO `risks` VALUES (1, 'BAJO');
INSERT INTO `risks` VALUES (2, 'MEDIO');
INSERT INTO `risks` VALUES (3, 'ALTO');

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
-- Records of states
-- ----------------------------
INSERT INTO `states` VALUES (1, 'ACTIVO');
INSERT INTO `states` VALUES (2, 'INACTIVO');

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
-- Records of training
-- ----------------------------
INSERT INTO `training` VALUES (1, 'JUGAR NINTENDO', 'ASAS', '2018-09-16 00:00:00', '2018-09-16 00:00:00', 'CLUB BUEN LUGAR', 2, 1);

-- ----------------------------
-- Table structure for types
-- ----------------------------
DROP TABLE IF EXISTS `types`;
CREATE TABLE `types`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Compact;

-- ----------------------------
-- Records of types
-- ----------------------------
INSERT INTO `types` VALUES (1, 'CANDIDATO');
INSERT INTO `types` VALUES (2, 'EMPLEADO');

SET FOREIGN_KEY_CHECKS = 1;
