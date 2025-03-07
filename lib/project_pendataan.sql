-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 16, 2023 at 06:30 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_pendataan`
--

-- --------------------------------------------------------

--
-- Table structure for table `aset_lainnya`
--

CREATE TABLE `aset_lainnya` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bidang_id` int(11) NOT NULL,
  `jenis_nama_barang` varchar(255) DEFAULT NULL,
  `nomor_kode_barang` varchar(255) DEFAULT NULL,
  `nomor_register` varchar(255) DEFAULT NULL,
  `tahun_pengadaan` varchar(255) DEFAULT NULL,
  `judul_nama` varchar(255) DEFAULT NULL,
  `pencipta` varchar(255) DEFAULT NULL,
  `spesifikasi` varchar(255) DEFAULT NULL,
  `kondisi` varchar(255) DEFAULT NULL,
  `asal_usul` varchar(255) DEFAULT NULL,
  `harga` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `jumlah` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `qr_code` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `aset_lainnya`
--

INSERT INTO `aset_lainnya` (`id`, `user_id`, `bidang_id`, `jenis_nama_barang`, `nomor_kode_barang`, `nomor_register`, `tahun_pengadaan`, `judul_nama`, `pencipta`, `spesifikasi`, `kondisi`, `asal_usul`, `harga`, `foto`, `jumlah`, `keterangan`, `qr_code`) VALUES
(1, 2, 1, '8989', '89', '898', '98', '9', '898', '98', 'Rusak', '9', '89', 'foto/2-1.jpg', '898', '33', 'qrCode/AsetLainnya/2-1.png');

-- --------------------------------------------------------

--
-- Table structure for table `aset_tanah`
--

CREATE TABLE `aset_tanah` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bidang_id` int(11) NOT NULL,
  `jenis_barang` varchar(255) DEFAULT NULL,
  `register` varchar(255) DEFAULT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `kode_barang` varchar(255) DEFAULT NULL,
  `luas_m2` varchar(255) DEFAULT NULL,
  `tahun_pengadaan` varchar(255) DEFAULT NULL,
  `letak_alamat` varchar(255) DEFAULT NULL,
  `hak` varchar(255) DEFAULT NULL,
  `tanggal_setifikat` varchar(255) DEFAULT NULL,
  `nomor_serikat` varchar(255) DEFAULT NULL,
  `penggunaan` varchar(255) DEFAULT NULL,
  `asal_usul` varchar(255) DEFAULT NULL,
  `harga` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `qr_code` varchar(255) DEFAULT NULL,
  `kondisi` varchar(255) DEFAULT NULL,
  `jumlah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `aset_tanah`
--

INSERT INTO `aset_tanah` (`id`, `user_id`, `bidang_id`, `jenis_barang`, `register`, `nama_barang`, `kode_barang`, `luas_m2`, `tahun_pengadaan`, `letak_alamat`, `hak`, `tanggal_setifikat`, `nomor_serikat`, `penggunaan`, `asal_usul`, `harga`, `keterangan`, `foto`, `qr_code`, `kondisi`, `jumlah`) VALUES
(39, 2, 1, '6786876', '876', '876', '876', '876', '876', '876', '8', '2023-06-09', '768', '768', '768', '768', '76', 'foto/2-39.jpg', 'qrCode/AsetTanah/2-39.png', 'Baik', '876'),
(40, 8, 2, '6786', '876', '86', '876', '876', '876', '876', '876', '2023-08-07', '876', '876', '876', '87', '687', 'foto/8-40.jpg', 'qrCode/AsetTanah/8-40.png', 'Rusak', '20'),
(41, 2, 5, 'Tanah Bangunan Kantor Pemerintah', '01.01.01.04.001', 'Tanah Bangunan Kantor Pemerintah', '000001', '3.308,00', '2007', 'Jl. Jend. Sudirman No. 74 Marabahan', '-', '2019-05-24', '17.09.15.05.4.00064', 'Kantor Dinas Komunikasi dan Informatika', 'Pembeliannn', '', '-', 'foto/2-41', 'qrCode/AsetTanah/2-41.png', 'Baik', '1'),
(114, 2, 5, '11', '11', '11', '11', '11', '111', '11', '11', '2023-07-15', '11', '11', '11', '11', '11', 'foto/2-114.png', 'qrCode/AsetTanah/2-114.png', 'Baik', '11'),
(115, 2, 5, '11', '11', '11', '11', '11', '111', '11', '11', '2023-07-15', '11', '11', '11', '11', '11', 'foto/2-115.png', 'qrCode/AsetTanah/2-115.png', 'Baik', '11'),
(116, 2, 5, 'q', '1', 'q', '1', '1', '1', '1', '1', '2023-07-15', '1', '1', '1', '111', '1', 'foto/2-116', 'qrCode/AsetTanah/2-116.png', 'Baik', '1');

