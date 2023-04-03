-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 03 avr. 2023 à 12:31
-- Version du serveur : 10.4.27-MariaDB
-- Version de PHP : 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `motorisation`
--

-- --------------------------------------------------------

--
-- Structure de la table `catégorie`
--

CREATE TABLE `catégorie` (
  `IdCt` int(11) NOT NULL,
  `NomCt` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `catégorie`
--

INSERT INTO `catégorie` (`IdCt`, `NomCt`) VALUES
(1, 'Motorisation porte de garage'),
(2, 'Motorisation de volet roulant'),
(3, 'Télécommandes'),
(4, 'Interphone & Visiophone'),
(6, 'Alarmes');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `IdCmd` int(11) NOT NULL,
  `DateCmd` date NOT NULL,
  `IdMb` int(11) NOT NULL,
  `StatutCmd` text NOT NULL,
  `prixTT` double NOT NULL,
  `modePaiement` varchar(250) NOT NULL,
  `NoteCmd` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`IdCmd`, `DateCmd`, `IdMb`, `StatutCmd`, `prixTT`, `modePaiement`, `NoteCmd`) VALUES
(2, '2023-03-01', 2, 'Annulée', 1500, 'Espèces ', ''),
(5, '2023-03-01', 1, 'En cours', 23899, 'Paypal', ''),
(6, '2023-03-02', 2, 'Livrée', 100000, 'Espèces', ''),
(12, '0000-00-00', 4, 'En cours', 0, 'Paypal', 'Expédiée le 11/03/2023');

-- --------------------------------------------------------

--
-- Structure de la table `détails_commande`
--

