<?php

namespace app\controllers;

use app\models\AlimentationModel;
use app\models\ArgentModel;
use Exception;
use Flight;

class AlimentationController {

    public function __construct() {
        
    }

    public function listAlimentations() {
        $alimentModel = new AlimentationModel(Flight::db());
        $alimentations = $alimentModel->getAll(); // Récupération des aliments
    
        if (!$alimentations) {
            $alimentations = []; 
        }
    
        // Vérification des données avant l'affichage
        Flight::render('listAlimentation', ['alimentations' => $alimentations]);
    }
    


    public function afficherAchats() {
        $achatModel = new AlimentationModel(Flight::db());
        $achats = $achatModel->getAchats();
    
        Flight::render('alimentationAcheter', ['achats' => $achats]);
    }
    

    public function afficherFormulaireAchat() {
        $alimentModel = new AlimentationModel(Flight::db());
        
        // Récupérez l'ID de l'alimentation
        $id_alimentation = Flight::request()->query['id_alimentation'] ?? null;
        
        // Validation de l'ID
        if (!$id_alimentation || !is_numeric($id_alimentation)) {
            Flight::redirect('/listAlimentation');
            exit;
        }
        
        // Récupérez l'aliment
        $aliment = $alimentModel->getAlimentationById($id_alimentation);
        
        // Vérification de l'existence de l'aliment
        if (!$aliment) {
            Flight::redirect('/listAlimentation');
            exit;
        }
        
        // Ajoutez un débogage pour vérifier le contenu de $aliment
        error_log('Aliment récupéré : ' . print_r($aliment, true));
        
        // Rendez la vue avec les données
        Flight::render('achatAlimentationFormulaire', ['aliment' => $aliment]);
    }

    public function validerAchat() {
        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            // Récupérer les données du formulaire
            $id_alimentation = intval($_POST['id_alimentation']);
            $quantite = intval($_POST['quantite']);
    
            // Initialiser les modèles
            $alimentModel = new AlimentationModel(Flight::db());
            $capitalModel = new ArgentModel(Flight::db());
    
            // Récupérer les informations de l'aliment
            $aliment = $alimentModel->getAlimentationById($id_alimentation);
            
            // Vérifier si l'aliment existe
            if (!$aliment) {
                Flight::redirect('/listAlimentation');
                exit;
            }
    
            // Calculer le prix total
            $prixTotal = $aliment['prix_kg'] * $quantite;
    
            // Récupérer le montant du capital
            $capitalDisponible = $capitalModel->getMontant();
    
           
    
            // Vérifier si le capital est suffisant
            if ($capitalDisponible < $prixTotal) {
                // Calculer le montant manquant
                $montantManquant = $prixTotal - $capitalDisponible;
                // Rediriger vers la page de dépôt avec un message
                Flight::render('erreurFond', [
                    'message' => 'Fonds insuffisants',
                    'montantManquant' => $montantManquant,
                    'nom_alimentation' => $aliment, 
                    'quantite' => $quantite
                ]);
                return; // Arrêter l'exécution
            }
            
            // Si le capital est suffisant, procéder à l'achat
            try {
                // Déduire le montant du capital
                $capitalModel->deduireMontant($prixTotal);
                
                // Enregistrer l'achat
                $dateAchat = date('Y-m-d H:i:s');
                $alimentModel->acheterAliment($id_alimentation, $quantite, $dateAchat);
                
    
                // Rediriger vers la liste des alimentations
                 Flight::redirect('/alimentationAcheter');
            } catch (Exception $e) {
                // Gérer les erreurs
                Flight::render('erreurFond', [
                    'message' => 'Erreur lors de l\'achat : ' . $e->getMessage()
                ]);
            }
        }
    }
}

    
