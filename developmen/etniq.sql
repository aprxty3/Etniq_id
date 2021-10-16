-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Apr 2019 pada 04.38
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `etniq`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `alamat_user`
--

CREATE TABLE `alamat_user` (
  `Id_Alamat` int(11) NOT NULL,
  `Id_User` int(11) NOT NULL,
  `Provinsi` varchar(50) NOT NULL,
  `Kabupaten` varchar(50) NOT NULL,
  `Kecamatan` varchar(50) NOT NULL,
  `Kelurahan` varchar(50) NOT NULL,
  `Alamat_Pelanggan` text NOT NULL,
  `Status_Alamat` char(1) NOT NULL,
  `Kode_Pos` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alamat_user`
--

INSERT INTO `alamat_user` (`Id_Alamat`, `Id_User`, `Provinsi`, `Kabupaten`, `Kecamatan`, `Kelurahan`, `Alamat_Pelanggan`, `Status_Alamat`, `Kode_Pos`) VALUES
(28, 47, '14-Kalimantan Tengah', '206-Kotawaringin Timur', 'Baamang', 'Baamang Hulu', 'Jl. M. Yosef II No. 56 Sampit', '1', '74313'),
(30, 47, '1-Bali', '17-Badung', 'kecamatan', 'askdjlasdk', 'Jl. M. Yosef 2 No 56', '1', '12931');

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `Id_Barang` int(11) NOT NULL,
  `Nama_Barang` varchar(50) NOT NULL,
  `Id_Template` int(11) NOT NULL,
  `Id_Batik` int(11) NOT NULL,
  `Stok` smallint(6) NOT NULL,
  `Total_Harga` bigint(20) NOT NULL,
  `Harga_Coret` bigint(20) NOT NULL,
  `Lokasi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`Id_Barang`, `Nama_Barang`, `Id_Template`, `Id_Batik`, `Stok`, `Total_Harga`, `Harga_Coret`, `Lokasi`) VALUES
