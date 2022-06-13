<?php
namespace app\controllers;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

class HomeController {

    private $view;

    public function __construct( Twig $view ) {
        $this->view = $view;
    }

    public function index( ServerRequestInterface $request, ResponseInterface $response, array $dados ): ResponseInterface {
        $response->getBody()->write( "Teste de pagina" );
        return $response;
    }
}