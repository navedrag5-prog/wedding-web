-- SQL schema untuk Arunika Wedding
-- Nama database: arunika_wedding

CREATE DATABASE IF NOT EXISTS `arunika_wedding` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `arunika_wedding`;

-- Tabel pengaturan situs
DROP TABLE IF EXISTS `settings`;
CREATE TABLE `settings` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `site_title` VARCHAR(255) DEFAULT 'Arunika Wedding',
  `theme` VARCHAR(50) DEFAULT 'gold-white',
  `phone_wa` VARCHAR(32) DEFAULT '+6281234567890',
  `currency` VARCHAR(10) DEFAULT 'IDR',
  `updated_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `settings` (`site_title`,`theme`,`phone_wa`,`currency`)
VALUES ('Arunika Wedding','gold-white','+6281234567890','IDR');

-- Tabel paket wedding
DROP TABLE IF EXISTS `packages`;
CREATE TABLE `packages` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(150) NOT NULL,
  `price` DECIMAL(14,2) NOT NULL DEFAULT 0,
  `short_description` VARCHAR(255),
  `long_description` TEXT,
  `is_active` TINYINT(1) NOT NULL DEFAULT 1,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX (`is_active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- contoh data paket
INSERT INTO `packages` (`name`,`price`,`short_description`,`long_description`) VALUES
('Paket Rose', 10000000.00, 'Intimate wedding, dekor sederhana, fotografer 4 jam.', 'Paket Rose cocok untuk acara kecil, termasuk dekor minimalis dan dokumentasi 4 jam.'),
('Paket Lily', 25000000.00, 'Konsep penuh, rias, dekor, dokumentasi lengkap.', 'Paket Lily meliputi perencanaan penuh, rias pengantin, dekor, dan dokumentasi lengkap.'),
('Paket Arunika', 45000000.00, 'All-in package: venue, catering, entertainment, dan dokumentasi.', 'Paket Arunika adalah paket premium all-in untuk pengalaman pernikahan lengkap.');

-- Tabel portfolio / galeri
DROP TABLE IF EXISTS `portfolio`;
CREATE TABLE `portfolio` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(150),
  `image` VARCHAR(255),
  `caption` VARCHAR(255),
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `portfolio` (`title`,`image`,`caption`) VALUES
('Elegant Ceremony','assets/images/portfolio1.jpg','Elegant Ceremony'),
('Reception Decor','assets/images/portfolio2.jpg','Reception Decor'),
('Couple Portrait','assets/images/portfolio3.jpg','Couple Portrait');

-- Tabel testimoni
DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE `testimonials` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `author` VARCHAR(120),
  `content` TEXT,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `testimonials` (`author`,`content`) VALUES
('Siti','Pelayanan ramah dan hasilnya luar biasa.'),
('Budi','Dekor sempurna, tamu terkesan.'),
('Lina','Koordinasi mudah dan profesional.');

-- Tabel kontak / pesan masuk
DROP TABLE IF EXISTS `contacts`;
CREATE TABLE `contacts` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(150),
  `email` VARCHAR(150),
  `phone` VARCHAR(32),
  `message` TEXT,
  `created_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  INDEX (`email`),
  INDEX (`phone`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Contoh entri kontak (opsional)
INSERT INTO `contacts` (`name`,`email`,`phone`,`message`) VALUES
('Andi','andi@example.com','081234567890','Halo, saya ingin informasi paket Arunika.');

-- (Opsional) Tabel halaman statis
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `slug` VARCHAR(100) NOT NULL,
  `title` VARCHAR(200),
  `content` TEXT,
  `updated_at` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY (`slug`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `pages` (`slug`,`title`,`content`) VALUES
('about','Tentang Arunika Wedding','Arunika Wedding adalah layanan perencana pernikahan yang mengutamakan estetika dan pengalaman tamu...'),
('services','Paket & Layanan','Daftar paket tersedia: Paket Rose, Paket Lily, Paket Arunika...');

-- Selesai
