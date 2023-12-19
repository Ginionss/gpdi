-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 19 Des 2023 pada 14.14
-- Versi Server: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_gereja`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota_keluarga`
--

CREATE TABLE `anggota_keluarga` (
  `id_ak` int(11) NOT NULL,
  `id_kk` int(11) NOT NULL,
  `id_jemaat` int(11) NOT NULL,
  `status_ak` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota_keluarga`
--

INSERT INTO `anggota_keluarga` (`id_ak`, `id_kk`, `id_jemaat`, `status_ak`) VALUES
(22, 11, 6, 'Suami'),
(23, 12, 13, 'Suami'),
(24, 13, 30, 'Suami'),
(25, 14, 274, 'Suami'),
(26, 15, 275, 'Suami'),
(27, 15, 52, 'Anak'),
(29, 15, 276, 'Istri'),
(30, 14, 2, 'Istri'),
(31, 14, 3, 'Anak'),
(32, 14, 4, 'Anak'),
(33, 14, 5, 'Anak'),
(34, 11, 7, 'Istri'),
(35, 11, 8, 'Anak'),
(36, 11, 9, 'Anak'),
(37, 11, 10, 'Anak'),
(38, 12, 14, 'Istri'),
(39, 11, 11, 'Anak'),
(40, 11, 12, 'Anak'),
(41, 13, 31, 'Istri'),
(52, 16, 284, 'Istri'),
(53, 13, 34, 'Anak'),
(63, 12, 278, 'Anak'),
(68, 18, 42, 'Suami'),
(69, 18, 43, 'Istri'),
(70, 18, 280, 'Anak'),
(71, 18, 281, 'Anak'),
(72, 19, 524, 'Istri'),
(73, 20, 526, 'Istri'),
(74, 20, 527, 'Anak');

-- --------------------------------------------------------

--
-- Struktur dari tabel `baptis`
--

CREATE TABLE `baptis` (
  `id_baptis` int(5) NOT NULL,
  `no_surat` varchar(35) DEFAULT NULL,
  `tanggal_request` date NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `tanggal_baptis` date DEFAULT NULL,
  `nama_pendeta` varchar(50) DEFAULT NULL,
  `file_kartu_keluarga` varchar(50) DEFAULT NULL,
  `file_akta_kelahiran` varchar(50) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `baptis`
--

INSERT INTO `baptis` (`id_baptis`, `no_surat`, `tanggal_request`, `nik`, `nama_ayah`, `nama_ibu`, `tanggal_baptis`, `nama_pendeta`, `file_kartu_keluarga`, `file_akta_kelahiran`, `status`, `keterangan`) VALUES
(2, '18', '2023-12-14', '3333333333333333', 'tofilus saudale', 'jefry tresia saudale dethan', '2023-12-17', 'Pdt. jacky karawisan', 'Baptis_3333333333333333.pdf', 'Baptis_3333333333333333.pdf', '2', 'mau baptis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `disposisi`
--

CREATE TABLE `disposisi` (
  `id_disposisi` int(5) NOT NULL,
  `id_surat_masuk` int(5) NOT NULL,
  `isi_disposisi` text NOT NULL,
  `dari` varchar(50) NOT NULL,
  `kepada` varchar(50) NOT NULL,
  `tanggal_disposisi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jemaat`
--

CREATE TABLE `jemaat` (
  `id_jemaat` int(11) NOT NULL,
  `tanggal_pendaftaran` date DEFAULT NULL,
  `nik` varchar(16) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `status_j` int(11) NOT NULL,
  `ket` varchar(10) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `baptis` int(11) NOT NULL,
  `penyerahan` int(11) NOT NULL,
  `pernikahan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jemaat`
--

INSERT INTO `jemaat` (`id_jemaat`, `tanggal_pendaftaran`, `nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `no_hp`, `jenis_kelamin`, `alamat`, `status_j`, `ket`, `username`, `password`, `baptis`, `penyerahan`, `pernikahan`) VALUES
(2, '2023-12-01', '2222222222222222', 'jefry tresia saudale dethan', 'Lasiana', '1967-01-07', '', 'Perempuan', '<p>Lasiana</p>', 2, '1', 'jefry_dethan', 'user', 1, 1, 1),
(3, '2023-12-01', '3333333333333333', 'jefta a. saudale', 'Lasiana', '1994-11-24', '', 'Laki-laki', '<p>Lasiana</p>', 2, '1', 'jefta_saudale', 'user', 1, 1, 0),
(4, '2023-12-01', '4444444444444444', 'Debora saudale', 'Lasiana', '1996-12-08', '', 'Perempuan', '<p>Lasiana</p>', 2, '1', 'debora_saudale', 'user', 0, 0, 0),
(5, NULL, '5555555555555555', 'apryana saudale', 'Lasiana', '2006-04-26', '', 'Perempuan', '<p>Lasiana</p>', 2, '1', 'apryana_saudale', 'user', 0, 0, 0),
(6, NULL, '6666666666666666', 'Albert Fangidae', 'Lasiana', '1959-04-21', '', 'Laki-laki', '<p>Lasiana</p>', 2, '1', 'albert_fangidae', 'user', 1, 1, 1),
(7, NULL, '7777777777777777', 'ferderika  fangidae ndun', 'Lasiana', '1966-01-19', '', 'Perempuan', '<p>Lasiana</p>', 2, '1', 'ferderika_ndun', 'user', 1, 1, 1),
(8, NULL, '8888888888888888', 'Astrid Fangidae', 'Lasiana', '1995-04-15', '85239908148', 'Perempuan', '<p>Lasiana</p>', 2, '1', 'astrid_fangidae', 'user', 1, 1, 0),
(9, NULL, '9999999999999999', 'Raymond Fangidae', 'Lasiana', '1998-06-11', '', 'Laki-laki', '<p>Lasiana</p>', 2, '1', 'raymond_fangidae', 'user', 0, 1, 0),
(10, NULL, '0000000000000000', 'Ferdy Fangidae', 'Lasiana', '2000-02-10', '', 'Laki-laki', '<p>Lasiana</p>', 2, '1', 'ferdy_fangidae', 'user', 1, 1, 0),
(11, NULL, '1212121212121212', 'Ester  Fangidae', 'Lasiana', '2001-12-02', '', 'Perempuan', '<p>Lasiana</p>', 2, '1', 'ester _fangidae', 'user', 1, 1, 3),
(12, NULL, '1414141414141414', 'Debby Fangidae', 'Lasiana', '2002-10-05', '', 'Perempuan', '<p>Lasiana</p>', 2, '1', 'debby_fangidae', 'user', 1, 1, 0),
(13, NULL, '1313131313131313', 'Adolof  Song go', 'Oesapa', '1958-08-15', '', 'Laki-laki', '<p>Oesapa</p>', 2, '1', 'adolof_go', 'user', 1, 1, 1),
(14, NULL, '1515151515151515', 'imelda go fangGidae', 'Oesapa', '1963-11-12', '', 'Perempuan', '<p>Oesapa</p>', 2, '1', 'imelda_fanggidae', 'user', 1, 1, 1),
(30, NULL, '9191919191919191', 'Yunus malelak', 'Oesapa', '1971-10-09', '81353841075', 'Laki-laki', '<p>Oesapa</p>', 2, '1', 'yunus_malelak', 'user', 1, 1, 1),
(31, NULL, '1010101010101010', 'agustina malelak', 'Oesapa', '1969-08-18', '82237852813', 'Perempuan', '<p>Oesapa</p>', 2, '1', 'agustina_malelak', 'user', 1, 1, 1),
(34, NULL, '7171717171717171', 'Verensi yana malelak', 'Oesapa', '1999-07-13', '081234567890', 'Perempuan', '<p>Oesapa</p>', 2, '1', 'verensi_malelak', 'user', 0, 0, 0),
(42, NULL, '6161616161616161', 'Ruben willa', 'Oesapa', '1958-09-17', '082345678912', 'Laki-laki', '<p>Oesapa</p>', 2, '1', 'ruben_willa', 'user', 1, 1, 1),
(43, NULL, '8181818181818181', 'MARIA willa Ludji', 'Oesapa', '1973-05-16', '85738196419', 'Perempuan', '<p>Oesapa</p>', 2, '1', 'maria_ludji', 'user', 1, 1, 1),
(45, NULL, '124567891234567', 'KEFLIN REGINA WILLA', 'Oesapa', '2001-06-01', '85238097729', 'Perempuan', '<p>Oesapa</p>', 2, '1', 'keflin_willa', 'user', 1, 1, 0),
(52, NULL, '1233211233211231', 'Gracia trivena karawisan', 'Oesapa', '1999-08-20', '81238728268', 'Perempuan', '<p>Oesapa</p>', 1, '1', 'gracia_karawisan', 'user', 1, 1, 0),
(158, NULL, '2121212121212121', 'Arnold Kase', 'Kupang', '0000-00-00', '82144135311', 'Laki-laki', '<p>Kupang</p>', 2, '0', 'arnold_kase', 'user', 1, 1, 3),
(159, NULL, '6161616161616161', 'Sammy Tangpali', 'Kupang', '0000-00-00', '85333534953', 'Laki-laki', '<p>Kupang</p>', 1, '0', 'sammy_tangpali', 'user', 1, 1, 0),
(163, NULL, '5151515151515151', 'Martir Metta', 'Kupang', '0000-00-00', '81238998700', 'Laki-laki', '<p>Kupang</p>', 2, '0', 'martir_metta', 'user', 1, 1, 0),
(166, NULL, '3131313131313131', 'Dolfy Pah', 'Kupang', '0000-00-00', '82146949785', 'Laki-laki', '<p>Kupang</p>', 2, '0', 'dolfy_pah', 'user', 1, 1, 0),
(168, NULL, '4141414141414141', 'Sukma Sanu', 'Kupang', '0000-00-00', '82218516184', 'Perempuan', '<p>Kupang</p>', 2, '0', 'sukma_sanu', 'user', 1, 1, 0),
(182, NULL, '0000000000000000', 'Arman Wicaksono', 'Kupang', '1999-05-02', '081333360928', 'Laki-laki', 'Kupang', 2, '0', 'arman_wicaksono', 'arman', 0, 1, 0),
(273, NULL, '1234561234561234', 'Richard Waang', 'Alor', '2023-11-15', '', 'Laki-laki', '<p>oebobo</p>', 2, '0', 'ricad_waang', 'user', 1, 1, 0),
(274, NULL, '1111111111111111', 'tofilus saudale', 'lasiana', '1960-12-15', '082144927339', 'Laki-laki', '<p>lasiana</p>', 2, '1', 'tofilus_saudale', 'user', 1, 1, 1),
(275, NULL, '0101010101010101', 'jacky D. karawisan', 'oesapa', '1966-12-09', '082146948409', 'Laki-laki', '<p>oesapa</p>', 1, '1', 'jacky_karawisan', 'user', 1, 1, 1),
(276, NULL, '1234567891011122', 'liliana karawisan', 'oesapa', '1970-09-02', '085238822414', 'Perempuan', '<p>oesapa</p>', 1, '1', 'liliana_karawisan', 'user', 1, 1, 1),
(277, NULL, '1234567891011121', 'zamesdanobed regen willa', 'oesapa', '1999-11-10', '081529072137', 'Laki-laki', '<p>oesapa</p>', 2, '1', 'zamesdanobed_willa', 'user', 1, 1, 0),
(278, NULL, '9191919191919191', 'ina maya shinta go', 'oesapa', '1983-01-26', '', 'Perempuan', '<p>oesapa</p>', 1, '1', 'ina_go', 'user', 1, 1, 0),
(279, NULL, '8989898989898989', 'Ronald Boy Willa', 'Oesapa', '2003-03-03', '', 'Laki-laki', '<p>Oesapa</p>', 2, '1', 'ronald_willa', 'user', 0, 1, 0),
(280, NULL, '8787878787878787', 'Yermi raymond willa', 'oesapa', '2004-12-05', '', 'Laki-laki', '<p>oesapa</p>', 2, '1', 'yermi_willa', 'user', 0, 0, 0),
(281, NULL, '7676767676767676', 'Gilbert ryandi willa', 'oesapa', '2008-06-15', '', 'Laki-laki', '<p>oesapa</p>', 2, '1', 'gilbert_willa', 'user', 0, 0, 0),
(282, NULL, '6565656565656565', 'yosua lano', 'oesapa', '1966-08-18', '', 'Laki-laki', 'Oesapa', 2, '1', 'yosua_lano', 'user', 1, 1, 1),
(284, NULL, '4343434343434343', 'john pandie', 'oesapa', '1961-11-12', '', 'Laki-laki', '<p>oesapa</p>', 2, '1', 'john_pandie', 'user', 1, 1, 1),
(285, NULL, '5311022409000001', 'ARYO RONALDO HAMBA PULU', 'Praibakul', '2000-09-24', '081333360928', 'Laki-laki', 'Praibakul', 2, '0', 'aryo_pulu', 'user', 0, 1, 0),
(286, NULL, '4343434343434334', 'clarissa', '', '1993-02-12', '', 'Perempuan', 'kupang', 2, '', '', '', 0, 0, 0),
(288, NULL, '', 'agustinus jeharu', 'Oesapa', '1970-08-08', '', 'Laki-laki', '<p>Oesapa</p>', 2, '1', 'agustinus_jeharu', 'user', 1, 1, 1),
(291, NULL, '', 'yane jeharu ', 'Oesapa', '1975-01-04', '', 'Perempuan', 'Oesapa', 1, '1', 'yane_jeharu', 'user', 1, 1, 1),
(292, NULL, '', 'andrew jeharu', 'Oesapa', '1996-04-12', '', 'Laki-laki', 'Oesapa', 1, '1', 'andrew_jeharu', 'user', 0, 0, 0),
(293, NULL, '', 'novita jeharu', 'Oesapa', '2003-11-21', '', 'Perempuan', 'Oesapa', 1, '1', 'novita_jeharu', 'user', 0, 0, 0),
(294, NULL, '', 'dewi jeharu', 'Oesapa', '2007-12-09', '', 'Perempuan', 'Oesapa', 1, '1', 'dewi_jeharu', 'user', 0, 0, 0),
(295, NULL, '', 'ardian jeharu', 'Oesapa', '2011-04-15', '', 'Laki-laki', 'Oesapa', 1, '1', 'ardian_jeharu', 'user', 0, 0, 0),
(296, NULL, '', 'Indah R.S. jeharu', 'Oesapa', '2018-09-11', '', 'Perempuan', 'Oesapa', 1, '1', 'indah_jeharu', 'user', 0, 0, 0),
(297, NULL, '', 'selfince tungga ndolu', 'Oesapa', '1965-09-05', '', 'Laki-laki', 'Oesapa', 1, '1', 'selfince_ndolu', 'user', 1, 1, 2),
(298, NULL, '', 'Yulius ndolu', 'Oesapa', '1986-07-16', '', 'Laki-laki', 'Oesapa', 1, '1', 'yulius_ndolu', 'user', 0, 0, 0),
(299, NULL, '', 'Monalisa ndolu', 'oesapa', '1992-06-16', '', 'Perempuan', 'Oesapa', 1, '1', 'monalisa_ndolu', 'user', 0, 0, 0),
(300, NULL, '', 'patrik malelak', 'Oesapa', '1993-05-20', '', 'Laki-laki', 'Oesapa', 1, '1', 'patrik_malelak', 'user', 0, 0, 0),
(301, NULL, '', 'Putri malelak', 'oesapa', '1995-03-09', '', 'Perempuan', 'Oesapa', 1, '1', 'putri_malelak', 'user', 0, 0, 0),
(302, NULL, '', 'Gavrial matthew susang', 'Oesapa', '2015-11-17', '', 'Laki-laki', 'Oesapa', 1, '1', 'gavrial_susang', 'user', 0, 0, 0),
(304, NULL, '', 'Yohana lano', 'Oesapa', '1967-05-04', '', 'Perempuan', 'Oesapa', 1, '1', 'yohana_lano', 'user', 1, 1, 1),
(305, NULL, '', 'Anjelina romitha lano', 'oesapa', '1995-04-08', '', 'Perempuan', 'Oesapa', 1, '1', 'anjelina_lano', 'user', 0, 0, 0),
(306, NULL, '', 'Ingrid milan lano', 'Oesapa', '1997-10-30', '', 'Perempuan', 'Oesapa', 1, '1', 'ingrid_lano', 'user', 0, 0, 0),
(307, NULL, '', 'Viktor adams lano', 'oesapa', '2003-02-16', '', 'Laki-laki', 'Oesapa', 1, '1', 'Viktor lano', 'user', 0, 0, 0),
(308, NULL, '', 'Krista aplonia damaleru', 'Oesapa', '2020-04-08', '', 'Perempuan', 'Oesapa', 1, '1', 'krista_damaleru', 'user', 0, 0, 0),
(309, NULL, '', 'Kevin karawisan', 'Oesapa', '1996-04-05', '', 'Laki-laki', 'Oesapa', 1, '1', 'kevin_karawisan', 'user', 0, 0, 0),
(310, NULL, '', 'Gisella karawisan', 'Oesapa', '2008-06-16', '', 'Perempuan', 'Oesapa', 1, '1', 'gisella_karawisan', 'user', 0, 0, 0),
(311, NULL, '', 'Alm. Yoseph tananggau', 'Oesapa', '1966-12-30', '', 'Laki-laki', 'Oesapa', 1, '1', '', '', 1, 1, 1),
(312, NULL, '', 'martha tananggau', 'oesapa', '1968-06-17', '', 'Perempuan', 'Oesapa', 1, '1', 'martha_tananggau', 'user', 0, 0, 0),
(313, NULL, '', 'Yelsi tananggau', 'oesapa', '1997-04-12', '', 'Perempuan', 'Oesapa', 1, '1', 'yelsy_tananggau', 'user', 0, 0, 0),
(314, NULL, '', 'Yandri edgaar tananggau ', 'Oesapa', '1994-06-10', '', 'Laki-laki', 'Oesapa', 1, '1', 'yandri_tananggau', 'user', 0, 0, 0),
(315, NULL, '', 'Aglen tanaanggau ', 'Oesapa', '2003-04-05', '', 'Perempuan', 'Oesapa', 1, '1', 'aglen_tananggau', 'user', 0, 0, 0),
(316, NULL, '', 'Reva seme', 'Oesapa', '2008-10-29', '', 'Perempuan', 'Oesapa', 1, '1', 'reva_seme', 'user', 0, 0, 0),
(317, NULL, '', 'Hengky enus', 'Oesapa', '1979-10-12', '', 'Laki-laki', 'Oesapa', 1, '1', 'hengky_enus', 'user', 1, 1, 1),
(318, NULL, '', 'Isebella enus talomanafe', 'Oesapa', '1978-06-06', '', 'Perempuan', 'Oesapa', 1, '1', 'isebella_talomanafe', 'user', 1, 1, 1),
(319, NULL, '', 'devani belandia enus', 'Oesapa', '2005-07-25', '', 'Perempuan', 'Oesapa', 1, '1', 'devani_enus', 'user', 0, 0, 0),
(320, NULL, '', 'devircha anggriani enus', 'Oesapa', '2009-03-16', '', 'Perempuan', 'Oesapa', 1, '1', 'devircha_enus', 'user', 0, 0, 0),
(321, NULL, '', 'Eachan valerino enus', 'Oesapa', '2009-05-05', '', 'Laki-laki', 'Oesapa', 1, '1', 'eachan_enus', 'user', 0, 0, 0),
(322, NULL, '', 'frengky tamonob', 'Alor', '1991-02-24', '', 'Laki-laki', 'Oesapa', 1, '0', 'frengky_tamonob', 'user', 0, 0, 0),
(323, NULL, '', 'Nongky boimau', 'oesapa', '1995-11-25', '', 'Laki-laki', 'Oesapa', 1, '0', 'nongky_boimau', 'user', 0, 0, 0),
(324, NULL, '', 'Januarto tefa', 'Oesapa', '1997-01-23', '', 'Laki-laki', 'Oesapa', 1, '0', 'januarto_tefa', 'user', 0, 0, 0),
(327, NULL, '4564564564564564', 'Henoch R faot', 'kupang', '2002-10-29', '081236071773', 'Laki-laki', 'Kupang', 2, '0', 'henoch_faot', 'user', 2, 0, 3),
(328, NULL, '', 'Agripka punuff', 'Kupang', '2003-08-10', '', 'Perempuan', 'Kupang', 1, '0', 'agripka_punuf', 'user', 0, 0, 0),
(329, NULL, '', 'riska S.lau', 'Kupang', '2003-06-13', '', 'Perempuan', 'Kupang', 1, '0', 'riska_lau', 'user', 0, 0, 0),
(330, NULL, '', 'Ariin zacharias', 'Kupang', '2002-03-23', '', 'Laki-laki', 'Kupang', 1, '0', 'ariin_zacharias', 'user', 0, 0, 0),
(331, NULL, '', 'Elrido kanni', 'Kupang', '2002-12-06', '', 'Laki-laki', 'Kupang', 1, '0', 'elrido_kanni', 'user', 0, 0, 0),
(332, NULL, '', 'Pedro nalle', 'Kupang', '2004-07-20', '', 'Laki-laki', 'Kupang', 1, '0', 'pedro_nalle', 'user', 0, 0, 0),
(333, NULL, '', 'Yordy benu', 'Kupang', '2002-05-29', '', 'Laki-laki', 'Kupang', 1, '0', 'yordy_benu', 'user', 0, 0, 0),
(334, NULL, '', 'Brenton kadek', 'Kupang', '2002-10-03', '', 'Laki-laki', 'Kupang', 1, '0', 'brenton_kadek', 'user', 0, 0, 0),
(335, NULL, '', 'Susanti A. otemusu', 'Kupang', '2000-09-16', '', 'Perempuan', 'Kupang', 1, '0', 'susanti_otemusu', 'user', 0, 0, 0),
(336, NULL, '', 'Delvi nau', 'Kupang', '2002-11-17', '', 'Perempuan', 'Kupang', 1, '0', 'delvi_nau', 'user', 0, 0, 0),
(337, NULL, '', 'Irene pong', 'Kupang', '2000-04-29', '', 'Perempuan', 'Kupang', 1, '0', 'irene_pong', 'user', 0, 0, 0),
(338, NULL, '', 'Stiven boimau', 'Kupang', '2005-05-26', '', 'Laki-laki', 'Kupang', 1, '0', 'stiven_boimau', 'user', 0, 0, 0),
(339, NULL, '', 'Keyzia saudale', 'Kupang', '2003-01-21', '', 'Perempuan', 'Kupang', 1, '0', 'keyzia_saudale', 'user', 0, 0, 0),
(340, NULL, '', 'Elin susilo', 'Kupang', '2001-10-24', '', 'Perempuan', 'Kupang', 1, '0', 'elin_susilo', 'user', 0, 0, 0),
(341, NULL, '', 'Elton mako', 'Kupang', '2003-07-13', '', 'Laki-laki', 'Kupang', 1, '0', 'elton_mako', 'user', 0, 0, 0),
(342, NULL, '', 'Naomi pah', 'Kupang', '1998-08-20', '', 'Perempuan', 'Kupang', 1, '0', 'naomi_pah', 'user', 0, 0, 0),
(343, NULL, '', 'Citra haning', 'Kupang', '2004-07-07', '', 'Perempuan', 'Kupang', 1, '0', 'citra_haning', 'user', 0, 0, 0),
(344, NULL, '', 'Yulen modok', 'Kupang', '2001-07-21', '', 'Perempuan', 'Kupang', 1, '0', 'yulen_modok', 'user', 0, 0, 0),
(345, NULL, '', 'Bety', 'Kupang', '1995-10-24', '', 'Perempuan', 'Kupang', 1, '0', 'bety', 'user', 0, 0, 0),
(346, NULL, '', 'Rany dethan', 'Kupang', '2002-12-12', '', 'Perempuan', 'Kupang', 1, '0', 'rany_dethan', 'user', 0, 0, 0),
(347, NULL, '', 'Noly liunome', 'Kupang', '2000-06-13', '', 'Laki-laki', 'Kupang', 1, '0', 'noly_liunome', 'user', 0, 0, 0),
(348, NULL, '', 'Ima laos', 'Kupang', '1998-09-06', '', 'Perempuan', 'Kupang', 1, '0', 'ima_laos', 'user', 0, 0, 0),
(349, NULL, '', 'Jeni rohani dethan', 'Kupang', '2001-06-19', '', 'Perempuan', 'Kupang', 1, '0', 'jwni_dethan', 'user', 0, 0, 0),
(350, NULL, '', 'Dendy lalang', 'Kupang', '2002-12-21', '', 'Laki-laki', 'Kupang', 1, '0', 'dendy_lalang', 'user', 0, 0, 0),
(351, NULL, '', 'franklyn malelak', 'Kupang', '2003-10-04', '', 'Laki-laki', 'Kupang', 1, '0', 'franklyn_malelak', 'user', 0, 0, 0),
(352, NULL, '', 'Penina besi', 'Kupang', '2001-03-25', '', 'Laki-laki', 'Kupang', 1, '0', 'penina_besi', 'user', 0, 0, 0),
(353, NULL, '', 'Johan ibrani togatorop', 'Kupang', '1995-11-12', '', 'Laki-laki', 'Kupang', 1, '0', 'johan_togatorop', 'user', 0, 0, 0),
(354, NULL, '', 'Lukas lobang', 'Kupang', '2001-01-30', '', 'Laki-laki', 'Kupang', 1, '0', 'lukas_lobang', 'user', 0, 0, 0),
(355, NULL, '', 'Sarah dedenu', 'Kupang', '2000-01-05', '', '', 'Kupang', 1, '0', 'sarah_dedenu', 'user', 0, 0, 0),
(356, NULL, '', 'Andro masae', 'Kupang', '2002-10-18', '', 'Laki-laki', 'Kupang', 1, '0', 'andro_masae', 'user', 0, 0, 0),
(357, NULL, '', 'Chorgy henukh', 'Kupang', '1999-04-15', '', 'Laki-laki', 'Kupang', 1, '0', 'chorgy_henukh', 'user', 0, 0, 0),
(358, NULL, '', 'Willy mbeo', 'Kupang', '2004-06-11', '', 'Laki-laki', 'Kupang', 1, '0', 'willy_mbeo', 'user', 0, 0, 0),
(359, NULL, '', 'Christine balo', 'Kupang', '1991-12-08', '', 'Perempuan', 'Kupang', 1, '0', 'christine_balo', 'user', 0, 0, 0),
(360, NULL, '', 'Musa karjeni', 'Kupang', '1999-03-18', '', 'Laki-laki', 'Kupang', 1, '0', 'musa_karjeni', 'user', 0, 0, 0),
(361, NULL, '', 'Echa beis', 'Kupang', '2003-08-04', '', 'Perempuan', 'Kupang', 1, '0', 'echa_beis', 'user', 0, 0, 0),
(362, NULL, '', 'Dune beis', 'Kupang', '2006-10-26', '', 'Laki-laki', 'Kupang', 1, '0', 'dune_beis', 'user', 0, 0, 0),
(363, NULL, '', 'Serly fangidae', 'Kupang', '1993-09-10', '', 'Perempuan', 'Kupang', 1, '0', 'serly_fangidae', 'user', 0, 0, 0),
(365, NULL, '', 'Yetri taniu', 'Kupang', '2001-09-09', '', 'Perempuan', 'Kupang', 1, '0', 'yetri_taniu', 'user', 0, 0, 0),
(366, NULL, '', 'Desnalia seran', 'Kupang', '2002-12-07', '', 'Perempuan', 'Kupang', 1, '0', 'desnalia_seran', 'user', 0, 0, 0),
(367, NULL, '', 'Jesica dasilva', 'Kupang', '2002-12-09', '', 'Perempuan', 'Kupang', 1, '0', 'jesica_dasilva', 'user', 0, 0, 0),
(368, NULL, '', 'Lani laitabun', 'Kupang', '2003-07-07', '', 'Perempuan', 'Kupang', 1, '0', 'lani_laitabun', 'user', 0, 0, 0),
(369, NULL, '', 'Sandri upu', 'Kupang', '2002-05-26', '', 'Laki-laki', 'Kupang', 1, '0', 'sandri_upu', 'user', 0, 0, 0),
(370, NULL, '', 'Ruth mone ludji', 'Kupang', '2004-04-01', '', 'Laki-laki', 'Kupang', 1, '0', 'ruth_ludji', 'user', 0, 0, 0),
(371, NULL, '', 'Sepri punuf', 'Kupang', '1998-09-06', '', 'Perempuan', 'Kupang', 1, '0', 'sepri_punuf', 'user', 0, 0, 0),
(372, NULL, '', 'Aryanto benu', 'Kupang', '2003-03-21', '', 'Laki-laki', 'Kupang', 1, '0', 'aryanto_benu', 'user', 0, 0, 0),
(373, NULL, '', 'Marlin ndaong', 'Kupang', '1999-03-23', '', 'Perempuan', 'Kupang', 1, '0', 'marlin_ndaong', 'user', 0, 0, 0),
(374, NULL, '', 'Arista K', 'Kupang', '2003-04-27', '', 'Perempuan', 'Kupang', 1, '0', 'arista_k', 'user', 0, 0, 0),
(375, NULL, '', 'Gregorius balaputra', 'Kupang', '2004-03-09', '', 'Laki-laki', 'Kupang', 1, '0', 'gregorius_balaputra', 'user', 0, 0, 0),
(376, NULL, '', 'desry theon', 'Kupang', '2000-12-12', '', 'Perempuan', 'Kupang', 1, '0', 'desry_theon', 'user', 0, 0, 0),
(377, NULL, '', 'Lili nomleni', 'Kupang', '2003-05-17', '', 'Perempuan', 'Kupang', 1, '0', 'lili_nomleni', 'user', 0, 0, 0),
(378, NULL, '', 'Selfi ndun', 'Kupang', '2001-09-17', '', 'Perempuan', 'Kupang', 1, '0', 'selfi_ndun', 'user', 0, 0, 0),
(379, NULL, '', 'Mario tefa', 'Kupang', '2001-04-14', '', 'Laki-laki', 'Kupang', 1, '0', 'mario_tefa', 'user', 0, 0, 0),
(380, NULL, '', 'Seprianto nenoan', 'Kupang', '1999-09-08', '', 'Laki-laki', 'Kupang', 1, '0', 'seprianto_nenoan', 'user', 0, 0, 0),
(381, NULL, '', 'Venty nara', 'Kupang', '2000-02-02', '', 'Perempuan', 'Kupang', 1, '0', 'venty_nara', 'user', 0, 0, 0),
(382, NULL, '', 'Serly teftae', 'Kupang', '1996-03-21', '', 'Perempuan', 'Kupang', 1, '0', 'sefti_teftae', 'user', 0, 0, 0),
(383, NULL, '', 'Marlince lendi', 'Kupang', '2001-05-07', '', 'Perempuan', 'Kupang', 1, '0', 'marlince_lendi', 'user', 0, 0, 0),
(384, NULL, '', 'Tefi manubulu', 'Kupang', '1998-04-05', '', 'Perempuan', 'Kupang', 1, '0', 'tefti_manubulu', 'user', 0, 0, 0),
(385, NULL, '', 'Desri tohik', 'Kupang', '1999-12-19', '', 'Perempuan', 'Kupang', 1, '0', 'desri_tohik', 'user', 0, 0, 0),
(386, NULL, '', 'Apris nalle', 'Kupang', '2001-04-20', '', 'Laki-laki', 'Kupang', 1, '0', 'apris_nalle', 'user', 0, 0, 0),
(387, NULL, '', 'Agan hans', 'Kupang', '1998-08-25', '', 'Laki-laki', 'Kupang', 1, '0', 'agan_hans', 'user', 0, 1, 0),
(388, NULL, '', 'Irene tjangkung', 'Kupang', '2001-06-28', '', 'Laki-laki', 'Kupang', 1, '0', 'irene_tjangkung', 'user', 0, 0, 0),
(389, NULL, '', 'Monick tjangkung', 'Kupang', '2003-08-28', '', 'Perempuan', 'Kupang', 1, '0', 'monick_tjangkung', 'user', 0, 0, 0),
(390, NULL, '', 'Anggelia tjangkung', 'Kupang', '1999-09-04', '', 'Perempuan', 'Kupang', 1, '0', 'anggelia_tjangkung', 'user', 0, 0, 0),
(391, NULL, '', 'Yusuf modokh', 'Kupang', '2002-02-18', '', 'Laki-laki', 'Kupang', 1, '0', 'yusuf_modokh', 'user', 0, 0, 0),
(392, NULL, '', 'Renzon lopo', 'Kupang', '2003-11-28', '', 'Laki-laki', 'Kupang', 1, '0', 'renzon_lopo', 'user', 0, 0, 0),
(393, NULL, '', 'Reny lubu', 'Kupang', '1999-03-10', '', 'Perempuan', 'Kupang', 1, '0', 'reny_lubu', 'user', 0, 0, 0),
(394, NULL, '', 'Putri permata lay', 'Kupang', '2001-05-02', '', 'Perempuan', 'Kupang', 1, '0', 'putri_lay', 'user', 0, 0, 0),
(395, NULL, '', 'Yeni lasfeto', 'Kupang', '2000-03-31', '', 'Perempuan', 'Kupang', 1, '0', 'yeni_lasfeto', 'user', 0, 0, 0),
(396, NULL, '', 'Wulantri seran', 'Kupang', '2004-01-11', '', 'Perempuan', 'Kupang', 1, '0', 'wulantri_seran', 'user', 0, 0, 0),
(397, NULL, '', 'Elsi banoet', 'Kupang', '2003-03-05', '', 'Perempuan', 'Kupang', 1, '0', 'elsi_banoet', 'user', 0, 0, 0),
(398, NULL, '', 'Novita kefi', 'Kupang', '1999-07-13', '', 'Perempuan', 'Kupang', 1, '0', 'novita_kefi', 'user', 0, 0, 0),
(399, NULL, '', 'Frince berpelai', 'Kupang', '2000-02-21', '', 'Perempuan', 'Kupang', 1, '0', 'frince_berpelai', 'user', 0, 0, 0),
(400, NULL, '', 'Valen tulle', 'Kupang', '2002-04-19', '', 'Laki-laki', 'Kupang', 1, '0', 'valen _tulle', 'user', 0, 0, 0),
(401, NULL, '', 'Median tualaka', 'Kupang', '1998-11-12', '', 'Laki-laki', 'Kupang', 1, '0', 'median_tualaka', 'user', 0, 0, 0),
(402, NULL, '', 'Miving silvana kase', 'Kupang', '2000-10-12', '', 'Perempuan', 'Kupang', 1, '0', 'miving_kase', 'user', 0, 0, 0),
(403, NULL, '', 'Nona lay', 'Kupang', '2005-08-23', '', 'Perempuan', 'Kupang', 1, '0', 'nona_lay', 'user', 0, 0, 0),
(404, NULL, '', 'Jiswan lusi', 'oesapa', '1966-07-10', '', 'Laki-laki', 'Oesapa', 1, '1', 'jiswan_lusi', 'user', 1, 1, 2),
(405, NULL, '', 'Alm. ramona lusi', 'Oesapa', '1969-06-17', '', 'Perempuan', 'Oesapa', 1, '1', '', '', 1, 1, 1),
(406, NULL, '', 'Ririn herdiyanti lusi', 'Oesapa', '2000-01-30', '', 'Perempuan', 'Oesapa', 1, '1', 'ririn_lusi', 'user', 0, 0, 0),
(407, NULL, '', 'Selvi yunita lusi', 'Oesapa', '2001-06-21', '', 'Perempuan', 'Oesapa', 1, '1', 'selvi_lusi', 'user', 0, 0, 0),
(408, NULL, '', 'Jidro boymau', 'Oesapa', '1974-08-04', '', 'Laki-laki', 'Oesapa', 1, '1', 'jidro_boymau', 'user', 1, 1, 1),
(409, NULL, '', 'Maria billi boymmau emburae', 'Oesapa', '1979-06-09', '', 'Perempuan', 'Oesapa', 1, '1', 'maria_emburae', 'user', 1, 1, 1),
(410, NULL, '', 'Indra boymau', 'Oesapa', '2002-01-05', '', 'Laki-laki', 'Oesapa', 1, '1', 'indra_boymau', 'user', 0, 0, 0),
(411, NULL, '', 'Krisna boymau', 'Oesapa', '2007-06-14', '', 'Laki-laki', 'Oesapa', 1, '1', 'krisna_boymau', 'user', 0, 0, 0),
(412, NULL, '', 'Aldo boymau', 'Oesapa', '2010-02-21', '', 'Laki-laki', 'Oesapa', 1, '1', 'aldo_boymau', 'user', 0, 0, 0),
(413, NULL, '', 'Randi boymau', 'Oesapa', '2012-05-08', '', 'Laki-laki', 'Oesapa', 1, '1', 'randi_boymau', 'user', 0, 0, 0),
(415, NULL, '', 'Irfan boymau', 'Oesapa', '2015-03-16', '', 'Laki-laki', 'Oesapa', 1, '1', 'irfan_boymau', 'user', 0, 0, 0),
(416, NULL, '', 'Alm. okto mbeo', 'Oesapa', '1954-06-12', '', 'Laki-laki', 'Oesapa', 1, '1', '', '', 1, 1, 1),
(417, NULL, '', 'Aranci Mbeo lusi', 'Oesapa', '1972-10-02', '', 'Perempuan', 'Oesapa', 1, '1', 'aranci_lusi', 'user', 1, 1, 2),
(418, NULL, '', 'Septiance mbeo', 'Oesapa', '1997-10-27', '', 'Perempuan', 'Oesapa', 1, '1', 'septiance_mbeo', 'user', 0, 0, 0),
(419, NULL, '', 'Egi mbeo', 'Oesapa', '1999-05-16', '', 'Laki-laki', 'Oesapa', 1, '1', 'egi_mbeo', 'user', 0, 0, 0),
(420, NULL, '', 'Paskalita mbeo', 'Oesapa', '2001-04-14', '', 'Perempuan', 'Oesapa', 1, '1', 'paskalita_mbeo', 'user', 0, 0, 0),
(421, NULL, '', 'Prido mbeo', 'Oesapa', '2003-02-18', '', 'Laki-laki', 'Oesapa', 1, '1', 'prido_mbeo', 'user', 0, 0, 0),
(422, NULL, '', 'Metusalak giri', 'Oesapa', '1968-12-26', '', 'Laki-laki', 'Oesapa', 1, '1', 'metusalak_giri', 'user', 1, 1, 1),
(423, NULL, '', 'Rahel giri tefa', 'Oesapa', '1963-04-15', '', 'Perempuan', 'Oesapa', 1, '1', 'rahel_tefa', 'user', 1, 1, 1),
(424, NULL, '', 'Petrus giri', 'Oesapa', '1993-08-13', '', 'Laki-laki', 'Oesapa', 1, '1', 'petrus_giri', 'user', 0, 0, 0),
(425, NULL, '', 'Antonetha giri', 'Oesapa', '1995-08-15', '', 'Laki-laki', 'Oesapa', 1, '1', 'antonetha_giri', 'user', 0, 0, 0),
(426, NULL, '', 'Fince giri', 'Oesapa', '1997-10-26', '', 'Perempuan', 'Oesapa', 1, '1', 'fince_giri', 'user', 0, 0, 0),
(427, NULL, '', 'Ruben semuel giri', 'Oesapa', '2000-10-06', '', 'Laki-laki', 'Oesapa', 1, '1', 'ruben_giri', 'user', 0, 0, 0),
(428, NULL, '', 'Rusdy theofilus giri', 'Oesapa', '2005-01-26', '', 'Laki-laki', 'Oesapa', 1, '1', 'rusdy_giri', 'user', 0, 0, 0),
(429, NULL, '', 'Alm. david kekado', 'Oesapa', '1964-12-26', '', 'Laki-laki', 'Oesapa', 1, '1', '', '', 1, 1, 1),
(430, NULL, '', 'Elisabeth kekado', 'Oesapa', '1963-12-20', '', 'Perempuan', 'Oesapa', 1, '1', 'elisabeth_kekado', 'user', 1, 1, 2),
(431, NULL, '', 'Kevin kekado', 'Oesapa', '1989-02-02', '', 'Laki-laki', 'Oesapa', 1, '1', 'kevin_kekado', 'user', 0, 0, 0),
(432, NULL, '', 'Riska kekado', 'Oesapa', '1995-03-19', '', 'Perempuan', 'Oesapa', 1, '1', 'riska_kekado', 'user', 0, 0, 0),
(433, NULL, '', 'Erasmus muskananfolla', 'Oesapa', '1960-08-06', '', 'Laki-laki', 'Oesapa', 1, '1', 'erasmus_muskananfoll', 'user', 1, 1, 1),
(434, NULL, '', 'muskananfola', 'Oesapa', '1962-03-20', '', 'Perempuan', 'Oesapa', 1, '1', 'muskananfola', 'user', 1, 1, 1),
(435, NULL, '', 'Edwin muskananfola', 'Oesapa', '1995-03-07', '', 'Laki-laki', 'Oesapa', 1, '1', 'edwin_muskananfola', 'user', 0, 0, 0),
(436, NULL, '', 'Elysa muskananfola', 'Oesapa', '1998-10-16', '', 'Perempuan', 'Oesapa', 1, '1', 'elysa_muskananfola', 'user', 0, 0, 0),
(437, NULL, '', 'Geraldy muskananfola', 'Oesapa', '2009-06-16', '', 'Laki-laki', 'Oesapa', 1, '1', 'geraldy_muskananfola', 'user', 0, 0, 0),
(438, NULL, '', 'Alm. urbanus lomiheke', 'Oesapa', '1968-08-28', '', 'Laki-laki', 'Oesapa', 1, '1', '', '', 1, 1, 1),
(439, NULL, '', 'Theresia lomiheke', 'Oesapa', '1975-08-28', '', 'Perempuan', 'Oesapa', 1, '1', 'theresia_lomiheke', 'user', 1, 1, 2),
(440, NULL, '', 'Jefri lomiheke', 'Oesapa', '1999-01-13', '', 'Laki-laki', 'Oesapa', 1, '1', 'jefri_lomiheke', 'user', 0, 0, 0),
(441, NULL, '', 'Herlin lomiheke', 'Oesapa', '2004-04-07', '', 'Perempuan', 'Oesapa', 1, '1', 'herlin_lomiheke', 'user', 0, 0, 0),
(442, NULL, '', 'Citra lomiheke', 'Oesapa', '2012-03-03', '', 'Perempuan', 'Oesapa', 1, '1', 'citra_lomiheke', 'user', 0, 0, 0),
(443, NULL, '', 'Matheos manafe', 'Oesapa', '1985-02-25', '', 'Laki-laki', 'Oesapa', 1, '1', 'matheos_manafe', 'user', 1, 1, 1),
(444, NULL, '', 'Yosinta sherly lay', 'Oesapa', '1988-01-19', '', 'Perempuan', 'Oesapa', 1, '1', 'yosinta_lay', 'user', 1, 1, 1),
(445, NULL, '', 'Cendana abigael velove manafe', 'Oesapa', '2008-08-26', '', 'Perempuan', 'Oesapa', 1, '1', 'cendana_manafe', 'user', 0, 0, 0),
(446, NULL, '', 'Cempaka yeserela manafe', 'Oesapa', '2012-06-02', '', 'Perempuan', 'Oesapa', 1, '1', 'cempaka_manafe', 'user', 0, 0, 0),
(447, NULL, '', 'Catherina aurora manafe', 'Oesapa', '2019-04-02', '', 'Perempuan', 'Oesapa', 1, '1', 'catherina_manafe', 'user', 0, 0, 0),
(448, NULL, '', 'Billy sumaa', 'Kupang', '1998-09-09', '', 'Laki-laki', 'Kupang', 1, '0', 'billy_sumaa', 'user', 0, 0, 0),
(449, NULL, '', 'Risna mbuik', 'Kupang', '2000-09-06', '', 'Perempuan', 'Kupang', 1, '0', 'risna_mbuik', 'user', 0, 0, 0),
(450, NULL, '', 'Selvi aaurelia taetetu', 'Kupang', '2001-10-19', '', 'Perempuan', 'Kupang', 1, '0', 'selvi_taetetu', 'user', 0, 0, 0),
(451, NULL, '', 'Dewi tananggau', 'Kupang', '2003-11-04', '', 'Perempuan', 'Kupang', 1, '0', 'dewi_tananggau', 'user', 0, 0, 0),
(452, NULL, '', 'Trivena nasa', 'Kupang', '1998-12-19', '', 'Perempuan', 'Kupang', 1, '0', 'trivena_nasa', '', 0, 0, 0),
(453, NULL, '', 'Rhyn laumau', 'Kupang', '1999-03-02', '', 'Perempuan', 'Kupang', 1, '0', 'rhyn_laumau', 'user', 0, 0, 0),
(454, NULL, '', 'Jovantri tamonob', 'Kupang', '2001-10-10', '', 'Laki-laki', 'Kupang', 1, '0', 'jovantri_tamonob', 'user', 0, 0, 0),
(455, NULL, '', 'Gery lenggu', 'Kupang', '2000-04-26', '', 'Laki-laki', 'Kupang', 1, '0', 'gerry_lenggu', 'user', 0, 0, 0),
(456, NULL, '', 'Asyer panab', 'Kupang', '2001-02-22', '', 'Laki-laki', 'Kupang', 1, '0', 'asyer_panab', 'user', 0, 0, 0),
(457, NULL, '', 'Yanse noma', 'Kupang', '1998-01-19', '', 'Laki-laki', 'Kupang', 1, '0', 'yanse_noma', 'user', 0, 0, 0),
(458, NULL, '', 'Mayang febriani', 'Kupang', '1999-02-23', '', 'Perempuan', 'Kupang', 1, '0', 'mayang_febriani', 'user', 0, 0, 0),
(459, NULL, '', 'shanel tchung', 'Kupang', '2005-08-03', '', 'Perempuan', 'Kupang', 1, '0', 'shanel_tchung', 'user', 0, 0, 0),
(460, NULL, '', 'Priska sanu', 'Kupang', '2001-03-21', '', 'Perempuan', 'Kupang', 1, '0', 'priska_sanu', 'user', 0, 0, 0),
(461, NULL, '', 'Ikhe adu', 'Kupang', '1998-06-03', '', 'Perempuan', 'Kupang', 1, '0', 'ikhe_adu', 'user', 0, 0, 0),
(462, NULL, '', 'Elda lau', 'Kupang', '2000-04-01', '', 'Perempuan', 'Kupang', 1, '0', 'elda_lau', 'user', 0, 0, 0),
(463, NULL, '', 'Diana penton', 'Kupang', '2000-11-06', '', 'Perempuan', 'Kupang', 1, '0', 'diana_penton', 'user', 0, 0, 0),
(464, NULL, '', 'Leny penton', 'Kupang', '1998-12-14', '', 'Perempuan', 'Kupang', 1, '0', 'leny_penton', 'user', 0, 0, 0),
(465, NULL, '', 'Sony mapada', 'Kupang', '2003-10-15', '', 'Laki-laki', 'Kupang', 1, '0', 'sony_mapada', 'user', 0, 0, 0),
(466, NULL, '', 'Nonny mapada', 'Kupang', '2001-01-10', '', 'Perempuan', 'Kupang', 1, '0', 'nonny_mapada', 'user', 0, 0, 0),
(467, NULL, '', 'fherdy bana', 'Kupang', '1998-08-12', '', 'Laki-laki', 'Kupang', 1, '0', 'fherdy_bana', 'user', 0, 0, 0),
(468, NULL, '', 'Esterina bana', 'Kupang', '2002-05-03', '', 'Perempuan', 'Kupang', 1, '0', 'esterina_bana', 'user', 0, 0, 0),
(469, NULL, '', 'Riny betty', 'Kupang', '1998-08-30', '', 'Perempuan', 'Kupang', 1, '0', 'riny_betty', 'user', 0, 0, 0),
(470, NULL, '', 'Dedy tefbana', 'Kupang', '1993-12-16', '', 'Laki-laki', 'Kupang', 1, '0', 'dedy_tefbana', 'user', 0, 0, 0),
(471, NULL, '', 'Markus foeh', 'Oesapa', '1981-03-08', '', 'Laki-laki', 'Oesapa', 1, '1', 'markus_foeh', 'user', 1, 1, 1),
(472, NULL, '', 'Meti A.nabuasa', 'Oesapa', '1983-05-19', '', 'Perempuan', 'Oesapa', 1, '1', 'meti_nabuasa', 'user', 1, 1, 1),
(473, NULL, '', 'Sandeliber M. foes', 'Oesapa', '2005-11-15', '', 'Laki-laki', 'Oesapa', 1, '1', 'sandeliber_foes', 'user', 0, 0, 0),
(474, NULL, '', 'Devid H. foes', 'Oesapa', '2009-02-25', '', 'Laki-laki', 'Oesapa', 1, '1', 'david_foes', 'user', 0, 0, 0),
(475, NULL, '', 'Lidia Olivia foes', 'Oesapa', '2012-10-13', '', 'Perempuan', 'Oesapa', 1, '1', 'lidia_foes', 'user', 0, 0, 0),
(476, NULL, '', 'Keren yetmika foes', 'Oesapa', '2014-09-16', '', 'Perempuan', 'Oesapa', 1, '1', 'keren_foes', 'user', 0, 0, 0),
(477, NULL, '', 'Swempi munde', 'Oesapa', '1965-01-08', '', 'Perempuan', 'Oesapa', 1, '1', 'swempi_munde', 'user', 1, 1, 1),
(478, NULL, '', 'Yeheskiel leltkaeb', 'Oesapa', '1964-06-15', '', 'Laki-laki', 'Oesapa', 1, '1', 'yeheskiel_leltakaeb', 'user', 1, 1, 1),
(479, NULL, '', 'Norlina leltakaeb sonlay', 'Oesapa', '1972-11-21', '', 'Perempuan', 'Oesapa', 1, '1', 'norlina_sonlay', 'user', 0, 0, 0),
(480, NULL, '', 'Rosalina leltakaeb', 'Oesapa', '1990-11-24', '', 'Perempuan', 'Oesapa', 1, '1', 'rosalina_leltakaeb', 'user', 0, 0, 0),
(481, NULL, '', 'Apren leltakaeb', 'Oesapa', '1988-04-20', '', 'Laki-laki', 'Oesapa', 1, '1', 'apren_leltakaeb', 'user', 1, 1, 1),
(482, NULL, '', 'Orance lake', 'Oesapa', '1983-10-15', '', 'Perempuan', 'Oesapa', 1, '1', 'orance_lake', 'user', 1, 1, 1),
(483, NULL, '', 'Natasya leltakaeb', 'Oesapa', '2016-06-24', '', 'Perempuan', 'Oesapa', 1, '1', 'natasya_leltakaeb', 'user', 0, 0, 0),
(484, NULL, '', 'Joela kristin leltakaeb', 'Oesapa', '2021-06-04', '', 'Laki-laki', 'Oesapa', 1, '1', 'joela_leltakaeb', 'user', 0, 0, 0),
(485, NULL, '', 'Kristin mallo', 'Oesapa', '1958-09-22', '', 'Perempuan', 'Oesapa', 1, '1', 'kristin_mallo', 'user', 1, 1, 2),
(486, NULL, '', 'Grachella nhacha nono', 'Oesapa', '2015-09-16', '', 'Perempuan', 'Oesapa', 1, '1', 'grachella_nono', 'user', 0, 0, 0),
(487, NULL, '', 'Yohanes A.L. nono', 'Oesapa', '1987-07-24', '', 'Laki-laki', 'Oesapa', 1, '1', 'yohanes_nono', 'user', 1, 1, 1),
(488, NULL, '', 'Mercys L. mata', 'Oesapa', '1980-03-29', '', 'Perempuan', 'Oesapa', 1, '1', 'mercys_mata', 'user', 1, 1, 1),
(489, NULL, '', 'Alfa agusto putra nono', 'Oesapa', '2013-08-21', '', 'Laki-laki', 'Oesapa', 1, '1', 'alfa_nono', 'user', 0, 0, 0),
(490, NULL, '', 'Eunike kurniasari putri nono', 'Oesapa', '2016-02-06', '', 'Perempuan', 'Oesapa', 1, '1', 'eunike_nono', 'user', 0, 0, 0),
(491, NULL, '', 'Adrielawidya putri nono', 'Oesapa', '2017-11-09', '', 'Perempuan', 'Oesapa', 1, '1', 'adrielawidya_nono', 'user', 0, 0, 0),
(492, NULL, '', 'Clarissa junia putri nono', 'Oesapa', '2021-06-16', '', 'Perempuan', 'Oesapa', 1, '1', 'clarissa_nono', 'user', 0, 0, 0),
(493, NULL, '', 'Andreas paseki', 'Oesapa', '1977-01-07', '', 'Laki-laki', 'Oesapa', 1, '1', 'andreas_paseki', 'user', 1, 1, 1),
(494, NULL, '', 'Ribka munde', 'Oesapa', '1976-03-03', '', 'Perempuan', 'Oesapa', 1, '1', 'ribka_munde', 'user', 1, 1, 1),
(495, NULL, '', 'Elce paseki', 'Oesapa', '2004-02-02', '', 'Perempuan', 'Oesapa', 1, '1', 'elce_paseki', 'user', 0, 0, 0),
(496, NULL, '', 'Erlita paseki', 'Oesapa', '2012-12-12', '', 'Perempuan', 'Oesapa', 1, '1', 'erlita_paseki', 'user', 0, 0, 0),
(497, NULL, '', 'Ito pingah', 'Oesapa', '1993-03-09', '', 'Laki-laki', 'Oesapa', 1, '1', 'ito_pingah', 'user', 1, 1, 1),
(498, NULL, '', 'Edolvince snae', 'Oesapa', '1997-07-30', '', 'Perempuan', 'Oesapa', 1, '1', 'edolvince_snae', 'user', 1, 1, 1),
(499, NULL, '', 'Listra agripa pingah', 'Oesapa', '2020-08-19', '', 'Perempuan', 'Oesapa', 1, '1', 'listra_pingah', 'user', 0, 0, 0),
(500, NULL, '', 'Keky narsetia pingah', 'Oesapa', '2018-05-05', '', 'Perempuan', 'Oesapa', 1, '1', 'keky_pingah', 'user', 0, 0, 0),
(501, NULL, '', 'Askip aridance rassy', 'Oesapa', '1989-01-10', '', 'Laki-laki', 'Oesapa', 1, '1', 'askip_rassy', 'user', 0, 1, 1),
(502, NULL, '', 'Yulianti halena tarmo', 'Oesapa', '1988-07-22', '', 'Perempuan', 'Oesapa', 1, '1', 'yulianti_tarmo', 'user', 0, 0, 0),
(503, NULL, '', 'daniel ariel valentino rassi', 'Oesapa', '2017-02-16', '', 'Laki-laki', 'Oesapa', 1, '1', 'daniel_rassi', 'user', 0, 0, 0),
(504, NULL, '', 'Jayden febriyan rassy', 'Oesapa', '2020-02-05', '', 'Laki-laki', 'Oesapa', 1, '1', 'jayden_rassy', 'user', 0, 0, 0),
(505, NULL, '', 'Ricky A. mbeo', 'Oesapa', '1989-03-05', '', 'Laki-laki', 'Oesapa', 1, '1', 'ricky_mbeo', 'user', 1, 1, 1),
(506, NULL, '', 'Irma diana ndun', 'Oesapa', '1988-07-24', '', 'Perempuan', 'Oesapa', 1, '1', 'irma_ndun', 'user', 1, 1, 1),
(507, NULL, '', 'Jolief U. mbeo', 'Oesapa', '2020-04-27', '', 'Laki-laki', 'Oesapa', 1, '1', 'jolief_mbeo', 'user', 0, 0, 0),
(508, NULL, '', 'Elfianus ledoh', 'Oesapa', '1971-06-03', '', 'Laki-laki', 'Oesapa', 1, '1', 'elfianus_ledoh', 'user', 1, 1, 1),
(509, NULL, '', 'Ester haris', 'Oesapa', '1972-09-12', '', 'Perempuan', 'Oesapa', 1, '1', 'ester_haris', 'user', 1, 1, 1),
(510, NULL, '', 'randi yusuf ledoh', 'Oesapa', '2007-10-06', '', 'Laki-laki', 'Oesapa', 1, '1', 'randi_ledoh', 'user', 0, 0, 0),
(511, NULL, '', 'Maksi lakapu', 'Oesapa', '1993-05-25', '', 'Laki-laki', 'Oesapa', 1, '1', 'maksi_lakapu', 'user', 1, 1, 1),
(512, NULL, '', 'Yesri antonia mbuik', 'Oesapa', '1999-04-01', '', 'Perempuan', 'Oesapa', 1, '1', 'yesri_mbuik', 'user', 1, 1, 1),
(513, NULL, '', 'Shelona lakapu', 'Oesapa', '2020-04-04', '', 'Perempuan', 'Oesapa', 1, '1', 'shelona_lakapu', 'user', 0, 0, 0),
(514, NULL, '', 'Sulastry lakapu', 'Oesapa', '2022-03-05', '', 'Perempuan', 'Oesapa', 1, '1', 'sulastry_lakapu', 'user', 0, 0, 0),
(515, NULL, '', 'Teofilus nggelan', 'Oesapa', '1977-04-09', '', 'Laki-laki', 'Oesapa', 1, '1', 'teofilus_nggelan', 'user', 1, 1, 1),
(516, NULL, '', 'Adolfina mbalu', 'Oesapa', '1980-04-09', '', 'Perempuan', 'Oesapa', 1, '1', 'adolfina_mbalu', 'user', 0, 0, 0),
(517, NULL, '', 'Reinhard nggelan', 'Oesapa', '2008-01-20', '', 'Laki-laki', 'Oesapa', 1, '1', 'reinhard_nggelan', 'user', 0, 0, 0),
(518, NULL, '', 'Quantania nggelan', 'Oesapa', '2010-01-05', '', 'Perempuan', 'Oesapa', 1, '1', 'quantania_nggelan', 'user', 0, 0, 0),
(519, NULL, '', 'Leonard nggelan', 'Oesapa', '2016-02-21', '', 'Laki-laki', 'Oesapa', 1, '1', 'leonard_nggelan', 'user', 0, 0, 0),
(520, NULL, '', 'Adek putra soniardy pah', 'Oesapa', '1993-01-12', '', 'Laki-laki', 'Oesapa', 1, '1', 'adek_pah', 'user', 1, 1, 1),
(521, NULL, '', 'Ensy muskaananfola', 'Oesapa', '1993-01-12', '', 'Perempuan', 'Oesapa', 1, '1', 'ensy_muskananfola', 'user', 1, 1, 1),
(522, NULL, '', 'Marvel pah', 'Oesapa', '2015-03-25', '', 'Laki-laki', 'Oesapa', 1, '1', 'marvel_pah', 'user', 0, 0, 0),
(523, NULL, '', 'Novariana', 'Oesapa', '2020-11-24', '', 'Perempuan', 'Oesapa', 1, '1', 'novariana_pah', 'user', 0, 0, 0),
(524, NULL, '5311022409000014', 'tiwuk widiastuti', 'Kupang', '1999-06-13', '081234567899', 'Perempuan', 'kupang', 2, '1', 'tiwuk_widiastuti', 'user', 1, 1, 1),
(525, NULL, '5311022409000001', 'test', 'Kupang', '2007-06-12', '081333360928', 'Laki-laki', 'Kupang', 0, '0', 'testing', 'user', 0, 0, 0),
(526, NULL, '5311022409000067', 'embar m', 'Kupang', '1997-03-12', '081333360920', 'Laki-laki', 'kupang', 2, '1', 'embar_m', 'user', 1, 1, 1),
(527, NULL, '5311022409000056', 'de', 'de', '2010-05-12', '123', 'Laki-laki', 'kup', 1, '1', 'de', 'de', 0, 0, 0),
(528, NULL, '5311022409000001', 'kocak', 'Oesapa', '2023-12-05', '085238822414', 'Laki-laki', 'test', 0, '0', 'kocak', 'user', 0, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kepala_keluarga`
--

CREATE TABLE `kepala_keluarga` (
  `id_kk` int(11) NOT NULL,
  `id_jemaat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kepala_keluarga`
--

INSERT INTO `kepala_keluarga` (`id_kk`, `id_jemaat`) VALUES
(11, 6),
(12, 13),
(13, 30),
(14, 274),
(15, 275),
(16, 284),
(18, 42),
(19, 524),
(20, 526);

-- --------------------------------------------------------

--
-- Struktur dari tabel `operator`
--

CREATE TABLE `operator` (
  `id_pengguna` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `hak_akses` enum('admin','member','gembala') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `operator`
--

INSERT INTO `operator` (`id_pengguna`, `username`, `password`, `nama`, `jabatan`, `hak_akses`) VALUES
(1, 'admin', 'admin', 'sekretaris', 'sekretarus/ operator', 'admin'),
(2, 'pendeta', 'pendeta', 'pak pendeta', 'Gembala', 'gembala');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyerahan`
--

CREATE TABLE `penyerahan` (
  `id_penyerahan` int(5) NOT NULL,
  `no_surat` varchar(35) DEFAULT NULL,
  `tanggal_request` date NOT NULL,
  `nik` varchar(16) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `tanggal_penyerahan` date DEFAULT NULL,
  `nama_pendeta` varchar(50) DEFAULT NULL,
  `file_kartu_keluarga` varchar(50) DEFAULT NULL,
  `file_akta_kelahiran` varchar(50) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penyerahan`
--

INSERT INTO `penyerahan` (`id_penyerahan`, `no_surat`, `tanggal_request`, `nik`, `nama_ayah`, `nama_ibu`, `tanggal_penyerahan`, `nama_pendeta`, `file_kartu_keluarga`, `file_akta_kelahiran`, `status`, `keterangan`) VALUES
(1, NULL, '2023-12-14', '5555555555555555', 'tofilus saudale', 'jefry tresia saudale dethan', NULL, NULL, '', 'Penyerahan_5555555555555555.pdf', '0', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pernikahan`
--

CREATE TABLE `pernikahan` (
  `id_pernikahan` int(5) NOT NULL,
  `no_surat` varchar(35) DEFAULT NULL,
  `tanggal_request` date NOT NULL,
  `nik_pria` varchar(16) NOT NULL,
  `nik_wanita` varchar(16) NOT NULL,
  `tanggal_pernikahan` date DEFAULT NULL,
  `nama_pendeta` varchar(50) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `suratkeluar`
--

CREATE TABLE `suratkeluar` (
  `id_surat_keluar` int(5) NOT NULL,
  `no_surat_keluar` varchar(30) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tujuan_surat` varchar(35) NOT NULL,
  `perihal` varchar(35) NOT NULL,
  `file_surat_keluar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `suratkeluar`
--

INSERT INTO `suratkeluar` (`id_surat_keluar`, `no_surat_keluar`, `tgl_surat`, `tujuan_surat`, `perihal`, `file_surat_keluar`) VALUES
(1, '54', '2020-10-28', 'Aldego bernat saduk', 'surat penyerahan anak', '2020-10-28_Aldego bernat saduk.pdf'),
(2, '40', '2014-02-22', 'Alfa agusto puta nono', 'penyerahan anak', '2014-02-22_Alfa agusto puta nono.pdf'),
(3, '52', '2020-03-03', 'Danieil ariel valentino rassi', 'penyerahan anak', '2020-03-03_Danieil ariel valentino rassi.pdf'),
(4, '50', '2019-08-20', 'Edgar imanuel muskananfola', 'penyerahan anak', '2019-08-20_Edgar imanuel muskananfola.pdf'),
(5, '49', '2019-08-20', 'Elwin geraldy muskananfola', 'penyerahan anak', '2019-08-20_Elwin geraldy muskananfola.pdf'),
(6, '43', '2016-06-27', 'Eunike kurniasari putri nono', 'penyerahan anak', '2016-06-27_Eunike kurniasari putri nono.pdf'),
(7, '46', '2017-08-31', 'Grachella nhacha nono', 'penyerahan anak', '2017-08-31_Grachella nhacha nono.pdf'),
(8, '44', '2016-09-07', 'Irfan boimau', 'penyerahan anak', '2016-09-07_Irfan boimau.pdf'),
(9, '53', '2020-04-03', 'Jayden febriyan rassi', 'penyerahan anak', '2020-04-03_Jayden febriyan rassi.pdf'),
(10, '48', '2019-07-27', 'Keky narsetia pingah', 'penyerahan anak', '2019-07-27_Keky narsetia pingah.pdf'),
(11, '51', '2019-09-25', 'Krista anastasya nahak', 'penyerahan anak', '2019-09-25_Krista anastasya nahak.pdf'),
(12, '55', '2022-02-05', 'Listra agripa pingah', 'penyerahan anak', '2022-02-05_Listra agripa pingah.pdf'),
(13, '42', '2016-06-15', 'Sean jidensho panie', 'penyerahan anak', '2016-06-15_Sean jidensho panie.pdf'),
(14, '29', '2014-11-25', 'Zefanya ramona lusi', 'penyerahan anak', '2014-11-25_Zefanya ramona lusi.pdf'),
(15, '45', '2017-04-03', 'Farel junior yohanes kekado', 'penyerahan anak', '2017-04-03_Farel junior yohanes kekado.pdf'),
(16, '50', '2020-06-26', 'Ingrita F.kollo', 'baptis', '2020-06-26_Ingrita F.kollo.pdf'),
(17, '51', '2020-07-28', 'Awardi B. toy', 'baptis', '2020-07-28_Awardi B. toy.pdf'),
(18, '54', '2019-08-24', 'Edwin sefentry mardianto muskanan f', 'baptis', '2019-08-24_Edwin sefentry mardianto muskanan f.pdf'),
(19, '56', '2023-03-27', 'Erasmus muskananfola', 'baptis', '2023-03-27_Erasmus muskananfola.pdf'),
(20, '53', '2019-08-02', 'Ferdy hermes fangidae', 'baptis', '2019-08-02_Ferdy hermes fangidae.pdf'),
(21, '53', '2020-10-29', 'giovela K.kana', 'baptis', '2020-10-29_giovela K.kana.pdf'),
(22, '52', '2020-07-28', 'Gradinto josua E. toy', 'baptis', '2020-07-28_Gradinto josua E. toy.pdf'),
(23, '55', '2022-08-29', 'Imersin yumerti bunga', 'baptis', '2022-08-29_Imersin yumerti bunga.pdf'),
(24, '56', '2019-08-24', 'Ito pingah', 'baptis', '2019-08-24_Ito pingah.pdf'),
(25, '54', '2022-06-25', 'Kristin luise thine', 'baptis', '2022-06-25_Kristin luise thine.pdf'),
(26, '52', '2019-08-02', 'Reymon alfian fangidae', 'baptis', '2019-08-02_Reymon alfian fangidae.pdf'),
(27, '51', '2019-07-13', 'Ribka mutiara', 'baptis', '2019-07-13_Ribka mutiara.pdf'),
(28, '53', '2020-08-13', 'Risky arwan mbeo', 'baptis', '2020-08-13_Risky arwan mbeo.pdf'),
(29, '55', '2019-09-21', 'Servansius anunut', 'baptis', '2019-09-21_Servansius anunut.pdf'),
(30, '57', '2023-06-28', 'Stevanus Y.laa', 'baptis', '2023-06-28_Stevanus Y.laa.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `suratmasuk`
--

CREATE TABLE `suratmasuk` (
  `id_surat_masuk` int(5) NOT NULL,
  `no_surat_masuk` varchar(30) NOT NULL,
  `tgl_surat` date NOT NULL,
  `tgl_terima` date NOT NULL,
  `asal_surat` varchar(35) NOT NULL,
  `perihal` varchar(35) NOT NULL,
  `file_surat_masuk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `suratmasuk`
--

INSERT INTO `suratmasuk` (`id_surat_masuk`, `no_surat_masuk`, `tgl_surat`, `tgl_terima`, `asal_surat`, `perihal`, `file_surat_masuk`) VALUES
(3, '122a/I.12/12/2023', '2023-11-24', '2023-12-09', 'richard', 'surat undangan fellowship', '2023-11-24_richard.pdf'),
(4, '123B/I.19/10/2023', '2023-11-20', '2023-11-22', 'GPdI filadelfia', 'surat undangan fellowship', '2023-11-20_GPdI filadelfia.pdf'),
(5, '123B/I.20/10/2023', '2023-11-21', '2023-11-25', 'GPdI carmel', 'surat undangan natal bersama', '2023-11-21_GPdI carmel.pdf'),
(7, '123B/I.22/10/2023', '2023-12-01', '2023-12-09', 'arman', 'surat undangan ibadah bersama', '2023-12-01_arman.pdf'),
(8, '123a/I.18/10/2023', '2023-12-05', '2023-12-06', 'GPdI ', 'surat undangan fellowship', '2023-12-05_GPdI .pdf'),
(9, '124a/I.20/10/2023', '2023-12-14', '2023-12-15', 'GPdI filadelfia', 'Surat Undangan natal', '2023-12-14_GPdI filadelfia.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `id_jemaat` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `id_jemaat`) VALUES
(2, 0),
(3, 1),
(4, 2),
(5, 3),
(6, 4),
(7, 5),
(8, 6),
(9, 7),
(10, 8),
(11, 9),
(12, 10),
(13, 11),
(14, 12),
(15, 13),
(16, 14),
(17, 158),
(18, 166),
(19, 168),
(20, 163),
(21, 45),
(22, 34),
(23, 30),
(24, 31),
(25, 0),
(26, 42),
(27, 43),
(28, 282),
(30, 182),
(31, 288),
(32, 290),
(33, 284),
(34, 327),
(35, 285),
(36, 280),
(37, 277),
(38, 281),
(39, 274),
(40, 279),
(41, 524),
(42, 526);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wartajemaat`
--

CREATE TABLE `wartajemaat` (
  `id_warta` int(5) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `tanggal` date NOT NULL,
  `isi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `wartajemaat`
--

INSERT INTO `wartajemaat` (`id_warta`, `judul`, `tanggal`, `isi`) VALUES
(1, 'minggu ke-1 desember', '2023-12-03', 'warta-2023-12-03.pdf'),
(2, 'minggu ke-2', '2023-12-10', 'warta-2023-12-10.pdf'),
(3, 'minggu ke 1', '2022-01-02', 'warta-2022-01-02.pdf'),
(4, 'minggu ke-2', '2022-01-09', 'warta-2022-01-09.pdf'),
(5, 'minggu ke 3', '2022-01-16', 'warta-2022-01-16.pdf'),
(6, 'minggu ke 4', '2022-01-23', 'warta-2022-01-23.pdf'),
(7, 'minggu ke 5', '2022-01-30', 'warta-2022-01-30.pdf'),
(8, 'minggu ke 1', '2022-02-06', 'warta-2022-02-06.pdf'),
(9, 'minggu ke 2', '2022-02-13', 'warta-2022-02-13.pdf'),
(10, 'minggu ke 3', '2022-02-20', 'warta-2022-02-20.pdf'),
(11, 'minggu ke 4', '2022-02-27', 'warta-2022-02-27.pdf'),
(12, 'minggu ke 1', '2022-03-06', 'warta-2022-03-06.pdf'),
(13, 'minggu ke 2', '2022-03-13', 'warta-2022-03-13.pdf'),
(14, 'minggu ke 3', '2022-03-20', 'warta-2022-03-20.pdf'),
(15, 'minggu ke 4', '2022-03-27', 'warta-2022-03-27.pdf'),
(16, 'minggu ke 1', '2022-04-03', 'warta-2022-04-03.pdf'),
(17, 'minggu ke 2', '2022-04-10', 'warta-2022-04-10.pdf'),
(18, 'minggu ke 3', '2022-04-17', 'warta-2022-04-17.pdf'),
(19, 'minggu ke 4', '2022-04-24', 'warta-2022-04-24.pdf'),
(20, 'minggu ke 1', '2022-05-01', 'warta-2022-05-01.pdf'),
(21, 'minggu ke 2', '2022-05-08', 'warta-2022-05-08.pdf'),
(22, 'minggu ke 3', '2022-05-15', 'warta-2022-05-15.pdf'),
(23, 'minggu ke 4', '2022-05-22', 'warta-2022-05-22.pdf'),
(24, 'minggu ke 1', '2022-06-05', 'warta-2022-06-05.pdf'),
(25, 'minggu ke 2', '2022-06-12', 'warta-2022-06-12.pdf'),
(26, 'minggu ke 3', '2022-06-19', 'warta-2022-06-19.pdf'),
(27, 'minggu ke 4', '2022-06-26', 'warta-2022-06-26.pdf'),
(28, 'minggu ke 1', '2022-07-03', 'warta-2022-07-03.pdf'),
(29, 'minggu ke 2', '2022-07-10', 'warta-2022-07-10.pdf'),
(30, 'minggu ke 3', '2022-07-17', 'warta-2022-07-17.pdf'),
(31, 'minggu ke 4', '2022-07-24', 'warta-2022-07-24.pdf'),
(32, 'minggu ke 5', '2022-07-31', 'warta-2022-07-31.pdf'),
(33, 'minggu ke 1', '2022-08-07', 'warta-2022-08-07.pdf'),
(34, 'minggu ke 2', '2022-08-21', 'warta-2022-08-21.pdf'),
(35, 'minggu ke 3', '2022-08-28', 'warta-2022-08-28.pdf'),
(36, 'minggu ke 1', '2022-09-04', 'warta-2022-09-04.pdf'),
(37, 'minggu ke 2', '2022-09-11', 'warta-2022-09-11.pdf'),
(38, 'minggu ke 3', '2022-09-18', 'warta-2022-09-18.pdf'),
(39, 'minggu ke 4', '2022-09-25', 'warta-2022-09-25.pdf'),
(40, 'minggu ke 1', '2022-10-02', 'warta-2022-10-02.pdf'),
(41, 'minggu ke 2', '2022-10-16', 'warta-2022-10-16.pdf'),
(42, 'minggu ke 3', '2022-10-23', 'warta-2022-10-23.pdf'),
(43, 'minggu ke 4', '2022-10-30', 'warta-2022-10-30.pdf'),
(44, 'minggu ke 1', '2022-11-06', 'warta-2022-11-06.pdf'),
(45, 'minggu ke 2', '2022-11-13', 'warta-2022-11-13.pdf'),
(46, 'minggu ke 3', '2022-11-20', 'warta-2022-11-20.pdf'),
(47, 'minggu ke 4', '2022-11-27', 'warta-2022-11-27.pdf'),
(48, 'minggu ke 1', '2022-12-04', 'warta-2022-12-04.pdf'),
(49, 'minggu ke 2', '2022-12-11', 'warta-2022-12-11.pdf'),
(50, 'minggu ke 3', '2022-12-18', 'warta-2022-12-18.pdf'),
(51, 'minggu ke 4', '2022-12-25', 'warta-2022-12-25.pdf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota_keluarga`
--
ALTER TABLE `anggota_keluarga`
  ADD PRIMARY KEY (`id_ak`);

--
-- Indexes for table `baptis`
--
ALTER TABLE `baptis`
  ADD PRIMARY KEY (`id_baptis`);

--
-- Indexes for table `disposisi`
--
ALTER TABLE `disposisi`
  ADD PRIMARY KEY (`id_disposisi`);

--
-- Indexes for table `jemaat`
--
ALTER TABLE `jemaat`
  ADD PRIMARY KEY (`id_jemaat`);

--
-- Indexes for table `kepala_keluarga`
--
ALTER TABLE `kepala_keluarga`
  ADD PRIMARY KEY (`id_kk`);

--
-- Indexes for table `operator`
--
ALTER TABLE `operator`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indexes for table `penyerahan`
--
ALTER TABLE `penyerahan`
  ADD PRIMARY KEY (`id_penyerahan`);

--
-- Indexes for table `pernikahan`
--
ALTER TABLE `pernikahan`
  ADD PRIMARY KEY (`id_pernikahan`);

--
-- Indexes for table `suratkeluar`
--
ALTER TABLE `suratkeluar`
  ADD PRIMARY KEY (`id_surat_keluar`);

--
-- Indexes for table `suratmasuk`
--
ALTER TABLE `suratmasuk`
  ADD PRIMARY KEY (`id_surat_masuk`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `wartajemaat`
--
ALTER TABLE `wartajemaat`
  ADD PRIMARY KEY (`id_warta`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota_keluarga`
--
ALTER TABLE `anggota_keluarga`
  MODIFY `id_ak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;
--
-- AUTO_INCREMENT for table `baptis`
--
ALTER TABLE `baptis`
  MODIFY `id_baptis` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id_disposisi` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `jemaat`
--
ALTER TABLE `jemaat`
  MODIFY `id_jemaat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=529;
--
-- AUTO_INCREMENT for table `kepala_keluarga`
--
ALTER TABLE `kepala_keluarga`
  MODIFY `id_kk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
  MODIFY `id_pengguna` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `penyerahan`
--
ALTER TABLE `penyerahan`
  MODIFY `id_penyerahan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pernikahan`
--
ALTER TABLE `pernikahan`
  MODIFY `id_pernikahan` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `suratkeluar`
--
ALTER TABLE `suratkeluar`
  MODIFY `id_surat_keluar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `suratmasuk`
--
ALTER TABLE `suratmasuk`
  MODIFY `id_surat_masuk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `wartajemaat`
--
ALTER TABLE `wartajemaat`
  MODIFY `id_warta` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
