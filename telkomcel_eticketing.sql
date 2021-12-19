-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 02, 2021 at 10:16 AM
-- Server version: 5.7.15-log
-- PHP Version: 5.6.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `telkomcel_eticketing`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_employee`
--

CREATE TABLE `tbl_employee` (
  `id` int(11) NOT NULL,
  `nikgroup` varchar(30) DEFAULT NULL COMMENT 'Nik Group',
  `nik` varchar(30) DEFAULT NULL COMMENT 'Nik',
  `fullname` varchar(100) DEFAULT NULL COMMENT 'Full Name',
  `niss` varchar(30) DEFAULT NULL,
  `idempgroup` smallint(6) DEFAULT '0',
  `empgroup` varchar(30) DEFAULT NULL COMMENT 'Employee Group',
  `empsubgroup` varchar(30) DEFAULT NULL COMMENT 'Employee SubGroup',
  `personalarea` varchar(50) DEFAULT NULL COMMENT 'Personal Area',
  `personalsubarea` varchar(50) DEFAULT NULL COMMENT 'Personal SubArea',
  `objidposition` varchar(30) DEFAULT NULL COMMENT 'Objidposition',
  `positionname` varchar(100) DEFAULT NULL COMMENT 'Position Name',
  `abbrposition` varchar(30) DEFAULT NULL COMMENT 'Abbr Position',
  `idsubunit` int(11) DEFAULT NULL COMMENT 'Objidunit',
  `objidunit` varchar(30) DEFAULT NULL,
  `abbrunit` varchar(50) DEFAULT NULL COMMENT 'Abbr Unit',
  `idunit` int(11) DEFAULT '0',
  `unitcode` varchar(30) DEFAULT NULL,
  `unitname` varchar(30) DEFAULT NULL COMMENT 'Unit Name',
  `subunitname` varchar(80) DEFAULT NULL COMMENT 'Sub Unit',
  `companyname` varchar(80) DEFAULT NULL COMMENT 'Company Name',
  `birthday` datetime DEFAULT NULL COMMENT 'Birthday',
  `idgender` smallint(6) DEFAULT '0',
  `gender` varchar(80) DEFAULT NULL COMMENT 'Gender',
  `birthofplace` varchar(50) DEFAULT NULL COMMENT 'Birth Of Place',
  `nation` varchar(80) DEFAULT NULL COMMENT 'Nation',
  `idmarried` smallint(6) DEFAULT '0',
  `married` varchar(80) DEFAULT NULL COMMENT 'Married',
  `marrieddate` datetime DEFAULT NULL COMMENT 'Date of marriage',
  `idreligion` smallint(6) DEFAULT NULL COMMENT 'Religion',
  `religion` varchar(80) DEFAULT NULL,
  `address` mediumtext COMMENT 'Address',
  `town` varchar(100) DEFAULT NULL COMMENT 'Town',
  `postalcode` varchar(30) DEFAULT NULL COMMENT 'Postal Code',
  `regiondefault` varchar(100) DEFAULT NULL COMMENT 'Region',
  `addresstemp` mediumtext COMMENT 'Other Address',
  `towntemp` varchar(100) DEFAULT NULL COMMENT 'Other Town',
  `postalcodetemp` varchar(20) DEFAULT NULL COMMENT 'Other PostalCode',
  `regiontemp` varchar(30) DEFAULT NULL COMMENT 'Other Region',
  `bandposition` varchar(10) DEFAULT NULL COMMENT 'Band Position',
  `hpnumber` varchar(20) DEFAULT NULL COMMENT 'Handphone Number',
  `email` varchar(30) DEFAULT NULL COMMENT 'Email',
  `codepa` varchar(30) DEFAULT NULL COMMENT 'PA Code',
  `objidpositionparent` varchar(30) DEFAULT NULL COMMENT 'Objidpositionparent',
  `imgemp` varchar(100) DEFAULT NULL,
  `isToken` varchar(50) DEFAULT NULL,
  `pass` varchar(50) DEFAULT 'xxxxxxiiisssxxx',
  `isdeleted` smallint(6) DEFAULT '0',
  `remark` text,
  `iby` varchar(30) DEFAULT NULL,
  `idt` datetime DEFAULT NULL,
  `uby` varchar(30) DEFAULT NULL,
  `udt` datetime DEFAULT NULL,
  `dby` varchar(30) DEFAULT NULL,
  `ddt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_employee`
--

INSERT INTO `tbl_employee` (`id`, `nikgroup`, `nik`, `fullname`, `niss`, `idempgroup`, `empgroup`, `empsubgroup`, `personalarea`, `personalsubarea`, `objidposition`, `positionname`, `abbrposition`, `idsubunit`, `objidunit`, `abbrunit`, `idunit`, `unitcode`, `unitname`, `subunitname`, `companyname`, `birthday`, `idgender`, `gender`, `birthofplace`, `nation`, `idmarried`, `married`, `marrieddate`, `idreligion`, `religion`, `address`, `town`, `postalcode`, `regiondefault`, `addresstemp`, `towntemp`, `postalcodetemp`, `regiontemp`, `bandposition`, `hpnumber`, `email`, `codepa`, `objidpositionparent`, `imgemp`, `isToken`, `pass`, `isdeleted`, `remark`, `iby`, `idt`, `uby`, `udt`, `dby`, `ddt`) VALUES
(7, '12348', '20001', 'Mario Araujo', NULL, 0, NULL, NULL, 'IT Aplication', NULL, NULL, 'IT Application Officer', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 'Comoro', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '74536727', 'mariosilva@telkomcel.tl', NULL, NULL, NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', 0, NULL, '1234', '2021-06-05 14:54:22', NULL, NULL, NULL, NULL),
(8, '12349', '20005', 'Antonio da Costa', NULL, 0, NULL, NULL, 'Finance', NULL, NULL, 'VP NIT', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 'Becora', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, '73094580', 'antonio@telkomcel.tl', NULL, NULL, NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', 0, NULL, '12349', '2021-06-05 15:00:32', NULL, NULL, NULL, NULL),
(9, '12350', '20002', 'Sergio Rico', NULL, 0, NULL, NULL, 'Design App', NULL, NULL, 'Manager User', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 'Fatuhada', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '73456870', 'sergio28@telkomcel.tl', NULL, NULL, NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', 0, NULL, '12350', '2021-06-05 15:00:32', NULL, NULL, NULL, NULL),
(10, '12351', '20004', 'Apoly Deps', NULL, 0, NULL, NULL, 'Design App', NULL, NULL, 'Manager IT', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 'Comoro', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '7478969', 'apoly@telkomcel.tl', NULL, NULL, NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', 0, NULL, '12351', '2021-06-05 15:00:32', NULL, NULL, NULL, NULL),
(11, '12352', '20007', 'Rui Araujo', NULL, 0, NULL, NULL, 'System Analyst', NULL, NULL, 'System Analyst Officer', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, 'Bidau', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '74315278', 'raraujo@telkomcel.tl', NULL, NULL, NULL, NULL, '827ccb0eea8a706c4c34a16891f84e7b', 0, NULL, '12352', '2021-06-05 15:00:33', NULL, NULL, NULL, NULL),
(12, '12355', NULL, 'Antonio  A santos', NULL, 0, NULL, NULL, 'Finance', NULL, NULL, 'VP NIT', NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, 0, NULL, NULL, NULL, 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'xxxxxxiiisssxxx', 0, NULL, '12349', '2021-06-07 17:58:53', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_it_requestform`
--

