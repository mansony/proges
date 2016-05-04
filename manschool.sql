-- phpMyAdmin SQL Dump
-- version 3.2.4
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Ven 11 Mars 2016 à 08:24
-- Version du serveur: 5.1.44
-- Version de PHP: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `geschool`
--

-- --------------------------------------------------------

--
-- Structure de la table `bilan`
--

CREATE TABLE IF NOT EXISTS `bilan` (
  `id_dep_total` int(11) NOT NULL AUTO_INCREMENT,
  `montant_dep_total` int(11) NOT NULL,
  `montant_rec_total` int(11) NOT NULL,
  `solde` int(11) NOT NULL,
  PRIMARY KEY (`id_dep_total`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `bilan`
--


-- --------------------------------------------------------

--
-- Structure de la table `cantine`
--

CREATE TABLE IF NOT EXISTS `cantine` (
  `id_c` int(11) NOT NULL AUTO_INCREMENT,
  `id_c_e` int(11) NOT NULL,
  `mois_c` int(11) NOT NULL,
  PRIMARY KEY (`id_c`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `cantine`
--


-- --------------------------------------------------------

--
-- Structure de la table `classe`
--

CREATE TABLE IF NOT EXISTS `classe` (
  `id_classe` int(11) NOT NULL AUTO_INCREMENT,
  `nom_classe` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `frais` int(11) NOT NULL,
  `insc` int(11) NOT NULL,
  PRIMARY KEY (`id_classe`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=12 ;

--
-- Contenu de la table `classe`
--

INSERT INTO `classe` (`id_classe`, `nom_classe`, `frais`, `insc`) VALUES
(1, '2 ans', 0, 10000),
(2, '3 ans', 0, 10000),
(3, '4 ans', 0, 10000),
(4, '5 ans', 0, 10000),
(5, '1e annee', 0, 10000),
(6, '2e annee', 0, 10000),
(7, '3e annee', 0, 10000),
(8, '4e annee', 0, 10000),
(9, 'creche', 0, 10000),
(10, '5e annee', 0, 10000);

-- --------------------------------------------------------

--
-- Structure de la table `config`
--

CREATE TABLE IF NOT EXISTS `config` (
  `nom_ecole` text COLLATE utf8_unicode_ci NOT NULL,
  `nom_fondateur_ecole` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nom_directeur_ecole` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_1_ecole` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `contact_2_ecole` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `localisation_ecole` text COLLATE utf8_unicode_ci NOT NULL,
  `mdp_fondateur_ecole` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `mdp_adjoint_ecole` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `devise_ecole` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `logo_ecole` varchar(155) COLLATE utf8_unicode_ci NOT NULL,
  `id_ecole` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_ecole`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Contenu de la table `config`
--

INSERT INTO `config` (`nom_ecole`, `nom_fondateur_ecole`, `nom_directeur_ecole`, `contact_1_ecole`, `contact_2_ecole`, `localisation_ecole`, `mdp_fondateur_ecole`, `mdp_adjoint_ecole`, `devise_ecole`, `logo_ecole`, `id_ecole`) VALUES
('Terre Promise', 'Belongo Pierre', 'Michel', '07 00 11 22', '06 00 11 22', 'libreville', 'admin', 'user', 'Excellence-Discipline-Rigueur', 'logo.png', 2);

-- --------------------------------------------------------

--
-- Structure de la table `depense`
--

CREATE TABLE IF NOT EXISTS `depense` (
  `id_dep` int(11) NOT NULL AUTO_INCREMENT,
  `date_dep` date NOT NULL,
  `montant_dep` int(11) NOT NULL,
  `intituler_dep` text NOT NULL,
  PRIMARY KEY (`id_dep`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `depense`
--


-- --------------------------------------------------------

--
-- Structure de la table `eleve`
--

CREATE TABLE IF NOT EXISTS `eleve` (
  `id_e` int(11) NOT NULL AUTO_INCREMENT,
  `nom_e` varchar(225) NOT NULL,
  `prenom_e` varchar(225) NOT NULL,
  `sexe_e` varchar(10) NOT NULL,
  `matricule_e` int(11) NOT NULL,
  `classe_e` varchar(25) NOT NULL,
  `salle_e` varchar(100) NOT NULL DEFAULT 'A',
  `dnaiss_e` date NOT NULL,
  `lnaiss_e` varchar(200) NOT NULL,
  `nation_e` varchar(200) NOT NULL,
  `residence_e` varchar(225) NOT NULL,
  `tuteure_e` varchar(225) NOT NULL,
  `numero_e` varchar(30) NOT NULL,
  `statut_e` varchar(25) NOT NULL DEFAULT 'ancien',
  `photo_e` varchar(255) NOT NULL,
  PRIMARY KEY (`id_e`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `eleve`
--


-- --------------------------------------------------------

--
-- Structure de la table `mensualite`
--

CREATE TABLE IF NOT EXISTS `mensualite` (
  `id_m` int(11) NOT NULL AUTO_INCREMENT,
  `id_m_e` int(11) NOT NULL,
  `mois` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_m`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `mensualite`
--


-- --------------------------------------------------------

--
-- Structure de la table `pays`
--

CREATE TABLE IF NOT EXISTS `pays` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `alpha2` varchar(2) NOT NULL,
  `nom_pays` varchar(45) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `alpha2` (`alpha2`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=242 ;

--
-- Contenu de la table `pays`
--

INSERT INTO `pays` (`id`, `alpha2`, `nom_pays`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', ' Albanie'),
(3, 'AQ', 'Antarctique'),
(4, 'DZ', 'Algerie'),
(5, 'AS', 'Samoa Americaines'),
(6, 'AD', 'Andorre'),
(7, 'AO', 'Angola'),
(8, 'AG', 'Antigua-et-Barbuda'),
(9, 'AZ', 'Azerbaidjan'),
(10, 'AR', 'Argentine'),
(11, 'AU', 'Australie'),
(12, 'AT', 'Autriche'),
(13, 'BS', 'Bahamas'),
(14, 'BH', 'Bahrein'),
(15, 'BD', 'Bangladesh'),
(16, 'AM', 'Armenie'),
(17, 'BB', 'Barbade'),
(18, 'BE', 'Belgique'),
(19, 'BM', 'Bermudes'),
(20, 'BT', 'Bhoutan'),
(21, 'BO', 'Bolivie'),
(22, 'BA', 'Bosnie-Herzegovine'),
(23, 'BW', 'Botswana'),
(24, 'BV', 'ile Bouvet'),
(25, 'BR', 'Bresil'),
(26, 'BZ', 'Belize'),
(27, 'IO', 'Territoire Britannique de l''Ocean Indien'),
(28, 'SB', 'iles Salomon'),
(29, 'VG', 'iles Vierges Britanniques'),
(30, 'BN', 'Brunei Darussalam'),
(31, 'BG', 'Bulgarie'),
(32, 'MM', 'Myanmar'),
(33, 'BI', 'Burundi'),
(34, 'BY', 'Belarus'),
(35, 'KH', 'Cambodge'),
(36, 'CM', 'Cameroun'),
(37, 'CA', 'Canada'),
(38, 'CV', 'Cap-vert'),
(39, 'KY', 'iles Caimanes'),
(40, 'CF', 'Republique Centrafricaine'),
(41, 'LK', 'Sri Lanka'),
(42, 'TD', 'Tchad'),
(43, 'CL', 'Chili'),
(44, 'CN', 'Chine'),
(45, 'TW', 'Taiwan'),
(46, 'CX', 'ile Christmas'),
(47, 'CC', 'iles Cocos (Keeling)'),
(48, 'CO', 'Colombie'),
(49, 'KM', 'Comores'),
(50, 'YT', 'Mayotte'),
(51, 'CG', 'Republique du Congo'),
(52, 'CD', 'Republique Democratique du Congo'),
(53, 'CK', 'iles Cook'),
(54, 'CR', 'Costa Rica'),
(55, 'HR', 'Croatie'),
(56, 'CU', 'Cuba'),
(57, 'CY', 'Chypre'),
(58, 'CZ', 'Republique Tcheque'),
(59, 'BJ', 'Benin'),
(60, 'DK', 'Danemark'),
(61, 'DM', 'Dominique'),
(62, 'DO', 'Republique Dominicaine'),
(63, 'EC', 'equateur'),
(64, 'SV', 'El Salvador'),
(65, 'GQ', 'Guinee equatoriale'),
(66, 'ET', 'ethiopie'),
(67, 'ER', 'erythree'),
(68, 'EE', 'Estonie'),
(69, 'FO', 'iles Feroe'),
(70, 'FK', 'iles (malvinas) Falkland'),
(71, 'GS', 'Georgie du Sud et les iles Sandwich du Sud'),
(72, 'FJ', 'Fidji'),
(73, 'FI', 'Finlande'),
(74, 'AX', 'iles aland'),
(75, 'FR', 'France'),
(76, 'GF', 'Guyane Francaise'),
(77, 'PF', 'Polynesie Francaise'),
(78, 'TF', 'Terres Australes Francaises'),
(79, 'DJ', 'Djibouti'),
(80, 'GA', 'Gabon'),
(81, 'GE', 'Georgie'),
(82, 'GM', 'Gambie'),
(83, 'PS', 'Territoire Palestinien Occupe'),
(84, 'DE', 'Allemagne'),
(85, 'GH', 'Ghana'),
(86, 'GI', 'Gibraltar'),
(87, 'KI', 'Kiribati'),
(88, 'GR', 'Grece'),
(89, 'GL', 'Groenland'),
(90, 'GD', 'Grenade'),
(91, 'GP', 'Guadeloupe'),
(92, 'GU', 'Guam'),
(93, 'GT', 'Guatemala'),
(94, 'GN', 'Guinee'),
(95, 'GY', 'Guyana'),
(96, 'HT', 'Haiti'),
(97, 'HM', 'iles Heard et Mcdonald'),
(98, 'VA', 'Saint-Siege (etat de la Cite du Vatican)'),
(99, 'HN', 'Honduras'),
(100, 'HK', 'Hong-Kong'),
(101, 'HU', 'Hongrie'),
(102, 'IS', 'Islande'),
(103, 'IN', 'Inde'),
(104, 'ID', 'Indonesie'),
(105, 'IR', 'Republique Islamique d''Iran'),
(106, 'IQ', 'Iraq'),
(107, 'IE', 'Irlande'),
(108, 'IL', 'Israel'),
(109, 'IT', 'Italie'),
(110, 'CI', 'Cote d''Ivoire'),
(111, 'JM', 'Jamaique'),
(112, 'JP', 'Japon'),
(113, 'KZ', 'Kazakhstan'),
(114, 'JO', 'Jordanie'),
(115, 'KE', 'Kenya'),
(116, 'KP', 'Republique Populaire Democratique de Coree'),
(117, 'KR', 'Republique de Coree'),
(118, 'KW', 'Koweit'),
(119, 'KG', 'Kirghizistan'),
(120, 'LA', 'Republique Democratique Populaire Lao'),
(121, 'LB', 'Liban'),
(122, 'LS', 'Lesotho'),
(123, 'LV', 'Lettonie'),
(124, 'LR', 'Liberia'),
(125, 'LY', 'Jamahiriya Arabe Libyenne'),
(126, 'LI', 'Liechtenstein'),
(127, 'LT', 'Lituanie'),
(128, 'LU', 'Luxembourg'),
(129, 'MO', 'Macao'),
(130, 'MG', 'Madagascar'),
(131, 'MW', 'Malawi'),
(132, 'MY', 'Malaisie'),
(133, 'MV', 'Maldives'),
(134, 'ML', 'Mali'),
(135, 'MT', 'Malte'),
(136, 'MQ', 'Martinique'),
(137, 'MR', 'Mauritanie'),
(138, 'MU', 'Maurice'),
(139, 'MX', 'Mexique'),
(140, 'MC', 'Monaco'),
(141, 'MN', 'Mongolie'),
(142, 'MD', 'Republique de Moldova'),
(143, 'MS', 'Montserrat'),
(144, 'MA', 'Maroc'),
(145, 'MZ', 'Mozambique'),
(146, 'OM', 'Oman'),
(147, 'NA', 'Namibie'),
(148, 'NR', 'Nauru'),
(149, 'NP', 'Nepal'),
(150, 'NL', 'Pays-Bas'),
(151, 'AN', 'Antilles Neerlandaises'),
(152, 'AW', 'Aruba'),
(153, 'NC', 'Nouvelle-Caledonie'),
(154, 'VU', 'Vanuatu'),
(155, 'NZ', 'Nouvelle-Zelande'),
(156, 'NI', 'Nicaragua'),
(157, 'NE', 'Niger'),
(158, 'NG', 'Nigeria'),
(159, 'NU', 'Niue'),
(160, 'NF', 'ile Norfolk'),
(161, 'NO', 'Norvege'),
(162, 'MP', 'iles Mariannes du Nord'),
(163, 'UM', 'iles Mineures eloignees des etats-Unis'),
(164, 'FM', 'etats Federes de Micronesie'),
(165, 'MH', 'iles Marshall'),
(166, 'PW', 'Palaos'),
(167, 'PK', 'Pakistan'),
(168, 'PA', 'Panama'),
(169, 'PG', 'Papouasie-Nouvelle-Guinee'),
(170, 'PY', 'Paraguay'),
(171, 'PE', 'Perou'),
(172, 'PH', 'Philippines'),
(173, 'PN', 'Pitcairn'),
(174, 'PL', 'Pologne'),
(175, 'PT', 'Portugal'),
(176, 'GW', 'Guinee-Bissau'),
(177, 'TL', 'Timor-Leste'),
(178, 'PR', 'Porto Rico'),
(179, 'QA', 'Qatar'),
(180, 'RE', 'Reunion'),
(181, 'RO', 'Roumanie'),
(182, 'RU', 'Federation de Russie'),
(183, 'RW', 'Rwanda'),
(184, 'SH', 'Sainte-Helene'),
(185, 'KN', 'Saint-Kitts-et-Nevis'),
(186, 'AI', 'Anguilla'),
(187, 'LC', 'Sainte-Lucie'),
(188, 'PM', 'Saint-Pierre-et-Miquelon'),
(189, 'VC', 'Saint-Vincent-et-les Grenadines'),
(190, 'SM', 'Saint-Marin'),
(191, 'ST', 'Sao Tome-et-Principe'),
(192, 'SA', 'Arabie Saoudite'),
(193, 'SN', 'Senegal'),
(194, 'SC', 'Seychelles'),
(195, 'SL', 'Sierra Leone'),
(196, 'SG', 'Singapour'),
(197, 'SK', 'Slovaquie'),
(198, 'VN', 'Viet Nam'),
(199, 'SI', 'Slovenie'),
(200, 'SO', 'Somalie'),
(201, 'ZA', 'Afrique du Sud'),
(202, 'ZW', 'Zimbabwe'),
(203, 'ES', 'Espagne'),
(204, 'EH', 'Sahara Occidental'),
(205, 'SD', 'Soudan'),
(206, 'SR', 'Suriname'),
(207, 'SJ', 'Svalbard et ile Jan Mayen'),
(208, 'SZ', 'Swaziland'),
(209, 'SE', 'Suede'),
(210, 'CH', 'Suisse'),
(211, 'SY', 'Republique Arabe Syrienne'),
(212, 'TJ', 'Tadjikistan'),
(213, 'TH', 'Thailande'),
(214, 'TG', 'Togo'),
(215, 'TK', 'Tokelau'),
(216, 'TO', 'Tonga'),
(217, 'TT', 'Trinite-et-Tobago'),
(218, 'AE', 'emirats Arabes Unis'),
(219, 'TN', 'Tunisie'),
(220, 'TR', 'Turquie'),
(221, 'TM', 'Turkmenistan'),
(222, 'TC', 'iles Turks et Caiques'),
(223, 'TV', 'Tuvalu'),
(224, 'UG', 'Ouganda'),
(225, 'UA', 'Ukraine'),
(226, 'MK', 'L''ex-Republique Yougoslave de Macedoine'),
(227, 'EG', 'egypte'),
(228, 'GB', 'Royaume-Uni'),
(229, 'IM', 'ile de Man'),
(230, 'TZ', 'Republique-Unie de Tanzanie'),
(231, 'US', 'etats-Unis'),
(232, 'VI', 'iles Vierges des etats-Unis'),
(233, 'BF', 'Burkina Faso'),
(234, 'UY', 'Uruguay'),
(235, 'UZ', 'Ouzbekistan'),
(236, 'VE', 'Venezuela'),
(237, 'WF', 'Wallis et Futuna'),
(238, 'WS', 'Samoa'),
(239, 'YE', 'Yemen'),
(240, 'CS', 'Serbie-et-Montenegro'),
(241, 'ZM', 'Zambie');

-- --------------------------------------------------------

--
-- Structure de la table `personnel`
--

CREATE TABLE IF NOT EXISTS `personnel` (
  `id_p` int(11) NOT NULL AUTO_INCREMENT,
  `nom_p` varchar(225) NOT NULL,
  `prenom_p` varchar(225) NOT NULL,
  `sexe_p` varchar(10) NOT NULL,
  `matricule_p` int(11) NOT NULL,
  `poste_p` varchar(25) NOT NULL,
  `dnaiss_p` date NOT NULL,
  `lnaiss_p` varchar(200) NOT NULL,
  `nation_p` varchar(200) NOT NULL,
  `residence_p` varchar(225) NOT NULL,
  `numero_p` varchar(30) NOT NULL,
  `photo_p` varchar(255) NOT NULL,
  PRIMARY KEY (`id_p`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `personnel`
--


-- --------------------------------------------------------

--
-- Structure de la table `recette`
--

CREATE TABLE IF NOT EXISTS `recette` (
  `id_rec` int(11) NOT NULL AUTO_INCREMENT,
  `montant_rec` int(11) NOT NULL,
  `intituler_rec` text NOT NULL,
  `date_rec` date NOT NULL,
  `type` varchar(255) NOT NULL,
  PRIMARY KEY (`id_rec`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Contenu de la table `recette`
--

