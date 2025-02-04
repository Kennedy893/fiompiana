<?php

// KENNEDY

namespace app\controllers;

use app\models\AnimauxModel;
use Flight;

class FrontOfficeController {

	public function __construct() {

	}


	public function listeAnimauxAVendre()
    {
        $animaux = Flight::AnimauxModel()->getAnimauxAVendre(1);
        $result = ['animaux' => $animaux];
        Flight::render('achat-animaux', $result);
    }

    public function faireAchat($id_animal, $id_eleveur)
    {
        // $autovente = Flight::request()->query->autovente ? 1 : 0; // Convertir en booléen

        $animal = Flight::AnimauxModel()->getAnimalById($id_animal);

        // Vérifier si l'éleveur a assez de capital
        $eleveur = Flight::AnimauxModel()->getEleveurById($id_eleveur);
        if (!$eleveur || $eleveur['capital'] < ($animal['poids_actuel'] * $animal['prix_kg'])) 
        {
            Flight::halt(400, "Erreur : Capital insuffisant.");
            return;
        }

        Flight::AnimauxModel()->setEleveur(1, $id_animal);
        Flight::AnimauxModel()->removeFromVente($id_animal);
        $updateCapital = Flight::AnimauxModel()->updateCapital($id_animal, $id_eleveur);

        $animaux = Flight::AnimauxModel()->getAnimauxAVendre(1);
        $result = ['animaux' => $animaux];
        Flight::render('achat-animaux', $result);
    }

}

?>