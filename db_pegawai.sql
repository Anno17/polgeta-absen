-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_pegawai
CREATE DATABASE IF NOT EXISTS `db_pegawai` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_pegawai`;

-- Dumping structure for table db_pegawai.absen
CREATE TABLE IF NOT EXISTS `absen` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode_pegawai` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT '0',
  `keterangan_id` int NOT NULL DEFAULT '0',
  `tanggal` date DEFAULT NULL,
  `jam_masuk` time DEFAULT NULL,
  `jam_keluar` time DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `kode_pegawai_tanggal_unique` (`kode_pegawai`,`tanggal`),
  KEY `FK_absen_keterangan` (`keterangan_id`) USING BTREE,
  KEY `FK_absen_pegawai` (`kode_pegawai`) USING BTREE,
  CONSTRAINT `FK_absen_keterangan` FOREIGN KEY (`keterangan_id`) REFERENCES `keterangan` (`id`),
  CONSTRAINT `FK_absen_pegawai` FOREIGN KEY (`kode_pegawai`) REFERENCES `pegawai` (`kode`)
) ENGINE=InnoDB AUTO_INCREMENT=37 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_pegawai.absen: ~0 rows (approximately)
REPLACE INTO `absen` (`id`, `kode_pegawai`, `keterangan_id`, `tanggal`, `jam_masuk`, `jam_keluar`) VALUES
	(35, 'k001', 1, '2023-11-17', '06:30:28', '13:40:56'),
	(36, 'k001', 1, '2023-11-18', '13:40:56', '13:40:56');

