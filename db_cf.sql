-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2022 at 09:39 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_cf`
--

-- --------------------------------------------------------

--
-- Table structure for table `gejala`
--

CREATE TABLE `gejala` (
  `id_gejala` int(11) NOT NULL,
  `nama_gejala` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gejala`
--

INSERT INTO `gejala` (`id_gejala`, `nama_gejala`) VALUES
(1, 'Menunjukkan perilaku dekat dan akrab dengan anak.'),
(2, 'Menyukai tontonan video pornografi dengan objek anak-anak.'),
(3, 'Kerap melakukan perilaku seksual kepada anak, misalnya membuka pakaian.'),
(4, 'Perilaku berlangsung selama lebih dari 6 bulan dan terjadi secara terus menerus.'),
(5, 'Memiliki fantasi seksual terhadap objek, situasi, atau bagian tubuh tertentu yang tidak umum.'),
(6, 'Merasa terangsang apabila melihat benda atau bagian tubuh yang menjadi fetisnya.'),
(7, 'Senang mengekspos alat vital ke orang yang tidak dikenal.'),
(8, 'Senang melakukan aktivitas seksual di tempat umum atau luar ruangan.'),
(9, 'Merasa terangsang jika mengintip orang lain.'),
(10, 'Senang melakukan telepon seks.'),
(11, 'Lebih senang melihat daripada melakukan aktivitas seksual.'),
(12, 'Senang menyakiti secara fisik maupun non fisik.'),
(13, 'Menggunakan kekerasan dengan tujuan membangun sikap dominasi dalam sebuah hubungan.'),
(14, 'Lebih senang mendominasi saat melakukan aktivitas seksual.'),
(15, 'Senang saat disakiti secara fisik maupun non fisik.'),
(16, 'Lebih senang didominasi saat melakukan aktivitas seksual.'),
(17, 'Merasa terangsang saat disiksa.'),
(18, 'Merasa terangsang saat dipermalukan.'),
(19, 'Memiliki daya tarik terhadap bau busuk.'),
(20, 'Memiliki ketertarikan dalam berhubungan intim dengan orang yang sudah meninggal.'),
(21, 'Tidak mempunyai gairah seksual terhadap orang yang masih hidup.'),
(22, 'Memiliki dorongan kuat yang tak tertahankan untuk melakukan crossdressing.'),
(23, 'Senang membeli atau mengenakan pakaian yang tidak sesuai jenis kelamin.'),
(24, 'Terangsang saat mengenakan pakaian lawan jenis.'),
(25, 'Punya hasrat ingin bersetubuh dengan binatang.'),
(26, 'Memiliki rasa cinta atau ketertarikan secara emosi terhadap hewan.'),
(27, 'Terangsang saat melihat alat vital hewan.'),
(28, 'Memperoleh kepuasaan saat melakukan “gesekan”');

-- --------------------------------------------------------

--
-- Table structure for table `kondisi`
--

