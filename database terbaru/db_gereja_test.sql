-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25 Nov 2023 pada 14.03
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

--
-- Dumping data untuk tabel `baptis`
--

INSERT INTO `baptis` (`id_baptis`, `no_surat`, `tanggal_request`, `nik`, `nama_ayah`, `nama_ibu`, `tanggal_baptis`, `nama_pendeta`, `file_kartu_keluarga`, `file_akta_kelahiran`, `status`, `keterangan`) VALUES
(1, '11', '2023-11-18', '6311020205990001', 'Hadi Sunyoto', 'Rohana', '2023-11-26', 'Pdt. jacky karawisan', 'Baptis_6311020205990001.pdf', 'Baptis_6311020205990001.pdf', '0', 'mau baptis'),
(2, '13', '2023-11-18', '124567891234567', 'Ruben willa', 'MARIA willa Ludji', '2023-11-26', 'Pdt. jacky karawisan', 'Baptis_124567891234567.pdf', 'Baptis_124567891234567.pdf', '2', 'mau baptis');

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
(1, 2, 'tolong di tindak lanjuti', '2', '3', '2023-11-05'),
(2, 2, 'surat undanngan GPdI ', '1', '3', '2023-11-18'),
(3, 3, '', '1', '', '2023-11-19'),
(4, 2, 'poopkopkop', '1', '2', '2023-11-19'),
(5, 2, 'surat undanngan GPdI baru', '1', '3', '2023-11-19'),
(6, 2, 'poopkopkop', '1', '2', '2023-11-19'),
(7, 4, 'surat undanngan GPdI filladelfia', '1', '2', '2023-11-20'),
(8, 5, 'surat undanngan GPdI carmel', '1', '2', '2023-11-20'),
(9, 6, 'surat ', '1', '', '2023-11-20'),
(10, 2, 'sebarkan', '2', '1', '2023-11-20');

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
(2, '2222222222222222', 'jefry tresia saudale dethan', 'Lasiana', '1994-06-08', '', 'Perempuan', '<p>Lasiana</p>', 2, '1', 'jefry_dethan', 'user', 1, 1, 1),
(3, '3333333333333333', 'jefta a. saudale', 'Lasiana', '0000-00-00', '', 'Laki-laki', '<p>Lasiana</p>', 2, '1', 'jefta_saudale', 'user', 1, 1, 0),
(4, '4444444444444444', 'Debora saudale', 'Lasiana', '2014-06-10', '', 'Perempuan', '<p>Lasiana</p>', 2, '1', 'debora_saudale', 'user', 1, 1, 0),
(5, '5555555555555555', 'apryana saudale', 'Lasiana', '0000-00-00', '', 'Perempuan', '<p>Lasiana</p>', 2, '1', 'apryana_saudale', 'user', 1, 1, 0),
(6, '6666666666666666', 'Albert Fangidae', 'Lasiana', '0000-00-00', '', 'Laki-laki', '<p>Lasiana</p>', 2, '1', 'albert_fangidae', 'user', 1, 1, 1),
(7, '7777777777777777', 'ferderika  fangidae ndun', 'Lasiana', '0000-00-00', '', 'Perempuan', '<p>Lasiana</p>', 2, '1', 'ferderika_ndun', 'user', 1, 1, 1),
(8, '8888888888888888', 'Astrid Fangidae', 'Lasiana', '0000-00-00', '85239908148', 'Perempuan', '<p>Lasiana</p>', 2, '1', 'astrid_fangidae', 'user', 1, 1, 0),
(9, '9999999999999999', 'Raymond Fangidae', 'Lasiana', '0000-00-00', '', 'Laki-laki', '<p>Lasiana</p>', 2, '1', 'raymond_fangidae', 'user', 1, 1, 0),
(10, '0000000000000000', 'Ferdy Fangidae', 'Lasiana', '0000-00-00', '', 'Laki-laki', '<p>Lasiana</p>', 2, '1', 'ferdy_fangidae', 'user', 1, 1, 0),
(11, '1212121212121212', 'Ester  Fangidae', 'Lasiana', '0000-00-00', '', 'Perempuan', '<p>Lasiana</p>', 2, '1', 'ester _fangidae', 'user', 1, 1, 0),
(12, '1414141414141414', 'Debby Fangidae', 'Lasiana', '0000-00-00', '', 'Perempuan', '<p>Lasiana</p>', 2, '1', 'debby_fangidae', 'user', 1, 1, 0),
(13, '1313131313131313', 'Adolof  Song go', 'Oesapa', '0000-00-00', '', 'Laki-laki', '<p>Oesapa</p>', 2, '1', 'adolof_go', 'user', 1, 1, 1),
(14, '1515151515151515', 'imelda go fangGidae', 'Oesapa', '0000-00-00', '', 'Perempuan', '<p>Oesapa</p>', 2, '1', 'imelda_fanggidae', 'user', 1, 1, 1),
(30, '9191919191919191', 'Yunus malelak', 'Oesapa', '1975-01-06', '81353841075', 'Laki-laki', '<p>Oesapa</p>', 2, '1', 'yunus_malelak', 'user', 1, 1, 0),
(31, '1010101010101010', 'agustina malelak', 'Oesapa', '0000-00-00', '82237852813', 'Perempuan', '<p>Oesapa</p>', 2, '1', 'agustina_malelak', 'user', 1, 1, 0),
(34, '7171717171717171', 'Verensi yana malelak', 'Oesapa', '1999-08-20', '081234567890', 'Perempuan', '<p>Oesapa</p>', 2, '1', 'verensi_malelak', 'user', 0, 0, 0),
(42, '6161616161616161', 'Ruben willa', 'Oesapa', '1964-06-24', '082345678912', 'Laki-laki', '<p>Oesapa</p>', 1, '1', 'ruben_willa', 'user', 1, 1, 1),
(43, '8181818181818181', 'MARIA willa Ludji', 'Oesapa', '1975-01-28', '85738196419', 'Perempuan', '<p>Oesapa</p>', 1, '1', 'maria_ludji', 'user', 1, 1, 1),
(45, '124567891234567', 'KEFLIN REGINA WILLA', 'Oesapa', '0000-00-00', '85238097729', 'Perempuan', '<p>Oesapa</p>', 2, '1', 'keflin_willa', 'user', 1, 0, 1),
(52, '1233211233211231', 'Gracia trivena karawisan', 'Oesapa', '0000-00-00', '81238728268', 'Perempuan', '<p>Oesapa</p>', 1, '1', 'gracia_karawisan', 'user', 1, 1, 0),
(158, '2121212121212121', 'Arnold Kase', 'Kupang', '0000-00-00', '82144135311', 'Laki-laki', '<p>Kupang</p>', 2, '0', 'arnold_kase', 'user', 1, 1, 0),
(159, '6161616161616161', 'Sammy Tangpali', 'Kupang', '0000-00-00', '85333534953', 'Laki-laki', '<p>Kupang</p>', 1, '0', 'sammy_tangpali', 'user', 1, 1, 0),
(163, '5151515151515151', 'Martir Metta', 'Kupang', '0000-00-00', '81238998700', 'Laki-laki', '<p>Kupang</p>', 2, '0', 'martir_metta', 'user', 1, 1, 0),
(166, '3131313131313131', 'Dolfy Pah', 'Kupang', '0000-00-00', '82146949785', 'Laki-laki', '<p>Kupang</p>', 2, '0', 'dolfy_pah', 'user', 1, 1, 0),
(168, '4141414141414141', 'Sukma Sanu', 'Kupang', '0000-00-00', '82218516184', 'Perempuan', '<p>Kupang</p>', 2, '0', 'sukma_sanu', 'user', 1, 1, 0),
(182, '6311020205990001', 'Arman Wicaksono', 'Kupang', '1999-05-02', '081333360928', 'Laki-laki', '<p>Kupang</p>', 2, '0', 'arman_wicaksono', 'user', 1, 0, 1),
(267, '1231231231231231', 'Rohana', 'Tabuan', '1976-06-18', '081333360928', 'Perempuan', 'Tabuan', 1, '0', 'rohana', 'user', 1, 1, 1),
(268, '1234123412341234', 'Hadi Sunyoto', 'Tabuan', '1951-05-20', '081333360928', 'Laki-laki', 'tabuan', 1, '0', 'hadi_sunyoto', 'user', 1, 1, 1),
(273, '1234561234561234', 'Richard Waang', 'Alor', '2023-11-15', '081333360928', 'Laki-laki', '<p>oebobo</p>', 2, '0', 'ricad_waang', 'user', 0, 0, 0);

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

