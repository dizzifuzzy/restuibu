-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 24, 2021 at 09:01 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `restu_ibu`
--

-- --------------------------------------------------------

--
-- Table structure for table `anak_bina`
--

CREATE TABLE `anak_bina` (
  `id_anak` int(5) NOT NULL,
  `gambar_anak` varchar(150) NOT NULL,
  `nama_anak` varchar(50) NOT NULL,
  `ttl_anak` date NOT NULL,
  `tempat_anak` varchar(50) NOT NULL,
  `alamat_anak` text NOT NULL,
  `pendidikan_anak` varchar(50) NOT NULL,
  `status_anak` varchar(50) NOT NULL,
  `mukim_anak` varchar(50) NOT NULL,
  `id_petugas` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `anak_bina`
--

INSERT INTO `anak_bina` (`id_anak`, `gambar_anak`, `nama_anak`, `ttl_anak`, `tempat_anak`, `alamat_anak`, `pendidikan_anak`, `status_anak`, `mukim_anak`, `id_petugas`) VALUES
(6, 'default.png', 'Syifa Nurfalah', '2004-12-07', 'Ciwidey', 'Kp, Nangela RT02/24', 'SMP', 'Dhuafa', '1', 1),
(7, 'default.png', 'Dara Naza F', '2005-06-28', 'Citeureup', 'RT 01/07 ', 'SMP', 'Piatu', '1', 1),
(8, 'default.png', 'Ilham H', '2005-06-02', 'Bandung', 'Kp Nangela RT02/10', 'SMP', 'Dhuafa', '1', 1),
(9, 'default.png', 'M Rizal F', '2002-02-07', 'Bandung', 'Landean Girang RT 01/06', 'SMA', 'Dhuafa', '1', 1),
(10, 'default.png', 'Dini Handiani', '2005-05-05', 'Bandung', 'Gg Sound RT03/03 Ds.Margajaya Kec. Ngamprah', 'SMP', 'Piatu', '1', 1),
(11, 'default.png', 'Hajaru Adnin', '2005-08-16', 'Bandung', 'Kp Cijaringo RT04/03', 'SD', 'Dhuafa', '0', 1),
(12, 'default.png', 'Al-Macora Lirangi', '2010-10-05', 'Bandung', 'Kp Pasir Jati RT 03/11', 'Belum Sekolah', 'Dhuafa', '0', 1),
(13, 'default.png', 'Putri A', '2007-12-20', 'Bandung', 'Cibintu RT 02/07 sukasari', 'SD', 'Dhuafa', '0', 1),
(14, 'default.png', 'Alika Azmalia', '2004-09-28', 'Bandung', 'Landean 02/13 Sukamukti', 'SD', 'Dhuafa', '0', 1),
(15, 'default.png', 'Dini Ramdaniyanti', '2000-12-05', 'Bandung', 'Landean RT 02/11 Sukamukti', 'SD', 'Dhuafa', '0', 1),
(16, 'default.png', 'Fitri Nursolehah', '2003-08-07', '', 'Landean RT 02/11 sukamukti', '', 'Dhuafa', '0', 1),
(17, 'default.png', 'Elis ', '2001-08-01', 'Bandung', 'NeglasariRT 03/02', 'SD', 'Dhuafa', '1', 1),
(18, 'default.png', 'Reza Agustina', '2001-09-12', 'Bandung', 'Neglasari RT 03/02', 'SD', 'Dhuafa', '0', 1);

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(5) NOT NULL,
  `judul_berita` text NOT NULL,
  `tgl_berita` date NOT NULL,
  `id_petugas` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_berita`
--

CREATE TABLE `detail_berita` (
  `id_detail_berita` int(5) NOT NULL,
  `gambar_berita` text NOT NULL,
  `isi_berita` text NOT NULL,
  `id_berita` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `detail_donasi`
--

CREATE TABLE `detail_donasi` (
  `id_detail` int(5) NOT NULL,
  `id_donasi` int(5) NOT NULL,
  `nominal_detail` varchar(20) NOT NULL,
  `gambar_bukti` text NOT NULL,
  `rekening_detail` text NOT NULL,
  `id_rekening` int(5) NOT NULL,
  `catatan_detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_donasi`
--

INSERT INTO `detail_donasi` (`id_detail`, `id_donasi`, `nominal_detail`, `gambar_bukti`, `rekening_detail`, `id_rekening`, `catatan_detail`) VALUES
(1, 1, '120', 'aceng.jpeg', 'BNI-123', 1, 'LEH UGHA'),
(2, 2, '1000000', 'Gilang Maulana.jpeg', '19213746', 1, 'suda tf ya semoga barang cepat dikirim');

-- --------------------------------------------------------

--
-- Table structure for table `donasi`
--

CREATE TABLE `donasi` (
  `id_donasi` int(5) NOT NULL,
  `tgl_donasi` date NOT NULL,
  `verif_donasi` int(5) NOT NULL,
  `id_petugas` int(5) NOT NULL,
  `id_donatur` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donasi`
--

INSERT INTO `donasi` (`id_donasi`, `tgl_donasi`, `verif_donasi`, `id_petugas`, `id_donatur`) VALUES
(1, '2019-06-15', 1, 1, 1),
(2, '2019-06-15', 0, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `donatur`
--

CREATE TABLE `donatur` (
  `id_donatur` int(5) NOT NULL,
  `nama_donatur` varchar(50) NOT NULL,
  `email_donatur` varchar(50) NOT NULL,
  `tlp_donatur` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `donatur`
--

INSERT INTO `donatur` (`id_donatur`, `nama_donatur`, `email_donatur`, `tlp_donatur`) VALUES
(1, 'aceng', 'aceng@gmail.com', '121212121'),
(2, 'Gilang Maulana', 'gmaulana9969@mahasiswa.unikom.ac.id', '9876433');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE `info` (
  `id_info` int(5) NOT NULL,
  `nama_yayasan` varchar(50) NOT NULL,
  `tentang_yayasan` text NOT NULL,
  `alamat_yayasan` varchar(100) NOT NULL,
  `tlp_yayasan` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id_info`, `nama_yayasan`, `tentang_yayasan`, `alamat_yayasan`, `tlp_yayasan`) VALUES
(1, 'LKSA Restu Ibu', 'LKSA Restu Ibu adalah sebuah lembaga yang bergerak pendidikan ahlak dan peduli sosial, kemanusiaan dan keagamaan, peduli lingkungan dan bencana. Terlahir dari keprihatinan terhadap lingkungan sekitar yang ternyata banyak warga negara yang kurang mampu maka dari itu kami bertekad untuk merangkul untuk memberikan suatu pendidikkan yang layak untuk masa depan generasi bangsa yang lebih baik.', 'Kp. Cibintinu RT. 02, RW. 07, Sukasari, Pameungpeuk', '2147483647');

-- --------------------------------------------------------

--
-- Table structure for table `kegiatan_rutin`
--

CREATE TABLE `kegiatan_rutin` (
  `id_kegiatan` int(5) NOT NULL,
  `nama_kegiatan` varchar(50) NOT NULL,
  `tempat_kegiatan` varchar(50) NOT NULL,
  `jadwal_kegiatan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kegiatan_rutin`
--

INSERT INTO `kegiatan_rutin` (`id_kegiatan`, `nama_kegiatan`, `tempat_kegiatan`, `jadwal_kegiatan`) VALUES
(1, 'Bercocok Mantan', 'Bandung', '10:10');

-- --------------------------------------------------------

--
-- Table structure for table `petugas`
--

CREATE TABLE `petugas` (
  `id_petugas` int(5) NOT NULL,
  `nama_petugas` varchar(50) NOT NULL,
  `username_petugas` varchar(50) NOT NULL,
  `password_petugas` varchar(50) NOT NULL,
  `alamat_petugas` text NOT NULL,
  `jabatan_petugas` varchar(50) NOT NULL,
  `tlp_petugas` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `petugas`
--

INSERT INTO `petugas` (`id_petugas`, `nama_petugas`, `username_petugas`, `password_petugas`, `alamat_petugas`, `jabatan_petugas`, `tlp_petugas`) VALUES
(1, 'Ujangss', 'admin', 'admin', 'Jl. Dipati Ukur No.112-116, Lebakgede, Kecamatan Coblong, Kota Bandung, Jawa Barat 40132', '', '222504119');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(5) NOT NULL,
  `an_rekening` varchar(50) NOT NULL,
  `no_rekening` varchar(50) NOT NULL,
  `bank_rekening` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `an_rekening`, `no_rekening`, `bank_rekening`) VALUES
(1, 'Aa Suhendar', '123456789', 'BNI'),
(3, 'Aa Suhendar', '123123', 'Mandiri');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anak_bina`
--
ALTER TABLE `anak_bina`
  ADD PRIMARY KEY (`id_anak`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD KEY `berita_ibfk_1` (`id_petugas`);

--
-- Indexes for table `detail_berita`
--
ALTER TABLE `detail_berita`
  ADD PRIMARY KEY (`id_detail_berita`),
  ADD KEY `id_berita` (`id_berita`);

--
-- Indexes for table `detail_donasi`
--
ALTER TABLE `detail_donasi`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_donasi` (`id_donasi`),
  ADD KEY `id_rekening` (`id_rekening`);

--
-- Indexes for table `donasi`
--
ALTER TABLE `donasi`
  ADD PRIMARY KEY (`id_donasi`),
  ADD KEY `donasi_ibfk_1` (`id_donatur`),
  ADD KEY `id_petugas` (`id_petugas`);

--
-- Indexes for table `donatur`
--
ALTER TABLE `donatur`
  ADD PRIMARY KEY (`id_donatur`);

--
-- Indexes for table `info`
--
ALTER TABLE `info`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `kegiatan_rutin`
--
ALTER TABLE `kegiatan_rutin`
  ADD PRIMARY KEY (`id_kegiatan`);

--
-- Indexes for table `petugas`
--
ALTER TABLE `petugas`
  ADD PRIMARY KEY (`id_petugas`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anak_bina`
--
ALTER TABLE `anak_bina`
  MODIFY `id_anak` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `detail_berita`
--
ALTER TABLE `detail_berita`
  MODIFY `id_detail_berita` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `detail_donasi`
--
ALTER TABLE `detail_donasi`
  MODIFY `id_detail` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `donasi`
--
ALTER TABLE `donasi`
  MODIFY `id_donasi` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `donatur`
--
ALTER TABLE `donatur`
  MODIFY `id_donatur` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `info`
--
ALTER TABLE `info`
  MODIFY `id_info` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kegiatan_rutin`
--
ALTER TABLE `kegiatan_rutin`
  MODIFY `id_kegiatan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `petugas`
--
ALTER TABLE `petugas`
  MODIFY `id_petugas` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anak_bina`
--
ALTER TABLE `anak_bina`
  ADD CONSTRAINT `anak_bina_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `berita`
--
ALTER TABLE `berita`
  ADD CONSTRAINT `berita_ibfk_1` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_berita`
--
ALTER TABLE `detail_berita`
  ADD CONSTRAINT `detail_berita_ibfk_1` FOREIGN KEY (`id_berita`) REFERENCES `berita` (`id_berita`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `detail_donasi`
--
ALTER TABLE `detail_donasi`
  ADD CONSTRAINT `detail_donasi_ibfk_1` FOREIGN KEY (`id_donasi`) REFERENCES `donasi` (`id_donasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detail_donasi_ibfk_2` FOREIGN KEY (`id_rekening`) REFERENCES `rekening` (`id_rekening`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `donasi`
--
ALTER TABLE `donasi`
  ADD CONSTRAINT `donasi_ibfk_1` FOREIGN KEY (`id_donatur`) REFERENCES `donatur` (`id_donatur`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `donasi_ibfk_2` FOREIGN KEY (`id_petugas`) REFERENCES `petugas` (`id_petugas`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
