-- Création de la base de données
CREATE DATABASE cabinet_medical;

-- Connexion à la base de données
\c cabinet_medical


CREATE TYPE user_role AS ENUM ('Patient', 'Medecin');
CREATE TYPE user_status AS ENUM ('Actif', 'Suspendu');
CREATE TYPE rdv_status AS ENUM ('Accepté', 'Refusé');


-- Table des patients
CREATE TABLE users (
    id SERIAL PRIMARY KEY,
    nom VARCHAR(100) NOT NULL,
    prenom VARCHAR(100) NOT NULL,
    date_naissance DATE NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    telephone VARCHAR(20) NOT NULL,
    password VARCHAR(255) NOT NULL,
    status user_status default 'Actif',
    role user_role NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


-- Table des rendez-vous
CREATE TABLE rendez_vous (
    id SERIAL PRIMARY KEY,
    patient_id INTEGER NOT NULL,
    medecin_id INTEGER NOT NULL,
    date_heure TIMESTAMP NOT NULL,
    status rdv_status default 'Accepté', 
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (patient_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE,
    FOREIGN KEY (medecin_id) REFERENCES users(id) ON DELETE CASCADE ON UPDATE CASCADE
);





