-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Bulan Mei 2025 pada 03.40
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.31

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_kriteria`
--

CREATE TABLE `data_kriteria` (
  `ID_Kriteria` int(15) NOT NULL,
  `Nama_Kriteria` varchar(100) DEFAULT NULL,
  `Nilai_Bobot` float DEFAULT NULL,
  `Atribut` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_penilaian`
--

CREATE TABLE `data_penilaian` (
  `ID_Penilaian` int(15) NOT NULL,
  `ID_Alter` int(15) DEFAULT NULL,
  `ID_Kriteria` int(15) DEFAULT NULL,
  `Nilai` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_normalisasi`
--

CREATE TABLE `hasil_normalisasi` (
  `ID_Norm` int(15) NOT NULL,
  `ID_Alter` int(15) DEFAULT NULL,
  `ID_Kriteria` int(15) DEFAULT NULL,
  `Hasil_Norm` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `hasil_preferensi`
--

CREATE TABLE `hasil_preferensi` (
  `ID_Pref` int(15) NOT NULL,
  `ID_Alter` int(15) DEFAULT NULL,
  `hasil_pref` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  MODIFY `ID_Alter` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_kriteria`
--
ALTER TABLE `data_kriteria`
  MODIFY `ID_Kriteria` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_penilaian`
--
ALTER TABLE `data_penilaian`
  MODIFY `ID_Penilaian` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_subkriteria`
--
ALTER TABLE `data_subkriteria`
  MODIFY `ID_Sub` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hasil_normalisasi`
--
ALTER TABLE `hasil_normalisasi`
  MODIFY `ID_Norm` int(15) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `hasil_preferensi`
--
ALTER TABLE `hasil_preferensi`
  MODIFY `ID_Pref` int(15) NOT NULL AUTO_INCREMENT;

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
