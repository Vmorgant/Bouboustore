-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost:3306
-- Généré le :  mer. 09 jan. 2019 à 14:10
-- Version du serveur :  10.0.37-MariaDB-0+deb8u1
-- Version de PHP :  7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `e150985`
--

-- --------------------------------------------------------

--
-- Structure de la table `adresse`
--

CREATE TABLE `adresse` (
  `id_adresse` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `libelle` varchar(20) CHARACTER SET utf8 DEFAULT NULL,
  `rue` varchar(20) CHARACTER SET utf8 NOT NULL,
  `ville` varchar(20) CHARACTER SET utf8 NOT NULL,
  `zip_code` varchar(20) CHARACTER SET utf8 NOT NULL,
  `pays` varchar(20) CHARACTER SET utf8 NOT NULL,
  `principal` tinyint(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `attributionPointsFidelite`
--

CREATE TABLE `attributionPointsFidelite` (
  `id_attribution` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `montant` int(11) NOT NULL,
  `id_client` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `categorieProduit`
--

CREATE TABLE `categorieProduit` (
  `id_categorie` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `categorieProduit`
--

INSERT INTO `categorieProduit` (`id_categorie`, `nom`) VALUES
(0, '');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` int(11) NOT NULL,
  `nom` varchar(20) CHARACTER SET utf8 NOT NULL,
  `prenom` varchar(20) CHARACTER SET utf8 NOT NULL,
  `mail` varchar(40) CHARACTER SET utf8 NOT NULL,
  `telephone` varchar(10) CHARACTER SET utf8 NOT NULL,
  `langue` enum('fr','ang','esp','ru') CHARACTER SET utf8 DEFAULT NULL,
  `date_debut_contrat` datetime NOT NULL,
  `date_fin_contrat` datetime NOT NULL,
  `point_fidelite` int(11) NOT NULL DEFAULT '0',
  `numero_cb` varchar(15) CHARACTER SET utf8 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom`, `prenom`, `mail`, `telephone`, `langue`, `date_debut_contrat`, `date_fin_contrat`, `point_fidelite`, `numero_cb`) VALUES
(1, 'test', 'victor', 'victor@agilemans.org', '0202020', '', '2018-12-18 00:00:00', '2018-12-22 00:00:00', 0, '1234'),
(2, 'Jean', 'Dupond', 'jean.dupond@gmail.com', '0606060606', '', '1999-08-07 00:00:00', '2026-01-01 00:00:00', 0, '');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(11) NOT NULL,
  `id_client` int(11) NOT NULL,
  `date_emission` datetime NOT NULL,
  `frais_service` float NOT NULL DEFAULT '0',
  `frais_livraison` float NOT NULL DEFAULT '0',
  `id_remise` int(11) NOT NULL,
  `id_devise` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `concurrent`
--

CREATE TABLE `concurrent` (
  `id_concurrent` int(11) NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `devise`
--

CREATE TABLE `devise` (
  `id_devise` int(11) NOT NULL,
  `symbole` varchar(5) CHARACTER SET utf8 NOT NULL,
  `abreviation` varchar(10) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `devise`
--

INSERT INTO `devise` (`id_devise`, `symbole`, `abreviation`) VALUES
(1, '', ''),
(2, '', ''),
(3, '', ''),
(4, '', '');

-- --------------------------------------------------------

--
-- Structure de la table `facture`
--

CREATE TABLE `facture` (
  `id_facture` int(11) NOT NULL,
  `date_facture` datetime NOT NULL,
  `id_commande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `fournisseur`
--

CREATE TABLE `fournisseur` (
  `id_fournisseur` int(11) NOT NULL,
  `abreviation` varchar(255) DEFAULT NULL,
  `nom` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `fournisseur`
--

INSERT INTO `fournisseur` (`id_fournisseur`, `abreviation`, `nom`) VALUES
(1, 'noc', 'nocibÃ©');

-- --------------------------------------------------------

--
-- Structure de la table `livraison`
--

CREATE TABLE `livraison` (
  `id_produit` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL,
  `quantite` int(11) NOT NULL DEFAULT '1',
  `date_livraison` datetime DEFAULT NULL,
  `id_prix_commande` int(11) NOT NULL,
  `etat` enum('en cours','livré') CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `paiement`
--

CREATE TABLE `paiement` (
  `id_paiement` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `montant` float NOT NULL DEFAULT '0',
  `id_commande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `prixCommande`
--

CREATE TABLE `prixCommande` (
  `id_prix_commande` int(11) NOT NULL,
  `prix` float NOT NULL DEFAULT '0',
  `id_devise` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `prixConcurrent`
--

CREATE TABLE `prixConcurrent` (
  `id_prix_concurrent` int(11) NOT NULL,
  `prix` float NOT NULL DEFAULT '0',
  `id_devise` int(11) NOT NULL,
  `id_concurrent` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `prixFournisseur`
--

CREATE TABLE `prixFournisseur` (
  `id_prix_fournisseur` int(11) NOT NULL,
  `prix` float NOT NULL DEFAULT '0',
  `id_devise` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `prixPublic`
--

CREATE TABLE `prixPublic` (
  `id_prix_public` int(11) NOT NULL,
  `prix` float NOT NULL DEFAULT '0',
  `id_devise` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `marge` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `produit`
--

CREATE TABLE `produit` (
  `id_produit` int(11) NOT NULL,
  `nom` varchar(255) CHARACTER SET utf8 NOT NULL,
  `descriptif` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `commentaire` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `image` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `id_categorie` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `propose`
--

CREATE TABLE `propose` (
  `id_fournisseur` int(11) NOT NULL,
  `id_remise` int(11) NOT NULL,
  `id_prix_fournisseur` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Structure de la table `remise`
--

CREATE TABLE `remise` (
  `id_remise` int(11) NOT NULL,
  `palier_minimum` float NOT NULL DEFAULT '0',
  `palier_maximum` float NOT NULL DEFAULT '0',
  `taux` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `tauxDeChange`
--

CREATE TABLE `tauxDeChange` (
  `id_devise_1` int(11) NOT NULL,
  `id_devise_2` int(11) NOT NULL,
  `taux` float NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `utilisationPointsFidelite`
--

CREATE TABLE `utilisationPointsFidelite` (
  `id_utilisation` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `montant` int(11) NOT NULL,
  `commentaire` varchar(255) DEFAULT NULL,
  `id_client` int(11) NOT NULL,
  `id_commande` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `adresse`
--
ALTER TABLE `adresse`
  ADD PRIMARY KEY (`id_adresse`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `attributionPointsFidelite`
--
ALTER TABLE `attributionPointsFidelite`
  ADD PRIMARY KEY (`id_attribution`),
  ADD KEY `id_client` (`id_client`);

--
-- Index pour la table `categorieProduit`
--
ALTER TABLE `categorieProduit`
  ADD PRIMARY KEY (`id_categorie`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `commande_remise` (`id_remise`),
  ADD KEY `commande_devise` (`id_devise`);

--
-- Index pour la table `concurrent`
--
ALTER TABLE `concurrent`
  ADD PRIMARY KEY (`id_concurrent`);

--
-- Index pour la table `devise`
--
ALTER TABLE `devise`
  ADD PRIMARY KEY (`id_devise`);

--
-- Index pour la table `facture`
--
ALTER TABLE `facture`
  ADD PRIMARY KEY (`id_facture`),
  ADD KEY `id_commande` (`id_commande`);

--
-- Index pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  ADD PRIMARY KEY (`id_fournisseur`);

--
-- Index pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD PRIMARY KEY (`id_produit`,`id_commande`,`id_prix_commande`),
  ADD UNIQUE KEY `id_produit` (`id_produit`),
  ADD UNIQUE KEY `id_commande` (`id_commande`),
  ADD KEY `livraison_prix` (`id_prix_commande`);

--
-- Index pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD PRIMARY KEY (`id_paiement`),
  ADD KEY `id_commande` (`id_commande`);

--
-- Index pour la table `prixCommande`
--
ALTER TABLE `prixCommande`
  ADD PRIMARY KEY (`id_prix_commande`),
  ADD KEY `prixCommande_devise` (`id_devise`);

--
-- Index pour la table `prixConcurrent`
--
ALTER TABLE `prixConcurrent`
  ADD PRIMARY KEY (`id_prix_concurrent`),
  ADD KEY `prixConcurrent_devise` (`id_devise`),
  ADD KEY `prixConcurrent_concurrent` (`id_concurrent`),
  ADD KEY `prixConcurrent_produit` (`id_produit`);

--
-- Index pour la table `prixFournisseur`
--
ALTER TABLE `prixFournisseur`
  ADD PRIMARY KEY (`id_prix_fournisseur`),
  ADD KEY `id_devise` (`id_devise`);

--
-- Index pour la table `prixPublic`
--
ALTER TABLE `prixPublic`
  ADD PRIMARY KEY (`id_prix_public`),
  ADD UNIQUE KEY `id_devise` (`id_devise`),
  ADD UNIQUE KEY `id_produit` (`id_produit`);

--
-- Index pour la table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id_produit`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- Index pour la table `propose`
--
ALTER TABLE `propose`
  ADD PRIMARY KEY (`id_fournisseur`,`id_remise`,`id_prix_fournisseur`,`id_produit`),
  ADD KEY `propose_prixFournisseur` (`id_prix_fournisseur`),
  ADD KEY `propose_remise` (`id_remise`),
  ADD KEY `propose_produit` (`id_produit`);

--
-- Index pour la table `remise`
--
ALTER TABLE `remise`
  ADD PRIMARY KEY (`id_remise`);

--
-- Index pour la table `tauxDeChange`
--
ALTER TABLE `tauxDeChange`
  ADD PRIMARY KEY (`id_devise_1`,`id_devise_2`),
  ADD UNIQUE KEY `id_devise_1` (`id_devise_1`),
  ADD UNIQUE KEY `id_devise_2` (`id_devise_2`);

--
-- Index pour la table `utilisationPointsFidelite`
--
ALTER TABLE `utilisationPointsFidelite`
  ADD PRIMARY KEY (`id_utilisation`),
  ADD KEY `id_client` (`id_client`),
  ADD KEY `id_commande` (`id_commande`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `adresse`
--
ALTER TABLE `adresse`
  MODIFY `id_adresse` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `attributionPointsFidelite`
--
ALTER TABLE `attributionPointsFidelite`
  MODIFY `id_attribution` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `client`
--
ALTER TABLE `client`
  MODIFY `id_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `concurrent`
--
ALTER TABLE `concurrent`
  MODIFY `id_concurrent` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `devise`
--
ALTER TABLE `devise`
  MODIFY `id_devise` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `facture`
--
ALTER TABLE `facture`
  MODIFY `id_facture` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `fournisseur`
--
ALTER TABLE `fournisseur`
  MODIFY `id_fournisseur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `paiement`
--
ALTER TABLE `paiement`
  MODIFY `id_paiement` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `prixCommande`
--
ALTER TABLE `prixCommande`
  MODIFY `id_prix_commande` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `prixFournisseur`
--
ALTER TABLE `prixFournisseur`
  MODIFY `id_prix_fournisseur` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `prixPublic`
--
ALTER TABLE `prixPublic`
  MODIFY `id_prix_public` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `produit`
--
ALTER TABLE `produit`
  MODIFY `id_produit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `utilisationPointsFidelite`
--
ALTER TABLE `utilisationPointsFidelite`
  MODIFY `id_utilisation` int(11) NOT NULL AUTO_INCREMENT;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `attributionPointsFidelite`
--
ALTER TABLE `attributionPointsFidelite`
  ADD CONSTRAINT `attributionPointsFidelite_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_devise` FOREIGN KEY (`id_devise`) REFERENCES `devise` (`id_devise`),
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `commande_remise` FOREIGN KEY (`id_remise`) REFERENCES `remise` (`id_remise`);

--
-- Contraintes pour la table `facture`
--
ALTER TABLE `facture`
  ADD CONSTRAINT `facture_ibfk_1` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`);

--
-- Contraintes pour la table `livraison`
--
ALTER TABLE `livraison`
  ADD CONSTRAINT `livraison_commande` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`),
  ADD CONSTRAINT `livraison_prix` FOREIGN KEY (`id_prix_commande`) REFERENCES `prixCommande` (`id_prix_commande`),
  ADD CONSTRAINT `livraison_produit` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`);

--
-- Contraintes pour la table `paiement`
--
ALTER TABLE `paiement`
  ADD CONSTRAINT `paiement_ibfk_1` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`);

--
-- Contraintes pour la table `prixCommande`
--
ALTER TABLE `prixCommande`
  ADD CONSTRAINT `prixCommande_devise` FOREIGN KEY (`id_devise`) REFERENCES `devise` (`id_devise`);

--
-- Contraintes pour la table `prixConcurrent`
--
ALTER TABLE `prixConcurrent`
  ADD CONSTRAINT `prixConcurrent_concurrent` FOREIGN KEY (`id_concurrent`) REFERENCES `concurrent` (`id_concurrent`),
  ADD CONSTRAINT `prixConcurrent_devise` FOREIGN KEY (`id_devise`) REFERENCES `devise` (`id_devise`),
  ADD CONSTRAINT `prixConcurrent_produit` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`);

--
-- Contraintes pour la table `prixFournisseur`
--
ALTER TABLE `prixFournisseur`
  ADD CONSTRAINT `prixFournisseur_ibfk_1` FOREIGN KEY (`id_devise`) REFERENCES `devise` (`id_devise`);

--
-- Contraintes pour la table `prixPublic`
--
ALTER TABLE `prixPublic`
  ADD CONSTRAINT `Prix_devise` FOREIGN KEY (`id_devise`) REFERENCES `devise` (`id_devise`),
  ADD CONSTRAINT `Prix_ibfk_1` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`);

--
-- Contraintes pour la table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorieProduit` (`id_categorie`);

--
-- Contraintes pour la table `propose`
--
ALTER TABLE `propose`
  ADD CONSTRAINT `propose_fournisseur` FOREIGN KEY (`id_fournisseur`) REFERENCES `fournisseur` (`id_fournisseur`),
  ADD CONSTRAINT `propose_prixFournisseur` FOREIGN KEY (`id_prix_fournisseur`) REFERENCES `prixFournisseur` (`id_prix_fournisseur`),
  ADD CONSTRAINT `propose_produit` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id_produit`),
  ADD CONSTRAINT `propose_remise` FOREIGN KEY (`id_remise`) REFERENCES `remise` (`id_remise`);

--
-- Contraintes pour la table `tauxDeChange`
--
ALTER TABLE `tauxDeChange`
  ADD CONSTRAINT `Taux_de_change_ibfk_1` FOREIGN KEY (`id_devise_1`) REFERENCES `devise` (`id_devise`),
  ADD CONSTRAINT `Taux_de_change_ibfk_2` FOREIGN KEY (`id_devise_2`) REFERENCES `devise` (`id_devise`);

--
-- Contraintes pour la table `utilisationPointsFidelite`
--
ALTER TABLE `utilisationPointsFidelite`
  ADD CONSTRAINT `utilisationPointsFidelite_ibfk_1` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`),
  ADD CONSTRAINT `utilisationPointsFidelite_ibfk_2` FOREIGN KEY (`id_commande`) REFERENCES `commande` (`id_commande`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