CREATE TABLE `détails_commande` (
  `IdDétailsCmd` int(11) NOT NULL,
  `IdPr` int(11) NOT NULL,
  `IdCmd` int(11) NOT NULL,
  `qt` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `détails_commande`
--

INSERT INTO `détails_commande` (`IdDétailsCmd`, `IdPr`, `IdCmd`, `qt`) VALUES
(5, 26, 2, 2),
(6, 23, 2, 5),
(7, 19, 2, 3),
(10, 21, 5, 1),
(11, 16, 12, 6),
(12, 24, 6, 5),
(15, 31, 12, 4),
(16, 25, 12, 6),
(17, 8, 12, 1),
(18, 10, 12, 1),
(19, 31, 12, 4),
(20, 25, 12, 6),
(21, 8, 12, 1),
(22, 10, 12, 1);

-- --------------------------------------------------------

--
-- Structure de la table `membre`
--

CREATE TABLE `membre` (
  `IdMb` int(11) NOT NULL,
  `NomMb` text NOT NULL,
  `PrénomMb` text NOT NULL,
  `DateNc` date NOT NULL,
  `Ville` text NOT NULL,
  `CP` int(5) NOT NULL,
  `NumTélé` varchar(10) NOT NULL,
  `AdresseMb` varchar(250) NOT NULL,
  `EmailMb` varchar(250) NOT NULL,
  `MDPS` varchar(250) NOT NULL,
  `Statut` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `membre`
--

INSERT INTO `membre` (`IdMb`, `NomMb`, `PrénomMb`, `DateNc`, `Ville`, `CP`, `NumTélé`, `AdresseMb`, `EmailMb`, `MDPS`, `Statut`) VALUES
(1, 'KHALID', 'Loubna', '2004-03-26', 'Oujda', 60000, '0667711925', 'Rue Mohamed Abdou, Oujda', 'loubnakhalid09@gmail.com', '', 0),
(2, 'BOUFELJAT', 'Safae', '2004-01-17', 'Oujda', 60000, '0667711925', 'Rue jerrada, Oujda', 'boufeljatsafae01@gmail.com', '', 0),
(3, 'JAKHROUTI', 'Imad', '2002-09-13', 'Oujda', 60000, '0667711925', 'Alandalous, Oujda', 'jakhroutiImad01@gmail.com', '', 0),
(4, 'Admin', 'Admin', '0000-00-00', '', 0, '', '', 'motorify23@gmail.com', '$2y$14$WYtnlDRhJrFNfg.FpAz91udJiZbgOsj.0RRscOdiSUtxYE2Uf/Cc2', 1);

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `IdPr` int(11) NOT NULL,
  `NomPr` varchar(100) NOT NULL,
  `DescriptionPr` varchar(1000) NOT NULL,
  `PrixPr` double NOT NULL,
  `StatutPr` tinyint(1) NOT NULL,
  `StockPr` int(11) NOT NULL,
  `IdCt` int(11) NOT NULL,
  `ImagePr` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `produit`
--

INSERT INTO `produit` (`IdPr`, `NomPr`, `DescriptionPr`, `PrixPr`, `StatutPr`, `StockPr`, `IdCt`, `ImagePr`) VALUES
(2, 'Kit  FAAC Dolphin D1000 ', 'Alimentation primaire (V) : 230\r\nComposition : Kit\r\nHauteur porte de garage : Inférieure à 2.30 m\r\nAlimentation secondaire (V) : 24\r\nType de porte de garage : Sectionnelle/Basculante\r\nUsage : Résidentiel\r\nSous Titre : Puissance 350 Walim 230 V - 1télécommande\r\nHors gabarit : Non\r\nNotice Constructeur : file_106_41.pdf\r\nFiche produit : file_101_4_1.pdf\r\nEAN : 3663432018325\r\nLargeur de baie maximum (cm) : 500\r\nHauteur sous linteau maximum : 240\r\nLargeur de baie minimum (cm) : 301\r\nShipping Type : Encombrant', 4500, 1, 9, 1, '2.jpg'),
(3, 'SOMMER duo vision 500', 'Marque : SOMMER\r\nLargeur maximum de la porte sectionnelle : 3500\r\nFréquence nominale : 50 / 60 Hz\r\nTension nominale : 230 V/AC\r\nHauteur maximum de la porte sectionnelle : 2350\r\nÉclairage : max. 32 V\r\n', 4600, 0, 0, 1, '4.jpg'),
(5, 'NICE spin-23KCE', 'Marque : NICE\r\nIntensité (A) : 0,8\r\nVitesse (m/s) : 0,20\r\nCycle de travail (cycles/jour) : 50\r\nTemp. fonctionnement (°C) : -20 ÷ +50\r\nPoids moteur (kg) : 3,6\r\nAlimentation (Vca 50 Hz) : 230\r\nPuissance (W) : 250\r\nForce (N) : 650\r\nIndice de protection (IP) : 40\r\nDimensions (mm) : 311x327x105 h', 3000, 1, 17, 1, '6.jpg'),
(6, 'Kit BFT pro botticelli smart ', 'Centrale de commande : VENERE BT A DIS\r\nTension nominale : 24 V\r\nPuissance absorbée : 200 W\r\nForce de traction et de poussée : 850 N\r\nNombre de manoeuvres quotidiennes à 60° : 50\r\nSurface de la porte : 13 m²\r\nVitesse d\'ouverture max (rail à chaine) : 210 mm/sec\r\nVitesse d\'ouverture max (rail à courroie) : 240 mm/sec\r\nType de fin de course : Codeur + butée mécanique en ouverture\r\nRalentissement : Oui\r\nBlocage : Mécanique\r\nDéblocage : Corde ou câble en acier\r\nRéaction au choc : D-Track\r\nDegré de protection : IP20\r\nConditions environnementales : -20° à +60°C\r\nInterconnectivité : Non', 6700, 1, 3, 1, '7.jpg'),
(7, 'CAME ver10 U4494', 'Superficie max. de la porte (m²) : 18\r\nForce de traction max. (N) : 1000\r\nDegré de protection (IP) : 30\r\nAlimentation (V - 50/60 Hz) : 230 AC \r\nAlimentation moteur (V) : 24 DC \r\nPuissance (W) : 130\r\nVitesse de manoeuvre (m/min) : 6 \r\nIntermittence/Fonctionnement (%) : 50\r\nTempérature de fonctionnement (°C) : -20 ÷ +55\r\nConsommation en mode veille (W) : 5', 4000, 1, 9, 1, '9.jpg'),
(8, 'SOMMER sprint evolution et Duo', 'Marque : SOMMER\r\nSous Titre : Puissance 160 W ; alim 230 V - 2télécommandes\r\nHors gabarit : Non\r\nLargeur de baie maximum (cm) : 400\r\nHauteur sous linteau maximum : 235\r\nLargeur de baie minimum (cm) : 150\r\nHauteur : 158\r\nAlimentation primaire (V) : 230\r\nEncombrant : Non\r\nIndice de protectionIP : 20\r\nUsage : Résidentiel\r\nTélécommandes : 2\r\nIntensité maximum absorbée (A) : 0,7\r\nPuissance (W) : 140', 5000, 1, 7, 1, '8.jpg'),
(9, 'NICE ON2-EFM,868MHZ', 'Poids : 0.050000 Kg\r\nHauteur : 6 Cm\r\nLargeur : 2.5 Cm\r\nProfondeur : 8 Cm\r\nType de produit : Télécommande', 400, 1, 14, 3, '1t.jpg'),
(10, 'NICE ON9E, 433.92MHZ', 'Poids :	0.050000 Kg\r\nHauteur	: 5.5 Cm\r\nLargeur : 2.5 Cm\r\nProfondeur : 8.5 Cm\r\nType de produit	: Télécommande', 300, 1, 3, 3, '2t.jpg'),
(11, 'FAAC TM2433DS, 433MHZ', 'Largeur : 33 mm\r\nHauteur : 74 mm\r\nEpaisseur : 18 mm\r\nPoids : 0.050000 Kg\r\nType de produit	: Télécommande\r\n', 190, 1, 2, 3, '3t.jpg'),
(12, 'Kit FAAC t-mode TMK', 'Poids : 6.670000 Kg\r\nType de produit	: Kit Motorisation Volet Roulant\r\nNiveau d\'utilisation : Domestique\r\nTension d\'alimentation moteur : 230v\r\nPoids max : 28kg\r\nMotorisation : Autobloquante\r\nGarantie : 3 Ans*', 2500, 1, 3, 2, '6r.jpg'),
(13, 'Kit NICE radio', 'Poids : 9 Kg\r\nHauteur : 126 Cm\r\nLargeur	: 21 Cm\r\nType de produit : Kit Motorisation Volet Roulant\r\nNiveau d\'utilisation : Domestique\r\nPoids max : 56kg\r\nRécepteur radio intégré (option) : Oui\r\nMécanique moteur : Electromécanique\r\nMotorisation : Autobloquante\r\nGarantie : 2.5 Ans', 3000, 1, 1, 2, '7r.jpg'),
(14, 'Kit FAAC t-mode TMK', 'Poids : 5 Kg\r\nType de produit : Kit Motorisation Volet Roulant\r\nNiveau d\'utilisation : Domestique\r\nTension d\'alimentation moteur : 230v\r\nPoids max : 28kg\r\nMécanique moteur : Electromécanique\r\nMotorisation : Autobloquante\r\nGarantie : 3 Ans*', 2300, 1, 5, 2, '4r.jpg'),
(16, 'Moteur filaire TM45 FAAC', 'Apacité de soulèvement (Kg) : 15\r\nVitesse (tours/min) : 17\r\nFréquence d’utilisation : 20%\r\nTemps maxi d’utilisation (min) : 4\r\nTension d’alimentation (V) : 230\r\nFréquence d’alimentation (Hz) : 50\r\nPuissance (W) : 130\r\nNombre de tours ouv. / ferm. max : 51\r\nDiamètre moteur (mm) : 45\r\nLongueur avec adaptateur (mm) : 444', 1500, 1, 8, 2, '8r.jpg'),
(17, 'Moteur tubulaire NICE', 'Couple : 15 Nm\r\nPuissance : 170 Watts\r\nLongueur : 602 mm\r\nVitesse : 17 Tr/mn\r\nConsommation : 0,75 A\r\nNombre de tours avant arrêt : 92\r\nPoids soulevé : 28 Kg\r\nDiamètre : 45 mm\r\n', 1300, 1, 2, 2, '3r.jpg'),
(18, 'Moteur  NIEM151', 'Alimentation : 220 volts\r\nBidirectionnel : Non\r\nBox domotiques : Non compatible\r\nButée : mécaniques à molettes\r\nCommande de Secours : Sans\r\nConnexion : Filaire\r\nForme tête : Standard\r\nGamme : 50\r\nLongueur : 451mm', 1300, 1, 2, 2, '1r.jpg'),
(19, 'CAME TOP432S', 'Marque : CAME\r\nModèle : TOP432S\r\nRéférence fournisseur : 001TOP-432S\r\nFréquence : 433.92 MHz \r\nNombre de boutons : 2\r\nType de codage : 10 Switch\r\nType de pile : 12V(23A)\r\nDimensions : 10 x 5 x 2 cm\r\nPile et notice fournies : Oui', 250, 1, 1, 3, '4t.jpg'),
(20, 'Motorline FALK ', 'Marque : MOTORLINE\r\nDisponibilité des pièces détachées : Information indisponible sur les pièces détachées\r\nMises à jour logicielles garanties jusqu’à :	‎Information non disponible', 150, 1, 3, 3, '5t.jpg'),
(21, 'FAAC XT2 ', 'Marque : FAAC\r\nDimensions : 3x40x10\r\nBouton(s) : 2\r\nFréquence : 868.35 MHz\r\nAlimentation : CR2032\r\nAuto-apprentissage : oui\r\nPile et notice incluses : oui', 180, 1, 7, 3, '6t.jpg'),
(22, 'Clavier à code radio', 'Référence : STDCSBWL', 2000, 1, 6, 6, '1a.jpg'),
(23, 'Alarme kit MYNICE', 'Power supply : 110 V - 240 V\r\nEnvironnementale class (EN 50131-1) : 2\r\nOperating température : -10 °C ... +40 °C', 10000, 1, 1, 6, '2a.jpg'),
(24, 'Thomson AVIDSEN', 'Type de produit : Sirène\r\nCompatible avec : Caméra Thomson LENS 200\r\nMarque : Thomson\r\nGarantie (produit neuf) : 3 ans\r\nRéférence : 512506\r\nEAN : 3660215125065', 550, 1, 14, 6, '3a.jpg'),
(25, 'Détecteur infrarouges', 'Poids : 0.5 Kg\r\nHauteur : 16 Cm\r\nLargeur : 12 Cm\r\nProfondeur : 5 Cm\r\nConnectable (option) : Oui\r\nBatterie-secours (option) : Oui\r\nGarantie : 3 Ans*\r\nLiaison sans fil : Oui\r\nCapture d’images  : Oui\r\nBidirectionnel : Oui\r\nLiaison radio : quadri-bandes sécurité anti piratage : Oui', 2190, 1, 9, 6, '4a.jpg'),
(26, 'Alarme double-fréquence ', 'Clavier alphanumérique (20 touches).\r\nSystème antiintrusion.\r\nRadio Dual Band.\r\nDétection d\'approche, d\'intrusion, d\'incendie, d\'inondation.\r\nAlimentation par batterie (batterie de réserve rechargeable).\r\nPortée radio 100m\r\nAppel 63 numéros (jusqu\'à 6 messages vocaux et 17 SMS).\r\nFonction de dissuasion (sirène puissante ; allumage éclairage) et gestion des automatismes.\r\nTransmetteur téléphonique RTC et GSM\r\nGestion différencié des alarmes.\r\n', 12000, 1, 1, 6, '5a.jpg'),
(27, 'Combiné audio GOLMAR', 'Dimensions : 220 x 84 x 53 - Compatible avec des platines extérieures 12V seulement - En ABS blanc - Appel ronfleur et électronique - Réglage des 2 voies de phonies (Micro et HP) - Réglage du volume d\'appel - Combiné audio T-Line UNIVERSEL 2 fils- 5 fils', 350, 1, 3, 4, '1i.jpg'),
(29, 'Kit vidéo AIPHONE ', 'Sous Titre : Compatible smartphone et tablette\r\nHors gabarit : Non\r\nNotice Constructeur : Aiphone-gamme-JP-bd_10.pdf\r\nEAN : 04968249596820\r\nShipping Type : default', 770, 1, 2, 4, '2i.jpg'),
(30, 'Kit vidéo CAME MTM-BIANCA', 'Dimensions du portier : 140 (l) x 135 (h) x 64 (p) mm\r\nAlimentation (Vcc) : 16 ÷18\r\nIndice de protection : IP54\r\nTempérature de fonctionnement : -25°C -> + 55°C\r\nDimensions du moniteur : 145 x 170 x 30,9 mm\r\nAbsorption maximum (mA) : 200\r\nCourant absorbé en veille (mA) < 1\r\nCourant absorbé par LED (mA) 1', 550, 1, 9, 4, '3i.jpg'),
(31, 'Caméra IP d', 'Qualité vidéo : 1080p - Full HD\r\nStockage max : 128 Go - microSDXC (non fournie)\r\nConnectique : Sans fil\r\nVision infrarouge : 25m - Orientation : Motorisée\r\nEnregistrement : oui - Haut parleur : oui\r\nMicro intégré : Oui (intégré)\r\nConnecté : Oui (connecté) Google Home, Amazon Alexa\r\nApplication smartphone : atHome Security\r\nConnexion à la caméra : Wifi', 3000, 1, 13, 4, '4i.jpg'),
(32, 'Poste  maître audio mains AIPHONE', 'Largeur : 80 mm\r\nHauteur : 185 mm\r\nProfondeur : 27 mm\r\nTouche de raccrochage OFF\r\nTouche d\'ouverture de porte\r\nTouche de 2ème contact sec (24 Vcc ou ca - 1,6 A NO)\r\nTouche d\'appel général avec intercommunication\r\nDurée de sonnerie : 4 secondes\r\nRéglage du volume d\'écoute\r\nPossibilité d’extension de sonnerie', 1300, 1, 7, 4, '5i.jpg');

-- --------------------------------------------------------

--
-- Structure de la table `promos`
--

CREATE TABLE `promos` (
  `IdPromo` int(11) NOT NULL,
  `Taux` double NOT NULL,
  `DateDéb` date NOT NULL,
  `DateFin` date NOT NULL,
  `StatutPromo` tinyint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `promos`
--

INSERT INTO `promos` (`IdPromo`, `Taux`, `DateDéb`, `DateFin`, `StatutPromo`) VALUES
(1, 20, '2023-03-12', '2023-03-31', 0),
(2, 50, '2023-03-08', '2023-03-30', 0);

-- --------------------------------------------------------

--
-- Structure de la table `promo_produit`
--

CREATE TABLE `promo_produit` (
  `IdPrmPrdt` int(11) NOT NULL,
  `IdPromo` int(11) NOT NULL,
  `IdPr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `promo_produit`
--

INSERT INTO `promo_produit` (`IdPrmPrdt`, `IdPromo`, `IdPr`) VALUES
(1, 1, 31),
(2, 1, 25),
(3, 1, 26),
(4, 1, 2),
(5, 1, 3),
(6, 2, 7),
(7, 2, 8);

-- --------------------------------------------------------

--
-- Structure de la table `rdv`
--

CREATE TABLE `rdv` (
  `IdRDV` int(11) NOT NULL,
  `IdMb` int(11) NOT NULL,
  `TypePrjt` varchar(250) NOT NULL,
  `MessageRDV` varchar(255) NOT NULL,
  `DateRDV` date DEFAULT NULL,
  `StatutRDV` tinyint(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `rdv`
--

INSERT INTO `rdv` (`IdRDV`, `IdMb`, `TypePrjt`, `MessageRDV`, `DateRDV`, `StatutRDV`) VALUES
(6, 1, 'Motorisation porte de garage', 'test', '2023-03-20', 0);

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `catégorie`
--
ALTER TABLE `catégorie`
  ADD PRIMARY KEY (`IdCt`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`IdCmd`),
  ADD KEY `FK_Commande_Client` (`IdMb`);

--
-- Index pour la table `détails_commande`
--
ALTER TABLE `détails_commande`
  ADD PRIMARY KEY (`IdDétailsCmd`) USING BTREE,
  ADD KEY `FK_détails_commande_Commande` (`IdCmd`) USING BTREE,
  ADD KEY `FK_détails_commande_Produit` (`IdPr`) USING BTREE;

--
-- Index pour la table `membre`
--
ALTER TABLE `membre`
  ADD PRIMARY KEY (`IdMb`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`IdPr`),
  ADD KEY `FK_produit_catégorie` (`IdCt`);

--
-- Index pour la table `promos`
--
ALTER TABLE `promos`
  ADD PRIMARY KEY (`IdPromo`);

--
-- Index pour la table `promo_produit`
--
ALTER TABLE `promo_produit`
  ADD PRIMARY KEY (`IdPrmPrdt`),
  ADD KEY `promo_produit_ibfk_1` (`IdPromo`),
  ADD KEY `promo_produit_ibfk_2` (`IdPr`);

--
-- Index pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD PRIMARY KEY (`IdRDV`),
  ADD KEY `FK_rdv_membre` (`IdMb`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `catégorie`
--
ALTER TABLE `catégorie`
  MODIFY `IdCt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `IdCmd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT pour la table `détails_commande`
--
ALTER TABLE `détails_commande`
  MODIFY `IdDétailsCmd` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT pour la table `membre`
--
ALTER TABLE `membre`
  MODIFY `IdMb` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `IdPr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT pour la table `promos`
--
ALTER TABLE `promos`
  MODIFY `IdPromo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `promo_produit`
--
ALTER TABLE `promo_produit`
  MODIFY `IdPrmPrdt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT pour la table `rdv`
--
ALTER TABLE `rdv`
  MODIFY `IdRDV` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `FK_Commande_Client` FOREIGN KEY (`IdMb`) REFERENCES `membre` (`IdMb`);

--
-- Contraintes pour la table `détails_commande`
--
ALTER TABLE `détails_commande`
  ADD CONSTRAINT `FK_détails_commande_Commande` FOREIGN KEY (`IdCmd`) REFERENCES `commande` (`IdCmd`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_détails_commande_Produit` FOREIGN KEY (`IdPr`) REFERENCES `produit` (`IdPr`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `FK_produit_catégorie` FOREIGN KEY (`IdCt`) REFERENCES `catégorie` (`IdCt`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `promo_produit`
--
ALTER TABLE `promo_produit`
  ADD CONSTRAINT `promo_produit_ibfk_1` FOREIGN KEY (`IdPromo`) REFERENCES `promos` (`IdPromo`),
  ADD CONSTRAINT `promo_produit_ibfk_2` FOREIGN KEY (`IdPr`) REFERENCES `produit` (`IdPr`);

--
-- Contraintes pour la table `rdv`
--
ALTER TABLE `rdv`
  ADD CONSTRAINT `FK_rdv_membre` FOREIGN KEY (`IdMb`) REFERENCES `membre` (`IdMb`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
