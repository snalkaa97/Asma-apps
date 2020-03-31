-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 09, 2019 at 05:52 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `asma`
--

-- --------------------------------------------------------

--
-- Table structure for table `basis_aturan`
--

CREATE TABLE `basis_aturan` (
  `id_gejala` varchar(10) DEFAULT NULL,
  `pertanyaan` varchar(300) DEFAULT NULL,
  `fakta_ya` varchar(150) DEFAULT NULL,
  `fakta_tidak` varchar(150) DEFAULT NULL,
  `ngejala_akut` double NOT NULL,
  `ngejala_kronis` double NOT NULL,
  `ngejala_periodik` double NOT NULL,
  `rute` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `id_penyakit` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `basis_aturan`
--

INSERT INTO `basis_aturan` (`id_gejala`, `pertanyaan`, `fakta_ya`, `fakta_tidak`, `ngejala_akut`, `ngejala_kronis`, `ngejala_periodik`, `rute`, `status`, `id_penyakit`) VALUES
('g1', 'Apakah ada bunyi napas (mengi)?', 'Ada bunyi napas(mengi)', 'Tidak terasa bunyi napas (mengi)', 0.83, 0.75, 0.33, 'g2', '', 0),
('g2', 'Apakah batuk?', 'Batuk', 'Tidak batuk', 0.83, 0.88, 0.67, 'g3', '', 0),
('g3', 'Apakah sesak napas tiba-tiba?', 'Sesak napas tiba-tiba', 'Tidak terjadi Sesak napas tiba-tiba', 0.83, 1, 0.83, 'g4', '', 0),
('g4', 'Apakah intensitas sesak yang berat?', 'Intensitas sesak yang berat', 'Tidak terjadi intensitas sesak yang berat', 0.67, 0.5, 0.33, 'g5', '', 0),
('g5', 'Apakah dada terasa berat?', 'Dada terasa berat', 'Dada tidak terasa berat', 0, 0.5, 0.17, 'g6', '', 0),
('g6', 'Apakah gelisah?', 'Gelisah', 'Tidak Gelisah', 0.5, 0.38, 0.67, 'g7', '', 0),
('g7', 'Apakah sesak napas kambuh-kambuh?', 'Sesak napas kambuh-kambuh', 'Tidak mengalami Sesak napas kambuh-kambuh', 0.67, 0.38, 0.5, 'g8', '', 0),
('g8', 'Apakah intensitas sesak dari ringan hingga sedang', 'Intensitas sesak dari ringan sampai sedang', 'Tidak mengalami intensitas sesak ringan sampai sedang', 0.33, 0.5, 0.17, 'g9', '', 0),
('g9', 'Apakah kadang ada bunyi napas(mengi) dan kadang tidak?', 'Kadang mengi kadang tidak', 'Tidak ada bunyi napas', 0.17, 0.5, 0.5, 'g10', '', 0),
('g10', 'Apakah kadang batuk?', 'Kadang batuk', 'Tidak batuk', 0.17, 0.25, 0.83, 'g11', '', 0),
('g11', 'Apakah sesak napas yang sering kambuh karena penyebab tertentu misal debu, asap, dan udara dingin?', 'Sesak napas yang sering kambuh, karena penyebab tertentu misal debu, asap, dan udara dingin.', 'Tidak pernah mengalami sesak napas', 0, 1, 0, 'final', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `daftar_gejala`
--

CREATE TABLE `daftar_gejala` (
  `id_gejala` varchar(10) DEFAULT NULL,
  `gejala` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_gejala`
--

INSERT INTO `daftar_gejala` (`id_gejala`, `gejala`) VALUES
('g1', 'ada bunyi saat bernafas'),
('g2', 'batuk'),
('g3', 'sesak napas tiba-tiba'),
('g4', 'intensitas sesak napas yang berat'),
('g5', 'dada terasa berat'),
('g6', 'gelisah'),
('g7', 'sering sesak napas'),
('g8', 'sering sesak ringan sampai berat'),
('g9', 'bunyi napas kadang terdengar kadang tidak'),
('g10', 'kadang ada batuk'),
('g11', 'sesak napas akibat sesuatu seperti debu, asap, uda');

-- --------------------------------------------------------

--
-- Table structure for table `daftar_penyakit`
--

CREATE TABLE `daftar_penyakit` (
  `id_penyakit` varchar(10) DEFAULT NULL,
  `nama_penyakit` varchar(50) DEFAULT NULL,
  `npenyakit` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_penyakit`
--

INSERT INTO `daftar_penyakit` (`id_penyakit`, `nama_penyakit`, `npenyakit`) VALUES
('p1', 'asma akut', 0.3),
('p2', 'asma kronis', 0.3),
('p3', 'asma periodik', 0.4);

-- --------------------------------------------------------

--
-- Table structure for table `daftar_solusi`
--

CREATE TABLE `daftar_solusi` (
  `id_solusi` varchar(10) DEFAULT NULL,
  `solusi` varchar(300) DEFAULT NULL,
  `id_penyakit` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar_solusi`
--

INSERT INTO `daftar_solusi` (`id_solusi`, `solusi`, `id_penyakit`) VALUES
('s0', 'Anda tidak terdeteksi menderita penyakit asma', 'p0'),
('s1', 'Dapat menggunakan obat-obatan asma inhaler nebulizer atau suntikan', 'p2'),
('s2', 'Hindari penyebab asma, minum obat  asma saat terasa sesak, olahraga, dan jangan terlalu lelah', 'p3'),
('s3', 'Hindari penyebab asma, minum obat asma jika kambuh, olah raga, hidari stres, dan jangan terlalu lelah', 'p1'),
('s4', 'Hindari penyebab alergi misalnya debu, tepung sari, makanan tertentu, terkadang sembuh sendiri tanpa obat, desensitiasi', 'p2'),
('s5', 'Obat penyebab infeksi misalnya dengan antibiotik, dan minum obat asma', 'p3'),
('s6', 'Dapat diberikan nebulizer, beri oksigen, dan suntik obat-obatan asma.', 'p1'),
('s7', 'Dapat diberikan nebulizer, beri oksigen, dan obat-obatan oral.', 'p2'),
('s8', 'Dapat diberikan nebulizer dan obat-obatan oral.', 'p3'),
('s9', 'Ubahlah kondisi kerja. Hal ini dapat berupa dipindahkan kebagian lain.', 'p1'),
('s10', 'Dapat diberikan obat Montelukast (Singulair) dan obat antagonis reseptor leukotrin yang dapat mencegah leukotrin agar tidak dapat bekerja secara normal.', 'p3'),
('s11', 'Pilih dan batasi beberapa jenis olahraga serta konsultasikan dengan profesional kesehatan atau dokter.', 'p2'),
(NULL, NULL, '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
