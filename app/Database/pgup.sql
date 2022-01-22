-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2022 at 08:56 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pgup`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_comment`
--

CREATE TABLE `tb_comment` (
  `idcomment` int(11) NOT NULL,
  `idorder` int(11) DEFAULT NULL,
  `idumkm` int(11) DEFAULT NULL,
  `idcs` int(11) DEFAULT NULL,
  `iddesigner` int(11) DEFAULT NULL,
  `comment` text NOT NULL,
  `file1` text,
  `file2` text,
  `commenttime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_cs`
--

CREATE TABLE `tb_cs` (
  `idcs` int(11) NOT NULL,
  `name` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `whatsapp` varchar(15) NOT NULL,
  `cs_pic` text,
  `iduser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_designer`
--

CREATE TABLE `tb_designer` (
  `iddesigner` int(11) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `whatsapp` varchar(15) NOT NULL,
  `dribble` text NOT NULL,
  `web` text,
  `bankaccount` varchar(30) NOT NULL,
  `bankname` varchar(50) NOT NULL,
  `backaccname` varchar(100) NOT NULL,
  `designer_pic` text,
  `iduser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `idorder` int(11) NOT NULL,
  `orderdate` date NOT NULL,
  `idumkm` int(11) NOT NULL,
  `idcs` int(11) DEFAULT NULL,
  `iddesigner` int(11) DEFAULT NULL,
  `description` text NOT NULL,
  `paymentproof` text,
  `totalpayment` int(11) DEFAULT NULL,
  `file1` text,
  `file2` text,
  `file3` text,
  `file4` text,
  `idstatus` int(11) DEFAULT NULL,
  `idprodcat` int(11) DEFAULT NULL,
  `idgrouporder` int(11) DEFAULT NULL,
  `iddiscount` int(11) DEFAULT NULL,
  `designpreview1` text,
  `designpreview2` text,
  `orderedfile1` text,
  `orderedfile2` text,
  `designerrating` int(1) DEFAULT NULL,
  `csrating` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengelola`
--

CREATE TABLE `tb_pengelola` (
  `idpengelola` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `address` varchar(32) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `whatsapp` varchar(15) DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengelola`
--

INSERT INTO `tb_pengelola` (`idpengelola`, `name`, `address`, `phone`, `whatsapp`, `iduser`) VALUES
(1, 'Muhamad Yusuf Ramadhan', 'Bojongsoan 102', '082299013978', '082299013978', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_portfolio`
--

CREATE TABLE `tb_portfolio` (
  `idportfolio` int(11) NOT NULL,
  `img` text,
  `description` text NOT NULL,
  `url` text NOT NULL,
  `iddesigner` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_static`
--

CREATE TABLE `tb_static` (
  `idstatic` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `img1` text,
  `img2` text,
  `img3` text,
  `img4` text,
  `tag` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_umkm`
--

CREATE TABLE `tb_umkm` (
  `idumkm` int(11) NOT NULL,
  `umkm_name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `address` varchar(32) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `whatsapp` varchar(15) DEFAULT NULL,
  `instagram` text,
  `web` text,
  `umkm_pic` text,
  `iduser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pass` text NOT NULL,
  `email` text NOT NULL,
  `flag` int(1) NOT NULL,
  `idgroup` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`iduser`, `username`, `pass`, `email`, `flag`, `idgroup`) VALUES
(1, 'pengelola1', 'c20c8984f3db849ad612d2c40f0672ae', 'pengelola1@gmail.com', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tr_discount`
--

CREATE TABLE `tr_discount` (
  `iddiscount` int(11) NOT NULL,
  `discountcode` varchar(50) NOT NULL,
  `discountamount` int(11) NOT NULL,
  `flag` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tr_group`
--

CREATE TABLE `tr_group` (
  `idgroup` int(11) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_group`
--

INSERT INTO `tr_group` (`idgroup`, `keterangan`) VALUES
(1, 'pengelola'),
(2, 'cs'),
(3, 'designer'),
(4, 'umkm');

-- --------------------------------------------------------

--
-- Table structure for table `tr_grouporder`
--

CREATE TABLE `tr_grouporder` (
  `idgrouporder` int(11) NOT NULL,
  `orderdesc` varchar(50) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_grouporder`
--

INSERT INTO `tr_grouporder` (`idgrouporder`, `orderdesc`, `price`) VALUES
(1, 'desain logo', 250000),
(2, 'design kemasan', 200000),
(3, 'desain logo & kemasan', 400000);

-- --------------------------------------------------------

--
-- Table structure for table `tr_prodcat`
--

CREATE TABLE `tr_prodcat` (
  `idprodcat` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_prodcat`
--

INSERT INTO `tr_prodcat` (`idprodcat`, `category`) VALUES
(1, 'kuliner'),
(2, 'pakaian'),
(3, 'kerajinan tangan'),
(4, 'bahan baku'),
(5, 'pertanian peternakan');

-- --------------------------------------------------------

--
-- Table structure for table `tr_statusorder`
--

CREATE TABLE `tr_statusorder` (
  `idstatus` int(11) NOT NULL,
  `statusdesc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tr_statusorder`
--

INSERT INTO `tr_statusorder` (`idstatus`, `statusdesc`) VALUES
(1, 'Menunggu Pembayaran'),
(2, 'Pembayaran Diterima'),
(3, 'Pesanan Diproses'),
(4, 'Pengerjaan Desain'),
(5, 'Review CS'),
(6, 'Review UMKM'),
(7, 'Revisi'),
(8, 'Closed'),
(9, 'Dibatalkan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_comment`
--
ALTER TABLE `tb_comment`
  ADD PRIMARY KEY (`idcomment`),
  ADD KEY `idorder` (`idorder`),
  ADD KEY `idumkm` (`idumkm`),
  ADD KEY `idcs` (`idcs`),
  ADD KEY `iddesigner` (`iddesigner`);

--
-- Indexes for table `tb_cs`
--
ALTER TABLE `tb_cs`
  ADD PRIMARY KEY (`idcs`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `tb_designer`
--
ALTER TABLE `tb_designer`
  ADD PRIMARY KEY (`iddesigner`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD PRIMARY KEY (`idorder`),
  ADD KEY `idumkm` (`idumkm`),
  ADD KEY `idcs` (`idcs`),
  ADD KEY `iddesigner` (`iddesigner`),
  ADD KEY `idstatus` (`idstatus`),
  ADD KEY `idprodcat` (`idprodcat`),
  ADD KEY `idgrouporder` (`idgrouporder`),
  ADD KEY `iddiscount` (`iddiscount`);

--
-- Indexes for table `tb_pengelola`
--
ALTER TABLE `tb_pengelola`
  ADD PRIMARY KEY (`idpengelola`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `tb_portfolio`
--
ALTER TABLE `tb_portfolio`
  ADD PRIMARY KEY (`idportfolio`),
  ADD KEY `iddesigner` (`iddesigner`);

--
-- Indexes for table `tb_static`
--
ALTER TABLE `tb_static`
  ADD PRIMARY KEY (`idstatic`);

--
-- Indexes for table `tb_umkm`
--
ALTER TABLE `tb_umkm`
  ADD PRIMARY KEY (`idumkm`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`iduser`),
  ADD KEY `idgroup` (`idgroup`);

--
-- Indexes for table `tr_discount`
--
ALTER TABLE `tr_discount`
  ADD PRIMARY KEY (`iddiscount`);

--
-- Indexes for table `tr_group`
--
ALTER TABLE `tr_group`
  ADD PRIMARY KEY (`idgroup`);

--
-- Indexes for table `tr_grouporder`
--
ALTER TABLE `tr_grouporder`
  ADD PRIMARY KEY (`idgrouporder`);

--
-- Indexes for table `tr_prodcat`
--
ALTER TABLE `tr_prodcat`
  ADD PRIMARY KEY (`idprodcat`);

--
-- Indexes for table `tr_statusorder`
--
ALTER TABLE `tr_statusorder`
  ADD PRIMARY KEY (`idstatus`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_comment`
--
ALTER TABLE `tb_comment`
  MODIFY `idcomment` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_cs`
--
ALTER TABLE `tb_cs`
  MODIFY `idcs` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_designer`
--
ALTER TABLE `tb_designer`
  MODIFY `iddesigner` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `idorder` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_pengelola`
--
ALTER TABLE `tb_pengelola`
  MODIFY `idpengelola` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_portfolio`
--
ALTER TABLE `tb_portfolio`
  MODIFY `idportfolio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_static`
--
ALTER TABLE `tb_static`
  MODIFY `idstatic` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_umkm`
--
ALTER TABLE `tb_umkm`
  MODIFY `idumkm` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tr_discount`
--
ALTER TABLE `tr_discount`
  MODIFY `iddiscount` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tr_group`
--
ALTER TABLE `tr_group`
  MODIFY `idgroup` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tr_grouporder`
--
ALTER TABLE `tr_grouporder`
  MODIFY `idgrouporder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tr_prodcat`
--
ALTER TABLE `tr_prodcat`
  MODIFY `idprodcat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tr_statusorder`
--
ALTER TABLE `tr_statusorder`
  MODIFY `idstatus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_comment`
--
ALTER TABLE `tb_comment`
  ADD CONSTRAINT `tb_comment_ibfk_1` FOREIGN KEY (`idorder`) REFERENCES `tb_order` (`idorder`),
  ADD CONSTRAINT `tb_comment_ibfk_2` FOREIGN KEY (`idumkm`) REFERENCES `tb_umkm` (`idumkm`),
  ADD CONSTRAINT `tb_comment_ibfk_3` FOREIGN KEY (`idcs`) REFERENCES `tb_cs` (`idcs`),
  ADD CONSTRAINT `tb_comment_ibfk_4` FOREIGN KEY (`iddesigner`) REFERENCES `tb_designer` (`iddesigner`);

--
-- Constraints for table `tb_cs`
--
ALTER TABLE `tb_cs`
  ADD CONSTRAINT `tb_cs_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `tb_user` (`iduser`);

--
-- Constraints for table `tb_designer`
--
ALTER TABLE `tb_designer`
  ADD CONSTRAINT `tb_designer_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `tb_user` (`iduser`);

--
-- Constraints for table `tb_order`
--
ALTER TABLE `tb_order`
  ADD CONSTRAINT `tb_order_ibfk_1` FOREIGN KEY (`idumkm`) REFERENCES `tb_umkm` (`idumkm`),
  ADD CONSTRAINT `tb_order_ibfk_2` FOREIGN KEY (`idcs`) REFERENCES `tb_cs` (`idcs`),
  ADD CONSTRAINT `tb_order_ibfk_3` FOREIGN KEY (`iddesigner`) REFERENCES `tb_designer` (`iddesigner`),
  ADD CONSTRAINT `tb_order_ibfk_4` FOREIGN KEY (`idstatus`) REFERENCES `tr_statusorder` (`idstatus`),
  ADD CONSTRAINT `tb_order_ibfk_5` FOREIGN KEY (`idprodcat`) REFERENCES `tr_prodcat` (`idprodcat`),
  ADD CONSTRAINT `tb_order_ibfk_6` FOREIGN KEY (`idgrouporder`) REFERENCES `tr_grouporder` (`idgrouporder`),
  ADD CONSTRAINT `tb_order_ibfk_7` FOREIGN KEY (`iddiscount`) REFERENCES `tr_discount` (`iddiscount`);

--
-- Constraints for table `tb_pengelola`
--
ALTER TABLE `tb_pengelola`
  ADD CONSTRAINT `tb_pengelola_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `tb_user` (`iduser`);

--
-- Constraints for table `tb_portfolio`
--
ALTER TABLE `tb_portfolio`
  ADD CONSTRAINT `tb_portfolio_ibfk_1` FOREIGN KEY (`iddesigner`) REFERENCES `tb_designer` (`iddesigner`);

--
-- Constraints for table `tb_umkm`
--
ALTER TABLE `tb_umkm`
  ADD CONSTRAINT `tb_umkm_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `tb_user` (`iduser`);

--
-- Constraints for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD CONSTRAINT `tb_user_ibfk_1` FOREIGN KEY (`idgroup`) REFERENCES `tr_group` (`idgroup`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
