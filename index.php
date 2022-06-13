<?php

declare ( strict_types = 1 );
ini_set( 'error_reporting', E_ALL );

use app\Repository\IServidorRepository;
use app\Repository\ServidorRepository;
use DI\ContainerBuilder;
use Slim\Factory\AppFactory;
use Twig\Environment;

require_once __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable( __DIR__ );
$dotenv->load();

$containerBuilder = new ContainerBuilder();

/* create your container */
$containerBuilder->addDefinitions( [
    Environment::class         => function () {
        $loader = new \Twig\Loader\FilesystemLoader( __DIR__ . '/app/views' );
        $twig   = new \Twig\Environment( $loader );
        $twig->addGlobal( 'base_adminlte', $_ENV['BASE_URL'] . "/vendor/almasaeed2010/adminlte" );
        $twig->addGlobal( 'base_url', $_ENV["BASE_URL"] );
        return $twig;
    },

    IServidorRepository::class => DI\get( ServidorRepository::class ),
] );

$container = $containerBuilder->build();

// // Instantiate the Slim App
$app = AppFactory::createFromContainer( $container );

// Register routes
( require __DIR__ . '/routes.php' )( $app );

// Register middleware
( require __DIR__ . '/middleware.php' )( $app );

$app->run();

?>