-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Mar 2025 pada 06.08
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fix-portofolio`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `desc_diri` text NOT NULL,
  `foto` varchar(100) NOT NULL,
  `job` varchar(50) NOT NULL,
  `alamat_web` varchar(50) NOT NULL,
  `phone` varchar(16) NOT NULL,
  `city` varchar(20) NOT NULL,
  `dagree` varchar(30) NOT NULL,
  `email` varchar(20) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `about`
--

INSERT INTO `about` (`id`, `desc_diri`, `foto`, `job`, `alamat_web`, `phone`, `city`, `dagree`, `email`, `description`) VALUES
(1, 'Saya merupakan fresh graduate Universitas Negeri Jakarta program studi Ilmu Komputer. Saya mempunyai kemampuan membuat dokumentasi website, membuat website, saya juga suka mendesain website atau aplikasi (UI) dan saya juga bisa menggunakan tools : figma, photoshop, wireframing .', '67e02ae4c8237_fotuu.jpg', 'Web Developer', 'www.contoh.com', '0812147483647', 'Jakarta, Indonesia', 'Bachlor Computare Science', '27afny@gmail.com', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pesan` text NOT NULL,
  `subjek` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `home`
--

CREATE TABLE `home` (
  `id` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `job` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `home`
--

INSERT INTO `home` (`id`, `foto`, `nama`, `job`) VALUES
(2, '67e025e0313ee_foto.jpg', 'Afny', 'Web Design');

-- --------------------------------------------------------

--
-- Struktur dari tabel `isi_porto`
--

CREATE TABLE `isi_porto` (
  `id` int(11) NOT NULL,
  `nama_porto` varchar(30) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `link_porto` varchar(2083) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `isi_porto`
--

INSERT INTO `isi_porto` (`id`, `nama_porto`, `foto`, `link_porto`) VALUES
(2, 'UI UX Designer', '67e01e9e81db0_porto1.png', 'https://medium.com/@27afny/ux-case-study-desain-aplikasi-pembelajaran-online-untuk-meningkatkan-skill-981c0e7422f8'),
(3, 'UI/Ux Designer', '67e01eb629f14_porto2.png', 'https://www.figma.com/file/V254V8wDv8PAU0tqIaOKjf/Product-W4C-kelompok-4?node-id=242%3A643'),
(4, 'Proyek Kuliah Sistem Informasi', '67e01f434dbab_porto3.png', 'https://github.com/afnyyy/SIM-LD-Ulul-Albaab');

-- --------------------------------------------------------

--
-- Struktur dari tabel `resume`
--

CREATE TABLE `resume` (
  `id` int(11) NOT NULL,
  `gambaran_diri` text NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `telp` int(11) NOT NULL,
  `alamat_web` varchar(50) NOT NULL,
  `nama_univ` varchar(50) NOT NULL,
  `tahun_masuk_univ` int(11) NOT NULL,
  `tahun_keluar_univ` int(11) NOT NULL,
  `jurusan` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `nama_pengalaman` varchar(50) NOT NULL,
  `tahun_awal_pengalaman` int(11) NOT NULL,
  `tahun_akhir_pengalaman` int(11) NOT NULL,
  `alamat_pengalaman` varchar(50) NOT NULL,
  `deskripsi_pengalaman` text NOT NULL,
  `nama_pengalaman_2` varchar(100) NOT NULL,
  `tahun_awal_pengalaman_2` year(4) NOT NULL,
  `tahun_akhir_pengalaman_2` year(4) NOT NULL,
  `alamat_pengalaman_2` varchar(100) NOT NULL,
  `deskripsi_pengalaman_2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `resume`
--

INSERT INTO `resume` (`id`, `gambaran_diri`, `nama`, `alamat`, `telp`, `alamat_web`, `nama_univ`, `tahun_masuk_univ`, `tahun_keluar_univ`, `jurusan`, `keterangan`, `nama_pengalaman`, `tahun_awal_pengalaman`, `tahun_akhir_pengalaman`, `alamat_pengalaman`, `deskripsi_pengalaman`, `nama_pengalaman_2`, `tahun_awal_pengalaman_2`, `tahun_akhir_pengalaman_2`, `alamat_pengalaman_2`, `deskripsi_pengalaman_2`) VALUES
(1, 'Saya Afny, lulusan Ilmu Komputer Universitas Negeri Jakarta. Saya memiliki pengalaman Internship di PT Bank Rakyat Indonesia selama 1 tahun sebagai Team Information Security dan Social Entrepreneurship and Incubation. Saat berkuliah, saya juga aktif dalam organisasi BEM. Selain itu, saya memiliki keterampilan dalam mengoperasikan tools Microsoft Office (Word, Excel, Powerpoint), JIRA, Confluence, Figma, Canva, serta saya dapat kolaborasi untuk bekerja dalam tim (teamwork) maupun individu. Saya juga mempunyai pengalaman dalam design database schemas, create flowcharts, business process flow diagrams, application UI mockups, reports, dan testing scenarios. Saya juga teliti, detail-oriented, dan terorganisir dalam pekerjaan. Siap berkontribusi untuk perusahaan dengan keterampilan komunikasi, kemampuan belajar hal baru dengan cepat, problem solving yang baik, keterampilan dalam analytical thinking, serta saya memiliki kemauan yang tinggi terhadap belajar hal-hal baru.', 'Afny', 'Jakarta, Indonesia', 2147483647, 'www.contoh.com', 'Universitas Negeri Jakarta', 2018, 2024, 'Ilmu Komputer', 'ipk : 3.62', 'Internship at PT Bank Rakyat Indonesia Tbk', 2024, 2024, 'Jakarta Pusat', 'Team information security digital risk division dengan job desc : \r\n- Menyusun surat dinas untuk keperluan operasional.\r\n- Membantu tim dalam insiden respons dan analisis risiko.\r\n- Mencatat dan mendokumentasikan notulensi rapat.\r\n- Menyusun rekapitulasi terkait surat, brand protection image, aplikasi pihak ketiga, dan vulnerability assessment, kemudian memasukkan hasil rekapitulasi ke dalam tools BRI seperti JIRA, Confluence, dan IRMS.\r\n- Membuat poster infografis untuk meningkatkan kesadaran (awareness).', 'Internship at PT Bank Rakyat Indonesia Tbk', '2022', '2023', 'Jakarta Pusat', 'Team Klaster UMKM Social Entrepreneurship and Incubation dengan job desc : \r\n- Admin website Klaster Binaan Bank BRI.\r\n- Menyeleksi 10 produk unggulan dari lebih dari 2.000 produk UMKM Binaan BRI untuk Bazar Jumat yang diadakan setiap minggu pertama setiap bulan.\r\n- Berkoordinasi dengan mantri dan nasabah dalam proses pemilihan dan komunikasi terkait produk bazar.\r\n- Menyusun materi kourtesi untuk klaster UMKM Binaan Bank BRI.\r\n- Update dan Rekap data UMKM binaan BRI dengan menggunkan Ms. Excel.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `desc_service` text NOT NULL,
  `judul_service` varchar(50) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `services`
--

INSERT INTO `services` (`id`, `desc_service`, `judul_service`, `deskripsi`) VALUES
(2, 'ubah Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate.', 'Web Designer', 'Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate.'),
(3, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus et eleifend nibh, sit amet lacinia magna. Nunc maximus hendrerit neque non placerat. Nulla felis lorem, pulvinar at bibendum vitae, facilisis id mauris.', 'UI Design', '\"Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit...\"');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skill`
--

CREATE TABLE `skill` (
  `id` int(11) NOT NULL,
  `nama_skill` varchar(50) NOT NULL,
  `persentase` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `skill`
--

INSERT INTO `skill` (`id`, `nama_skill`, `persentase`) VALUES
(1, 'Figma', '65'),
(3, 'HTML', '85'),
(4, 'CSS', '65'),
(5, 'Javascript', '30'),
(6, 'PHP', '45'),
(7, 'My SQL', '55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni`
--

CREATE TABLE `testimoni` (
  `id` int(11) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jobdesc` varchar(50) NOT NULL,
  `massage` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `testimoni`
--

INSERT INTO `testimoni` (`id`, `foto`, `nama`, `jobdesc`, `massage`) VALUES
(1, '67e0cbce38b39_1.jpg', 'Monica', 'Senior Manager', 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.'),
(2, '67e0cd850d4f3_handsome-smiling-man-looking-with-disbelief.jpg', 'Jason', 'Manager', 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.'),
(3, '67e0cda2131f5_young-woman-white-shirt-pointing-up.jpg', 'Ratu', 'Founder ', 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.'),
(4, '67e0ce9629f63_67e0cd850d4f3_handsome-smiling-man-looking-with-disbelief.jpg', 'Dami', 'Senior Manager', 'Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `fullname`, `username`) VALUES
(1, '27afny@gmail.com', '12345', 'Afny', 'Afny');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `home`
--
ALTER TABLE `home`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `isi_porto`
--
ALTER TABLE `isi_porto`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `resume`
--
ALTER TABLE `resume`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `skill`
--
ALTER TABLE `skill`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `home`
--
ALTER TABLE `home`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `isi_porto`
--
ALTER TABLE `isi_porto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `resume`
--
ALTER TABLE `resume`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `skill`
--
ALTER TABLE `skill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
