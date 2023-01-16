-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 16, 2023 at 02:19 PM
-- Server version: 8.0.30
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `karyapdn_cuti`
--

-- --------------------------------------------------------

--
-- Table structure for table `cuti`
--

CREATE TABLE `cuti` (
  `id_cuti` varchar(6) NOT NULL,
  `cuti_kpd` varchar(25) NOT NULL,
  `jml_hari` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cuti`
--

INSERT INTO `cuti` (`id_cuti`, `cuti_kpd`, `jml_hari`) VALUES
('CT-001', 'Tahunan', 12),
('CT-002', 'Nikah', 3),
('CT-003', 'Melahirkan', 90),
('CT-004', 'Khitanan Anak', 2),
('CT-005', 'Kematian', 7),
('CT-006', 'Cuti Di luar Tanggungan', 0);

-- --------------------------------------------------------

--
-- Table structure for table `departemen`
--

CREATE TABLE `departemen` (
  `id_departemen` varchar(7) NOT NULL,
  `nama_departemen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `departemen`
--

INSERT INTO `departemen` (`id_departemen`, `nama_departemen`) VALUES
('ADM-DRT', 'ADM DIRECTOR'),
('ADM-HQD', 'HRGA, QEMR, DEL, & SEC'),
('ADM-KPD', 'ADMIN'),
('BUS-CSO', 'CUSTOMER SERVICE OFFICER'),
('BUS-DRT', 'BUSINESS DIRECTOR'),
('BUS-MKT', 'MARKETING'),
('BUS-PUR', 'PURCHASING'),
('FA-DRT', 'F & A DIRECTOR'),
('FA-IWC', 'FA, IT, WH, & COLL'),
('OPT-DRT', 'OPERATIONAL DIRECTOR'),
('OPT-ENG', 'ENGINEERING'),
('OPT-FGI', 'FINISH GOOD & IM'),
('OPT-PPC', 'PRODUCTION PLANNING & CONTROL'),
('OPT-PRM', 'PRODUCTION & MAINTENANCE'),
('OPT-QLA', 'QA, QC & LAB');

-- --------------------------------------------------------

--
-- Table structure for table `detail_permohonan`
--

CREATE TABLE `detail_permohonan` (
  `id_detail_permohonan` int NOT NULL,
  `id_permohonan` varchar(20) NOT NULL,
  `id_pegawai` varchar(20) NOT NULL,
  `tgl_cuti` date NOT NULL,
  `hari` int NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_permohonan`
--

INSERT INTO `detail_permohonan` (`id_detail_permohonan`, `id_permohonan`, `id_pegawai`, `tgl_cuti`, `hari`) VALUES
(1, 'PR-0001', 'ADM-DRT-01-001', '2018-12-24', 1),
(2, 'PR-0001', 'ADM-DRT-01-001', '2018-12-26', 1),
(3, 'PR-0001', 'ADM-DRT-01-001', '2018-12-27', 1),
(4, 'PR-0001', 'ADM-DRT-01-001', '2018-12-28', 1),
(5, 'PR-0002', 'ADM-DRT-01-001', '2018-09-03', 1),
(6, 'PR-0002', 'ADM-DRT-01-001', '2018-09-04', 1),
(7, 'PR-0002', 'ADM-DRT-01-001', '2018-09-05', 1),
(24, 'PR-0003', 'ADM-DRT-01-001', '2018-12-17', 1),
(25, 'PR-0003', 'ADM-DRT-01-001', '2018-12-18', 1),
(26, 'PR-0003', 'ADM-DRT-01-001', '2018-12-19', 1),
(27, 'PR-0003', 'ADM-DRT-01-001', '2018-12-20', 1),
(28, 'PR-0003', 'ADM-DRT-01-001', '2018-12-21', 1),
(29, 'PR-0004', 'ADM-HQD-04-001', '2018-12-24', 1),
(30, 'PR-0004', 'ADM-HQD-04-001', '2018-12-26', 1),
(31, 'PR-0004', 'ADM-HQD-04-001', '2018-12-27', 1),
(32, 'PR-0004', 'ADM-HQD-04-001', '2018-12-28', 1),
(33, 'PR-0005', 'ADM-DRT-01-001', '2019-12-17', 1),
(34, 'PR-0005', 'ADM-DRT-01-001', '2019-12-18', 1),
(35, 'PR-0005', 'ADM-DRT-01-001', '2019-12-19', 1),
(66, 'PR-0007', 'ADM-HQD-02-002', '2018-12-24', 1),
(67, 'PR-0007', 'ADM-HQD-02-002', '2018-12-26', 1),
(68, 'PR-0007', 'ADM-HQD-02-002', '2018-12-27', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` varchar(15) NOT NULL,
  `nama_jabatan` varchar(50) NOT NULL,
  `id_departemen` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `nama_jabatan`, `id_departemen`) VALUES
('ADM-DRT-01', 'ADM DIRECTOR', 'ADM-DRT'),
('ADM-HQD-01', 'MANAGER HRGA/QEMR/DEL/SEC', 'ADM-HQD'),
('ADM-HQD-02', 'SPV HRGA/QEMR/DEL/SEC', 'ADM-HQD'),
('ADM-HQD-03', 'STAFF HRGA/QEMR/DEL/SEC', 'ADM-HQD'),
('ADM-HQD-04', 'LEADER HRGA/QEMR/DEL/SEC', 'ADM-HQD'),
('ADM-HQD-05', 'OPERATOR HRGA/QEMR/DEL/SEC', 'ADM-HQD'),
('ADM-KPD-01', 'ADMIN', 'ADM-KPD'),
('BUS-CSO-01', 'MANAGER CSO', 'BUS-CSO'),
('BUS-CSO-02', 'SPV CSO', 'BUS-CSO'),
('BUS-CSO-03', 'STAFF CSO', 'BUS-CSO'),
('BUS-CSO-04', 'LEADER CSO', 'BUS-CSO'),
('BUS-CSO-05', 'OPERATOR CSO', 'BUS-CSO'),
('BUS-DRT-01', 'BUSINESS DIRECTOR', 'BUS-DRT'),
('BUS-MKT-01', 'MANAGER MARKETING', 'BUS-MKT'),
('BUS-MKT-02', 'SPV MARKETING', 'BUS-MKT'),
('BUS-MKT-03', 'STAFF MARKETING', 'BUS-MKT'),
('BUS-MKT-04', 'LEADER MARKETING', 'BUS-MKT'),
('BUS-MKT-05', 'OPERATOR MARKETING', 'BUS-MKT'),
('BUS-PUR-01', 'MANAGER PURCHASING', 'BUS-PUR'),
('BUS-PUR-02', 'SPV PURCHASING', 'BUS-PUR'),
('BUS-PUR-03', 'STAFF PURCHASING', 'BUS-PUR'),
('BUS-PUR-04', 'LEADER PURCHASING', 'BUS-PUR'),
('BUS-PUR-05', 'OPERATOR PURCHASING', 'BUS-PUR'),
('FA-DRT-01', 'F & A DIRECTOR', 'FA-DRT'),
('FA-IWC-01', 'MANAGER FA/IT/WH/COLL', 'FA-IWC'),
('FA-IWC-02', 'SPV FA/IT/WH/COLL', 'FA-IWC'),
('FA-IWC-03', 'STAFF FA/IT/WH/COLL', 'FA-IWC'),
('FA-IWC-04', 'LEADER FA/IT/WH/COLL', 'FA-IWC'),
('FA-IWC-05', 'OPERATOR FA/IT/WH/COLL', 'FA-IWC'),
('OPT-DRT-01', 'OPERATIONAL DIRECTOR', 'OPT-DRT'),
('OPT-ENG-01', 'MANAGER ENGINEERING', 'OPT-ENG'),
('OPT-ENG-02', 'SPV ENGINEERING', 'OPT-ENG'),
('OPT-ENG-03', 'STAFF ENGINEERING', 'OPT-ENG'),
('OPT-ENG-04', 'LEADER ENGINEERING', 'OPT-ENG'),
('OPT-ENG-05', 'OPERATOR ENGINEERING', 'OPT-ENG'),
('OPT-FGI-01', 'MANAGER FG & IM', 'OPT-FGI'),
('OPT-FGI-02', 'SPV FG & IM', 'OPT-FGI'),
('OPT-FGI-03', 'STAFF FG & IM', 'OPT-FGI'),
('OPT-FGI-04', 'LEADER FG & IM', 'OPT-FGI'),
('OPT-FGI-05', 'OPERATOR FG & IM', 'OPT-FGI'),
('OPT-PPC-01', 'MANAGER PPC', 'OPT-PPC'),
('OPT-PPC-02', 'SPV PPC', 'OPT-PPC'),
('OPT-PPC-03', 'STAFF PPC', 'OPT-PPC'),
('OPT-PPC-04', 'LEADER PPC', 'OPT-PPC'),
('OPT-PPC-05', 'OPERATOR PPC', 'OPT-PPC'),
('OPT-PRM-01', 'MANAGER PRO/MTC', 'OPT-PRM'),
('OPT-PRM-02', 'SPV PRO/MTC', 'OPT-PRM'),
('OPT-PRM-03', 'STAFF PRO/MTC', 'OPT-PRM'),
('OPT-PRM-04', 'LEADER PRO/MTC', 'OPT-PRM'),
('OPT-PRM-05', 'OPERATOR PRO/MTC', 'OPT-PRM'),
('OPT-QLA-01', 'MANAGER QA/QC/LAB', 'OPT-QLA'),
('OPT-QLA-02', 'SPV QA/QC/LAB', 'OPT-QLA'),
('OPT-QLA-03', 'STAFF QA/QC/LAB', 'OPT-QLA'),
('OPT-QLA-04', 'LEADER QA/QC/LAB', 'OPT-QLA'),
('OPT-QLA-05', 'OPERATOR QA/QC/LAB', 'OPT-QLA');

-- --------------------------------------------------------

--
-- Table structure for table `libur`
--

CREATE TABLE `libur` (
  `id_libur` int NOT NULL,
  `keterangan_libur` text NOT NULL,
  `tgl_libur` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `libur`
--

INSERT INTO `libur` (`id_libur`, `keterangan_libur`, `tgl_libur`) VALUES
(1, 'Tahun Baru', '2018-12-31'),
(3, 'Natal', '2018-12-25');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` varchar(15) NOT NULL,
  `nama_pegawai` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `id_jabatan` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `no_tlp` varchar(13) NOT NULL,
  `tmk` date NOT NULL,
  `tipe_user` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `nama_pegawai`, `password`, `id_jabatan`, `alamat`, `no_tlp`, `tmk`, `tipe_user`) VALUES
('ADM-DRT-01-0005', 'Riza', '21232f297a57a5a743894a0e4a801fc3', 'ADM-DRT-01', 'testing', '0896520', '2017-12-29', 'ADMIN'),
('ADM-DRT-01-001', 'SILVIA TJENG', '81dc9bdb52d04dc20036dbd8313ed055', 'ADM-DRT-01', 'Cikarang', '021010101', '1993-12-17', 'DIREKTUR'),
('ADM-HQD-01-000', 'Arief Priyo Prakoso', '81dc9bdb52d04dc20036dbd8313ed055', 'ADM-DRT-01', 'Testing', '088812323', '2000-01-05', 'STAFF'),
('ADM-HQD-01-001', 'SETI EKAWATI', '81dc9bdb52d04dc20036dbd8313ed055', 'ADM-HQD-01', 'Cikarang', '021010101', '2016-01-07', 'MANAGER'),
('ADM-HQD-02-001', 'ZAMRONI', '21232f297a57a5a743894a0e4a801fc3', 'ADM-HQD-02', 'Cikarang', '021010101', '1995-07-24', 'SPV'),
('ADM-HQD-02-002', 'SUKAL', '81dc9bdb52d04dc20036dbd8313ed055', 'ADM-HQD-02', 'Cikarang', '021010101', '1995-10-26', 'SPV'),
('ADM-HQD-04-001', 'AGUS SUPRIYANTO', '81dc9bdb52d04dc20036dbd8313ed055', 'ADM-HQD-04', 'Cikarang', '021010101', '2000-05-01', 'LEADER'),
('ADM-HQD-04-002', 'WALUYO', '81dc9bdb52d04dc20036dbd8313ed055', 'ADM-HQD-04', 'Cikarang', '021010101', '2002-10-03', 'LEADER'),
('ADM-HQD-05-002', 'WAGIRAN', '81dc9bdb52d04dc20036dbd8313ed055', 'ADM-HQD-05', 'Cikarang', '021010101', '2008-08-26', 'OPERATOR'),
('ADM-HQD-05-003', 'RINTO DWIYONO', '81dc9bdb52d04dc20036dbd8313ed055', 'ADM-HQD-05', 'Cikarang', '021010101', '2004-03-01', 'OPERATOR'),
('ADM-HQD-05-004', 'DIDIK HANDRIANTORO', '81dc9bdb52d04dc20036dbd8313ed055', 'ADM-HQD-05', 'Cikarang', '021010101', '2000-05-25', 'OPERATOR'),
('ADM-HQD-05-005', 'CUNCUN CAHYA ALAMSAH', '81dc9bdb52d04dc20036dbd8313ed055', 'ADM-HQD-05', 'Cikarang', '021010101', '2017-03-16', 'OPERATOR'),
('ADM-HQD-05-006', 'BUDI UTOMO', '81dc9bdb52d04dc20036dbd8313ed055', 'ADM-HQD-05', 'Cikarang', '021010101', '2003-06-25', 'OPERATOR'),
('ADM-HQD-05-007', 'UMAR ABDULAH', '81dc9bdb52d04dc20036dbd8313ed055', 'ADM-HQD-05', 'Cikarang', '021010101', '2005-04-01', 'OPERATOR'),
('ADM-HQD-05-008', 'SODIKIN', '81dc9bdb52d04dc20036dbd8313ed055', 'ADM-HQD-05', 'Cikarang', '021010101', '2007-04-20', 'OPERATOR'),
('ADM-HQD-05-009', 'ROMIHUN', '81dc9bdb52d04dc20036dbd8313ed055', 'ADM-HQD-05', 'Cikarang', '021010101', '1997-04-01', 'OPERATOR'),
('ADM-HQD-05-010', 'PARWEDI', '81dc9bdb52d04dc20036dbd8313ed055', 'ADM-HQD-05', 'Cikarang', '021010101', '1995-08-23', 'OPERATOR'),
('ADM-HQD-05-011', 'KASPURI', '81dc9bdb52d04dc20036dbd8313ed055', 'ADM-HQD-05', 'Cikarang', '021010101', '2004-05-31', 'OPERATOR'),
('ADM-HQD-05-012', 'INDRA', '81dc9bdb52d04dc20036dbd8313ed055', 'ADM-HQD-05', 'Cikarang', '021010101', '2005-05-21', 'OPERATOR'),
('ADM-HQD-05-013', 'HERI HERYADI', '81dc9bdb52d04dc20036dbd8313ed055', 'ADM-HQD-05', 'Cikarang', '021010101', '2001-01-13', 'OPERATOR'),
('ADM-HQD-05-014', 'DARUS', '81dc9bdb52d04dc20036dbd8313ed055', 'ADM-HQD-05', 'Cikarang', '021010101', '1999-07-01', 'OPERATOR'),
('ADM-HQD-05-015', 'ARIS MUNANDAR', '81dc9bdb52d04dc20036dbd8313ed055', 'ADM-HQD-05', 'Cikarang', '021010101', '2004-05-10', 'OPERATOR'),
('ADM-HQD-05-016', 'ABDUL GOFUR', '81dc9bdb52d04dc20036dbd8313ed055', 'ADM-HQD-05', 'Cikarang', '021010101', '1995-10-19', 'OPERATOR'),
('ADM-KPD-01-001', 'ADMIN', '81dc9bdb52d04dc20036dbd8313ed055', 'ADM-KPD-01', 'TESTING', '088181111', '2018-10-11', 'ADMIN'),
('ADM-KPD-01-002', 'ADMIN2', '81dc9bdb52d04dc20036dbd8313ed055', 'ADM-KPD-01', 'TESTING', '088181111', '2018-10-11', 'ADMIN'),
('BUS-CSO-02-001', 'SUNARSIH', '81dc9bdb52d04dc20036dbd8313ed055', 'BUS-CSO-02', 'Cikarang', '021010101', '1995-07-28', 'SPV'),
('BUS-CSO-03-001', 'ALEX ISKANDAR', '81dc9bdb52d04dc20036dbd8313ed055', 'BUS-CSO-03', 'Cikarang', '021010101', '2000-02-03', 'STAFF'),
('BUS-CSO-03-002', 'BADEN S', '81dc9bdb52d04dc20036dbd8313ed055', 'BUS-CSO-03', 'Cikarang', '021010101', '1994-07-01', 'STAFF'),
('BUS-DRT-01-001', 'CINTADI', '81dc9bdb52d04dc20036dbd8313ed055', 'BUS-DRT-01', 'Cikarang', '021010101', '1996-12-01', 'DIREKTUR'),
('BUS-MKT-02-001', 'SUTARNO', '81dc9bdb52d04dc20036dbd8313ed055', 'BUS-MKT-02', 'Cikarang', '021010101', '1996-08-01', 'SPV'),
('BUS-PUR-02-001', 'HERRY SUPARLAN', '81dc9bdb52d04dc20036dbd8313ed055', 'BUS-PUR-02', 'Cikarang', '021010101', '2013-11-11', 'SPV'),
('BUS-PUR-03-001', 'MARGIANTO', '81dc9bdb52d04dc20036dbd8313ed055', 'BUS-PUR-03', 'Cikarang', '021010101', '2002-02-19', 'STAFF'),
('FA-DRT-01-001', 'SEPTEDDY', '81dc9bdb52d04dc20036dbd8313ed055', 'FA-DRT-01', 'Cikarang', '021010101', '2001-08-08', 'DIREKTUR'),
('FA-IWC-01-001', 'AVE GUNAWAN S', '81dc9bdb52d04dc20036dbd8313ed055', 'FA-IWC-01', 'Cikarang', '021010101', '2013-09-02', 'MANAGER'),
('FA-IWC-03-001', 'MARIA TRI RIANTINI', '81dc9bdb52d04dc20036dbd8313ed055', 'FA-IWC-03', 'Cikarang', '021010101', '2017-07-12', 'STAFF'),
('FA-IWC-03-002', 'ARIYANTI IKA WULANDARI', '81dc9bdb52d04dc20036dbd8313ed055', 'FA-IWC-03', 'Cikarang', '021010101', '2007-10-18', 'STAFF'),
('FA-IWC-03-003', 'NORMA WULANDARI', '81dc9bdb52d04dc20036dbd8313ed055', 'FA-IWC-03', 'Cikarang', '021010101', '2015-07-27', 'STAFF'),
('FA-IWC-03-004', 'HENDRY SUDARMONO', '81dc9bdb52d04dc20036dbd8313ed055', 'FA-IWC-03', 'Cikarang', '021010101', '2015-06-22', 'STAFF'),
('FA-IWC-03-005', 'ARIFIN SUPARDAN', '81dc9bdb52d04dc20036dbd8313ed055', 'FA-IWC-03', 'Cikarang', '021010101', '2018-03-01', 'STAFF'),
('FA-IWC-03-006', 'GISWANTO', '81dc9bdb52d04dc20036dbd8313ed055', 'FA-IWC-03', 'Cikarang', '021010101', '1999-09-06', 'STAFF'),
('FA-IWC-04-001', 'YETI DWI LESTARI', '81dc9bdb52d04dc20036dbd8313ed055', 'FA-IWC-04', 'Cikarang', '021010101', '1996-10-04', 'LEADER'),
('FA-IWC-05-001', 'ARIF ARROHMAN', '81dc9bdb52d04dc20036dbd8313ed055', 'FA-IWC-05', 'Cikarang', '021010101', '2011-03-31', 'OPERATOR'),
('FA-IWC-05-002', 'FITRI HARYANTO', '81dc9bdb52d04dc20036dbd8313ed055', 'FA-IWC-05', 'Cikarang', '021010101', '2005-09-28', 'OPERATOR'),
('FA-IWC-05-003', 'SUPARNO', '81dc9bdb52d04dc20036dbd8313ed055', 'FA-IWC-05', 'Cikarang', '021010101', '2007-10-15', 'OPERATOR'),
('OPT-DRT-01-001', 'DEDI SUTARTO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-DRT-01', 'Cikarang', '021010101', '2001-11-15', 'DIREKTUR'),
('OPT-ENG-02-001', 'KRISNA YUWANA', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-ENG-02', 'Cikarang', '021010101', '1995-08-15', 'SPV'),
('OPT-ENG-04-001', 'JUMADI', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-ENG-04', 'Cikarang', '021010101', '1995-05-02', 'LEADER'),
('OPT-ENG-05-001', 'ANDI HIDAYATULLAH', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-ENG-05', 'Cikarang', '021010101', '2005-05-14', 'OPERATOR'),
('OPT-FGI-04-001', 'EKO PRASETYO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-FGI-04', 'Cikarang', '021010101', '2016-09-26', 'LEADER'),
('OPT-FGI-05-001', 'JOKO SUYANTO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-FGI-05', 'Cikarang', '021010101', '2000-08-21', 'OPERATOR'),
('OPT-FGI-05-002', 'KAMDARI', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-FGI-05', 'Cikarang', '021010101', '1997-07-28', 'OPERATOR'),
('OPT-FGI-05-003', 'SIGIT SUROHMAT', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-FGI-05', 'Cikarang', '021010101', '2010-06-28', 'OPERATOR'),
('OPT-FGI-05-004', 'BAMBANG IRAWAN', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-FGI-05', 'Cikarang', '021010101', '2001-09-04', 'OPERATOR'),
('OPT-FGI-05-005', 'DEDY KUSDARYANTO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-FGI-05', 'Cikarang', '021010101', '2000-02-14', 'OPERATOR'),
('OPT-FGI-05-006', 'ESTI SANTOSO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-FGI-05', 'Cikarang', '021010101', '1999-09-02', 'OPERATOR'),
('OPT-FGI-05-007', 'HARYANA', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-FGI-05', 'Cikarang', '021010101', '2001-06-23', 'OPERATOR'),
('OPT-FGI-05-008', 'HENDRIK BIN SADJAK', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-FGI-05', 'Cikarang', '021010101', '1996-04-01', 'OPERATOR'),
('OPT-FGI-05-009', 'MULYONO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-FGI-05', 'Cikarang', '021010101', '2003-08-21', 'OPERATOR'),
('OPT-FGI-05-010', 'RUSTAM EFENDI', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-FGI-05', 'Cikarang', '021010101', '1999-04-07', 'OPERATOR'),
('OPT-FGI-05-011', 'SUGIARTO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-FGI-05', 'Cikarang', '021010101', '2002-04-29', 'OPERATOR'),
('OPT-FGI-05-012', 'SUPRAMONO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-FGI-05', 'Cikarang', '021010101', '2004-02-24', 'OPERATOR'),
('OPT-FGI-05-013', 'SUPRIYADI', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-FGI-05', 'Cikarang', '021010101', '1999-06-29', 'OPERATOR'),
('OPT-PPC-02-001', 'LENNY KUSUMADEWI', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PPC-02', 'Cikarang', '021010101', '2000-02-07', 'SPV'),
('OPT-PPC-05-001', 'YANTA DARMAWAN', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PPC-05', 'Cikarang', '021010101', '2000-04-26', 'OPERATOR'),
('OPT-PPC-05-002', 'HENDRAYADI', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PPC-05', 'Cikarang', '021010101', '1995-05-08', 'OPERATOR'),
('OPT-PRM-01-001', 'SUBANDI', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-01', 'Cikarang', '021010101', '1994-08-16', 'MANAGER'),
('OPT-PRM-02-001', 'SUPRIYO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-02', 'Cikarang', '021010101', '1994-10-17', 'SPV'),
('OPT-PRM-02-002', 'ASMAT', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-02', 'Cikarang', '021010101', '1995-05-01', 'SPV'),
('OPT-PRM-04-001', 'ILHAM JAUHARI', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-04', 'Cikarang', '021010101', '1995-05-11', 'LEADER'),
('OPT-PRM-04-002', 'MARTOHANG S', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-04', 'Cikarang', '021010101', '2000-02-14', 'LEADER'),
('OPT-PRM-04-003', 'MISBAHUL MUNIR', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-04', 'Cikarang', '021010101', '2000-07-14', 'LEADER'),
('OPT-PRM-04-004', 'RIYATNO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-04', 'Cikarang', '021010101', '2002-08-21', 'LEADER'),
('OPT-PRM-04-005', 'UCU SUPARNO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-04', 'Cikarang', '021010101', '1996-10-22', 'LEADER'),
('OPT-PRM-04-006', 'DWI YANTO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-04', 'Cikarang', '021010101', '2000-07-20', 'LEADER'),
('OPT-PRM-04-007', 'MUHAMAD SUBKHAN', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-04', 'Cikarang', '021010101', '1997-04-15', 'LEADER'),
('OPT-PRM-04-008', 'SETIAWAN DARYANTO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-04', 'Cikarang', '021010101', '1996-03-11', 'LEADER'),
('OPT-PRM-04-009', 'PINGIT PINILIH', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-04', 'Cikarang', '021010101', '1998-10-05', 'LEADER'),
('OPT-PRM-04-010', 'UMAR BIN KOTOB', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-04', 'Cikarang', '021010101', '1999-08-05', 'LEADER'),
('OPT-PRM-04-012', 'TEGUH SANTOSO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-04', 'Cikarang', '021010101', '2001-02-02', 'LEADER'),
('OPT-PRM-05-001', 'DEDI SUPRIYADI', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2007-10-26', 'OPERATOR'),
('OPT-PRM-05-002', 'AGUS SUPRAPTO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2001-03-01', 'OPERATOR'),
('OPT-PRM-05-003', 'ABDUL HARIS', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2006-03-05', 'OPERATOR'),
('OPT-PRM-05-004', 'UBASORI PANDIANGAN', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2001-01-30', 'OPERATOR'),
('OPT-PRM-05-005', 'TURIJAN', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2006-09-04', 'OPERATOR'),
('OPT-PRM-05-006', 'TRI SUDIYANTO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2003-10-21', 'OPERATOR'),
('OPT-PRM-05-007', 'SUHARSO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2000-04-24', 'OPERATOR'),
('OPT-PRM-05-008', 'SUGITO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2002-09-17', 'OPERATOR'),
('OPT-PRM-05-009', 'SOLIKIN', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2005-08-01', 'OPERATOR'),
('OPT-PRM-05-010', 'SELAMET RIYADI SUBAGJA', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2009-12-17', 'OPERATOR'),
('OPT-PRM-05-011', 'NURWANTO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2003-09-04', 'OPERATOR'),
('OPT-PRM-05-012', 'M. FATKHUROHIM', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2009-10-12', 'OPERATOR'),
('OPT-PRM-05-013', 'EKO SUPRIYANTO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2003-09-24', 'OPERATOR'),
('OPT-PRM-05-014', 'BIMBIM SUSANTO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2000-07-06', 'OPERATOR'),
('OPT-PRM-05-015', 'SUTRISNO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2010-11-29', 'OPERATOR'),
('OPT-PRM-05-016', 'WASIS SETYA PUJI', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2010-10-08', 'OPERATOR'),
('OPT-PRM-05-017', 'WAHYU HIDAYAT', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2006-07-06', 'OPERATOR'),
('OPT-PRM-05-018', 'TRIYONO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2003-09-23', 'OPERATOR'),
('OPT-PRM-05-019', 'TAUFIK SAFARI', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2003-05-17', 'OPERATOR'),
('OPT-PRM-05-020', 'NANA MULYANA', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2006-09-04', 'OPERATOR'),
('OPT-PRM-05-021', 'ISTANTO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2003-09-24', 'OPERATOR'),
('OPT-PRM-05-022', 'FAJAR ISMANTO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2005-06-02', 'OPERATOR'),
('OPT-PRM-05-023', 'DEDI ISWANTO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2003-09-30', 'OPERATOR'),
('OPT-PRM-05-024', 'SARJIMAN', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2003-06-21', 'OPERATOR'),
('OPT-PRM-05-025', 'KUSNADI BIN ACENG', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2002-07-02', 'OPERATOR'),
('OPT-PRM-05-026', 'DEBI AHMADI', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2005-07-21', 'OPERATOR'),
('OPT-PRM-05-027', 'ARIF ZAENUDDIN', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2008-03-26', 'OPERATOR'),
('OPT-PRM-05-028', 'AHMAD FAIZIN', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2000-04-24', 'OPERATOR'),
('OPT-PRM-05-029', 'NASIB TUGIMAN', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2010-09-20', 'OPERATOR'),
('OPT-PRM-05-030', 'MUHKLISIN', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2010-07-26', 'OPERATOR'),
('OPT-PRM-05-031', 'FAJAR RISTIANTO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2010-12-06', 'OPERATOR'),
('OPT-PRM-05-032', 'BABANG SABARNA', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2005-01-26', 'OPERATOR'),
('OPT-PRM-05-033', 'AHAD RIYADI', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2011-03-14', 'OPERATOR'),
('OPT-PRM-05-034', 'TAYIM', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2003-12-05', 'OPERATOR'),
('OPT-PRM-05-035', 'SUYANTO B', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2011-03-14', 'OPERATOR'),
('OPT-PRM-05-036', 'SUDIRMAN', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2009-12-04', 'OPERATOR'),
('OPT-PRM-05-037', 'SLAMET ISWANTO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2006-06-29', 'OPERATOR'),
('OPT-PRM-05-038', 'RUDI IRWANTO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2005-05-27', 'OPERATOR'),
('OPT-PRM-05-039', 'RUDI HARTONO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '1996-10-22', 'OPERATOR'),
('OPT-PRM-05-040', 'IMAM PRABOWO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2007-07-11', 'OPERATOR'),
('OPT-PRM-05-041', 'DEDI LESMANA', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2003-11-05', 'OPERATOR'),
('OPT-PRM-05-042', 'YAYA WARYA', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2005-04-21', 'OPERATOR'),
('OPT-PRM-05-043', 'TRIGIYANTO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2005-01-29', 'OPERATOR'),
('OPT-PRM-05-044', 'NURUL ARIFIN', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2010-07-26', 'OPERATOR'),
('OPT-PRM-05-045', 'IIN YASIN', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '1999-10-04', 'OPERATOR'),
('OPT-PRM-05-046', 'HERMAWAN', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2004-10-06', 'OPERATOR'),
('OPT-PRM-05-047', 'EDI NOVRIANSYAH', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '1999-04-07', 'OPERATOR'),
('OPT-PRM-05-048', 'EDI MARYANTO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2004-10-29', 'OPERATOR'),
('OPT-PRM-05-049', 'ASMAN', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2000-09-07', 'OPERATOR'),
('OPT-PRM-05-050', 'ALI MANSUR BIN ARSA', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2000-07-13', 'OPERATOR'),
('OPT-PRM-05-051', 'AJAT SUDRAJAT', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2002-10-01', 'OPERATOR'),
('OPT-PRM-05-052', 'ABDUL KODIR JAELANI', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2002-05-23', 'OPERATOR'),
('OPT-PRM-05-053', 'WARJONO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2004-01-06', 'OPERATOR'),
('OPT-PRM-05-054', 'SUYANTO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2005-01-15', 'OPERATOR'),
('OPT-PRM-05-055', 'ROHADI', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2011-10-25', 'OPERATOR'),
('OPT-PRM-05-056', 'NURYANTO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2001-03-06', 'OPERATOR'),
('OPT-PRM-05-057', 'MARTONO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '1999-12-06', 'OPERATOR'),
('OPT-PRM-05-058', 'M.S. SETIAWAN', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2010-08-16', 'OPERATOR'),
('OPT-PRM-05-059', 'HENDRA SN', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-PRM-05', 'Cikarang', '021010101', '2006-09-11', 'OPERATOR'),
('OPT-QLA-01-001', 'IMAM WAHYUDI', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-01', 'Cikarang', '021010101', '2008-08-08', 'MANAGER'),
('OPT-QLA-02-001', 'MULYADI', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-02', 'Cikarang', '021010101', '2018-07-16', 'SPV'),
('OPT-QLA-02-002', 'MARYONO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-02', 'Cikarang', '021010101', '2016-02-22', 'SPV'),
('OPT-QLA-02-003', 'BAMBANG PRIJANTO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-02', 'Cikarang', '021010101', '1994-11-14', 'SPV'),
('OPT-QLA-04-001', 'SUHENDAR', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-04', 'Cikarang', '021010101', '1997-02-28', 'LEADER'),
('OPT-QLA-04-002', 'SAMSUL HALIM', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-04', 'Cikarang', '021010101', '2001-01-10', 'LEADER'),
('OPT-QLA-04-003', 'NUROHMAN', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-04', 'Cikarang', '021010101', '2001-01-30', 'LEADER'),
('OPT-QLA-04-004', 'MOCH. LEBAR ISMAIL', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-04', 'Cikarang', '021010101', '1995-03-27', 'LEADER'),
('OPT-QLA-05-001', 'WALYUDI', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-05', 'Cikarang', '021010101', '2006-06-22', 'OPERATOR'),
('OPT-QLA-05-002', 'WAHYUDI', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-05', 'Cikarang', '021010101', '2007-07-12', 'OPERATOR'),
('OPT-QLA-05-003', 'UNTUNG ANTON S. W', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-05', 'Cikarang', '021010101', '2000-10-06', 'OPERATOR'),
('OPT-QLA-05-004', 'SUPRIADI', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-05', 'Cikarang', '021010101', '2002-08-26', 'OPERATOR'),
('OPT-QLA-05-005', 'SUNARTO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-05', 'Cikarang', '021010101', '2004-01-06', 'OPERATOR'),
('OPT-QLA-05-006', 'SUNANDAR', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-05', 'Cikarang', '021010101', '2003-08-21', 'OPERATOR'),
('OPT-QLA-05-007', 'TOTOK HARYANTO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-05', 'Cikarang', '021010101', '1998-07-21', 'OPERATOR'),
('OPT-QLA-05-008', 'SANUSI', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-05', 'Cikarang', '021010101', '1997-04-14', 'OPERATOR'),
('OPT-QLA-05-009', 'ACHMAD GUNADI', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-05', 'Cikarang', '021010101', '1996-03-11', 'OPERATOR'),
('OPT-QLA-05-010', 'SUADI', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-05', 'Cikarang', '021010101', '2010-12-06', 'OPERATOR'),
('OPT-QLA-05-011', 'SAEFUL AMRI', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-05', 'Cikarang', '021010101', '2010-06-07', 'OPERATOR'),
('OPT-QLA-05-012', 'RUDIANTO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-05', 'Cikarang', '021010101', '2009-10-27', 'OPERATOR'),
('OPT-QLA-05-013', 'RUDI SARJANA', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-05', 'Cikarang', '021010101', '2005-11-14', 'OPERATOR'),
('OPT-QLA-05-014', 'RAHMAD WAHYUDI', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-05', 'Cikarang', '021010101', '2007-06-26', 'OPERATOR'),
('OPT-QLA-05-015', 'NANANG SOPYAN', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-05', 'Cikarang', '021010101', '2006-09-04', 'OPERATOR'),
('OPT-QLA-05-016', 'MUHAMMAD NURROHIM', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-05', 'Cikarang', '021010101', '2010-01-19', 'OPERATOR'),
('OPT-QLA-05-017', 'MUHAMMAD ABD MAJID', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-05', 'Cikarang', '021010101', '2007-12-03', 'OPERATOR'),
('OPT-QLA-05-018', 'MUH HASIM', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-05', 'Cikarang', '021010101', '2003-09-24', 'OPERATOR'),
('OPT-QLA-05-019', 'AHMAD SAEFUL', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-05', 'Cikarang', '021010101', '2010-07-21', 'OPERATOR'),
('OPT-QLA-05-020', 'MINTON GURNING', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-05', 'Cikarang', '021010101', '2003-09-24', 'OPERATOR'),
('OPT-QLA-05-021', 'MIFTAHUL MUNIR', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-05', 'Cikarang', '021010101', '2011-02-28', 'OPERATOR'),
('OPT-QLA-05-022', 'KATENI', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-05', 'Cikarang', '021010101', '2000-04-24', 'OPERATOR'),
('OPT-QLA-05-023', 'IWAN KARYAWAN', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-05', 'Cikarang', '021010101', '2004-09-07', 'OPERATOR'),
('OPT-QLA-05-024', 'INDRA GUNAWAN', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-05', 'Cikarang', '021010101', '1997-01-17', 'OPERATOR'),
('OPT-QLA-05-025', 'ILMAN', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-05', 'Cikarang', '021010101', '2000-07-24', 'OPERATOR'),
('OPT-QLA-05-026', 'HERRY KUSMANTO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-05', 'Cikarang', '021010101', '2006-10-05', 'OPERATOR'),
('OPT-QLA-05-027', 'GILANG BUDI IMANSAH', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-05', 'Cikarang', '021010101', '2010-10-07', 'OPERATOR'),
('OPT-QLA-05-028', 'FATKUR ROHMAN', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-05', 'Cikarang', '021010101', '2010-04-26', 'OPERATOR'),
('OPT-QLA-05-029', 'EKO SUSANTO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-05', 'Cikarang', '021010101', '2010-09-20', 'OPERATOR'),
('OPT-QLA-05-030', 'DIDIK TIMBUL WIDODO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-05', 'Cikarang', '021010101', '2002-04-29', 'OPERATOR'),
('OPT-QLA-05-031', 'DEDE TEDI RUSWANDI', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-05', 'Cikarang', '021010101', '2001-06-23', 'OPERATOR'),
('OPT-QLA-05-032', 'CAHYA ARIES PRAMBUDI', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-05', 'Cikarang', '021010101', '2008-07-11', 'OPERATOR'),
('OPT-QLA-05-033', 'BUDIYONO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-05', 'Cikarang', '021010101', '2000-05-22', 'OPERATOR'),
('OPT-QLA-05-034', 'BAMBANG IRAWAN', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-05', 'Cikarang', '021010101', '2000-02-14', 'OPERATOR'),
('OPT-QLA-05-035', 'ANGGA RIANSYAH', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-05', 'Cikarang', '021010101', '2010-07-21', 'OPERATOR'),
('OPT-QLA-05-036', 'AHMAD SYURLIAN', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-05', 'Cikarang', '021010101', '1995-10-02', 'OPERATOR'),
('OPT-QLA-05-037', 'AHMAD SUPRIYANTO', '81dc9bdb52d04dc20036dbd8313ed055', 'OPT-QLA-05', 'Cikarang', '021010101', '1999-05-05', 'OPERATOR');

-- --------------------------------------------------------

--
-- Table structure for table `permohonan`
--

CREATE TABLE `permohonan` (
  `id_permohonan` varchar(15) NOT NULL,
  `id_pegawai` varchar(15) NOT NULL,
  `tgl_mulai` date NOT NULL,
  `tgl_selesai` date NOT NULL,
  `jml_hari` int NOT NULL,
  `id_cuti` varchar(10) NOT NULL,
  `keterangan` text NOT NULL,
  `validasi` enum('Pending','Setuju','Tolak','') NOT NULL,
  `user_create` varchar(15) NOT NULL,
  `user_update` varchar(15) DEFAULT NULL,
  `tgl_permohonan` date DEFAULT NULL,
  `tgl_validasi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `permohonan`
--

INSERT INTO `permohonan` (`id_permohonan`, `id_pegawai`, `tgl_mulai`, `tgl_selesai`, `jml_hari`, `id_cuti`, `keterangan`, `validasi`, `user_create`, `user_update`, `tgl_permohonan`, `tgl_validasi`) VALUES
('PR-0001', 'ADM-DRT-01-001', '2018-12-24', '2018-12-29', 4, 'CT-001', 'testing', 'Setuju', 'ADM-DRT-01-0005', 'ADM-DRT-01-0005', '2018-12-23', '2018-12-23'),
('PR-0002', 'ADM-DRT-01-001', '2018-09-03', '2018-09-05', 3, 'CT-001', 'das', 'Setuju', 'ADM-DRT-01-0005', 'ADM-DRT-01-0005', '2018-12-23', '2018-12-23'),
('PR-0003', 'ADM-DRT-01-001', '2018-12-17', '2018-12-21', 5, 'CT-001', 'dsa', 'Setuju', 'ADM-DRT-01-0005', 'ADM-DRT-01-0005', '2018-12-23', '2018-12-23'),
('PR-0004', 'ADM-HQD-04-001', '2018-12-24', '2018-12-29', 4, 'CT-001', 'ds', 'Setuju', 'ADM-DRT-01-0005', 'ADM-DRT-01-0005', '2018-12-23', '2018-12-23'),
('PR-0005', 'ADM-DRT-01-001', '2019-12-17', '2019-12-19', 3, 'CT-001', 'sasa', 'Setuju', 'ADM-DRT-01-0005', 'ADM-DRT-01-0005', '2018-12-23', '2018-12-23'),
('PR-0006', 'ADM-HQD-04-001', '2018-12-24', '2018-12-26', 2, 'CT-002', 'dsa', 'Pending', 'ADM-DRT-01-0005', NULL, '2018-12-23', NULL),
('PR-0007', 'ADM-HQD-02-002', '2018-12-24', '2018-12-27', 3, 'CT-001', 'dsa', 'Pending', 'ADM-DRT-01-0005', NULL, '2018-12-23', NULL);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_pegawai`
-- (See below for the actual view)
--
CREATE TABLE `view_pegawai` (
`alamat` text
,`batas_atas` date
,`batas_bawah` date
,`id_jabatan` varchar(10)
,`id_pegawai` varchar(15)
,`nama_pegawai` varchar(50)
,`no_tlp` varchar(13)
,`password` varchar(50)
,`tipe_user` varchar(15)
,`tmk` date
,`waktu_kerja` bigint
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `view_permohonan`
-- (See below for the actual view)
--
CREATE TABLE `view_permohonan` (
`cuti_kpd` varchar(25)
,`id_cuti` varchar(6)
,`id_departemen` varchar(7)
,`id_jabatan` varchar(15)
,`id_pegawai` varchar(15)
,`id_permohonan` varchar(15)
,`jml_hari` int
,`keterangan` text
,`nama_departemen` varchar(50)
,`nama_jabatan` varchar(50)
,`nama_pegawai` varchar(50)
,`tgl_mulai` date
,`tgl_permohonan` date
,`tgl_selesai` date
,`tgl_validasi` date
,`tipe_user` varchar(15)
,`user_create` varchar(15)
,`user_update` varchar(15)
,`validasi` enum('Pending','Setuju','Tolak','')
);

-- --------------------------------------------------------

--
-- Structure for view `view_pegawai`
--
DROP TABLE IF EXISTS `view_pegawai`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_pegawai`  AS SELECT `pegawai`.`id_pegawai` AS `id_pegawai`, `pegawai`.`nama_pegawai` AS `nama_pegawai`, `pegawai`.`password` AS `password`, `pegawai`.`id_jabatan` AS `id_jabatan`, `pegawai`.`alamat` AS `alamat`, `pegawai`.`no_tlp` AS `no_tlp`, `pegawai`.`tmk` AS `tmk`, `pegawai`.`tipe_user` AS `tipe_user`, timestampdiff(YEAR,`pegawai`.`tmk`,curdate()) AS `waktu_kerja`, (`pegawai`.`tmk` + interval timestampdiff(YEAR,`pegawai`.`tmk`,curdate()) year) AS `batas_bawah`, ((`pegawai`.`tmk` + interval timestampdiff(YEAR,`pegawai`.`tmk`,curdate()) year) + interval 1 year) AS `batas_atas` FROM `pegawai``pegawai`  ;

-- --------------------------------------------------------

--
-- Structure for view `view_permohonan`
--
DROP TABLE IF EXISTS `view_permohonan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `view_permohonan`  AS SELECT `permohonan`.`id_pegawai` AS `id_pegawai`, `pegawai`.`nama_pegawai` AS `nama_pegawai`, `jabatan`.`id_jabatan` AS `id_jabatan`, `jabatan`.`nama_jabatan` AS `nama_jabatan`, `departemen`.`id_departemen` AS `id_departemen`, `departemen`.`nama_departemen` AS `nama_departemen`, `cuti`.`id_cuti` AS `id_cuti`, `cuti`.`cuti_kpd` AS `cuti_kpd`, `permohonan`.`id_permohonan` AS `id_permohonan`, `permohonan`.`tgl_mulai` AS `tgl_mulai`, `permohonan`.`tgl_selesai` AS `tgl_selesai`, `permohonan`.`keterangan` AS `keterangan`, `permohonan`.`validasi` AS `validasi`, `permohonan`.`user_create` AS `user_create`, `pegawai`.`tipe_user` AS `tipe_user`, `permohonan`.`user_update` AS `user_update`, `permohonan`.`jml_hari` AS `jml_hari`, `permohonan`.`tgl_permohonan` AS `tgl_permohonan`, `permohonan`.`tgl_validasi` AS `tgl_validasi` FROM ((((`permohonan` join `cuti`) join `jabatan`) join `departemen`) join `pegawai`) WHERE ((`permohonan`.`id_pegawai` = `pegawai`.`id_pegawai`) AND (`pegawai`.`id_jabatan` = `jabatan`.`id_jabatan`) AND (`departemen`.`id_departemen` = `jabatan`.`id_departemen`) AND (`permohonan`.`id_cuti` = `cuti`.`id_cuti`))  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cuti`
--
ALTER TABLE `cuti`
  ADD PRIMARY KEY (`id_cuti`);

--
-- Indexes for table `departemen`
--
ALTER TABLE `departemen`
  ADD PRIMARY KEY (`id_departemen`);

--
-- Indexes for table `detail_permohonan`
--
ALTER TABLE `detail_permohonan`
  ADD PRIMARY KEY (`id_detail_permohonan`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `libur`
--
ALTER TABLE `libur`
  ADD PRIMARY KEY (`id_libur`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`);

--
-- Indexes for table `permohonan`
--
ALTER TABLE `permohonan`
  ADD PRIMARY KEY (`id_permohonan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `detail_permohonan`
--
ALTER TABLE `detail_permohonan`
  MODIFY `id_detail_permohonan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `libur`
--
ALTER TABLE `libur`
  MODIFY `id_libur` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
