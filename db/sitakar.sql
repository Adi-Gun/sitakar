-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Bulan Mei 2023 pada 17.48
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tabsis`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kelas`
--

CREATE TABLE `tb_kelas` (
  `id_kelas` int(11) NOT NULL,
  `kelas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kelas`
--

INSERT INTO `tb_kelas` (`id_kelas`, `kelas`) VALUES
(5, 'Kelas 1'),
(6, 'Kelas 2'),
(7, 'Kelas 3'),
(8, 'Kelas 4'),
(9, 'Kelas 5'),
(10, 'Kelas 6');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `id_pengguna` int(11) NOT NULL,
  `nama_pengguna` varchar(20) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(15) NOT NULL,
  `level` enum('Administrator','Petugas') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`id_pengguna`, `nama_pengguna`, `username`, `password`, `level`) VALUES
(1, 'administrator', 'admin', 'admin', 'Administrator'),
(4, 'Petugas', 'admin2', 'admin2', 'Petugas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_profil`
--

CREATE TABLE `tb_profil` (
  `id_profil` int(11) NOT NULL,
  `nama_sekolah` varchar(200) NOT NULL,
  `alamat` varchar(400) NOT NULL,
  `akreditasi` char(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_profil`
--

INSERT INTO `tb_profil` (`id_profil`, `nama_sekolah`, `alamat`, `akreditasi`) VALUES
(1, 'SD POMOSDA', 'Jl. Wachid Hasyim No.305, Tanjung, Tanjunganom, Kec. Tanjunganom, Kabupaten Nganjuk, Jawa Timur 64482', 'C');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_siswa`
--

CREATE TABLE `tb_siswa` (
  `nis` char(12) NOT NULL,
  `nama_siswa` varchar(40) NOT NULL,
  `jekel` enum('LK','PR') NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `status` enum('Aktif','Lulus','Pindah') NOT NULL,
  `th_masuk` year(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_siswa`
--

INSERT INTO `tb_siswa` (`nis`, `nama_siswa`, `jekel`, `id_kelas`, `status`, `th_masuk`) VALUES
('123', 'Adi Gunawan Ahmad', 'LK', 5, 'Aktif', 2022),
('124', 'Eren Yeager', 'LK', 5, 'Aktif', 2022),
('125', 'Rumbling', 'LK', 6, 'Aktif', 2022);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_tabungan`
--

CREATE TABLE `tb_tabungan` (
  `id_tabungan` int(11) NOT NULL,
  `nis` char(12) NOT NULL,
  `setor` int(11) NOT NULL,
  `tarik` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `jenis` enum('ST','TR') NOT NULL,
  `petugas` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_tabungan`
--

INSERT INTO `tb_tabungan` (`id_tabungan`, `nis`, `setor`, `tarik`, `tgl`, `jenis`, `petugas`) VALUES
(66, '123', 1000000, 0, '2023-05-30', 'ST', 'administrator'),
(67, '123', 0, 10000, '2023-05-30', 'TR', 'administrator'),
(68, '124', 1000000, 0, '2023-05-30', 'ST', 'administrator'),
(69, '125', 1000000, 0, '2023-05-30', 'ST', 'administrator');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`id_pengguna`);

--
-- Indeks untuk tabel `tb_profil`
--
ALTER TABLE `tb_profil`
  ADD PRIMARY KEY (`id_profil`);

--
-- Indeks untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD PRIMARY KEY (`nis`),
  ADD KEY `id_kelas` (`id_kelas`);

--
-- Indeks untuk tabel `tb_tabungan`
--
ALTER TABLE `tb_tabungan`
  ADD PRIMARY KEY (`id_tabungan`),
  ADD KEY `nis` (`nis`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_kelas`
--
ALTER TABLE `tb_kelas`
  MODIFY `id_kelas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  MODIFY `id_pengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_profil`
--
ALTER TABLE `tb_profil`
  MODIFY `id_profil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_tabungan`
--
ALTER TABLE `tb_tabungan`
  MODIFY `id_tabungan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `tb_siswa`
--
ALTER TABLE `tb_siswa`
  ADD CONSTRAINT `tb_siswa_ibfk_1` FOREIGN KEY (`id_kelas`) REFERENCES `tb_kelas` (`id_kelas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `tb_tabungan`
--
ALTER TABLE `tb_tabungan`
  ADD CONSTRAINT `tb_tabungan_ibfk_1` FOREIGN KEY (`nis`) REFERENCES `tb_siswa` (`nis`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
