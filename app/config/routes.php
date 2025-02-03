<?php

use app\controllers\FrontOfficeController;
use flight\Engine;
use flight\net\Router;
//use Flight;


$router->get('/', function () use ($router) {
        Flight::render('accueil');
    });

$FrontOfficeController = new FrontOfficeController();

$router->group('/accueil', function () use ($router, $FrontOfficeController) {

    $router->get('/achat-animaux', [$FrontOfficeController, 'listeAnimauxAVendre']);

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
});
