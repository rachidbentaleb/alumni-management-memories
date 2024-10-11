-- Database Initialization Script

-- Create database (if not already existing)
DROP DATABASE IF EXISTS coupainsavant;
CREATE DATABASE coupainsavant;
USE coupainsavant;

-- Table structure for laureat
CREATE TABLE laureat (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    email VARCHAR(150) UNIQUE NOT NULL,
    motdepasse VARCHAR(255) NOT NULL,
    telephone VARCHAR(20),
    promotion VARCHAR(50),
    filiere VARCHAR(100),
    etablissement VARCHAR(150),
    employeur VARCHAR(150),
    photoprofil VARCHAR(255), -- Path to profile picture
    fonction VARCHAR(100),
);

-- Table structure for avis (reviews/feedback)
CREATE TABLE avis (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_laureat INT,
    commentaire TEXT,
    date_avis TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_laureat) REFERENCES laureat(id)
);

-- Table structure for souvenirs (memories)
CREATE TABLE souvenirs (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_laureat INT,
    description TEXT,
    date_souvenir TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (id_laureat) REFERENCES laureat(id)
);

