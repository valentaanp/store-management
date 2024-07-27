-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 27, 2024 at 10:42 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `IdBarang` bigint(20) UNSIGNED NOT NULL,
  `NamaBarang` varchar(100) NOT NULL,
  `Keterangan` varchar(100) NOT NULL,
  `Satuan` varchar(50) NOT NULL,
  `Jumlah` int(11) NOT NULL,
  `HargaPerBarang` decimal(10,2) NOT NULL,
  `IdPengguna` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`IdBarang`, `NamaBarang`, `Keterangan`, `Satuan`, `Jumlah`, `HargaPerBarang`, `IdPengguna`) VALUES
(1, 'Laptop', 'Laptop gaming dengan spesifikasi tinggi', 'unit', 10, 15000000.00, 1),
(2, 'Printer', 'Printer laser warna', 'unit', 5, 3000000.00, 2),
(3, 'Mouse', 'Mouse wireless', 'unit', 20, 200000.00, 3),
(4, 'Keyboard', 'Keyboard mekanik', 'unit', 15, 500000.00, 4),
(5, 'Monitor', 'Monitor 24 inci', 'unit', 8, 2500000.00, 5),
(6, 'Hard Disk', 'Hard Disk eksternal 1TB', 'unit', 12, 1000000.00, 6),
(7, 'Flash Drive', 'Flash Drive 64GB', 'unit', 25, 150000.00, 7),
(8, 'Router', 'Router Wi-Fi 6', 'unit', 6, 2000000.00, 8),
(9, 'Webcam', 'Webcam Full HD', 'unit', 18, 800000.00, 9),
(10, 'Speaker', 'Speaker Bluetooth', 'unit', 22, 750000.00, 10);

-- --------------------------------------------------------

--
-- Table structure for table `hakakses`
--

