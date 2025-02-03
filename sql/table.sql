CREATE DATABASE elevage;
USE elevage;

CREATE TABLE elevage_alimentation
(
    id_alimentation INTEGER AUTO_INCREMENT PRIMARY KEY,
    prix_kg NUMBER(10,2),
    gain NUMBER(10,2)
);

CREATE TABLE elevage_type_animal
(
    id_type INTEGER AUTO_INCREMENT PRIMARY KEY,
    nom_type VARCHAR(20),
    poids_min NUMBER(10,2),
    poids_max NUMBER(10,2),
    prix_kg NUMBER(10,2),
    nbr_jrs_dead INTEGER,
    perte_sans_manger NUMBER(10,2),
    id_alimentation INTEGER,
    conso_jrs NUMBER(10,2)
);

CREATE TABLE elevage_animal
(
    id_animal INTEGER AUTO_INCREMENT PRIMARY KEY,
    id_type INTEGER,
    nom_animal VARCHAR(50),
    poids_initial NUMBER(10,2),
    poids_actuel NUMBER(10,2),
    id_eleveur INTEGER,
    status_vivant BOOLEAN,
    status_vente BOOLEAN
);

CREATE TABLE elevage_eleveur
(
    id_eleveur INTEGER PRIMARY KEY AUTO_INCREMENT,
    nom VARCHAR(100),
    mot_de_passe VARCHAR(100),
    capital NUMBER(16,2)
);

CREATE TABLE elevage_stockage
(
    id_stockage INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_eleveur INTEGER,
    id_alimentation INTEGER,
    quantite NUMBER(10,2)
);

CREATE TABLE elevage_nourrir
(
    id_nourrir INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_eleveur INTEGER,
    date_nourrir DATE
);

CREATE TABLE elevage_image_animal
(
    id_image INTEGER PRIMARY KEY AUTO_INCREMENT,
    id_animal INTEGER,
    url_image VARCHAR(200)
);