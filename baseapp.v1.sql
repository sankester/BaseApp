/*
SQLyog Community v12.4.2 (64 bit)
MySQL - 10.1.10-MariaDB : Database - baseapp.v1
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`baseapp.v1` /*!40100 DEFAULT CHARACTER SET latin1 */;

USE `baseapp.v1`;

/*Table structure for table `logs` */

DROP TABLE IF EXISTS `logs`;

CREATE TABLE `logs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `portal_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `action` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `logs_portal_id_foreign` (`portal_id`),
  KEY `logs_user_id_foreign` (`user_id`),
  CONSTRAINT `logs_portal_id_foreign` FOREIGN KEY (`portal_id`) REFERENCES `portals` (`id`) ON DELETE CASCADE,
  CONSTRAINT `logs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `logs` */

LOCK TABLES `logs` WRITE;

insert  into `logs`(`id`,`portal_id`,`user_id`,`action`,`description`,`created_at`,`updated_at`) values 
(1,1,1,'update','Update portal dengan data site_title dari <span class=\"text-muted text-size-small\">Operator Portal</span> menjadi <span class=\"text-muted text-size-small\">Operator</span>','2017-09-08 02:47:27','2017-09-08 02:47:27'),
(2,1,1,'insert','Tambah menu dengan data  <span class=\"text-muted text-size-small\">portal_id</span> = <span class=\"text-muted text-size-small\">1</span>, <span class=\"text-muted text-size-small\">parent_id</span> = <span class=\"text-muted text-size-small\">0</span>, <span class=\"text-muted text-size-small\">nav_title</span> = <span class=\"text-muted text-size-small\">Preference</span>, <span class=\"text-muted text-size-small\">nav_desc</span> = <span class=\"text-muted text-size-small\">Olah Preferences</span>, <span class=\"text-muted text-size-small\">nav_url</span> = <span class=\"text-muted text-size-small\">base/preferences</span>, <span class=\"text-muted text-size-small\">nav_no</span> = <span class=\"text-muted text-size-small\">6</span>, <span class=\"text-muted text-size-small\">active_st</span> = <span class=\"text-muted text-size-small\">1</span>, <span class=\"text-muted text-size-small\">display_st</span> = <span class=\"text-muted text-size-small\">1</span>, <span class=\"text-muted text-size-small\">nav_st</span> = <span class=\"text-muted text-size-small\">internal</span>, <span class=\"text-muted text-size-small\">nav_icon</span> = <span class=\"text-muted text-size-small\">fa-qrcode</span>','2017-09-08 04:13:22','2017-09-08 04:13:22'),
(3,1,1,'update','Update menu dengan data nav_no dari <span class=\"text-muted text-size-small\">6</span> menjadi <span class=\"text-muted text-size-small\">7</span>','2017-09-08 04:16:04','2017-09-08 04:16:04'),
(4,1,1,'Update Permissions','Ubah data ppermissions untuk role Admin','2017-09-08 04:17:30','2017-09-08 04:17:30'),
(5,1,1,'insert','Tambah preference dengan data  <span class=\"text-muted text-size-small\">pref_group</span> = <span class=\"text-muted text-size-small\">recaptcha_api</span>, <span class=\"text-muted text-size-small\">pref_name</span> = <span class=\"text-muted text-size-small\">Site key</span>, <span class=\"text-muted text-size-small\">pref_value</span> = <span class=\"text-muted text-size-small\">6LccISsUAAAAADPszLqhI94xN-ZMk9IgzuOaulMK</span>','2017-09-08 06:53:04','2017-09-08 06:53:04'),
(6,1,1,'insert','Tambah preference dengan data  <span class=\"text-muted text-size-small\">pref_group</span> = <span class=\"text-muted text-size-small\">recaptcha_api</span>, <span class=\"text-muted text-size-small\">pref_name</span> = <span class=\"text-muted text-size-small\">Site key</span>, <span class=\"text-muted text-size-small\">pref_value</span> = <span class=\"text-muted text-size-small\">6LccISsUAAAAADPszLqhI94xN-ZMk9IgzuOaulMK</span>','2017-09-08 06:54:09','2017-09-08 06:54:09'),
(7,1,1,'insert','Tambah preference dengan data  <span class=\"text-muted text-size-small\">pref_group</span> = <span class=\"text-muted text-size-small\">recaptcha_api</span>, <span class=\"text-muted text-size-small\">pref_name</span> = <span class=\"text-muted text-size-small\">Secret key</span>, <span class=\"text-muted text-size-small\">pref_value</span> = <span class=\"text-muted text-size-small\">6LccISsUAAAAAEKvOUWUeoYzG2mdUW48ckW6--_V</span>','2017-09-08 06:55:00','2017-09-08 06:55:00'),
(8,1,1,'update','Update preference dengan data pref_group dari <span class=\"text-muted text-size-small\">recaptcha_api</span> menjadi <span class=\"text-muted text-size-small\">recaptcha</span>','2017-09-08 06:55:27','2017-09-08 06:55:27'),
(9,1,1,'update','Update preference dengan data pref_group dari <span class=\"text-muted text-size-small\">recaptcha</span> menjadi <span class=\"text-muted text-size-small\">recaptcha_api</span>','2017-09-08 06:55:46','2017-09-08 06:55:46'),
(10,1,1,'insert','Tambah preference dengan data  <span class=\"text-muted text-size-small\">pref_group</span> = <span class=\"text-muted text-size-small\">test</span>, <span class=\"text-muted text-size-small\">pref_name</span> = <span class=\"text-muted text-size-small\">tests</span>, <span class=\"text-muted text-size-small\">pref_value</span> = <span class=\"text-muted text-size-small\">dasd31ed23edwx321</span>','2017-09-08 06:56:27','2017-09-08 06:56:27'),
(11,1,1,'delete','Hapus preference dengan nama preference : ','2017-09-08 06:56:41','2017-09-08 06:56:41'),
(12,1,1,'Update Permissions','Ubah data permissions untuk role Admin','2017-09-08 14:10:46','2017-09-08 14:10:46'),
(13,1,1,'Update Permissions','Ubah data permissions untuk role Admin','2017-09-08 14:11:31','2017-09-08 14:11:31'),
(14,1,1,'Update Permissions','Ubah data permissions untuk role Admin','2017-09-08 14:12:03','2017-09-08 14:12:03'),
(15,1,1,'Update Permissions','Ubah data permissions untuk role Admin','2017-09-08 14:12:13','2017-09-08 14:12:13'),
(16,1,1,'Update Permissions','Ubah data permissions untuk role Admin','2017-09-08 14:12:21','2017-09-08 14:12:21'),
(17,1,1,'Update Permissions','Ubah data permissions untuk role Admin','2017-09-08 14:34:55','2017-09-08 14:34:55'),
(18,1,1,'Update Permissions','Ubah data permissions untuk role Admin','2017-09-08 16:13:01','2017-09-08 16:13:01'),
(19,1,1,'Update Permissions','Ubah data permissions untuk role Admin','2017-09-08 16:13:24','2017-09-08 16:13:24');

UNLOCK TABLES;

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

LOCK TABLES `migrations` WRITE;

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2014_10_12_100000_create_password_resets_table',1),
(3,'2017_08_19_000000_create_table_portal',1),
(4,'2017_08_19_000001_create_table_role',1),
(5,'2017_08_23_120414_create_table_nav',1),
(6,'2017_08_25_181024_create_role_nav',1),
(7,'2017_09_07_071351_add_role_forign_key',1),
(8,'2017_09_07_073643_create_table_logs',2),
(9,'2017_09_08_032107_create_table_preference',3);

UNLOCK TABLES;

/*Table structure for table `nav_role` */

DROP TABLE IF EXISTS `nav_role`;

CREATE TABLE `nav_role` (
  `role_id` int(10) unsigned NOT NULL,
  `nav_id` int(10) unsigned NOT NULL,
  `c` tinyint(1) NOT NULL DEFAULT '0',
  `r` tinyint(1) DEFAULT '0',
  `u` tinyint(1) DEFAULT '0',
  `d` tinyint(1) DEFAULT '0',
  `updated_at` timestamp NULL DEFAULT NULL,
  KEY `role_nav_role_id_index` (`role_id`),
  KEY `role_nav_nav_id_index` (`nav_id`),
  CONSTRAINT `role_nav_nav_id_foreign` FOREIGN KEY (`nav_id`) REFERENCES `navs` (`id`) ON DELETE CASCADE,
  CONSTRAINT `role_nav_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `nav_role` */

