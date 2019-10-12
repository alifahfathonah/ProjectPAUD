-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 23, 2019 at 04:01 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `websekolah`
--

-- --------------------------------------------------------

--
-- Table structure for table `album_models`
--

CREATE TABLE `album_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `album_models`
--

INSERT INTO `album_models` (`id`, `judul`, `slug`, `tanggal`, `status`, `created_at`, `updated_at`) VALUES
(3, 'ini nama', 'ini-nama', '2019-01-15', 'Y', '2019-01-22 09:41:11', '2019-01-22 09:41:11'),
(4, 'jdas', 'jdas', '2019-01-02', 'Y', '2019-01-22 06:08:56', '2019-01-22 06:08:56'),
(5, 'sda', 'sda', '2019-01-09', 'Y', '2019-01-22 06:09:09', '2019-01-22 06:09:09');

-- --------------------------------------------------------

--
-- Table structure for table `banner_models`
--

CREATE TABLE `banner_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imgbanner` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banner_models`
--

INSERT INTO `banner_models` (`id`, `title`, `link`, `imgbanner`, `status`, `created_at`, `updated_at`) VALUES
(2, 'dikti', 'https://www.google.com/search?client=firefox-b-ab&q=dikti', 'IMG_dikti_2019_01_21_12_24_14.png', 'Y', '2019-01-21 20:14:24', '2019-01-21 20:14:24'),
(3, 'dikti', 'https://www.google.com/search?client=firefox-b-ab&q=dikti', 'IMG_dikti_2019_01_21_12_53_14.jpg', 'Y', '2019-01-21 20:14:53', '2019-01-21 20:14:53');

-- --------------------------------------------------------

--
-- Table structure for table `berita_models`
--

CREATE TABLE `berita_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deskripsi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `isi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `fotoheader` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `popular` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `berita_models`
--

INSERT INTO `berita_models` (`id`, `judul`, `slug`, `deskripsi`, `isi`, `fotoheader`, `status`, `popular`, `created_at`, `updated_at`) VALUES
(1, 'berita 1', 'berita-1', 'ini adalah berita 1', 'ini adalah berita 1ini adalah berita 1ini adalah berita 1ini adalah berita 1ini adalah berita 1', 'IMG_berita_1_2019_01_21_12_12_01.png', 'Y', 6, '2019-01-21 20:01:12', '2019-01-22 21:50:15'),
(2, 'berita 2', 'berita-2', 'ini adalah berita 2', 'ini adalah berita 2 ini adalah berita 2ini adalah berita 2ini adalah berita 2ini adalah berita 2', '0', 'Y', 0, '2019-01-21 20:01:39', '2019-01-21 20:01:39'),
(3, 'mfd', 'mfd', 'sdaf', 'sda', 'IMG_mfd_2019_01_21_21_28_35.jpg', 'Y', 3, '2019-01-22 05:35:28', '2019-01-22 21:46:22'),
(4, 'kkksad', 'kkksad', 'sdaf', 'sdafsaf dsfa', 'IMG_kkksad_2019_01_21_22_14_03.jpg', 'Y', 0, '2019-01-22 06:03:14', '2019-01-22 06:03:14'),
(5, 'kvnad nsdak ndclkdsa k sdcnaksjncl dsacnkjsa cjanckjdnaskjc sajknckjsndcklja ckjnsd kjnsdlknajlkaskj', 'kvnad-nsdak-ndclkdsa-k-sdcnaksjncl-dsacnkjsa-cjanckjdnaskjc-sajknckjsndcklja-ckjnsd-kjnsdlknajlkaskj', 'dsa dsa csd ini adalaj percobaan yang dilakuknsdal jnsdjkal kjncaslc lanjck sackjnalkc dckjasndclkdsa k sdcnaksjncl dsacnkjsa cjanckjdnaskjc sajknckjsndcklja ckjnsd kjnsdlknajlkaskj cjsnckjsdncwink jsdakcnsajk csjankjdsn acnjdakjnlkanclkjs cjksnckjan ckjn', '<p>dsa sda sadfs</p>', 'IMG_kvnad_nsdak_2019_01_21_22_33_03.jpg', 'Y', 0, '2019-01-22 06:03:33', '2019-01-24 04:36:23');

-- --------------------------------------------------------

--
-- Table structure for table `data_guru_models`
--

CREATE TABLE `data_guru_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tgllahir` date NOT NULL,
  `alamat` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `nohp` int(11) NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `data_guru_models`
--

INSERT INTO `data_guru_models` (`id`, `nama`, `slug`, `tempat`, `tgllahir`, `alamat`, `nohp`, `foto`, `level`, `created_at`, `updated_at`) VALUES
(2, 'ini nama saya', 'ini-nama-saya', 'padang', '2019-01-17', 'jjkjk', 99, 'IMG_ini_nama_saya_2019_01_21_06_52_44.png', '1', '2019-01-21 08:43:05', '2019-01-21 14:44:52');

