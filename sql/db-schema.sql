-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2020 at 04:54 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elect-1`
--

-- --------------------------------------------------------

--
-- Table structure for table `contestant`
--

CREATE TABLE `contestant` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `profile` int(11) NOT NULL,
  `profilepix` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `contestrole` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `state` int(11) NOT NULL,
  `lga` int(11) NOT NULL,
  `ward` int(11) NOT NULL,
  `dateoc` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `partyid` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contestant_tmp`
--

CREATE TABLE `contestant_tmp` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `partyid` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contestcat`
--

CREATE TABLE `contestcat` (
  `id` int(11) NOT NULL,
  `catname` varchar(255) NOT NULL,
  `catdesc` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `partyactive` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `contestreg`
--

CREATE TABLE `contestreg` (
  `id` int(11) NOT NULL,
  `partyid` int(11) NOT NULL,
  `ctcatid` int(11) NOT NULL,
  `contestantid` int(11) NOT NULL,
  `ctposter` varchar(1000) NOT NULL,
  `ctmsg` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lga`
--

CREATE TABLE `lga` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `state_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `lga`
--

INSERT INTO `lga` (`id`, `name`, `state_id`) VALUES
(1, 'Aba North', 1),
(2, 'Aba South', 1),
(3, 'Arochukwu', 1),
(4, 'Bende', 1),
(5, 'Ikwuano', 1),
(6, 'Isiala Ngwa North', 1),
(7, 'Isiala Ngwa South', 1),
(8, 'Isuikwuato', 1),
(9, 'Obi Ngwa', 1),
(10, 'Ohafia', 1),
(11, 'Osisioma', 1),
(12, 'Ugwunagbo', 1),
(13, 'Ukwa East', 1),
(14, 'Ukwa West', 1),
(15, 'Umuahia North', 1),
(16, 'Umuahia South', 1),
(17, 'Umu Nneochi', 1),
(18, 'Demsa', 2),
(19, 'Fufure', 2),
(20, 'Ganye', 2),
(21, 'Gayuk', 2),
(22, 'Gombi', 2),
(23, 'Grie', 2),
(24, 'Hong', 2),
(25, 'Jada', 2),
(26, 'Larmurde', 2),
(27, 'Madagali', 2),
(28, 'Maiha', 2),
(29, 'Mayo Belwa', 2),
(30, 'Michika', 2),
(31, 'Mubi North', 2),
(32, 'Mubi South', 2),
(33, 'Numan', 2),
(34, 'Shelleng', 2),
(35, 'Song', 2),
(36, 'Toungo', 2),
(37, 'Yola North', 2),
(38, 'Yola South', 2),
(39, 'Abak', 3),
(40, 'Eastern Obolo', 3),
(41, 'Eket', 3),
(42, 'Esit Eket', 3),
(43, 'Essien Udim', 3),
(44, 'Etim Ekpo', 3),
(45, 'Etinan', 3),
(46, 'Ibeno', 3),
(47, 'Ibesikpo Asutan', 3),
(48, 'Ibiono-Ibom', 3),
(49, 'Ika', 3),
(50, 'Ikono', 3),
(51, 'Ikot Abasi', 3),
(52, 'Ikot Ekpene', 3),
(53, 'Ini', 3),
(54, 'Itu', 3),
(55, 'Mbo', 3),
(56, 'Mkpat-Enin', 3),
(57, 'Nsit-Atai', 3),
(58, 'Nsit-Ibom', 3),
(59, 'Nsit-Ubium', 3),
(60, 'Obot Akara', 3),
(61, 'Okobo', 3),
(62, 'Onna', 3),
(63, 'Oron', 3),
(64, 'Oruk Anam', 3),
(65, 'Udung-Uko', 3),
(66, 'Ukanafun', 3),
(67, 'Uruan', 3),
(68, 'Urue-Offong/Oruko', 3),
(69, 'Uyo', 3),
(70, 'Aguata', 4),
(71, 'Anambra East', 4),
(72, 'Anambra West', 4),
(73, 'Anaocha', 4),
(74, 'Awka North', 4),
(75, 'Awka South', 4),
(76, 'Ayamelum', 4),
(77, 'Dunukofia', 4),
(78, 'Ekwusigo', 4),
(79, 'Idemili North', 4),
(80, 'Idemili South', 4),
(81, 'Ihiala', 4),
(82, 'Njikoka', 4),
(83, 'Nnewi North', 4),
(84, 'Nnewi South', 4),
(85, 'Ogbaru', 4),
(86, 'Onitsha North', 4),
(87, 'Onitsha South', 4),
(88, 'Orumba North', 4),
(89, 'Orumba South', 4),
(90, 'Oyi', 4),
(91, 'Alkaleri', 5),
(92, 'Bauchi', 5),
(93, 'Bogoro', 5),
(94, 'Damban', 5),
(95, 'Darazo', 5),
(96, 'Dass', 5),
(97, 'Gamawa', 5),
(98, 'Ganjuwa', 5),
(99, 'Giade', 5),
(100, 'Itas/Gadau', 5),
(101, 'Jama\'are', 5),
(102, 'Katagum', 5),
(103, 'Kirfi', 5),
(104, 'Misau', 5),
(105, 'Ningi', 5),
(106, 'Shira', 5),
(107, 'Tafawa Balewa', 5),
(108, 'Toro', 5),
(109, 'Warji', 5),
(110, 'Zaki', 5),
(111, 'Brass', 6),
(112, 'Ekeremor', 6),
(113, 'Kolokuma/Opokuma', 6),
(114, 'Nembe', 6),
(115, 'Ogbia', 6),
(116, 'Sagbama', 6),
(117, 'Southern Ijaw', 6),
(118, 'Yenagoa', 6),
(119, 'Agatu', 7),
(120, 'Apa', 7),
(121, 'Ado', 7),
(122, 'Buruku', 7),
(123, 'Gboko', 7),
(124, 'Guma', 7),
(125, 'Gwer East', 7),
(126, 'Gwer West', 7),
(127, 'Katsina-Ala', 7),
(128, 'Konshisha', 7),
(129, 'Kwande', 7),
(130, 'Logo', 7),
(131, 'Makurdi', 7),
(132, 'Obi', 7),
(133, 'Ogbadibo', 7),
(134, 'Ohimini', 7),
(135, 'Oju', 7),
(136, 'Okpokwu', 7),
(137, 'Oturkpo', 7),
(138, 'Tarka', 7),
(139, 'Ukum', 7),
(140, 'Ushongo', 7),
(141, 'Vandeikya', 7),
(142, 'Abadam', 8),
(143, 'Askira/Uba', 8),
(144, 'Bama', 8),
(145, 'Bayo', 8),
(146, 'Biu', 8),
(147, 'Chibok', 8),
(148, 'Damboa', 8),
(149, 'Dikwa', 8),
(150, 'Gubio', 8),
(151, 'Guzamala', 8),
(152, 'Gwoza', 8),
(153, 'Hawul', 8),
(154, 'Jere', 8),
(155, 'Kaga', 8),
(156, 'Kala/Balge', 8),
(157, 'Konduga', 8),
(158, 'Kukawa', 8),
(159, 'Kwaya Kusar', 8),
(160, 'Mafa', 8),
(161, 'Magumeri', 8),
(162, 'Maiduguri', 8),
(163, 'Marte', 8),
(164, 'Mobbar', 8),
(165, 'Monguno', 8),
(166, 'Ngala', 8),
(167, 'Nganzai', 8),
(168, 'Shani', 8),
(169, 'Abi', 9),
(170, 'Akamkpa', 9),
(171, 'Akpabuyo', 9),
(172, 'Bakassi', 9),
(173, 'Bekwarra', 9),
(174, 'Biase', 9),
(175, 'Boki', 9),
(176, 'Calabar Municipal', 9),
(177, 'Calabar South', 9),
(178, 'Etung', 9),
(179, 'Ikom', 9),
(180, 'Obanliku', 9),
(181, 'Obubra', 9),
(182, 'Obudu', 9),
(183, 'Odukpani', 9),
(184, 'Ogoja', 9),
(185, 'Yakuur', 9),
(186, 'Yala', 9),
(187, 'Aniocha North', 10),
(188, 'Aniocha South', 10),
(189, 'Bomadi', 10),
(190, 'Burutu', 10),
(191, 'Ethiope East', 10),
(192, 'Ethiope West', 10),
(193, 'Ika North East', 10),
(194, 'Ika South', 10),
(195, 'Isoko North', 10),
(196, 'Isoko South', 10),
(197, 'Ndokwa East', 10),
(198, 'Ndokwa West', 10),
(199, 'Okpe', 10),
(200, 'Oshimili North', 10),
(201, 'Oshimili South', 10),
(202, 'Patani', 10),
(203, 'Sapele, Delta', 10),
(204, 'Udu', 10),
(205, 'Ughelli North', 10),
(206, 'Ughelli South', 10),
(207, 'Ukwuani', 10),
(208, 'Uvwie', 10),
(209, 'Warri North', 10),
(210, 'Warri South', 10),
(211, 'Warri South West', 10),
(212, 'Abakaliki', 11),
(213, 'Afikpo North', 11),
(214, 'Afikpo South', 11),
(215, 'Ebonyi', 11),
(216, 'Ezza North', 11),
(217, 'Ezza South', 11),
(218, 'Ikwo', 11),
(219, 'Ishielu', 11),
(220, 'Ivo', 11),
(221, 'Izzi', 11),
(222, 'Ohaozara', 11),
(223, 'Ohaukwu', 11),
(224, 'Onicha', 11),
(225, 'Akoko-Edo', 12),
(226, 'Egor', 12),
(227, 'Esan Central', 12),
(228, 'Esan North-East', 12),
(229, 'Esan South-East', 12),
(230, 'Esan West', 12),
(231, 'Etsako Central', 12),
(232, 'Etsako East', 12),
(233, 'Etsako West', 12),
(234, 'Igueben', 12),
(235, 'Ikpoba Okha', 12),
(236, 'Orhionmwon', 12),
(237, 'Oredo', 12),
(238, 'Ovia North-East', 12),
(239, 'Ovia South-West', 12),
(240, 'Owan East', 12),
(241, 'Owan West', 12),
(242, 'Uhunmwonde', 12),
(243, 'Ado Ekiti', 13),
(244, 'Efon', 13),
(245, 'Ekiti East', 13),
(246, 'Ekiti South-West', 13),
(247, 'Ekiti West', 13),
(248, 'Emure', 13),
(249, 'Gbonyin', 13),
(250, 'Ido Osi', 13),
(251, 'Ijero', 13),
(252, 'Ikere', 13),
(253, 'Ikole', 13),
(254, 'Ilejemeje', 13),
(255, 'Irepodun/Ifelodun', 13),
(256, 'Ise/Orun', 13),
(257, 'Moba', 13),
(258, 'Oye', 13),
(259, 'Aninri', 14),
(260, 'Awgu', 14),
(261, 'Enugu East', 14),
(262, 'Enugu North', 14),
(263, 'Enugu South', 14),
(264, 'Ezeagu', 14),
(265, 'Igbo Etiti', 14),
(266, 'Igbo Eze North', 14),
(267, 'Igbo Eze South', 14),
(268, 'Isi Uzo', 14),
(269, 'Nkanu East', 14),
(270, 'Nkanu West', 14),
(271, 'Nsukka', 14),
(272, 'Oji River', 14),
(273, 'Udenu', 14),
(274, 'Udi', 14),
(275, 'Uzo Uwani', 14),
(276, 'Abaji', 15),
(277, 'Bwari', 15),
(278, 'Gwagwalada', 15),
(279, 'Kuje', 15),
(280, 'Kwali', 15),
(281, 'Municipal Area Council', 15),
(282, 'Akko', 16),
(283, 'Balanga', 16),
(284, 'Billiri', 16),
(285, 'Dukku', 16),
(286, 'Funakaye', 16),
(287, 'Gombe', 16),
(288, 'Kaltungo', 16),
(289, 'Kwami', 16),
(290, 'Nafada', 16),
(291, 'Shongom', 16),
(292, 'Yamaltu/Deba', 16),
(293, 'Aboh Mbaise', 17),
(294, 'Ahiazu Mbaise', 17),
(295, 'Ehime Mbano', 17),
(296, 'Ezinihitte', 17),
(297, 'Ideato North', 17),
(298, 'Ideato South', 17),
(299, 'Ihitte/Uboma', 17),
(300, 'Ikeduru', 17),
(301, 'Isiala Mbano', 17),
(302, 'Isu', 17),
(303, 'Mbaitoli', 17),
(304, 'Ngor Okpala', 17),
(305, 'Njaba', 17),
(306, 'Nkwerre', 17),
(307, 'Nwangele', 17),
(308, 'Obowo', 17),
(309, 'Oguta', 17),
(310, 'Ohaji/Egbema', 17),
(311, 'Okigwe', 17),
(312, 'Orlu', 17),
(313, 'Orsu', 17),
(314, 'Oru East', 17),
(315, 'Oru West', 17),
(316, 'Owerri Municipal', 17),
(317, 'Owerri North', 17),
(318, 'Owerri West', 17),
(319, 'Unuimo', 17),
(320, 'Auyo', 18),
(321, 'Babura', 18),
(322, 'Biriniwa', 18),
(323, 'Birnin Kudu', 18),
(324, 'Buji', 18),
(325, 'Dutse', 18),
(326, 'Gagarawa', 18),
(327, 'Garki', 18),
(328, 'Gumel', 18),
(329, 'Guri', 18),
(330, 'Gwaram', 18),
(331, 'Gwiwa', 18),
(332, 'Hadejia', 18),
(333, 'Jahun', 18),
(334, 'Kafin Hausa', 18),
(335, 'Kazaure', 18),
(336, 'Kiri Kasama', 18),
(337, 'Kiyawa', 18),
(338, 'Kaugama', 18),
(339, 'Maigatari', 18),
(340, 'Malam Madori', 18),
(341, 'Miga', 18),
(342, 'Ringim', 18),
(343, 'Roni', 18),
(344, 'Sule Tankarkar', 18),
(345, 'Taura', 18),
(346, 'Yankwashi', 18),
(347, 'Birnin Gwari', 19),
(348, 'Chikun', 19),
(349, 'Giwa', 19),
(350, 'Igabi', 19),
(351, 'Ikara', 19),
(352, 'Jaba', 19),
(353, 'Jema\'a', 19),
(354, 'Kachia', 19),
(355, 'Kaduna North', 19),
(356, 'Kaduna South', 19),
(357, 'Kagarko', 19),
(358, 'Kajuru', 19),
(359, 'Kaura', 19),
(360, 'Kauru', 19),
(361, 'Kubau', 19),
(362, 'Kudan', 19),
(363, 'Lere', 19),
(364, 'Makarfi', 19),
(365, 'Sabon Gari', 19),
(366, 'Sanga', 19),
(367, 'Soba', 19),
(368, 'Zangon Kataf', 19),
(369, 'Zaria', 19),
(370, 'Ajingi', 20),
(371, 'Albasu', 20),
(372, 'Bagwai', 20),
(373, 'Bebeji', 20),
(374, 'Bichi', 20),
(375, 'Bunkure', 20),
(376, 'Dala', 20),
(377, 'Dambatta', 20),
(378, 'Dawakin Kudu', 20),
(379, 'Dawakin Tofa', 20),
(380, 'Doguwa', 20),
(381, 'Fagge', 20),
(382, 'Gabasawa', 20),
(383, 'Garko', 20),
(384, 'Garun Mallam', 20),
(385, 'Gaya', 20),
(386, 'Gezawa', 20),
(387, 'Gwale', 20),
(388, 'Gwarzo', 20),
(389, 'Kabo', 20),
(390, 'Kano Municipal', 20),
(391, 'Karaye', 20),
(392, 'Kibiya', 20),
(393, 'Kiru', 20),
(394, 'Kumbotso', 20),
(395, 'Kunchi', 20),
(396, 'Kura', 20),
(397, 'Madobi', 20),
(398, 'Makoda', 20),
(399, 'Minjibir', 20),
(400, 'Nasarawa', 20),
(401, 'Rano', 20),
(402, 'Rimin Gado', 20),
(403, 'Rogo', 20),
(404, 'Shanono', 20),
(405, 'Sumaila', 20),
(406, 'Takai', 20),
(407, 'Tarauni', 20),
(408, 'Tofa', 20),
(409, 'Tsanyawa', 20),
(410, 'Tudun Wada', 20),
(411, 'Ungogo', 20),
(412, 'Warawa', 20),
(413, 'Wudil', 20),
(414, 'Bakori', 21),
(415, 'Batagarawa', 21),
(416, 'Batsari', 21),
(417, 'Baure', 21),
(418, 'Bindawa', 21),
(419, 'Charanchi', 21),
(420, 'Dandume', 21),
(421, 'Danja', 21),
(422, 'Dan Musa', 21),
(423, 'Daura', 21),
(424, 'Dutsi', 21),
(425, 'Dutsin Ma', 21),
(426, 'Faskari', 21),
(427, 'Funtua', 21),
(428, 'Ingawa', 21),
(429, 'Jibia', 21),
(430, 'Kafur', 21),
(431, 'Kaita', 21),
(432, 'Kankara', 21),
(433, 'Kankia', 21),
(434, 'Katsina', 21),
(435, 'Kurfi', 21),
(436, 'Kusada', 21),
(437, 'Mai\'Adua', 21),
(438, 'Malumfashi', 21),
(439, 'Mani', 21),
(440, 'Mashi', 21),
(441, 'Matazu', 21),
(442, 'Musawa', 21),
(443, 'Rimi', 21),
(444, 'Sabuwa', 21),
(445, 'Safana', 21),
(446, 'Sandamu', 21),
(447, 'Zango', 21),
(448, 'Aleiro', 22),
(449, 'Arewa Dandi', 22),
(450, 'Argungu', 22),
(451, 'Augie', 22),
(452, 'Bagudo', 22),
(453, 'Birnin Kebbi', 22),
(454, 'Bunza', 22),
(455, 'Dandi', 22),
(456, 'Fakai', 22),
(457, 'Gwandu', 22),
(458, 'Jega', 22),
(459, 'Kalgo', 22),
(460, 'Koko/Besse', 22),
(461, 'Maiyama', 22),
(462, 'Ngaski', 22),
(463, 'Sakaba', 22),
(464, 'Shanga', 22),
(465, 'Suru', 22),
(466, 'Wasagu/Danko', 22),
(467, 'Yauri', 22),
(468, 'Zuru', 22),
(469, 'Adavi', 23),
(470, 'Ajaokuta', 23),
(471, 'Ankpa', 23),
(472, 'Bassa', 23),
(473, 'Dekina', 23),
(474, 'Ibaji', 23),
(475, 'Idah', 23),
(476, 'Igalamela Odolu', 23),
(477, 'Ijumu', 23),
(478, 'Kabba/Bunu', 23),
(479, 'Kogi', 23),
(480, 'Lokoja', 23),
(481, 'Mopa Muro', 23),
(482, 'Ofu', 23),
(483, 'Ogori/Magongo', 23),
(484, 'Okehi', 23),
(485, 'Okene', 23),
(486, 'Olamaboro', 23),
(487, 'Omala', 23),
(488, 'Yagba East', 23),
(489, 'Yagba West', 23),
(490, 'Asa', 24),
(491, 'Baruten', 24),
(492, 'Edu', 24),
(493, 'Ekiti, Kwara State', 24),
(494, 'Ifelodun', 24),
(495, 'Ilorin East', 24),
(496, 'Ilorin South', 24),
(497, 'Ilorin West', 24),
(498, 'Irepodun', 24),
(499, 'Isin', 24),
(500, 'Kaiama', 24),
(501, 'Moro', 24),
(502, 'Offa', 24),
(503, 'Oke Ero', 24),
(504, 'Oyun', 24),
(505, 'Pategi', 24),
(506, 'Agege', 25),
(507, 'Ajeromi-Ifelodun', 25),
(508, 'Alimosho', 25),
(509, 'Amuwo-Odofin', 25),
(510, 'Apapa', 25),
(511, 'Badagry', 25),
(512, 'Epe', 25),
(513, 'Eti Osa', 25),
(514, 'Ibeju-Lekki', 25),
(515, 'Ifako-Ijaiye', 25),
(516, 'Ikeja', 25),
(517, 'Ikorodu', 25),
(518, 'Kosofe', 25),
(519, 'Lagos Island', 25),
(520, 'Lagos Mainland', 25),
(521, 'Mushin', 25),
(522, 'Ojo', 25),
(523, 'Oshodi-Isolo', 25),
(524, 'Shomolu', 25),
(525, 'Surulere, Lagos State', 25),
(526, 'Akwanga', 26),
(527, 'Awe', 26),
(528, 'Doma', 26),
(529, 'Karu', 26),
(530, 'Keana', 26),
(531, 'Keffi', 26),
(532, 'Kokona', 26),
(533, 'Lafia', 26),
(534, 'Nasarawa', 26),
(535, 'Nasarawa Egon', 26),
(536, 'Obi', 26),
(537, 'Toto', 26),
(538, 'Wamba', 26),
(539, 'Agaie', 27),
(540, 'Agwara', 27),
(541, 'Bida', 27),
(542, 'Borgu', 27),
(543, 'Bosso', 27),
(544, 'Chanchaga', 27),
(545, 'Edati', 27),
(546, 'Gbako', 27),
(547, 'Gurara', 27),
(548, 'Katcha', 27),
(549, 'Kontagora', 27),
(550, 'Lapai', 27),
(551, 'Lavun', 27),
(552, 'Magama', 27),
(553, 'Mariga', 27),
(554, 'Mashegu', 27),
(555, 'Mokwa', 27),
(556, 'Moya', 27),
(557, 'Paikoro', 27),
(558, 'Rafi', 27),
(559, 'Rijau', 27),
(560, 'Shiroro', 27),
(561, 'Suleja', 27),
(562, 'Tafa', 27),
(563, 'Wushishi', 27),
(564, 'Abeokuta North', 28),
(565, 'Abeokuta South', 28),
(566, 'Ado-Odo/Ota', 28),
(567, 'Egbado North', 28),
(568, 'Egbado South', 28),
(569, 'Ewekoro', 28),
(570, 'Ifo', 28),
(571, 'Ijebu East', 28),
(572, 'Ijebu North', 28),
(573, 'Ijebu North East', 28),
(574, 'Ijebu Ode', 28),
(575, 'Ikenne', 28),
(576, 'Imeko Afon', 28),
(577, 'Ipokia', 28),
(578, 'Obafemi Owode', 28),
(579, 'Odeda', 28),
(580, 'Odogbolu', 28),
(581, 'Ogun Waterside', 28),
(582, 'Remo North', 28),
(583, 'Shagamu', 28),
(584, 'Akoko North-East', 29),
(585, 'Akoko North-West', 29),
(586, 'Akoko South-West', 29),
(587, 'Akoko South-East', 29),
(588, 'Akure North', 29),
(589, 'Akure South', 29),
(590, 'Ese Odo', 29),
(591, 'Idanre', 29),
(592, 'Ifedore', 29),
(593, 'Ilaje', 29),
(594, 'Ile Oluji/Okeigbo', 29),
(595, 'Irele', 29),
(596, 'Odigbo', 29),
(597, 'Okitipupa', 29),
(598, 'Ondo East', 29),
(599, 'Ondo West', 29),
(600, 'Ose', 29),
(601, 'Owo', 29),
(602, 'Atakunmosa East', 30),
(603, 'Atakunmosa West', 30),
(604, 'Aiyedaade', 30),
(605, 'Aiyedire', 30),
(606, 'Boluwaduro', 30),
(607, 'Boripe', 30),
(608, 'Ede North', 30),
(609, 'Ede South', 30),
(610, 'Ife Central', 30),
(611, 'Ife East', 30),
(612, 'Ife North', 30),
(613, 'Ife South', 30),
(614, 'Egbedore', 30),
(615, 'Ejigbo', 30),
(616, 'Ifedayo', 30),
(617, 'Ifelodun', 30),
(618, 'Ila', 30),
(619, 'Ilesa East', 30),
(620, 'Ilesa West', 30),
(621, 'Irepodun', 30),
(622, 'Irewole', 30),
(623, 'Isokan', 30),
(624, 'Iwo', 30),
(625, 'Obokun', 30),
(626, 'Odo Otin', 30),
(627, 'Ola Oluwa', 30),
(628, 'Olorunda', 30),
(629, 'Oriade', 30),
(630, 'Orolu', 30),
(631, 'Osogbo', 30),
(632, 'Afijio', 31),
(633, 'Akinyele', 31),
(634, 'Atiba', 31),
(635, 'Atisbo', 31),
(636, 'Egbeda', 31),
(637, 'Ibadan North', 31),
(638, 'Ibadan North-East', 31),
(639, 'Ibadan North-West', 31),
(640, 'Ibadan South-East', 31),
(641, 'Ibadan South-West', 31),
(642, 'Ibarapa Central', 31),
(643, 'Ibarapa East', 31),
(644, 'Ibarapa North', 31),
(645, 'Ido', 31),
(646, 'Irepo', 31),
(647, 'Iseyin', 31),
(648, 'Itesiwaju', 31),
(649, 'Iwajowa', 31),
(650, 'Kajola', 31),
(651, 'Lagelu', 31),
(652, 'Ogbomosho North', 31),
(653, 'Ogbomosho South', 31),
(654, 'Ogo Oluwa', 31),
(655, 'Olorunsogo', 31),
(656, 'Oluyole', 31),
(657, 'Ona Ara', 31),
(658, 'Orelope', 31),
(659, 'Ori Ire', 31),
(660, 'Oyo', 31),
(661, 'Oyo East', 31),
(662, 'Saki East', 31),
(663, 'Saki West', 31),
(664, 'Surulere, Oyo State', 31),
(665, 'Bokkos', 32),
(666, 'Barkin Ladi', 32),
(667, 'Bassa', 32),
(668, 'Jos East', 32),
(669, 'Jos North', 32),
(670, 'Jos South', 32),
(671, 'Kanam', 32),
(672, 'Kanke', 32),
(673, 'Langtang South', 32),
(674, 'Langtang North', 32),
(675, 'Mangu', 32),
(676, 'Mikang', 32),
(677, 'Pankshin', 32),
(678, 'Qua\'an Pan', 32),
(679, 'Riyom', 32),
(680, 'Shendam', 32),
(681, 'Wase', 32),
(682, 'Abua/Odual', 33),
(683, 'Ahoada East', 33),
(684, 'Ahoada West', 33),
(685, 'Akuku-Toru', 33),
(686, 'Andoni', 33),
(687, 'Asari-Toru', 33),
(688, 'Bonny', 33),
(689, 'Degema', 33),
(690, 'Eleme', 33),
(691, 'Emuoha', 33),
(692, 'Etche', 33),
(693, 'Gokana', 33),
(694, 'Ikwerre', 33),
(695, 'Khana', 33),
(696, 'Obio/Akpor', 33),
(697, 'Ogba/Egbema/Ndoni', 33),
(698, 'Ogu/Bolo', 33),
(699, 'Okrika', 33),
(700, 'Omuma', 33),
(701, 'Opobo/Nkoro', 33),
(702, 'Oyigbo', 33),
(703, 'Port Harcourt', 33),
(704, 'Tai', 33),
(705, 'Binji', 34),
(706, 'Bodinga', 34),
(707, 'Dange Shuni', 34),
(708, 'Gada', 34),
(709, 'Goronyo', 34),
(710, 'Gudu', 34),
(711, 'Gwadabawa', 34),
(712, 'Illela', 34),
(713, 'Isa', 34),
(714, 'Kebbe', 34),
(715, 'Kware', 34),
(716, 'Rabah', 34),
(717, 'Sabon Birni', 34),
(718, 'Shagari', 34),
(719, 'Silame', 34),
(720, 'Sokoto North', 34),
(721, 'Sokoto South', 34),
(722, 'Tambuwal', 34),
(723, 'Tangaza', 34),
(724, 'Tureta', 34),
(725, 'Wamako', 34),
(726, 'Wurno', 34),
(727, 'Yabo', 34),
(728, 'Ardo Kola', 35),
(729, 'Bali', 35),
(730, 'Donga', 35),
(731, 'Gashaka', 35),
(732, 'Gassol', 35),
(733, 'Ibi', 35),
(734, 'Jalingo', 35),
(735, 'Karim Lamido', 35),
(736, 'Kumi', 35),
(737, 'Lau', 35),
(738, 'Sardauna', 35),
(739, 'Takum', 35),
(740, 'Ussa', 35),
(741, 'Wukari', 35),
(742, 'Yorro', 35),
(743, 'Zing', 35),
(744, 'Bade', 36),
(745, 'Bursari', 36),
(746, 'Damaturu', 36),
(747, 'Fika', 36),
(748, 'Fune', 36),
(749, 'Geidam', 36),
(750, 'Gujba', 36),
(751, 'Gulani', 36),
(752, 'Jakusko', 36),
(753, 'Karasuwa', 36),
(754, 'Machina', 36),
(755, 'Nangere', 36),
(756, 'Nguru', 36),
(757, 'Potiskum', 36),
(758, 'Tarmuwa', 36),
(759, 'Yunusari', 36),
(760, 'Yusufari', 36),
(761, 'Anka', 37),
(762, 'Bakura', 37),
(763, 'Birnin Magaji/Kiyaw', 37),
(764, 'Bukkuyum', 37),
(765, 'Bungudu', 37),
(766, 'Gummi', 37),
(767, 'Gusau', 37),
(768, 'Kaura Namoda', 37),
(769, 'Maradun', 37),
(770, 'Maru', 37),
(771, 'Shinkafi', 37),
(772, 'Talata Mafara', 37),
(773, 'Chafe', 37),
(774, 'Zurmi', 37);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `profilepix` varchar(255) NOT NULL,
  `dateoc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `username`, `password`, `fullname`, `profilepix`, `dateoc`) VALUES
