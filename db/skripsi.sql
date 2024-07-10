-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jul 10, 2024 at 06:35 PM
-- Server version: 5.7.39
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `skripsi`
--

-- --------------------------------------------------------

--
-- Table structure for table `pasien`
--

CREATE TABLE `pasien` (
  `pasien_id` int(11) NOT NULL,
  `nama_pasien` varchar(255) NOT NULL,
  `nomor_ktp` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nomor_telepon` varchar(255) NOT NULL,
  `tinggi_badan` varchar(255) NOT NULL,
  `berat_badan` varchar(255) NOT NULL,
  `golongan_darah` varchar(255) NOT NULL,
  `riwayat_alergi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pasien`
--

INSERT INTO `pasien` (`pasien_id`, `nama_pasien`, `nomor_ktp`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `alamat`, `nomor_telepon`, `tinggi_badan`, `berat_badan`, `golongan_darah`, `riwayat_alergi`) VALUES
(46, '5iX4IlVAn1gQgwG4G9jXxQ==', 'P9LoDe01gWJ2BihCKv/l5g==', 'G3ArwDP2V8b0xBHV8q59Ww==', 'UjV5xT0nYnTvY1GxRm86zQ==', 'DQENKFrS5d9578vN0EWwyA==', 'QN/4QoxBbm6S9TxtzM73Og==', 'rF5ohxtIa9Z1aCLc0vw70g==', 'K4QEicIA4yDSKaa/+5QQTQ==', 'qP8CjOLGk6HLxs1fJzJYiQ==', 'SbRaDGKVlVlVNhC5cBjkTw==', '+bjDusndH58LOlB0jNctXw=='),
(47, 'Gj029MOUJn+sc2i8EmClmQ==', 'byeLMvUcG+F1XAMTcZ0sZg==', 'tPcTElfgHkkZYoZ7cYEzaQ==', 'UjV5xT0nYnTvY1GxRm86zQ==', 'uhS/k1Bm7KqdGD9DGfLsrg==', 'UodEFgJcIm7NLl+jfAwQjA==', 'WaX64mT+RQPYNPzdbTvh+g==', 'K4QEicIA4yDSKaa/+5QQTQ==', 'qP8CjOLGk6HLxs1fJzJYiQ==', 'rGkFNlJUvfs3ftcgZJ7eeg==', 'uihS3vIDpjaVFCRtpFov9w=='),
(48, 'zx+cVN2e1hnPj4yguZt1eg==', '', '', '', 'DQENKFrS5d9578vN0EWwyA==', '', '', '', '', 'SbRaDGKVlVlVNhC5cBjkTw==', '');

-- --------------------------------------------------------

--
-- Table structure for table `rekam_medis`
--

CREATE TABLE `rekam_medis` (
  `rm_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pasien_id` int(11) NOT NULL,
  `subjective` varchar(255) NOT NULL,
  `objective` varchar(255) NOT NULL,
  `assessment` varchar(255) NOT NULL,
  `plan` varchar(255) NOT NULL,
  `tanggal_kunjungan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rekam_medis`
--

INSERT INTO `rekam_medis` (`rm_id`, `user_id`, `pasien_id`, `subjective`, `objective`, `assessment`, `plan`, `tanggal_kunjungan`) VALUES
(14, 14, 46, 'gYX/r05nv7eFgWp9YBTHyQ==', 'gYX/r05nv7eFgWp9YBTHyQ==', 'VeobB7OckSGVz9chBvBmYgBV0T58QsW3ObBxrSOtTcc=', 'gYX/r05nv7eFgWp9YBTHyQ==', '24BqMuaePoblliQN9qc3LQ=='),
(15, 16, 46, 'Uw6cotS6Ec7xKijWvkaZjQ==', 'QN/4QoxBbm6S9TxtzM73Og==', 'VeobB7OckSGVz9chBvBmYgBV0T58QsW3ObBxrSOtTcc=', 'QN/4QoxBbm6S9TxtzM73Og==', 'AFyp3OJBvrpYxxQy2W8pKw=='),
(16, 14, 47, '', '', 'VeobB7OckSGVz9chBvBmYgBV0T58QsW3ObBxrSOtTcc=', '', 'AFyp3OJBvrpYxxQy2W8pKw=='),
(17, 14, 47, 'HjnLLBYqW9eabzpfOXMtJA==', 'WAV/aAK6wOvmaRg8RfxYlQ==', 'VeobB7OckSGVz9chBvBmYgBV0T58QsW3ObBxrSOtTcc=', '/XvbNBkJ0/mDEBj098E6LA==', 'PLiVFphdnrvU+H7fGRwP3Q==');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `nik` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL DEFAULT 'default',
  `nama_lengkap` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` varchar(255) NOT NULL,
  `nomor_ktp` varchar(255) NOT NULL,
  `jenis_kelamin` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `nomor_telepon` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `nomor_str` varchar(255) DEFAULT NULL,
  `tanggal_str` varchar(255) DEFAULT NULL,
  `nomor_sip` varchar(255) DEFAULT NULL,
  `tanggal_sip` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `nik`, `username`, `password`, `nama_lengkap`, `tempat_lahir`, `tanggal_lahir`, `nomor_ktp`, `jenis_kelamin`, `alamat`, `nomor_telepon`, `role`, `nomor_str`, `tanggal_str`, `nomor_sip`, `tanggal_sip`) VALUES
