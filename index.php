<?php

declare ( strict_types = 1 );
ini_set( 'error_reporting', E_ALL );

use DI\ContainerBuilder;
use Slim\Factory\AppFactory;

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable( __DIR__ );
$dotenv->load();

$containerBuilder = new ContainerBuilder();

/* create your container */
$containerBuilder->addDefinitions( require_once __DIR__ . '/container.php' );

$container = $containerBuilder->build();

// Instantiate the Slim App
$app = AppFactory::createFromContainer( $container );

// Register routes
( require __DIR__ . '/routes.php' )( $app );

// Register middleware
( require __DIR__ . '/middleware.php' )( $app );

$app->run();

?>