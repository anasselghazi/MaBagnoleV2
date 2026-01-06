-- Active: 1764687553815@@localhost@3306@mabagnolev2_db
 CREATE DATABASE mabagnoleV2_db ;

 USE mabagnoleV2_db;

 CREATE TABLE clients (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    mot_passe_hash VARCHAR(255) NOT NULL,
    telephone VARCHAR(20),
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    role ENUM('admin', 'client') DEFAULT 'client'

);

CREATE TABLE themes (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titre VARCHAR(100) NOT NULL,
    description TEXT,
    actif BOOLEAN DEFAULT TRUE
);

CREATE TABLE articles (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_client INT NOT NULL,
    id_theme INT NOT NULL,
    titre VARCHAR(255) NOT NULL,
    contenu TEXT,
    tags VARCHAR(255),
    date_publication DATETIME DEFAULT CURRENT_TIMESTAMP,
    statut ENUM('attent', 'approuve', 'rejete') DEFAULT 'attent',
    FOREIGN KEY (id_client) REFERENCES clients(id),
    FOREIGN KEY (id_theme) REFERENCES themes(id)
);

CREATE TABLE commentaires (
    id INT PRIMARY KEY AUTO_INCREMENT,
    id_client INT NOT NULL,
    id_article INT NOT NULL,
    contenu TEXT NOT NULL,
    date_commentaire DATETIME DEFAULT CURRENT_TIMESTAMP,
    soft_deleted BOOLEAN DEFAULT FALSE,
    FOREIGN KEY (id_client) REFERENCES clients(id),
    FOREIGN KEY (id_article) REFERENCES articles(id)
);