(1, 'mcdave92', '21232f297a57a5a743894a0e4a801fc3', 'Mcdavid Obioha', '', '2020-11-24 19:22:06'),
(2, 'dave92', '21232f297a57a5a743894a0e4a801fc3', 'Michelle Parker', '', '2020-11-24 19:22:06'),
(3, 'davie', '21232f297a57a5a743894a0e4a801fc3', 'Mcdavid', '_65QFl7B_400x400.png', '2020-11-24 19:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `image` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `body`, `image`, `date`) VALUES
(2, 'Have you registered for voting?', 'Hope you have registered', '3.jpg', '2020-11-25 03:50:22'),
(3, 'Atiku is winning Bayelsa', ' Ok ddhdhhdhhfenkkwkkOk ddhdhhdhhfenkkwkkOk ddhdhhdhhfenkkwkkOk ddhdhhdhhfenkkwkkOk ddhdhhdhhfenkkwkkOk ddhdhhdhhfenkkwkkOk ddhdhhdhhfenkkwkkOk ddhdhhdhhfenkkwkkOk ddhdhhdhhfenkkwkkOk ddhdhhdhhfenkkwkkOk ddhdhhdhhfenkkwkkOk ddhdhhdhhfenkkwkkOk ddhdhhdhhfenkkwkkOk ddhdhhdhhfenkkwkkOk ddhdhhdhhfenkkwkkOk ddhdhhdhhfenkkwkkOk ddhdhhdhhfenkkwkkOk ddhdhhdhhfenkkwkk  cjcj', 'product-shop1.jpg', '2020-11-25 03:34:26');

-- --------------------------------------------------------

--
-- Table structure for table `parties`
--

CREATE TABLE `parties` (
  `id` int(11) NOT NULL,
  `partyname` text NOT NULL,
  `partydesc` text NOT NULL,
  `partylogo` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`id`, `name`) VALUES
(1, 'Abia'),
(2, 'Adamawa'),
(3, 'Akwa Ibom'),
(4, 'Anambra'),
(5, 'Bauchi'),
(6, 'Bayelsa'),
(7, 'Benue'),
(8, 'Borno'),
(9, 'Cross River'),
(10, 'Delta'),
(11, 'Ebonyi'),
(12, 'Edo'),
(13, 'Ekiti'),
(14, 'Enugu'),
(15, 'FCT'),
(16, 'Gombe'),
(17, 'Imo'),
(18, 'Jigawa'),
(19, 'Kaduna'),
(20, 'Kano'),
(21, 'Katsina'),
(22, 'Kebbi'),
(23, 'Kogi'),
(24, 'Kwara'),
(25, 'Lagos'),
(26, 'Nasarawa'),
(27, 'Niger'),
(28, 'Ogun'),
(29, 'Ondo'),
(30, 'Osun'),
(31, 'Oyo'),
(32, 'Plateau'),
(33, 'Rivers'),
(34, 'Sokoto'),
(35, 'Taraba'),
(36, 'Yobe'),
(37, 'Zamfara');

-- --------------------------------------------------------

--
-- Table structure for table `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `userlogin` varchar(255) NOT NULL,
  `userip` binary(16) NOT NULL,
  `loginTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `logout` varchar(255) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `voters`
--

CREATE TABLE `voters` (
  `id` int(10) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `profile` int(2) DEFAULT '0',
  `profilepix` varchar(255) NOT NULL,
  `works` varchar(255) NOT NULL,
  `dob` date NOT NULL,
  `dateoc` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `gender` varchar(255) NOT NULL,
  `states` varchar(255) NOT NULL,
  `lga` varchar(255) NOT NULL,
  `ward` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `socialfb` varchar(255) NOT NULL,
  `socialtw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `votes`
--

CREATE TABLE `votes` (
  `id` int(11) NOT NULL,
  `catid` int(11) NOT NULL,
  `voterid` int(11) NOT NULL,
  `voterip` varchar(255) NOT NULL,
  `contestantid` int(11) NOT NULL,
  `voterdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `sign` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `wards`
--

CREATE TABLE `wards` (
  `id` int(11) NOT NULL,
  `lga_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wards`
--

INSERT INTO `wards` (`id`, `lga_id`, `name`) VALUES
(1, 276, 'Abaji Ward'),
(2, 277, 'Bwari Ward'),
(3, 278, 'Gwagwalada Ward'),
(4, 279, 'Kuje Ward'),
(5, 280, 'Kwali Ward'),
(6, 281, 'Municipal Area Council Ward'),
(7, 506, 'Agege Ward'),
(8, 507, 'Ajeromi-Ifelodun Ward'),
(9, 508, 'Alimosho Ward'),
(10, 509, 'Amuwo-Odofin Ward'),
(11, 510, 'Apapa Ward'),
(12, 511, 'Badagry Ward'),
(13, 512, 'Epe Ward'),
(14, 513, 'Eti Osa Ward'),
(15, 514, 'Ibeju-Lekki Ward'),
(16, 515, 'Ifako-Ijaiye Ward'),
(17, 516, 'Ikeja Ward'),
(18, 517, 'Ikorodu Ward'),
(19, 518, 'Kosofe Ward'),
(20, 519, 'Lagos Island Ward'),
(21, 520, 'Lagos Mainland Ward'),
(22, 521, 'Muchin Ward'),
(23, 522, 'Ojo Ward'),
(24, 523, 'Oshodi-Isolo Ward'),
(25, 524, 'Shomolu Ward'),
(26, 525, 'Surulere Ward');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contestant`
--
ALTER TABLE `contestant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contestant_tmp`
--
ALTER TABLE `contestant_tmp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contestcat`
--
ALTER TABLE `contestcat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contestreg`
--
ALTER TABLE `contestreg`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lga`
--
ALTER TABLE `lga`
  ADD PRIMARY KEY (`id`),
  ADD KEY `state_id` (`state_id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parties`
--
ALTER TABLE `parties`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `voters`
--
ALTER TABLE `voters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `votes`
--
ALTER TABLE `votes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wards`
--
ALTER TABLE `wards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lga_id` (`lga_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contestant`
--
ALTER TABLE `contestant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contestant_tmp`
--
ALTER TABLE `contestant_tmp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contestcat`
--
ALTER TABLE `contestcat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `contestreg`
--
ALTER TABLE `contestreg`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lga`
--
ALTER TABLE `lga`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=775;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `parties`
--
ALTER TABLE `parties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `voters`
--
ALTER TABLE `voters`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `votes`
--
ALTER TABLE `votes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `wards`
--
ALTER TABLE `wards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lga`
--
ALTER TABLE `lga`
  ADD CONSTRAINT `lga_ibfk_1` FOREIGN KEY (`state_id`) REFERENCES `states` (`id`);

--
-- Constraints for table `wards`
--
ALTER TABLE `wards`
  ADD CONSTRAINT `wards_ibfk_1` FOREIGN KEY (`lga_id`) REFERENCES `lga` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
