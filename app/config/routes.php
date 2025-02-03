<?php

use app\controllers\K_AnimauxController;
use flight\Engine;
use flight\net\Router;
//use Flight;

/** 
 * @var Router $router 
 * @var Engine $app
 */

$router->get('/', function () use ($router) {
        Flight::render('accueil');
    });

$router->group('/accueil', function () use ($router) {
    $router->get('/achat-animaux', function () {
        Flight::render('achat-animaux');
    });

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
