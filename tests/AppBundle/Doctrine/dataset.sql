INSERT INTO layer (id, name, rank) VALUES
  (1, 'Ecole', 1),
  (2, 'Administration', 2);

INSERT INTO geo (id, layer_id, name, geometry) VALUES
  (1, 1, 'UFR de Droit', 'POINT(47.2440450414866 -1.55100145657789)'),
  (2, 1, 'Faculté des Lettres et Sciences Humaines', 'POINT(47.2455706823537 -1.55067031353639)'),
  (3, 1, 'Institut Français Recherche Exploitation Mer', 'POINT(47.2470000850226 -1.54691289117152)'),
  (4, 1, 'Institut Universitaire Formation des Maîtres', 'POINT(47.2508676479668 -1.55300429750414)'),
  (5, 1, 'Conservatoire National Arts et Métiers', 'POINT(47.2504962425346 -1.5545441113589)'),
  (6, 1, 'Institut Régional d''Administration', 'POINT(47.2516613755122 -1.55023731625197)'),
  (7, 1, 'Centre Scientifique Technique Bâtiment', 'POINT(47.2550857107483 -1.55437296774524)'),
  (8, 1, 'Maternelle Elémentaire Sainte Claire d''Assise', 'POINT(47.2534926689552 -1.55722156846442)'),
  (9, 1, 'Maternelle Le Baut', 'POINT(47.2539862477641 -1.56259102974462)'),
  (10, 1, 'Lycée Professionnel La Chauvinière', 'POINT(47.2524955193136 -1.57162920806731)'),
  (11, 1, 'Maternelle La Chauvinière', 'POINT(47.2529142210335 -1.57397108669)'),
  (12, 1, 'Lycée Gaspard Monge', 'POINT(47.2541944833231 -1.57325271873319)'),
  (13, 1, 'Elémentaire George Sand', 'POINT(47.2592130387613 -1.56927623879586)'),
  (14, 1, 'Maternelle Camille Claudel', 'POINT(47.2583308306106 -1.56922820654123)'),
  (15, 1, 'Lycée Professionnel Etablissement Régional enseignement Adapté', 'POINT(47.26112824581 -1.56071420550939)'),
  (16, 1, 'Collège Stendhal', 'POINT(47.261197542487 -1.56993996433992)'),
  (17, 1, 'Maternelle Georges Brassens', 'POINT(47.2620009973366 -1.57122290073319)'),
  (18, 1, 'Institut National Recherche Agronomique', 'POINT(47.2642184079554 -1.56647273059533)'),
  (19, 1, 'Primaire Françoise Dolto', 'POINT(47.2654921343449 -1.57992088403673)'),
  (20, 1, 'Maternelle Elémentaire Notre Dame de Lourdes', 'POINT(47.2513108560277 -1.57563818991349)');

INSERT INTO geo_attribute (id, geo_id, name, value) VALUES
(1, 1, 'Categorie', 'Supérieur'),
(2, 1, 'Statut', 'Public'),
(3, 1, 'Adresse', '8 Chemin de la Censive du Tertre 44300 NANTES'),
(4, 1, 'Téléphone', '02 40 14 15 15'),
(5, 1, 'Web', 'www.univ-nantes.fr'),

(6, 2, 'Categorie', 'Supérieur'),
(7, 2, 'Statut', 'Public'),
(8, 2, 'Adresse', '16 Chemin de la Censive du Tertre 44300 NANTES'),
(9, 2, 'Téléphone', '02 40 14 10 10'),
(10, 2, 'Web', 'www.univ-nantes.fr'),

(11, 3, 'Categorie', 'Centre de recherche'),
(12, 3, 'Statut', 'Public'),
(13, 3, 'Adresse', '4 Rue de l''Ile d''Yeu 44300 NANTES'),
(14, 3, 'Téléphone', '02 40 37 40 00'),
(15, 3, 'Web', 'www.ifremer.fr'),

(16, 4, 'Categorie', 'Supérieur'),
(17, 4, 'Statut', 'Public'),
(18, 4, 'Adresse', '23 Rue Recteur Schmitt 44300 NANTES'),
(19, 4, 'Téléphone', '02 40 74 25 10'),
(20, 4, 'Web', 'www.pl.iufm.fr/sites/nantes/nantes.htm'),

(21, 5, 'Categorie', 'Supérieur'),
(22, 5, 'Statut', 'Public'),
(23, 5, 'Adresse', '25 Boulevard Guy Mollet 44300 NANTES'),
(24, 5, 'Téléphone', '02 40 16 10 10'),
(25, 5, 'Web', 'www.cnam-paysdelaloire.fr'),

