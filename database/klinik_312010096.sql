-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jul 2022 pada 04.04
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
-- Database: `klinik_312010096`
--

DELIMITER $$
--
-- Fungsi
--
CREATE DEFINER=`root`@`localhost` FUNCTION `fn_totalUsers` () RETURNS INT(11) UNSIGNED NO SQL RETURN (SELECT COUNT(id_pasien) FROM pasien)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `berobat`
--

CREATE TABLE `berobat` (
  `id_berobat` int(11) NOT NULL,
  `id_pasien` int(5) DEFAULT NULL,
  `id_dokter` int(5) DEFAULT NULL,
  `tgl_berobat` date DEFAULT NULL,
  `keluhan_pasien` varchar(200) DEFAULT NULL,
  `hasil_diagnosa` varchar(200) DEFAULT NULL,
  `penatalaksanaan` enum('hipertensi','stroke') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `berobat`
--

INSERT INTO `berobat` (`id_berobat`, `id_pasien`, `id_dokter`, `tgl_berobat`, `keluhan_pasien`, `hasil_diagnosa`, `penatalaksanaan`) VALUES
(0, 44, 31, '2022-07-03', 'mhgvcd', 'dcg', 'hipertensi'),
(51, 41, 31, '2022-03-03', 'Nyeri', 'Kista', 'stroke'),
(52, 42, 32, '2022-03-12', 'Nyeri', 'Maag', 'stroke'),
(53, 43, 33, '2022-04-04', 'pusing', 'diabetes', 'hipertensi'),
(54, 44, 34, '2022-12-12', 'pegal', 'asam lambung', 'hipertensi'),
(55, 45, 35, '2022-12-10', 'lumpuh', 'komplikasi', 'stroke'),
(56, 41, 31, '2022-07-07', 'etyh', 'ty', 'hipertensi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokter`
--

CREATE TABLE `dokter` (
  `id_dokter` int(5) NOT NULL,
  `nama_dokter` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dokter`
--

INSERT INTO `dokter` (`id_dokter`, `nama_dokter`) VALUES
(31, 'Aaa'),
(32, 'B'),
(33, 'C'),
(34, 'D'),
(35, 'Ea'),
(36, 'test'),
(37, 'test'),
(38, 'testest'),
(39, 'Ajeng');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_obat`
--

CREATE TABLE `log_obat` (
  `id_log` int(100) NOT NULL,
  `id_obat` int(10) DEFAULT NULL,
  `nama_obat_lama` varchar(100) DEFAULT NULL,
  `nama_obat_baru` varchar(100) DEFAULT NULL,
  `waktu` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log_obat`
--

INSERT INTO `log_obat` (`id_log`, `id_obat`, `nama_obat_lama`, `nama_obat_baru`, `waktu`) VALUES
(1, 5, 'OBH', 'OBHh', '2022-07-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `obat`
--

CREATE TABLE `obat` (
  `id_obat` int(5) NOT NULL,
  `nama_obat` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `obat`
--

INSERT INTO `obat` (`id_obat`, `nama_obat`) VALUES
(1, 'paracetamol'),
(2, 'omeprazole'),
(3, 'promag'),
(4, 'becomzet'),
(5, 'OBHh');

--
-- Trigger `obat`
--
DELIMITER $$
CREATE TRIGGER `update_nama_obat` BEFORE UPDATE ON `obat` FOR EACH ROW insert into log_obat set id_obat=old.id_obat, nama_obat_lama = old.nama_obat, nama_obat_baru=new.nama_obat, waktu = now()
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pasien`
--

CREATE TABLE `pasien` (
  `id_pasien` int(5) NOT NULL,
  `nama_pasien` varchar(40) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') DEFAULT NULL,
  `umur` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pasien`
--

INSERT INTO `pasien` (`id_pasien`, `nama_pasien`, `jenis_kelamin`, `umur`) VALUES
(41, 'Ajeng', 'Perempuan', 12),
(42, 'Desy', 'Perempuan', 11),
(43, 'Dedi', 'Laki-laki', 11),
(44, 'Dena', 'Laki-laki', 21),
(45, 'Ana', 'Perempuan', 19),
(46, 'Ajeng', 'Laki-laki', 19),
(47, 'Wina', 'Perempuan', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `resep_obat`
--

CREATE TABLE `resep_obat` (
  `id_resep` int(11) NOT NULL,
  `id_berobat` int(11) DEFAULT NULL,
  `id_obat` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `resep_obat`
--

INSERT INTO `resep_obat` (`id_resep`, `id_berobat`, `id_obat`) VALUES
(0, 0, 4),
(61, 51, 1),
(62, 52, 2),
(63, 53, 3),
(64, 54, 4),
(65, 55, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(5) NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `password` varchar(32) DEFAULT NULL,
  `nama_lengkap` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama_lengkap`) VALUES
(1, 'ajeng', 'a123', 'desyana ajeng'),
(2, 'desy', 'b123', 'desya windy'),
(3, 'awan', 'i123', 'ajeng irawan'),
(4, 'indi', 'y123', 'indri yani'),
(5, 'ara', 'r123', 'raflesia');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `viewpenyakit`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `viewpenyakit` (
`id_berobat` int(11)
,`nama_pasien` varchar(40)
,`jenis_kelamin` enum('Laki-laki','Perempuan')
,`umur` int(2)
,`keluhan_pasien` varchar(200)
,`hasil_diagnosa` varchar(200)
,`tgl_berobat` date
,`nama_dokter` varchar(50)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `viewpenyakit`
--
DROP TABLE IF EXISTS `viewpenyakit`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `viewpenyakit`  AS SELECT `a`.`id_berobat` AS `id_berobat`, `b`.`nama_pasien` AS `nama_pasien`, `b`.`jenis_kelamin` AS `jenis_kelamin`, `b`.`umur` AS `umur`, `a`.`keluhan_pasien` AS `keluhan_pasien`, `a`.`hasil_diagnosa` AS `hasil_diagnosa`, `a`.`tgl_berobat` AS `tgl_berobat`, `c`.`nama_dokter` AS `nama_dokter` FROM ((`berobat` `a` join `pasien` `b` on(`a`.`id_pasien` = `b`.`id_pasien`)) join `dokter` `c` on(`a`.`id_dokter` = `c`.`id_dokter`)) WHERE `b`.`jenis_kelamin` = 'Laki-laki''Laki-laki'  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berobat`
--
ALTER TABLE `berobat`
  ADD PRIMARY KEY (`id_berobat`),
  ADD KEY `id_dokter` (`id_dokter`),
  ADD KEY `id_pasien` (`id_pasien`);

--
-- Indeks untuk tabel `dokter`
--
ALTER TABLE `dokter`
  ADD PRIMARY KEY (`id_dokter`);

--
-- Indeks untuk tabel `log_obat`
--
ALTER TABLE `log_obat`
  ADD PRIMARY KEY (`id_log`);

--
-- Indeks untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id_obat`);

--
-- Indeks untuk tabel `pasien`
--
ALTER TABLE `pasien`
  ADD PRIMARY KEY (`id_pasien`);

--
-- Indeks untuk tabel `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD PRIMARY KEY (`id_resep`),
  ADD KEY `id_obat` (`id_obat`),
  ADD KEY `id_berobat` (`id_berobat`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `log_obat`
--
ALTER TABLE `log_obat`
  MODIFY `id_log` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `berobat`
--
ALTER TABLE `berobat`
  ADD CONSTRAINT `berobat_ibfk_2` FOREIGN KEY (`id_pasien`) REFERENCES `pasien` (`id_pasien`),
  ADD CONSTRAINT `berobat_ibfk_3` FOREIGN KEY (`id_dokter`) REFERENCES `dokter` (`id_dokter`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `obat`
--
ALTER TABLE `obat`
  ADD CONSTRAINT `obat_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `resep_obat` (`id_obat`);

--
-- Ketidakleluasaan untuk tabel `resep_obat`
--
ALTER TABLE `resep_obat`
  ADD CONSTRAINT `resep_obat_ibfk_1` FOREIGN KEY (`id_obat`) REFERENCES `obat` (`id_obat`),
  ADD CONSTRAINT `resep_obat_ibfk_2` FOREIGN KEY (`id_berobat`) REFERENCES `berobat` (`id_berobat`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
