<?php
declare ( strict_types = 1 );

require_once './vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable( __DIR__ );
$dotenv->load();

//Criar o roteador
$router = new \CoffeeCode\Router\Router( $_ENV['BASE_URL'] );

//Informar o diretorio onde os controladores se encontram
$router->namespace( "App\Controller" );

//Router principal
$router->group( null );
// Primeiro rota dinamica e depois rota estatica
$router->get( "/", "Main:index" );

$router->dispatch();