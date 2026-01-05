CREATE DATABASE mabagnolv2_db;

USE mabagnolv2_db;

CREATE TABLE client (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    motDePasseHash VARCHAR(255) NOT NULL,
    role ENUM('admin','client') DEFAULT 'client'
);

CREATE TABLE Theme (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    description TEXT
);

CREATE TABLE Article (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titre VARCHAR(255) NOT NULL,
    contenu TEXT NOT NULL,
    statut ENUM('attente', 'approuve', 'rejete') DEFAULT 'attente',
    image VARCHAR(255),
    video VARCHAR(255),
    dateCreation DATETIME DEFAULT CURRENT_TIMESTAMP,
    idClient INT, 
    idTheme INT,
    CONSTRAINT fk_article_client FOREIGN KEY (idClient) REFERENCES Client(id) ON DELETE SET NULL,
    CONSTRAINT fk_article_theme FOREIGN KEY (idTheme) REFERENCES Theme(id) ON DELETE CASCADE
);
CREATE TABLE Tag (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(50) UNIQUE NOT NULL
);
CREATE TABLE Article_Tag (
    idArticle INT,
    idTag INT,
    PRIMARY KEY (idArticle, idTag),
    CONSTRAINT fk_pivot_article FOREIGN KEY (idArticle) REFERENCES Article(id) ON DELETE CASCADE,
    CONSTRAINT fk_pivot_tag FOREIGN KEY (idTag) REFERENCES Tag(id) ON DELETE CASCADE
);
CREATE TABLE Commentaire (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idArticle INT,
    idClient INT,
    contenu TEXT NOT NULL,
    dateCreation DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_comm_article FOREIGN KEY (idArticle) REFERENCES Article(id) ON DELETE CASCADE,
    CONSTRAINT fk_comm_client FOREIGN KEY (idClient) REFERENCES Client(id) ON DELETE CASCADE
);
CREATE TABLE Favori (
    id INT AUTO_INCREMENT PRIMARY KEY,
    idClient INT,
    idArticle INT,
    dateAjout DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_fav_client FOREIGN KEY (idClient) REFERENCES Client(id) ON DELETE CASCADE,
    CONSTRAINT fk_fav_article FOREIGN KEY (idArticle) REFERENCES Article(id) ON DELETE CASCADE
);
 