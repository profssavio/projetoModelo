<?php
namespace app\controllers;

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Twig\Environment;

class HomeController {

    private Environment $view;

    public function __construct( Environment $view ) {
        $this->view = $view;
    }

    public function index( RequestInterface $request, ResponseInterface $response ): ResponseInterface {
        $dados["titulo"] = "Pagina inicial";
        $body            = $this->view->render( 'Main.index.html', $dados );
        $response->getBody()->write( $body );
        return $response;
    }
}