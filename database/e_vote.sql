-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 14 Jun 2021 pada 14.40
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e_vote`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_admin`
--

CREATE TABLE `t_admin` (
  `id_admin` tinyint(1) NOT NULL,
  `username` varchar(35) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_admin`
--

INSERT INTO `t_admin` (`id_admin`, `username`, `fullname`, `password`) VALUES
(1, 'admin', 'administrator', '$2y$10$R7OluwmtxZrvTIO8mnQm3ubOmMk8ZQFAH52eUXbw21Z/6S.LEEiie');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kandidat`
--

CREATE TABLE `t_kandidat` (
  `id_kandidat` smallint(4) NOT NULL,
  `nama_calon` varchar(50) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `visi` varchar(255) NOT NULL,
  `misi` varchar(255) NOT NULL,
  `suara` smallint(4) NOT NULL DEFAULT 0,
  `periode` varchar(9) NOT NULL,
  `program` text NOT NULL,
  `no_k` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_kandidat`
--

INSERT INTO `t_kandidat` (`id_kandidat`, `nama_calon`, `foto`, `visi`, `misi`, `suara`, `periode`, `program`, `no_k`) VALUES
(24, 'Sabina & Gilang', 'WhatsApp Image 2020-09-01 at 06.01.09.jpeg', '   1. Menjadikan Siswa / Siswi  SMK Al Madani Garut sebagai Siswa / Siswi yang Cageur , Bageur , Bener , Singeur jeung Pinter   ', '   1. Menumbuhkan keimanan dan ketaqqwaan kepada allah SWT\r\n2. Menumbuhkan  rasa kekeluargaan antar siswa \r\n3. Memotivasi peran siswa untuk selalu menjaga Kebersihan lingkungan sekolah  \r\n4. Mengembangkan bakat dan potensi yang dimiliki siswa dalam bidang', 120, '2020/2021', '1. Literasi 15 Menit 2. Sabtu Bersih (SABER) 3. Piket membersihkan masjid 4. Kreativitas memanfaatkan barang bekas', 1),
(25, 'Mila & Satiagi', 'WhatsApp Image 2020-09-01 at 06.01.10.jpeg', '   1.Menjadikan OSIS SMK AL MADANI GARUT menjadi organisasi yang memiliki kualitas tinggi dan dapat mengharumkan nama sekolah.\r\n2.Menyalurkan bakat siswa dan memberi kelulusan bagi siswa untuk menyalurkan minat dan bakat mereka   ', '  1. Cekatan dan tegas dalam menghadapi segala permasalahan \r\n2. Mempererat tali persaudaraan antar siswa dengan menjaga kesopananan serta keharmonisan\r\n3. Memberikan teladan yang baik untuk siswa lainnya  ', 103, '2020/2021', '1.Studi Banding  2.Embun Pagi 3.Jadwal adzan Dzuhur ', 2),
(26, 'Mela & Fitra', 'WhatsApp Image 2020-09-01 at 06.01.08.jpeg', '  1.Ingin menjadikan osis sebagai sarana untuk membangun siswa siswi SMK Al Madani menjadi siswa yang aktif , kreatif , potensial , dan berwawasan global untuk menuju sekolah yang unggul dan berkualitas. \r\n2.Menjadikan Siswa siwi SMK Al Madani menjadi sis', ' 1.Melaksanakan tugas dan kewajiban menjadi ketua osis dengan baik dan benar\r\n2. Meningkatkan kedisiplinan siswa \r\n3. Menciptakan lingkungan sekolah yang aman , nyaman , bersih, dan benar \r\n4. Meningkatkan iman dan ketakwaan terhadap tuhan yang maha esa \r', 41, '2020/2021', ' 1. Melanjutkan dan mengembangkan program kerja yang sudah ada 2. Mengadakan EVENT / PENTAS KREASI DAN ANTAR ORGANISASI DAN EKSTRA KULIKULER3. SEMBUL (Senam Bulanan)4. DENPAH (Denda Sampah)5. Mengadakan pembagian jadwal adzan bergilir6. memberikan Penghargaan ke setiap kelas yang telah selesai khatam qur\'an', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_kelas`
--

CREATE TABLE `t_kelas` (
  `id_kelas` varchar(3) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_kelas`
--

INSERT INTO `t_kelas` (`id_kelas`, `nama_kelas`) VALUES
('K01', 'X RPL'),
('K02', 'X OTKP'),
('K04', 'XI RPL'),
('K05', 'XI OTKP'),
('K06', 'XI PH'),
('K07', 'X PH'),
('K08', 'XII RPL'),
('K09', 'XII OTKP'),
('K10', 'XII PH');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_pemilih`
--

CREATE TABLE `t_pemilih` (
  `nis` varchar(10) NOT NULL,
  `periode` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_pemilih`
--

INSERT INTO `t_pemilih` (`nis`, `periode`) VALUES
('11', '2020/2021'),
('123', '2020/2021'),
('181910039', '2020/2021'),
('181910040', '2020/2021'),
('181910067', '2020/2021');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_user`
--

CREATE TABLE `t_user` (
  `id_user` varchar(10) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `id_kelas` varchar(3) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `pemilih` enum('Y','N') NOT NULL DEFAULT 'Y'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_user`
--

INSERT INTO `t_user` (`id_user`, `fullname`, `id_kelas`, `jk`, `pemilih`) VALUES
('', '', '', '', ''),
('181910001', 'ADE RISMA', 'K09', 'P', 'Y'),
('181910003', 'AI SIPA ULHASANAH', 'K09', 'P', 'Y'),
('181910004', 'AJI MUHAMAD YUSUF', 'K09', 'L', 'Y'),
('181910005', 'ANGGUN FITRIANI', 'K09', 'P', 'Y'),
('181910007', 'ASEP AZHAR NAWAWI', 'K09', 'L', 'Y'),
('181910008', 'DAVINA ZAHIRA', 'K09', 'P', 'Y'),
('181910009', 'DE LISNA DESI FITRI ANISA', 'K09', 'P', 'Y'),
('181910010', 'DESI HANDAYANI', 'K09', 'P', 'Y'),
('181910012', 'DICKY RAHAYU', 'K09', 'L', 'Y'),
('181910013', 'ELSA NOPIAH', 'K09', 'P', 'Y'),
('181910015', 'FITRIANINGSIH', 'K09', 'P', 'Y'),
('181910016', 'FUJI FAUJIAH', 'K09', 'P', 'Y'),
('181910017', 'HELDA NURUL FADILAH', 'K09', 'P', 'Y'),
('181910018', 'HERLIA APRILLIA', 'K09', 'P', 'Y'),
('181910020', 'IMAS RIYANA DAYYINAH', 'K09', 'P', 'Y'),
('181910021', 'KHAERUL ANWAR', 'K09', 'L', 'Y'),
('181910022', 'LISNAWATI', 'K09', 'P', 'Y'),
('181910024', 'MUHAMMAD FARHAN ZAMZAM Z', 'K09', 'L', 'Y'),
('181910025', 'NISA ANGGRAENI', 'K09', 'P', 'Y'),
('181910026', 'PANDI', 'K09', 'L', 'Y'),
('181910027', 'PUPUT ASTUTI', 'K09', 'P', 'Y'),
('181910028', 'RENDY RAKSA PRAMUDIA', 'K09', 'L', 'Y'),
('181910029', 'RINRIN ELSA FAZRIN', 'K09', 'P', 'Y'),
('181910030', 'RISMAWATI', 'K09', 'P', 'Y'),
('181910032', 'ROSITA ROHAENI', 'K09', 'P', 'Y'),
('181910033', 'SALWA ADAWIYAH', 'K09', 'P', 'Y'),
('181910034', 'SELVI NUR ALIFFAH', 'K09', 'P', 'Y'),
('181910035', 'SITI AMANAH', 'K09', 'P', 'Y'),
('181910036', 'SITI HAYAHA', 'K09', 'P', 'Y'),
('181910037', 'SITI SAADAH', 'K09', 'P', ''),
('181910038', 'TINA LISTANIA', 'K09', 'P', ''),
('181910039', 'AHMAD FADILAH', 'K08', 'L', 'Y'),
('181910040', 'ALDI YUNAN ANWARI', 'K08', 'L', 'Y'),
('181910041', 'ANTON SANTONI', 'K08', 'L', 'Y'),
('181910043', 'DENI SAHIDIN', 'K08', 'L', 'Y'),
('181910046', 'ENDANG MULYANA', 'K08', 'L', 'Y'),
('181910047', 'ESA AULIA FIRDAUS', 'K08', 'P', 'Y'),
('181910048', 'FADLAN ABDUL ROJAK', 'K08', 'L', 'Y'),
('181910049', 'GILANG GUMILANG', 'K08', 'L', 'Y'),
('181910050', 'HANDI KARTIWA', 'K08', 'L', 'Y'),
('181910051', 'ITA MARIKA', 'K08', 'P', 'Y'),
('181910052', 'KAMALUDIN', 'K08', 'L', 'Y'),
('181910053', 'M.SEHABUDIN', 'K08', 'L', 'Y'),
('181910054', 'MARINI RAHMAWATI', 'K08', 'P', 'Y'),
('181910055', 'MUHAMAD IKBAL MUSLIM', 'K08', 'L', 'Y'),
('181910056', 'MUHAMAD ILQIA', 'K08', 'L', 'Y'),
('181910057', 'NASEP EFENDI', 'K08', 'L', 'Y'),
('181910058', 'RAHMA ILMI FIRDAUS', 'K08', 'L', 'Y'),
('181910059', 'RIFKI NURJAMAN', 'K08', 'L', 'Y'),
('181910061', 'RIJAL FAUJI', 'K08', 'L', 'Y'),
('181910062', 'RIJAL MUHAMAD MUSTOFA', 'K08', 'L', 'Y'),
('181910063', 'RIYAD VEGA', 'K08', 'L', 'Y'),
('181910064', 'RIZAL AFANDI', 'K08', 'L', 'Y'),
('181910065', 'SANDI RUSTANDI', 'K08', 'L', 'Y'),
('181910066', 'SITI SALAMAH', 'K08', 'P', 'Y'),
('181910067', 'SOPIAN FATUROJI', 'K08', 'L', 'Y'),
('181910068', 'TANA', 'K08', 'L', 'Y'),
('181910069', 'TITA NURJANAH', 'K08', 'P', 'Y'),
('181910071', 'YANA SURYANA', 'K08', 'L', 'Y'),
('181910072', 'AI NUR HALIFAH NURSIDAH', 'K10', 'P', 'Y'),
('181910073', 'AKMAL ANDRIANSYAH', 'K10', 'L', 'Y'),
('181910074', 'AMBAR MAULANA', 'K10', 'L', 'Y'),
('181910076', 'ARPI SETIA BUDI', 'K10', 'L', 'Y'),
('181910077', 'CAHYAN ABDURROHMAN', 'K10', 'L', 'Y'),
('181910078', 'CEP RIZAL MAULANA', 'K10', 'L', 'Y'),
('181910079', 'DELIA PUSPITA SARI', 'K10', 'P', 'Y'),
('181910080', 'DESI YANA', 'K10', 'P', 'Y'),
('181910081', 'DEVA ANDIKA', 'K10', 'L', 'Y'),
('181910082', 'DIMAS MOCH RAMADHAN', 'K10', 'L', 'Y'),
('181910083', 'FAJAR SHOLAHUDIN', 'K10', 'L', 'Y'),
('181910085', 'GHINA SALSABILLA', 'K10', 'P', 'Y'),
('181910086', 'HAPI ROMADON', 'K10', 'L', 'Y'),
('181910087', 'LADIA INDRIANI', 'K10', 'P', 'Y'),
('181910088', 'MERLIN MARLIANA', 'K10', 'P', 'Y'),
('181910089', 'MOH EKA TAREKAH SHIDIK', 'K10', 'L', 'Y'),
('181910090', 'MUHAMAD HERMANSAH', 'K10', 'L', 'Y'),
('181910091', 'MUHAMMAD LUKMAN', 'K10', 'L', 'Y'),
('181910093', 'NOPI SOPIAH', 'K10', 'P', 'Y'),
('181910095', 'RISA YUNIAR', 'K10', 'P', 'Y'),
('181910096', 'ROHMAN', 'K10', 'L', 'Y'),
('181910097', 'SAHRUL SOLEHUDIN', 'K10', 'L', 'Y'),
('181910098', 'SARIF HIDAYAT', 'K10', 'L', 'Y'),
('181910099', 'SILVIANI RAHMAWATI', 'K10', 'P', 'Y'),
('181910100', 'SITI KOMARIYAH', 'K10', 'P', 'Y'),
('181910101', 'TATANG SUHERMAN', 'K10', 'L', 'Y'),
('181910102', 'TRIANA', 'K10', 'L', 'Y'),
('181910104', 'WINDI WIDIAWATI', 'K10', 'P', 'Y'),
('181910105', 'MUHAMMAD RIZAL FAISAL', 'K10', 'L', 'Y'),
('181910106', 'AULIA SEPTIYANI', 'K09', 'P', ''),
('181910107', 'SUSAN AMELIA', 'K08', 'P', 'Y'),
('181910109', 'CICA RUSDATUSAADAH', 'K09', 'P', ''),
('181911110', 'NENG TITA SUMIATI', 'K09', 'P', ''),
('181911111', 'RINI RIANTI', 'K10', 'P', 'Y'),
('192010001', 'AI DAISAH', 'K05', 'P', 'Y'),
('192010002', 'AI SITI MASITOH', 'K05', 'P', 'Y'),
('192010003', 'ANGGI NURAENI', 'K05', 'P', 'Y'),
('192010004', 'ASTRI LESTARI', 'K05', 'P', 'Y'),
('192010005', 'ERMI LINDA', 'K05', 'P', 'Y'),
('192010006', 'FITRA RAHMAWATI', 'K05', 'P', 'Y'),
('192010007', 'FITRIA NOVIANTI', 'K05', 'P', 'Y'),
('192010008', 'FITRI YANI', 'K05', 'P', 'Y'),
('192010009', 'HILNA HILYANTI', 'K05', 'P', 'Y'),
('192010010', 'LINDA NURUL FADILLAH', 'K05', 'P', 'Y'),
('192010011', 'MASWIATUSSIPA', 'K05', 'P', 'Y'),
('192010012', 'MELA FUJIANI', 'K05', 'P', 'Y'),
('192010014', 'MILA MULYA SARI', 'K05', 'P', 'Y'),
('192010015', 'MUHAMAD GILANG P', 'K05', 'L', 'Y'),
('192010017', 'NIA NIHAYATUL ALAWIAH', 'K05', 'P', 'Y'),
('192010019', 'RANI SUNDIYA', 'K05', 'P', 'Y'),
('192010020', 'RATNA NURAENI', 'K05', 'P', 'Y'),
('192010021', 'RIDA LESTARI', 'K05', 'P', 'Y'),
('192010022', 'RINA INDIYANI', 'K05', 'P', 'Y'),
('192010023', 'RISA MAULIDINA', 'K05', 'P', 'Y'),
('192010024', 'ROSIDA', 'K05', 'P', 'Y'),
('192010025', 'ROSMAWATI', 'K05', 'P', 'Y'),
('192010026', 'SABINA OKTAVIANI', 'K05', 'P', 'Y'),
('192010027', 'SAEPUL RIDWAN', 'K05', 'L', 'Y'),
('192010028', 'SHERLY APRILIANI FARDILAH', 'K05', 'P', 'Y'),
('192010029', 'SILVI NURDIANI', 'K05', 'P', 'Y'),
('192010030', 'SITI FAUZIAH', 'K05', 'P', 'Y'),
('192010031', 'SONA', 'K05', 'L', 'Y'),
('192010032', 'SUSAN NURDIANTI', 'K05', 'P', 'Y'),
('192010033', 'TIARANA MUSTIKA', 'K05', 'P', 'Y'),
('192010034', 'WIWIN INDAH SARI', 'K05', 'P', 'Y'),
('192010035', 'YENI MULYANI', 'K05', 'P', 'Y'),
('192010036', 'YESI RISNAWATI', 'K05', 'P', 'Y'),
('192010037', 'ABDUL AHMAD NURZAMAN', 'K04', 'L', 'Y'),
('192010038', 'ACEP KURNIAWAN', 'K04', 'L', 'Y'),
('192010039', 'ADE RAHMAT', 'K04', 'L', 'Y'),
('192010040', 'ALDY RAMDHANI', 'K04', 'L', 'Y'),
('192010041', 'ANDI RISWANTO', 'K04', 'L', 'Y'),
('192010042', 'ARIF NURMULIA', 'K04', 'L', 'Y'),
('192010043', 'ASEP KURNIAWAN HIDAYATULLOH', 'K04', 'L', 'Y'),
('192010044', 'BUNGA SAFITRI', 'K04', 'P', 'Y'),
('192010045', 'DEVI SOPIYANI', 'K04', 'P', 'Y'),
('192010046', 'DINI NURAINI', 'K04', 'P', 'Y'),
('192010047', 'DITA PAUZIAH', 'K04', 'P', 'Y'),
('192010048', 'FADILAH AKBAR', 'K04', 'L', 'Y'),
('192010049', 'FEBRI HERDIYANTO', 'K04', 'L', 'Y'),
('192010051', 'IHSAN FEBRIANSYAH', 'K04', 'L', 'Y'),
('192010052', 'JAJANG M YANTO', 'K04', 'L', 'Y'),
('192010053', 'JAMALUDIN', 'K04', 'L', 'Y'),
('192010054', 'JESIKA MARDIANA', 'K04', 'P', 'Y'),
('192010055', 'LUKMAN NULHAKIM', 'K04', 'L', 'Y'),
('192010056', 'M. FAISAL HERAWAN', 'K04', 'L', 'Y'),
('192010057', 'MIDA ADAWIYAH', 'K04', 'P', 'Y'),
('192010058', 'MUHAMAD FAIZ FAISAL NURWAZDI', 'K04', 'L', 'Y'),
('192010059', 'MUHAMAD RAVLI HIDAYAT', 'K04', 'L', 'Y'),
('192010062', 'NAZWA KHOERUNISA', 'K04', 'P', 'Y'),
('192010063', 'NITA RAHMAWATI', 'K04', 'P', 'Y'),
('192010065', 'PAHMI BAEHAKI', 'K04', 'L', 'Y'),
('192010066', 'PUSPITA AYU RAHAYU', 'K04', 'P', 'Y'),
('192010067', 'PUTRI ROSITA', 'K04', 'P', 'Y'),
('192010068', 'REGINA PUTRI SAFITRI', 'K04', 'P', 'Y'),
('192010069', 'RISKA AMELIA FITRI', 'K04', 'P', 'Y'),
('192010070', 'RIZQI NOVANZA FONA', 'K04', 'L', 'Y'),
('192010071', 'SALWA HADIANSYAH', 'K04', 'L', 'Y'),
('192010072', 'SANTI LASMINING SARI', 'K04', 'P', 'Y'),
('192010073', 'SATIAGI RISPANJI', 'K04', 'L', 'Y'),
('192010074', 'TAOPIK HIDAYAT', 'K04', 'L', 'Y'),
('192010075', 'WINI JULYANI', 'K04', 'P', 'Y'),
('192010076', 'YOSEP ABDUL KHOLIK', 'K04', 'L', 'Y'),
('192010077', 'ADIT LAUDRI FIRMANSYAH', 'K06', 'L', 'Y'),
('192010078', 'AHMAD SAEPULOH', 'K06', 'L', 'Y'),
('192010079', 'AHMAD SEPTIANA', 'K06', 'L', 'Y'),
('192010081', 'ANTONI IBRAHIM', 'K06', 'L', 'Y'),
('192010082', 'ASTRI NURAENI', 'K06', 'P', 'Y'),
('192010083', 'AURA ZULFANISSA HANDAYANI', 'K06', 'P', 'Y'),
('192010084', 'DEKI RIZKI SETIAWAN', 'K06', 'L', 'Y'),
('192010085', 'DINA PUSPITASARI', 'K06', 'P', 'Y'),
('192010086', 'ERNI NIRWANTI', 'K06', 'P', 'Y'),
('192010087', 'FIKI FADILLAH', 'K06', 'L', 'Y'),
('192010088', 'HERTIANA PUTRI', 'K06', 'P', 'Y'),
('192010089', 'INA MARLINA', 'K06', 'P', 'Y'),
('192010090', 'INDRI HERAWATI', 'K06', 'P', 'Y'),
('192010091', 'ISAN', 'K06', 'L', 'Y'),
('192010092', 'LATIF HERMAWAN', 'K06', 'L', 'Y'),
('192010093', 'LUSI PUSPITA SARI', 'K06', 'P', 'Y'),
('192010094', 'LUTPY', 'K06', 'L', 'Y'),
('192010095', 'MUHAMAD HAMZAH FIRMANSYAH', 'K06', 'L', 'Y'),
('192010096', 'MUHAMAD HILMAN', 'K06', 'L', 'Y'),
('192010097', 'MUHAMMAD ARI', 'K06', 'L', 'Y'),
('192010098', 'PAUJIAH LESTARI', 'K06', 'P', 'Y'),
('192010099', 'RESA HALIMATUZZAHROH', 'K06', 'P', 'Y'),
('192010100', 'RIAN BAGUS SUSANTO', 'K06', 'L', 'Y'),
('192010101', 'RISWANDANI', 'K06', 'L', 'Y'),
('192010102', 'SAYMA', 'K06', 'P', 'Y'),
('192010103', 'SULASTRI', 'K06', 'P', 'Y'),
('192010104', 'TESSA LESTARI', 'K06', 'P', 'Y'),
('192010105', 'YUSRI NURAIDA', 'K06', 'P', 'Y'),
('192010106', 'ANNISA HERNISA', 'K06', 'P', 'Y'),
('192010107', 'MITA NURUL HIKMAH', 'K06', 'P', 'Y'),
('192010108', 'ALDI ARDIANSYAH', 'K06', 'L', 'Y'),
('192010109', 'RIFAN NURDIN', 'K06', 'L', ''),
('192010110', 'SHAKILA HOERUNISA', 'K05', 'P', 'Y'),
('202110001', 'Amelia Nursiti Azhara', 'K02', 'P', 'Y'),
('202110002', 'Andi Shofyan', 'K02', 'L', 'Y'),
('202110003', 'Andini Mulyanti', 'K02', 'P', 'Y'),
('202110004', 'Anita', 'K02', 'P', 'Y'),
('202110005', 'Arla Raisya', 'K02', 'P', 'Y'),
('202110006', 'Cindy Septiara Nuraini', 'K02', 'P', 'Y'),
('202110007', 'Dede Yusuf Mujadi', 'K02', 'L', 'Y'),
('202110008', 'Dila Padila', 'K02', 'P', 'Y'),
('202110009', 'Eka Zaenal', 'K02', 'L', 'Y'),
('202110010', 'Elsa Maulina Haya', 'K02', 'P', 'Y'),
('202110011', 'Gina audi', 'K02', 'P', 'Y'),
('202110012', 'Helda Fitriani', 'K02', 'P', 'Y'),
('202110013', 'Imas Julia', 'K02', 'P', 'Y'),
('202110014', 'Melani Roswati', 'K02', 'P', 'Y'),
('202110015', 'Muhamad Rizal', 'K02', 'L', 'Y'),
('202110016', 'Neneng Intan', 'K02', 'P', 'Y'),
('202110017', 'Ninda Agistiani', 'K02', 'P', 'Y'),
('202110018', 'Nisa Herawati', 'K02', 'P', 'Y'),
('202110019', 'Nursafitri', 'K02', 'P', 'Y'),
('202110020', 'Nurul Halisah', 'K02', 'P', 'Y'),
('202110021', 'Rahma auliya', 'K02', 'P', 'Y'),
('202110022', 'Rahma Nabilah', 'K02', 'P', 'Y'),
('202110023', 'Rahma Sopiyani', 'K02', 'P', 'Y'),
('202110024', 'Rapi Nur Hakim', 'K02', 'L', 'Y'),
('202110025', 'Rika Fitriani', 'K02', 'P', 'Y'),
('202110026', 'Rio Febrian', 'K02', 'L', 'Y'),
('202110027', 'Riska Rahmawati', 'K02', 'P', 'Y'),
('202110028', 'Rosa Komalasari', 'K02', 'P', 'Y'),
('202110029', 'Seira Aulia', 'K02', 'P', 'Y'),
('202110030', 'Sela Fitriani', 'K02', 'P', 'Y'),
('202110031', 'Selvi Indriani', 'K02', 'P', 'Y'),
('202110032', 'Shafira Aulya Putri Astri', 'K02', 'P', 'Y'),
('202110033', 'Sifa Nurani', 'K02', 'P', 'Y'),
('202110034', 'Siti Wasiah', 'K02', 'P', 'Y'),
('202110035', 'Siva Salsabilah', 'K02', 'P', 'Y'),
('202110036', 'Syarif Hidayatuloh', 'K02', 'L', 'Y'),
('202110037', 'Taufik Hidayah', 'K02', 'L', 'Y'),
('202110038', 'Virli Rahmatija Azahra', 'K02', 'P', 'Y'),
('202110039', 'Wulan Lestari', 'K02', 'P', 'Y'),
('202110040', 'Adipati Brajamusti', 'K01', 'L', 'Y'),
('202110041', 'Agus Koswara', 'K01', 'L', 'Y'),
('202110042', 'Ahmad Hidayat', 'K01', 'L', 'Y'),
('202110043', 'Ahmad Nur Fakhriyadi', 'K01', 'L', 'Y'),
('202110044', 'Ahmad NurulHakim', 'K01', 'L', 'Y'),
('202110045', 'Ahmad Syahril Genta', 'K01', 'L', 'Y'),
('202110046', 'Antoni', 'K01', 'L', 'Y'),
('202110047', 'Ari Rifansyah', 'K01', 'L', 'Y'),
('202110048', 'Aryo Dwi Cahyono', 'K01', 'L', 'Y'),
('202110049', 'Astrit Sulastri', 'K01', 'P', 'Y'),
('202110050', 'Dikry', 'K01', 'L', 'Y'),
('202110051', 'Dio ramadhan', 'K01', 'L', 'Y'),
('202110052', 'Erna Pahsia Amelia', 'K01', 'P', 'Y'),
('202110053', 'Lutfi Saepul Malik', 'K01', 'L', 'Y'),
('202110054', 'Marga Diaz Achmad Dena', 'K01', 'L', 'Y'),
('202110055', 'Muhammad Andri suryadi', 'K01', 'L', 'Y'),
('202110056', 'Muhammad fajar rahmatullah', 'K01', 'L', 'Y'),
('202110057', 'Muhammad Iqbal', 'K01', 'L', 'Y'),
('202110058', 'Rahmat Setiawan', 'K01', 'L', 'Y'),
('202110059', 'Ramdani', 'K01', 'L', 'Y'),
('202110060', 'Rangga Nugraha Saputra', 'K01', 'L', 'Y'),
('202110061', 'Resti Juliani', 'K01', 'P', 'Y'),
('202110062', 'Rifan Herdiansyah', 'K01', 'L', 'Y'),
('202110063', 'Risman Maulana', 'K01', 'L', 'Y'),
('202110064', 'Rizka Dwi Aditya', 'K01', 'P', 'Y'),
('202110065', 'Sania Silva Apipah', 'K01', 'P', 'Y'),
('202110066', 'Setiawan', 'K01', 'L', 'Y'),
('202110067', 'Sheilla Sinta Reviani', 'K01', 'P', 'Y'),
('202110068', 'Ujang Nurdin', 'K01', 'L', 'Y'),
('202110069', 'Umar Jamaludin', 'K01', 'L', 'Y'),
('202110070', 'Yuda yudistira', 'K01', 'L', 'Y'),
('202110071', 'Adam fadli', 'K07', 'L', 'Y'),
('202110072', 'Adip mulyadi ', 'K07', 'L', 'Y'),
('202110073', 'Ai Elisa', 'K07', 'P', 'Y'),
('202110074', 'Alipah apriliani', 'K07', 'P', 'Y'),
('202110075', 'Alisa fira hamjah', 'K07', 'P', 'Y'),
('202110076', 'Alisa nuriyanti', 'K07', 'P', 'Y'),
('202110077', 'Alwa nursopiah', 'K07', 'P', 'Y'),
('202110078', 'Alya rizki maharani', 'K07', 'P', 'Y'),
('202110079', 'Angga febrian', 'K07', 'L', 'Y'),
('202110080', 'Asti rosdiani mardiansyah', 'K07', 'P', 'Y'),
('202110081', 'bang bang hermawan', 'K07', 'P', 'Y'),
('202110082', 'budiman', 'K07', 'P', 'Y'),
('202110083', 'burhanudin', 'K07', 'L', 'Y'),
('202110084', 'Dea yulia', 'K07', 'P', 'Y'),
('202110085', 'Erna melia tasya', 'K07', 'P', 'Y'),
('202110086', 'Fahmi ahmad fauzi', 'K07', 'L', 'Y'),
('202110087', 'Hilma tajkiyah', 'K07', 'P', 'Y'),
('202110088', 'Ilham', 'K07', 'L', 'Y'),
('202110089', 'Irma laela', 'K07', 'P', 'Y'),
('202110090', 'Irpan Padillah', 'K07', 'L', 'Y'),
('202110091', 'Lina Herlina', 'K07', 'P', 'Y'),
('202110092', 'Mega Aulia', 'K07', 'P', 'Y'),
('202110093', 'Melisa Ardina', 'K07', 'P', 'Y'),
('202110094', 'Muhamad Rifaldi', 'K07', 'L', 'Y'),
('202110095', 'Muhammad Zihad Mubarok Gozali', 'K07', 'L', 'Y'),
('202110096', 'N Selfi Rahmayanti', 'K07', 'P', 'Y'),
('202110097', 'N. Ajeng Siti Yuianti', 'K07', 'P', 'Y'),
('202110098', 'Neng Sela Maryana', 'K07', 'P', 'Y'),
('202110099', 'Neta Awaliyah', 'K07', 'P', 'Y'),
('202110100', 'Nisfi Albany', 'K07', 'P', 'Y'),
('202110101', 'Novita Indrayani', 'K07', 'P', 'Y'),
('202110102', 'Nurul Azizah', 'K07', 'P', 'Y'),
('202110103', 'Padli Padilah', 'K07', 'L', 'Y'),
('202110104', 'Rafizal Nugraha', 'K07', 'L', 'Y'),
('202110105', 'Rahmat Afandi', 'K07', 'L', 'Y'),
('202110106', 'Ratna sari ayu', 'K07', 'P', 'Y'),
('202110107', 'Rezki Abdul Gani', 'K07', 'L', 'Y'),
('202110108', 'Rifqi azistri Johari', 'K07', 'L', 'Y'),
('202110109', 'Rizki Setiawan', 'K07', 'L', 'Y'),
('202110110', 'Robby Fauzi', 'K07', 'L', 'Y'),
('202110111', 'Sahril Hakim', 'K07', 'L', 'Y'),
('202110112', 'Sandi', 'K07', 'L', 'Y'),
('202110113', 'Seni Irgiyani', 'K07', 'P', 'Y'),
('202110114', 'Silva Zakiaturrahmi', 'K07', 'P', 'Y'),
('202110115', 'Sindi Rela', 'K07', 'P', 'Y'),
('202110116', 'Siti Lutfiah ', 'K07', 'P', 'Y'),
('202110117', 'Siti Sopiah', 'K07', 'P', 'Y'),
('202110118', 'Sohib', 'K07', 'L', 'Y'),
('202110119', 'Wandi Juliana', 'K07', 'L', 'Y'),
('202110120', 'Wildan Taupik Nurwahid', 'K07', 'L', 'Y'),
('202110121', 'Yuda pratama', 'K07', 'L', 'Y'),
('202110122', 'Yusuf Kalla', 'K07', 'L', 'Y'),
('202110123', 'Hilmi Muhamad Iksan', 'K01', 'L', ''),
('Aldi Yunan', 'K02', 'L', '', ''),
('Fadlan Abd', 'K01', 'L', '', ''),
('Muhammad I', 'K09', 'L', '', ''),
('Nasep Epen', 'K04', 'P', '', ''),
('TANA', 'K02', 'L', '', '');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `t_kandidat`
--
ALTER TABLE `t_kandidat`
  ADD PRIMARY KEY (`id_kandidat`);

--
-- Indeks untuk tabel `t_kelas`
--
ALTER TABLE `t_kelas`
  ADD PRIMARY KEY (`id_kelas`);

--
-- Indeks untuk tabel `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `t_admin`
--
ALTER TABLE `t_admin`
  MODIFY `id_admin` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `t_kandidat`
--
ALTER TABLE `t_kandidat`
  MODIFY `id_kandidat` smallint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