-- --------------------------------------------------------

--
-- Table structure for table `bidang`
--

CREATE TABLE `bidang` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `bidang`
--

INSERT INTO `bidang` (`id`, `kode`, `nama`) VALUES
(5, '1', 'Sekretariat'),
(6, '2', 'E-Government'),
(7, '3', 'Informasi Komunikasi Publik (IKP)'),
(8, '4', 'Statistik dan Persandian');

-- --------------------------------------------------------

--
-- Table structure for table `gedung_bangunan`
--

CREATE TABLE `gedung_bangunan` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bidang_id` int(11) NOT NULL,
  `jenis_barang` varchar(255) DEFAULT NULL,
  `nama_barang` varchar(255) DEFAULT NULL,
  `nomor_kode_barang` varchar(255) DEFAULT NULL,
  `nomor_register` varchar(255) DEFAULT NULL,
  `kondisi_bangunan` varchar(255) DEFAULT NULL,
  `kontruksi_bangunan_bertingkat` varchar(255) DEFAULT NULL,
  `kontruksi_bangunan_beton` varchar(255) DEFAULT NULL,
  `luas_lantai` varchar(255) DEFAULT NULL,
  `letak_lokasi_alamat` varchar(255) DEFAULT NULL,
  `tanggal_dokumen_gedung` varchar(255) DEFAULT NULL,
  `no_dokumen_gedung` varchar(255) DEFAULT NULL,
  `luas` varchar(255) DEFAULT NULL,
  `status_tanah` varchar(255) DEFAULT NULL,
  `nomor_kode_tanah` varchar(255) DEFAULT NULL,
  `asal_usul` varchar(255) DEFAULT NULL,
  `harga` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `qr_code` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `jumlah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `gedung_bangunan`
--

