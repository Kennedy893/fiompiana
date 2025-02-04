<?php

namespace app\models;

use Flight;
use Exception;

class ArgentModel{

    private $db;

    public function __construct($db){
        $this->db = $db;
    }


    public function getMontant() {
        $query = "SELECT valeur FROM elevage_capital ";
        $result = $this->db->fetchAll($query);
        
        return $result ? $result[0]['valeur'] : 0;
    }

    public function deduireMontant($montant) {
        
        $query = "UPDATE elevage_capital SET valeur = valeur - " . $montant;
        $result = $this->db->exec($query, [$montant, $montant]);
        
        // Vérifier si la mise à jour a réussi et si le montant était suffisant
        if ($result === 0) {
            throw new Exception("Fonds insuffisants ou erreur de mise à jour");
        }
        
        return $result;
    }

    public function addCapital($valeur) {
        // Ajoutez une condition WHERE pour cibler la ligne existante
        $query = "UPDATE elevage_capital SET valeur = valeur + " . $valeur . " WHERE id_capital = 1";
        
        try {
            // Exécuter la mise à jour
            $result = $this->db->exec($query);
            
            // Vérifier le nombre de lignes affectées
            if ($result === 0) {
                throw new Exception("Aucune ligne mise à jour");
            }
            
            return $result;
        } catch (Exception $e) {
            // Gestion des erreurs
            throw new Exception("Erreur lors de l'ajout du capital : " . $e->getMessage());
        }
    }    
}