CREATE TABLE `kondisi` (
  `id` int(11) NOT NULL,
  `kondisi` varchar(64) NOT NULL,
  `ket` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kondisi`
--

INSERT INTO `kondisi` (`id`, `kondisi`, `ket`) VALUES
(1, 'Pasti ya', ''),
(2, 'Hampir pasti ya', ''),
(3, 'Kemungkinan besar ya', ''),
(4, 'Mungkin ya', ''),
(5, 'Tidak tahu', ''),
(6, 'Mungkin tidak', ''),
(7, 'Kemungkinan besar tidak', ''),
(8, 'Hampir pasti tidak', ''),
(9, 'Pasti tidak', '');

-- --------------------------------------------------------

--
-- Table structure for table `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id_konsultasi` int(11) NOT NULL,
  `user` varchar(191) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp(),
  `gejala` text NOT NULL,
  `penyakit` varchar(191) NOT NULL,
  `nilaicf` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konsultasi`
--

INSERT INTO `konsultasi` (`id_konsultasi`, `user`, `waktu`, `gejala`, `penyakit`, `nilaicf`) VALUES
(18, 'shuya@gmail.com', '2022-08-07 10:17:12', 'Menunjukkan perilaku dekat dan akrab dengan anak.,', 'Pedofilia', '0.20'),
(19, 'shuya@gmail.com', '2022-08-07 10:17:44', 'Menyukai tontonan video pornografi dengan objek anak-anak.,', 'Pedofilia', '0.80'),
(20, 'shuya@gmail.com', '2022-08-07 10:17:52', 'Menunjukkan perilaku dekat dan akrab dengan anak.,Menyukai tontonan video pornografi dengan objek anak-anak.,Kerap melakukan perilaku seksual kepada anak, misalnya membuka pakaian.,Perilaku berlangsung selama lebih dari 6 bulan dan terjadi secara terus menerus.,', 'Pedofilia', '0.99'),
(21, 'shuya@gmail.com', '2022-08-07 10:18:18', 'Merasa terangsang apabila melihat benda atau bagian tubuh yang menjadi fetisnya.,', 'Fetisisme', '0.80'),
(22, 'shuya@gmail.com', '2022-08-07 10:18:23', 'Menunjukkan perilaku dekat dan akrab dengan anak.,Merasa terangsang apabila melihat benda atau bagian tubuh yang menjadi fetisnya.,', 'Fetisisme', '0.80'),
(23, 'shuya@gmail.com', '2022-08-07 10:18:29', 'Menunjukkan perilaku dekat dan akrab dengan anak.,Menyukai tontonan video pornografi dengan objek anak-anak.,Kerap melakukan perilaku seksual kepada anak, misalnya membuka pakaian.,Senang mengekspos alat vital ke orang yang tidak dikenal.,', 'Pedofilia', '0.97'),
(24, 'shuya@gmail.com', '2022-08-07 10:18:41', 'Menunjukkan perilaku dekat dan akrab dengan anak.,Senang mengekspos alat vital ke orang yang tidak dikenal.,', 'Eksibisionisme', '0.80'),
(25, 'shuya@gmail.com', '2022-08-07 10:18:55', 'Menyukai tontonan video pornografi dengan objek anak-anak.,Kerap melakukan perilaku seksual kepada anak, misalnya membuka pakaian.,Perilaku berlangsung selama lebih dari 6 bulan dan terjadi secara terus menerus.,Senang mengekspos alat vital ke orang yang tidak dikenal.,Senang melakukan aktivitas seksual di tempat umum atau luar ruangan.,', 'Pedofilia', '0.98'),
(26, 'shuya@gmail.com', '2022-08-07 10:19:13', 'Menunjukkan perilaku dekat dan akrab dengan anak.,Perilaku berlangsung selama lebih dari 6 bulan dan terjadi secara terus menerus.,Merasa terangsang apabila melihat benda atau bagian tubuh yang menjadi fetisnya.,Senang mengekspos alat vital ke orang yang tidak dikenal.,Senang melakukan aktivitas seksual di tempat umum atau luar ruangan.,', 'Eksibisionisme', '0.95'),
(27, 'shuya@gmail.com', '2022-08-07 10:19:28', 'Menunjukkan perilaku dekat dan akrab dengan anak.,Menyukai tontonan video pornografi dengan objek anak-anak.,Kerap melakukan perilaku seksual kepada anak, misalnya membuka pakaian.,Perilaku berlangsung selama lebih dari 6 bulan dan terjadi secara terus menerus.,Memiliki fantasi seksual terhadap objek, situasi, atau bagian tubuh tertentu yang tidak umum.,Merasa terangsang apabila melihat benda atau bagian tubuh yang menjadi fetisnya.,Senang mengekspos alat vital ke orang yang tidak dikenal.,Senang melakukan aktivitas seksual di tempat umum atau luar ruangan.,Merasa terangsang jika mengintip orang lain.,Senang melakukan telepon seks.,Lebih senang melihat daripada melakukan aktivitas seksual.,', 'Pedofilia', '0.99'),
(28, 'shuya@gmail.com', '2022-08-07 10:19:58', 'Menyukai tontonan video pornografi dengan objek anak-anak.,', 'Pedofilia', '0.80'),
(29, 'shuya@gmail.com', '2022-08-07 10:20:03', 'Menyukai tontonan video pornografi dengan objek anak-anak.,Kerap melakukan perilaku seksual kepada anak, misalnya membuka pakaian.,', 'Pedofilia', '0.96'),
(30, 'shuya@gmail.com', '2022-08-07 10:20:10', 'Menyukai tontonan video pornografi dengan objek anak-anak.,Kerap melakukan perilaku seksual kepada anak, misalnya membuka pakaian.,Perilaku berlangsung selama lebih dari 6 bulan dan terjadi secara terus menerus.,', 'Pedofilia', '0.98'),
(31, 'shuya@gmail.com', '2022-08-07 12:02:34', 'Perilaku berlangsung selama lebih dari 6 bulan dan terjadi secara terus menerus.,Merasa terangsang jika mengintip orang lain.,Senang melakukan telepon seks.,Lebih senang melihat daripada melakukan aktivitas seksual.,', 'Pedofilia', '0.60'),
(32, 'shuya@gmail.com', '2022-08-07 12:05:14', 'Merasa terangsang jika mengintip orang lain.,Senang melakukan telepon seks.,Lebih senang melihat daripada melakukan aktivitas seksual.,', 'Voyeurisme', '0.27'),
(33, 'shuya@gmail.com', '2022-08-07 12:06:08', 'Merasa terangsang jika mengintip orang lain.,Senang melakukan telepon seks.,Lebih senang melihat daripada melakukan aktivitas seksual.,', 'Voyeurisme', '0.53'),
(34, 'shuya@gmail.com', '2022-08-07 12:06:52', 'Merasa terangsang jika mengintip orang lain.,Senang melakukan telepon seks.,Lebih senang melihat daripada melakukan aktivitas seksual.,', 'Voyeurisme', '0.60'),
(35, 'shuya@gmail.com', '2022-08-07 12:07:30', 'Perilaku berlangsung selama lebih dari 6 bulan dan terjadi secara terus menerus.,Memiliki fantasi seksual terhadap objek, situasi, atau bagian tubuh tertentu yang tidak umum.,Merasa terangsang jika mengintip orang lain.,Senang melakukan telepon seks.,Lebih senang melihat daripada melakukan aktivitas seksual.,', 'Fetisisme', '0.92'),
(36, 'shuya@gmail.com', '2022-08-07 12:08:58', 'Perilaku berlangsung selama lebih dari 6 bulan dan terjadi secara terus menerus.,Merasa terangsang jika mengintip orang lain.,Senang melakukan telepon seks.,Lebih senang melihat daripada melakukan aktivitas seksual.,', 'Voyeurisme', '0.57'),
(37, 'shuya@gmail.com', '2022-08-07 12:10:00', 'Merasa terangsang jika mengintip orang lain.,Senang melakukan telepon seks.,Lebih senang melihat daripada melakukan aktivitas seksual.,', 'Voyeurisme', '0.79'),
(38, 'shuya@gmail.com', '2022-08-07 12:10:11', 'Perilaku berlangsung selama lebih dari 6 bulan dan terjadi secara terus menerus.,Lebih senang melihat daripada melakukan aktivitas seksual.,', 'Voyeurisme', '0.82'),
(39, 'shuya@gmail.com', '2022-08-07 12:10:50', 'Merasa terangsang jika mengintip orang lain.,', 'Voyeurisme', '0.70'),
(40, 'shuya@gmail.com', '2022-08-07 12:20:02', 'Senang melakukan telepon seks.,', 'Voyeurisme', '0.35'),
(41, 'shuya@gmail.com', '2022-08-07 12:20:07', 'Senang melakukan telepon seks.,Lebih senang melihat daripada melakukan aktivitas seksual.,', 'Voyeurisme', '0.74'),
(42, 'shuya@gmail.com', '2022-08-07 12:20:20', 'Perilaku berlangsung selama lebih dari 6 bulan dan terjadi secara terus menerus.,Merasa terangsang jika mengintip orang lain.,Senang melakukan telepon seks.,Lebih senang melihat daripada melakukan aktivitas seksual.,', 'Voyeurisme', '0.72'),
(43, 'shuya@gmail.com', '2022-08-07 13:20:22', 'Senang mengekspos alat vital ke orang yang tidak dikenal.,', 'Eksibisionisme', '0.60'),
(44, 'shuya@gmail.com', '2022-08-07 13:20:45', 'Senang mengekspos alat vital ke orang yang tidak dikenal.,', 'Eksibisionisme', '0.65'),
(45, 'shuya@gmail.com', '2022-08-07 13:26:24', 'Menunjukkan perilaku dekat dan akrab dengan anak.,Merasa terangsang apabila melihat benda atau bagian tubuh yang menjadi fetisnya.,Senang mengekspos alat vital ke orang yang tidak dikenal.,', 'Fetisisme', '0.75'),
(46, 'shuya@gmail.com', '2022-08-07 13:26:34', 'Menunjukkan perilaku dekat dan akrab dengan anak.,Menyukai tontonan video pornografi dengan objek anak-anak.,Kerap melakukan perilaku seksual kepada anak, misalnya membuka pakaian.,Perilaku berlangsung selama lebih dari 6 bulan dan terjadi secara terus menerus.,Merasa terangsang apabila melihat benda atau bagian tubuh yang menjadi fetisnya.,', 'Fetisisme', '0.81'),
(47, 'shuya@gmail.com', '2022-08-07 13:27:21', 'Menunjukkan perilaku dekat dan akrab dengan anak.,Menyukai tontonan video pornografi dengan objek anak-anak.,Kerap melakukan perilaku seksual kepada anak, misalnya membuka pakaian.,Perilaku berlangsung selama lebih dari 6 bulan dan terjadi secara terus menerus.,Memiliki fantasi seksual terhadap objek, situasi, atau bagian tubuh tertentu yang tidak umum.,', 'Fetisisme', '0.72'),
(48, 'shuya@gmail.com', '2022-08-07 13:33:33', 'Menunjukkan perilaku dekat dan akrab dengan anak.,Menyukai tontonan video pornografi dengan objek anak-anak.,Kerap melakukan perilaku seksual kepada anak, misalnya membuka pakaian.,Perilaku berlangsung selama lebih dari 6 bulan dan terjadi secara terus menerus.,Senang mengekspos alat vital ke orang yang tidak dikenal.,', 'Pedofilia', '0.87'),
(49, 'shuya@gmail.com', '2022-08-07 13:33:55', 'Menunjukkan perilaku dekat dan akrab dengan anak.,Menyukai tontonan video pornografi dengan objek anak-anak.,Kerap melakukan perilaku seksual kepada anak, misalnya membuka pakaian.,Perilaku berlangsung selama lebih dari 6 bulan dan terjadi secara terus menerus.,Memiliki fantasi seksual terhadap objek, situasi, atau bagian tubuh tertentu yang tidak umum.,Merasa terangsang apabila melihat benda atau bagian tubuh yang menjadi fetisnya.,Senang mengekspos alat vital ke orang yang tidak dikenal.,Senang melakukan aktivitas seksual di tempat umum atau luar ruangan.,', 'Fetisisme', '0.88'),
(50, 'shuya@gmail.com', '2022-08-07 13:34:02', 'Menunjukkan perilaku dekat dan akrab dengan anak.,Menyukai tontonan video pornografi dengan objek anak-anak.,', 'Pedofilia', '0.79'),
(51, 'shuya@gmail.com', '2022-08-07 13:34:07', 'Menyukai tontonan video pornografi dengan objek anak-anak.,Kerap melakukan perilaku seksual kepada anak, misalnya membuka pakaian.,Perilaku berlangsung selama lebih dari 6 bulan dan terjadi secara terus menerus.,', 'Pedofilia', '0.88'),
(52, 'shuya@gmail.com', '2022-08-07 13:34:11', 'Menunjukkan perilaku dekat dan akrab dengan anak.,Menyukai tontonan video pornografi dengan objek anak-anak.,Kerap melakukan perilaku seksual kepada anak, misalnya membuka pakaian.,Perilaku berlangsung selama lebih dari 6 bulan dan terjadi secara terus menerus.,', 'Pedofilia', '0.87'),
(53, 'shuya@gmail.com', '2022-08-07 13:40:37', 'Senang menyakiti secara fisik maupun non fisik.,Senang menyakiti secara fisik maupun non fisik.,Menggunakan kekerasan dengan tujuan membangun sikap dominasi dalam sebuah hubungan.,Menggunakan kekerasan dengan tujuan membangun sikap dominasi dalam sebuah hubungan.,Lebih senang mendominasi saat melakukan aktivitas seksual.,', 'Sadisme', '0.86'),
(54, 'shuya@gmail.com', '2022-08-07 13:44:34', 'Kerap melakukan perilaku seksual kepada anak, misalnya membuka pakaian.,Perilaku berlangsung selama lebih dari 6 bulan dan terjadi secara terus menerus.,Memiliki fantasi seksual terhadap objek, situasi, atau bagian tubuh tertentu yang tidak umum.,', 'Pedofilia', '0.85'),
(55, 'shuya@gmail.com', '2022-08-07 13:44:46', 'Menunjukkan perilaku dekat dan akrab dengan anak.,Menyukai tontonan video pornografi dengan objek anak-anak.,Kerap melakukan perilaku seksual kepada anak, misalnya membuka pakaian.,Perilaku berlangsung selama lebih dari 6 bulan dan terjadi secara terus menerus.,Memiliki fantasi seksual terhadap objek, situasi, atau bagian tubuh tertentu yang tidak umum.,', 'Pedofilia', '0.87'),
(56, 'shuya@gmail.com', '2022-08-07 13:46:17', 'Menunjukkan perilaku dekat dan akrab dengan anak.,Menyukai tontonan video pornografi dengan objek anak-anak.,Kerap melakukan perilaku seksual kepada anak, misalnya membuka pakaian.,Perilaku berlangsung selama lebih dari 6 bulan dan terjadi secara terus menerus.,', 'Pedofilia', '0.87'),
(57, 'shuya@gmail.com', '2022-08-07 13:54:14', 'Perilaku berlangsung selama lebih dari 6 bulan dan terjadi secara terus menerus.,Lebih senang mendominasi saat melakukan aktivitas seksual.,Senang saat disakiti secara fisik maupun non fisik.,Senang saat disakiti secara fisik maupun non fisik.,Lebih senang didominasi saat melakukan aktivitas seksual.,Lebih senang didominasi saat melakukan aktivitas seksual.,Merasa terangsang saat disiksa.,Merasa terangsang saat disiksa.,Merasa terangsang saat dipermalukan.,Merasa terangsang saat dipermalukan.,', 'Masokisme', '0.86'),
(58, 'shuya@gmail.com', '2022-08-07 13:54:26', 'Lebih senang mendominasi saat melakukan aktivitas seksual.,Lebih senang didominasi saat melakukan aktivitas seksual.,', 'Sadisme', '0.57'),
(59, 'shuya@gmail.com', '2022-08-07 13:54:33', 'Lebih senang mendominasi saat melakukan aktivitas seksual.,Senang saat disakiti secara fisik maupun non fisik.,Lebih senang didominasi saat melakukan aktivitas seksual.,', 'Masokisme', '0.87'),
(60, 'shuya@gmail.com', '2022-08-07 13:54:45', 'Lebih senang didominasi saat melakukan aktivitas seksual.,Merasa terangsang saat disiksa.,Merasa terangsang saat dipermalukan.,', 'Masokisme', '0.87'),
(61, 'shuya@gmail.com', '2022-08-07 13:58:46', 'Memiliki fantasi seksual terhadap objek, situasi, atau bagian tubuh tertentu yang tidak umum.,Merasa terangsang apabila melihat benda atau bagian tubuh yang menjadi fetisnya.,Senang mengekspos alat vital ke orang yang tidak dikenal.,', 'Fetisisme', '0.88'),
(62, 'shuya@gmail.com', '2022-08-07 14:00:28', 'Tidak mempunyai gairah seksual terhadap orang yang masih hidup.,', 'Nekrofilia', '0.38'),
(63, 'shuya@gmail.com', '2022-08-07 14:00:38', 'Memiliki daya tarik terhadap bau busuk.,Memiliki ketertarikan dalam berhubungan intim dengan orang yang sudah meninggal.,Tidak mempunyai gairah seksual terhadap orang yang masih hidup.,', 'Nekrofilia', '0.86'),
(64, 'shuya@gmail.com', '2022-08-07 14:00:45', 'Memiliki daya tarik terhadap bau busuk.,Memiliki ketertarikan dalam berhubungan intim dengan orang yang sudah meninggal.,Tidak mempunyai gairah seksual terhadap orang yang masih hidup.,', 'Nekrofilia', '0.86'),
(65, 'shuya@gmail.com', '2022-08-07 14:01:36', 'Menunjukkan perilaku dekat dan akrab dengan anak.,Perilaku berlangsung selama lebih dari 6 bulan dan terjadi secara terus menerus.,Merasa terangsang jika mengintip orang lain.,Lebih senang melihat daripada melakukan aktivitas seksual.,Merasa terangsang saat dipermalukan.,Memiliki daya tarik terhadap bau busuk.,Tidak mempunyai gairah seksual terhadap orang yang masih hidup.,', 'Voyeurisme', '0.88'),
(66, 'shuya@gmail.com', '2022-08-07 14:02:39', 'Perilaku berlangsung selama lebih dari 6 bulan dan terjadi secara terus menerus.,', 'Sadisme', '0.57'),
(67, 'shuya@gmail.com', '2022-08-07 14:03:34', 'Perilaku berlangsung selama lebih dari 6 bulan dan terjadi secara terus menerus.,', 'Nekrofilia', '0.57'),
(68, 'shuya@gmail.com', '2022-08-07 14:04:05', 'Perilaku berlangsung selama lebih dari 6 bulan dan terjadi secara terus menerus.,', 'Eksibisionisme', '0.16'),
(69, 'shuya@gmail.com', '2022-08-07 14:04:26', 'Menunjukkan perilaku dekat dan akrab dengan anak.,Menyukai tontonan video pornografi dengan objek anak-anak.,Kerap melakukan perilaku seksual kepada anak, misalnya membuka pakaian.,Perilaku berlangsung selama lebih dari 6 bulan dan terjadi secara terus menerus.,', 'Pedofilia', '0.85'),
(70, 'shuya@gmail.com', '2022-08-07 14:04:33', 'Menunjukkan perilaku dekat dan akrab dengan anak.,Menyukai tontonan video pornografi dengan objek anak-anak.,Kerap melakukan perilaku seksual kepada anak, misalnya membuka pakaian.,Perilaku berlangsung selama lebih dari 6 bulan dan terjadi secara terus menerus.,Memiliki fantasi seksual terhadap objek, situasi, atau bagian tubuh tertentu yang tidak umum.,', 'Pedofilia', '0.85'),
(71, 'shuya@gmail.com', '2022-08-07 14:04:39', 'Menunjukkan perilaku dekat dan akrab dengan anak.,Menyukai tontonan video pornografi dengan objek anak-anak.,Kerap melakukan perilaku seksual kepada anak, misalnya membuka pakaian.,Perilaku berlangsung selama lebih dari 6 bulan dan terjadi secara terus menerus.,Memiliki fantasi seksual terhadap objek, situasi, atau bagian tubuh tertentu yang tidak umum.,Merasa terangsang apabila melihat benda atau bagian tubuh yang menjadi fetisnya.,', 'Fetisisme', '0.85'),
(72, 'shuya@gmail.com', '2022-08-07 14:05:30', 'Menyukai tontonan video pornografi dengan objek anak-anak.,Kerap melakukan perilaku seksual kepada anak, misalnya membuka pakaian.,Perilaku berlangsung selama lebih dari 6 bulan dan terjadi secara terus menerus.,Merasa terangsang apabila melihat benda atau bagian tubuh yang menjadi fetisnya.,', 'Pedofilia', '0.85'),
(73, 'shuya@gmail.com', '2022-08-07 14:07:15', 'Memiliki dorongan kuat yang tak tertahankan untuk melakukan crossdressing.,Senang membeli atau mengenakan pakaian yang tidak sesuai jenis kelamin.,Terangsang saat mengenakan pakaian lawan jenis.,', 'Frotteurisme', '0.87'),
(74, 'shuya@gmail.com', '2022-08-07 14:07:24', 'Lebih senang mendominasi saat melakukan aktivitas seksual.,', 'Sadisme', '0.57'),
(75, 'shuya@gmail.com', '2022-08-07 14:07:31', 'Menyukai tontonan video pornografi dengan objek anak-anak.,Kerap melakukan perilaku seksual kepada anak, misalnya membuka pakaian.,', 'Pedofilia', '0.88'),
(76, 'shuya@gmail.com', '2022-08-07 14:08:05', 'Menunjukkan perilaku dekat dan akrab dengan anak.,Kerap melakukan perilaku seksual kepada anak, misalnya membuka pakaian.,Memiliki fantasi seksual terhadap objek, situasi, atau bagian tubuh tertentu yang tidak umum.,Merasa terangsang saat dipermalukan.,Terangsang saat mengenakan pakaian lawan jenis.,', 'Pedofilia', '0.79'),
(77, 'shuya@gmail.com', '2022-08-07 14:24:31', 'Punya hasrat ingin bersetubuh dengan binatang.,Memiliki rasa cinta atau ketertarikan secara emosi terhadap hewan.,Terangsang saat melihat alat vital hewan.,', 'Zoofilia', '-0.09'),
(78, 'shuya@gmail.com', '2022-08-07 14:25:27', 'Terangsang saat mengenakan pakaian lawan jenis.,Punya hasrat ingin bersetubuh dengan binatang.,Memiliki rasa cinta atau ketertarikan secara emosi terhadap hewan.,Terangsang saat melihat alat vital hewan.,', 'Transvestisme', '0.78'),
(79, 'shuya@gmail.com', '2022-08-07 14:34:13', 'Menunjukkan perilaku dekat dan akrab dengan anak.,Menyukai tontonan video pornografi dengan objek anak-anak.,Kerap melakukan perilaku seksual kepada anak, misalnya membuka pakaian.,Perilaku berlangsung selama lebih dari 6 bulan dan terjadi secara terus menerus.,Memiliki fantasi seksual terhadap objek, situasi, atau bagian tubuh tertentu yang tidak umum.,Merasa terangsang apabila melihat benda atau bagian tubuh yang menjadi fetisnya.,Senang mengekspos alat vital ke orang yang tidak dikenal.,Senang melakukan aktivitas seksual di tempat umum atau luar ruangan.,Merasa terangsang jika mengintip orang lain.,Senang melakukan telepon seks.,', 'Fetisisme', '0.85'),
(80, 'shuya@gmail.com', '2022-08-07 14:34:21', 'Memiliki daya tarik terhadap bau busuk.,Memiliki ketertarikan dalam berhubungan intim dengan orang yang sudah meninggal.,Tidak mempunyai gairah seksual terhadap orang yang masih hidup.,Memiliki dorongan kuat yang tak tertahankan untuk melakukan crossdressing.,Senang membeli atau mengenakan pakaian yang tidak sesuai jenis kelamin.,', 'Nekrofilia', '0.86'),
(81, 'shuya@gmail.com', '2022-08-07 14:34:27', 'Lebih senang mendominasi saat melakukan aktivitas seksual.,Lebih senang didominasi saat melakukan aktivitas seksual.,Merasa terangsang saat disiksa.,', 'Masokisme', '0.85'),
(82, 'shuya@gmail.com', '2022-08-08 03:54:28', 'Menunjukkan perilaku dekat dan akrab dengan anak.,Menyukai tontonan video pornografi dengan objek anak-anak.,Kerap melakukan perilaku seksual kepada anak, misalnya membuka pakaian.,', 'Pedofilia', '0.88'),
(83, 'shuya@gmail.com', '2022-08-08 03:55:20', 'Menggunakan kekerasan dengan tujuan membangun sikap dominasi dalam sebuah hubungan.,Lebih senang mendominasi saat melakukan aktivitas seksual.,Senang saat disakiti secara fisik maupun non fisik.,', 'Masokisme', '0.78'),
(85, 'shuya@gmail.com', '2022-08-09 02:52:00', 'Menunjukkan perilaku dekat dan akrab dengan anak.,Menyukai tontonan video pornografi dengan objek anak-anak.,Kerap melakukan perilaku seksual kepada anak, misalnya membuka pakaian.,', 'Pedofilia', '0.89'),
(86, 'shuya@gmail.com', '2022-08-09 07:06:41', 'Menunjukkan perilaku dekat dan akrab dengan anak.,Menyukai tontonan video pornografi dengan objek anak-anak.,Kerap melakukan perilaku seksual kepada anak, misalnya membuka pakaian.,', 'Pedofilia', '0.89'),
(87, 'shuya@gmail.com', '2022-08-09 07:07:58', 'Menunjukkan perilaku dekat dan akrab dengan anak.,Menyukai tontonan video pornografi dengan objek anak-anak.,Kerap melakukan perilaku seksual kepada anak, misalnya membuka pakaian.,', 'Pedofilia', '0.89'),
(89, 'wawa@gmail.com', '2022-08-09 07:44:40', 'Menunjukkan perilaku dekat dan akrab dengan anak.,', 'Pedofilia', '0.39'),
(91, 'admin', '2022-08-11 06:31:44', 'Menunjukkan perilaku dekat dan akrab dengan anak.,Menyukai tontonan video pornografi dengan objek anak-anak.,Merasa terangsang apabila melihat benda atau bagian tubuh yang menjadi fetisnya.', 'Pedofilia', '0.83'),
(92, 'admin', '2022-08-11 08:23:10', 'Menunjukkan perilaku dekat dan akrab dengan anak.,Menyukai tontonan video pornografi dengan objek anak-anak.,Kerap melakukan perilaku seksual kepada anak, misalnya membuka pakaian.', 'Pedofilia', '0.71'),
(93, 'admin', '2022-08-11 08:24:36', 'Menunjukkan perilaku dekat dan akrab dengan anak.,Menyukai tontonan video pornografi dengan objek anak-anak.,Kerap melakukan perilaku seksual kepada anak, misalnya membuka pakaian.', 'Pedofilia', '0.50'),
(94, 'admin', '2022-08-11 08:26:38', 'Menunjukkan perilaku dekat dan akrab dengan anak.,Menyukai tontonan video pornografi dengan objek anak-anak.,Kerap melakukan perilaku seksual kepada anak, misalnya membuka pakaian.', 'Pedofilia', '0.44'),
(95, 'john@gmail.com', '2022-08-12 02:16:34', ',Kerap melakukan perilaku seksual kepada anak, misalnya membuka pakaian.,Perilaku berlangsung selama lebih dari 6 bulan dan terjadi secara terus menerus.,Merasa terangsang jika mengintip orang lain.', 'Pedofilia', '0.62'),
(96, 'john@gmail.com', '2022-08-12 04:01:44', ',Menunjukkan perilaku dekat dan akrab dengan anak.,Kerap melakukan perilaku seksual kepada anak, misalnya membuka pakaian.', 'Pedofilia', '0.69'),
(97, 'john@gmail.com', '2022-08-12 04:04:46', ',Menyukai tontonan video pornografi dengan objek anak-anak.,Menunjukkan perilaku dekat dan akrab dengan anak.,Perilaku berlangsung selama lebih dari 6 bulan dan terjadi secara terus menerus.', 'Pedofilia', '0.80'),
(98, 'john@gmail.com', '2022-08-12 05:03:08', ',Kerap melakukan perilaku seksual kepada anak, misalnya membuka pakaian.,Menunjukkan perilaku dekat dan akrab dengan anak.', 'Pedofilia', '0.53'),
(99, 'john@gmail.com', '2022-08-12 06:19:52', ',Kerap melakukan perilaku seksual kepada anak, misalnya membuka pakaian.,Merasa terangsang apabila melihat benda atau bagian tubuh yang menjadi fetisnya.,Lebih senang melihat daripada melakukan aktivitas seksual.', 'Voyeurisme', '0.75');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(45) NOT NULL,
  `alamat` varchar(191) NOT NULL,
  `telepon` varchar(191) NOT NULL,
  `role` varchar(45) NOT NULL,
  `foto` varchar(191) NOT NULL DEFAULT 'default.jpg'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`, `nama`, `alamat`, `telepon`, `role`, `foto`) VALUES
('admin', 'admin', 'Administrator', '', '', 'admin', 'default.jpg'),
('shuya@gmail.com', '123', 'shuya', '', '', 'user', 'default.jpg'),
('es@gmail.com', '123', 'es', 'tes', '4234', 'user', '62eaf981a3f6a.jpeg'),
('tes@gmail.com', '123', 'Tes', '', '', 'user', 'default.jpg'),
('fahri@gmail.com', '123', 'fahri', '', '', 'user', 'default.jpg'),
('wawa@gmail.com', '123', 'wawa', '', '', 'user', 'default.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pengetahuan`
--

CREATE TABLE `pengetahuan` (
  `id_pengetahuan` int(11) NOT NULL,
  `id_penyakit` varchar(50) DEFAULT NULL,
  `id_gejala` varchar(50) DEFAULT NULL,
  `mb` double DEFAULT NULL,
  `md` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengetahuan`
--

INSERT INTO `pengetahuan` (`id_pengetahuan`, `id_penyakit`, `id_gejala`, `mb`, `md`) VALUES
(45, '9', '4', 0.2, 0.04),
(35, '10', '8', 0.6, 0.02),
(41, '8', '2', 0.8, 0.02),
(40, '8', '1', 0.4, 0.01),
(39, '9', '6', 0.8, 0.02),
(44, '10', '4', 0.2, 0.04),
(37, '9', '5', 0.8, 0.06),
(34, '10', '7', 0.8, 0.04),
(33, '11', '4', 0.2, 0.04),
(32, '11', '10', 0.6, 0.02),
(31, '11', '11', 0.8, 0.05),
(30, '11', '9', 0.9, 0.1),
(42, '8', '3', 0.8, 0.06),
(46, '8', '4', 0.2, 0.04),
(47, '12', '12', 0.8, 0.04),
(48, '12', '13', 0.5, 0.03),
(49, '12', '14', 0.6, 0.03),
(50, '12', '4', 0.2, 0.04),
(51, '13', '15', 0.8, 0.02),
(52, '13', '16', 0.5, 0.01),
(53, '13', '17', 0.8, 0.04),
(54, '13', '4', 0.2, 0.04),
(55, '13', '18', 0.6, 0.04),
(56, '14', '19', 0.6, 0.04),
(57, '14', '20', 0.8, 0.04),
(58, '14', '21', 0.6, 0.02),
(59, '14', '4', 0.2, 0.04),
(65, '16', '22', 0.6, 0.01),
(64, '15', '28', 0.8, 0.01),
(63, '15', '4', 0.2, 0.04),
(66, '16', '23', 0.6, 0.02),
(67, '16', '24', 0.8, 0.02),
(68, '16', '4', 0.2, 0.04),
(69, '17', '25', 0.8, 0.01),
(70, '17', '26', 0.4, 0.02),
(71, '17', '27', 0.8, 0.02),
(72, '17', '4', 0.2, 0.04);

-- --------------------------------------------------------

--
-- Table structure for table `penyakit`
--

CREATE TABLE `penyakit` (
  `id_penyakit` int(11) NOT NULL,
  `nama_penyakit` varchar(200) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `solusi` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penyakit`
--

INSERT INTO `penyakit` (`id_penyakit`, `nama_penyakit`, `deskripsi`, `solusi`) VALUES
(11, 'Voyeurisme', 'Voyeurisme adalah sebuah istilah untuk penyimpangan perilaku seksual di mana seseorang telah merasa puas saat mengintip orang lain yang sedang telanjang, mandi, atau sedang berhubungan seksual.', '1.	Bergabung dalam terapi berkelompok bisa membantu. Bertemu dan berkomunikasi dengan orang lain yang mengalami masalah yang sama bisa menciptakan ruang untuk membicarakan tentang kesulitan yang dihadapi, bagaimana cara mengendalikan diri, dan perawatan apa saja yang bisa dilakukan.\r\n\r\n2.	Perawatan dengan obat-obatan juga bisa dilakukan, seperti dengan menggunakan antidepresan yang bisa menyeimbangkan zat kimia di otak dan menekan tindakan impulsif.'),
(10, 'Eksibisionisme', 'Eksibisionisme adalah penyimpangan seksual dimana penderita merasakan kesenangan seksual ketika dia memperlihatkan alat vital di tempat umum atau orang lain.', '1.	Terapi Perilaku Kognitif dapat efektif bagi orang tersebut untuk mengidentifikasi hal-hal yang menyebabkan dorongannya, serta mengajarkan keterampilan untuk menangani dorongan tersebut dengan cara yang sehat.'),
(9, 'Fetisisme', 'Keinginan seksual kepada benda-benda mati atau bagian tubuh yang tidak lazim.', '1.	Psikoterapi:\r\nPsikoterapi, atau yang disebut juga dengan terapi berbicara, dapat membantu Anda untuk mengatasi perilaku seksual yang menyimpang.\r\n\r\n2.	Bantuan Obat:\r\nGangguan fetish juga bisa diatasi dengan obat-obatan untuk membantu mengatasi gangguan senyawa kimia pada otak. Beberapa contoh obat yang bisa digunakan adalah antidepresan, obat penenang, serta obat anti-androgen untuk pasien pria.\r\n'),
(8, 'Pedofilia', 'Pedofilia adalah suatu bentuk penyimpangan seksual yang meliputi nafsu seksual terhadap anak-anak maupun remaja yang berusia di bawah 14 tahun.', '1.	Farmakoterapi:\r\nPengidap pedofilia dapat diberikan obat antiandrogen untuk membantu mengurangi libido, obat-obatan yang membantu penurunan produksi hormon testosteron, dan obat untuk menghambat serotonin.\r\n\r\n2.	Cognitive Behavioral Therapy:\r\nMetode pengobatan ini dilakukan dengan tujuan untuk membantu mengenali pemikiran, perasaan dan perilaku yang kurang tepat tentang suatu hal yang dialami oleh pengidap.\r\n\r\n3.	Family System Therapy:\r\nMetode pengobatan ini melibatkan pihak keluarga untuk memberikan dukungan pada pengidap pedofilia supaya bisa melakukan perubahan.\r\n'),
(12, 'Sadisme', 'Sadisme adalah sebuah dorongan seksual ketika melakukan perbuatan sadis. Biasanya pelaku sadisme akan merasakan suatu kepuasan saat sedang menyiksa orang lain.', '1.	Melatih mengatur kondisi di mana seorang sadisme bergairah. Hal ini diharapkan dapat mengurangi keinginan untuk bertindak sadis dalam berhubungan intim.\r\n\r\n2.	Berikan obat-obatan berupa hormon yang mengurangi kadar testosterone dan obat-obatan serotonin kepada seorang sadis yang memiliki kemungkinan untuk membahayakan orang lain.'),
(13, 'Masokisme', 'Masokisme adalah sebuah penyimpangan seksual dimana seseorang yang merasa nyaman dan puas secara seksual ketika dirinya disakiti atau dilecehkan oleh pasangannya. Penyimpangan seksual ini tergolong perilaku berisiko tinggi, baik bagi diri sendiri maupun pasangannya.', '1.	Psikoterapi:\r\nMelalui psikoterapi, penderita masokis akan dibimbing dan dilatih agar ia lebih waspada terhadap dampak atau risiko dari perilaku masokis yang dimilikinya. Dengan demikian, pendrita gangguan masokis diharapkan dapat mengubah perilaku seksualnya agar tidak membahayakan dirinya sendiri dan orang lain.\r\n'),
(14, 'Nekrofilia', 'Nekrofilia adalah jenis penyimpangan seksual yang membuat pengidapnya menikmati berhubungan intim dengan mayat. Biasanya pelaku nekrofilia lebih menyukai berhubungan intim dengan mayat dibandingkan dengan manusia yang masih hidup.', '1. Sebaiknya anda berkonsultasi dengan dokter psikiater untuk dilakukan beberapa penanganan seperti psikoterapi, terapi kognitif, atau obat-obatan jika diperlukan. Nantinya, jika memang penyebab dari kondisi anda dapat diobati dan anda mengikuti beberapa sesi penanganan dari dokter, maka kemungkinan anda dapat sembuh.'),
(15, 'Frotteurisme', 'Frotteurisme adalah sebuah kondisi penyimpangan seksual dimana pelaku merasakan dorongan seksual untuk menggesekkan bagian vital ke tubuh korban.', '1.	Psikoterapi dapat membantu mengidentifikasi faktor pemicu dan mengarahkan pikiran serta perasaan untuk menghindari perilaku frotteurisme.\r\n\r\n2.	penggunaan obat-obatan seperti antiandrogen (medroksiprogesteron asetat) dan antidepresan (seperti prozac atau fluoxetine) biasanya juga diresepkan untuk mengelola dorongan seksual yang tidak pantas.'),
(16, 'Transvestisme', 'Transvestisme adalah sebuah penyimpangan seksual dimana pelaku mendapatkan dorongan seksual dengan mengenakan pakaian lawan jenis untuk. Perilaku berpakaian seperti lawan jenis ini dikenal juga dengan nama crossdressing.', '1.	Psikoterapi:\r\nTerapi ini dapat diberikan bila diperlukan. Psikoterapi difokuskan untuk membantu seseorang agar dapat menerima diri mereka sendiri dan mengontrol perilaku yang sekiranya dapat menimbulkan masalah dalam kehidupan sehari-hari.\r\n'),
(17, 'Zoofilia', 'Zoofilia merupakan penyimpangan berupa pelaku memiliki kepuasan usai melakukan aktivitas seksual dengan hewan. Namun, hubungan pelaku dan hewan tersebut bukan hanya sebatas kontak fisik, tapi juga melibatkan emosi. Artinya, pelaku memiliki rasa cinta atau ketertarikan secara emosi terhadap hewan tersebut.', '1.	Penanganan pertama yang dilakukan adalah mengendalikan gairah seksualnya jika melihat binatang tertentu, setelah itu mencari faktor yang melatarbelakangi. Jika belum ditemukan penyebabnya, terapi akan dilanjutkan dengan mencari apakah ada faktor biologis yang mendasarinya.');

-- --------------------------------------------------------

--
-- Stand-in structure for view `vpengetahuan`
-- (See below for the actual view)
--
CREATE TABLE `vpengetahuan` (
`id_pengetahuan` int(11)
,`id_penyakit` varchar(50)
,`nama_penyakit` varchar(200)
,`id_gejala` varchar(50)
,`nama_gejala` varchar(200)
,`mb` double
,`md` double
);

-- --------------------------------------------------------

--
-- Structure for view `vpengetahuan`
--
DROP TABLE IF EXISTS `vpengetahuan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vpengetahuan`  AS SELECT `pengetahuan`.`id_pengetahuan` AS `id_pengetahuan`, `pengetahuan`.`id_penyakit` AS `id_penyakit`, `penyakit`.`nama_penyakit` AS `nama_penyakit`, `pengetahuan`.`id_gejala` AS `id_gejala`, `gejala`.`nama_gejala` AS `nama_gejala`, `pengetahuan`.`mb` AS `mb`, `pengetahuan`.`md` AS `md` FROM ((`pengetahuan` join `penyakit`) join `gejala`) WHERE `pengetahuan`.`id_penyakit` = `penyakit`.`id_penyakit` AND `pengetahuan`.`id_gejala` = `gejala`.`id_gejala`  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `gejala`
--
ALTER TABLE `gejala`
  ADD PRIMARY KEY (`id_gejala`);

--
-- Indexes for table `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `pengetahuan`
--
ALTER TABLE `pengetahuan`
  ADD PRIMARY KEY (`id_pengetahuan`);

--
-- Indexes for table `penyakit`
--
ALTER TABLE `penyakit`
  ADD PRIMARY KEY (`id_penyakit`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `gejala`
--
ALTER TABLE `gejala`
  MODIFY `id_gejala` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id_konsultasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `pengetahuan`
--
ALTER TABLE `pengetahuan`
  MODIFY `id_pengetahuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `penyakit`
--
ALTER TABLE `penyakit`
  MODIFY `id_penyakit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
