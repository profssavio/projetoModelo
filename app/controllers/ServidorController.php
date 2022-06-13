<?php
namespace app\controllers;

use app\Service\ServidorService;

class ServidorController {

    private ServidorService $servidorService;

    public function __construct( ServidorService $servidorService ) {
        $this->servidorService = $servidorService;
    }

    public function index() {
        echo "teste asdasad";
        var_dump( $this->servidorService->findAll() );
    }

}