(1, 'Arkana 1', 1, 1, 0, 300000, 350000, 'img/barang/barang1_1.jpg;img/barang/barang1_2.jpg'),
(2, 'Arkana 2', 1, 2, 0, 300000, 310000, 'img/barang/barang2_1.jpg;img/barang/barang2_2.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `batik`
--

CREATE TABLE `batik` (
  `Id_Batik` int(11) NOT NULL,
  `Nama_Batik` varchar(50) NOT NULL,
  `Lokasi` text NOT NULL,
  `Harga` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `batik`
--

INSERT INTO `batik` (`Id_Batik`, `Nama_Batik`, `Lokasi`, `Harga`) VALUES
(1, 'Batik 1', 'img/batik/batik1.png', 0),
(2, 'Batik 2', 'img/batik/batik2.png', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_keranjang`
--

CREATE TABLE `detail_keranjang` (
  `Id` int(11) NOT NULL,
  `Id_Keranjang` int(11) NOT NULL,
  `Id_Barang` int(11) NOT NULL,
  `Qty` tinyint(11) NOT NULL,
  `Harga_Satuan` bigint(11) NOT NULL,
  `Potongan` varchar(15) NOT NULL,
  `Lingkar_Dada` tinyint(4) DEFAULT NULL,
  `Lebar_Bahu` tinyint(4) DEFAULT NULL,
  `Leher` tinyint(4) DEFAULT NULL,
  `Ketiak` tinyint(4) DEFAULT NULL,
  `Perut` tinyint(4) DEFAULT NULL,
  `Pinggul_Atas` tinyint(4) DEFAULT NULL,
  `Panjang_Baju` tinyint(4) DEFAULT NULL,
  `Panjang_Tangan_Pjg` tinyint(4) DEFAULT NULL,
  `Panjang_Tangan` tinyint(4) DEFAULT NULL,
  `Pergelangan` tinyint(4) DEFAULT NULL,
  `Ukuran` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `diskon`
--

CREATE TABLE `diskon` (
  `Kd_Diskon` varchar(30) NOT NULL,
  `Diskon` tinyint(4) NOT NULL,
  `Status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `diskon`
--

INSERT INTO `diskon` (`Kd_Diskon`, `Diskon`, `Status`) VALUES
('abc', 50, 1),
('null', 0, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `Id_Keranjang` int(11) NOT NULL,
  `Id_User` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`Id_Keranjang`, `Id_User`) VALUES
(1, 47);

-- --------------------------------------------------------

--
-- Struktur dari tabel `payout`
--

CREATE TABLE `payout` (
  `Id_Payout` int(11) NOT NULL,
  `Kd_Diskon` varchar(30) NOT NULL,
  `Id_Keranjang` int(11) NOT NULL,
  `Id_Alamat` int(11) NOT NULL,
  `Ongkir` bigint(20) NOT NULL,
  `Total_Bayar` bigint(20) NOT NULL,
  `Resi` text,
  `Lokasi_BT` text,
  `Tanggal_Payout` datetime NOT NULL,
  `Expired_Payout` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `polos`
--

CREATE TABLE `polos` (
  `Id_Polos` int(11) NOT NULL,
  `Nama_Polos` varchar(50) NOT NULL,
  `Lokasi` text NOT NULL,
  `Harga` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `polos`
--

INSERT INTO `polos` (`Id_Polos`, `Nama_Polos`, `Lokasi`, `Harga`) VALUES
(1, 'polos1', 'img/polos/polos1.png', 0),
(2, 'polos2', 'img/polos/polos2.png', 0),
(3, 'polos3', 'img/polos/polos3.png', 0),
(4, 'polos4', 'img/polos/polos4.png', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `template`
--

CREATE TABLE `template` (
  `Id_Template` int(11) NOT NULL,
  `Nama_Template` varchar(50) NOT NULL,
  `Lokasi` text NOT NULL,
  `Harga` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `template`
--

INSERT INTO `template` (`Id_Template`, `Nama_Template`, `Lokasi`, `Harga`) VALUES
(1, 'Template 1', 'img/template/template1.jpeg', 0),
(2, 'Template 2', 'img/template/template2.jpeg', 0),
(3, 'Template 3', 'img/template/template3.jpeg', 0),
(4, 'Template 4', 'img/template/template4.jpeg', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tracking`
--

CREATE TABLE `tracking` (
  `Id_Tracking` int(11) NOT NULL,
  `Id_Payout` int(11) NOT NULL,
  `Status` varchar(50) NOT NULL,
  `Tanggal` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `Id_User` int(11) NOT NULL,
  `Nama_Pelanggan` varchar(50) NOT NULL,
  `Jenis_Kelamin` char(1) NOT NULL,
  `Tanggal_Lahir` date NOT NULL,
  `Telepon` varchar(20) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`Id_User`, `Nama_Pelanggan`, `Jenis_Kelamin`, `Tanggal_Lahir`, `Telepon`, `Email`, `Password`) VALUES
(47, 'Lukman Hakim', 'L', '2018-01-01', '2', 'c@fa.c', 'a'),
(49, 'Mahendra Fajar', 'L', '0000-00-00', '082153027575', 'mahendrafajar17@gmail.com', '15kerida');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `alamat_user`
--
ALTER TABLE `alamat_user`
  ADD PRIMARY KEY (`Id_Alamat`),
  ADD KEY `Id_User` (`Id_User`);

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`Id_Barang`),
  ADD KEY `Id_Template` (`Id_Template`,`Id_Batik`),
  ADD KEY `Id_Batik` (`Id_Batik`);

--
-- Indeks untuk tabel `batik`
--
ALTER TABLE `batik`
  ADD PRIMARY KEY (`Id_Batik`);

--
-- Indeks untuk tabel `detail_keranjang`
--
ALTER TABLE `detail_keranjang`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `Id_Barang` (`Id_Barang`),
  ADD KEY `Id_Keranjang` (`Id_Keranjang`);

--
-- Indeks untuk tabel `diskon`
--
ALTER TABLE `diskon`
  ADD PRIMARY KEY (`Kd_Diskon`) USING BTREE;

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`Id_Keranjang`),
  ADD KEY `Id_User` (`Id_User`);

--
-- Indeks untuk tabel `payout`
--
ALTER TABLE `payout`
  ADD PRIMARY KEY (`Id_Payout`),
  ADD KEY `Id_Keranjang` (`Id_Keranjang`,`Kd_Diskon`) USING BTREE,
  ADD KEY `Kd_Diskon` (`Kd_Diskon`),
  ADD KEY `Id_Alamat` (`Id_Alamat`);

--
-- Indeks untuk tabel `polos`
--
ALTER TABLE `polos`
  ADD PRIMARY KEY (`Id_Polos`);

--
-- Indeks untuk tabel `template`
--
ALTER TABLE `template`
  ADD PRIMARY KEY (`Id_Template`);

--
-- Indeks untuk tabel `tracking`
--
ALTER TABLE `tracking`
  ADD PRIMARY KEY (`Id_Tracking`),
  ADD KEY `Id_Payout` (`Id_Payout`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id_User`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `alamat_user`
--
ALTER TABLE `alamat_user`
  MODIFY `Id_Alamat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `barang`
--
ALTER TABLE `barang`
  MODIFY `Id_Barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `batik`
--
ALTER TABLE `batik`
  MODIFY `Id_Batik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `detail_keranjang`
--
ALTER TABLE `detail_keranjang`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `Id_Keranjang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `payout`
--
ALTER TABLE `payout`
  MODIFY `Id_Payout` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `polos`
--
ALTER TABLE `polos`
  MODIFY `Id_Polos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `template`
--
ALTER TABLE `template`
  MODIFY `Id_Template` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tracking`
--
ALTER TABLE `tracking`
  MODIFY `Id_Tracking` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `Id_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `alamat_user`
--
ALTER TABLE `alamat_user`
  ADD CONSTRAINT `alamat_user_ibfk_1` FOREIGN KEY (`Id_User`) REFERENCES `user` (`Id_User`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_2` FOREIGN KEY (`Id_Batik`) REFERENCES `batik` (`Id_Batik`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `barang_ibfk_3` FOREIGN KEY (`Id_Template`) REFERENCES `template` (`Id_Template`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `detail_keranjang`
--
ALTER TABLE `detail_keranjang`
  ADD CONSTRAINT `detail_keranjang_ibfk_1` FOREIGN KEY (`Id_Keranjang`) REFERENCES `keranjang` (`Id_Keranjang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_keranjang_ibfk_2` FOREIGN KEY (`Id_Barang`) REFERENCES `barang` (`Id_Barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`Id_User`) REFERENCES `user` (`Id_User`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `payout`
--
ALTER TABLE `payout`
  ADD CONSTRAINT `payout_ibfk_1` FOREIGN KEY (`Id_Keranjang`) REFERENCES `keranjang` (`Id_Keranjang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `payout_ibfk_2` FOREIGN KEY (`Kd_Diskon`) REFERENCES `diskon` (`Kd_Diskon`),
  ADD CONSTRAINT `payout_ibfk_3` FOREIGN KEY (`Id_Alamat`) REFERENCES `alamat_user` (`Id_Alamat`);

--
-- Ketidakleluasaan untuk tabel `tracking`
--
ALTER TABLE `tracking`
  ADD CONSTRAINT `tracking_ibfk_1` FOREIGN KEY (`Id_Payout`) REFERENCES `payout` (`Id_Payout`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
