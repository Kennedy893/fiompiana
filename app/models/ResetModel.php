<?php

namespace app\models;
use Flight;
use PDO;
class ResetModel
{
    
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    /**
     * Réinitialise les données de l'éleveur.
     *
     * Les opérations effectuées sont :
     * - Remettre le capital de l'éleveur à 0 dans la table elevage_eleveur
     * - Mettre à jour les animaux de cet éleveur : poids_actuel = poids_initial, status_vente = TRUE, et dissocier l'éleveur (mettre id_eleveur à NULL)
     * - Supprimer les enregistrements dans elevage_stockage correspondant à cet éleveur
     * - Mettre à jour la date_nourrir dans elevage_nourrir à '2024-02-03'
     *
     * @param int $id_eleveur L'identifiant de l'éleveur
     * @return bool true en cas de succès, false en cas d'erreur
     */
    public function resetForEleveur($id_eleveur)
    {
        try {
            // Démarrer la transaction
            $this->pdo->beginTransaction();

            // 1. Réinitialiser le capital de l'éleveur à 0
            $stmt = $this->pdo->prepare("UPDATE elevage_eleveur SET capital = 0 WHERE id_eleveur = ?");
            $stmt->execute([$id_eleveur]);

            // 2. Mettre à jour les animaux de cet éleveur :
            // - Réinitialiser le poids_actuel à poids_initial
            // - Mettre status_vente à TRUE (1)
            // - Dissocier l'éleveur en mettant id_eleveur à NULL
            $stmt = $this->pdo->prepare("UPDATE elevage_animal SET poids_actuel = poids_initial, status_vente = 1, id_eleveur = NULL WHERE id_eleveur = ?");
            $stmt->execute([$id_eleveur]);

            // 3. Supprimer les données dans elevage_stockage correspondant à cet éleveur
            $stmt = $this->pdo->prepare("DELETE FROM elevage_stockage WHERE id_eleveur = ?");
            $stmt->execute([$id_eleveur]);

            // 4. Mettre à jour la date_nourrir dans elevage_nourrir à '2024-02-03'
            $stmt = $this->pdo->prepare("UPDATE elevage_nourrir SET date_nourrir = '2024-02-03' WHERE id_eleveur = ?");
            $stmt->execute([$id_eleveur]);

            // Valider la transaction
            $this->pdo->commit();
            return true;
        } catch (\PDOException $e) {
            // En cas d'erreur, annuler la transaction
            $this->pdo->rollBack();
            error_log("Erreur dans ResetModel::resetForEleveur : " . $e->getMessage());
            return false;
        }
    }
}
