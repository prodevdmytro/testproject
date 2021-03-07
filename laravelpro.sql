/*
 Navicat Premium Data Transfer

 Source Server         : localhost_3306
 Source Server Type    : MySQL
 Source Server Version : 100411
 Source Host           : localhost:3306
 Source Schema         : laravelpro

 Target Server Type    : MySQL
 Target Server Version : 100411
 File Encoding         : 65001

 Date: 09/07/2020 05:34:50
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for invoices
-- ----------------------------
DROP TABLE IF EXISTS `invoices`;
CREATE TABLE `invoices`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `team` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `job_site` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `invoice` double(8, 2) NOT NULL,
  `date` date NOT NULL,
  `checker` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `other` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 3 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of invoices
-- ----------------------------

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES (2, '2020_07_05_011617_create_users_table', 1);
INSERT INTO `migrations` VALUES (3, '2020_07_05_172432_create_results_table', 2);
INSERT INTO `migrations` VALUES (4, '2019_04_09_075446_create_reports_table', 3);

-- ----------------------------
-- Table structure for reports
-- ----------------------------
DROP TABLE IF EXISTS `reports`;
CREATE TABLE `reports`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `team` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_hours` double(8, 2) NOT NULL,
  `bids` int NULL DEFAULT NULL,
  `bidding_hours` double(8, 2) NULL DEFAULT NULL,
  `chats` int NULL DEFAULT NULL,
  `chatting_hours` double(8, 2) NULL DEFAULT NULL,
  `Awards` int NULL DEFAULT NULL,
  `Acepts` int NULL DEFAULT NULL,
  `task_hours` double(8, 2) NOT NULL,
  `description` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee` double(8, 2) NULL DEFAULT NULL,
  `FL_PY` double(8, 2) NULL DEFAULT NULL,
  `RB_PY` double(8, 2) NULL DEFAULT NULL,
  `state` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 51 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of reports
-- ----------------------------
INSERT INTO `reports` VALUES (11, '2020-07-06', 'Gun.J', '3', 12.00, 1, 2.00, 0, 0.00, 0, 0, 10.00, 'study for wordpress', 0.00, 0.00, 0.00, 'Accepted', '2020-07-06 19:21:51', '2020-07-07 01:26:53');
INSERT INTO `reports` VALUES (12, '2020-07-06', 'Kwang.H.', '2', 14.00, 1, 4.00, 1, 4.00, 0, 0, 6.00, 'wpbakery task- Canadian client', 0.00, 0.00, 0.00, 'Accepted', '2020-07-07 00:34:29', '2020-07-08 14:58:04');
INSERT INTO `reports` VALUES (13, '2020-07-06', 'Guk.H.', '2', 14.00, NULL, 0.00, 0, 0.00, 0, 0, 14.00, 'wpbakery task', 0.00, 0.00, 0.00, 'Accepted', '2020-07-07 00:34:48', '2020-07-07 14:10:39');
INSERT INTO `reports` VALUES (14, '2020-07-06', 'Chong.S', '3', 14.00, 2, 2.00, NULL, NULL, NULL, NULL, 12.00, 'studying wordpress', NULL, NULL, NULL, 'Accepted', '2020-07-07 00:40:35', '2020-07-07 01:26:54');
INSERT INTO `reports` VALUES (15, '2020-07-06', 'Gang.S', '1', 15.00, 2, 2.00, 1, 0.00, 1, 0, 13.00, 'Studying Vue.js', 0.00, 0.00, 0.00, 'Accepted', '2020-07-07 00:49:05', '2020-07-07 01:22:10');
INSERT INTO `reports` VALUES (16, '2020-07-06', 'Sung.J', '2', 14.00, 4, 2.00, 2, NULL, 0, 0, 12.00, 'research about wpbakery', 0.00, NULL, NULL, 'Accepted', '2020-07-07 00:53:16', '2020-07-08 03:39:47');
INSERT INTO `reports` VALUES (18, '2020-07-06', 'Chol.J', '1', 12.00, 6, 3.00, 1, 1.00, 0, 0, 8.00, 'study of WordPress', 0.00, 0.00, 0.00, 'Accepted', '2020-07-07 01:02:04', '2020-07-07 01:22:33');
INSERT INTO `reports` VALUES (19, '2020-07-06', 'Su.W', '2', 14.00, 0, 0.00, 1, 4.00, 1, 0, 10.00, 'wpbakery task- Canadian client', 0.00, 0.00, 0.00, 'Accepted', '2020-07-07 01:09:54', '2020-07-08 03:39:49');
INSERT INTO `reports` VALUES (20, '2020-07-06', 'Gyong.H', '3', 14.00, 0, 0.00, 0, NULL, 0, 0, 14.00, 'wordpress', NULL, NULL, NULL, 'Accepted', '2020-07-07 01:11:42', '2020-07-07 01:26:55');
INSERT INTO `reports` VALUES (21, '2020-07-06', 'Jong.T', '3', 13.00, NULL, NULL, 1, 1.00, NULL, NULL, 12.00, 'worked project for client(Brazil)', NULL, NULL, NULL, 'Accepted', '2020-07-07 01:12:19', '2020-07-07 01:26:56');
INSERT INTO `reports` VALUES (22, '2020-07-06', 'Hak.S', '3', 14.00, NULL, NULL, NULL, NULL, NULL, NULL, 14.00, 'django framework', NULL, NULL, NULL, 'Accepted', '2020-07-07 01:15:08', '2020-07-07 01:26:57');
INSERT INTO `reports` VALUES (23, '2020-07-06', 'Chan.M', '1', 15.00, 4, 3.00, 1, 5.00, 0, 0, 7.00, 'study wp,', NULL, NULL, NULL, 'Accepted', '2020-07-07 01:16:45', '2020-07-07 01:23:36');
INSERT INTO `reports` VALUES (24, '2020-07-06', 'Chung.I', '1', 15.00, 2, 1.00, 0, 0.00, 0, 0, 14.00, 'study django', NULL, 0.00, 0.00, 'Accepted', '2020-07-07 01:19:55', '2020-07-07 01:26:56');
INSERT INTO `reports` VALUES (25, '2020-07-06', 'Yong.L', '1', 15.00, 2, 1.50, 1, 0.30, 0, 0, 13.50, 'Completion of parts corresponding to the final milestone of \"Larabel Expert\" (Saudi Arabia)', 0.00, 0.00, 0.00, 'Accepted', '2020-07-07 01:29:49', '2020-07-07 14:07:41');
INSERT INTO `reports` VALUES (27, '2020-07-06', 'Je.I', '4', 14.00, 0, 0.00, 0, 0.00, 0, 0, 14.00, 'make proposals', NULL, 0.00, 0.00, 'Accepted', '2020-07-07 02:51:59', '2020-07-07 03:00:08');
INSERT INTO `reports` VALUES (28, '2020-07-06', 'Yong.S', '2', 14.00, 2, 2.00, 0, 0.00, 0, 0, 12.00, 'study of wordpress', 0.00, 0.00, 0.00, 'Accepted', '2020-07-07 14:14:52', '2020-07-08 03:39:50');
INSERT INTO `reports` VALUES (29, '2020-07-07', 'Yong.S', '2', 14.00, 3, 2.00, 0, 0.00, 0, 0, 12.00, 'study of wordpress', 0.00, 0.00, 0.00, 'Accepted', '2020-07-08 02:50:52', '2020-07-08 14:58:08');
INSERT INTO `reports` VALUES (31, '2020-07-07', 'Sung.J', '2', 14.00, 4, 2.00, 1, 2.00, 0, 0, 10.00, 'study for wpbakery', NULL, NULL, NULL, 'Accepted', '2020-07-08 02:52:42', '2020-07-08 14:58:09');
INSERT INTO `reports` VALUES (32, '2020-07-07', 'Kwang.H.', '2', 15.00, 5, 3.00, 2, 3.00, 0, 1, 9.00, 'wpbakery-Canadian client', 0.00, 0.00, 0.00, 'Accepted', '2020-07-08 02:54:21', '2020-07-08 14:58:10');
INSERT INTO `reports` VALUES (35, '2020-07-07', 'Guk.P', '2', 15.00, 2, 1.00, 0, 0.00, 0, 0, 14.00, 'wpbakery canada client', 0.00, 0.00, 0.00, 'Accepted', '2020-07-08 02:59:30', '2020-07-08 14:58:11');
INSERT INTO `reports` VALUES (38, '2020-07-07', 'Chol.J', '1', 16.00, 2, 1.00, 1, 1.00, 1, 0, 14.00, 'Study of WordPress', 0.00, 0.00, 0.00, 'Accepted', '2020-07-08 03:11:27', '2020-07-08 10:07:04');
INSERT INTO `reports` VALUES (40, '2020-07-07', 'Su.W', '2', 14.00, 0, 0.00, 0, 0.00, 0, 0, 14.00, 'wpBakery', 0.00, 0.00, 0.00, 'Accepted', '2020-07-08 03:16:21', '2020-07-08 14:58:11');
INSERT INTO `reports` VALUES (41, '2020-07-07', 'Gyong.H', '3', 14.00, NULL, NULL, NULL, NULL, NULL, NULL, 14.00, 'wordpress', NULL, NULL, NULL, 'Accepted', '2020-07-08 10:00:51', '2020-07-08 10:12:33');
INSERT INTO `reports` VALUES (42, '2020-07-07', 'Hak.S', '3', 14.00, 0, 0.00, 0, 0.00, 0, 0, 14.00, 'scraping files in laravel(project_task)', NULL, NULL, NULL, 'Accepted', '2020-07-08 10:00:52', '2020-07-08 10:12:35');
INSERT INTO `reports` VALUES (43, '2020-07-07', 'Chan.M', '1', 16.00, 4, 4.00, 2, 8.00, 0, 0, 4.00, 'studying for Upwork account create', NULL, NULL, NULL, 'Accepted', '2020-07-08 10:06:09', '2020-07-08 10:06:44');
INSERT INTO `reports` VALUES (44, '2020-07-07', 'Jong.T', '3', 14.00, 1, 2.00, 2, 1.00, 0, 0, 14.00, 'web scraping task', NULL, NULL, NULL, 'Accepted', '2020-07-08 10:07:48', '2020-07-08 14:55:44');
INSERT INTO `reports` VALUES (45, '2020-07-07', 'Gun.J', '3', 16.00, NULL, NULL, 2, 1.00, NULL, NULL, 15.00, 'scrapping gifs in laravel', NULL, NULL, NULL, 'Accepted', '2020-07-08 10:07:50', '2020-07-08 10:12:37');
INSERT INTO `reports` VALUES (46, '2020-07-07', 'Chong.S', '3', 16.00, NULL, NULL, 4, 2.00, NULL, 1, 14.00, 'web scraping, chatting with clients.', NULL, NULL, NULL, 'Accepted', '2020-07-08 10:08:00', '2020-07-08 10:12:38');
INSERT INTO `reports` VALUES (47, '2020-07-07', 'Yong.L', '1', 15.00, 0, 0.00, 0, 0.00, 0, 0, 15.00, 'url:\'onspotsa.com\', progress rate:90%, pause', NULL, NULL, NULL, 'Accepted', '2020-07-08 10:08:52', '2020-07-08 14:55:47');
INSERT INTO `reports` VALUES (48, '2020-07-07', 'Chung.I', '1', 15.00, 3, 1.00, 1, 1.00, 0, 0, 13.00, 'studying of django', NULL, NULL, NULL, 'Accepted', '2020-07-08 10:10:37', '2020-07-08 10:19:06');
INSERT INTO `reports` VALUES (49, '2020-07-07', 'Gang.S', '1', 16.00, 2, 1.00, 0, 0.00, 0, 1, 15.00, 'study of Laravel', NULL, NULL, NULL, 'Accepted', '2020-07-08 10:10:51', '2020-07-08 10:18:54');
INSERT INTO `reports` VALUES (50, '2020-07-07', 'Je.I', '4', 14.00, 0, 0.00, 0, 0.00, 0, 0, 14.00, 'make proposals & study FPGA', NULL, NULL, NULL, 'Accepted', '2020-07-08 14:56:37', '2020-07-08 14:57:21');

-- ----------------------------
-- Table structure for results
-- ----------------------------
DROP TABLE IF EXISTS `results`;
CREATE TABLE `results`  (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `proj_id` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `proj_name` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `bidding_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `award_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `acept_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `member` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_info` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `completed_time` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `other` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `state` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `job_site` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 18 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of results
-- ----------------------------
INSERT INTO `results` VALUES (8, 'Project ID: 26185344', 'Excel - VBA', '2020-06-22 10:30', '2020-06-22 11:32', '2020-06-22 11:32', 'Chan.M/0.3, Yong.R/0.35, Hak.S/0.35', 'Egypt-Kareem.A(fake name)', 20, '2020-06-23 11:32', 'client account issues happened so fee -10usd.', '2020-07-07 01:45:18', '2020-07-07 02:27:18', 'Accepted', 'freelancer.com');
INSERT INTO `results` VALUES (12, 'Project ID: 26394641', 'Solve math equation in php', '2020-07-02', '2020-07-03', '2020-07-03', 'Chan.M/0.2, Chung.I/0.5, Chol.J/0.3', 'American-John M.', 20, '2020-07-03', NULL, '2020-07-07 02:00:34', '2020-07-08 10:11:51', 'Accepted', 'freelancer.com');
INSERT INTO `results` VALUES (13, 'Project ID: 26416669', 'Project for Oksana S.', '2020-07-04', '2020-07-04', '2020-07-04', 'Chan.M/0.2, Chung.I/0.2, Chol.J/0.2, Gang.S/0.2, Young.R/0.2', 'Gerardo R. @gerycu97', 20, '2020-07-04', NULL, '2020-07-07 02:06:02', '2020-07-07 02:07:37', 'Accepted', 'freelancer.com');
INSERT INTO `results` VALUES (14, 'Project ID: 26382139', 'Powershell - Download file, and send email confirming successful download', '20-07-02 23-32', '20-07-03 00-43', '20-07-03 21-48', 'Kwang.H. 0.25, Yong.S 0.3, Sung.J 0.3, Su.W 0.15', 'Ashly.T UK client', 30, '20-07-04 11-39', NULL, '2020-07-07 02:39:26', '2020-07-08 10:13:13', 'Accepted', 'freelancer');
INSERT INTO `results` VALUES (15, 'Project ID: 26274455.', 'Website Design change', '2020-07-01', '2020-07-01', '2020-07-01', 'Kwang.H/0.6, Jong.T/0.4', 'Marcos-Brazil', 105, '2020-07-05', NULL, '2020-07-08 10:33:51', '2020-07-08 10:34:17', 'Accepted', 'freelancer.com');
INSERT INTO `results` VALUES (16, 'Project ID: 26255623', 'Project:Project for Bokhanov', '2020-06-26', '2020-06-26', '2020-06-27', 'Kwang.H/1', 'Jamacoo', 23, '2020-06-27', NULL, '2020-07-08 10:35:58', '2020-07-08 10:41:57', 'Accepted', 'freelancer.com');
INSERT INTO `results` VALUES (17, 'Project ID: 26447219', 'Website modifications.', '2020-07-07', '2020-07-07', '2020-07-07', 'Chol.J/0.5, Chan.M/0.3, Gang.S/0.2', 'Eric-American', 50, '2020-07-07', 'he is cool', '2020-07-08 10:37:54', '2020-07-08 10:42:02', 'Accepted', 'freelancer.com');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT,
  `email` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `team` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` int NOT NULL DEFAULT 2,
  `roleId` int NOT NULL DEFAULT 2,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NULL DEFAULT NULL,
  `created_at` timestamp(0) NULL DEFAULT NULL,
  `updated_at` timestamp(0) NULL DEFAULT NULL,
  `position` int NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  UNIQUE INDEX `users_email_unique`(`email`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_unicode_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (7, 'Sung.J', '2', '$2y$10$OvYzpsOj.hz.Xa69ifhH6./ZqF6GRbdXaVg2VnhkCCFJf/e1KcEYa', 1, 1, NULL, '2020-07-06 10:28:33', '2020-07-06 10:28:33', NULL);
INSERT INTO `users` VALUES (8, 'Chan.M', '1', '$2y$10$MO75zxUnJB/D1kQJaK93j.AIt92hb6X03h9yJ0x9Ooq1w..xQk7bC', 1, 1, NULL, '2020-07-06 10:29:37', '2020-07-06 10:29:37', 1);
INSERT INTO `users` VALUES (9, 'Jong.T', '3', '$2y$10$sUIrEm2T0FJtD3w3pkEGyu5gT6bZqGrVMlL9a2wdLS8Iyidp0Cx/C', 1, 1, NULL, '2020-07-06 10:30:11', '2020-07-06 10:30:11', NULL);
INSERT INTO `users` VALUES (10, 'Guk.P', '2', '$2y$10$7Ukvaev.RyORz66adTDjiuB6akk.j9aEob7VUys3PfCyrY4VxV1pe', 1, 1, NULL, '2020-07-06 10:30:13', '2020-07-06 10:30:13', NULL);
INSERT INTO `users` VALUES (11, 'Gang.S', '1', '$2y$10$gX9yBtokQOt33onQaLSEGeIY3Ma4xx3AYnjj1//f.XFdWeunZx3y.', 1, 1, NULL, '2020-07-06 10:30:18', '2020-07-06 10:30:18', NULL);
INSERT INTO `users` VALUES (12, 'Chol.J', '1', '$2y$10$NyjaHmv90p1p4Qcg.Ygp4uLk4nvBm9KfMNUFPNna02D7lTz/2t1JS', 1, 1, NULL, '2020-07-06 10:30:27', '2020-07-06 10:30:27', NULL);
INSERT INTO `users` VALUES (13, 'Chong.S', '3', '$2y$10$EUk9SmJLx/DmI1gv8.GgdeGnyUy8evUOevGSZcns.E/oMX40AjUMW', 1, 1, 'C72Ob6MdMEsYVR6JV65b5vbOZFiyd4h0VP5a6dqyEF7t6SAKmhpgwaB2on62', '2020-07-06 13:33:00', '2020-07-06 13:33:00', NULL);
INSERT INTO `users` VALUES (15, 'Gyong.H', '3', '$2y$10$WdtyacOua81KraU3/Tg05OgdBh2mDq51T/VPQeak1GSFudK4fBZy.', 1, 1, NULL, '2020-07-06 13:34:22', '2020-07-06 13:34:22', NULL);
INSERT INTO `users` VALUES (16, 'Su.W', '2', '$2y$10$OvYzpsOj.hz.Xa69ifhH6./ZqF6GRbdXaVg2VnhkCCFJf/e1KcEYa', 1, 1, NULL, '2020-07-06 14:20:29', '2020-07-06 14:20:29', NULL);
INSERT INTO `users` VALUES (17, 'Kwang.H.', '2', '$2y$10$kdbp1QeXcNb99JGjFyqpaenhBZFYh8JXewxZ8kEFLetYKfuq5W.Bu', 1, 1, NULL, '2020-07-06 14:21:44', '2020-07-06 14:21:44', 1);
INSERT INTO `users` VALUES (18, 'Guk.H.', '2', '$2y$10$EjopaQUc9ZI1/shg5D5azOa0pUrduTstVbh7Ymyg6O4WQvyO8C132', 1, 1, NULL, '2020-07-06 14:22:06', '2020-07-06 14:22:06', NULL);
INSERT INTO `users` VALUES (19, 'jbX', '1', '$2y$10$jlnmyHZ/ELz5VSBDQh4Pne31UYoKOyfupU58BgZc4TSJITal7BaNu', 1, 1, NULL, '2020-07-06 18:47:43', '2020-07-06 18:47:43', 2);
INSERT INTO `users` VALUES (20, 'Gun.J', '3', '$2y$10$M3u1E1DRjyI2L2Jr0PCnHeQmgU8ZW74Ppth9pNPtjLuw/QSGxPFJq', 1, 1, NULL, '2020-07-06 19:14:24', '2020-07-06 19:14:24', 1);
INSERT INTO `users` VALUES (21, 'Hak.S', '3', '$2y$10$Qb9WviOCbUV5r0GrI9PhtuW1L4R/T2.wCBPTafd1HeUelJP046Vai', 1, 1, NULL, '2020-07-06 19:15:47', '2020-07-06 19:15:47', 2);
INSERT INTO `users` VALUES (22, 'Yong.S', '2', '$2y$10$ZmMcoi5FiveGy3pfl51Z..OUCV0eYOn35z6Vmu3vmlM0QTwKPUCi6', 1, 1, NULL, '2020-07-07 00:51:15', '2020-07-07 00:51:15', NULL);
INSERT INTO `users` VALUES (23, 'Yong.L', '1', '$2y$10$h97JmqFvO42ZssEbWi5sr.q3y5PR/lX9HmMw1LjuY1z42eulG9C5C', 1, 1, NULL, '2020-07-07 00:59:51', '2020-07-07 00:59:51', NULL);
INSERT INTO `users` VALUES (24, 'Chung.I', '1', '$2y$10$fTCOugrkiXRWxyKFCXdK/.kvR5MOwS8GZe5LHQlsJNEcMcjtYe5WO', 1, 1, NULL, '2020-07-07 01:08:53', '2020-07-07 01:08:53', NULL);
INSERT INTO `users` VALUES (25, 'Je.I', '4', '$2y$10$O/gefyPqc2nN433XJBiUv.g5EMURcjPAyra6eTvbWWaVuiKeI71zy', 1, 1, NULL, '2020-07-07 02:03:51', '2020-07-07 02:03:51', NULL);

SET FOREIGN_KEY_CHECKS = 1;