LOCK TABLES `nav_role` WRITE;

insert  into `nav_role`(`role_id`,`nav_id`,`c`,`r`,`u`,`d`,`updated_at`) values 
(3,11,1,1,1,1,NULL),
(3,1,0,0,0,0,NULL),
(3,3,0,0,0,0,NULL),
(3,7,0,0,0,0,NULL),
(3,8,1,1,1,1,NULL),
(3,10,1,1,1,1,NULL),
(3,12,0,1,1,0,NULL),
(1,11,1,1,1,1,NULL),
(1,1,1,1,1,1,NULL),
(1,3,1,1,1,1,NULL),
(1,7,1,1,1,1,NULL),
(1,8,1,1,1,1,NULL),
(1,10,1,1,1,0,NULL),
(1,13,1,1,1,1,NULL),
(1,12,0,1,1,0,NULL);

UNLOCK TABLES;

/*Table structure for table `navs` */

DROP TABLE IF EXISTS `navs`;

CREATE TABLE `navs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `portal_id` int(10) unsigned NOT NULL,
  `parent_id` int(10) unsigned NOT NULL,
  `nav_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nav_desc` text COLLATE utf8mb4_unicode_ci,
  `nav_url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nav_no` int(11) NOT NULL,
  `active_st` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_st` enum('0','1') COLLATE utf8mb4_unicode_ci NOT NULL,
  `nav_icon` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nav_st` enum('external','internal') COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `navs_portal_id_foreign` (`portal_id`),
  KEY `navs_user_id_foreign` (`user_id`),
  CONSTRAINT `navs_portal_id_foreign` FOREIGN KEY (`portal_id`) REFERENCES `portals` (`id`) ON DELETE CASCADE,
  CONSTRAINT `navs_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `navs` */

