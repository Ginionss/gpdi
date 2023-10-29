-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 25 Okt 2023 pada 14.28
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
  `nik` int(16) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `tanggal_baptis` date DEFAULT NULL,
  `nama_pendeta` varchar(50) DEFAULT NULL,
  `file_kartu_keluarga` varchar(50) DEFAULT NULL,
  `file_akta_kelahiran` varchar(50) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `ketarangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `disposisi`
--

CREATE TABLE `disposisi` (
  `id_diposisi` int(5) NOT NULL,
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
  `nik` int(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `operator`
--

CREATE TABLE `operator` (
  `id_pengguna` int(5) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `hak_akses` enum('admin','pengguna') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `operator`
--

INSERT INTO `operator` (`id_pengguna`, `username`, `password`, `jabatan`, `hak_akses`) VALUES
(1, 'admin', 'admin', 'admin', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyerahan`
--

CREATE TABLE `penyerahan` (
  `id_penyerahan` int(5) NOT NULL,
  `nik` int(16) NOT NULL,
  `nama_ayah` varchar(50) NOT NULL,
  `nama_ibu` varchar(50) NOT NULL,
  `tanggal_penyerahan` date DEFAULT NULL,
  `nama_pendeta` varchar(50) DEFAULT NULL,
  `file_kartu_keluarga` varchar(50) DEFAULT NULL,
  `file_akta-kelahiran` varchar(50) DEFAULT NULL,
  `status` varchar(15) DEFAULT NULL,
  `keterangan` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pernikahan`
--

CREATE TABLE `pernikahan` (
  `id_pernikahan` int(5) NOT NULL,
  `nik_pria` int(16) NOT NULL,
  `nik_wanita` int(16) NOT NULL,
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
  `file_surat_keluar` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `tujuan` varchar(35) NOT NULL,
  `perihal` varchar(35) NOT NULL,
  `file_surat_masuk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(5) NOT NULL,
  `nik` int(16) NOT NULL,
  `password` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  ADD PRIMARY KEY (`id_diposisi`);

--
-- Indexes for table `jemaat`
--
ALTER TABLE `jemaat`
  ADD PRIMARY KEY (`nik`);

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
  MODIFY `id_diposisi` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `operator`
--
ALTER TABLE `operator`
  MODIFY `id_pengguna` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `pernikahan`
--
ALTER TABLE `pernikahan`
  MODIFY `id_pernikahan` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `suratkeluar`
--
ALTER TABLE `suratkeluar`
  MODIFY `id_surat_keluar` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `suratmasuk`
--
ALTER TABLE `suratmasuk`
  MODIFY `id_surat_masuk` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `wartajemaat`
--
ALTER TABLE `wartajemaat`
  MODIFY `id_warta` int(5) NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
