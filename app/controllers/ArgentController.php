<?php

namespace app\controllers;

use app\models\ArgentModel;
use Exception;
use Flight;

class ArgentController {

    public function __construct() {
       
    }

    // Fonction pour afficher le montant du capital
    public function showMontant() {
        $argentModel = new ArgentModel(Flight::db());

        // Récupérer le montant du capital
        $montant = $argentModel->getMontant();

        // Passer les données à la vue
        $data = [
            'montant' => $montant['valeur'] ?? null, 
            'message' => $montant ? 'Montant récupéré avec succès.' : 'Aucun montant trouvé.'
        ];

        // Afficher la vue
        Flight::render('argent', $data);
    }

    public function afficherFormulaire() {
        Flight::render('depotArgent');
    }

    public function depotArgent() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Récupérer et convertir le montant du dépôt en entier
            $valeur = intval($_POST['valeur']);
            
            try {
                // Initialiser le modèle
                $capitalModel = new ArgentModel(Flight::db());
                
                // Ajouter le capital
                $capitalModel->addCapital($valeur);
                
                // Rediriger avec un message de succès
                Flight::redirect('/listAlimentation');
            } catch (Exception $e) {
                // Gérer les erreurs
                Flight::render('erreur', [
                    'message' => 'Erreur lors du dépôt : ' . $e->getMessage()
                ]);
            }
        } else {
            // Afficher le formulaire de dépôt
            Flight::render('depotArgent');
        }
    }
}