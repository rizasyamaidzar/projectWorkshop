-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2023 at 07:28 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cv_spa`
--

-- --------------------------------------------------------

--
-- Table structure for table `bidang_usaha`
--

CREATE TABLE `bidang_usaha` (
  `id` int(11) NOT NULL,
  `klasifikasi` varchar(50) NOT NULL,
  `kode` varchar(50) NOT NULL,
  `sub_klasifikasi` varchar(100) NOT NULL,
  `sub_kualifikasi` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bidang_usaha`
--

INSERT INTO `bidang_usaha` (`id`, `klasifikasi`, `kode`, `sub_klasifikasi`, `sub_kualifikasi`) VALUES
(14, 'Bangunan Sipil', 'SI002', 'Jasa Pelaksana Untuk Kontruksi Saluran Air, Pelabuhan, Dam, Dan Prasarana Sumber Daya Air Lainya', 'K1'),
(16, 'Bangunan Sipil', 'BG00888', 'Jasa Pelaksana Kontruksi Bangunan Kesehatankuuu iyaa jaga kesehatan', 'K1'),
(17, 'Bangunan Sipil', 'kodekodean', 'apipapaipp', 'K1');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `pertanyaan` varchar(255) NOT NULL,
  `jawaban` varchar(255) NOT NULL,
  `statuss` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id`, `nama`, `email`, `judul`, `pertanyaan`, `jawaban`, `statuss`) VALUES
(1, 'apip', 'asdfgdasg', 'gsdg', 'sdg', 'hgfdisdufjhsdgfhjsdgfhjsdajfgnbhjgbikuiafjkasjfghoiasjioisihfvbhsfha', ''),
(2, 'sdggdf', 'dfhfdh', 'dfhdfh', 'dfhdfh', 'dfhdfh', ''),
(4, 'asf', 'rendy@gmail.com', 'asf', 'dsg', 'terakhir', 'Tampilkan'),
(5, 'asf', 'halokamu434@gmail.com', 'fas', 'asf', 'okayyy', ''),
(6, 'sdg', 'rendy@gmail.com', 'sdg', 'asf', '', 'Jangan Tamplkan'),
(7, 'Riza Afif', 'rizaafifsyamaidzar@gmail.com', 'tender', 'apakah apip ganteng???', 'betulll ganteng sekali', ''),
(8, 'riza', 'afif@gmail.com', 'apip', 'heyyy semangat yaaa', 'iyaa makasihh', 'Jangan Tamplkan');

-- --------------------------------------------------------

--
-- Table structure for table `proyek`
--

CREATE TABLE `proyek` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `lingkup` varchar(50) NOT NULL,
  `kategori` varchar(50) NOT NULL,
  `lokasi` varchar(50) NOT NULL,
  `pemberi_tugas` varchar(50) NOT NULL,
  `no_kontrak` varchar(50) NOT NULL,
  `tgl_kontrak` date NOT NULL,
  `nilai_kontrak` int(11) NOT NULL,
  `serah_terima` varchar(50) NOT NULL,
  `bidang_usaha` varchar(100) NOT NULL,
  `foto` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `proyek`
--

INSERT INTO `proyek` (`id`, `nama`, `lingkup`, `kategori`, `lokasi`, `pemberi_tugas`, `no_kontrak`, `tgl_kontrak`, `nilai_kontrak`, `serah_terima`, `bidang_usaha`, `foto`) VALUES
(1, 'Pekerjaan Atap dan Talang Dak', 'Perbaikan dan Pemasangan Atap', 'Tender', 'Surabaya', 'Kolonel Laut (K) NRP 9127/P dr.Tjatur Bagus Gunart', 'SPK/1022', '2023-06-05', 185253420, 'BASTTHP/3610/XI/2020', '', 'img1.jpg'),
(9, 'dhfgfhj', 'apip', 'oioi', 'png', 'lhfoiwegiowehoi', '', '2023-06-07', 124214, 'werew', '', 'img3.jpg'),
(15, 'apip', 'asfsd', '', 'sdg', '', '', '2023-06-01', 124124335, 'sdgdsg', '', '647d91772e5c3.png'),
(16, 'rdzyyr', 'rftyrf', '', 'fgjj', '', 'rtyrt', '2023-06-01', 214324, 'werew', '', '647d91bae18e4.png'),
(17, 'ppoip', 'sdf', '', 'dsf', '', 'sf', '2023-06-01', 124214, 're', '', '647d92de1d55b.jpg'),
(18, 'dsg', 'dfh', '', 'dfh', '', 'asf', '2023-06-01', 124214, 'werew', '', '647d94ce31669.jpg'),
(19, 'btiyam', 'dsf', '', 'dfg', '', '', '2023-06-01', 3534, 'werew', '', '647d95027c94a.jpg'),
(20, 'dfg', 'gfh', '', 'fgh', 'dfg', 'fgh', '2023-05-31', 124214, 'ery', '', '647d958de0a91.jpg'),
(21, 'dhffg', 'fgj', '', 'fgj', 'fgj', 'fgj', '2023-06-02', 124214, 'werew', '', '647d965aa9599.png'),
(22, 'dfh', 'gf', 'Tender', 'gfjgf', 'gfj', 'gfj', '2023-06-02', 124214, 'werew', '', '647d9700d030a.png'),
(23, 'rendy ', 'fasdf', 'Non Tender', 'dfhsd', 'dgsd', 'sdgfd', '2023-06-26', 43646, 'dfh', 'Tender', '647dcf0fd49af.jpg'),
(24, 'dfh', 'sdgsd', '--Kategori--', '', '', 'fsd', '2023-05-30', 124214, 'dfh', '', '647dd308e8076.jpg'),
(25, 'sahul', 'r', '--Kategori--', 're', 'ert', 'ert', '2023-05-31', 54654, 'dfgf', 'Jasa Pelaksana Kontruksi Bangunan Kesehatan', '647dd3861d410.jpg'),
(26, 'bastian', 'ret', '--Kategori--', 'ert', 'ert', 'ert', '2023-06-01', 354, 'asf', 'Jasa Pelaksana Untuk Kontruksi Saluran Air, Pelabuhan, Dam, Dan Prasarana Sumber Daya Air Lainya', '647dd3af1d054.jpg'),
(27, 'Pekerjaan Pintu dan Kusen &amp;', 'Pemasangan Kabel Power', 'Non Tender', 'surabaya', 'Kolonel Laut (K) NRP 9127/P dr.Tjatur Bagus Gunart', 'SPK/1037/02-03/XI/2020', '2023-06-02', 59157415, 'BASTTHP/3663/XI/2020', 'Jasa Pelaksana Kontruksi Bangunan Kesehatan', '647ddc8236d8b.jpg'),
(28, 'rendy', 'hatimu', 'Tender', 'ftgjhg', 'gfh', 'fgh', '2023-06-06', 43654, 'gfh', 'Jasa Pelaksana Kontruksi Bangunan Kesehatandf', '6480bf7771f5d.jpg'),
(29, '', '', '--Kategori--', '', '', '', '0000-00-00', 0, '', 'Jasa Pelaksana Kontruksi Bangunan Kesehatandf', '6480c8a39d085.jpg'),
(30, 'rizaa', 'sf', 'Tender', 'sdgds', 'fdg', 'gfh', '2023-06-08', 43654, 'dfh', 'Jasa Pelaksana Kontruksi Bangunan Kesehatandf', '6481f2bdec08d.jpg'),
(32, 'Pekerjaan Rumah Pompa dan apip', 'Pembuatan Rumah Pompa dan riza', 'Non Tender', 'Surabaya', 'Kolonel Laut (K) NRP 9127/P dr.Tjatur Bagus Gunart', 'SPK/1022/02-03/X/2020', '2020-12-29', 185253420, 'BASTTHP/3610/XI/2020', 'Jasa Pelaksana Kontruksi Bangunan Kesehatan', '648388c74ee47.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'ass', '$2y$10$0l5FZ1QPq3y9q81fsDTFP.8rKOwM18Jf45ncgzvjJKGg0HEtswVy6'),
(2, 'afs', '$2y$10$pBpOju76VHXaj/1foe3lGuPRjUQP11HsaL/mb2O.M9MxzrZ.4otCC'),
(3, 'apip', '$2y$10$712QfXonkSeFTfQTjInzy..NRfo6/8QFojf4IW4161UEgij3P0UZe'),
(4, 'apips', '$2y$10$/8tvbo2vX0A3P9f8yb6cSO.y2cuMTob2hHKwlAvJ8Y9iL1Vlsiypu');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bidang_usaha`
--
ALTER TABLE `bidang_usaha`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `lingkup` (`lingkup`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bidang_usaha`
--
ALTER TABLE `bidang_usaha`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `pesan`
--
ALTER TABLE `pesan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `proyek`
--
ALTER TABLE `proyek`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
