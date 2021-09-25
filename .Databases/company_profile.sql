-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 25 Sep 2021 pada 19.34
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `company_profile`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `agenda`
--

CREATE TABLE `agenda` (
  `id` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `tempat` varchar(150) DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `tanggal` int(2) NOT NULL,
  `bulan` int(2) NOT NULL,
  `tahun` int(4) NOT NULL,
  `timestamps` varchar(50) NOT NULL,
  `gambar` text DEFAULT NULL,
  `userpost` varchar(35) NOT NULL,
  `tampilkan` tinyint(1) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `agenda`
--

INSERT INTO `agenda` (`id`, `judul`, `tempat`, `deskripsi`, `tanggal`, `bulan`, `tahun`, `timestamps`, `gambar`, `userpost`, `tampilkan`) VALUES
(1, 'Kebakaran Hutan di Indonesia', 'Di hotel ratu', 'asdsa asd asd as', 19, 6, 2020, '1592499600', 'uploads/agenda/30062020224858.jpg', 'admin', 1),
(2, 'Manfaat Madu Bagi Kesehatan', 'Di hotel ratu', 'asdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as das', 4, 7, 2020, '1593795600', 'uploads/agenda/30062020225006.jpg', 'admin', 1),
(3, 'GAmeess sa das ', 'Di hotel ratu', 'asdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as dasasdsad asd as das', 11, 7, 2020, '1594400400', 'uploads/agenda/30062020225050.jpg', 'admin', 1),
(4, 'Dibuat oleh member', 'Di hotel ratu', 'tes member create', 11, 7, 2020, '1594400400', 'uploads/agenda/30062020231625.jpg', 'user3', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `perusahaan` varchar(100) NOT NULL,
  `nomor` varchar(100) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` text DEFAULT NULL,
  `wilayah` varchar(100) DEFAULT NULL,
  `telepon` varchar(25) DEFAULT '-',
  `fax` varchar(35) DEFAULT '-',
  `website` varchar(200) DEFAULT '-',
  `foto` text DEFAULT NULL,
  `username` varchar(35) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`perusahaan`, `nomor`, `nama`, `alamat`, `wilayah`, `telepon`, `fax`, `website`, `foto`, `username`) VALUES
('', '20200623/A/0.ADMIN', 'admin', '', 'admin', '', '', '', NULL, 'admin'),
('PT ADHIMASCIPTA DWIPANTARA', '20200623/M/1.KOTA ', 'nensi', 'Jambii ii asd ads', 'Kota Jambi', '12313213123', 'fax', 'adhi.com', NULL, 'user1'),
('PT 2', '20200625/M/2.JAMBI', 'nata', 'pt2', 'Jambi', '3423423423', 'pt2', 'pt2.com', NULL, 'pt2'),
('PT.3', '20200626/M/3.JAMBI', 'user3', 'Jambi jambi kotas', 'Jambi', '098765432', 'PT.3', 'PT3.com', 'uploads/anggota/01072020111128.jpg', 'user3');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `anggota_view`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `anggota_view` (
`perusahaan` varchar(100)
,`nomor` varchar(100)
,`nama` varchar(200)
,`alamat` text
,`wilayah` varchar(100)
,`telepon` varchar(25)
,`fax` varchar(35)
,`website` varchar(200)
,`foto` text
,`username` varchar(35)
,`password` varchar(100)
,`email` varchar(80)
,`level` enum('Anggota','Admin','Pimpinan')
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `idagenda` int(11) NOT NULL,
  `gambar` text NOT NULL,
  `caption` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id`, `idagenda`, `gambar`, `caption`) VALUES
(40, 2, 'uploads/gallery/300620202250060.jpg', 'Foto Dokumentasi 1'),
(38, 1, 'uploads/gallery/300620202248580.jpg', 'Foto Dokumentasi 1'),
(39, 1, 'uploads/gallery/300620202248581.jpg', 'Foto Dokumentasi 2');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(80) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `pesan` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id`, `nama`, `email`, `subject`, `pesan`) VALUES
(1, 'Budi Suharto', 'mail@mail.com', 'K', 'm');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil`
--

CREATE TABLE `profil` (
  `profil_name` varchar(100) NOT NULL,
  `profil_values` text DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profil`
--

INSERT INTO `profil` (`profil_name`, `profil_values`) VALUES
('sejarah', '<p><span class=\"ILfuVd NA6bn\"><span class=\"hgKElc\"><b>ISS</b> A/S \r\n(International Service System) adalah sebuah perusahaan layanan \r\nfasilitas yang didirikan di Kopenhagen, Denmark pada tahun 1901. Layanan\r\n <b>ISS</b> meliputi layanan kebersihan, layanan dukungan, layanan \r\nproperti, layanan katering, layanan pengamanan, dan layanan manajemen \r\nfasilitas.</span></span></p>'),
('visi', ' <div xss=\"removed\" bis_skin_checked=\"1\" style=\"text-align: center;\"><span xss=\"removed\">Menjadikan ISS Indonesia dapat berperan di tingkat Provinsi maupun Nasional dan menjadi pelopor dalam penerapan Good Corporate Governance dan penerapan praktek usaha jasa konsultansi bebas dari korupsi.</span></div>'),
('misi', '<ol>\r\n	<li>Peningkatan pelayanan, kompetensi, dan penerapan kode etik anggota</li>\r\n	<li>Mengefektifkan struktur organisasi ISS DKI jakarta</li>\r\n	<li>Meningkatkan hubungan sinergis ISS DKI jakarta dengan DPN ISS, Pemrpov DKI jakarta, dan institusi nasional lain yang relevan</li>\r\n	<li>Penguatan peran DPP ISS DKI Jakarta sebagai mitra handal Pemrpov DKI Jakarta dalam perencanaan, pengawasan dan evaluasi pembangunan</li>\r\n	<li>Mengupayakan terwujudnya regulasi usaha jasa konsultansi yang kondusif di tingkat provinsi dan nasional</li>\r\n	<li>Berupaya mencegah terjadinya persaingan usaha yang tidak sehat</li>\r\n	<li>Meningkatkan advokasi regulasi, mediasi perselisihan angota dan perlindungan anggota secara berkesinambungan</li>\r\n	<li>Melindungi pangsa pasar usaha kecil dan meningkatkan kerjasama usaha kecil dengan usaha non kecil</li>\r\n	<li>Pengembangan pasar melalui peningkatan komptensi, fasilitasi dan penguatanjaringan keluar negeri, penetrasi pasar swasta dan inovasi</li>\r\n	<li>Penginkatan pencitranan DPP ISS melalui berbagai macam media massa, bakti soisla, dna bakti profesi</li>\r\n	<li>Penginkatan profesionalisme dan daya saing anggota di segala bidang, khususnya menghadapi isue aktivitas usaha lintas negara (borderless economy)</li>\r\n	<li>Pengembangan pasar bagi anggota di sektor swasta dan non jasa konstruksi</li>\r\n	<li>ISS DKI aktif mensosialisasikan Good Corporate Governance dan tidak mentolerir commitment fee</li>\r\n</ol>'),
('alamat', 'Jl. Sawo Raya No. 98 Jajar Lweyan Surakartam Telp :08156564295'),
('kontak', '<p>\n                                T: <a href=\"tel:0217942940\">+62-21-7942940 (H)</a><br>\n                                T: <a href=\"tel:082112079750\">+62-8211 2079750</a><br>\n								F: +62-21-7942941<br>\n								E: <a href=\"mailto:sekretariat@ISS-dki.org\">sekretariat@ISS-dki.org</a><br>\n                                E: <a href=\"mailto:ISS_dki@yahoo.com\">ISS_dki@yahoo.com</a><br>\n							</p>'),
('telepon', '+62-821 120 79 750, +62-21-7942941'),
('email', ' iss_indonesia@yahoo.com'),
('tentang', '<span>ISS Indonesia adalah perusahaan Integrated Facility Service yang \r\nterbaik dan terbesar di Indonesia dengan cakupan layanan atas Facility \r\nServices ( cleaning service, office support service, gardening &amp; \r\nlandscaping, Integrated Pest Management, building maintenance service, \r\nindoor air quality service, wash room service, portable toilet service) ,\r\n Acces Control ( security service ) , Catering Service, Parking \r\nManagement Service.\r\n\r\nISS Indonesia tersebar di 140 kota, 9 kota besar diantaranya seperti \r\nJakarta, Bandung, Semarang, Surabaya, Denpasar, Medan, Batam, Pekanbaru,\r\n Balikpapan dan Makasar. Dengan disupport oleh lebih dari 300 manager, \r\n900 supervisor, 2500 teamleader dan 54.000 operator, dengan lebih dari \r\n3.000 kontrak B2B dan ISS Indonesia.</span>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `username` varchar(35) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` enum('Anggota','Admin','Pimpinan') NOT NULL DEFAULT 'Anggota',
  `email` varchar(80) DEFAULT NULL,
  `telepon` varchar(25) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`username`, `password`, `nama`, `level`, `email`, `telepon`) VALUES
('admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', 'Admin', '', ''),
('user1', 'b1734c3c466b3ddcdd3b841d02a24b56', 'nensi', 'Anggota', 'adhi@mail.com', '12313213123'),
('pt2', '8ed76a4cc9d516f786535973c1fc3ff1', 'nata', 'Anggota', 'pt2@mail.com', '3423423423'),
('user3', '92877af70a45fd6a2ed7fe81e1236b78', 'user3', 'Anggota', 'PT3@mail.com', '098765432');

-- --------------------------------------------------------

--
-- Struktur untuk view `anggota_view`
--
DROP TABLE IF EXISTS `anggota_view`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `anggota_view`  AS SELECT `anggota`.`perusahaan` AS `perusahaan`, `anggota`.`nomor` AS `nomor`, `anggota`.`nama` AS `nama`, `anggota`.`alamat` AS `alamat`, `anggota`.`wilayah` AS `wilayah`, `anggota`.`telepon` AS `telepon`, `anggota`.`fax` AS `fax`, `anggota`.`website` AS `website`, `anggota`.`foto` AS `foto`, `anggota`.`username` AS `username`, `user`.`password` AS `password`, `user`.`email` AS `email`, `user`.`level` AS `level` FROM (`user` left join `anggota` on(`user`.`username` = `anggota`.`username`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `agenda`
--
ALTER TABLE `agenda`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`nomor`);

--
-- Indeks untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `profil`
--
ALTER TABLE `profil`
  ADD PRIMARY KEY (`profil_name`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `agenda`
--
ALTER TABLE `agenda`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
