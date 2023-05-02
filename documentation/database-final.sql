--User:
--Username: sampleuser1
--Password: SamplePass1!


--Admin:
--Username: sampleadmin1
--Password: SamplePass1!
-- --------------------------------------------------------

--
-- Table structure for table `companies_cmp`
--

CREATE TABLE `companies_cmp` (
  `id` int(11) NOT NULL,
  `name_cmp` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `companies_cmp`
--

INSERT INTO `companies_cmp` (`id`, `name_cmp`) VALUES
(1, '10TACLE Studios'),
(2, '1C Company'),
(3, '20th Century Fox Video Games'),
(4, '2D Boy'),
(5, '3DO'),
(6, '49Games'),
(7, '505 Games'),
(8, '5pb'),
(9, '7G//AMES'),
(10, '989 Sports'),
(11, '989 Studios'),
(12, 'Abylight'),
(13, 'Acclaim Entertainment'),
(14, 'Accolade'),
(15, 'Ackkstudios'),
(16, 'Acquire'),
(17, 'Activision'),
(18, 'Activision Blizzard'),
(19, 'Activision Value'),
(20, 'Adeline Software'),
(21, 'Aerosoft'),
(22, 'Agatsuma Entertainment'),
(23, 'Agetec'),
(24, 'Aksys Games'),
(25, 'Alawar Entertainment'),
(26, 'Alchemist'),
(27, 'Alternative Software'),
(28, 'Altron'),
(29, 'Alvion'),
(30, 'American Softworks'),
(31, 'Angel Studios'),
(32, 'Answer Software'),
(33, 'AQ Interactive'),
(34, 'Aqua Plus'),
(35, 'Aques'),
(36, 'Arc System Works'),
(37, 'Arena Entertainment'),
(38, 'Aria'),
(39, 'Arika'),
(40, 'ArtDink'),
(41, 'Aruze Corp'),
(42, 'ASC Games'),
(43, 'Ascaron Entertainment'),
(44, 'Ascaron Entertainment GmbH'),
(45, 'ASCII Entertainment'),
(46, 'ASCII Media Works'),
(47, 'Asgard'),
(48, 'ASK'),
(49, 'Asmik Ace Entertainment'),
(50, 'Asmik Corp'),
(51, 'Aspyr'),
(52, 'Astragon'),
(53, 'Asylum Entertainment'),
(54, 'Atari'),
(55, 'Athena'),
(56, 'Atlus'),
(57, 'Avalon Interactive'),
(58, 'Avanquest'),
(59, 'Avanquest Software'),
(60, 'Axela'),
(61, 'BAM! Entertainment'),
(62, 'Banpresto'),
(63, 'Benesse'),
(64, 'Berkeley'),
(65, 'Bethesda Softworks'),
(66, 'Big Ben Interactive'),
(67, 'Big Fish Games'),
(68, 'Bigben Interactive'),
(69, 'bitComposer Games'),
(70, 'Black Bean Games'),
(71, 'Black Label Games'),
(72, 'Blast! Entertainment Ltd'),
(73, 'Blue Byte'),
(74, 'BMG Interactive Entertainment'),
(75, 'Bohemia Interactive'),
(76, 'Bomb'),
(77, 'Boost On'),
(78, 'BPS'),
(79, 'Brash Entertainment'),
(80, 'Broccoli'),
(81, 'BushiRoad'),
(82, 'Capcom'),
(83, 'Cave'),
(84, 'CBS Electronics'),
(85, 'CCP'),
(86, 'CDV Software Entertainment'),
(87, 'ChunSoft'),
(88, 'City Interactive'),
(89, 'Cloud Imperium Games Corporation'),
(90, 'Coconuts Japan'),
(91, 'Codemasters'),
(92, 'Codemasters Online'),
(93, 'CokeM Interactive'),
(94, 'Coleco'),
(95, 'Comfort'),
(96, 'Commseed'),
(97, 'Compile'),
(98, 'Compile Heart'),
(99, 'Conspiracy Entertainment'),
(100, 'Core Design Ltd.'),
(101, 'CPG Products'),
(102, 'Crave Entertainment'),
(103, 'Creative Core'),
(104, 'Crimson Cow'),
(105, 'Crystal Dynamics'),
(106, 'CTO SpA'),
(107, 'Culture Brain'),
(108, 'Culture Publishers'),
(109, 'CyberFront'),
(110, 'Cygames'),
(111, 'D3Publisher'),
(112, 'Daedalic'),
(113, 'Daedalic Entertainment'),
(114, 'Daito'),
(115, 'Data Age'),
(116, 'Data Design Interactive'),
(117, 'Data East'),
(118, 'Datam Polystar'),
(119, 'Deep Silver'),
(120, 'Destination Software, Inc'),
(121, 'Destineer'),
(122, 'Detn8 Games'),
(123, 'Devolver Digital'),
(124, 'DHM Interactive'),
(125, 'DigiCube'),
(126, 'Disney Interactive Studios'),
(127, 'Dorart'),
(128, 'dramatic create'),
(129, 'DreamCatcher Interactive'),
(130, 'DreamWorks Interactive'),
(131, 'DSI Games'),
(132, 'DTP Entertainment'),
(133, 'Dusenberry Martin Racing'),
(134, 'EA Games'),
(135, 'Easy Interactive'),
(136, 'Ecole'),
(137, 'Edia'),
(138, 'Eidos Interactive'),
(139, 'Electronic Arts'),
(140, 'Electronic Arts Victor'),
(141, 'Elf'),
(142, 'Elite'),
(143, 'Empire Interactive'),
(144, 'Encore'),
(145, 'Enix Corporation'),
(146, 'Enjoy Gaming ltd.'),
(147, 'Enterbrain'),
(148, 'EON Digital Entertainment'),
(149, 'Epic Games'),
(150, 'Epoch'),
(151, 'Ertain'),
(152, 'ESP'),
(153, 'Essential Games'),
(154, 'Evolution Games'),
(155, 'Evolved Games'),
(156, 'Excalibur Publishing'),
(157, 'Experience Inc.'),
(158, 'Extreme Entertainment Group'),
(159, 'Falcom Corporation'),
(160, 'Fields'),
(161, 'Flashpoint Games'),
(162, 'Flight-Plan'),
(163, 'Focus Home Interactive'),
(164, 'Focus Multimedia'),
(165, 'fonfun'),
(166, 'Foreign Media Games'),
(167, 'Fortyfive'),
(168, 'Fox Interactive'),
(169, 'From Software'),
(170, 'Fuji'),
(171, 'Funbox Media'),
(172, 'Funcom'),
(173, 'FunSoft'),
(174, 'Funsta'),
(175, 'FuRyu'),
(176, 'FuRyu Corporation'),
(177, 'G.Rev'),
(178, 'Gaga'),
(179, 'Gainax Network Systems'),
(180, 'Gakken'),
(181, 'Game Arts'),
(182, 'Game Factory'),
(183, 'Game Life'),
(184, 'Gamebridge'),
(185, 'Gamecock'),
(186, 'Gameloft'),
(187, 'GameMill Entertainment'),
(188, 'GameTek'),
(189, 'Gathering of Developers'),
(190, 'General Entertainment'),
(191, 'Genki'),
(192, 'Genterprise'),
(193, 'Ghostlight'),
(194, 'Giga'),
(195, 'Giza10'),
(196, 'Glams'),
(197, 'Global A Entertainment'),
(198, 'Global Star'),
(199, 'GN Software'),
(200, 'GOA'),
(201, 'Gotham Games'),
(202, 'Graffiti'),
(203, 'Grand Prix Games'),
(204, 'Graphsim Entertainment'),
(205, 'Gremlin Interactive Ltd'),
(206, 'Griffin International'),
(207, 'Groove Games'),
(208, 'GSP'),
(209, 'GT Interactive'),
(210, 'GungHo'),
(211, 'Gust'),
(212, 'Hackberry'),
(213, 'HAL Laboratory'),
(214, 'Hamster Corporation'),
(215, 'Happinet'),
(216, 'Harmonix Music Systems'),
(217, 'Hasbro Interactive'),
(218, 'Havas Interactive'),
(219, 'Headup Games'),
(220, 'Hearty Robin'),
(221, 'Hect'),
(222, 'Hello Games'),
(223, 'Her Interactive'),
(224, 'Hip Interactive'),
(225, 'HMH Interactive'),
(226, 'Home Entertainment Suppliers'),
(227, 'Hudson Entertainment'),
(228, 'Hudson Soft'),
(229, 'Human Entertainment'),
(230, 'HuneX'),
(231, 'Iceberg Interactive'),
(232, 'id Software'),
(233, 'Idea Factory'),
(234, 'Idea Factory International'),
(235, 'IE Institute'),
(236, 'Ignition Entertainment'),
(237, 'Illusion Softworks'),
(238, 'Imadio'),
(239, 'Image Epoch'),
(240, 'imageepoch Inc.'),
(241, 'Imageworks'),
(242, 'Imagic'),
(243, 'Imagineer'),
(244, 'Imax'),
(245, 'Indie Games'),
(246, 'Infogrames'),
(247, 'Insomniac Games'),
(248, 'Interchannel'),
(249, 'Interchannel-Holon'),
(250, 'Intergrow'),
(251, 'Interplay'),
(252, 'Interplay Productions'),
(253, 'Interworks Unlimited, Inc.'),
(254, 'Inti Creates'),
(255, 'Introversion Software'),
(256, 'inXile Entertainment'),
(257, 'Irem Software Engineering'),
(258, 'ITT Family Games'),
(259, 'Ivolgamus'),
(260, 'iWin'),
(261, 'Jack of All Games'),
(262, 'Jaleco'),
(263, 'Jester Interactive'),
(264, 'Jorudan'),
(265, 'JoWood Productions'),
(266, 'Just Flight'),
(267, 'JVC'),
(268, 'Kadokawa Games'),
(269, 'Kadokawa Shoten'),
(270, 'Kaga Create'),
(271, 'Kalypso Media'),
(272, 'Kamui'),
(273, 'Kando Games'),
(274, 'Karin Entertainment'),
(275, 'Kemco'),
(276, 'KID'),
(277, 'Kids Station'),
(278, 'King Records'),
(279, 'Knowledge Adventure'),
(280, 'Koch Media'),
(281, 'Kokopeli Digital Studios'),
(282, 'Konami Digital Entertainment'),
(283, 'Kool Kizz'),
(284, 'KSS'),
(285, 'Laguna'),
(286, 'Legacy Interactive'),
(287, 'LEGO Media'),
(288, 'Level 5'),
(289, 'Lexicon Entertainment'),
(290, 'Licensed 4U'),
(291, 'Lighthouse Interactive'),
(292, 'Liquid Games'),
(293, 'Little Orbit'),
(294, 'Locus'),
(295, 'LSP Games'),
(296, 'LucasArts'),
(297, 'Mad Catz'),
(298, 'Magical Company'),
(299, 'Magix'),
(300, 'Majesco Entertainment'),
(301, 'Mamba Games'),
(302, 'Marvel Entertainment'),
(303, 'Marvelous Entertainment'),
(304, 'Marvelous Games'),
(305, 'Marvelous Interactive'),
(306, 'Masque Publishing'),
(307, 'Mastertronic'),
(308, 'Mastiff'),
(309, 'Mattel Interactive'),
(310, 'Max Five'),
(311, 'Maximum Family Games'),
(312, 'Maxis'),
(313, 'MC2 Entertainment'),
(314, 'Media Entertainment'),
(315, 'Media Factory'),
(316, 'Media Rings'),
(317, 'Media Works'),
(318, 'MediaQuest'),
(319, 'Men-A-Vision'),
(320, 'Mentor Interactive'),
(321, 'Mercury Games'),
(322, 'Merscom LLC'),
(323, 'Metro 3D'),
(324, 'Michaelsoft'),
(325, 'Micro Cabin'),
(326, 'Microids'),
(327, 'Microprose'),
(328, 'Microsoft Game Studios'),
(329, 'Midas Interactive Entertainment'),
(330, 'Midway Games'),
(331, 'Milestone'),
(332, 'Milestone S.r.l'),
(333, 'Milestone S.r.l.'),
(334, 'Minato Station'),
(335, 'Mindscape'),
(336, 'Mirai Shounen'),
(337, 'Misawa'),
(338, 'Mitsui'),
(339, 'mixi, Inc'),
(340, 'MLB.com'),
(341, 'Mojang'),
(342, 'Monte Christo Multimedia'),
(343, 'Moss'),
(344, 'MTO'),
(345, 'MTV Games'),
(346, 'Mud Duck Productions'),
(347, 'Mumbo Jumbo'),
(348, 'Mycom'),
(349, 'Myelin Media'),
(350, 'Mystique'),
(351, 'N/A'),
(352, 'Namco Bandai Games'),
(353, 'Natsume'),
(354, 'Navarre Corp'),
(355, 'Naxat Soft'),
(356, 'NCS'),
(357, 'NCSoft'),
(358, 'NDA Productions'),
(359, 'NEC'),
(360, 'NEC Interchannel'),
(361, 'Neko Entertainment'),
(362, 'NetRevo'),
(363, 'New'),
(364, 'New World Computing'),
(365, 'NewKidCo'),
(366, 'Nexon'),
(367, 'Nichibutsu'),
(368, 'Nihon Falcom Corporation'),
(369, 'Nintendo'),
(370, 'Nippon Amuse'),
(371, 'Nippon Columbia'),
(372, 'Nippon Ichi Software'),
(373, 'Nippon Telenet'),
(374, 'Nitroplus'),
(375, 'Nobilis'),
(376, 'Nordcurrent'),
(377, 'Nordic Games'),
(378, 'NovaLogic'),
(379, 'Number None'),
(380, 'O-Games'),
(381, 'O3 Entertainment'),
(382, 'Ocean'),
(383, 'Office Create'),
(384, 'On Demand'),
(385, 'Ongakukan'),
(386, 'Origin Systems'),
(387, 'Otomate'),
(388, 'Oxygen Interactive'),
(389, 'P2 Games'),
(390, 'Pacific Century Cyber Works'),
(391, 'Pack In Soft'),
(392, 'Pack-In-Video'),
(393, 'Palcom'),
(394, 'Panther Software'),
(395, 'Paon'),
(396, 'Paon Corporation'),
(397, 'Paradox Development'),
(398, 'Paradox Interactive'),
(399, 'Parker Bros.'),
(400, 'Performance Designed Products'),
(401, 'Phantagram'),
(402, 'Phantom EFX'),
(403, 'Phenomedia'),
(404, 'Phoenix Games'),
(405, 'Piacci'),
(406, 'Pinnacle'),
(407, 'Pioneer LDC'),
(408, 'Play It'),
(409, 'Playlogic Game Factory'),
(410, 'Playmates'),
(411, 'Playmore'),
(412, 'PlayV'),
(413, 'Plenty'),
(414, 'PM Studios'),
(415, 'Pony Canyon'),
(416, 'PopCap Games'),
(417, 'Popcorn Arcade'),
(418, 'PopTop Software'),
(419, 'Pow'),
(420, 'PQube'),
(421, 'Princess Soft'),
(422, 'Prototype'),
(423, 'Psygnosis'),
(424, 'Quelle'),
(425, 'Quest'),
(426, 'Quinrose'),
(427, 'Quintet'),
(428, 'Rage Software'),
(429, 'Rain Games'),
(430, 'Rebellion'),
(431, 'Rebellion Developments'),
(432, 'RED Entertainment'),
(433, 'Red Orb'),
(434, 'Red Storm Entertainment'),
(435, 'RedOctane'),
(436, 'Reef Entertainment'),
(437, 'responDESIGN'),
(438, 'Revolution (Japan)'),
(439, 'Revolution Software'),
(440, 'Rising Star Games'),
(441, 'Riverhillsoft'),
(442, 'Rocket Company'),
(443, 'Rondomedia'),
(444, 'RTL'),
(445, 'Russel'),
(446, 'Sammy Corporation'),
(447, 'Saurus'),
(448, 'Scholastic Inc.'),
(449, 'SCi'),
(450, 'Screenlife'),
(451, 'SCS Software'),
(452, 'Sega'),
(453, 'Seta Corporation'),
(454, 'Seventh Chord'),
(455, 'Shogakukan'),
(456, 'Simon & Schuster Interactive'),
(457, 'Slightly Mad Studios'),
(458, 'Slitherine Software'),
(459, 'SNK'),
(460, 'SNK Playmore'),
(461, 'Societa'),
(462, 'Sold Out'),
(463, 'Sonnet'),
(464, 'Sony Computer Entertainment'),
(465, 'Sony Computer Entertainment America'),
(466, 'Sony Computer Entertainment Europe'),
(467, 'Sony Music Entertainment'),
(468, 'Sony Online Entertainment'),
(469, 'SouthPeak Games'),
(470, 'Spike'),
(471, 'SPS'),
(472, 'Square'),
(473, 'Square EA'),
(474, 'Square Enix'),
(475, 'SquareSoft'),
(476, 'SSI'),
(477, 'Stainless Games'),
(478, 'Starfish'),
(479, 'Starpath Corp.'),
(480, 'Sting'),
(481, 'Storm City Games'),
(482, 'Strategy First'),
(483, 'Success'),
(484, 'Summitsoft'),
(485, 'Sunflowers'),
(486, 'Sunrise Interactive'),
(487, 'Sunsoft'),
(488, 'Sweets'),
(489, 'Swing! Entertainment'),
(490, 'Syscom'),
(491, 'System 3'),
(492, 'System 3 Arcade Software'),
(493, 'System Soft'),
(494, 'T&E Soft'),
(495, 'Taito'),
(496, 'Takara'),
(497, 'Takara Tomy'),
(498, 'Take-Two Interactive'),
(499, 'Takuyo'),
(500, 'TalonSoft'),
(501, 'TDK Core'),
(502, 'TDK Mediactive'),
(503, 'Team17 Software'),
(504, 'Technos Japan Corporation'),
(505, 'TechnoSoft'),
(506, 'Tecmo Koei'),
(507, 'Telegames'),
(508, 'Telltale Games'),
(509, 'Telstar'),
(510, 'Tetris Online'),
(511, 'TGL'),
(512, 'The Adventure Company'),
(513, 'The Learning Company'),
(514, 'THQ'),
(515, 'Tigervision'),
(516, 'Time Warner Interactive'),
(517, 'Titus'),
(518, 'Tivola'),
(519, 'TOHO'),
(520, 'Tommo'),
(521, 'Tomy Corporation'),
(522, 'TopWare Interactive'),
(523, 'Touchstone'),
(524, 'Tradewest'),
(525, 'Trion Worlds'),
(526, 'Tripwire Interactive'),
(527, 'Tru Blu Entertainment'),
(528, 'Tryfirst'),
(529, 'TYO'),
(530, 'Type-Moon'),
(531, 'U.S. Gold'),
(532, 'Ubisoft'),
(533, 'Ubisoft Annecy'),
(534, 'UEP Systems'),
(535, 'UFO Interactive'),
(536, 'UIG Entertainment'),
(537, 'Universal Gamex'),
(538, 'Universal Interactive'),
(539, 'Unknown'),
(540, 'Valcon Games'),
(541, 'ValuSoft'),
(542, 'Valve'),
(543, 'Valve Software'),
(544, 'Vap'),
(545, 'Vatical Entertainment'),
(546, 'Vic Tokai'),
(547, 'Victor Interactive'),
(548, 'Video System'),
(549, 'Views'),
(550, 'Vir2L Studios'),
(551, 'Virgin Interactive'),
(552, 'Virtual Play Games'),
(553, 'Visco'),
(554, 'Vivendi Games'),
(555, 'Wanadoo'),
(556, 'Warashi'),
(557, 'Wargaming.net'),
(558, 'Warner Bros. Interactive Entertainment'),
(559, 'Warp'),
(560, 'WayForward Technologies'),
(561, 'Westwood Studios'),
(562, 'White Park Bay Software'),
(563, 'Wizard Video Games'),
(564, 'Xicat Interactive'),
(565, 'Xing Entertainment'),
(566, 'Xplosiv'),
(567, 'XS Games'),
(568, 'Xseed Games'),
(569, 'Yacht Club Games'),
(570, 'Yamasa Entertainment'),
(571, 'Yeti'),
(572, 'Yuke\'s'),
(573, 'Yumedia'),
(574, 'Zenrin'),
(575, 'Zoo Digital Publishing'),
(576, 'Zoo Games'),
(577, 'Zushi Games'),
(578, 'Other/Not Listed');

-- --------------------------------------------------------

--
-- Table structure for table `consoles_con`
--

CREATE TABLE `consoles_con` (
  `id` int(11) NOT NULL,
  `name_con` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `consoles_con`
--

INSERT INTO `consoles_con` (`id`, `name_con`) VALUES
(1, 'Wii'),
(2, 'NES'),
(3, 'Game Boy/Game Boy Color'),
(4, 'Nintendo DS'),
(5, 'Xbox 360'),
(6, 'PS3'),
(7, 'PS2'),
(8, 'SNES'),
(9, 'GBA'),
(10, '3DS'),
(11, 'PS4'),
(12, 'N64'),
(13, 'PS1'),
(14, 'XBox'),
(15, 'PC'),
(16, 'Atari 2600'),
(17, 'PSP'),
(18, 'XBox One'),
(19, 'Nintendo GameCube'),
(20, 'WiiU'),
(21, 'Sega Genesis'),
(22, 'Sega Dreamcast'),
(23, 'PSVita'),
(24, 'Sega Saturn'),
(25, 'Sega CD'),
(26, 'Sega 32X'),
(27, 'NeoGeo'),
(28, 'Turbografix-16'),
(29, '3DO'),
(30, 'Game Gear'),
(31, 'Nintendo Switch'),
(32, 'PS5'),
(33, 'Xbox Series X'),
(34, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `esrb_descriptions_esr`
--

CREATE TABLE `esrb_descriptions_esr` (
  `id` int(11) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `esrb_descriptions_esr`
--

INSERT INTO `esrb_descriptions_esr` (`id`, `description`) VALUES
(1, 'Alcohol Reference'),
(2, 'Blood'),
(3, 'Comic Mischief'),
(4, 'Drug Reference'),
(5, 'Gambling Themes'),
(6, 'Language'),
(7, 'Mature Humor'),
(8, 'Partial Nudity'),
(9, 'Sexual Content'),
(10, 'Sexual Violence'),
(11, 'Strong Language'),
(12, 'Strong Sexual Content'),
(13, 'Tobacco Reference'),
(14, 'Use of Drugs'),
(15, 'Violence'),
(16, 'Animated Blood'),
(17, 'Blood and Gore'),
(18, 'Crude Humor'),
(19, 'Fantasy Violence'),
(20, 'Intense Violence'),
(21, 'Lyrics'),
(22, 'Nudity'),
(23, 'Real Gambling'),
(24, 'Sexual Themes'),
(25, 'Simulated Gambling'),
(26, 'Strong Lyrics'),
(27, 'Suggestive Themes'),
(28, 'Use of Alcohol'),
(29, 'Use of Tobacco'),
(30, 'Violent References');

-- --------------------------------------------------------

--
-- Table structure for table `esrb_ratings_age`
--

CREATE TABLE `esrb_ratings_age` (
  `id` int(11) NOT NULL,
  `esrb_rating_age` varchar(255) NOT NULL,
  `min_age` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `esrb_ratings_age`
--

INSERT INTO `esrb_ratings_age` (`id`, `esrb_rating_age`, `min_age`) VALUES
(1, 'EVERYONE', 6),
(2, 'EVERYONE 10+', 10),
(3, 'TEEN', 13),
(4, 'MATURE', 17),
(5, 'ADULTS ONLY 18+', 18),
(6, 'RATING PENDING', NULL),
(7, 'RATING PENDING LIKELY 17+', 17),
(8, 'NO ESRB RATING', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `games_gme`
--

CREATE TABLE `games_gme` (
  `id` int(11) NOT NULL,
  `name_gme` varchar(255) NOT NULL,
  `id_age_gme` int(11) DEFAULT NULL,
  `id_gnr_gme` int(11) DEFAULT NULL,
  `id_cmppub_gme` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `games_gme`
--

INSERT INTO `games_gme` (`id`, `name_gme`, `id_age_gme`, `id_gnr_gme`, `id_cmppub_gme`) VALUES
(1, 'Super Mario Bros.', 1, 5, 369),
(2, 'Sonic The Hedgehog', 1, 5, 452),
(3, 'The Legend of Zelda', 1, 2, 369),
(4, 'Super Mario Bros Deluxe', 1, 5, 369);

-- --------------------------------------------------------

--
-- Table structure for table `genres_gnr`
--

CREATE TABLE `genres_gnr` (
  `id` int(11) NOT NULL,
  `genre_gnr` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `genres_gnr`
--

INSERT INTO `genres_gnr` (`id`, `genre_gnr`) VALUES
(1, 'Action'),
(2, 'Adventure'),
(3, 'Fighting'),
(4, 'Misc'),
(5, 'Platform'),
(6, 'Puzzle'),
(7, 'Racing'),
(8, 'Role-Playing'),
(9, 'Shooter'),
(10, 'Simulation'),
(11, 'Sports'),
(12, 'Strategy');

-- --------------------------------------------------------

--
-- Table structure for table `inventory_inv`
--

CREATE TABLE `inventory_inv` (
  `id` int(11) NOT NULL,
  `id_gme_inv` int(11) DEFAULT NULL,
  `id_con_inv` int(11) DEFAULT NULL,
  `condition_inv` enum('Like New','Great','Good','Acceptable','Poor') NOT NULL,
  `id_usr_inv` int(11) DEFAULT NULL,
  `id_usrdonator_inv` int(11) DEFAULT NULL,
  `available_inv` tinyint(1) NOT NULL,
  `available_after_inv` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `inventory_inv`
--

INSERT INTO `inventory_inv` (`id`, `id_gme_inv`, `id_con_inv`, `condition_inv`, `id_usr_inv`, `id_usrdonator_inv`, `available_inv`, `available_after_inv`) VALUES
(1, 1, 2, 'Good', NULL, 1, 1, '2023-04-30'),
(2, 2, 21, 'Like New', 1, 1, 0, '2022-02-12'),
(3, 3, 2, 'Great', NULL, 1, 1, '2022-02-12'),
(4, 2, 34, 'Like New', 4, 5, 0, '2023-03-14'),
(6, 4, 3, 'Great', NULL, 1, 1, '2023-03-25');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens_prt`
--

CREATE TABLE `password_reset_tokens_prt` (
  `id_usr_prt` int(11) NOT NULL,
  `hashed_token_prt` varchar(255) NOT NULL,
  `expiration_prt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `states_sta`
--

CREATE TABLE `states_sta` (
  `id` int(11) NOT NULL,
  `state_name_sta` varchar(32) DEFAULT NULL,
  `state_abbr_sta` char(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `states_sta`
--

INSERT INTO `states_sta` (`id`, `state_name_sta`, `state_abbr_sta`) VALUES
(1, 'Alabama', 'AL'),
(2, 'Alaska', 'AK'),
(3, 'Arizona', 'AZ'),
(4, 'Arkansas', 'AR'),
(5, 'California', 'CA'),
(6, 'Colorado', 'CO'),
(7, 'Connecticut', 'CT'),
(8, 'Delaware', 'DE'),
(9, 'District of Columbia', 'DC'),
(10, 'Florida', 'FL'),
(11, 'Georgia', 'GA'),
(12, 'Hawaii', 'HI'),
(13, 'Idaho', 'ID'),
(14, 'Illinois', 'IL'),
(15, 'Indiana', 'IN'),
(16, 'Iowa', 'IA'),
(17, 'Kansas', 'KS'),
(18, 'Kentucky', 'KY'),
(19, 'Louisiana', 'LA'),
(20, 'Maine', 'ME'),
(21, 'Maryland', 'MD'),
(22, 'Massachusetts', 'MA'),
(23, 'Michigan', 'MI'),
(24, 'Minnesota', 'MN'),
(25, 'Mississippi', 'MS'),
(26, 'Missouri', 'MO'),
(27, 'Montana', 'MT'),
(28, 'Nebraska', 'NE'),
(29, 'Nevada', 'NV'),
(30, 'New Hampshire', 'NH'),
(31, 'New Jersey', 'NJ'),
(32, 'New Mexico', 'NM'),
(33, 'New York', 'NY'),
(34, 'North Carolina', 'NC'),
(35, 'North Dakota', 'ND'),
(36, 'Ohio', 'OH'),
(37, 'Oklahoma', 'OK'),
(38, 'Oregon', 'OR'),
(39, 'Pennsylvania', 'PA'),
(40, 'Rhode Island', 'RI'),
(41, 'South Carolina', 'SC'),
(42, 'South Dakota', 'SD'),
(43, 'Tennessee', 'TN'),
(44, 'Texas', 'TX'),
(45, 'Utah', 'UT'),
(46, 'Vermont', 'VT'),
(47, 'Virginia', 'VA'),
(48, 'Washington', 'WA'),
(49, 'West Virginia', 'WV'),
(50, 'Wisconsin', 'WI'),
(51, 'Wyoming', 'WY');

-- --------------------------------------------------------

--
-- Table structure for table `users_usr`
--

CREATE TABLE `users_usr` (
  `id` int(11) NOT NULL,
  `fname_usr` varchar(255) NOT NULL,
  `lname_usr` varchar(255) NOT NULL,
  `username_usr` varchar(255) NOT NULL,
  `email_usr` varchar(255) NOT NULL,
  `hashed_password_usr` varchar(255) NOT NULL,
  `street_address_usr` varchar(255) NOT NULL,
  `city_usr` varchar(255) NOT NULL,
  `zip_usr` varchar(255) NOT NULL,
  `id_sta_usr` int(11) NOT NULL,
  `user_level_usr` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users_usr`
--

INSERT INTO `users_usr` (`id`, `fname_usr`, `lname_usr`, `username_usr`, `email_usr`, `hashed_password_usr`, `street_address_usr`, `city_usr`, `zip_usr`, `id_sta_usr`, `user_level_usr`) VALUES
(1, 'Sean', 'Mackey', 'seanpmackey', 'seanpmackey@students.abtech.edu', '$2y$10$R0HFL5SDu7iwCkR0B5kiROP9PMhV3TxGyV7ba6.eLk3pueBpfCAtS', '17 Mulberry Ct.', 'Arden', '28704', 34, 'admin'),
(4, 'Samples', 'Users', 'sampleuser1', 'sampleuser@example.com', '$2y$10$RWIONjgPpdP/zqU.w6vYCei/KbRsE9naAMNnqw9UqAlyFn5MbYGMC', 'Somewhere', 'Arden', '28704', 34, 'user'),
(5, 'Sample', 'Admin', 'SampleAdmin1', 's.mackey129@gmail.com', '$2y$10$CmTUgOl8j.xZ0vb8Usf5HORnUEfBSRwQwmBel/Yke5Er.Kr01zFdG', 'Somewhere', 'Asheville', '28803', 34, 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `wish_list_wsh`
--

CREATE TABLE `wish_list_wsh` (
  `id` int(11) NOT NULL,
  `id_usr_wsh` int(11) NOT NULL,
  `id_inv_wsh` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `companies_cmp`
--
ALTER TABLE `companies_cmp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `consoles_con`
--
ALTER TABLE `consoles_con`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `esrb_descriptions_esr`
--
ALTER TABLE `esrb_descriptions_esr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `esrb_ratings_age`
--
ALTER TABLE `esrb_ratings_age`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `games_gme`
--
ALTER TABLE `games_gme`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cmppub_gme` (`id_cmppub_gme`),
  ADD KEY `id_age_gme` (`id_age_gme`),
  ADD KEY `id_gnr_gme` (`id_gnr_gme`);

--
-- Indexes for table `genres_gnr`
--
ALTER TABLE `genres_gnr`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inventory_inv`
--
ALTER TABLE `inventory_inv`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_con_inv` (`id_con_inv`),
  ADD KEY `id_usr_inv` (`id_usr_inv`),
  ADD KEY `id_usrdonator_inv` (`id_usrdonator_inv`),
  ADD KEY `id_gme_inv` (`id_gme_inv`);

--
-- Indexes for table `password_reset_tokens_prt`
--
ALTER TABLE `password_reset_tokens_prt`
  ADD PRIMARY KEY (`id_usr_prt`);

--
-- Indexes for table `states_sta`
--
ALTER TABLE `states_sta`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_usr`
--
ALTER TABLE `users_usr`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_sta_usr` (`id_sta_usr`);

--
-- Indexes for table `wish_list_wsh`
--
ALTER TABLE `wish_list_wsh`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_gme_wsh` (`id_inv_wsh`),
  ADD KEY `id_usr_wsh` (`id_usr_wsh`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `companies_cmp`
--
ALTER TABLE `companies_cmp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=579;

--
-- AUTO_INCREMENT for table `consoles_con`
--
ALTER TABLE `consoles_con`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `esrb_descriptions_esr`
--
ALTER TABLE `esrb_descriptions_esr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `esrb_ratings_age`
--
ALTER TABLE `esrb_ratings_age`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `games_gme`
--
ALTER TABLE `games_gme`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `genres_gnr`
--
ALTER TABLE `genres_gnr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `inventory_inv`
--
ALTER TABLE `inventory_inv`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `states_sta`
--
ALTER TABLE `states_sta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `users_usr`
--
ALTER TABLE `users_usr`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `wish_list_wsh`
--
ALTER TABLE `wish_list_wsh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `games_gme`
--
ALTER TABLE `games_gme`
  ADD CONSTRAINT `games_gme_ibfk_1` FOREIGN KEY (`id_cmppub_gme`) REFERENCES `companies_cmp` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `games_gme_ibfk_2` FOREIGN KEY (`id_age_gme`) REFERENCES `esrb_ratings_age` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `games_gme_ibfk_3` FOREIGN KEY (`id_gnr_gme`) REFERENCES `genres_gnr` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Constraints for table `inventory_inv`
--
ALTER TABLE `inventory_inv`
  ADD CONSTRAINT `inventory_inv_ibfk_1` FOREIGN KEY (`id_con_inv`) REFERENCES `consoles_con` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `inventory_inv_ibfk_2` FOREIGN KEY (`id_usr_inv`) REFERENCES `users_usr` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `inventory_inv_ibfk_3` FOREIGN KEY (`id_usrdonator_inv`) REFERENCES `users_usr` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `inventory_inv_ibfk_4` FOREIGN KEY (`id_gme_inv`) REFERENCES `games_gme` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `password_reset_tokens_prt`
--
ALTER TABLE `password_reset_tokens_prt`
  ADD CONSTRAINT `password_reset_tokens_prt_ibfk_1` FOREIGN KEY (`id_usr_prt`) REFERENCES `users_usr` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users_usr`
--
ALTER TABLE `users_usr`
  ADD CONSTRAINT `users_usr_ibfk_1` FOREIGN KEY (`id_sta_usr`) REFERENCES `states_sta` (`id`);

--
-- Constraints for table `wish_list_wsh`
--
ALTER TABLE `wish_list_wsh`
  ADD CONSTRAINT `wish_list_wsh_ibfk_1` FOREIGN KEY (`id_inv_wsh`) REFERENCES `inventory_inv` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wish_list_wsh_ibfk_2` FOREIGN KEY (`id_usr_wsh`) REFERENCES `users_usr` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