LOCK TABLES `navs` WRITE;

insert  into `navs`(`id`,`portal_id`,`parent_id`,`nav_title`,`nav_desc`,`nav_url`,`nav_no`,`active_st`,`display_st`,`nav_icon`,`nav_st`,`user_id`,`created_at`,`updated_at`) values 
(1,1,0,'Users','Manajemen user portal akses','base/users',2,'1','1','fa-user','internal',1,'2017-08-23 19:50:44','2017-08-30 04:25:59'),
(3,1,0,'Roles','Manajemen Role','base/roles',3,'1','1','fa-users','internal',1,'2017-08-24 06:38:40','2017-08-30 04:08:45'),
(7,1,0,'Permission','olah permission user','base/permissions',4,'1','1','fa-user-times','internal',1,'2017-08-27 16:42:44','2017-08-30 04:30:00'),
(8,1,0,'Portal','Olah data portal','base/portals',5,'1','1','fa-globe','internal',1,'2017-08-27 16:43:16','2017-08-30 04:30:36'),
(10,1,0,'Menu','Olah data menu.','base/navs',6,'1','1','fa-navicon','internal',1,'2017-08-28 12:48:01','2017-08-30 04:31:11'),
(11,1,0,'Dasboard','Dasboard web admin','base/home',1,'1','1','icon-home','internal',1,'2017-08-30 03:09:07','2017-08-30 03:29:51'),
(12,1,0,'profile','Profil user login','base/profile',99,'1','0',NULL,'internal',1,'2017-09-02 08:48:35','2017-09-02 08:48:35'),
(13,1,0,'Preference','Olah Preferences','base/preferences',7,'1','1','fa-qrcode','internal',1,'2017-09-08 04:13:22','2017-09-08 04:16:04');

UNLOCK TABLES;

/*Table structure for table `password_resets` */

DROP TABLE IF EXISTS `password_resets`;

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `password_resets` */

LOCK TABLES `password_resets` WRITE;

UNLOCK TABLES;

/*Table structure for table `portals` */

DROP TABLE IF EXISTS `portals`;

CREATE TABLE `portals` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int(10) unsigned NOT NULL,
  `portal_nm` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `site_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `meta_desc` text COLLATE utf8mb4_unicode_ci,
  `meta_keyword` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `portals_user_id_foreign` (`user_id`),
  CONSTRAINT `portals_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `portals` */

LOCK TABLES `portals` WRITE;

insert  into `portals`(`id`,`user_id`,`portal_nm`,`site_title`,`site_desc`,`meta_desc`,`meta_keyword`,`created_at`,`updated_at`) values 
(1,1,'BaseApp Admin Portal','Administrator Base App','Portal untuk administrator',NULL,NULL,'2017-08-21 15:35:12','2017-08-28 01:33:15'),
(2,1,'Operator','Operator','Portal untuk operator website',NULL,NULL,'2017-08-21 16:06:36','2017-09-08 02:47:27');

UNLOCK TABLES;

/*Table structure for table `preferences` */

DROP TABLE IF EXISTS `preferences`;

