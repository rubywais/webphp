-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Waktu pembuatan: 01. Januari 2015 jam 18:25
-- Versi Server: 5.1.41
-- Versi PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `win`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `camera`
--

CREATE TABLE IF NOT EXISTS `camera` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `camera`
--

INSERT INTO `camera` (`id`, `gambar`) VALUES
(1, 'gambar-0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matkul`
--

CREATE TABLE IF NOT EXISTS `matkul` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `matkul` varchar(100) NOT NULL,
  `sks` int(11) NOT NULL,
  `id_dosen` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `matkul`
--

INSERT INTO `matkul` (`id`, `matkul`, `sks`, `id_dosen`) VALUES
(10, 'web programming', 3, 'akbar'),
(11, 'komdat', 3, 'imam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nilai` varchar(100) NOT NULL,
  `huruf` varchar(100) NOT NULL,
  `id_matkul` varchar(100) NOT NULL,
  `id_siswa` varchar(100) NOT NULL,
  `id_dosen` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=49 ;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`id`, `nilai`, `huruf`, `id_matkul`, `id_siswa`, `id_dosen`) VALUES
(44, '90', 'A', 'web programming', 'ines', 'akbar'),
(45, '80', 'A', 'komdat', 'ines', 'imam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sementara`
--

CREATE TABLE IF NOT EXISTS `sementara` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `isi` text NOT NULL,
  `sender` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `sementara`
--

INSERT INTO `sementara` (`id`, `isi`, `sender`) VALUES
(1, 'Test', '+6281316491181'),
(2, 'Test', '+6281316491181'),
(3, '90,A,komdat,ines,rifki', '+6285280136585'),
(4, '90,A,komdat,ines,rifki', '+6285280136585');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `alamat` longtext NOT NULL,
  `nip` int(50) NOT NULL,
  `nim` int(30) NOT NULL,
  `Jenis_kelamin` varchar(50) NOT NULL,
  `tanggal_lahir` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` enum('Y','N') NOT NULL DEFAULT 'Y',
  `level` enum('admin','dosen','mahasiswa') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `nama`, `alamat`, `nip`, `nim`, `Jenis_kelamin`, `tanggal_lahir`, `gambar`, `password`, `status`, `level`) VALUES
(1, 'wais', 'fghjkjh', 13565432, 2147483647, 'laki-laki', '1234432', 'gambar-0', 'wais', 'Y', 'admin'),
(39, 'akbar', 'jalan jakarta', 1234565432, 0, 'Laki-laki', '12/02/2014', '', '12345', 'Y', 'dosen'),
(40, 'imam', 'jakarta', 2147483647, 0, 'Laki-laki', '12/09/2014', '', '12345', 'Y', 'dosen'),
(41, 'ines', 'bintaro', 0, 1567898765, 'Perempuan', '12/23/2014', '', '12345', 'Y', 'mahasiswa');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