--
-- Dumping data untuk tabel `penyerahan`
--

INSERT INTO `penyerahan` (`id_penyerahan`, `no_surat`, `tanggal_request`, `nik`, `nama_ayah`, `nama_ibu`, `tanggal_penyerahan`, `nama_pendeta`, `file_kartu_keluarga`, `file_akta_kelahiran`, `status`, `keterangan`) VALUES
(1, '16', '2023-11-18', '2121212121212121', 'Arman Wicaksono', 'KEFLIN REGINA WILLA', '2023-11-26', 'Pdt. Arman Wicaksono', 'penyerahan_2121212121212121.pdf', 'penyerahan_2121212121212121.pdf', '1', 'oke'),
(2, NULL, '2023-11-18', '5151515151515151', 'Arman Wicaksono', 'KEFLIN REGINA WILLA', NULL, NULL, 'penyerahan_5151515151515151.pdf', 'penyerahan_5151515151515151.pdf', '0', NULL),
(5, NULL, '2023-11-19', '1234561234561234', 'Arman Wicaksono', 'KEFLIN REGINA WILLA', NULL, NULL, 'Penyerahan_1234561234561234.pdf', 'Penyerahan_1234561234561234.pdf', '0', NULL);

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

--
-- Dumping data untuk tabel `pernikahan`
--

