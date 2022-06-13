<?php

declare ( strict_types = 1 );
ini_set( 'error_reporting', E_ALL );

use app\controllers\HomeController;
use app\controllers\ServidorController;
use DI\ContainerBuilder;
use Slim\Factory\AppFactory;

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable( __DIR__ );
$dotenv->load();

// set container and dependencies
$containerBuilder = new ContainerBuilder();
//'/path/to/templates'
$containerBuilder->addDefinitions( [

] );

$container = $containerBuilder->build();

AppFactory::setContainer( $container );

// Instantiate the Slim App
$app = AppFactory::create();

// Add Error Handling Middleware
$app->addErrorMiddleware( true, true, true );

// routing middleware
$app->addRoutingMiddleware();

$app->get( '/', [HomeController::class, 'index'] );

$app->get( '/servidor', [ServidorController::class, 'index'] );

$app->run();

?>