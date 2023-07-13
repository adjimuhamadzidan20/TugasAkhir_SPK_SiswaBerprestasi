-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Jul 2023 pada 17.55
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `spksiswaprestasi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `ID_User` int(15) NOT NULL,
  `username` varchar(125) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`ID_User`, `username`, `password`) VALUES
(1, 'adminsekolah', 'c5a9c89e63451dfcd9f6b6d07f4c9fd0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_alternatif`
--

CREATE TABLE `data_alternatif` (
  `ID_Alter` int(15) NOT NULL,
  `NISN` varchar(30) DEFAULT NULL,
  `Nama_Siswa` varchar(100) DEFAULT NULL,
  `JK` varchar(100) DEFAULT NULL,
  `Kelas` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_alternatif`
--

INSERT INTO `data_alternatif` (`ID_Alter`, `NISN`, `Nama_Siswa`, `JK`, `Kelas`) VALUES
(1, '0067726025', 'ALDHY ACHMAD FEBRYANSYAH', 'L', 'X SIJA 1'),
(2, '0058802698', 'ALIF FAJAR SYA`BAN', 'L', 'X SIJA 1'),
(3, '0061405048', 'ANGGITA RUSTI AMELIA', 'P', 'X SIJA 1'),
(4, '0056261244', 'CARLES RIZKY IRFANZAH', 'L', 'X SIJA 1'),
(5, '0051848951', 'CEMARA AYU NURILAH', 'P', 'X SIJA 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kriteria`
--

CREATE TABLE `data_kriteria` (
  `ID_Kriteria` int(15) NOT NULL,
  `Nama_Kriteria` varchar(100) DEFAULT NULL,
  `Nilai_Bobot` float DEFAULT NULL,
  `Atribut` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_kriteria`
--

INSERT INTO `data_kriteria` (`ID_Kriteria`, `Nama_Kriteria`, `Nilai_Bobot`, `Atribut`) VALUES
(2, 'Nilai Rapot (rata-rata)', 0.4, 'Benefit'),
(3, 'Sikap/Karakter', 0.3, 'Benefit'),
(4, 'Ekstrakurikuler', 0.2, 'Benefit'),
(7, 'Kehadiran/Absensi', 0.1, 'Benefit');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_penilaian`
--

CREATE TABLE `data_penilaian` (
  `ID_Penilaian` int(15) NOT NULL,
  `ID_Alter` int(15) DEFAULT NULL,
  `ID_Kriteria` int(15) DEFAULT NULL,
  `Nilai` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_penilaian`
--

INSERT INTO `data_penilaian` (`ID_Penilaian`, `ID_Alter`, `ID_Kriteria`, `Nilai`) VALUES
(159, 1, 2, 4),
(160, 1, 3, 4),
(161, 1, 4, 1),
(162, 1, 7, 8),
(163, 2, 2, 5),
(164, 2, 3, 5),
(165, 2, 4, 1),
(166, 2, 7, 7),
(167, 3, 2, 5),
(168, 3, 3, 5),
(169, 3, 4, 1),
(170, 3, 7, 8),
(179, 4, 2, 5),
(180, 4, 3, 4),
(181, 4, 4, 1),
(182, 4, 7, 8),
(183, 5, 2, 6),
(184, 5, 3, 4),
(185, 5, 4, 1),
(186, 5, 7, 8);

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_subkriteria`
--

CREATE TABLE `data_subkriteria` (
  `ID_Sub` int(15) NOT NULL,
  `ID_Kriteria` int(15) DEFAULT NULL,
  `Nama_Subkriteria` varchar(120) DEFAULT NULL,
  `Keterangan` varchar(100) DEFAULT NULL,
  `Nilai` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_subkriteria`
--

INSERT INTO `data_subkriteria` (`ID_Sub`, `ID_Kriteria`, `Nama_Subkriteria`, `Keterangan`, `Nilai`) VALUES
(1, 2, '95-100', 'Sangat Tinggi', 10),
(3, 2, '93-95', 'Tinggi', 9),
(4, 2, '90-92', 'Cukup Tinggi', 8),
(5, 2, '86-88', 'Sangat Baik', 7),
(6, 2, '83-85', 'Baik', 6),
(7, 2, '80-82', 'Cukup Baik', 5),
(8, 2, '77-79', 'Sedang', 4),
(9, 2, '74-76', 'Kurang', 3),
(10, 2, '71-73', 'Cukup Kurang ', 2),
(11, 2, '-70', 'Sangat Kurang', 1),
(12, 3, 'A', 'Sangat Baik', 5),
(13, 3, 'B', 'Baik', 4),
(14, 3, 'C', 'Cukup', 3),
(15, 3, 'D', 'Kurang ', 2),
(16, 3, 'E', 'Sangat Kurang', 1),
(17, 4, 'A', 'Sangat Baik', 8),
(18, 4, 'B', 'Baik', 7),
(19, 4, 'C', 'Cukup', 5),
(20, 4, 'D', 'Kurang', 3),
(21, 4, 'E', 'Nihil', 1),
(23, 7, '1 sampai 3', 'Baik', 7),
(24, 7, '4 sampai 5', 'Cukup', 5),
(25, 7, '6 sampai 10', 'Kurang', 3),
(26, 7, 'lebih dari 10', 'Sangat Kurang', 1),
(67, 2, '-10', 'Buruk Sekali', 0),
(68, 3, 'F', 'Buruk', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_normalisasi`
--

CREATE TABLE `hasil_normalisasi` (
  `ID_Norm` int(15) NOT NULL,
  `ID_Alter` int(15) DEFAULT NULL,
  `ID_Kriteria` int(15) DEFAULT NULL,
  `Hasil_Norm` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hasil_normalisasi`
--

INSERT INTO `hasil_normalisasi` (`ID_Norm`, `ID_Alter`, `ID_Kriteria`, `Hasil_Norm`) VALUES
(664, 1, 2, 0.66666666666667),
(665, 1, 3, 0.8),
(666, 1, 4, 1),
(667, 1, 7, 1),
(668, 2, 2, 0.83333333333333),
(669, 2, 3, 1),
(670, 2, 4, 1),
(671, 2, 7, 0.875),
(672, 3, 2, 0.83333333333333),
(673, 3, 3, 1),
(674, 3, 4, 1),
(675, 3, 7, 1),
(676, 4, 2, 0.83333333333333),
(677, 4, 3, 0.8),
(678, 4, 4, 1),
(679, 4, 7, 1),
(680, 5, 2, 1),
(681, 5, 3, 0.8),
(682, 5, 4, 1),
(683, 5, 7, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_preferensi`
--

CREATE TABLE `hasil_preferensi` (
  `ID_Pref` int(15) NOT NULL,
  `ID_Alter` int(15) DEFAULT NULL,
  `hasil_pref` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hasil_preferensi`
--

INSERT INTO `hasil_preferensi` (`ID_Pref`, `ID_Alter`, `hasil_pref`) VALUES
(6, 1, 0.80666666666667),
(7, 2, 0.92083333333333),
(8, 3, 0.93333333333333),
(9, 4, 0.87333333333333),
(10, 5, 0.94);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`ID_User`);

--
-- Indeks untuk tabel `data_alternatif`
--
ALTER TABLE `data_alternatif`
  ADD PRIMARY KEY (`ID_Alter`);

--
-- Indeks untuk tabel `data_kriteria`
--
ALTER TABLE `data_kriteria`
  ADD PRIMARY KEY (`ID_Kriteria`);

--
-- Indeks untuk tabel `data_penilaian`
--
ALTER TABLE `data_penilaian`
  ADD PRIMARY KEY (`ID_Penilaian`),
  ADD KEY `data_penilaian_FK_1` (`ID_Alter`),
  ADD KEY `data_penilaian_FK` (`ID_Kriteria`);

--
-- Indeks untuk tabel `data_subkriteria`
--
ALTER TABLE `data_subkriteria`
  ADD PRIMARY KEY (`ID_Sub`),
  ADD KEY `data_subkriteria_FK` (`ID_Kriteria`);

--
-- Indeks untuk tabel `hasil_normalisasi`
--
ALTER TABLE `hasil_normalisasi`
  ADD PRIMARY KEY (`ID_Norm`),
  ADD KEY `hasil_normalisasi_FK` (`ID_Alter`),
  ADD KEY `hasil_normalisasi_FK_1` (`ID_Kriteria`);

--
-- Indeks untuk tabel `hasil_preferensi`
--
ALTER TABLE `hasil_preferensi`
  ADD PRIMARY KEY (`ID_Pref`),
  ADD KEY `hasil_preferensi_FK` (`ID_Alter`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `ID_User` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `data_alternatif`
--
ALTER TABLE `data_alternatif`
  MODIFY `ID_Alter` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `data_kriteria`
--
ALTER TABLE `data_kriteria`
  MODIFY `ID_Kriteria` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `data_penilaian`
--
ALTER TABLE `data_penilaian`
  MODIFY `ID_Penilaian` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=199;

--
-- AUTO_INCREMENT untuk tabel `data_subkriteria`
--
ALTER TABLE `data_subkriteria`
  MODIFY `ID_Sub` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT untuk tabel `hasil_normalisasi`
--
ALTER TABLE `hasil_normalisasi`
  MODIFY `ID_Norm` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=684;

--
-- AUTO_INCREMENT untuk tabel `hasil_preferensi`
--
ALTER TABLE `hasil_preferensi`
  MODIFY `ID_Pref` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `data_penilaian`
--
ALTER TABLE `data_penilaian`
  ADD CONSTRAINT `data_penilaian_FK` FOREIGN KEY (`ID_Kriteria`) REFERENCES `data_kriteria` (`ID_Kriteria`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_penilaian_FK_1` FOREIGN KEY (`ID_Alter`) REFERENCES `data_alternatif` (`ID_Alter`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `data_subkriteria`
--
ALTER TABLE `data_subkriteria`
  ADD CONSTRAINT `data_subkriteria_FK` FOREIGN KEY (`ID_Kriteria`) REFERENCES `data_kriteria` (`ID_Kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `hasil_normalisasi`
--
ALTER TABLE `hasil_normalisasi`
  ADD CONSTRAINT `hasil_normalisasi_FK` FOREIGN KEY (`ID_Alter`) REFERENCES `data_alternatif` (`ID_Alter`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `hasil_normalisasi_FK_1` FOREIGN KEY (`ID_Kriteria`) REFERENCES `data_kriteria` (`ID_Kriteria`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `hasil_preferensi`
--
ALTER TABLE `hasil_preferensi`
  ADD CONSTRAINT `hasil_preferensi_FK` FOREIGN KEY (`ID_Alter`) REFERENCES `data_alternatif` (`ID_Alter`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
