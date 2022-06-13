<?php

declare ( strict_types = 1 );
ini_set( 'error_reporting', E_ALL );

use app\controllers\HomeController;
use DI\ContainerBuilder;
use Slim\Factory\AppFactory;
use Twig\Environment;

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable( __DIR__ );
$dotenv->load();

$containerBuilder = new ContainerBuilder();

/* create your container */
$containerBuilder->addDefinitions( [
    Environment::class => function () {
        $loader = new \Twig\Loader\FilesystemLoader( __DIR__ . '/app/views' );
        $twig   = new \Twig\Environment( $loader );
        $twig->addGlobal( 'base_adminlte', $_ENV['BASE_URL'] . "/vendor/almasaeed2010/adminlte" );
        $twig->addGlobal( 'base_url', $_ENV["BASE_URL"] );
        return $twig;
    },
] );

$container = $containerBuilder->build();

// // Instantiate the Slim App
$app = AppFactory::createFromContainer( $container );

// Add Error Handling Middleware
$app->addErrorMiddleware( true, true, true );

// routing middleware
$app->addRoutingMiddleware();

$app->get( '/', [HomeController::class, 'index'] );

$app->get( '/servidor', [ServidorController::class, 'index'] );

$app->run();

?>