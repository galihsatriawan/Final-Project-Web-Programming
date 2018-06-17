/*
Navicat MySQL Data Transfer

Source Server         : gokil.in
Source Server Version : 50721
Source Host           : localhost:3306
Source Database       : partnership_db

Target Server Type    : MYSQL
Target Server Version : 50721
File Encoding         : 65001

Date: 2018-06-17 22:46:45
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for tb_bentuk_kerjasama
-- ----------------------------
DROP TABLE IF EXISTS `tb_bentuk_kerjasama`;
CREATE TABLE `tb_bentuk_kerjasama` (
  `kode_bentuk_kerjasama` varchar(6) NOT NULL,
  `bentuk_kerjasama` varchar(255) DEFAULT NULL,
  KEY `kode_bentuk_kerjasama` (`kode_bentuk_kerjasama`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_jenis_institusi
-- ----------------------------
DROP TABLE IF EXISTS `tb_jenis_institusi`;
CREATE TABLE `tb_jenis_institusi` (
  `kode_jenis_institusi` varchar(8) NOT NULL,
  `jenis_institusi` varchar(255) DEFAULT NULL,
  KEY `kode_jenis_institusi` (`kode_jenis_institusi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_partner
-- ----------------------------
DROP TABLE IF EXISTS `tb_partner`;
CREATE TABLE `tb_partner` (
  `kode_institusi` varchar(8) NOT NULL,
  `nama_institusi` varchar(255) DEFAULT NULL,
  `kode_jenis_institusi` varchar(8) DEFAULT NULL,
  `negara` varchar(255) DEFAULT NULL,
  `alamat_institusi` varchar(255) DEFAULT NULL,
  `email_institusi` varchar(255) DEFAULT NULL,
  `telp_institusi` varchar(14) DEFAULT NULL,
  `is_aktif` varchar(5) DEFAULT NULL,
  `tgl_dibuat` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `tgl_dimodifikasi` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  KEY `kode_institusi` (`kode_institusi`),
  KEY `fk_jenis_intitusi` (`kode_jenis_institusi`),
  CONSTRAINT `fk_jenis_intitusi` FOREIGN KEY (`kode_jenis_institusi`) REFERENCES `tb_jenis_institusi` (`kode_jenis_institusi`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_role
-- ----------------------------
DROP TABLE IF EXISTS `tb_role`;
CREATE TABLE `tb_role` (
  `kode_role` varchar(5) NOT NULL,
  `jenis_role` varchar(25) DEFAULT NULL,
  KEY `kode_role` (`kode_role`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_tr_bentuk_kerjasama
-- ----------------------------
DROP TABLE IF EXISTS `tb_tr_bentuk_kerjasama`;
CREATE TABLE `tb_tr_bentuk_kerjasama` (
  `kode_bentuk_kerjasama` varchar(6) DEFAULT NULL,
  `kode_kerjasama` varchar(30) DEFAULT NULL,
  KEY `fk_bentuk_kerjasama` (`kode_bentuk_kerjasama`),
  KEY `fk_kerjasama` (`kode_kerjasama`),
  CONSTRAINT `fk_bentuk_kerjasama` FOREIGN KEY (`kode_bentuk_kerjasama`) REFERENCES `tb_bentuk_kerjasama` (`kode_bentuk_kerjasama`),
  CONSTRAINT `fk_kerjasama` FOREIGN KEY (`kode_kerjasama`) REFERENCES `tb_tr_kerjasama` (`kode_kerjasama`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_tr_kerjasama
-- ----------------------------
DROP TABLE IF EXISTS `tb_tr_kerjasama`;
CREATE TABLE `tb_tr_kerjasama` (
  `kode_kerjasama` varchar(30) NOT NULL,
  `jenis_dokumen_kerjasama` varchar(255) DEFAULT NULL,
  `no_dokumen` varchar(255) DEFAULT NULL,
  `deskripsi_kerjasama` varchar(255) DEFAULT NULL,
  `kode_institusi` varchar(8) DEFAULT NULL,
  `nama_unit_ttd` varchar(255) DEFAULT NULL,
  `jabatan_unit_ttd` varchar(255) DEFAULT NULL,
  `nama_penanggung_jawab_unit` varchar(255) DEFAULT NULL,
  `jabatan_penanggung_jawab_unit` varchar(255) DEFAULT NULL,
  `nama_partner_ttd` varchar(255) DEFAULT NULL,
  `jabatan_partner_ttd` varchar(255) DEFAULT NULL,
  `nama_penanggung_jawab_partner` varchar(255) DEFAULT NULL,
  `jabatan_penanggung_jawab_partner` varchar(255) DEFAULT NULL,
  `email_penanggung_jawab_partner` varchar(255) DEFAULT NULL,
  `kode_bentuk_kerjasama` varchar(6) DEFAULT NULL,
  `periode_kerjasama` varchar(255) DEFAULT NULL,
  `tgl_awal` datetime DEFAULT NULL,
  `tgl_akhir` datetime DEFAULT NULL,
  `durasi_bulan` int(11) DEFAULT NULL,
  `durasi_minggu` int(11) DEFAULT NULL,
  `durasi_hari` int(11) DEFAULT NULL,
  `status_kerjasama` varchar(255) DEFAULT NULL,
  `file_kerjasama` varchar(255) DEFAULT NULL,
  `is_aktif` varchar(5) DEFAULT NULL,
  `kode_user` varchar(10) DEFAULT NULL,
  KEY `fk_user` (`kode_user`),
  KEY `fk_partner` (`kode_institusi`),
  KEY `kode_kerjasama` (`kode_kerjasama`),
  CONSTRAINT `fk_partner` FOREIGN KEY (`kode_institusi`) REFERENCES `tb_partner` (`kode_institusi`),
  CONSTRAINT `fk_user` FOREIGN KEY (`kode_user`) REFERENCES `tb_user` (`kode_user`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_unit
-- ----------------------------
DROP TABLE IF EXISTS `tb_unit`;
CREATE TABLE `tb_unit` (
  `kode_unit` varchar(10) NOT NULL,
  `nama_unit` varchar(255) DEFAULT NULL,
  `email_unit` varchar(255) DEFAULT NULL,
  `telp_kantor` varchar(13) DEFAULT NULL,
  KEY `kode_unit` (`kode_unit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Table structure for tb_user
-- ----------------------------
DROP TABLE IF EXISTS `tb_user`;
CREATE TABLE `tb_user` (
  `kode_user` varchar(10) NOT NULL,
  `nama_user` varchar(255) DEFAULT NULL,
  `email_user` varchar(255) DEFAULT NULL,
  `telp_user` varchar(13) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `tgl_dibuat` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `tgl_dimodifikasi` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `kode_role` varchar(5) DEFAULT NULL,
  `kode_unit` varchar(10) DEFAULT NULL,
  `is_aktif` varchar(5) DEFAULT NULL,
  KEY `kode_user` (`kode_user`),
  KEY `fk_unit` (`kode_unit`),
  KEY `fk_role` (`kode_role`),
  CONSTRAINT `fk_role` FOREIGN KEY (`kode_role`) REFERENCES `tb_role` (`kode_role`),
  CONSTRAINT `fk_unit` FOREIGN KEY (`kode_unit`) REFERENCES `tb_unit` (`kode_unit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
SET FOREIGN_KEY_CHECKS=1;
