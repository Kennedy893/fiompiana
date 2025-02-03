INSERT INTO elevage_alimentation (nom_alimentation, prix_kg, gain) VALUES
('Herbe', 1.50, 10),
('Soja', 2.00, 15),
('Blé', 1.80, 12),
('Orge', 1.60, 11),
('Tourteau', 2.50, 18);

INSERT INTO elevage_type_animal (nom_type, poids_min, poids_max, prix_kg, nbr_jrs_dead, perte_sans_manger, id_alimentation, conso_jrs) VALUES
('Poulet', 1.00, 3.00, 5.00, 5, 20, 1, 0.15),
('Canard', 2.00, 5.00, 6.00, 7, 25, 2, 0.20),
('Boeuf', 150.00, 400.00, 4.50, 15, 100, 3, 10.00),
('Mouton', 30.00, 80.00, 7.00, 10, 50, 4, 2.50),
('Porc', 50.00, 150.00, 6.50, 12, 80, 5, 3.00);

INSERT INTO elevage_animal (id_type, nom_animal, poids_initial, id_eleveur, status_vivant, status_vente) VALUES
(1, 'Poulet #001', 1.20, 1, TRUE, FALSE),
(1, 'Poulet #002', 1.30, 2, TRUE, TRUE),
(1, 'Poulet #003', 1.15, 2, TRUE, TRUE),
(2, 'Canard #001', 2.50, 3, TRUE, TRUE),
(2, 'Canard #002', 2.30, 2, TRUE, FALSE),
(3, 'Boeuf #001', 200.00, 1, TRUE, FALSE),
(3, 'Boeuf #002', 220.00, 2, TRUE, TRUE),
(3, 'Boeuf #003', 215.00, 3, TRUE, TRUE),
(3, 'Boeuf #004', 205.00, 3, TRUE, TRUE),
(4, 'Mouton #001', 40.00, 3, TRUE, FALSE),
(4, 'Mouton #002', 44.00, 1, TRUE, TRUE),
(5, 'Porc #001', 60.00, 2, TRUE, TRUE);

INSERT INTO elevage_eleveur (nom, mot_de_passe) VALUES
('Jean Dupont', 'mdp1'),
('Marie Curie', 'mdp2'),
('Paul Martin', 'mdp3');

INSERT INTO elevage_stockage (id_eleveur, id_alimentation, quantite) VALUES
(1, 1, 100.00),
(1, 2, 80.00),
(2, 3, 200.00),
(3, 4, 150.00),
(2, 5, 120.00);

INSERT INTO elevage_nourrir (id_eleveur, date_nourrir) VALUES
(1, '2024-02-01'),
(2, '2024-02-02'),
(3, '2024-02-03'),
(1, '2024-02-04'),
(2, '2024-02-05');
