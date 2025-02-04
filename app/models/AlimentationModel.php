<?php

namespace app\models;

use Flight;
use Exception;

class AlimentationModel{

    private $db;

    public function __construct($db){
        $this->db = $db;
    }

    public function getAll() {
        $query = "SELECT * FROM elevage_alimentation";
        return $this->db->fetchAll($query); 
    }
    
    
    public function acheterAliment($id_alimentation, $quantite, $date_achat) {
        try {
            
            // Préparez la requête d'insertion
            $query = "INSERT INTO elevage_achat_alimentation (id_alimentation, date_achat, quantite) VALUES (?, ?, ?)";
            
            // Exécutez la requête
            $stmt = $this->db->prepare($query);
            $result = $stmt->execute([$id_alimentation, $date_achat, $quantite]);
            
            // Vérifiez si l'insertion a réussi
            if ($result === false) {
                throw new Exception("Échec de l'enregistrement de l'achat");
            }
            
            return true;
        } catch (Exception $e) {
            // Loggez l'erreur
            error_log('Erreur lors de l\'achat de l\'alimentation : ' . $e->getMessage());
            return false;
        }
    }
    

    public function getAchats() {
        $query = "
            SELECT a.nom_alimentation, a.prix_kg, a.image_alimentation, ach.quantite, (a.prix_kg * ach.quantite) AS totalPrix
            FROM elevage_achat_alimentation ach
            JOIN elevage_alimentation a ON ach.id_alimentation = a.id_alimentation
        ";
        return $this->db->fetchAll($query);
    }
    

    public function getAlimentationById($id_alimentation) {
        $query = "SELECT * FROM elevage_alimentation WHERE id_alimentation = ?";
        
        try {
            // Utilisez fetchAll qui retourne un tableau de résultats
            $result = $this->db->fetchAll($query, [$id_alimentation]);
            
            // Vérifiez si un résultat a été trouvé
            if (empty($result)) {
                return null;
            }
            
            // Retournez le premier élément du tableau (qui devrait être l'aliment recherché)
            return $result[0];
        } catch (Exception $e) {
            // Loggez l'erreur
            error_log('Erreur lors de la récupération de l\'alimentation : ' . $e->getMessage());
            return null;
        }
    }

    
    
    
        
}
