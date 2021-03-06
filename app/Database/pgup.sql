-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 28, 2022 at 07:05 AM
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
-- Database: `pgup`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_bank`
--

CREATE TABLE `tb_bank` (
  `idbank` int(11) NOT NULL,
  `bankname` varchar(50) NOT NULL,
  `bankaccname` varchar(50) NOT NULL,
  `bankaccnumber` varchar(50) NOT NULL,
  `flag` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_bank`
--

INSERT INTO `tb_bank` (`idbank`, `bankname`, `bankaccname`, `bankaccnumber`, `flag`) VALUES
(1, 'MANDIRI', 'EGAN KUSMAYA PUTRA', '0008374617381', 1),
(2, 'BNI', 'MUHAMMAD YUSUF RAMADHAN', '0009278647183', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_comment_csde`
--

CREATE TABLE `tb_comment_csde` (
  `idcomment` int(11) NOT NULL,
  `idorder` int(11) DEFAULT NULL,
  `idcs` int(11) DEFAULT NULL,
  `iddesigner` int(11) DEFAULT NULL,
  `comment` text NOT NULL,
  `file1` text DEFAULT NULL,
  `file2` text DEFAULT NULL,
  `commenttime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_comment_csde`
--

INSERT INTO `tb_comment_csde` (`idcomment`, `idorder`, `idcs`, `iddesigner`, `comment`, `file1`, `file2`, `commenttime`) VALUES
(1, 2, NULL, 1, 'lorem ipsum dolor sit amet', NULL, NULL, '2022-02-03 07:44:16'),
(2, 2, NULL, 1, 'ini contoh nya', 'file1_1643940094_4179e2a009bfaed5aa11.jpg_1', 'file2_1643940094_0f2bb239aeaa8d68422a.jpg_1', '2022-02-03 08:01:34'),
(3, 2, 1, NULL, 'aduh gimana yak', NULL, NULL, '2022-02-04 02:30:39'),
(4, 5, NULL, 1, 'ini contoh nya', NULL, NULL, '2022-02-16 02:21:05'),
(5, 5, NULL, 1, 'ini contoh nya 2', 'file1__11644996442_216071610b31fd04139f.jpg', NULL, '2022-02-16 02:27:22');

-- --------------------------------------------------------

--
-- Table structure for table `tb_comment_csum`
--

CREATE TABLE `tb_comment_csum` (
  `idcomment` int(11) NOT NULL,
  `idorder` int(11) DEFAULT NULL,
  `idumkm` int(11) DEFAULT NULL,
  `idcs` int(11) DEFAULT NULL,
  `comment` text NOT NULL,
  `file1` text DEFAULT NULL,
  `file2` text DEFAULT NULL,
  `commenttime` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_comment_csum`
--

INSERT INTO `tb_comment_csum` (`idcomment`, `idorder`, `idumkm`, `idcs`, `comment`, `file1`, `file2`, `commenttime`) VALUES
(1, 2, NULL, 1, 'testing', NULL, NULL, '2022-02-03 09:32:19'),
(2, 2, NULL, 1, 'testing 2', NULL, NULL, '2022-02-03 09:36:13');

-- --------------------------------------------------------

--
-- Table structure for table `tb_cs`
--

CREATE TABLE `tb_cs` (
  `idcs` int(11) NOT NULL,
  `name` text NOT NULL,
  `phone` varchar(15) NOT NULL,
  `whatsapp` varchar(15) NOT NULL,
  `cs_pic` text DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_cs`
--

INSERT INTO `tb_cs` (`idcs`, `name`, `phone`, `whatsapp`, `cs_pic`, `iduser`) VALUES
(1, 'Hafidz Perdana', '08228567385', '08228567385', 'image.jpg', 8);

-- --------------------------------------------------------

--
-- Table structure for table `tb_deposit`
--

CREATE TABLE `tb_deposit` (
  `iddeposit` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `dateincome` date NOT NULL,
  `idorder` int(11) DEFAULT NULL,
  `iddesigner` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `dribbble` text NOT NULL,
  `web` text DEFAULT NULL,
  `bankaccount` varchar(30) NOT NULL,
  `bankname` varchar(50) NOT NULL,
  `bankaccname` varchar(100) NOT NULL,
  `designer_pic` text DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_designer`
--

INSERT INTO `tb_designer` (`iddesigner`, `name`, `description`, `phone`, `whatsapp`, `dribbble`, `web`, `bankaccount`, `bankname`, `bankaccname`, `designer_pic`, `iduser`) VALUES
(1, 'Muhammad Amien Fadhillah', '', '082214996767', '082214996767', '', '', '9781948341', 'Mandiri', 'Muhammad Amien Fadhillah', '1643008401_7a809f5786e3b47fe35e.png', 7),
(2, 'Rayhan Ampurama', '', '02218439923', '082218435891', '', '', '9781948341', 'MANDIRI', 'RAYHAN AMPURAMA', 'image.jpg', 9);

-- --------------------------------------------------------

--
-- Table structure for table `tb_order`
--

CREATE TABLE `tb_order` (
  `idorder` int(11) NOT NULL,
  `orderdate` datetime NOT NULL,
  `idumkm` int(11) NOT NULL,
  `idcs` int(11) DEFAULT NULL,
  `iddesigner` int(11) DEFAULT NULL,
  `description` text NOT NULL,
  `paymentproof` text DEFAULT NULL,
  `totalpayment` int(11) DEFAULT NULL,
  `file1` text DEFAULT NULL,
  `file2` text DEFAULT NULL,
  `file3` text DEFAULT NULL,
  `file4` text DEFAULT NULL,
  `idstatus` int(11) DEFAULT NULL,
  `idprodcat` int(11) DEFAULT NULL,
  `idgrouporder` int(11) DEFAULT NULL,
  `iddiscount` int(11) DEFAULT NULL,
  `designpreview1` text DEFAULT NULL,
  `designpreview2` text DEFAULT NULL,
  `orderedfile1` text DEFAULT NULL,
  `orderedfile2` text DEFAULT NULL,
  `designerrating` int(1) DEFAULT NULL,
  `csrating` int(1) DEFAULT NULL,
  `reviewcs` text DEFAULT NULL,
  `reviewdesigner` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_order`
--

INSERT INTO `tb_order` (`idorder`, `orderdate`, `idumkm`, `idcs`, `iddesigner`, `description`, `paymentproof`, `totalpayment`, `file1`, `file2`, `file3`, `file4`, `idstatus`, `idprodcat`, `idgrouporder`, `iddiscount`, `designpreview1`, `designpreview2`, `orderedfile1`, `orderedfile2`, `designerrating`, `csrating`, `reviewcs`, `reviewdesigner`) VALUES
(2, '2022-02-02 00:00:00', 1, 1, 1, '<p>ditampilkan sebaik mungkin</p>', 'paypr2121_1643858732_6690dea5d4cd7a5cae0f.jpg', 250000, NULL, NULL, NULL, NULL, 8, 2, 1, NULL, 'prev1_1643981521_30184005eef2c81de027.jpg', 'file2_1643981521_6610da005146aaf61b3c.png', 'orderedfile1_1644030757_a080ac025854a2217442.zip', 'orderedfile2_1644030757_a89a852248e136397d3e.jpg', 4, 5, '', ''),
(3, '2022-02-06 00:00:00', 3, 1, 1, '<p>ditampilkan sebaik mungkin</p>', 'paypr2121_1643858732_6690dea5d4cd7a5cae0f.jpg', 250000, NULL, NULL, NULL, NULL, 8, 2, 1, NULL, 'prev1_1643981521_30184005eef2c81de027.jpg', 'file2_1643981521_6610da005146aaf61b3c.png', 'orderedfile1_1644030757_a080ac025854a2217442.zip', 'orderedfile2_1644030757_a89a852248e136397d3e.jpg', 4, 5, '', ''),
(4, '2022-02-04 00:00:00', 3, 1, 1, '<p>ditampilkan sebaik mungkin</p>', 'paypr2121_1643858732_6690dea5d4cd7a5cae0f.jpg', 250000, NULL, NULL, NULL, NULL, 8, 2, 1, NULL, 'prev1_1643981521_30184005eef2c81de027.jpg', 'file2_1643981521_6610da005146aaf61b3c.png', 'orderedfile1_1644030757_a080ac025854a2217442.zip', 'orderedfile2_1644030757_a89a852248e136397d3e.jpg', 4, 5, '', ''),
(5, '2022-02-16 10:45:23', 1, 1, 1, '<p>btuh desain dengan tema kerajinan tangan</p><p>kebutuhan tema minimalis &amp; simple</p>', NULL, 250000, NULL, NULL, NULL, NULL, 9, 3, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(6, '2022-02-04 10:03:21', 3, 1, NULL, '<p>butuh urgent, bisa selesai dalam 3 hari mulai dari persetujuan kontrak</p>', 'paypr4363_1645669534_2b27020162ce74bcdfa0.jpg', 400000, 'file1_1645239801_6211a056c7d3d4a03980.jpg', NULL, NULL, NULL, 3, 4, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(9, '2022-03-10 09:02:51', 1, NULL, NULL, '<p>&nbsp;rdsfa</p>', NULL, 400000, NULL, NULL, NULL, NULL, 1, 2, 3, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

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
(1, 'Muhamad Yusuf Ramadhan', 'Bojongsoan 102', '082299013978', '082299013978', 1),
(3, 'Egan Kusmaya Putra', 'Bumi Parahyangan Kencana', '082215204919', '082215204919', 2);

-- --------------------------------------------------------

--
-- Table structure for table `tb_portfolio`
--

CREATE TABLE `tb_portfolio` (
  `idportfolio` int(11) NOT NULL,
  `img` text DEFAULT NULL,
  `description` text NOT NULL,
  `url` text NOT NULL,
  `iddesigner` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_portfolio`
--

INSERT INTO `tb_portfolio` (`idportfolio`, `img`, `description`, `url`, `iddesigner`) VALUES
(1, '1643107598_b9b4c13c3084678539fb.jpg', 'sample portfolio 1', 'example.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tb_static`
--

CREATE TABLE `tb_static` (
  `idstatic` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `img1` text DEFAULT NULL,
  `img2` text DEFAULT NULL,
  `img3` text DEFAULT NULL,
  `img4` text DEFAULT NULL,
  `tag` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_static`
--

INSERT INTO `tb_static` (`idstatic`, `title`, `content`, `img1`, `img2`, `img3`, `img4`, `tag`) VALUES
(1, 'Digital Agency <br> That Help You <br> To Go Ahead', 'We\'re Awesome', '1643904187_de64e102c2c6300642c0.jpg', '1643904187_6ff784a20cd4a0b5a4a7.jpg', '1643904187_95ed4c8119dad7f033de.jpg', '1643904187_ebceb6bcd69f0ba6050c.jpg', 'home_hero'),
(3, 'We???r a dynamic team of creatives people innovation & Marketing Expertx', 'We provide marketing services to startups and small businesses to looking for a partner of their digital media, design & dev, lead generation, and communications requirents. We work with you, not for you. Although we have great resources.', '1643904979_5057f52d90e5172667d5.jpg', '1643905472_63179d38874a3aaf30cc.png', NULL, NULL, 'home_about'),
(4, 'We provide wide range of web & business services.', 'We???ve strong work history with different business services', '1643866842_f452d66882aeed3b41f6.png', NULL, NULL, NULL, 'home_services'),
(5, 'Business Consulting', 'Lorem ipsum dolor sit amet, percipitur sadipscing.', 'flaticon-user', NULL, NULL, NULL, 'home_services_categories'),
(6, 'SEO & SMM services', 'Lorem ipsum dolor sit amet, percipitur sadipscing elit 3.', 'flaticon-layers', NULL, NULL, NULL, 'home_services_categories'),
(7, 'Interface Design', 'Lorem ipsum dolor sit amet, percipitur sadipscing.', 'flaticon-bar-chart', NULL, NULL, NULL, 'home_services_categories'),
(8, 'Apps Development', 'Lorem ipsum dolor sit amet, percipitur sadipscing.', 'flaticon-smartphone', NULL, NULL, NULL, 'home_services_categories'),
(9, 'Kami menyediakan <br> penawaran dan pelayanan <br> terbaik untuk kamu!', 'Dapatkan pelayanan jasa desain kemasan dan logo kami segera!', NULL, NULL, NULL, NULL, 'home_pricing'),
(10, 'Design Logo', 'Rp250.000,-', NULL, NULL, NULL, NULL, 'home_pricing_opt'),
(11, 'Design Packaging', 'Rp200.000,-', NULL, NULL, NULL, NULL, 'home_pricing_opt'),
(12, 'Weekly Package', '<li>50GB Bandwidth</li>					    		<li>Business & Financ Analysing</li>				    				<li>24 hour support</li>								    				<li>Customer Managemet</li>', NULL, NULL, NULL, NULL, 'home_pricing_detail'),
(13, 'Yearly Package', '<li>50GB Bandwidth</li>					    		<li>Business & Financ Analysing</li>				    				<li>24 hour support</li>								    				<li>Customer Managemet</li>', NULL, NULL, NULL, NULL, 'home_pricing_detail'),
(14, 'Lorem Ipsum Dolor <br> Sit Amet 2', 'We\'re', '1643904733_cbf042e67f9a85952531.jpg', NULL, NULL, NULL, 'home_hero'),
(16, 'The thing that motivates me is a very common form of motivation. And that is, with other folk counting on me, it\'s so easy to be motivated.', 'we work with business & provide solution to client with their business problema', NULL, NULL, NULL, NULL, 'home_do'),
(17, 'Financial Advise', 'Market Statics Growth & Advance Analysis', NULL, NULL, NULL, NULL, 'home_do_categories'),
(18, 'Market Analysis', 'Market Statics Growth & Advance Analysis', NULL, NULL, NULL, NULL, 'home_do_categories'),
(19, 'Web Solution', 'Market Statics Growth & Advance Analysis', NULL, NULL, NULL, NULL, 'home_do_categories'),
(20, 'Check what???s our client <br> Say about us', '', '1643906497_9b7eed4d9b69ee62c814.jpg', NULL, NULL, NULL, 'home_testimonials'),
(21, 'Don???t Hesitate to <br> contact with us for any <br> kind of information', '', NULL, NULL, NULL, NULL, 'contact'),
(22, 'Call us for imiditate support this number', '880 876 65 455', NULL, NULL, NULL, NULL, 'contact');

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
  `instagram` text DEFAULT NULL,
  `web` text DEFAULT NULL,
  `umkm_pic` text DEFAULT NULL,
  `iduser` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_umkm`
--

INSERT INTO `tb_umkm` (`idumkm`, `umkm_name`, `description`, `address`, `phone`, `whatsapp`, `instagram`, `web`, `umkm_pic`, `iduser`) VALUES
(1, 'PT. Jaya Abadi', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'bojongswan 1', '082215204919', '082215204919', 'instagram.com/ogura_yui', 'example123.com', '1642863035_1c1c40a46c6a83cf92ec.jpg', 5),
(3, 'Toko Bagus', 'adalah saya', 'Bumi Parahyangan Kencana', '082215204919', '082215204919', 'egn234', 'egn234.com', '1642864955_b775a9b11376629a0ce8.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `iduser` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `email` text NOT NULL,
  `flag` int(1) NOT NULL,
  `idgroup` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`iduser`, `username`, `pass`, `email`, `flag`, `idgroup`) VALUES
(1, 'pengelola1', 'c20c8984f3db849ad612d2c40f0672ae', 'pengelola1@gmail.com', 1, 1),
(2, 'pengelola2', '9966b7ee997de5c313b743584f6b8830', 'egn234@gmail.com', 1, 1),
(5, 'umkm1', '25d55ad283aa400af464c76d713c07ad', 'umkm1@gmail.com', 1, 4),
(6, 'umkm2', '25d55ad283aa400af464c76d713c07ad', 'umkm2@gmail.com', 1, 4),
(7, 'designer1', '25d55ad283aa400af464c76d713c07ad', 'designer1@gmail.com', 1, 3),
(8, 'custserv1', '42a9e5f9920ad5ff82ac73d8152fd03a', 'custserv1@gmail.com', 1, 2),
(9, 'designer2', '8218c5b2fd2e8558a937745134a34a9f', 'designer2@gmail.com', 1, 3),
(10, 'designer3', '2a29cf3b35c1a89f61dd90464e472ced', 'designer3@gmail.com', 1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_withdraw`
--

CREATE TABLE `tb_withdraw` (
  `idwithdraw` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `status` enum('Requested','Processed','Confirmed','Cancelled') DEFAULT NULL,
  `transferproof` text DEFAULT NULL,
  `timerequest` datetime NOT NULL,
  `cancelledreason` text NOT NULL,
  `idpengelola` int(11) DEFAULT NULL,
  `iddesigner` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_withdraw`
--

INSERT INTO `tb_withdraw` (`idwithdraw`, `amount`, `description`, `status`, `transferproof`, `timerequest`, `cancelledreason`, `idpengelola`, `iddesigner`) VALUES
(1, 250000, 'sample withdraw', 'Cancelled', NULL, '2022-02-08 06:44:46', 'kurang uang', 1, 1),
(2, 100000, 'sample withdraw 2', 'Confirmed', '1644306420_28487f15a203cbe3b5cb.jpg', '2022-02-10 06:44:46', '', 1, 1),
(3, 200000, 'butuh uang', 'Processed', NULL, '2022-02-09 11:16:32', '', 1, 1);

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

--
-- Dumping data for table `tr_discount`
--

INSERT INTO `tr_discount` (`iddiscount`, `discountcode`, `discountamount`, `flag`) VALUES
(1, 'BAZZARMNG', 25, 1);

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
(2, 'desain kemasan', 200000),
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
-- Indexes for table `tb_bank`
--
ALTER TABLE `tb_bank`
  ADD PRIMARY KEY (`idbank`);

--
-- Indexes for table `tb_comment_csde`
--
ALTER TABLE `tb_comment_csde`
  ADD PRIMARY KEY (`idcomment`),
  ADD KEY `idorder` (`idorder`),
  ADD KEY `idcs` (`idcs`),
  ADD KEY `iddesigner` (`iddesigner`);

--
-- Indexes for table `tb_comment_csum`
--
ALTER TABLE `tb_comment_csum`
  ADD PRIMARY KEY (`idcomment`),
  ADD KEY `idorder` (`idorder`),
  ADD KEY `idumkm` (`idumkm`),
  ADD KEY `idcs` (`idcs`);

--
-- Indexes for table `tb_cs`
--
ALTER TABLE `tb_cs`
  ADD PRIMARY KEY (`idcs`),
  ADD KEY `iduser` (`iduser`);

--
-- Indexes for table `tb_deposit`
--
ALTER TABLE `tb_deposit`
  ADD PRIMARY KEY (`iddeposit`),
  ADD KEY `idorder` (`idorder`),
  ADD KEY `iddesigner` (`iddesigner`);

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
-- Indexes for table `tb_withdraw`
--
ALTER TABLE `tb_withdraw`
  ADD PRIMARY KEY (`idwithdraw`),
  ADD KEY `idpengelola` (`idpengelola`),
  ADD KEY `iddesigner` (`iddesigner`);

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
-- AUTO_INCREMENT for table `tb_bank`
--
ALTER TABLE `tb_bank`
  MODIFY `idbank` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_comment_csde`
--
ALTER TABLE `tb_comment_csde`
  MODIFY `idcomment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tb_comment_csum`
--
ALTER TABLE `tb_comment_csum`
  MODIFY `idcomment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_cs`
--
ALTER TABLE `tb_cs`
  MODIFY `idcs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_deposit`
--
ALTER TABLE `tb_deposit`
  MODIFY `iddeposit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_designer`
--
ALTER TABLE `tb_designer`
  MODIFY `iddesigner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_order`
--
ALTER TABLE `tb_order`
  MODIFY `idorder` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tb_pengelola`
--
ALTER TABLE `tb_pengelola`
  MODIFY `idpengelola` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_portfolio`
--
ALTER TABLE `tb_portfolio`
  MODIFY `idportfolio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_static`
--
ALTER TABLE `tb_static`
  MODIFY `idstatic` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_umkm`
--
ALTER TABLE `tb_umkm`
  MODIFY `idumkm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `iduser` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_withdraw`
--
ALTER TABLE `tb_withdraw`
  MODIFY `idwithdraw` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tr_discount`
--
ALTER TABLE `tr_discount`
  MODIFY `iddiscount` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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
-- Constraints for table `tb_comment_csde`
--
ALTER TABLE `tb_comment_csde`
  ADD CONSTRAINT `tb_comment_csde_ibfk_1` FOREIGN KEY (`idorder`) REFERENCES `tb_order` (`idorder`),
  ADD CONSTRAINT `tb_comment_csde_ibfk_2` FOREIGN KEY (`idcs`) REFERENCES `tb_cs` (`idcs`),
  ADD CONSTRAINT `tb_comment_csde_ibfk_3` FOREIGN KEY (`iddesigner`) REFERENCES `tb_designer` (`iddesigner`);

--
-- Constraints for table `tb_comment_csum`
--
ALTER TABLE `tb_comment_csum`
  ADD CONSTRAINT `tb_comment_csum_ibfk_1` FOREIGN KEY (`idorder`) REFERENCES `tb_order` (`idorder`),
  ADD CONSTRAINT `tb_comment_csum_ibfk_2` FOREIGN KEY (`idumkm`) REFERENCES `tb_umkm` (`idumkm`),
  ADD CONSTRAINT `tb_comment_csum_ibfk_3` FOREIGN KEY (`idcs`) REFERENCES `tb_cs` (`idcs`);

--
-- Constraints for table `tb_cs`
--
ALTER TABLE `tb_cs`
  ADD CONSTRAINT `tb_cs_ibfk_1` FOREIGN KEY (`iduser`) REFERENCES `tb_user` (`iduser`);

--
-- Constraints for table `tb_deposit`
--
ALTER TABLE `tb_deposit`
  ADD CONSTRAINT `tb_deposit_ibfk_1` FOREIGN KEY (`idorder`) REFERENCES `tb_order` (`idorder`),
  ADD CONSTRAINT `tb_deposit_ibfk_2` FOREIGN KEY (`iddesigner`) REFERENCES `tb_designer` (`iddesigner`);

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

--
-- Constraints for table `tb_withdraw`
--
ALTER TABLE `tb_withdraw`
  ADD CONSTRAINT `tb_withdraw_ibfk_1` FOREIGN KEY (`idpengelola`) REFERENCES `tb_pengelola` (`idpengelola`),
  ADD CONSTRAINT `tb_withdraw_ibfk_2` FOREIGN KEY (`iddesigner`) REFERENCES `tb_designer` (`iddesigner`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
