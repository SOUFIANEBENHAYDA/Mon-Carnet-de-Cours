-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2025 at 01:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `academique`
--

-- --------------------------------------------------------

--
-- Table structure for table `administration`
--

CREATE TABLE `administration` (
  `ida` int(11) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `email` varchar(40) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administration`
--

INSERT INTO `administration` (`ida`, `nom`, `prenom`, `email`, `password`) VALUES
(1, 'benhayda', 'soufiane', 'soufianebenhida00@gmail.com', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `affectation`
--

CREATE TABLE `affectation` (
  `id` int(11) NOT NULL,
  `id_matiere` int(11) NOT NULL,
  `id_filiere` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cours`
--

CREATE TABLE `cours` (
  `id_cours` int(11) NOT NULL,
  `jour` enum('Lundi','Mardi','Mercredi','Jeudi','Vendredi','Samedi') NOT NULL,
  `heure_debut` time NOT NULL,
  `heure_fin` time NOT NULL,
  `salle` varchar(50) DEFAULT NULL,
  `id_matiere` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id_document` int(11) NOT NULL,
  `titre` varchar(100) DEFAULT NULL,
  `fichier` varchar(255) DEFAULT NULL,
  `id_matiere` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id_document`, `titre`, `fichier`, `id_matiere`) VALUES
(8, 'test2', '../uploaded_docs/TP3_POO.pdf', 3),
(17, 'css', '../uploaded_docs/Web Statique  2024-2025  partie 3 (CSS Typographie).pdf', 5),
(18, 'css partie 3', '../uploaded_docs/Web Statique  2024-2025  partie 3 (CSS Typographie).pdf', 5);

-- --------------------------------------------------------

--
-- Table structure for table `emploi`
--

CREATE TABLE `emploi` (
  `id_emploi` int(11) NOT NULL,
  `id_filiere` int(11) NOT NULL,
  `niveau` enum('1','2') NOT NULL,
  `lun1` varchar(20) DEFAULT ' ',
  `lun2` varchar(20) DEFAULT ' ',
  `lun3` varchar(20) DEFAULT ' ',
  `lun4` varchar(20) DEFAULT ' ',
  `mar1` varchar(20) DEFAULT ' ',
  `mar2` varchar(20) DEFAULT ' ',
  `mar3` varchar(20) DEFAULT ' ',
  `mar4` varchar(20) DEFAULT ' ',
  `mer1` varchar(20) DEFAULT ' ',
  `mer2` varchar(20) DEFAULT ' ',
  `mer3` varchar(20) DEFAULT ' ',
  `mer4` varchar(20) DEFAULT ' ',
  `jeu1` varchar(20) DEFAULT ' ',
  `jeu2` varchar(20) DEFAULT ' ',
  `jeu3` varchar(20) DEFAULT ' ',
  `jeu4` varchar(20) DEFAULT ' ',
  `ven1` varchar(20) DEFAULT ' ',
  `ven2` varchar(20) DEFAULT ' ',
  `ven3` varchar(20) DEFAULT ' ',
  `ven4` varchar(20) DEFAULT ' ',
  `sam1` varchar(20) DEFAULT ' ',
  `sam2` varchar(20) DEFAULT ' ',
  `sam3` varchar(20) DEFAULT ' ',
  `sam4` varchar(20) DEFAULT ' '
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `emploi`
--

INSERT INTO `emploi` (`id_emploi`, `id_filiere`, `niveau`, `lun1`, `lun2`, `lun3`, `lun4`, `mar1`, `mar2`, `mar3`, `mar4`, `mer1`, `mer2`, `mer3`, `mer4`, `jeu1`, `jeu2`, `jeu3`, `jeu4`, `ven1`, `ven2`, `ven3`, `ven4`, `sam1`, `sam2`, `sam3`, `sam4`) VALUES
(2, 4, '2', 'reseau', 'python', '', '', '', '', '', '', '', '', '', '', '', 'estt', 'gyuhajskd', 'kbjhbhj', 'hbhkbjkbjk.', 'jkbjkb', 'jkbjkk', '', '', '', '', ''),
(3, 2, '2', 'nothing', 'poo', '', 'css', 'html', '', 'pie', 'pie', 'ws', 'ws', '', '', '', '', 'python', 'none', 'test', '', 'test', '', '', '', '', ''),
(4, 3, '1', 'poo', 'test', 'dasa', '', 'asda', 'asdas', '', '', 'asdas', 'asda', '', '', 'asd', '', '', 'asdasd', '', 'asd', '', 'asd', '', '', 'asd', 'dads'),
(5, 1, '1', 'Python', 'python', '', '', 'POO', 'POO', '', 'ENG', '', 'PIE', 'PHP', 'PHP', 'FR', 'JS', 'JS', '', '', '', 'PHP', 'PHP', 'POO', 'POO', '', ''),
(6, 1, '2', 'Front-End', 'Front-End', '', '', '', '', 'Back-End', 'Back-End', 'Laravel', 'laravel', '', '', '', '', 'React JS', 'React JS', '', 'PIE', '', '', '', '', 'Manipulation des don', 'Manipulation des don'),
(7, 2, '1', 'reseau 1', 'reseau 1', '', '', '', '', 'securitè', 'securitè', 'Python', 'Python', '', '', '', 'PIE', 'PIE', '', '', '', '', '', '', '', '', ''),
(8, 3, '2', 'statistique', 'statistique', '', '', '', '', 'contab', 'contab', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(9, 4, '1', 'Photoshope', 'Photoshope', '', '', '', '', 'Adobe', 'Adobe', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
(10, 1, '1', 'POO', 'POO', '', '', '', '', 'PHP', 'PHP', '', 'PIE', 'JS', 'JS', '', '', '', '', '', '', '', '', '', '', '', ''),
(11, 1, '1', 'POO', 'POO', '', 'PHP', 'JS', 'JS', 'PIE', '', '', '', '', '', '', '', '', '', 'JS', 'SECURITE', '', '', '', '', '', ''),
(12, 1, '1', 'POO', 'POO', '', '', '', 'PIE', 'PHP', 'PHP', '', 'JS', 'JS', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `etudiants`
--

CREATE TABLE `etudiants` (
  `id_etudiant` int(11) NOT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `genre` enum('F','M') DEFAULT NULL,
  `date_nissance` date DEFAULT NULL,
  `niveau` int(11) DEFAULT NULL,
  `photo` varchar(255) DEFAULT NULL,
  `id_filiere` int(11) DEFAULT NULL,
  `mot_de_pass` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `etudiants`
--

INSERT INTO `etudiants` (`id_etudiant`, `telephone`, `nom`, `email`, `genre`, `date_nissance`, `niveau`, `photo`, `id_filiere`, `mot_de_pass`) VALUES
(4, '0666666623', 'SOUFIANE BENHAYDA', 'soufianebenhida00@gmail.com', 'M', '2003-07-31', 1, '../photos/Screenshot 2025-04-02 205452.png', 1, 'test'),
(6, '3423234', 'test', 'test@gmail.com', 'M', '2025-06-21', 1, '../photos/Screenshot 2025-01-06 013036.png', 2, 'test'),
(19, '21313123', 'khalid', 'khalid@gmail.com', 'M', '2025-06-13', 2, '../photos/Screenshot 2025-01-06 013036.png', 2, 'test'),
(20, '043434334', 'IBRAHIM', 'ibrahim@gmail.com', 'M', '2025-06-21', 1, '../photos/Screenshot 2024-11-23 124725.png', 3, '1234'),
(22, '12312313', 'soufiane2', 'soufaine2@gmail.com', 'M', '2025-06-20', 2, '../photos/WhatsApp Image 2025-06-17 at 12.33.58_1b7cfb87.jpg', 2, 'test'),
(23, '0634123492', 'YOUSSEF IDMASSOUAD', 'youssef@gmail.com', 'M', '2025-06-28', 2, '../photos/Screenshot 2025-03-03 085956.png', 3, 'test');

-- --------------------------------------------------------

--
-- Table structure for table `filieres`
--

CREATE TABLE `filieres` (
  `id_filiere` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `niveau` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `filieres`
--

INSERT INTO `filieres` (`id_filiere`, `nom`, `niveau`) VALUES
(1, 'DEV', '1er'),
(2, 'ID', NULL),
(3, 'GE', NULL),
(4, 'IF', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `matieres`
--

CREATE TABLE `matieres` (
  `id_matiere` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `coefficient` int(11) NOT NULL,
  `id_prof` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `matieres`
--

INSERT INTO `matieres` (`id_matiere`, `nom`, `coefficient`, `id_prof`) VALUES
(1, 'dwd', 3, 1),
(2, 'html', 3, 2),
(3, 'POO', 2, 3),
(4, 'Python', 2, 2),
(5, 'CSS', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `notes`
--

CREATE TABLE `notes` (
  `id_note` int(11) NOT NULL,
  `type_note` enum('CC','TP','EFM','Projet') NOT NULL,
  `valeur` decimal(5,2) DEFAULT NULL CHECK (`valeur` >= 0 and `valeur` <= 20),
  `id_etudiant` int(11) DEFAULT NULL,
  `id_matiere` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `notes`
--

INSERT INTO `notes` (`id_note`, `type_note`, `valeur`, `id_etudiant`, `id_matiere`) VALUES
(12, 'CC', 18.50, 6, 1),
(18, 'EFM', 18.00, 4, 4),
(19, 'CC', 17.00, 4, 4);

-- --------------------------------------------------------

--
-- Table structure for table `posts_forum`
--

CREATE TABLE `posts_forum` (
  `id_post` int(11) NOT NULL,
  `contenu` text NOT NULL,
  `date_post` datetime DEFAULT current_timestamp(),
  `email` varchar(40) DEFAULT NULL,
  `id_etudiant` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `posts_forum`
--

INSERT INTO `posts_forum` (`id_post`, `contenu`, `date_post`, `email`, `id_etudiant`) VALUES
(6, 'yooooo', '2025-06-20 02:27:30', 's.benhayda4303@uca.ac.ma', 4),
(7, 'hello there', '2025-06-20 02:28:39', 'soufianebenhida00@gmail.com', 4),
(9, 'ajouter une astuce', '2025-06-20 02:32:48', 'soufianebenhida00@gmail.com', 4),
(10, 'hello monsieur', '2025-06-20 02:35:30', 'soufianebenhida00@gmail.com', 4),
(12, 'hello class', '2025-06-20 17:42:14', 'soufianebenhida00@gmail.com', 4);

-- --------------------------------------------------------

--
-- Table structure for table `professeurs`
--

CREATE TABLE `professeurs` (
  `id_prof` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `professeurs`
--

INSERT INTO `professeurs` (`id_prof`, `nom`, `email`) VALUES
(1, 'prof saad', 'saad@gmail.com'),
(2, 'prof hakim', 'hakim@gmail.com'),
(3, 'prof sanae', 'sanae@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administration`
--
ALTER TABLE `administration`
  ADD PRIMARY KEY (`ida`);

--
-- Indexes for table `affectation`
--
ALTER TABLE `affectation`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_matiere` (`id_matiere`),
  ADD KEY `id_filiere` (`id_filiere`);

--
-- Indexes for table `cours`
--
ALTER TABLE `cours`
  ADD PRIMARY KEY (`id_cours`),
  ADD KEY `id_matiere` (`id_matiere`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id_document`),
  ADD KEY `id_matiere` (`id_matiere`);

--
-- Indexes for table `emploi`
--
ALTER TABLE `emploi`
  ADD PRIMARY KEY (`id_emploi`),
  ADD KEY `id_filiere` (`id_filiere`);

--
-- Indexes for table `etudiants`
--
ALTER TABLE `etudiants`
  ADD PRIMARY KEY (`id_etudiant`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `num_etudiant` (`telephone`),
  ADD KEY `id_filiere` (`id_filiere`),
  ADD KEY `idx_etudiant_email` (`email`);

--
-- Indexes for table `filieres`
--
ALTER TABLE `filieres`
  ADD PRIMARY KEY (`id_filiere`),
  ADD UNIQUE KEY `nom` (`nom`);

--
-- Indexes for table `matieres`
--
ALTER TABLE `matieres`
  ADD PRIMARY KEY (`id_matiere`),
  ADD KEY `id_prof` (`id_prof`),
  ADD KEY `idx_matiere_nom` (`nom`);

--
-- Indexes for table `notes`
--
ALTER TABLE `notes`
  ADD PRIMARY KEY (`id_note`),
  ADD KEY `id_etudiant` (`id_etudiant`),
  ADD KEY `id_matiere` (`id_matiere`);

--
-- Indexes for table `posts_forum`
--
ALTER TABLE `posts_forum`
  ADD PRIMARY KEY (`id_post`),
  ADD KEY `id_etudiant` (`id_etudiant`);

--
-- Indexes for table `professeurs`
--
ALTER TABLE `professeurs`
  ADD PRIMARY KEY (`id_prof`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administration`
--
ALTER TABLE `administration`
  MODIFY `ida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `affectation`
--
ALTER TABLE `affectation`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cours`
--
ALTER TABLE `cours`
  MODIFY `id_cours` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id_document` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `emploi`
--
ALTER TABLE `emploi`
  MODIFY `id_emploi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `etudiants`
--
ALTER TABLE `etudiants`
  MODIFY `id_etudiant` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `filieres`
--
ALTER TABLE `filieres`
  MODIFY `id_filiere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `matieres`
--
ALTER TABLE `matieres`
  MODIFY `id_matiere` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `notes`
--
ALTER TABLE `notes`
  MODIFY `id_note` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `posts_forum`
--
ALTER TABLE `posts_forum`
  MODIFY `id_post` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `professeurs`
--
ALTER TABLE `professeurs`
  MODIFY `id_prof` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `affectation`
--
ALTER TABLE `affectation`
  ADD CONSTRAINT `affectation_ibfk_1` FOREIGN KEY (`id_matiere`) REFERENCES `matieres` (`id_matiere`),
  ADD CONSTRAINT `affectation_ibfk_2` FOREIGN KEY (`id_filiere`) REFERENCES `filieres` (`id_filiere`);

--
-- Constraints for table `cours`
--
ALTER TABLE `cours`
  ADD CONSTRAINT `cours_ibfk_1` FOREIGN KEY (`id_matiere`) REFERENCES `matieres` (`id_matiere`) ON DELETE CASCADE;

--
-- Constraints for table `documents`
--
ALTER TABLE `documents`
  ADD CONSTRAINT `documents_ibfk_1` FOREIGN KEY (`id_matiere`) REFERENCES `matieres` (`id_matiere`) ON DELETE CASCADE;

--
-- Constraints for table `emploi`
--
ALTER TABLE `emploi`
  ADD CONSTRAINT `emploi_ibfk_1` FOREIGN KEY (`id_filiere`) REFERENCES `filieres` (`id_filiere`);

--
-- Constraints for table `etudiants`
--
ALTER TABLE `etudiants`
  ADD CONSTRAINT `etudiants_ibfk_1` FOREIGN KEY (`id_filiere`) REFERENCES `filieres` (`id_filiere`) ON DELETE SET NULL;

--
-- Constraints for table `matieres`
--
ALTER TABLE `matieres`
  ADD CONSTRAINT `matieres_ibfk_1` FOREIGN KEY (`id_prof`) REFERENCES `professeurs` (`id_prof`) ON DELETE SET NULL;

--
-- Constraints for table `notes`
--
ALTER TABLE `notes`
  ADD CONSTRAINT `notes_ibfk_1` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiants` (`id_etudiant`) ON DELETE CASCADE,
  ADD CONSTRAINT `notes_ibfk_2` FOREIGN KEY (`id_matiere`) REFERENCES `matieres` (`id_matiere`) ON DELETE CASCADE;

--
-- Constraints for table `posts_forum`
--
ALTER TABLE `posts_forum`
  ADD CONSTRAINT `posts_forum_ibfk_1` FOREIGN KEY (`id_etudiant`) REFERENCES `etudiants` (`id_etudiant`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
