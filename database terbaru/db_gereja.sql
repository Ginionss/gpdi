-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 31 Okt 2023 pada 15.41
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
  `tanggal_request` date NOT NULL,
  `nik` varchar(16) NOT NULL,
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
  `nik` varchar(16) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tempat_lahir` varchar(20) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `no_hp` varchar(12) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jemaat`
--

INSERT INTO `jemaat` (`nik`, `nama`, `tempat_lahir`, `tanggal_lahir`, `no_hp`, `jenis_kelamin`, `alamat`) VALUES
('111111', 'Yolanda Meiliani Mutiara', 'Bajawa', '2023-06-03', '123', 'Perempuan', 'Bajawa'),
('123123', 'Arman Wicaksono', 'kalimantan', '2023-03-01', '34567', 'Laki-laki', 'Kalimantan'),
('123456', 'Keflin Regina Willa', 'Oseapa', '2023-05-01', '678', 'Perempuan', 'Oesapa'),
('5311022409000001', 'Aryo Ronaldo Hamba Pulu', 'test', '2023-10-25', '123', 'Laki-laki', 'sumba');

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
(2, 'pendeta', 'pendeta', 'individu', 'Gembala', 'gembala');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyerahan`
--

CREATE TABLE `penyerahan` (
  `id_penyerahan` int(5) NOT NULL,
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

INSERT INTO `penyerahan` (`id_penyerahan`, `tanggal_request`, `nik`, `nama_ayah`, `nama_ibu`, `tanggal_penyerahan`, `nama_pendeta`, `file_kartu_keluarga`, `file_akta_kelahiran`, `status`, `keterangan`) VALUES
(1, '2023-10-31', '111111', 'Aryo Ronaldo Hamba Pulu', 'Keflin Regina Willa', NULL, NULL, 'KK_111111.pdf', 'AKTA_111111.pdf', '0', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pernikahan`
--

CREATE TABLE `pernikahan` (
  `id_pernikahan` int(5) NOT NULL,
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

INSERT INTO `pernikahan` (`id_pernikahan`, `tanggal_request`, `nik_pria`, `nik_wanita`, `tanggal_pernikahan`, `nama_pendeta`, `status`, `keterangan`) VALUES
(1, '2023-10-31', '5311022409000001', '123456', NULL, NULL, '0', NULL);

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
(1, '123xxx', '2023-10-30', 'GPDI1', 'Surat xxx', '2023-10-30_GPDI1.pdf');

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
  `nik` varchar(16) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nik`, `password`) VALUES
(3, '5311022409000001', 'user'),
(4, '111111', 'user');

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
  MODIFY `id_pernikahan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `suratkeluar`
--
ALTER TABLE `suratkeluar`
  MODIFY `id_surat_keluar` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `suratmasuk`
--
ALTER TABLE `suratmasuk`
  MODIFY `id_surat_masuk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `wartajemaat`
--
ALTER TABLE `wartajemaat`
  MODIFY `id_warta` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
