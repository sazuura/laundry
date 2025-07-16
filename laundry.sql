-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jan 2024 pada 20.16
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
-- Database: `laundry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis`
--

CREATE TABLE `tb_jenis` (
  `kd_jenis` int(11) NOT NULL,
  `jenis_laundry` varchar(100) NOT NULL,
  `lama_proses` int(11) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jenis`
--

INSERT INTO `tb_jenis` (`kd_jenis`, `jenis_laundry`, `lama_proses`, `tarif`) VALUES
(1, 'Laundry + Seterika', 3, 7000),
(2, 'Fast Laundry', 1, 10000),
(12, 'Regular', 2, 6000),
(13, 'Cuci Karpet', 3, 10000),
(14, 'Cuci Selimut', 3, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_laundry`
--

CREATE TABLE `tb_laundry` (
  `id_laundry` int(11) NOT NULL,
  `id_pelanggan` varchar(15) NOT NULL,
  `kd_user` int(11) NOT NULL,
  `tanggal_terima` date NOT NULL,
  `tanggal_selesai` date NOT NULL,
  `jml_kiloan` int(11) NOT NULL,
  `totalbayar` int(11) NOT NULL,
  `status` varchar(20) NOT NULL,
  `catatan` text NOT NULL,
  `kd_jenis` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_laundry`
--

INSERT INTO `tb_laundry` (`id_laundry`, `id_pelanggan`, `kd_user`, `tanggal_terima`, `tanggal_selesai`, `jml_kiloan`, `totalbayar`, `status`, `catatan`, `kd_jenis`) VALUES
(1, 'PLG-0001', 2, '2024-01-11', '2024-01-14', 2, 14000, 'Lunas', 'Kaos 2, Celana 3', 1),
(2, 'PLG-0002', 1, '2024-01-15', '2024-01-17', 5, 35000, 'Lunas', 'Baju koko dll', 12),
(3, 'PLG-0003', 1, '2024-01-15', '2024-01-17', 4, 28000, 'Lunas', 'test', 1),
(4, 'PLG-0004', 1, '2024-01-10', '2024-01-12', 3, 21000, 'Lunas', 'Selimut', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pelanggan`
--

CREATE TABLE `tb_pelanggan` (
  `kd_pelanggan` varchar(10) NOT NULL,
  `fotopelanggan` varchar(100) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `telepon` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pelanggan`
--

INSERT INTO `tb_pelanggan` (`kd_pelanggan`, `fotopelanggan`, `nama`, `alamat`, `telepon`) VALUES
('PLG-0001', 'adawong.jpg', 'Ada Wong', 'Jakarta', '089876543212'),
('PLG-0002', 'leon.jpg', 'Leon S. Kennedy', 'Raccoon City', '08543218765'),
('PLG-0003', 'levi.jpg', 'levi ackerman', 'Shiganshina', '0890987654321'),
('PLG-0004', '', 'Armin Arlert', 'Shiganshina', '0851123456789');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `kd_transaksi` int(11) NOT NULL,
  `kd_user` int(11) NOT NULL,
  `tgl_transaksi` date NOT NULL,
  `pemasukan` int(11) NOT NULL,
  `pengeluaran` int(11) NOT NULL,
  `catatan` text NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`kd_transaksi`, `kd_user`, `tgl_transaksi`, `pemasukan`, `pengeluaran`, `catatan`, `keterangan`) VALUES
(1, 1, '2024-01-15', 28000, 0, 'test', 'pemasukan'),
(2, 1, '2024-01-10', 21000, 0, 'Selimut', 'pemasukan'),
(3, 1, '2024-01-19', 0, 14000, 'Beli sabun', 'pengeluaran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `nama_user` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(30) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id`, `username`, `nama_user`, `password`, `level`, `foto`) VALUES
(1, 'admin', 'Admin', '123', 'admin', 'salma.jpg'),
(2, 'kasir', 'Kasir', '123', 'kasir', 'levi.jpg'),
(3, 'leon', 'Leon', '123', 'kasir', 'leon.jpg'),
(5, 'adawong', 'Ada Wong', '123', 'admin', 'adawong.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_jenis`
--
ALTER TABLE `tb_jenis`
  ADD PRIMARY KEY (`kd_jenis`);

--
-- Indeks untuk tabel `tb_laundry`
--
ALTER TABLE `tb_laundry`
  ADD PRIMARY KEY (`id_laundry`);

--
-- Indeks untuk tabel `tb_pelanggan`
--
ALTER TABLE `tb_pelanggan`
  ADD PRIMARY KEY (`kd_pelanggan`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`kd_transaksi`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_jenis`
--
ALTER TABLE `tb_jenis`
  MODIFY `kd_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `tb_laundry`
--
ALTER TABLE `tb_laundry`
  MODIFY `id_laundry` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `kd_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
