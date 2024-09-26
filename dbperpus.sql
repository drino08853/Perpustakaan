/*
SQLyog Ultimate v13.1.1 (64 bit)
MySQL - 10.4.27-MariaDB : Database - dbperpustkaan
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`dbperpustkaan` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci */;

USE `dbperpustkaan`;

/*Table structure for table `barang` */

DROP TABLE IF EXISTS `barang`;

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL AUTO_INCREMENT,
  `nama_barang` varchar(100) DEFAULT NULL,
  `gambar_barang` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_barang`)
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `barang` */

insert  into `barang`(`id_barang`,`nama_barang`,`gambar_barang`) values 
(66,'Buku Matematika','253-matematika.jpg'),
(67,'Majalah Cendekia','876-cendekia.jpg'),
(68,'Modul Ajar Ilmu Pengetahuan  Alam','294-modulajar.jpg'),
(69,'Jurnal Siswi','965-jurnal.jpg'),
(70,'Buku-Perspektif-Pendidikan-dalam-Bingkai_Kurniawan','707-Buku-Perspektif-Pendidikan-dalam-Bingkai_Kurniawan-Convert-depan.jpg'),
(71,'Novel Jejak Cinta Yang Tersembunyi','551-novel.jpg'),
(72,'Modul Ajar Pancasila','867-modul ajar pancasila.jpg'),
(73,'Digital Marketing','63-Digital Marketing.jpg');

/*Table structure for table `detail_barang` */

DROP TABLE IF EXISTS `detail_barang`;

CREATE TABLE `detail_barang` (
  `id_detail` int(11) NOT NULL AUTO_INCREMENT,
  `id_pembayaran` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_detail`)
) ENGINE=InnoDB AUTO_INCREMENT=70 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `detail_barang` */

insert  into `detail_barang`(`id_detail`,`id_pembayaran`,`id_barang`,`jumlah`,`tanggal_kembali`,`status`) values 
(61,43,68,1,'2024-09-26','Sedang Di Pinjam'),
(62,43,72,1,'2024-09-27','Sudah Di Kembalikan'),
(63,44,71,2,'2024-10-01','Sedang Di Pinjam'),
(64,44,70,1,'2024-10-01','Sudah Di Kembalikan'),
(65,44,68,2,'2024-10-03','Sedang Di Pinjam'),
(66,45,67,1,'2024-09-28','Sedang Di Pinjam'),
(67,46,68,1,'2024-09-26','Sedang Di Pinjam'),
(68,46,72,2,'2024-09-27','Sudah Di Kembalikan'),
(69,47,66,2,'2024-09-27','Sedang Di Pinjam');

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `nama_kategori` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB AUTO_INCREMENT=138 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `kategori` */

/*Table structure for table `kontak` */

DROP TABLE IF EXISTS `kontak`;

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL AUTO_INCREMENT,
  `facebook` varchar(50) DEFAULT NULL,
  `instagram` varchar(50) DEFAULT NULL,
  `no_telp` varchar(13) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  PRIMARY KEY (`id_kontak`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `kontak` */

insert  into `kontak`(`id_kontak`,`facebook`,`instagram`,`no_telp`,`alamat`) values 
(1,'https://www.facebook.com/profile.php?id=1000077185','https://www.instagram.com/dio_al_parino_77?igsh=MW','082384610426','Jalan Marapalam Indah A3.No.24 Kebon Sirih Siteba');

/*Table structure for table `pelanggan` */

DROP TABLE IF EXISTS `pelanggan`;

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `telp` int(15) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_pelanggan`)
) ENGINE=InnoDB AUTO_INCREMENT=135 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `pelanggan` */

insert  into `pelanggan`(`id_pelanggan`,`username`,`password`,`nama_lengkap`,`telp`,`foto`) values 
(129,'david','12345','Zasalova',454549,'809-avatars-5yIJHT8LmsSwMklH-2QfC3g-t500x500.jpg'),
(130,'daad','12345','Admiral',4545400,'224-ai1.jpg'),
(132,'dian1234','12345','Dian',458453438,'871-images.jpg'),
(133,'irfandi','12345','Dani',787875,'340-pp.jpg'),
(134,'daril1234','12345','Johnson',6759557,'174-d9bff09869ff972a13f991dc4453ae7c.jpg');

/*Table structure for table `pembayaran` */

DROP TABLE IF EXISTS `pembayaran`;

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `id_pelanggan` int(11) DEFAULT NULL,
  `tanggal_pembelian` date DEFAULT NULL,
  `total_pembelian` double DEFAULT NULL,
  PRIMARY KEY (`id_pembayaran`)
) ENGINE=InnoDB AUTO_INCREMENT=48 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `pembayaran` */

insert  into `pembayaran`(`id_pembayaran`,`id_pelanggan`,`tanggal_pembelian`,`total_pembelian`) values 
(43,129,'2024-09-25',2),
(44,130,'2024-09-26',5),
(45,132,'2024-09-26',1),
(46,134,'2024-09-26',3),
(47,133,'2024-09-26',2);

/*Table structure for table `user` */

DROP TABLE IF EXISTS `user`;

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `nama_lengkap` varchar(100) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

/*Data for the table `user` */

insert  into `user`(`id_user`,`username`,`password`,`nama_lengkap`,`foto`) values 
(5,'markus','12345','Mas Tukang  Perkakas','ai2.jpg'),
(6,'hartono','12345','Pak Hartono','905-ai1.jpg'),
(12,'ryanfeb','12345','Ryan Feb','783-bandung-badge.png'),
(13,'asaltauaja','12345','Shanks','998-history.jpg');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