-- --------------------------------------------------------

--
-- Table structure for table `galery_models`
--

CREATE TABLE `galery_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` int(10) UNSIGNED NOT NULL,
  `file` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_album` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `galery_models`
--

INSERT INTO `galery_models` (`id`, `title`, `slug`, `type`, `file`, `id_album`, `created_at`, `updated_at`) VALUES
(6, 'ini adalah title foto', 'ini-adalah-title-foto', 0, 'IMG_ini_adalah_title_fot_2019_01_21_21_17_06.jpg', 3, '2019-01-22 05:06:17', '2019-01-22 05:06:17');

-- --------------------------------------------------------

--
-- Table structure for table `header_models`
--

CREATE TABLE `header_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `header_models`
--

INSERT INTO `header_models` (`id`, `title`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'header', 'IMG_header_2019_01_21_11_31_40.png', '2019-01-21 19:40:31', '2019-01-21 19:40:31');

-- --------------------------------------------------------

--
-- Table structure for table `kata_sambutan_models`
--

CREATE TABLE `kata_sambutan_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `katasambutan` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kata_sambutan_models`
--

INSERT INTO `kata_sambutan_models` (`id`, `nama`, `katasambutan`, `jabatan`, `foto`, `created_at`, `updated_at`) VALUES
(1, 'Utari Kemala Putri', 'Selamat datang di Taman Kanak-kanak Web. TK Dar Al-Madinah', 'Kepala Sekolah', 'IMG_herisvan_hendra_2019_01_21_06_04_24.jpg', '2019-01-21 08:35:34', '2019-01-24 02:44:24');

-- --------------------------------------------------------

--
-- Table structure for table `link_models`
--

