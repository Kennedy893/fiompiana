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

}