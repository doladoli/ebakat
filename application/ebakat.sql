-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Jul 25, 2015 at 11:15 PM
-- Server version: 5.1.36
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ebakat`
--

-- --------------------------------------------------------

--
-- Table structure for table `jawatan`
--

CREATE TABLE IF NOT EXISTS `jawatan` (
  `kod` varchar(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `personel`
--

CREATE TABLE IF NOT EXISTS `personel` (
  `nokp_baru` varchar(12) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `staf_gred` varchar(5) NOT NULL,
  `tempat_kerja` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skt_tb_kriteria`
--

CREATE TABLE IF NOT EXISTS `skt_tb_kriteria` (
  `KR_ID` int(11) NOT NULL AUTO_INCREMENT,
  `KR_PID` int(11) DEFAULT NULL,
  `KR_KETERANGAN` varchar(200) DEFAULT NULL,
  `KR_STATUS` varchar(1) DEFAULT NULL,
  `KR_FLOW_FOLLOW_PID` varchar(1) DEFAULT NULL,
  `KR_KOD` varchar(20) DEFAULT NULL,
  `KR_TAHUN` varchar(20) DEFAULT NULL,
  `KR_DATASOURCE` varchar(100) DEFAULT NULL,
  `KR_URL` varchar(111) DEFAULT NULL,
  `KR_SKT_DS` varchar(50) NOT NULL,
  PRIMARY KEY (`KR_ID`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=289 ;

-- --------------------------------------------------------

--
-- Table structure for table `skt_tb_ptj`
--

CREATE TABLE IF NOT EXISTS `skt_tb_ptj` (
  `ptj_kod` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skt_tb_skt_jawatan`
--

CREATE TABLE IF NOT EXISTS `skt_tb_skt_jawatan` (
  `sj_id` int(11) NOT NULL AUTO_INCREMENT,
  `sj_id_kriteria` int(11) NOT NULL,
  `sj_kod_jawatan` varchar(5) NOT NULL,
  `sj_ptj` varchar(5) NOT NULL,
  `sj_value` varchar(100) NOT NULL,
  PRIMARY KEY (`sj_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=50 ;

-- --------------------------------------------------------

--
-- Table structure for table `skt_tb_skt_pensyarah`
--

CREATE TABLE IF NOT EXISTS `skt_tb_skt_pensyarah` (
  `SP_ID` int(11) DEFAULT NULL,
  `SP_ID_KRITERIA` int(11) DEFAULT NULL,
  `SP_PETUNJUK_PRESTASI` varchar(4000) DEFAULT NULL,
  `SP_SASARAN` varchar(4000) DEFAULT NULL,
  `SP_STATUS` int(11) DEFAULT NULL,
  `SP_NOKP_PPP` varchar(20) DEFAULT NULL,
  `SP_NOKP_PPK` varchar(20) DEFAULT NULL,
  `SP_AKTIVITI` varchar(4000) DEFAULT NULL,
  `SP_TKH_SAH` date DEFAULT NULL,
  `SP_NOKP` varchar(20) DEFAULT NULL,
  `sp_catatan` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `skt_tb_skt_tahunan`
--

CREATE TABLE IF NOT EXISTS `skt_tb_skt_tahunan` (
  `st_id` int(11) NOT NULL AUTO_INCREMENT,
  `st_nokp` varchar(12) NOT NULL,
  `st_tahun` varchar(4) NOT NULL,
  `st_status` int(11) NOT NULL,
  PRIMARY KEY (`st_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

-- --------------------------------------------------------

--
-- Table structure for table `skt_tb_user_role`
--

CREATE TABLE IF NOT EXISTS `skt_tb_user_role` (
  `ur_id` int(11) NOT NULL AUTO_INCREMENT,
  `ur_nokp` varchar(12) NOT NULL,
  `ur_id_role` int(11) NOT NULL,
  `ur_ptj` varchar(5) NOT NULL,
  PRIMARY KEY (`ur_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `skt_tb_workflow`
--

CREATE TABLE IF NOT EXISTS `skt_tb_workflow` (
  `WF_ID` int(11) DEFAULT NULL,
  `WF_NOKP` varchar(20) DEFAULT NULL,
  `WF_NOKP_PPP` varchar(20) DEFAULT NULL,
  `WF_NOKP_PPK` varchar(20) DEFAULT NULL,
  `WF_ID_KRITERIA` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tempat_kerja`
--

CREATE TABLE IF NOT EXISTS `tempat_kerja` (
  `kod` varchar(5) NOT NULL,
  `perihal` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
