<?php
namespace app\controllers;

use app\Service\ServidorService;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Twig\Environment;

class ServidorController {

    private Environment $view;
    private ServidorService $servidorService;

    public function __construct( Environment $view, ServidorService $servidorService ) {
        $this->view            = $view;
        $this->servidorService = $servidorService;
    }

    public function index( RequestInterface $request, ResponseInterface $response ): ResponseInterface {
        $servidores = $this->servidorService->findAll();
        $response->getBody()->write( json_encode( $servidores ) );
        return $response;
    }

}
