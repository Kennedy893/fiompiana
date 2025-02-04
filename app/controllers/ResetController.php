<?php
namespace app\controllers;

use app\models\ResetModel;
use Flight;

class ResetController
{
    public function __construct()
    {
        // Vous pouvez ajouter ici toute initialisation nécessaire
    }

    /**
     * Méthode appelée pour réinitialiser les données d'un éleveur.
     * On récupère l'ID de l'éleveur (ici simulé ou issu de la session), puis on
     * appelle le modèle pour effectuer le reset. La réponse est renvoyée au format JSON.
     */
    public function reset()
    {
        // Démarrer la session pour récupérer l'ID de l'éleveur (ou le récupérer autrement)
        session_start();
        // Par exemple, récupérer l'id de l'éleveur depuis la session (ici on le simule avec 1 si non défini)
        $id_eleveur = isset($_SESSION['id_eleveur']) ? $_SESSION['id_eleveur'] : 1;

        // Récupérer l'instance PDO stockée dans Flight
        $pdo = Flight::get('pdo');

        // Instancier le modèle ResetModel
        $resetModel = new ResetModel($pdo);

        // Appeler la méthode de réinitialisation
        if ($resetModel->resetForEleveur($id_eleveur)) {
            Flight::json([
                'status'  => 'success',
                'message' => 'Réinitialisation effectuée !'
            ]);
        } else {
            Flight::json([
                'status'  => 'error',
                'message' => 'Une erreur est survenue lors de la réinitialisation.'
            ]);
        }
    }
}
