CREATE DATABASE elevage;
USE elevage;

CREATE TABLE elevage_alimentation
(
    id_alimentation INTEGER AUTO_INCREMENT PRIMARY KEY,
    prix_kg DECIMAL(10,2),
    gain DECIMAL(10,2)
);
ALTER TABLE elevage_alimentation ADD COLUMN nom_alimentation VARCHAR(30);

CREATE TABLE elevage_type_animal
(
    id_type INTEGER AUTO_INCREMENT PRIMARY KEY,
    id_alimentation INTEGER,
    nom_type VARCHAR(20),
    poids_min DECIMAL(10,2),
    poids_max DECIMAL(10,2),
    prix_kg DECIMAL(10,2),
    nbr_jrs_dead INTEGER,
    perte_sans_manger DECIMAL(10,2),
    conso_jrs DECIMAL(10,2),
    FOREIGN KEY (id_alimentation) REFERENCES elevage_alimentation(id_alimentation)
);

CREATE TABLE elevage_eleveur
(
    id_eleveur INTEGER PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100),
    mot_de_passe VARCHAR(100),
    capital DECIMAL(16,2)
);

CREATE TABLE elevage_animal
(
    id_animal INTEGER AUTO_INCREMENT PRIMARY KEY,
    id_type INTEGER,
    id_eleveur INTEGER,
    nom_animal VARCHAR(50),
    poids_initial DECIMAL(10,2),
    poids_actuel DECIMAL(10,2),
    status_vivant BOOLEAN,
    status_vente BOOLEAN,
    FOREIGN KEY (id_type) REFERENCES elevage_type_animal(id_type),
    FOREIGN KEY (id_eleveur) REFERENCES elevage_eleveur(id_eleveur)
);

CREATE TABLE elevage_stockage
(
    id_stockage INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_eleveur INTEGER,
    id_alimentation INTEGER,
    quantite DECIMAL(10,2),
    FOREIGN KEY (id_eleveur) REFERENCES elevage_eleveur(id_eleveur),
    FOREIGN KEY (id_alimentation) REFERENCES elevage_alimentation(id_alimentation)
);

CREATE TABLE elevage_nourrir
(
    id_nourrir INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_eleveur INTEGER,
    date_nourrir DATE,
    FOREIGN KEY (id_eleveur) REFERENCES elevage_eleveur(id_eleveur)
);

CREATE TABLE elevage_image_animal
(
    id_image INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_animal INTEGER,
    url_image VARCHAR(200),
    FOREIGN KEY (id_animal) REFERENCES elevage_animal(id_animal)
);