CREATE TABLE `preferences` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `pref_group` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pref_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pref_value` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `preferences_user_id_foreign` (`user_id`),
  CONSTRAINT `preferences_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `preferences` */

LOCK TABLES `preferences` WRITE;

insert  into `preferences`(`id`,`pref_group`,`pref_name`,`pref_value`,`user_id`,`created_at`,`updated_at`) values 
(1,'recaptcha_api','Site key','6LccISsUAAAAADPszLqhI94xN-ZMk9IgzuOaulMK',1,'2017-09-08 06:54:09','2017-09-08 06:54:09'),
(2,'recaptcha_api','Secret key','6LccISsUAAAAAEKvOUWUeoYzG2mdUW48ckW6--_V',1,'2017-09-08 06:55:00','2017-09-08 06:55:47');

UNLOCK TABLES;

/*Table structure for table `roles` */

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_nm` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role_desc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `default_page` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `portal_id` int(10) unsigned NOT NULL,
  `user_id` int(10) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `roles_user_id_foreign` (`user_id`),
  KEY `roles_portal_id_foreign` (`portal_id`),
  CONSTRAINT `roles_portal_id_foreign` FOREIGN KEY (`portal_id`) REFERENCES `portals` (`id`) ON DELETE CASCADE,
  CONSTRAINT `roles_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `roles` */

LOCK TABLES `roles` WRITE;

insert  into `roles`(`id`,`role_nm`,`role_desc`,`default_page`,`portal_id`,`user_id`,`created_at`,`updated_at`) values 
(1,'Admin','Admin wesite','base/home',1,1,'2017-08-21 22:36:59','2017-08-30 09:44:13'),
(2,'Operator','Operator website','operator/home',2,1,'2017-08-21 16:07:45','2017-08-27 16:35:27'),
(3,'Editor Admin Base','Editor Admin','base/home',1,1,'2017-08-28 17:07:21','2017-08-28 17:07:21');

UNLOCK TABLES;

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int(10) unsigned NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lock_st` int(11) NOT NULL,
  `activation` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `registerDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`),
  UNIQUE KEY `users_email_unique` (`email`),
  KEY `role_user` (`role_id`),
  CONSTRAINT `role_user` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

LOCK TABLES `users` WRITE;

insert  into `users`(`id`,`role_id`,`name`,`username`,`password`,`email`,`lock_st`,`activation`,`registerDate`,`remember_token`,`created_at`,`updated_at`) values 
(1,1,'Ach. Vani Ardiansyah','admin','$2y$10$DXDjfA9wWMjh7BLKVoSaSuLMfzkwQvMGWawzdj93b/QttGDs9AZzG','sankesterfire@gmail.com',0,'nryWBLNJFBJuyDISJ5Xs1Dbid3OhzGp6ndX19tX8wgGegOYRwL','2017-09-11 14:53:01','47DpljHxWSzwZ9Uw72FcQJU4abdqxr1PUOxIJq8RFrbYYP5RGX1Zvkw9Ac1Q','2017-08-21 15:35:12','2017-09-07 06:11:28'),
(2,2,'Vani Ardiansyah','operator','$2y$10$sdurrrIb6Zp4/dHG.bJMD.ZkjPCHU9gpbiJr5Hc0k3kNzaTDf5gJO','operator@gmail.com',0,NULL,'2017-08-29 00:08:03','EGEfs1QBW3pG5Y82TcK01YcNGSL1VEDSast2LgXoIlifX8nYCwHjuwrHvUzw','2017-08-21 16:14:54','2017-08-28 17:08:03'),
(3,3,'Editor Admin','admin_editor','$2y$10$.VNtgy4iQiamOVlL/Dw7d.e1tXmj3T3.eQt0P7Ujkgq27XPkkhIZm','editor@admin.com',0,NULL,'2017-09-08 21:13:58','RZPBiMxA00MnIosHIiqeh0TaiooLKaCrsfyhMFqNczuD8ehjedn7Z2IkSsN4','2017-08-28 17:09:16','2017-08-28 17:09:16'),
(4,1,'Tester Vani','Tester','$2y$10$JT4TFNk7PmduX7JpQApoduwgqcnXGm5P6K4O1lrYW56eXs848G216','vani@test.com',0,NULL,'2017-09-07 13:17:50','NmiXeMF5oYpPEJAeAZXZDhOxmva6fMb18fj6PZoMKWrU4QQjNQY9D4IL9yXv','2017-08-31 06:17:35','2017-09-07 06:17:50');

UNLOCK TABLES;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
