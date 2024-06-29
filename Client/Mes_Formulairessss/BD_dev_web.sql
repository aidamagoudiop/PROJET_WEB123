-- Créer la base de données
-- CREATE DATABASE IF NOT EXISTS Projet_Web;

-- Utiliser la base de données nouvellement créée
-- USE Projet_Web;

-- Créer un utilisateur Neymar avec le mot de passe passer
-- CREATE USER 'Neymar'@'localhost' IDENTIFIED BY 'passer';

-- Accorder tous les privilèges à l'utilisateur Neymar sur la base de données Projet_Web
-- GRANT ALL PRIVILEGES ON Projet_Web.* TO 'Neymar'@'localhost';

-- Mettre à jour les privilèges pour prendre effet
-- FLUSH PRIVILEGES;

-- Table Client
CREATE TABLE Client (
    id INT AUTO_INCREMENT PRIMARY KEY,
    photo VARCHAR(255),
    nom VARCHAR(255),
    prenom VARCHAR(255),
    civilite VARCHAR(10),
    num_tel VARCHAR(20),
    email VARCHAR(255),
    adresse VARCHAR(255),
    ville VARCHAR(255),
    code_postal VARCHAR(10),
    pays_residence VARCHAR(255)
);

-- Table Salles
CREATE TABLE Salles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    type VARCHAR(255),
    nbr_personnes INT,
    description TEXT,
    tarifs DECIMAL(10, 2),
    photo VARCHAR(255)
);


-- Table Table
CREATE TABLE Table_ (
    id INT AUTO_INCREMENT PRIMARY KEY,
    capacite INT
);

-- Table Chambre
CREATE TABLE Chambre (
    id INT AUTO_INCREMENT PRIMARY KEY,
    photo VARCHAR(255),
    etage INT,
    statut VARCHAR(50),
    capacite INT,
    type VARCHAR(255),
    tarif DECIMAL(10, 2),
    chambre_nettoye BOOLEAN,
    dernier_nettoyage DATE,
    salle_de_bain BOOLEAN,
    toilette BOOLEAN,
    televiseur BOOLEAN,
    climatiseur BOOLEAN,
    telephone BOOLEAN,
    num_telephone VARCHAR(20),
    description TEXT
);

-- Créer la table Admin
CREATE TABLE Admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    mot_de_passe VARCHAR(255) NOT NULL,
    UNIQUE (email(191))
);

-- Table Reservation_chambre avec id_chambre comme clé étrangère
CREATE TABLE Reservation_chambre (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_client INT,
    id_chambre INT,
    nbr_adultes INT,
    nbr_enfants INT,
    date_actuelle DATE,
    date_arrivee DATE,
    date_depart DATE,
    FOREIGN KEY (id_client) REFERENCES Client(id),
    FOREIGN KEY (id_chambre) REFERENCES Chambre(id)
);

-- Table Reservation_salle avec id_salle comme clé étrangère
CREATE TABLE Reservation_salle (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_client INT,
    id_salle INT,
    date_actuelle DATE,
    date_reservation DATE,
    heure_debut TIME,
    heure_fin TIME,
    tarifs DECIMAL(10, 2),
    FOREIGN KEY (id_client) REFERENCES Client(id),
    FOREIGN KEY (id_salle) REFERENCES Salles(id)
);

-- Table Reservation_table avec id_table comme clé étrangère
CREATE TABLE Reservation_table (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_client INT,
    id_table INT,
    date_actuelle DATE,
    heure_reservee TIME,
    tarifs DECIMAL(10, 2),
    FOREIGN KEY (id_client) REFERENCES Client(id),
    FOREIGN KEY (id_table) REFERENCES Table_(id)
);


-- Table Facture_reservation_chambre
CREATE TABLE Facture_reservation_chambre (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_reservation_chambre INT,
    date_facturation DATE,
    FOREIGN KEY (id_reservation_chambre) REFERENCES Reservation_chambre(id)
);

-- Table Facture_reservation_salle
CREATE TABLE Facture_reservation_salle (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_reservation_salle INT,
    date_facturation DATE,
    FOREIGN KEY (id_reservation_salle) REFERENCES Reservation_salle(id)
);

-- Table Facture_reservation_table
CREATE TABLE Facture_reservation_table (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_reservation_table INT,
    date_facturation DATE,
    FOREIGN KEY (id_reservation_table) REFERENCES Reservation_table(id)
);

-- Table Paiement
CREATE TABLE Paiement (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_facture INT,
    date_paiement DATE,
    mode_paiement VARCHAR(50),
    FOREIGN KEY (id_facture) REFERENCES Facture_reservation_chambre(id)
);