(26, 6, 'Categorie', 'Supérieur'),
(27, 6, 'Statut', 'Public'),
(28, 6, 'Adresse', '1 Rue de la Bourgeonnière 44300 NANTES'),
(29, 6, 'Téléphone', '02 40 74 34 77'),
(30, 6, 'Web', 'www.ira-nantes.gouv.fr'),

(31, 7, 'Categorie', 'Centre de recherche'),
(32, 7, 'Statut', 'Public'),
(33, 7, 'Adresse', '11 Rue Henri Picherit 44300 NANTES'),
(34, 7, 'Téléphone', '02 40 37 20 00'),
(35, 7, 'Web', 'www.cstb.fr'),

(36, 8, 'Categorie', 'Primaire'),
(37, 8, 'Statut', 'Privé'),
(38, 8, 'Adresse', '70 Rue de la Bourgeonnière 44300 NANTES'),
(39, 8, 'Téléphone', '02 40 76 77 26'),
(40, 8, 'Web', ''),

(41, 9, 'Categorie', 'Maternelle'),
(42, 9, 'Statut', 'Public'),
(43, 9, 'Adresse', '2T Rue des Renards 44300 NANTES'),
(44, 9, 'Téléphone', '02 40 76 80 50'),
(45, 9, 'Web', ''),

(46, 10, 'Categorie', 'Lycée'),
(47, 10, 'Statut', 'Public'),
(48, 10, 'Adresse', '2 Rue de la Fantaisie 44300 NANTES'),
(49, 10, 'Téléphone', '02 40 16 71 35'),
(50, 10, 'Web', ''),

(51, 11, 'Categorie', 'Maternelle'),
(52, 11, 'Statut', 'Public'),
(53, 11, 'Adresse', '32 Boulevard de la Chauvinière 44300 NANTES'),
(54, 11, 'Téléphone', '02 40 76 60 76'),
(55, 11, 'Web', ''),

(56, 12, 'Categorie', 'Lycée'),
(57, 12, 'Statut', 'Public'),
(58, 12, 'Adresse', '2 Rue de la Fantaisie 44300 NANTES'),
(59, 12, 'Téléphone', '02 40 16 71 00'),
(60, 12, 'Web', ''),

(61, 13, 'Categorie', 'Elémentaire'),
(62, 13, 'Statut', 'Public'),
(63, 13, 'Adresse', '83 Rue des Renards 44300 NANTES'),
(64, 13, 'Téléphone', '02 40 76 59 61'),
(65, 13, 'Web', ''),

(66, 14, 'Categorie', 'Maternelle'),
(67, 14, 'Statut', 'Public'),
(68, 14, 'Adresse', '83 Rue des Renards 44300 NANTES'),
(69, 14, 'Téléphone', '02 40 76 10 75'),
(70, 14, 'Web', ''),

(71, 15, 'Categorie', 'Lycée'),
(72, 15, 'Statut', 'Public'),
(73, 15, 'Adresse', '10 Boulevard Albert Einstein 44300 NANTES'),
(74, 15, 'Téléphone', '02 40 76 40 05'),
(75, 15, 'Web', ''),

(76, 16, 'Categorie', 'Collège'),
(77, 16, 'Statut', 'Public'),
(78, 16, 'Adresse', '88 Rue des Renards 44300 NANTES'),
(79, 16, 'Téléphone', '02 51 83 71 00'),
(80, 16, 'Web', ''),

(81, 17, 'Categorie', 'Maternelle'),
(82, 17, 'Statut', 'Public'),
(83, 17, 'Adresse', '19 Rue Eugène Thomas 44300 NANTES'),
(84, 17, 'Téléphone', '02 40 76 10 12'),
(85, 17, 'Web', ''),

(86, 18, 'Categorie', 'Centre de recherche'),
(87, 18, 'Statut', 'Public'),
(88, 18, 'Adresse', '63 Rue de la Geraudiere 44300 NANTES'),
(89, 18, 'Téléphone', '02 40 67 50 00'),
(90, 18, 'Web', 'www.nantes.inra.fr'),

(91, 19, 'Categorie', 'Primaire'),
(92, 19, 'Statut', 'Public'),
(93, 19, 'Adresse', '11 Rue de Concarneau 44300 NANTES'),
(94, 19, 'Téléphone', '02 40 40 68 97'),
(95, 19, 'Web', ''),

(96, 20, 'Categorie', 'Primaire'),
(97, 20, 'Statut', 'Privé'),
(98, 20, 'Adresse', '3 Rue Jean Baptiste Olivaux 44300 NANTES'),
(99, 20, 'Téléphone', '02 40 94 44 35'),
(100, 20, 'Web', '');