INSERT INTO `gedung_bangunan` (`id`, `user_id`, `bidang_id`, `jenis_barang`, `nama_barang`, `nomor_kode_barang`, `nomor_register`, `kondisi_bangunan`, `kontruksi_bangunan_bertingkat`, `kontruksi_bangunan_beton`, `luas_lantai`, `letak_lokasi_alamat`, `tanggal_dokumen_gedung`, `no_dokumen_gedung`, `luas`, `status_tanah`, `nomor_kode_tanah`, `asal_usul`, `harga`, `foto`, `qr_code`, `keterangan`, `jumlah`) VALUES
(1, 2, 3, '123', '123', '123', '123', 'Baik', '123', '123', '123', '123', '123', '123', '123', 'Baik', '123', '123', '123', '123', '123', '123', '123'),
(2, 2, 1, '090999', '989', '89', '898', 'Baik', '89', '89', '89', '89', '2023-06-15', '89', '89', 'Baik', '9898', '9', '89', 'foto/2-2.jpg', 'qrCode/GedungBangunan/2-2.png', '89', '89'),
(3, 2, 5, 'Bangunan Gedung Kantor Semi Permanen', 'Bangunan Gedung Kantor Semi Permanen', '03.01.01.01.002', '000001', 'Baik', 'Tidak', 'Beton', '330', 'Jl. Jend Sudirman Marabahan', '2015-12-31', '0', '-', 'Tanah Milik Pemda', '01.01.01.04.001. 0001', 'Pembelian', ' 2.399.477,90', 'foto/2-3.png', 'qrCode/GedungBangunan/2-3.png', 'Bangunan Kantor Dinas Komunikasi dan Informatika', '1'),
(4, 2, 5, 'Bangunan Gedung Kantor Lain lain', 'Bangunan Gedung Kantor Lain lain', '03.01.01.01.005', '000001', 'Baik', 'Tidak', 'Tidak', '6', 'JL.AES NASUTION MARABAHAN', '2015-12-31', '0', '-', 'Tanah Milik Pemda', '-', 'Pembelian', ' 25.710,00', 'foto/2-4.png', 'qrCode/GedungBangunan/2-4.png', 'PEMBUATAN DAN PEMASANGAN RANGKA BALEHO(DINAS KOMUNIKASI DAN INFORMATIKA )', '1'),
(5, 2, 5, 'Bangunan Gedung Kantor Lain lain', 'Bangunan Gedung Kantor Lain lain', '03.01.01.01.005', '000002', 'Baik', 'Tidak', 'Tidak', '6', 'JL.AES NASUTION MARABAHAN', '2015-12-31', '0', '-', 'Tanah Milik Pemda', '-', 'Pembelian', ' 25.000,00', 'foto/2-5.png', 'qrCode/GedungBangunan/2-5.png', 'PEMBUATAN DAN PEMASANGAN RANGKA BALEHO 2 DEPAN LAPANGAN BOLA 5 DESEMBER (DINAS KOMUNIKASI DAN INFORMATIKA )', '1'),
(6, 2, 5, 'Bangunan Gedung Kantor Lain lain', 'Bangunan Gedung Kantor Lain lain', '03.01.01.01.005', '000003', 'Baik', 'Tidak', 'Tidak', '24', 'JL.AES NASUTION MARABAHAN', '2015-12-31', '0', '-', 'Tanah Milik Pemda', '-', 'Pembelian', ' 25.665,00', 'foto/2-6.png', 'qrCode/GedungBangunan/2-6.png', 'PENGADAAN RANGKA BALEHO 3 (DINAS KOMUNIKASI DAN INFORMATIKA )', '1'),
(7, 2, 5, 'Bangunan Gedung Kantor Lain lain', 'Bangunan Gedung Kantor Lain lain', '03.01.01.01.005', '000004', 'Baik', 'Tidak', 'Tidak', '6', 'JLN.PANGLIMA WANGKANG KEL.MARABAHAN KOTA KEC.MARABAHAN', '2016-03-15', '0', '-', 'Tanah Milik Pemda', '-', 'Pembelian', ' 12.000,00', 'foto/2-7.png', 'qrCode/GedungBangunan/2-7.png', 'PENGADAAN RANGKA BALEHO 4 (DINAS KOMUNIKASI DAN INFORMATIKA )', '1'),
(8, 2, 5, 'Gedung Garasi/Pool Semi Permanen', 'Gedung Garasi/Pool Semi Permanen', '03.01.01.14.002', '000001', 'Baik', '-', '-', '0', 'JL.AES NASUTION MARABAHAN', '2015-12-31', '0', '-', '-', '-', 'Pembelian', ' 56.268,00', 'foto/2-8.png', 'qrCode/GedungBangunan/2-8.png', 'Pengadaan Konstruksi Bangunan/Tempat Parkir', '1'),
(9, 2, 5, 'Gedung Garasi/Pool Semi Permanen', 'Gedung Garasi/Pool Semi Permanen', '03.01.01.14.002', '000002', 'Baik', '-', '-', '0', 'JL.AES NASUTION MARABAHAN', '2015-12-31', '0', '-', '-', '-', 'Pembelian', ' 48.899,95', 'foto/2-9.png', 'qrCode/GedungBangunan/2-9.png', 'Pembangunan tempat parkir pada kegiatan pemeliharaan rutin/berkala taman, tempat parkir dan halaman kantor', '1'),
(10, 3, 6, 'Bangunan Menara Telekomunikasi Lain lain (dst)', 'Bangunan Menara Telekomunikasi Lain lain (dst)', '03.03.01.03.006', '000002', 'Baik', '-', '-', '0', 'Kecamatan Tamban', '2022-12-31', '0', '-', '-', '-', 'Pembelian', ' 57.757,50', 'foto/3-10.png', 'qrCode/GedungBangunan/3-10.png', 'Pengadaan Menara Backbone E Gov Kec. Tamban', '1'),
(11, 3, 6, 'Bangunan Menara Telekomunikasi Lain lain (dst)', 'Bangunan Menara Telekomunikasi Lain lain (dst)', '03.03.01.03.006', '000002', 'Baik', '-', '-', '0', 'Kecamatan Tamban', '2022-12-31', '0', '-', '-', '-', 'Pembelian', ' 57.757,50', 'foto/3-11.png', 'qrCode/GedungBangunan/3-11.png', 'Pengadaan Menara Backbone E Gov Kec. Tamban', '1'),
(12, 3, 6, 'Bangunan Menara Telekomunikasi Lain lain (dst)', 'Bangunan Menara Telekomunikasi Lain lain (dst)', '03.03.01.03.006', '000002', 'Baik', '-', '-', '0', 'Kecamatan Tamban', '2022-12-31', '0', '-', '-', '-', 'Pembelian', ' 57.757,50', 'foto/3-12.png', 'qrCode/GedungBangunan/3-12.png', 'Pengadaan Menara Backbone E Gov Kec. Tamban', '1'),
(13, 3, 6, 'Bangunan Menara Telekomunikasi Lain lain (dst)', 'Bangunan Menara Telekomunikasi Lain lain (dst)', '03.03.01.03.006', '000002', 'Baik', '-', '-', '0', 'Kecamatan Tamban', '2022-12-31', '0', '-', '-', '-', 'Pembelian', ' 57.757,50', 'foto/3-13.png', 'qrCode/GedungBangunan/3-13.png', 'Pengadaan Menara Backbone E Gov Kec. Tamban', '1'),
(14, 3, 6, 'Bangunan Menara Telekomunikasi Lain lain (dst)', 'Bangunan Menara Telekomunikasi Lain lain (dst)', '03.03.01.03.006', '000002', 'Baik', '-', '-', '0', 'Kecamatan Tamban', '2022-12-31', '0', '-', '-', '-', 'Pembelian', ' 57.757,50', 'foto/3-14.png', 'qrCode/GedungBangunan/3-14.png', 'Pengadaan Menara Backbone E Gov Kec. Tamban', '1'),
(15, 3, 6, 'Bangunan Menara Telekomunikasi Lain lain (dst)', 'Bangunan Menara Telekomunikasi Lain lain (dst)', '03.03.01.03.006', '000002', 'Baik', '-', '-', '0', 'Kecamatan Tamban', '2022-12-31', '0', '-', '-', '-', 'Pembelian', ' 57.757,50', 'foto/3-15.png', 'qrCode/GedungBangunan/3-15.png', 'Pengadaan Menara Backbone E Gov Kec. Tamban', '1'),
(16, 3, 6, 'Bangunan Menara Telekomunikasi Lain lain (dst)', 'Bangunan Menara Telekomunikasi Lain lain (dst)', '03.03.01.03.006', '000002', 'Baik', '-', '-', '0', 'Kecamatan Tamban', '2022-12-31', '0', '-', '-', '-', 'Pembelian', ' 57.757,50', 'foto/3-16.png', 'qrCode/GedungBangunan/3-16.png', 'Pengadaan Menara Backbone E Gov Kec. Tamban', '1'),
(17, 3, 6, 'Bangunan Menara Telekomunikasi Lain lain (dst)', 'Bangunan Menara Telekomunikasi Lain lain (dst)', '03.03.01.03.006', '000002', 'Baik', '-', '-', '0', 'Kecamatan Tamban', '2022-12-31', '0', '-', '-', '-', 'Pembelian', ' 57.757,50', 'foto/3-17.png', 'qrCode/GedungBangunan/3-17.png', 'Pengadaan Menara Backbone E Gov Kec. Tamban', '1'),
(18, 3, 6, 'Bangunan Menara Telekomunikasi Lain lain (dst)', 'Bangunan Menara Telekomunikasi Lain lain (dst)', '03.03.01.03.006', '000002', 'Baik', '-', '-', '0', 'Kecamatan Tamban', '2022-12-31', '0', '-', '-', '-', 'Pembelian', ' 57.757,50', 'foto/3-18.png', 'qrCode/GedungBangunan/3-18.png', 'Pengadaan Menara Backbone E Gov Kec. Tamban', '1'),
(19, 3, 6, 'Bangunan Menara Telekomunikasi Lain lain (dst)', 'Bangunan Menara Telekomunikasi Lain lain (dst)', '03.03.01.03.006', '000002', 'Baik', '-', '-', '0', 'Kecamatan Tamban', '2022-12-31', '0', '-', '-', '-', 'Pembelian', ' 57.757,50', 'foto/3-19.png', 'qrCode/GedungBangunan/3-19.png', 'Pengadaan Menara Backbone E Gov Kec. Tamban', '1'),
(20, 3, 6, 'Bangunan Menara Telekomunikasi Lain lain (dst)', 'Bangunan Menara Telekomunikasi Lain lain (dst)', '03.03.01.03.006', '000002', 'Baik', '-', '-', '0', 'Kecamatan Tamban', '2022-12-31', '0', '-', '-', '-', 'Pembelian', ' 57.757,50', 'foto/3-20.png', 'qrCode/GedungBangunan/3-20.png', 'Pengadaan Menara Backbone E Gov Kec. Tamban', '1'),
(21, 3, 6, 'Bangunan Menara Telekomunikasi Lain lain (dst)', 'Bangunan Menara Telekomunikasi Lain lain (dst)', '03.03.01.03.006', '000002', 'Baik', '-', '-', '0', 'Kecamatan Tamban', '2022-12-31', '0', '-', '-', '-', 'Pembelian', ' 57.757,50', 'foto/3-21.png', 'qrCode/GedungBangunan/3-21.png', 'Pengadaan Menara Backbone E Gov Kec. Tamban', '1'),
(22, 3, 6, 'Bangunan Menara Telekomunikasi Lain lain (dst)', 'Bangunan Menara Telekomunikasi Lain lain (dst)', '03.03.01.03.006', '000002', 'Baik', '-', '-', '0', 'Kecamatan Tamban', '2022-12-31', '0', '-', '-', '-', 'Pembelian', ' 57.757,50', 'foto/3-22.png', 'qrCode/GedungBangunan/3-22.png', 'Pengadaan Menara Backbone E Gov Kec. Tamban', '1'),
(23, 3, 6, 'Bangunan Menara Telekomunikasi Lain lain (dst)', 'Bangunan Menara Telekomunikasi Lain lain (dst)', '03.03.01.03.006', '000002', 'Baik', '-', '-', '0', 'Kecamatan Tamban', '2022-12-31', '0', '-', '-', '-', 'Pembelian', ' 57.757,50', 'foto/3-23.png', 'qrCode/GedungBangunan/3-23.png', 'Pengadaan Menara Backbone E Gov Kec. Tamban', '1');

