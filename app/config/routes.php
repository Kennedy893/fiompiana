<?php

use app\controllers\FrontOfficeController;
use app\controllers\ParametrageController;
use app\controllers\ResetController;
use app\controllers\LoginController;

use flight\Engine;
use flight\net\Router;
//use Flight;


$Login=new LoginController();
$router->get('/', [ $Login, 'home' ]);

$FrontOfficeController = new FrontOfficeController();

$router->group('/accueil', function () use ($router, $FrontOfficeController) {

    $router->get('/achat-animaux', [$FrontOfficeController, 'listeAnimauxAVendre']);

    $router->get('/acheter/@id_animal:[0-9]+/@id_eleveur:[0-9]+', [$FrontOfficeController, 'faireAchat']);

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
$router->get('/type_animal/modif', [ $Param_Controller, 'redirect_modif_type_animal' ]);
$router->post('/type_animal/modif/confirm', [ $Param_Controller, 'update_type_animal' ]);

$router->get('/type_alimentation', [ $Param_Controller, 'go_to_alimentation' ]);
$router->get('/type_alimentation/modif', [ $Param_Controller, 'redirect_modif_alimentation' ]);
$router->post('/type_alimentation/modif/confirm', [ $Param_Controller, 'update_alimentation' ]);