CREATE TABLE `link_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `link_models`
--

INSERT INTO `link_models` (`id`, `title`, `link`, `status`, `created_at`, `updated_at`) VALUES
(2, 'twitter', 'http://twitter.co.id', 'Y', '2019-01-21 13:49:14', '2019-01-21 13:51:40'),
(3, 'fas', 'sadf', 'Y', '2019-01-22 06:08:25', '2019-01-22 06:08:25'),
(4, 'ds', 'sdaf', 'Y', '2019-01-22 06:08:33', '2019-01-22 06:08:33');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(11, '2014_10_12_000000_create_users_table', 1),
(12, '2014_10_12_100000_create_password_resets_table', 1),
(13, '2019_01_20_154251_create_banner_models_table', 1),
(14, '2019_01_20_154913_create_berita_models_table', 1),
(15, '2019_01_20_155447_create_data_guru_models_table', 1),
(16, '2019_01_20_160240_create_album_models_table', 1),
(17, '2019_01_20_160722_create_kata_sambutan_models_table', 1),
(18, '2019_01_20_161214_create_link_models_table', 1),
(19, '2019_01_20_161501_create_profil_models_table', 1),
(20, '2019_01_20_161724_create_sarana_dan_prasarana_models_table', 1),
(21, '2019_01_21_014633_create_header_models_table', 2),
(22, '2019_01_22_001311_create_galery_models_table', 3),
(23, '2019_01_23_205825_create_visidan_misi_models_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `profil_models`
--

CREATE TABLE `profil_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `profil` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profil_models`
--

INSERT INTO `profil_models` (`id`, `profil`, `created_at`, `updated_at`) VALUES
(1, '<p>Assalamualaikum wr. wb.</p>\r\n\r\n<p>Selamat datang di Taman Kanak-kanak Web. TK Dar Al-Madinah</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>Pendidikan Taman Kanak-kanak (TK) dan Pendidikan Anak Usia Dini (PAUD) adalah jenjang pendidikan sebelum pendidikan dasar yang merupakan upaya pembinaan dan ditujukan untuk anak sejak lahir sampai umur 6 tahun yang diberikan melalui rangsangan pendidikan untuk membantu pertumbuhan dan perkembangan jasmani dan rohani agar anak memiliki kesiapan dalam memasuki pendidikan lebih lanjut yang diselenggarakan pada jalur formal, non formal, dan informal.</p>\r\n\r\n<p>Berdasarkan qodratnya seorang anak manusia yang baru lahir kedunia bagaikan selembar kertas putih yang bersih dari noda apapun. Anak tersebut akan menjadi islami, majusi, dan yahudi tergatung dari pendidikan yang ia peroleh. Menurut islam, pendidikan anak dimulai semenjak anak tersebut berada dalam kandungan.</p>\r\n\r\n<p>Pada masa usia emas yaitu usia 0-6 tahun otak anak berkembang 80%. Pada masa itu anak perlu dibimbing dengan cara yang baik sesuai dengan usianya agar nanti menjadi anak yang unggul dalam agama maupun intelektualnya. Oleh karena itu, peran pendidik dan orangtua dalam mendidik anak sangat penting. Orangtua dan pendidik harus bisa melihat potensi yang dimiliki anak jangan sampai orangtua memaksakan kehendak pada anaknya.</p>\r\n\r\n<p>Kami memberikan pelayanan pendidikan dengan sepenuh hati kepada seluruh anak didik. TK/PAUD Dar Al-Madinah adalah salah satu wadah bermain dan belajar bagi anak kita dan siap membantu orangtua untuk menyelamatkan usia emas anak-anaknya.</p>\r\n\r\n<p>Perencanaan pembelajaran pada program TK/PAUD Dar Al-Madinah sudah disusun dengan matang untuk memberikan arah yang tepat dalam proses pembelajaran dengan mempertimbangkan keseimbangan antara pendidikan umum dan pendidikan keagamaan. Semoga apa yang kami berikan melalui website TK/DAR Al-Madinah bermanfaat bagi anak didik, orangtua murid, masyarakat, dan sekolah. Akhir kata kami mengucapkan terimakasih kepada semua pihak yang terlibat dalam pembuatan website ini. Semoga semua ini memberikan manfaat dan kemajuan.</p>\r\n\r\n<p>Wassalamualaikum. wr. wb</p>\r\n\r\n<p>Kepala TK/PAUD Dar Al-Madinah</p>\r\n\r\n<p>Utari Kemala Putri</p>', '2019-01-21 08:19:15', '2019-01-24 04:55:09');

-- --------------------------------------------------------

--
-- Table structure for table `sarana_dan_prasarana_models`
--

CREATE TABLE `sarana_dan_prasarana_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `saranadanprasarana` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sarana_dan_prasarana_models`
--

INSERT INTO `sarana_dan_prasarana_models` (`id`, `saranadanprasarana`, `created_at`, `updated_at`) VALUES
(1, '<p>masih kosong</p>', '2019-01-21 08:22:54', '2019-01-24 05:40:10');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'saya admin', 'admin@admin.com', '$2y$10$plfukiKwZoKxxOhY1r93COZx5syuI/b86VRZPcsepYu7DjOYidsXa', 'zoJHnpOIiiEvAZVDng66DTNdf5kNuf73yVQf4nNEfom0MKakoeAcvI25Q7gq', '2019-01-23 23:59:20', '2019-01-24 00:10:04');

-- --------------------------------------------------------

--
-- Table structure for table `visidan_misi_models`
--

CREATE TABLE `visidan_misi_models` (
  `id` int(10) UNSIGNED NOT NULL,
  `visidanmisi` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `visidan_misi_models`
--

INSERT INTO `visidan_misi_models` (`id`, `visidanmisi`, `created_at`, `updated_at`) VALUES
(1, '<h1>VISI</h1>\r\n\r\n<p>Mendidik generasi sholeh,cerdas,ceria,mandiri,berwawasan dan berakhlaqul islam</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<h1>MISI</h1>\r\n\r\n<p>1.Menanam nilai-nilai tauhid</p>\r\n\r\n<p>2.Mengajarkan aqidah yang sholihah</p>\r\n\r\n<p>3.Membiasakan anak dengan akhlaq islam</p>\r\n\r\n<p>4.Mendidik anak agar kreatif dan inovatif</p>\r\n\r\n<p>5.Menanamkan rasa cintanya kepada Allah dan Rasulnya</p>', '2019-01-24 05:12:36', '2019-01-24 05:13:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `album_models`
--
ALTER TABLE `album_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner_models`
--
ALTER TABLE `banner_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `berita_models`
--
ALTER TABLE `berita_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `data_guru_models`
--
ALTER TABLE `data_guru_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `galery_models`
--
ALTER TABLE `galery_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header_models`
--
ALTER TABLE `header_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kata_sambutan_models`
--
ALTER TABLE `kata_sambutan_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `link_models`
--
ALTER TABLE `link_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `profil_models`
--
ALTER TABLE `profil_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sarana_dan_prasarana_models`
--
ALTER TABLE `sarana_dan_prasarana_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `visidan_misi_models`
--
ALTER TABLE `visidan_misi_models`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `album_models`
--
ALTER TABLE `album_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `banner_models`
--
ALTER TABLE `banner_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `berita_models`
--
ALTER TABLE `berita_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `data_guru_models`
--
ALTER TABLE `data_guru_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `galery_models`
--
ALTER TABLE `galery_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `header_models`
--
ALTER TABLE `header_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kata_sambutan_models`
--
ALTER TABLE `kata_sambutan_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `link_models`
--
ALTER TABLE `link_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `profil_models`
--
ALTER TABLE `profil_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sarana_dan_prasarana_models`
--
ALTER TABLE `sarana_dan_prasarana_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visidan_misi_models`
--
ALTER TABLE `visidan_misi_models`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