CREATE TABLE `hakakses` (
  `IdAkses` bigint(20) UNSIGNED NOT NULL,
  `NamaAkses` varchar(50) NOT NULL,
  `Keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hakakses`
--

INSERT INTO `hakakses` (`IdAkses`, `NamaAkses`, `Keterangan`) VALUES
(1, 'Admin', 'Akses penuh ke semua fitur dan data'),
(2, 'Manager', 'Akses ke manajemen data dan laporan'),
(3, 'Staff', 'Akses terbatas ke data operasional'),
(4, 'Customer', 'Akses ke informasi pribadi dan pembelian'),
(5, 'Supplier', 'Akses ke manajemen produk dan stok'),
(6, 'Guest', 'Akses terbatas untuk melihat informasi'),
(7, 'Operator', 'Akses untuk mengoperasikan mesin dan alat'),
(8, 'Technician', 'Akses untuk perbaikan dan pemeliharaan'),
(9, 'Support', 'Akses untuk dukungan pelanggan'),
(10, 'Sales', 'Akses untuk penjualan dan pelanggan');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(23, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(24, '2024_07_23_030240_create_hakakses_table', 1),
(25, '2024_07_23_030531_create_pengguna_table', 1),
(26, '2024_07_23_031006_create_barang_table', 1),
(27, '2024_07_23_031159_create_pelanggan_table', 1),
(28, '2024_07_23_031349_create_supplier_table', 1),
(29, '2024_07_23_031459_create_pembelian_table', 1),
(30, '2024_07_23_031758_create_penjualan_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `IdPelanggan` bigint(20) UNSIGNED NOT NULL,
  `NamaPelanggan` varchar(255) NOT NULL,
  `Alamat` text NOT NULL,
  `NoHp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`IdPelanggan`, `NamaPelanggan`, `Alamat`, `NoHp`) VALUES
(1, 'Lani', 'Jl Nangka 1', '081234567890'),
(2, 'Liana', 'Jl Mangga 2', '081234567891'),
(3, 'Lana', 'Jl Anggur 3', '081234567892'),
(4, 'Vero', 'Jl Mengkudu 4', '081234567893'),
(5, 'Viano', 'Jl Salak 5', '081234567894'),
(6, 'Fandi', 'Jl Pepaya 6', '081234567895'),
(7, 'Kiko', 'Jl Pisang 7', '081234567896'),
(8, 'Refal', 'Jl Melon 8', '081234567897'),
(9, 'Ibra', 'Jl Apel 9', '081234567898'),
(10, 'Kiara', 'Jl Jeruk 10', '081234567899'),
(11, 'Katie', 'Jl Lemon 11', '081234567900'),
(12, 'Batara', 'Jl Pepaya 12', '081234567901'),
(13, 'Galel', 'Jl Duku 13', '081234567902'),
(14, 'Cici', 'Jl Jambu 14', '081234567903'),
(15, 'Azkha', 'Jl Nangka 15', '081234567904'),
(16, 'Aisya', 'Jl Nanas 16', '081234567905'),
(17, 'Chasi', 'Jl Bengkoang 17', '081234567906'),
(18, 'Cheva', 'Jl Melon 18', '081234567907'),
(19, 'Olin', 'Jl Apel 19', '081234567908'),
(20, 'Liora', 'Jl Mengkudu 20', '081234567909');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `IdPembelian` bigint(20) UNSIGNED NOT NULL,
  `JumlahPembelian` bigint(20) NOT NULL,
  `HargaBeli` decimal(10,2) NOT NULL,
  `IdBarang` bigint(20) UNSIGNED NOT NULL,
  `IdPengguna` bigint(20) UNSIGNED NOT NULL,
  `IdSupplier` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`IdPembelian`, `JumlahPembelian`, `HargaBeli`, `IdBarang`, `IdPengguna`, `IdSupplier`) VALUES
(1, 10, 10000000.00, 1, 1, 1),
(2, 15, 3000000.00, 2, 2, 2),
(3, 8, 16000000.00, 3, 3, 3),
(4, 12, 7200000.00, 4, 4, 4),
(5, 20, 20000000.00, 5, 5, 5),
(6, 5, 2500000.00, 6, 6, 6),
(7, 7, 3500000.00, 7, 7, 7),
(8, 9, 4500000.00, 8, 8, 8),
(9, 6, 2400000.00, 9, 9, 9),
(10, 11, 5500000.00, 10, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `IdPengguna` bigint(20) UNSIGNED NOT NULL,
  `NamaPengguna` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL,
  `NamaDepan` varchar(50) NOT NULL,
  `NamaBelakang` varchar(50) NOT NULL,
  `NoHp` varchar(15) NOT NULL,
  `Alamat` text NOT NULL,
  `IdAkses` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`IdPengguna`, `NamaPengguna`, `Password`, `NamaDepan`, `NamaBelakang`, `NoHp`, `Alamat`, `IdAkses`) VALUES
(1, 'admin1', 'password123', 'John', 'Doe', '081234567890', 'Jl. Merdeka No. 1, Jakarta', 1),
(2, 'manager1', 'password123', 'Jane', 'Smith', '081234567891', 'Jl. Kemerdekaan No. 2, Jakarta', 2),
(3, 'staff1', 'password123', 'Robert', 'Brown', '081234567892', 'Jl. Proklamasi No. 3, Jakarta', 3),
(4, 'customer1', 'password123', 'Michael', 'Johnson', '081234567893', 'Jl. Sudirman No. 4, Jakarta', 4),
(5, 'supplier1', 'password123', 'William', 'Williams', '081234567894', 'Jl. Thamrin No. 5, Jakarta', 5),
(6, 'guest1', 'password123', 'David', 'Jones', '081234567895', 'Jl. Gatot Subroto No. 6, Jakarta', 6),
(7, 'operator1', 'password123', 'Richard', 'Miller', '081234567896', 'Jl. Rasuna Said No. 7, Jakarta', 7),
(8, 'technician1', 'password123', 'Charles', 'Garcia', '081234567897', 'Jl. HR Rasuna Said No. 8, Jakarta', 8),
(9, 'support1', 'password123', 'Joseph', 'Martinez', '081234567898', 'Jl. Setiabudi No. 9, Jakarta', 9),
(10, 'sales1', 'password123', 'Thomas', 'Rodriguez', '081234567899', 'Jl. Kuningan No. 10, Jakarta', 10);

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `IdPenjualan` bigint(20) UNSIGNED NOT NULL,
  `JumlahPenjualan` bigint(20) NOT NULL,
  `HargaJual` decimal(10,2) NOT NULL,
  `IdBarang` bigint(20) UNSIGNED NOT NULL,
  `IdPengguna` bigint(20) UNSIGNED NOT NULL,
  `IdPelanggan` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`IdPenjualan`, `JumlahPenjualan`, `HargaJual`, `IdBarang`, `IdPengguna`, `IdPelanggan`) VALUES
(1, 5, 15000000.00, 1, 1, 1),
(2, 3, 2000000.00, 2, 2, 2),
(3, 10, 5000000.00, 3, 3, 3),
(4, 7, 12000000.00, 4, 4, 4),
(5, 2, 3000000.00, 5, 5, 5),
(6, 6, 9000000.00, 6, 6, 6),
(7, 8, 10000000.00, 7, 7, 7),
(8, 4, 4000000.00, 8, 8, 8),
(9, 9, 14000000.00, 9, 9, 9),
(10, 1, 7000000.00, 10, 10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `IdSupplier` bigint(20) UNSIGNED NOT NULL,
  `NamaSupplier` varchar(255) NOT NULL,
  `Alamat` text NOT NULL,
  `NoHp` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`IdSupplier`, `NamaSupplier`, `Alamat`, `NoHp`) VALUES
(1, 'Diana', 'Jl Pisang 1', '081234567890'),
(2, 'Danang', 'Jl Apel 1', '081234567891'),
(3, 'Sinta', 'Jl Mangga 1', '081234567892'),
(4, 'Kelvin', 'Jl Apel 2', '081234567893'),
(5, 'Kiki', 'Jl Jeruk 1', '081234567894'),
(6, 'Caca', 'Jl Anggur 1', '081234567895'),
(7, 'Cia', 'Jl Apel 3’', '081234567896'),
(8, 'Tana', 'Jl Nangka 8', '081234567897'),
(9, 'Tia', 'Jl Pisang 9', '081234567898'),
(10, 'Tara', 'Jl Tomat 10', '081234567899'),
(11, 'Budi', 'Jl Semangka 11', '081234567900'),
(12, 'Bina', 'Jl Anggur 12', '081234567901'),
(13, 'Bian', 'Jl Melon13', '081234567902'),
(14, 'Aira', 'Jl Nanas 14', '081234567903'),
(15, 'Rian', 'Jl Mangga 15', '081234567904'),
(16, 'Riri', 'Jl Bengkoang 16', '081234567905'),
(17, 'Ria', 'Jl Nangka 17', '081234567906'),
(18, 'Kino', 'Jl Pisang 18', '081234567907'),
(19, 'Candra', 'Jl Lemon 19', '081234567908'),
(20, 'Cinta', 'Jl Jambu 20', '081234567909');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`IdBarang`),
  ADD KEY `barang_idpengguna_foreign` (`IdPengguna`);

--
-- Indexes for table `hakakses`
--
ALTER TABLE `hakakses`
  ADD PRIMARY KEY (`IdAkses`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`IdPelanggan`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`IdPembelian`),
  ADD KEY `pembelian_idbarang_foreign` (`IdBarang`),
  ADD KEY `pembelian_idpengguna_foreign` (`IdPengguna`),
  ADD KEY `pembelian_idsupplier_foreign` (`IdSupplier`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`IdPengguna`),
  ADD KEY `pengguna_idakses_foreign` (`IdAkses`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`IdPenjualan`),
  ADD KEY `penjualan_idbarang_foreign` (`IdBarang`),
  ADD KEY `penjualan_idpengguna_foreign` (`IdPengguna`),
  ADD KEY `penjualan_idpelanggan_foreign` (`IdPelanggan`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`IdSupplier`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `IdBarang` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `hakakses`
--
ALTER TABLE `hakakses`
  MODIFY `IdAkses` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `IdPelanggan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `IdPembelian` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `IdPengguna` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `IdPenjualan` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `IdSupplier` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_idpengguna_foreign` FOREIGN KEY (`IdPengguna`) REFERENCES `pengguna` (`IdPengguna`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD CONSTRAINT `pembelian_idbarang_foreign` FOREIGN KEY (`IdBarang`) REFERENCES `barang` (`IdBarang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembelian_idpengguna_foreign` FOREIGN KEY (`IdPengguna`) REFERENCES `pengguna` (`IdPengguna`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembelian_idsupplier_foreign` FOREIGN KEY (`IdSupplier`) REFERENCES `supplier` (`IdSupplier`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD CONSTRAINT `pengguna_idakses_foreign` FOREIGN KEY (`IdAkses`) REFERENCES `hakakses` (`IdAkses`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_idbarang_foreign` FOREIGN KEY (`IdBarang`) REFERENCES `barang` (`IdBarang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penjualan_idpelanggan_foreign` FOREIGN KEY (`IdPelanggan`) REFERENCES `pelanggan` (`IdPelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `penjualan_idpengguna_foreign` FOREIGN KEY (`IdPengguna`) REFERENCES `pengguna` (`IdPengguna`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
