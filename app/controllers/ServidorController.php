<?php

use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;

class ServidorController {

    // private Environment $view;
    // private ServidorService $servidorService;

    // public function __construct( Environment $view, ServidorService $servidorService ) {
    //     $this->view            = $view;
    //     $this->servidorService = $servidorService;
    // }

    public function index( RequestInterface $request, ResponseInterface $response ): ResponseInterface {
        $response->getBody()->write( 'teste' );
        return $response;
    }

}