-- --------------------------------------------------------

--
-- Table structure for table `peralatan_mesin`
--

CREATE TABLE `peralatan_mesin` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `bidang_id` int(11) NOT NULL,
  `kode_barang` varchar(255) DEFAULT NULL,
  `jenis_nama_barang` varchar(255) DEFAULT NULL,
  `register` varchar(255) DEFAULT NULL,
  `merk_type` varchar(255) DEFAULT NULL,
  `ukuran_cc` varchar(255) DEFAULT NULL,
  `bahan` varchar(255) DEFAULT NULL,
  `tahun_pembelian` varchar(255) DEFAULT NULL,
  `nomor_pabrik` varchar(255) DEFAULT NULL,
  `nomor_rangka` varchar(255) DEFAULT NULL,
  `nomor_mesin` varchar(255) DEFAULT NULL,
  `nomor_polisi` varchar(255) DEFAULT NULL,
  `nomor_bpkb` varchar(255) DEFAULT NULL,
  `asal_usul` varchar(255) DEFAULT NULL,
  `harga` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `qr_code` varchar(255) DEFAULT NULL,
  `kondisi` varchar(255) DEFAULT NULL,
  `keterangan` varchar(255) DEFAULT NULL,
  `jumlah` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `peralatan_mesin`
--

INSERT INTO `peralatan_mesin` (`id`, `user_id`, `bidang_id`, `kode_barang`, `jenis_nama_barang`, `register`, `merk_type`, `ukuran_cc`, `bahan`, `tahun_pembelian`, `nomor_pabrik`, `nomor_rangka`, `nomor_mesin`, `nomor_polisi`, `nomor_bpkb`, `asal_usul`, `harga`, `foto`, `qr_code`, `kondisi`, `keterangan`, `jumlah`) VALUES
(1, 2, 1, '123', '123', '123', '123', '123', '123', '123', '123', '123', '123', '123', '123', '123', '123', 'foto/2-1.jpg', 'qrCode/PeralatanMesin/2-1.png', 'Baik', '123', '123'),
(2, 3, 1, '1234', '1234', '1234', '1234', '1234', '1234', '1234', '1234', '1234', '1234', '1234', '1234', '1234', '1234', '1234', '1234', 'Rusak', '1234', '1234'),
(3, 2, 5, '02.01.03.04.005', 'electric generating set lainnya (dst)', '000001', 'YANMAR / 4TNV88 GGE', '-', 'Besi', '2017', '-', '-', '-', '-', '-', 'Pembelian', ' 106.800,00', 'foto/2-3.png', 'qrCode/PeralatanMesin/2-3.png', 'Baik', 'Pengadaan Electric Generating Set', '1'),
(4, 2, 5, '02.02.01.01.003', 'Station Wagon', '000001', 'Toyota New Kijang Innova 2.0 G A/T / New Kijang Innova 2.0 G A/T', '1.998 cc', 'Besi', '2019', '-', 'MHFJW8EMXK2376200', '1TR A682409', 'DA 1084 MD', 'Q 00355645 M', 'Pembelian', ' 337.000,00', 'foto/2-4.png', 'qrCode/PeralatanMesin/2-4.png', 'Baik', 'Mobil Kepala Dinas Kominfo', '1'),
(5, 2, 5, '02.02.01.01.003', 'Station Wagon', '000003', 'TOYOTA / NEW AVANZA 1.3 E M/T', '1300', 'Besi', '2014', '-', 'MHKM1BA2JEK055257', 'MD70964', 'DA 1346 MD', 'L 00572450 M', 'Pembelian', ' 155.560,00', 'foto/2-5.png', 'qrCode/PeralatanMesin/2-5.png', 'Baik', 'PENGADAAN MOBIL OPERASIONAL RODA 4', '1'),
(6, 2, 5, '02.02.01.01.003', 'Station Wagon', '000004', 'Toyota / Avanza 1300 G', '1298', 'Besi', '2021', '-', 'MHFM1BA3J8K19740', 'DD51237', 'DA 104 M', 'F 6068332', 'Pembelian', ' 147.800,00', 'foto/2-6.png', 'qrCode/PeralatanMesin/2-6.png', 'Baik', 'Mutasi dari Setda Ke kominfo berupa mobil satgas covid', '1'),
(7, 2, 5, '02.02.01.04.001', 'Sepeda Motor', '000001', 'HONDA / SUPRA X 125 NF12A1CF M/T', '124 CC', 'Besi', ' 2014', '-', 'MH1JBG111EK155256', 'JBG1E1154995', 'DA 698 MG', 'K 10872311 M', 'Pembelian', ' 16.994,00', 'foto/2-7.png', 'qrCode/PeralatanMesin/2-7.png', 'Baik', 'KABID KOMINFO ( ICHWAN HAKIM,S.HUT NIP.19660517 199703 1 001) (DINAS KOMUNIKASI DAN INFORMATIKA )', '1'),
(8, 2, 5, '02.02.01.04.001', 'Sepeda Motor', '000002', 'HONDA / VARIO 125 CBS', '125 CC', 'Besi', '2015', '-', 'MH1JFV110FK239353', 'JFVLE1237249', 'DA 749 MH', 'L 07232134', 'Pembelian', ' 17.957,00', 'foto/2-8.png', 'qrCode/PeralatanMesin/2-8.png', 'Baik', 'KASI TELEKOMUNIKASI DAN INFORMATIKA : IRFAN RACHMADY,S.Kom NIP. 19790511 200501 1 011 (DINAS KOMUNIKASI DAN INFORMATIKA )', '1'),
(9, 2, 5, '02.02.01.04.001', 'Sepeda Motor', '000003', 'HONDA / VARIO 125 eSP CBS', '125 CC', 'Besi', '2016', '-', 'MH1JFU118G K660359', 'JFU1E1659360', 'MI', 'M 04272104 M', 'Pembelian', ' 17.859,00', 'foto/2-9.png', 'qrCode/PeralatanMesin/2-9.png', 'Baik', 'PENGADAAN SEPEDA MOTOR MERK HONDA 125 CC(DINAS KOMUNIKASI DAN INFORMATIKA )', '1'),
(10, 2, 5, '02.02.01.04.001', 'Sepeda Motor', '000004', 'KAWASAKI  / KLX 150 G VIN', '150', 'Besi', '2018', '-', 'MH4LX150GJJP68774', 'LX150CEWB3987', 'DA 5154 MG', 'P 00232742 M', 'Pembelian', ' 29.550,87', 'foto/2-10.png', 'qrCode/PeralatanMesin/2-10.png', 'Baik', 'Pengadaan Kendaraan Dinas / Operasional Kawasaki KLX 150 G Vin 2018', '1'),
(11, 2, 5, '02.02.01.04.001', 'Sepeda Motor', '000005', 'HONDA / VARIO 125 CBS ISS', '125', 'Besi', ' 2018', '-', 'MH1JM5111JK126428', 'JM51E 1126340', 'DA 6137MAT', 'P 00228117 M', 'Pembelian', ' 19.617,00', 'foto/2-11.png', 'qrCode/PeralatanMesin/2-11.png', 'Baik', 'Pengadaan kendaraan Dinas / Operasional HONDA Vario 125 CBS   ISS', '1'),
(12, 2, 5, '02.02.01.04.001', 'Sepeda Motor', '000006', 'Honda New Vario 125 CBS ISS / A1F02N37M1 A/T', '125', 'Besi', '2019', '-', 'MH1JM5111KK266058', 'JM51E1265668', 'DA6783MAX', 'P 08506404', 'Pembelian', ' 19.583,06', 'foto/2-12.png', 'qrCode/PeralatanMesin/2-12.png', 'Baik', 'Pengadaan Kendraan Dinas dua buah Merk Honda New Vario 125 CBS ISS', '1'),
(13, 2, 5, '02.02.01.04.001', 'Sepeda Motor', '000007', 'Honda New Vario 125 CBS ISS / A1F02N37M1 A/T', '125', 'Besi', '2019', '-', 'MH1JM5113KK271052', 'JM51E1270827', 'DA6209MAY', 'P 08518727', 'Pembelian', ' 19.583,06', 'foto/2-13.png', 'qrCode/PeralatanMesin/2-13.png', 'Baik', 'Pengadaan Kendraan Dinas dua buah Merk Honda New Vario 125 CBS ISS', '1'),
(14, 2, 5, '02.02.01.04.001', 'Sepeda Motor', '000008', 'Honda Vario 125 CBS / A1F02N36M1 A/T', '125cc', 'Besi', '2019', '-', 'MH1JM4115KK486734', 'JM41E 1486266', 'DA6752MBE', 'Q 00550546 M', 'Pembelian', ' 19.300,00', 'foto/2-14.png', 'qrCode/PeralatanMesin/2-14.png', 'Baik', 'Sepeda Motor', '1'),
(15, 2, 5, '02.02.01.04.001', 'Sepeda Motor', '000009', 'Honda / Honda Supra X 125 CW FI', '125cc', 'Besi', '2020', '-', 'MH1JBP119LK805478', 'JBP1E1805404', 'DA 4196 MM', 'Q09139129M', 'Pembelian', ' 18.100,00', 'foto/2-15.png', 'qrCode/PeralatanMesin/2-15.png', 'Baik', 'Sepeda Motor Honda Supra X 125 CW FI', '1'),
(16, 2, 5, '02.02.01.04.001', 'Sepeda Motor', '000010', 'Honda / Honda New CB 150 Verza CW', '150cc', 'Besi', '2020', '-', 'MH1KC0212LK107639', 'KC02E1107140', 'DA 4301 MM', 'Q09140711M', 'Pembelian', ' 19.700,00', 'foto/2-16.png', 'qrCode/PeralatanMesin/2-16.png', 'Baik', 'Sepeda Motor Honda New CB 150 Verza CW', '1'),
(17, 2, 5, '02.05.01.01.001', 'Mesin Ketik Manual Portable (11 13 Inci)', '000001', 'ROYAL EXPRESS 13 / EXPRESS 13', '150 INC', 'PLASTIK', ' 2011', '-', '-', '-', '-', '-', 'Pembelian', ' 2.523,31', 'foto/2-17.png', 'qrCode/PeralatanMesin/2-17.png', 'Baik', 'PENGADAAN MESIN KETIK MANUAL MERK ROYAL EXPRESS 13  5 UNIT (DINAS KOMUNIKASI DAN INFORMATIKA )', '1'),
(18, 2, 5, '02.05.01.02.010', 'Mesin Absen (Time Recorder)', '000001', 'Nitgen /  -', '-', '-', ' 2010', '-', '-', '-', '-', '-', 'Pembelian', ' 9.982,50', 'foto/2-18.png', 'qrCode/PeralatanMesin/2-18.png', 'Baik', '-', '1'),
(19, 2, 5, '02.05.01.04.001', 'Lemari Besi/Metal', '000001', 'Brother', '-', 'Besi', '2014', '-', '-', '-', '-', '-', 'Pembelian', ' 2.900,00', 'foto/2-19.png', 'qrCode/PeralatanMesin/2-19.png', 'Baik', 'Pengadaan Lemari Besi', '1'),
(20, 2, 5, '02.05.01.04.001', 'Lemari Besi/Metal', '000002', 'BROTHER', '-', 'Besi', ' 2008', '-', '-', '-', '-', '-', 'Pembelian', ' 2.000,00', 'foto/2-20.png', 'qrCode/PeralatanMesin/2-20.png', 'Baik', '(DINAS KOMUNIKASI DAN INFORMATIKA )', '1'),
(21, 2, 5, '02.05.01.04.005', 'Filing Cabinet Besi', '000001', 'Lion', '-', '-', ' 2013', '-', '-', '-', '-', '-', 'Pembelian', ' 3.200,00', 'foto/2-21.png', 'qrCode/PeralatanMesin/2-21.png', 'Baik', 'Pengadaan Filling Kabinet', '1'),
(22, 2, 5, '02.05.01.04.005', 'Filing Cabinet Besi', '000002', 'LION', '-', 'Besi', '  2014', '-', '-', '-', '-', '-', 'Pembelian', ' 3.500,00', 'foto/2-22.png', 'qrCode/PeralatanMesin/2-22.png', 'Baik', 'Pengadaan filling Besi/Arsip', '1'),
(23, 2, 5, '02.05.02.01.048', 'Sofa', '000001', 'Melayu / 321', '-', '-', ' 2012', '-', '-', '-', '-', '-', 'Pembelian', ' 10.950,00', 'foto/2-23.png', 'qrCode/PeralatanMesin/2-23.png', 'Baik', 'Pengadaan Sofa/Kursi Tamu', '1'),
(24, 2, 5, '02.05.01.04.005', 'Filing Cabinet Besi', '000004', 'BROTHER', '-', 'BESI', ' 2008', '-', '-', '-', '-', '-', 'Pembelian', ' 2.000,00', 'foto/2-24.png', 'qrCode/PeralatanMesin/2-24.png', 'Baik', '(DINAS KOMUNIKASI DAN INFORMATIKA )', '1'),
(25, 2, 5, '02.05.01.04.007', 'Brandkas', '000001', 'National /  -', '-', 'Besi', '1997', '-', '-', '-', '-', '-', 'Pembelian', ' 2.523,31', 'foto/2-25.png', 'qrCode/PeralatanMesin/2-25.png', 'Baik', 'tgl pembelian tdk diketahui', '1'),
(26, 2, 5, '02.05.01.05.076', 'Papan Nama Instansi', '000001', '-', '-', '-', ' 2011', '-', '-', '-', '-', '-', 'Pembelian', ' 1.750,00', 'foto/2-26.png', 'qrCode/PeralatanMesin/2-26.png', 'Baik', 'Pengadaan Nama Dinas/instansi', '1'),
(27, 2, 5, '02.05.01.05.076', 'Papan Nama Instansi', '000002', '-', '-', '-', ' 2011', '-', '-', '-', '-', '-', 'Pembelian', ' 450,00', 'foto/2-27.png', 'qrCode/PeralatanMesin/2-27.png', 'Baik', 'Papan Nama Jabatan', '1'),
(28, 2, 5, '02.05.01.05.076', 'Papan Nama Instansi', '000003', '-', '-', '-', ' 2011', '-', '-', '-', '-', '-', 'Pembelian', ' 750,00', 'foto/2-28.png', 'qrCode/PeralatanMesin/2-28.png', 'Baik', 'Pengadaan Bagan Organisasi', '1'),
(29, 2, 5, '02.05.02.01.008', 'Meja Rapat', '000001 s/d 000008', 'Activ  / Galant MKO 120', '-', '-', '  2016', '-', '-', '-', '-', '-', 'Pembelian', ' 12.425,60', 'foto/2-29.png', 'qrCode/PeralatanMesin/2-29.png', 'Baik', 'Pengadaan Meja Rapat', '8');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `bidang_id` int(11) DEFAULT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` int(11) NOT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `bidang_id`, `nama`, `username`, `password`, `role`, `last_login`, `token`) VALUES
(1, NULL, 'admin pertama', 'admin', '$2y$10$bpbmNKAvhN0KvVA0l4XUSu77GG0W1mn/SncxfdwsCBG5lo1cEZyXe', 1, '2023-07-15 06:42:58', '$2y$10$ZPx59oKj0ARJLOV7qTH7beWQs0xTZK1kOyYbVXjsQOTowHuKJYbFW.h4R1$2y$10$qRE6m6ekSGXuUXkdAa02i.3cmjWeOuX8OnL77TfKR1mK4IN8Ax5eq'),
(2, 5, 'Sekretariat', 'Sekretariat', '$2y$10$GF4f3tWJjJX7l7hySXOvZO7RWTeVzcngr.YSPsrwqmbe8CuPj9Kny', 2, '2023-07-15 12:32:03', '$2y$10$IgPKD7x0wUSGXZgyZMU3N.7B.g.ZFke7DOEvkLgTa9D0SjZbB2k9K.h4R1$2y$10$VFWUethbe3t9kfcXaw.wfubWlterVq85dvdyMiKnshJkrUGFi6esS'),
(3, 6, 'E-Government', 'E-Government', '$2y$10$uNBhf5ZKm7SLXzjs.kTEdeh3BJKDsc1uVP7vw/wXhjZwFHWy5Enbe', 2, '2023-07-12 05:38:42', '$2y$10$MmI0FEgkvtf/fNwRmVtSZOLgFgndjZr/a82.5SqZgdP2qn/9nLf9S.h4R1$2y$10$rh1h4Sy6NN5psZWMTbkfteZolEGqc9oIMZAAnt/c0vdbbjcvThMza'),
(5, 7, 'IKP', 'IKP', '$2y$10$t6T321QoVQsOx.PcKHcX3uWXyCUnhYbMWzSjWaPR44I5YmmoWPbS2', 2, NULL, '$2y$10$pKyxsy9yOqg7NeclwCHzfOE7EaQmri3YHEkEkI62A0OkMy4fvx.eq.h4R1$2y$10$kzNPXOm0Du9wMEjoRQlEm.PAT4ym4ka88RXAMLkxBqTeSZeS1BpdO'),
(6, 8, 'SP', 'SP', '$2y$10$n4bC/Zl./Fb2LwO2kSkpbO3b/Dva4gaPbqd8zmq1R8HBDXfdFAMD2', 2, NULL, '$2y$10$4UFDv9CV66WtADVBCq7wYeG6cnYSwo9DuF3rNMZuYnejj2ZPWmAv2.h4R1$2y$10$5hX3SyOJV4kJ6DGks5.8kOVTJpEuyXz22JYzUIW9m1Bi9.d.MRin2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `aset_lainnya`
--
ALTER TABLE `aset_lainnya`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `aset_tanah`
--
ALTER TABLE `aset_tanah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bidang`
--
ALTER TABLE `bidang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gedung_bangunan`
--
ALTER TABLE `gedung_bangunan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peralatan_mesin`
--
ALTER TABLE `peralatan_mesin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `aset_lainnya`
--
ALTER TABLE `aset_lainnya`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `aset_tanah`
--
ALTER TABLE `aset_tanah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `bidang`
--
ALTER TABLE `bidang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `gedung_bangunan`
--
ALTER TABLE `gedung_bangunan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `peralatan_mesin`
--
ALTER TABLE `peralatan_mesin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
