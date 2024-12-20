-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2023 at 03:17 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pesonajawa`
--

-- --------------------------------------------------------

--
-- Table structure for table `claudya`
--

CREATE TABLE `claudya` (
  `berita0049` char(11) NOT NULL,
  `beritaclau` varchar(120) NOT NULL,
  `kategoriberita0049` varchar(120) NOT NULL,
  `event0049` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `claudya`
--

INSERT INTO `claudya` (`berita0049`, `beritaclau`, `kategoriberita0049`, `event0049`) VALUES
('B101', 'Bus Travel', 'Kendaraan Darat', 'Bus atau omnibus, (disebut juga multibus, otobus atau motorbus; sering juga dilafalkan sebagai /bas/ atau /bəs/; ejaan tidak baku bis) adalah kendaraan darat yang dirancang untuk mengangkut banyak penumpang. Bus dapat memiliki kapasitas hingga 30 penumpang.'),
('B102', 'Taksi Travel', 'Kendaraan Darat', 'Taksi adalah angkutan umum yang melayani penumpang tidak dalam trayek dan memiliki ciri-ciri yang diatur adalah sebagai berikut: identifikasi “taksi” di bodi kendaraan, berplat kuning, dan memakai argometer.'),
('B103', 'Pesawat Trave', 'Kendaraan Udara', 'Pesawat terbang adalah pesawat udara yang lebih berat dari udara, bersayap tetap, dan dapat terbang dengan tenaga sendiri.');

-- --------------------------------------------------------

--
-- Table structure for table `claudyauas`
--

CREATE TABLE `claudyauas` (
  `claudyaID` char(4) NOT NULL,
  `claudyaKOTA` varchar(50) NOT NULL,
  `destinasiKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `claudyauas`
--

INSERT INTO `claudyauas` (`claudyaID`, `claudyaKOTA`, `destinasiKODE`) VALUES
('I101', 'Jakarta Utara', 'D104'),
('I102', 'Jakarta Selatan', 'D101');

-- --------------------------------------------------------

--
-- Table structure for table `destinasi`
--

