/*
 Navicat Premium Data Transfer

 Source Server         : myconn
 Source Server Type    : MySQL
 Source Server Version : 100432 (10.4.32-MariaDB)
 Source Host           : localhost:3306
 Source Schema         : db_sipakom

 Target Server Type    : MySQL
 Target Server Version : 100432 (10.4.32-MariaDB)
 File Encoding         : 65001

 Date: 08/05/2025 07:27:31
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for basis_pengetahuan
-- ----------------------------
DROP TABLE IF EXISTS `basis_pengetahuan`;
CREATE TABLE `basis_pengetahuan`  (
  `idpengetahuan` int NOT NULL AUTO_INCREMENT,
  `idkerusakan` int NULL DEFAULT NULL,
  `solusi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`idpengetahuan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of basis_pengetahuan
-- ----------------------------
INSERT INTO `basis_pengetahuan` VALUES (1, 1, 'Ganti IC power dan cek jalur tegangan utama.');
INSERT INTO `basis_pengetahuan` VALUES (2, 2, 'Bersihkan slot RAM atau ganti modul RAM.');
INSERT INTO `basis_pengetahuan` VALUES (3, 3, 'Ganti harddisk dan install ulang sistem.');
INSERT INTO `basis_pengetahuan` VALUES (4, 4, 'Ganti kipas atau periksa konektor kipas.');
INSERT INTO `basis_pengetahuan` VALUES (5, 5, 'Ganti panel LCD atau periksa fleksibel.');
INSERT INTO `basis_pengetahuan` VALUES (6, 6, 'Bersihkan keyboard atau ganti unit keyboard.');
INSERT INTO `basis_pengetahuan` VALUES (7, 7, 'Ganti charger atau periksa konektor.');

-- ----------------------------
-- Table structure for detail_basis_pengetahuan
-- ----------------------------
DROP TABLE IF EXISTS `detail_basis_pengetahuan`;
CREATE TABLE `detail_basis_pengetahuan`  (
  `idpengetahuan` int NULL DEFAULT NULL,
  `idgejala` int NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of detail_basis_pengetahuan
-- ----------------------------
INSERT INTO `detail_basis_pengetahuan` VALUES (1, 1);
INSERT INTO `detail_basis_pengetahuan` VALUES (1, 2);
INSERT INTO `detail_basis_pengetahuan` VALUES (1, 3);
INSERT INTO `detail_basis_pengetahuan` VALUES (1, 4);
INSERT INTO `detail_basis_pengetahuan` VALUES (2, 5);
INSERT INTO `detail_basis_pengetahuan` VALUES (2, 6);
INSERT INTO `detail_basis_pengetahuan` VALUES (2, 7);
INSERT INTO `detail_basis_pengetahuan` VALUES (3, 8);
INSERT INTO `detail_basis_pengetahuan` VALUES (3, 9);
INSERT INTO `detail_basis_pengetahuan` VALUES (3, 10);
INSERT INTO `detail_basis_pengetahuan` VALUES (3, 11);
INSERT INTO `detail_basis_pengetahuan` VALUES (3, 12);
INSERT INTO `detail_basis_pengetahuan` VALUES (4, 13);
INSERT INTO `detail_basis_pengetahuan` VALUES (4, 14);
INSERT INTO `detail_basis_pengetahuan` VALUES (4, 15);
INSERT INTO `detail_basis_pengetahuan` VALUES (5, 16);
INSERT INTO `detail_basis_pengetahuan` VALUES (5, 17);
INSERT INTO `detail_basis_pengetahuan` VALUES (5, 18);
INSERT INTO `detail_basis_pengetahuan` VALUES (5, 19);
INSERT INTO `detail_basis_pengetahuan` VALUES (6, 20);
INSERT INTO `detail_basis_pengetahuan` VALUES (6, 21);
INSERT INTO `detail_basis_pengetahuan` VALUES (6, 22);
INSERT INTO `detail_basis_pengetahuan` VALUES (7, 3);
INSERT INTO `detail_basis_pengetahuan` VALUES (7, 23);
INSERT INTO `detail_basis_pengetahuan` VALUES (7, 24);
INSERT INTO `detail_basis_pengetahuan` VALUES (7, 25);

-- ----------------------------
-- Table structure for detail_kasus
-- ----------------------------
DROP TABLE IF EXISTS `detail_kasus`;
CREATE TABLE `detail_kasus`  (
  `idkasus` int NULL DEFAULT NULL,
  `idgejala` int NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of detail_kasus
-- ----------------------------
INSERT INTO `detail_kasus` VALUES (1, 1);
INSERT INTO `detail_kasus` VALUES (1, 2);
INSERT INTO `detail_kasus` VALUES (1, 4);
INSERT INTO `detail_kasus` VALUES (2, 2);
INSERT INTO `detail_kasus` VALUES (2, 6);
INSERT INTO `detail_kasus` VALUES (3, 3);
INSERT INTO `detail_kasus` VALUES (3, 7);
INSERT INTO `detail_kasus` VALUES (4, 5);
INSERT INTO `detail_kasus` VALUES (4, 8);
INSERT INTO `detail_kasus` VALUES (5, 16);
INSERT INTO `detail_kasus` VALUES (5, 19);
INSERT INTO `detail_kasus` VALUES (6, 21);
INSERT INTO `detail_kasus` VALUES (6, 20);
INSERT INTO `detail_kasus` VALUES (7, 23);
INSERT INTO `detail_kasus` VALUES (7, 25);

-- ----------------------------
-- Table structure for detail_kerusakan_cbr
-- ----------------------------
DROP TABLE IF EXISTS `detail_kerusakan_cbr`;
CREATE TABLE `detail_kerusakan_cbr`  (
  `idkonsultasi` int NULL DEFAULT NULL,
  `idkerusakan` int NULL DEFAULT NULL,
  `persentase` tinyint NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of detail_kerusakan_cbr
-- ----------------------------
INSERT INTO `detail_kerusakan_cbr` VALUES (1, 2, 50);
INSERT INTO `detail_kerusakan_cbr` VALUES (1, 7, 50);
INSERT INTO `detail_kerusakan_cbr` VALUES (2, 1, 33);
INSERT INTO `detail_kerusakan_cbr` VALUES (2, 2, 50);
INSERT INTO `detail_kerusakan_cbr` VALUES (2, 3, 50);
INSERT INTO `detail_kerusakan_cbr` VALUES (3, 1, 33);
INSERT INTO `detail_kerusakan_cbr` VALUES (3, 4, 100);
INSERT INTO `detail_kerusakan_cbr` VALUES (4, 2, 50);
INSERT INTO `detail_kerusakan_cbr` VALUES (4, 3, 50);
INSERT INTO `detail_kerusakan_cbr` VALUES (4, 7, 50);

-- ----------------------------
-- Table structure for detail_kerusakan_fc
-- ----------------------------
DROP TABLE IF EXISTS `detail_kerusakan_fc`;
CREATE TABLE `detail_kerusakan_fc`  (
  `idkonsultasi` int NULL DEFAULT NULL,
  `idkerusakan` int NULL DEFAULT NULL,
  `persentase` tinyint NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of detail_kerusakan_fc
-- ----------------------------
INSERT INTO `detail_kerusakan_fc` VALUES (1, 2, 33);
INSERT INTO `detail_kerusakan_fc` VALUES (1, 3, 20);
INSERT INTO `detail_kerusakan_fc` VALUES (1, 4, 33);
INSERT INTO `detail_kerusakan_fc` VALUES (1, 7, 50);
INSERT INTO `detail_kerusakan_fc` VALUES (2, 1, 25);
INSERT INTO `detail_kerusakan_fc` VALUES (2, 2, 33);
INSERT INTO `detail_kerusakan_fc` VALUES (2, 3, 20);
INSERT INTO `detail_kerusakan_fc` VALUES (2, 4, 33);
INSERT INTO `detail_kerusakan_fc` VALUES (3, 1, 25);
INSERT INTO `detail_kerusakan_fc` VALUES (3, 2, 33);
INSERT INTO `detail_kerusakan_fc` VALUES (3, 3, 20);
INSERT INTO `detail_kerusakan_fc` VALUES (3, 4, 67);
INSERT INTO `detail_kerusakan_fc` VALUES (4, 1, 25);
INSERT INTO `detail_kerusakan_fc` VALUES (4, 2, 33);
INSERT INTO `detail_kerusakan_fc` VALUES (4, 7, 50);

-- ----------------------------
-- Table structure for detail_konsultasi
-- ----------------------------
DROP TABLE IF EXISTS `detail_konsultasi`;
CREATE TABLE `detail_konsultasi`  (
  `idkonsultasi` int NULL DEFAULT NULL,
  `idgejala` int NULL DEFAULT NULL
) ENGINE = InnoDB CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of detail_konsultasi
-- ----------------------------
INSERT INTO `detail_konsultasi` VALUES (1, 23);
INSERT INTO `detail_konsultasi` VALUES (1, 6);
INSERT INTO `detail_konsultasi` VALUES (1, 11);
INSERT INTO `detail_konsultasi` VALUES (1, 24);
INSERT INTO `detail_konsultasi` VALUES (1, 13);
INSERT INTO `detail_konsultasi` VALUES (2, 15);
INSERT INTO `detail_konsultasi` VALUES (2, 2);
INSERT INTO `detail_konsultasi` VALUES (2, 7);
INSERT INTO `detail_konsultasi` VALUES (2, 10);
INSERT INTO `detail_konsultasi` VALUES (3, 13);
INSERT INTO `detail_konsultasi` VALUES (3, 5);
INSERT INTO `detail_konsultasi` VALUES (3, 8);
INSERT INTO `detail_konsultasi` VALUES (3, 14);
INSERT INTO `detail_konsultasi` VALUES (3, 1);
INSERT INTO `detail_konsultasi` VALUES (4, 23);
INSERT INTO `detail_konsultasi` VALUES (4, 6);
INSERT INTO `detail_konsultasi` VALUES (4, 3);

-- ----------------------------
-- Table structure for gejala
-- ----------------------------
DROP TABLE IF EXISTS `gejala`;
CREATE TABLE `gejala`  (
  `idgejala` int NOT NULL AUTO_INCREMENT,
  `nmgejala` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idgejala`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 26 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of gejala
-- ----------------------------
INSERT INTO `gejala` VALUES (1, 'Laptop tidak menyala sama sekali');
INSERT INTO `gejala` VALUES (2, 'Tidak ada tegangan di motherboard');
INSERT INTO `gejala` VALUES (3, 'Indikator charger menyala tapi tidak ngecas');
INSERT INTO `gejala` VALUES (4, 'Tercium bau hangus dari komponen');
INSERT INTO `gejala` VALUES (5, 'Laptop menyala tapi layar hitam');
INSERT INTO `gejala` VALUES (6, 'Beep panjang saat dinyalakan');
INSERT INTO `gejala` VALUES (7, 'Tidak muncul tampilan BIOS');
INSERT INTO `gejala` VALUES (8, 'Laptop restart berulang kali');
INSERT INTO `gejala` VALUES (9, 'Muncul pesan \"No Bootable Device\"');
INSERT INTO `gejala` VALUES (10, 'Windows tidak bisa masuk');
INSERT INTO `gejala` VALUES (11, 'Bunyi klik-klik dari harddisk');
INSERT INTO `gejala` VALUES (12, 'Loading sangat lambat');
INSERT INTO `gejala` VALUES (13, 'Laptop cepat panas');
INSERT INTO `gejala` VALUES (14, 'Laptop tiba-tiba mati sendiri');
INSERT INTO `gejala` VALUES (15, 'Tidak ada suara kipas saat dinyalakan');
INSERT INTO `gejala` VALUES (16, 'Layar bergaris');
INSERT INTO `gejala` VALUES (17, 'Layar blank putih');
INSERT INTO `gejala` VALUES (18, 'Layar redup');
INSERT INTO `gejala` VALUES (19, 'Layar kedip-kedip');
INSERT INTO `gejala` VALUES (20, 'Beberapa tombol tidak berfungsi');
INSERT INTO `gejala` VALUES (21, 'Tombol menekan sendiri');
INSERT INTO `gejala` VALUES (22, 'Keyboard tidak respon');
INSERT INTO `gejala` VALUES (23, 'Baterai tidak bertambah saat dicas');
INSERT INTO `gejala` VALUES (24, 'Charger panas berlebihan');
INSERT INTO `gejala` VALUES (25, 'Kabel charger longgar atau putus-putus');

-- ----------------------------
-- Table structure for kasus
-- ----------------------------
DROP TABLE IF EXISTS `kasus`;
CREATE TABLE `kasus`  (
  `idkasus` int NOT NULL AUTO_INCREMENT,
  `idkerusakan` int NULL DEFAULT NULL,
  `solusi` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`idkasus`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kasus
-- ----------------------------
INSERT INTO `kasus` VALUES (1, 1, 'Ganti IC Power');
INSERT INTO `kasus` VALUES (2, 2, 'Ganti RAM');
INSERT INTO `kasus` VALUES (3, 3, 'Ganti Harddisk');
INSERT INTO `kasus` VALUES (4, 4, 'Ganti Kipas CPU');
INSERT INTO `kasus` VALUES (5, 5, 'Ganti LCD');
INSERT INTO `kasus` VALUES (6, 6, 'Ganti Keyboard');
INSERT INTO `kasus` VALUES (7, 7, 'Ganti Charger');

-- ----------------------------
-- Table structure for kerusakan
-- ----------------------------
DROP TABLE IF EXISTS `kerusakan`;
CREATE TABLE `kerusakan`  (
  `idkerusakan` int NOT NULL AUTO_INCREMENT,
  `nmkerusakan` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `keterangan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  PRIMARY KEY (`idkerusakan`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 8 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of kerusakan
-- ----------------------------
INSERT INTO `kerusakan` VALUES (1, 'IC Power Rusak', 'Kerusakan pada IC regulator daya utama menyebabkan laptop mati total.');
INSERT INTO `kerusakan` VALUES (2, 'RAM Rusak', 'Modul RAM tidak terbaca sehingga proses booting gagal.');
INSERT INTO `kerusakan` VALUES (3, 'Harddisk Rusak', 'Media penyimpanan mengalami kerusakan fisik atau logik.');
INSERT INTO `kerusakan` VALUES (4, 'Kipas CPU Mati', 'Kipas prosesor tidak berfungsi, menyebabkan overheating.');
INSERT INTO `kerusakan` VALUES (5, 'LCD Rusak', 'Kerusakan pada panel layar mengganggu tampilan visual.');
INSERT INTO `kerusakan` VALUES (6, 'Keyboard Error', 'Keyboard tidak berfungsi dengan normal.');
INSERT INTO `kerusakan` VALUES (7, 'Charger Rusak', 'Adaptor charger tidak mengalirkan arus secara stabil.');

-- ----------------------------
-- Table structure for konsultasi
-- ----------------------------
DROP TABLE IF EXISTS `konsultasi`;
CREATE TABLE `konsultasi`  (
  `idkonsultasi` int NOT NULL AUTO_INCREMENT,
  `tanggal` date NULL DEFAULT NULL,
  `nama_barang` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idkonsultasi`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of konsultasi
-- ----------------------------
INSERT INTO `konsultasi` VALUES (1, '2025-05-08', 'HP 333');
INSERT INTO `konsultasi` VALUES (2, '2025-05-08', 'asus 777');
INSERT INTO `konsultasi` VALUES (3, '2025-05-08', 'acer 889');
INSERT INTO `konsultasi` VALUES (4, '2025-05-08', 'acer 555555');

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS `users`;
CREATE TABLE `users`  (
  `idusers` int NOT NULL AUTO_INCREMENT,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `pass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `role` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`idusers`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 5 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = DYNAMIC;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO `users` VALUES (1, 'agus', 'fdf169558242ee051cca1479770ebac3', 'Dokter');
INSERT INTO `users` VALUES (2, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'Admin');
INSERT INTO `users` VALUES (3, 'pasien', 'f5c25a0082eb0748faedca1ecdcfb131', 'Pasien');

SET FOREIGN_KEY_CHECKS = 1;
