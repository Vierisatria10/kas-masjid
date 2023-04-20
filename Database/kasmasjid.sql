-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 29, 2022 at 03:56 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kasmasjid`
--

-- --------------------------------------------------------

--
-- Table structure for table `jurnal`
--

CREATE TABLE `jurnal` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(225) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `tgl_transaksi` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jurnal_detail`
--

CREATE TABLE `jurnal_detail` (
  `id` int(11) NOT NULL,
  `id_jurnal` varchar(225) NOT NULL,
  `kredit` int(225) NOT NULL,
  `debit` int(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kas`
--

CREATE TABLE `kas` (
  `id_transaksi` varchar(255) NOT NULL,
  `tipe_kas` varchar(225) NOT NULL,
  `keterangan` varchar(225) NOT NULL,
  `nominal` int(128) NOT NULL,
  `tgl_transaksi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kas`
--

INSERT INTO `kas` (`id_transaksi`, `tipe_kas`, `keterangan`, `nominal`, `tgl_transaksi`) VALUES
('28082022-6593', 'masuk', 'Donasi A/n Aqmarina', 5000000, '2022-08-28'),
('28082022-2628', 'masuk', 'Donasi A/n Sandi', 10000000, '2022-08-28'),
('28082022-3842', 'keluar', 'Beli Sejadah', 1000000, '2022-08-28'),
('29082022-8985', 'masuk', 'Dikasih Orang', 5000000, '2022-08-29'),
('29082022-7141', 'masuk', 'Uang Pembangunan', 3000000, '2022-08-29'),
('29082022-235', 'masuk', 'Infak hari jumat', 2000000, '2022-09-03'),
('29082022-3174', 'masuk', 'Donasi A/n Sandi Maulidika', 10000000, '2022-08-29');

--
-- Trigger `kas`
--
DELIMITER $$
CREATE TRIGGER `after_kas_insert` AFTER INSERT ON `kas` FOR EACH ROW BEGIN
	DECLARE id_jurnal INT;
         INSERT INTO jurnal(id_transaksi, keterangan,tgl_transaksi)
        VALUES(NEW.id_transaksi,NEW.keterangan,NEW.tgl_transaksi);
				

    select id INTO id_jurnal
    from jurnal where id_transaksi=NEW.id_transaksi;
		
    IF NEW.tipe_kas = 'keluar' THEN
		 INSERT INTO jurnal_detail(id_jurnal, kredit,debit)
        VALUES(id_jurnal,NEW.nominal,0);
				ELSE
				 INSERT INTO jurnal_detail(id_jurnal, kredit,debit)
        VALUES(id_jurnal,0,NEW.nominal);
		END IF;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_donatur`
--

CREATE TABLE `tbl_donatur` (
  `id` int(11) NOT NULL,
  `nama` varchar(225) NOT NULL,
  `alamat` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_donatur`
--

INSERT INTO `tbl_donatur` (`id`, `nama`, `alamat`) VALUES
(1, 'Aqmarina', 'Solo, Sragen'),
(3, 'Sandi Maulidika', 'Palembang, Gelumbang');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_transaksi`
--

CREATE TABLE `tbl_transaksi` (
  `id` int(11) NOT NULL,
  `id_transaksi` varchar(225) NOT NULL,
  `nama_transaksi` varchar(225) NOT NULL,
  `nominal` double(255,0) NOT NULL,
  `jenis` varchar(225) NOT NULL,
  `id_anggota` varchar(225) NOT NULL,
  `date_trx` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_transaksi`
--

INSERT INTO `tbl_transaksi` (`id`, `id_transaksi`, `nama_transaksi`, `nominal`, `jenis`, `id_anggota`, `date_trx`) VALUES
(3, '28082022-6593', 'Donasi A/n Aqmarina', 5000000, 'kas masuk', '1', '2022-08-28'),
(4, '28082022-2628', 'Donasi A/n Sandi', 10000000, 'kas masuk', '3', '2022-08-28'),
(5, '29082022-3174', 'Donasi A/n Sandi Maulidika', 10000000, 'kas masuk', '3', '2022-08-29');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `image` varchar(128) NOT NULL,
  `password` varchar(225) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` int(1) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `image`, `password`, `role_id`, `is_active`, `date_created`) VALUES
(1, 'Sandemo', 'sandimaulidika@gmail.com', 'SanSan.jpg', '$2y$10$QNZyEGDDDa9CjIvG08Ny0OrSibp.RrF5ZjFLvu99oCeGu.04QXq7u', 1, 1, 1661189930),
(8, 'sandemo', 'infosandemo@gmail.com', 'default.jpg', '$2y$10$QNZyEGDDDa9CjIvG08Ny0OrSibp.RrF5ZjFLvu99oCeGu.04QXq7u', 2, 1, 1661189930);

-- --------------------------------------------------------

--
-- Table structure for table `user_access_menu`
--

CREATE TABLE `user_access_menu` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_access_menu`
--

INSERT INTO `user_access_menu` (`id`, `role_id`, `menu_id`) VALUES
(1, 1, 1),
(2, 1, 6),
(3, 1, 2),
(5, 1, 3),
(6, 1, 5),
(13, 2, 2),
(14, 2, 5),
(15, 2, 6);

-- --------------------------------------------------------

--
-- Table structure for table `user_menu`
--

CREATE TABLE `user_menu` (
  `id` int(11) NOT NULL,
  `menu` varchar(225) NOT NULL,
  `sort` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_menu`
--

INSERT INTO `user_menu` (`id`, `menu`, `sort`) VALUES
(1, 'Admin', 1),
(2, 'User', 4),
(3, 'Menu', 5),
(5, 'Transaksi', 2),
(6, 'Laporan', 3);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id` int(11) NOT NULL,
  `role` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Keuangan');

-- --------------------------------------------------------

--
-- Table structure for table `user_sub_menu`
--

CREATE TABLE `user_sub_menu` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `icon` varchar(128) NOT NULL,
  `is_active` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_sub_menu`
--

INSERT INTO `user_sub_menu` (`id`, `menu_id`, `title`, `url`, `icon`, `is_active`) VALUES
(1, 1, 'Dashboard', 'admin', 'shop text-primary', 1),
(2, 2, 'My Profile', 'user', 'single-02 text-success', 1),
(4, 3, 'Menu Management', 'menu', 'folder-17 text-danger', 1),
(5, 3, 'Submenu Management', 'menu/submenu', 'ui-04 text-danger', 1),
(8, 1, 'Role', 'admin/role', 'circle-08 text-info', 1),
(12, 1, 'Data Donatur', 'admin/donatur', 'circle-08 text-success', 1),
(22, 5, 'Data Donasi', 'transaksi/donasi', 'badge text-primary', 1),
(23, 5, 'Kas Keluar', 'transaksi/kaskeluar', 'fat-delete text-danger', 1),
(24, 5, 'Kas Masuk', 'transaksi/kasmasuk', 'fat-add text-info', 1),
(25, 6, 'Laporan Kas', 'laporan', 'chart-bar-32 text-success', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_token`
--

CREATE TABLE `user_token` (
  `id` int(11) NOT NULL,
  `email` varchar(225) NOT NULL,
  `token` varchar(128) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_token`
--

INSERT INTO `user_token` (`id`, `email`, `token`, `date_created`) VALUES
(1, 'infosandemo@gmail.com', 'hHK0NnmeEuuRSVhksGI2lNanbtdHFo8CMNRfVc6xvRA=', 1661489975);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jurnal`
--
ALTER TABLE `jurnal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jurnal_detail`
--
ALTER TABLE `jurnal_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_donatur`
--
ALTER TABLE `tbl_donatur`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_menu`
--
ALTER TABLE `user_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_token`
--
ALTER TABLE `user_token`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jurnal`
--
ALTER TABLE `jurnal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jurnal_detail`
--
ALTER TABLE `jurnal_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_donatur`
--
ALTER TABLE `tbl_donatur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_transaksi`
--
ALTER TABLE `tbl_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user_access_menu`
--
ALTER TABLE `user_access_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `user_menu`
--
ALTER TABLE `user_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_sub_menu`
--
ALTER TABLE `user_sub_menu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `user_token`
--
ALTER TABLE `user_token`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
