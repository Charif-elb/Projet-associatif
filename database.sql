-- ============================================
-- MAGHREB FC - Base de données MySQL
-- ============================================

CREATE DATABASE IF NOT EXISTS maghreb_fc CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE maghreb_fc;

-- Table des actualités
CREATE TABLE IF NOT EXISTS actualites (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    contenu TEXT NOT NULL,
    categorie ENUM('tournoi','evenement','competition','resultat','club') DEFAULT 'club',
    image VARCHAR(255) DEFAULT NULL,
    date_publication DATETIME DEFAULT CURRENT_TIMESTAMP,
    visible TINYINT(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table des tournois
CREATE TABLE IF NOT EXISTS tournois (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    date_tournoi DATE NOT NULL,
    heure TIME NOT NULL,
    statut ENUM('ouvert','ferme','termine') DEFAULT 'ouvert',
    description TEXT,
    plateforme VARCHAR(100) DEFAULT 'FC 26',
    visible TINYINT(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table des joueurs / effectif
CREATE TABLE IF NOT EXISTS joueurs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    pseudo VARCHAR(100) NOT NULL,
    poste VARCHAR(50) NOT NULL,
    niveau INT DEFAULT 5,
    experience VARCHAR(100) DEFAULT 'Intermédiaire',
    visible TINYINT(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table des postes recherchés
CREATE TABLE IF NOT EXISTS postes_recherches (
    id INT AUTO_INCREMENT PRIMARY KEY,
    poste VARCHAR(100) NOT NULL,
    code_poste VARCHAR(10) NOT NULL,
    places_disponibles INT DEFAULT 1,
    niveau_recherche VARCHAR(100) DEFAULT 'Semi-Pro',
    experience_souhaitee VARCHAR(100) DEFAULT '1 an',
    visible TINYINT(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table des candidatures
CREATE TABLE IF NOT EXISTS candidatures (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    pseudo_ea VARCHAR(100) NOT NULL,
    age INT NOT NULL,
    poste_principal VARCHAR(50) NOT NULL,
    poste_secondaire VARCHAR(50),
    niveau_experience VARCHAR(100),
    disponibilites TEXT,
    discord VARCHAR(100),
    motivation TEXT,
    date_candidature DATETIME DEFAULT CURRENT_TIMESTAMP,
    statut ENUM('en_attente','accepte','refuse') DEFAULT 'en_attente'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table contact
CREATE TABLE IF NOT EXISTS messages_contact (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(150) NOT NULL,
    sujet VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    date_envoi DATETIME DEFAULT CURRENT_TIMESTAMP,
    lu TINYINT(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Table admin
CREATE TABLE IF NOT EXISTS admin_users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- ============================================
-- DONNÉES DE DÉMONSTRATION
-- ============================================

-- Admin par défaut: admin / maghrebfc2024
INSERT INTO admin_users (username, password) VALUES
('admin', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi');

-- Actualités
INSERT INTO actualites (titre, contenu, categorie) VALUES
('Maghreb FC remporte le tournoi Pro Clubs Maghreb League !', 'Une victoire éclatante pour notre club lors du dernier tournoi Pro Clubs. Nos joueurs ont démontré une cohésion sans faille et un niveau technique impressionnant tout au long de la compétition. Bravo à toute l\'équipe !', 'resultat'),
('Ouverture des inscriptions FC 26 Championship', 'Les inscriptions pour le FC 26 Championship sont officiellement ouvertes. Maghreb FC participera à cette prestigieuse compétition. Rejoignez-nous pour vivre cette aventure unique dans le monde du Pro Clubs.', 'evenement'),
('Recrutement ouvert : Maghreb FC cherche des talents', 'Maghreb FC lance une campagne de recrutement pour renforcer son effectif. Nous recherchons des joueurs motivés, disciplinés et avec un bon niveau technique. Postulez dès maintenant via notre formulaire de recrutement.', 'club'),
('Résumé de la semaine : 5 victoires consécutives', 'Notre équipe enchaîne les victoires avec 5 succès consécutifs cette semaine. La défense est solide, l\'attaque est tranchante. Maghreb FC est en grande forme avant les prochaines échéances importantes.', 'resultat');

-- Tournois
INSERT INTO tournois (nom, date_tournoi, heure, statut, description, plateforme) VALUES
('Maghreb Pro Clubs Cup', '2025-02-15', '20:00:00', 'ouvert', 'Tournoi officiel organisé par Maghreb FC. Format championnat, 8 équipes participantes. Prix à gagner !', 'FC 26'),
('FC 26 Community League S2', '2025-02-22', '19:30:00', 'ouvert', 'Deuxième saison de la ligue communautaire FC 26. Inscrivez votre équipe avant la date limite.', 'FC 26'),
('Coupe du Maghreb Pro Clubs', '2025-03-01', '20:30:00', 'ferme', 'Compétition exclusive réservée aux clubs affiliés. Format élimination directe.', 'FC 26');

-- Joueurs
INSERT INTO joueurs (pseudo, poste, niveau, experience) VALUES
('Maestro28DRX', 'Milieu Offensif', 9, 'Expert'),
('SnipeKing_MA', 'Buteur', 8, 'Avancé'),
('IronWall_FC', 'Défenseur Central', 8, 'Avancé'),
('SkyGuard_GK', 'Gardien', 9, 'Expert'),
('FlashWing_AG', 'Ailier Gauche', 7, 'Intermédiaire'),
('PrecisionLD', 'Latéral Droit', 7, 'Intermédiaire');

-- Postes recherchés
INSERT INTO postes_recherches (poste, code_poste, places_disponibles, niveau_recherche, experience_souhaitee) VALUES
('Gardien', 'GK', 1, 'Semi-Pro / Pro', '6 mois minimum'),
('Défenseur Central', 'DC', 2, 'Semi-Pro', '1 an'),
('Latéral Gauche', 'LG', 1, 'Intermédiaire', '6 mois'),
('Latéral Droit', 'LD', 1, 'Intermédiaire', '6 mois'),
('Milieu Défensif', 'MDC', 1, 'Semi-Pro', '1 an'),
('Milieu Central', 'MC', 1, 'Intermédiaire', '6 mois'),
('Milieu Offensif', 'MOC', 2, 'Avancé', '1 an'),
('Ailier Gauche', 'AG', 1, 'Semi-Pro', '1 an'),
('Ailier Droit', 'AD', 1, 'Semi-Pro', '1 an'),
('Buteur', 'BU', 2, 'Pro / Expert', '2 ans');