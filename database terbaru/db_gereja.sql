-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 15 Nov 2023 pada 15.40
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

--
-- Dumping data untuk tabel `disposisi`
--

INSERT INTO `disposisi` (`id_disposisi`, `id_surat_masuk`, `isi_disposisi`, `dari`, `kepada`, `tanggal_disposisi`) VALUES
(1, 2, 'tolong di tindak lanjuti', '2', '3', '2023-11-05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jemaat`
--

CREATE TABLE `jemaat` (
  `id_jemaat` int(11) NOT NULL,
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

INSERT INTO `jemaat` (`id_jemaat`, `nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `no_hp`, `jenis_kelamin`, `alamat`, `status_j`, `ket`, `username`, `password`, `baptis`, `penyerahan`, `pernikahan`) VALUES
(1, '', 'Tofilus saudale', 'Lasiana', '0000-00-00', '82339354470', 'Laki-laki', 'Lasiana', 1, '1', 'tofilus_saudale', 'user', 1, 1, 1),
(2, '', 'jefry tresia saudale dethan', 'Lasiana', '0000-00-00', '', 'Perempuan', 'Lasiana', 1, '1', 'jefry_dethan', 'user', 1, 1, 1),
(3, '', 'jefta a. saudale', 'Lasiana', '0000-00-00', '', 'Laki-laki', 'Lasiana', 1, '1', 'jefta_saudale', 'user', 1, 1, 0),
(4, '', 'Debora saudale', 'Lasiana', '0000-00-00', '', 'Perempuan', 'Lasiana', 1, '1', 'debora_saudale', 'user', 1, 1, 0),
(5, '', 'apryana saudale', 'Lasiana', '0000-00-00', '', 'Perempuan', 'Lasiana', 1, '1', 'apryana_saudale', 'user', 1, 1, 0),
(6, '', 'Albert Fangidae', 'Lasiana', '0000-00-00', '', 'Laki-laki', 'Lasiana', 1, '1', 'albert_fangidae', 'user', 1, 1, 1),
(7, '', 'ferderika  fangidae ndun', 'Lasiana', '0000-00-00', '', 'Perempuan', 'Lasiana', 1, '1', 'ferderika_ndun', 'user', 1, 1, 1),
(8, '', 'Astrid Fangidae', 'Lasiana', '0000-00-00', '85239908148', 'Perempuan', 'Lasiana', 1, '1', 'astrid_fangidae', 'user', 1, 1, 0),
(9, '', 'Raymond Fangidae', 'Lasiana', '0000-00-00', '', 'Laki-laki', 'Lasiana', 1, '1', 'raymond_fangidae', 'user', 1, 1, 0),
(10, '', 'Ferdy Fangidae', 'Lasiana', '0000-00-00', '', 'Laki-laki', 'Lasiana', 1, '1', 'ferdy_fangidae', 'user', 1, 1, 0),
(11, '', 'Ester  Fangidae', 'Lasiana', '0000-00-00', '', 'Perempuan', 'Lasiana', 1, '1', 'ester _fangidae', 'user', 1, 1, 0),
(12, '', 'Debby Fangidae', 'Lasiana', '0000-00-00', '', 'Perempuan', 'Lasiana', 1, '1', 'debby_fangidae', 'user', 1, 1, 0),
(13, '', 'Adolof  Song go', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'adolof_go', 'user', 1, 1, 1),
(14, '', 'imelda go fangGidae', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'imelda_fanggidae', 'user', 1, 1, 1),
(15, '', 'Ina maya shinta go', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'ina_go', 'user', 1, 1, 0),
(16, '', 'Nicky go', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'nicky_go', 'user', 1, 1, 0),
(17, '', 'Roland putra go', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'roland_go', 'user', 1, 1, 0),
(18, '', 'Rian go', 'Oesapa', '0000-00-00', '82237175555', 'Laki-laki', 'Oesapa', 1, '1', 'rian_go', 'user', 1, 1, 0),
(19, '', 'Celin queeny bella go', 'Oesapa', '0000-00-00', '82237694822', 'Perempuan', 'Oesapa', 1, '1', 'celin_go', 'user', 1, 1, 0),
(20, '', 'agustinus jeharu ', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'agustinus_jeharu ', 'user', 1, 1, 1),
(21, '', 'yane jeharu', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'yane_jeharu', 'user', 1, 1, 1),
(22, '', 'Andreas JEHARU', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'andreas_jeharu', 'user', 1, 1, 0),
(23, '', 'Novita JEHARU', 'Oesapa', '0000-00-00', '82236771559', 'Perempuan', 'Oesapa', 1, '1', 'novita_jeharu', 'user', 1, 1, 0),
(24, '', 'DEWI JEHARU', 'Oesapa', '0000-00-00', '82236771559', 'Perempuan', 'Oesapa', 1, '1', 'dewi_jeharu', 'user', 1, 1, 0),
(25, '', 'Ardian Jeharu', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'ardian_jeharu', 'user', 0, 1, 0),
(26, '', 'Indah R.s. Jeharu', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'indah_jeharu', 'user', 1, 1, 0),
(27, '', 'selfince tungga ndolu', 'Oesapa', '0000-00-00', '82339354470', 'Perempuan', 'Oesapa', 1, '1', 'selfince_ndolu', 'user', 1, 1, 2),
(28, '', 'yulius ndolu', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'yulius_ndolu', 'user', 1, 1, 0),
(29, '', 'Monalisa ndolu', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'monalisa_ndolu', 'user', 1, 1, 0),
(30, '', 'Yunus malelak', 'Oesapa', '0000-00-00', '81353841075', 'Laki-laki', 'Oesapa', 1, '1', 'yunus_malelak', 'user', 1, 1, 0),
(31, '', 'agustina malelak', 'Oesapa', '0000-00-00', '82237852813', 'Perempuan', 'Oesapa', 1, '1', 'agustina_malelak', 'user', 1, 1, 0),
(32, '', 'Patrik malelak', 'Oesapa', '0000-00-00', '82147944174', 'Laki-laki', 'Oesapa', 1, '1', 'patrik_malelak', 'user', 1, 1, 0),
(33, '', 'Putri malelak', 'Oesapa', '0000-00-00', '81243680708', 'Perempuan', 'Oesapa', 1, '1', 'putri_malelak', 'user', 1, 1, 0),
(34, '', 'Verensi yana malelak', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'verensi_malelak', 'user', 1, 1, 0),
(35, '', 'GAVRIAL MATTHEW SUSANG ', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'gavrial_susang ', 'user', 1, 1, 0),
(36, '', 'Yosua lano', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'yosua_lano', 'user', 1, 1, 1),
(37, '', 'yohana lano', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'yohana_lano', 'user', 1, 1, 1),
(38, '', 'Anjelina romitha lano', 'Oesapa', '0000-00-00', '82236635373', 'Perempuan', 'Oesapa', 1, '1', 'anjelina_lano', 'user', 1, 1, 0),
(39, '', 'Ingrid milan lano', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'ingrid_lano', 'user', 1, 1, 0),
(40, '', 'Viktor adams lano', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'viktor_lano', 'user', 1, 1, 0),
(41, '', 'KristA APLONIA DAMALERU', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'krista_damaleru', 'user', 0, 1, 0),
(42, '', 'Ruben willa', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'ruben_willa', 'user', 1, 1, 1),
(43, '', 'MARIA willa Ludji', 'Oesapa', '0000-00-00', '85738196419', 'Perempuan', 'Oesapa', 1, '1', 'maria_ludji', 'user', 1, 1, 1),
(44, '', 'ZAMESDANOBED REGEN WILLA', 'Oesapa', '0000-00-00', '81529072137', 'Laki-laki', 'Oesapa', 1, '1', 'zamesdanobed_willa', 'user', 1, 1, 0),
(45, '', 'KEFLIN REGINA WILLA', 'Oesapa', '0000-00-00', '85238097729', 'Perempuan', 'Oesapa', 1, '1', 'keflin_willa', 'user', 1, 1, 0),
(46, '', 'RONALD BOY WILLA', 'Oesapa', '0000-00-00', '81239737869', 'Laki-laki', 'Oesapa', 1, '1', 'ronald_willa', 'user', 1, 1, 0),
(47, '', 'YERMI RAYMONDd WILLA', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'yermi_willa', 'user', 1, 1, 0),
(48, '', 'GILBERT RYANDi WILLA', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'gilbert_willa', 'user', 1, 1, 0),
(49, '', ' Jacky d. Karawisan', 'Oesapa', '0000-00-00', '82146948409', 'Laki-laki', 'Oesapa', 1, '1', ' jacky_karawisan', 'user', 1, 1, 1),
(50, '', 'liliana karawisan', 'Oesapa', '0000-00-00', '85238822414', 'Perempuan', 'Oesapa', 1, '1', 'liliana_karawisan', 'user', 1, 1, 1),
(51, '', 'Kevin karawisan', 'Oesapa', '0000-00-00', '81238792435', 'Laki-laki', 'Oesapa', 1, '1', 'kevin_karawisan', 'user', 1, 1, 0),
(52, '', 'Gracia trivena karawisan', 'Oesapa', '0000-00-00', '81238728268', 'Perempuan', 'Oesapa', 1, '1', 'gracia_karawisan', 'user', 1, 1, 0),
(53, '', 'Gisella karawisan', 'Oesapa', '0000-00-00', '82236599834', 'Perempuan', 'Oesapa', 1, '1', 'gisella_karawisan', 'user', 1, 1, 0),
(54, '', 'martha tananggau', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'martha_tananggau', 'user', 1, 1, 2),
(55, '', 'YELSY TANANGGAU', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'yelsy_tananggau', 'user', 1, 1, 0),
(56, '', 'Yandri EDGAR TANANGGAU', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'yandri_tananggau', 'user', 1, 1, 0),
(57, '', 'Aglen tananggau', 'Oesapa', '0000-00-00', '85738347113', 'Perempuan', 'Oesapa', 1, '1', 'aglen_tananggau', 'user', 1, 1, 0),
(58, '', 'REVA SEME', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'reva_seme', 'user', 1, 1, 0),
(59, '', 'Hengky enus', 'Oesapa', '0000-00-00', '81339707653', 'Laki-laki', 'Oesapa', 1, '1', 'hengky_enus', 'user', 1, 1, 1),
(60, '', 'isebella enus talomanafe', 'Oesapa', '0000-00-00', '85321013721', 'Perempuan', 'Oesapa', 1, '1', 'isebella_talomanafe', 'user', 1, 1, 1),
(61, '', 'Devani belandia enus', 'Oesapa', '0000-00-00', '82236116930', 'Perempuan', 'Oesapa', 1, '1', 'devani_enus', 'user', 1, 1, 0),
(62, '', 'Devircha anggriani enus', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'devircha_enus', 'user', 1, 1, 0),
(63, '', 'Eachan valeriano  enus', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'eachan_ enus', 'user', 1, 1, 0),
(64, '', ' Jiswan lusi', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', ' jiswan_lusi', 'user', 1, 1, 2),
(65, '', 'Ririn HERDIYANTI lusi', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'ririn_lusi', 'user', 1, 1, 0),
(66, '', 'Selvi YUNITA lusi', 'Oesapa', '0000-00-00', '81338399261', 'Perempuan', 'Oesapa', 1, '1', 'selvi_lusi', 'user', 1, 1, 0),
(67, '', 'jidro boymau', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'jidro_boymau', 'user', 1, 1, 1),
(68, '', 'maria billi boymau emburae ', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'maria_emburae ', 'user', 1, 1, 1),
(69, '', 'Indra boymau', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'indra_boymau', 'user', 1, 1, 0),
(70, '', 'Stiven boymau', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'stiven_boymau', 'user', 1, 1, 0),
(71, '', 'Krisna boymau', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'krisna_boymau', 'user', 1, 1, 0),
(72, '', 'Aldo boymau', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'aldo_boymau', 'user', 1, 1, 0),
(73, '', 'Randi boy mau', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'randi_boymau', 'user', 0, 1, 0),
(74, '', 'Irfan boymau', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'irfan_boymau', 'user', 1, 1, 0),
(75, '', 'aranci MBEO lusi', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'aranci_mbeolusi', 'user', 1, 1, 2),
(76, '', 'septiance mbeo', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'septiance_mbeo', 'user', 1, 1, 0),
(77, '', 'Egi mbeo', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'egi_mbeo', 'user', 1, 1, 0),
(78, '', 'PASKALita mbeo', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'paskalita_mbeo', 'user', 1, 1, 0),
(79, '', 'PRido mbeo', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'prido_mbeo', 'user', 1, 1, 0),
(80, '', 'Metusalak giri ', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'metusalak_giri ', 'user', 1, 1, 1),
(81, '', 'rahel giri ? tefa', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'rahel_giritefa', 'user', 1, 1, 1),
(82, '', 'Petrus giri', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'petrus_giri', 'user', 1, 1, 0),
(83, '', 'Antonetha giri', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'antonetha_giri', 'user', 1, 1, 0),
(84, '', 'Fince giri', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'fince_giri', 'user', 1, 1, 0),
(85, '', 'Ruben semUEL giri', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'ruben_giri', 'user', 1, 1, 0),
(86, '', 'Rusdy theofilus giri', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'rusdy_giri', 'user', 1, 1, 0),
(87, '', 'elisabeth kekado', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'elisabeth_kekado', 'user', 1, 1, 2),
(88, '', 'Kevin kekado', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'kevin_kekado', 'user', 1, 1, 0),
(89, '', 'Riska kekado', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'riska_kekado', 'user', 1, 1, 0),
(90, '', 'erasmus  muskananfolla', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'erasmus_muskananfoll', 'user', 1, 1, 0),
(91, '', 'muskananfola', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'muskananfola_', 'user', 1, 1, 0),
(92, '', 'Edwin muskananfola', 'Oesapa', '0000-00-00', '81239754757', 'Laki-laki', 'Oesapa', 1, '1', 'edwin_muskananfola', 'user', 1, 1, 0),
(93, '', 'Elysa muskananfola', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'elysa_muskananfola', 'user', 1, 1, 0),
(94, '', 'Geraldy muskananfola', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'geraldy_muskananfola', 'user', 1, 1, 0),
(95, '', 'theresia lomiheke', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'theresia_lomiheke', 'user', 1, 1, 2),
(96, '', 'Jefri lomiheke', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'jefri_lomiheke', 'user', 1, 1, 0),
(97, '', 'Herlin lomiheke', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'herlin_lomiheke', 'user', 1, 1, 0),
(98, '', 'Citra lomiheke', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'citra_lomiheke', 'user', 0, 1, 0),
(99, '', 'matheos manafe', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'matheos_manafe', 'user', 1, 1, 1),
(100, '', 'yosinta SHERLY lay', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'yosinta_lay', 'user', 1, 1, 1),
(101, '', 'Cendana ABIGAEL VELOVE manafe', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'cendana_manafe', 'user', 1, 1, 0),
(102, '', 'Cempaka YESERela manafe', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'cempaka_manafe', 'user', 0, 1, 0),
(103, '', 'CATHERINA AURORA MANAFE', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'catherina_manafe', 'user', 1, 1, 0),
(104, '', 'Markus foes', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'markus_foes', 'user', 1, 1, 1),
(105, '', ' meti a. nabuasa', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', ' meti_nabuasa', 'user', 1, 1, 1),
(106, '', 'sandeliber m. foes', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'sandeliber_foes', 'user', 1, 1, 0),
(107, '', 'devid h. foes', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'devid_foes', 'user', 1, 1, 0),
(108, '', 'lidia Olivia foes', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'lidia_foes', 'user', 0, 1, 0),
(109, '', 'keren yetmika foes', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'keren_foes', 'user', 0, 1, 0),
(110, '', 'JOHN PANDIE', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'john_pandie', 'user', 1, 1, 1),
(111, '', 'SWEMPI MUNDE', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'swempi_munde', 'user', 1, 1, 1),
(112, '', 'YEHESKIEL LELTAKAEB', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'yeheskiel_leltakaeb', 'user', 1, 1, 1),
(113, '', 'NORLINA LELTAKEB SONLAY', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'norlina_sonlay', 'user', 1, 1, 1),
(114, '', 'ROSALINA LELTAKAEB', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'rosalina_leltakaeb', 'user', 1, 1, 0),
(115, '', 'APREN LELTAKAEB', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'apren_leltakaeb', 'user', 1, 1, 1),
(116, '', 'ORANCE LAKE', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'orance_lake', 'user', 1, 1, 1),
(117, '', 'NATASYA LELTAKAEB', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'natasya_leltakaeb', 'user', 0, 1, 0),
(118, '', 'JOELA KRISTIN LELTAKAEB', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'joela_leltakaeb', 'user', 0, 1, 0),
(119, '', 'KRISTIN MALLO', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'kristin_mallo', 'user', 1, 1, 2),
(120, '', 'GRACHELLA NHACHA NONO', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'grachella_nono', 'user', 0, 1, 0),
(121, '', ' yohanes a.l. NONO', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', ' yohanes_nono', 'user', 1, 1, 1),
(122, '', 'MERcys l. Mata', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'mercys_mata', 'user', 1, 1, 1),
(123, '', 'ALFA agusto putra NONO', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'alfa_nono', 'user', 0, 1, 0),
(124, '', 'Eunike kurniasari putri nono', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'eunike_nono', 'user', 0, 1, 0),
(125, '', 'ADRIELAWIDYA PUTRI NONO', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'adrielawidya_nono', 'user', 0, 1, 0),
(126, '', 'CLARISSA JUNIA PUTRI NONO ', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'clarissa_nono ', 'user', 0, 1, 0),
(127, '', 'Andreas paseki', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'andreas_paseki', 'user', 1, 1, 1),
(128, '', 'ribka mundE', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'ribka_munde', 'user', 1, 1, 1),
(129, '', 'Elce paseki', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'elce_paseki', 'user', 1, 1, 0),
(130, '', 'Erlita paseki', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'erlita_paseki', 'user', 0, 1, 0),
(131, '', 'Ito pingah', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'ito_pingah', 'user', 1, 1, 1),
(132, '', 'edolvince snae', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'edolvince_snae', 'user', 1, 1, 1),
(133, '', 'Keky narsetia pingah', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'keky_pingah', 'user', 0, 1, 0),
(134, '', 'Listra agripa pingah', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'listra_pingah', 'user', 0, 1, 0),
(135, '', 'Askip ariDance rassy', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'askip_rassy', 'user', 1, 1, 1),
(136, '', 'yulianti halena tarmo', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'yulianti_tarmo', 'user', 1, 1, 1),
(137, '', 'DANIEL ARIEL VALENTINO RASSI', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'daniel_rassi', 'user', 0, 1, 0),
(138, '', 'Jayden febriyan rassy', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'jayden_rassy', 'user', 0, 1, 0),
(139, '', 'Ricky a. Mbeo', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'ricky_mbeo', 'user', 1, 1, 1),
(140, '', ' Irma diana ndun', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', ' irma_ndun', 'user', 1, 1, 1),
(141, '', 'Jolief u. Mbeo', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'jolief_mbeo', 'user', 0, 1, 0),
(142, '', 'ElFIANUS  ledoh', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'elfianus_ledoh', 'user', 1, 1, 1),
(143, '', 'ESTER HARIS ', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'ester_haris ', 'user', 1, 1, 1),
(144, '', 'RANDY YUSUF LEDOH', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'randy_ledoh', 'user', 1, 1, 0),
(145, '', 'Maksi lakapu', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'maksi_lakapu', 'user', 1, 1, 1),
(146, '', 'Yesri antonia mbuik', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'yesri_mbuik', 'user', 1, 1, 1),
(147, '', 'Shelona lakapu', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'shelona_lakapu', 'user', 0, 1, 0),
(148, '', 'Sulastry lakapu', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'sulastry_lakapu', 'user', 0, 1, 0),
(149, '', 'TEOFILUS NGGELAN', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'teofilus_nggelan', 'user', 1, 1, 1),
(150, '', 'ADOLFINA MBALU', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'adolfina_mbalu', 'user', 1, 1, 1),
(151, '', 'REINHARD NGGELAN', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'reinhard_nggelan', 'user', 1, 1, 0),
(152, '', 'Quantania nggelan', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'quantania_nggelan', 'user', 1, 1, 1),
(153, '', 'Leonard nggelan', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'leonard_nggelan', 'user', 0, 1, 1),
(154, '', 'Adek putra soniardy pah', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'adek_pah', 'user', 1, 1, 1),
(155, '', 'Ensy muskananfola', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'ensy_muskananfola', 'user', 1, 1, 1),
(156, '', 'Marvel pah', 'Oesapa', '0000-00-00', '', 'Laki-laki', 'Oesapa', 1, '1', 'marvel_pah', 'user', 0, 1, 0),
(157, '', 'Novariana pah', 'Oesapa', '0000-00-00', '', 'Perempuan', 'Oesapa', 1, '1', 'novariana_pah', 'user', 0, 1, 0),
(158, '', 'Arnold Kase', 'Kupang', '0000-00-00', '82144135311', 'Laki-laki', 'Kupang', 1, '0', 'arnold_kase', 'user', 1, 1, 0),
(159, '', 'Sammy Tangpali', 'Kupang', '0000-00-00', '85333534953', 'Laki-laki', 'Kupang', 1, '0', 'sammy_tangpali', 'user', 1, 1, 0),
(160, '', 'Frengky Tamonob', 'Kupang', '0000-00-00', '81315384211', 'Laki-laki', 'Kupang', 1, '0', 'frengky_tamonob', 'user', 1, 1, 0),
(161, '', 'Nongky Boimau', 'Kupang', '0000-00-00', '82237213249', 'Laki-laki', 'Kupang', 1, '0', 'nongky_boimau', 'user', 1, 1, 0),
(162, '', 'Januarto Tefa', 'Kupang', '0000-00-00', '85253371391', 'Laki-laki', 'Kupang', 1, '0', 'januarto_tefa', 'user', 1, 1, 0),
(163, '', 'Martir Metta', 'Kupang', '0000-00-00', '81238998700', 'Laki-laki', 'Kupang', 1, '0', 'martir_metta', 'user', 1, 1, 0),
(164, '', 'Dedy Tefbana', 'Kupang', '0000-00-00', '82147431793', 'Laki-laki', 'Kupang', 1, '0', 'dedy_tefbana', 'user', 1, 1, 0),
(165, '', 'Riny Betty', 'Kupang', '0000-00-00', '81388315617', 'Perempuan', 'Kupang', 1, '0', 'riny_betty', 'user', 1, 1, 0),
(166, '', 'Dolfy Pah', 'Kupang', '0000-00-00', '82146949785', 'Laki-laki', 'Kupang', 1, '0', 'dolfy_pah', 'user', 1, 1, 0),
(167, '', 'Esterina Bana', 'Kupang', '0000-00-00', '82266234498', 'Perempuan', 'Kupang', 1, '0', 'esterina_bana', 'user', 1, 1, 0),
(168, '', 'Sukma Sanu', 'Kupang', '0000-00-00', '82218516184', 'Perempuan', 'Kupang', 1, '0', 'sukma_sanu', 'user', 1, 1, 0),
(169, '', 'Fherdy Bana', 'Kupang', '0000-00-00', '85253391096', 'Laki-laki', 'Kupang', 1, '0', 'fherdy_bana', 'user', 1, 1, 0),
(170, '', 'Nonny Mapada', 'Kupang', '0000-00-00', '81236747648', 'Perempuan', 'Kupang', 1, '0', 'nonny_mapada', 'user', 1, 1, 0),
(171, '', 'Sony Mapada', 'Kupang', '0000-00-00', '85238800741', 'Laki-laki', 'Kupang', 1, '0', 'sony_mapada', 'user', 1, 1, 0),
(172, '', 'Leny Penton', 'Kupang', '0000-00-00', '81239762401', 'Perempuan', 'Kupang', 1, '0', 'leny_penton', 'user', 1, 1, 0),
(173, '', 'Diana Penton', 'Kupang', '0000-00-00', '81393723836', 'Perempuan', 'Kupang', 1, '0', 'diana_penton', 'user', 1, 1, 0),
(174, '', 'Elda Lau', 'Kupang', '0000-00-00', '85348575901', 'Laki-laki', 'Kupang', 1, '0', 'elda_lau', 'user', 1, 1, 0),
(175, '', 'Ikhe Adu', 'Kupang', '0000-00-00', '81339848617', 'Perempuan', 'Kupang', 1, '0', 'ikhe_adu', 'user', 1, 1, 0),
(176, '', 'Priska Sanu', 'Kupang', '0000-00-00', '82236418414', 'Perempuan', 'Kupang', 1, '0', 'priska_sanu', 'user', 1, 1, 0),
(177, '', 'Shanel Tchung', 'Kupang', '0000-00-00', '82145696404', 'Perempuan', 'Kupang', 1, '0', 'shanel_tchung', 'user', 1, 1, 0),
(178, '', 'Mayang Febriani', 'Kupang', '0000-00-00', '82247758871', 'Perempuan', 'Kupang', 1, '0', 'mayang_febriani', 'user', 1, 1, 0),
(179, '', 'Yanse Noma', 'Kupang', '0000-00-00', '85337386100', 'Laki-laki', 'Kupang', 1, '0', 'yanse_noma', 'user', 1, 1, 0),
(180, '', 'Asyer Panab', 'Kupang', '0000-00-00', '', 'Laki-laki', 'Kupang', 1, '0', 'asyer_panab', 'user', 1, 1, 0),
(181, '', 'Gerry Lenggu', 'Kupang', '0000-00-00', '', 'Laki-laki', 'Kupang', 1, '0', 'gerry_lenggu', 'user', 1, 1, 0),
(182, '', 'Arman Wicaksono', 'Kupang', '0000-00-00', '81333360928', 'Laki-laki', 'Kupang', 2, '0', 'arman_wicaksono', 'user', 1, 1, 0),
(183, '', 'Jovantri Tamonob', 'Kupang', '0000-00-00', '82144484407', 'Laki-laki', 'Kupang', 1, '0', 'jovantri_tamonob', 'user', 1, 1, 0),
(184, '', 'Rhyn Laumau', 'Kupang', '0000-00-00', '81338197791', 'Laki-laki', 'Kupang', 1, '0', 'rhyn_laumau', 'user', 1, 1, 0),
(185, '', 'Trivena Nasa', 'Kupang', '0000-00-00', '82247860173', 'Perempuan', 'Kupang', 1, '0', 'trivena_nasa', 'user', 1, 1, 0),
(186, '', 'Dewi Tananggau', 'Kupang', '0000-00-00', '85829230932', 'Perempuan', 'Kupang', 1, '0', 'dewi_tananggau', 'user', 1, 1, 0),
(187, '', 'Selvia Aurelia Taetetu', 'Kupang', '0000-00-00', '81353139213', 'Perempuan', 'Kupang', 1, '0', 'selvia_taetetu', 'user', 1, 1, 0),
(188, '', 'Risna Mbuik', 'Kupang', '0000-00-00', '8226622645', 'Perempuan', 'Kupang', 1, '0', 'risna_mbuik', 'user', 1, 1, 0),
(189, '', 'Billy Sumaa', 'Kupang', '0000-00-00', '82144867200', 'Laki-laki', 'Kupang', 1, '0', 'billy_sumaa', 'user', 1, 1, 0),
(190, '', 'Nona Lay', 'Kupang', '0000-00-00', '', 'Perempuan', 'Kupang', 1, '0', 'nona_lay', 'user', 1, 1, 0),
(191, '', 'Miving Silvana Kase', 'Kupang', '0000-00-00', '81339772797', 'Perempuan', 'Kupang', 1, '0', 'miving_kase', 'user', 1, 1, 0),
(192, '', 'Median Tualaka', 'Kupang', '0000-00-00', '81208013618', 'Laki-laki', 'Kupang', 1, '0', 'median_tualaka', 'user', 1, 1, 0),
(193, '', 'Valen Tulle', 'Kupang', '0000-00-00', '', 'Laki-laki', 'Kupang', 1, '0', 'valen_tulle', 'user', 1, 1, 0),
(194, '', 'Frince Berpelai', 'Kupang', '0000-00-00', '85738344549', 'Laki-laki', 'Kupang', 1, '0', 'frince_berpelai', 'user', 1, 1, 0),
(195, '', 'Novita Kefi', 'Kupang', '0000-00-00', '82151218533', 'Perempuan', 'Kupang', 1, '0', 'novita_kefi', 'user', 1, 1, 0),
(196, '', 'Elsi Banoet', 'Kupang', '0000-00-00', '81339673622', 'Perempuan', 'Kupang', 1, '0', 'elsi_banoet', 'user', 1, 1, 0),
(197, '', 'Wulantri Selan', 'Kupang', '0000-00-00', '81146673600', 'Perempuan', 'Kupang', 1, '0', 'wulantri_selan', 'user', 1, 1, 0),
(198, '', 'Yeni Lasfeto', 'Kupang', '0000-00-00', '81353087359', 'Perempuan', 'Kupang', 1, '0', 'yeni_lasfeto', 'user', 1, 1, 0),
(199, '', 'Putri Permata Lay', 'Kupang', '0000-00-00', '82144918298', 'Perempuan', 'Kupang', 1, '0', 'putri_lay', 'user', 1, 1, 0),
(200, '', 'Reny Lubu', 'Kupang', '0000-00-00', '85333406186', 'Perempuan', 'Kupang', 1, '0', 'reny_lubu', 'user', 1, 1, 0),
(201, '', 'Renzon Lopo', 'Kupang', '0000-00-00', '82144651387', 'Laki-laki', 'Kupang', 1, '0', 'renzon_lopo', 'user', 1, 1, 0),
(202, '', 'Yusuf Modokh', 'Kupang', '0000-00-00', '81337489085', 'Laki-laki', 'Kupang', 1, '0', 'yusuf_modokh', 'user', 1, 1, 0),
(203, '', 'Anggelia Tjangkung', 'Kupang', '0000-00-00', '82261797604', 'Perempuan', 'Kupang', 1, '0', 'anggelia_tjangkung', 'user', 1, 1, 0),
(204, '', 'Monick Tjangkung', 'Kupang', '0000-00-00', '85237421950', 'Perempuan', 'Kupang', 1, '0', 'monick_tjangkung', 'user', 1, 1, 0),
(205, '', 'Irene Tjangkung', 'Kupang', '0000-00-00', '82235916537', 'Perempuan', 'Kupang', 1, '0', 'irene_tjangkung', 'user', 1, 1, 0),
(206, '', 'Agan Hans', 'Kupang', '0000-00-00', '85737831544', 'Laki-laki', 'Kupang', 1, '0', 'agan_hans', 'user', 1, 1, 0),
(207, '', 'Apris Nalle', 'Kupang', '0000-00-00', '81238153442', 'Laki-laki', 'Kupang', 1, '0', 'apris_nalle', 'user', 1, 1, 0),
(208, '', 'Desri Tohik', 'Kupang', '0000-00-00', '81237046928', 'Perempuan', 'Kupang', 1, '0', 'desri_tohik', 'user', 1, 1, 0),
(209, '', 'Tefi Manubulu', 'Kupang', '0000-00-00', '82145166551', 'Perempuan', 'Kupang', 1, '0', 'tefi_manubulu', 'user', 1, 1, 0),
(210, '', 'Marlince Lendi', 'Kupang', '0000-00-00', '81237629655', 'Perempuan', 'Kupang', 1, '0', 'marlince_lendi', 'user', 1, 1, 0),
(211, '', 'Serly Teftae', 'Kupang', '0000-00-00', '81282530601', 'Perempuan', 'Kupang', 1, '0', 'serly_teftae', 'user', 1, 1, 0),
(212, '', 'Venty Nara', 'Kupang', '0000-00-00', '82214328839', 'Perempuan', 'Kupang', 1, '0', 'venty_nara', 'user', 1, 1, 0),
(213, '', 'Seprianto Nenoan', 'Kupang', '0000-00-00', '82145299144', 'Laki-laki', 'Kupang', 1, '0', 'seprianto_nenoan', 'user', 1, 1, 0),
(214, '', 'Mario Tefa', 'Kupang', '0000-00-00', '82236486429', 'Laki-laki', 'Kupang', 1, '0', 'mario_tefa', 'user', 1, 1, 0),
(215, '', 'Selfi Ndun', 'Kupang', '0000-00-00', '81237360446', 'Perempuan', 'Kupang', 1, '0', 'selfi_ndun', 'user', 1, 1, 0),
(216, '', 'Lili Nomleni', 'Kupang', '0000-00-00', '85738005938', 'Perempuan', 'Kupang', 1, '0', 'lili_nomleni', 'user', 1, 1, 0),
(217, '', 'Desry Theon', 'Kupang', '0000-00-00', '81145509525', 'Perempuan', 'Kupang', 1, '0', 'desry_theon', 'user', 1, 1, 0),
(218, '', 'Gregorius Balaputra', 'Kupang', '0000-00-00', '81237139451', 'Laki-laki', 'Kupang', 1, '0', 'gregorius_balaputra', 'user', 1, 1, 0),
(219, '', 'Arista K', 'Kupang', '0000-00-00', '81234511293', 'Perempuan', 'Kupang', 1, '0', 'arista_k', 'user', 1, 1, 0),
(220, '', 'Marlin Ndaong', 'Kupang', '0000-00-00', '81315890275', 'Perempuan', 'Kupang', 1, '0', 'marlin_ndaong', 'user', 1, 1, 0),
(221, '', 'Aryanto Benu', 'Kupang', '0000-00-00', '81238763735', 'Laki-laki', 'Kupang', 1, '0', 'aryanto_benu', 'user', 1, 1, 0),
(222, '', 'Sepri Punuf', 'Kupang', '0000-00-00', '81236774688', 'Perempuan', 'Kupang', 1, '0', 'sepri_punuf', 'user', 1, 1, 0),
(223, '', 'Ruth Mone Ludji', 'Kupang', '0000-00-00', '82236616769', 'Laki-laki', 'Kupang', 1, '0', 'ruth_ludji', 'user', 1, 1, 0),
(224, '', 'Sandri Upu', 'Kupang', '0000-00-00', '81237138685', 'Laki-laki', 'Kupang', 1, '0', 'sandri_upu', 'user', 1, 1, 0),
(225, '', 'Lani Laitabun', 'Kupang', '0000-00-00', '81339528012', 'Laki-laki', 'Kupang', 1, '0', 'lani_laitabun', 'user', 1, 1, 0),
(226, '', 'Jesica Dasilva', 'Kupang', '0000-00-00', '82145358343', 'Perempuan', 'Kupang', 1, '0', 'jesica_dasilva', 'user', 1, 1, 0),
(227, '', 'Desnalia Seran', 'Kupang', '0000-00-00', '82145710080', 'Perempuan', 'Kupang', 1, '0', 'desnalia_seran', 'user', 1, 1, 0),
(228, '', 'Yetri Taniu', 'Kupang', '0000-00-00', '82144996990', 'Laki-laki', 'Kupang', 1, '0', 'yetri_taniu', 'user', 1, 1, 0),
(229, '', 'Desri Teon', 'Kupang', '0000-00-00', '82145173053', 'Perempuan', 'Kupang', 1, '0', 'desri_teon', 'user', 1, 1, 0),
(230, '', 'Serly Fanggidae', 'Kupang', '0000-00-00', '82339632644', 'Perempuan', 'Kupang', 1, '0', 'serly_fanggidae', 'user', 1, 1, 0),
(231, '', 'Dune Beis', 'Kupang', '0000-00-00', '85333004986', 'Laki-laki', 'Kupang', 1, '0', 'dune_beis', 'user', 1, 1, 0),
(232, '', 'Echa Beis', 'Kupang', '0000-00-00', '85333004986', 'Perempuan', 'Kupang', 1, '0', 'echa_beis', 'user', 1, 1, 0),
(233, '', 'Musa Karjeni', 'Kupang', '0000-00-00', '82147321449', 'Laki-laki', 'Kupang', 1, '0', 'musa_karjeni', 'user', 1, 1, 0),
(234, '', 'Christine Balo', 'Kupang', '0000-00-00', '82373599600', 'Laki-laki', 'Kupang', 1, '0', 'christine_balo', 'user', 1, 1, 0),
(235, '', 'Willy Mbeo', 'Kupang', '0000-00-00', '82235492346', 'Laki-laki', 'Kupang', 1, '0', 'willy_mbeo', 'user', 1, 1, 0),
(236, '', 'Chorgy Henukh', 'Kupang', '0000-00-00', '81326729440', 'Laki-laki', 'Kupang', 1, '0', 'chorgy_henukh', 'user', 1, 1, 0),
(237, '', 'Andro Masae', 'Kupang', '0000-00-00', '82235655815', 'Laki-laki', 'Kupang', 1, '0', 'andro_masae', 'user', 1, 1, 0),
(238, '', 'Sarah Dedenu', 'Kupang', '0000-00-00', '82144479268', 'Laki-laki', 'Kupang', 1, '0', 'sarah_dedenu', 'user', 1, 1, 0),
(239, '', 'Lukas Lobang', 'Kupang', '0000-00-00', '82144635575', 'Laki-laki', 'Kupang', 1, '0', 'lukas_lobang', 'user', 1, 1, 0),
(240, '', 'Johan Ibrani Togatorop', 'Kupang', '0000-00-00', '87851031175', 'Laki-laki', 'Kupang', 1, '0', 'johan_togatorop', 'user', 1, 1, 0),
(241, '', 'Penina Besi', 'Kupang', '0000-00-00', '81377312294', 'Laki-laki', 'Kupang', 1, '0', 'penina_besi', 'user', 1, 1, 0),
(242, '', 'Franklyn Malelak', 'Kupang', '0000-00-00', '82341301029', 'Laki-laki', 'Kupang', 1, '0', 'franklyn_malelak', 'user', 1, 1, 0),
(243, '', 'Dendy Lalang', 'Kupang', '0000-00-00', '81246960675', 'Laki-laki', 'Kupang', 1, '0', 'dendy_lalang', 'user', 1, 1, 0),
(244, '', 'Jeni Rohani Dethan', 'Kupang', '0000-00-00', '81235609033', 'Perempuan', 'Kupang', 1, '0', 'jeni_dethan', 'user', 1, 1, 0),
(245, '', 'Ima Laos', 'Kupang', '0000-00-00', '82247027109', 'Perempuan', 'Kupang', 1, '0', 'ima_laos', 'user', 1, 1, 0),
(246, '', 'Noly Liunome', 'Kupang', '0000-00-00', '81338458614', 'Laki-laki', 'Kupang', 1, '0', 'noly_liunome', 'user', 1, 1, 0),
(247, '', 'Rany Dethan', 'Kupang', '0000-00-00', '', 'Perempuan', 'Kupang', 1, '0', 'rany_dethan', 'user', 1, 1, 0),
(248, '', 'Bety', 'Kupang', '0000-00-00', '82146955641', 'Perempuan', 'Kupang', 1, '0', 'bety_', 'user', 1, 1, 0),
(249, '', 'Yulen Modok', 'Kupang', '0000-00-00', '82144501486', 'Perempuan', 'Kupang', 1, '0', 'yulen_modok', 'user', 1, 1, 0),
(250, '', 'Citra Haning', 'Kupang', '0000-00-00', '85333882152', 'Perempuan', 'Kupang', 1, '0', 'citra_haning', 'user', 1, 1, 0),
(251, '', 'Naomi Pah', 'Kupang', '0000-00-00', '81214781425', 'Laki-laki', 'Kupang', 1, '0', 'naomi_pah', 'user', 1, 1, 0),
(252, '', 'Elton Mako', 'Kupang', '0000-00-00', '81339783728', 'Laki-laki', 'Kupang', 1, '0', 'elton_mako', 'user', 1, 1, 0),
(253, '', 'Elin Susilo', 'Kupang', '0000-00-00', '81384167695', 'Perempuan', 'Kupang', 1, '0', 'elin_susilo', 'user', 1, 1, 0),
(254, '', 'Keyzia Saudale', 'Kupang', '0000-00-00', '85337684100', 'Perempuan', 'Kupang', 1, '0', 'keyzia_saudale', 'user', 1, 1, 0),
(255, '', 'Stiven Boymau', 'Kupang', '0000-00-00', '82214339252', 'Laki-laki', 'Kupang', 1, '0', 'stiven_boymau', 'user', 1, 1, 0),
(256, '', 'Irene Pong', 'Kupang', '0000-00-00', '82147247486', 'Perempuan', 'Kupang', 1, '0', 'irene_pong', 'user', 1, 1, 0),
(257, '', 'Delvi Nau', 'Kupang', '0000-00-00', '81246845060', 'Perempuan', 'Kupang', 1, '0', 'delvi_nau', 'user', 1, 1, 0),
(258, '', 'Susanti A Otemusu', 'Kupang', '0000-00-00', '82146996619', 'Perempuan', 'Kupang', 1, '0', 'susanti_otemusu', 'user', 1, 1, 0),
(259, '', 'Brenton Kadek', 'Kupang', '0000-00-00', '81246745833', 'Laki-laki', 'Kupang', 1, '0', 'brenton_kadek', 'user', 1, 1, 0),
(260, '', 'Yordy Benu', 'Kupang', '0000-00-00', '81217518252', 'Laki-laki', 'Kupang', 1, '0', 'yordy_benu', 'user', 1, 1, 0),
(261, '', 'Pedro Nalle', 'Kupang', '0000-00-00', '', 'Laki-laki', 'Kupang', 1, '0', 'pedro_nalle', 'user', 1, 1, 0),
(262, '', 'Elrido kanni', 'Kupang', '0000-00-00', '81236194771', 'Laki-laki', 'Kupang', 1, '0', 'elrido_kanni', 'user', 1, 1, 0),
(263, '', 'Ariin Zacharias', 'Kupang', '0000-00-00', '81236421847', 'Laki-laki', 'Kupang', 1, '0', 'ariin_zacharias', 'user', 1, 1, 0),
(264, '', 'Riska S Lau', 'Kupang', '0000-00-00', '85216062339', 'Perempuan', 'Kupang', 1, '0', 'riska_lau', 'user', 1, 1, 0),
(265, '', 'Agripka Punuf', 'Kupang', '0000-00-00', '81315697192', 'Perempuan', 'Kupang', 1, '0', 'agripka_punuf', 'user', 1, 1, 0),
(266, '', 'Henoch R Faot', 'Kupang', '0000-00-00', '81236071773', 'Laki-laki', 'Kupang', 1, '0', 'henoch_faot', 'user', 1, 1, 0);

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
(1, 'admin', 'admin', 'aryo', 'Intel', 'admin'),
(2, 'pendeta', 'pendeta', 'pak pendeta', 'Gembala', 'gembala'),
(3, 'arman', 'arman', 'arman', 'Bendahara', 'member');

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
(1, '123xxx', '2023-10-30', 'GPDI1', 'Surat xxx', '2023-10-30_GPDI1.pdf'),
(2, '123/qwer/9', '2023-11-01', 'arman', 'baptis', '2023-11-01_arman.pdf');

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
(2, '123a/I.18/10/2023', '2023-10-29', '2023-10-30', 'Aryo', 'Surat Undangan', '2023-10-29_Aryo.pdf');

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
(1, 182);

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
(1, 'Warta Mimbar', '2023-10-22', '<h1>test</h1>\r\n<p>sasasasa</p>');

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT for table `baptis`
--
ALTER TABLE `baptis`
  MODIFY `id_baptis` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id_disposisi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `jemaat`
--
ALTER TABLE `jemaat`
  MODIFY `id_jemaat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=267;
--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
  MODIFY `id_pengguna` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `penyerahan`
--
ALTER TABLE `penyerahan`
  MODIFY `id_penyerahan` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `pernikahan`
--
ALTER TABLE `pernikahan`
  MODIFY `id_pernikahan` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `suratkeluar`
--
ALTER TABLE `suratkeluar`
  MODIFY `id_surat_keluar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `suratmasuk`
--
ALTER TABLE `suratmasuk`
  MODIFY `id_surat_masuk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `wartajemaat`
--
ALTER TABLE `wartajemaat`
  MODIFY `id_warta` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