CREATE TABLE `tbl_it_requestform` (
  `id` int(11) NOT NULL,
  `requestform_name` varchar(50) NOT NULL,
  `descrip` text NOT NULL,
  `status_req` smallint(2) NOT NULL DEFAULT '0',
  `is_deleted` smallint(6) NOT NULL DEFAULT '0',
  `remark` text NOT NULL,
  `iby` varchar(15) NOT NULL,
  `idt` date NOT NULL,
  `uby` varchar(30) NOT NULL,
  `udt` date NOT NULL,
  `dby` varchar(30) NOT NULL,
  `ddt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_it_requestform`
--

INSERT INTO `tbl_it_requestform` (`id`, `requestform_name`, `descrip`, `status_req`, `is_deleted`, `remark`, `iby`, `idt`, `uby`, `udt`, `dby`, `ddt`) VALUES
(19, 'userreport.pdf', 'Buat user baru ya', 0, 1, 'Jangan Lupa Buat User Baru ya', '20001', '2021-06-26', '', '0000-00-00', '', '0000-00-00'),
(20, 'Tatoli Media', 'Eproject foun Telkomcel', 0, 0, 'Notes From IT Vice IT Manager', '20001', '2021-06-19', '', '0000-00-00', '', '0000-00-00'),
(21, 'test', 'tedtbdes', 0, 1, 'op', '38849', '2021-06-12', '', '0000-00-00', '', '0000-00-00'),
(22, 'Testmario.pdf', 'Test User', 0, 0, 'Notes Test User', '20001', '2021-06-10', '', '0000-00-00', '', '0000-00-00'),
(23, 'koko', 'koko', 4, 0, 'koko', '20001', '2021-06-18', '20005', '2021-06-22', '', '0000-00-00'),
(24, 'ole media', 'ole 67', -1, 0, 'Deskulpa Priense fila fali', '20001', '2021-06-11', '20002', '2021-06-11', '', '0000-00-00'),
(25, 'design.pdf', 'design creative', 0, 0, 'creative design apps', '20001', '2021-06-12', '', '0000-00-00', '', '0000-00-00'),
(26, 'koko.pdf', 'Koko Description test ioioioj', 4, 0, 'Notes From IT Logistic', '20002', '2021-06-12', '20005', '2021-06-22', '', '0000-00-00'),
(27, 'Username.pdf', ' Use the :hover selector to change the style of the button when you move the mouse over it', 2, 0, 'Favor Rejista Account User foun', '20002', '2021-06-12', '20002', '2021-06-27', '', '0000-00-00'),
(28, 'Web Portal EDTL ', 'Buat Web Portal EDTL Timor-Leste', 0, 0, 'Dari Requetor', '20002', '2021-06-19', '', '0000-00-00', '', '0000-00-00'),
(29, 'Aplikasi My Timor', 'Telkomcel buat aplikasi ojek online yang namanya  My-Tmor', -2, 0, '', '20002', '2021-06-05', '20005', '2021-06-27', '', '0000-00-00'),
(30, 'testfromVP-NIT', 'test1', 3, 0, 'test1', '20005', '2021-06-11', '20004', '2021-07-02', '', '0000-00-00'),
(31, 'Aportil Website', 'Dezena aportil Website', -3, 0, 'Favor manda Fila Fali', '20004', '2021-06-23', '20005', '2021-06-27', '', '0000-00-00'),
(32, 'FDCH web', 'kria FDCH WEB uza laravel', 0, 0, 'dezena web fdch', '20002', '2021-06-24', '', '0000-00-00', '', '0000-00-00'),
(34, 'ICT Timor-Leste ', 'Ict web from minister of Information System', 0, 0, 'web ict ', '20004', '2021-06-25', '', '0000-00-00', '', '0000-00-00'),
(41, 'test tool', 'test tool', 0, 0, 'test tool', '20004', '2021-06-24', '', '0000-00-00', '', '0000-00-00'),
(42, 'project boby test', 'project boby', 4, 0, 'project boby', '20004', '2021-06-24', '20005', '2021-06-25', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_requeststatus`
--

CREATE TABLE `tbl_requeststatus` (
  `id` int(11) NOT NULL,
  `status` varchar(30) NOT NULL,
  `is_deleted` smallint(6) NOT NULL,
  `remark` text NOT NULL,
  `iby` varchar(30) NOT NULL,
  `idt` date NOT NULL,
  `uby` varchar(30) NOT NULL,
  `udt` date NOT NULL,
  `dby` varchar(30) NOT NULL,
  `ddt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request_log`
--

CREATE TABLE `tbl_request_log` (
  `id` int(11) NOT NULL,
  `NIK` varchar(6) NOT NULL,
  `description` varchar(30) NOT NULL,
  `is_deleted` smallint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_request_role`
--

CREATE TABLE `tbl_request_role` (
  `id` int(11) NOT NULL,
  `requestform_name` varchar(100) DEFAULT NULL,
  `role_access` text,
  `status_req` smallint(2) NOT NULL,
  `remark` text,
  `is_deleted` smallint(2) DEFAULT NULL,
  `iby` varchar(30) DEFAULT NULL,
  `idt` date DEFAULT NULL,
  `uby` varchar(30) DEFAULT NULL,
  `udt` date DEFAULT NULL,
  `dby` varchar(30) DEFAULT NULL,
  `ddt` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_it_requestform`
--
ALTER TABLE `tbl_it_requestform`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_requeststatus`
--
ALTER TABLE `tbl_requeststatus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_request_log`
--
ALTER TABLE `tbl_request_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_request_role`
--
ALTER TABLE `tbl_request_role`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_employee`
--
ALTER TABLE `tbl_employee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `tbl_it_requestform`
--
ALTER TABLE `tbl_it_requestform`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `tbl_requeststatus`
--
ALTER TABLE `tbl_requeststatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_request_log`
--
ALTER TABLE `tbl_request_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_request_role`
--
ALTER TABLE `tbl_request_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
