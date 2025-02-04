<?php

use app\controllers\FrontOfficeController;
use app\controllers\ParametrageController;
use app\controllers\ResetController;

use flight\Engine;
use flight\net\Router;
//use Flight;


$router->get('/', function () use ($router) {
        Flight::render('accueil');
    });

$FrontOfficeController = new FrontOfficeController();

$router->group('/accueil', function () use ($router, $FrontOfficeController) {

    $router->get('/achat-animaux', [$FrontOfficeController, 'listeAnimauxAVendre']);

    $router->get('/acheter/@id_animal:[0-9]+/@id_eleveur:[0-9]+', [$FrontOfficeController, 'faireAchat']);

    // $router->get('/accueil/acheter', function () use ($FrontOfficeController) {
    //     $id_animal = Flight::request()->query->id_animal;
    //     $id_eleveur = Flight::request()->query->id_eleveur;
    //     $FrontOfficeController->faireAchat($id_animal, $id_eleveur);
    // });

    $router->get('/vente-animaux', function () {
        Flight::redirect('vente-animaux');
    });

    $router->get('/achat-alimentation', function () {
        Flight::redirect('achat-alimentation');
    });

    $router->get('/prevision', function () {
        Flight::redirect('prevision');
    });

    $router->get('/parametre-type', function () {
        Flight::redirect('parametre-type');
    });

    $router->post('/reset', [new ResetController(), 'reset']);
});

$Param_Controller=new ParametrageController();
$router->get('/type_animal', [ $Param_Controller, 'go_to_animal' ]);
$router->get('/type_animal/delete', [ $Param_Controller, 'delete_type_animal' ]);
$router->get('/type_alimentation', [ $Param_Controller, 'go_to_alimentation' ]);

