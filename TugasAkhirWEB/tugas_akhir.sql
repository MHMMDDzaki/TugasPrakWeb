-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 23, 2021 at 06:00 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.3.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tugas_akhir`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'tes@gmail.com', 'tes123', 'Budi Cahyadi'),
(2, 'baba@gmail', 'bababi', 'Putang Inam');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(5) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Pekanbaru', 15000),
(2, 'Kulon Progo', 5000),
(3, 'Jakarta', 10000),
(4, 'Bandung', 10000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`) VALUES
(2, 'budicahyadi@gmail.com', 'budi0122', 'Budi Ragil', '083451222110'),
(4, 'ardi09@gmail.com', 'ardi011', 'Ardi Sasongko', '089530412017'),
(7, 'data@gmail.com', 'data123', 'Joko Susiloh', '082122234411');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti_pembayaran` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `jumlah`, `bank`, `tanggal`, `bukti_pembayaran`) VALUES
(2, 30, 'Ardi Sasongko', 359900, 'BCA', '2021-11-19', '20211119132240VBG2.jpg'),
(3, 37, 'Joko Susiloh', 1159900, 'BRI', '2021-11-19', '20211119152004Artboard 1.png'),
(4, 41, '', 0, '', '2021-11-19', '20211119152157'),
(5, 37, '', 0, '', '2021-11-19', '20211119152838'),
(6, 37, '', 0, '', '2021-11-19', '20211119152905'),
(7, 37, '', 0, '', '2021-11-19', '20211119152915'),
(8, 37, '', 0, 'BRI', '2021-11-19', '20211119152947'),
(9, 37, '', 0, '', '2021-11-19', '20211119153053'),
(10, 37, '', 0, 'BRI', '2021-11-19', '20211119153059'),
(11, 38, 'Joko', 255000, 'BCA', '2021-11-20', '20211120142650logo-if.png'),
(12, 45, 'Joko', 160000, 'BCA', '2021-11-20', '20211120165336Logo UPN Yogyakarta Terbaru.png'),
(13, 46, 'Joko', 460000, 'BCA', '2021-11-20', '20211120165734logo-if.png');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_kota`, `tarif`, `alamat`, `status`) VALUES
(1, 1, 1, '2021-11-04', 150000, '', 0, '', 'pending'),
(2, 1, 2, '2021-11-19', 200000, '', 0, '', 'pending'),
(25, 2, 3, '2021-11-18', 710000, '', 0, '', 'pending'),
(26, 2, 1, '2021-11-18', 464800, '', 0, '', 'pending'),
(27, 2, 3, '2021-11-18', 260000, '', 0, '', 'pending'),
(28, 2, 1, '2021-11-18', 164900, '', 0, '', 'pending'),
(29, 2, 1, '2021-11-18', 164900, '', 0, '', 'pending'),
(30, 4, 3, '2021-11-19', 359900, '', 0, '', 'Sudah Bayar'),
(31, 4, 3, '2021-11-19', 569700, '', 0, '', 'pending'),
(32, 4, 2, '2021-11-19', 654900, '', 0, '', 'pending'),
(33, 4, 3, '2021-11-19', 312900, 'Jakarta', 10000, '', 'pending'),
(34, 4, 2, '2021-11-19', 484900, 'Kulon Progo', 5000, 'Kedungsari, Pengasih, Kulon Progo', 'pending'),
(35, 4, 2, '2021-11-19', 548000, 'Kulon Progo', 5000, 'Terbah, Wates, Kulon Progo\r\n', 'pending'),
(36, 4, 1, '2021-11-19', 1194600, 'Pekanbaru', 15000, 'Pekanbaru, Kota Pekanbaru', 'pending'),
(37, 7, 3, '2021-11-19', 1159900, 'Jakarta', 10000, 'Jakarta Barat Daya', 'Sudah Bayar'),
(38, 7, 2, '2021-11-19', 255000, 'Kulon Progo', 5000, 'wates\r\n', 'Sudah Bayar'),
(39, 4, 2, '2021-11-19', 1404900, 'Kulon Progo', 5000, 'pengasih, kulon progo', 'pending'),
(40, 7, 3, '2021-11-19', 459700, 'Jakarta', 10000, 'dimana saja', 'pending'),
(41, 7, 3, '2021-11-19', 260000, 'Jakarta', 10000, 'Jakarta', 'Sudah Bayar'),
(42, 7, 2, '2021-11-20', 705000, 'Kulon Progo', 5000, 'j', 'pending'),
(43, 7, 2, '2021-11-20', 604900, 'Kulon Progo', 5000, 'jogja', 'pending'),
(44, 7, 1, '2021-11-20', 414900, 'Pekanbaru', 15000, 'jakarta', 'pending'),
(45, 7, 3, '2021-11-20', 160000, 'Jakarta', 10000, 'terserah', 'Sudah Bayar'),
(46, 7, 3, '2021-11-20', 460000, 'Jakarta', 10000, 'terserah2', 'Sudah Bayar');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `subberat` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `berat`, `subberat`, `subharga`) VALUES
(1, 1, 1, 1, '', 0, 0, 0, 0),
(2, 3, 3, 1, '', 0, 0, 0, 0),
(15, 29, 3, 1, '', 0, 0, 0, 0),
(16, 30, 3, 1, 'Buku Basket', 149900, 500, 0, 149900),
(17, 30, 6, 1, 'Buku Gambar', 200000, 250, 0, 200000),
(18, 31, 8, 1, 'Buku Coba', 100000, 150, 150, 100000),
(19, 31, 3, 2, 'Buku Basket', 149900, 500, 1000, 299800),
(20, 31, 10, 1, 'Buku Negeri', 159900, 250, 250, 159900),
(21, 32, 3, 1, 'Buku Basket', 149900, 500, 500, 149900),
(22, 32, 9, 2, 'Buku Gatau', 150000, 200, 400, 300000),
(23, 32, 6, 1, 'Buku Gambar', 200000, 250, 250, 200000),
(24, 33, 11, 1, 'Buku Terlatih', 143000, 150, 150, 143000),
(25, 33, 10, 1, 'Buku Negeri', 159900, 250, 250, 159900),
(26, 34, 3, 1, 'Buku Basket', 149900, 500, 500, 149900),
(27, 34, 6, 1, 'Buku Gambar', 200000, 250, 250, 200000),
(28, 34, 7, 1, 'Buku cerita', 130000, 200, 200, 130000),
(29, 35, 11, 1, 'Buku Terlatih', 143000, 150, 150, 143000),
(30, 35, 6, 2, 'Buku Gambar', 200000, 250, 500, 400000),
(31, 36, 3, 4, 'Buku Basket', 149900, 500, 2000, 599600),
(32, 36, 7, 1, 'Buku cerita', 130000, 200, 200, 130000),
(33, 36, 9, 3, 'Buku Gatau', 150000, 200, 600, 450000),
(34, 37, 3, 1, 'Buku Basket', 149900, 500, 500, 149900),
(35, 37, 5, 4, 'Buku senam', 250000, 500, 2000, 1000000),
(36, 38, 5, 1, 'Buku senam', 250000, 500, 500, 250000),
(37, 39, 3, 1, 'Buku Basket', 149900, 500, 500, 149900),
(38, 39, 5, 5, 'Buku senam', 250000, 500, 2500, 1250000),
(39, 40, 3, 3, 'Buku Basket', 149900, 500, 1500, 449700),
(40, 41, 5, 1, 'Buku senam', 250000, 500, 500, 250000),
(41, 42, 5, 2, 'Buku senam', 250000, 500, 1000, 500000),
(42, 42, 6, 1, 'Buku Gambar', 200000, 250, 250, 200000),
(43, 0, 5, 2, 'Buku senam', 250000, 500, 1000, 500000),
(44, 0, 3, 1, 'Buku Basket', 149900, 500, 500, 149900),
(45, 0, 3, 1, 'Buku Basket', 149900, 500, 500, 149900),
(46, 0, 5, 1, 'Buku senam', 250000, 500, 500, 250000),
(47, 0, 3, 1, 'Buku Basket', 149900, 500, 500, 149900),
(48, 0, 3, 1, 'Buku Basket', 149900, 500, 500, 149900),
(49, 0, 3, 1, 'Buku Basket', 149900, 500, 500, 149900),
(50, 43, 3, 1, 'Buku Basket', 149900, 500, 500, 149900),
(51, 43, 5, 1, 'Buku senam', 250000, 500, 500, 250000),
(52, 43, 6, 1, 'Buku Gambar', 200000, 250, 250, 200000),
(53, 44, 3, 1, 'Buku Basket', 149900, 500, 500, 149900),
(54, 44, 5, 1, 'Buku senam', 250000, 500, 500, 250000),
(55, 45, 9, 1, 'Buku Gatau', 150000, 200, 200, 150000),
(56, 46, 6, 1, 'Buku Gambar', 200000, 250, 250, 200000),
(57, 46, 9, 1, 'Buku Gatau', 150000, 200, 200, 150000),
(58, 46, 8, 1, 'Buku Coba', 100000, 150, 150, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `kategori_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `Stok` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `berat`, `foto_produk`, `kategori_produk`, `deskripsi_produk`, `Stok`) VALUES
(3, 'Buku Basket', 149900, 500, 'basket2.png', 'hiburan', 'Buku untuk berlatih basket dengan mudah\r\n', -1),
(5, 'Buku senam', 250000, 500, 'Air-Jordan.jpg', 'umum', 'Bersama menyehatkan dengan senam di rumah', 2),
(6, 'Buku Gambar', 200000, 250, 'donasi.jpg', 'hiburan', 'Buku untuk membantu anak menggambar', 7),
(7, 'Buku cerita', 130000, 200, 'bun.jpg', 'komik', 'Kumpulan cerita dari masyarakat setempat', 10),
(8, 'Buku Coba', 100000, 150, 'desainLomba2.png', 'hiburan', 'Buku untuk mencoba sesuatu yang baru', 9),
(9, 'Buku Gatau', 150000, 200, 'Ardi-Sasongko(123200103)_Informatika_(ardi_sasongko_).jpg', 'teknologi', 'Buku yang berisi sesuatu hal ga penting', 8),
(10, 'Buku Negeri', 159900, 250, 'fun_match-design.jpg', 'hiburan', 'Buku yang mengajari tentang negeri', 10),
(11, 'Buku Terlatih', 143000, 150, 'BeasiswaDesign.png', 'umum', 'Buku untuk melatih kita untuk melakukan sesuatu', 10);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
