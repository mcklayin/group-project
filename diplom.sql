/*
Navicat MySQL Data Transfer

Source Server         : local
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : diplom

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-09-15 13:44:20
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `articles`
-- ----------------------------
DROP TABLE IF EXISTS `articles`;
CREATE TABLE `articles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` int(10) unsigned NOT NULL,
  `position` int(11) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `user_id_edited` int(10) unsigned DEFAULT NULL,
  `group_id` int(11) DEFAULT NULL,
  `article_category_id` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `introduction` text COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `source` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `articles_language_id_foreign` (`language_id`),
  KEY `articles_user_id_foreign` (`user_id`),
  KEY `articles_user_id_edited_foreign` (`user_id_edited`),
  KEY `articles_article_category_id_foreign` (`article_category_id`),
  CONSTRAINT `articles_article_category_id_foreign` FOREIGN KEY (`article_category_id`) REFERENCES `article_categories` (`id`) ON DELETE SET NULL,
  CONSTRAINT `articles_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`),
  CONSTRAINT `articles_user_id_edited_foreign` FOREIGN KEY (`user_id_edited`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `articles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of articles
-- ----------------------------
INSERT INTO `articles` VALUES ('1', '3', null, '1', null, null, '2', 'Sit qui dolores quisquam.', 'porro-sed-sit-et-maxime-cumque', 'Fugiat saepe ab rerum autem quae. Sed id excepturi nihil ut. Facere aut mollitia et qui. Maiores voluptas dicta non.', 'Reiciendis in quae modi velit omnis. Pariatur qui sit molestiae reprehenderit. Voluptatum delectus quo nihil. Nesciunt neque deserunt culpa voluptatem eum.', 'http://harvey.com/occaecati-quaerat-sint-ipsum-ut', null, '2015-09-13 16:56:03', '2015-09-13 16:56:03', null);
INSERT INTO `articles` VALUES ('2', '3', null, '1', null, null, '2', 'Et consequatur soluta consequatur ducimus et error.', 'vel-placeat-facilis-adipisci-nihil-praesentium-temporibus', 'Dolore esse ut facilis minus dolorem. Dolores reiciendis molestiae sit. Quis cupiditate veritatis consequuntur dolor quo earum est necessitatibus. Aliquam accusamus ab voluptatem corrupti maiores est.', 'Repellendus voluptatum qui aliquid rerum. Ut est est necessitatibus deleniti. Nisi architecto est rerum id blanditiis iure.', 'http://stracke.com/iste-voluptate-dolorum-est-et-tenetur-aut.html', null, '2015-09-13 16:56:03', '2015-09-13 16:56:03', null);

-- ----------------------------
-- Table structure for `article_categories`
-- ----------------------------
DROP TABLE IF EXISTS `article_categories`;
CREATE TABLE `article_categories` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `language_id` int(10) unsigned NOT NULL,
  `position` int(11) DEFAULT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `user_id_edited` int(10) unsigned DEFAULT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `article_categories_language_id_foreign` (`language_id`),
  KEY `article_categories_user_id_foreign` (`user_id`),
  KEY `article_categories_user_id_edited_foreign` (`user_id_edited`),
  CONSTRAINT `article_categories_language_id_foreign` FOREIGN KEY (`language_id`) REFERENCES `languages` (`id`),
  CONSTRAINT `article_categories_user_id_edited_foreign` FOREIGN KEY (`user_id_edited`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `article_categories_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of article_categories
-- ----------------------------
INSERT INTO `article_categories` VALUES ('1', '2', null, '1', null, 'Cum dicta dolores molestiae labore minima repellendus ratione.', 'sit-id-non-enim-corporis-blanditiis-quibusdam-ea-porro', '2015-09-13 16:56:03', '2015-09-13 16:56:03', null);
INSERT INTO `article_categories` VALUES ('2', '1', null, '1', null, 'Et dolorum in sint beatae.', 'voluptatem-aut-et-mollitia-molestiae-porro-saepe', '2015-09-13 16:56:03', '2015-09-13 16:56:03', null);

-- ----------------------------
-- Table structure for `files`
-- ----------------------------
DROP TABLE IF EXISTS `files`;
CREATE TABLE `files` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `filename` varchar(250) NOT NULL,
  `path` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of files
-- ----------------------------

-- ----------------------------
-- Table structure for `groups`
-- ----------------------------
DROP TABLE IF EXISTS `groups`;
CREATE TABLE `groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) NOT NULL,
  `owner` int(11) NOT NULL,
  `is_active` tinyint(2) DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of groups
-- ----------------------------

-- ----------------------------
-- Table structure for `languages`
-- ----------------------------
DROP TABLE IF EXISTS `languages`;
CREATE TABLE `languages` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `position` int(11) DEFAULT NULL,
  `name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `lang_code` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(10) unsigned DEFAULT NULL,
  `user_id_edited` int(10) unsigned DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `languages_name_unique` (`name`),
  UNIQUE KEY `languages_lang_code_unique` (`lang_code`),
  KEY `languages_user_id_foreign` (`user_id`),
  KEY `languages_user_id_edited_foreign` (`user_id_edited`),
  CONSTRAINT `languages_user_id_edited_foreign` FOREIGN KEY (`user_id_edited`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  CONSTRAINT `languages_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of languages
-- ----------------------------
INSERT INTO `languages` VALUES ('1', null, 'English', 'gb', null, null, '2015-09-13 16:56:03', '2015-09-13 16:56:03', null);
INSERT INTO `languages` VALUES ('2', null, 'Српски', 'rs', null, null, '2015-09-13 16:56:03', '2015-09-13 16:56:03', null);
INSERT INTO `languages` VALUES ('3', null, 'Bosanski', 'ba', null, null, '2015-09-13 16:56:03', '2015-09-13 16:56:03', null);
INSERT INTO `languages` VALUES ('4', null, 'Русский', 'ru', '1', null, '2015-09-15 10:25:28', '2015-09-15 10:25:28', null);
INSERT INTO `languages` VALUES ('5', null, 'Український', 'ua', '1', null, '2015-09-15 10:25:53', '2015-09-15 10:25:53', null);

-- ----------------------------
-- Table structure for `migrations`
-- ----------------------------
DROP TABLE IF EXISTS `migrations`;
CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO `migrations` VALUES ('2014_10_12_000000_create_users_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_12_100000_create_password_resets_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_18_195027_create_languages_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_18_225005_create_article_categories_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_18_225505_create_articles_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_18_225928_create_photo_albums_table', '1');
INSERT INTO `migrations` VALUES ('2014_10_18_231619_create_photos_table', '1');

-- ----------------------------
-- Table structure for `password_resets`
-- ----------------------------
DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  KEY `password_resets_email_index` (`email`),
  KEY `password_resets_token_index` (`token`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of password_resets
-- ----------------------------

-- ----------------------------
-- Table structure for `privileges`
-- ----------------------------
DROP TABLE IF EXISTS `privileges`;
CREATE TABLE `privileges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of privileges
-- ----------------------------
INSERT INTO `privileges` VALUES ('1', 'Заливать файлы');
INSERT INTO `privileges` VALUES ('2', 'Писать посты');
INSERT INTO `privileges` VALUES ('3', 'Править посты');
INSERT INTO `privileges` VALUES ('4', 'Писать статические блоки');
INSERT INTO `privileges` VALUES ('5', 'Править статические блоки');
INSERT INTO `privileges` VALUES ('6', 'Создавать рассылки');
INSERT INTO `privileges` VALUES ('7', 'Отправлять email участникам группы');

-- ----------------------------
-- Table structure for `pushers`
-- ----------------------------
DROP TABLE IF EXISTS `pushers`;
CREATE TABLE `pushers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(150) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of pushers
-- ----------------------------
INSERT INTO `pushers` VALUES ('1', 'SMS');
INSERT INTO `pushers` VALUES ('2', 'Email');

-- ----------------------------
-- Table structure for `roles`
-- ----------------------------
DROP TABLE IF EXISTS `roles`;
CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO `roles` VALUES ('1', 'Администратор');
INSERT INTO `roles` VALUES ('2', 'Администратор группы');
INSERT INTO `roles` VALUES ('3', 'Пользователь');
INSERT INTO `roles` VALUES ('4', 'Редактор группы');

-- ----------------------------
-- Table structure for `static_blocks`
-- ----------------------------
DROP TABLE IF EXISTS `static_blocks`;
CREATE TABLE `static_blocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `group_id` int(11) NOT NULL,
  `text` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL,
  `is_active` tinyint(2) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of static_blocks
-- ----------------------------

-- ----------------------------
-- Table structure for `users`
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `confirmation_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed` tinyint(1) NOT NULL DEFAULT '0',
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES ('1', 'Admin User', 'admin_user', null, 'admin@admin.com', '$2y$10$WUNZidg1pwRy8zdWbOFnWeJQ5oyxkiaijpiGNoOHafUO9625ER3Yu', '17bf3154264df6afad21aab269e0827c', '1', '1', 'HCblKUi571iNC0KgzUf1VRuLdOXFckWtfeHEpeCwaTLgB3dfInIRmrJw4JzV', '2015-09-13 16:56:03', '2015-09-13 17:00:25', null);
INSERT INTO `users` VALUES ('2', 'Test User', 'test_user', null, 'user@user.com', '$2y$10$mFDwpYfJXOltAGGmYivzLe8oczJzv9SfYylXM9KeUnClQKGpVxsZ6', '5c85229c127d8f9a5ddd4b137bddbe8d', '1', '0', null, '2015-09-13 16:56:03', '2015-09-13 16:56:03', null);

-- ----------------------------
-- Table structure for `user_groups`
-- ----------------------------
DROP TABLE IF EXISTS `user_groups`;
CREATE TABLE `user_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_groups
-- ----------------------------

-- ----------------------------
-- Table structure for `user_privileges`
-- ----------------------------
DROP TABLE IF EXISTS `user_privileges`;
CREATE TABLE `user_privileges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) NOT NULL,
  `privilege_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_privileges
-- ----------------------------
INSERT INTO `user_privileges` VALUES ('1', '1', '1');
INSERT INTO `user_privileges` VALUES ('2', '1', '2');
INSERT INTO `user_privileges` VALUES ('3', '1', '3');
INSERT INTO `user_privileges` VALUES ('4', '1', '4');
INSERT INTO `user_privileges` VALUES ('5', '1', '5');
INSERT INTO `user_privileges` VALUES ('6', '1', '6');
INSERT INTO `user_privileges` VALUES ('7', '1', '7');
INSERT INTO `user_privileges` VALUES ('8', '2', '1');
INSERT INTO `user_privileges` VALUES ('9', '2', '2');
INSERT INTO `user_privileges` VALUES ('10', '2', '3');
INSERT INTO `user_privileges` VALUES ('11', '2', '4');
INSERT INTO `user_privileges` VALUES ('12', '2', '5');
INSERT INTO `user_privileges` VALUES ('13', '2', '6');
INSERT INTO `user_privileges` VALUES ('14', '2', '7');
INSERT INTO `user_privileges` VALUES ('15', '3', '1');
INSERT INTO `user_privileges` VALUES ('16', '3', '7');

-- ----------------------------
-- Table structure for `user_roles`
-- ----------------------------
DROP TABLE IF EXISTS `user_roles`;
CREATE TABLE `user_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user_roles
-- ----------------------------
