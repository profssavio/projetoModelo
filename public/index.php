<?php

declare ( strict_types = 1 );
ini_set( 'error_reporting', E_ALL );

use app\controllers\HomeController;
use Slim\Factory\AppFactory;
use Slim\Psr7\Request;
use Slim\Psr7\Response;

require_once __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable( __DIR__ . '/..' );
$dotenv->load();

$app = AppFactory::create();
$app->addRoutingMiddleware();
$app->addErrorMiddleware( true, true, true );

$app->get( '/', function ( Request $request, Response $response ) {
    $response->getBody()->write( "ola" );
    return $response;
} );

$app->get( '/teste', [HomeController::class, 'index'] );

$app->run();

?>