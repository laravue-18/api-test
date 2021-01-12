/*
SQLyog Community
MySQL - 5.7.24 : Database - api-test
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`api-test` /*!40100 DEFAULT CHARACTER SET latin1 */;

/*Table structure for table `failed_jobs` */

DROP TABLE IF EXISTS `failed_jobs`;

CREATE TABLE `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `failed_jobs` */

/*Table structure for table `migrations` */

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `migrations` */

insert  into `migrations`(`id`,`migration`,`batch`) values 
(1,'2014_10_12_000000_create_users_table',1),
(2,'2019_08_19_000000_create_failed_jobs_table',2),
(3,'2021_01_09_204021_create_sellers_table',2),
(4,'2021_01_09_213631_add_url_to_users',3),
(5,'2021_01_09_232636_create_products_table',4);

/*Table structure for table `products` */

DROP TABLE IF EXISTS `products`;

CREATE TABLE `products` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `seller_id` bigint(20) unsigned NOT NULL,
  `upc_product_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_orignal_quantity` int(11) NOT NULL,
  `seller_remaining_quantity` int(11) NOT NULL,
  `seller_catelog_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `seller_listed_price` double(8,2) DEFAULT NULL,
  `seller_deal_price` double(8,2) NOT NULL,
  `seller_lowest_deal_price` double(8,2) NOT NULL,
  `seller_negotiation_mode` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiry_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `products_seller_id_foreign` (`seller_id`),
  CONSTRAINT `products_seller_id_foreign` FOREIGN KEY (`seller_id`) REFERENCES `sellers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `products` */

insert  into `products`(`id`,`seller_id`,`upc_product_code`,`seller_orignal_quantity`,`seller_remaining_quantity`,`seller_catelog_id`,`seller_listed_price`,`seller_deal_price`,`seller_lowest_deal_price`,`seller_negotiation_mode`,`expiry_date`,`created_at`,`updated_at`) values 
(1,1,'UPC803',12,12,'12',NULL,23.00,11.00,'auto','2021-01-23','2021-01-09 23:52:39','2021-01-09 23:52:39'),
(2,1,'UPC804',12,12,'12',NULL,23.00,11.00,'auto','2021-01-23','2021-01-09 23:53:06','2021-01-09 23:53:06'),
(3,1,'UPC805',12,12,'12',NULL,23.00,11.00,'auto','2021-01-23','2021-01-09 23:53:13','2021-01-09 23:53:13'),
(4,1,'UPC806',12,12,'12',NULL,23.00,11.00,'auto','2021-01-23','2021-01-09 23:53:22','2021-01-09 23:53:22');

/*Table structure for table `sellers` */

DROP TABLE IF EXISTS `sellers`;

CREATE TABLE `sellers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `organization` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `industry` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `street_address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `state` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `zip` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `sellers_user_id_foreign` (`user_id`),
  CONSTRAINT `sellers_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `sellers` */

insert  into `sellers`(`id`,`user_id`,`first_name`,`last_name`,`organization`,`email_id`,`industry`,`category`,`street_address`,`city`,`state`,`country`,`zip`,`currency`,`contact_number`,`created_at`,`updated_at`) values 
(1,8,'John','Raymond','Laravel','s1926@test.com','IT','IT','street','city','state','USA','12345','USD','+919825641926','2021-01-09 21:11:58','2021-01-09 21:11:58'),
(2,8,'John','Raymond','Laravel','s1927@test.com','IT','IT','street','city','state','USA','12345','USD','+919825641927','2021-01-09 21:12:28','2021-01-09 21:12:28'),
(3,8,'John','Raymond','Laravel','s1928@test.com','IT','IT','street','city','state','USA','12345','USD','+919825641928','2021-01-09 21:12:37','2021-01-09 21:12:37'),
(4,8,'John','Raymond','Laravel','s1929@test.com','IT','IT','street','city','state','USA','12345','USD','+919825641929','2021-01-09 21:12:47','2021-01-09 21:12:47'),
(5,8,'John','Raymond','Laravel','s1930@test.com','IT','IT','street','city','state','USA','12345','USD','+919825641930','2021-01-09 21:12:58','2021-01-09 21:12:58');

/*Table structure for table `users` */

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_token` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `url` text COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

/*Data for the table `users` */

insert  into `users`(`id`,`email`,`api_token`,`password`,`status`,`remember_token`,`created_at`,`updated_at`,`url`) values 
(7,'c1921@test.com','c2fb6e1d4f94ec02cbf913f17b77124f406888fb','$2y$10$1b7tN1M./5oZ0nfz8jHbDe2prAEnt73zKOOXc8Il.g1lMt4yHq9DK',1,NULL,'2021-01-09 20:02:59','2021-01-09 20:02:59','https://dev6.robonegotiator.com'),
(8,'c1922@test.com','18543783da72be03c9a97681d48310678815a2e5','$2y$10$hg9XNGvOobauUMGBHCk0hO4tS35HD82DSsb4eXwgFmyynzfqa9PGC',1,NULL,'2021-01-09 20:08:46','2021-01-09 20:08:46','https://dev6.robonegotiator.com'),
(9,'c1929@test.com','2c9bb3cbacc5590349ea637d5e45ca2346c09436','$2y$10$SXf1Y/5Bnxoo3M/igaDVXuWbT2PNC/YFa/9uNfwFGPDI6N0pgDBtK',1,NULL,'2021-01-09 21:44:09','2021-01-09 21:44:09','https://dev6.robonegotiator.com');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