-- Dumping structure for table db_pegawai.bpjs
CREATE TABLE IF NOT EXISTS `bpjs` (
  `id` int NOT NULL DEFAULT '1',
  `potongan` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_pegawai.bpjs: ~0 rows (approximately)
REPLACE INTO `bpjs` (`id`, `potongan`) VALUES
	(1, 0.02);

-- Dumping structure for table db_pegawai.gaji
CREATE TABLE IF NOT EXISTS `gaji` (
  `id` int NOT NULL AUTO_INCREMENT,
  `jabatan_id` int NOT NULL DEFAULT '0',
  `gaji_perhari` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `FK_gaji_jabatan` (`jabatan_id`),
  CONSTRAINT `FK_gaji_jabatan` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_pegawai.gaji: ~2 rows (approximately)
REPLACE INTO `gaji` (`id`, `jabatan_id`, `gaji_perhari`) VALUES
	(1, 1, 100000),
	(2, 2, 200000);

-- Dumping structure for table db_pegawai.jabatan
CREATE TABLE IF NOT EXISTS `jabatan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL DEFAULT '0',
  `penambahan` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_pegawai.jabatan: ~2 rows (approximately)
REPLACE INTO `jabatan` (`id`, `nama`, `penambahan`) VALUES
	(1, 'Staff', NULL),
	(2, 'Manager', NULL);

-- Dumping structure for table db_pegawai.keterangan
CREATE TABLE IF NOT EXISTS `keterangan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_pegawai.keterangan: ~3 rows (approximately)
REPLACE INTO `keterangan` (`id`, `nama`) VALUES
	(1, 'hadir'),
	(2, 'tidak hadir'),
	(3, 'sakit');

-- Dumping structure for table db_pegawai.pegawai
CREATE TABLE IF NOT EXISTS `pegawai` (
  `id` int NOT NULL AUTO_INCREMENT,
  `kode` varchar(50) NOT NULL DEFAULT '0',
  `nama` char(50) NOT NULL DEFAULT '0',
  `jenis_kelamin` char(50) NOT NULL DEFAULT '0',
  `alamat` text NOT NULL,
  `pendidikan_id` int NOT NULL DEFAULT '0',
  `jabatan_id` int NOT NULL DEFAULT '0',
  PRIMARY KEY (`kode`) USING BTREE,
  UNIQUE KEY `unique` (`id`) USING BTREE,
  KEY `FK_pegawai_pendidikan` (`pendidikan_id`),
  KEY `FK_pegawai_jabatan` (`jabatan_id`),
  CONSTRAINT `FK_pegawai_jabatan` FOREIGN KEY (`jabatan_id`) REFERENCES `jabatan` (`id`),
  CONSTRAINT `FK_pegawai_pendidikan` FOREIGN KEY (`pendidikan_id`) REFERENCES `pendidikan` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_pegawai.pegawai: ~1 rows (approximately)
REPLACE INTO `pegawai` (`id`, `kode`, `nama`, `jenis_kelamin`, `alamat`, `pendidikan_id`, `jabatan_id`) VALUES
	(4, 'k001', 'jaka', 'L', 'Dago', 1, 1);

-- Dumping structure for table db_pegawai.pendidikan
CREATE TABLE IF NOT EXISTS `pendidikan` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nama` varchar(50) NOT NULL DEFAULT '0',
  `penambahan` decimal(10,2) NOT NULL DEFAULT '0.00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table db_pegawai.pendidikan: ~2 rows (approximately)
REPLACE INTO `pendidikan` (`id`, `nama`, `penambahan`) VALUES
	(1, 'SMA (Sederajat)', 0.05),
	(2, 'S1', 0.10);

-- Dumping structure for procedure db_pegawai.sp_gaji_total
DELIMITER //
CREATE PROCEDURE `sp_gaji_total`()
BEGIN
SELECT
    YEAR(`absen`.`tanggal`) AS `tahun`,
    MONTH(`absen`.`tanggal`) AS `bulan`,
    `pegawai`.`id` AS `id_pegawai`,
    `pegawai`.`kode` AS `kode_pegawai`,
    `pegawai`.`nama` AS `nama_pegawai`,
    `pegawai`.`jenis_kelamin` AS `jenis_kelamin`,
    `pegawai`.`pendidikan_id` AS `pendidikan_id`,
    `pendidikan`.`nama` AS `nama_pendidikan`,
    `pegawai`.`jabatan_id` AS `jabatan_id`,
    `jabatan`.`nama` AS `nama_jabatan`,
    SUM(CASE WHEN `absen`.`keterangan_id` = 1 THEN 1 ELSE 0 END) AS `total_hadir`,
    SUM(CASE WHEN `absen`.`keterangan_id` = 2 THEN 1 ELSE 0 END) AS `total_tidakhadir`,
    SUM(CASE WHEN `absen`.`keterangan_id` = 3 THEN 1 ELSE 0 END) AS `total_sakit`,
    `gaji`.`gaji_perhari` AS `gaji_perhari`,
    `pendidikan`.`penambahan` AS `penambahan`,
    `bpjs`.`potongan` AS `potongan_bpjs`,
    CAST(((((sum((case when (`absen`.`keterangan_id` = 1) then 1 else 0 end)) * `gaji`.`gaji_perhari`) * `pendidikan`.`penambahan`) + (sum((case when (`absen`.`keterangan_id` = 1) then 1 else 0 end)) * `gaji`.`gaji_perhari`)) - ((((sum((case when (`absen`.`keterangan_id` = 1) then 1 else 0 end)) * `gaji`.`gaji_perhari`) * `pendidikan`.`penambahan`) + (sum((case when (`absen`.`keterangan_id` = 1) then 1 else 0 end)) * `gaji`.`gaji_perhari`)) * `bpjs`.`potongan`)) AS signed) AS `total_gaji`,
	 CAST(((((sum((case when (`absen`.`keterangan_id` = 1) then 1 else 0 end)) * `gaji`.`gaji_perhari`) * `pendidikan`.`penambahan`) + (sum((case when (`absen`.`keterangan_id` = 1) then 1 else 0 end)) * `gaji`.`gaji_perhari`)) * `bpjs`.`potongan`) AS signed) AS `potongan_gaji`,
	 CAST(((sum((case when (`absen`.`keterangan_id` = 1) then 1 else 0 end)) * `gaji`.`gaji_perhari`) * `pendidikan`.`penambahan`) AS signed) AS `plus_gaji` 
FROM
    `pegawai`
LEFT JOIN
    `jabatan` ON (`jabatan`.`id` = `pegawai`.`jabatan_id`)
LEFT JOIN
    `pendidikan` ON (`pendidikan`.`id` = `pegawai`.`pendidikan_id`)
LEFT JOIN
    `gaji` ON (`gaji`.`jabatan_id` = `pegawai`.`jabatan_id`)
LEFT JOIN
    `absen` ON (`absen`.`kode_pegawai` = `pegawai`.`kode`)
LEFT JOIN
    `keterangan` ON (`keterangan`.`id` = `absen`.`keterangan_id`)
LEFT JOIN
    `bpjs` ON (0 <> 1)
GROUP BY
    YEAR(`absen`.`tanggal`),
    MONTH(`absen`.`tanggal`),
    `pegawai`.`id`;

END//
DELIMITER ;

-- Dumping structure for view db_pegawai.vw_absen
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_absen` (
	`id` INT(10) NOT NULL,
	`kode_pegawai` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`nama_pegawai` CHAR(50) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`keterangan_id` INT(10) NOT NULL,
	`keterangan` VARCHAR(50) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`tanggal_absen` DATE NULL,
	`jam_masuk` TIME NULL,
	`jam_keluar` TIME NULL
) ENGINE=MyISAM;

-- Dumping structure for procedure db_pegawai.vw_gaji_total
DELIMITER //
CREATE PROCEDURE `vw_gaji_total`()
BEGIN
SELECT
    YEAR(absen.tanggal) AS tahun,
    MONTH(absen.tanggal) AS bulan,
    pegawai.id AS id_pegawai,
    pegawai.kode AS kode_pegawai,
    pegawai.nama AS nama_pegawai,
    pegawai.jenis_kelamin AS jenis_kelamin,
    pegawai.pendidikan_id AS pendidikan_id,
    pendidikan.nama AS nama_pendidikan,
    pegawai.jabatan_id AS jabatan_id,
    jabatan.nama AS nama_jabatan,
    SUM(CASE WHEN absen.keterangan_id = 1 THEN 1 ELSE 0 END) AS total_hadir,
    SUM(CASE WHEN absen.keterangan_id = 2 THEN 1 ELSE 0 END) AS total_tidakhadir,
    SUM(CASE WHEN absen.keterangan_id = 3 THEN 1 ELSE 0 END) AS total_sakit,
    ANY_VALUE(gaji.gaji_perhari) AS gaji_perhari,
    gaji.gaji_perhari AS gaji_perhari,
    pendidikan.penambahan AS penambahan,
    bpjs.potongan AS potongan_bpjs,
    (
        (SUM(CASE WHEN absen.keterangan_id = 1 THEN 1 ELSE 0 END) * gaji.gaji_perhari * pendidikan.penambahan)
        + (SUM(CASE WHEN absen.keterangan_id = 1 THEN 1 ELSE 0 END) * gaji.gaji_perhari)
    ) AS total_gaji_hadir,
    (
        SUM(CASE WHEN absen.keterangan_id = 1 THEN 1 ELSE 0 END) * gaji.gaji_perhari * bpjs.potongan
    ) AS potongan_gaji,
    (
        SUM(CASE WHEN absen.keterangan_id = 1 THEN 1 ELSE 0 END) * gaji.gaji_perhari * pendidikan.penambahan
    ) AS plus_gaji
FROM                    
   pegawai
   LEFT JOIN jabatan ON (jabatan.id = pegawai.jabatan_id)                    
   LEFT JOIN pendidikan ON (pendidikan.id = pegawai.pendidikan_id)             
   LEFT JOIN gaji ON (gaji.jabatan_id = pegawai.jabatan_id)
   LEFT JOIN absen ON (absen.kode_pegawai = pegawai.kode)
	LEFT JOIN keterangan ON (keterangan.id = absen.keterangan_id)
	LEFT JOIN bpjs ON 0 <> 1
GROUP BY
    YEAR(absen.tanggal),
    MONTH(absen.tanggal),
    pegawai.id;

END//
DELIMITER ;

-- Dumping structure for view db_pegawai.vw_gaji_total
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_gaji_total` (
	`tahun` INT(10) NULL,
	`bulan` INT(10) NULL,
	`id_pegawai` INT(10) NOT NULL,
	`kode_pegawai` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`nama_pegawai` CHAR(50) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`jenis_kelamin` CHAR(50) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`pendidikan_id` INT(10) NOT NULL,
	`nama_pendidikan` VARCHAR(50) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`jabatan_id` INT(10) NOT NULL,
	`nama_jabatan` VARCHAR(50) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`total_hadir` DECIMAL(23,0) NULL,
	`total_tidakhadir` DECIMAL(23,0) NULL,
	`total_sakit` DECIMAL(23,0) NULL,
	`gaji_perhari` INT(10) NULL,
	`penambahan` DECIMAL(10,2) NULL,
	`potongan_bpjs` DECIMAL(10,2) NULL,
	`total_gaji` DECIMAL(55,4) NULL,
	`potongan_gaji` DECIMAL(54,4) NULL,
	`plus_gaji` DECIMAL(43,2) NULL
) ENGINE=MyISAM;

-- Dumping structure for view db_pegawai.vw_pegawai
-- Creating temporary table to overcome VIEW dependency errors
CREATE TABLE `vw_pegawai` (
	`id_pegawai` INT(10) NOT NULL,
	`kode_pegawai` VARCHAR(50) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`nama_pegawai` CHAR(50) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`jenis_kelamin` CHAR(50) NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`alamat` TEXT NOT NULL COLLATE 'utf8mb4_0900_ai_ci',
	`pendidikan_id` INT(10) NOT NULL,
	`nama_pendidikan` VARCHAR(50) NULL COLLATE 'utf8mb4_0900_ai_ci',
	`jabatan_id` INT(10) NOT NULL,
	`nama_jabatan` VARCHAR(50) NULL COLLATE 'utf8mb4_0900_ai_ci'
) ENGINE=MyISAM;

-- Dumping structure for view db_pegawai.vw_absen
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_absen`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vw_absen` AS select `absen`.`id` AS `id`,`absen`.`kode_pegawai` AS `kode_pegawai`,`pegawai`.`nama` AS `nama_pegawai`,`absen`.`keterangan_id` AS `keterangan_id`,`keterangan`.`nama` AS `keterangan`,`absen`.`tanggal` AS `tanggal_absen`,`absen`.`jam_masuk` AS `jam_masuk`,`absen`.`jam_keluar` AS `jam_keluar` from ((`absen` left join `pegawai` on((`pegawai`.`kode` = `absen`.`kode_pegawai`))) left join `keterangan` on((`keterangan`.`id` = `absen`.`keterangan_id`)));

-- Dumping structure for view db_pegawai.vw_gaji_total
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_gaji_total`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vw_gaji_total` AS select year(`absen`.`tanggal`) AS `tahun`,month(`absen`.`tanggal`) AS `bulan`,`pegawai`.`id` AS `id_pegawai`,`pegawai`.`kode` AS `kode_pegawai`,`pegawai`.`nama` AS `nama_pegawai`,`pegawai`.`jenis_kelamin` AS `jenis_kelamin`,`pegawai`.`pendidikan_id` AS `pendidikan_id`,`pendidikan`.`nama` AS `nama_pendidikan`,`pegawai`.`jabatan_id` AS `jabatan_id`,`jabatan`.`nama` AS `nama_jabatan`,sum((case when (`absen`.`keterangan_id` = 1) then 1 else 0 end)) AS `total_hadir`,sum((case when (`absen`.`keterangan_id` = 2) then 1 else 0 end)) AS `total_tidakhadir`,sum((case when (`absen`.`keterangan_id` = 3) then 1 else 0 end)) AS `total_sakit`,`gaji`.`gaji_perhari` AS `gaji_perhari`,`pendidikan`.`penambahan` AS `penambahan`,`bpjs`.`potongan` AS `potongan_bpjs`,((((sum((case when (`absen`.`keterangan_id` = 1) then 1 else 0 end)) * `gaji`.`gaji_perhari`) * `pendidikan`.`penambahan`) + (sum((case when (`absen`.`keterangan_id` = 1) then 1 else 0 end)) * `gaji`.`gaji_perhari`)) - ((((sum((case when (`absen`.`keterangan_id` = 1) then 1 else 0 end)) * `gaji`.`gaji_perhari`) * `pendidikan`.`penambahan`) + (sum((case when (`absen`.`keterangan_id` = 1) then 1 else 0 end)) * `gaji`.`gaji_perhari`)) * `bpjs`.`potongan`)) AS `total_gaji`,((((sum((case when (`absen`.`keterangan_id` = 1) then 1 else 0 end)) * `gaji`.`gaji_perhari`) * `pendidikan`.`penambahan`) + (sum((case when (`absen`.`keterangan_id` = 1) then 1 else 0 end)) * `gaji`.`gaji_perhari`)) * `bpjs`.`potongan`) AS `potongan_gaji`,((sum((case when (`absen`.`keterangan_id` = 1) then 1 else 0 end)) * `gaji`.`gaji_perhari`) * `pendidikan`.`penambahan`) AS `plus_gaji` from ((((((`pegawai` left join `jabatan` on((`jabatan`.`id` = `pegawai`.`jabatan_id`))) left join `pendidikan` on((`pendidikan`.`id` = `pegawai`.`pendidikan_id`))) left join `gaji` on((`gaji`.`jabatan_id` = `pegawai`.`jabatan_id`))) left join `absen` on((`absen`.`kode_pegawai` = `pegawai`.`kode`))) left join `keterangan` on((`keterangan`.`id` = `absen`.`keterangan_id`))) left join `bpjs` on((0 <> 1))) group by year(`absen`.`tanggal`),month(`absen`.`tanggal`),`pegawai`.`id`;

-- Dumping structure for view db_pegawai.vw_pegawai
-- Removing temporary table and create final VIEW structure
DROP TABLE IF EXISTS `vw_pegawai`;
CREATE ALGORITHM=UNDEFINED SQL SECURITY DEFINER VIEW `vw_pegawai` AS select `pegawai`.`id` AS `id_pegawai`,`pegawai`.`kode` AS `kode_pegawai`,`pegawai`.`nama` AS `nama_pegawai`,`pegawai`.`jenis_kelamin` AS `jenis_kelamin`,`pegawai`.`alamat` AS `alamat`,`pegawai`.`pendidikan_id` AS `pendidikan_id`,`pendidikan`.`nama` AS `nama_pendidikan`,`pegawai`.`jabatan_id` AS `jabatan_id`,`jabatan`.`nama` AS `nama_jabatan` from ((`pegawai` left join `jabatan` on((`jabatan`.`id` = `pegawai`.`jabatan_id`))) left join `pendidikan` on((`pendidikan`.`id` = `pegawai`.`pendidikan_id`)));

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
