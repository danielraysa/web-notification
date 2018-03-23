-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 23, 2018 at 05:30 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.0.21


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: karyawan
--

-- --------------------------------------------------------

--
-- Table structure for table pengumuman
--

CREATE TABLE pengumuman (
  nomor int(5) NOT NULL,
  kepada varchar(300) DEFAULT NULL,
  perihal varchar(200) DEFAULT NULL,
  isi varchar(300) DEFAULT NULL,
  tgl_kirim datetime DEFAULT NULL,
  tgl_upload datetime NOT NULL
);

-- --------------------------------------------------------

--
-- Table structure for table pesan
--

CREATE TABLE pesan (
  id_setuju int(5) NOT NULL,
  userid int(5) DEFAULT NULL,
  perihal varchar(300) NOT NULL,
  tanggal date DEFAULT NULL,
  agreement varchar(10) DEFAULT NULL,
  nomor int(5) NOT NULL
);

--
-- Table structure for table user
--

CREATE TABLE user (
  iduser int(5) NOT NULL,
  username varchar(100) NOT NULL,
  password varchar(100) NOT NULL,
  email varchar(100) NOT NULL
);

--
-- Dumping data for table user
--

INSERT INTO user (iduser, username, password, email) VALUES
(1, 'admin', 'admin', 'admin@email.com'),
(2, 'user', 'user', 'user@gmail.com'),
(3, 'user1', 'user1', 'user1@email.com'),
(4, 'user2', 'user2', 'user2@email.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table pengumuman
--
ALTER TABLE pengumuman
  ADD PRIMARY KEY (nomor);

--
-- Indexes for table pesan
--
ALTER TABLE pesan
  ADD PRIMARY KEY (id_setuju),
  ADD KEY iduser (userid);

--
-- Indexes for table user
--
ALTER TABLE user
  ADD PRIMARY KEY (iduser);


--
-- AUTO_INCREMENT for table pengumuman
--
ALTER TABLE pengumuman
  MODIFY nomor int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table pesan
--
ALTER TABLE pesan
  MODIFY id_setuju int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table user
--
ALTER TABLE user
  MODIFY iduser int(5) NOT NULL AUTO_INCREMENT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
