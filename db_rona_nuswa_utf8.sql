-- MySQL dump 10.13  Distrib 8.4.3, for Win64 (x86_64)
--
-- Host: localhost    Database: db_rona_nuswa
-- ------------------------------------------------------
-- Server version	8.4.3

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `cache`
--

DROP TABLE IF EXISTS `cache`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache`
--

LOCK TABLES `cache` WRITE;
/*!40000 ALTER TABLE `cache` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `cache_locks`
--

DROP TABLE IF EXISTS `cache_locks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `cache_locks` (
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `owner` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expiration` bigint NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `cache_locks`
--

LOCK TABLES `cache_locks` WRITE;
/*!40000 ALTER TABLE `cache_locks` DISABLE KEYS */;
/*!40000 ALTER TABLE `cache_locks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order` smallint unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `categories_slug_unique` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Jasa Tari Jaipongan','jasa-tari','products/taritradisional.png',1,'2026-06-04 19:27:42','2026-06-07 17:26:33'),(2,'Sewa Kostum & Kebaya','sewa-kostum','products/KOstum1.png',2,'2026-06-04 19:27:42','2026-06-07 17:26:33'),(3,'Makeup Service','makeup','products/makeup.png',3,'2026-06-04 19:27:42','2026-06-07 17:26:33'),(4,'Sanggar & Kelas Tari','sanggar-kelas','products/dashboard.png',4,'2026-06-04 19:27:42','2026-06-07 17:26:33'),(5,'Paket Wedding & Entertainment','paket-wedding','products/paket premium.png',5,'2026-06-04 19:27:42','2026-06-07 17:26:33');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`),
  KEY `failed_jobs_connection_queue_failed_at_index` (`connection`,`queue`,`failed_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `job_batches`
--

DROP TABLE IF EXISTS `job_batches`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `job_batches` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_jobs` int NOT NULL,
  `pending_jobs` int NOT NULL,
  `failed_jobs` int NOT NULL,
  `failed_job_ids` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `options` mediumtext COLLATE utf8mb4_unicode_ci,
  `cancelled_at` int DEFAULT NULL,
  `created_at` int NOT NULL,
  `finished_at` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `job_batches`
--

LOCK TABLES `job_batches` WRITE;
/*!40000 ALTER TABLE `job_batches` DISABLE KEYS */;
/*!40000 ALTER TABLE `job_batches` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `jobs`
--

DROP TABLE IF EXISTS `jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` smallint unsigned NOT NULL,
  `reserved_at` int unsigned DEFAULT NULL,
  `available_at` int unsigned NOT NULL,
  `created_at` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `jobs`
--

LOCK TABLES `jobs` WRITE;
/*!40000 ALTER TABLE `jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (1,'0001_01_01_000000_create_users_table',1),(2,'0001_01_01_000001_create_cache_table',1),(3,'0001_01_01_000002_create_jobs_table',1),(4,'2026_05_15_163938_create_categories_table',1),(5,'2026_05_15_163942_create_products_table',1),(6,'2026_05_16_000001_add_is_admin_to_users_table',1),(7,'2026_05_16_000002_create_settings_table',1),(8,'2026_05_16_062714_add_fulltext_index_to_products',1),(9,'2026_05_16_090702_add_views_to_products',1),(10,'2026_05_16_110058_drop_rating_and_review_count_from_products',1),(11,'2026_05_19_000001_add_weight_to_products',1),(12,'2026_05_19_000002_create_orders_table',1),(13,'2026_05_19_000003_create_order_items_table',1),(14,'2026_05_19_000004_create_payment_banks_table',1),(15,'2026_05_19_000005_create_shipping_costs_table',1),(16,'2026_05_20_000001_add_cost_per_kg_to_shipping_costs',1),(17,'2026_06_05_023857_add_user_id_to_orders_table',2);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_items`
--

DROP TABLE IF EXISTS `order_items`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_items` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` bigint unsigned NOT NULL,
  `product_id` bigint unsigned DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` int unsigned NOT NULL,
  `qty` int unsigned NOT NULL,
  `subtotal` int unsigned NOT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `order_items_order_id_foreign` (`order_id`),
  KEY `order_items_product_id_foreign` (`product_id`),
  CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE,
  CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_items`
--

LOCK TABLES `order_items` WRITE;
/*!40000 ALTER TABLE `order_items` DISABLE KEYS */;
INSERT INTO `order_items` VALUES (1,1,1,'Paket Tari Jaipongan (4 Penari) - Rona Nuswa',1400000,1,1400000,'4 Orang','#D4AF37','2026-06-07 17:32:10','2026-06-07 17:32:10'),(2,2,3,'Paket Tari Jaipongan (6 Penari) - Rona Nuswa',2700000,1,2700000,'6 Orang','#3D2314|Dark Choco','2026-06-07 21:45:57','2026-06-07 21:45:57'),(3,3,9,'Jasa Makeup Wedding / Lamaran Premium',300000,27,8100000,'Premium Look','#3D2314|Luxury Choco','2026-06-07 21:48:26','2026-06-07 21:48:26');
/*!40000 ALTER TABLE `order_items` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned DEFAULT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_cost` int unsigned NOT NULL DEFAULT '0',
  `total_price` int unsigned NOT NULL,
  `grand_total` int unsigned NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'bank_transfer',
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_due_at` timestamp NULL DEFAULT NULL,
  `paid_at` timestamp NULL DEFAULT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `bank_account_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `courier` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `courier_service` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tracking_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `orders_order_number_unique` (`order_number`),
  KEY `orders_user_id_foreign` (`user_id`),
  CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,2,'INV/OYSLTERH','tiara','089216','tiara148@icloud.com','katapang','Bogor (Kota & Kabupaten)',180000,1400000,1580000,'bank_transfer','paid','2026-06-08 17:32:10','2026-06-07 17:37:07','BCA','1234567890','Rona Nuswa','confirmed','JNE','OKE','125478962135',NULL,'2026-06-07 17:32:10','2026-06-07 17:37:07'),(2,2,'INV/PJFLRLME','tiara','0000000','tiara148@icloud.com','[','Bandung (Area Sanggar)',0,2700000,2700000,'midtrans','paid','2026-06-08 21:45:57','2026-06-07 21:51:00',NULL,NULL,NULL,'confirmed',NULL,NULL,NULL,NULL,'2026-06-07 21:45:57','2026-06-07 21:51:00'),(3,2,'INV/9MIS73LD','tiara','99999999','tiara148@icloud.com','p','Bogor (Kota & Kabupaten)',180000,8100000,8280000,'midtrans','paid','2026-06-08 21:48:26','2026-06-07 21:49:04',NULL,NULL,NULL,'confirmed',NULL,NULL,NULL,NULL,'2026-06-07 21:48:26','2026-06-07 21:49:04');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_reset_tokens`
--

DROP TABLE IF EXISTS `password_reset_tokens`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_reset_tokens`
--

LOCK TABLES `password_reset_tokens` WRITE;
/*!40000 ALTER TABLE `password_reset_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_reset_tokens` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payment_banks`
--

DROP TABLE IF EXISTS `payment_banks`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payment_banks` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payment_banks`
--

LOCK TABLES `payment_banks` WRITE;
/*!40000 ALTER TABLE `payment_banks` DISABLE KEYS */;
INSERT INTO `payment_banks` VALUES (1,'BCA','1234567890','Rona Nuswa',1,'2026-06-04 19:27:47','2026-06-04 19:27:47'),(2,'Mandiri','9876543210','Rona Nuswa',1,'2026-06-04 19:27:47','2026-06-04 19:27:47');
/*!40000 ALTER TABLE `payment_banks` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `category_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` int unsigned NOT NULL,
  `sale_price` int unsigned DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `images` json DEFAULT NULL,
  `sizes` json DEFAULT NULL,
  `colors` json DEFAULT NULL,
  `badge` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `weight` int unsigned NOT NULL DEFAULT '0',
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `views` bigint unsigned NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `products_slug_unique` (`slug`),
  KEY `products_category_id_foreign` (`category_id`),
  FULLTEXT KEY `products_name_description_fulltext` (`name`,`description`),
  CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,1,'Paket Tari Jaipongan (4 Penari) - Rona Nuswa','paket-tari-jaipongan-4-penari-rona-nuswa','Layanan tari tradisional Jaipongan oleh Sanggar Rona Nuswa untuk penyambutan tamu, wedding, persembahan pengantin, atau event formal. Durasi tampil 10-20 menit. Harga sudah termasuk kostum dasar.',1400000,NULL,'products/taritradisional.png',NULL,'[\"4 Orang\"]','[{\"hex\": \"#D4AF37\", \"name\": \"Gold\"}, {\"hex\": \"#3D2314\", \"name\": \"Dark Choco\"}]','POPULER',0,0,2,'2026-06-04 19:27:42','2026-06-07 17:29:39'),(2,1,'Paket Tari Jaipongan (5 Penari) - Rona Nuswa','paket-tari-jaipongan-5-penari-rona-nuswa','Layanan pertunjukan tari Jaipongan profesional dengan formasi 5 orang penari dari Sanggar Rona Nuswa. Sangat cocok untuk panggung skala menengah, acara kampus, sekolah, maupun ulang tahun.',2000000,NULL,'products/tariclasik.png',NULL,'[\"5 Orang\"]','[{\"hex\": \"#D4AF37\", \"name\": \"Gold\"}, {\"hex\": \"#3D2314\", \"name\": \"Dark Choco\"}]',NULL,0,0,0,'2026-06-04 19:27:42','2026-06-07 17:25:13'),(3,1,'Paket Tari Jaipongan (6 Penari) - Rona Nuswa','paket-tari-jaipongan-6-penari-rona-nuswa','Formasi maksimal 6 penari dari Sanggar Rona Nuswa untuk pertunjukan grand opening, wedding megah, atau acara formal kenegaraan. Penampilan kolosal, dinamis, dan memukau.',2700000,NULL,'products/tariclasicmodern.jpeg',NULL,'[\"6 Orang\"]','[{\"hex\": \"#D4AF37\", \"name\": \"Gold\"}, {\"hex\": \"#3D2314\", \"name\": \"Dark Choco\"}]',NULL,0,0,1,'2026-06-04 19:27:42','2026-06-07 17:25:13'),(4,2,'Sewa Kostum Jaipong Klasik / Modern','sewa-kostum-jaipong-klasik-modern','Koleksi kostum Sanggar Rona Nuswa. Pilihan varian: Kostum Jaipong Merah, Hitam Emas, atau Sunda Modern. Ketentuan: Masa sewa 1 hari, wajib kembali tepat waktu dalam kondisi baik.',100000,NULL,'products/KOstum1.png',NULL,'[\"S\", \"M\", \"L\", \"XL\"]','[{\"hex\": \"#3D2314\", \"name\": \"Hitam Emas / Dark Choco\"}, {\"hex\": \"#D4AF37\", \"name\": \"Gold Premium\"}]','RENT',500,0,0,'2026-06-04 19:27:42','2026-06-07 17:25:13'),(5,2,'Sewa Kebaya Wisuda / Event / Lamaran','sewa-kebaya-wisuda-event-lamaran','Kebaya anggun koleksi Rona Nuswa untuk acara wisuda, lamaran, event formal, atau acara keluarga. Harga sewa per hari. Wajib tepat waktu dan tidak menerima unit dengan kerusakan berat.',100000,NULL,'products/img5.png',NULL,'[\"M\", \"L\", \"XL\"]','[{\"hex\": \"#D4AF37\", \"name\": \"Gold Matte\"}, {\"hex\": \"#3D2314\", \"name\": \"Dark Choco\"}]','BEST',400,0,0,'2026-06-04 19:27:42','2026-06-04 21:09:14'),(6,2,'Sewa Aksesoris Tari & Headpiece','sewa-aksesoris-tari-headpiece','Sewa pelengkap penampilan panggung Rona Nuswa. Pilihan item: Mahkota/Headpiece (Rp30k), Selendang (Rp25k), atau Perhiasan Tari Tradisional lengkap (Rp30k - Rp50k).',50000,25000,'products/Kostum2.png',NULL,'[\"All Size\"]','[{\"hex\": \"#D4AF37\", \"name\": \"Gold Kencana\"}, {\"hex\": \"#3D2314\", \"name\": \"Choco Classic\"}]','ADD-ON',100,0,0,'2026-06-04 19:27:42','2026-06-07 17:25:13'),(7,3,'Jasa Makeup Tari / Panggung Professional','jasa-makeup-tari-panggung-professional','Karakter makeup bold/panggung dari MUA Rona Nuswa yang disesuaikan dengan tema tarian. Sudah termasuk bulu mata basic dan produk berkualitas tinggi tahan keringat.',100000,NULL,'products/makeuptari.png',NULL,'[\"Professional\"]','[{\"hex\": \"#D4AF37\", \"name\": \"Gold Look\"}, {\"hex\": \"#3D2314\", \"name\": \"Choco Bold\"}]','SERVICE',0,0,2,'2026-06-04 19:27:42','2026-06-07 17:58:37'),(8,3,'Jasa Makeup Wisuda / Formal Event','jasa-makeup-wisuda-formal-event','Makeup dengan look natural atau semi-glam oleh tim Rona Nuswa, sangat cocok untuk momen wisuda, menghadiri pesta, ataupun acara formal kenegaraan.',150000,NULL,'products/makeupwisuda.png',NULL,'[\"Semi-Glam\"]','[{\"hex\": \"#D4AF37\", \"name\": \"Gold Elegant\"}, {\"hex\": \"#3D2314\", \"name\": \"Choco Nude\"}]','SERVICE',0,0,0,'2026-06-04 19:27:42','2026-06-07 17:25:13'),(9,3,'Jasa Makeup Wedding / Lamaran Premium','jasa-makeup-wedding-lamaran-premium','Makeup pengantin premium dan eksklusif Rona Nuswa. Sudah termasuk basic hair styling atau hijab styling sederhana yang disesuaikan dengan kebutuhan dan adat acara.',700000,300000,'products/makeup.png',NULL,'[\"Premium Look\"]','[{\"hex\": \"#D4AF37\", \"name\": \"Royal Gold\"}, {\"hex\": \"#3D2314\", \"name\": \"Luxury Choco\"}]','PREMIUM',0,0,0,'2026-06-04 19:27:42','2026-06-07 17:25:13'),(10,4,'SPP Bulanan Kelas Tari - Anak-Anak','spp-bulanan-kelas-tari-anak-anak','Kelas latihan sanggar tari Rona Nuswa khusus kategori anak-anak. Jadwal latihan 2x seminggu (Pilihan: Rabu & Sabtu / Sabtu & Minggu). Pendaftaran online atau datang langsung.',150000,NULL,'products/tarikontemporer.png',NULL,'[\"2x Seminggu\"]','[{\"hex\": \"#D4AF37\", \"name\": \"Rona Gold\"}]','SANGGAR',0,0,0,'2026-06-04 19:27:42','2026-06-07 17:25:13'),(11,4,'SPP Bulanan Kelas Tari - Remaja','spp-bulanan-kelas-tari-remaja','Kelas sanggar tari intensif Rona Nuswa untuk kategori remaja. Mengajarkan teknik dasar hingga koreografi jaipongan panggung yang dinamis. Latihan reguler 2x dalam seminggu.',200000,NULL,'products/kostum3.png',NULL,'[\"2x Seminggu\"]','[{\"hex\": \"#3D2314\", \"name\": \"Nuswa Choco\"}]','SANGGAR',0,0,0,'2026-06-04 19:27:42','2026-06-07 17:25:14'),(12,4,'SPP Bulanan Kelas Tari - Dewasa','spp-bulanan-kelas-tari-dewasa','Kelas tari Jaipongan dan seni panggung bagi usia dewasa di Sanggar Rona Nuswa. Sangat bagus untuk kebugaran fisik sekaligus melestarikan khazanah budaya luhur.',250000,NULL,'products/dashboard.png',NULL,'[\"2x Seminggu\"]','[{\"hex\": \"#D4AF37\", \"name\": \"Rona Gold\"}, {\"hex\": \"#3D2314\", \"name\": \"Nuswa Choco\"}]','SANGGAR',0,0,0,'2026-06-04 19:27:42','2026-06-07 17:25:14'),(13,5,'Wedding Paket Silver - Rona Nuswa','wedding-paket-silver-rona-nuswa','Terima Beres Paket Silver meliputi: Dekorasi sederhana (backdrop + bunga basic), Makeup pengantin, Tari Jaipongan 4 penari, Kostum tari premium, dan Dokumentasi foto sederhana.',3500000,NULL,'products/paketsilver.png',NULL,'[\"Paket Terima Beres\"]','[{\"hex\": \"#D4AF37\", \"name\": \"Gold Decoration\"}, {\"hex\": \"#3D2314\", \"name\": \"Choco Accent\"}]','SILVER',0,0,0,'2026-06-04 19:27:42','2026-06-07 17:25:14'),(14,5,'Wedding Paket Gold - Rona Nuswa','wedding-paket-gold-rona-nuswa','Terima Beres Paket Gold meliputi: Dekorasi pelaminan lebih lengkap, Makeup pengantin, Tari Jaipongan 4-5 penari + Kostum, MC / entertainment sederhana, serta Dokumentasi foto & video basic.',6000000,NULL,'products/paketgold.png',NULL,'[\"Paket Terima Beres\"]','[{\"hex\": \"#D4AF37\", \"name\": \"Gold Theme\"}, {\"hex\": \"#3D2314\", \"name\": \"Dark Choco Theme\"}]','RECOMMENDED',0,0,0,'2026-06-04 19:27:42','2026-06-07 17:25:14'),(15,5,'Wedding Paket Premium All-In (Rona Nuswa)','wedding-paket-premium-all-in-rona-nuswa','Paket Premium All-In: Dekorasi wedding penuh, Makeup pengantin + keluarga inti, Tari Jaipongan 5-6 penari + kostum, MC, Live Music/Entertainment (bisa upgrade guest star), Dokumentasi foto video profesional, Tim WO lapangan, & Sound system.',12000000,NULL,'products/paket premium.png',NULL,'[\"All-In Event\"]','[{\"hex\": \"#D4AF37\", \"name\": \"Royal Gold Luxury\"}, {\"hex\": \"#3D2314\", \"name\": \"Dark Choco Exclusive\"}]','PREMIUM',0,0,0,'2026-06-04 19:27:42','2026-06-07 17:25:14');
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sessions`
--

DROP TABLE IF EXISTS `sessions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sessions`
--

LOCK TABLES `sessions` WRITE;
/*!40000 ALTER TABLE `sessions` DISABLE KEYS */;
INSERT INTO `sessions` VALUES ('LTW66SnfbBH9zaxKol455fKzssmhcPSAZ31aAzHy',1,'127.0.0.1','Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/148.0.0.0 Safari/537.36','eyJfdG9rZW4iOiJXWDZ4RlBQaTdZeGhoYUxrU3FVU1BwRU5mdHNmYWRTQ1BIZWdDb1dmIiwiX2ZsYXNoIjp7Im5ldyI6W10sIm9sZCI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvMTI3LjAuMC4xOjgwMDBcL2FkbWluXC9hcHBlYXJhbmNlIiwicm91dGUiOiJhZG1pbi5hcHBlYXJhbmNlIn0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjoxfQ==',1780894270);
/*!40000 ALTER TABLE `sessions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `value` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `settings_key_unique` (`key`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'wa_number','6280000000000','2026-06-04 19:27:47','2026-06-04 19:27:47'),(2,'brand_name','Rona Nuswa','2026-06-04 19:27:47','2026-06-04 19:27:47'),(3,'color_gold','#D4AF37','2026-06-04 19:27:47','2026-06-04 19:27:47'),(4,'color_accent','#3D2314','2026-06-04 19:27:47','2026-06-04 19:27:47'),(5,'social_instagram',NULL,'2026-06-04 19:27:47','2026-06-04 19:27:47'),(6,'social_facebook',NULL,'2026-06-04 19:27:47','2026-06-04 19:27:47'),(7,'social_tiktok',NULL,'2026-06-04 19:27:47','2026-06-04 19:27:47'),(8,'flash_sale_ends_at','2026-06-05T23:59','2026-06-04 19:27:47','2026-06-04 19:27:47'),(9,'site_title','Rona Nuswa','2026-06-04 19:27:47','2026-06-04 19:27:47'),(10,'site_description','Sanggar Seni Rona Nuswa - Jasa Tari Jaipongan profesional, persewaan kostum tradisional, makeup panggung/wedding, dan kelas tari interaktif.','2026-06-04 19:27:47','2026-06-04 19:27:47'),(11,'hero_title','Rona Nuswa<br>Seni Tari & Entertainment','2026-06-04 19:27:47','2026-06-04 19:27:47'),(12,'hero_subtitle','Menyediakan pertunjukan tari Jaipongan kolosal, sewa kostum/kebaya premium, layanan makeup professional, serta paket wedding entertainment terima beres.','2026-06-04 19:27:47','2026-06-04 19:27:47'),(13,'banner_title','Pementasan Seni & Layanan Profesional','2026-06-04 19:27:47','2026-06-04 19:27:47'),(14,'banner_text','Sajikan keindahan budaya tradisional di setiap momen berhargamu bersama tim penari dan pengisi acara berpengalaman dari Sanggar Rona Nuswa.','2026-06-04 19:27:47','2026-06-04 19:27:47'),(15,'cta_text','Booking Sekarang ΓåÆ','2026-06-04 19:27:47','2026-06-04 19:27:47'),(16,'cta_link','/products','2026-06-04 19:27:47','2026-06-04 19:27:47'),(17,'store_location','Bandung','2026-06-04 19:27:47','2026-06-04 19:27:47'),(18,'banner_button','Lihat Layanan Kami','2026-06-04 19:27:47','2026-06-04 19:27:47'),(19,'banner_link','/products','2026-06-04 19:27:47','2026-06-04 19:27:47'),(20,'cara_belanja_content','<p>Berikut adalah langkah-langkah mudah untuk melakukan booking layanan atau mendaftar kelas di Rona Nuswa.</p>\n<hr>\n<ol>\n<li>\n<h3>Pilih Layanan atau Paket</h3>\n<p>Jelajahi pilihan paket pertunjukan tari, sewa kostum, jasa makeup, atau kelas sanggar di halaman <a href=\"/products\">Layanan</a>. Kamu bisa memfilter pencarian berdasarkan kategori.</p>\n</li>\n<li>\n<h3>Tentukan Ketentuan & Kebutuhan</h3>\n<p>Pilih jumlah formasi penari, tipe makeup, jadwal latihan sanggar, atau paket wedding yang diinginkan sesuai spesifikasi kebutuhan acaramu.</p>\n</li>\n<li>\n<h3>Masukkan ke Keranjang Acara</h3>\n<p>Klik tombol \"Tambah ke Keranjang\" untuk menyimpan daftar pilihan pemesanan layananmu. Kamu bisa menggabungkan beberapa jasa sekaligus (misal: Tari + Jasa Makeup).</p>\n</li>\n<li>\n<h3>Checkout Jadwal</h3>\n<p>Tentukan tanggal pementasan, tanggal sewa kostum, atau pilihan pendaftaran sanggar. Masukkan detail informasi alamat lokasi acara secara lengkap sebelum memproses order.</p>\n</li>\n<li>\n<h3>Pembayaran & Konfirmasi</h3>\n<p>Lakukan pembayaran DP atau pelunasan sesuai instruksi sistem melalui transfer bank. Tim admin Rona Nuswa akan segera memvalidasi jadwal dan persiapan properti panggung.</p>\n</li>\n<li>\n<h3>Pementasan & Pengembalian</h3>\n<p>Untuk sewa kostum, ambil unit tepat waktu. Untuk pertunjukan wedding, tim dekorasi, MUA, dan penari kami akan tiba di lokasi sesuai kesepakatan jadwal.</p>\n</li>\n</ol>\n<hr>\n<p>Butuh konsultasi konsep acara khusus? Hubungi manajemen Rona Nuswa via WhatsApp untuk bantuan langsung.</p>','2026-06-04 19:27:47','2026-06-04 19:27:47'),(21,'about_content','\n<h3>Visi Kami</h3>\n<p>Menjadi pusat pelestarian dan pengembangan seni tari tradisional Nusantara yang adaptif, profesional, serta tepercaya dalam menghadirkan kemewahan hiburan kebudayaan di era modern.</p>\n<h3>Misi Kami</h3>\n<ul>\n<li>Menyajikan pertunjukan seni tari Jaipongan berkualitas tinggi dengan koreografi dinamis yang memukau.</li>\n<li>Menyediakan fasilitas persewaan kostum tradisional dan kebaya formal yang terawat, anggun, dan lengkap.</li>\n<li>Mengembangkan bakat seni generasi muda melalui bimbingan sanggar latihan yang terstruktur dan interaktif.</li>\n<li>Memberikan solusi manajemen hiburan pernikahan (wedding entertainment) yang praktis, komprehensif, dan bernilai seni tinggi.</li>\n</ul>\n<hr>\n<h3>Mengapa Memilih Rona Nuswa?</h3>\n<ul>\n<li>Penari & Artis Profesional: Seluruh penari dan pengisi acara kami telah melewati pelatihan intensif panggung.</li>\n<li>Paket Terima Beres: Solusi lengkap mulai dari dekorasi, busana, tata rias wajah, tata suara (sound system), hingga MC acara.</li>\n<li>Pelayanan Fleksibel: Manajemen kami siap menyesuaikan koreografi pertunjukan dan konsep tata rias dengan tema besar hajatan Anda.</li>\n</ul>\n','2026-06-04 19:27:47','2026-06-04 19:27:47'),(22,'hero_image','products/tariclasicmodern.jpeg','2026-06-07 17:39:33','2026-06-07 17:42:51');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shipping_costs`
--

DROP TABLE IF EXISTS `shipping_costs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shipping_costs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `city_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` int unsigned NOT NULL,
  `cost_per_kg` int unsigned DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shipping_costs`
--

LOCK TABLES `shipping_costs` WRITE;
/*!40000 ALTER TABLE `shipping_costs` DISABLE KEYS */;
INSERT INTO `shipping_costs` VALUES (1,'Bandung (Area Sanggar)',0,0,1,'2026-06-04 19:27:47','2026-06-04 19:27:47'),(2,'Kab. Bandung / Cimahi',50000,3000,1,'2026-06-04 19:27:47','2026-06-04 19:27:47'),(3,'Jakarta Pusat',150000,10000,1,'2026-06-04 19:27:47','2026-06-04 19:27:47'),(4,'Jakarta Selatan & Timur',160000,10000,1,'2026-06-04 19:27:47','2026-06-04 19:27:47'),(5,'Jakarta Barat & Utara',170000,10000,1,'2026-06-04 19:27:47','2026-06-04 19:27:47'),(6,'Bogor (Kota & Kabupaten)',180000,12000,1,'2026-06-04 19:27:47','2026-06-04 19:27:47'),(7,'Depok & Bekasi',150000,10000,1,'2026-06-04 19:27:47','2026-06-04 19:27:47'),(8,'Tangerang (Kota & Tangsel)',190000,12000,1,'2026-06-04 19:27:47','2026-06-04 19:27:47');
/*!40000 ALTER TABLE `shipping_costs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_admin` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Admin','admin@ronanuswa.test','2026-06-04 19:27:47','$2y$12$YZrX6JfhSufBLBzYILLD5eFcJUk95ANmP0FfK.mQ8kkxaGS/r1Aaa','HKPTcgI11NmWdF5gElI0rrrdOVny1waPb2RPvIpIcFi5vAKJLTQnKFc6pwXm',1,'2026-06-04 19:27:47','2026-06-04 19:27:47'),(2,'tiara','tiara148@icloud.com',NULL,'$2y$12$Di4HxW7Pb.jkrLr8I7/oz.lE6sCX2yuw3/weufIk7zcjkWcRVuwqC',NULL,0,'2026-06-07 17:31:12','2026-06-07 17:31:12');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2026-06-08 13:28:29
