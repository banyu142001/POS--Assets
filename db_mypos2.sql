-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2024 at 08:33 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mypos2`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) UNSIGNED NOT NULL,
  `id_produk` int(11) UNSIGNED DEFAULT NULL,
  `harga_data_cart` int(11) NOT NULL,
  `qty_data_cart` int(11) NOT NULL,
  `diskon_data_cart` int(11) NOT NULL,
  `total_data_cart` int(11) NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) UNSIGNED NOT NULL,
  `nama_customer` varchar(100) NOT NULL,
  `jenis_kelamin` varchar(50) NOT NULL,
  `no_telephone` varchar(12) NOT NULL,
  `alamat` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `detail_penjualan`
--

CREATE TABLE `detail_penjualan` (
  `id_detail` int(11) UNSIGNED NOT NULL,
  `id_penjualan_detail` int(11) UNSIGNED DEFAULT NULL,
  `id_produk_detail` int(11) UNSIGNED DEFAULT NULL,
  `harga_detail` int(20) NOT NULL,
  `qty_detail` int(20) NOT NULL,
  `diskon_detail` int(20) NOT NULL,
  `total_detail` int(20) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `detail_penjualan`
--

INSERT INTO `detail_penjualan` (`id_detail`, `id_penjualan_detail`, `id_produk_detail`, `harga_detail`, `qty_detail`, `diskon_detail`, `total_detail`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 7000, 1, 0, 7000, NULL, NULL),
(2, 2, 2, 7000, 1, 0, 7000, NULL, NULL),
(3, 2, 3, 2000, 1, 0, 2000, NULL, NULL);

--
-- Triggers `detail_penjualan`
--
DELIMITER $$
CREATE TRIGGER `return_stok` AFTER DELETE ON `detail_penjualan` FOR EACH ROW BEGIN UPDATE produk SET stok = stok + OLD.qty_detail
	  WHERE id_produk = OLD.id_produk_detail;
 END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `stok_min` AFTER INSERT ON `detail_penjualan` FOR EACH ROW BEGIN UPDATE produk SET stok = stok - NEW.qty_detail
	  WHERE id_produk = NEW.id_produk_detail;
 END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) UNSIGNED NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(1, 'Makanan', '2024-07-12 04:45:31', '2024-07-12 04:45:31'),
(2, 'Minuman', '2024-07-12 04:45:43', '2024-07-12 04:45:43');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2024-04-23-052645', 'App\\Database\\Migrations\\User', 'default', 'App', 1720759256, 1),
(2, '2024-04-26-115310', 'App\\Database\\Migrations\\Supplier', 'default', 'App', 1720759256, 1),
(3, '2024-04-27-124823', 'App\\Database\\Migrations\\Customer', 'default', 'App', 1720759256, 1),
(4, '2024-04-27-144855', 'App\\Database\\Migrations\\Kategori', 'default', 'App', 1720759256, 1),
(5, '2024-04-27-145114', 'App\\Database\\Migrations\\Satuan', 'default', 'App', 1720759256, 1),
(6, '2024-04-29-075224', 'App\\Database\\Migrations\\Produk', 'default', 'App', 1720759256, 1),
(7, '2024-05-14-080215', 'App\\Database\\Migrations\\StokKeluar', 'default', 'App', 1720759256, 1),
(8, '2024-05-14-080215', 'App\\Database\\Migrations\\StokMasuk', 'default', 'App', 1720759256, 1),
(9, '2024-05-23-173156', 'App\\Database\\Migrations\\Cart', 'default', 'App', 1720759257, 1),
(10, '2024-05-23-173156', 'App\\Database\\Migrations\\Penjualan', 'default', 'App', 1720759257, 1),
(11, '2024-05-30-041848', 'App\\Database\\Migrations\\PenjualanDetail', 'default', 'App', 1720759257, 1),
(12, '2024-07-23-123432', 'App\\Database\\Migrations\\Testimoni', 'default', 'App', 1721739269, 2);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) UNSIGNED NOT NULL,
  `invoice` varchar(100) NOT NULL,
  `id_customer` int(11) UNSIGNED DEFAULT NULL,
  `total_harga` int(20) NOT NULL,
  `diskon` int(20) NOT NULL,
  `harga_bayar` int(20) NOT NULL,
  `cash` int(20) NOT NULL,
  `kembalian` int(20) NOT NULL,
  `nota` text DEFAULT NULL,
  `tanggal` date NOT NULL,
  `id_user` int(11) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `invoice`, `id_customer`, `total_harga`, `diskon`, `harga_bayar`, `cash`, `kembalian`, `nota`, `tanggal`, `id_user`, `created_at`, `updated_at`) VALUES
(1, 'MP2407230001', 0, 7000, 0, 7000, 10000, 3000, 'cash', '2024-07-23', 1, '2024-07-23 10:18:34', '2024-07-23 10:18:34'),
(2, 'MP2407230002', 0, 9000, 0, 9000, 10000, 1000, 'Tunai', '2024-07-23', 3, '2024-07-23 10:37:20', '2024-07-23 10:37:20');

--
-- Triggers `penjualan`
--
DELIMITER $$
CREATE TRIGGER `del_detail` AFTER DELETE ON `penjualan` FOR EACH ROW BEGIN
	DELETE FROM detail_penjualan
    WHERE id_penjualan_detail = OLD.id_penjualan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) UNSIGNED NOT NULL,
  `kode_produk` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `id_kategori` int(11) UNSIGNED NOT NULL,
  `id_satuan` int(11) UNSIGNED NOT NULL,
  `harga` varchar(100) NOT NULL,
  `stok` varchar(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `kode_produk`, `nama_produk`, `id_kategori`, `id_satuan`, `harga`, `stok`, `created_at`, `updated_at`) VALUES
(2, 'A001', 'Susu Ultra', 2, 1, '7000', '37', '2024-07-12 09:46:51', '2024-07-13 04:28:26'),
(3, 'A002', 'Teh Gelas', 2, 1, '2000', '0', '2024-07-12 09:47:18', '2024-07-12 09:47:18');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `id_satuan` int(11) UNSIGNED NOT NULL,
  `nama_satuan` varchar(100) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`id_satuan`, `nama_satuan`, `created_at`, `updated_at`) VALUES
(1, 'pcs', '2024-07-12 04:47:18', '2024-07-12 04:47:18');

-- --------------------------------------------------------

--
-- Table structure for table `stok_keluar`
--

CREATE TABLE `stok_keluar` (
  `id_stok_keluar` int(11) UNSIGNED NOT NULL,
  `id_produk` int(11) UNSIGNED NOT NULL,
  `id_supplier` int(11) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `detail` varchar(100) NOT NULL,
  `qty` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `stok_masuk`
--

CREATE TABLE `stok_masuk` (
  `id_stok_masuk` int(11) UNSIGNED NOT NULL,
  `id_produk` int(11) UNSIGNED NOT NULL,
  `id_supplier` int(11) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `type` varchar(10) NOT NULL,
  `detail` varchar(100) NOT NULL,
  `qty` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `stok_masuk`
--

INSERT INTO `stok_masuk` (`id_stok_masuk`, `id_produk`, `id_supplier`, `id_user`, `type`, `detail`, `qty`, `tanggal`, `created_at`, `updated_at`) VALUES
(6, 2, 2, 1, 'Masuk', 'Stok Awal ', '50', '2024-07-12', '2024-07-12 14:01:37', '2024-07-12 14:01:37');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) UNSIGNED NOT NULL,
  `nama_supplier` varchar(100) NOT NULL,
  `no_telephone` varchar(12) NOT NULL,
  `alamat` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `nama_supplier`, `no_telephone`, `alamat`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'NB Store', '082239659774', 'Ambon', 'NB Store', '2024-07-12 04:46:37', '2024-07-12 04:46:37'),
(2, 'Maluku City ', '082254367765', 'Ambon, Galala', 'Syppy Utama', '2024-07-12 13:59:52', '2024-07-24 03:12:23');

-- --------------------------------------------------------

--
-- Table structure for table `testimoni`
--

CREATE TABLE `testimoni` (
  `id_test` bigint(11) UNSIGNED NOT NULL,
  `id_user` int(11) NOT NULL,
  `ulasan` text NOT NULL,
  `performa` varchar(255) NOT NULL,
  `desain` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimoni`
