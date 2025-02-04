<?php

// KENNEDY

namespace app\models;

use Flight;
use PDO;

class AnimauxModel {

    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    // ACHETER ANIMAUX

	public function getAnimauxAVendre($id_eleveur)
    {
        $stmt = $this->db->prepare("SELECT * FROM elevage_animal WHERE status_vente is TRUE AND id_eleveur != $id_eleveur");
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function setEleveur($id_eleveur, $id_animal)
    {
        $stmt = $this->db->prepare("UPDATE elevage_animal SET id_eleveur = ? WHERE id_animal = ?");
        $stmt->execute([$id_eleveur, $id_animal]);
    }

    public function removeFromVente($id_animal)
    {
        $stmt = $this->db->prepare("UPDATE elevage_animal SET status_vente = 0 WHERE id_animal = ?");
        $stmt->execute([$id_animal]);
    }

    public function getPrixExactAnimal($id_animal)
    {
        $stmt = $this->db->prepare("SELECT a.poids_actuel * t.prix_kg as prix_exact FROM elevage_type_animal as t 
                                    JOIN elevage_animal as a ON t.id_type=a.id_type 
                                    WHERE a.id_animal = $id_animal");
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['prix_exact'];
    }

    public function updateCapital($id_animal, $id_eleveur)
    {
        $prix = $this->getPrixExactAnimal($id_animal);
        // $stmt = $this->db->prepare("UPDATE elevage_eleveur SET capital=capital-$prix WHERE id_eleveur = $id_eleveur");
        // $stmt->execute();
        $stmt = $this->db->prepare("UPDATE elevage_eleveur SET capital = capital - ? WHERE id_eleveur = ?");
        $stmt->execute([$prix, $id_eleveur]);
    }

    public function getAnimalById ($id) 
    {
        $stmt = $this->db->prepare("SELECT a.id_animal, a.nom_animal, a.poids_actuel, t.prix_kg 
                                    FROM elevage_animal a
                                    JOIN elevage_type_animal t ON a.id_type = t.id_type
                                    WHERE a.id_animal = ?");
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function getEleveurById ($id) 
    {
        $stmt = $this->db->prepare("SELECT id_eleveur, nom, capital FROM elevage_eleveur WHERE id_eleveur = ?");
        $stmt->execute([$id]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function updateAutoVente($id_animal, $autovente)
    {
        $stmt = $this->db->prepare("UPDATE elevage_animal SET autovente = ? WHERE id_animal = ?");
        $stmt->execute([$autovente, $id_animal]);
    }



    // VENDRE ANIMAUX

    public function checkAutoVente($id_animal)
    {
        // Récupérer le poids actuel de l'animal et son poids minimal de vente
        $stmt = $this->db->prepare("
            SELECT a.poids_actuel, t.poids_min_vente, a.autovente
            FROM elevage_animal a
            JOIN elevage_type_animal t ON a.id_type = t.id_type
            WHERE a.id_animal = ?
        ");
        $stmt->execute([$id_animal]);
        $animal = $stmt->fetch(PDO::FETCH_ASSOC);

        // Vérifier si l'animal a activé l'autovente et a dépassé le poids minimal
        if ($animal && $animal['autovente'] && $animal['poids_actuel'] >= $animal['poids_min_vente']) 
        {
            $this->vendreAnimal($id_animal); // Exécuter la vente automatique
        }
    }

    public function updatePoidsAnimal($id_animal, $nouveau_poids)
    {
        $stmt = $this->db->prepare("UPDATE elevage_animal SET poids_actuel = ? WHERE id_animal = ?");
        $stmt->execute([$nouveau_poids, $id_animal]);

        // Vérifier si l'animal doit être vendu automatiquement
        $this->checkAutoVente($id_animal);
    }

    // Vendre automatiquement l'animal
    public function vendreAnimal($id_animal)
    {
        $stmt = $this->db->prepare("UPDATE elevage_animal SET status_vente = TRUE WHERE id_animal = ?");
        $stmt->execute([$id_animal]);
    }



    // public function getAnimauxVendables($id_eleveur)
    // {
    //     $stmt = $this->db->prepare("SELECT * FROM elevage_animal WHERE status_vente is TRUE AND id_eleveur = $id_eleveur");
    //     $stmt->execute();
    //     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    //     return $result;
    // }


}