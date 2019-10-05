-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 06 Des 2018 pada 02.17
-- Versi server: 10.1.36-MariaDB
-- Versi PHP: 7.2.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `repository`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas`
--

CREATE TABLE `berkas` (
  `ID_BERKAS` varchar(255) NOT NULL,
  `ID_JENIS_BERKAS` int(11) DEFAULT NULL,
  `JUDUL_BERKAS` text,
  `DESKRIPSI` text,
  `ID_KATEGORI` int(11) DEFAULT NULL,
  `ID_DOSEN` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berkas`
--

INSERT INTO `berkas` (`ID_BERKAS`, `ID_JENIS_BERKAS`, `JUDUL_BERKAS`, `DESKRIPSI`, `ID_KATEGORI`, `ID_DOSEN`) VALUES
('1', 1, 'Konsep Pemrograman 2017', 'coba', 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `ID_DOSEN` int(11) NOT NULL,
  `NIK` varchar(15) NOT NULL,
  `NAMA_DOSEN` varchar(40) NOT NULL,
  `TEMPAT_LAHIR` varchar(15) NOT NULL,
  `TGL_LAHIR` date NOT NULL,
  `NO_TELP` varchar(15) NOT NULL,
  `EMAIL` varchar(40) NOT NULL,
  `ALAMAT` text NOT NULL,
  `PASSWORD` varchar(150) NOT NULL,
  `ID_PRODI` int(11) NOT NULL,
  `ID_STATUS` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dosen`
--

INSERT INTO `dosen` (`ID_DOSEN`, `NIK`, `NAMA_DOSEN`, `TEMPAT_LAHIR`, `TGL_LAHIR`, `NO_TELP`, `EMAIL`, `ALAMAT`, `PASSWORD`, `ID_PRODI`, `ID_STATUS`) VALUES
(1, '2101', 'Coba', 'Surabaya', '1999-01-01', '021345678', 'example@email.com', '', 'password', 1, 1),
(5, '2102', 'contoh', 'indonesia', '0000-00-00', '', '', '', 'password', 1, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `file`
--

CREATE TABLE `file` (
  `ID_UPLOAD` varchar(255) NOT NULL,
  `ID_BERKAS` varchar(255) DEFAULT NULL,
  `KETERANGAN` text,
  `NAMA_FILE` varchar(40) DEFAULT NULL,
  `ID_DOSEN` int(6) DEFAULT NULL,
  `TGL_UPLOAD` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `file`
--

INSERT INTO `file` (`ID_UPLOAD`, `ID_BERKAS`, `KETERANGAN`, `NAMA_FILE`, `ID_DOSEN`, `TGL_UPLOAD`) VALUES
('5c07deb439f90', '1', 'bab 2', 'bab 2', 1, '2018-01-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis_berkas`
--

CREATE TABLE `jenis_berkas` (
  `ID_JENIS_BERKAS` int(11) NOT NULL,
  `NAMA_JENIS_BERKAS` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jenis_berkas`
--

INSERT INTO `jenis_berkas` (`ID_JENIS_BERKAS`, `NAMA_JENIS_BERKAS`) VALUES
(1, 'makalah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `ID_KATEGORI` int(10) NOT NULL,
  `NAMA_KATEGORI` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`ID_KATEGORI`, `NAMA_KATEGORI`) VALUES
(2, 'example'),
(3, 'coba');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prodi`
--

CREATE TABLE `prodi` (
  `ID_PRODI` int(11) NOT NULL,
  `NAMA_PRODI` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prodi`
--

INSERT INTO `prodi` (`ID_PRODI`, `NAMA_PRODI`) VALUES
(1, 'Teknik Informartika'),
(2, 'Teknik Komputer');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status`
--

CREATE TABLE `status` (
  `ID_STATUS` int(11) NOT NULL,
  `NAMA_STATUS` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `status`
--

INSERT INTO `status` (`ID_STATUS`, `NAMA_STATUS`) VALUES
(1, 'admin'),
(2, 'dosen');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`ID_BERKAS`),
  ADD KEY `ID_DOSEN` (`ID_DOSEN`),
  ADD KEY `JENIS_BERKAS` (`ID_JENIS_BERKAS`),
  ADD KEY `berkas_ibfk_2` (`ID_KATEGORI`);

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`ID_DOSEN`),
  ADD KEY `PRODI` (`ID_PRODI`),
  ADD KEY `STATUS` (`ID_STATUS`) USING BTREE;

--
-- Indeks untuk tabel `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`ID_UPLOAD`),
  ADD KEY `FK_REFERENCE_5` (`ID_DOSEN`),
  ADD KEY `FK_REFERENCE_4` (`ID_BERKAS`);

--
-- Indeks untuk tabel `jenis_berkas`
--
ALTER TABLE `jenis_berkas`
  ADD PRIMARY KEY (`ID_JENIS_BERKAS`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`ID_KATEGORI`);

--
-- Indeks untuk tabel `prodi`
--
ALTER TABLE `prodi`
  ADD PRIMARY KEY (`ID_PRODI`);

--
-- Indeks untuk tabel `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`ID_STATUS`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `ID_DOSEN` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `berkas`
--
ALTER TABLE `berkas`
  ADD CONSTRAINT `berkas_ibfk_1` FOREIGN KEY (`ID_DOSEN`) REFERENCES `dosen` (`ID_DOSEN`),
  ADD CONSTRAINT `berkas_ibfk_2` FOREIGN KEY (`ID_KATEGORI`) REFERENCES `kategori` (`ID_KATEGORI`),
  ADD CONSTRAINT `berkas_ibfk_3` FOREIGN KEY (`ID_JENIS_BERKAS`) REFERENCES `jenis_berkas` (`ID_JENIS_BERKAS`);

--
-- Ketidakleluasaan untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `dosen_ibfk_1` FOREIGN KEY (`ID_PRODI`) REFERENCES `prodi` (`ID_PRODI`),
  ADD CONSTRAINT `dosen_ibfk_2` FOREIGN KEY (`ID_STATUS`) REFERENCES `status` (`ID_STATUS`);

--
-- Ketidakleluasaan untuk tabel `file`
--
ALTER TABLE `file`
  ADD CONSTRAINT `FK_REFERENCE_4` FOREIGN KEY (`ID_BERKAS`) REFERENCES `berkas` (`ID_BERKAS`),
  ADD CONSTRAINT `FK_REFERENCE_5` FOREIGN KEY (`ID_DOSEN`) REFERENCES `dosen` (`id_dosen`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
