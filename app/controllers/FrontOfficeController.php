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

}

?>