--

INSERT INTO `testimoni` (`id_test`, `id_user`, `ulasan`, `performa`, `desain`, `created_at`, `updated_at`) VALUES
(9, 2, 'The best !! myPos sangat membantu saya untuk mengelola bisnis saya . terima kasih myPos Team. good job !!! 🥰👌😊😊❤️', 'Sangat Baik', 'Sangat menarik ', '2024-07-23 15:17:46', '2024-07-23 15:17:46');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(11) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `level` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `email`, `password`, `foto`, `level`, `alamat`, `created_at`, `updated_at`) VALUES
(1, 'Banyu Gurium', 'Bayu', 'bhentbayu@gmail.com', '$2y$10$AQPSAGMH7NSu9h3jwymwbuaCK0Tr0y1SndZgHCx2.KJEfr4c.ejKu', '1721729336_be88367ba5d084d8e84d.jpg', '1', 'Ambon', '2024-07-12 04:42:34', '2024-07-23 10:08:56'),
(2, 'Yunita Bayu', 'Nita', 'nita26@gmail.com', '$2y$10$2xmjQuUBhQxEkcQCGfmQ6.fI9XzC66doJciTsIjbMogcuZ3aLtxjC', '1721726184_d501bdf4df38aae447f9.png', '2', 'Ambon', '2024-07-13 11:42:29', '2024-07-23 09:16:24'),
(3, 'Egan Gurium', 'Egan', 'egan@gmail.com', '$2y$10$0AEqz6i113epVtBKTsgoVeguDg7uDa/hO5Mq5rIQWAn5wt66/INb2', 'default.png', '2', 'Gorom', '2024-07-23 10:35:25', '2024-07-23 10:35:25');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `cart_id_produk_foreign` (`id_produk`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `produk_id_kategori_foreign` (`id_kategori`),
  ADD KEY `produk_id_satuan_foreign` (`id_satuan`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`id_satuan`);

--
-- Indexes for table `stok_keluar`
--
ALTER TABLE `stok_keluar`
  ADD PRIMARY KEY (`id_stok_keluar`),
  ADD KEY `stok_keluar_id_produk_foreign` (`id_produk`),
  ADD KEY `stok_keluar_id_supplier_foreign` (`id_supplier`);

--
-- Indexes for table `stok_masuk`
--
ALTER TABLE `stok_masuk`
  ADD PRIMARY KEY (`id_stok_masuk`),
  ADD KEY `stok_masuk_id_produk_foreign` (`id_produk`),
  ADD KEY `stok_masuk_id_supplier_foreign` (`id_supplier`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indexes for table `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_test`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `detail_penjualan`
--
ALTER TABLE `detail_penjualan`
  MODIFY `id_detail` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `id_satuan` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `stok_keluar`
--
ALTER TABLE `stok_keluar`
  MODIFY `id_stok_keluar` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `stok_masuk`
--
ALTER TABLE `stok_masuk`
  MODIFY `id_stok_masuk` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id_test` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`);

--
-- Constraints for table `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `produk_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`),
  ADD CONSTRAINT `produk_id_satuan_foreign` FOREIGN KEY (`id_satuan`) REFERENCES `satuan` (`id_satuan`);

--
-- Constraints for table `stok_keluar`
--
ALTER TABLE `stok_keluar`
  ADD CONSTRAINT `stok_keluar_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `stok_keluar_id_supplier_foreign` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`);

--
-- Constraints for table `stok_masuk`
--
ALTER TABLE `stok_masuk`
  ADD CONSTRAINT `stok_masuk_id_produk_foreign` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`),
  ADD CONSTRAINT `stok_masuk_id_supplier_foreign` FOREIGN KEY (`id_supplier`) REFERENCES `supplier` (`id_supplier`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
