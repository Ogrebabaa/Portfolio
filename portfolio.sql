-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 16, 2020 at 01:09 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `portfolio`
--

-- --------------------------------------------------------

--
-- Table structure for table `PF_Admin`
--

CREATE TABLE `PF_Admin` (
  `login` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `passwd` varchar(50) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `PF_Admin`
--

INSERT INTO `PF_Admin` (`login`, `passwd`) VALUES
('adminsama', '78dd24d92452c2ccf3f5e5f4f22b3d21');

-- --------------------------------------------------------

--
-- Table structure for table `PF_APPARTENIR`
--

CREATE TABLE `PF_APPARTENIR` (
  `id_cat` int(11) NOT NULL,
  `id_article` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `PF_APPARTENIR`
--

INSERT INTO `PF_APPARTENIR` (`id_cat`, `id_article`) VALUES
(1, 16),
(1, 23),
(1, 39),
(2, 20),
(2, 31),
(2, 35),
(2, 43),
(3, 23),
(3, 36),
(3, 38),
(3, 40),
(5, 17);

-- --------------------------------------------------------

--
-- Table structure for table `PF_ARTICLE`
--

CREATE TABLE `PF_ARTICLE` (
  `id_article` int(11) NOT NULL,
  `titre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `lien` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `contenu` varchar(500) COLLATE utf8_unicode_ci NOT NULL,
  `date_publi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `PF_ARTICLE`
--

INSERT INTO `PF_ARTICLE` (`id_article`, `titre`, `lien`, `contenu`, `date_publi`) VALUES
(16, 'Le gouvernement 4T répond au New York Times', 'https://www.google.com/url?rct=j&sa=t&url=https://www.breakingnews.fr/divertissement/le-gouvernement-4t-repond-au-new-york-times-486296.html&ct=ga&cd=CAIyGmQxYjhhZDEyZTNiN2E2ZGE6Y29tOmZyOlVT&usg=AFQjCNF5mTk0FvGXA3RJlYMnTs9hw3vsJA', '... jour sont le produit du travail de dizaines de scientifiques et notre politique est l&#39;<b>open data</b> et la transparence totale », a tweeté le responsable.', '2020-05-09'),
(17, 'Travailler avec les données ouvertes', 'https://www.google.com/url?rct=j&sa=t&url=https://www.cairn.info/revue-internationale-des-sciences-administratives-2020-1-page-5.htm&ct=ga&cd=CAIyGmQxYjhhZDEyZTNiN2E2ZGE6Y29tOmZyOlVT&usg=AFQjCNEKIYV8zsiCwFEmQYU3jo1rLfvdMQ', 'La diffusion de DGO est encouragée par des initiatives telles que le Partenariat international pour un gouvernement ouvert (<b>Open Government</b>&nbsp;...', '2020-05-27'),
(18, 'Covid-19 : l&#39;union des acteurs français de la ', 'https://www.google.com/url?rct=j&sa=t&url=https://www.lanouvellerepublique.fr/economie/covid-19-l-union-des-acteurs-francais-de-la-data-et-de-l-ia&ct=ga&cd=CAIyGmQxYjhhZDEyZTNiN2E2ZGE6Y29tOmZyOlVT&usg=AFQjCNH4TZ9ERnCEfmN1s-u_O7H3YrDwDw', 'Il faut donc convaincre les fabricants de partager, dans un cadre légal, des données d&#39;<b>Open Data</b>, comme des données publiques ou d&#39;opérateurs&nbsp;...', '2020-05-26'),
(19, 'Quelles plages du littoral aquitain pouvez-vous fr', 'https://www.google.com/url?rct=j&sa=t&url=https://www.charentelibre.fr/2020/05/26/quelles-plages-du-littoral-aquitain-pouvez-vous-frequenter-carte-interactive,3603158.php&ct=ga&cd=CAIyGmQxYjhhZDEyZTNiN2E2ZGE6Y29tOmZyOlVT&usg=AFQjCNHPrFy-mriGp7uuiE5h3gWlJeuMAQ', '... de projets institutionnels ou privés dans le cadre d&#39;une démarche en <b>open data</b>. A partir du 2 juin, et en fonction de l&#39;évolution du contexte sanitaire,&nbsp;...', '2020-05-26'),
(20, '<b>Open data</b> usage', 'https://www.google.com/url?rct=j&sa=t&url=http://demosite.ksgyan.com/tdo1wh/open-data-usage.html&ct=ga&cd=CAIyGmQxYjhhZDEyZTNiN2E2ZGE6Y29tOmZyOlVT&usg=AFQjCNGuzLKTswCcDoUKJcsMnrLimjyg7g', 'Our <b>open data</b> journey. Governments, independent organizations, and agencies have come forward to open the floodgates of data to create more and&nbsp;...', '2020-05-26'),
(21, 'Données de santé : l&#39;arbre StopCovid qui cache', 'https://www.google.com/url?rct=j&sa=t&url=https://theconversation.com/donnees-de-sante-larbre-stopcovid-qui-cache-la-foret-health-data-hub-138852&ct=ga&cd=CAIyGmQxYjhhZDEyZTNiN2E2ZGE6Y29tOmZyOlVT&usg=AFQjCNGa3SJ8iQHxrGqHIf_P-IpnjoXmrw', 'Health <b>Data</b> Hub, la forêt qui se cache derrière l&#39;arbre. Dès la remise du rapport Villani sur l&#39;intelligence artificielle (IA) en mars 2018, le président de la&nbsp;...', '2020-05-25'),
(22, 'Segments du marché mondial du stockage de données ', 'https://www.google.com/url?rct=j&sa=t&url=http://boursomaniac.com/2020/05/25/global-data-storage-market-after-covid-19-lockdown/&ct=ga&cd=CAIyGmQxYjhhZDEyZTNiN2E2ZGE6Y29tOmZyOlVT&usg=AFQjCNHmQmaxLNSvqj6OQlse7QiyQVTFEA', 'FABRICANTS traités dans ce <b>Data</b> Storage rapport sur le marché: Microsoft, VMware, HP, NetApp, <b>Open</b> Text, SanDisk, Hitachi, EMC. Sur la base du&nbsp;...', '2020-05-25'),
(23, 'Les données de 190 plages mises en ligne -', 'https://www.google.com/url?rct=j&sa=t&url=https://www.pharedere.com/actualite/les-donnees-de-190-plages-mises-en-ligne/&ct=ga&cd=CAIyGmQxYjhhZDEyZTNiN2E2ZGE6Y29tOmZyOlVT&usg=AFQjCNESPgCH3mUMF6iy1V3wkweRQ8U18g', 'Les données, disponibles en « <b>open data</b> », sont à ce jour : nom et géolocalisation des plages surveillées en Nouvelle-Aquitaine, caractéristiques de&nbsp;...', '2020-05-25'),
(24, '<b>Open Data</b> : un décret fixe les catégories d', 'https://www.google.com/url?rct=j&sa=t&url=https://www.infotec-pro.fr/open-data-un-decret-fixe-les-categories-de-documents-pouvant-etre-publies-sans-anonymisation/&ct=ga&cd=CAIyGmQxYjhhZDEyZTNiN2E2ZGE6Y29tOmZyOlVT&usg=AFQjCNFInZy6ApPs7R5LfkmGZRiCMyRkyw', '<b>Open Data</b> : un décret fixe les catégories de documents pouvant être publiés sans anonymisation. Plus de deux ans après le vote de la loi Numérique,&nbsp;...', '2020-09-03'),
(25, 'Accès à l&#39;information : la palme revient au mi', 'https://www.google.com/url?rct=j&sa=t&url=https://www.leconomistemaghrebin.com/2020/09/03/acces-linformation-ministere-equipement-premiere-liste/&ct=ga&cd=CAIyGmQxYjhhZDEyZTNiN2E2ZGE6Y29tOmZyOlVT&usg=AFQjCNEIDhkHPayfhmscg2luFA9jV96jfQ', 'En 2015, le taux d&#39;accès à l&#39;information et de l&#39;<b>open Data</b> a atteint 49%, 72,06% en 2018 pour passer à 82,61% en 2020. Par ailleurs, il est à noter&nbsp;...', '2020-09-03'),
(26, 'La publication en ligne des arrêts et jugements re', 'https://www.google.com/url?rct=j&sa=t&url=https://www.lecho.be/economie-politique/belgique/general/la-publication-en-ligne-des-arrets-et-jugements-reportee-d-un-an/10249164.html&ct=ga&cd=CAIyGmQxYjhhZDEyZTNiN2E2ZGE6Y29tOmZyOlVT&usg=AFQjCNHz0EJqR5xt25uRTPofJhfCa-ugww', 'L&#39;<b>open data</b>, par contre, rend les jugements accessibles aux humains mais également aux machines. «C&#39;est une nuance importance, notamment si on&nbsp;...', '2020-09-03'),
(27, 'Les Etats-Unis remettent au gouvernement un logici', 'https://www.google.com/url?rct=j&sa=t&url=https://aip.ci/les-etats-unis-remettent-au-gouvernement-un-logiciel-de-donnees-pour-lamelioration-du-systeme-de-sante-ivoirien-communique/&ct=ga&cd=CAIyGmQxYjhhZDEyZTNiN2E2ZGE6Y29tOmZyOlVT&usg=AFQjCNGGV-W5lYJ69D4mnIaCLgwzOGyQLg', '... également la fin officielle du projet <b>Open Data</b> Center for Health (OpenDCH), un effort de deux ans visant à fournir aux responsables de la santé du&nbsp;...', '2020-09-03'),
(28, 'Immobilier: les prix de ventes disponibles en <b>o', 'https://www.google.com/url?rct=j&sa=t&url=http://www.francesoir.fr/societe-economie/immobilier-les-prix-de-ventes-disponibles-en-open-data-un-fichier-meconnu-et&ct=ga&cd=CAIyGmQxYjhhZDEyZTNiN2E2ZGE6Y29tOmZyOlVT&usg=AFQjCNHA9K7S3IkAirxhAkAg-3Iv-cBLPQ', 'Malgré cet accès libre à ces données cruciales, ce fichier reste méconnu des particuliers. L&#39;<b>open data</b> pour mettre fin à l&#39;opacité du marché immobilier', '2020-09-03'),
(29, 'Utiliser l&#39;<b>open data</b> pour appréhender l', 'https://www.google.com/url?rct=j&sa=t&url=https://www.tntic.com/2020/09/07/utiliser-lopen-data-pour-apprehender-la-precarite-economique/&ct=ga&cd=CAIyGmQxYjhhZDEyZTNiN2E2ZGE6Y29tOmZyOlVT&usg=AFQjCNFvHtxc4-I-f-Xg1FwDtL-Nbg3O3g', 'TNTIC, veille technologique spécialisée et curation de contenus (Iot, Blockchain, eSanté, <b>Opendata</b>, Smartcity, Ecomobilité, Chatbot, ...)', '2020-09-07'),
(30, '<b>Open</b> Banking : Le monopole de la <b>data</b', 'https://www.google.com/url?rct=j&sa=t&url=https://fnh.ma/article/alaune/open-banking-le-monopole-de-la-data-echappe-aux-banques&ct=ga&cd=CAIyGmQxYjhhZDEyZTNiN2E2ZGE6Y29tOmZyOlVT&usg=AFQjCNExuA9nz7ft9vyxgNuinMRMaDH4hA', 'Blockchain, Big <b>Data</b>, Intelligence artificielle, Réalité augmentée… Toutes ces disruptions ont émergé en l&#39;espace de quelques années, mettant&nbsp;...', '2020-09-13'),
(31, 'Toulouse. NeoGeo veut doubler de taille', 'https://www.google.com/url?rct=j&sa=t&url=https://www.ladepeche.fr/2020/09/15/neogeo-veut-doubler-de-taille-9071522.php&ct=ga&cd=CAIyGmQxYjhhZDEyZTNiN2E2ZGE6Y29tOmZyOlVT&usg=AFQjCNFzWuXZsGOg8J5QynBcCrQDagWdyg', 'L&#39;<b>Open Data</b> représentera en 2023 un marché mondial estimé à 15 milliards d&#39;euros. Le fondateur de NeoGeo entend bien en profiter. Cette PME&nbsp;...', '2020-09-15'),
(32, 'INFOGRAPHIES. À Paris, la fréquentation des pistes', 'https://www.google.com/url?rct=j&sa=t&url=https://www.bfmtv.com/paris/infographies-a-paris-la-frequentation-des-pistes-cyclables-explose-depuis-la-rentree_AN-202009140068.html&ct=ga&cd=CAIyGmQxYjhhZDEyZTNiN2E2ZGE6Y29tOmZyOlVT&usg=AFQjCNHKGM_fVcZMiCdRxSxokWOQls9s_Q', '... du vendredi 4 au jeudi 10 septembre 2020. Les données exploitées dans les infographies sont disponibles sur le site <b>open data</b> de la ville de Paris.', '2020-09-14'),
(33, 'La nouvelle éco : Neogeo, le spécialiste de l&#39;', 'https://www.google.com/url?rct=j&sa=t&url=https://www.francebleu.fr/infos/economie-social/neogeo-le-specialiste-de-l-open-data-se-convertit-dans-les-donnees-liees-a-la-covid-19-1600182307&ct=ga&cd=CAIyGmQxYjhhZDEyZTNiN2E2ZGE6Y29tOmZyOlVT&usg=AFQjCNFsKuixAu3PtNhc5YGMOxevKqQTog', 'La nouvelle éco : Neogeo, le spécialiste de l&#39;<b>Open Data</b> se convertit dans les données liées à la COVID-19. Lundi 21 septembre 2020 à 7:38 -.', '2020-09-21'),
(34, 'Ces quelques pourcents d&#39;amélioration business', 'https://www.google.com/url?rct=j&sa=t&url=https://www.larevuedudigital.com/ces-quelques-pourcents-damelioration-que-le-e-commercant-sarenza-est-alle-chercher-dans-le-cloud/&ct=ga&cd=CAIyGmQxYjhhZDEyZTNiN2E2ZGE6Y29tOmZyOlVT&usg=AFQjCNFEUXWFm4DcpubtFFaa7kLXoq89MQ', 'Sarenza dispose d&#39;une plateforme de Big Data créée dans le Cloud de ... les APIs des partenaires, cela peut inclure la Data marketing, et l&#39;<b>Open Data</b>.', '2020-09-21'),
(35, 'Catégorie : #<b>DATA</b> FRA', 'https://www.google.com/url?rct=j&sa=t&url=https://www.tntic.com/category/data/data-fra/page/85/&ct=ga&cd=CAIyGmQxYjhhZDEyZTNiN2E2ZGE6Y29tOmZyOlVT&usg=AFQjCNGYmV1yE67erdOPdfImQWtC4H92hQ', 'L&#39;actualité francophone de la data, du Bigdata et de l&#39;<b>Opendata</b> : utilisation, traitement et perspectives dans les secteurs publics et privés. 0 106.', '2020-09-28'),
(36, '<b>Open data</b> Île-de-France', 'https://www.google.com/url?rct=j&sa=t&url=https://data.iledefrance.fr/explore/embed/dataset/centres-depistage-covid-ile-de-france/map/%3Frefine.departement%3D91%26sort%3Dcode_postal%26basemap%3Djawg.streets%26basemap%3Djawg.streets%26location%3D13,48.69189,2.3834%26static%3Dfalse%26datasetcard%3Dfalse%26scrollWheelZoom%3Dfalse&ct=ga&cd=CAIyGmQxYjhhZDEyZTNiN2E2ZGE6Y29tOmZyOlVT&usg=AFQjCNHWAFIAFeqP9heQ0TrYSzqQn2g9ug', 'Retrouvez plus de 800 jeux de données émanant de la Région Île-de-France et de ses organismes partenaires (dont l&#39;Institut d&#39;aménagement et&nbsp;...', '2020-12-06'),
(37, 'INFOGRAPHIES. Covid-19 : 12.923 contaminations et ', 'https://www.google.com/url?rct=j&sa=t&url=https://www.lanouvellerepublique.fr/a-la-une/infographies-covid-19-12-923-contaminations-et-214-deces-supplementaires-en-24-h&ct=ga&cd=CAIyGmQxYjhhZDEyZTNiN2E2ZGE6Y29tOmZyOlVT&usg=AFQjCNHhCvvKlfKhiRWha2ehz18v56RX6w', '... touchés par le Covid-19 ont été hospitalisés entre vendredi et samedi, selon les dernières données de Géodes, la plateforme d&#39;<b>open</b>-<b>data</b> de Santé&nbsp;...', '2020-12-06'),
(38, 'Explorateur d&#39;associations', 'https://www.google.com/url?rct=j&sa=t&url=https://www.data.gouv.fr/fr/reuses/explorateur-dassociations/&ct=ga&cd=CAIyGmQxYjhhZDEyZTNiN2E2ZGE6Y29tOmZyOlVT&usg=AFQjCNEa-J9U2V_KzqGAUKDkyE98-7tIkQ', 'Des emails frauduleux usurpant l&#39;identité de data.gouv.fr circulent à destination des associations en demandant des données ... L&#39;<b>Open Data</b>.', '2020-12-11'),
(39, 'Covid-19 : &quot;Au vu des données, ça ne serait pas rassurant de déconfiner autant que ce qui est prévu&quot;', 'https://www.google.com/url?rct=j&sa=t&url=https://www.planet.fr/societe-covid-19-au-vu-des-donnees-ca-ne-serait-pas-rassurant-de-deconfiner-autant-que-ce-qui-est-prevu.2112244.29336.html&ct=ga&cd=CAIyGmQxYjhhZDEyZTNiN2E2ZGE6Y29tOmZyOlVT&usg=AFQjCNEPd5G7KqjjXRs-4bd231N1gpRGZg', 'Rendre l&#39;<b>open data</b> accessible et compréhensible par tous. En commençant à s&#39;intéresser à l&#39;épidémie de coronavirus Covid-19 au mois de mars&nbsp;...', '2020-12-10'),
(40, 'Coyote et la SNCF vous alertent de la présence de passages à niveau', 'https://www.google.com/url?rct=j&sa=t&url=https://www.lesnumeriques.com/voiture/coyote-et-la-sncf-vous-alertent-de-la-presence-de-passages-a-niveau-n158289.html&ct=ga&cd=CAIyGmQxYjhhZDEyZTNiN2E2ZGE6Y29tOmZyOlVT&usg=AFQjCNEwZjbSOy2fNh3F_K7RYfqQ3cGMnA', 'Baptisée Passage à niveau, cette alerte réalisée en partenariat avec SNCF Réseau (données <b>open data</b>) informe les conducteurs dès lors qu&#39;ils&nbsp;...', '2020-12-10'),
(43, 'Concentration horaire des polluants - Air ambiant - Lig&#39;Air - Orléans Métropole', 'https://www.google.com/url?rct=j&sa=t&url=https://data.orleans-metropole.fr/explore/dataset/concentration-horaire-des-polluants-air-ambiant-ligair-orleans-metropole/&ct=ga&cd=CAIyGmQxYjhhZDEyZTNiN2E2ZGE6Y29tOmZyOlVT&usg=AFQjCNEpw4BQfdz4mM4PMKsbQaIej7Jnog', 'Données issues du portail <b>open data</b> de Lig&#39;Air https://data-ligair.<b>opendata</b>.arcgis.com/ , filtrées sur les codes INSEE des communes d&#39;Orléans&nbsp;...', '2020-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `PF_A_CATEGORIE`
--

CREATE TABLE `PF_A_CATEGORIE` (
  `id_cat` int(11) NOT NULL,
  `libelle` varchar(500) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `PF_A_CATEGORIE`
--

INSERT INTO `PF_A_CATEGORIE` (`id_cat`, `libelle`) VALUES
(1, 'Covid19'),
(2, 'Favoris'),
(3, 'Développement Web'),
(4, 'Développement Mobile'),
(5, 'Politique');

-- --------------------------------------------------------

--
-- Table structure for table `PF_Contact`
--

CREATE TABLE `PF_Contact` (
  `email_contact` varchar(255) NOT NULL,
  `nom` varchar(255) NOT NULL,
  `prenom` varchar(255) NOT NULL,
  `statut` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `PF_Contact`
--

INSERT INTO `PF_Contact` (`email_contact`, `nom`, `prenom`, `statut`) VALUES
('moreauv.04@gmail.com', 'Moreau', 'Valentin', 1),
('titit@vevre.com', 'de motivation', 'Lettre', 1),
('valentin.m1999@gmail.com', 'Moreau', 'Valentin', 1);

-- --------------------------------------------------------

--
-- Table structure for table `PF_Message`
--

CREATE TABLE `PF_Message` (
  `id_message` int(11) NOT NULL,
  `objet` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `contenu` text COLLATE utf8_unicode_ci NOT NULL,
  `priorite` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `email_contact` varchar(255) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `PF_Message`
--

INSERT INTO `PF_Message` (`id_message`, `objet`, `contenu`, `priorite`, `date`, `email_contact`) VALUES
(2, 'bd f d', ' d fd fd', 2, '2020-12-11 09:01:42', 'moreauv.04@gmail.com'),
(5, 'ssss', 'sss', 1, '2020-12-12 10:52:24', 'valentin.m1999@gmail.com'),
(7, 'cewvewv', 'vrvrevre', 1, '2020-12-12 10:53:26', 'titit@vevre.com'),
(8, 'cewvewv', 'vrvrevre', 1, '2020-12-12 10:57:03', 'titit@vevre.com'),
(9, 'sss', 'ss', 1, '2020-12-12 10:59:57', 'valentin.m1999@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `PF_Admin`
--
ALTER TABLE `PF_Admin`
  ADD PRIMARY KEY (`login`);

--
-- Indexes for table `PF_APPARTENIR`
--
ALTER TABLE `PF_APPARTENIR`
  ADD PRIMARY KEY (`id_cat`,`id_article`),
  ADD KEY `PF_APPARTENIR_PF_ARTICLE0_FK` (`id_article`);

--
-- Indexes for table `PF_ARTICLE`
--
ALTER TABLE `PF_ARTICLE`
  ADD PRIMARY KEY (`id_article`);

--
-- Indexes for table `PF_A_CATEGORIE`
--
ALTER TABLE `PF_A_CATEGORIE`
  ADD PRIMARY KEY (`id_cat`);

--
-- Indexes for table `PF_Contact`
--
ALTER TABLE `PF_Contact`
  ADD PRIMARY KEY (`email_contact`);

--
-- Indexes for table `PF_Message`
--
ALTER TABLE `PF_Message`
  ADD PRIMARY KEY (`id_message`),
  ADD KEY `email_contact` (`email_contact`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `PF_ARTICLE`
--
ALTER TABLE `PF_ARTICLE`
  MODIFY `id_article` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `PF_A_CATEGORIE`
--
ALTER TABLE `PF_A_CATEGORIE`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `PF_Message`
--
ALTER TABLE `PF_Message`
  MODIFY `id_message` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `PF_APPARTENIR`
--
ALTER TABLE `PF_APPARTENIR`
  ADD CONSTRAINT `PF_APPARTENIR_PF_ARTICLE0_FK` FOREIGN KEY (`id_article`) REFERENCES `PF_ARTICLE` (`id_article`),
  ADD CONSTRAINT `PF_APPARTENIR_PF_A_CATEGORIE_FK` FOREIGN KEY (`id_cat`) REFERENCES `PF_A_CATEGORIE` (`id_cat`);

--
-- Constraints for table `PF_Message`
--
ALTER TABLE `PF_Message`
  ADD CONSTRAINT `pf_message_ibfk_1` FOREIGN KEY (`email_contact`) REFERENCES `PF_Contact` (`email_contact`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