INSERT INTO `pernikahan` (`id_pernikahan`, `no_surat`, `tanggal_request`, `nik_pria`, `nik_wanita`, `tanggal_pernikahan`, `nama_pendeta`, `status`, `keterangan`) VALUES
(3, NULL, '2023-11-19', '6311020205990001', '1233211233211231', NULL, NULL, '0', NULL);

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
(2, '123/qwer/9', '2023-11-01', 'arman', 'baptis', '2023-11-01_arman.pdf'),
(3, '123/qwer/11', '2023-11-19', 'keflin', 'surat undangan natal', '2023-11-19_keflin.pdf');

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
(2, '123a/I.18/10/2023', '2023-10-29', '2023-10-30', 'Aryo', 'Surat Undangan', '2023-10-29_Aryo.pdf'),
(3, '122a/I.12/12/2023', '2023-11-24', '2023-12-09', 'richard', 'surat undangan fellowship', '2023-11-24_richard.pdf'),
(4, '123B/I.19/10/2023', '2023-11-20', '2023-11-22', 'GPdI filadelfia', 'surat undangan fellowship', '2023-11-20_GPdI filadelfia.pdf'),
(5, '123B/I.20/10/2023', '2023-11-21', '2023-11-25', 'GPdI carmel', 'surat undangan natal bersama', '2023-11-21_GPdI carmel.pdf'),
(7, '123B/I.22/10/2023', '2023-12-01', '2023-12-09', 'arman', 'surat undangan ibadah bersama', '2023-12-01_arman.pdf');

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
(1, 182),
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
(25, 0);

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
(1, 'Warta Mimbar', '2023-10-22', '<h1>test</h1>\r\n<p>sasasasa</p>'),
(2, 'minggu ke 3', '2023-11-19', '<p>123344</p>'),
(3, 'minggu ke 4', '2023-11-26', '<p>12323</p>'),
(4, 'minggu ke-1 desember', '2023-12-03', '<p>1234</p>'),
(5, 'minggu ke-2', '2023-12-10', '<p>1234456</p>'),
(6, 'minggu ke-3', '2023-12-17', '<p>jemaat</p>'),
(7, 'minggu ke-4', '2023-12-24', '<p>tentang jemaatt</p>'),
(8, 'minggu ke-4', '2023-12-31', '<p>akhir tahun</p>'),
(9, 'minggu ke-1 januari', '2024-01-07', '<p>awal tahun</p>');

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
  MODIFY `id_baptis` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `disposisi`
--
ALTER TABLE `disposisi`
  MODIFY `id_disposisi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `jemaat`
--
ALTER TABLE `jemaat`
  MODIFY `id_jemaat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=277;
--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
  MODIFY `id_pengguna` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `penyerahan`
--
ALTER TABLE `penyerahan`
  MODIFY `id_penyerahan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `pernikahan`
--
ALTER TABLE `pernikahan`
  MODIFY `id_pernikahan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `suratkeluar`
--
ALTER TABLE `suratkeluar`
  MODIFY `id_surat_keluar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `suratmasuk`
--
ALTER TABLE `suratmasuk`
  MODIFY `id_surat_masuk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `wartajemaat`
--
ALTER TABLE `wartajemaat`
  MODIFY `id_warta` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