CREATE TABLE `destinasi` (
  `destinasiKODE` char(4) NOT NULL,
  `destinasiNAMA` varchar(120) NOT NULL,
  `destinasiKET` text NOT NULL,
  `kategoriKODE` char(4) NOT NULL,
  `destinasiFOTO` char(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destinasi`
--

INSERT INTO `destinasi` (`destinasiKODE`, `destinasiNAMA`, `destinasiKET`, `kategoriKODE`, `destinasiFOTO`) VALUES
('D101', 'Taman Margasatwa Ragunan', 'Taman Margasatwa Ragunan atau juga disebut Kebun Binatang Ragunan adalah sebuah kebun binatang yang terletak di daerah Ragunan, Pasar Minggu, Jawa Barat, Indonesia. Kebun binatang seluas 140 hektare ini didirikan pada tahun 1864. Di dalamnya terdapat berbagai koleksi yang terdiri dari 295 spesies dan 4040 spesimen.', 'K101', 'ragunan.jpg'),
('D102', 'Taman Mini Indonesia Indah', 'Taman ini merupakan rangkuman kebudayaan bangsa Indonesia, yang mencakup berbagai aspek kehidupan sehari-hari masyarakat 33 provinsi Indonesia (pada tahun 1975) yang ditampilkan dalam anjungan daerah berarsitektur tradisional, serta menampilkan aneka busana, tarian dan tradisi daerah.', 'K102', 'TMII.jpg'),
('D103', 'Dufan', 'Dunia Fantasi (atau juga disebut Dufan) adalah sebuah taman hiburan yang terletak di kawasan Taman Impian Ancol, Jakarta Utara, Indonesia yang diresmikan dan dibuka untuk umum pada tanggal 29 Agustus 1985.', 'K103', 'dufan.jpg'),
('D104', 'Pantai Indah Kapuk', 'Pantai Indah Kapuk atau biasa disingkat menjadi PIK 1 (awalnya Pantai Indah Kapuk Waterfront City), adalah sebuah kawasan terencana yang terletak di Penjaringan, Jakarta Utara; Kapuk, Cengkareng, Jakarta Barat; dan Kabupaten Tangerang, Banten.[1] PIK adalah salah satu kawasan perumahan elit paling bergengsi di Jakarta, bersama Menteng, Kebayoran Baru, Pondok Indah, dan Puri Indah.[1]', 'K104', 'PIK.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `fotodestinasi`
--

CREATE TABLE `fotodestinasi` (
  `fotodestinasiKODE` char(4) NOT NULL,
  `fotodestinasiNAMA` char(120) NOT NULL,
  `fotodestinasiFILE` char(120) NOT NULL,
  `destinasiKODE` char(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fotodestinasi`
--

INSERT INTO `fotodestinasi` (`fotodestinasiKODE`, `fotodestinasiNAMA`, `fotodestinasiFILE`, `destinasiKODE`) VALUES
('123', '23', 'bg-05.jpg', 'D103'),
('213', '34', 'bakwan.jpg', 'D102'),
('32', '2', 'ca..jpg', 'C033');

-- --------------------------------------------------------

--
-- Table structure for table `hotel`
--

CREATE TABLE `hotel` (
  `hotelKODE` char(4) NOT NULL,
  `hotelNAMA` char(120) NOT NULL,
  `hotelALAMAT` char(120) NOT NULL,
  `provinsiKODE` char(4) NOT NULL,
  `hotelKET` text NOT NULL,
  `hotelFOTO` char(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel`
--

INSERT INTO `hotel` (`hotelKODE`, `hotelNAMA`, `hotelALAMAT`, `provinsiKODE`, `hotelKET`, `hotelFOTO`) VALUES
('H101', 'Amaris Hotel', 'Jakarta', 'P101', 'Hotel Amaris adalah salah satu hotel yang termasuk dalam Grup Santika. Hotel ini merupakan brand untuk properti Santika Indonesia Hotels & Resorts berbintang dua atau yang lebih dikenal dengan konsep budget dan smart hotel.', 'amaris.jpg'),
('H102', 'Orchardz Hotel', 'Pontianak', 'P102', 'Orchardz Hotel Gajahmada Pontianak berada di Pontianak Selatan.  Lokasi hotel sangat strategis karena hanya berjarak 14,25 km dengan Bandar Udara Supadio (PNK).  Dari Pelabuhan Pontianak, hotel ini hanya berjarak sekitar 1,79 km.  Terdapat beberapa tempat menarik di sekitarnya, seperti Bandar Udara Supadio (PNK) yang berjarak sekitar 14,25 km dan Alun-Alun Kapuas berjarak sekitar 1,86 km', 'hotelorchardz.jpg'),
('H103', 'DSovia Hotel Bandung', 'Bandung', 'P103', 'Parkir mobil dan Wi-Fi selalu gratis, sehingga Anda dapat terus terhubung serta datang dan pergi kapan saja. Terletak strategis di Pusat Kota Bandung yang merupakan bagian Bandung, properti ini menempatkan Anda dekat dengan atraksi dan opsi restoran menarik. Jangan pulang dulu sebelum berkunjung ke Trans Studio Bandung yang terkenal. Memiliki peringkat bintang-3, properti berkelas ini menyediakan akses ke kolam renang luar ruangan, pijat dan restoran untuk para tamu di properti.', 'dsovia.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `kategoriwisata`
--

CREATE TABLE `kategoriwisata` (
  `kategoriKODE` char(4) NOT NULL,
  `kategoriNAMA` char(25) NOT NULL,
  `kategoriKET` text NOT NULL,
  `kategoriREFERENCE` char(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategoriwisata`
--

INSERT INTO `kategoriwisata` (`kategoriKODE`, `kategoriNAMA`, `kategoriKET`, `kategoriREFERENCE`) VALUES
('K101', 'Wisata Kebun Binatang', 'Terdapat banyak satwa satwa yang di lindungi pemerintah', 'Kebun Binatang Ragunan'),
('K102', 'Wisata Taman', 'Suatu taman hiburan yang bertemakan kebudayaan Indonesia', 'TMII'),
('K103', 'Wisata Taman Bermain', 'Tempat bermain dengan sejumlah wahana yang seru dan pemandangan yang indah', 'Dufan'),
('K104', 'Wisata Alam Pantai', 'Wisata yang disuguhkan dengan pemandangan dari pantai yang indah', 'PIK');

-- --------------------------------------------------------

--
-- Table structure for table `khas`
--

CREATE TABLE `khas` (
  `khasKODE` char(4) NOT NULL,
  `khasDAERAH` varchar(255) NOT NULL,
  `khasKET` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `khas`
--

INSERT INTO `khas` (`khasKODE`, `khasDAERAH`, `khasKET`) VALUES
('K101', 'Masakan Nusantara, Padang', 'Sumatera Barat memiliki tradisi kuliner yang kaya, dan Nasi Padang menjadi salah satu sajian yang paling terkenal dari daerah tersebut. Makanan ini telah menjadi bagian integral dari kekayaan budaya kuliner Indonesia.'),
('K102', 'Masakan Nusantara, Jawa', 'Plataran Dharmawangsa memiliki konsep tempat makan ala keraton Jawa berupa rumah Joglo yang dibuat kayu terbaik berusia 150 tahun. Tempat makan yang mendapat julukan Restoran Indonesia Terbaik di Jakarta oleh Tatler Indonesia menyediakan beragam masakan khas Nusantara yang cocok kamu santap bersama keluarga. Menu di Plataran Dharmawangsa di antaranya adalah Udang Nagih, Tahu Nenek, Asinan Sayur Betawi, Oyong Telur Puyuh, Nasi Goreng Kecombrang, Ayam Bakar Joglo, Sate Ayam, Rendang Sapi Singkong, Empal Cabe Ijo, dan Tumis Buncis Ayam. Restoran yang memiliki kapasitas hingga 200 tamu ini juga menyediakan pertunjukan budaya Indonesia dan musik yang ditampilkan pada waktu tertentu.');

-- --------------------------------------------------------

--
-- Table structure for table `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `mahasiswaKODE` char(10) NOT NULL,
  `mahasiswaNAMA` char(60) NOT NULL,
  `mahasiswaJURUSAN` char(40) NOT NULL,
  `mahasiswaJK` char(10) NOT NULL,
  `mahasiswaSTATUS` char(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mahasiswa`
--

INSERT INTO `mahasiswa` (`mahasiswaKODE`, `mahasiswaNAMA`, `mahasiswaJURUSAN`, `mahasiswaJK`, `mahasiswaSTATUS`) VALUES
('825220002', 'Winni Setiawati', 'Sistem Informasi', 'Perempuan', 'Aktif'),
('825220040', 'Jennifer', 'Sistem Informasi', 'Perempuan', 'Aktif'),
('825220049', 'Claudya Christine', 'Sistem Informasi', 'Perempuan', 'Aktif'),
('825220050', 'Gabriella Adeline Halim', 'Sistem Informasi', 'Perempuan', 'Aktif'),
('825220052', 'Grace Cakra', 'Sistem Informasi', 'Perempuan', 'Aktif'),
('825220055', 'Lauren Kezia Vannesa', 'Sistem Informasi', 'Perempuan', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `oleholeh`
--

CREATE TABLE `oleholeh` (
  `olehKODE` char(4) NOT NULL,
  `olehNAMA` char(120) NOT NULL,
  `provinsiKODE` char(4) NOT NULL,
  `olehKET` text NOT NULL,
  `olehFOTO` char(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `oleholeh`
--

INSERT INTO `oleholeh` (`olehKODE`, `olehNAMA`, `provinsiKODE`, `olehKET`, `olehFOTO`) VALUES
('123', '123', 'P101', '123', 'bandung.jpg'),
('O101', 'Kerak Telor', 'P101', 'Kerak telor adalah makanan asli daerah Jakarta (Betawi), Kuliner khas Betawi ini dipercaya sudah dikenal dan banyak digemari sejak zaman penjajahan Belanda. Meski ketika itu kerak telor diciptakan tanpa sengaja, nyatanya kerak telor menjadi salah satu makanan ikonik yang punya banyak penggemar hingga saat ini.', 'keraktelor.jpg'),
('O102', 'Choi Pan', 'P102', 'Choi pan merupakan hidangan Tionghoa yang dikenal di beberapa daerah seperti Bangka-Belitung dan Kalimantan Barat. Choi pan (菜粄) merupakan istilah bahasa Hakka yang berarti \"kue yang berisi sayuran\". Dalam bahasa Tiochiu hidangan ini disebut chai kue (菜粿) yang artinya kurang lebih sama.', 'choipan.jpg'),
('O103', 'Bolu Susu Lembang', 'P103', 'Bolu susu Lembang adalah salah satu produk kuliner kota Bandung, sebagai oleh-oleh khas yang tersohor. Tujuan utama pemiliknya menggunakan nama Bolu Susu Lembang untuk memperkenalkan bolu kukus bercita rasa Bandung yang berbahan dasar susu.', 'bolu.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `provinsiKODE` char(4) NOT NULL,
  `provinsiNAMA` varchar(225) NOT NULL,
  `provinsiIBUKOTA` varchar(225) NOT NULL,
  `provinsiKET` text NOT NULL,
  `provinsiFOTO` char(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`provinsiKODE`, `provinsiNAMA`, `provinsiIBUKOTA`, `provinsiKET`, `provinsiFOTO`) VALUES
('P101', 'DKI Jakarta', 'Jakarta', 'Daerah Khusus Ibukota Jakarta (DKI Jakarta) adalah ibu kota negara dan kota terbesar di Indonesia. Jakarta merupakan satu-satunya kota di Indonesia yang memiliki status setingkat provinsi. Jakarta terletak di pesisir bagian barat laut Pulau Jawa.', 'monas.jpg'),
('P102', 'Kalimantan Barat', 'Pontianak', 'Pontianak (Jawi: كوتا ڤونتيانق, Hanzi: 坤甸, Hakka: Khuntîen) adalah ibu kota Provinsi Kalimantan Barat, Indonesia yang sekaligus menjadi pusat pemerintahan dan perekonomian dari Provinsi Kalimantan Barat.', 'ponti.jpg'),
('P103', 'Jawa Barat', 'Bandung', 'Provinsi Jawa Barat terletak di bagian selatan dan tengah pegunungan serta dataran rendah pada bagian utara. Jawa Barat memiliki kawasan hutan yang berfungsi sebagai hutan lindung, hutan konservasi, dan hutan produksi dengan proporsi yang mencapai 22,10% dari seluruh luas wilayah di Jawa Barat.', 'bandung.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `restorant`
--

CREATE TABLE `restorant` (
  `restorantKODE` char(4) NOT NULL,
  `restorantNAMA` char(120) NOT NULL,
  `restorantALAMAT` char(120) NOT NULL,
  `khasKODE` char(4) NOT NULL,
  `restorantKET` varchar(255) NOT NULL,
  `restorantFOTO` char(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `restorant`
--

INSERT INTO `restorant` (`restorantKODE`, `restorantNAMA`, `restorantALAMAT`, `khasKODE`, `restorantKET`, `restorantFOTO`) VALUES
('R101', 'Payakumbuah', 'Bekasi', 'K101', ' Padang Payakumbuah menghadirkan beragam menu otentik khas dari Ranah Minang. Sebut saja ada Ayam Pop, Ayam Gulai, Ikan Salai, Rendang, Gulai Kikil, hingga Gulai Babat tersedia disini. Menu andalan yang disarankan oleh Bang Arief, sapaan akrab Arief Muham', 'payakumbuah.jpg'),
('R102', 'Plataran Dharmawangsa', 'Jakarta', 'K102', 'Plataran Dharmawangsa memiliki konsep tempat makan ala keraton Jawa berupa rumah Joglo yang dibuat kayu terbaik berusia 150 tahun. Tempat makan yang mendapat julukan Restoran Indonesia Terbaik di Jakarta oleh Tatler Indonesia menyediakan beragam masakan k', 'dhar.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `travel`
--

CREATE TABLE `travel` (
  `travelKODE` char(4) NOT NULL,
  `berita0049` char(4) NOT NULL,
  `travelKENDARAAN` char(120) NOT NULL,
  `travelFOTO` char(120) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `travel`
--

INSERT INTO `travel` (`travelKODE`, `berita0049`, `travelKENDARAAN`, `travelFOTO`) VALUES
('123', 'B102', 'Taksi', 'taxi.jpg'),
('T101', 'B102', 'Taksi', 'taxi.jpg'),
('T102', 'B101', 'Bus', 'bis.jpg'),
('T103', 'B103', 'Pesawat', 'pesawat.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `useradmin`
--

CREATE TABLE `useradmin` (
  `userKODE` char(4) NOT NULL,
  `userNAMA` char(30) NOT NULL,
  `userEMAIL` char(60) NOT NULL,
  `userPASS` char(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `useradmin`
--

INSERT INTO `useradmin` (`userKODE`, `userNAMA`, `userEMAIL`, `userPASS`) VALUES
('U001', 'claudya', 'clau@gmail.com', 'ed537c99d0ee5b79005d3d042113f9dd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `claudya`
--
ALTER TABLE `claudya`
  ADD PRIMARY KEY (`berita0049`);

--
-- Indexes for table `claudyauas`
--
ALTER TABLE `claudyauas`
  ADD PRIMARY KEY (`claudyaID`);

--
-- Indexes for table `destinasi`
--
ALTER TABLE `destinasi`
  ADD PRIMARY KEY (`destinasiKODE`);

--
-- Indexes for table `fotodestinasi`
--
ALTER TABLE `fotodestinasi`
  ADD PRIMARY KEY (`fotodestinasiKODE`);

--
-- Indexes for table `kategoriwisata`
--
ALTER TABLE `kategoriwisata`
  ADD PRIMARY KEY (`kategoriKODE`);

--
-- Indexes for table `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`mahasiswaKODE`);

--
-- Indexes for table `oleholeh`
--
ALTER TABLE `oleholeh`
  ADD PRIMARY KEY (`olehKODE`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`provinsiKODE`);

--
-- Indexes for table `restorant`
--
ALTER TABLE `restorant`
  ADD PRIMARY KEY (`restorantKODE`);

--
-- Indexes for table `travel`
--
ALTER TABLE `travel`
  ADD PRIMARY KEY (`travelKODE`);

--
-- Indexes for table `useradmin`
--
ALTER TABLE `useradmin`
  ADD PRIMARY KEY (`userKODE`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
