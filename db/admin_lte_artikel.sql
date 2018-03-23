-- phpMyAdmin SQL Dump
-- version 4.3.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Apr 27, 2017 at 12:58 AM
-- Server version: 5.6.24
-- PHP Version: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `admin_lte_artikel`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE IF NOT EXISTS `artikel` (
  `id` int(10) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `isi` longtext NOT NULL,
  `foto` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `tanggal`, `isi`, `foto`) VALUES
(3, 'Judul Tanpa bunga', '2017-04-19 00:15:27', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vestibulum tristique sem in maximus. Maecenas viverra tortor tincidunt diam accumsan semper. Morbi ullamcorper sagittis tortor sed facilisis. Duis dolor enim, luctus congue facilisis id, pellentesque et dui. Vestibulum malesuada suscipit nibh. Praesent non pulvinar elit. Nullam ac purus vel metus tincidunt ornare. Phasellus pulvinar faucibus dui non commodo. Curabitur commodo augue vel scelerisque euismod. Aenean non pretium risus. Fusce pellentesque nulla non mauris iaculis lobortis. Duis mauris lectus, tincidunt vitae urna non, semper dictum enim. Mauris ut lorem libero. Aenean nec facilisis nisi. Pellentesque nibh enim, viverra at pretium sagittis, consequat ac arcu. Praesent luctus, nulla sed fermentum sodales, lorem leo porttitor odio, et feugiat nisl velit molestie massa. Donec commodo nisi et sem mattis dictum non id ex. Quisque vulputate sem quis turpis dignissim sollicitudin. Aliquam nec fringilla quam. Quisque non pulvinar lacus, et eleifend elit. Sed nunc justo, varius a sodales eget, ullamcorper porttitor ipsum. Morbi lorem orci, vehicula vitae sem in, iaculis ultricies ante. Aenean eget quam eu elit posuere ornare pretium pharetra sapien. Nunc imperdiet ut eros eu fermentum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut eu malesuada mauris. Sed convallis finibus magna, a scelerisque justo mattis eget. Vestibulum quis sollicitudin risus. In massa augue, euismod ullamcorper odio a, tincidunt varius nibh. Aenean semper consectetur consectetur. Integer orci nunc, tincidunt nec lacus sed, euismod egestas enim. Nam orci elit, hendrerit et tortor ac, faucibus tristique mauris. Proin at varius dui. Etiam porta mattis lectus, at auctor lacus eleifend in. Quisque elementum erat vitae dignissim suscipit. Mauris non odio tellus. Nam eu risus enim. Morbi lobortis metus tortor, ac faucibus tortor dignissim et. Integer purus ante, fringilla sed eleifend at, tincidunt nec velit. Cras sed felis venenatis, consequat mi vitae, tempor quam. ', NULL),
(4, 'Itulah Mengapa Saya Suka Kamu', '2017-04-24 18:12:56', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam vestibulum tristique sem in maximus. Maecenas viverra tortor tincidunt diam accumsan semper. Morbi ullamcorper sagittis tortor sed facilisis. Duis dolor enim, luctus congue facilisis id, pellentesque et dui. Vestibulum malesuada suscipit nibh. Praesent non pulvinar elit. Nullam ac purus vel metus tincidunt ornare. Phasellus pulvinar faucibus dui non commodo. Curabitur commodo augue vel scelerisque euismod. Aenean non pretium risus. Fusce pellentesque nulla non mauris iaculis lobortis. Duis mauris lectus, tincidunt vitae urna non, semper dictum enim. Mauris ut lorem libero. Aenean nec facilisis nisi. Pellentesque nibh enim, viverra at pretium sagittis, consequat ac arcu. Praesent luctus, nulla sed fermentum sodales, lorem leo porttitor odio, et feugiat nisl velit molestie massa. Donec commodo nisi et sem mattis dictum non id ex. Quisque vulputate sem quis turpis dignissim sollicitudin. Aliquam nec fringilla quam. Quisque non pulvinar lacus, et eleifend elit. Sed nunc justo, varius a sodales eget, ullamcorper porttitor ipsum. Morbi lorem orci, vehicula vitae sem in, iaculis ultricies ante. Aenean eget quam eu elit posuere ornare pretium pharetra sapien. Nunc imperdiet ut eros eu fermentum. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Ut eu malesuada mauris. Sed convallis finibus magna, a scelerisque justo mattis eget. Vestibulum quis sollicitudin risus. In massa augue, euismod ullamcorper odio a, tincidunt varius nibh. Aenean semper consectetur consectetur. Integer orci nunc, tincidunt nec lacus sed, euismod egestas enim. Nam orci elit, hendrerit et tortor ac, faucibus tristique mauris. Proin at varius dui. Etiam porta mattis lectus, at auctor lacus eleifend in. Quisque elementum erat vitae dignissim suscipit. Mauris non odio tellus. Nam eu risus enim. Morbi lobortis metus tortor, ac faucibus tortor dignissim et. Integer purus ante, fringilla sed eleifend at, tincidunt nec velit. Cras sed felis venenatis, consequat mi vitae, tempor quam. ', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `Id_User` int(11) NOT NULL,
  `Id_Usergroup_User` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `Password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id_User`, `Id_Usergroup_User`, `Username`, `Password`) VALUES
(1, 1, 'admin', '$2y$10$V7zDd2Fz3QBmWFz3UnZBM.vjDK.AOTTjIdssUY8rhcBjEEJrxY7ma');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id_User`), ADD KEY `FK_user_usergroup` (`Id_Usergroup_User`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id_User` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