(14, 'a6UiauWkCjkgVDvLmLXayA==', 'TRRwE6rt2HMldQXAbtw64g==', 'TRRwE6rt2HMldQXAbtw64g==', 'aKVRV6Iuu0UwdkMaBBanPQBENFwNgXJKxcGWb4jG/HU=', 'GOP9WRnhDZ/wHkIXdVs7hg==', 'UjV5xT0nYnTvY1GxRm86zQ==', 'e65/GtUK0AjxmTWK3y5I/Q==', 'DQENKFrS5d9578vN0EWwyA==', 'vLJrruIv7kNpXPsF4EPtDg==', 'yiJDwOoKnMUASNpg7nRTYA==', 'BKp8Bk1XlPI+BQGbS61OjA==', '0z3hJSXvAmo0P6wLVa4FLw==', 'Q2dz/iZChfvGNJvWkbqJdw==', 'Vwe0c21ooNoT8Zp36dHWzQ==', 'KAWT/53Oyd8/fG9Gta48mA=='),
(15, 'WoNZNtLX0eJ9BTEllhVaOw==', 'gYX/r05nv7eFgWp9YBTHyQ==', 'gYX/r05nv7eFgWp9YBTHyQ==', 'bZkuwA8ddfjWiPEJKKP6oQ==', 'G3ArwDP2V8b0xBHV8q59Ww==', 'UjV5xT0nYnTvY1GxRm86zQ==', 'H8NoaMbEY3mlTUxeYAo8Xw==', 'DQENKFrS5d9578vN0EWwyA==', 'QN/4QoxBbm6S9TxtzM73Og==', 'yjA/Cgt1lr3XcTxV4gfkUw==', 'BKp8Bk1XlPI+BQGbS61OjA==', '3Y4Bt+z21h1irSBnSUAYVw==', 'CZGjQDdXvv0ZFZKu11lrNQ==', 'a2uqccTkUFAfMkaZXtUmmg==', 'UjV5xT0nYnTvY1GxRm86zQ=='),
(16, '+y75Ycn2jvMknS85evdwpw==', 'R4haaZ6N6n58RhAo1LFpzg==', 'R4haaZ6N6n58RhAo1LFpzg==', '7m2ng0hiRNq6T8cggD9yScRX5uLuyra8HYwBe88re4bdtGDQ1CMJrUJD25gZ/qmv', 'VpYVfLUVyPVXjd6IN5VjqA==', 'UjV5xT0nYnTvY1GxRm86zQ==', 'TtP1FRKqwcjNq0dCqkcQYw==', 'DQENKFrS5d9578vN0EWwyA==', 'VJ5gkB3Wowfp/+Kh9J8pRw==', '0cnLWYVn12atV+wHRRNqJQ==', 'NzHaKeZVPy70+uL/cGs5kA==', 'wriK5NJxAQO1aVELVG3xsg==', 'CZGjQDdXvv0ZFZKu11lrNQ==', '1TLrGTbIYte0MrWTXiBCJw==', 'UjV5xT0nYnTvY1GxRm86zQ==');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`pasien_id`);

--
-- Indexes for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  ADD PRIMARY KEY (`rm_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `pasien`
--
ALTER TABLE `pasien`
  MODIFY `pasien_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- AUTO_INCREMENT for table `rekam_medis`
--
ALTER TABLE `rekam_medis`
  MODIFY `rm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
