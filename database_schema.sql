-- Création de la base de données
CREATE DATABASE cabinet_medical;

-- Connexion à la base de données
\c cabinet_medical

-- Table des patients
CREATE TABLE patients (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    date_naissance DATE NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    telephone VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table des médecins
CREATE TABLE medecins (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    specialite VARCHAR(100) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    telephone VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Table des rendez-vous
CREATE TABLE rendez_vous (
    id SERIAL PRIMARY KEY,
    patient_id INTEGER NOT NULL,
    medecin_id INTEGER NOT NULL,
    date_heure TIMESTAMP NOT NULL,
    motif TEXT NOT NULL,
    statut VARCHAR(20) NOT NULL DEFAULT 'Planifié',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (patient_id) REFERENCES patients(id) ON DELETE CASCADE,
    FOREIGN KEY (medecin_id) REFERENCES medecins(id) ON DELETE CASCADE
);

-- Table des utilisateurs
CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    email VARCHAR(255) UNIQUE NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(20) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- =======

-- Index pour améliorer les performances des requêtes
CREATE INDEX idx_patients_nom_prenom ON patients(nom, prenom);
CREATE INDEX idx_medecins_nom_prenom ON medecins(nom, prenom);
CREATE INDEX idx_rendez_vous_date_heure ON rendez_vous(date_heure);
CREATE INDEX idx_rendez_vous_patient_id ON rendez_vous(patient_id);
CREATE INDEX idx_rendez_vous_medecin_id ON rendez_vous(medecin_id);


