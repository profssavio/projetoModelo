<?php

use app\controllers\HomeController;
use app\controllers\ServidorController;
use Slim\App;

return function ( App $app ) {
    $app->get( '/', [HomeController::class, 'index'] );
    $app->get( '/servidor', [ServidorController::class, 'index'] );
};